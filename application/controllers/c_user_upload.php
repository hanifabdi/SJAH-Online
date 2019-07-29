<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_user_upload extends CI_Controller {
	
	public function index()
	{
		
		$data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username')])->row_array();
		$data['berkas'] = $this->db->get('berkas')->row_array();

		if ($data['hotel'] && $this->form_validation->run()== false) {

			$data['konten'] = "Pengguna/uploadberkas";
			$this->load->view('Pengguna/v_homehotel', $data);

		}

		else 
		{
			
			$tahun = $this->input->post('nama_admin');
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');
			$username = $this->input->post('username');
			$jabatan = $this->input->post('jabatan');

			//cekgambar
			$upload_foto = $_FILES['foto']['name'];

			if ($upload_foto)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] 	 = '2048';
				$config['upload_path'] = './assets/image/';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto'))
				{
					$foto_lama = $data['admin']['foto'];
					if($foto_lama != 'default.jpg')
					{
						unlink(FCPATH . 'assets/image/' . $foto_lama);
					}


					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);

				} else 
				{
					echo $this->upload->display_errors();
				}

			}
			
			$this->db->set('password', $password);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('nama_admin', $nama_admin);
			$this->db->set('nip', $nip);
			$this->db->where('username', $username);
			$this->db->update('admin');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di Ubah! </div>');
			redirect('c_user_history');
		}


		
	}	
    
}
