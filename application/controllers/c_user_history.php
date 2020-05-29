<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_history extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_history");
        $this->load->library('form_validation');

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
 
    public function index(){


    	$data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username_hotel')])->row_array();

        //Pagination
        $this->load->library('pagination');
 
        //config

        $config['base_url']= 'http://localhost/SJAH-Online/c_user_history/index';
        $config['total_rows']= $this->m_history->countAlluser();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);
 

		if ($data['hotel']) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_history"] = $this->m_history->getdata($config['per_page'], $data['start']);
            $data['konten'] = "Pengguna/history";
            $this->load->view('Pengguna/v_homehotel', $data);
        }	
        
        else 
        {
            redirect('c_login');
			
        }

		}

         public function delete($id_berkas) 
        {

           $data['berkas'] = $this->db->get_where('berkas',['id_berkas'=>$id_berkas])->row_array();

           $berkas = $data['berkas']['file'];

            unlink(FCPATH . 'assets/berkas/' . $berkas);

            $this->db->where('id_berkas', $id_berkas);
            $this->db->delete('berkas');

 
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_user_history');
           
        }
        
}

	