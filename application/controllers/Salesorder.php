<?php
	Class Salesorder extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Common_model', 'common');
			$this->load->model('Contacts_model', 'contacts');
			if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login', 'refresh');
			}
		}

		public function index(){
			$data['title'] = 'Sales Orders';
			$data['bcrumbs'] = 'Sales Orders';
			$this->_render_page('sales/index', $data);
		}

		public function formadd(){
			$data['title'] = 'Add Sales Orders';
			$data['bcrumbs'] = 'Add Sales Orders';
			$data['contacts'] = $this->contacts->getBoth();
			$this->_render_page('sales/formadd', $data);
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