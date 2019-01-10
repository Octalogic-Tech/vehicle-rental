<?php


	class Vendor_model extends CI_Model{

		function return_vendors(){
			$this->load->database();
			//$query=$this->db->query("SELECT * from vendors");
			$query=$this->db->get("vendors");
			return $query->result();
		}

		function update_status($id){

			$this->load->database();

			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");

			$data=$query->row_array();

			if($data['status']==0){
				$this->db->get("vendors");
				$this->db->where('id', $id);
				$this->db->set('status', 1);
				$this->db->update('vendors');
			}
			if($data['status']==1){
				$this->db->get("vendors");
				$this->db->where('id', $id);
				$this->db->set('status', 0);
				$this->db->update('vendors');
			}


			$this->db->select("status");
			$this->db->where('id', $id);
			$query=$this->db->get("vendors");
			
			//$query->result();		
			//$query=$this->db->get("vendors");
			//print_r($query->result());

			return $query->row_array();




		}
	}


?>