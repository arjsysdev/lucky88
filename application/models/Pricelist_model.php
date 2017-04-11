<?php
	Class Pricelist_model extends CI_Model{


		public function getProducts(){
			return $this->db->get('products')->result();
		}

		public function getContacts(){
			return $this->db->get('contact')->result();
		}

		public function getContactsCustomer(){
			$type = array('Both', 'Customer');
			$this->db->where_in('contact_type', $type);
			return $this->db->get('contact')->result();
		}

		public function getContactsSupplier(){
			$type = array('Both', 'Supplier');
			$this->db->where_in('contact_type', $type);
			return $this->db->get('contact')->result();
		}

		public function getCustomer($id){
			if(!empty($id)){
				$this->db->where('contact_id', $id);
				return $this->db->get('contact')->row();
			}
		}

		
		function save_data($table,$data){
			return $this->db->insert_batch($table,$data);
		}
			
		function save_data1($table,$data){
			return $this->db->insert($table,$data);
		}
		

		public function getPriceListByID($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('cplist')->result();
			}
		}

		public function getPriceListByIDSupplier($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('splist')->result();
			}
		}

		public function getFreightsByID($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('cpfreights')->result();
			}
		}

		public function getFreightsByIDSupplier($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('spfreights')->result();
			}
		}

		public function getPriceStat($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('cpstat')->row();
			}
		}

		public function getSPriceStat($id = null){
			if($id != null){
				$this->db->where('contact_id', $id);
				return $this->db->get('spstat')->row();
			}
		}

		public function deletePriceByID($id = null){
			if($id != null){	
				return $this->db->where('id', $id)->delete('cplist');
			}
		}

		public function deleteSPriceByID($id = null){
			if($id != null){	
				return $this->db->where('id', $id)->delete('splist');
			}
		}

		public function deleteFreightByID($id = null){
			if($id != null){	
				return $this->db->where('id', $id)->delete('cpfreights');
			}
		}

		public function deleteSFreightByID($id = null){
			if($id != null){	
				return $this->db->where('id', $id)->delete('spfreights');
			}
		}

		public function addStat($data = null){
			if(!empty($data)){
				$this->db->insert('cpstat', $data); 
				return $this->db->insert_id();
			}
		}

		public function addStatSupplier($data = null){
			if(!empty($data)){
				$this->db->insert('spstat', $data); 
				return $this->db->insert_id();
			}
		}

		public function updateStat($data = null, $id){
			if(!empty($data)){
				$this->db->where('contact_id', $id);
				return $this->db->update('cpstat', $data); 
			}
		}

		public function updateStatSupplier($data = null, $id){
			if(!empty($data)){
				$this->db->where('contact_id', $id);
				return $this->db->update('spstat', $data); 
			}
		}

		public function getStatByContactID($id = null){
			if($id){
				$this->db->where('contact_id', $id);
				return $this->db->get('cpstat')->row();
			}
		}

		public function getStatByContactIDSupplier($id = null){
			if($id){
				$this->db->where('contact_id', $id);
				return $this->db->get('spstat')->row();
			}
		}

		public function getProductPrice($pcode, $contact, $dateorder){
			if(!empty($pcode)){
				$this->db->where('contact_id', $contact);
				$this->db->where('product_id', $pcode);
				$this->db->where('start_date <=', $dateorder);
				$this->db->where('end_date >=', $dateorder);
				return $this->db->get('cplist')->row();

			}
		}

		public function getProductSupplierPrice($pcode, $contact, $dateorder){
			if(!empty($pcode)){
				$this->db->where('contact_id', $contact);
				$this->db->where('product_id', $pcode);
				$this->db->where('start_date <=', $dateorder);
				$this->db->where('end_date >=', $dateorder);
				return $this->db->get('splist')->row();

			}
		}
	
	
	function get_join($table1,$table2,$id1,$id2){
		$this->db->join($table2, "$table1.$id1 = $table2.$id2");
		// $this->db->get($table1);
		// echo $this->db->last_query();
		// die();
		return $this->db->get($table1)->result();
	}

	
	
	}
	
	

?>