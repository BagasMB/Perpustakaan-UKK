<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Ulasan
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Ulasan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
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