<?php
class ProductplansController extends AppController {

	var $name = 'Productplans';
	var $paginate = array('limit' => 15);
	var $helpers = array('Html', 'Form','Session');
	
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

	
		$this->Productplan->recursive = 2;
		$this->Productplan->order = array('Product.title','Productplan.plan');
		
		$this->set('productplans', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Product Plan', true));
			$this->redirect(array('action' => 'index'));
		}
		$productPlan = $this->Productplan->read(null, $id);
		if($productPlan['Productplan']['status']=='active')
		{
			$this->set('productplan',$productPlan);
		}
		else
		{
			$this->Session->setFlash(__('Please activate the product plan first', true));
			$this->redirect(array('action' => 'index'));
		}
		
		
		
	}

	function admin_add($prodId=null) {
		
		if (!empty($this->data)) {
			$this->data['Productplan']['cdate']= date('Y-m-d h:i:s');
			$this->data['Productplan']['mdate']= date('Y-m-d h:i:s');
			$this->data['Productplan']['status']= 'active';
			$productId = $this->data['Productplan']['product_id'];
			$plan = $this->data['Productplan']['plan'];
			$existingPlans = $this->Productplan->find('list',array('conditions'=>array('Productplan.product_id'=>$productId,'Productplan.plan'=>$plan,'Productplan.status'=>'active')));
			if($existingPlans)
			{
				$this->Session->setFlash(__('This Plan number is alredy assigned. select a differnt plan', true));
			}
			else
			{
				if ($this->Productplan->save($this->data)) {
					$this->Session->setFlash(__('The Product Plan has been saved', true));
					if($prodId)
					{
							$this->redirect(array('controller'=>'Products','action' => 'view',$prodId));
					}
					else
					{
						$this->redirect(array('action' => 'index'));
					}
				} else {
					$this->Session->setFlash(__('The Product Plan could not be saved. Please, try again.', true));
				}
			}
		}
		
		if($prodId)
		{
			$productList = $this->Productplan->Product->find('list',array('conditions'=>array('Product.id'=>$prodId),array('order'=>'Product.title ASC')));
		}
		else
		{
			$productList = $this->Productplan->Product->find('list',array('order'=>'Product.title ASC'));
		}
		
		$products = array();
		$products[0]="Select product";
		foreach($productList as $key=>$value)
		{
			$products[$key] = $value;
		}
		//print "<pre>";
		//print_r($productList);die;
		// following lines pick up the enum value from the column plan of table productplan
				$plans = $this->getPlanEnumValues('productplan','plan');
			 
				$this->set(compact('plans'));
		// end of setting up the select box;
		//To set the term dropdown
		$this->set('prodId',$prodId);
		$this->set(compact('products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Product Plan', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Productplan->save($this->data)) {
				$this->Session->setFlash(__('The Product Plan has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Product Plan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Productplan->read(null, $id);
			if($this->data['Productplan']['status']=='active')
			{
				$this->set('productplan',$this->data);
			}
			else
			{
				$this->Session->setFlash(__('Please activate the product plan first', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		$products = $this->Productplan->Product->find('list');
		$this->set(compact('products'));
		// following lines pick up the enum value from the column plan of table productplan
				$plans = $this->getPlanEnumValues('productplan','plan');
				
				$this->set(compact('plans'));
		// end of setting up the select box;

	}

	function admin_delete($id = null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);

	
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product Plan', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Productplan->read(null, $id);
			//print_r($this->data);die;
			$this->data['Productplan']['status']='removed';
			if ($this->Productplan->save($this->data)) {
				$this->Session->setFlash(__('Product Plan deleted', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		/*if ($this->Productplan->delete($id)) {
			$this->Session->setFlash(__('Productplan deleted', true));
			$this->redirect(array('action'=>'index'));
		}*/
		$this->Session->setFlash(__('Product Plan was not deleted', true));
		$this->redirect(array('action'=>'index/'.$param));
	}
	function admin_activate($id = null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product Plan', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Productplan->read(null, $id);
			//print_r($this->data);die;
			$this->data['Productplan']['status']='active';
			if ($this->Productplan->save($this->data)) {
				$this->Session->setFlash(__('Product Plan activated', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Product Plan was not activated', true));
		$this->redirect(array('action'=>'index/'.$param));
	}
	function getPlanEnumValues($tablename,$fieldname)
	{
		$plan_enum= $this->Productplan->query("SHOW COLUMNS FROM $tablename where field = '$fieldname';");
				
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