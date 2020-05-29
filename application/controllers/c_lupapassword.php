<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_lupapassword extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

          if ($this->session->userdata('username_admin')) 
        {
            redirect('c_homeadmin');
        }
        if ($this->session->userdata('username_hotel')) 
        {
            redirect('c_homeuser');
        }
    
    }
 
	public function index()
	{
		$this->form_validation->set_rules('kode','Kode','trim|required', [

			'required' => 'Kode Tidak Boleh Kosong!'
		]);

		$this->form_validation->set_rules('username','Username','trim|required', [

			'required' => 'Username Tidak Boleh Kosong!'
		]);

		$this->form_validation->set_rules('password','Password','trim|required', [

			'required' => 'Password Tidak Boleh Kosong!'
		]);

		if ($this->form_validation->run() == false) {
		$this->load->view('v_lupapassword');
		}

		else 
		{
			$kode = $this->input->post('kode');
			$kadmin = $this->db->get_where('admin',['kode'=>$kode])->row_array();
			$kuser = $this->db->get_where('hotel',['kode'=>$kode])->row_array();
			
			if ($kadmin)
			{	
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->db->set('password',$password);
				$this->db->where('username',$username);
				$this->db->update('admin');

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Atur ulang password berhasil! </div>');
			redirect(base_url());

			}
			else if ($kuser)
			{	
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->db->set('password',$password);
				$this->db->where('user',$username);
				$this->db->update('hotel');

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Atur ulang password berhasil! </div>');
			redirect(base_url());

			}

			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Akun Tidak Terdaftar! </div>');
			redirect(base_url('c_lupapassword'));
			}
		}
	}
 
}
