<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form','Session');
	var $uses=array('Emailpick','Product','Productplan','User','Category','AdminWords','Googledatum'); 
	var $paginate = array('limit' => 15);
	function admin_index() {
		$urls = $this->params['url'];
		$url = $urls['url'];
		$pos = strripos($url,":");
		if($pos)
		{
			$pos++;
			$page=substr($url,$pos);
		}
		else
		{
			$page=1;
		}
		
		$users = $this->User->find('all',array('recursive'=>1));
		
		for($i=0;$i<sizeof($users);$i++)
		{
			$googleData = $this->Googledatum->find('first',array('conditions'=>array('Googledatum.id'=>$users[$i]['Emailpick']['analytic_id']),'recursive'=>-1));
			$users[$i]['Googledatum'] = $googleData['Googledatum'];
			$productData = $this->Product->find('first',array('conditions'=>array('Product.id'=>$users[$i]['Googledatum']['product_id']),'recursive'=>-1));
			$users[$i]['Product'] = $productData['Product'];
			$categoryData = $this->Category->find('first',array('conditions'=>array('Category.id'=>$users[$i]['Product']['category_id']),'recursive'=>-1));
			$users[$i]['Category'] = $categoryData['Category'];
			$planData = $this->Productplan->find('first',array('conditions'=>array('Productplan.id'=>$users[$i]['Googledatum']['plan_id']),'recursive'=>-1));
			$users[$i]['Plan'] = $planData['Productplan'];
		}
		//print"<pre>";print_r($this->User->paginate(null,null,null,15,0,0,null));die;
		
		$this->set('users', $this->paginate());
		$this->set('userDet',$this->User->paginate(null,null,null,15,$page,0,null));
	}
	function admin_view($id=null,$email_id=null) {
		if($id)
		{
			$customers = $this->User->read(null,$id);
		
		
			$customers['Googledatum'] = $this->Googledatum->find('first',array('conditions'=>array('Googledatum.id'=>$email_id),'recursive'=>-1));
			$customers['Product'] = $this->Product->find('first',array('conditions'=>array('Product.id'=>$customers['Googledatum']['Googledatum']['product_id']),'recursive'=>-1));
			$customers['Category'] = $this->Category->find('first',array('conditions'=>array('Category.id'=>$customers['Product']['Product']['category_id']),'recursive'=>-1));
			$customers['Plan'] = $this->Productplan->find('first',array('conditions'=>array('Productplan.id'=>$customers['Googledatum']['Googledatum']['plan_id']),'recursive'=>-1));
			$this->set('customer', $customers);
			//print "<pre>";print_r($customers);die;
		}
		else
		{
			$this->Session->setFlash(__('Invalid customer', true));
			$this->redirect(array('action' => 'index'));
			
		}
		
		
	}
	function add() {
		
		$this->layout = null;
		if (!empty($this->data)) {	
			
			if ($this->data['User']['newsRegister']==1) {
			
					$fname = $this->data['User']['firstname'];
					$lname = $this->data['User']['lastname'];
					$email = $this->data['User']['email'];
					$newsResult = $this->subscribeNewsletter($fname,$lname,$email);
					if($newsResult=="success")
					{
						$newsletter=1;
					}
					else
					{
						$newsletter=0;
					}
			}
			else
			{
				$newsletter=2;
			}
			$this->data['User']['cdate'] = date('Y-m-d h:i:s');
			$this->data['User']['mdate'] = date('Y-m-d h:i:s');
			$shortURLIds = $this->data['User']['shortURLIds'];
			$arrURL=explode(",",$shortURLIds);
				$i=0;
			foreach($arrURL as $urlId)
			{
				if($urlId)
				{
					$shortUrlDetails = $this->Googledatum->find('first', array('conditions' =>array('Googledatum.id'=>$urlId),'recursive'=>-1));
					//print_r($shortUrlDetails['Googledatum']['plan_id']);				
					$this->data['Emailpick'][$i]['analytic_id'] = $shortUrlDetails['Googledatum']['id'];
					
					$this->data['Emailpick'][$i]['cdate'] = date('Y-m-d h:i:s');
					$this->data['Emailpick'][$i]['mdate'] = date('Y-m-d h:i:s');
					$i++;
				}
			}
			//print"<pre>";print_r($this->data);die;
			$this->User->create();
			if ($this->User->saveAll($this->data)) {
				$userId = $this->User->id;
				$mailSent = $this->sendTemplate($shortURLIds,$userId);
				if($mailSent==1&& $newsletter==2)
				{
					$this->redirect(array('action' => 'result/?shortURLIds='.$shortURLIds.'&result=1'));
				}
				else if($mailSent==0&& $newsletter==2)
				{
					$this->redirect(array('action' => 'result/?shortURLIds='.$shortURLIds.'&result=2'));
				}
				else if($mailSent==1 && $newsletter==1)
				{
					$this->redirect(array('action' => 'result/?shortURLIds='.$shortURLIds.'&result=3'));
				}
				else if($mailSent==0 && $newsletter==1)
				{
					$this->redirect(array('action' => 'result/?shortURLIds='.$shortURLIds.'&result=4'));
				}
				//$this->redirect(array('action' => 'index'));
			} 
		}
		else
		{
			$param = $this->params['url'];			
			$shortURLIds = $param['shortURLIds'];
			$this->set('shortURLIds',$shortURLIds);
			$arrURLIds=explode(",",$shortURLIds);
			$productId = "";
			foreach($arrURLIds as $urlId)
			  {
				if($urlId)
				{
					$shortUrlDetails = $this->Googledatum->find('first', array('conditions' =>array('Googledatum.id'=>$urlId)));
					
					if($productId=="")
					{
						$productId = $shortUrlDetails['Product']['seo_name'];
					}
					else
					{
						$productId = $productId .",". $shortUrlDetails['Product']['seo_name'];
					}
				}
				
			}
			$this->set('productId',$productId);
		}
		$textAdmin = $this->AdminWords->find('first');
		$industryList = "Select...,Accounting,Administration,Advertising,Construction,Consulting and Corporate Strategy,Customer Service,Education and Training,Engineering,Financial,Government/Defence,Healthcare and Medical,Hospitality and Tourism,HR and Recruitment,I.T. and T,Insurance and Superannuation,Legal,Manufacturing/Operations,Media,Mining, Oil and Gas,Primary Industry,Real Estate and Property,Retail,Sales and Marketing,Self-Employment,Trades and Services,Transport and Logistics,Volunteer,Other";
		$industryArray = explode(",",$industryList);
		$industries = array_combine($industryArray,$industryArray);
		$this->set('textAdmin',$textAdmin['AdminWords']['content']);		
		$this->set(compact('industries'));
	}
	function result()
	{
			$this->layout = null;
			$param = $this->params['url'];			
			$shortURLIds = $param['shortURLIds'];
			$res = $param['result'];
			$this->set('shortURLIds',$shortURLIds);
			$this->set('res',$res);
	}
	function subscribeNewsletter($fname,$lname,$email)
	{
		 
		$merges = array('FNAME'=>$fname, 'LNAME'=>$lname);
		 
		 
		$double_optin=true;
		$update_existing=true;
		$replace_interests=true;
		$send_welcome=false;
		$email_type = 'html';            
		$data = array('email_address'=>$email,'apikey'=>'83c15c079537c8c37cf484e4f688e655-us2','merge_vars' => $merges,'id' =>'294fccfcc5','double_optin' => $double_optin,'update_existing' => $update_existing,'replace_interests' => $replace_interests,'send_welcome'=>$send_welcome,'email_type' => $email_type);
		$payload = json_encode($data);
		 
		//replace us2 with your actual datacenter
		$submit_url = "http://us2.api.mailchimp.com/1.3/?method=listSubscribe";
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $submit_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
		 
		$result = curl_exec($ch);
		curl_close ($ch);
		$data = json_decode($result);
		if ($data->error){
			return "error";
		} else {
			return "success";
		}
	}
	function sendTemplate($shortURLIds,$userId)
	{
		$arrURLIds=explode(",",$shortURLIds);
		$user = $this->User->read(null, $userId);
		//print_r($user);die;		   
				 
		 $headers = "MIME-Version: 1.0" . "\r\n";
		 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		 $headers .= 'From:cheapstart <info@cheapstart.com.au>' . "\r\n" . 'Reply-To: info@cheapstart.com.au' . "\r\n" ;
		 $to = $user['User']['email'];
		 $subject = 'Software list from cheapstart'; 		
			  $i = 0;
			  $emailSelect= array();	
			  $setupCost = 0;
			  $monthlyCost = 0;
			  $yearlyCost = 0;
			  foreach($arrURLIds as $urlId)
			  {
				if($urlId)
				{
					$shortUrlDetails = $this->Googledatum->find('first', array('conditions' =>array('Googledatum.id'=>$urlId),'recursive'=>-1));
					$emailSelect[$i] = $this->Productplan->read(null, $shortUrlDetails['Googledatum']['plan_id']);
					$setupCost = $setupCost + $emailSelect[$i]['Productplan']['setupcost'];
					$monthlyCost = $monthlyCost + $emailSelect[$i]['Productplan']['monthlycost'];
					$yearlyCost = $yearlyCost + $emailSelect[$i]['Productplan']['yearlycost'];
					$emailSelect[$i]['Product']['shortURL_id'] = $shortUrlDetails['Googledatum']['id'];
					$categoryInfo = $this->Category->find('first', array('conditions' =>array('Category.id'=>$emailSelect[$i]['Product']['category_id']),'recursive'=>-1));
					$emailSelect[$i]['Category'] = $categoryInfo['Category'];				
					$i++;
				}
			  }
			   $username = ucwords($user['User']['firstname']);
			   $message = $this->createEmail($username,$emailSelect,$setupCost,$monthlyCost,$yearlyCost,$shortURLIds);
			   
			  $result = mail($to,$subject,$message,$headers);
			  return $result;
			  
			//print "<pre>";print_r($this->Session->read('Message.email'));die;
	}
	function createEmail($username,$emailSelects,$setupCost,$monthlyCost,$yearlyCost,$shortURLIds)
	{
		$message = "<html><body>";
		$message.='<table><table cellpadding="0" cellspacing="0" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:inherit;margin:0 auto;padding:20px 0 10px 10px;list-style:none;outline-style:none;width:840px;"><tr><td style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;float:left;margin-top:10px;"><a href="'.FULL_BASE_URL.$this->base.'" style="border: 0 none;font-family: inherit;font-style: inherit;font-weight: inherit;margin: 0;padding: 0;	list-style:none; outline-style:none;">';
		$message.='<img src="'.FULL_BASE_URL.$this->base.'/img/icon_logo.png" alt="Logo" width="243" height="44" style="border:none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;">';
		$message.='</a></td><td style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:520px;float:right;text-align:right;"><p  style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:0;list-style:none;outline-style:none;margin-top:5px;font-size:14px;">';
		$message.='<a target="_blank" href="http://twitter.com/cheapstart"><img height="32" border="0" width="32" alt="twitter" src="'. FULL_BASE_URL.$this->base.'/img/icon_twiter.png" border="0"></a>';
$message.='<a target="_blank" href="http://www.linkedin.com/company/cheapstart"><img height="32" border="0" width="32" alt="linkedin" src="'. FULL_BASE_URL.$this->base.'/img/icon_in.png" border="0"></a>';
$message.='<a target="_blank" href="http://www.facebook.com/cheapstart"><img height="32" border="0" width="32" alt="facebook" src="'. FULL_BASE_URL.$this->base.'/img/icon_fb.png" border="0"></a>';

		$message.='<br/>Please add <a href="mailto:info@cheapstart.com.au"  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;color:#1393da;">info@cheapstart.com.au</a>&nbsp;to your address book.&nbsp;';
		$message.='&nbsp;<a href="'.FULL_BASE_URL.$this->base.'/product/email_template/?shortURLIds='.$shortURLIds.'" target="_blank" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;color:#1393da;">view online version</a></p></td></tr><div  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;clear:both;"></div></table>';
		$message.='<table cellpadding="0" cellspacing="0"  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:10px 0px 0px 5px;padding:0;list-style:none;outline-style:none;width:850px;height:172px;"><tr>';
		$message.='<td bgcolor="#1392DA" style="width:9px;height:172px;border:none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;float:left;"></td>';
		$message.='<td  bgcolor="#1392DA" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;height:172px;float:left;width:626px"><span  style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:3px 0 0 0;list-style:none;outline-style:none;float:left;margin-top:2px;font-size:20px;color:#FFFFFF;padding-top:45px;width:600px;"><p style="font-size:24px;">'.$username.',</p>Here is the software list you created on cheapstart</span></td>';
		$message.='<td bgcolor="#1392DA" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:10px 0 0 0;list-style:none;outline-style:none;height:162px;float:left;">';
		$message.='<table cellpadding="0" cellspacing="0">';
		$message.='<tr style="height:36px;width:198px;"><td bgcolor="#83C42A" style="border:0 none;font-family:nevisBold;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;text-align:left;padding-left:10px;"><h6 style="border:0 none;font-family:calibri;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;font-size:18px;color:#FFFFFF;padding-top:5px;">Estimated Cost</h6></td></tr>';
		$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:198px;"><td bgcolor="#ffffff" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:inherit;margin:0;padding:5px 0 5px 15px;list-style:none;outline-style:none;font-size:14px;color:#424242;text-align:left;line-height:23px;"><span  style="color:#424242;width:90px;float:left;">Setup cost</span><span  style="font-size:20px;color:#1393da;float:right;margin-right:4px;">$ '.sprintf("%01.2f",$setupCost).'</span></td></tr>';
		$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:198px;"><td bgcolor="#ffffff" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;border-bottom:1px solid #eeeeee;width:180px;margin-left:10px;"></td></tr>';
		$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:198px;"><td bgcolor="#ffffff"style="border:0 none;font-family:calibri;font-style:inherit;font-weight:inherit;margin:0;padding:5px 0 5px 15px;list-style:none;outline-style:none;font-size:14px;color:#424242;text-align:left;line-height:23px;"><span  style="color:#424242;width:90px;float:left;">Monthly cost</span><span  style="font-size:20px;color:#1393da;float:right;margin-right:4px;">$ '.sprintf("%01.2f",$monthlyCost).'</span></td></tr>';
		$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:198px;"><td bgcolor="#ffffff" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;border-bottom:1px solid #eeeeee;width:180px;margin-left:10px;"></td></tr>';
		$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;width:198px;"><td bgcolor="#ffffff" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:inherit;margin:0;padding:5px 0 5px 15px;list-style:none;outline-style:none;font-size:14px;color:#424242;text-align:left;line-height:23px;"><span  style="color:#424242;width:90px;float:left;">Yearly cost</span><span  style="font-size:20px;color:#1393da;float:right;margin-right:4px;">$ '.sprintf("%01.2f",$yearlyCost).'</span></td></tr>';		
		$message.='</table></td>';
		$message.='<td bgcolor="#1392DA" style="width:9px;height:172px;border:none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;float:left;"></td></tr></table>';
		$message.='<table  cellpadding="0" cellspacing="0" style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0 auto;padding:0;list-style:none;outline-style:none;width:845px;margin-top:10px;margin-bottom:20px;">';
		$message.='<tr><td bgcolor="#F5F5F5" width="845" height="10"  style="border: medium none; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0pt; padding: 0pt; list-style: none outside none; outline-style: none;"></td></tr><tr>';
		$message.='<td bgcolor="#F5F5F5">';
		$message.='<table cellpadding="0" cellspacing="0" border="0" style="margin:0 0 0 10px;border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;padding:0;list-style:none;outline-style:none;border-bottom:1px solid #ebebeb;border-left:1px solid #ebebeb;border-right:1px solid #ebebeb;width:825px;" ><thead style="border: 0 none;font-family: inherit;font-style: inherit;font-weight: inherit;margin: 0;padding: 0;list-style:none; outline-style:none;"><tr style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;">';
		$message.='<th width="221" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:#fff;text-align:center;font-size:14px;">Category</th>';
		$message.='<th width="148" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:#fff;text-align:center;font-size:14px;">Product</th>';
		$message.='<th width="148" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:#fff;text-align:center;font-size:14px;">Edition</th>';
		$message.='<th width="148" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:#fff;text-align:center;font-size:14px;">Price*</th>';
		$message.='<th width="148" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:#fff;text-align:center;font-size:14px;">Term</th>';
		$message.='<th width="136" bgcolor="#1392DA" style="border:0 none;font-family:calibri;font-style:inherit;font-weight:bold;margin:0;padding:7px 0;list-style:none;outline-style:none;border-right:none;color:#fff;text-align:center;font-size:14px;">Buy</th></tr></thead>';
		$i=0;
	foreach($emailSelects as $emailselect)
	{ 
		if($i%2==0)
		{
			$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;background:#FFFFFF;">';
			$message.='<td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none; outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;padding-left:15px;">';
			$message.=$emailselect['Category']['title'];
			$message.='</td><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;">';
			$message.=$emailselect['Product']['title'];
			$message.='</td><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;">';
			$message.=$emailselect['Productplan']['title'];
			$message.='</td><td  style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;font-size:14px;font-weight:bold;color:#1393DA;border-right:1px solid #fff;text-align:right;margin-right:8px;">';
			
			if($emailselect['Productplan']['setupcost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['setupcost']);
			}
			else if($emailselect['Productplan']['monthlycost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['monthlycost']);
			}
			else if($emailselect['Productplan']['yearlycost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['yearlycost']);
			}
			else
			{
				$message.='Free';
			}
			$message.='&nbsp;</td><td  style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;font-size:14px;color:black;border-right:1px solid #fff;text-align:center;">';
			$message.= $emailselect['Productplan']['terms'];
			$message.='</td><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;"><a href="'.FULL_BASE_URL.$this->base.'/googledata/getClick/?urlID='.$emailselect['Product']['shortURL_id'].'" style="color:#ffffff;text-decoration:none;"><img src="'. FULL_BASE_URL.$this->base.'/img/buynow.png" width="101" border="0" align="middle"></a></td></tr>';
		}
		else
		{ 
			$message.='<tr  style="border:0 none;font-family:inherit;font-style:inherit;font-weight:inherit;margin:0;padding:0;list-style:none;outline-style:none;background:#e8eff2;"><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none; outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;padding-left:15px;">';
			$message.=$emailselect['Category']['title'];
			$message.='</td><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;">';
			$message.=$emailselect['Product']['title'];
			$message.='</td><td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;">';
			$message.=$emailselect['Productplan']['title'];
			$message.='</td><td  style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;font-size:14px;font-weight:bold;color:#1393DA;border-right:1px solid #fff;text-align:right;margin-right:4px">';
			if($emailselect['Productplan']['setupcost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['setupcost']);
			}
			else if($emailselect['Productplan']['monthlycost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['monthlycost']);
			}
			else if($emailselect['Productplan']['yearlycost']>0)
			{
				$message.='$'.sprintf("%01.2f",$emailselect['Productplan']['yearlycost']);
			}
			else
			{
				$message.='Free';
			}
			$message.='&nbsp;</td><td  style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;font-size:14px;color:black;border-right:1px solid #fff;text-align:center;">';
			$message.=$emailselect['Productplan']['terms'];
			$message.='</td>';
				$message.='<td style="border:0 none;font-family:calibri;font-style:inherit;margin:0;padding:5px 0;list-style:none;outline-style:none;border-right:1px solid #fff;color:black;text-align:center;font-size:14px;"><a href="'. $emailselect['Product']['link'].'" style="color:#ffffff;text-decoration:none;"><img src="'. FULL_BASE_URL.$this->base.'/img/buynow.png" width="101" border="0" align="middle"></a></td></tr>';
		}
			$i++;
	} 
$message.='</table></td></tr><tr><td bgcolor="#F5F5F5" width="845" height="10"  style="border: medium none; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0pt; padding: 0pt; list-style: none outside none; outline-style: none;"></td></tr></table>';
$message.='<p style="color: #1393DA;font-size: 10px;">* Prices are indicative only.  They can be AUD or USD.  Please confirm actual price before signing up.</p>';
$message.="Please respond to this email if you have any questions or need help.  If you've found cheapstart useful, please remember to spread the word and tell your friends to enable us to keep running this free service.<br/><br/>";
$message.='<a href="http://eepurl.com/gcatn" style="font-family: trebuchet MS;text-decoration:none;">Click to subscribe</a> to news and updates';
$message.="<br/><br/>Thanks,<br/>cheapstart<br/>www.cheapstart.com.au<br/><br/>";

$message.='<p style="font-size:10px">Copyright &copy; 2011 cheapstart All rights reserved.</p>';
$message.='</body></html>';
		return $message;
	}
	function contact()
	{
		$this->layout = null;
	}
}
?>