<?php
	Class Pricelist_model extends CI_Model{


		public function getContacts(){
			return $this->db->get('contact')->result();
		}

		public function getCustomer($id){
			if(!empty($id)){
				$this->db->where('contact_id', $id);
				return $this->db->get('contact')->row();
			}
		}
	}

?>