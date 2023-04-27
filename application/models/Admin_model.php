<?php
  class Admin_model extends CI_Model{

    public function login($email, $password){
      if($this->db->where('is_admin', 1)){
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

    public function update($enc_password,$admin_id){
        $data = array(
          'firstname' =>$this->input->post('firstname'),
          'lastname' => $this->input->post('lastname'),
          'email' => $this->input->post('email'),
          'password' => $enc_password,
          'is_admin' => 1
        );
      $this->db->where('id', $admin_id);
      return $this->db->update('users',$data);
    }

    public function get_users_list(){
      $this->db->select('id, firstname, lastname, email, last_post_created');
      $users_list = $this->db->get_where('users', array('is_admin' => 0));
      return $users_list->result_array();
    }

    public function get_user($user_id)
    {
      $this->db->select('id, firstname, lastname, email');
      $query = $this->db->get_where('users',array('id' => $user_id));
      return $query->row_array();
    }

    public function update_user($user_id){
      $data = array(
        'firstname' =>$this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'email' => $this->input->post('email'),
      );
      $this->db->where('id', $user_id);
      return $this->db->update('users',$data);
    }

    public function delete_user($user_id){
        $this->db->delete('posts', array('user_id ' => $user_id));
        return $this->db->delete('users', array('id' => $user_id));
    }

  }



