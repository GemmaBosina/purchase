<?php require_once('/home/geo/secure-include/purchase_cred.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>UNM: Global Education Office</title>
 <script>

  setTimeout(function () {
    window.alert("Please, refresh you browser to see updated results after you see the table!");

    window.history.go(-1);  }, 1000);
  </script>

</head>


<html>
<body onLoad="loaded()">


<?php

 // Make sure an ID was passed
if(isset($_GET['id'])) 
{
    // Get the ID
        $id = intval($_GET['id']);
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) 
		{
            die('The ID is invalid!');

        }
        else 
        {

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "
                UPDATE purchase SET status='Withdraw'
                WHERE `id` = :id";
                $stmt = $conn->prepare($query);
                $stmt->bindValue(":id", $id);
                $stmt->execute();

  }//end try
catch
(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
         }
       
}
else 
{
        echo 'Error! No ID was passed.';
}
$conn = null;
?>



</body>
</html>
