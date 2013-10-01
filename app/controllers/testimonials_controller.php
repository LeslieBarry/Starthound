<?php
class TestimonialsController extends AppController {

	var $name = 'Testimonials';
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
		$this->set('pageParam',$param);
		$this->Testimonial->recursive = 0;
		$this->set('testimonials', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Testimonial', true));
			$this->redirect(array('action' => 'index'));
		}
		$testimonial = $this->Testimonial->read(null, $id);
		$testimonial['Testimonial']['cdate'] = parent::getMonthDateYear($testimonial['Testimonial']['cdate']);
		$testimonial['Testimonial']['mdate'] = parent::getMonthDateYear($testimonial['Testimonial']['mdate']);
		$this->set('testimonial', $testimonial);
		
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Testimonial->create();
			$this->data['Testimonial']['cdate']= date('Y-m-d h:i:s');
			$this->data['Testimonial']['mdate']= date('Y-m-d h:i:s');
			$this->data['Testimonial']['status']= 'active';
			if ($this->Testimonial->save($this->data)) {
				$this->Session->setFlash(__('The Testimonial has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Testimonial could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Testimonial', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Testimonial']['mdate']= date('Y-m-d h:i:s');
			if ($this->Testimonial->save($this->data)) {
				$this->Session->setFlash(__('The Testimonial has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Testimonial could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Testimonial->read(null, $id);
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
			$this->Session->setFlash(__('Invalid id for Testimonial', true));
			$this->redirect(array('action'=>'/'.$param));
			}
		else
		{
			$this->data = $this->Testimonial->read(null, $id);
			//print_r($this->data);die;
			$this->data['Testimonial']['status']='removed';
			if ($this->Testimonial->save($this->data)) {
				$this->Session->setFlash(__('Testimonial removed', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Testimonial was not removed', true));
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
			$this->Session->setFlash(__('Invalid id for Testimonial', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Testimonial->read(null, $id);
			//print_r($this->data);die;
			$this->data['Testimonial']['status']='active';
			if ($this->Testimonial->save($this->data)) {
				$this->Session->setFlash(__('Testimonial activated', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Testimonial was not activated', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
	function admin_advertise($id = null,$res=null) {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,"/");
		$pos++;
		$param=substr($url,$pos);
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Testimonial', true));
			$this->redirect(array('action'=>'index/'.$param));
		}
		else
		{
			$this->data = $this->Testimonial->read(null, $id);
			//print_r($this->data);die;
			if($res==1)
			{
				$this->data['Testimonial']['advertise']='yes';
			}
			else if($res==0)
			{
				$this->data['Testimonial']['advertise']='no';
			}
			
			if ($this->Testimonial->save($this->data)) {
				$this->Session->setFlash(__('Adverisement status changed', true));
				$this->redirect(array('action'=>'index/'.$param));
			}
		}
		$this->Session->setFlash(__('Adverisement status could not changed', true));
		$this->redirect(array('action' => 'index/'.$param));
	}
}
?>