<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftarhotel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftarhotel");
        $this->load->library('form_validation');
    }
 
    public function index(){


    	$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();

        //Pagination
        $this->load->library('pagination');

        //fitur searching

        if ($this->input->post('submit')) 
        {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari',$data['cari']);
        }
        else
        {
            $data['cari'] = $this->session->userdata('cari');
        }


        //config

        $this->db->like('nama_responden',$data['cari']);
        $this->db->or_like('nama_hotel',$data['cari']);
        $this->db->from('hotel');
        $config['base_url']= 'http://localhost/SJAH-Online/c_admin_daftarhotel/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['admin'] && $this->form_validation->run()== false) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_hotel"] = $this->m_daftarhotel->getdata($config['per_page'], $data['start'], $data['cari']);
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
            if ($this->session->userdata('username')=="admin1") 
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
            if ($this->session->userdata('username')=="admin1") 
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

	