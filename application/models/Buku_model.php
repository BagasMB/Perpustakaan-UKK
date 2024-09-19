<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
  public function simpan()
  {
    $data = [
      'judul'         => $this->input->post('judul'),
      'penerbit'      => $this->input->post('penerbit'),
      'penulis'       => $this->input->post('penulis'),
      'tahun_terbit'  => $this->input->post('tahun_terbit'),
      'id_kategori'   => $this->input->post('id_kategori'),
      'jumlah'        => $this->input->post('jumlah'),
      'stok'          => $this->input->post('jumlah'),
    ];
    $this->db->insert('buku', $data);
  }

  public function edit()
  {
    $stok = $this->db->get_where('buku', ['id_buku' => $this->input->post('id_buku')])->row();
    var_dump($stok);
    die;
    $data = [
      'judul'         => $this->input->post('judul'),
      'penerbit'      => $this->input->post('penerbit'),
      'penulis'       => $this->input->post('penulis'),
      'tahun_terbit'  => $this->input->post('tahun_terbit'),
      'id_kategori'   => $this->input->post('id_kategori'),
      'jumlah'        => $this->input->post('jumlah'),
    ];
    $where = ['id_buku' => $this->input->post('id_buku')];
    $this->db->update('buku', $data, $where);
  }
}
