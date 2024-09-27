<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username') == null) {
      redirect('auth');
    } elseif ($this->session->userdata('role') != 'Admin') {
      redirect(404);
    }
    $this->load->model('User_model');
  }

  public function index()
  {
    $data = [
      'title' => 'User',
      'user' => $this->db->get('user')->result_array(),
    ];

    $this->template->load('template/layout', 'admin/user', $data);
  }

  public function simpan()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

    // Mengecek username sudah di pakai apa belum
    $cek_username = $this->db->where('username', $this->input->post('username'))->count_all_results('user');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Belum di isi semua');
    } elseif ($cek_username != null) {
      $this->session->set_flashdata('gagal', 'Username telah digunakan');
    } else {
      $this->User_model->simpan();
      $this->session->set_flashdata('berhasil', 'Yeyyeyeyeyceyce!!!');
    }
    redirect('user');
  }

  public function edit()
  {
    $this->User_model->edit();
    $this->session->set_flashdata('berhasil', 'Gemgeeekang Gacorr!!!!');
    redirect('user');
  }

  public function reset($id)
  {
    $data = ['password'  => md5(1234)];
    $where = ['id_user' => $id];
    $this->db->update('user', $data, $where);
    $this->session->set_flashdata('berhasil', 'Password berhasil di ubah  !!!!');
    redirect('user');
  }

  public function hapus($id)
  {
    $where = ['id_user' => $id];
    $this->db->delete('user', $where);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!!!!');
    redirect('user');
  }
}
