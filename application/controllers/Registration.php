<?php
class Registration extends CI_Controller {

	public function index()
	{
		$this->load->view('registration');
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		if($this->form_validation->run()==false){
			$this->load->view('registration');
		}
		else{
			$queryResult=$this->db->query("select * from users where
			username='{$this->input->post('username')}'
			and
			password='{$this->input->post('password')}'
			");
			if($queryResult->num_rows()==0){
				$data['error']="username or password incorrect";
				$this->load->view('registration',$data);
			}
			else if($queryResult->row()->status=="not activated"){
				$data['error']="activate account";
				$this->load->view('registration',$data);
			}
			else{
				$_SESSION['username']=$this->input->post('username');
				$this->load->view('user');
			}
		}

	}

	public function signup(){
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run()==false){
			$this->load->view('registration');
		}
		else{
			if( $this->db->query("select * from users where username='{$this->input->post('username')}'")->num_rows() > 0 ){
				$data['error']="username exists";
				$this->load->view('registration',$data);
			}
			else if($this->db->query("select * from users where email='{$this->input->post('email')}'")->num_rows() > 0){
				$data['error']="email exists";
				$this->load->view('registration',$data);
			}
			else{
				$activationNumber=rand(1000,10000);
				$this->db->query(
					"insert into users values(
						'{$this->input->post('email')}',
						'{$this->input->post('username')}',
						'{$this->input->post('password')}',
						'{$activationNumber}',
						'not activated'
					)"
				);
				$data['status']='not activated';
				$this->load->view('user',$data);

				$config = array(
				    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
				    'smtp_host' => 'smtp.gmail.com',
				    'smtp_port' => 465,
				    'smtp_user' => 'suyashdev234@gmail.com',
				    'smtp_pass' => 'fakeaccount',
				    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
				    'mailtype' => 'text', //plaintext 'text' mails or 'html'
				    'smtp_timeout' => '4', //in seconds
				    'charset' => 'utf-8',
				    'wordwrap' => TRUE
				);
				$config['newline'] = "\r\n";
				$this->email->initialize($config);
				$this->email->from('suyashdev234@gmail.com','suyash singh');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Activate');
				$this->email->message(base_url().'activate/index/'.$this->input->post('username').'/'.$activationNumber);
				$this->email->send();
			}
		}
	}

}
