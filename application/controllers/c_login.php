<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_login extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('form_validation','session');
	}
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required', [

			'required' => 'Username Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password','Password','trim|required', [

			'required' => 'Password Tidak Boleh Kosong!'
		]);

		if ($this->form_validation->run() == false){
		$this->load->view('v_login');
	} else{
		$this-> _login();
	}

}
	
	private function _login() 
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
		$user = $this->db->get_where('pengguna', ['username' => $username])->row_array();

		if ($admin)
		{
			if ($password == $admin['password'])
			{
				$data = [
					'username' => 'admin',['username']
				];
				$this->session->set_userdata($data);
				redirect('c_homeadmin');
			}
			else 
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Password Salah! </div>');
			redirect(base_url());
			}
		}

		else if ($user)
		{
			if ($password == $user['password'])
			{
				$data = [
					'username' => 'pengguna',['username']
				];
				$this->session->set_userdata($data);
				$this->load->view('Pengguna/v_beranda');
			}
			else 
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Password Salah! </div>');
			redirect(base_url());
			}
		}

		
		else 
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Akun tidak terdaftar! </div>');
			redirect(base_url());
		}
	}

	public function logout () 
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Logout berhasil! </div>');
			redirect(base_url());
	}
}