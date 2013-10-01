<?php
class PopupsController extends AppController {

	var $name = 'Popups';
	var $helpers = array('Html', 'Form','Session');



	function admin_index() {
		$this->Popup->recursive = 0;
		$this->set('Popups', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FooterPopup', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Popup', $this->Popup->read(null, $id));
	}


	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Popup', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Popup->save($this->data)) {
				$this->Session->setFlash(__('The Popup content has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Popup could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Popup->read(null, $id);
		}
	}
	function about_us()
	{
		$this->layout = null;
		$data = $this->Popup->find("first");
		$this->set("aboutUs",$data['Popup']['about_us']);
		//print "<pre>";print_r($data['FooterPopup']['about_us']);die;
	}
	function contact_us()
	{
		$this->layout = null;
		$data = $this->Popup->find("first");
		$this->set("contactUs",$data['Popup']['contact_us']);
		//print "<pre>";print_r($data['FooterPopup']['about_us']);die;
	}
	function privacy_policy()
	{
		$this->layout = null;
		$data = $this->Popup->find("first");
		$this->set("privacyPolicy",$data['Popup']['terms']);
		//print "<pre>";print_r($data['FooterPopup']['terms']);die;
	}
	function disclaimer()
	{
		$this->layout = null;
		$data = $this->Popup->find("first");
		$this->set("disclaimer",$data['Popup']['disclaimer']);
		//print "<pre>";print_r($data['FooterPopup']['about_us']);die;
	}

}
?>