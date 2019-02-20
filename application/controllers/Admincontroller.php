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
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->return_vendors();
		$data['localityArray']=$this->Admin_model->localityData();
		$this->load->view('admin/Admin_addvendor_view',$data);
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
			$this->load->model('Admin_model');
			$data=$this->Admin_model->update_status($id);
			//$data['userArray']=$this->Admin_model->update_status();
			print_r($data['activeStatus']);
			//$this->load->view('Display_vendor_view',$data);

			
		}

	}

	public function Add_vendor(){
		 $this->load->helper('url');

        $email_id=$this->input->post('vemail');
        $locality_id=$this->input->post('vlocality');
        $data_login = array( 
                       'email'       => $email_id,
                       'password'    => password_hash($this->input->post('vpassword'),PASSWORD_DEFAULT),
                       'type'     => 'vendor',

                        );

        $data_vendor = array( 
                       'firstname'   => $this->input->post('vfname'),
                       'lastname'    => $this->input->post('vsname'),
                       'contact'     => $this->input->post('vnumber'),
                       'address'     => $this->input->post('vaddress'),
                       'latitude'    => $this->input->post('vlatitude'),
                       'longitude'   => $this->input->post('vlongitude'),
                       'id_locality' => $this->input->post('vlocality'),
                        );  
         $this->load->model('Admin_model');
         $locality_name=$this->Admin_model->get_localityname($locality_id);
         //print_r($locality_name);
         $array=$this->Admin_model->Create_vendor($data_login,$data_vendor);
         
         $data_vendor=$this->array_push_assoc($data_vendor, 'flag', $array['flag']);
         $data_vendor=$this->array_push_assoc($data_vendor, 'place', $locality_name['place']);
         //print_r($data_vendor);
         $flag=$array['flag'];
         if($flag==true)
         {
           $vendor_array = $this->array_push_assoc($data_vendor, 'id', $array['id']);
           $vendor_array = $this->array_push_assoc($vendor_array, 'email_id', $email_id);
           $myJSON=json_encode($vendor_array);
           echo $myJSON;
         }
         else{
            //$trans_message=$array['message'];
            //echo $trans_message;
            $myJSON=json_encode($data_vendor);
            echo $myJSON;
         }

	}


	function Update_vendor(){


		$this->load->helper('url');
    	$email_id=$this->input->post('vemail1');
    	$data_login1 = array(

                        'id'  =>  $this->input->post('id'),
                        'email'     => $this->input->post('vemail1'),

                        );

    	$data_vendor1 = array( 
                       'id'          => $this->input->post('id'),
                       'firstname'   => $this->input->post('vfname1'),
                       'lastname'    => $this->input->post('vsname1'),
                       'contact'     => $this->input->post('vnumber1'),
                       'address'     => $this->input->post('vaddress1'),
                       'latitude'    => $this->input->post('vlatitude1'),
                       'longitude'   => $this->input->post('vlongitude1'),
                       'id_locality' => $this->input->post('locid1'),
                        ); 
    	$idlocality=$this->input->post('locid1');
    	 $this->load->model('Admin_model');
    	$locality_name=$this->Admin_model->get_localityname($idlocality);
    	$array=$this->Admin_model->Update_vendordetails($data_login1,$data_vendor1);
    	$array1 = $this->array_push_assoc($array, 'email_id', $email_id);
    	$array1 = $this->array_push_assoc($array1, 'locality_name', $locality_name['place']);
    	//echo $data['name'];
     	$myJSON=json_encode($array1);
     	echo $myJSON;

	}

 public function Change_Vendorstatus(){

      $id=$this->input->post('id');
      $this->load->model('Admin_model');
      $data=$this->Admin_model->Vendor_delete($id);
      print_r($data['status']);
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

		 $this->load->model('Admin_model');
		 $insert_id=$this->Admin_model->insert_branddata($data);

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
	
		//$this->load->model(Admin_model);
	
	public function Display_vehiclebrand(){
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_vehiclebrands();
		$this->load->view('admin/Admin_addbrand_view',$data);

	}

	

	public function Change_brandstatus(){
			$id=$this->input->post('id');
			$this->load->model('Admin_model');
			$data=$this->Admin_model->Update_brandstatus($id);
			//$data['userArray']=$this->Admin_model->update_status();
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


		$this->load->model('Admin_model');
		$array=$this->Admin_model->Update_brandname($data);
		//echo $data['name'];
		 $myJSON=json_encode($array);
		 echo $myJSON;

	}


/*--------------------------------------Category------------------------------------*/

	public function Display_vehiclecategory(){
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_vehiclecategory();
		$this->load->view('admin/Admin_addcategory_view',$data);

	}


	public function Insert_category(){

		$this->load->helper('url');
		$data = array(  
                       'name'     => $this->input->post('category'),  
                     );  
		$this->load->model('Admin_model');
		$insert_id=$this->Admin_model->insert_categorydata($data);
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

		$this->load->model('Admin_model');
		$array=$this->Admin_model->Update_category($data);
		$myJSON=json_encode($array);
		echo $myJSON;

	}

	

	public function Change_categorystatus(){
		$id=$this->input->post('id');
		$this->load->model('Admin_model');
		$data=$this->Admin_model->Update_categorystatus($id);
		print_r($data['status']);
	}



	/*--------------------------------------Type------------------------------------*/

	public function Display_vehicletype(){
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_vehicletype();
		$data['catArray']=$this->Admin_model->get_activecategory();
		$this->load->view('admin/Admin_addtype_view',$data);

	}


	public function Insert_type(){

		$this->load->helper('url');
		$data = array( 'id_vehicleCategories'     => $this->input->post('categoryid'),
                       'type'     => $this->input->post('type'),


                     );  
		$this->load->model('Admin_model');
		$array=$this->Admin_model->insert_typedata($data);
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

		$this->load->model('Admin_model');
		$array=$this->Admin_model->Update_type($data);
		$myJSON=json_encode($array);
		echo $myJSON;

	}

	public function Change_typestatus(){
		$id=$this->input->post('id');
		$this->load->model('Admin_model');
		$data=$this->Admin_model->Update_typestatus($id);
		print_r($data['status']);
	}



	/*-------------------------------NAME-----------------------------------*/

	public function Display_vehiclename(){
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_vehiclename();
		$data['brandArray']=$this->Admin_model->get_activebrand();
		$data['typeArray']=$this->Admin_model->get_activetype();

		$this->load->view('admin/Admin_addname_view',$data);

	}

	public function Change_namestatus(){
		$id=$this->input->post('id');
		$this->load->model('Admin_model');
		$data=$this->Admin_model->Update_namestatus($id);
		print_r($data['status']);
	}




	public function Insert_name(){

		$this->load->helper('url');
		$data = array( 

						'id_vehicleBrands'     => $this->input->post('brandid'),
						'id_vehicleTypes'     => $this->input->post('typeid'),
                      	'name'     => $this->input->post('name'),

                     );  
		$this->load->model('Admin_model');
		$array=$this->Admin_model->insert_namedata($data);
	
		$myJSON=json_encode($array);
		echo $myJSON;
		//echo "Success";

	}




public function Change_name(){
		$this->load->helper('url');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'name'     => $this->input->post('name'),  
                        );

		$this->load->model('Admin_model');
		$array=$this->Admin_model->Update_name($data);
		$myJSON=json_encode($array);
		echo $myJSON;

	}




	/*****************************LOCALITY*************************************/
	function Display_locality(){

		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_locality();
		$this->load->view('admin/admin_addlocality_view',$data);

	}

	function Change_localitystatus(){

		$id=$this->input->post('id');
		$this->load->model('Admin_model');
		$data=$this->Admin_model->Update_localitystatus($id);
		//$data['userArray']=$this->Admin_model->update_status();
		print_r($data['status']);
	}

	


		public function Change_locality(){


		$this->load->helper('url');
		//$id= $this->input->post('id');
	
		//$name =$this->input->post('brandname');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'place'     => $this->input->post('place'),  
                        );


		$this->load->model('Admin_model');
		$array=$this->Admin_model->Update_locality($data);
		//echo $data['name'];
		 $myJSON=json_encode($array);
		 echo $myJSON;

	}

	public function Insert_locality(){

		$this->load->helper('url');
		$data = array(  
                       'place'     => $this->input->post('locality_place'),  
                        );  

		 $this->load->model('Admin_model');
		 $insert_id=$this->Admin_model->insert_localitydata($data);

		 $array = $this->array_push_assoc($data, 'id', $insert_id);

		 $myJSON=json_encode($array);
		 echo $myJSON; 

	}

	/*************************Admin Add Vendor*********************************/



	function Display_vendor(){

		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->return_vendors();
		$data['localityArray']=$this->Admin_model->localityData();
		$this->load->view('admin/Admin_addvendor_view',$data);

	}

	function Display_vehiclecolor(){
		$this->load->model('Admin_model');
		$data['userArray']=$this->Admin_model->get_vehiclecolor();
		$this->load->view('admin/Admin_addcolor_view',$data);

	}
	function insert_color(){
		$this->load->helper('url');

		 $data = array(  
                       'colorName'     => $this->input->post('colorname'),  
                        );  

		 $this->load->model('Admin_model');
		 $insert_id=$this->Admin_model->insert_colordata($data);

		 $array = $this->array_push_assoc($data, 'id', $insert_id);

		 $myJSON=json_encode($array);
		 echo $myJSON;  

	}

	function Change_colorname(){


		$this->load->helper('url');
		//$id= $this->input->post('id');
	
		//$name =$this->input->post('brandname');
		$data = array(

						'id'	=>	$this->input->post('id'),
                      	'colorName'     => $this->input->post('colorname1'),  
                        );


		$this->load->model('Admin_model');
		$array=$this->Admin_model->Updatecolorname($data);
		//echo $data['name'];
		 $myJSON=json_encode($array);
		 echo $myJSON;

	}


	public function Change_colorstatus(){
			$id=$this->input->post('id');
			$this->load->model('Admin_model');
			$data=$this->Admin_model->Update_colorstatus($id);
			//$data['userArray']=$this->Admin_model->update_status();
			print_r($data['status']);
	}



}
