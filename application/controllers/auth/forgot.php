<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
	function __Construct(){

	    parent::__Construct();  
	    $this->load->helper(array('form','url'));  
	    $this->load->library(array('session', 'form_validation', 'email'));
	    $this->load->database();  
	    $this->load->model('auth_model');  
    }   

	public function index()
	{
		$this->template->load('template','auth/forgot_password');
	}

	public function send_email()
	{
	  date_default_timezone_set("Asia/jakarta");
	 
	  $email = $this->input->post('email');
	 
	  $rs = $this->auth_model->getByEmail($email);
	 
	  // cek email ada atau engga
	  if (!$rs->num_rows() > 0){
	  	$this->session->set_flashdata('message','<div class="alert alert-danger text-center"> Your email address is not found 
	  		<button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span>
			</button><br>Check back the registered email</div>' );
	    redirect ('auth/forgot');
	  }
	 
	  $user = $rs->row();
	 
	  // get id user
	  $user_token = $user->user_id;
	 
	  //create valid dan expire token
	  $date_create_token = date("Y-m-d H:i");
	  $date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));
	 
	  // create token string
	  $tokenstring = sha1(sha1($user_token.$date_create_token));
	 
	  // simpan data token
	  $data = array('token'  =>$tokenstring,
	  				'user_id'=>$user_token,
	  				'created'=>$date_create_token,
	  				'expired'=>$date_expired_token);
	  $simpan = $this->auth_model->saveToken($data);
	 
	  if ($simpan > 0){
	 
	    // email link reset
	    $config['protocol'] = "smtp";
	    $config['smtp_host'] = "ssl://smtp.googlemail.com";
	    $config['smtp_port'] = "465";
	    $config['smtp_user'] = "solemanpranata@gmail.com"; // ganti dengan emailmu sendiri
	    $config['smtp_pass'] = "fatamorgana"; // ganti dengan password emailmu
	    $config['charset'] = "iso-8859-1";
	    $config['mailtype'] = "html";
	    $config['newline'] = "\r\n";
	 
	    $this->email->initialize($config);
	 		$url = base_url()."auth/forgot/reset/token/".$tokenstring;
	    $this->email->from('solemanpranata@gmail.com', 'TIM AKUN PIZZA HUT');
	    $this->email->to($email);
	    $this->email->subject('Reset Password');
	 
	    $this->email->message("
	       Token ini berlaku untuk 2 jam dari pengiriman token ini:
	       <p>Please click below link to change your password.</p>".$url."<br/><p>Sincerely,</p>"
	    );
	 
	    if (!$this->email->send()) {
	       echo $this->email->print_debugger();
	       exit;
	    }

			$this->session->set_flashdata('message','<div class="alert alert-success text-center">
									<div class="alert-icon">
								<i class="material-icons">check</i>
							</div>
								successfully<button type="button" class="close" data-dismiss="alert" arial-label="close"> 
      							<span aria-hidden="true">&times;</span>
									</button>please check your email to change password
							</div>');
	    redirect ('auth/forgot');
	  }
	}

	public function reset()
	{
	  date_default_timezone_set("Asia/jakarta");
	  $token = $this->uri->segment(4);
	 
	  // get token ke model user
	  $cekToken = $this->auth_model->cekToken($token);
	  $rs = $cekToken->num_rows();
	 
	  // cek token ada atau engga
	  if ($rs > 0){
	 
	    $data = $cekToken->row();
	    $tokenExpired = $data->expired;
	    $timenow = date("Y-m-d H:i:s");
	 
	    // cek token expired atau engga
	    if ($timenow < $tokenExpired){
	 
	      // tampilkan form reset
	      $datatoken['token'] = $token;
	      $this->load->view('auth/password_reset',$datatoken);
	 
	    }else{
	 
	      // redirect form forgot

	      $this->session->set_flashdata('message','<div class="alert bg-danger disabled color-palette text-center"> Sorry this link can not be used again<br> 
	  		<button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span>
			</button><br> try input your email again</div>' );
	 
	      redirect ('auth/forgot');
	    }
	  }else{
	    $this->session->set_flashdata('message','<div class="alert alert-danger text-center"> Your email address is not found <br>
	  		<button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span>
			</button><br>please re-enter your email</div>' );
	    redirect ('auth/forgot');
	  }
	}

	public function kirim_reset()
	{
	  $password = $this->input->post('password');
	  $token = $this->input->post('token');
	  $cekToken = $this->auth_model->cekToken($token);
	  $data = $cekToken->row();
	  $id = $data->user_id;
	   
	  // ubah password
	  $data = array ('password'=>sha1(sha1($password)));
	  $simpan = $this->auth_model->ubahData($data,$id);
	 
	  if ($simpan > 0){
	  	$this->session->set_flashdata('message','<div class="alert bg-green disabled color-palette text-center">Change the password successfully <br><button type="button" class="close" data-dismiss="alert" arial-label="close"> 
      		<span aria-hidden="true">&times;</span>
    		</button>please login again</div>');
	  }else{
	  	$this->session->set_flashdata('message','<div class="alert alert-success text-center"> Password Failed Changed <br>
	  		<button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span>
			</button><br>back check that you input</div>' );
	  }
	  redirect('auth/login');
	}

}

/* End of file forgot.php */
/* Location: ./application/controllers/forgot.php */