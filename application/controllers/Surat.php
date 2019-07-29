<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('url', 'html', 'form', 'date', 'MY_helper','download'));
        $this->load->model(array('simak_model', 'surat_model'));
    }

    public function download($id_surat){
        $fileinfo = $this->surat_model->download($id_surat);
        $file = 'assets/upload/surat_masuk_umum'.$fileinfo['file'];
        force_download($file, NULL);
    }
 
    public function klas_surat() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/klas_surat/page'));

        //ambil variabel URL
        $go_to = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $kode = addslashes($this->input->post('kode'));
        $divisi = addslashes($this->input->post('divisi'));
        $nama = addslashes($this->input->post('nama'));
        $uraian = addslashes($this->input->post('uraian'));
        $cari = addslashes($this->input->post('q'));

        if ($go_to == "del") {
            $this->surat_model->delete_klasifikasi_surat($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/klas_surat');
        } else if ($go_to == "cari") {
            $data['data'] = $this->surat_model->cari_klas_surat($cari);
            $data['page'] = "surat/list_klas_surat";
        } else if ($go_to == "add") {
            $data['page'] = "surat/form_klas_surat";
        } else if ($go_to == "edit") {
            $data['datpil'] = $this->surat_model->get_data_id($id_url);
            $data['page'] = "surat/form_klas_surat";
        } else if ($go_to == "act_add") {
            $this->surat_model->insert_data_klasifikasi($kode, $divisi, $nama, $uraian);
            $this->session->set_flashdata('message', message_box('Data telah ditambah'));
            redirect('surat/klas_surat');
        } else if ($go_to == "act_edit") {
            $this->surat_model->edit_data_klasifikasi($kode, $divisi, $nama, $uraian, $id_post);
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui'));
            redirect('surat/klas_surat');
        } else {
            $data['data'] = $this->surat_model->get_data_limit($awal, $akhir);
            $data['page'] = "surat/list_klas_surat";
        }
        $data['title'] = "Klasifikasi Surat";
        $this->load->view('simak/header', $data);
    }

    public function surat_masuk() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_masuk();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_masuk/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        $pengirim = addslashes($this->input->post('pengirim'));
        $perihal = addslashes($this->input->post('perihal'));

        //upload config 
        $config['upload_path'] = './assets/upload/surat_masuk_umum';//file yg diupload akan disimpan
		$config['allowed_types']='doc|docx|pdf'; // tipe file yang boleh di upload

		$this->load->library('upload',$config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_masuk($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_masuk');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_masuk_tgl($tglcari);
                $data['page'] = "surat/list_surat_masuk";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_masuk_key($cari);
                $data['page'] = "surat/list_surat_masuk";
            } else {
                $data['data'] = $this->surat_model->cari_surat_masuk_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_masuk";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_masuk";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_masuk_id($id_url);
            $data['page'] = "surat/form_surat_masuk";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_masuk_with_file($no_surat, $tgl_surat, $pengirim, $perihal, $up_data);
            } else {
                $this->surat_model->insert_surat_masuk($no_surat, $tgl_surat, $pengirim, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_masuk');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_masuk_with_file($no_surat, $tgl_surat, $pengirim, $perihal, $up_data);
            } else {
                $this->surat_model->update_surat_masuk_with_file($no_surat, $tgl_surat, $pengirim, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_masuk');
        } else {
            $data['data'] = $this->surat_model->select_surat_masuk_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_masuk";
        }
        $data['title'] = "Surat Masuk";
        $this->load->view('simak/header', $data);
    }

    public function surat_keluar() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_keluar();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_keluar/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        $tujuan = addslashes($this->input->post('tujuan'));
        $perihal = addslashes($this->input->post('perihal'));

        //upload config 
        $config['upload_path'] = './assets/upload/surat_keluar_umum';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_keluar($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_keluar');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_tgl($tglcari);
                $data['page'] = "surat/list_surat_keluar";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_key($cari);
                $data['page'] = "surat/list_surat_keluar";
            } else {
                $data['data'] = $this->surat_model->cari_surat_keluar_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_keluar";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_keluar";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_keluar_id($id_url);
            $data['page'] = "surat/form_surat_keluar";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_keluar_with_file($no_surat, $tgl_surat, $tujuan, $perihal, $up_data);
            } else {
                $this->surat_model->insert_surat_keluar_with_file($no_surat, $tgl_surat, $tujuan, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_keluar');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_keluar_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post);
            } else {
                $this->surat_model->update_surat_keluar($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_keluar');
        } else {
            $data['data'] = $this->surat_model->select_surat_keluar_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_keluar";
        }
        $data['title'] = "Surat keluar";
        $this->load->view('simak/header', $data);
    }

    public function surat_keluar_laporan() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_keluar_laporan();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_keluar_laporan/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        $tujuan = addslashes($this->input->post('tujuan'));
        $perihal = addslashes($this->input->post('perihal'));

        //upload config 
        $config['upload_path'] = './assets/upload/surat_keluar_laporan';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_keluar_laporan($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_keluar_laporan');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_laporan_tgl($tglcari);
                $data['page'] = "surat/list_surat_keluar_laporan";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_laporan_key($cari);
                $data['page'] = "surat/list_surat_keluar_laporan";
            } else {
                $data['data'] = $this->surat_model->cari_surat_keluar_laporan_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_keluar_laporan";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_keluar_laporan";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_keluar_laporan_id($id_url);
            $data['page'] = "surat/form_surat_keluar_laporan";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_keluar_laporan_with_file($no_surat, $tgl_surat, $tujuan, $perihal, $up_data);
            } else {
                $this->surat_model->insert_surat_keluar_with_file($no_surat, $tgl_surat, $tujuan, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_keluar');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_keluar_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post);
            } else {
                $this->surat_model->update_surat_keluar($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_keluar');
        } else {
            $data['data'] = $this->surat_model->select_surat_keluar_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_keluar_laporan";
        }
        $data['title'] = "Surat keluar";
        $this->load->view('simak/header', $data);
    }

    public function surat_tugas() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_tugas();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_tugas/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $yang_diberi_tugas = addslashes($this->input->post('yang_diberi_tugas'));
        $daerah_tugas = addslashes($this->input->post('daerah_tugas'));
        $keterangan = addslashes($this->input->post('keterangan'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));


        //upload config 
        $config['upload_path'] = './assets/upload/surat_tugas';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_tugas($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_tugas');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_tugas_tgl($tglcari);
                $data['page'] = "surat/list_surat_tugas";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_tugas_key($cari);
                $data['page'] = "surat/list_surat_tugas";
            } else {
                $data['data'] = $this->surat_model->cari_surat_tugas_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_tugas";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_tugas";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_tugas_id($id_url);
            $data['page'] = "surat/form_surat_tugas";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_tugas_with_file($no_surat, $tgl_surat, $yang_diberi_tugas, $daerah_tugas, $keterangan, $up_data);
            } else {
                $this->surat_model->insert_surat_tugas($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_tugas');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_tugas_with_file($no_surat, $yang_diberi_tugas, $daerah_tugas, $keterangan, $up_data);
            } else {
                $this->surat_model->update_surat_tugas($no_surat, $yang_diberi_tugas, $daerah_tugas, $keterangan, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_tugas');
        } else {
            $data['data'] = $this->surat_model->select_surat_tugas_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_tugas";
        }
        $data['title'] = "Surat Tugas";
        $this->load->view('simak/header', $data);
    }

    public function surat_tembusan() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_tembusan();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_tembusan/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $pengirim = addslashes($this->input->post('pengirim'));
        $perihal = addslashes($this->input->post('perihal'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        

        //upload config 
        $config['upload_path'] = './assets/upload/surat_tembusan';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_tembusan($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_tembusan');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_tembusan_tgl($tglcari);
                $data['page'] = "surat/list_surat_tembusan";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_tembusan_key($cari);
                $data['page'] = "surat/list_surat_tembusan";
            } else {
                $data['data'] = $this->surat_model->cari_surat_tembusan_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_tembusan";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_tembusan";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_tembusan_id($id_url);
            $data['page'] = "surat/form_surat_tembusan";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_tembusan_with_file($no_surat, $tgl_surat, $pengirim, $perihal, $up_data);
            } else {
                $this->surat_model->insert_surat_tembusan($no_surat, $pengirim, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_tembusan');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_tembusan_with_file($no_surat, $pengirim, $perihal, $up_data);
            } else {
                $this->surat_model->update_surat_tembusan($no_surat, $pengirim, $perihal, $up_data);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_tembusan');
        } else {
            $data['data'] = $this->surat_model->select_surat_tembusan_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_tembusan";
        }
        $data['title'] = "Surat Tembusan";
        $this->load->view('simak/header', $data);
    }

    

    public function get_instansi_lain() {
        $kode = $this->input->post('dari', TRUE);
        $data = $this->surat_model->get_surat_masuk_group($kode);
        $klasifikasi = array();
        foreach ($data as $d) {
            $klasifikasi[] = $d->dari;
        }
        echo json_encode($klasifikasi);
    }

    public function kode_surat() {
        $divisi = $this->input->post('divisi');
        $query = $this->surat_model->get_klasifikasi_divisi($divisi);
        $output = null;
        foreach ($query as $row) {
            $output .= "<option value='" . $row->kode . "'>" . $row->kode . "</option>";
        }
        echo $output;
    }
}
