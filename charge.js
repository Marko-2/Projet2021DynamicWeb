function charge(dataName, dataFirstName, dataUsername, dataMail){
	alert('charge');

	document.getElementById("name").value = dataName;
	document.getElementById("firstName").value = dataFirstName;
	document.getElementById("Username").value = dataUsername;
	document.getElementById("E-mail").value = dataMail;
}

//to charge textfields or anything with the proprety value
function uniqueCharge(name , newValue){
	//alert('charge');
	if(newValue != null){
		document.getElementById(name).value = newValue;		
	}
	if(newValue == null && name.includes('description')){
		document.getElementById(name).value = 'This item has no description (default)';	
	}
}

//to charge an image
function chargeProfilePicture(name, newValue){
	//alert("f");
	//new value is the image
	if(newValue != null){
		document.getElementById(name).style.backgroundImage = 'url('+newValue+')';
	}
}

//to charge a video
//remember to replace watch?= by embed
function chargeVideo(name, newValue){
	//alert(newValue);
	//new value is the video url
		document.getElementById(name).src = newValue ;
	if(newValue != null){
		document.getElementById(name).src = newValue ;
	}
}

//to switch page
function updateButtons(page){
	var less = 0;
	var more = 0;
	if(page > 0){
		less = page-1;
		document.getElementById("minus").setAttribute("onclick", "location.href='chargeHome.php?page="+less+"'");
	}else{
		document.getElementById("minus").setAttribute("onclick", "");
	}
	
	more = page+1;
	document.getElementById("plus").setAttribute("onclick", "location.href='chargeHome.php?page="+more+"'");
}

//to add the correct links to products
function updateHomeLinks(page){
	for (var i = 1; i <6 ; i++){
		var target = "view"+i;
		var rankProduct = i+(page*5);
		document.getElementById(target).setAttribute("onclick", "location.href='chargeproduct.php?id="+rankProduct+"'");
	}
}

//provides the right direction according to the sell type
function updatePurchaseRedirect(){
	var type = document.getElementById("sellType").value;

	if(type == "buy it now"){
		document.getElementById("purchase").setAttribute("onclick", "location.href='verification.html'");
	}
	if(type == "auction"){
		document.getElementById("purchase").setAttribute("onclick", "location.href='Bid.html'");
	}
	if(type == "best offer"){
		document.getElementById("purchase").setAttribute("onclick", "location.href='BestOffer.html'");
	}
}

function applyBackground(image){
	//alert("applyBack");
	//new value is the image
	if(image != null){
		document.getElementsByClassName("content")[0].style.backgroundImage = 'url('+ image +')'; 
		document.getElementsByClassName("content")[0].style.backgroundRepeat = "repeat"; 
	}
}