<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __Construct(){

	    parent::__Construct();  
	    $this->load->helper(array('form','url'));  
	    $this->load->library(array('session', 'form_validation', 'email'));   
	    $this->load->database();  
	    $this->load->model('auth_model'); 
	    
    }   

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function Auth()
	{
	 $this->form_validation->set_rules('name', 'Username', 'required');
     $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
		
		if($this->form_validation->run()	==	FALSE)
		{	
			$this->session->set_flashdata('message','<div class="alert alert-warning text-center">
				<div class="alert-icon"><i class="material-icons">Warning it!</i></div>
				Please Try again <button type="button" class="close" data-dismiss="alert" arial-label="close"> 
		  		<span aria-hidden="true">&times;</span>
				</button>Input username and password correctly
				</div>');
			redirect(base_url());
		}else{
			$this->load->model('auth_model');	
			$valid_user	= $this->auth_model->check_usr();
			$check_user_is_active = $this->auth_model->check_user_is_active();
			if($valid_user	==	FALSE)
			{
				if ($check_user_is_active == FALSE)
				{
					$this->session->set_flashdata('message','<div class="alert alert-warning text-center">
				<div class="alert-icon"><i class="material-icons">Warning !</i></div>
				Sorry <button type="button" class="close" data-dismiss="alert" arial-label="close"> 
		  		<span aria-hidden="true">&times;</span>
				</button>this account is not found 
				</div>');
					 
				redirect(base_url());
				}else{
					
				$this->session->set_flashdata('message','<div class="alert alert-warning text-center">
				<div class="alert-icon"><i class="material-icons">check</i></div>
				Sorry <button type="button" class="close" data-dismiss="alert" arial-label="close"> 
		  		<span aria-hidden="true">&times;</span>
				</button>this account is not active 
				</div>');
					 }
			redirect(base_url());
			}else{
				$this->session->set_userdata('name',$valid_user->name);
				$this->session->set_userdata('roles',$valid_user->role_id);
				
				switch($valid_user->role_id)
				{
					case 1 ://for admin
							redirect('admin/dashboard');
					break;
					
					case 2 ://for Oultet Manager
							redirect('om/dashboard');
					break;
					
					case 3 ://for supplier
							redirect('supplier/dashboard');
					break;

					
					
					default: break;
				}
			}//end if valid_user 
			
		}//end if validation
		
		
		
 	}
 	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
