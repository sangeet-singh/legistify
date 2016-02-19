<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Appointment_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function approvebyid($data)
	{
		$q=$this->db->get_where('pending', array('aid'=>$data['aid']));
		$q1 = $q->result_array();
		$q2['vis_name'] = $q1[0]['vis_name'];
		$q2['phone'] = $q1[0]['phone'];
		$q2['email_id'] = $q1[0]['email_id'];
		$q2['purpose'] = $q1[0]['purpose'];
		$q2['date'] = $q1[0]['date'];
		$q2['time'] = $q1[0]['time'];
		$q2['department'] = $q1[0]['department'];
		$q2['lawyer'] = $q1[0]['lawyer'];
		$q2['aid'] = $q1[0]['aid'];
		$this->db->delete('pending',$data);
		$this->db->insert('approved',$q2);
	}
	public function denybyid($data)
	{
		$q=$this->db->get_where('pending',array('aid'=>$data['aid']));
		$q1 = $q->result_array();
		$q2['vis_name'] = $q1[0]['vis_name'];
		$q2['phone'] = $q1[0]['phone'];
		$q2['email_id'] = $q1[0]['email_id'];
		$q2['purpose'] = $q1[0]['purpose'];
		$q2['date'] = $q1[0]['date'];
		$q2['time'] = $q1[0]['time'];
		$q2['department'] = $q1[0]['department'];
		$q2['lawyer'] = $q1[0]['lawyer'];
		$q2['aid'] = $q1[0]['aid'];
		$this->db->delete('pending',$data);
		$this->db->insert('denied',$q2);
	}
	public function addappointment($data)
	{
		$this->db->insert('pending',$data);
	}
	public function approveappointment($data)
	{
		$this->db->insert('approved',$data);
	}
	public function getpendingbylaw($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('pending',$data);
		return $q->result_array();
	}
	public function getapprovedbydate($data)
	{
		$q = $this->db->get_where('approved',$data);
		return $q->result_array();
	}
	public function getapprovedbylaw($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('approved',array('lawyer'=>$data['lawyer']));
		return $q->result_array();
	}
	public function getdeniedbylaw($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('denied',array('lawyer'=>$data['lawyer']));
		return $q->result_array();
	}
	public function getapprovedbyclient($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('approved',array('vis_name'=>$data['vis_name']));
		return $q->result_array();
	}

	public function getpendingbyclient($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('pending',array('vis_name'=>$data['vis_name']));
		return $q->result_array();
	}

	public function getdeniedbyclient($data)
	{
		$dat = date('Y-m-d');
		$this->db->where("date >=",$dat);
		$this->db->order_by('date','asc');
		$q = $this->db->get_where('denied',array('vis_name'=>$data['vis_name']));
		return $q->result_array();
	}
	public function allapproved()
	{
		$dat = date('Y-m-d');
		$this->db->where("date<",$dat);
		$this->db->delete('approved');
		$this->db->order_by('date','asc');
		$q = $this->db->get('approved');
		return $q->result_array();
	}
	public function allpending()
	{
		$dat = date('Y-m-d');
		$this->db->where("date<",$dat);
		$this->db->delete('pending');
		$this->db->order_by('date','asc');
		$q = $this->db->get('pending');
		return $q->result_array();
	}
	public function alldenied()
	{
		$dat = date('Y-m-d');
		$this->db->where("date<",$dat);
		$this->db->delete('denied');
		$this->db->order_by('date','asc');
		$q = $this->db->get('denied');
		return $q->result_array();
	}
} 
?>
