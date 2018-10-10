<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('2') )
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
         $this->load->model('report_model');
        $this->load->helper('url');
		
	
	}
public function retur()
    {
        $data = array('suppliers'=>$this->product_model->get_supplier());
        $data['products'] = $this->order_model->all_product();
        $data['fakturs'] = $this->retur_model->all_faktur();
        $data['orders'] = $this->order_model->all_order();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/retur/index',$data);   
    }
public function create_faktur_retur()
    {
        $data=array(
                    'supplier_id' => set_value('supplier_id'),
                    'nama'        => set_value('nama'),
                    'status'       => 0,
                    'periode'      => date_format(date_create($this->input->post('periode')),'y-m-d'),

        );
           // $this->cart->insert($data);
        $this->retur_model->create_faktur($data);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur Successfully Created</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/retur'));
    }

    public function store_retur($faktur_id)
    {
        
        $data = array(
                    'product_id' => set_value('product_id'),
                    'supplier_id'=> set_value('supplier_id'),
                    'faktur_id'  => set_value('faktur_id'),
                    'qty'        => set_value('qty'),
                    'tgl_retur'  => date("Y-m-d H:i"),
                    'keterangan' => set_value('keterangan'),
            );
        $this->retur_model->save($data);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>retur data was Successfully saved</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/input_product_retur/'.$faktur_id)); 
    }

    public function remove_retur($retur_id)
    {
        $this->retur_model->remove($retur_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully Deleted</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/retur'));
    }
  public function internal_requestion()
    {
        $data['products'] = $this->order_model->all_product();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/internal_requestion/index',$data);   
    }

    public function ambil()
    {
      $this->form_validation->set_rules('product_id', 'Nama Product', 'required');
      $this->form_validation->set_rules('qty', 'qty', 'required');

      if($this->form_validation->run()  ==  FALSE){ 
      $this->session->set_flashdata('message','<div class="alert alert-warning text-center">
        <div class="alert-icon"><i class="material-icons">Warning it!</i></div>
        Please Try again <button type="button" class="close" data-dismiss="alert" arial-label="close"> 
          <span aria-hidden="true">&times;</span>
        </button>Wrong !! Please Try Again
        </div>');

      redirect(base_url('om/transaction/internal_requestion'));

      }else{

     
        $data = array(
                    
                    'product_id' => set_value('product_id'),
                    'qty'        => set_value('qty'),
                    'tgl'        => date("Y-m-d H:i"),
            );
        $this->internal_model->ambil_product($data);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b> data was Successfully saved</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/internal_requestion')); 
    }
  }


  public function recived()
    {
        $data = array('suppliers'=>$this->product_model->get_supplier());
        $data['products'] = $this->order_model->all_product();
        $data['fakturs'] = $this->order_model->all_faktur();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/recived/index',$data);   
    }

    public function recived_product($faktur_id)
    {
        $data['fakturs'] = $this->order_model->get_supplier_by_faktur($faktur_id);
        $data['orders'] = $this->order_model->get_order_by_id($faktur_id);
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/recived/view',$data);
    }

  public function simpan($order_id)
    {
        
        $order=$this->recived_model->get_order($order_id);
        $data = array(
            'order_id'      => $order->order_id,
            'qty'           => $order->qty,
            'product_id'   => $order->product_id,
            'faktur_id'    => $order->faktur_id,
            'sttus'        => 1,
            'tgl_recived'  => date("Y-m-d H:i"),
            );
        $this->recived_model->input_product($data);
        $this->recived_model->status_product($order_id,$data);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully saved</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/recived_product/'.$order->faktur_id)); 
    }

    public function sent_retur($faktur_id)
    {
        $this->retur_model->status($faktur_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully Deleted</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/retur'));
    }

    public function sent($faktur_id)
    {
        $this->order_model->status($faktur_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully Deleted</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/order'));
    }
  

    public function order()
    {
        $data = array('suppliers'=>$this->product_model->get_supplier());
        $data['products'] = $this->order_model->all_product();
        $data['fakturs'] = $this->order_model->all_faktur();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/order/index',$data);   
    }

    public function create_faktur()
    {
        $data=array(
                    'supplier_id' => set_value('supplier_id'),
                    'nama'        => set_value('nama'),
                    'status'       => 0,
                    'periode'      => date_format(date_create($this->input->post('periode')),'y-m-d'),

        );
           // $this->cart->insert($data);
        $this->order_model->order($data);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur Successfully Created</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/order'));    }

    public function input_product_retur($faktur_id)
    {
        $data['fakturs'] = $this->order_model->get_supplier_by_faktur($faktur_id);
        $data['returs'] = $this->retur_model->get_retur_by_id($faktur_id);
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/retur/form_input',$data);  
    }
    public function input_product($faktur_id)
    {
        $data['fakturs'] = $this->order_model->get_supplier_by_faktur($faktur_id);
        $data['orders'] = $this->order_model->get_order_by_id($faktur_id);
        $data['report']=$this->product_model->get_data_stok();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/order/form_input',$data);  
    }
    

    

    public function store($faktur_id)
    {
    $data=array(
               
                    'faktur_id'  => set_value('faktur_id'),
                    'product_id' => set_value('product_id'),
                    'qty'        => set_value('qty'),
                    'tgl_order'  => date("Y-m-d H:i"),
               
        );
           // $this->cart->insert($data);
        $this->order_model->input_product($data,$faktur_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>Add Product Successfully </b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/input_product/'.$faktur_id));
  }

  public function delete($faktur_id)
    {
        $this->order_model->delete_faktur($faktur_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully Deleted</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/order'));
    }

    public function remove($order_id)
    {
        $this->order_model->remove($order_id);
        $this->session->set_flashdata('message',
                            '<div class="alert alert-success">
                             <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">check</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>faktur data was Successfully Deleted</b> 
                            </div>
                            </div>');
        redirect(base_url('om/transaction/order'));
    }

    public function view($faktur_id)
    {
        
        $data['orders'] = $this->order_model->get_order_by_id($faktur_id);
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/transaction/order/view',$data);
    }

    function sendemail($email){  
    // configure the email setting  
      $config['protocol'] = 'smtp';  
      $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
      $config['smtp_port'] = '465'; //smtp port number  
      $config['smtp_user'] = 'solemanpranata@gmail.com';  
      $config['smtp_pass'] = 'fatamorgana'; //$from_email password  
      $config['mailtype'] = 'html';  
      $config['charset'] = 'iso-8859-1';  
      $config['wordwrap'] = TRUE;  
      $config['newline'] = "\r\n"; //use double quotes  
      $this->email->initialize($config);   
      $this->email->from('solemanpranata@gmail.com', 'Pizza hut Administator');  
      $this->email->to($email);   
      $this->email->subject('Notification Order');  
      $message = "<html>
                  <head>
                  <head>
                  </head>
                  <body>
                  <p>Hi,</p>
                  <p>Supplier</p>
                  <p>Ada permintaan Order dari outlet PHD</p><br/><p>Sincerely,</p><p>Soleman </p></body></html>";  
      $this->email->message($message);  
      return $this->email->send();  
    }  
    
      
    
}

/* End of file Controllername.php */
