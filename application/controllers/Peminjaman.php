<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username') == null) {
      redirect('auth');
    }
    $this->load->model('Peminjaman_model');
  }

  public function index()
  {
    $data = [
      'title' => 'Peminjaman',
      'peminjaman' => $this->Peminjaman_model->get_peminjaman(),
    ];

    $this->template->load('template/layout', 'peminjaman/peminjaman', $data);
  }

  public function keranjang()
  {
    $data = [
      'title' => 'Keranjang',
      'datatemp' => $this->db->join('user', 'user.id_user=temp.id_user')->join('buku', 'buku.id_buku=temp.id_buku')->where('temp.id_user', $this->session->userdata('id_user'))->get('temp')->result(),
    ];
    $this->template->load('template/layout', 'peminjaman/keranjang', $data);
  }

  public function detail($kode_peminjaman)
  {
    $data = [
      'title' => 'Detail Peminjaman #' . $kode_peminjaman,
      'detail' => $this->db->join('user', 'user.id_user=detail_peminjaman.id_user')->join('buku', 'buku.id_buku=detail_peminjaman.id_buku')->where('kode_peminjaman', $kode_peminjaman)->get('detail_peminjaman')->result(),
    ];
    $this->template->load('template/layout', 'peminjaman/detailPeminjaman', $data);
  }

  public function peminjamanBuku($id_buku)
  {
    // jika buku yang ada di table temp dan detail_peminjaman sama dan status yang ada di detail_peminjaman masih diperoses atau dipinjam jadi tidak boleh untuk di pinjam  
    $buku_tersedia = $this->Peminjaman_model->cek_buku_tersedia($id_buku, $this->session->userdata('id_user'));
    $cek = $this->Peminjaman_model->cek_buku_sudah_dipilih($id_buku);

    if ($cek != NULL) {
      $this->session->set_flashdata('gagal', 'Buku sudah di pilih');
    } else {
      if ($buku_tersedia) {
        $data = ['id_buku' => $id_buku, 'id_user' => $this->session->userdata('id_user')];
        $this->db->insert('temp', $data);
        $this->session->set_flashdata('berhasil', 'Barang ditambah ke keranjang');
      } else {
        $this->session->set_flashdata('gagal', 'Buku ini sedang dalam proses atau sudah dipinjam.');
      }
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function hapusKeranjang($temp)
  {
    $this->db->where('id_temp', $temp);
    $this->db->delete('temp');
    $this->session->set_flashdata('berhasil', 'Buku berhasil dihapus dari keranjang');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function prosesPeminjaman()
  {
    $kode_peminjaman = $this->Peminjaman_model->kode_peminjaman();
    $temp = $this->db->join('buku', 'buku.id_buku=temp.id_buku')->where('id_user', $this->session->userdata('id_user'))->get('temp')->result();
    if ($this->input->post('tanggal_pengembalian') >= date('Y-m-d')) {
      foreach ($temp as $value) {
        $data_detail = [
          'kode_peminjaman' => $kode_peminjaman,
          'id_buku'         => $value->id_buku,
          'id_user'         => $value->id_user,
          'status'          => 'Proses',
        ];
        $this->db->insert('detail_peminjaman', $data_detail);

        $data_buku = ['stok' => $value->stok - 1];
        $where_buku = ['id_buku' => $value->id_buku];
        $this->db->update('buku', $data_buku, $where_buku);

        // hapus table temp
        $where_temp = ['id_user' => $this->session->userdata('id_user')];
        $this->db->delete('temp', $where_temp);
      }

      // Tambah Ke Peminjaman
      $data_peminjaman = [
        'kode_peminjaman'       => $kode_peminjaman,
        'tanggal_peminjaman'    => date('Y-m-d'),
        'tanggal_pengembalian'  => $this->input->post('tanggal_pengembalian'),
        'id_user'               => $value->id_user,
      ];
      $this->db->insert('peminjaman', $data_peminjaman);
      $this->session->set_flashdata('berhasil', 'Pesanan buku anda sedang di peroses');
    } else {
      setlocale(LC_TIME, 'id_ID.utf8');
      $this->session->set_flashdata('gagal', 'Tanggal pengembalian harus lebih atau hari ini ' . strftime('%A, %d %B %Y', strtotime(date('Y-m-d'))));
      redirect($_SERVER['HTTP_REFERER']);
    }
    redirect('peminjaman');
  }

  public function persetujuan($id_detail)
  {
    $detail = $this->db->get_where('detail_peminjaman', ['id_detail_peminjaman' => $id_detail])->row();
    $ulasan = [
      'id_user' => $this->session->userdata('id_user'),
      'id_buku' => $detail->id_buku,
    ];
    $this->db->insert('ulasan', $ulasan);
    $id_ulasan_last = $this->db->insert_id();

    $data = ['status' => 'Dipinjam', 'id_ulasan' => $id_ulasan_last];
    $where = ['id_detail_peminjaman' => $id_detail];
    $this->db->update('detail_peminjaman', $data, $where);

    $this->session->set_flashdata('berhasil', 'Buku berhasil dipinjam');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function tolak($id_detail, $id_buku)
  {
    $data = ['status' => 'Ditolak'];
    $where = ['id_detail_peminjaman' => $id_detail];
    $this->db->update('detail_peminjaman', $data, $where);

    $stok = (int) $this->db->get_where('buku', ['id_buku' => $id_buku])->row()->stok;

    $data1 = ['stok' => $stok + 1];
    $where1 = ['id_buku' => $id_buku];
    $this->db->update('buku', $data1, $where1);

    $this->session->set_flashdata('berhasil', 'Buku berhasil ditolak');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function kembali($id_detail, $id_buku, $kode_peminjaman)
  {
    $tanggalKembali = $this->db->get_where('peminjaman', ['kode_peminjaman' => $kode_peminjaman])->row()->tanggal_pengembalian;
    $selsih_hari = (strtotime(date('Y-m-d')) - strtotime($tanggalKembali)) / (60 * 60 * 24);
    $total_denda = $selsih_hari * 1000;

    if ($tanggalKembali < date('Y-m-d')) {
      $status = 'Terlambat';
      $denda = [
        'total_denda' => $total_denda,
        'status_denda' => 'Belum Lunas',
      ];
      $this->db->insert('denda', $denda);
      $id_denda_last = $this->db->insert_id();
    } else {
      $id_denda_last = 0;
      $status = 'Dikembalikan';
    }

    $data_detail = [
      'status' => $status,
      'id_denda' => $id_denda_last,
      'tanggal_pengembalian_real' => date('Y-m-d')
    ];
    $where = ['id_detail_peminjaman' => $id_detail];
    $this->db->update('detail_peminjaman', $data_detail, $where);
    
    // Update stok buku
    $stok = (int) $this->db->get_where('buku', ['id_buku' => $id_buku])->row()->stok;
    $data1 = ['stok' => $stok + 1];
    $where1 = ['id_buku' => $id_buku];
    $this->db->update('buku', $data1, $where1);

    $this->session->set_flashdata('berhasil', 'Buku dikembaikan untuk dipinjam');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function bayardenda()
  {
    $total_denda = $this->input->post('total_denda');
    $sudah_dibayar = $this->input->post('sudah_dibayar');
    $sisa_denda = $this->input->post('sisa_denda');
    $bayar_denda = $this->input->post('bayar_denda');

    // SetStatus
    $status = $total_denda == $sudah_dibayar + $bayar_denda ? 'Lunas' : 'Belum Lunas';
    if ($sisa_denda >= $bayar_denda) {
      $data = [
        'sudah_dibayar' => $sudah_dibayar + $bayar_denda,
        'status_denda' => $status,
      ];
      $where = ['id_denda' => $this->input->post('id_denda')];
      $this->db->update('denda', $data, $where);
    } else {
      $this->session->set_flashdata('gagal', 'Yang dibayar melebihi');
    }

    $this->session->set_flashdata('berhasil', 'Denda Sudah DiBayar');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
