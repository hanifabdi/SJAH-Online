<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftarhotel extends CI_model
{
	
    public function getAll()
    {
        return $this->db->get('hotel')->result();

    }
    
 
    public function getdata($limit , $start , $cari = null)
    {
        if($cari)
        {
            $this->db->like('nama_responden',$cari);
             $this->db->or_like('nama_hotel',$cari);
        }
       $this->db->order_by('user','ASC');
       return $this->db->get('hotel',$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('hotel')->num_rows();
        
    }
    
}