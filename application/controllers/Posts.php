<?php
	class Posts extends CI_Controller{

		public function create(){
			if(!$this->session->userdata('user_logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Submit Message';
			$this->form_validation->set_rules('message', 'Submit Message', 'required');

			if ($this->form_validation->run() === false){
				$this->load->view('templates/header');
				$this->load->view('users/menu');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				$user_id = $this->session->userdata('id');
				$this->post_model->create_post($user_id);
				$this->post_model->last_post_created($user_id);
				$this->session->set_flashdata('message_created',
				'Your message has been submitted!');
				redirect('posts/create');
				}
			}

		public function index(){	
			if(!$this->session->userdata('user_logged_in')){
				redirect('users/login');
			}
			$user_id = $this->session->userdata('id');
			$data['posts'] = $this->post_model->get_posts($user_id);
			$this->load->view('templates/header');
			$this->load->view('users/menu');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

	}

  