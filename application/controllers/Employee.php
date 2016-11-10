<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
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
		$data['title'] = "Employee";
		$data['bcrumbs'] = 'Register New Employee';
		$text = "";
		if($this->input->post("Submit")=="Save"){
			
			$save['employee_id'] = $this->input->post('employee_id');
			$save['fname'] = $this->input->post('fname');
			$save['lname'] = $this->input->post('lname');
			$save['mname'] = $this->input->post('mname');
			
			$save['address'] = $this->input->post('address');
			$save['birthdate'] = date_format($this->input->post('birthdate'),"Y-m-d");
			$save['agency'] = $this->input->post('agency');
			$save['contact_no'] = $this->input->post('contact_no');
			
			$save['designation'] = $this->input->post('designation');
			$save['hired_date'] = date_format($this->input->post('hired_date'),"Y-m-d");
			$save['sss'] = $this->input->post('sss');
			$save['philhealth'] = $this->input->post('philhealth');
			
			$save['pagibig'] = $this->input->post('pagibig');
			$save['termination'] = date_format($this->input->post('termination'),"Y-m-d");
			$save['company'] = $this->input->post('company');
			if($_FILES["file"]){
				$config['upload_path']          = './assets/employee_id';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['max_size']        		= 20480;
				$config['encrypt_name']        	= true;
				$config['overwrite']        	= false;
			}
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( !$this->upload->do_upload('file')){
				$text = $this->upload->display_errors()."<br>";
				$type = "danger";
			}
			else{			
				$data = array('upload_data' => $this->upload->data());
				$save['picture'] = $data['upload_data']['file_name'];
				$text = trim("Employee data was successfully recorded"."<br> ");
				$type = "success";
				$this->cm->insert_data("employee",$save);
			}
			$this->session->set_flashdata('message', aMessage($text,$type));
			redirect('employee');
		}
		$this->_render_page('employee/index', $data);
	}
	
	function last_id(){
		$sql="SELECT MAX(emp_id) as last_id FROM employee;";
		$result = $this->cm->get_statement($sql,1);
		$result =  sprintf('%03d', ($result->last_id)+1);
		echo json_encode($result);
	}
	
	function emp_list(){
		$sql = "SELECT * FROM employee";
		$data['bcrumbs'] = 'Employee';
		$data['employees'] = $this->cm->get_statement($sql,2);
		$this->_render_page('employee/list', $data);
	}
	
	function view($id){
		$sql = "SELECT * FROM employee where employee_id = '$id'";
		$data['emp'] = $this->cm->get_statement($sql,1);
		// debug($data,1);
		$this->_render_page('employee/view', $data);
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
