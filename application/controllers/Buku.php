<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username') == null) {
      redirect('auth');
    }
    $this->load->model('Buku_model');
  }

  public function index()
  {
    $data = [
      'title' => 'Buku',
      'buku' => $this->db->join('kategori', 'kategori.id_kategori=buku.id_kategori')->get('buku')->result_array(),
      'kategori' => $this->db->get('kategori')->result(),
    ];

    $this->template->load('template/layout', 'buku', $data);
  }

  public function simpan()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
    $this->form_validation->set_rules('penulis', 'penulis', 'trim|required');
    $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
    $this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'trim|required');
    $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

    // Mengecek judul sudah di pakai apa belum
    $cek_judul = $this->db->where('judul', $this->input->post('judul'))->count_all_results('buku');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Belum di isi semua');
    } elseif ($cek_judul != null) {
      $this->session->set_flashdata('gagal', 'Judul telah digunakan');
    } else {
      $this->Buku_model->simpan();
      $this->session->set_flashdata('berhasil', 'Yeyyeyeyeyceyce!!!');
    }
    redirect('buku');
  }

  public function edit()
  {
    $this->Buku_model->edit();
    $this->session->set_flashdata('berhasil', 'Gemgeeekang Gacorr!!!!');
    redirect('buku');
  }

  public function hapus($id)
  {
    $where = ['id_buku' => $id];
    $this->db->delete('buku', $where);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!!!!');
    redirect('buku');
  }
}
