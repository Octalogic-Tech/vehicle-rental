<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->return_vendors();
		$this->load->view('display_vendor_view',$data);
			//echo "<pre>";
			//print_r($data);
			//echo "</pre>";
	}

	public function update(){

	//	$id=$this->input->get('id');
		//$this->load->view('display_vendor_view');
		echo "hey";

	
	
	}
		//$this->load->model
	
		//$this->load->model(Vendor_model);
	

}
