<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftarsurvei extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftarsurvei");
        $this->load->library('form_validation');
    }
 
    public function index(){


    	$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();

        //Pagination
        $this->load->library('pagination');

        //fitur searching

        if ($this->input->post('submit')) 
        {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari',$data['cari']);
        }
        else
        {
            $data['cari'] = $this->session->userdata('cari');
        }

 
        //config

        $this->db->like('bulan',$data['cari']);
        $this->db->or_like('pengirim',$data['cari']);
        $this->db->or_like('asal_hotel',$data['cari']);
        $this->db->from('berkas');
        $config['base_url']= 'http://localhost/SJAH-Online/c_admin_daftarsurvei/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['admin']) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_survei"] = $this->m_daftarsurvei->getdata($config['per_page'], $data['start'], $data['cari']);
            $data['konten'] = "admin/daftarsurvei";
            $this->load->view('admin/v_homeadmin', $data);
        }	
        
        else 
        {
            redirect('c_login');
			
        }

		}

}

	