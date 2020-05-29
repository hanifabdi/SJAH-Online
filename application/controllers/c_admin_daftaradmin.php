<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftaradmin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftaradmin");
        $this->load->library('form_validation');

        if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
        else 
        {
            $admin1 = $this->session->userdata('username_admin')=='admin1';
            if (!$admin1)
            {
                redirect('c_block');
            }
            
           
        }
    }
 
    public function index(){


    	$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username_admin')])->row_array();

        //Pagination
        $this->load->library('pagination');

        //fitur searching

        if ($this->input->post('submit')) 
        {
            $data['cariadmin'] = $this->input->post('cariadmin');
            $this->session->set_userdata('cariadmin',$data['cariadmin']);
        }
        else
        {
            $data['cariadmin'] = $this->session->userdata('cariadmin');
        }


        //config

        $this->db->like('nama_admin',$data['cariadmin']);
        $this->db->or_like('nip',$data['cariadmin']);
        $this->db->from('admin');
        $config['base_url']= 'http://localhost/SJAH-Online/c_admin_daftaradmin/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['admin'] && $this->form_validation->run()== false) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_admin"] = $this->m_daftaradmin->getdata($config['per_page'], $data['start'], $data['cariadmin']);
            $data['konten'] = "admin/daftaradmin";
            $this->load->view('admin/v_homeadmin', $data);
        }	
        else if ($data['admin'] && $this->form_validation->run()== true) 
        {
            $this-> delete();
        }
        else 
        {
            redirect('c_login');
			
        }

		}

        public function delete($username) 
        {
            if ($this->session->userdata('username_admin')=="admin1") 
            {
            $this->db->where('username', $username);
            $this->db->delete('admin');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftaradmin');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menghapus data! </div>');
            redirect('c_admin_daftaradmin');
            }
        }
         public function edit($username) 
        {
            if ($this->session->userdata('username_admin')=="admin1") 
            {
            $this->db->where('username', $username);
            $this->db->update('admin');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftaradmin');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menghapus data! </div>');
            redirect('c_admin_daftaradmin');
            }
        }
}

	