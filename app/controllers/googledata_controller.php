<?php
class GoogledataController extends AppController {

	var $name = 'Googledata';
	var $helpers = array('Html', 'Form','Session');
	var $paginate = array('limit' => 15);
	
	
	function admin_index() {
		//$this->getAnalytics();
		$this->Googledatum->recursive = 0;
		$this->set('googledata', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Id selected', true), array('action' => 'index'));
		}
		$this->set('googledatum', $this->Googledatum->read(null, $id));
		$this->getAnalytics($id);
	}
	function getAnalytics($id)
	{
		$apiKey = Configure::read('API_KEY');
		//Get API key from : http://code.google.com/apis/console/
		$googleDatum = $this->Googledatum->read(null,$id);
		
		
			$shortUrl = $googleDatum['Googledatum']['short_url'];
			$url = "https://www.googleapis.com/urlshortener/v1/url?key=".$apiKey."&shortUrl=".$shortUrl."&projection=FULL";	
			
			$curlObj = curl_init();			 
			curl_setopt($curlObj, CURLOPT_URL, $url);
			curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlObj, CURLOPT_HEADER, 0);
			curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));			
			$response = curl_exec($curlObj);			
			$json = json_decode($response);			 
			curl_close($curlObj);
			$clicks = $json->analytics->allTime->shortUrlClicks;
			$this->data['Googledatum']['id'] = $googleDatum['Googledatum']['id'];
			$this->data['Googledatum']['clicks'] = $clicks;
			$this->data['Googledatum']['cdate']= date($json->created);
			//$this->data['Googledatum']['mdate']= date('Y-m-d h:i:s');
			$this->data['Googledatum']['completeinfo']= $response;
			$this->Googledatum->save($this->data);
		
		return;
		
	}
	function getClick()
	{
		$param = $this->params['url'];			
		$urlID = $param['urlID'];
		$googleData = $this->Googledatum->find('first', array('conditions' =>array('Googledatum.id'=>$urlID),'recursive'=>0));
		$this->data['Googledatum']['id']=$googleData['Googledatum']['id'];
		$this->data['Googledatum']['mdate']= date('Y-m-d h:i:s');
		$this->Googledatum->save($this->data);
		$this->redirect($googleData['Googledatum']['short_url']);
	}
	

}
?>