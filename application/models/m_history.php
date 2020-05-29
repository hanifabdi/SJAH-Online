<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_history extends CI_model
{ 
	
    public function getAll()
    {
        return $this->db->get('berkas')->result();

    }
    
   
    public function getdata($limit , $start)
    {
        $data['hotel'] = $this->db->get_where('hotel',['user'=>$this->session->userdata('username')])->row_array();
        $asal_hotel = $data['hotel']['nama_hotel'];
        $tahun = date('Y');
        
        $this->db->order_by('bulan','DESC');
       return $this->db->get_where('berkas',$asal_hotel,$tahun,$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('berkas')->num_rows();
        
    }
    
}