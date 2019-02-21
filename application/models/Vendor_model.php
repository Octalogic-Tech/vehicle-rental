<?php


	class Vendor_model extends CI_Model{


		function get_accountdetails($vendor_id)
		{

			$this->load->database();
			//$query=$this->db->query("SELECT * from vendors");

			$this->db->select("v.id as id, v.id_login as id_login, v.firstname as firstname,v.lastname as lastname, v.contact as contact, v.address as address, v.id_locality as id_locality, v.latitude as latitude, v.longitude as longitude, v.activeStatus as activeStatus, l.place as locality_name, lo.email as email_id ");
			$this->db->from("vendors v");
			$this->db->join("localities l","l.id=v.id_locality","LEFT");
			$this->db->join("login lo","lo.id=v.id_login","LEFT");
			$this->db->where("v.activeStatus",1);
			$this->db->where("v.id",$vendor_id);
			$query=$this->db->get();
			return $query->result();

		}

		function localityData(){
			 $this->load->database();
			 $this->db->select('*');
			 $this->db->from('localities');
			 $this->db->where('status',1);
			 $locality=$this->db->get();
			 return $locality->result();
		}

		function vehiclenameData(){
			 $this->load->database();
			 $this->db->select('vn.id as vn_id, vn.name as vehicle_name');
			 $this->db->from('vehiclenames vn');
			 $this->db->where('status',1);
			 $vehiclename=$this->db->get();
			 return $vehiclename->result();
		}

		function colorData()
		{
			 $this->load->database();
			 $this->db->select('c.id as c_id, c.colorName as colorName');
			 $this->db->from('colors c');
			 $this->db->where('status',1);
			 $locality=$this->db->get();
			 return $locality->result();

		}


		function Create_vehicle($data_vehicle,$data_image){
        
		$this->load->database();
		$this->db->trans_start();

		$this->db->insert("vehiclesrent",$data_vehicle);
		/*$id_products = $this->db->insert_id();
		$array = $this->array_push_assoc($data_image, 'id_products', $id_products );
		$array = $this->array_push_assoc($array, 'image', $data_image['image']);

		//$array = $this->array_push_assoc($array, 'image', $data_image['image'].'_'.$id_products );
		$this->db->insert("images",$array);*/
		$id = $this->db->insert_id();

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
       		 $error = $this->db->error();
       		  $arr = array(
                "flag" => false,
                "message" => "Vehicle Add was Unsuccessful"
            );
       		  return $arr;
		}

		else
		{
			$arr = array(
                "flag" => true,
                "id" => $id
            );
            return $arr;
		}



	}

	function get_vehicleData(){

		$this->load->database();
		$this->db->select("v.id as vehicle_id,vn.name as vehicle_name, c.colorName as colorName, v.images AS image ,v.ratePerDay as rate");
		$this->db->from("vehiclesrent v");
		$this->db->join("vehiclenames vn","v.id_vehicleNames=vn.id","LEFT");
		$this->db->join("colors c","v.id_colors=c.id","LEFT");
		$this->db->where("v.status",1);
		$query=$this->db->get();
		return $query->result();

	}

	function get_recentVehicleDetails($id){

		$this->load->database();
		$this->db->select("v.id as vehicle_id,vn.name as vehicle_name, c.colorName as colorName, v.images AS image ,v.ratePerDay as rate");
		$this->db->from("vehiclesrent v");
		$this->db->join("vehiclenames vn","v.id_vehicleNames=vn.id","LEFT");
		$this->db->join("colors c","v.id_colors=c.id","LEFT");
		//$this->db->where("v.status",1);
		$this->db->where("v.id",$id);
		$query=$this->db->get();
		return $query->row_array();

	}


	function vehicle_updatedetails($data_vehicle1){


		$flag=0;
		$this->load->database();
		$this->db->select("*");
		$this->db->where('id',  $data_vehicle1['id']);
		$query2=$this->db->get("vehiclesrent");
		$data2=$query2->row_array();

		if(($data2['id_vehicleNames']!=$data_vehicle1['id_vehicleNames'])||($data2['id_colors']!=$data_vehicle1['id_colors'])||($data2['ratePerDay']!=$data_vehicle1['ratePerDay'])){
			$this->db->get("vehiclesrent");
			$this->db->where('id', $data_vehicle1['id']);
			$this->db->set('id_vehicleNames', $data_vehicle1['id_vehicleNames']);
			$this->db->set('id_colors', $data_vehicle1['id_colors']);
			$this->db->set('ratePerDay', $data_vehicle1['ratePerDay']);
   			$this->db->update('vehiclesrent');
   			$flag=1;
		}
			
		/*if($flag==1){
			$this->db->get("products");
			$this->db->where('id', $data_product1['id']);
			$this->db->set('modifiedOn', $data_product1['modifiedOn']);
			$this->db->set('modifiedBy', $data_product1['modifiedBy']);
   			$this->db->update('products');

		}*/
			$this->db->select("v.id as id,vn.name as vehicle_name, c.colorName as colorName, v.images AS image ,v.ratePerDay as rate");
			$this->db->from("vehiclesrent v");
			$this->db->join("vehiclenames vn","v.id_vehicleNames=vn.id","LEFT");
			$this->db->join("colors c","v.id_colors=c.id","LEFT");
			//$this->db->where("v.status",1);
			$this->db->where("v.id",$data_vehicle1['id']);
			$query=$this->db->get();
			return $query->row_array();

	}

	function Vehicle_delete($id){

		$this->load->database();

			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclesrent");

			$data=$query->row_array();

			/*if($data['status']==0){
				$this->db->get("distributors");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('distributors');
			}*/
			if($data['status']==1){

				$this->db->get("vehiclesrent");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('vehiclesrent');



			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclesrent");
			

			return $query->row_array();

	}


	}
?>