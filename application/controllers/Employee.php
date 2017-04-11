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
			$save['birthdate'] = date_format(new DateTime($this->input->post('birthdate')),"Y-m-d");
			$save['agency'] = $this->input->post('agency');
			$save['contact_no'] = $this->input->post('contact_no');
			
			$save['designation'] = $this->input->post('designation');
			$save['hired_date'] = date_format(new DateTime($this->input->post('hired_date')),"Y-m-d");
			$save['sss'] = $this->input->post('sss');
			$save['philhealth'] = $this->input->post('philhealth');
			
			$save['pagibig'] = $this->input->post('pagibig');
			$save['termination'] = date_format(new DateTime($this->input->post('termination')),"Y-m-d");
			$save['company'] = $this->input->post('company');
			
			$save['compensation'] = $this->input->post('compensation');
			if($save['compensation'] == "Piece Rate"){
				$piece_rate['c_start_date'] = date_format(new DateTime($this->input->post('c_start_date')),"Y-m-d");
				$piece_rate['c_end_date'] =  date_format(new DateTime($this->input->post('c_end_date')),"Y-m-d");
				$piece_rate['PR_Product_id'] = $this->input->post('PR_Product_id');
				$piece_rate['PR_Compensation'] = $this->input->post('PR_Compensation');
				$piece_rate['PR_Quota'] = $this->input->post('PR_Quota');
				$piece_rate['employee_id'] = $this->input->post('employee_id');
			}else{
				$compensation_emp['c_start_date'] = date_format(new DateTime($this->input->post('c_start_date')),"Y-m-d");
				$compensation_emp['c_end_date'] =  date_format(new DateTime($this->input->post('c_end_date')),"Y-m-d");
				$compensation_emp['c_rate_per_month'] = $this->input->post('c_rate_per_month');
				
				$compensation_emp['c_sss'] = $this->input->post('c_sss');
				$compensation_emp['c_sssloan'] = $this->input->post('c_sssloan');
				$compensation_emp['c_philhealth'] = $this->input->post('c_philhealth');
				
				$compensation_emp['c_pag_ibig'] = $this->input->post('c_pag_ibig');
				$compensation_emp['c_ec'] = $this->input->post('c_ec');
				$compensation_emp['c_insurance'] = $this->input->post('c_insurance');
				
				$compensation_emp['employee_id'] = $this->input->post('employee_id');
			}
			
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
				// debug($piece_rate,1);
				$this->cm->insert_data("employee",$save);
				if($save['compensation'] == "Piece Rate"){
					$this->cm->insert_data("piece_rate",$piece_rate );
				}else{
					$this->cm->insert_data("compensation_emp",$compensation_emp );
				}
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
		$row = $this->cm->get_statement($sql,0);
		$data['bcrumbs'] = "Employee #$id";
		// debug($data,1);
		//redirects if employee_id is not found, thus viewing should not also be available
		if($row == 0){
			show_404();
		}
		$this->_render_page('employee/view', $data);
	}
	
	function emp_details(){
		$employee = $this->input->get("employee_id");
		$sql = "
			select 
					DATE_FORMAT(c_start_date,'%m/%d/%Y') as c_start_date
				,	DATE_FORMAT(c_end_date,'%m/%d/%Y') as c_end_date
				, 	compensation_id
				, 	c_rate_per_month
				,	c_sss
				,	c_sssloan
				,	c_philhealth
				,	c_pag_ibig
				,	c_ec
				,	c_insurance
				from compensation_emp
				where 
				employee_id = '$employee'
				order by compensation_id DESC
				limit 4";
		$data['result'] = $this->cm->get_statement($sql,2);
		echo json_encode($data);
	}
	
	function emp_details2(){
		$employee = $this->input->get("employee_id");
		$sql = "
			select 
					DATE_FORMAT(c_start_date,'%m/%d/%Y') as c_start_date
				,	DATE_FORMAT(c_end_date,'%m/%d/%Y') as c_end_date
				, 	piece_rate_id
				, 	PR_Product_id
				,	PR_Compensation
				,	PR_Quota
				from piece_rate
				where 
				employee_id = '$employee'
				order by piece_rate_id DESC
				limit 4";
		$data['result'] = $this->cm->get_statement($sql,2);
		echo json_encode($data);
	}
	
	function compensation_emp(){
		$employee = $this->input->get("employee_id");
		$sql = "
			select 
					DATE_FORMAT(c_start_date,'%m/%d/%Y') as c_start_date
				,	DATE_FORMAT(c_end_date,'%m/%d/%Y') as c_end_date
				, 	compensation_id
				, 	c_rate_per_month
				,	c_sss
				,	c_sssloan
				,	c_philhealth
				,	c_pag_ibig
				,	c_ec
				,	c_insurance
				from compensation_emp
				where 
				employee_id = '$employee'
				order by compensation_id DESC 
				";
		$data['result'] = $this->cm->get_statement($sql,2);
		echo json_encode($data);
	}
	
	function piece_rate(){
		$employee = $this->input->get("employee_id");
		$sql = "
			select 
					DATE_FORMAT(c_start_date,'%m/%d/%Y') as c_start_date
				,	DATE_FORMAT(c_end_date,'%m/%d/%Y') as c_end_date
				, 	piece_rate_id
				, 	PR_Product_id
				,	PR_Compensation
				,	PR_Quota
				from piece_rate
				where 
				employee_id = '$employee'
				order by piece_rate_id DESC
				limit 4";
		$data['result'] = $this->cm->get_statement($sql,2);
		echo json_encode($data);
	}
	
	function add_compensation(){
		$data['compensation_id'] = $this->input->post('compensation_id');
		$data['employee_id'] = $this->input->post('employee_id');
		$data['c_start_date'] = $this->input->post('c_start_date');
		$data['c_end_date'] = $this->input->post('c_end_date');
		$data['c_rate_per_month'] = preg_replace("/,/","",$this->input->post('c_rate_per_month'));
		
		$data['c_sss'] = preg_replace("/,/","",$this->input->post('c_sss'));
		$data['c_sssloan'] = preg_replace("/,/","",$this->input->post('c_sssloan'));
		$data['c_philhealth'] = preg_replace("/,/","",$this->input->post('c_philhealth'));
		
		$data['c_pag_ibig'] = preg_replace("/,/","",$this->input->post('c_pag_ibig'));
		$data['c_ec'] = preg_replace("/,/","",$this->input->post('c_ec'));
		$data['c_insurance'] = preg_replace("/,/","",$this->input->post('c_insurance'));
		
		foreach($data['compensation_id'] as $k => $v){
			$save['employee_id'] = $this->input->post('employee_id');
			$save["c_start_date"] = date_format(new DateTime($data['c_start_date'][$k]),"Y-m-d");
			$save["c_end_date"] = date_format(new DateTime($data['c_end_date'][$k]),"Y-m-d");
			$save["c_rate_per_month"] = $data['c_rate_per_month'][$k];
			
			$save["c_sss"] = $data['c_sss'][$k];
			$save["c_sssloan"] = $data['c_sssloan'][$k];
			$save["c_philhealth"] = $data['c_philhealth'][$k];
			
			$save["c_pag_ibig"] = $data['c_pag_ibig'][$k];
			$save["c_ec"] = $data['c_ec'][$k];
			$save["c_insurance"] = $data['c_insurance'][$k];
			
			if(empty($v)){
				#INSERT
				if(empty($save['c_start_date'][$k]) or empty($save['c_end_date'][$k]) or empty($save['c_rate_per_month'][$k]) or empty($save['c_sss'][$k]) or empty($save['c_sssloan'][$k]) or empty($save['c_philhealth'][$k]) or empty($save['c_pag_ibig'][$k]) or empty($save['c_ec'][$k]) or empty($save['c_insurance'][$k])){
					echo "$k NO SAVE"."<br>";
				}else{
					echo "$k SAVE"."<br>";
					$this->cm->insert("compensation_emp",$save);
				}
			}else{
				#UPDATE
				$where['compensation_id'] = $v;
				//echo "$k MERON"."<br>";
				$this->cm->get_update("compensation_emp",$save,$where);
			}
		}
		// debug($data,1);
		redirect("employee/view/".rawurlencode($data['employee_id']));
	}
	
	function add_piece_rate(){
		$data['piece_rate_id'] = $this->input->post('piece_rate_id');
		$data['employee_id'] = $this->input->post('employee_id');
		$data['c_start_date'] = $this->input->post('c_start_date');
		$data['c_end_date'] = $this->input->post('c_end_date');
		$data['PR_Product_id'] = $this->input->post('PR_Product_id');
		$data['PR_Compensation'] = preg_replace("/,/","",$this->input->post('PR_Compensation'));
		$data['PR_Quota'] = preg_replace("/,/","",$this->input->post('PR_Quota'));
		
		foreach($data['piece_rate_id'] as $k => $v){
			$save["c_start_date"] = date_format(new DateTime($data['c_start_date'][$k]),"Y-m-d");
			$save["c_end_date"] = date_format(new DateTime($data['c_end_date'][$k]),"Y-m-d");
			$save["PR_Product_id"] = $data['PR_Product_id'][$k];
			$save["PR_Compensation"] = $data['PR_Compensation'][$k];
			$save["PR_Quota"] = $data['PR_Quota'][$k];
			$save['employee_id'] = $this->input->post('employee_id');
			
			if(empty($v)){
				#INSERT
				if(empty($save['c_start_date'][$k]) or empty($save['c_end_date'][$k]) or empty($save['PR_Product_id'][$k]) or empty($save['PR_Compensation'][$k]) or empty($save['PR_Quota'][$k])){
					// echo "$k NO SAVE"."<br>";
				}else{
					// echo "$k SAVE"."<br>";
					$this->cm->insert("piece_rate",$save);
				}
			}else{
				#UPDATE
				$where['piece_rate_id'] = $v;
				// echo "$k MERON"."<br>";
				$this->cm->get_update("piece_rate",$save,$where);
			}
		}
		// debug($data,1);
		redirect("employee/view/".rawurlencode($data['employee_id']));
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
