<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */