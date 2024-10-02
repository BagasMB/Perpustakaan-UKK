<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfig extends CI_Controller
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
      'title' => 'Konfigurasi Aplikasi',
      'konfig' => $this->db->get('konfig')->row()
    ];

    $this->template->load('template/layout', 'admin/konfig', $data);
  }

  public function update()
  {
    $data = [
      'nama_cv' => $this->input->post('nama_cv'),
      'email' => $this->input->post('email'),
      'alamat' => $this->input->post('alamat'),
      'no' => $this->input->post('no'),
    ];
    $where = ['id_konfig' => $this->input->post('id_konfig')];
    $this->db->update('konfig', $data, $where);
    $this->session->set_flashdata('berhasil', 'Gemgeekang Gacorr!!!');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
