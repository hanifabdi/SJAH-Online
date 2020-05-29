<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftaradmin extends CI_model
{
	
    public function getAll()
    {
        return $this->db->get('admin')->result();
        

    }
    
 
    public function getdata($limit , $start , $cariadmin = null)
    {
        if($cariadmin)
        {
            $this->db->like('nama_admin',$cariadmin);
             $this->db->or_like('nip',$cariadmin);
        }
       $this->db->order_by('username','ASC');
       return $this->db->get('admin',$limit,$start)->result();
    }
     public function countAlluser()
    {
        return $this->db->get('admin')->num_rows();
        
    }
    
}