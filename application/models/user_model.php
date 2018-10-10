<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function all_user()//
		{ 
			$show = $this->db->get('user');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} 
					
		}

	public function get_user_by_id($user_id)   
    	{ 
			$query = $this->db->where('user_id',$user_id)
							->limit(1)
							->get('user');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}

	public function insertuser($data)  
    {  
      return $this->db->insert('user', $data);     
    } 

    public function delete($user_id)  
    {  
      $this->db->where('user_id',$user_id)
			   ->delete('user');     
    }

    public function update($simpan)
    {  
      $email    = set_value('email');
      $password = set_value('password');
        $this->db->update('user',array(
        								'email'=>($email),
        								'password'=>sha1($password)) );
      
          return array();
      }

    public function get_all_group()  
    {  
      $get_roles = $this->db->get('roles');
			if($get_roles->num_rows() > 0 ) {
					return $get_roles->result();
			} else {
					 return array();
			}     
		}

	public function get_roles_by_user($user_id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('roles', 'user.role_id = roles.id');
		$this->db->where('user.user_id',$user_id);
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */