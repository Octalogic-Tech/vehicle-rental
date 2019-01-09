<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainctrl extends CI_Controller {

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
?>
