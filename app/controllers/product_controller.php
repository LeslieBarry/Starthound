<?php  
class ProductController extends AppController{ 
	var $name="Product";
	var $uses = array('Product','Category','Productplan','Googledatum','Rating'); 

    function location(){
       // return 'ANZ';
        $ip = $_SERVER['REMOTE_ADDR'];    
        $siteURL = "http://api.hostip.info/country.php"; 
        $curl_handle=curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,$siteURL);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
        $result = trim(curl_exec($curl_handle));
		$location = $result;
        curl_close($curl_handle);
        //preg_match ("/Country:(.*)/i", $result, $temp) or die("Could not find element Country");
        //$location = $temp[1];
		//echo $location;die;
		//$posAus = strpos(strtolower($location),strtolower('Aus'));
		//$posZeal = strpos(strtolower($location),strtolower('Zeal'));
		if(strtolower($location)==strtolower('Aus')|| strtolower($location)==strtolower('NZ'))
		{
			
				return 'ANZ';			
        }
        else{
            return 'Others';
        } 
         
    }    

	function index(){                                                                                                                           
        $this->layout = 'default';
        $categoryDataList=null;
        $category=null;
        $location=null;
        $arrcategory=array();
        $productDataList=array();
        $i=0;
		$fromEmail=null;
        $categoryDataList = $this->Category->getCategories();
        if($_POST && $_POST['txtHomeCategory']){
              $category=$_POST['txtHomeCategory'];  
              $arrcategory=explode(",",$category);
        }
		else if($_GET && $_GET['txtHomeProduct']){
              $category = $product=$_GET['txtHomeProduct'];  // if the user closes the email pop up he is to be redirected to productpage so to maintain the state this is done. Session is not used as when the user moves away from product page to email page only plan ids are required and they are picked up through javascript
              $arrproduct=explode(",",$product);
			  $details = array();
			  $index = 0;
			  foreach($arrproduct as $prodId)
			  {
				$categoryInfo = $this->Product->find('first', array('conditions' =>array('Product.seo_name'=>$prodId),'recursive'=>-1));
				$product_id = $categoryInfo['Product']['id'];
				$details[$index]['prodId'] = $product_id;
				$details[$index]['catId'] = $categoryInfo['Product']['category_id'];
				$arrcategory[$index] = $categoryInfo['Product']['category_id'];
				$index++;
			   }
			   //print "<pre>";print_r($details);die;
			  $fromEmail = true;
        }
		
        $location= $this->location();
          
		
        for($i=0;$i<count($categoryDataList);$i++){
           foreach($arrcategory as $cat){				
			//echo $categoryDataList[$i]['category']['id']."==".$cat;die;
              if($categoryDataList[$i]['category']['id']==$cat){
                  $categoryDataList[$i]['category']['selected']=true;
				  $categoryDataList[$i]['category']['product'] = $this->Product->find('all', array('conditions' =>array('Product.category_id'=>$categoryDataList[$i]['category']['id'],'Product.status'=>'active','OR'=>array('Product.location'=>$location,'Product.location'=>'All')),'order'=>array('(user_rating+(Rating.functionality+Rating.reliability+Rating.ease_of_use+Rating.value_for_money)/4)/2 DESC'),'recursive'=>2,'limit'=>3));
                  //print"<pre>";print_r($categoryDataList[$i]['category']['product']);die;
				  //=$this->Product->getProductsByLocation($categoryDataList[$i]['category']['id'],$location);
                  if($categoryDataList[$i]['category']['product']){
                      
                      for($j=0;$j<count($categoryDataList[$i]['category']['product']);$j++){
							$ratingInfo = $this->Rating->find('first',array('conditions'=> array('Rating.product_id' =>$categoryDataList[$i]['category']['product'][$j]['Product']['id']),'fields'=>array('Rating.rating_you','Rating.functionality','Rating.reliability','Rating.ease_of_use','Rating.value_for_money','Rating.no_ofUsers'),'limit'=>1));
							
							$categoryDataList[$i]['category']['product'][$j]['Product']['rating_us'] = ($ratingInfo['Rating']['functionality']+$ratingInfo['Rating']['reliability']+$ratingInfo['Rating']['ease_of_use']+$ratingInfo['Rating']['value_for_money'])/4;
							if($ratingInfo['Rating']['no_ofUsers']==0)
							{
								$categoryDataList[$i]['category']['product'][$j]['Product']['rating_you']=0;
							}else
							{
								$categoryDataList[$i]['category']['product'][$j]['Product']['rating_you'] = $ratingInfo['Rating']['rating_you']/$ratingInfo['Rating']['no_ofUsers'];
							}
							$planDetails=$this->Productplan->find('first', array('conditions' =>array('Productplan.product_id'=>$categoryDataList[$i]['category']['product'][$j]['Product']['id'],'Productplan.status'=>'active'),'recursive'=>0,'order'=>'Productplan.plan'));
							
							//getProductPlanMonthlyCost($categoryDataList[$i]['category']['product'][$j]['Product']['id'],'Plan1');
							//print "<pre>";print_r($planDetails);die;
							$categoryDataList[$i]['category']['product'][$j]['Product']['setupcost'] = $planDetails['Productplan']['setupcost'];
                           $categoryDataList[$i]['category']['product'][$j]['Product']['monthlycost'] = $planDetails['Productplan']['monthlycost'];
						   $categoryDataList[$i]['category']['product'][$j]['Product']['yearlycost'] = $planDetails['Productplan']['yearlycost'];
						   $categoryDataList[$i]['category']['product'][$j]['Product']['terms'] = $planDetails['Productplan']['terms'];
						   
                           
                      }  
                      
                  }
				break;
              }
			  else
			  {
				$categoryDataList[$i]['category']['selected']=false;
			  }
           } 
            
        }    
        //print "<pre>";print_r($categoryDataList);print "</pre>";die;
        $this->set('categoryDataList', $categoryDataList);
        $this->set('category', $category);
        $this->set('location', $location);
        $this->set('menuItem', 'products');
		$this->set('fromEmail',$fromEmail);
		$this->set('details',$details);
	}	 
    
    
    
    function content(){
        $this->layout = null;
        if($_POST && $_POST['txtProductCategory'] && $_POST['txtLocation']){
            $data=array();
            $category=$_POST['txtProductCategory'];
            $location=$_POST['txtLocation'];
            $data['category']=$this->Category->getCategoryDetails($category);
            $data['product']=$this->Product->find('all', array('conditions' =>array('Product.category_id'=>$category,'Product.status'=>'active','OR'=>array('Product.location'=>$location,'Product.location'=>'All')),'order'=>array('(user_rating+(Rating.functionality+Rating.reliability+Rating.ease_of_use+Rating.value_for_money)/4)/2 DESC'),'recursive'=>2,'limit'=>3));
			//print "<pre>";print_r($data['product']);die;
		
            if($data['product']){
			//print"<pre>";print_r($data['product']);die;
              $j=0;  
              foreach($data['product'] as $p){
					//print_r($p);die;
					$ratingInfo = $this->Rating->find('first',array('conditions'=> array('Rating.product_id'=>$p['Product']['id']),'fields'=>array('Rating.rating_you','Rating.functionality','Rating.reliability','Rating.ease_of_use','Rating.value_for_money','Rating.no_ofUsers'),'limit'=>1));
					
				   
				   
				   $data['product'][$j]['Product']['rating_us']= ($ratingInfo['Rating']['functionality']+$ratingInfo['Rating']['reliability']+$ratingInfo['Rating']['ease_of_use']+$ratingInfo['Rating']['value_for_money'])/4;
				   if($ratingInfo['Rating']['no_ofUsers']==0)
					{
						$data['product'][$j]['Product']['rating_you']=0;
					}else
					{
						$data['product'][$j]['Product']['rating_you']= $ratingInfo['Rating']['rating_you']/$ratingInfo['Rating']['no_ofUsers'];
					}
				   $planDetails=$this->Productplan->find('first', array('conditions' =>array('Productplan.product_id'=>$p['Product']['id'],'Productplan.status'=>'active'),'recursive'=>0,'order'=>'Productplan.plan'));
						
							$data['product'][$j]['Product']['setupcost'] = $planDetails['Productplan']['setupcost'];
                           $data['product'][$j]['Product']['monthlycost'] = $planDetails['Productplan']['monthlycost'];
						  $data['product'][$j]['Product']['yearlycost'] = $planDetails['Productplan']['yearlycost'];
						   $data['product'][$j]['Product']['terms'] = $planDetails['Productplan']['terms'];
				   
                   
                   $j++;
              }  
              
           }    
            
          // print "<pre>";print_r($data);print "</pre>";die;
            $this->set('data',$data);
        }    
        else{
           $this->redirect('index'); 
        }    
    }    
    
    function plan(){
		//echo "hello";die;
		$this->disableCache();
        $this->layout = null;
        $productPlanDataList=array();
        if($_POST && $_POST['txtProductItem'] && $_POST['txtCategoryItem']){
            $productId=$_POST['txtProductItem'];
            $categoryId=$_POST['txtCategoryItem'];
            $arrPlan=array('Plan1','Plan2','Plan3','Plan4','Plan5');
            foreach($arrPlan as $plan){
                $productPlanDataList[$plan]=$this->Productplan->getProductPlanDetails($productId,$plan);                       
            }     
            $productInfo = $data['product']=$this->Product->find('first', array('conditions' =>array('Product.id'=>$productId)));
            $this->set('productId', $productId);
            $this->set('categoryId', $categoryId);
            $this->set('productPlanDataList', $productPlanDataList);
			 $this->set('productInfo', $productInfo);
			//print"<pre>";print_r($productInfo);die;
        }
        else{
           $this->redirect('index'); 
        }    

    }   
	
	function email_template(){
        $this->layout = 'default';   
		$plans = null;
		//print "<pre>";print_r($_POST);die;
		if($_POST && $_POST['data']['Product']['planId'])
		{
              $plans=$_POST['data']['Product']['planId'];
				$online = false;
		}
		else{
					$param = $this->params['url'];			
					$shortURLIds = $param['shortURLIds'];
					$online = true;
			  }
		if($plans)
		{		
              $arrPlan=explode(",",$plans);
			  $i = 0;
			  $emailSelect= array();	
			  $setupCost = 0;
			  $monthlyCost = 0;
			  $yearlyCost = 0;
			  $shortURLIds = "";
			  foreach($arrPlan as $plan)
			  {
				$emailSelect[$i] = $this->Productplan->read(null, $plan);
				//print"<pre>";print_r($emailSelect[$i]);die;
				$setupCost = $setupCost + $emailSelect[$i]['Productplan']['setupcost'];
				$monthlyCost = $monthlyCost + $emailSelect[$i]['Productplan']['monthlycost'];
				$yearlyCost = $yearlyCost + $emailSelect[$i]['Productplan']['yearlycost'];
			
					$emailSelect[$i]['Product']['short_url'] = parent::shortenURL($emailSelect[$i]['Product']['link']);
					$this->data = array();
					$this->data['Googledatum']['product_id'] = $emailSelect[$i]['Product']['id'];
					$this->data['Googledatum']['plan_id'] = $emailSelect[$i]['Productplan']['id'];
					$this->data['Googledatum']['short_url'] = $emailSelect[$i]['Product']['short_url'];
					$this->data['Googledatum']['cdate'] = date('Y-m-d h:i:s');
					
					$this->Googledatum->create();
					$this->Googledatum->save($this->data);
					$id = $this->Googledatum->id;
					$shortURLIds = $shortURLIds.$id.",";
				
				$categoryInfo = $this->Category->find('first', array('conditions' =>array('Category.id'=>$emailSelect[$i]['Product']['category_id']),'recursive'=>-1));
				$emailSelect[$i]['Category'] = $categoryInfo['Category'];				
				$i++;
			  }
			  //print"<pre>";print_r($emailSelect);die;
			  $this->set('emailSelects',$emailSelect);
			  $this->set('setupCost',$setupCost);
			  $this->set('monthlyCost',$monthlyCost);
			  $this->set('yearlyCost',$yearlyCost);
			  $this->set('planIds',$plans);
			  $this->set('shortURLIds',$shortURLIds);
			  $this->set('online',$online);
			  $this->set('menuItem', 'products');
        }
		else if($shortURLIds)
		{
			$shortIds=explode(",",$shortURLIds);
			  $i = 0;
			  $emailSelect= array();	
			  $setupCost = 0;
			  $monthlyCost = 0;
			  $yearlyCost = 0;
			  $shortURLIds = "";
			  foreach($shortIds as $urlId)
			  {
				if($urlId)
				{
					
					$shortUrlDetails = $this->Googledatum->find('first', array('conditions' =>array('Googledatum.id'=>$urlId),'recursive'=>-1));
					//print "<pre>";print_r($shortUrlDetails);die;
					$emailSelect[$i] = $this->Productplan->read(null, $shortUrlDetails['Googledatum']['plan_id']);
					
					$setupCost = $setupCost + $emailSelect[$i]['Productplan']['setupcost'];
					$monthlyCost = $monthlyCost + $emailSelect[$i]['Productplan']['monthlycost'];
					$yearlyCost = $yearlyCost + $emailSelect[$i]['Productplan']['yearlycost'];
			
					$emailSelect[$i]['Product']['shortURL_id'] = $shortUrlDetails['Googledatum']['id'];
					//print_r($emailSelect[$i]['Product']['category_id']);
				
					$categoryInfo = $this->Category->find('first', array('conditions' =>array('Category.id'=>$emailSelect[$i]['Product']['category_id']),'recursive'=>-1));
					//print_r($categoryInfo);die;
					$emailSelect[$i]['Category'] = $categoryInfo['Category'];
						
					$i++;
				}
			  }
				
		
				$this->set('emailSelects',$emailSelect);
			  $this->set('setupCost',$setupCost);
			  $this->set('monthlyCost',$monthlyCost);
			  $this->set('yearlyCost',$yearlyCost);
			  $this->set('planIds',$plans);
			  $this->set('shortURLIds',$shortURLIds);
			  $this->set('online',$online);
			  $this->set('menuItem', 'products');
		}
		else
		{
			$this->Session->setFlash(__('No Product Selected', true));
			$this->redirect(array('controller'=>'home','action' => 'index'));
		}

	}	 
    function getToken()
	{
		$this->layout = null;
		$code = $_GET['code'];
		
		 
		echo $code;die;
	}
    
}
?>
