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
}


?>
