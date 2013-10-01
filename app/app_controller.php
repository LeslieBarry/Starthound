<?php
    class AppController extends Controller{
        var $params            = array();
        var $webURL            = '';
        var $cssURL            = '/css';
        var $jsURL             = '/js';
        var $imgURL            = '/img';
        var $helpers           = array('Form','Html','Javascript','Ajax');
  
        function beforeRender(){
              $this->params['webURL']    = $this->webURL;
              $this->params['cssURL']    = $this->cssURL;
              $this->params['jsURL']     = $this->jsURL;
              $this->params['imgURL']    = $this->imgURL;
              $this->set('params', $this->params);
       }
	   function beforeFilter()

    {

        // if its the administrator/manager - change the layout

        $pos = strpos($_SERVER['REQUEST_URI'], 'admin');

        if($pos == true)

        {
			$this->layout='admin';
			if($this->action != 'admin_login' && $this->action != 'admin_logout' && $this->action != 'admin_forgotPassword' && $this->action !='admin_resetPassword')
			{
				if($this->Session->check('User') == false)
				{
					$this->redirect(array('controller'=>'administrators','action'=>'admin_login'));
					$this->Session->setFlash('The URL you\'ve followed requires you login.');
					
				} 
				else
				{
					
					$user = $this->Session->read('User');
					$this->set('user',$user);
					$this->set('menuitem','afterlogin');          

				}
			}
			else
			{
				$this->set('menuitem','beforelogin');
			}
		}
	}
	//to get the shortened urls
	function shortenURL($url)
	{
		App::import('Vendor', 'xhttp') ; 
		$apiKey = Configure::read('API_KEY');
		
		$email    = 'googl@cheapstart.com.au'; // GMail or Google Apps email address
		$password = 'g@@gltoken';
		$curlObj = curl_init();
		 
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.google.com/accounts/ClientLogin?accountType=HOSTED_OR_GOOGLE&Email='.$email.'&Passwd='.$password.'&service=urlshortener&source=cheapstart');
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 0);		 
		$response = curl_exec($curlObj);
		
		preg_match('/Auth=(.+)/', $response, $matches);
		$auth = $matches[1];		 
		curl_close($curlObj);
		
		 $data = array();
		if(isset($auth)) $data['headers']['Authorization'] = "GoogleLogin auth=$auth";
		if($apiKey) $data['get']['key'] = $apiKey;

		$data['headers']['Content-Type'] = "application/json";
		$data['post'] = array('longUrl' => $url,);

		$response = xhttp::fetch("https://www.googleapis.com/urlshortener/v1/url", $data);

		if($response['successful']) {
			$var = json_decode($response['body'], true);
			$shortURL = $var['id'];
			return $shortURL;

		} else {
			return "error";
		}
	}
	
	   function uploadFiles($folder, $formdata, $itemId = null) {
	// setup dir names absolute and relative
	$folder_url = IMAGES.$folder;
	//print_r($formdata);die;
	$rel_url = $folder;
	
	// create the folder if it does not exist
	if(!is_dir($folder_url)) {
		mkdir($folder_url);
	}
		
	// if itemId is set create an item folder
	if($itemId) {
		// set new absolute folder
		$folder_url = IMAGES.$folder.DS.$itemId; 
		//echo $folder_url;die;
		// set new relative folder
		$rel_url = $folder.DS.$itemId;
		// create directory
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}
	}
	
	// list of permitted file types, this is only images but documents can be added
	$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
	
	// loop through and deal with the files
	//print_r($formdata);die;
	//if multiple uploads are allowed uncomment the following line and line no 243 and comment line no 184
	//foreach($formdata as $file) {
		$file= $formdata;

		// replace spaces with underscores
		$filename = str_replace(' ', '_', $file['name']);
		// assume filetype is false
		$typeOK = false;
		// check filetype is ok
		
		foreach($permitted as $type) {
			if($type == $file['type']) {
				$typeOK = true;
				break;
			}
		}
		//die;
		// if file type ok upload the file
		if($typeOK) {
			// switch based on error code
			switch($file['error']) {
				case 0:
					// check filename already exists
					if(!file_exists($folder_url.DS.$filename)) {
						// create full filename
						$full_url = $folder_url.DS.$filename;
						$url = $rel_url.DS.$filename;
						// upload the file
						$success = move_uploaded_file($file['tmp_name'], $full_url);
					} else {
						// create unique filename and upload file
						ini_set('date.timezone', 'Europe/London');
						$now = date('Y-m-d-His');
						$filename = $now.$filename;
						$full_url = $folder_url.'/'.$filename;
						$url = $rel_url.'/'.$now.$filename;
						$success = move_uploaded_file($file['tmp_name'], $full_url);
					}
					// if upload was successful
					if($success) {
						// save the url of the file
						$result['urls'][] = $filename;
					} else {
						$result['errors'][] = "Error uploaded $filename. Please try again.";
					}
					break;
				case 3:
					// an error occured
					$result['errors'][] = "Error uploading $filename. Please try again.";
					break;
				default:
					// an error occured
					$result['errors'][] = "System error uploading $filename. Contact webmaster.";
					break;
			}
		} elseif($file['error'] == 4) {
			// no file was selected for upload
			$result['nofiles'][] = "No file Selected";
		} else {
			// unacceptable file type
			$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
		}
	//}
	//print_r($result);die;
return $result;
}
	function socialURL($url)
	{
		$postData = array('longUrl' => $url);
		$jsonData = json_encode($postData);
		 
		$curlObj = curl_init();
		 
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
		 
		$response = curl_exec($curlObj);
		//print_r($response);die;
		//change the response json string to object
		$json = json_decode($response);
		 
		curl_close($curlObj);
		 
		return $json->id;

	}
	function getMonthDateYear($date)
	{
			//echo $date;
			$arr=explode(' ',$date);
			$date=explode('-',$arr[0]);
			$time=explode(':',$arr[1]);
			$h=$time[0];
			$min=$time[1];
			$ss=$time[2];
			$y=$date[0];
			$m=$date[1];
			$d=$date[2];
			$val = date('M j, Y',mktime($h, $min, $ss, $m, $d, $y));
			//echo $val;die;
			return($val);
	}

     }
?>