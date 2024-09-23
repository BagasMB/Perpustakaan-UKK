<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Buku_model');
  }

  public function index()
  {
    $data = [
      'title' => 'Book',
      'buku' => $this->Buku_model->getbuku(),
      // 'buku' => $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori')->get('buku')->result(),
      'kategori' => $this->db->get('kategori')->result(),
    ];

    $this->template->load('template/template_public', 'public/book', $data);
  }

  public function detail($id)
  {
    $book = $this->Buku_model->getbukudetail($id);
    // $book = $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori')->where('id_buku', $id)->get('buku')->row();
    $data = [
      'title' => 'Buku ' . $book->judul,
      'book' => $book,
    ];

    $this->template->load('template/template_public', 'public/detail', $data);
  }
}
