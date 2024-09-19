<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('auth/login');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $user = $this->db->get_where('user', ['username' => $username])->row();

    if ($user) {
      if ($password == $user->password) {
        $data = [
          'id_user'   => $user->id_user,
          'username'  => $user->username,
          'nama'      => $user->nama,
          'email'     => $user->email,
          'role'      => $user->role,
        ];
        $this->session->set_userdata($data);
        $this->session->set_flashdata('berhasil', 'Selamat Datang');
        redirect('');
      } else {
        $this->session->set_flashdata('gagal', 'Password Salah');
        redirect($_SERVER['HTTP_REFERER']);
      }
    } else {
      $this->session->set_flashdata('gagal', 'Username tidak ditemukan');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function register()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('auth/register');
    } else {
      $this->_simpanRegis();
    }
  }

  private function _simpanRegis()
  {
    $cek_username = $this->db->where('username', $this->input->post('username'))->count_all_results('user');
    if ($cek_username != null) {
      $this->session->set_flashdata('gagal', 'Username telah digunakan');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $data = [
        'username'  => $this->input->post('username'),
        'password'  => md5($this->input->post('password')),
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
        'alamat'    => $this->input->post('alamat'),
        'role'      => 'Peminjam',
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('berhasil', 'Yeyyeyeyeyceyce!!!');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('berhasil', 'Anda Berhasil logout!!!');
    redirect('auth');
  }

  public function my404()
  {
    // Set status header to 404
    $this->output->set_status_header('404');

    // Load custom 404 view
    $this->load->view('auth/my404');
  }
}
