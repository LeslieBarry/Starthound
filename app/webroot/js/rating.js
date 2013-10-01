var sMax;	// Isthe maximum number of stars
var holder; // Is the holding pattern for clicked state
var preSet; // Is the PreSet value once a selection has been made
var rated;

// Rollover for image Stars //
function on(num){
	sMax = 0;	// Isthe maximum number of stars
	if(num!="0")
	{
		for(n=0; n<num.parentNode.childNodes.length; n++){
			if(num.parentNode.childNodes[n].nodeName == "A"){
				sMax++;	
			}
		}
		
		if(!rated){
			s = num.id.replace("_", ''); // Get the selected star
			a = 0;
			for(i=1; i<=sMax; i++){		
				if(i<=s){
					document.getElementById("_"+i).className = "on";
					//document.getElementById("rateStatus").innerHTML = '<div style="margin:5px 0 0 5px; color: #1AA94A; float:left;">' +num.title +'</div>';	
					holder = a+1;
					a++;
				}else{
					document.getElementById("_"+i).className = "";
				}
			}
		}
	}
	else
	{
		for(i=1; i<=4; i++){		
				if(i<=s){
					document.getElementById("_"+i).className = "";
					}
		}
	}
}

// For when you roll out of the the whole thing //
function off(me){
	if(!rated){
		if(!preSet){	
			for(i=1; i<=sMax; i++){		
				document.getElementById("_"+i).className = "";
				//document.getElementById("rateStatus").innerHTML ='<div style="margin:5px 0 0 5px; color: #1AA94A; float:left;">'+ me.parentNode.title +'</div>';
			}
		}else{
			on(preSet);
			//document.getElementById("rateStatus").innerHTML = '<div style="margin:5px 0 0 5px; color: #1AA94A; float:left;">' +document.getElementById("ratingSaved").innerHTML +'</div>';
		}
	}
}

// When you actually rate something //
function rateIt(me){
	
	if(!rated){
	//	document.getElementById("rateStatus").innerHTML = '<div style="margin:5px 0 0 5px; color: #1AA94A; float:left;">'+ me.id.replace("_", '')+ " out of 5"+'</div>';
		preSet = me;
		rated=1;
		document.getElementById("beforeRating").style.display = "none";
		document.getElementById("afterRating").style.display = "block";
		sendRate(me);
		on(me);
	}
}

// Send the rating information somewhere using Ajax or something like that.
function sendRate(sel){
	
	if(sel!="0")
	{
		document.getElementById("rating").value = sel.id.substr(1);
	}
	else
	{
		document.getElementById("rating").value = 0;
	}
}
function cancelRating()
{
		preSet = 0;
		rated=0;
		document.getElementById("beforeRating").style.display = "block";
		document.getElementById("afterRating").style.display = "none";
		sendRate("0");
		on("0");
}