<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->model('departments_model');
	}
	public function add_user($data)
	{
		$this->db->insert('users',$data);
	}
	public function getpassword()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('password');
		$q = $this->db->get_where('users', $data1);
		return $q->result_array();
	}
	public function updatepassword($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('users',$data,$data1);
	}
	public function getdetails()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('username, name, email_id');
		$q = $this->db->get_where('users', $data1);
		return $q->result_array();
	}
	public function updatedetails($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('users',$data,$data1);
	}
}
?>