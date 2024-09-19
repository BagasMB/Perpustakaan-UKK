<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username') == null) {
      redirect('auth');
    } elseif ($this->session->userdata('role') == 'Peminjam') {
      redirect(404);
    }
  }

  public function index()
  {
    $data = [
      'title' => 'Kategori',
      'kategori' => $this->db->get('kategori')->result_array(),
    ];

    $this->template->load('template/layout', 'kategori', $data);
  }

  public function simpan()
  {
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

    // Mengecek username sudah di pakai apa belum
    $cek_nama_kategori = $this->db->where('nama_kategori', $this->input->post('nama_kategori'))->count_all_results('kategori');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Belum di isi semua');
    } elseif ($cek_nama_kategori != null) {
      $this->session->set_flashdata('gagal', 'Nama Kategori telah digunakan');
    } else {
      $data = ['nama_kategori' => $this->input->post('nama_kategori')];
      $this->db->insert('kategori', $data);
      $this->session->set_flashdata('berhasil', 'Yeyyeyeyeyceyce!!!');
    }
    redirect('kategori');
  }

  public function edit()
  {
    $data = ['nama_kategori' => $this->input->post('nama_kategori')];
    $where = ['id_kategori' => $this->input->post('id_kategori')];
    $this->db->update('kategori', $data, $where);
    $this->session->set_flashdata('berhasil', 'Gemgeeekang Gacorr!!!!');
    redirect('kategori');
  }

  public function hapus($id)
  {
    $where = ['id_kategori' => $id];
    $this->db->delete('kategori', $where);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!!!!');
    redirect('kategori');
  }
}
