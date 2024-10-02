<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      'title' => 'Favorit',
      'koleksi' => $this->db->join('user', 'user.id_user=koleksi.id_user')->join('buku', 'buku.id_buku=koleksi.id_buku')->where('koleksi.id_user', $this->session->userdata('id_user'))->get('koleksi')->result()
    ];
    $this->template->load('template/template_public', 'public/favorit', $data);
  }

  public function tambah($id)
  {
    if (!$this->session->userdata('username')) {
      redirect('auth');
      $this->session->set_flashdata('gagal', 'Anda belum login, silahkan login terlebih dahulu');
    }

    $fav = $this->db->join('user', 'user.id_user=koleksi.id_user')->join('buku', 'buku.id_buku=koleksi.id_buku')->where('koleksi.id_buku', $id)->where('koleksi.id_user', $this->session->userdata('id_user'))->get('koleksi')->result();

    if ($fav != null) {
      $this->session->set_flashdata('gagal', 'Buku sudah ada di favorit');
    } else {
      $data = [
        'id_user' => $this->session->userdata('id_user'),
        'id_buku' => $id,
      ];
      $this->db->insert('koleksi', $data);
      $this->session->set_flashdata('berhasil', 'Buku berhasil ditambahkan ke favorit');
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function hapus($id)
  {
    $where = array('id_koleksi' => $id);
    $this->db->delete('koleksi', $where);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!!!!');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
