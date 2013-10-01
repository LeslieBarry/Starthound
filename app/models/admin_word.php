<?php
class AdminWord extends AppModel {

	var $name = 'AdminWord';
	 var $validate = array('login' => array('content' => array('maxLength', 400),'message' => 'Content cannot exceed 400 characters'));

}
?>