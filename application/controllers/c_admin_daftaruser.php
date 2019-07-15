<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftaruser extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftaruser");
        $this->load->library('form_validation');
    }
 
    public function index(){

    	$data['admin'] = $this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();

		if ($data['admin']) 
		{
			$data["pengguna"] = $this->m_daftaruser->getAll();
            $data['konten'] = "admin/daftaruser";
            $this->load->view('admin/v_homeadmin', $data);
        }	
			
		}

        public function add()
    {
        $pengguna = $this->m_pengguna;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/tambahuser");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/v_homeadmin');
       
        $pengguna = $this->m_pengguna;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pengguna"] = $pengguna->getById($id);
        if (!$data["pengguna"]) show_404();
        
        $this->load->view("admin/product/edituser", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_pengguna->delete($id)) {
            redirect(site_url('admin/v_homeadmin'));
        }
    }
}

	