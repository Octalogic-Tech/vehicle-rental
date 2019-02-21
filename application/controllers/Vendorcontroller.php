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

		$this->load->model('Vendor_model');
		
		$data['nameArray']=$this->Vendor_model->vehiclenameData();
		$data['colorArray']=$this->Vendor_model->colorData();
    $data['vehicleArray']=$this->Vendor_model->get_vehicleData();
		$this->load->view('vendor/Vendor_addvehicle_view',$data);
	}


	public function Add_vehicle(){

		 $data_vehicle = array( 
                       'id_vendors'        => 1,
                       'id_vehicleNames' => $this->input->post('nameid'),
                       'ratePerDay'   => $this->input->post('rate'),
                       'id_colors'   => $this->input->post('colorid'),


                        );  

      if(isset($_FILES["image_file"]["name"]))
      {

        $date = date_create();
        $min=5;
        $max=10;
        $config['upload_path']='./upload';
        $config['allowed_types']='jpg|jpeg|png|gif';
        $config['max_size']     = '2048';
        $config['file_name']=mt_rand().'vehicle'.date_timestamp_get($date);
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('image_file'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
          $data=$this->upload->data();
         
          $path_image='upload/'.$data["file_name"];
          $data_vehicle=$this->array_push_assoc($data_vehicle, 'images', $path_image);
          $data_image = array( 
                       'image'        => $path_image,
                        );

          $this->load->model('Vendor_model');
          $array=$this->Vendor_model->Create_vehicle($data_vehicle,$data_image);

          
          
         $data_vehicle=$this->array_push_assoc($data_vehicle, 'flag', $array['flag']);
         $flag=$array['flag'];
         if($flag==true)
         {
           $vehicle_details=$this->Vendor_model->get_recentVehicleDetails($array['id']);
           $vehicle_details=$this->array_push_assoc($vehicle_details, 'flag', $array['flag']);
          // print_r($vehicle_details);
           $myJSON=json_encode($vehicle_details);
           echo $myJSON;
         }
         else{
            //$trans_message=$array['message'];
            //echo $trans_message;
            $myJSON=json_encode($data_vehicle);
            echo $myJSON;
         }



        }
      }
	}

  function Update_vehicle(){

         $data_vehicle1 = array( 
                       'id'              => $this->input->post('id'),
                       'id_vehicleNames' => $this->input->post('nameid1'),
                       'ratePerDay'      => $this->input->post('rate1'),
                       'id_colors'       => $this->input->post('colorid1'),
                        );
          $this->load->model('Vendor_model');
          $array=$this->Vendor_model->vehicle_updatedetails($data_vehicle1);

          $myJSON=json_encode($array);
          echo $myJSON;  

  }

	function array_push_assoc($array, $key, $value){
         $array[$key] = $value;
         return $array;
    }

	public function Display_accountdetails(){


		$vendor_id=1;
		$this->load->model('Vendor_model');
		$data['userArray']=$this->Vendor_model->get_accountdetails($vendor_id);
		$data['localityArray']=$this->Vendor_model->localityData();
		$this->load->view('vendor/Vendor_accountdetails_view',$data);

		//$this->load->view('vendor/Vendor_accountdetails_view');
	}


  public function Change_Vehiclestatus(){

      $id=$this->input->post('id');
      $this->load->model('Vendor_model');
      $data=$this->Vendor_model->Vehicle_delete($id);
      print_r($data['status']);

  }

}