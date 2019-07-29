<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftarsurvei extends CI_model
{
	
    public function getAll()
    {
        return $this->db->get('berkas')->result();

    }
    
 
    public function getdata($limit , $start , $cari = null)
    {
        if($cari)
        {
             $this->db->like('bulan',$cari);
             $this->db->or_like('pengirim',$cari);
             $this->db->or_like('asal_hotel',$cari);
             
        }
       return $this->db->get('berkas',$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('berkas')->num_rows();
        
    }
    
}