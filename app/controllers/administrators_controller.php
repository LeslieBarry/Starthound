<?php 
class AdministratorsController extends AppController
{
    var $name = "Administrators";
	var $uses = array('Administrator'); 
    var $helpers = array('Html','Form','Session');
    
    function admin_index()
    {
		
    }    
    function admin_login()
    {
		
        if(empty($this->data) == false)
        {
            if(($user = $this->Administrator->validateLogin($this->data['Admin'])) == true)
            {
				
                $this->Session->write('User', $user);
                $this->Session->setFlash('You\'ve successfully logged in.');
				//print_r($this->Session);die;
                $this->redirect('index');
                exit();
            }
            else
            {
                $this->Session->setFlash('Username/Password do not match');
                //exit();
            }
        }		
    }
    
    function admin_logout()
    {		
        $this->Session->destroy('User');
        $this->Session->setFlash('You\'ve successfully logged out.');
        $this->redirect('login');
    }
    function admin_forgotPassword()
	{		
		
		
		$this->set('email','');
		if(empty($this->data) == false)
        {
            if(($user = $this->Administrator->findUser($this->data['Admin'])) == true)
            {
				$date = new DateTime();
				$token = md5($date->getTimestamp());
				$this->data['Administrator']['id']=$user['id'];
				$this->data['Administrator']['activation'] = $token;
				if($this->Administrator->save($this->data)) 
				  {
						  $message = 'Click <a href="'.FULL_BASE_URL.$this->base.'/admin/administrators/resetPassword/'.$token.'">here</a> to reset your password';
						//echo $message ;die;
						$this->Email->from = 'Cheapstart <info@cheapstart.com.au>';
						$this->Email->to = $user['name']."<".$user['username'].">";
						$this->Email->subject = 'Test';
						$this->Email->send($message);				
						$this->Session->setFlash('Your reset key has been Emailed');
				  }
				else
				{
					$this->Session->setFlash('Oops! Some error occured. Please try again');
				}
                
                //exit();
            }
            else
            {
                $this->Session->setFlash('No user registered with this Email-Id');
                //exit();
            }
        }
		else
		{
			$this->Session->setFlash('Please enter your Email ID and the password will be mailed to you!');
		}
	}
	function admin_changePassword($id = null)
	{		
		//echo $id;die;
		
		if (!empty($this->data)) {
			$user = $this->Session->read('User');
			$this->data['Administrator']['id']=$user['id'];
			$uid = $this->Administrator->findById($this->data['Administrator']['id']);
			  if(md5($this->data['Administrator']['current'])!= $uid['Administrator']['password'])
			  {
					  $this->Session->setFlash("Your old Password field didn't match");
			  }
			  else if($this->data['Administrator']['new_password'] != $this->data['Administrator']['confirm_password'] ) {
					  $this->Session->setFlash("New password and Confirm password field do not match");
			  }
			  else {
				  $this->data['Administrator']['password'] = md5($this->data['Administrator']['new_password']);
				  $this->data['Administrator']['id'] = $id;
				  if($this->Administrator->save($this->data)) 
				  {
						  $this->Session->setFlash("Password updated");
						  $this->redirect(array('controller'=>'Administrators','action'=>'admin_index'));
				  }
				  else
					{
						
						$this->Session->setFlash('Please try again.', true);
						
					}
			  }
		}
		if (empty($this->data)) {
			$this->data = $this->Administrator->read(null, $id);
			//print_r($this->data);die;
		}
	}
	function admin_resetPassword($activation = null)
	{		
		//echo $activation;die;
		
		if (!empty($this->data)) {			
			  if($this->data['Administrator']['new_password'] != $this->data['Administrator']['confirm_password'] ) {
					  $this->Session->setFlash("New password and Confirm password field do not match");
			  }
			  else {
				  $this->data['Administrator']['password'] = md5($this->data['Administrator']['new_password']);
				  //$this->data['Administrator']['id'] = $id;
				  $this->data['Administrator']['activation'] = '';
				  if($this->Administrator->save($this->data)) 
				  {
						  $this->Session->setFlash("Password updated");
						  $this->redirect(array('controller'=>'Administrators','action'=>'admin_login'));
				  }
				  else
					{
						
						$this->Session->setFlash('Please try again.', true);
						
					}
			  }
		}
		if (empty($this->data)) {
			$this->data = $this->Administrator->findByActivation($activation);
			if($this->data){}
			else
			{
				$this->Session->setFlash('Activation key expired', true);
				$this->redirect(array('controller'=>'Administrators','action'=>'admin_index'));
			}
		}
	}
    
    
}
?>