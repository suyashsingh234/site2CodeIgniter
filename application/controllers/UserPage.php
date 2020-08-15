<?php
class UserPage extends CI_Controller{
	var $data=array();
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['username'])){
			$this->load->view('registration');
		}
		$this->data['navbar']=$this->load->view('navbar',NULL,true);
	}
	public function index(){
		$this->load->view('user');
	}
	public function user(){
		$this->load->view('userPage',$this->data);
	}
	public function admin(){
		$this->load->view('adminPage',$this->data);
	}
	public function logout(){
		session_unset();
		$this->load->view('user');
	}
}
