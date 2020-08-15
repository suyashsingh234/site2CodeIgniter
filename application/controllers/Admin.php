<?php
class Admin extends CI_Controller{
	var $data=array();
	public function __construct(){
		parent::__construct();
		$this->data['navbar']=$this->load->view('navbar',NULL,true);
	}
	public function index(){
		$this->data['userList']=$this->db->query("select * from users where not(username='admin')");
		$this->data['projectList']=$this->db->query("select * from projects");
		$this->load->view('adminPage',$this->data);
	}
	public function deleteUser($username){
		if($_SESSION['username']=='admin'){
			$this->db->query("delete from projects where username='{$username}'");
			$this->db->query("delete from users where username='{$username}'");
		}
		$this->load->view('user');
	}
	public function upload(){
		$config['upload_path']          = './projects/';
    $config['allowed_types']        = 'doc|pdf';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);
		if($this->upload->do_upload('upload')){
			$data=$this->upload->data();
			$filepath=$config['upload_path']."{$data['file_name']}";
			$this->db->query("update projects set link='{$filepath}' where id={$this->input->post('id')}");
		}
		$this->load->view('user');
	}
}
