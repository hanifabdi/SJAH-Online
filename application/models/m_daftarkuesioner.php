<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_daftarkuesioner extends CI_model
{
 
    public function getdata()
    {
        
        $this->db->order_by('file','ASC');
       return $this->db->get('form')->result();
    }
     
    
}