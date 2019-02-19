<?php


	class Vendor_model extends CI_Model{

		function return_vendors(){
			$this->load->database();
			//$query=$this->db->query("SELECT * from vendors");

			$this->db->select("v.id as id, v.id_login as id_login, v.firstname as firstname,v.lastname as lastname, v.contact as contact, v.address as address, v.id_locality as id_locality, v.latitude as latitude, v.longitude as longitude, v.activeStatus as activeStatus, l.place as locality_name, lo.email as email_id ");
			$this->db->from("vendors v");
			$this->db->join("localities l","l.id=v.id_locality","LEFT");
			$this->db->join("login lo","lo.id=v.id_login","LEFT");
			$this->db->where("v.activeStatus",1);
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


	function Create_vendor($data_login,$data_vendor){
        //var_dump($data_login);
		$this->load->database();
		$this->db->trans_start();

		$this->db->insert("login",$data_login);
		$id_login = $this->db->insert_id();
		$array = $this->array_push_assoc($data_vendor, 'id_login', $id_login);
		$this->db->insert("vendors",$array);
		$id = $this->db->insert_id();

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
       		 $error = $this->db->error();
       		  $arr = array(
                "flag" => false,
                "message" => "Vendor Add was Unsuccessful"
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

	function get_localityname($locality_id){
		$this->load->database();
		$this->db->select("place");
		$this->db->where('id', $locality_id);
		$this->db->from('localities');
		$query=$this->db->get();
		return $query->row_array();
	}

	 function array_push_assoc($array, $key, $value){

         $array[$key] = $value;
         return $array;
  	 }

	function update_status($id){

			$this->load->database();

			$this->db->select("activeStatus");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");

			$data=$query->row_array();

			if($data['activeStatus']==0){
				$this->db->get("vendors");
				$this->db->where('id', $id);
				$this->db->set('activeStatus', 1);
				$this->db->update('vendors');
			}
			if($data['activeStatus']==1){
				$this->db->get("vendors");
				$this->db->where('id', $id);
				$this->db->set('activeStatus', 0);
				$this->db->update('vendors');
			}


			$this->db->select("activeStatus");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();


		}

		/*function Get_localityname($idlocality)
		{
			$this->db->select("*");
			$this->db->where('id', $idlocality);
			$query3=$this->db->get("localities");
			$data3=$query3->row_array();
		}*/

		function Update_vendordetails($data_login1,$data_vendor1){

			$flag=0;
			$this->load->database();
			$this->db->select("*");
			$this->db->where('id',  $data_vendor1['id']);
			$query2=$this->db->get("vendors");
			$data2=$query2->row_array();
			if(($data2['firstname']!=$data_vendor1['firstname'])||($data2['lastname']!=$data_vendor1['lastname'])||($data2['contact']!=$data_vendor1['contact'])||($data2['address']!=$data_vendor1['address'])||($data2['latitude']!=$data_vendor1['latitude'])||($data2['longitude']!=$data_vendor1['longitude'])||($data2['id_locality']!=$data_vendor1['id_locality'])||($data2['address']!=$data_vendor1['address'])){
				$this->db->get("vendors");
				$this->db->where('id', $data_vendor1['id']);
				$this->db->set('firstname', $data_vendor1['firstname']);
				$this->db->set('lastname', $data_vendor1['lastname']);
				$this->db->set('contact', $data_vendor1['contact']);
				$this->db->set('latitude',$data_vendor1['latitude']);
				$this->db->set('longitude',$data_vendor1['longitude']);
				$this->db->set('id_locality',$data_vendor1['id_locality']);
				$this->db->set('address', $data_vendor1['address']);
   				$this->db->update('vendors');
   				$flag=1;
			}

			/*if($flag==1){
				$this->db->get("distributors");
				$this->db->where('id', $data_dist1['id']);
				$this->db->set('modifiedOn', $data_dist1['modifiedOn']);
				$this->db->set('modifiedBy', $data_dist1['modifiedBy']);
   				$this->db->update('distributors');

			}*/

			$this->db->select("id_login");
			$this->db->where('id', $data_vendor1['id']);
			$query3=$this->db->get("vendors");
			$data3=$query3->row_array();

			$this->db->select("email");
			$this->db->where('id', $data3['id_login']);
			$query4=$this->db->get("login");
			$data4=$query4->row_array();

			if($data4['email']!=$data_login1['email']){
				$this->db->get("login");
				$this->db->where('id', $data3['id_login']);
				$this->db->set('email', $data_login1['email']);
   				$this->db->update('login');
			}



   			$this->db->select("*");
			$this->db->where('id', $data_login1['id']);
			$query=$this->db->get("vendors");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();
		}


		function Vendor_delete($id){

			$this->load->database();

			$this->db->select("activeStatus");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");

			$data=$query->row_array();

			/*if($data['status']==0){
				$this->db->get("distributors");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('distributors');
			}*/
			if($data['activeStatus']==1){

				$this->db->get("vendors");
				$this->db->where('id', $id);
				$this->db->set('activeStatus', 0);
				$this->db->update('vendors');

				$this->db->select("id_login");
				$this->db->where('id', $id);
				$query2=$this->db->get("vendors");

				$data2=$query2->row_array();

				$this->db->get("login");
				$this->db->where('id', $data2['id_login']);
				$this->db->set('status', 0);
				$this->db->update('login');

			}


			$this->db->select("activeStatus");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");
			

			return $query->row_array();
		}


		/********************************************BRAND****************************************/

	function insert_branddata($data){
		$this->load->database();
		$this->db->insert("vehiclebrands",$data);
	//	$query=$this->db->get("vehiclebrands");
		//$query = $this->db->query("SELECT * FROM vehiclebrands;");
		//$row = $query->last_row(‘array’);
		 $insert_id = $this->db->insert_id();

		return $insert_id;
	}

	function get_vehiclebrands(){
			$this->load->database();
			//$query=$this->db->query("SELECT * from vendors");
		//	$query=$this->db->get("vehiclebrands");
			$query = $this->db->get_where('vehiclebrands', array('status' => '1'));
			return $query->result();

	}


	function Update_brandstatus($id){

			$this->load->database();

			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclebrands");

			$data=$query->row_array();

			if($data['status']==0){
				$this->db->get("vehiclebrands");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('vehiclebrands');
			}
			if($data['status']==1){
				$this->db->get("vehiclebrands");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('vehiclebrands');
			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclebrands");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();




		}


		function Update_brandname($data){
			//echo $name;
			$this->load->database();
			$this->db->get("vehiclebrands");
			$this->db->where('id', $data['id']);
			$this->db->set('name', $data['name']);
   			$this->db->update('vehiclebrands');


   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("vehiclebrands");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();



		}
/*----------------------------------------CATEGORY-----------------------------------------*/
		function get_vehiclecategory(){

			$this->load->database();
			$query = $this->db->get_where('vehiclecategories', array('status' => '1'));
			return $query->result();
		}
	


		function insert_categorydata($data){

			$this->load->database();
			$this->db->insert("vehiclecategories",$data);;
			$insert_id = $this->db->insert_id();

			return $insert_id;
		}

		

		function Update_category($data){

			$this->load->database();
			$this->db->get("vehiclecategories");
			$this->db->where('id', $data['id']);
			$this->db->set('name', $data['name']);
   			$this->db->update('vehiclecategories');

   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("vehiclecategories");
			
			return $query->row_array();



		}


		function Update_categorystatus($id){

			$this->load->database();
			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclecategories");
			$data=$query->row_array();

			if($data['status']==0){
				$this->db->get("vehiclecategories");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('vehiclecategories');
			}
			if($data['status']==1){
				$this->db->get("vehiclecategories");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('vehiclecategories');
			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vehiclecategories");

			return $query->row_array();
		}


/*************************************VEHICLE Type****************************************/

		function get_vehicletype(){

				$this->load->database();
				$this->db->select("vt.id, vc.name AS category_name, vt.type");
				$this->db->from("vehicletypes vt");
				$this->db->join("vehiclecategories vc","vc.id=vt.id_vehicleCategories","LEFT");
				$this->db->where("vt.status",1);
				$query=$this->db->get();
				return $query->result();
					
			}



		function get_activecategory(){
				$this->load->database();
				$this->db->select("vc.id, vc.name AS category_name");
				$this->db->from("vehiclecategories vc");
				$this->db->where("vc.status",1);
				$query=$this->db->get();
				return $query->result();

		
		}

		function insert_typedata($data){

			$this->load->database();
			$this->db->insert("vehicletypes",$data);;
			$insert_id = $this->db->insert_id();

			$this->db->select("vt.id, vc.name AS category_name, vt.type");
			$this->db->from("vehicletypes vt");
			$this->db->join("vehiclecategories vc","vc.id=vt.id_vehicleCategories","INNER");
			$this->db->where("vt.id",$insert_id);
			$query=$this->db->get();
			return $query->row_array();
		
		}


		function Update_typestatus($id){

					$this->load->database();
					$this->db->select("status");
					$this->db->where('id', $id);
					$query=$this->db->get("vehicletypes");
					$data=$query->row_array();

					if($data['status']==0){
						$this->db->get("vehicletypes");
						$this->db->where('id', $id);
						$this->db->set('status', 1);
						$this->db->update('vehicletypes');
					}
					if($data['status']==1){
						$this->db->get("vehicletypes");
						$this->db->where('id', $id);
						$this->db->set('status', 0);
						$this->db->update('vehicletypes');
					}
					$this->db->select("status");
					$this->db->where('id', $id);
					$query=$this->db->get("vehicletypes");

					return $query->row_array();
				}



	function Update_type($data){

			$this->load->database();
			$this->db->get("vehicletypes");
			$this->db->where('id', $data['id']);
			$this->db->set('type', $data['type']);
   			$this->db->update('vehicletypes');

   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("vehicletypes");
			
			return $query->row_array();



		}


/*************************************VEHICLE Name****************************************/
		function get_vehiclename(){

				$this->load->database();
				$this->db->select("vn.id, vn.name, vt.type AS type_name, vb.name as brand_name,vc.name AS category_name");
				$this->db->from("vehiclenames vn");
				$this->db->join("vehicletypes vt","vt.id=vn.id_vehicleTypes","LEFT");
				$this->db->join("vehiclebrands vb","vb.id=vn.id_vehicleBrands","LEFT");
				$this->db->join("vehiclecategories vc","vc.id=vt.id_vehicleCategories","LEFT");
				$this->db->where("vn.status",1);
				$query=$this->db->get();
				return $query->result();

		}

		function get_activebrand(){

			$this->load->database();
				$this->db->select("vb.id, vb.name AS brand_name");
				$this->db->from("vehiclebrands vb");
				$this->db->where("vb.status",1);
				$query=$this->db->get();
				return $query->result();

		}

		function get_activetype(){

				$this->load->database();
				$this->db->select("vt.id, vt.type AS type_name");
				$this->db->from("vehicletypes vt");
				$this->db->where("vt.status",1);
				$query=$this->db->get();
				return $query->result();

		}

		function insert_namedata($data){

			$this->load->database();
			$this->db->insert("vehiclenames",$data);;
			$insert_id = $this->db->insert_id();

			$this->db->select("vn.id, vn.name, vt.type AS type_name, vb.name as brand_name,vc.name AS category_name");
			$this->db->from("vehiclenames vn");
			$this->db->join("vehicletypes vt","vt.id=vn.id_vehicleTypes","LEFT");
			$this->db->join("vehiclebrands vb","vb.id=vn.id_vehicleBrands","LEFT");
			$this->db->join("vehiclecategories vc","vc.id=vt.id_vehicleCategories","LEFT");
			$this->db->where("vn.status",1);
			$this->db->where("vn.id",$insert_id);
			$query=$this->db->get();
			return $query->row_array();

		}


		

		function Update_namestatus($id){

					$this->load->database();
					$this->db->select("status");
					$this->db->where('id', $id);
					$query=$this->db->get("vehiclenames");
					$data=$query->row_array();

					if($data['status']==0){
						$this->db->get("vehiclenames");
						$this->db->where('id', $id);
						$this->db->set('status', 1);
						$this->db->update('vehiclenames');
					}
					if($data['status']==1){
						$this->db->get("vehiclenames");
						$this->db->where('id', $id);
						$this->db->set('status', 0);
						$this->db->update('vehiclenames');
					}
					$this->db->select("status");
					$this->db->where('id', $id);
					$query=$this->db->get("vehiclenames");

					return $query->row_array();
				}

			function Update_name($data){

			$this->load->database();
			$this->db->get("vehiclenames");
			$this->db->where('id', $data['id']);
			$this->db->set('name', $data['name']);
   			$this->db->update('vehiclenames');

   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("vehiclenames");
			
			return $query->row_array();



		}

/*------------------------------------Locality---------------------------------------*/

		function get_locality(){

			$this->load->database();
			$query = $this->db->get_where('localities', array('status' => '1'));
			return $query->result();

		}

		

		function Update_localitystatus($id){

			$this->load->database();

			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("localities");

			$data=$query->row_array();

			if($data['status']==0){
				$this->db->get("localities");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('localities');
			}
			if($data['status']==1){
				$this->db->get("localities");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('localities');
			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("localities");
			
			
			return $query->row_array();

		}

	

			function Update_locality($data){
			//echo $name;
			$this->load->database();
			$this->db->get("localities");
			$this->db->where('id', $data['id']);
			$this->db->set('place', $data['place']);
   			$this->db->update('localities');


   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("localities");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();



		}

		


	function insert_localitydata($data){
		$this->load->database();
		$this->db->insert("localities",$data);
	//	$query=$this->db->get("vehiclebrands");
		//$query = $this->db->query("SELECT * FROM vehiclebrands;");
		//$row = $query->last_row(‘array’);
		 $insert_id = $this->db->insert_id();

		return $insert_id;
	}


	/*********************Vehicle Colors*********************/

	function get_vehiclecolor(){

			$this->load->database();
			$query = $this->db->get_where('colors', array('status' => '1'));
			return $query->result();


	}

	function insert_colordata($data){

		$this->load->database();
		$this->db->insert("colors",$data);
		$insert_id = $this->db->insert_id();

		return $insert_id;

	}

	function Updatecolorname($data){

		    $this->load->database();
			$this->db->get("colors");
			$this->db->where('id', $data['id']);
			$this->db->set('colorName', $data['colorName']);
   			$this->db->update('colors');


   			$this->db->select("*");
			$this->db->where('id', $data['id']);
			$query=$this->db->get("colors");;

			return $query->row_array();

	}

	function Update_colorstatus($id){


			$this->load->database();

			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("colors");

			$data=$query->row_array();

			if($data['status']==0){
				$this->db->get("colors");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('colors');
			}
			if($data['status']==1){
				$this->db->get("colors");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('colors');
			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("colors");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();




	}




}


?>