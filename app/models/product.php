<?php
class Product extends AppModel
{
	var $name="product";
	var $useTable="product";
	var $displayField = 'title';
	var $validate = array(
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a category',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'seo_name' => array(
			'rule' => array('isUnique'),
			'message' => 'SEO name already in use.',
		),
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please upload image',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'link' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your company link',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Category.title'
		)
	);

	var $hasMany = array(
		'Productplan' => array(
			'className' => 'Productplan',
			'foreignKey' => 'product_id',
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
	var $hasOne = array(
		'Rating' => array(
			'className' => 'Rating',
			'foreignKey' => 'product_id',
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
	
	function getProductsByLocation($catId,$location){

		$sql = "SELECT product.id,product.title,product.image, ratings.* FROM product left join ratings on ratings.product_id = product.id WHERE product.status='active' && product.category_id=".$catId." && product.location='".$location."' order by (ratings.rating_you/ratings.no_ofUsers)desc ,(ratings.functionality+ratings.reliability+ratings.ease_of_use+ratings.value_for_money)/4 desc limit 3";

        //echo($sql);die;

		$result = $this->query($sql);

		return $result;

	}
	function getProducts($catId){
		$sql = "SELECT product.id,product.title,product.image FROM product WHERE product.status='active' && product.category_id=".$catId." LIMIT 3 ";
       // echo($sql);
		$result = $this->query($sql);
		return $result;
	}
}
?>
