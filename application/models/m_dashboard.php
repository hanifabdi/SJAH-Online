<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard extends CI_model{

	 public function hitunghotel()
    {
        return $this->db->get('hotel')->num_rows();
        
    }

    	public function hitungpengguna()
    {
        $jum_hotel= $this->db->get('hotel')->num_rows();
        $jum_admin= $this->db->get('admin')->num_rows();

        $jum_pengguna = $jum_admin+$jum_hotel;

        return $jum_pengguna;
        
    }
}
