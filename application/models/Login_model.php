<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function find_user($username)
	{
		$this->db->select('username, password, name');
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->result_array();
	}
	public function find_admin($username)
	{
		$this->db->select('username, password, name');
		$query = $this->db->get_where('admin', array('username' => $username));
		return $query->result_array();
	}
	public function find_law($username)
	{
		$this->db->select('username, password, name');
		$query = $this->db->get_where('lawyers', array('username' => $username));
		return $query->result_array();
	}
} 
?>