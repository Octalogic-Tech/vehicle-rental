<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {

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
		$this->load->view('admin/admin_vendor_view',$data);
		//$data['page_title'] = 'your page title'; //will be available as $page_title in view

		//$this->load->view('admin/Admin_home');
			//echo "<pre>";
			//print_r($data);
			//echo "</pre>";
	}

	public function update(){
		$id=$this->input->post('id');
		//$id=$this->input->get('id');
		if($id== NULL)
		{
			echo "ID value is NULL";
		}
		else
		{
			$this->load->model('Vendor_model');
			$data=$this->Vendor_model->update_status($id);
			//$data['userArray']=$this->Vendor_model->update_status();
			print_r($data['activeStatus']);
			//$this->load->view('Display_vendor_view',$data);

			
		}

	}

	public function Launch_add_brand_view(){
		$this->load->view('admin/Admin_addbrand_view');

	}


	public function insert_brand(){

		$this->load->helper('url');
		/*$this->load->library('form_validation');
		$this->form_validation->set_rules("brandname","Brand Name", 'required|alpha');

		if($this->form_validation->run())
		{
			$this->load->model("main_model");
		}*/

		 $data = array(  
                       'name'     => $this->input->post('brandname'),  
                        );  

		 $this->load->model('Vendor_model');
		 $insert_id=$this->Vendor_model->insert_branddata($data);

		 $array = $this->array_push_assoc($data, 'id', $insert_id);

		 $myJSON=json_encode($array);
		 echo $myJSON;


		 //echo $data['name'];
  
       // redirect('Mycontroller/Launch_add_brand_view');  

	}

	function array_push_assoc($array, $key, $value){
		 $array[$key] = $value;
		 return $array;
	}



		//$this->load->model
	
		//$this->load->model(Vendor_model);
	
	public function Display_vehiclebrand(){
		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->get_vehiclebrands();
		$this->load->view('admin/Admin_addbrand_view',$data);

	}

	

	public function Change_brandstatus(){
			$id=$this->input->post('id');
			$this->load->model('Vendor_model');
			$data=$this->Vendor_model->Update_brandstatus($id);
			//$data['userArray']=$this->Vendor_model->update_status();
			print_r($data['status']);
	}

	public function Change_brandname(){


		$this->load->helper('url');
		//$id= $this->input->post('id');
	
		//$name =$this->input->post('brandname');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'name'     => $this->input->post('brandname'),  
                        );


		$this->load->model('Vendor_model');
		$array=$this->Vendor_model->Update_brandname($data);
		//echo $data['name'];
		 $myJSON=json_encode($array);
		 echo $myJSON;

	}


/*--------------------------------------Category------------------------------------*/

	public function Display_vehiclecategory(){
		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->get_vehiclecategory();
		$this->load->view('admin/Admin_addcategory_view',$data);

	}


	public function Insert_category(){

		$this->load->helper('url');
		$data = array(  
                       'name'     => $this->input->post('category'),  
                     );  
		$this->load->model('Vendor_model');
		$insert_id=$this->Vendor_model->insert_categorydata($data);
		$array = $this->array_push_assoc($data, 'id', $insert_id);
		$myJSON=json_encode($array);
		echo $myJSON;
	}

	

	public function Change_category(){
		$this->load->helper('url');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'name'     => $this->input->post('category'),  
                        );

		$this->load->model('Vendor_model');
		$array=$this->Vendor_model->Update_category($data);
		$myJSON=json_encode($array);
		echo $myJSON;

	}

	

	public function Change_categorystatus(){
		$id=$this->input->post('id');
		$this->load->model('Vendor_model');
		$data=$this->Vendor_model->Update_categorystatus($id);
		print_r($data['status']);
	}



	/*--------------------------------------Type------------------------------------*/

	public function Display_vehicletype(){
		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->get_vehicletype();
		$data['catArray']=$this->Vendor_model->get_activecategory();
		$this->load->view('admin/Admin_addtype_view',$data);

	}


	public function Insert_type(){

		$this->load->helper('url');
		$data = array( 'id_vehicleCategories'     => $this->input->post('categoryid'),
                       'type'     => $this->input->post('type'),


                     );  
		$this->load->model('Vendor_model');
		$array=$this->Vendor_model->insert_typedata($data);
		//print_r($array);
		//$array = $this->array_push_assoc($data, 'id', $insert_id);
		//$myJSON=json_encode($array);
		//echo $myJSON;
		$myJSON=json_encode($array);
		echo $myJSON;
		//echo $array;
	}

	public function Change_type(){
		$this->load->helper('url');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'type'     => $this->input->post('type'),  
                        );

		$this->load->model('Vendor_model');
		$array=$this->Vendor_model->Update_type($data);
		$myJSON=json_encode($array);
		echo $myJSON;

	}

	public function Change_typestatus(){
		$id=$this->input->post('id');
		$this->load->model('Vendor_model');
		$data=$this->Vendor_model->Update_typestatus($id);
		print_r($data['status']);
	}



	/*-------------------------------NAME-----------------------------------*/

	public function Display_vehiclename(){
		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->get_vehiclename();
		//$data['catArray']=$this->Vendor_model->get_activecategory();
		$this->load->view('admin/Admin_addtype_view',$data);

	}








}
