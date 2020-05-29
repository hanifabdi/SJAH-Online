<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_user_editprofil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

         if (!$this->session->userdata('username_hotel')) 
        {
            redirect('c_login');
        }
        else 
        {
                $admin = $this->db->get('admin')->row_array();

            if ($this->session->userdata('username_admin')==$admin['username'])
            {
                redirect('c_block');
            }
            
           
        }
    }
 
	
	public function index()
	{
		
		$data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username_hotel')])->row_array();

		$this->form_validation->set_rules('nama_hotel','nama_hotel','trim|required');
		$this->form_validation->set_rules('nama_responden','nama_responden','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('kode','kode','trim|required');

		if ($this->form_validation->run()== false) {

			$data['konten'] = "Pengguna/editprofileuser";
			$this->load->view('Pengguna/v_homehotel', $data);

		}

		else 
		{
			
			$nama_hotel = $this->input->post('nama_hotel');
			$nama_responden = $this->input->post('nama_responden');
			$password = $this->input->post('password');
			$user = $this->input->post('user');
			$kode = $this->input->post('kode');
	

			//cekgambar
			$upload_foto = $_FILES['foto']['name'];

			if ($upload_foto)
			{
				$config['allowed_types'] = 'gif|jpg|png|JPG';
				$config['max_size'] 	 = '5120';
				$config['upload_path'] = './assets/image/profil/';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto'))
				{
					$foto_lama = $data['hotel']['foto'];
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
			$this->db->set('nama_responden', $nama_responden);
			$this->db->set('nama_hotel', $nama_hotel);	
			$this->db->where('user', $user);
			$this->db->update('hotel');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Ubah! </div>');
			redirect('c_user_profiluser');
		}


		
	}	
    
}
