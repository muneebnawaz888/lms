<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();

		$this->data['page_title'] = 'Home';		
		$this->load->model('model_branch');
	}
	public function index()
	{
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		
		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard', $this->data);	
	}
	public function SelectBranch()
	{
		$branch_data = $this->model_branch->getBranchData();
		if (count($branch_data)==1) {
			echo "string";
			redirect('proceed/'.$branch_data[0]['branch_id']);
		}else{
			$this->data['branch_data']=$branch_data;
	   		$this->load->view('SelectBranch',$this->data);
		}
	   
	}
	public function proceed($branch_id)
	{
		$this->session->set_userdata('branch_id', $branch_id);
		redirect('dashboard', 'refresh');
	}

}
