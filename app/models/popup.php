<?php
class Popup extends AppModel {

	var $name = 'Popup';
	var $validate = array(
		'about_us' => array('notempty'),
		'disclaimer' => array('notempty'),
		'terms' => array('notempty'),
		'contact_us' => array('notempty')
	);

}
?>