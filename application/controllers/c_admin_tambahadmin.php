<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_tambahadmin extends CI_Controller {
	
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('nip','nip','trim|required|is_unique[admin.nip]',[
		'is_unique' => 'NIP sudah digunakan!'

		]);
		$this->form_validation->set_rules('nama_admin','nama_admin','trim|required');
		$this->form_validation->set_rules('jabatan','jabatan','trim|required');
		$this->form_validation->set_rules('username','username','trim|required|is_unique[admin.username]',[
		'is_unique' => 'Username sudah digunakan!'

		]);
		$this->form_validation->set_rules('password','password','trim|required');

		if ($this->session->userdata('username')=="admin1" && $this->form_validation->run()== false) 
		{
			$data['konten'] = "admin/tambahadmin";
			$this->load->view('admin/v_homeadmin', $data);
		}	
		else if ($this->session->userdata('username')=="admin1" && $this->form_validation->run()== true)
		{
			$nama_admin = $this->input->post('nama_admin');
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');
			$username = $this->input->post('username');
			$jabatan = $this->input->post('jabatan');
			$foto = 'default.jpg';

			$this->db->set('foto', $foto);		
			$this->db->set('password', $password);
			$this->db->set('username', $username);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('nama_admin', $nama_admin);
			$this->db->set('nip', $nip);
			$this->db->insert('admin');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Tambahkan! </div>');
			redirect('c_admin_daftaradmin');

		}
	
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menambahkan data! </div>');
			redirect('c_admin_daftaradmin');
		}	

	
		
	}	
    
}
