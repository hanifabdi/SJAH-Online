<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeuser extends CI_Controller {

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
		

		if ($data['hotel']) 
		{
			
			$data['konten'] = "Pengguna/isiberanda";
			$this->load->view('Pengguna/v_homehotel', $data);
		}		
		
	}

	
    
}
