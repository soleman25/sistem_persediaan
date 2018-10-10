<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {

	public function search_order()  
    {  
      $cari = $this->input->GET('cari', TRUE);
	  $data = $this->db->query("SELECT * from faktur where periode like '%$cari%' ");
	  return $data->result();    
    }


}

/* End of file request_model.php */
/* Location: ./application/models/request_model.php */