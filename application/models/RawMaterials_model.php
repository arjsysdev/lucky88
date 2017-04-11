<?php
	Class RawMaterials_model extends CI_Model{

		function get_query($sql,$result){
	
			if($result == 0){
				return $this->db->query($sql)->num_rows();
			}
			if($result == 1){
				return $this->db->query($sql)->row();
			}
			if($result == 2){
				return $this->db->query($sql)->result();
			}
			if($result == 3){
				return $this->db->query($sql); //insert | update | delete
			}
		}

		function insert_data($table,$data){
			return $this->db->insert($table,$data);
		}





		public function getRawmatByType($type){
			if(!empty($type)){
				$this->db->where('rm_type', $type);
				return $this->db->get('raw_materials')->result();
			}
		}	






	}

?>