<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_history extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_history");
        $this->load->library('form_validation');
    }
 
    public function index(){


    	$data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username')])->row_array();

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
        $this->db->or_like('tahun',$data['cari']);
        $this->db->from('berkas');
        $config['base_url']= 'http://localhost/SJAH-Online/c_user_history/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['hotel']) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_history"] = $this->m_history->getdata($config['per_page'], $data['start'], $data['cari']);
            $data['konten'] = "Pengguna/history";
            $this->load->view('Pengguna/v_homehotel', $data);
        }	
        
        else 
        {
            redirect('c_login');
			
        }

		}

}

	