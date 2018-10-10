<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Recived_model extends CI_Model {

public function input_product($data)  
    {  
      $this->db->insert('penerimaan', $data);     
    }
	
public function get_order($order_id)   
    	{ 
			$query = $this->db->where('order_id',$order_id)
							->limit(1)
							->get('order');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}

		
	public function status_product($order_id,$data)  
    {  
      $data = array('sttus' => 1);  
      $this->db->where('order_id', $order_id);  
      return $this->db->update('order', $data); 
     
      } 

}

/* End of file recived_model.php */
/* Location: ./application/models/recived_model.php */