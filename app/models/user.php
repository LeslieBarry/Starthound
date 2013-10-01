<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'firstname' => array('notempty'),
		'lastname' => array('notempty'),
		'email' => array('email'),
		'organization' => array('notempty'),
		'industry' => array('notempty'),
		'postcode' => array('notempty')
	);
	var $hasOne = array(
		'Emailpick' => array(
			'className' => 'Emailpick',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Emailpick' => array(
			'className' => 'Emailpick',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	function paginateCount($conditions = null, $recursive = 0, $extra = array())
	{
		$sql = "SELECT count(`User`.`id`, `User`.`firstname`, `User`.`lastname`,`Category`.`title`,`Product`.`title`,`Product`.`link`,`Productplan`.`title`,`Productplan`.`monthlycost`, `Emailpick`.`cdate`, `Googledatum`.`mdate` FROM `users` AS `User` LEFT JOIN `emailpicks` AS `Emailpick` ON (`Emailpick`.`user_id` = `User`.`id`) LEFT JOIN `analytics` AS `Googledatum` ON (`Emailpick`.`analytic_id` = `Googledatum`.`id`) LEFT JOIN `product` AS `Product` ON (`Product`.`id` = `Googledatum`.`product_id`) LEFT JOIN `productplan` AS `Productplan` ON (`Productplan`.`id` = `Googledatum`.`plan_id`) LEFT JOIN `category` AS `Category` ON (`Category`.`id` = `Product`.`category_id`))";
		$this->recursive = $recursive;
		$results = $this->query($sql);
		return $results;
	}
	function paginate($conditions, $fields, $order, $limit, $page, $recursive, $extra)
	{
		$sql = "SELECT `User`.`id`, `User`.`firstname`, `User`.`lastname`,`Category`.`title`,`Product`.`title`,`Product`.`link`,`Productplan`.`title`,`Productplan`.`monthlycost`,`Emailpick`.`analytic_id`, `Emailpick`.`cdate`,`Googledatum`.`short_url`, `Googledatum`.`mdate` FROM `users` AS `User` LEFT JOIN `emailpicks` AS `Emailpick` ON (`Emailpick`.`user_id` = `User`.`id`) LEFT JOIN `analytics` AS `Googledatum` ON (`Emailpick`.`analytic_id` = `Googledatum`.`id`) LEFT JOIN `product` AS `Product` ON (`Product`.`id` = `Googledatum`.`product_id`) LEFT JOIN `productplan` AS `Productplan` ON (`Productplan`.`id` = `Googledatum`.`plan_id`) LEFT JOIN `category` AS `Category` ON (`Category`.`id` = `Product`.`category_id`) Limit ".$limit*($page-1).",".$limit;
		
		return $this->query($sql);
	}

}
?>