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
    $data = [
      'title' => 'Homepage',
    ];

    $this->template->load('template/template_public', 'public/homepage', $data);
  }
}
