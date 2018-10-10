<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengaturan_model extends CI_Model {

	public function get_all_group()  
    {  
      $get_roles = $this->db->get('roles');
			if($get_roles->num_rows() > 0 ) {
					return $get_roles->result();
			} else {
					 return array();
			}     
		}
		public function get_all_users()  
    {  
      $get_users = $this->db->get('user');
			if($get_users->num_rows() > 0 ) {
					return $get_users->result();
			} else {
					 return array();
			}     
		}
		public function insertuser($data)  
    {  
      return $this->db->insert('user', $data);     
    } 
		
    public function get_outlet_by_id($id)  
    {  
     $query = $this->db->get_where('outlets', array('id' => $id));
			return $query->result(); 
    } 

    public function get_group($id)   
    	{ 
			$query = $this->db->where('id',$id)
							->limit(1)
							->get('roles');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}

		public function create_group($data_group)  
    {  
      $this->db->insert('roles', $data_group);     
    } 
    public function delete($id)  
    {  
      $this->db->where('id',$id)
			   ->delete('roles');     
    } 
   


}

/* End of file Outlet_model.php */
/* Location: ./application/models/Outlet_model.php */