<?php 
class Administrator extends AppModel
{
    var $name = 'Administrator';
    var $useTable="admin";
	var $displayField="id";
    function validateLogin($data)
    {
        $user = $this->find(array('username' => $data['username'], 'password' => md5($data['password'])), array('id', 'username','name'));
        if(empty($user) == false)
		{			
            return $user['Administrator'];
		}
        return false;
    }
    function findUser($data)
    {
        $user = $this->find(array('username' => $data['username']), array('id', 'username','name'));
        if(empty($user) == false)
		{			
            return $user['Administrator'];
		}
        return false;
    }
}
?>