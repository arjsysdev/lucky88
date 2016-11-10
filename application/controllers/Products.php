<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
        $this->load->model('Rawmat_model','Rawmat');
	}

	// redirect if needed, otherwise display the user list
	public function index(){

			
		$sql = "SELECT A.*, B.* FROM raw_materials A INNER JOIN raw_materials_type B ON A.rm_type = B.rmt_id ORDER BY rm_name";
		$this->data['raw_mat'] = $this->cm->get_query($sql,2);	
        $this->data['bcrumbs'] = 'Products';
		$this->_render_page('products/home', $this->data);
	}

    function additional(){
        $this->data['bcrumbs'] = 'Add New Products';
        $sql = "SELECT * FROM product_category";
        $this->data['prod_cat'] = $this->cm->get_query($sql,2);



        $sql = "SELECT * FROM raw_materials_type ORDER BY title";
        $this->data['raw_type'] = $this->cm->get_query($sql,2); 

        $sql = "SELECT * FROM product_unit";
        $this->data['prod_unit'] = $this->cm->get_query($sql,2); 


        
        $this->data['u_info'] = $this->ion_auth->user()->row();

        $this->_render_page('products/additional', $this->data);
    }

    function get_materials($id){
    	if(!empty($id)){
            $result = $this->Rawmat->getRawmatByType($id);
            $str = '';
            foreach($result as $key => $value){
                $str .= '<option value="'.$value->material_id.'">'.$value->rm_code.'</option>';
            }

            echo $str;
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
