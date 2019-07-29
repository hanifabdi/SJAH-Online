<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_tambahhotel extends CI_Controller {
	
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('nama_responden','nama_responden','trim|required');
		$this->form_validation->set_rules('nama_hotel','nama_hotel','trim|required|is_unique[hotel.nama_hotel]',[
		'is_unique' => 'Nama hotel sudah digunakan!'

		]);
		$this->form_validation->set_rules('user','user','trim|required|is_unique[hotel.user]',[
		'is_unique' => 'Username sudah digunakan!'

		]);
		$this->form_validation->set_rules('password','password','trim|required');

		if ($this->session->userdata('username')=="admin1" && $this->form_validation->run()== false) 
		{
			$data['konten'] = "admin/tambahhotel";
			$this->load->view('admin/v_homeadmin', $data);
		}	
		else if ($this->session->userdata('username')=="admin1" && $this->form_validation->run()== true)
		{
			$nama_responden = $this->input->post('nama_responden');
			$nama_hotel = $this->input->post('nama_hotel');
			$password = $this->input->post('password');
			$user = $this->input->post('user');
			$foto = 'default.jpg';

			$this->db->set('foto', $foto);		
			$this->db->set('password', $password);
			$this->db->set('user', $user);
			$this->db->set('nama_hotel', $nama_hotel);
			$this->db->set('nama_responden', $nama_responden);
			$this->db->insert('hotel');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Tambahkan! </div>');
			redirect('c_admin_daftarhotel');

		}
	
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menambahkan data! </div>');
			redirect('c_admin_daftarhotel');
		}	

	
		
	}	
    
}
