<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeuser extends CI_Controller {
	
	public function index()
	{
		
		$data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username')])->row_array();
		

		if ($data['hotel']) 
		{
			
			$data['konten'] = "Pengguna/isiberanda";
			$this->load->view('Pengguna/v_homehotel', $data);
		}		
		
	}

	
    
}
