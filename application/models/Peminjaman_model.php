<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_peminjaman()
  {
    $this->db->from('peminjaman')->join('user', 'user.id_user=peminjaman.id_user');
    $this->db->order_by('kode_peminjaman', 'desc');
    if ($this->session->userdata('role') == 'Peminjam') {
      $this->db->where('peminjaman.id_user', $this->session->userdata('id_user'));
    }
    return $this->db->get()->result_array();
  }

  public function kode_peminjaman()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m');
    $jumlah = $this->db->where("DATE_FORMAT(tanggal_peminjaman,'%Y-%m')", $tanggal)->from('peminjaman')->count_all_results();
    $kode_peminjaman = date('ymd') . ($jumlah + 1);

    return $kode_peminjaman;
  }


  public function cek_buku_tersedia($id_buku, $id_user)
  {
    $this->db->select('status');
    $this->db->from('detail_peminjaman');
    $this->db->where('id_buku', $id_buku);
    $this->db->where('id_user', $id_user);
    $this->db->where_in('status', ['Proses', 'Dipinjam']);
    return $this->db->get()->num_rows() < 1;
  }

  public function cek_buku_sudah_dipilih($id_buku)
  {
    $this->db->where('id_buku', $id_buku)->where('id_user', $this->session->userdata('id_user'));
    return $this->db->get('temp')->result_array();
  }
}
