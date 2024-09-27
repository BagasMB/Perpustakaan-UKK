<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{

  public function getbuku()
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku', 'left');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori', 'left');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('buku.tahun_terbit', 'DESC');

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->result();
  }

  public function getbukudetail($id)
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku', 'left');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori', 'left');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('buku.tahun_terbit', 'DESC')->where('buku.id_buku', $id);

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->row();
  }

  public function getKategoriBuku($id)
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku', 'left');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori', 'left');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('buku.tahun_terbit', 'DESC')->where('kategori.id_kategori', $id);

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->result();
  }

  public function getbukudetailByKategori($id)
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku', 'left');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori', 'left');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('buku.tahun_terbit', 'DESC')->where('kategori.id_kategori', $id);
    $this->db->limit(4);

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->result();
  }

  public function getBukuLimit()
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku', 'left');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori', 'left');
    $this->db->group_by('buku.id_buku');
    $this->db->order_by('buku.tahun_terbit', 'DESC');
    $this->db->limit(8);

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->result();
  }

  public function jmlOrgRating()
  {
    $this->db->select('buku.*, kategori.*, FORMAT(AVG(ulasan.rating),1) AS rating');
    $this->db->from('buku');
    $this->db->join('ulasan', 'ulasan.id_buku = buku.id_buku');
    $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori');
    $this->db->group_by('buku.id_buku');

    // Menjalankan query dan mengembalikan hasil
    return $this->db->get()->num_rows();
  }
  public function simpan($namaFoto)
  {
    $data = [
      'judul'         => $this->input->post('judul'),
      'penerbit'      => $this->input->post('penerbit'),
      'penulis'       => $this->input->post('penulis'),
      'tahun_terbit'  => $this->input->post('tahun_terbit'),
      'id_kategori'   => $this->input->post('id_kategori'),
      'jumlah'        => $this->input->post('jumlah'),
      'stok'          => $this->input->post('jumlah'),
      'sinopsis'      => $this->input->post('sinopsis'),
      'foto' => $namaFoto,
    ];
    $this->db->insert('buku', $data);
  }

  public function edit($namaFoto)
  {
    $stok = $this->db->get_where('buku', ['id_buku' => $this->input->post('id_buku')])->row();
    $data = [
      'judul'         => $this->input->post('judul'),
      'penerbit'      => $this->input->post('penerbit'),
      'penulis'       => $this->input->post('penulis'),
      'tahun_terbit'  => $this->input->post('tahun_terbit'),
      'id_kategori'   => $this->input->post('id_kategori'),
      'jumlah'        => $this->input->post('jumlah'),
      'sinopsis'      => $this->input->post('sinopsis'),
      'foto' => $namaFoto,
    ];
    $where = ['foto' => $this->input->post('namafoto')];
    $this->db->update('buku', $data, $where);
  }
}
