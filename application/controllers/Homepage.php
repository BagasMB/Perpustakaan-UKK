<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->model('Buku_model');
    $data = [
      'title' => 'Homepage',
      'buku' => $this->Buku_model->getBukuLimit(),
    ];

    $this->template->load('template/template_public', 'public/homepage', $data);
  }
  
  public function profile()
  {
    $data = [
      'title' => 'My Profile',
    ];
    $this->template->load('template/template_public', 'public/myprofile', $data);
  }
}
