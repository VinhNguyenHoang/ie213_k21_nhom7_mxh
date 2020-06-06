<?php

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('login_model');

        $this->data['user_id'] = NULL;
        $this->data['user_name'] = NULL;
    }

    public function is_logged_in()
    {
        $user_login = $this->session->userdata('user_login');

        if (!$user_login)
        {
            return FALSE;
        }

        return TRUE;
    }

    public function login_user($user_id)
    {
        $this->session->set_userdata(array(
            'user_login' => TRUE,
            'user_id'   => $user_id
        ));
    }

    public function logout_user()
    {
        $user_login = $this->session->userdata('user_login');
        if ($user_login)
        {
            $this->session->unset_userdata('user_login');
        }
    }

    public function get_user_data()
    {
        if (!$this->is_logged_in())
        {
            return FALSE;
        }

        $user_id = $this->session->userdata('user_id');

        if ($user_id && $user_id > 0)
        {
            $user = $this->login_model->get_user_by_id($user_id);
            if ($user)
            {
                $this->data['user_id'] = $user['id'];
                $this->data['user_name'] = $user['name'];
            }
        }
    }
}
?>