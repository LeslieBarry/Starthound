<?php
class RatingsController extends AppController {

	var $name = 'Ratings';
	var $uses = array('Product','Rating');
	var $helpers = array('Html', 'Form','Session');
	 var $paginate = array('limit' => 15,'order' => array('Product.title' => 'asc'));
	function view() {
		$this->layout=null;
		$param = $this->params['url'];			
		$prod_name = $param['prod_name'];
		$productInfo = $this->Product->find('first', array('conditions'=>array('Product.seo_name'=>$prod_name)));
		$this->set('productInfo',$productInfo);
	}

	function add() {
		$this->layout=null;
		
		if (!empty($this->data)) {
		print_r($this->data);
				if($this->data['Rating']['rating_you']!=0)
				{
					$this->data['Rating']['rating_you'] = $this->data['Rating']['rating_you']+$this->data['Rating']['rating_old'];
					$this->data['Rating']['no_ofUsers'] = $this->data['Rating']['no_ofUsers']+1;
					$this->data['Rating']['user_rating'] = $this->data['Rating']['rating_you']/$this->data['Rating']['no_ofUsers'];
					if ($this->Rating->save($this->data)) {echo "done";die;} else {}
				}
		}
		else
		{
			$param = $this->params['url'];			
			$prod_name = $param['prod_name'];
			$productInfo = $this->Product->find('first', array('conditions'=>array('Product.seo_name'=>$prod_name)));
			$longURL = FULL_BASE_URL.$this->base."/home?prod_name=".$prod_name;
			$shortUrl = parent::socialURL($longURL);
			$this->set('shortUrl',$shortUrl);
			$this->set('longURL',$longURL);			
			$this->set('productInfo',$productInfo);
			//print "<pre>";
			//print_r($productInfo);die;
		}
	}

	function admin_index() {
		 
		$this->set('ratings', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rating', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rating', $this->Rating->read(null, $id));
	}


	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rating', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Rating']['mdate']= date('Y-m-d h:i:s');
			if ($this->Rating->save($this->data)) {
				$this->Session->setFlash(__('The rating has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rating could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rating->read(null, $id);
			$text = array('No Rating','Ok','Average','Good','Excellent');
			$values = array(0,1,2,3,4);
			$ratings = array_combine($values,$text);
			$this->set('ratings',$ratings);			
			//print "<pre>";print_r($this->data);die;
		}
		$products = $this->Rating->Product->find('list');
		$this->set(compact('products'));
	}

}
?>