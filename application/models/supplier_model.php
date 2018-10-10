<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	public function all_supplier()//
		{ //$show -> guery to get all products from table products
			$show = $this->db->get('suppliers');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} //end if num_rows
					
		}//end function all_products

	public function create($data_supplier)  
    {  
      $this->db->insert('suppliers', $data_supplier);     
    }

     public function delete($supplier_id)  
    {  
      
      $this->db->delete('products',array('supplier_id' => $supplier_id));
      $this->db->delete('suppliers',array('supplier_id' => $supplier_id));
	  // $this->db->delete('suppliers');     
    } 

    public function get_supplier($supplier_id)   
    	{ 
			$query = $this->db->where('supplier_id',$supplier_id)
							->limit(1)
							->get('suppliers');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}

    public function update($supplier_id,$data_supplier)
	{
		$this->db->where('supplier_id',$supplier_id)
				 ->update('suppliers',$data_supplier);
	}

	public function get_supplier_by_id($supplier_id)
	{ 
			$query = $this->db->where('supplier_id',$supplier_id)
							->limit(1)
							->get('suppliers');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
	}

	public function get_product_by_supplier($supplier_id)
	{ 
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('suppliers', 'products.supplier_id = suppliers.supplier_id');
		$this->db->where('products.supplier_id',$supplier_id);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file supplier_model.php */
/* Location: ./application/models/supplier_model.php */