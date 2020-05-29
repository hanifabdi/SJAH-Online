<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_daftarsurvei extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_daftarsurvei");
        $this->load->library('form_validation');
        $this->load->helper('download');

         if (!$this->session->userdata('username_admin')) 
        {
            redirect('c_login');
        }
        else 
        {
                $hotel = $this->db->get('hotel')->row_array();

            if ($this->session->userdata('username_hotel')==$hotel)
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
            $data['cariberkas'] = $this->input->post('cariberkas');
            $this->session->set_userdata('cariberkas',$data['cariberkas']);
        }
        else
        {
            $data['cariberkas'] = $this->session->userdata('cariberkas');
        }
  
 
        //config

        $this->db->like('bulan',$data['cariberkas']);
        $this->db->or_like('pengirim',$data['cariberkas']);
        $this->db->or_like('asal_hotel',$data['cariberkas']);
        $this->db->or_like('tahun',$data['cariberkas']);
        $this->db->from('berkas');
        $config['base_url']= 'http://localhost/SJAH-Online/c_admin_daftarsurvei/index';
        $config['total_rows']= $this->db->count_all_results();
        $config['per_page']= 4;


        //initialize

         $this->pagination->initialize($config);


		if ($data['admin']) 
		{
            $data["start"] = $this->uri->segment(3);
            $data["data_survei"] = $this->m_daftarsurvei->getdata($config['per_page'], $data['start'], $data['cariberkas']);
            $data['konten'] = "admin/daftarsurvei";
            $this->load->view('admin/v_homeadmin', $data);
        }	
        
        else 
        {
            redirect('c_login');
			
        }

		}
         public function delete($id_berkas) 
        { 
            if ($this->session->userdata('username_admin')=="admin1") 
            {

            $data['berkas'] = $this->db->get_where('berkas',['id_berkas'=>$id_berkas])->row_array();

            $berkas = $data['berkas']['file'];

            unlink(FCPATH . 'assets/berkas/' . $berkas);

            $this->db->where('id_berkas', $id_berkas);
            $this->db->delete('berkas');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil di hapus! </div>');
            redirect('c_admin_daftarsurvei');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Maaf,hanya admin utama yang dapat menghapus data! </div>');
            redirect('c_admin_daftarsurvei');
            }
        }

}

	