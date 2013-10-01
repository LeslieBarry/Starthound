<?php
class Banner extends AppModel{
    
	var $name="banner";
	var $useTable="banner";
	var $validate = array(
		'txt1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be left blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'txt2' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be left blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'txt3' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be left blank',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
    
}
?>
