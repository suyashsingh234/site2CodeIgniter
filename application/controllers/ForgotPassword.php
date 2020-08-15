<?php
	class ForgotPassword extends CI_Controller{
		public function index(){
			$this->load->view('forgotPassword');
		}
		public function sendMail(){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			if($this->form_validation->run()==false){
				$this->load->view('registration');
			}
			else if(isset($email) && $this->db->query("select * from users where email='{$email}'")->num_rows()==0){
				$data['error']='email does not exist';
				$this->load->view('registration',$data);
			}
			else if(isset($email)){
				$activationNumber=rand(1000,10000);
				$this->db->query("insert into forgotpassword value('{$email}','{$activationNumber}')");
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
				$this->email->to($email);
				$this->email->subject('Forgot password');
				$this->email->message(base_url().'forgotPassword/newPassword/'.$email.'/'.$activationNumber.'/'.$password);
				$this->email->send();
				$this->load->view('registration');
			}
		}
		public function newPassword($email, $number, $password){
			$query=$this->db->query("select * from forgotpassword where email='{$email}' and activate={$number}");
			if($query->num_rows()>0){
				$this->db->query("update users set password='{$password}' where email='{$email}'");
				$this->db->query("delete from forgotpassword where email='{$email}'");
			}
			$this->load->view('registration');
		}
	}
