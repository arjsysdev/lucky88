<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

	protected $_table = 'products';



	public function get_query($sql,$result){

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

	public function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}





	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getByCodeRow($code=null){
		if($code != null){
			$this->db->where('prod_code', $code);
			return $this->db->get($this->_table)->row();
		}
	}

	public function getByCodeResult($code=null){
		if($code != null){
			$this->db->where('prod_code', $code);
			return $this->db->get($this->_table)->result();
		}
	}

}


?>