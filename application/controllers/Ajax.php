<?php
	Class Ajax extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Common_model', 'common');
			$this->load->model('Ajax_model', 'ajax');
			if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login', 'refresh');
			}
		}

		public function getnumber($code = null){
			if($code != ''){
				$total = $this->ajax->getTotalSalesOrder();
				$total++;
				echo $code.date('y').'-'.str_pad($total, 4, "0", STR_PAD_LEFT);
			}
		}
	}
	
?>