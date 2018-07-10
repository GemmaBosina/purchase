<?php require_once('/home/geo/secure-include/purchase_cred.php'); ?>
<?php
   header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=spreadsheet.xls");


	$status ="%%";
	$supervisor ="";
	$requestor="%%";
    $bgcolor_int = 0;    
	$new_request_old=0;
	 if($_POST['status'] == "")
	  {    
			  
		  $status = "%%" ; 
	  }
	   else
	  {
		   $status = $_POST['status'];
	  }
	 //change this code then change//
	 
	 if($_POST['supervisor'] == "")
	  {    
			  
		  $supervisor = "%%" ; 
	  }
	   else
	  {
		   $supervisor = $_POST['supervisor'];
	  }
	 
	 ////////////////////////////////////////////////////////////////////////////////
	 if($_POST['requestor'] == "")
	  {    
			  
		  $requestor = "%%" ; 
	  }
	   else
	  {
		   $requestor = $_POST['requestor'];
	  }


 //time frame
if($_POST['from_y'] == "all")
{$time1="0000-00-00";
}
else
{
$time1 = $_POST['from_y']."-".$_POST['from_m']."-".$_POST['from_d']."-"; } 
if($_POST['to_y'] == "all")
{$time2="3000-12-31";
}
else
{
$time2 = $_POST['to_y']."-".$_POST['to_m']."-".$_POST['to_d']."-";    
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "SELECT * FROM purchase where (status LIKE :status and requestor_name LIKE :requestor and date_submission between :time1 and :time2 ) ";

    $statement = $conn->prepare($sql); 
    $statement->bindValue(':status', $status);
    $statement->bindValue(':requestor', $requestor);
    $statement->bindValue(':time1', $time1);
    $statement->bindValue(':time2', $time2);

    $statement->execute();


   

    // Check if it was successfull
    if ($statement->rowCount() > 0) {

        // Make sure there are some files in there
        if ($statement->rowCount() == 0) {

        echo '<p>There are no files in the database</p>';
    } else {

        // Print the top of a table
       
        echo '

<table border="0" cellpadding="0" cellspacing="0" width="100%"  style="width:100%">
<thead >
           <tr height="50" >
					
						  <th  align="left">Request #</th>
						  <th align="left">Status</th>				 
						  <th align="left">Requestor</th>
						  <th  align="left">Suprvisor</th>
						  <th  align="left">Program</th>
						  <th align="left">Must be delivered by</th> 
						  <th  align="left">Form of Purchse</th> 
						  <th  align="left">Vendor Name</th>
						  <th  align="left">Vendor Contact</th>
						  <th  align="left">Vendor Phone</th>
						  <th  align="left">Vendor Website</th>
						  <th align="left">Purpose</th>
						  <th  align="left">Category</th>
						  <th  align="left">Description</th>
						  <th  align="left">Price/Unit</th>
                          <th  align="left">Units</th>
						  <th  align="left">Total</th>
						  <th  align="left">Comments</th>
                          <th  >Documents</th>
						  <th  align="left">Submission Date</th>						
                    </tr></thead>
<tbody >';
$result = $statement->fetchAll();

foreach ($result as $row) 
{
$id_ident=$row[id];
$name=$row[requestor_name];
 
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
     
    
   
//////////////end sql select data from details
///////////////sql select data from directory
    $sql_directory = 'SELECT * FROM directory where name=:name';

    $statement_directory = $conn->prepare($sql_directory);
    $statement_directory->bindValue(":name", $name);   
    $statement_directory->execute();
    $result_directory = $statement_directory->fetchAll();
    foreach ($result_directory as $row_directory) 
    {

    $supervisor=$row_directory[supervisor];
    }
//////////////end sql select data from directory

     $new_request_new=$row[id];
    if ($bgcolor_int == 0 && $new_request_new == $new_request_old) 
            {
                echo "
                    <tr height='50' bgcolor='#F0F0F0' style='border-top:1px  '>";
                $bgcolor_int = 0;
            } 
    elseif ($bgcolor_int == 0 && $new_request_new != $new_request_old)
            {
                echo "
                    <tr height='50' bgcolor='#D1D1D1' style='border-top:1px  '>";
                $new_request_old=$new_request_new;
                $bgcolor_int = 1;
            }
    elseif ($bgcolor_int == 1 && $new_request_new == $new_request_old)
            {
                echo "
                    <tr height='50' bgcolor='#D1D1D1' style='border-top:1px  '>";
                $bgcolor_int = 1;
            }
    elseif ($bgcolor_int == 1 && $new_request_new != $new_request_old)
            {
                echo "
                    <tr height='50' bgcolor='#F0F0F0' style='border-top:1px  '>";
                $new_request_old=$new_request_new;
                $bgcolor_int = 0;
            }


 echo '                  
                          <td align="left" style="word-wrap: break-word">'.$row[id].'</td>
						  <td align="left" style="word-wrap: break-word">'.$row[status].'</td> 
						  <td align="left" style="word-wrap: break-word">'.$row[requestor_name].'</td>
						  <td align="left" style="word-wrap: break-word">'.$supervisor.'</td>
						  <td align="left" style="word-wrap: break-word">'.$row[unit].'</td>
						  <td align="left" style="word-wrap: break-word">'.$row[deliver].'</td> 
						  <td align="left" style="word-wrap: break-word">'.$row[form_purchase].'</td> 
						  <td align="left" style="word-wrap: break-word">'.$row[vendor_name].'</td>
						  <td align="left" style="word-wrap: break-word">'.$row[vendor_contact].'</td>
						  <td align="left" style="word-wrap: break-word">'.$row[vendor_phone].'</td>
						  <td align="left" style="word-wrap: break-word"><a style="color: #ba0c2f" href="'.$row[vendor_website].'" >Click here</a></td>
						  <td align="left" style="word-wrap: break-word">'.$row[purpose].'</td>
						  <td align="left" style="word-wrap: break-word">'.$row_description[category].'</td>
                          <td align="left" style="word-wrap: break-word">'.$row_description[description].'</td>
                          <td align="left" style="word-wrap: break-word">'.$row_description[price].'</td>
                          <td align="left" style="word-wrap: break-word">'.$row_description[extension].'</td>
                          <td align="left" style="word-wrap: break-word">'.$row_description[total].'</td>
                          <td align="left" style="word-wrap: break-word">'.$row[comments].'</td>
						  ';
                       
			//documents
			$file_p1 = '/home/geo/purchase_files/' . $id_ident.'/document';
			    $matching = glob($file_p1 . ".*");			
			    $info = pathinfo($matching[0]);
			    $ext_p1 = $info['extension'];		    						
			$docFile_name=$id_ident.'/document.'.$ext_p1;						
			if($ext_p1 !='')
				{
				?>
				<td><a href='https://geo-apply.unm.edu/HR/purchase/accountant/document.php?name=<?php echo $docFile_name ?>'>attached document</a>
				<?php						
				}
				else
				{
				 ?>
				<td>
				<?php   
				
				}
			    
	echo '		</td>


				<td align="left" style="word-wrap: break-word">'.$row[date_submission].'</td> </tr>

      ';
}
}//end for each for table body


echo '</tbody>
</table>
';

    }


}
    $conn = null;
}//end try
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

	

?>

