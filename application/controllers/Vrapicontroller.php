<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vrapicontroller extends CI_Controller {

	public function index()
	{
		
	}

	public function customer_vehicles_list()
	{
		$this->load->model('Vr_api_model');
		
		$arr=$this->Vr_api_model->return_customer_vehicles_list();
		$data["json"] = json_encode($arr, JSON_PRETTY_PRINT);

		$this->load->view('api/vr_api_view',$data);
	}
}
