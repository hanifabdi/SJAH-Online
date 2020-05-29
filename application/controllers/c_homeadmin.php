<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeadmin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_dashboard");

         if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
       
    }
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();
		

		if ($data['admin']) 
		{
			$data['total_berkas']= $this->m_dashboard->hitungberkas();
			$data['total_bulan']= $this->m_dashboard->hitungbulansebelumnya();
			$data['total_hotel']= $this->m_dashboard->hitunghotel();
			$data['total_pengguna']= $this->m_dashboard->hitungpengguna();
			$data['konten'] = "admin/isidashboard";
			$this->load->view('admin/v_homeadmin', $data);
		}	

		else 
		{
			redirect('c_block');
		}	
		
	}

	
    
}
