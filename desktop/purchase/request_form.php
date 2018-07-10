<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('/home/geo/secure-include/purchase_cred.php');


?>

<!doctype PUBLIC "-//W3C//ENTITIES Latin 1 for XHTML//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-lat1.ent">

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EDGE; ">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>UNM: GEO  --  Purchase Form</title>

<!--script for letter-exam options-->

<!--end of script for letter-exam options-->
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='https://geo-apply.unm.edu/HR/purchase/request_form.php?cat=' + val ;
}

</script>
<script language=JavaScript>
       function transcript_delivery() {

            if (document.f1.transcript[0].checked == true) {

                document.getElementById('transcript_application_email_yes').setAttribute('required', true);
   		document.getElementById('name_transcript').removeAttribute('required');
 		document.getElementById('title_transcript').removeAttribute('required');
  		document.getElementById('address1_transcript').removeAttribute('required');
  		document.getElementById('address2_transcript').removeAttribute('required');
  		document.getElementById('city_transcript').removeAttribute('required');
  		document.getElementById('state_transcript').removeAttribute('required');
  		document.getElementById('zip_transcript').removeAttribute('required');
  		document.getElementById('phone_transcript').removeAttribute('required');
  		document.getElementById('email_transcript').removeAttribute('required');
		document.getElementById('transcript_div_yes').style.display='block';
		document.getElementById('transcript_div').style.display='none';



            }
            else if (document.f1.transcript[1].checked == true) {

                document.getElementById('transcript_application_email_yes').removeAttribute('required');
                document.getElementById('name_transcript').setAttribute('required', true);
document.getElementById('title_transcript').setAttribute('required', true);
    document.getElementById('address1_transcript').setAttribute('required', true);
  document.getElementById('address2_transcript').setAttribute('required', true);
  document.getElementById('city_transcript').setAttribute('required', true);
  document.getElementById('state_transcript').setAttribute('required', true);
  document.getElementById('zip_transcript').setAttribute('required', true);
  document.getElementById('phone_transcript').setAttribute('required', true);
  document.getElementById('email_transcript').setAttribute('required', true);

 
				document.getElementById('transcript_div').style.display='block';
				document.getElementById('transcript_div_yes').style.display='none';

            }
        }
        </script>

<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="/bootstrap/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js" ></script>

<script type="text/javascript">
   var room = 1;
   function food_fields() { 
    room++;
    var objTo = document.getElementById('food_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="col-sm-4 nopadding">  <div class="form-group"> <input type="text" class="form-control" id="Foodname" name="Foodname[]" value="" placeholder="Product name"></div></div><div class="col-sm-4 nopadding"> <div class="form-group">    <input type ="number" step=".01" class="form-control" id="FoodUP" name="FoodUP[]" value="" placeholder="Unit Price $">  </div>   </div><div class="col-sm-4 nopadding">     <div class="form-group">    <div class="input-group">        <input type="number" class="form-control" id="FoodE" name="FoodE[]" value="" placeholder="Quantity"> <div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_food_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_food_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<script type="text/javascript">
   var room = 1;
   
   function it_fields() { 
    room++;
    var objTo = document.getElementById('it_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">  <div class="form-group"> <input type="text" class="form-control" id="ITname" name="ITname[]" value="" placeholder="Product name"></div></div><div class="col-sm-4 nopadding"> <div class="form-group">    <input type="number" step=".01" class="form-control" id="ITUP" name="ITUP[]" value="" placeholder="Unit Price $">  </div>   </div><div class="col-sm-4 nopadding">     <div class="form-group">    <div class="input-group">        <input type="number" class="form-control" id="ITE" name="ITE[]" value="" placeholder="Quantity"> <div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_it_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_it_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<script type="text/javascript">
   var room = 1;
   
   function office_fields() { 
    room++;
    var objTo = document.getElementById('office_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">  <div class="form-group"> <input type="text" class="form-control" id="Officename" name="Officename[]" value="" placeholder="Product name"></div></div><div class="col-sm-4 nopadding"> <div class="form-group">    <input type="number"  step=".01" class="form-control" id="OfficeUP" name="OfficeUP[]" value="" placeholder="Unit Price $">  </div>   </div><div class="col-sm-4 nopadding">     <div class="form-group">    <div class="input-group">        <input type="number" class="form-control" id="OfficeE" name="OfficeE[]" value="" placeholder="Quantity"> <div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_office_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_office_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<script type="text/javascript">
   var room = 1;
   
   function travel_fields() { 
    room++;
    
    var objTo = document.getElementById('travel_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding">  <div class="form-group"> <label for="Travelname">Travel Destination:</label><input type="text" class="form-control" id="Travelname" name="Travelname[]" value="" placeholder="Destination"></div></div><div class="col-sm-2 nopadding"><div class="form-group"><label for="Travelcost">Cost:</label><input type="number" class="form-control" id="Travelcost" name="Travelcost[]" value="" placeholder="Estimated $"></div></div><div class="col-sm-2 nopadding"> <div class="form-group"> <label for="Travel1UP">Start Date:</label>   <input type="date" class="form-control" id="Travel1UP" name="Travel1UP[]" value="" placeholder="">  </div>   </div><div class="col-sm-2 nopadding"> <div class="form-group"> <label for="Travel2UP">End Date:</label> <input type="date" class="form-control" id="Travel2UP" name="Travel2UP[]" value="" > </div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"><label for="TravelE"> Purpose:</label><input type="text" list="cars" class="form-control" placeholder="Select or Type if Other" id="TravelE" name="TravelE[]"/><datalist id="cars" id="TravelE" name="TravelE[]" ><option>Recruitment</option><option>Prof. Development</option></datalist><div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_travel_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_travel_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<script type="text/javascript">
   var room = 1;
   function rentals_fields() { 
    room++;
    var objTo = document.getElementById('rentals_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">  <div class="form-group"> <input type="text" class="form-control" id="Rentalsname" name="Rentalsname[]" value="" placeholder="Product name"></div></div><div class="col-sm-4 nopadding"> <div class="form-group">    <input type="number"  step=".01" class="form-control" id="RentalsUP" name="RentalsUP[]" value="" placeholder="Unit Price $">  </div>   </div><div class="col-sm-4 nopadding">     <div class="form-group">    <div class="input-group">        <input type="number" class="form-control" id="RentalsE" name="RentalsE[]" value="" placeholder="Quantity"> <div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_rentals_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_rentals_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<script type="text/javascript">
   var room = 1;
   function other_fields() { 
    room++;
    var objTo = document.getElementById('other_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-4 nopadding">  <div class="form-group"> <input type="text" class="form-control" id="Othername" name="Othername[]" value="" placeholder="Product name"></div></div><div class="col-sm-4 nopadding"> <div class="form-group">    <input type="number"  step=".01" class="form-control" id="OtherUP" name="OtherUP[]" value="" placeholder="Unit Price $">  </div>   </div><div class="col-sm-4 nopadding">     <div class="form-group">    <div class="input-group">        <input type="number" class="form-control" id="OtherE" name="OtherE[]" value="" placeholder="Quantity"> <div class="input-group-btn">        <button class="btn btn-danger" type="button" onclick="remove_other_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>      </div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_other_fields(rid) {
	   $('.removeclass'+rid).remove();
   }</script>
<style type="text/css">
.box {
	display: none;
}
label {
	margin-right: 15px;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
<style>input[type="url"]::-webkit-input-placeholder {
  color: red;
}
</style>

</head>

<body style="background-color:#FFF"    >
<div><a href="http://www.unm.edu/"><img src="https://geo-apply.unm.edu/images/unm-logo-1.png" style="width: 25%; height: auto; min-width: 300px"/></a><a href="http://geo.unm.edu/"><img src="https://geo-apply.unm.edu/images/unm-logo-3.png" style="width: 25%; height: auto; min-width: 300px"/></a></div>
<div align="left" style="background-color: #c10037; padding: 5px; ">
  <p style="color: #ffffff; font-size: calc(0.7vmax + 15px); margin: 0px  "><a href="http://celac.unm.edu" style="color: #ffffff; text-decoration: none; font-family: Arial;">ADMINISTRATION FORMS</a></p>
</div>
<div class="container">
<form class="form" method=post name="f1" onsubmit="return validateForm()" action="https://geo-apply.unm.edu/HR/purchase/purchase_insert.php" enctype="multipart/form-data" >
  <div >
    <h1 style="color: #777777">Purchase Request Form</h1>
    <?Php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT name,id FROM directory order by name"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
@$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT id, email, phone FROM directory where id=$cat"; 
}
////////// end of query for second subcategory drop down list box ///////////////////////////



}//end try
  catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }


?>
    <div>
      <p style='color: red'>* - required fields </p>
      <p> 1. <strong>REQUESTOR INFO</strong> </p>
      <?php
 echo " <div class='form-group col-lg-4 nopadding'>


<span style='color: red'>* </span>Requestor Name:  <select class='form-control' required name='cat' onchange=\"reload(this.form)\"><option selected value=''> </option>";

foreach ($conn->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[name]</option>";}
}
echo "</select></div>";
//////////////////  This will end the first drop down list ///////////

//////////       Email  /////////
echo " <div class='form-group  col-lg-4 nopadding'>   Requestor Email: ";
if(isset($_GET['cat']))
{
foreach ($conn->query($quer) as $noticia) {
if($noticia['id']==$cat){echo "

 <input class='form-control' type='text' id='requestor_email' name='requestor_email' value='$noticia[email]'/>
</div>
<div class='form-group  col-lg-4 nopadding'>
 Requestor Phone: <input class='form-control'  type='text' id='requestor_phone' name='requestor_phone' value='$noticia[phone]'/>
</div>";}
}
}
else{echo  "

 <input class='form-control' type='text' id='requestor_email' name='requestor_email' value=''/>
</div>
<div class='form-group  col-lg-4 nopadding'>
 Requestor Phone: <input class='form-control'  type='text' id='requestor_phone' name='requestor_phone' value=''/>
</div>";}


 ?>
    </div>
    <div>
      <div class='form-group '> 
        <p>2. <strong>PROGRAM/DIVISION INFO</strong></p></div>
<div class='form-group  col-lg-4 nopadding'>

        <p><span style='color: red'>* </span>Name:
          <select id="unit" name="unit" class='form-control'>
            <option value="celac">CELAC</option>
            <option value="education abroad">Education Abroad</option> 
            <option value="administration">GEO Administration</option>
            <option value="global programs">Global Programs</option>
            <option value="admission">International Admission & Recruitment</option>
            <option value="isss">ISSS</option>
            <option value="mexico">Mexico Office</option>
            <option value="sfrb">SFRB</option>
          </select>
        </p>
      </div>
      <div class='form-group  col-lg-4 nopadding'>
        <p>Must be delivered by:
          <input type="date" name="deliver" id="deliver" class='form-control'>
        </p>
      </div>
      <div class='form-group  col-lg-4 nopadding'>
        <p><span style='color: red'>* </span>Form of Purchse:
          <select id="form_purchase" name="form_purchase" class='form-control'>
            <option value="campus">Campus</option>
            <option value="online">Online</option>
            <option value="phone">Over the Phone</option>
            <option value="pcard">P-Card</option>
            <option value="bookstore">UNM Bookstore</option>
          </select>
        </p>
      </div>
    </div>
    <div>
      <p>3. <strong>VENDOR INFO</strong></p>
      <div class='form-group  col-lg-4 nopadding'>

        <p><span style='color: red'>* </span>Name:
          <input required  name="vendor_name" id="vendor_name" type="text" class='form-control' />
        </p>
      </div>
      <div class='form-group  col-lg-4 nopadding'>
        <p><span style='color: red'>* </span>Contact:
          <input required  name="vendor_contact" id= "vendor_contact" type="""text"  class='form-control'/>
        </p>
      </div>
      <div class='form-group  col-lg-4 nopadding'>
        <p>Phone:
          <input name="vendor_phone" id="vendor_phone" type="text"  class='form-control'/>
        </p>
      </div>
      <div class='form-group nopadding '>
        <p>Website:
          <input name="vendor_website" id="vendor_website" type="url"  class='form-control' placeholder='IMPORTANT! Please, copy the full path from browser, it shoud include http(s):// after you paste it'/>
        </p>
      </div>
    </div>
    <div>
      <div>
        <p>3. <strong>PURCHASE INFO</strong></p>
        <div class='form-group'>
          <p> <span style='color: red'>* </span>Purpose/Justification:<br/>
            <textarea required placeholder="How does this benefit UNM" class='form-control' id='purpose' name='purpose'></textarea>
          </p>
        </div>
        <p>Purchase Details:<br/>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="food" id="food" value="food" onClick="document.getElementById('food_div').style.display=block"/>
            Food<br/>
          </label>
        </div>
        <div class="panel panel-default food box" id="food_div">
          <div class="panel-heading">Purchase Description</div>
          <div class="panel-body">
            <div id="food_fields"> </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="text" class="form-control" id="Foodname" name="Foodname[]" value="" placeholder="Product name">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="number" step=".01" class="form-control" id="FoodUP" name="FoodUP[]" value="" placeholder="Unit Price $">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="FoodE" name="FoodE[]" value="" placeholder="Quantity">
                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="food_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="it" id="it" value="it"/>
            IT Supplies<br/>
          </label>
        </div>
        <div class="panel panel-default it box" id="it_div">
          <div class="panel-heading">Purchase Description</div>
          <div class="panel-body">
            <div id="it_fields"> </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="text" class="form-control" id="ITname" name="ITname[]" value="" placeholder="Product name">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="number" step=".01" class="form-control" id="ITUP" name="ITUP[]" value="" placeholder="Unit Price $">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="ITE" name="ITE[]" value="" placeholder="Quantity">
                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="it_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="office" id="office"  value="office"/>
            Office Supplies<br/>
          </label>
        </div>
        <div class="panel panel-default office box" id="office_div">
          <div class="panel-heading">Purchase Description</div>
          <div class="panel-body">
            <div id="office_fields"> </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="text" class="form-control" id="Officename" name="Officename[]" value="" placeholder="Product name">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="number" step=".01" class="form-control" id="OfficeUP" name="OfficeUP[]" value="" placeholder="Unit Price">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="OfficeE" name="OfficeE[]" value="" placeholder="Quantity">
                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="office_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="travel" id="travel" value="travel"/>
            Travel<br/>
          </label>
        </div>
        <div class="panel panel-default travel box" id="travel_div">
          <div class="panel-heading">Travel Description</div>
          <div class="panel-body">
            <div id="travel_fields"> </div>
            <div class="col-sm-3 nopadding">
              <div class="form-group">
                <label for="Travelname">Travel Destination:</label>
                <input type="text" class="form-control" id="Travelname" name="Travelname[]" value="" placeholder="Destination">
              </div>
            </div>
            <div class="col-sm-2 nopadding">
              <div class="form-group">
                <label for="Travelcost">Cost:</label>
                <input type="number" class="form-control" id="Travelcost" name="Travelcost[]" value="" placeholder="Estimated $">
              </div>
            </div>
            <div class="col-sm-2 nopadding">
              <div class="form-group">
                <label for="Travel1UP">Start Date:</label>
                <input type="date" class="form-control" id="Travel1UP" name="Travel1UP[]" value="" >
              </div>
            </div>
            <div class="col-sm-2 nopadding">
              <div class="form-group">
                <label for="Trave12UP">End Date:</label>
                <input type="date" class="form-control" id="Travel2UP" name="Travel2UP[]" value="" >
              </div>
            </div>
            <div class="col-sm-3 nopadding">
              <div class="form-group">
                <div class="input-group">
                 <label for="TravelE">Purpose:</label>


<input type="text" list="cars" class="form-control" placeholder="Select or Type if Other" id="TravelE" name="TravelE[]"/>
                
<datalist id="cars" id="TravelE" name="TravelE[]" >
  <option>Recruitment</option>
  <option>Prof. Development</option>
</datalist>

                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="travel_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="rentals" id="rentals" value="rentals"/>
            Rentals<br/>
          </label>
        </div>
        <div class="panel panel-default rentals box" id="rentals_div">
          <div class="panel-heading">Rentals Description</div>
          <div class="panel-body">
            <div id="rentals_fields"> </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="text" class="form-control" id="Rentalsname" name="Rentalsname[]" value="" placeholder="Product name">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="number" step=".01" class="form-control" id="RentalsUP" name="RentalsUP[]" value="" placeholder="Unit Price $">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="RentalsE" name="RentalsE[]" value="" placeholder="Quantity">
                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="rentals_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="other" id="other" value="other"/>
            Other<br/>
          </label>
        </div>
        <div class="panel panel-default other box" id="other_div">
          <div class="panel-heading">Purchase Description</div>
          <div class="panel-body">
            <div id="other_fields"> </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="text" class="form-control" id="Othername" name="Othername[]" value="" placeholder="Product name">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <input type="number" step=".01" class="form-control" id="OtherUP" name="OtherUP[]" value="" placeholder="Unit Price $">
              </div>
            </div>
            <div class="col-sm-4 nopadding">
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="OtherE" name="OtherE[]" value="" placeholder="Quantity">
                  <div class="input-group-btn">
                    <button class="btn btn-success" type="button" onClick="other_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
        </div>
        </p>
      </div>
    </div>
    <div>
      <input name="docFile" type="file" class="form-control">
    <br/><br/>

      <input type="submit" value="SUBMIT" class="btn"/>
    </div>
  </div>
</form>
</body>
</html>
