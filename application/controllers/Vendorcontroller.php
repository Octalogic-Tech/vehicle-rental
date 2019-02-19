<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendorcontroller extends CI_Controller {

	public function index()
	{
		$this->load->view('vendor/Vendor_booking_view');
	}


	public function Display_vendor_booking(){

		$this->load->view('vendor/Vendor_booking_view');
	}

	public function Display_addvehicle(){

		$this->load->view('vendor/Vendor_addvehicle_view');
	}

	public function Display_accountdetails(){

		$this->load->view('vendor/Vendor_accountdetails_view');
	}

}