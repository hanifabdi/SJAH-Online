<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftaradmin extends CI_model
{
	
    public function getAll()
    {
        return $this->db->get('admin')->result();

    }
    
 
    public function getdata($limit , $start , $cari = null)
    {
        if($cari)
        {
            $this->db->like('nama_admin',$cari);
             $this->db->or_like('nip',$cari);
        }
       $this->db->order_by('username','ASC');
       return $this->db->get('admin',$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('admin')->num_rows();
        
    }
    
}