<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftarhotel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftarhotel");
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
            $data['carihotel'] = $this->input->post('carihotel');
            $this->session->set_userdata('carihotel',$data['carihotel']);
        }
        else
        {
            $data['carihotel'] = $this->session->userdata('carihotel');
        }


        //config

        $this->db->like('nama_responden',$data['carihotel']);
        $this->db->or_like('nama_hotel',$data['carihotel']);
        $this->db->from('hotel');
        $config['base_url']= 'http://localhost/SJAH-Online/c_admin_daftarhotel/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['admin'] && $this->form_validation->run()== false) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_hotel"] = $this->m_daftarhotel->getdata($config['per_page'], $data['start'], $data['carihotel']);
            $data['konten'] = "admin/daftarhotel";
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

        public function delete($user) 
        {
            if ($this->session->userdata('username_admin')=="admin1") 
            {
            $this->db->where('user', $user);
            $this->db->delete('hotel');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftarhotel');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menghapus data! </div>');
            redirect('c_admin_daftarhotel');
            }
        }
         public function edit($username) 
        {
            if ($this->session->userdata('username_admin')=="admin1") 
            {
            $this->db->where('username', $username);
            $this->db->update('admin');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftarhotel');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menghapus data! </div>');
            redirect('c_admin_daftarhotel');
            }
        }
}

	