<?php 

class Model_assignment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAssignmentData($id = null,$filter=null) 
	{
		if ($filter) {
			
			if($id) {
				$sql = "SELECT * FROM assignments WHERE assignments_id = '$id' ND assignment_subject='$filter'";
				$query = $this->db->query($sql);
				return $query->result_array();
			}else{
				$sql = "SELECT * FROM assignments WHERE assignment_subject='$filter'";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}else{
			$user_id = $this->session->userdata('id');
			if($id) {
				$sql = "SELECT * FROM assignments WHERE assignments_id = '$id' ND user_id='$user_id'";
				$query = $this->db->query($sql);
				return $query->result_array();
			}else{
				$sql = "SELECT * FROM assignments WHERE user_id='$user_id'";
				$query = $this->db->query($sql);
				return $query->result_array();
			}		
		}
		

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