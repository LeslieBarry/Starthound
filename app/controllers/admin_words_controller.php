<?php
class AdminWordsController extends AppController {

	var $name = 'AdminWords';
	var $helpers = array('Html', 'Form','Session');

	function admin_index() {
		$this->AdminWord->recursive = 0;
		$this->set('adminWords', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid AdminWord', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('adminWord', $this->AdminWord->read(null, $id));
	}	

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid selection', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
				$this->data['AdminWord']['mdate']= date('Y-m-d h:i:s');
			if ($this->AdminWord->save($this->data)) {
				$this->Session->setFlash(__('The text has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdminWord->read(null, $id);
		}
	}	
}
?>