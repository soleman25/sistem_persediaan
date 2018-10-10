<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct ()
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
		 $data['report']=$this->product_model->get_data_order();
		$this->template->load('template','admin/dashboard',$data);
	}

}


/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */


