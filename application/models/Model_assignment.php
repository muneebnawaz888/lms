<?php 

class Model_assignment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAssignmentData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM assignments WHERE assignments_id = '$id'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			$sql = "SELECT * FROM assignments";
			$query = $this->db->query($sql);
			return $query->result_array();

		}

		
	}

	public function create($data,$acc_array=null)
	{
		if($data) {
			
			$create = $this->db->insert('branch', $data);
			$branch_id=$this->db->insert_id();
			// foreach ($acc_array as $key => $value) {

			// 	$value['branch_id']=$branch_id;
			// 	$this->db->insert('account_type', $value);
			// }
			return ($create == true) ? true : false;
		}
	}
	public function delete($id)
	{
		$query="DELETE FROM `branch` WHERE branch_id='$id'";
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