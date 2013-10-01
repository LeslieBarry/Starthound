<?php
class ProductNumbersController extends AppController {

	var $name = 'ProductNumbers';
	var $helpers = array('Html', 'Form', 'Session');

	function admin_index() {
		$this->ProductNumber->recursive = 0;
		$this->set('productNumbers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ProductNumber', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productNumber', $this->ProductNumber->read(null, $id));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ProductNumber', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['AdminWord']['mdate']= date('Y-m-d h:i:s');
			if ($this->ProductNumber->save($this->data)) {
				$this->Session->setFlash(__('The ProductNumber has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ProductNumber could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductNumber->read(null, $id);
		}
	}

}
?>