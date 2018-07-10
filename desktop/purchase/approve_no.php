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
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/////////////////////////////////pull out info for requestor name
$quer_approve = "UPDATE purchase SET status='Not Approved' WHERE id=:id";
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
Request #'.$id.' from '.$requestor_name.' was NOT approved</body>
</html>';

$crlf = "\n";
$hdrs = array(
              'From'    => 'geo@unm.edu',
              'Subject' => 'New Purchase Request #'.$id.' Was Not Approved',
              'host'    => 'smtp.office365.com',
              
              );

$mime = new Mail_mime(array('eol' => $crlf));

$mime->setTXTBody($text);
$mime->setHTMLBody($html);


$body = $mime->get();
$hdrs = $mime->headers($hdrs);
$email=$requestor_email.', rflores4@unm.edu';
$mail =& Mail::factory('mail');
$mail->send($email, $hdrs, $body);


$conn = null;


echo "Request was not approved";
?>




