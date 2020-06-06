<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		// $this->load->model('login_model');
		$this->data['slug_1'] = $this->uri->segment(2, '');

		$this->get_user_data();
	}
    
    public function index()
    {
		if (!$this->is_logged_in())
		{
			redirect('login', 'location');
		}

		$this->load->view('parts/header', $this->data);
		$this->load->view('homepage/main', $this->data);
		$this->load->view('parts/footer', $this->data);
	}
}
