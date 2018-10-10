<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();  
		$this->load->helper(array('form', 'url')); 
		$this->load->library(array('session', 'form_validation', 'email')); 
		$this->load->model('user_model'); 
		if($this->session->userdata('roles')!=	('1') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['roles'] = $this->user_model->get_all_group();
		$data['users'] = $this->user_model->all_user();
		$this->template->load('template','admin/user/index',$data);
	}
	
	// public function create()
	// {
	// 	$data['roles'] = $this->user_model->get_all_group();
	// 	$this->template->load('template','admin/user/create',$data);
	// }

	public function store()  
	{  
	  date_default_timezone_set("Asia/jakarta");
  
	  //validate input value with form validation class of codeigniter  
	 $this->form_validation->set_rules('name', 'name', 'required');
	 $this->form_validation->set_rules('role_id', 'role_id', 'required');  
	 $this->form_validation->set_rules('email', 'email', 'required');  
	 $this->form_validation->set_rules('password', 'password', 'required');  
	 $this->form_validation->set_rules('confirmpswd', 'password Confirmation', 'required|matches[password]');
	 if ($this->form_validation->run() == FALSE)
	 {
		redirect('admin/user_management');	
	 }else{
			
					 $name     = $_POST['name'];    
					 $email    = $_POST['email'];  
					 $password = $_POST['password'];  
					 $passhash = hash('sha1', $password);  
						//md5 hashing algorithm to decode and encode input password  
						//$salt    = uniqid(rand(10,10000000),true);  
					 $saltid   = sha1($email);  
					 $status   = 0;
					 $role_id  = $_POST['role_id'];;
					 $create_at = date("Y-m-d H:i");
					   // $update_at = date("Y-m-d H:i");
					 $last_login = date("Y-m-d H:i");  
					   
  
					 $data = array( 'name'       => $name,  
									 'email'      => $email,  
									 'password'   => $passhash,  
									 'status'     => $status,
									 'role_id'    => $role_id,
									 'create_at'  => date("Y-m-d H:i"),
									 // 'up_date_at'  => date("Y-m-d H:i"),
									 'last_login'  => date("Y-m-d H:i"),
									 // 'img'      => $upload_data['file_name']
								   );  
				  }
					if($this->user_model->insertuser($data))
					{
						if($this->send_email($email, $saltid))
						{
						  $this->session->set_flashdata('message','<div class="alert bg-green disabled color-palette text-center"><button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span></button>Please confirm the mail sent to your email id to complete the registration.</div>');  
							redirect('admin/user_management');
						}else{
							$this->session->set_flashdata('message','<div class="alert alert-danger text-center">No Internet connection Please try again ...</div>');  
							redirect(base_url('admin/user_management/create')); 
							}
					}else{ $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Internet Not conect. Please try again ...</div>');  
							  redirect(base_url('admin/user_management'));
						  }
  
		  }

		  function send_email($email,$saltid){  
			// configure the email setting  
			  $config['protocol'] = 'smtp';  
			  $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
			  $config['smtp_port'] = '465'; //smtp port number  
			  $config['smtp_user'] = 'solemanpranata@gmail.com';  
			  $config['smtp_pass'] = 'fatamorgana'; //$from_email password  
			  $config['mailtype'] = 'html';  
			  $config['charset'] = 'iso-8859-1';  
			  $config['wordwrap'] = TRUE;  
			  $config['newline'] = "\r\n"; //use double quotes  
			  $this->email->initialize($config);  
			  $url = base_url()."auth/registrasi/confirmation/".$saltid;  
			  $this->email->from('solemanpranata@gmail.com', 'Pizza hut Administator');  
			  $this->email->to($email);   
			  $this->email->subject('Please Verify Your Email Address');  
			$message = "<html>
						<head>
						<head>
						</head>
						<body>
						<p>Hi,</p>
						<p>Thanks for registration.</p>
						<p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>Soleman </p></body></html>";  
			$this->email->message($message);  
			return $this->email->send();  
			}  
			
	public function delete($user_id)
	{
		$this->user_model->delete($user_id);
		$this->session->set_flashdata('message',
							'<div class="alert alert-success">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">check</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>User data was Successfully Deleted</b> 
						    </div>
						    </div>');
		redirect(base_url('admin/user_management'));
	}

	public function edit($user_id)
	{
		$data['shows'] = $this->user_model->get_user_by_id($user_id);
		$this->template->load('template','admin/user/edit',$data);  
	}

	public function update($user_id)  
	{
	  $email = $this->input->post('email');
	  $password = $this->input->post('password');	  
	   
	  // ubah password
	  $data_user = array (
	  				'email'=>$email,
	  				'password'=>sha1(sha1($password))
	  				);

	  $simpan = $this->user_model->update($user_id,$data_user);
	 
	  if ($simpan > 0){
	  	$this->session->set_flashdata('message',
							'<div class="alert alert-success">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">check</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>Password was Successfully change</b> 
						    </div>
						    </div>');

	  }else{
	  	$this->session->set_flashdata('message',
							'<div class="alert alert-danger">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>please try again</b> 
						    </div>
						    </div>');  
	  }
	  redirect(base_url('admin/user_management'));
	}

	public function view($user_id)
	{		
		$data['shows'] = $this->user_model->get_user_by_id($user_id);
		$data['roles'] = $this->user_model->get_roles_by_user($user_id);
		$this->template->load('template','admin/user/view',$data); 
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */