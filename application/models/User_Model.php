<?php
	class User_model extends CI_Model{
    public function register($enc_password){
      $data = array(
        'firstname' =>$this->input->post('firstname'),
        'lastname' =>$this->input->post('lastname'),
        'email' =>$this->input->post('email'),
        'password' =>$enc_password,
        'is_admin' => 0
      );
      return $this->db->insert('users',$data);
    }

    public function login($email, $password){
      if($this->db->where('is_admin', 0)){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('users');
      }
			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}
    
    public function update($enc_password,$user_id){
        $data = array(
          'firstname' =>$this->input->post('firstname'),
          'lastname' => $this->input->post('lastname'),
          'email' => $this->input->post('email'),
          'password' => $enc_password,
          'is_admin' => 0
        );
        $this->db->where('id', $user_id);
        return $this->db->update('users',$data);
    }

    public function check_email($email){
      $query = $this->db->get_where('users', array('email' => $email));
      if(!empty($query->row_array())){
				return true;
			} else {
				return false;
			}
    }

    public function update_password($enc_password,$email){
      $data = array(
        'password' => $enc_password
      );
      $this->db->where('email', $email);
      return $this->db->update('users',$data);
    }

  }