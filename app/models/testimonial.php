<?php
class Testimonial extends AppModel {

	var $name = 'Testimonial';
	var $validate = array(
		'name' => array('notempty'),
		'testimonial' => array('notempty')
	);

}
?>