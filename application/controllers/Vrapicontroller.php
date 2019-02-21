<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vrapicontroller extends CI_Controller {


	public function index(){
		$this->load->view('api/vr_api_view');		
	}

	public function customerRegister(){

		$this->load->model('Vr_api_model');

		$email = $this->input->post('email');
		$password =password_hash($this->input->post('password'),PASSWORD_DEFAULT);


		$fname =$this->input->post('firstname');
		$lname =$this->input->post('lastname');
		$contact =$this->input->post('contact');
		$arr = array(
			'email' => $email,
			'password' => $password,
			'type' => 'customer'
		);

		$info = array(
			'firstname' => $fname,
			'lastname' => $lname,
			'contact' => $contact
		);


		$data=$this->Vr_api_model->register_customer($arr,$info);

		$json = json_encode($data,JSON_PRETTY_PRINT);
		print_r($json);

	}

	public function customer_vehicles_list()
	{
		$this->load->model('Vr_api_model');
		$counter=$this->input->post('count');
		// $counter = 0;

		$limit = 10;
		if ($counter <= 0) {
			$start = 0;
		}
		else {
			$start = $limit * $counter;
			$start;
		}
		
		$arr=$this->Vr_api_model->return_customer_vehicles_list($limit,$start);

		$mod_arr;

		for ($i=0; $i<sizeof($arr); $i++) {

			$vehicleArray[$i]['name'] = $arr[$i]['name'];
			$vehicleArray[$i]['brand'] = $arr[$i]['brand'];
			$vehicleArray[$i]['type'] = $arr[$i]['type'];
			$vehicleArray[$i]['categories'] = $arr[$i]['categories'];

			$vendorArray[$i]['firstname'] = $arr[$i]['firstname'];
			$vendorArray[$i]['lastname'] = $arr[$i]['lastname'];
			$vendorArray[$i]['place'] = $arr[$i]['place'];

			$mod_arr[$i]['id'] = $arr[$i]['id'];
			$mod_arr[$i]['vehicleInfo'] = $vehicleArray[$i];
			$mod_arr[$i]['vendorInfo'] = $vendorArray[$i];
			$mod_arr[$i]['colorName'] = $arr[$i]['colorName'];
			$mod_arr[$i]['rate'] = $arr[$i]['rate'];
		}


		
		$json = json_encode($mod_arr, JSON_PRETTY_PRINT);
		print_r($json);

	}
}
