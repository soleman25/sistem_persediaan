<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function all_product()//
		{ //$show -> guery to get all products from table products
			$show = $this->db->get('products');
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

    public function get_product($product_id)   
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

	public function update($product_id,$data_product)
	{
		$this->db->where('product_id',$product_id)
				 ->update('products',$data_product);
	}

	public function get_product_by_id($product_id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('suppliers', 'products.supplier_id = suppliers.supplier_id');
		$this->db->where('products.product_id',$product_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function    get_supplier()   
    	{
			$this->db->select('*');
			$this->db->from('suppliers');
			$query = $this->db->get();
			return $query->result();
		}

	public function get_data_stok(){
        $query = $this->db->query("SELECT nma_product,sum(stok) AS stok  FROM products GROUP BY nma_product");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function get_data_order(){
	
	$this->db->select('*');
			$this->db->from('order');
			$this->db->join('products','products.product_id = order.product_id');
			$query = $this->db->get();
			return $query->result();
    }



	
    
}

/* End of file supplier_model.php */
/* Location: ./application/models/supplier_model.php */