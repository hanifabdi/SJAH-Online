<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_homeuser extends CI_Controller {
	public function index()
	{
		$this->load->view('Pengguna/v_beranda');
	}
}