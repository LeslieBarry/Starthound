<?php
class Productplan extends AppModel
{
	var $name="productplan";
	var $useTable="productplan";
	var $displayField = 'id';
	var $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'short_desc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'plan_limit' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'primary_condition' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
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
  
	function getProductPlanDetails($prodId,$plan){

        $sql = "SELECT productplan.* FROM productplan WHERE productplan.status='active' && productplan.product_id=".$prodId." && productplan.plan='".$plan."'";

       // echo($sql);die;

        $result = $this->query($sql);

        return $result;

    }



    function getProductPlanMonthlyCost($prodId,$plan){

        $sql = "SELECT productplan.* FROM productplan WHERE productplan.status='active' && productplan.product_id=".$prodId." && productplan.plan='".$plan."' limit 1";

       // echo($sql);die;

        $result = $this->query($sql);

        return $result;

    }

}
?>
