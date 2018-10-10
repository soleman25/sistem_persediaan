<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('2') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
		$this->load->model('product_model');
		$this->load->model('report_model');
	}

	public function index()
	{
		$data['products'] = $this->product_model->all_product();
		$data['record']=  $this->report_model->laporan_default_stok();
		$this->template->load('template','om/product/index',$data);
	}

	public function view($product_id)
	{		
		$data['products']  = $this->product_model->get_product_by_id($product_id);
		$data['record']=  $this->report_model->laporan_default_stok();
		$this->template->load('template','om/product/view',$data); 
	}
		
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */