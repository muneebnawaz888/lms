<?php 

class Model_timetable extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getTimeTableData($id=null)
	{
		$branch_id = $this->session->userdata('branch_id');
		if($id) {
			$sql = "SELECT * FROM timetable WHERE timetable_id = '$id' AND branch_id='$branch_id'";
			$query = $this->db->query($sql);
			return $query->row_array();
		}else{
			$sql = "SELECT * FROM timetable WHERE branch_id='$branch_id' ORDER BY timetable_id DESC";
			$query = $this->db->query($sql);
			return $query->row_array();

		}

	}
}