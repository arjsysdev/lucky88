<?php
	Class Salesorder extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Common_model', 'common');
			$this->load->model('Contacts_model', 'contacts');
			$this->load->model('Products_model', 'products');
			$this->load->model('Pricelist_model', 'pricelist');
			$this->load->model('Salesorder_model', 'salesorder');
			if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login', 'refresh');
			}
		}

		public function test(){
			$array[0] = array(2, 5, 2);
			$array[1] = array(2, 5, 1);
			$array[2] = array(2, 5, 2);



			debug($array, 1);
		}

		public function index(){
			$data['title'] = 'Sales Orders';
			$data['bcrumbs'] = 'Sales Orders';

			$data['orders'] = $this->salesorder->getAll();
			$this->_render_page('sales/index', $data);
		}

		public function view($id){
			$data['title'] = 'Sales Orders';
			$data['bcrumbs'] = 'Sales Orders';
			if($id){
				$data['order'] = $this->salesorder->getByID($id);
				$data['items'] = $this->salesorder->getItemsBySOID($id);
			
				$this->_render_page('sales/view', $data);
			}
			else{
				show_404();
			}
			
		}

		public function formadd(){
			$data['title'] = 'Add Sales Orders';
			$data['bcrumbs'] = 'Add Sales Orders';
			$data['contacts'] = $this->contacts->getBoth();
			$data['products'] = $this->products->getAll();
			$this->_render_page('sales/formadd', $data);
		}

		public function formprice(){
			$data['title'] = 'Sales Order Prices';
			$data['bcrumbs'] = 'Sales Order Prices';
			$data['salesorder'] = $this->session->userdata('salesorder');

			//get contactid using comp code
			$compcode = $data['salesorder']['comp_code'];
			$contact = getContactByCode($compcode);
			//get pricelist
			$data['pricelist'] = $this->pricelist->getPriceListByID($contact->contact_id);
			
			$this->_render_page('sales/formprice', $data);
		}

		public function getitems($code){
			if($code){
				$contact = $this->contacts->getByCodeRow($code);
				$itempl = $this->pricelist->getPriceListByID($contact->contact_id);
				$str = '';
				foreach($itempl as $item){
					$str .= '<option value="'.$item->product_id.'">'.$item->product_id.'</option>';
				}
				echo $str;
			}
		}

		public function step1so(){
			//debug($this->input->post(), 1);
			$save['cpoNum'] = $this->input->post('cpoNum');
			$save['poNum'] = $this->input->post('poNum');
			$save['comp_code'] = $this->input->post('comp_code');
			$save['date_ordered'] = $this->input->post('date_ordered');
			$save['remarks'] = $this->input->post('remarks');
			$save['preparedby'] = 0;
			$save['lasteditby'] = 0;


			$qtys = $this->input->post('qty');
			$units = $this->input->post('unit');
			$products = $this->input->post('product');
			unset($qtys[0]);
			unset($units[0]);
			$save['items'] = array();
			$i = 0;
			foreach($qtys as $key => $qty){
				$save['items'][$i]['qty'] = $qty;
				$save['items'][$i]['unit'] = $units[$key];
				$save['items'][$i]['product'] = $products[$i];
				$i++;
			}


			$this->session->set_userdata('salesorder', $save);
			redirect('salesorder/formprice');
		}

		public function save(){
			
			$items = array();
			$post = $this->input->post();

			

			$saveSO['cpoNum'] = $post['cpoNum'];
			$saveSO['contact_id'] = $post['contact_id'];
			$saveSO['comp_code'] = $post['comp_code'];
			$saveSO['poNum'] = $post['poNum'];
			$saveSO['date_ordered'] = date('Y-m-d', strtotime($post['date_ordered']));
			$saveSO['remarks'] = $post['remarks'];
			$saveSO['grosstotal'] = round($post['grosstotal'], 2);
			$saveSO['dis1less'] = round($post['dis1less'], 2);
			$saveSO['dis2less'] = round($post['dis2less'], 2);
			$saveSO['dis3less'] = round($post['dis3less'], 2);
			$saveSO['netSales'] = round($post['netSales'], 2);
			$saveSO['lessVAT12'] = round($post['lessVAT12'], 2);
			$saveSO['amountNetVAT'] = round($post['amountNetVAT'], 2);
			$saveSO['pwdDis'] = round($post['pwdDis'], 2);
			$saveSO['totalAmountDue'] = round($post['totalAmountDue'], 2);
			$saveSO['preparedby'] = $this->ion_auth->user()->row()->id;
			$saveSO['lasteditby'] = $this->ion_auth->user()->row()->id;
			
			$id = $this->salesorder->addSo($saveSO);

			foreach($post['qty'] as $key => $qty){
				$items[$key]['qty'] = $qty;
				$items[$key]['soid'] = $id;
				$items[$key]['unit'] = $post['unit'][$key];
				$items[$key]['contact_id'] = $post['contact_id'];
				$items[$key]['product_code'] = $post['product'][$key];
				$items[$key]['price'] = $post['price'][$key];
				$items[$key]['amount'] = $post['amount'][$key];
				$items[$key]['less1'] = $post['less1'][$key];
				$items[$key]['less2'] = $post['less2'][$key];
				$items[$key]['less3'] = $post['less3'][$key];

			}

			foreach($items as $item){
				$this->salesorder->addItems($item);
			}
			redirect('salesorder');
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