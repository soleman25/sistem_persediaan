<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('1') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
		$this->load->model('product_model');
	}

	public function index()
	{
		$data['suppliers'] =$this->product_model->get_supplier();
		$data['products'] = $this->product_model->all_product();
		$this->template->load('template','admin/product/index',$data);
	}

	// public function create()
	// {
	// 	$data = array('suppliers'=>$this->product_model->get_supplier());
	// 	$this->template->load('template','admin/product/create',$data);
	// }

	public function store()
	{
		date_default_timezone_set("Asia/jakarta");

		$this->form_validation->set_rules('kode_product','Product Code','required');
		$this->form_validation->set_rules('nma_product','Product Name','required');
		$this->form_validation->set_rules('packing','Packing','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('supplier_id','supplier_id');
		
		//$this->form_validation->set_rules('userfile','image error','required');	
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',
							'<div class="alert alert-danger">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>please try again !</b> 
						    </div>
						    </div>');  
							redirect('admin/master_product'); 
		}
		else{
				// if form_validation = true  -> insert into db
					$data_product = array
					(
						'kode_product'			=> set_value('kode_product'),
						'nma_product'			=> set_value('nma_product'),
						'packing'			    => set_value('packing'),
						'unit'   			    => set_value('unit'),
						'supplier_id'   	    => set_value('supplier_id'),
						'create_at'             => date("Y-m-d H:i"),
					);//end array data_products
					
					if($this->product_model->create($data_product))
						{
							$this->session->set_flashdata('message',
							'<div class="alert alert-danger">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>please try again</b> 
						    </div>
						    </div>');  
							redirect('admin/master_product'); 
						}

					else
						{ 
							$this->session->set_flashdata('message',
							'<div class="alert alert-success">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">check</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>Product data Successfully saved</b> 
						    </div>
						    </div>');
							
                         redirect('admin/master_product');
                        }
			} 
	}

	public function delete($product_id)
	{
		$this->product_model->delete($product_id);
		$this->session->set_flashdata('message',
							'<div class="alert alert-success">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">check</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>Supplier data was Successfully Deleted</b> 
						    </div>
						    </div>');
		redirect(base_url('admin/master_product'));
	}

	public function edit($product_id)
	{
		$data = array('suppliers'=>$this->product_model->get_supplier());
		$data['shows'] = $this->product_model->get_product($product_id);
		$this->template->load('template','admin/product/edit',$data);  
	}

	public function update($product_id)
	{
		date_default_timezone_set("Asia/jakarta");
		$this->form_validation->set_rules('supplier_id','Suppliers Id','required');
		$this->form_validation->set_rules('kode_product','Product Code','required');
		$this->form_validation->set_rules('nma_product','Product Name','required');
		$this->form_validation->set_rules('packing','Packing','required');
		$this->form_validation->set_rules('unit','Unit','required');
		// $this->form_validation->set_rules('supplier_id','supplier_id');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',
							'<div class="alert alert-danger">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>please try again</b> 
						    </div>
						    </div>');  
							redirect('admin/master_product/edit'); 
		}
		else{
				// if form_validation = true  -> insert into db
					$data_product = array
					(
						'supplier_id'			=> set_value('supplier_id'),
						'kode_product'			=> set_value('kode_product'),
						'nma_product'			=> set_value('nma_product'),
						'packing'			    => set_value('packing'),
						'unit'   			    => set_value('unit'),
						// 'supplier_id'   	    => set_value('supplier_id'),
						'update_at'             => date("Y-m-d H:i"),
					);//end array data_products
					
					if($this->product_model->update($product_id,$data_product))
						{
							$this->session->set_flashdata('message',
							'<div class="alert alert-danger">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>please try again</b> 
						    </div>
						    </div>');  
							redirect('admin/master_product/edit'); 
						}

					else
						{ 
							$this->session->set_flashdata('message',
							'<div class="alert alert-success">
						     <div class="container-fluid">
							  <div class="alert-icon">
								<i class="material-icons">check</i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							  </button>
						      <b>Edit Product Successfully</b> 
						    </div>
						    </div>');
							
                         redirect('admin/master_product');
                        }
			} 
	}

	public function view($product_id)
	{		
		$data['products']  = $this->product_model->get_product_by_id($product_id);
		$this->template->load('template','admin/product/view',$data); 
	}
		

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */