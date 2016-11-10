<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawMaterials extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

	}

	// redirect if needed, otherwise display the user list
	public function index(){


		$this->data['bcrumbs'] = 'Raw Materials';
		$sql = "SELECT A.*, B.* FROM raw_materials A INNER JOIN raw_materials_type B ON A.rm_type = B.rmt_id ORDER BY rm_name";
		$this->data['raw_mat'] = $this->cm->get_query($sql,2);	

		$this->_render_page('raw_material/home', $this->data);
	}

	function additional(){

        $this->data['bcrumbs'] = 'Add New Raw Materials';
		$sql = "SELECT * FROM raw_materials_type ORDER BY title";
		$this->data['raw_type'] = $this->cm->get_query($sql,2);	
		
		$userid = $this->session->userdata('user_id');
		$sql = "SELECT id,first_name,last_name FROM users WHERE id='$userid'";
		$this->data['u_info'] = $this->cm->get_query($sql,1);


		if(isset($_GET['r'])){
			$mid = $_GET['r'];
			$sql = "SELECT  * FROM raw_materials WHERE material_id='$mid'";
			$this->data['raw_info'] = $this->cm->get_query($sql,1);	

			$this->_render_page('raw_material/update_addtional', $this->data);
		}
		else{
			$this->_render_page('raw_material/additional', $this->data);
			
		}

	}

	function save_additional(){
		$config['upload_path']          = './assets/raw_materials/';
		$config['allowed_types']        = 'png|jpg|jpeg';
    
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){
            $msg = $this->upload->display_errors();
        }
        else {

            $upload_data = $this->upload->data();

            $file_name = $upload_data['file_name'];
           
            $userid = $this->session->userdata('user_id');


            $rm_code = $this->input->post('rm_code');
            $rm_name = $this->input->post('rm_name');
            $rm_type = $this->input->post('rm_type');
            $rm_weight = $this->input->post('rm_weight');
            $rm_pcs = $this->input->post('rm_pcs');
            
            $rm_di_length = 0;
            $rm_di_width = 0;
            $rm_di_height = 0;

            if( $rm_type == 3){

	            $rm_di_length = $this->input->post('rm_di_length');
	            $rm_di_width = $this->input->post('rm_di_width');
	            $rm_di_height = $this->input->post('rm_di_height');
	        }

            $prepared_by = $this->input->post('prepared_by');
            //$asd = $this->input->post('rm_code');
     
            $save = array(
            	'rm_code'=>$rm_code,
            	'rm_img'=>$file_name,
            	'rm_name'=>$rm_name,
            	'rm_type'=>$rm_type,
            	'rm_weight'=>$rm_weight,
            	'rm_pcs'=>$rm_pcs,
            	'rm_di_length'=>$rm_di_length,
            	'rm_di_width'=>$rm_di_width,
            	'rm_di_height'=>$rm_di_height,
            	'prepared_by'=>$userid,
            	// 'last_edited'=>$asd,
        	);
        	$this->cm->insert('raw_materials',$save);

        	$msg = "Raw Material Saved!";
        }

        $this->session->set_flashdata('message',$msg);

        redirect('RawMaterials');
	}

	function update_additional($mid){

		$config['upload_path']          = './assets/raw_materials/';
		$config['allowed_types']        = 'png|jpg|jpeg';


		$userid = $this->session->userdata('user_id');

        $old_img = $this->input->post('old_img');

        $rm_code = $this->input->post('rm_code');
        $rm_name = $this->input->post('rm_name');
        $rm_type = $this->input->post('rm_type');
        $rm_weight = $this->input->post('rm_weight');
        $rm_pcs = $this->input->post('rm_pcs');
        $rm_di_length = $this->input->post('rm_dlength');
        $rm_di_width = $this->input->post('rm_dwidth');
        $rm_di_height = $this->input->post('rm_dheight');
    
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){
            $file_name = $old_img;
        }
        else {

            $upload_data = $this->upload->data();

            $file_name = $upload_data['file_name'];
           
        }



            if( $rm_type != 3){
            	
            	$rm_di_length = 0;
	            $rm_di_width = 0;
	            $rm_di_height = 0;
	            
	        }

            $prepared_by = $this->input->post('prepared_by');
            //$asd = $this->input->post('rm_code');
     
            $save = array(
            	'rm_code'=>$rm_code,
            	'rm_img'=>$file_name,
            	'rm_name'=>$rm_name,
            	'rm_type'=>$rm_type,
            	'rm_weight'=>$rm_weight,
            	'rm_pcs'=>$rm_pcs,
            	'rm_di_length'=>$rm_di_length,
            	'rm_di_width'=>$rm_di_width,
            	'rm_di_height'=>$rm_di_height,
            	//'prepared_by'=>$userid,
            	// 'last_edited'=>$asd,
        	);
        	$where['material_id'] = $mid;
        	$this->cm->get_update('raw_materials',$save,$where);

        	$msg = "Raw Material Updated!";

        $this->session->set_flashdata('message',$msg);

        redirect('RawMaterials');
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
