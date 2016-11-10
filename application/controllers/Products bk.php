<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

    function additional(){
        $sql = "SELECT * FROM product_category";
        $this->data['prod_cat'] = $this->cm->get_query($sql,2);



        $sql = "SELECT * FROM raw_materials_type ORDER BY title";
        $this->data['raw_type'] = $this->cm->get_query($sql,2); 

        $sql = "SELECT * FROM product_unit";
        $this->data['prod_unit'] = $this->cm->get_query($sql,2); 


        $userid = $this->session->userdata('user_id');
        $sql = "SELECT id,first_name,last_name FROM users WHERE id='$userid'";
        $this->data['u_info'] = $this->cm->get_query($sql,1);

        $this->_render_page('products/additional', $this->data);
    }

	public function register(){
		$data['title'] = 'Register Products';
		$this->_render_page('products/register', $data);
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
