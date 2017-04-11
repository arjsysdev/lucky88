<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesorder_model extends CI_Model {

	protected $_sales = 'salesorder';
	protected $_items = 'order_items';


	public function addSO($data){
		if(!empty($data)){
			$this->db->insert($this->_sales, $data);
			return $this->db->insert_id();
		}
	}

	public function addItems($data){
		if(!empty($data)){
			$this->db->insert($this->_items, $data);
		}
	}

	public function getAll(){
		return $this->db->get($this->_sales)->result();
	}

	public function getByContactID($id){
		if(!empty($id)){
			$this->db->where('contact_id', $id);
			return $this->db->get($this->_sales)->result();
		}
	}

	public function getByID($id){
		if(!empty($id)){
			$this->db->where('id', $id);
			return $this->db->get($this->_sales)->row();
		}
	}
	public function getByPOID($id){
		if(!empty($id)){
			$this->db->where('cpoNum', $id);
			return $this->db->get($this->_sales)->row();
		}
	}

	public function getItemsBySOID($id){
		if(!empty($id)){
			$this->db->where('soid', $id);
			return $this->db->get($this->_items)->result();
		}
	}

	public function getItemByID($id){
		if($id){
			$this->db->where('id', $id);
			return $this->db->get($this->_items)->row();
		}
	}

}

?>