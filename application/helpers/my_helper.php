<?php
	function aMessage($text,$type){
		return '<div class="row"><div class="col-sm-12"><div class="alert alert-'.$type.' text-center" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$text.'</div></div></div>';
	}
	
	function aMessage2($text,$type,$class){
		return '<div class="row"><div class="col-sm-12"><div class="alert alert-'.$type." ".$class.' text-center" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$text.'</div></div></div>';
	}
	
	function convertToObject($array) {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = convertToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
	
	function send_mail($to, $cc = '', $bcc = '', $subject,$msg) {
	
		 
		$data = array();

		$data['from'] = 'AML System Mail Engine <do-not-reply@agribank.com.ph>';
		$data['to'] = $to;
		$data['subject'] = $subject;
		$data['html'] = $msg;
		if($cc != ''){
			$data['cc'] = $cc;
		}
		if($bcc != ''){
			$data['bcc'] = $bcc;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAILGUN_API);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.MAILGUN_DOMAIN.'/messages');
		//curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandbox90489ea6478b40cb91caac890740c8e3.mailgun.org');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	function dateString($date,$format){
		if($format == 1){
			return date_format(date_create($date), "F j, Y");
		}	
	}

	function encrypt_me($password){
		return  strtoupper(crypt(sha1(md5(htmlspecialchars($password,ENT_QUOTES))),'Xm@n'));
	}
	
	function debug($array, $die = 0){
		echo "<pre>";
		print_r($array);
		if($die == 1) die();
	}
	
	function now_date(){
		return date("Y-m-d");
	}
	function now_datetime(){
		return date("Y-m-d H:i:s");
	}
	function good_format($str){
		return ucwords(strtolower(trim($str)));
	}
	
	function now($c=false){
		switch ($c) {
			case 1:
				return date("Y-m-d");
			case 2:
				return date("d/m/Y");
			case 3:
				return date("d/m/Y H:i:s");
			default:
				return date("Y-m-d H:i:s");
		}
	}

	function getProductPrice($pcode, $contact, $dateorder){
		$CI =& get_instance();	

		$CI->load->model('Pricelist_model', 'Pricelist');
		$price = $CI->Pricelist->getProductPrice($pcode, $contact, $dateorder);
		$value = 0;
		if(!empty($price)){
			$value = $price->price;
		}
		return $value;
	}

	function getProductSupplierPrice($pcode, $contact, $dateorder){
		$CI =& get_instance();	

		$CI->load->model('Pricelist_model', 'Pricelist');
		$price = $CI->Pricelist->getProductSupplierPrice($pcode, $contact, $dateorder);
		$value = 0;
		if(!empty($price)){
			$value = $price->price;
		}
		return $value;
	}


	function getProductPriceDetails($pcode, $contact, $dateorder){
		$CI =& get_instance();	

		$CI->load->model('Pricelist_model', 'Pricelist');
		$price = $CI->Pricelist->getProductPrice($pcode, $contact, $dateorder);
		$value = 0;
		if(!empty($price)){
			$value = $price;
		}
		return $value;
	}

	function getProductSupplierPriceDetails($pcode, $contact, $dateorder){
		$CI =& get_instance();	

		$CI->load->model('Pricelist_model', 'Pricelist');
		$price = $CI->Pricelist->getProductSupplierPrice($pcode, $contact, $dateorder);
		$value = 0;
		if(!empty($price)){
			$value = $price;
		}
		return $value;
	}

	function getContactByCode($code){
		$CI =& get_instance();	

		$CI->load->model('Contacts_model', 'Contact');
		$contact = $CI->Contact->getByCodeRow($code);
		return $contact;
	}

	function getUserByID($id){
		$CI =& get_instance();	

		$CI->load->model('Contacts_model', 'Contact');
		$user = $CI->Contact->getUserByID($id);
		return $user;
	}

	function getFullNameUserByID($id){
		$CI =& get_instance();	

		$CI->load->model('Contacts_model', 'Contact');
		$user = $CI->Contact->getUserByID($id);
		return ucfirst($user->first_name).' '.ucfirst($user->last_name);
	}


	function peso_format($value){
		return '&#8369; '.number_format($value, 2, '.', ',');
	}
