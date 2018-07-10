<?php require_once('/home/geo/secure-include/purchase_cred.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>UNM: Global Education Office</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style></style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>



<html>
<body >


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
		                SELECT * from purchase WHERE `id` = :id";
		                $stmt = $conn->prepare($query);
		                $stmt->bindValue(":id", $id);
		                $stmt->execute();
		$result = $stmt->fetchAll();
                foreach ($result as $row) 
                {
                $id_ident=$id;
///////////////sql select data from purchase_description
    $sql_description = 'SELECT * FROM purchase_description where id_ident=:id_ident';

    $statement_description = $conn->prepare($sql_description);
    $statement_description->bindValue(":id_ident", $id_ident);   
    $statement_description->execute();
    $result_description = $statement_description->fetchAll();
    $description="";
    $total=0;
    foreach ($result_description as $row_description) 
    {
     if ($row_description[category]!='Travel')
    { 
     $description=$description."Category: ".$row_description[category]." | Description: ".$row_description[description]." | Price per Unit: ".$row_description[price]." | Extension: ".$row_description[extension]." | <strong>Total: ".$row_description[total]." </strong>  <br/>";
    $total=$total+$row_description[total];
    }
    else
    {
     $description=$description."Category: Travel | Travel Description: ".$row_description[description]." | <strong>Estimated Cost: ".$row_description[total]." </strong>  <br/>";
    $total=$total+$row_description[total];
    }
     
    }
    $description=$description."<strong>Total: ".$total."</strong>";
//////////////end sql select data from details
		  		echo '
                <div><a href="https://geo.unm.edu"><img src="https://geo-apply.unm.edu/images/celac-logo.png" style="width: 25%; height: auto; min-width: 300px"></a></div>
		<div align="left" style="background-color: #c10037; padding: 5px; " class="container-fluid">
  <p style="color: #ffffff; font-size: calc(0.7vmax + 15px); margin: 0px  "><a href="http://celac.unm.edu" style="color: #ffffff; text-decoration: none; font-family: Arial;">ADMINISTRATION FORMS</a></p>
</div>
                <div class="container">
                 <h1 style="color: #777777">Purchase Request Form On-hold</h1>
                  <p> <strong> REQUEST #'.$id_ident.' </strong> <br/>
                  <p> <strong> REQUESTOR INFO </strong> <br/>
                  Requestor Name: '.$row[requestor_name].' <br/>
 		  Requestor Email: '.$row[requestor_email].' <br/>
 		  Requestor Phone: '.$row[requestor_phone].' <br/> 		  	
                  </p>
                  <p><strong>PROGRAM/DIVISION INFO</strong><br/>
                  Name: '.$row[unit].' <br/>
 		  Must be delivered by: '.$row[deliver].' <br/>
 		  Form of Purchse: '.$row[form_purchase].' <br/>
                  </p>
                  <p><strong>VENDOR INFO</strong><br/>
                  Name: '.$row[vendor_name].' <br/>
 		  Contact: '.$row[vendor_contact].' <br/>
 		  Phone: '.$row[vendor_phone].' <br/>
 		  Website: '.$row[vendor_website].' <br/>
                  </p>
                  <p><strong>PURCHASE INFO</strong><br/>
                  Purpose/Justification: <br/>
                  <div style="padding:2%; background-color: #eeeeee">'
                  .$row[purpose].
 		  '</div><br/>
 		  Purchase Details: <br/>
 		  <div style="padding:2%; background-color: #eeeeee">'
 		  .$description.                  
                  '</div></p>
                
                <form action="pending_insert.php" method="post" enctype="multipart/form-data">
  		<p>NEW COMMENTS<br/>
                 <textarea rows="10" cols="50" name="comment" id="comment" value="" ></textarea></p>
                <p>OLD COMMENTS<br/>  <textarea rows="10" cols="50" name="comment_old" id="comment_old" readonly>'.$row[comments].'</textarea></p>
   	        <input type="hidden" name="id" value="'.$id.'">
   	        <input type="hidden" name="name" value="'.$row[requestor_name].'">
                <input type="hidden" name="email" value="'.$row[requestor_email].'">

   	        <input type="submit" value="Submit">
    		<br/>
  		</p>
  				</form></div>';
                }
                }//end try
		catch
		(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}//end catch

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
