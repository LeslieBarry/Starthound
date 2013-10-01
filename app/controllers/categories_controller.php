<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	var $helpers = array('Html', 'Form','Session');
	var $paginate = array('limit' => 15);
	
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
		$this->set('pageParam',$param);
		$orderInfo = $this->Category->find('first',array('fields'=>array('max(category.order)','min(category.order)')));
			$maxOrder = $orderInfo[0]['max(`category`.`order`)'];
			$minOrder = $orderInfo[0]['min(`category`.`order`)'];
			$this->set('maxOrder',$maxOrder);
			$this->set('minOrder',$minOrder);
		$this->Category->recursive = 0;
		$this->Category->order= 'Category.order';
		$this->set('categories', $this->paginate());
	}	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$category = $this->Category->read(null, $id);
		if($category['Category']['status']=='active')
		{
			$this->set('category',$category);
		}
		else
		{
			$this->Session->setFlash(__('Please activate the category', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->data['Category']['cdate']= date('Y-m-d h:i:s');
			$this->data['Category']['mdate']= date('Y-m-d h:i:s');
			$this->data['Category']['status']= 'active';
			$id=null;
			$oldCategory = $this->Category->find('first',array('conditions'=>array('Category.order'=>$this->data['Category']['order'],'Category.status'=>'active'),'recursive'=>-1));
			//print_r($oldCategory);die;
			if($oldCategory)
			{
				$this->Session->setFlash(__('Please check the order', true));
				$this->redirect(array('action' => 'add'));exit();
			}
			else
			{
				$this->Category->save($this->data);
			}
			
			$id = $this->Category->id;
			if ($id) {
				if($this->data['Category']['NewSelImage'])
				{
					$fileOK = parent::uploadFiles('category'.DS.$id, $this->data['Category']['NewSelImage'],'selected');
					if(array_key_exists('urls', $fileOK)) {
				// save the url in the form data
					$this->data['Category']['id'] = $id;
					$this->data['Category']['image'] = $fileOK['urls'][0];
					$this->Category->save($this->data);
					}
					else
					{
						$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
					}	
				}
				if($this->data['Category']['NewUnselImage'])
				{
					$this->data['Category']['NewUnselImage']['name']=$this->data['Category']['NewSelImage']['name'];
					$fileOK = parent::uploadFiles('category'.DS.$id, $this->data['Category']['NewUnselImage'],'unselected');
					if(array_key_exists('urls', $fileOK)) 
					{
						// save the url in the form data
						$this->data['Category']['id'] = $id;
						$this->data['Category']['image'] = $fileOK['urls'][0];
						
					}
					else
					{
						$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
					}	
				}
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		else
		{
			$orderInfo = $this->Category->find('first',array('fields'=>array('max(category.order)')));
			$newOrder = $orderInfo[0]['max(`category`.`order`)']+1;
			$this->set('newOrder',$newOrder);
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['Category']['NewSelImage'])
			{
				$fileOK = parent::uploadFiles('category/'.$this->data['Category']['id'].'/selected', $this->data['Category']['NewSelImage']);
				if(array_key_exists('urls', $fileOK)) {
			// save the url in the form data
				$this->data['Category']['image'] = $fileOK['urls'][0];
				}
				else
				{
					$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
				}	
			}
			if($this->data['Category']['NewUnselImage'])
			{
				$this->data['Category']['NewUnselImage']['name']=$this->data['Category']['NewSelImage']['name'];
				$fileOK = parent::uploadFiles('category/'.$this->data['Category']['id'].'/unselected', $this->data['Category']['NewUnselImage']);
				if(array_key_exists('urls', $fileOK)) {
			// save the url in the form data
				$this->data['Category']['image'] = $fileOK['urls'][0];
				}
				else
				{
					$this->Session->setFlash(__('The file could not be uploaded. Please, try again.', true));
				}	
			}


				$this->data['Category']['mdate']= date('Y-m-d h:i:s');
				//print_r($this->data);die;
				if ($this->Category->save($this->data)) {
					$this->Session->setFlash(__('The category has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
				}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
			if($this->data['Category']['status']=='removed')
			{
				$this->Session->setFlash(__('Please activate the category', true));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function admin_delete($id = null) {
		//to maintain the page view
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);

		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'/'.$param));
			}
		else
		{
			$this->data = $this->Category->read(null, $id);
			//print_r($this->data);die;
			$this->data['Category']['status']='removed';
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Category removed', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Category was not removed', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function admin_activate($id = null) {
		//to maintain the page view
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Category', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Category->read(null, $id);
			//print_r($this->data);die;
			$this->data['Category']['status']='active';
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Category activated', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Category was not activated', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function admin_moveup($id = null) {
		$this->changeOrder($id,'up');
	}
	function admin_movedown($id = null) {
		$this->changeOrder($id,'down');
	}
	function changeOrder($id,$act)
	{
		$this->data = null;
		$this->data = $this->Category->read(null, $id);
		
		if (!empty($this->data)) {
				if($act=='up')
				{
					$order =$this->data['Category']['order']-1;
					
				}
				else
				{
					
					$order =$this->data['Category']['order']+ 1;
					//echo $order;die;
				}
					$oldCategory = $this->Category->find('first',array('conditions'=>array('Category.order'=>$order),'recursive'=>-1));
					$this->data['Category']['order'] = $order;
					$this->data['Category']['mdate']= date('Y-m-d h:i:s');	
					//print "<pre>";print_r($this->data);die;
					if ($this->Category->save($this->data)) {	
						//echo "saved";die;
						$this->Session->setFlash(__('The category has been saved', true));
						$this->data = null;
						$this->data = $oldCategory;
						if($act=='up')
						{
							$this->data['Category']['order'] = $order+1;
							//print_r($this->data['Category']['order']);die;
						}
						else
						{
							$this->data['Category']['order'] = $order-1;
						}
						$this->data['Category']['mdate']= date('Y-m-d h:i:s');	
						$this->Category->save($this->data);
					} else {
						$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
					}
				
		}
		$this->redirect(array('action' => 'index'));
	}

	


}
?>