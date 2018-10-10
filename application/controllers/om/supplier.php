<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('2') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
		$this->load->model('supplier_model');
		$this->load->model('product_model');
		$this->load->model('report_model');
	}

	public function index()
	{
		$data['suppliers'] = $this->supplier_model->all_supplier();
		$data['record']=  $this->report_model->laporan_default_stok();
		$this->template->load('template','om/supplier/index',$data);
	}

	public function view($supplier_id)
	{		
		$data['shows'] = $this->supplier_model->get_supplier($supplier_id);
		$data['products'] = $this->supplier_model->get_product_by_supplier($supplier_id);
		$data['record']=  $this->report_model->laporan_default_stok();
		$this->template->load('template','om/supplier/view',$data); 
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */