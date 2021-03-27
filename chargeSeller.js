function charge(dataName, dataFirstName, dataUsername, dataMail){
	alert('charge');

	document.getElementById("name").value = dataName;
	document.getElementById("firstName").value = dataFirstName;
	document.getElementById("Username").value = dataUsername;
	document.getElementById("E-mail").value = dataMail;
}

function uniqueCharge(name , newValue){
	alert('charge');
	document.getElementById(name).value = newValue;
}