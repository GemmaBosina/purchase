<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('/home/geo/secure-include/purchase_cred.php');

ini_set("include_path", '/home/geo/php:' . ini_get("include_path"));
require 'Mail.php';
require 'mime.php';
require '/home/geo/secure-include/headers_secure.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>UNM: Global Education Office</title>
 <script>

  setTimeout(function () {
    window.alert("Please, refresh you browser to see updated results after you see the table!");

    window.history.go(-2);  }, 1000);
  </script>

</head>


</head>



<html>
<body >


<?php

try {
$name=$_POST[name];
$id=$_POST[id];
$email=$_POST[email];

$comments=$_POST[comment_old].date("Y/m/d").": ".$_POST[comment]."\n";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "
                UPDATE purchase SET status='Pending', comments= :comments
                WHERE id = :id";
                $stmt = $conn->prepare($query);
                $stmt->bindValue(":id", $id);
                $stmt->bindValue(":comments", $comments);
                $stmt->execute();
/////////send email completion                
  	$html .= '<html><body>
  	<p>Dear '.$name.',</p> 
  	<p>I need additional information to process your purchase request #'.$id.' as described below:</p><br/>
<div style="background-color: #eeeeee; padding: 3%">'.$_POST[comment].'</div>
  	<p>Rosenda Flores</p>
	<p>GEO Accountant</p>
	<p>The University of New Mexico</p>
	<p>Global Education Office</p>
	<p>+1.505.277.4032</p>


	  	
        </body>
</html>';

$email=$email;
$hdrs = array(
              'From'    => 'geo@unm.edu',
              'Subject' => 'Additional Info for Purchase Request #'.$id,
              'host'    =>'smtp.office365.com',
              );


$mime = new Mail_mime(array('eol' => $crlf));

$mime->setTXTBody($text);
$mime->setHTMLBody($html);


$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail');
$mail->send($email, $hdrs, $body);//change for $email
 /////////end send email completion   

  }//end try
catch
(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
        
       

$conn = null;
?>



</body>
</html>
