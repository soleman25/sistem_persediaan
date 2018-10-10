<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('1') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
		$this->load->model('supplier_model');
		$this->load->model('product_model');
	}

	public function index()
	{
		$data['suppliers'] = $this->supplier_model->all_supplier();
		$this->template->load('template','admin/supplier/index',$data);
	}

	// public function create()
	// {
	// 	$this->template->load('template','admin/supplier/create');
	// }

	public function store()
	{
		date_default_timezone_set("Asia/jakarta");
		$this->form_validation->set_rules('kode_supplier','Supplier Code','required');
		$this->form_validation->set_rules('nma_supplier','Supplier Name','required');
		$this->form_validation->set_rules('alamat','Address','required');
		$this->form_validation->set_rules('tlp','Phone','required');
		//$this->form_validation->set_rules('userfile','image error','required');	
		
		if ($this->form_validation->run() == FALSE)
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
			redirect('admin/supplier'); 
			}

		else{
				// if form_validation = true  -> insert into db
					$data_supplier = array
					(
						'kode_supplier'			=> set_value('kode_supplier'),
						'nma_supplier'			=> set_value('nma_supplier'),
						'alamat'			    => set_value('alamat'),
						'tlp'   			    => set_value('tlp'),
					);//end array data_products
					
					if($this->supplier_model->create($data_supplier))
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
							redirect('admin/supplier'); 
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
						      <b>Supplier data Successfully saved</b> 
						    </div>
						    </div>');
							
                         redirect('admin/supplier');
                        }
						
			} //end if uploading 
		
	}///end class create ///

	public function delete($supplier_id)
	{
		$this->supplier_model->delete($supplier_id);
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
		redirect(base_url('admin/supplier'));
	}

	public function edit($supplier_id)
	{
		$data['shows'] = $this->supplier_model->get_supplier($supplier_id);
		$this->template->load('template','admin/supplier/edit',$data);  
	}

	public function update($supplier_id)
	{
		date_default_timezone_set("Asia/jakarta");
		$this->form_validation->set_rules('kode_supplier','Supplier Code','required');
		$this->form_validation->set_rules('nma_supplier','Supplier Name','required');
		$this->form_validation->set_rules('alamat','Packing','required');
		$this->form_validation->set_rules('tlp','Unit','required');
		
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
							redirect('admin/supplier/edit'); 
		}
		else{
				// if form_validation = true  -> insert into db
					$data_supplier = array
					(
						'kode_supplier'			=> set_value('kode_supplier'),
						'nma_supplier'			=> set_value('nma_supplier'),
						'alamat'			    => set_value('alamat'),
						'tlp'   			    => set_value('tlp'),
						'update_at'             => date("Y-m-d H:i"),
					);//end array data_products
					
					if($this->supplier_model->update($supplier_id,$data_supplier))
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
							
                         redirect('admin/supplier');
                        }
			} 
	}

	public function view($supplier_id)
	{		
		$data['shows'] = $this->supplier_model->get_supplier($supplier_id);
		$data['products'] = $this->supplier_model->get_product_by_supplier($supplier_id);
		$this->template->load('template','admin/supplier/view',$data); 
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */