<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model {

	protected $_table = 'contact';

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getByCodeRow($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			return $this->db->get($this->_table)->row();
		}
	}

	public function getByCodeResult($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			return $this->db->get($this->_table)->result();
		}
	}

	public function getBoth(){
		$type = array('Both', 'Customer');
		$this->db->where_in('contact_type', $type);
		return $this->db->get($this->_table)->result();
	}

	public function getBothPO(){
		$type = array('Both', 'Supplier');
		$this->db->where_in('contact_type', $type);
		return $this->db->get($this->_table)->result();
	}

	public function getUserByID($id){
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}
}


?>