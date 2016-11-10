<?php
	Class Rawmat_model extends CI_Model{

		
		public function getRawmatByType($type){
			if(!empty($type)){
				$this->db->where('rm_type', $type);
				return $this->db->get('raw_materials')->result();
			}
		}			
	}

?>