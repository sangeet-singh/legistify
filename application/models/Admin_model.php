<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->model('departments_model');
	}

	public function addadmin($data)
	{
		$this->db->insert('admin',$data);
	}
	public function deleteadmin($data)
	{
		$q = $this->db->get_where('admin',array('username' => $data['username']));
		$qu = $q->result_array();
		if(empty($qu))
			return 0;
		$this->db->delete('admin', array('username' => $data['username']));
		return 1;
	}
	public function getpassword()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('password');
		$q = $this->db->get_where('admin', $data1);
		return $q->result_array();
	}
	public function updatepassword($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('admin',$data,$data1);
	}
	public function getdetails()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('name, username');
		$q = $this->db->get_where('admin', $data1);
		return $q->result_array();
	}
	public function updatedetails($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('admin',$data,$data1);
		$data['level'] = "admin";
		$this->session->set_userdata($data);
	}
} 
?>