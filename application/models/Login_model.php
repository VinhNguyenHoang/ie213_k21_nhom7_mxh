<?php 

class Login_model extends CI_model {

    public function get_user_by_username_password($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('del_flg', 0);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_user_by_username($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('del_flg', 0);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function insert_user($user)
    {
        if (!$user)
        {
            return 0;
        }

        $this->db->insert('user', $user);

        return $this->db->insert_id();
    }

    public function get_user_by_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $this->db->where('del_flg', 0);

        $query = $this->db->get();

        return $query->row_array();
    }
}