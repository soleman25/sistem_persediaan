<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_model extends CI_Model {

	public function all_faktur()//
		{ //$show -> guery to get all products from table products
			$this->db->select('*');
			$this->db->from('faktur');
			$this->db->where("nama='retur'");
			$query = $this->db->get();
			return $query->result(); 
					
		}
	public function get_retur_by_id($faktur_id)//
		{ //$show -> guery to get all products from table products
			$this->db->select('*');
			$this->db->from('retur');
			$this->db->join('faktur','retur.faktur_id = faktur.faktur_id');
			$this->db->join('products','products.product_id = retur.product_id');
			$this->db->where('retur.faktur_id',$faktur_id);
			$query = $this->db->get();
			return $query->result();
			
		}

	public function save($data)  
    {  
      $this->db->insert('retur', $data);     
    }

    public function create_faktur($data)  
    {  
      $this->db->insert('faktur', $data);     
    }

    public function remove($retur_id)  
    {  
      $this->db->delete('retur',array('retur_id' => $retur_id));   
    } 
    public function status($faktur_id,$data)  
    {  
      $data = array('status' => 1);  
      $this->db->where('faktur_id', $faktur_id);  
      return $this->db->update('faktur', $data); 
     
      } 

}

/* End of file retur_model.php */
/* Location: ./application/models/retur_model.php */