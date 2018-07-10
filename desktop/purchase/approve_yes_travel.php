<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('/home/geo/secure-include/purchase_cred.php');

ini_set("include_path", '/home/geo/php:' . ini_get("include_path"));
require 'Mail.php';
require 'mime.php';
require '/home/geo/secure-include/headers_secure.php';

// Make sure an ID was passed
$id=$_GET['id'];
$requestor_name=$_GET['requestor_name'];
$requestor_email=$_GET['requestor_email'];
$html_main=$_GET['html_main'];
if ($requestor_email!="ntami@unm.edu")
{
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/////////////////////////////////pull out info for requestor name
$quer_approve = "UPDATE purchase SET status='Waiting for ED Approval' WHERE id=:id";
$statement = $conn->prepare($quer_approve);
$statement->bindValue(':id', $id);
$statement ->execute();
}//end try
catch (PDOException $e) {
 echo "Error: " . $e->getMessage();
}
/////////send e-mails//////////////////////
$html = 
'<html>
<body>';
$html .=$html_main;
$html .= '<a style="background-color:green; font-weight:bold;  border: solid 10px green; color:white; text-decoration:none" href="https://geo-apply.unm.edu/HR/purchase/accountant/approve_ed_travel_yes.php?id='.$id.'&requestor_name='.$requestor_name.'&requestor_email='.$requestor_email.'" >APPROVE</a>';
$html .= '       <a style="background-color:RED; font-weight:bold;  border: solid 10px RED; color:white; text-decoration:none" href="https://geo-apply.unm.edu/HR/purchase/accountant/approve_ed_travel_no.php?id='.$id.'&requestor_email='.$requestor_email.'&requestor_name='.$requestor_name.'" >DISAPPROVE</a>';

$html .='</body>
</html>';

$crlf = "\n";
$hdrs = array(
              'From'    => 'geo@unm.edu',
              'Subject' => 'New Travel Request #'.$id.' Was Send to Executive Director for Approval',
              'host'    => 'smtp.office365.com',
              );

$mime = new Mail_mime(array('eol' => $crlf));

$mime->setTXTBody($text);
$mime->setHTMLBody($html);


$body = $mime->get();
$hdrs = $mime->headers($hdrs);
$email=$requestor_email.', rflores4@unm.edu';
$mail =& Mail::factory('mail');
$mail->send('ntami@unm.edu', $hdrs, $body);//changed to executive director email


$conn = null;


echo "Request was sent to executive director for approval";
}//end if request for travel need additional approval from Director
else
{
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/////////////////////////////////pull out info for requestor name
$quer_approve = "UPDATE purchase SET status='Approved' WHERE id=:id";
$statement = $conn->prepare($quer_approve);
$statement->bindValue(':id', $id);
$statement ->execute();
}//end try
catch (PDOException $e) {
 echo "Error: " . $e->getMessage();
}
/////////send e-mails//////////////////////
$html = 
'<html>
	<body>
Request #'.$id.' from '.$requestor_name.' was recently approved by executive director</body>
</html>';

$crlf = "\n";
$hdrs = array(
              'From'    => 'geo@unm.edu',
              'Subject' => 'Travel Request #'.$id.' Was Approved',
              'host'    => 'smtp.office365.com',
              
              );

$mime = new Mail_mime(array('eol' => $crlf));

$mime->setTXTBody($text);
$mime->setHTMLBody($html);


$body = $mime->get();
$hdrs = $mime->headers($hdrs);
$email=$requestor_email.', rflores4@unm.edu';
$mail =& Mail::factory('mail');
$mail->send($email, $hdrs, $body);//changed to Rosenda's email


$conn = null;


echo "Request was approved";

}
?>




