<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

	public function getTotalSalesOrder(){
		$query = $this->db->get('salesorder');
		return $query->num_rows();
	}

	public function getSalesOrderLastByCode($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);
			return $this->db->get('salesorder')->row();
		}
	}

	public function getPurchaseOrderLastByCode($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);
			return $this->db->get('purchaseorder')->row();
		}
	}	

	public function getTotalSOByCode($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			$query = $this->db->get('salesorder');
			return $query->num_rows();
		}
	}

	public function getTotalPOByCode($code=null){
		if($code != null){
			$this->db->where('comp_code', $code);
			$query = $this->db->get('purchaseorder');
			return $query->num_rows();
		}
	}
}


?>