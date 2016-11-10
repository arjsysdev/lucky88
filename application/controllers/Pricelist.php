<?php
	Class Pricelist extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Pricelist_model', 'pricelist');
			$this->load->model('Common_model', 'common');
		}

		public function cplist(){
			
			$data['title'] = 'Customer Price List';
			$data['bcrumbs'] = 'Customer Price List';
			$data['customers'] = $this->pricelist->getContacts();
			$data['products'] = $this->common->get_all('products');
			
			$selectedCustomer = $this->input->get('customer');

			if(!empty($selectedCustomer)){
				$data['contact'] = $this->pricelist->getCustomer($selectedCustomer);
			}
			$this->_render_page('pricelist/cplist/index', $data);
		}


		public function splist(){
			$data['title'] = 'Supplier Price List';
			$data['bcrumbs'] = 'Supplier Price List';
			$data['customers'] = $this->pricelist->getContacts();
			$data['products'] = $this->common->get_all('products');
			
			$selectedCustomer = $this->input->get('customer');

			if(!empty($selectedCustomer)){
				$data['contact'] = $this->pricelist->getCustomer($selectedCustomer);
			}
			$this->_render_page('pricelist/splist/index', $data);
		}


		public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
		{
			$this->viewdata = (empty($data)) ? $this->data: $data;
			$this->load->view('layout/header', $this->viewdata);
			$view_html = $this->load->view($view, $this->viewdata, $returnhtml);
			$this->load->view('layout/footer', $this->viewdata);
			if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
		}
	}
	
?>