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
	
	function send_mail($send_to, $subject, $content) {

		$api_key = 'key-f45a96d5340b0eda32ceaab7c138e40a';
		$api_domain = 'mg.lucky888food.com';
		// $send_to = 'hmadriano@agribank.com.ph';
		$name = "Lucky 888 Food International";
		$email = "do-not-reply@lucky888food.com";
		// $content = "Sample Mail Gun";
		$messageBody = "Contact: $name ($email) <br/> $content";
		$config = array();
		$config['api_key'] = $api_key;
		$config['api_url'] = 'https://api.mailgun.net/v2/'.$api_domain.'/messages';
		$message = array();
		$message['from'] = $email;
		$message['to'] = $send_to;
		$message['h:Reply-To'] = $email;
		$message['subject'] = $subject;
		$message['html'] = $messageBody;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $config['api_url']);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_POST, true); 
		curl_setopt($curl, CURLOPT_POSTFIELDS,$message);
		$result = curl_exec($curl);
		curl_close($curl);
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

	function getProductSupplierPrice($pcode, $contact, $dateorder, $qty){
		$CI =& get_instance();	

		$CI->load->model('Pricelist_model', 'Pricelist');
		$price = $CI->Pricelist->getProductSupplierPrice($pcode, $contact, $dateorder);
		$value = 0;
		if(!empty($price)){

			if($qty <= $price->mooq){
				$value = $price->price;
			}
			else{
				$value = $price->price2;
			}
			
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
