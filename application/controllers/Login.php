<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		
		$this->data['slug_1'] = $this->uri->segment(2, '');
	}
    
    public function index()
    {
        if ($this->is_logged_in())
        {
            redirect('homepage', 'location');
        }

		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		
		if ($this->form_validation->run())
		{
			$user = $this->login_model->get_user_by_username_password($username, $password);
			if (!$user)
			{
				$this->data['error_msg'] = 'Sai tên đăng nhập hoặc mật khẩu.';
				$this->load->view('parts/header', $this->data);
				$this->load->view('login/main', $this->data);
				$this->load->view('parts/footer', $this->data);
			}
			else
			{
				$this->login_user($user['id']);
				redirect('homepage', 'location');
			}
		}
		else
		{
			$this->load->view('parts/header', $this->data);
			$this->load->view('login/main', $this->data);
			$this->load->view('parts/footer', $this->data);
		}
	}
	
	public function logout()
	{
		if ($this->is_logged_in())
		{
			$this->logout_user();
			redirect('login', 'location');
		}
    }
    
    public function register()
    {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $birthday = $this->input->post('birthday');


        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_unique_username');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		
		if ($this->form_validation->run())
		{
            $in_time = date('Y-m-d H:i:s', time());

            $data = array(
                'name'  => $name,
                'username'  => $username,
                'password'  => $password,
                'birthday'  => date('Y-m-d', strtotime($birthday)),
                'create_date' => $in_time,
                'update_date' => $in_time
            );

            $user_id = $this->login_model->insert_user($data);

            if ($user_id > 0)
            {
                $this->data['success_msg'] = 'Đăng ký tài khoản thành công';
				$this->load->view('parts/header', $this->data);
				$this->load->view('login/register', $this->data);
				$this->load->view('parts/footer', $this->data);
            }
			else
			{
                $this->data['error_msg'] = 'Đã có lỗi xảy ra, xin vui lòng liên hệ quản trị viên.';
				$this->load->view('parts/header', $this->data);
				$this->load->view('login/register', $this->data);
				$this->load->view('parts/footer', $this->data);
			}
		}
		else
		{
			$this->load->view('parts/header', $this->data);
			$this->load->view('login/register', $this->data);
			$this->load->view('parts/footer', $this->data);
		}
    }

    public function validate_unique_username()
    {
        $username = $this->input->post('username');

        $user = $this->login_model->get_user_by_username($username);

        if ($user)
        {
            $this->form_validation->set_message('validate_unique_username', $username.' đã tồn tại. Xin chọn username khác.');

            return FALSE;
        }

        return TRUE;
    }
}
