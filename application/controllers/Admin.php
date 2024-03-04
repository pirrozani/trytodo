<?php

class Admin extends CI_Controller
{

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/home_menu');
			$this->load->view('pages/home_admin');
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$admin_id = $this->admin_model->login($email, $password);

			if ($admin_id) {
				$user_data = array(
					'id' => $admin_id,
					'email' => $email,
					'admin_logged_in' => true
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('admin_loggedin', 'You have succesfully logged in ADMIN!');
				redirect('admin/update');
			} else {
				$this->session->set_flashdata('admin_loggedin_failed', 'You have typed incorrectly Email or Password.');
				redirect('admin/login');
			}
		}
	}

	public function logout()
	{
		$array_data = array('id', 'email', 'admin_logged_in');
		$this->session->unset_userdata($array_data);
		$this->session->set_flashdata('admin_loggedout', 'Your have been succesfully logout!');
		redirect('admin/login');
	}

	public function update()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$data['title'] = 'Update your Admin information';
		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/update', $data);
			$this->load->view('templates/footer');
		} else {
			$admin_id = $this->session->userdata('id');
			$data_arr = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'is_admin' => 1
			);
			$this->admin_model->update($data_arr, $admin_id);
			$this->session->set_flashdata('admin_updated',
				'You have succesfully updated your information!');
			redirect('admin/update');
		}
	}

	public function users_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$data['users'] = $this->admin_model->get_users_list();
		$this->load->view('templates/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/users_list', $data);
		$this->load->view('templates/footer');
	}

	public function user_message()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$user_id = $this->uri->segment(3);
		$data['posts'] = $this->post_model->get_posts($user_id);
		$this->load->view('templates/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/user_message', $data);
		$this->load->view('templates/footer');

	}

	public function edit_user()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		$user_id = $this->uri->segment(3);
		$data['users'] = $this->admin_model->get_user($user_id);
		if ($this->form_validation->run()) {
			$data_arr = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
			);
			$this->admin_model->update_user($data_arr, $user_id);
			$this->session->set_flashdata('user_updated',
				"You have succesfully updated the user's information!");
			redirect('admin/edit_user/' . $user_id);

		} else {
			$this->load->view('templates/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_user', $data);
			$this->load->view('templates/footer');
		}
	}


	public function all_posts()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
		$data['users'] = $this->admin_model->get_users_list();
		$data['posts'] = $this->post_model->get_all_posts();

		$this->load->view('templates/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/all_messages', $data);
		$this->load->view('templates/footer');
	}

	public function delete_user($user_id)
	{
		$result = $this->admin_model->delete_user($user_id);
		$this->session->set_flashdata('success', 'You have successfully deleted the User!');
		redirect(base_url('admin/users_list'));
	}

}
