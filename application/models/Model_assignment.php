<?php 

class Model_assignment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAssignmentData($id = null,$filter=null) 
	{
		if ($filter=='-1') {
			
			if($id) {
				$sql = "SELECT * FROM assignments WHERE assignments_id = '$id'";
				$query = $this->db->query($sql);
				return $query->row_array();
			}else{
				$sql = "SELECT * FROM assignments";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}else{
			$user_id = $this->session->userdata('id');
			if($id) {
				$sql = "SELECT * FROM assignments WHERE assignments_id = '$id' ND user_id='$user_id'";
				$query = $this->db->query($sql);
				return $query->row_array();
			}else{
				$sql = "SELECT * FROM assignments WHERE user_id='$user_id'";
				$query = $this->db->query($sql);
				return $query->result_array();
			}		
		}
		

	}
	public function getAssignmentDataStudent() 
	{
		$final=array();
		$course_subject=array();
		$user_id = $this->session->userdata('id');
		$branch_id = $this->session->userdata('branch_id');
		$user_data=$this->db->query("SELECT * FROM `users`WHERE id='$user_id'")->row_array();
		$course=$user_data['course'];
		$subject_data=$this->db->query("SELECT * FROM `subjects`")->result_array();
		foreach ($subject_data as $key => $value) {
			if (in_array($course,json_decode($value['course_ids']))) {
				$course_subject[]=$value['subject_id'];
			}
		}
		
		$result = $this->db->query("SELECT * FROM assignments")->result_array();
		
		foreach ($result as $key => $value) {
			$announcment_subject=$value['announcment_subject'];
			if (in_array($announcment_subject,$course_subject)) {
				$final[]=$value;
			}
		}
		return $final;
	}

	public function create($data)
	{
		if($data) {
			
			$create = $this->db->insert('assignments', $data);
			return ($create == true) ? true : false;
		}
	}
	public function delete($id)
	{
		$query="DELETE FROM `assignments` WHERE assignment_id='$id'";
		$delete=$this->db->query($query);
		return ($delete == true) ? true : false;
	}
	public function edit($data, $id)
	{
		$this->db->where('branch_id', $id);
		$update = $this->db->update('branch', $data);
		return ($update == true) ? true : false;	
	}

	
}