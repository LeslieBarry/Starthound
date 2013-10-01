
var divi = 1;
var testDivi = 1;
function closePopup(){
    parent.$.fn.colorbox.close();

}

function selectHomeCategory(flag){
    var category=new Array();
    category=document.getElementsByName('checkHomeCategory');
    for(var i=0;i<category.length;i++){
        if(flag==true){
            category[i].checked=true;
        }    
        else{
            category[i].checked=false;
        }    
    } 
	if(flag==false)
	{			
		var startBtnNormal=document.getElementById('divNormal');
		var startBtnHiglight=document.getElementById('divcatSelected');
		
		//startBtnHiglight.style.display = "none";
		//startBtnNormal.style.display = "block";
	}
	else
	{
		var dvHomeErrorStart=document.getElementById('dvHomeErrorStart');
		var startBtnNormal=document.getElementById('divNormal');
		var startBtnHiglight=document.getElementById('divcatSelected');
		dvHomeErrorStart.style.display = "none";
		//startBtnHiglight.style.display = "block";
		//startBtnNormal.style.display = "none";
	}
    setHomeCategory();
}

function setCatBackground(catId,flag){
   var dvCatId='dvHomeCategoryItem'+catId; 
   var checkHomeCategoryId='checkHomeCategory'+catId;
   var dvCatPicSelectId='dvHomeCategoryItemPicSelected'+catId;
   var dvCatPicUnselectId='dvHomeCategoryItemPicUnselected'+catId;
   if(document.getElementById(checkHomeCategoryId).checked==false){
        if(flag=='mouseover'){
            document.getElementById(dvCatId).className='mtop15 selectedCategory';
            document.getElementById(dvCatPicUnselectId).style.display='none';
            document.getElementById(dvCatPicSelectId).style.display='block';
        }
        else if(flag=='mouseout'){
            document.getElementById(dvCatId).className='mtop15 unselectedCategory';
            document.getElementById(dvCatPicSelectId).style.display='none';
            document.getElementById(dvCatPicUnselectId).style.display='block';
        }
   }
   else{
   }
}


function checkHomeCategory(catId){
   var checkHomeCategoryId='checkHomeCategory'+catId;
   var str="";
   if(document.getElementById(checkHomeCategoryId).checked==false){
        document.getElementById(checkHomeCategoryId).checked=true;
		if(str=="")
			{
                str=document.getElementById(checkHomeCategoryId).value;
			}
            else
			{
                str=str+","+document.getElementById(checkHomeCategoryId).value;  
			}
   }
   else{
        document.getElementById(checkHomeCategoryId).checked=false;
   }
	var dvHomeErrorStart=document.getElementById('dvHomeErrorStart');
	var startBtnNormal=document.getElementById('divNormal');
	var startBtnHiglight=document.getElementById('divcatSelected');
	dvHomeErrorStart.style.display = "none";
	//startBtnHiglight.style.display = "block";
	//startBtnNormal.style.display = "none";
	
   //setHomeCategory();
   document.getElementById('txtHomeCategory').value=str; 
   startHomeCategory();
}

function setHomeCategory(){
    var txtHomeCategory=document.getElementById('txtHomeCategory');
    var str="";
    var category=new Array();
	var startBtnNormal=document.getElementById('divNormal');
	var startBtnHiglight=document.getElementById('divcatSelected');
	var selectedCat = 0;
    category=document.getElementsByName('checkHomeCategory')
    for(var i=0;i<category.length;i++){
        var dvCatId='dvHomeCategoryItem'+category[i].value;
        var dvCatPicSelectId='dvHomeCategoryItemPicSelected'+category[i].value;
        var dvCatPicUnselectId='dvHomeCategoryItemPicUnselected'+category[i].value;
        if(category[i].checked==true){
            document.getElementById(dvCatId).className='mtop15 selectedCategory';
            document.getElementById(dvCatPicUnselectId).style.display='none';
            document.getElementById(dvCatPicSelectId).style.display='block';
            if(str=="")
			{
                str=category[i].value;
			}
            else
			{
                str=str+","+category[i].value;  
			}
			selectedCat++;
			
        }
        else{
            document.getElementById(dvCatId).className='mtop15 unselectedCategory';
            document.getElementById(dvCatPicSelectId).style.display='none';
            document.getElementById(dvCatPicUnselectId).style.display='block';
			
        }
		
		
    }
	
	/*if(str=="")
	{				
				startBtnHiglight.style.display = "none";
				startBtnNormal.style.display = "block";
	}
	else
	{
		
				
				
				startBtnHiglight.style.display = "block";
				startBtnNormal.style.display = "none";
	}*/
    txtHomeCategory.value=str; 
	if(selectedCat==1)
		{			
			startHomeCategory();
		}
		else
		{			
		}
	//alert("str"+txtHomeCategory.value);	
}

function startHomeCategory(){
    var errormsg="";
    var txtHomeCategory=document.getElementById('txtHomeCategory');
    var dvHomeErrorStart=document.getElementById('dvHomeErrorStart');
    //dvHomeErrorStart.innerHTML="";
    if(txtHomeCategory.value==""){
        //errormsg="Please select a Category.";
        dvHomeErrorStart.style.display="block";
    }
    else{
        document.frmHomeCategory.submit();
    }    
}

var handleSetProductCategory =function(o){
    var response = o.responseText;
    //alert(response);
    document.getElementById('dvRefineImgLoader').innerHTML="";
	document.getElementById('centerAjaxLoader').style.display="none";
    document.getElementById(o.argument.dvProductContent).style.display='block';
    document.getElementById(o.argument.dvProductContent).innerHTML=response;
}

function setProductCategory(obj,url,imgurl){
    var catId=obj.value;
    var dvProductCategoryTxt='dvProductCategoryTxt'+catId;
    var dvProductContent='dvProductContent'+catId;
	
    if(obj.checked==true){
        document.getElementById('txtProductCategory').value=catId;
		
        document.getElementById(dvProductCategoryTxt).className="resultMidTxtBlack";
        if(document.getElementById('dvErrorProductItem').style.display=='block'){
            document.getElementById('dvErrorProductItem').innerHTML='';
            document.getElementById('dvErrorProductItem').style.display='none';
        }    
        document.getElementById('dvRefineImgLoader').innerHTML="<img src='"+imgurl+"/ajax-loader.gif' >";
		document.getElementById('centerAjaxLoader').style.display="block";
        var target = url;
        var callbackHandler ={success:handleSetProductCategory,argument:{catId:catId,dvProductContent:dvProductContent}};
        YAHOO.util.Connect.setForm(document.getElementById('frmProductCategory'));
        var request = YAHOO.util.Connect.asyncRequest('POST', target, callbackHandler);
    }                                   
    else{
        //setEstimatedCost(catId,0,0,0);
		clearProductSelection(catId);
		
        document.getElementById(dvProductCategoryTxt).className="resultMidTxt";
        document.getElementById(dvProductContent).innerHTML="";    
        document.getElementById(dvProductContent).style.display='none';
        setProductItemError();
    }
}

function setProductItemError(){
    var category=new Array();
    category=document.getElementsByName('checkProductCategory')
    var flag=0;
    for(var i=0;i<category.length;i++){
        if(category[i].checked==true){
            flag=1;
            break
        }
    }
    if(flag==0){
        document.getElementById('dvErrorProductItem').innerHTML='<p class="financeTxt alert alertTxt">Please select a Category.</span></p>';
        document.getElementById('dvErrorProductItem').style.display='block';
    }
}

function setProductItem(catId){
    var product=new Array();
    var checkProductItem='checkProductItem'+catId;
    product=document.getElementsByName(checkProductItem)
    for(var i=0;i<product.length;i++){
        var prodId=product[i].value;
        var dvProductItem='dvProductItem'+prodId;
        if(product[i].checked==true){
            if(i==0){
                document.getElementById(dvProductItem).className='tab1active';
            }
            else if(i==1){
                document.getElementById(dvProductItem).className='tab2active';
            }
            else if(i==2){
                document.getElementById(dvProductItem).className='tab3active';
            }
        }
        else{
            if(i==0){
                document.getElementById(dvProductItem).className='tab1 InactiveSection';
            }
            else if(i==1){
                document.getElementById(dvProductItem).className='tab2 InactiveSection';
            }
            else if(i==2){
                document.getElementById(dvProductItem).className='tab3 InactiveSection';
            }
        }
    }
}

var handleCheckProductItem =function(o){
    var response = o.responseText;
    //alert(response);
    var dvProductItemImgLoader='dvProductItemImgLoader'+o.argument.catId;
    document.getElementById(dvProductItemImgLoader).innerHTML="";
	document.getElementById('centerAjaxLoader').style.display="none";
	// folloing code is to hide other open plan details
	var selectedCategories = document.forms['frmProductCategory'].elements['checkProductCategory'];
	
		for(var i = 0;i<selectedCategories.length;i++)
		{
			
			if(selectedCategories[i].checked)
			{	
				divid= "dvProductItemPlan"+selectedCategories[i].value;				
				if(document.getElementById(divid))
				{	
					document.getElementById(divid).style.display="none"
				}
			}
		}
	/********************************************/
	 
    document.getElementById(o.argument.dvProductItemPlanId).style.display='block';
    document.getElementById(o.argument.dvProductItemPlanId).innerHTML=response;
	var radioButtonName = "radioProductPlan"+o.argument.proId;
	if(document.forms['frmProductItem'].elements[radioButtonName])
	{
		if(document.forms['frmProductItem'].elements[radioButtonName].length)
		{
			document.forms['frmProductItem'].elements[radioButtonName][0].click();
		}
		else
		{ 
			document.forms['frmProductItem'].elements[radioButtonName].click();
		}
	}
	
}

function checkProductItem(url,catId,proId,imgurl){	
	var dvProductErrorStart = document.getElementById('dvProductErrorStart');
    var checkProductItemProductId='checkProductItem'+proId;
    var dvProductItemPlanId='dvProductItemPlan'+catId;
    var dvProductItemImgLoader='dvProductItemImgLoader'+catId;
    document.getElementById(dvProductItemImgLoader).innerHTML="<img src='"+imgurl+"/ajax-loader.gif' >";
	document.getElementById('centerAjaxLoader').style.display="block";
    document.getElementById(checkProductItemProductId).checked=true;
    //setEstimatedCost(catId,0,0,0);
	if(dvProductErrorStart)
	{
		dvProductErrorStart.innerHTML="";
	}
    setProductItem(catId);
    document.getElementById('txtCategoryItem').value=catId;
    document.getElementById('txtProductItem').value=proId;
    var target = url;
	
    var callbackHandler ={success:handleCheckProductItem,argument:{dvProductItemPlanId:dvProductItemPlanId,catId:catId,proId:proId}};
    YAHOO.util.Connect.setForm(document.getElementById('frmProductItem'));
    var request = YAHOO.util.Connect.asyncRequest('POST', target, callbackHandler);
}

function clearProductSelection(catId){
    var product=new Array();
    var checkProductItem='checkProductItem'+catId;
    product=document.getElementsByName(checkProductItem);
    var dvProductItemPlanId='dvProductItemPlan'+catId;
    setEstimatedCost(catId,0,0,0);
	var tablePicksRow = "prodPlan"+catId;
		if(document.getElementById(tablePicksRow))
		{
			var row = document.getElementById(tablePicksRow);
			row.parentNode.removeChild(row);
			if(document.getElementById("heightGap").offsetHeight<=120)
			{
				document.getElementById("heightGap").style.minHeight = (document.getElementById("heightGap").offsetHeight+30)+"px";
			}
		}

    for(var i=0;i<product.length;i++){
		var prodId=product[i].value;
        
        var dvProductItem='dvProductItem'+prodId;
        if(product[i].checked==true){
            product[i].checked=false;
        }
        if(i==0){
            document.getElementById(dvProductItem).className='tab1';
        }
        else if(i==1){
            document.getElementById(dvProductItem).className='tab2';
        }
        else if(i==2){
            document.getElementById(dvProductItem).className='tab3';
        }
    }
    document.getElementById(dvProductItemPlanId).innerHTML="";
    document.getElementById(dvProductItemPlanId).style.display='none';
	var table = document.getElementById("tableYourPicks");
	if(table.rows.length>0)
	{
		
		table.style.border ="2px solid #FFCA17";
		window.setTimeout('removeBorder("tableYourPicks")',1000);
		document.getElementById("heightGap").style.minHeight = "150px";
	}
	else
	{
		removeBorder("tableYourPicks");

	}
}

function setEstimatedCost(categoryId,setupCost,monthlyCost,yearlyCost){
    var dvEstimatedCostSetup=document.getElementById('dvEstimatedCostSetup');
    var dvEstimatedCostMonthly=document.getElementById('dvEstimatedCostMonthly');
    var dvEstimatedCostYearly=document.getElementById('dvEstimatedCostYearly');

    var oldEstimatedCostSetupValue=parseFloat(dvEstimatedCostSetup.innerHTML);
    var oldEstimatedCostMonthlyValue=parseFloat(dvEstimatedCostMonthly.innerHTML);
    var oldEstimatedCostYearlyValue=parseFloat(dvEstimatedCostYearly.innerHTML);

    var txtProductSetupCostId='txtProductSetupCost'+categoryId;
    var txtProductMonthlyCostId='txtProductMonthlyCost'+categoryId;
    var txtProductYearlyCostId='txtProductYearlyCost'+categoryId;

    var txtProductSetupCost=document.getElementById(txtProductSetupCostId);
    var txtProductMonthlyCost=document.getElementById(txtProductMonthlyCostId);
    var txtProductYearlyCost=document.getElementById(txtProductYearlyCostId);
    
    yearlyCost1=parseFloat(oldEstimatedCostYearlyValue)-parseFloat(txtProductYearlyCost.value)+parseFloat(yearlyCost);
    //ert(yearlyCost);
    monthlyCost1=parseFloat(oldEstimatedCostMonthlyValue)-parseFloat(txtProductMonthlyCost.value)+parseFloat(monthlyCost);
    setupCost1=parseFloat(oldEstimatedCostSetupValue)-parseFloat(txtProductSetupCost.value)+parseFloat(setupCost);

    dvEstimatedCostSetup.innerHTML=setupCost1.toFixed(2);
    dvEstimatedCostMonthly.innerHTML=monthlyCost1.toFixed(2);
    dvEstimatedCostYearly.innerHTML=yearlyCost1.toFixed(2);
    
    txtProductSetupCost.value=parseFloat(setupCost);
    txtProductMonthlyCost.value=parseFloat(monthlyCost);
    txtProductYearlyCost.value=parseFloat(yearlyCost);
    if(setupCost1>0 || monthlyCost1>0 || yearlyCost1>0)
	{
		document.getElementById('ulEstCost').style.border ="2px solid #FFCA17";
		window.setTimeout('removeBorder("ulEstCost")',1000);
	}
	else
	{
		removeBorder("ulEstCost");

	}

}
function removeBorder(elem)
{
	document.getElementById(elem).style.border ="2px solid #EBEBEB";
}

function setProductPlan(obj,categoryId,productId,planId,title,setupCost,monthlyCost,yearlyCost,desc){
	var emailPickPlanId = document.getElementById('ProductPlanId');
    setEstimatedCost(categoryId,setupCost,monthlyCost,yearlyCost);
	// to set your pick section
	
	var table = document.getElementById('tableYourPicks');
	
	//remove row for earlier choice of same product i.e plan is changed
	if(document.getElementById("prodPlan"+categoryId))
	{
		var row = document.getElementById("prodPlan"+categoryId);
		row.parentNode.removeChild(row);
		
	}	
	var rowCount = table.rows.length;
	
	var row = table.insertRow(rowCount);
	document.getElementById('heightGap').style.minHeight = (document.getElementById('heightGap').offsetHeight-30)+"px";
	if(rowCount==0||table.rows[rowCount-1].className=="black tableTxt tableBack")
	{
		row.setAttribute("class","black tableTxt");
	}
	else
	{
		row.setAttribute("class","black tableTxt tableBack");
	}
	
	row.id = "prodPlan"+categoryId;
	var cell1 = row.insertCell(0);
	cell1.width=70;
	cell1.innerHTML = document.getElementById('prodTitle'+productId).value;

	var cell2 = row.insertCell(1);
	cell2.innerHTML = title;

	var cell3 = row.insertCell(2);
	if(setupCost!=0)
	{
		cell3.innerHTML = parseFloat(setupCost).toFixed(2);
	}
	else if(monthlyCost!=0)
	{
		cell3.innerHTML = parseFloat(monthlyCost).toFixed(2);
	}
	else if(yearlyCost!=0)
	{
		cell3.innerHTML = parseFloat(yearlyCost).toFixed(2);
	}
	else
	{
		cell3.innerHTML = "Free";
	}
	var cell4 = row.insertCell(3);
	cell4.innerHTML = planId;
	cell4.style.display="none";
	
	if(table.rows.length>0)
	{		
		table.style.border ="2px solid #FFCA17";
		window.setTimeout('removeBorder("tableYourPicks")',1000);
		
		
		
	}
	else
	{
		removeBorder('tableYourPicks');
		document.getElementById('heightGap').style.minHeight = "150px";
	}
    var dvProductPlanDesc='dvProductPlanDesc'+productId;
    document.getElementById(dvProductPlanDesc).style.display='block';
    if(document.getElementById(desc)){
        document.getElementById(dvProductPlanDesc).innerHTML=document.getElementById(desc).value;
    }
    else{
        document.getElementById(dvProductPlanDesc).innerHTML='<i>No description available</i>';
    } 
	
	// to fill up the email template we need the planIds
	if(table.rows.length>0)
	{
		if(table.rows[0].cells[3])
		{
			emailPickPlanId.value = table.rows[0].cells[3].innerHTML;
			for(var i = 1;i < table.rows.length;i++)
			{
				emailPickPlanId.value = emailPickPlanId.value +"," + table.rows[i].cells[3].innerHTML;

			}
		}
		else
		{
			emailPickPlanId.value = table.rows[1].cells[3].innerHTML;
			for(var i = 2;i < table.rows.length;i++)
			{
				emailPickPlanId.value = emailPickPlanId.value +"," + table.rows[i].cells[3].innerHTML;

			}
		}
	}
}

/************************Email Picks*******************/
function mailPicks()
{
	
	var table = document.getElementById('tableYourPicks');
	//alert(table.rows[0].cells[1].innerHTML);
	var dvProductErrorStart = document.getElementById('dvProductErrorStart');
	if(table.rows[0])
	{			
		if(table.rows[0].cells[1].innerHTML=='Edition')
		{
			if(table.rows[1])
			{
				document.ProductEmailTemplateForm.submit();
			}
			else
			{
				errormsg="Please select a Product.";
				dvProductErrorStart.innerHTML='<span class="startErrorTxt fright alert alertTxt">'+errormsg+'</span>';
				
			}
		}
		else
		{		
			document.ProductEmailTemplateForm.submit();
		}
	}
	
	else
	{
		errormsg="Please select a Product.";
        dvProductErrorStart.innerHTML='<span class="startErrorTxt fright alert alertTxt">'+errormsg+'</span>';
	}
}
/***********************MouseOver and out**********************/
function changeclass(id,oldClassname,newClassname)
{	
	document.getElementById(id).className = document.getElementById(id).className.replace(oldClassname,newClassname);
}
/***************************Home page left corner display********************************/
function changeProduct(toDisplay)
{
	var divId = "detailDiv"+divi;
	for(var i = 1;i<=toDisplay;i++)
	{
		var detailDiv = "detailDiv"+i;
		
		
		document.getElementById(detailDiv).style.display = "none";
		
	}
	
	document.getElementById(divId).style.display = "block";
	divi++;
	if(divi>toDisplay)
	{
		divi = 1;
	}
}
function changeTestimonial(toDisplay)
{
	var divId = "testDiv"+testDivi;
	for(var i = 1;i<=toDisplay;i++)
	{
		var detailDiv = "testDiv"+i;//alert(detailDiv);
		if(document.getElementById(detailDiv))
		{
			document.getElementById(detailDiv).style.display = "none";
		}
		
	}
	document.getElementById(divId).style.display = "block";
	testDivi++;
	if(testDivi>toDisplay)
	{
		testDivi = 1;
	}
}
/****************************To redirect to previous page**************/
function goBack()
{
	var txtHomeProduct = document.getElementById('txtHomeProduct').value;
	href = document.getElementById('productForm').action+ "?txtHomeProduct="+txtHomeProduct;
	
	parent.document.location.href = href;
	
//	window.top.tb_remove();
}