<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('client_model');
		$this->load->model('appointment_model');
		$this->load->model('departments_model');
	}
	public function index()
	{
		$assets_folder = base_url() . 'assets/first_page/';
		$data['assets_folder'] = $assets_folder;
		$this->load->view('templates/first_page/index',$data);
	}
	public function approved()
	{
		$assets_folder = base_url()."assets/";
		$q["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="lawyer")
		{
			$data['lawyer'] = $this->session->userdata('name');
			$q['appointments'] = $this->appointment_model->getapprovedbylaw($data);
			$this->load->view('approved',$q);
		}
		else
			redirect('dashboard','refresh');
	}
	public function approvedbydate()
	{
		$assets_folder = base_url()."assets/";
		$q['assets_folder'] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="lawyer")
		{
			$q['message']=NULL;
			if(isset($_POST['date']))
			{
					$data['date']=$_POST['date'];	
					$data['lawyer'] = $this->session->userdata('name');
					$q['appointments'] = $this->appointment_model->getapprovedbydate($data);
			}
			$this->load->view('getbydate',$q);		
		}
		else
			redirect('dashboard','refresh');
	}
	public function pending()
	{
		$assets_folder = base_url()."assets/";
		$q["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="lawyer")
		{
			$data['lawyer'] = $this->session->userdata('name');
			$q['appointments'] = $this->appointment_model->getpendingbylaw($data);
			$this->load->view('pending',$q);
		}
		else
			redirect('dashboard','refresh');
	}	
	public function approve()
	{
		$id['trans_id'] = $_POST['id'];
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		$this->appointment_model->approvebyid($id);
		redirect('pending','refresh');
	}
	public function deny()
	{
		$id['trans_id'] = $_POST['id'];
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		$this->appointment_model->denybyid($id);		
		redirect('pending','refresh');

	}
	public function password()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="client")
		{
			$data['message']=NULL;
			if(isset($_POST['pass1']))
			{
				$p = $this->client_model->getpassword();
				$pswrd = $p[0]['password'];
				if($pswrd == $_POST['pass1'])
				{
					$udata['password'] = $_POST['pass2'];
					$this->client_model->updatepassword($udata);	
					$data['message'] = "success";
				}
				else
				{
					$data['message']= "ERROR";	
				}
			}	
			$this->load->view('clientpassword',$data);	
		}
		else
			redirect('password','refresh');
	}
	public function update()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="client")
		{
			$data1 = $this->client_model->getdetails();
			$data['username'] = $data1[0]['username'];
			$data['name'] = $data1[0]['name'];
			$data['email_id'] = $data1[0]['email_id'];
			$data['message']=NULL;
			if(isset($_POST['name']))
			{
				$udata['username'] = $_POST['username'];
				$udata['name'] = $_POST['name'];
				$udata['email_id'] = $_POST['email_id'];
				$this->client_model->updatedetails($udata);
				$data1 = $this->client_model->getdetails();
				$data['username'] = $data1[0]['username'];
				$data['email_id'] = $data1[0]['email_id'];
				$data['name'] = $data1[0]['name'];
				$USER['username'] = $data['username']; 
				$USER['name'] = $data['name'];
				$USER['logged_in'] = true;
				$USER['level'] = "client";
				$this->session->set_userdata($USER);
				$data['message'] = "SUCCESS";
			}	
			$this->load->view('clientdetails',$data);	
		}
		else
			redirect('update','refresh');
	}
}
