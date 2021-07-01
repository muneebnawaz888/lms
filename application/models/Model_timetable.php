<?php 

class Model_timetable extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getTimeTableData($id=null)
	{
		if($id) {
			$sql = "SELECT * FROM timetable WHERE timetable_id = '$id'";
			$query = $this->db->query($sql);
			return $query->row_array();
		}else{
			$sql = "SELECT * FROM timetable ORDER BY timetable_id DESC";
			$query = $this->db->query($sql);
			return $query->row_array();

		}

	}
}