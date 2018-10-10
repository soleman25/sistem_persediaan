<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
    public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('3') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
        $this->load->model('supplier_model');
        $this->load->model('product_model');
        $this->load->model('order_model');
        $this->load->model('recived_model');
        $this->load->model('internal_model');
         $this->load->model('retur_model');
        $this->load->helper('url');
		
	
	}
	public function index()
	{
		
        $data['fakturs'] = $this->order_model->all_faktur();
		$this->template->load('template','supplier/dashboard',$data);
	}

	public function view($faktur_id)
    {
        
        $data['orders'] = $this->order_model->get_order_by_id($faktur_id);
        $this->template->load('template','supplier/view',$data);
    }

     public function print_faktur($faktur_id)
    {
        $data['orders'] = $this->order_model->get_order_by_id($faktur_id);
        $this->template->load('template','supplier/print_faktur',$data);   
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */