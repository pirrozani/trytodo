<?php
	class Users extends CI_Controller{

		public function register(){
			$data['title'] = 'Register';
			$this->form_validation->set_rules('firstname', 'First name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('retypepass', 'Retype Password', 'required|matches[password]');

			if($this->form_validation->run()=== FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				$this->session->set_flashdata('user_registered',
						'Your registration has been succesfully created!');
				redirect(base_url());
			}
		}

		public function update(){
			if(!$this->session->userdata('user_logged_in')){
				redirect('users/login');
			}
			$data['title'] = 'Update your information';
			$this->form_validation->set_rules('firstname', 'First name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()=== FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/update',$data);
				$this->load->view('templates/footer');
			}else{
				$user_id = $this->session->userdata('id');
				$enc_password = md5($this->input->post('password'));
				$this->user_model->update($enc_password,$user_id);
				$this->session->set_flashdata('user_updated',
					'You have succesfully updated your information!');
				redirect('users/update');

			}
		}
	
		public function login(){
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/home');
				$this->load->view('templates/footer');
			} else {
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$user_id = $this->user_model->login($email, $password);

				if($user_id){
					$user_data = array(
						'id' => $user_id,
						'email' => $email,
						'user_logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('user_loggedin', 'You have been succesfully logged in!');
					redirect('users/update');
				}else{
					$this->session->set_flashdata('login_failed', 'You have typed incorrectly Email or Password.');
					redirect('users/login');
				}
			}
		}

		public function logout(){
			$array_data = array('id', 'email','user_logged_in');
			$this->session->unset_userdata($array_data);
			$this->session->set_flashdata('user_loggedout', 'Your have been succesfully logout!');
			redirect('users/login');
		}

		public function check_email(){
			$this->form_validation->set_rules('email', 'Email', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/lostpass');
				$this->load->view('templates/footer');

			} else {
				$email = $this->input->post('email');
				$check = $this->user_model->check_email($email);
				if(!$check){
					$this->session->set_flashdata('wrong_email', 'Email was not found.');
					redirect('users/check_email');
				}
				$this->session->set_userdata('email',$email);
				redirect('users/send_verification_code');
			}
		}


		public function send_verification_code(){

			$verification_code = rand(1000,9999);
			$this->session->set_userdata('verification_code', $verification_code);

			$to = $this->session->userdata('email');
			$subject = 'Confirm your email';
			$message = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Document</title>
			</head>
			<style>
				.card-body{
					text-align: center;
					background-color: #272727;
					color: white;
				}
				.code span{
					font-size: 30px;
					background-color: rgb(92, 17, 17);
				}
			</style>
			</head>
			<body>
			<div class="card-body ">
				<h1 class="h3 mb-2">CONFIRM YOUR EMAIL</h1><br>
				<hr>
				<h3 class="text-teal-700">Insert the code in the application that is shown below:</h3>
					<div class="code">
						<span>'.$verification_code.'</span>
					</div>
					<h4>Thank you for using our website!</h4>
			 <hr>
			</div>
			</body>
			</html>';

			$this->email->set_newline("\r\n");
			$this->email->from('smtp_user', 'Trytodo');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);


			if ($this->email->send()) {
				redirect('users/check_verification_email');
			}else {
				show_error($this->email->print_debugger());
			}
		}

		public function check_verification_email(){
			$data['email'] = $this->session->userdata('email');
			$this->form_validation->set_rules('verification_code', 'Verification code', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/confirm_email',$data);
				$this->load->view('templates/footer');
			}else{
				$verification_code = intval($this->session->userdata('verification_code'));
				$posted_code = intval($this->input->post('verification_code'));	
				if($posted_code == $verification_code){
					$this->session->unset_userdata('verification_code');
					$this->session->set_flashdata('valid_verification_code',
					'Your Verification Code is correct, you can change your Password now!');
					redirect('users/update_password');
				}else{
					$this->session->set_flashdata('invalid_verification_code',
					'You have typed an invalid Verification Code.');
					redirect('users/check_verification_email');
				}	
			}
		}

		public function update_password(){
			$data['title'] = 'Update your Password';

			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('retypepass', 'Retype Password', 'required|matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/update_password',$data);
				$this->load->view('templates/footer');
			} else {		
				$enc_password = md5($this->input->post('password'));
				$email = $this->session->userdata('email');
				$this->user_model->update_password($enc_password,$email);
				$this->session->set_flashdata('password_updated',
					'You have succesfully updated your Password!');
				$this->session->unset_userdata('email');
				redirect(base_url());
			}	
		}
	}