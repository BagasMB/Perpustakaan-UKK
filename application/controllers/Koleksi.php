<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koleksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data = [
      'title' => 'MyKoleksi',
      'koleksi' => $this->db->join('user', 'user.id_user = koleksi.id_user')->join('buku', 'buku.id_buku = koleksi.id_buku')->join('kategori', 'buku.id_kategori = kategori.id_kategori')->where('user.id_user', $this->session->userdata('id_user'))->get('koleksi')->result()
    ];

    $this->template->load('template/layout', 'admin/koleksi', $data);
  }

  public function simpan($id_buku)
  {
    $kolek = $this->db->where('id_user', $this->session->userdata('id_user'))->where('id_buku', $id_buku)->get('koleksi')->row();
    if ($kolek == null) {
      $data = [
        'id_user' => $this->session->userdata('id_user'),
        'id_buku' => $id_buku,
      ];
      $this->db->insert('koleksi', $data);
      $this->session->set_flashdata('berhasil', 'Buku ditambahkan ke kolaksi');
    } else {
      $this->session->set_flashdata('gagal', 'Buku sudah ada di kolaksi');
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function hapus($id) {
    $where = ['id_koleksi' => $id];
    $this->db->delete('koleksi', $where);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!!!!');
    redirect('koleksi');
  }
}


/* End of file Koleksi.php */
/* Location: ./application/controllers/Koleksi.php */