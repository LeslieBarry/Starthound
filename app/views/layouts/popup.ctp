<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="http://www.cheapstart.com.au/favicon.ico" />
    <title>cheapstart. Compare and choose the best software to run and grow your small business</title>
    <meta name="Description" content="Compare and choose the best software to run and grow your small business"/>
   <meta name="Keywords" content="
	small business software rating
software rating
register business
register company
file sharing software
project collaboration
manage projects
share projects
project software
social media software
social media tools
measure social media
social media roi
small business software
Australia online business
start a business
small company software
start a company
australia company
get a domain
best domain
cheap domain
register domain
,payroll software
,payroll cheap
,payroll easy
,payroll compare
,accounting software
,cheap accounting
,free accounting
,easy accounting
,manage budget
,best software ratings
,expert software ratings
,compare software  ratings
,online sales
,online deals
,sales software
,salesforce
,small business sales
,document management software
,manage documents online
,save documents online
,store documents online
,spreadsheet management software
,manage spreadsheet online
,save spreadsheet online
,store spreadsheet online
,share document online
,share spreadsheet
,select software
,buy software
,best software
,top software
,easy software
,cheap software
,choose software
,crm software
,small business crm
,manage customer
,get customer
,keep customer
,customer relationship management software
,antivirus software
,acn
,Australian Business Register
,Australian Company Number
,Australian Business Number
,abn
,acr
,small business Melbourne, Australia
,small business Perth
,small business Sydney
,small business Adelaide
,small business Darwin
,small business Canberra
,small business Brisbane
,Register a Company, Register a Domain online ,Email & Collaboration software,Documents & Spreadsheets software, Security & Antivirus software, Finance & Accounting software ,HR & Payroll software, Time Management software ,Sales & Marketing software, File Sharing & Storage Website Setup ,Social Media "/>
    
	<meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="10"/> 
    <meta name="distribution" content="global"/>
    <meta name="rating" content="general"/>
    <?php 
		$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
		$isAndroid = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android');
		if($isiPad || $isAndroid)		
		{ 
	?>
		<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />
	<?php	
		echo($html->css(array('chrome','common','ipad','ie7','ie9','ipadpopup','stylesheet','colorbox')));
	} 
	else
	{
		echo($html->css(array('chrome','common','content','ie7','ie9','popup','stylesheet','colorbox')));
	}
	?>
    <?php echo($javascript->link(array('ajax/yahoo-min','ajax/event-min','ajax/connection-min','ajax/container-min','ajax/dom-min','common','jquery/jquery.js','jquery/jquery-1.2.6.pack.js','jquery/jquery1.4.4.js')));?>
	
	
<!-- script for google analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25006497-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
            <div class="popup">
                <div class="popupTop">
                    <div class="popupTopRight"></div>        
                    <div class="popupTopLeft"></div>
                    <div class="clr"></div>
                </div>
                <div class="popupMid">
                    <div class="poupmidLeft">
                        <div class="poupmidRight">
                               <!-- ====Middle Here==== -->
                                    <?php echo $content_for_layout; ?>
                               <!-- ====Middle End==== -->     
                        </div>
                    </div>
                </div>
                <div class="popupBottom">
                    <div class="popupBottomRight"></div>        
                    <div class="popupBottomLeft"></div>
                    <div class="clr"></div>
                </div>
            </div>
    
</body>
</html>