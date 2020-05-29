<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftarkuesioner extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftarkuesioner");
        $this->load->library('form_validation');

         if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
       
    }
 
    public function index(){


    	$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();


		if ($data['admin']) 
		{
            $data["data_kuesioner"] = $this->m_daftarkuesioner->getdata();
            $data['konten'] = "admin/daftarkuesioner";
            $this->load->view('admin/v_homeadmin', $data);
        }

        else 
        {
            redirect('c_block');
        }	
        

		}
         public function delete($id_form) 
        { 
           
            $data['form'] = $this->db->get_where('form',['id_form'=>$id_form])->row_array();

            $form = $data['form']['file'];

            unlink(FCPATH . 'assets/berkas/admin/' . $form);

            $this->db->where('id_form', $id_form);
            $this->db->delete('form');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftarkuesioner');
            }

}

	