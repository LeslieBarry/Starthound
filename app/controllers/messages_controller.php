<?php
class MessagesController extends AppController {

	var $name = 'Messages';
	var $helpers = array('Html', 'Form','Session');
	var $paginate = array('limit' => 15);

	function add() {
		$this->layout = null;
		if (!empty($this->data)) {
			$this->Message->create();
			$this->data['Message']['cdate'] = date('Y-m-d h:i:s');
			if ($this->Message->save($this->data)) {
				 $headers = "MIME-Version: 1.0" . "\r\n";
				 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				 $headers .= 'From:cheapstart <info@cheapstart.com.au>' . "\r\n" . 'Reply-To: info@cheapstart.com.au' . "\r\n" ;
				 $to = $this->data['Message']['email'];
				 $subject = 'Thanks for contacting cheapstart'; 
				 $message = "Hi,<br/><br/> Thanks for your email.<br/><br/>We have received your message and will attend to it as soon as possible.<br/><br/>Cheers,<br/>The cheapstart Team<br/>http://www.cheapstart.com.au";
				 $result = mail($to,$subject,$message,$headers);
				 if($result==1)
				 {
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					$headers .= 'From:cheapstart <info@cheapstart.com.au>' . "\r\n" . "\r\n" ;
					 $to = 'support@cheapstart.com.au';
					 $subject = 'New message'; 
					 $message = "Hi,<br/><br/>A user has posted the following message:<br/><br/>".$this->data['Message']['message']."Cheers,<br/>cheapstart Admin<br/>http://www.cheapstart.com.au";
				 $result = mail($to,$subject,$message,$headers);
					$this->redirect(array('action' => 'result/?result=1'));
				 }
				 else
				 {
					$this->redirect(array('action' => 'result/?result=2'));
				 }
			} else {
				$this->redirect(array('action' => 'result/?result=2'));
			}
		}
	}
	function result()
	{
			$this->layout = null;
			$param = $this->params['url'];			
			
			$res = $param['result'];
			
			$this->set('res',$res);
	}
	
	function admin_index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}	

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for message', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Message->delete($id)) {
			$this->Session->setFlash(__('Message deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Message was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>