<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeadmin extends CI_Controller {
	public function index()
	{
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
		$this->load->view('admin/v_homeadmin', $data);
	}
}