<?php  
  defined('BASEPATH') OR exit('No direct script access allowed'); 

  class Auth_model extends CI_Model  {

    public function check_usr()
    {
      $name = set_value('name');  
      $password = set_value('password');  
      $status = '1';
      $this->db->update('user',array('last_login'=>date('Y-m-d H:i')));
      $gry = $this->db->where('name',$name)
                      ->where('password',sha1($password))
                      ->where('status',$status)
                      ->limit(1)
                      ->get('user');
              if($gry->num_rows() > 0)
              {
                return $gry->row(); 
              }else{
                  return array();
              }
    } 
    
  public function check_user_is_active()
  {
      //if the user try to login and his account is not acctive
      $name = set_value('name');  
      $password = set_value('password');  
      $status = '0';
      $gry = $this->db->where('name',$name)
              ->where('password',sha1($password))
              ->where('status',$status)
              ->limit(1)
              ->get('user');
      if($gry->num_rows() > 0)
      {
        return $gry->row(); 
      }else{
          return array();
      }      
  }

   public function insertuser($data)  
    {  
      return $this->db->insert('user', $data);     
    }  

  public function verifyemail($key)  
   {  
      $data = array('status' => 1);  
      $this->db->where('sha1(email)', $key);  
      return $this->db->update('user', $data);  
   }  
   //forgot password
   public function getByEmail($email)
   {
     $this->db->where('email',$email);
     $result = $this->db->get('user');
     return $result;
    }
 
    public function saveToken($data)
    {
      $this->db->insert('forgot_password', $data);
      return $this->db->affected_rows();
    }
 
    // public function cekToken($token)
    // {
    //   $this->db->where('token',$token);
    //   $result = $this->db->get('forgot_password');
    //   return $result;
    // }

    public function ubahData($simpan)
    {  
      $password = set_value('password');
        $this->db->update('user',array('password'=>sha1($password)) );
      
          return array();
      }
        
        
    

    public function cekToken($token)
  {
      //if the user try to login and his account is not acctive
      $gry = $this->db->where('token',$token)
                      ->limit(1)
                      ->get('forgot_password');
      if($gry->num_rows() > 0)
      {
        return $gry->row(); 
      }else{
          return array();
      } 
    }     
  }