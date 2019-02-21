<?php

class Vr_api_model extends CI_Model{


	function register_customer($array,$info){

		$this->load->database();
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('email', $array['email']);
		$query = $this->db->get();

		if ($query->result_array() != null) {
			$arr = array(
                "error" => true,
                "message" => "This email already exists, Please Login...",
            );
            return $arr;
		}
		else {

			$this->db->trans_start();
	        $this->db->insert('login', $array);
	        $id = $this->db->insert_id();
	        $info['id_login'] = $id;
	        $this->db->insert('customers', $info);
	        $info['email'] = $array['email'];
	        $info['password'] = $array['password'];
	        $this->db->trans_complete();
	        if ($this->db->trans_status()) {
	            $arr = array(
	                "error" => false,
	                "message" => "Registered successfully!..",
	                "customer" => $info
	            );
	            return $arr;
	        } else {
	            $error = $this->db->error();
	            $arr = array(
	                "error" => true,
	                "message" => $error
	            );
	            return $arr;
	        }

		}

	}


	function return_customer_vehicles_list($limit, $start){

		$this->load->database();
		
		$this->db->limit($limit, $start);


		$this->db->select('vehiclesrent.id,vehiclenames.name AS name,vehiclebrands.name AS brand,vehicletypes.type,vehiclecategories.name AS categories,vendors.firstname,vendors.lastname,localities.place,colors.colorName,vehiclesrent.ratePerDay AS rate');

		$this->db->from('vehiclesrent');
		$this->db->join('vehiclenames','vehiclenames.id=vehiclesrent.id_vehicleNames','LEFT');
		$this->db->join('vehiclebrands','vehiclebrands.id=vehiclenames.id_vehicleBrands','LEFT');
		$this->db->join('vehicletypes','vehicletypes.id=vehiclenames.id_vehicleTypes','LEFT');
		$this->db->join('vehiclecategories','vehiclecategories.id=vehicletypes.id_vehicleCategories','LEFT');
		$this->db->join('vendors','vendors.id=vehiclesrent.id_vendors','LEFT');
		$this->db->join('localities','localities.id=vendors.id_locality','LEFT');
		$this->db->join('colors','colors.id=vehiclesrent.id_colors','LEFT');

		$this->db->where('vendors.activeStatus',1);
		$this->db->where('vehiclebrands.status',1);

		$this->db->order_by('vehiclesrent.id','asc');

		$query=$this->db->get();

		$arr_val=$query->result_array();

		for ($i=0; $i <sizeof($arr_val) ; $i++) { 
			$arr_val[$i]=$this->modify_id($arr_val[$i]);
		}

		return $arr_val;


	}


	function modify_id($row){
		$row['id']=(int)$row['id'];
		return $row;
	}




}



?>