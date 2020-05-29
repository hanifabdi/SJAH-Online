<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_admin_profiladmin extends CI_Controller {

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
		

		if ($data['admin']) 
		{
			
			$data['konten'] = "admin/profiladmin";
			$this->load->view('admin/v_homeadmin', $data);
		}	
		else {
			redirect('c_block');
		}	
		
	}

	
    
}