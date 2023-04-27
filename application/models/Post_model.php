<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
      $this->load->helper('date');
		}

    public function get_posts($user_id){
      $this->db->order_by('created_at','ASC');
      $query = $this->db->get_where('posts',array('user_id'=>$user_id));
      return $query->result_array();
    }

    public function get_all_posts()
    {
      $this->db->order_by('created_at','ASC');
      $query = $this->db->get('posts');
      return $query->result_array();
    }

    public function get_last_post_date(){
      $query = $this->db->query('SELECT `user_id`, max(created_at) AS `created_at` 
        FROM `posts` GROUP BY `user_id` 
        ORDER BY `posts`.`user_id` ASC');
      return $query->result_array();
    }

    public function create_post($user_id){
      $data = array(
        'message' => $this->input->post('message'),
        'user_id' => $user_id
      );
      return $this->db->insert('posts',$data);
    }

    public function last_post_created($user_id)
    {
      $this->db->select('created_at');
      $this->db->order_by('created_at','DESC');
      $last_post = $this->db->get_where('posts',array('user_id'=>$user_id));
      $last_post = $last_post->row_array();
      $data = array(
        'last_post_created' => $last_post['created_at']
      );
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

  }