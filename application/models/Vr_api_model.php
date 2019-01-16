<?php

	class Vr_api_model extends CI_Model{

		function return_customer_vehicles_list(){

			$this->load->database();


			$this->db->select('vehiclesrent.id,vehiclenames.name AS name,vehiclebrands.name AS brand,vehicletypes.type,vehiclecategories.name AS categories,vendors.firstname,vendors.lastname,localities.place,colors.colorName');

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

			$query=$this->db->get();
			return $query->result();


		}




	}



?>