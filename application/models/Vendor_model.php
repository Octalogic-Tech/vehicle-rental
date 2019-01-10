<?php


	class Vendor_model extends CI_Model{

		function return_vendors(){

			$this->load->database();
			$query=$this->db->query("SELECT * from vendors");
			$query=$this->db->get("vendors");
			return $query->result();
		}
	}


?>