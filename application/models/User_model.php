<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function simpan()
  {
    $data = [
      'username'  => $this->input->post('username'),
      'password'  => md5($this->input->post('password')),
      'nama'      => $this->input->post('nama'),
      'email'     => $this->input->post('email'),
      'alamat'    => $this->input->post('alamat'),
      'role'      => $this->input->post('role'),
    ];
    $this->db->insert('user', $data);
  }

  public function edit()
  {
    $data = [
      'username'  => $this->input->post('username'),
      'nama'      => $this->input->post('nama'),
      'email'     => $this->input->post('email'),
      'alamat'    => $this->input->post('alamat'),
      'role'      => $this->input->post('role'),
    ];
    $where = ['id_user' => $this->input->post('id_user')];
    $this->db->update('user', $data, $where);
  }
}
