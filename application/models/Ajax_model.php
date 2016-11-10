<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

	public function getTotalSalesOrder(){
		$query = $this->db->get('salesorder');
		return $query->num_rows();
	}	
}


?>