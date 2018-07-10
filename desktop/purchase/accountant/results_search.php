<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
  //call the path to connect
  require_once('/home/geo/secure-include/purchase_cred.php');
  ini_set("include_path", '/home/geo/php:' . ini_get("include_path") );
 

 

?>
<!DOCTYPE html>

<head>
<title>UNM Global Education Office</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="/bootstrap/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js" ></script>
<script src="/javascript/sorttable.js"></script>
</head>
<body style="background-color:#FFF"    >
<?Php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

///////// Getting the data from Mysql table for advisor list box//////////
$quer_contact = "SELECT distinct `supervisor` FROM `directory` order by `supervisor`";
///////////// End of query for first list box////////////

///////// Getting the data from Mysql table for first list box//////////
$quer_requestor="SELECT DISTINCT name FROM directory order by name"; 
///////////// End of query for first list box////////////

///////// Getting the data from Mysql table for status//////////
$quer_status="SELECT DISTINCT status FROM purchase order by status"; 
///////////// End of query for first list box////////////



}//end try
  catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }

?>
<div style="width:80%; margin-left:10%">
  <h1>Purchase Request Data</h1>
  <h3>Select Search Criteria</h3>
  <form  method="post" action="https://geo-apply.unm.edu/HR/purchase/accountant/results.php"  enctype="multipart/form-data">
    <p>Status<br/>
    <div class='row'>
    <div class='form-group col-lg-4'>
    <?php echo "<select class = 'form-control' name='status'>
	<option selected value=''></option>";
	

foreach ($conn->query($quer_status) as $noticia2) {
echo "<option value='$noticia2[status]'>$noticia2[status]</option>"."<BR>";
		
		}
		echo"</select></div> </div>";?>
    </p>
    <!--change this code when advisor change		   
<p>Supervisor<br/>
	<?php echo "<select name='supervisor'>
	<option selected value=''></option>";
	


foreach ($conn->query($quer_contact) as $noticia2) {
echo "<option value='$noticia2[supervisor]'>$noticia2[supervisor]</option>"."<BR>";

}
echo"</select>";?>
  </p>--> 
    
    <!--end change this code then supervisor change-->
    
    <p>Requestor<br/>
    <div class='row'>
    <div class='form-group col-lg-4'>
    <?php 
echo "<select class = 'form-control'  name='requestor'>
	<option selected value=''></option>";
	


foreach ($conn->query($quer_requestor) as $noticia2) {
echo "<option value='$noticia2[name]'>$noticia2[name]</option>"."<BR>";

}
echo"</select></div> </div>";?>
    </p>
    <p><br/>
    </p>
    <p> Submission Dates: <br/>
      From:
    <div class='row'>
      <div class='row col-lg-6'>
        <div class='form-group col-lg-2'>
          <select class = 'form-control'   name="from_y" >
            <option value="all" selected>ALL</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
        </div>
        <div class='form-group col-lg-2'>
          <select class = 'form-control'   name="from_m" >
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
        </div>
        <div class='form-group col-lg-2'>
          <select class = 'form-control'    name="from_d" >
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
        </div>
        * This date will be included in the search</div>
    </div>
        To:
    <div class='row'>
    <div class='row col-lg-6'>
      <div class='form-group col-lg-2'>
        <select class = 'form-control'    name="to_y" >
          <option value="all" selected>ALL</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
        </select>
      </div>
      <div class='form-group col-lg-2'>
        <select class = 'form-control'    name="to_m" >
          <option value="01">Jan</option>
          <option value="02">Feb</option>
          <option value="03">Mar</option>
          <option value="04">Apr</option>
          <option value="05">May</option>
          <option value="06">Jun</option>
          <option value="07">Jul</option>
          <option value="08">Aug</option>
          <option value="09">Sep</option>
          <option value="10">Oct</option>
          <option value="11">Nov</option>
          <option value="12">Dec</option>
        </select>
      </div>
      <div class='form-group col-lg-2'>
        <select class = 'form-control'    name="to_d" >
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select></div>
        * This date will be excluded from the search</div>
    </div>
    <br/>
    <br/>
    
    <!--   <p>Sort Option<br/>
 <select name='sort'</option>
 //  <option selected value=''></option>
	   <option value='ID'>Submission Date</option>
      <option value='status'>Status</option>
      <option value='lastname'>Last Name</option>
      <option value='firstname'>First Name</option>
     </select>-->
    </p>
    <input type="submit" value="Search">
    <input type="submit" value="Excel" formaction="results_excel.php">
    </p>
  </form>
</div>
</body>
</html>
</body>
</html>
