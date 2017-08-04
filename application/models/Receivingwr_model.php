<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receivingwr_model extends CI_Model {

	protected $receivingwh = 'receivingwh';
	protected $_items = 'receivingwh_items';


	public function newRecord($save){
		return $this->db->insert($this->receivingwh, $save);
	}

	public function newItem($save){
		return $this->db->insert($this->_items, $save);
	}

	public function getAll(){
		return $this->db->get($this->receivingwh)->result();
	}

	public function getItems($refno){
		if($refno){
			$this->db->where('refno', $refno);
			return $this->db->get($this->_items)->result();
		}
	}

}

?>