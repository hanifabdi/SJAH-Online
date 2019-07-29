<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeadmin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_dashboard");
    }
	public function index()
	{
		
		$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
		

		if ($data['admin']) 
		{
			$data['total_hotel']= $this->m_dashboard->hitunghotel();
			$data['total_pengguna']= $this->m_dashboard->hitungpengguna();
			$data['konten'] = "admin/isidashboard";
			$this->load->view('admin/v_homeadmin', $data);
		}		
		
	}

	
    
}
