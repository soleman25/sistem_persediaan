<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {  

   function __Construct()
   {  
      parent::__Construct();  
      $this->load->helper(array('form', 'url'));  
      $this->load->library(array('session', 'form_validation', 'email'));   
      $this->load->database();  
      $this->load->model('auth_model');
      
    }    

   public function index()  
   {  
    
    $this->template->load('template','auth/registration');  
  }  
  
  public function create()  
  {  
    date_default_timezone_set("Asia/jakarta");

    //validate input value with form validation class of codeigniter  
   $this->form_validation->set_rules('name', 'Username', 'required');  
   $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');  
   $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');  
   $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
   if ($this->form_validation->run() == FALSE)
   {
       $this->template->load('template','auth/registration');
   }else{
          
                   $name    = $_POST['name'];    
                   $email    = $_POST['email'];  
                   $password = $_POST['password'];  
                   $passhash = hash('sha1', $password);  
                      //md5 hashing algorithm to decode and encode input password  
                      //$salt    = uniqid(rand(10,10000000),true);  
                   $saltid   = sha1($email);  
                   $status   = 0;
                   $role_id= 1;
                   $create_at = date("Y-m-d H:i");
                     // $update_at = date("Y-m-d H:i");
                   $last_login = date("Y-m-d H:i");  
                     

                   $data = array( 'name'       => $name,   
                                   'email'      => $email,  
                                   'password'   => $passhash,  
                                   'status'     => $status,
                                   'role_id'  => $role_id,
                                   'create_at'  => date("Y-m-d H:i"),
                                   // 'up_date_at'  => date("Y-m-d H:i"),
                                   'last_login'  => date("Y-m-d H:i"),
                                   // 'img'      => $upload_data['file_name']
                                 );  
                }
                  if($this->auth_model->insertuser($data))
                  {
                      if($this->sendemail($email, $saltid))
                      {
                        $this->session->set_flashdata('message','<div class="alert bg-green disabled color-palette text-center"><button type="button" class="close" data-dismiss="alert" arial-label="close"><span aria-hidden="true">&times;</span></button>Please confirm the mail sent to your email id to complete the registration.</div>');  
                          redirect('auth/registrasi');
                      }else{
                          $this->session->set_flashdata('message','<div class="alert alert-danger text-center">No Internet connection Please try again ...</div>');  
                          redirect(base_url('auth/registrasi')); 
                          }
                  }else{ $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Internet Not conect. Please try again ...</div>');  
                            redirect(base_url('auth/registrasi'));
                        }

        }
  
   function sendemail($email,$saltid){  
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
    public function confirmation($key)  
    {  
      if($this->auth_model->verifyemail($key))  
      {  
       $this->session->set_flashdata('message',
              '<div class="alert alert-success">
                 <div class="container-fluid">
                <div class="alert-icon">
                <i class="material-icons">check</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                  <b>Your Email Address is successfully verified</b> 
                </div>
                </div>');
      redirect(base_url());    
      }  
      else  
      {  
        $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');  
        redirect(base_url());  
      }  
    }  
  }
