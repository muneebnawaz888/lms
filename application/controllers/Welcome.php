<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = 'Home';		
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function dashboard()
	{
		
		$this->render_template('content', $this->data);	
		
	}
}
