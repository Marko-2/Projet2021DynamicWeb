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
		document.getElementById(target).setAttribute("onclick", "location.href='chargeProduct.php?row="+(rankProduct-1)+"'");
		target = "add"+i;
		document.getElementById(target).setAttribute("onclick", "location.href='addproduct.php?rank="+(rankProduct-1)+"'");
	}
}

//to add the correct link to products
function updateCartLinks(target, row){
	if(target != null){
		document.getElementById(target).setAttribute("onclick", "location.href='chargeProduct.php?row="+row+"'");
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

//adds an item to the user's cart
function addToCart(){

}

function applyBackground(target, image){
	//alert("applyBack");
	//new value is the image
	if(image != null){
		document.getElementsByClassName(target)[0].style.backgroundImage = 'url('+ image +')'; 
		document.getElementsByClassName(target)[0].style.backgroundRepeat = "repeat"; 
	}
}

//to use as form
function setEditableProduct(){
	//al of them are text fields
	document.getElementById("itemId").value = "";
	document.getElementById("itemId").placeholder = "not up to the user to decide id";
	//can be modified by user
	document.getElementById("article").readOnly = false;
	document.getElementById("article").value = "";
	document.getElementById("description").readOnly = false;
	document.getElementById("description").value = "";
	document.getElementById("category").readOnly = false;
	document.getElementById("category").value = "";
	document.getElementById("price").readOnly = false;
	document.getElementById("price").value = "";
	//the sell type has only 3 specific values
	document.getElementById("sellTypeRow").innerHTML = `<div class="col-25">
	<label for="sellType" style="font-weight:bold">Sell Type</label>
        </div>
        <div class="col-75">
          <select id="sellType" name="sellType">
            <option value="buy it now">Buy it now</option>
            <option value="auction">Bid</option>
            <option value="best offer">Best Offer</option>
          </select>
        </div>`;
	//the video field becomes a text field
	document.getElementById("videoField").innerHTML = '<div class="col-15"><label for="videoText" style="font-weight:bold">Video URL</label></div><div class="col-50"><input type="text" id="videoText" name="videoText" class="stealthText"></div>';
	//update the buttons fields
	document.getElementById("actions").innerHTML =`<input type="submit" value="Publish product">`;
	//to give an image
	document.getElementById("imageField").innerHTML =`<div class="row"><div class="col-25"><input type="file" name="uploadfile" value=""></div></div>`;


}