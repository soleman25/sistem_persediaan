<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_model extends CI_Model {

	public function ambil_product($data)  
    {  
      $this->db->insert('pengambilan', $data);     
    }
 //    public function check_stok()
 //  {
 //      //if the user try to login and his account is not acctive

 //      $product_id = set_value('product_id');
 //      $stok       = set_value('qty');

	// $gry = $this->db->where('product_id',$product_id)
 //              ->where('stok =>',$stok)
 //              ->limit(1)
 //              ->get('products');
 //      if($gry->num_rows() > 1)
 //      {
 //        return $gry->row(); 
 //      }else{
 //          return array();
 //      }      
    
 //  }

}

/* End of file internal_model.php */
/* Location: ./application/models/internal_model.php */