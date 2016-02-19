<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('lawyer_model');
		$this->load->model('appointment_model');
	}
	public function index()
	{
		$assets_folder = base_url() . 'assets/first_page/';
		$data['assets_folder'] = $assets_folder;
		$this->load->view('templates/first_page/index',$data);
	}
	public function bookappointment()
	{
		$assets_folder = base_url() . 'assets/first_page/';
		$data['assets_folder'] = $assets_folder;
		$data['message']=NULL;
		$deptnames = $this->departments_model->finddepartmentnames();
		$lawyers = $this->lawyer_model->findlawyers();
		$data['departments']=$deptnames;
		$data['lawyers'] = $lawyers;
		if(isset($_POST['vis_name']))
		{
			$this->appointment_model->addappointment($_POST);
			$data['message']="SUCCESS";
		}	
		$this->load->view('appointment',$data);	
	}
}
