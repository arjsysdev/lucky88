<?php
	Class Receipts extends CI_Controller{


		public function __construct(){
			parent::__construct();
			$this->load->library(array('ion_auth','form_validation'));
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->model('Common_model', 'common');
			$this->load->model('Contacts_model', 'contacts');
			$this->load->model('Products_model', 'products');
			$this->load->model('Pricelist_model', 'pricelist');
			$this->load->model('Purchaseorder_model', 'purchaseorder');
			$this->load->model('Salesorder_model', 'salesorder');
			$this->load->model('Receipts_model', 'receipts');
			if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login', 'refresh');
			}
		}

	
		public function index(){
			$data['title'] = 'Receipts';
			$data['bcrumbs'] = 'Receipts';
			$data['error'] = '';
			if($this->input->get('po') != null){
				$po = $this->input->get('po');
				$data['info'] = $this->salesorder->getByPOID($po);	
				$data['total'] = count($this->receipts->getAll());
				$data['items'] = array();
				if(!empty($data['info'])){

					$data['receipts'] = $this->receipts->getByPO($po);
					
					$soid = $data['info']->id;
					$data['items'] = $this->salesorder->getItemsBySOID($soid);

					$items = $data['items'];

					$shortage = array();
					foreach($items as $item){
						$rid = $this->receipts->getReceiptItemsBySOID($item->id);
						
						if(empty($rid)){
							array_push($shortage, $item);
						}
						else{
							$i = 0;
							foreach($rid as $r){
								$i += $r->loaded;
							}

							if($i < $item->qty){
								array_push($shortage, $item);
							}
						}
					}

					$data['enable'] = (count($shortage) > 0) ? true : false;
					$data['error'] = null;
				}
				else{

					$data['error'] = 'Invalid Purchase Order Number!';
				}
			}
			$this->_render_page('receipts/index', $data);
		}

		public function addnew(){
			$post = $this->input->post();
			$save_receipt['dlvnum'] = $post['dlvnum'];
			$save_receipt['ponum'] = $post['ponum'];
			$save_receipt['sinum'] = $post['sinum'];
			$save_receipt['drnum'] = $post['drnum'];
			$save_receipt['smallnum'] = $post['smallnum'];
			$save_receipt['notes'] = $post['notes'];
			//debug($post, 1);
			$receipt_id = $this->receipts->saveReceipt($save_receipt);
			
			$items = $post['items'];
			foreach($items as $key => $item){
				$save_ritem['cpo'] = $post['ponum'];
				$save_ritem['receipt_id'] = $receipt_id;
				$save_ritem['item_id'] = $key;
				$save_ritem['loaded'] = $item;
				$this->receipts->saveReceiptItem($save_ritem);
			}
			$this->session->set_flashdata('msg', 'Receipt successfully saved!');
			redirect('receipts?po='.$post['ponum']);
		}


		public function getitems($id){
			if($id){
				$data['info'] = $this->receipts->getReceiptByID($id);
				$items = $this->receipts->getReceiptItemsByID($id);

				$data['html'] = '';

				foreach($items as $item){
					$info = $this->salesorder->getItemByID($item->item_id);

					$data['html'] .= '<tr>
						<td>'.$info->product_code.'</td>
						<td>'.$info->unit.'</td>
						<td>'.$info->qty.'</td>
						<td>'.$item->loaded.'</td>
					</tr>';
				}

				echo json_encode($data);
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

