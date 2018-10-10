<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class request_order extends CI_Controller {
public function __construct()
{
	parent::__construct();
	if($this->session->userdata('roles')!=	('1') )
	{
		$this->session->set_flashdata('messsage','Maaf anda belum Login !');
		redirect(base_url());
	}
	$this->load->model('order_model');
	$this->load->model('supplier_model');
	$this->load->model('product_model');
	$this->load->model('Request_model');
	 
}
	public function index()
	{
		$data = array('suppliers'=>$this->product_model->get_supplier());
        $data['products'] = $this->order_model->all_product();
        $data['fakturs'] = $this->order_model->all_faktur();
        $data['cari'] = $this->Request_model->search_order();
		$this->template->load('template','admin/request_order/index',$data);
	}
	public function find()
	{
		$data['cari'] = $this->Request_model->search_order();
		$this->template->load('template','admin/request_order/view',$data);
	}

	

	
	


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */