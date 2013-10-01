<?php
class Emailpick extends AppModel {

	var $name = 'Emailpick';	
	var $belongsTo = array(
		'Googledatum' => array(
			'className' => 'Googledatum',
			'foreignKey' => 'analytic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>