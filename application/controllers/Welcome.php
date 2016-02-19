<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('login_model');
		$this->load->model('appointment_model');
		$this->load->model('client_model');
	}


	public function index()
	{
		$assets_folder = base_url()."assets/first_page/";
		$data["assets_folder"] = $assets_folder;
		if(!$this->session->userdata('logged_in'))
		{
			$this->load->view('templates/first_page/index',$data);	
		}
		else
		{
			redirect('/dashboard', 'refresh');
		}
	}
	public function login()
	{
		$assets_folder = base_url()."assets/first_page/";
		$data["assets_folder"] = $assets_folder;

		if(!$this->session->userdata('logged_in'))
		{
		$msg = NULL;
		if(isset($_GET['msg']))
			$msg=$_GET['msg'];
		$data['message'] = NULL;
		if($msg=="ERROR")
		$data['message'] = "ERROR";	
		$this->load->view('login',$data);
		}
		else
		{
			if($this->session->userdata('level')=="admin")
				redirect('/dashboard', 'refresh');
			else
				redirect('/dashboard','refresh');	
		}
		
	}

	public function register()
	{
		$assets_folder = base_url()."assets/first_page/";
		$data["assets_folder"] = $assets_folder;

		if(!$this->session->userdata('logged_in'))
		{
		$msg = NULL;
		if(isset($_GET['msg']))
			$msg=$_GET['msg'];
		$data['message'] = NULL;
		if($msg=="ERROR")
		$data['message'] = "ERROR";	
		$this->load->view('register',$data);
		}
		else
		{
			if($this->session->userdata('level')=="admin")
				redirect('/dashboard', 'refresh');
			else
				redirect('/dashboard','refresh');	
		}
		
	}

	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{	
			$this->session->sess_destroy();
		}
		redirect('/login','refresh');
	}
	public function dashboard()
	{
		$assets_folder = base_url()."assets/";
		$data["assets_folder"] = $assets_folder;

		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
		{
			$q = $this->appointment_model->allpending();
			$data['pcount'] = sizeof($q);
			$q = $this->appointment_model->allapproved();
			$data['acount'] = sizeof($q);
			$this->load->view('admindashboard',$data);
		}
		else if($this->session->userdata('level')=="lawyer")
		{
			$data1['date']=date('Y-m-d');
			$data1['lawyer'] = $this->session->userdata('name');
			$data['appointments'] = $this->appointment_model->getapprovedbydate($data1);
			$this->load->view('lawdashboard',$data);
		}
		else if($this->session->userdata('level')=="client")
		{
			$data1['date']=date('Y-m-d');
			$data1['vis_name'] = $this->session->userdata('name');
			$data['appointments'] = $this->appointment_model->getapprovedbyclient($data1);
			$data['pending_appointments'] = $this->appointment_model->getpendingbyclient($data1);
			$data['denied_appointments'] = $this->appointment_model->getdeniedbyclient($data1);
			$this->load->view('clientdashboard',$data);
		}
	}
	public function password()
	{
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
			redirect('admin/password','refresh');
		else
			redirect('prof/password','refresh');
	}
	public function update()
	{
		if(!$this->session->userdata('logged_in'))
			redirect('/login','refresh');
		else if($this->session->userdata('level')=="admin")
			redirect('admin/update','refresh');
		else
			redirect('prof/update','refresh');
	}

	public function register_user()
	{
		$q['username'] = $_POST['username'];
		$q['password'] = $_POST['password'];
		$q['email_id'] = $_POST['email_id'];
		$q['name'] = $_POST['name'];
		$this->client_model->add_user($q);
		redirect('/login','refresh');
	}
	public function verify_details()
	{
		$username  = $_POST['uname'];
		$passwrd = $_POST['password'];
		$type = $_POST['type'];
		$userfound=false;
		if($type==0)
		{
			$q = $this->login_model->find_user($username);
		}
		else if($type==1){
			$q = $this->login_model->find_law($username);
		}
		else{
			$q = $this->login_model->find_admin($username);
		}
		if(sizeof($q)==0)
		{
			redirect('/login?msg=ERROR','refresh');
		}
		$passwd = $q[0]['password'];
		$userfound = true;
		if($passwrd==$passwd)	
		{
			$USER['username'] = $username;
			$USER['name'] = $q[0]['name'];
			$USER['logged_in'] = true;
			if($type==0)
				$USER['level'] = "client";
			else if($type==1)
				$USER['level'] = 'lawyer';
			else if($type==2)
				$USER['level'] = 'admin';
			$this->session->set_userdata($USER);
			redirect('/dashboard','refresh');
		}
		else
		{
			redirect('/login?msg=ERROR','refresh');
		}
	}
}
