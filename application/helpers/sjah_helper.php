<?php

 function ceklogin()
 {
 	$ci=get_instance();
 	$pengguna = $ci->session->userdata('username');
 	$admin = $ci->db->get_where('admin', ['username' => $username])->row_array();
 	$hotel = $ci->db->get_where('hotel', ['user' => $username])->row_array();
 	
 	if (!$ci->session->userdata('username')) 
 	{
 		redirect(base_url());
 	}
 	


 }