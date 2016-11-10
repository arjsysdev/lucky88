<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	function get_where($table,$where,$result){
		$this->db->where($where);

		if($result == 0){
			return $this->db->get($table)->num_rows();
		}
		if($result == 1){
			return $this->db->get($table)->row();
		}
		if($result == 2){
			return $this->db->get($table)->result();
		}
	}

	function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}
	
	
	function get_statement($sql,$result){
	
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
			$this->db->query($sql); //insert statement
			return ($this->db->affected_rows() > 0) ? true : false;
		}
	}

	function get_all($table){
		return $this->db->get($table)->result();
	}
	function update_where($table,$where,$update){
		$this->db->where($where);
		return $this->db->update($table,$update);
	}
	
	function update_where_check($table,$where,$update){
		$this->db->where($where);
		$this->db->update($table,$update);
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	function insert_where_check($table,$save){
		$this->db->insert($table,$save);
		return ($this->db->affected_rows() > 0) ? true : false;
	}


	// ** //
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

	function insert($table,$data){
		return $this->db->insert($table,$data);
	}

	function get_update($table,$update,$where){
		$this->db->where($where);
		return $this->db->update($table,$update);
	}


	
}