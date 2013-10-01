<?php
class Rating extends AppModel {
	var $name = 'Rating';
	var $useTable = 'ratings';
	var $displayField = 'product_id';
	var $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Only Number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'functionality' => array(
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reliability' => array(
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ease_of_use' => array(
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value_for_money' => array(
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rating_you' => array(
			'between' => array(
				'rule' => array('between',0,5),
				'message' => 'Only Value between 0 and 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>