<?php 

class Model_course extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
		public function getCourseData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM course WHERE course_id = '$id'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			$sql = "SELECT * FROM course";
			$query = $this->db->query($sql);
			return $query->result_array();

		}

		
	}

	public function create($data,$acc_array=null)
	{
		if($data) {
			
			$create = $this->db->insert('course', $data);
			$course_id=$this->db->insert_id();
			// foreach ($acc_array as $key => $value) {

			// 	$value['course_id']=$course_id;
			// 	$this->db->insert('account_type', $value);
			// }
			return ($create == true) ? true : false;
		}
	}
	public function delete($id)
	{
		$query="DELETE FROM `course` WHERE course_id='$id'";
		$delete=$this->db->query($query);
		return ($delete == true) ? true : false;
	}
	public function edit($data, $id)
	{
		$this->db->where('course_id', $id);
		$update = $this->db->update('course', $data);
		return ($update == true) ? true : false;	
	}
}