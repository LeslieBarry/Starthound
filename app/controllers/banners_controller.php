<?php
class BannersController extends AppController {

	var $name = 'Banners';
	var $helpers = array('Html', 'Form','Session');
	
	function admin_index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid banner', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid banner', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Banner->save($this->data)) {
				$this->Session->setFlash(__('The banner has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Banner->read(null, $id);
		}
	}
	
}
?>