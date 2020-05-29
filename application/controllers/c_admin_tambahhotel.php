<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_tambahhotel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
         if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
        else 
        {
                

            $admin1 = $this->session->userdata('username_admin')=='admin1';
            if (!$admin1)
            {
                redirect('c_block');
            }
            
           
        }
    }
	
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();
		
		$this->form_validation->set_rules('nama_responden','nama_responden','trim|required');
		$this->form_validation->set_rules('nama_hotel','nama_hotel','trim|required|is_unique[hotel.nama_hotel]',[
		'is_unique' => 'Nama hotel sudah digunakan!'

		]);
		$this->form_validation->set_rules('user','user','trim|required|is_unique[hotel.user]',[
		'is_unique' => 'Username sudah digunakan!'

		]);
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('kode','kode','trim|required');

		if ($this->form_validation->run()== false) 
		{
			$data['konten'] = "admin/tambahhotel";
			$this->load->view('admin/v_homeadmin', $data);
		}	
		else 
		{
			$nama_responden = $this->input->post('nama_responden');
			$nama_hotel = $this->input->post('nama_hotel');
			$password = $this->input->post('password');
			$user = $this->input->post('user');
			$foto = 'default.jpg';
			$kode = $this->input->post('kode');

			$this->db->set('kode', $kode);
			$this->db->set('foto', $foto);		
			$this->db->set('password', $password);
			$this->db->set('user', $user);
			$this->db->set('nama_hotel', $nama_hotel);
			$this->db->set('nama_responden', $nama_responden);
			$this->db->insert('hotel');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Tambahkan! </div>');
			redirect('c_admin_daftarhotel');

		}
		
	}	
    
}
