/*****************validate forgot password Page********************/
function validateForgotPassword()
{	
	var validateErrors = 0;
	if(validateHasValue(document.getElementById('AdminUsername'),document.getElementById('dvError1'),document.getElementById('spanEmail'))==false)
	{
		validateErrors++;
	}
	else if(validateEmail(document.getElementById('AdminUsername'),document.getElementById('dvError2'),document.getElementById('spanEmail'))==false)
	{
		validateErrors++;
	}
	
	if(validateErrors==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
/*****************validate Login Page********************/
function validateLogin()
{
	var validateErrors = 0;
	if(validateEmail(document.getElementById('AdminUsername'),document.getElementById('dvError1'),document.getElementById('spanEmail'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('AdminPassword'),document.getElementById('dvError2'),document.getElementById('spanPassword'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
/*****************************validate change password page**************/
function validateChangePassword()
{
	var validateErrors = 0;	
	if(validateHasValue(document.getElementById('AdministratorCurrent'),document.getElementById('dvError1'),document.getElementById('spanOld'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('AdministratorNewPassword'),document.getElementById('dvError2'),document.getElementById('spanNew'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('AdministratorConfirmPassword'),document.getElementById('dvError3'),document.getElementById('spanConfirm'))==false)
	{
		validateErrors++;
	}
	else if(compareValues(document.getElementById('AdministratorConfirmPassword'),document.getElementById('AdministratorNewPassword').value,document.getElementById('dvError4'),document.getElementById('spanConfirm'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
/*****************************validate popup text*************************/
function validateTextOnPopups()
{
	var validateErrors = 0;
	if(validateTextAreaHasValue(document.getElementById('PopupAboutUs'),document.getElementById('dvError1'),document.getElementById('spanAboutUs'))==false)
	{
		validateErrors++;
	}
	if(validateTextAreaHasValue(document.getElementById('PopupDisclaimer'),document.getElementById('dvError2'),document.getElementById('spanDisclaimer'))==false)
	{
		validateErrors++;
	}
	if(validateTextAreaHasValue(document.getElementById('PopupTerms'),document.getElementById('dvError3'),document.getElementById('spanTerms'))==false)
	{
		validateErrors++;
	}
	if(validateTextAreaHasValue(document.getElementById('PopupContactUs'),document.getElementById('dvError4'),document.getElementById('spanContact'))==false)
	{
		validateErrors++;
	}
	
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}

/*****************************validate product edit/add page**************/
function validateProduct()
{
	
	var validateErrors = 0;	
	if(validateHasValue(document.getElementById('ProductTwittername'),document.getElementById('dvError1'),document.getElementById('spanCode'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductSeoName'),document.getElementById('dvError0'),document.getElementById('spanSEO'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductCurrency'),document.getElementById('dvError7'),document.getElementById('spanCurrency'))==false)
	{
		validateErrors++;
	}
	if(checkSelection(document.getElementById('ProductLocation'),'Select location',document.getElementById('dvError2'),document.getElementById('spanLocation'))==false)	
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductTitle'),document.getElementById('dvError3'),document.getElementById('spanTitle'))==false)
	{
		validateErrors++;
	}
	if(document.getElementById('ProductImage'))
	{
		if(validateHasValue(document.getElementById('ProductImage'),document.getElementById('dvError4'),document.getElementById('spanImage'))==false)
		{
			validateErrors++;
		}
	}
	else
	{
		if(validateHasValue(document.getElementById('ProductNewImage'),document.getElementById('dvError4'),document.getElementById('spanImage'))==false)
		{
			validateErrors++;
		}
	}
	if(validateHasValue(document.getElementById('ProductLink'),document.getElementById('dvError5'),document.getElementById('spanLink'))==false)
	{
		document.getElementById('dvError5').innerHTML = "Please enter link";
		validateErrors++;
	}
	else
	{
		if(isValidURL(document.getElementById('ProductLink'),document.getElementById('dvError5'),document.getElementById('spanLink'))==false)
		{
			document.getElementById('dvError5').innerHTML = "Please enter valid url";
			validateErrors++;
		}
	}
	
	if(validateTextAreaHasValue(document.getElementById('ProductDescription'),document.getElementById('dvError6'),document.getElementById('spanDescription'))==false)
	{
		validateErrors++;
	}
	
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}
/****************************validate popup text*************************/
function validatePopupText()
{
	var validateErrors = 0;	
	if(validateTextAreaHasValue(document.getElementById('AdminWordContent'),document.getElementById('dvError8'),document.getElementById('spanPopupText'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}
/****************************validate numbers to rotate*************************/
function validateProductNumber()
{
	var validateErrors = 0;	
	if(validateHasValue(document.getElementById('ProductNumberProdToRotate'),document.getElementById('dvError8'),document.getElementById('spanNumber'))==false)
	{
		validateErrors++;
	}
	else if(isNumber(document.getElementById('ProductNumberProdToRotate'),document.getElementById('dvError8'),document.getElementById('spanNumber'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductNumberSpeed'),document.getElementById('dvError7'),document.getElementById('spanSpeed'))==false)
	{
		validateErrors++;
	}
	else if(isNumber(document.getElementById('ProductNumberSpeed'),document.getElementById('dvError7'),document.getElementById('spanSpeed'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}
/*****************************validate Product Plan**********************/
function validateProductPlan()
{	
	var validateErrors = 0;	
	if(checkSelection(document.getElementById('ProductplanProductId'),'0',document.getElementById('dvError'),document.getElementById('spanProduct'))==false)	
	{
		validateErrors++;
	}
	if(checkSelection(document.getElementById('ProductplanPlan'),'Select plan',document.getElementById('dvError1'),document.getElementById('spanPlan'))==false)	
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductplanTitle'),document.getElementById('dvError3'),document.getElementById('spanTitle'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductplanSetupcost'),document.getElementById('dvError2'),document.getElementById('spanSetupcost'))==false)
	{
		document.getElementById('dvError2').innerHTML = "Please enter setup cost";
		validateErrors++;
	}
	
	if(validateHasValue(document.getElementById('ProductplanMonthlycost'),document.getElementById('dvError4'),document.getElementById('spanMonthly'))==false)
	{
		document.getElementById('dvError4').innerHTML = "Please enter monthly cost";
		validateErrors++;
	}
	
	if(validateHasValue(document.getElementById('ProductplanYearlycost'),document.getElementById('dvError6'),document.getElementById('spanYearly'))==false)
	{
		document.getElementById('dvError6').innerHTML = "Please enter yearly cost";
		validateErrors++;
	}
	
	if(validateTextAreaHasValue(document.getElementById('ProductplanShortDesc'),document.getElementById('dvError8'),document.getElementById('spanShortDesc'))==false)
	{
		validateErrors++;
	}
	if(validateTextAreaHasValue(document.getElementById('ProductplanDetailDesc'),document.getElementById('dvError9'),document.getElementById('spanDetailDesc'))==false)
	{
		validateErrors++;
	}
	if(validateTextAreaHasValue(document.getElementById('ProductplanPlanLimit'),document.getElementById('dvError10'),document.getElementById('spanPlanLimit'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('ProductplanTerms'),document.getElementById('dvError14'),document.getElementById('spanPrimaryCond'))==false)	
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}

}

/*****************************validate category*************************/
function validateCategory()
{
	var validateErrors = 0;	
	if(validateHasValue(document.getElementById('CategoryTitle'),document.getElementById('dvError3'),document.getElementById('spanTitle'))==false)
	{
		validateErrors++;
	}
	
	if(validateHasValue(document.getElementById('CategoryOrder'),document.getElementById('dvError6'),document.getElementById('spanOrder'))==false)
	{
		validateErrors++;
	}	
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}
/*****************************validate reset password page**************/
function validateResetPassword()
{
	var validateErrors = 0;	
	
	if(validateHasValue(document.getElementById('AdministratorNewPassword'),document.getElementById('dvError1'),document.getElementById('spanNew'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('AdministratorConfirmPassword'),document.getElementById('dvError2'),document.getElementById('spanConfirm'))==false)
	{
		validateErrors++;
	}
	else if(compareValues(document.getElementById('AdministratorConfirmPassword'),document.getElementById('AdministratorNewPassword').value,document.getElementById('dvError3'),document.getElementById('spanConfirm'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
/*************************Validate Banner Page************************/
function validateBanner()
{
	var validateErrors = 0;	
	if(validateHasValue(document.getElementById('BannerTxt1'),document.getElementById('dvError1'),document.getElementById('spanTxt1'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('BannerTxt2'),document.getElementById('dvError2'),document.getElementById('spanTxt2'))==false)
	{
		validateErrors++;
	}
	if(validateHasValue(document.getElementById('BannerTxt3'),document.getElementById('dvError3'),document.getElementById('spanTxt3'))==false)
	{
		validateErrors++;
	}
	if(validateErrors==0)
	{
		document.forms[0].submit();
	}
}
/************************Common Validate functions********************/
function validateEmail(emailElement,errElement,spanElement)
{
	            //errElement is where to show the error
				//spanElement is to change the look of textbox
	            var patt = /^.+@.+[.].{2,}$/i;
				
				
	            if(!patt.test(emailElement.value)) {	                
	                    errElement.style.display='block'; 
						spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');	                    
						return false;
	            } else {
						errElement.style.display='none';
						spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');
						return true;
	            }
}

function validateHasValue(txtElement,errElement,spanElement)
{
	            //errElement is where to show the error
				//spanElement is to change the look of textbox
	            var patt = /^.+@.+[.].{2,}$/i;
				
				
	            if(txtElement.value.length==0) {	                
	                    errElement.style.display='block'; 
						spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');
							                    
						return false;
	            } else {
						errElement.style.display='none';
						spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');
							
						return true;
	            }
}
function isNumber(txtElement,errElement,spanElement) {
	var str = txtElement.value;
    var regex = /^\d/;
    if(!(regex.test(str))){
		errElement.style.display='block'; 
		spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');
        return false;
    }                                                                 
	else {
			errElement.style.display='none';
			spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');				
			return true;
	}
} 
function isPrice(txtElement,errElement,spanElement) {
	var str = txtElement.value;
    var regex = /^\d+\.\d{2}$/;
    if(!(regex.test(str))){
		errElement.style.display='block'; 
		spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');
        return false;
    }                                                                 
	else {
			errElement.style.display='none';
			spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');				
			return true;
	}
} 
function isValidURL(url,errElement,spanElement) {
	var v = new RegExp();
    v.compile(/((http:\/\/)|(https:\/\/)|(www\.))[.*\/\|\a-zA-Z\/]*|[\?]/);
    if (!v.test(url.value)) {
		errElement.style.display='block'; 
		spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');
							        
        return false;
    }
	else
	{
		errElement.style.display='none'; 
		spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');
							        
		return true;
	}
}

function limitText(limitField, limitCount, limitNum) {
    if (document.getElementById(limitField).value.length > limitNum) {
        document.getElementById(limitField).value = document.getElementById(limitField).value.substring(0, limitNum);
           var objControl=document.getElementById(limitField);
        objControl.scrollTop = objControl.scrollHeight;
    } else {
        document.getElementById(limitCount).innerHTML = limitNum - document.getElementById(limitField).value.length;
    }
}	
function validateTextAreaHasValue(txtElement,errElement,spanElement)
{
		
	            //errElement is where to show the error
				//spanElement is to change the look of textbox
	            //alert(txtElement);	
				
	            if(txtElement.value.length==0) {	                
	                    errElement.style.display='block'; 
						spanElement.className= spanElement.className.replace(/\inputTextAreaBlue\b/,'inputTextAreaRed');
							                    
						return false;
	            } else {
						errElement.style.display='none';
						spanElement.className= spanElement.className.replace(/\inputTextAreaRed\b/,'inputTextAreaBlue');
							
						return true;
	            }
}

function compareValues(txtElement,val,errElement,spanElement)
{
	            //errElement is where to show the error
				//spanElement is to change the look of textbox
	            var patt = /^.+@.+[.].{2,}$/i;
				
				
	            if(txtElement.value!=val) {	                
	                    errElement.style.display='block'; 
						spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');                  
						return false;
	            } else {
						errElement.style.display='none';
						spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');	
						return true;
	            }
}
function checkSelection(txtElement,val,errElement,spanElement)
{
	            //errElement is where to show the error
				//spanElement is to change the look of textbox
	            
				
				
	            if(txtElement.value==val) {	                
	                    errElement.style.display='block'; 
						spanElement.className= spanElement.className.replace(/\inputTxtBlue\b/,'InputTxtcolo');                  
						return false;
	            } else {
						errElement.style.display='none';
						spanElement.className= spanElement.className.replace(/\InputTxtcolo\b/,'inputTxtBlue');	
						return true;
	            }
}
function redirectURL(url)
{
	document.location.href=url;
}
function redirectParent(url)
{
	parent.window.document.location.href =url;
}
/**********************************Register User***********************************/
function registerUser(url)
{	
	validateErrors = 0;
	if(validateHasValue(document.getElementById('UserFirstname'),document.getElementById('dvError1'),document.getElementById('spanFirstname'))==false)
	{		validateErrors++;	}
	if(validateHasValue(document.getElementById('UserLastname'),document.getElementById('dvError2'),document.getElementById('spanLastname'))==false)
	{		validateErrors++;	}	
	if(validateEmail(document.getElementById('UserEmail'),document.getElementById('dvError3'),document.getElementById('spanEmail'))==false)
	{		validateErrors++;	}	
	if(validateHasValue(document.getElementById('UserOrganization'),document.getElementById('dvError4'),document.getElementById('spanOrganization'))==false)
	{		validateErrors++;	}
	if(checkSelection(document.getElementById('UserIndustry'),"Select...",document.getElementById('dvError5'),document.getElementById('spanPostion'))==false)
	{		validateErrors++;	}
	if(validateHasValue(document.getElementById('UserPostcode'),document.getElementById('dvError6'),document.getElementById('spanPostcode'))==false)
	{		validateErrors++;	}
	if(validateErrors==0)
	{		
		
	/*	if(document.getElementById('UserNewsRegister').checked)
		{
			document.getElementById('mce-EMAIL').value=document.getElementById('UserEmail').value;
			document.getElementById('mce-FNAME').value=document.getElementById('UserFirstname').value;
			document.getElementById('mce-LNAME').value=document.getElementById('UserLastname').value;
			document.getElementById('mce-COMPANY').value=document.getElementById('UserOrganization').value;
			
			alert(document.getElementById('mc-embedded-subscribe-form').submit());
		}*/
		document.getElementById('UserAddForm').submit();
		//closePopup();	
		//parent.window.document.location.href =url;
	}
}
/********************************Submit User Rating************************************/
function submitRating(){
	//alert(document.getElementById('tmp').value);
	document.getElementById('RatingRatingYou').value  = document.getElementById('rating').value;
	document.forms[0].submit();	
	//alert("done");
	setTimeout(closePopup(),1000);

}
/*********************************Testimonial****************************************/
function validateTestimonial()
{
	validateErrors = 0;
	if(validateHasValue(document.getElementById('TestimonialName'),document.getElementById('dvError1'),document.getElementById('spanName'))==false)
	{	
		validateErrors++;	
	}
	if(validateTextAreaHasValue(document.getElementById('TestimonialTestimonial'),document.getElementById('dvError2'),document.getElementById('spanTestimonial'))==false)
	{
		validateErrors++;
	}	
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
	
}
/********************************Contact us popup validation*****************/
function validateMessage()
{
	var validateErrors = 0;
	var emailElement = document.getElementById('MessageEmail');
	var spanElement = document.getElementById('spanEmail');
	var errElement = document.getElementById('dvError1');
	var patt = /^.+@.+[.].{2,}$/i;
	if(!patt.test(emailElement.value)) {	                
			errElement.style.display='block'; 
			spanElement.className= spanElement.className.replace(/\msgTxtBlue\b/,'msgTxtcolo');	                    
			validateErrors++;
	} else {
			errElement.style.display='none';
			spanElement.className= spanElement.className.replace(/\msgTxtcolo\b/,'msgTxtBlue');			
	}	
	if(validateTextAreaHasValue(document.getElementById('MessageMessage'),document.getElementById('dvError2'),document.getElementById('spanMessage'))==false)
	{
		validateErrors++;
	}	
	if(validateErrors==0)
	{
		document.forms[0].submit();	
	}
}