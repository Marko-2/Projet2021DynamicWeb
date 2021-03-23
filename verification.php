<!DOCTYPE html>

<html>

<head>

<title>Verification</title>
<link rel="stylesheet" href="apperance.css">

</head>


<body>
<div class="banner">
    MyMarket
    <div class="tabcontent">
    </div>
    <a href="Home.html"> <button class="tablink" value="MyAccount"> </a>
  
</div>

    <div class="container">
  <form action="" method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname" style="font-weight:bold">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your first name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname" style="font-weight:bold">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="phone" style="font-weight:bold">Phone number</label>
    </div>
    <div class="col-75">
      <input type="text" id="phone" name="phone" placeholder="Your phone number..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="email" style="font-weight:bold">E-mail</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" placeholder="Your email..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country" style="font-weight:bold">Country</label>
    </div>
    <div class="col-75">
      <select id="country" name="country">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
        <option value="france">France</option>
        <option value="spain">Spain</option>
        <option value="uk">United Kingdom</option>
        <option value="brazil">Brazil</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject" style="font-weight:bold">Adress</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write your adress" style="height:60px"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="postal" style="font-weight:bold">Postal code</label>
    </div>
    <div class="col-75">
      <input type="text" id="postal" name="postal" placeholder="Your postal code..">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>


</div>


</body>





</html>