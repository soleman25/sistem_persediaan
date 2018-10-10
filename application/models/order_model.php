<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function all_product()//
		{ //$show -> guery to get all products from table products
			$show = $this->db->get('products');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} //end if num_rows
					
		}//end function all_products
		public function all_order()//
		{ //$show -> guery to get all products from table products
			$show = $this->db->get('order');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} //end if num_rows
					
		}//end function all_products

	public function create($data_product)  
    {  
      $this->db->insert('products', $data_product);     
    }

    public function delete($product_id)  
    {  
      $this->db->where('product_id',$product_id)
			   ->delete('products');     
    } 

    public function get_faktur()   
    	{ //$show -> guery to get all products from table products
			$this->db->select('*');
			$this->db->from('faktur');
			$this->db->where("nama='order'");
			$query = $this->db->get();
			return $query->result(); 
		}//end function all_products

	public function update($product_id,$data_product)
	{
		$this->db->where('product_id',$product_id)
				 ->update('products',$data_product);
	}

	public function order($data)  
    {  
      $this->db->insert('faktur', $data);     
    }

   //  public function search_product()  
   //  {  
   //    $cari = $this->input->GET('cari', TRUE);
	  // $data = $this->db->query("SELECT * from products where nma_product like '%$cari%' ");
	  // return $data->result();    
   //  }

    public function all_faktur()//
		{ //$show -> guery to get all products from table products
			$this->db->select('*');
			$this->db->from('faktur');
			$this->db->where("nama='order'");
			$query = $this->db->get();
			return $query->result(); 
					
		}

	public function get_order_by_id($faktur_id)//
		{ //$show -> guery to get all products from table products
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('faktur','order.faktur_id = faktur.faktur_id');
			$this->db->join('products','products.product_id = order.product_id');
			$this->db->where('order.faktur_id',$faktur_id);
			$query = $this->db->get();
			return $query->result();
		}

	public function input_product($data)  
    {  
      $this->db->insert('order', $data);     
    }

	public function status($faktur_id,$data)  
    {  
      $data = array('status' => 1);  
      $this->db->where('faktur_id', $faktur_id);  
      return $this->db->update('faktur', $data); 
     
      } 
    public function delete_faktur($faktur_id)  
    {  
      $this->db->delete('order',array('faktur_id' => $faktur_id));
      $this->db->delete('faktur',array('faktur_id' => $faktur_id));    
    } 
	public function remove($order_id)  
    {  
      $this->db->delete('order',array('order_id' => $order_id));   
    } 
    public function get_faktur_by_supplier($faktur_id)
	{ 
	    $query = $this->db->where('faktur_id',$faktur_id)
							->limit(1)
							->get('faktur');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0  
	}

	public function get_product_by_id($product_id)
	{ 
			$query = $this->db->where('product_id',$product_id)
							->limit(1)
							->get('products');
			if ($query->num_rows() > 0 )
				{
					return $query->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
	}

	
	public function get_supplier_by_faktur($faktur_id)
	{ 
		$this->db->select('*');
			$this->db->from('suppliers');
			$this->db->join('faktur','faktur.supplier_id = suppliers.supplier_id');
			$this->db->join('products','products.supplier_id = suppliers.supplier_id');
			$this->db->where('faktur.faktur_id',$faktur_id);
			$query = $this->db->get();
			return $query->result();
	}

	
}

/* End of file supplier_model.php */
/* Location: ./application/models/supplier_model.php */