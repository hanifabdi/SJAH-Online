<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftarsurvei extends CI_model
{
	
    public function getAll()
    {
        return $this->db->get('berkas')->result();

    }
    
 
    public function getdata($limit , $start , $cariberkas = null)
    {
        if($cariberkas)
        {
             $this->db->like('bulan',$cariberkas);
             $this->db->or_like('pengirim',$cariberkas);
             $this->db->or_like('asal_hotel',$cariberkas);
             $this->db->or_like('tahun',$cariberkas);
             
        }
        
        $this->db->order_by('tahun','DESC');
        $this->db->order_by('bulan','DESC');
       return $this->db->get('berkas',$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('berkas')->num_rows();
        
    }
    
}