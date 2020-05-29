<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_tambahkuesioner extends CI_Controller {
public function __construct()
    {
        parent::__construct();

         if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
        
    }
 		
	
	
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();
		
		$this->form_validation->set_rules('jumhari','jumhari','trim|required');

		if ($data['admin'] && $this->form_validation->run()== false) {

			$data['konten'] = "admin/uploadform";
			$this->load->view('admin/v_homeadmin', $data);

		}

		else if ($data['admin'] && $this->form_validation->run()== true) 
		{
			$jumhari = $this->input->post('jumhari');

			$this->db->where('jumhari',$jumhari);
			$cek = $this->db->get('form')->result();
			
			//jika user upload lebih dari 1 kali
			
			if ($cek) 
			{

				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Anda tidak dapat mengupload data yang sama! </div>');
			redirect('c_admin_daftarkuesioner');
			}

			// jika user belum pernah upload

			else 
			{
				$jumhari = $this->input->post('jumhari');

			if ($jumhari=='28' || $jumhari=='29' || $jumhari=='30' || $jumhari=='31')
			{
			
			$jumhari = $this->input->post('jumhari');
			

			//cekgambar
			$upload_file = $_FILES['file']['name'];

			if ($upload_file)
			{
				$config['allowed_types'] = 'xlsx|xls';
				$config['max_size'] 	 = '2048';
				$config['upload_path'] = './assets/berkas/admin/';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('file'))
				{

					$file_baru = $this->upload->data('file_name');
					$this->db->set('file', $file_baru);

				} else 
				{
					echo $this->upload->display_errors();
				}

			} 

			$this->db->set('jumhari', $jumhari);
			$this->db->insert('form');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> File berhasil diupload! </div>');
			redirect('c_admin_daftarkuesioner');
		}
		else 
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Jumlah hari tidak sesuai! </div>');
			redirect('c_admin_daftarkuesioner');
		}

		}
	}

	else {
		redirect('c_block');
		
	}	
	}
}