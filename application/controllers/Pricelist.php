<?php
	Class Pricelist extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Pricelist_model', 'pricelist');
			$this->load->model('Common_model', 'common');

			if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}	
		}

		public function cplist(){
			
			$data['title'] = 'Customer Price List';
			$data['bcrumbs'] = 'Customer Price List';
			$data['customers'] = $this->pricelist->getContactsCustomer();
			$data['products'] = $this->pricelist->getProducts();
			
			$selectedCustomer = $this->input->get('customer');
			$data['sesprices'] = array();
			$data['dbprice'] = array();
			$data['sesfreights'] = array();
			$data['dbfreights'] = array();
			if(!empty($selectedCustomer)){
				$data['dbprice'] = $this->pricelist->getPriceListByID($selectedCustomer);
				$data['dbfreights'] = $this->pricelist->getFreightsByID($selectedCustomer);
				$data['sesprices'] = $this->session->userdata('plist');
				$data['sesfreights'] = $this->session->userdata('freight');
				$data['contact'] = $this->pricelist->getCustomer($selectedCustomer);
				$data['pricestat'] = $this->pricelist->getPriceStat($selectedCustomer);
				//debug($data['pricestat'],1);
			}
			$this->_render_page('pricelist/cplist/index', $data);
		}

		public function addcprice(){

			$raw['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
			$raw['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
			$raw['product_id'] = $this->input->post('product_id');
			$raw['contact_id'] = $this->input->post('contact_id');
			$raw['price'] = $this->input->post('price');
			$raw['unit'] = $this->input->post('unit');
			$raw['less1'] = $this->input->post('less1');
			$raw['less2'] = $this->input->post('less2');
			$raw['less3'] = $this->input->post('less3');
			$raw['disperbundle'] = $this->input->post('disperbundle');
			$raw['remarks'] = $this->input->post('remarks');
			$old = $this->session->userdata('plist');
			if(empty($old)){
				$old = array();
			}
			array_push($old, $raw);
			$this->session->set_userdata('plist', $old);
			$new = $this->session->userdata('plist');
			redirect('pricelist/cplist?customer='.$this->input->post('contact_id'));
		}

		public function addsprice(){
			$raw['start_date'] = $this->input->post('start_date');
			$raw['end_date'] = $this->input->post('end_date');
			$raw['product_id'] = $this->input->post('product_id');
			$raw['contact_id'] = $this->input->post('contact_id');
			$raw['price'] = $this->input->post('price');
			$raw['price2'] = $this->input->post('price2');
			$raw['mooq'] = $this->input->post('mooq');
			$raw['unit'] = $this->input->post('unit');
			$raw['less1'] = $this->input->post('less1');
			$raw['less2'] = $this->input->post('less2');
			$raw['less3'] = $this->input->post('less3');
			$raw['disperbundle'] = $this->input->post('disperbundle');
			$raw['remarks'] = $this->input->post('remarks');
			$old = $this->session->userdata('plist');
			if(empty($old)){
				$old = array();
			}
			array_push($old, $raw);

			$this->session->set_userdata('plist', $old);
			$new = $this->session->userdata('plist');
			
			redirect('pricelist/splist?customer='.$this->input->post('contact_id'));
		}

		public function removesprice($key=null, $customer){
			if($key != null){
				$prices = $this->session->userdata('plist');
				unset($prices[$key]);
				$this->session->set_userdata('plist', $prices);
				redirect('pricelist/splist?customer='.$customer);
			}
		}

		public function removecprice($key=null, $customer){
			if($key != null){
				$prices = $this->session->userdata('plist');
				unset($prices[$key]);
				$this->session->set_userdata('plist', $prices);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function addfreight(){

			$raw['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
			$raw['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
			$raw['charge'] = $this->input->post('charge');
			$raw['contact_id'] = $this->input->post('contact_id');
			$raw['remarks'] = $this->input->post('remarks');
			$old = $this->session->userdata('freight');
			if(empty($old)){
				$old = array();
			}
			array_push($old, $raw);
			$this->session->set_userdata('freight', $old);
			$new = $this->session->userdata('freight');
			redirect('pricelist/cplist?customer='.$this->input->post('contact_id'));
		}


		public function addsfreight(){

			$raw['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
			$raw['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
			$raw['charge'] = $this->input->post('charge');
			$raw['contact_id'] = $this->input->post('contact_id');
			$raw['remarks'] = $this->input->post('remarks');
			$old = $this->session->userdata('freight');
			if(empty($old)){
				$old = array();
			}
			array_push($old, $raw);
			$this->session->set_userdata('freight', $old);
			$new = $this->session->userdata('freight');
			redirect('pricelist/splist?customer='.$this->input->post('contact_id'));
		}

		public function removefreight($key=null, $customer){
			if($key != null){
				$freights = $this->session->userdata('freight');
				unset($freights[$key]);
				$this->session->set_userdata('freight', $freights);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function removesfreight($key=null, $customer){
			if($key != null){
				$freights = $this->session->userdata('freight');
				unset($freights[$key]);
				$this->session->set_userdata('freight', $freights);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function deleteprice($id=null, $customer){
			if($id != null){
				$this->pricelist->deletePriceByID($id);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function deletesprice($id=null, $customer){
			if($id != null){
				$this->pricelist->deleteSPriceByID($id);
				redirect('pricelist/splist?customer='.$customer);
			}
		}

		public function deletefreight($id=null, $customer){
			if($id != null){
				$this->pricelist->deleteFreightByID($id);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function deletesfreight($id=null, $customer){
			if($id != null){
				$this->pricelist->deleteSFreightByID($id);
				redirect('pricelist/cplist?customer='.$customer);
			}
		}

		public function savepricelist(){
			
			$category = $this->input->post('category');
			$limitation = $this->input->post('limitation');
			$terms = $this->input->post('terms');
			$days= $this->input->post('days');
			$cid = $this->input->post('cid');
			
			$data = array(
				'category' => $category,
				'limitation' => $limitation,
				'terms' => $terms,
				'days' => $days,
				'contact_id' => $cid
			);

			$exist = $this->pricelist->getStatByContactID($cid);

			if(empty($exist)){
				$this->pricelist->addStat($data);
			}
			else{
				$this->pricelist->updateStat($data, $cid);
			}

			$prices = $this->session->userdata('plist');
			$freights = $this->session->userdata('freight');
			if(!empty($prices)){
				foreach($prices as $price){
					$this->pricelist->save_data1('cplist',$price);
				}
				$this->session->unset_userdata('plist');
			}
			if(!empty($freights)){
				foreach($freights as $freight){
					$this->pricelist->save_data1('cpfreights',$freight);
				}
				$this->session->unset_userdata('freight');
			}
							
		}


		public function splist(){
			$data['title'] = 'Supplier Price List';
			$data['bcrumbs'] = 'Supplier Price List';
			$data['customers'] = $this->pricelist->getContactsSupplier();
			$data['rawmats'] = $this->common->get_all('raw_materials');
			
			
			$selectedCustomer = $this->input->get('customer');
			$data['sesprices'] = array();
			$data['dbprice'] = array();
			$data['sesfreights'] = array();
			$data['dbfreights'] = array();
			if(!empty($selectedCustomer)){
				$data['dbprice'] = $this->pricelist->getPriceListByIDSupplier($selectedCustomer);
				$data['dbfreights'] = $this->pricelist->getFreightsByIDSupplier($selectedCustomer);
				$data['sesprices'] = $this->session->userdata('plist');
				$data['sesfreights'] = $this->session->userdata('freight');
				$data['contact'] = $this->pricelist->getCustomer($selectedCustomer);
				$data['pricestat'] = $this->pricelist->getSPriceStat($selectedCustomer);
				//debug($data['pricestat'],1);
			}
			$this->_render_page('pricelist/splist/index', $data);
		}

		public function savepricelistsupplier(){
			
			$category = $this->input->post('category');
			$limitation = $this->input->post('limitation');
			$terms = $this->input->post('terms');
			$days= $this->input->post('days');
			$cid = $this->input->post('cid');
			
			$data = array(
				'category' => $category,
				'limitation' => $limitation,
				'terms' => $terms,
				'days' => $days,
				'contact_id' => $cid
			);

			$exist = $this->pricelist->getStatByContactIDSupplier($cid);

			if(empty($exist)){
				$this->pricelist->addStatSupplier($data);
			}
			else{
				$this->pricelist->updateStatSupplier($data, $cid);
			}

			$prices = $this->session->userdata('plist');
			$freights = $this->session->userdata('freight');
			if(!empty($prices)){
				foreach($prices as $price){
					$this->pricelist->save_data1('splist',$price);
				}
				$this->session->unset_userdata('plist');
			}
			if(!empty($freights)){
				foreach($freights as $freight){
					$this->pricelist->save_data1('spfreights',$freight);
				}
				$this->session->unset_userdata('freight');
			}
							
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