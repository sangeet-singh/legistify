<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('login_model');
		$this->load->model('departments_model');
		$this->load->model('lawyer_model');
		$this->load->model('admin_model');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function addlaw()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$deptnames = $this->departments_model->finddepartmentnames();
			$data['departments']=$deptnames;
			$data['message']=NULL;
			if(isset($_POST['username']))
			{
				$details['name']=$_POST['name'];
				$details['username'] = $_POST['username'];
				$details['password'] = $_POST['password'];
				$details['department'] = $_POST['deptname'];
				$details['email_id'] = $_POST['email'];
				$details['fee'] = $_POST['fee'];
				$this->lawyer_model->addlawyer($details);
				$data['message'] = "success";
				$this->load->view('addlaw',$data);
			}
			else
				$this->load->view('addlaw',$data);	
		}
		else
			redirect('/dashboard','refresh');
	}
	public function deletelaw()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$data['message']=NULL;
			$deptnames = $this->departments_model->finddepartmentnames();
			$data['departments']=$deptnames;
			if(isset($_POST['deptname']))
			{
				$details['username']=$_POST['username'];
				$details['department'] = $_POST['deptname'];
				$data['success'] = $this->lawyer_model->deletelawyer($details);
				if($data['success']==1)
					$data['message'] = "success";
				elseif($data['success']==0)
					$data['message'] = "failure";
			}
			$this->load->view('deletelaw',$data);	
		}
		else
			redirect('/dashboard','refresh');
	}
	public function addadmin()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$data['message']=NULL;
			if(isset($_POST['username']))
			{
				$details['name']=$_POST['name'];
				$details['username'] = $_POST['username'];
				$details['password'] = $_POST['password'];
				$data['message'] = "success";
				$this->admin_model->addadmin($details);
			}	
			$this->load->view('addadmin',$data);	
		}
		else
			redirect('/dashboard','refresh');
	}
	public function deleteadmin()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$data['success']=2;
			if(isset($_POST['username']))
			{
				if($this->session->userdata('username')==$_POST['username'])
					$data['success'] = -1;
				else{
					$details['username']=$_POST['username'];
					$data['success']=$this->admin_model->deleteadmin($details);
				}
			}	
			$this->load->view('deleteadmin',$data);	
		}
		else
			redirect('/dashboard','refresh');
	}
	public function password()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$data['message']=NULL;
			if(isset($_POST['pass1']))
			{
				$p = $this->admin_model->getpassword();
				$pswrd = $p[0]['password'];
				if($pswrd == $_POST['pass1'])
				{
					$udata['password'] = $_POST['pass2'];
					$this->admin_model->updatepassword($udata);	
					$data['message'] = "success";
				}
				else
				{
					$data['message']= "ERROR";	
					$this->load->view('adminpassword',$data);
				}
			}	
			$this->load->view('adminpassword',$data);	
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
		else if($this->session->userdata('level')=="admin")
		{
			
			$data1 = $this->admin_model->getdetails();
			$data['name'] = $data1[0]['name'];
			$data['username'] = $data1[0]['username'];
			$data['message']=NULL;
			if(isset($_POST['name']))
			{
				$udata['name'] = $_POST['name'];
				$udata['username'] = $_POST['username'];
				$this->admin_model->updatedetails($udata);
				$data1 = $this->admin_model->getdetails();
				$data['username'] = $data1[0]['username'];
				$data['name'] = $data1[0]['name'];
				$data['level'] = "admin";
				$this->session->set_userdata($data);
				$data['message'] = "SUCCESS";
			}	
			$this->load->view('admindetails',$data);	
		}
		else
			redirect('update','refresh');
	}
}
