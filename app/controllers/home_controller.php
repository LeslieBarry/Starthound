<?php  
class HomeController extends AppController{ 
	var $name="Home";
	var $uses = array('Category','Banner','Googledatum','Product','Productplan','Rating','ProductNumbers','Testimonial'); 

	function index(){
		$prod_id = null;
					$param = $this->params['url'];			
					
					if($param['prod_name'])
					{
						$prod_name = $param['prod_name'];
					}
		//$this->requestAction(array('controller' => 'googledata', 'action' => 'getAnalytics'));
        $this->layout = 'default';
        $bannerTxt1=null;
        $bannerTxt2=null;
        $bannerTxt3=null;
        $categoryDataList=null;
		$toDisplay = null;
        $bannerData = $this->Banner->find('first',array('conditions'=> array('Banner.status' => 'active','Banner.current'=>'yes'),'fields'=>array('Banner.txt1','Banner.txt2','Banner.txt3'),'limit'=>1));
        //print "<pre>";print_r($bannerData);print "</pre>";
        $categoryDataList = $this->Category->getCategories();
        //print "<pre>";print_r($categoryDataList);print "</pre>";
        if($bannerData){
            if($bannerData['Banner']['txt1']){
               $bannerTxt1=$bannerData['Banner']['txt1']; 
               
            }   
            if($bannerData['Banner']['txt2']){
               $bannerTxt2=$bannerData['Banner']['txt2']; 
               
            }   
            if($bannerData['Banner']['txt3']){
               $bannerTxt3=$bannerData['Banner']['txt3']; 
               
            }   
        }
		$toDisplay = $this->ProductNumbers->find('first');
		//print "<pre>";print_r($toDisplay);die;
		$productInfo = $this->Product->find('all',array('limit'=>$toDisplay['ProductNumbers']['prodToRotate'],'conditions'=>array('Product.status'=>'active','Product.advertise'=>'yes')));
		$testimonials = $this->Testimonial->find('all',array('limit'=>$toDisplay['ProductNumbers']['prodToRotate'],'conditions'=>array('Testimonial.status'=>'active','Testimonial.advertise'=>'yes')));
		if($testimonials)
		{
			for($no = 0;$no<sizeof($testimonials);$no++)
			{
				$testimonials[$no]['Testimonial']['cdate'] = parent::getMonthDateYear($testimonials[$no]['Testimonial']['cdate'] );
			}
		}
		//print "<pre>";print_r($testimonials);die;
		$i = 0;
		foreach($productInfo as $prod)
		{
			$ratingInfo = $this->Rating->find('first',array('conditions'=> array('Rating.product_id' =>$prod['Product']['id'] ),'fields'=>array('Rating.rating_you','Rating.functionality','Rating.reliability','Rating.ease_of_use','Rating.value_for_money','Rating.no_ofUsers','Rating.user_rating'
),'limit'=>1));	
			
			$paymentInfo= $this->Productplan->find('first',array('conditions'=>array('Productplan.status'=>'active','Productplan.plan'=>'Plan1','Productplan.product_id'=>$prod['Product']['id'])));
			//print "<pre>";print_r($paymentInfo);die;
			if($paymentInfo)
			{
				$productInfo[$i]['Product']['setupcost'] = $paymentInfo['Productplan']['setupcost'];
				$productInfo[$i]['Product']['monthlycost'] = $paymentInfo['Productplan']['monthlycost'];
				$productInfo[$i]['Product']['yearlycost'] = $paymentInfo['Productplan']['yearlycost'];
				$productInfo[$i]['Product']['terms'] = $paymentInfo['Productplan']['terms'];
			}
			else
			{
				$productInfo[$i]['Product']['monthly']=0;
			}
			if($ratingInfo)
			{
				
					$productInfo[$i]['Product']['rating_you'] = $ratingInfo['Rating']['user_rating'];
				
				$productInfo[$i]['Product']['rating_us'] = ($ratingInfo['Rating']['functionality']+$ratingInfo['Rating']['reliability']+$ratingInfo['Rating']['ease_of_use']+$ratingInfo['Rating']['value_for_money'])/4;
			}
			$i++;
		}
		//print "<Pre>";print_r($productInfo);die;
		//to get productdata on basis of maximum clicks;
		$productData = $this->Googledatum->find('all',array('order' => array('sum(Googledatum.clicks) DESC'),'fields'=>array('Googledatum.product_id','sum(Googledatum.clicks)'),'group' => 'Googledatum.product_id','limit'=>5));
		$j=0;
		foreach($productData as $prod)
		{
			$prod= $this->Product->find('first',array('conditions'=> array('Product.id' =>$prod['Googledatum']['product_id'] ),'limit'=>1,'recursive'=>-1));	
			$productData[$j]['Product'] = $prod['Product'];
			$j++;
		}
		
		//print "<Pre>";print_r($productData);die;
		
		//print_r($toDisplay);die;
		$this->set('prod_name',$prod_name);
        $this->set('bannerTxt1', $bannerTxt1);
        $this->set('bannerTxt2', $bannerTxt2);
        $this->set('bannerTxt3', $bannerTxt3);
        $this->set('categoryDataList', $categoryDataList);
		$this->set('productData', $productData);
		$this->set('productInfo', $productInfo);
        $this->set('menuItem', 'home');
		 $this->set('toDisplay', $toDisplay);
		 $this->set('testimonials',$testimonials);
	}	 
    
    
}
?>
