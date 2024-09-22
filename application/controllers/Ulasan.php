<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan extends CI_Controller
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
    // 
  }

  public function ulas()
  {
    $data = [
      'rating' => $this->input->post('rating'),
      'ulasan' => $this->input->post('ulasan'),
    ];
    $where = ['id_ulasan' => $this->input->post('id_ulasan')];
    $this->db->update('ulasan', $data, $where);
    $this->session->set_flashdata('berhasil', 'Terimakasih atas saran dan ulasan anda');
    redirect($_SERVER['HTTP_REFERER']);
  }
}


/* End of file Ulasan.php */
/* Location: ./application/controllers/Ulasan.php */