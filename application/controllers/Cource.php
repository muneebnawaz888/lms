<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cource extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();

		$this->data['page_title'] = 'Cource';		
		$this->load->model('model_cource');
	}
}