<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departments_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function finddepartmentnames()
	{
		$this->db->select('dept_name');
		$query = $this->db->get('departments');
		return $query->result_array();
	}
} 
?>