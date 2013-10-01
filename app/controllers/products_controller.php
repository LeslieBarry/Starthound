<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $helpers = array('Html', 'Form','Session');
	var $paginate = array('limit' => 15);
	var $uses = array('Product','Rating');
	function admin_index() {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		if($param=='index')
		{
			$param='';
		}
		$this->set('pageParam',$param); //to maintain paginate state
		
		$this->Product->recursive = 0;
		$this->Product->order= 'Product.title';
		$this->set('products', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$product = $this->Product->read(null, $id);
		if($product['Product']['status']=='active')
		{
			$this->set('product', $product);
		}
		else
		{
			$this->Session->setFlash(__('Please activate the product first', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function admin_add($catId=null) {
		if (!empty($this->data)) {
			
				$this->data['Product']['cdate']= date('Y-m-d h:i:s');
				$this->data['Product']['mdate']= date('Y-m-d h:i:s');
				$this->data['Product']['status']= 'active';
				$this->data['Product']['advertise']= 'yes';
				//print_r($this->data);die;
				$id=null;
				$this->Product->save($this->data);				
				$id = $this->Product->id;
				$this->Rating->create();
				$this->rate = array();
				$this->rate['Rating']['product_id'] =$id;
				$this->rate['Rating']['functionality'] =0;
				$this->rate['Rating']['reliability'] =0;
				$this->rate['Rating']['ease_of_use'] =0;
				$this->rate['Rating']['value_for_money'] =0;				
				$this->rate['Rating']['rating_you'] =0;
				$this->rate['Rating']['no_ofUsers'] =0;
				$this->data['Rating']['mdate']= date('Y-m-d h:i:s');
				$this->Rating->save($this->rate);
				if ($id) {
					if($this->data['Product']['NewImage'])
					{
						$fileOK = parent::uploadFiles('product', $this->data['Product']['NewImage'],$id);
						if(array_key_exists('urls', $fileOK)) {
					// save the url in the form data
						$this->data['Product']['id'] = $id;
						$this->data['Product']['image'] = $fileOK['urls'][0];
						$this->Product->save($this->data);
						}
						else
						{
							$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
						}	
					}
				
					$this->Session->setFlash(__('The product has been saved', true));
					if($catId)
					{
							$this->redirect(array('controller'=>'categories','action' => 'view',$catId));
					}
					else
					{
						$this->redirect(array('action' => 'index'));
					}
					
				} else {
					$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
				}
		}
		if($catId)
		{
			$categories = $this->Product->Category->find('list',array('conditions'=>array('Category.id'=>$catId)));			
		}
		else
		{
			$categories = $this->Product->Category->find('list');
		}		
		$this->set('catId',$catId);
		// following lines pick up the enum value from the column location of table productplan
				$locations = $this->getProductEnumValues('product','location');
			 
				$this->set(compact('locations'));
		// end of setting up the select box;
		$this->set(compact('categories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['Product']['NewImage'])
			{
				$fileOK = parent::uploadFiles('product', $this->data['Product']['NewImage'],$this->data['Product']['id']);
				if(array_key_exists('urls', $fileOK)) {
			// save the url in the form data
				$this->data['Product']['image'] = $fileOK['urls'][0];
				}
				else
				{
					$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
				}	
			}

				$this->data['Product']['mdate']= date('Y-m-d h:i:s');
				//print_r($this->data);die;
				if ($this->Product->save($this->data)) {
					$this->Session->setFlash(__('The product has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
				}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
			if($this->data['Product']['status']=='removed')
			{
				$this->Session->setFlash(__('Please activate the product first', true));
				$this->redirect(array('action' => 'index'));
			}
			
			
		}
		// following lines pick up the enum value from the column location of table productplan
				$locations = $this->getProductEnumValues('product','location');
			 
				$this->set(compact('locations'));
		// end of setting up the select box;
		$categories = $this->Product->Category->find('list');
		
		$this->set(compact('categories'));
	}

	function admin_delete($id = null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Product->read(null, $id);
			//print_r($this->data);die;
			$this->data['Product']['status']='removed';
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Product activated', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function admin_activate($id = null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Product->read(null, $id);
			//print_r($this->data);die;
			$this->data['Product']['status']='active';
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Product activated', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Product was not activated', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function admin_advertise($id = null,$res=null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Product->read(null, $id);
			//print_r($this->data);die;
			if($res==1)
			{
				$this->data['Product']['advertise']='yes';
			}
			else if($res==0)
			{
				$this->data['Product']['advertise']='no';
			}
			
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Adverisement status changed', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Adverisement status could not changed', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function getProductEnumValues($tablename,$fieldname)
	{
		$plan_enum= $this->Product->query("SHOW COLUMNS FROM $tablename where field = '$fieldname';");
				
			  $enum = $plan_enum[0]['COLUMNS']['Type'];
			  $off  = strpos($enum,"(");
			  $enum = substr($enum, $off+1, strlen($enum)-$off-2);
			  $enum = str_replace("'","",$enum);
			  $enum = "Select ".$fieldname.",".$enum;
			  
			  $enum_values = explode(",",$enum);
			  
			  $plans = array_combine($enum_values,$enum_values);
			  return $plans;
	}
}
?>