<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      'title' => 'Contact',
    ];
    $this->template->load('template/template_public', 'public/contact', $data);
  }
}
