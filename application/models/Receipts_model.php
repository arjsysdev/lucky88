<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receipts_model extends CI_Model {

	protected $_receipts = 'receipts';
	protected $_items = 'receipt_items';

	public function getByPO($po){
		if($po){
			$this->db->where('ponum', $po);
			return $this->db->get($this->_receipts)->result();
		}
	}

	public function getAll(){
		return $this->db->get($this->_receipts)->result();
	}

	public function saveReceipt($save){
		if($save){
			$this->db->insert($this->_receipts, $save);
			return $this->db->insert_id();
		}
	}

	public function saveReceiptItem($save){
		if($save){
			$this->db->insert($this->_items, $save);
		}
	}

	public function getReceiptByID($id){
		if($id){
			$this->db->where('id', $id);
			return $this->db->get($this->_receipts)->row();
		}
	}

	public function getReceiptItemsByID($rid){
		if($rid){
			$this->db->where('receipt_id', $rid);
			return $this->db->get($this->_items)->result();
		}
	}

	public function getReceiptItemsBySOID($id){
		if($id){
			$this->db->where('item_id', $id);
			return $this->db->get($this->_items)->result();
		}
	}


}

?>