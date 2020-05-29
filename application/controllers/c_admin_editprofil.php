<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_editprofil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		 if ($this->session->userdata('cari'))
        {
            unset($_SESSION['cari']);
        }


		if (!$this->session->userdata('username_admin')) 
		{
			redirect('c_login');
		}
		
	}
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();

		$this->form_validation->set_rules('nama_admin','nama_admin','trim|required');
		$this->form_validation->set_rules('nip','nip','trim|required');
		$this->form_validation->set_rules('jabatan','jabatan','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('kode','kode','trim|required');

		if ($data['admin'] && $this->form_validation->run()== false) {

			$data['konten'] = "admin/editprofil";
			$this->load->view('admin/v_homeadmin', $data);

		}

		else if ($data['admin'] && $this->form_validation->run()== true)
		{
			
			$nama_admin = $this->input->post('nama_admin');
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');
			$username = $this->input->post('username');
			$jabatan = $this->input->post('jabatan');
			$kode = $this->input->post('kode');

			//cekgambar
			$upload_foto = $_FILES['foto']['name'];

			if ($upload_foto)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] 	 = '5120';
				$config['upload_path'] = './assets/image/profil/';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto'))
				{
					$foto_lama = $data['admin']['foto'];
					if($foto_lama != 'default.jpg')
					{
						unlink(FCPATH . 'assets/image/profil/' . $foto_lama);
					}


					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);

				} else 
				{
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set('kode', $kode);
			$this->db->set('password', $password);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('nama_admin', $nama_admin);
			$this->db->set('nip', $nip);
			$this->db->where('username', $username);
			$this->db->update('admin');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Ubah! </div>');
			redirect('c_admin_profiladmin');
		}

		else 
		{
			redirect('c_block');
		}
		
	}	
    
}
