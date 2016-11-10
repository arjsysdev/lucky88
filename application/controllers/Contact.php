<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->library('encryption');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	
	public function index(){
		$data['title'] = "Contact";
		$data['bcrumbs'] = "Contacts";
		$sql = "SELECT * FROM contact";
		$data["contacts"] = $this->cm->get_query($sql,2);
		$this->_render_page('contact/index', $data);
	}
	
	function add(){
		$data['title'] = "Contact";
		$data['bcrumbs'] = "Add New Contacts";
		if($this->input->post("Submit")=="Save"){
			$save['comp_code'] = $this->input->post('comp_code');
			$save['contact_type'] = $this->input->post('contact_type');
			$save['agent'] = $this->input->post('agent');
			$save['comp_name'] = $this->input->post('comp_name');
			
			$save['payable_to'] = $this->input->post('payable_to');
			$save['address'] = $this->input->post('address');
			$save['area'] = $this->input->post('area');
			$save['tin_num'] = $this->input->post('tin_num');
			
			$save['cont_pers'] = $this->input->post('cont_pers');
			$save['telephone'] = $this->input->post('telephone');
			$save['mob_no'] = $this->input->post('mob_no');
			$save['other_telephone'] = $this->input->post('other_telephone');
			
			$save['fax_num'] = $this->input->post('fax_num');
			$save['email'] = $this->input->post('email');
			$save['website'] = $this->input->post('website');
			$save['prepared_by'] = $this->session->userdata('username');
			$save['prep_date'] = $this->input->post('prep_date');
			if($this->cm->insert_where_check("contact",$save)){
				redirect('contact');
			}else{
				$this->_render_page('contact/add', $data);
			}
		}
		$this->_render_page('contact/add', $data);
	}
	
	function edit($id){
		$data['bcrumbs'] = "Edit Contacts";
		$data['title'] = "Contact";
		$data['contact_id'] = $id;
		$sql = "SELECT * FROM contact where contact_id = $id";
		$data['contact'] = $this->cm->get_statement($sql,1);
		$this->_render_page('contact/edit', $data);
	}
	
	function editcon(){
		$where['contact_id'] = $this->input->post('contact_id');
		$save['comp_code'] = $this->input->post('comp_code');
		$save['contact_type'] = $this->input->post('contact_type');
		$save['agent'] = $this->input->post('agent');
		$save['comp_name'] = $this->input->post('comp_name');
		
		$save['payable_to'] = $this->input->post('payable_to');
		$save['address'] = $this->input->post('address');
		$save['area'] = $this->input->post('area');
		$save['tin_num'] = $this->input->post('tin_num');
		
		$save['cont_pers'] = $this->input->post('cont_pers');
		$save['telephone'] = $this->input->post('telephone');
		$save['mob_no'] = $this->input->post('mob_no');
		$save['other_telephone'] = $this->input->post('other_telephone');
		
		$save['fax_num'] = $this->input->post('fax_num');
		$save['email'] = $this->input->post('email');
		$save['website'] = $this->input->post('website');
	
		$save['update_by'] = $this->session->userdata('username');
		$save['up_date'] = now();
		
		if($this->cm->update_where_check("contact",$where,$save)){
			redirect("contact");
		}else{
			$this->session->set_flashdata('message', aMessage($text,$type));
			$this->_render_page('contact/edit', $data);
		}
	}
	
	function view($contact_id){
		$data['bcrumbs'] = "View Contacts";
		$data['title'] = "Contact";
		$sql = "SELECT * FROM contact where contact_id = $contact_id";
		$data['contact'] = $this->cm->get_statement($sql,1);
		$this->_render_page('contact/view', $data);
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
