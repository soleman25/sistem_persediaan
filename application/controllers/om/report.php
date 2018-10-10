<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('roles')!=	('2') )
		{
			$this->session->set_flashdata('messsage','Maaf anda belum Login !');
			redirect(base_url());
		}
		$this->load->model('report_model');
        $this->load->model('product_model');
	
	}
     public function stok()
    {

        $data['record']=  $this->report_model->laporan_default_stok();
        $data['stock']=  $this->report_model->laporan_default_stock();
        $data['products'] = $this->product_model->all_product();
         $data['report']=$this->product_model->get_data_stok();
        $this->template->load('template','om/report/report_stok',$data);   
    }
     public function data_stok()
    {
        if(isset($_POST['submit']))
        {
            $product_id=  $this->input->post('product_id');
            $data['record']=  $this->report_model->laporan_default_stok();
            $data['stock']=  $this->report_model->laporan_default_stock();
            $data['products'] = $this->product_model->all_product();
            $data['report']=$this->product_model->get_data_stok();
            $data['stock']=  $this->report_model->laporan_periode_stok($product_id);
            $this->template->load('template','om/report/report_stok',$data);
        }
        else
        {
            $data['stock']=  $this->report_model->laporan_default_stock();
            $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_retur',$data);
        }
        
    }
     public function print_stok()
    {
        $data['stock']=  $this->report_model->laporan_default_stock();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/report/cetak_stok',$data);   
    }

    function pdf_stok()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->image('assets/img/logo_pizza.png', 10, 5, 33.10);
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Pizza Hut Delivery Mustika Jaya','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(12);
        $pdf->cell(40);
        $pdf->cell(0,10, 'Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 ','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(75);
        $pdf->cell(0,10, 'Data Stock Product','0',1,'c');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Code', 1,0);
        $pdf->Cell(60, 7, 'Product', 1,0);
        $pdf->Cell(50, 7, 'Packing', 1,0);
        $pdf->Cell(20, 7, 'Stock', 1,0);
        $pdf->Cell(20, 7, 'unit', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
         $data=  $this->report_model->laporan_default_stock();
        $i=0;
         foreach ($data as $stok ) :
        $i++;
        
            $pdf->Cell(10, 7, $i, 1,0);
            $pdf->Cell(27, 7, $stok->kode_product, 1,0);
            $pdf->Cell(60, 7, $stok->nma_product, 1,0);
            $pdf->Cell(50, 7, $stok->packing, 1,0);
            $pdf->Cell(20, 7, $stok->stok, 1,0);
            $pdf->Cell(20, 7, $stok->unit, 1,1);
            
        endforeach;
        // end
       
        $pdf->Output();
    }

    public function retur()
    {

        $data['retur']=  $this->report_model->laporan_default();
         $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/report/report_retur',$data);   
    }

    public function data_retur()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['retur']=  $this->report_model->laporan_periode($tanggal1,$tanggal2);
            $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_retur',$data);
        }
        else
        {
            
            $data['retur']=  $this->report_model->laporan_default();
            $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_retur',$data);
        }
        
    }
     public function print_retur()
    {
        $data['record']=  $this->report_model->laporan_default();
        $this->template->load('template','om/report/cetak_retur',$data);   
    }

    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->image('assets/img/logo_pizza.png', 10, 5, 33.10);
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Pizza Hut Delivery Mustika Jaya','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(12);
        $pdf->cell(40);
        $pdf->cell(0,10, 'Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 ','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(75);
        $pdf->cell(0,10, 'Data Retur Product','0',1,'c');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Retur Date', 1,0);
        $pdf->Cell(60, 7, 'Supplier Name', 1,0);
        $pdf->Cell(50, 7, 'Product Name', 1,0);
        $pdf->Cell(20, 7, 'qty', 1,0);
        $pdf->Cell(20, 7, 'unit', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=$this->report_model->laporan_default();
        $i=0;
        foreach ($data as $retur ) :
        $i++;
        
            $pdf->Cell(10, 7, $i, 1,0);
            $pdf->Cell(27, 7, $retur->tgl_retur, 1,0);
            $pdf->Cell(60, 7, $retur->nma_supplier, 1,0);
            $pdf->Cell(50, 7, $retur->nma_product, 1,0);
            $pdf->Cell(20, 7, $retur->qty, 1,0);
            $pdf->Cell(20, 7, $retur->unit, 1,1);
            
        endforeach;
        // end
       
        $pdf->Output();
    }

     public function order()
    {
         $data['record']=  $this->report_model->laporan_default_stok();
        $data['orders']=  $this->report_model->laporan_default_order();
        $this->template->load('template','om/report/report_order',$data);   
    }
    public function data_order()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
             $data['record']=  $this->report_model->laporan_default_stok();
            $data['orders']=  $this->report_model->laporan_periode_order($tanggal1,$tanggal2);
            $this->template->load('template','om/report/report_order',$data);
        }
        else
        {
             $data['record']=  $this->report_model->laporan_default_stok();
            $data['orders']=  $this->report_model->laporan_default_order();
            $this->template->load('template','om/report/report_order',$data);
        }
        
    }
    public function print_order()
    {
        $data['orders']=  $this->report_model->laporan_default_order();
        $this->template->load('template','om/report/cetak_order',$data);   
    }

    function pdf_order()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->image('assets/img/logo_pizza.png', 10, 5, 33.10);
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Pizza Hut Delivery Mustika Jaya','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(12);
        $pdf->cell(40);
        $pdf->cell(0,10, 'Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 ','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(75);
        $pdf->cell(0,10, 'Data order Product','0',1,'c');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(50, 7, 'Order Date', 1,0);
        $pdf->Cell(50, 7, 'Product Name', 1,0);
        $pdf->Cell(40, 7, 'qty', 1,0);
        $pdf->Cell(40, 7, 'unit', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=$this->report_model->laporan_default_order();
        $i=0;
        foreach ($data as $order ) :
        $i++;
        
            $pdf->Cell(10, 7, $i, 1,0);
            $pdf->Cell(50, 7, $order->tgl_order, 1,0);
            $pdf->Cell(50, 7, $order->nma_product, 1,0);
            $pdf->Cell(40, 7, $order->qty, 1,0);
            $pdf->Cell(40, 7, $order->unit, 1,1);
            
        endforeach;
        // end
       
        $pdf->Output();
    }

     

    public function internal_requestion()
    {
        $data['record']=  $this->report_model->laporan_default_stok();
        $data['report']=  $this->report_model->laporan_default_internal();
        $this->template->load('template','om/report/report_internal_requestion',$data);   
    }

    public function data_internal()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['report']=  $this->report_model->laporan_periode_internal($tanggal1,$tanggal2);
             $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_internal_requestion',$data);
        }
        else
        {
             $data['record']=  $this->report_model->laporan_default_stok();
            $data['report']=  $this->report_model->laporan_default_internal();
            $this->template->load('template','om/report/report_internal_requestion',$data);
        }
        
    }

    public function print_internal()
    {
        $data['report']=  $this->report_model->laporan_default_internal();
        $this->template->load('template','om/report/cetak_internal',$data);   
    }

    function pdf_internal()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->image('assets/img/logo_pizza.png', 10, 5, 33.10);
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Pizza Hut Delivery Mustika Jaya','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(12);
        $pdf->cell(40);
        $pdf->cell(0,10, 'Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 ','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Data Internal Requestion Product','0',1,'c');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(50, 7, 'Request Date', 1,0);
        $pdf->Cell(50, 7, 'Product Name', 1,0);
        $pdf->Cell(40, 7, 'qty', 1,0);
        $pdf->Cell(40, 7, 'unit', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=$this->report_model->laporan_default_internal();
        $i=0;
        foreach ($data as $order ) :
        $i++;
        
            $pdf->Cell(10, 7, $i, 1,0);
            $pdf->Cell(50, 7, $order->tgl, 1,0);
            $pdf->Cell(50, 7, $order->nma_product, 1,0);
            $pdf->Cell(40, 7, $order->qty, 1,0);
            $pdf->Cell(40, 7, $order->unit, 1,1);
            
        endforeach;
        // end
       
        $pdf->Output();
    }

    public function recived()
    {
        $data['recived']=  $this->report_model->laporan_default_recived();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/report/report_recived',$data);   
    }

    public function data_recived()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['recived']=  $this->report_model->laporan_periode_recived($tanggal1,$tanggal2);
            $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_recived',$data);
        }
        else
        {
            
            $data['recived']=  $this->report_model->laporan_default_recived();
            $data['record']=  $this->report_model->laporan_default_stok();
            $this->template->load('template','om/report/report_recived',$data);
        }
        
    }
    public function print_recived()
    {
        $data['recived']=  $this->report_model->laporan_default_recived();
        $data['record']=  $this->report_model->laporan_default_stok();
        $this->template->load('template','om/report/cetak_recived',$data);   
    }

    function pdf_recived()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->image('assets/img/logo_pizza.png', 10, 5, 33.10);
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(50);
        $pdf->cell(0,10, 'Pizza Hut Delivery Mustika Jaya','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(12);
        $pdf->cell(40);
        $pdf->cell(0,10, 'Ruko Villa Asri Blok A No. 21 Jl.Mustika Jaya, Bekasi Kota 17158 ','0',1,'c');
        $pdf->SetFont('Times','B','L');
        $pdf->SetFontSize(20);
        $pdf->cell(75);
        $pdf->cell(0,10, 'Data Recived Product','0',1,'c');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(50, 7, 'Recived Date', 1,0);
        $pdf->Cell(50, 7, 'Product Name', 1,0);
        $pdf->Cell(40, 7, 'qty', 1,0);
        $pdf->Cell(40, 7, 'unit', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=$this->report_model->laporan_default_recived();
        $i=0;
        foreach ($data as $order ) :
        $i++;
        
            $pdf->Cell(10, 7, $i, 1,0);
            $pdf->Cell(50, 7, $order->tgl_recived, 1,0);
            $pdf->Cell(50, 7, $order->nma_product, 1,0);
            $pdf->Cell(40, 7, $order->qty, 1,0);
            $pdf->Cell(40, 7, $order->unit, 1,1);
            
        endforeach;
        // end
       
        $pdf->Output();
    }
}

/* End of file Controllername.php */
