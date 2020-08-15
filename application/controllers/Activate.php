<?php
class Activate extends CI_Controller{
	public function index($username, $activationNumber){
		$this->db->query("update users set status='activated' where username='$username' and activate='$activationNumber'");
		$this->load->view('registration');
	}
}
