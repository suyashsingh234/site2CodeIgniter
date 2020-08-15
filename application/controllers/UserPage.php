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
		$this->data['projects']=$this->db->query("select * from projects where username='{$_SESSION['username']}'");
		$this->load->view('userPage',$this->data);
	}
	public function logout(){
		session_unset();
		$this->load->view('user');
	}
	public function addProject(){
		$this->form_validation->set_rules('name','name','trim|required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('language','language','trim|required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('description','description','trim|required|min_length[1]|max_length[100]');
		if($this->form_validation->run()==false){
			$this->load->view('user');
		}
		else{
			$this->db->query(
				"insert into projects (username, name, language, description, link) values (
					'{$_SESSION['username']}',
					'{$this->input->post('name')}',
					'{$this->input->post('language')}',
					'{$this->input->post('description')}',
					''
					)"
			);
			$this->load->view('user');
		}
	}
}
