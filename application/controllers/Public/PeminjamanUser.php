<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeminjamanUser extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Peminjaman_model');
  }

  public function index()
  {
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
    $data = [
      'title' => 'Peminjaman',
      'peminjaman' => $this->Peminjaman_model->get_peminjaman(),
    ];

    $this->template->load('template/template_public', 'public/peminjaman', $data);
  }

  public function keranjang()
  {
    $data = [
      'title' => 'Keranjang',
      'datatemp' => $this->Peminjaman_model->getTemp(),
    ];
    $this->template->load('template/template_public', 'public/cart', $data);
  }

  public function detail($kode_peminjaman)
  {
    if (!$this->session->userdata('username')) {
      redirect('auth');
      $this->session->set_flashdata('gagal', 'Anda belum login, silahkan login terlebih dahulu');
    }
    $data = [
      'title' => 'Detail Peminjaman #' . $kode_peminjaman,
      'detail' => $this->db->join('user', 'user.id_user=detail_peminjaman.id_user')->join('buku', 'buku.id_buku=detail_peminjaman.id_buku')->where('kode_peminjaman', $kode_peminjaman)->get('detail_peminjaman')->result(),
    ];
    $this->template->load('template/template_public', 'public/detailPeminjaman', $data);
  }

  public function addKeranjang($id_buku)
  {
    if (!$this->session->userdata('username')) {
      $this->session->set_flashdata('gagal', 'Anda belum login, silahkan login terlebih dahulu');
      redirect('auth');
    }
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
    redirect();
  }
}
