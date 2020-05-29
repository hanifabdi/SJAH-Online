<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_user_upload extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('download');	

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

		$this->form_validation->set_rules('tahun','tahun','trim|required');
		$this->form_validation->set_rules('bulan','bulan','trim|required');
		$this->form_validation->set_rules('pengirim','pengirim','trim|required');
		$this->form_validation->set_rules('asal_hotel','asal_hotel','trim|required');
		

		if ($data['hotel'] && $this->form_validation->run()== false) {

			$data['konten'] = "Pengguna/uploadberkas";
			$this->load->view('Pengguna/v_homehotel', $data);

		}

		else if ($data['hotel'] && $this->form_validation->run()== true) 
		{
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$pengirim = $this->input->post('pengirim');
			$asal_hotel = $this->input->post('asal_hotel');

			$this->db->where('asal_hotel',$asal_hotel);
			$this->db->where('pengirim',$pengirim);
			$this->db->where('bulan',$bulan);
			$this->db->where('tahun',$tahun);
			$cek = $this->db->get('berkas')->result();

			//jika user upload lebih dari 1 kali
			
			if ($cek) 
			{

				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Anda tidak dapat mengupload data yang sama! </div>');
			redirect('c_user_history');
			}

			// jika user belum pernah upload

			else 
			{
			
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$pengirim = $this->input->post('pengirim');
			$asal_hotel = $this->input->post('asal_hotel');
			

			//cekgambar
			$upload_file = $_FILES['file']['name'];

			if ($upload_file)
			{
				$config['allowed_types'] = 'xlsx|xls';
				$config['max_size'] 	 = '2048';
				$config['upload_path'] = './assets/berkas/';
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

			$this->db->set('tahun', $tahun);
			$this->db->set('bulan', $bulan);
			$this->db->set('pengirim', $pengirim);
			$this->db->set('asal_hotel', $asal_hotel);
			$this->db->insert('berkas');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> File berhasil diupload! </div>');
			redirect('c_user_history');
		}
	}

		
	}	

	public function lakukan_download()
	{	
	$tahun = date('Y');
	$bulan = date('m')-1;
	$jumhari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

	
	if ($jumhari == '28')
	{
		force_download('assets/berkas/admin/VHTS_(28).XLSX',NULL);
	}

	else if ($jumhari == '29')
	{
		force_download('assets/berkas/admin/VHTS_(29).XLSX',NULL);
	}

	else if ($jumhari == '30')
	{
		force_download('assets/berkas/admin/VHTS_(30).XLSX',NULL);
	}

	else if ($jumhari == '31' )	
	{
		force_download('assets/berkas/admin/VHTS_(31).xlsx',NULL);
	}

	}
		
    
}
