<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('2') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect('auth/login');
		}
		$this->load->model('product_model');
		$this->load->model('report_model');
	}
	public function index()
	{
		$data['report']=$this->product_model->get_data_stok();
		$data['record']=  $this->report_model->laporan_default_stok();
		$this->template->load('template','om/dashboard',$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */