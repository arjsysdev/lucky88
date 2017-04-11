<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
        $this->load->model('Products_model');
	}

	// redirect if needed, otherwise display the user list
	public function index(){

			
		$sql = "SELECT a.prod_id, a.prod_code, a.bar_code, a.prod_name, a.prod_type, a.prod_cat, a.prod_pcs, b.cat_id, b.cat_title FROM products a INNER JOIN product_category b ON a.prod_cat = b.cat_id";
		$this->data['products'] = $this->cm->get_query($sql,2);	
		$sql = "SELECT A.*, B.* FROM raw_materials A INNER JOIN raw_materials_type B ON A.rm_type = B.rmt_id ORDER BY rm_name";
		$this->data['raw_mat'] = $this->cm->get_query($sql,2);	
       		$this->data['bcrumbs'] = 'Products';
       



		$this->_render_page('products/home', $this->data);
	}



    function create_products(){
        $this->data['bcrumbs'] = 'Add New Products';

        $userid = $this->session->userdata('user_id');
        $sql = "SELECT id,first_name,last_name FROM users WHERE id='$userid'";
        $this->data['u_info'] = $this->Products_model->get_query($sql,1);


        $this->_render_page('products/create_product', $this->data);
    }

    function additional(){
        $this->data['bcrumbs'] = 'Add New Products';
        $sql = "SELECT * FROM product_category";
        $this->data['prod_cat'] = $this->cm->get_query($sql,2);



        $sql = "SELECT * FROM raw_materials_type ORDER BY title";
        $this->data['raw_type'] = $this->cm->get_query($sql,2); 

        $sql = "SELECT * FROM product_unit";
        $this->data['prod_unit'] = $this->cm->get_query($sql,2); 


        $userid = $this->session->userdata('user_id');
        $sql = "SELECT id,first_name,last_name FROM users WHERE id='$userid'";
        $this->data['u_info'] = $this->cm->get_query($sql,1);

        $sql = "SELECT material_id, rm_code,rm_name, rm_type FROM raw_materials ";
        $this->data['raw_materials'] = $this->cm->get_query($sql,2);

        

        $userid = $this->session->userdata('user_id');
        $sql = "SELECT id,first_name,last_name FROM users WHERE id='$userid'";
        $this->data['u_info'] = $this->cm->get_query($sql,1);
       
        if(isset($_GET['p'])){
            $prod_id = $_GET['p'];
            $this->data['p'] = $_GET['p'];
            
            $sql = "SELECT a.prod_id, a.prod_code, a.bar_code, a.prod_name, a.prod_type, a.brand_name, a.prod_weight, a.prod_cat, a.prod_pcs, b.cat_id, b.cat_title FROM products a INNER JOIN product_category b ON a.prod_cat = b.cat_id WHERE a.prod_id = '$prod_id' ";
            $this->data['products'] = $this->cm->get_query($sql,1); 

            $sql = "SELECT * FROM product_ingredients WHERE prod_id = '$prod_id' ";
            $this->data['prod_ing'] = $this->cm->get_query($sql,2); 
			// debug( $this->data,1);
           

            $this->_render_page('products/update', $this->data);
        }
        else{
           $this->_render_page('products/additional', $this->data);
            
        }



    }

    function get_materials($raw_type){
    	$sql = "SELECT material_id, rm_code,rm_name, rm_type FROM raw_materials WHERE rm_type='$raw_type' ";
    	$result  = $this->cm->get_query($sql,2);

    	$arr = array();
    	$ctr = 0;
    	foreach($result as $keys){

    		$arr[0][$ctr] = $keys->material_id;
    		$arr[1][$ctr] = $keys->rm_code;
    		$arr[2][$ctr] = $keys->rm_name;


    		$ctr++;
    	}

    	echo json_encode($arr);

    }

    function save_additional(){

        $prod_code = $this->input->post('prod_code');
        $bar_code = $this->input->post('bar_code');
        $prod_type = $this->input->post('prod_type');
        $prod_name = $this->input->post('prod_name');
        $brand_name = $this->input->post('brand_name');
        $prod_cat = $this->input->post('prod_cat');
        $prod_weight = $this->input->post('prod_weight');
        $prod_pcs = $this->input->post('prod_pcs');



        $prod_save  = array(
                'prod_code' => $prod_code,
                'bar_code' => $bar_code,
                'prod_type' => $prod_type,
                'prod_name' => $prod_name,
                'brand_name' => $brand_name,
                'prod_cat' => $prod_cat,
                'prod_weight' => $prod_weight,
                'prod_pcs' => $prod_pcs,
                );
        $this->cm->insert('products',$prod_save);
        $last_id = $this->db->insert_id();

        $ing_name = $this->input->post('ing_name');
        $ing_qty = $this->input->post('ing_qty');
        $ing_unit = $this->input->post('ing_unit');
        $ing_material = $this->input->post('ing_mat');
        $ing_startDate = $this->input->post('ing_startDate');
        $ing_endDate = $this->input->post('ing_endDate');
        // $limit =  count($ing_name) - 1;
        $ctr = 0;
        // for($ctr = 0; $ctr <= $limit; $ctr++){
            // $ing_save  = array(
                // 'prod_id' => $last_id,
                // 'ing_name' => $ing_name[$ctr],
                // 'ing_qty' => $ing_qty[$ctr],
                // 'ing_unit' => $ing_unit[$ctr],
                // 'ing_material' => $ing_material[$ctr],
                // );
				// debug($ing_save);
            //#$this->cm->insert('product_ingredients',$ing_save);
        // }
		
		foreach($ing_name as $k=>$v){
			$save['prod_id'] = $last_id;
			$save['ing_name'] = $v;
			$save['ing_qty'] = $ing_qty[$k];
			$save['ing_unit'] = $ing_unit[$k];
			$save['ing_material'] = $ing_material[$k];
			$save['ing_startDate'] = date_format(new DateTime($ing_startDate[$k]),"Y-m-d");
			$save['ing_endDate'] = date_format(new DateTime($ing_endDate[$k]),"Y-m-d");
			$this->cm->insert('product_ingredients',$save);
		}
		// debug($save,1);
        $msg = "New Product Added";
        $this->session->set_flashdata('message',$msg);
        redirect('Products');

    }

  

    function update_additional(){

        $prod_id = $_GET['p'];

        $prod_code = $this->input->post('prod_code');
        $bar_code = $this->input->post('bar_code');
        $prod_type = $this->input->post('prod_type');
        $prod_name = $this->input->post('prod_name');
        $brand_name = $this->input->post('brand_name');
        $prod_cat = $this->input->post('prod_cat');
        $prod_weight = $this->input->post('prod_weight');
        $prod_pcs = $this->input->post('prod_pcs');

        $where['prod_id'] = $prod_id;
        $prod_save  = array(
                'prod_code' => $prod_code,
                'bar_code' => $bar_code,
                'prod_type' => $prod_type,
                'prod_name' => $prod_name,
                'brand_name' => $brand_name,
                'prod_cat' => $prod_cat,
                'prod_weight' => $prod_weight,
                'prod_pcs' => $prod_pcs,
                );
        $this->cm->get_update('products',$prod_save,$where);
      
        // $sql = "DELETE FROM product_ingredients WHERE prod_id = '$prod_id' ";
        // $this->cm->get_query($sql,3);
		
        $ing_id = $this->input->post('ing_id');
        $ing_name = $this->input->post('ing_name');
        $ing_qty = $this->input->post('ing_qty');
        $ing_unit = $this->input->post('ing_unit');
        $ing_material = $this->input->post('ing_mat');
        $ing_startDate = $this->input->post('ing_startDate');
        $ing_endDate = $this->input->post('ing_endDate');

        // $limit =  count($ing_name) - 1;
        // $ctr = 0;
        // for($ctr = 0; $ctr <= $limit; $ctr++){

            // $ing_save  = array(
                // 'prod_id' => $prod_id,
                // 'ing_name' => $ing_name[$ctr],
                // 'ing_qty' => $ing_qty[$ctr],
                // 'ing_unit' => $ing_unit[$ctr],
                // 'ing_material' => $ing_material[$ctr],
                // 'ing_startDate' => date_format(new DateTime($ing_startDate[$k]),"Y-m-d"),
                // 'ing_endDate' => date_format(new DateTime($ing_endDate[$k]),"Y-m-d"),
                // );
            // $this->cm->insert('product_ingredients',$ing_save);
        // }
		
		
		foreach($ing_name as $k=>$v){
			$save['prod_id'] = $prod_id;
			$save['ing_name'] = $v;
			$save['ing_qty'] = $ing_qty[$k];
			$save['ing_unit'] = $ing_unit[$k];
			$save['ing_material'] = $ing_material[$k];
			$save['ing_startDate'] = date_format(new DateTime($ing_startDate[$k]),"Y-m-d");
			$save['ing_endDate'] = date_format(new DateTime($ing_endDate[$k]),"Y-m-d");
			if(empty($ing_id[$k])){
				// $sql="SELECT MAX(ing_id) FROM product_ingredients";
				// $save['ing_id'] = $this->cm->get_query($sql,3);
				$this->cm->insert('product_ingredients',$save);
			}else{
				$where['ing_id'] = $ing_id[$k];
				$this->cm->get_update('product_ingredients',$save,$where);
			}
		}

        $msg = "Product Updated";
        $this->session->set_flashdata('message',$msg);
        redirect('Products');

    }
	
	function delete_each($p){
		$ing_id = $this->input->post("delete");
		
		foreach($ing_id as $k => $v){
			// echo $v."<br/>";
			if($v == "on"){
				$v = "null";
			}
			$sql = "DELETE FROM product_ingredients where ing_id = ".$v;
			$this->cm->get_query($sql,3);
		}
		redirect("Products/additional?p=$p");
		// debug($ing_id,1);
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
