<?php 

class Branch extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Branchs';
		

		$this->load->model('model_branch');
		// $this->load->model('model_category');
		
	}

	
	public function index()
	{
		if(!in_array('viewBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('branch/index', $this->data);
	}
	public function GetBranchData()
	{
		if(!in_array('viewBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$branch_data = $this->model_branch->getBranchData();
	   $this->data['branch_data']=$branch_data;
	   $this->load->view('branch/branch_ajax_table',$this->data);
	}

	public function create()
	{
		if(!in_array('createBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

           
        	$data = array(
        		'branch_name' => $this->input->post('branch_name'),
        		);

        	$create = $this->model_branch->create($data);



        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectBranch', 'refresh');
        		}else{
        			echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Inserted
					  </div>' );
					   
        			
        		}
        		
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		if($this->input->post('check')=="check"){
        			redirect('dashboard/SelectBranch', 'refresh');
        		}else{
        			echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>  Error Occoured
                            </div>' );
        		}
        	}
        	

		
	}

	public function edit()
	{
		if(!in_array('updateBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$id= $this->input->post('id');
	       $data = array(
        		'branch_name' => $this->input->post('branch_name'),
        		);
    	$update = $this->model_branch->edit($data, $id);
    	if($update == true) {
    		echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Updated
					  </div>' );
    	}
    	else {
    		echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Error Occoured
                            </div>' );
    	}
	}
	        
		

	public function delete()
	{
		if(!in_array('deleteBranch', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
        $id=$this->input->post('id');
    	$delete = $this->model_branch->delete($id);
    	if($delete == true) {
    		echo( '<div class="alert alert-info alert-dismissible" role="alert">
					      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Succesfully Deleted
					  </div>' );
    	}
    	else {
    		echo( '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Error Occoured
                            </div>' );
    	}	
	}




}