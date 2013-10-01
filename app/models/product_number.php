<?php
class ProductNumber extends AppModel {

	var $name = 'ProductNumber';
	var $validate = array(
		'prodToRotate' => array('numeric')
	);

}
?>