<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lawyer_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->model('departments_model');
	}
	public function addlawyer($data)
	{
		$this->db->insert('lawyers',$data);
	}
	public function deletelawyer($data)
	{
		$q = $this->db->get_where('lawyers', array('username' => $data['username'], 'department' => $data['department']));
		$qu = $q->result_array();
		if(empty($qu))
			return 0;
		$this->db->delete('lawyers', array('username' => $data['username']));
		return 1;
	}
	public function getpassword()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('password');
		$q = $this->db->get_where('lawyers', $data1);
		return $q->result_array();
	}
	public function updatepassword($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('lawyers',$data,$data1);
	}
	public function getdetails()
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->select('username, name, email_id, department');
		$q = $this->db->get_where('lawyers', $data1);
		return $q->result_array();
	}
	public function updatedetails($data)
	{
		$data1['username'] = $this->session->userdata('username');
		$this->db->update('lawyers',$data,$data1);
	}
	public function findlawyers(){
		$q=$this->db->get('lawyers');
		return $q->result_array();
	}
} 
?>