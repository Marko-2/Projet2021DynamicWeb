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
}

//to charge an image
function chargeProfilePicture(name, newValue){
	//alert("f");
	//new value is the image
	if(newValue != null){
		document.getElementById(name).style.backgroundImage = 'url('+newValue+')';
	}
}