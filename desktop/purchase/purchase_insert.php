<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	require_once('/home/geo/secure-include/purchase_cred.php');
	ini_set("include_path", '/home/geo/php:' . ini_get("include_path"));
	require 'Mail.php';
	require 'mime.php';
	require '/home/geo/secure-include/headers_secure.php';
?>


    <?Php 
    $total_purchase1=0;
    $total_purchase=0;
    try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $cat=$_POST['cat'];
      $requestor_email=$_POST['requestor_email'];
      $requestor_phone=$_POST['requestor_phone'];
      $requestor_name='' ;
      $vendor_name=$_POST['vendor_name'];
      $vendor_contact=$_POST['vendor_contact'];
      $vendor_phone=$_POST['vendor_phone'];
      $vendor_website=$_POST['vendor_website'];
      $unit=$_POST['unit'];
      $deliver=$_POST['deliver'];
      if ($deliver == '')
	    {
	      $deliver = 'N/A';
	    }
      $form_purchase=$_POST['form_purchase'];
      $purpose=$_POST['purpose'];     
      $supervisor_name='' ;
      $supervisor_email='';
      $type='';
      $paid_pcard='';
        
/////////////////////////////////pull out info for requestor name, supervisor name, supervisor email, employee type
      $sql = "SELECT * FROM directory WHERE id=:cat";
      $statement = $conn->prepare($sql);
      $statement->bindValue(':cat', $cat);
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
       // Get the row
       $result = $statement->fetchAll();
       foreach ($result as $row) 
			 {
				$requestor_name=$row['name'] ;
				$supervisor_name=$row['supervisor'] ;
				$supervisor_email=$row['supervisor_email'] ;
				$type=$row['type'] ;
			 }
          }
		if ($type=='staff')
		{
		 $status='New';
		}
		else
		{
		 $status='Waiting for Approval';
		}
               if (isset($_POST['paid_pcard']))
               {
                $status='Paid with Card';
               }
                   
        $query = "INSERT INTO purchase (requestor_name, requestor_email, requestor_phone, vendor_name, vendor_contact, vendor_phone, vendor_website, unit, deliver, form_purchase, purpose, status) VALUES (:requestor_name,:requestor_email,:requestor_phone, :vendor_name, :vendor_contact, :vendor_phone, :vendor_website, :unit, :deliver, :form_purchase, :purpose, :status)";
           
            $statement = $conn->prepare($query);
            $statement->bindValue(':requestor_name', $requestor_name);
            $statement->bindValue(':requestor_email', $requestor_email );	
            $statement->bindValue(':requestor_phone', $requestor_phone );
            $statement->bindValue(':vendor_name', $vendor_name );
            $statement->bindValue(':vendor_contact', $vendor_contact );
            $statement->bindValue(':vendor_phone', $vendor_phone );
            $statement->bindValue(':vendor_website', $vendor_website );
            $statement->bindValue(':unit', $unit);
            $statement->bindValue(':deliver', $deliver);
            $statement->bindValue(':form_purchase', $form_purchase);
            $statement->bindValue(':purpose', $purpose);
            $statement->bindValue(':status', $status);		
            $statement ->execute();    
    }//end try
    catch (PDOException $e) 
	{
      //echo "Error: " . $e->getMessage();
    }
////////////////////////////////end -- pull out info for requestor name, supervisor name, supervisor email, employee type  

////////////////////////////////pull out info for id_ident for purchase description  
    try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  $id_ident='';
      /////////////////////////////////pull out info for requestor name
      $quer_food = "SELECT id FROM purchase order by id desc limit 1";
      $statement = $conn->prepare($quer_food );
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
		// Get the row
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
          $id_ident=$row['id'] ;                                         
    
        }
	   }
////////////////////////////////end -- pull out info for id_ident for purchase description  

////////////////////////////////insert information in purchase description - food 
     $category_food='';
     $total_food=0;
     if (isset($_POST['food']))
     {
      $category='Food';
      $category_food='Food';
      $index_food=0;
    
      for ($x = 0; $x <= count($_POST['Foodname']); $x++)
      {
       $index_food=$x;
       $description=$_POST['Foodname'][$x];
       $description_food[$index_food]=$description;
       $price=$_POST['FoodUP'][$x];
       $extension=$_POST['FoodE'][$x];
       $total=$price*$extension;
       $total_food= $total_food+$total;  
       $query_insert = "INSERT INTO purchase_description (id_ident, category, description, price, extension, total ) VALUES (:id_ident, :category, :description, :price, :extension, :total )";
       $statement = $conn->prepare($query_insert );
       $statement->bindValue(':id_ident', $id_ident);
       $statement->bindValue(':category', $category);
       $statement->bindValue(':description', $description);
       $statement->bindValue(':price', $price);
       $statement->bindValue(':extension', $extension);
       $statement->bindValue(':total', $total);			
       $statement ->execute();
      } 
     }
    }//end try
    catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
 try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  $id_ident='';
      /////////////////////////////////pull out info for requestor name
      $quer_food = "SELECT id FROM purchase order by id desc limit 1";
      $statement = $conn->prepare($quer_food );
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
		// Get the row
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
          $id_ident=$row['id'] ;                                         
    
        }
	   }

    //////////////////////////////////////////for it supplies
    $category_IT='';
    $total_IT=0;
	if (isset($_POST['it']))
     {
      $category='IT Supplies';
      $category_IT='IT Supplies';
      $index_IT=0;
    
    
      for ($x = 0; $x <= count($_POST['ITname']); $x++)
      {
       $description=$_POST['ITname'][$x];
       $price=$_POST['ITUP'][$x];
       $extension=$_POST['ITE'][$x];
       $total=$price*$extension;
       $total_IT= $total_IT+$total;    
       $query_insert = "
                INSERT INTO purchase_description (id_ident, category, description, price, extension, total )
                VALUES (:id_ident, :category, :description, :price, :extension, :total )";
           
                    $statement = $conn->prepare($query_insert );
                    $statement->bindValue(':id_ident', $id_ident);
                    $statement->bindValue(':category', $category);
                    $statement->bindValue(':description', $description);
                    $statement->bindValue(':price', $price);
                    $statement->bindValue(':extension', $extension);
                    $statement->bindValue(':total', $total);			
                    $statement ->execute();
    
    
      } $total_purchase1=$total_purchase1+$total_IT;
     }
      }//end try
    catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
 try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  $id_ident='';
      /////////////////////////////////pull out info for requestor name
      $quer_food = "SELECT id FROM purchase order by id desc limit 1";
      $statement = $conn->prepare($quer_food );
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
		// Get the row
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
          $id_ident=$row['id'] ;                                         
    
        }
	   }

    //////////////////////////////////end it supplies   
    //////////////////////////////////////////for office supplies
    $category_Office='';
    $total_office=0;
	if (isset($_POST['office']))
     {
      $category='Office Supplies';
      $category_office='Office Supplies';
      $index_office=0;
    
    
      for ($x = 0; $x <= count($_POST['Officename']); $x++)
      {
       $description=$_POST['Officename'][$x];
       $price=$_POST['OfficeUP'][$x];
       $extension=$_POST['OfficeE'][$x];
       $total=$price*$extension;
       $total_office= $total_office+$total;
    
       $query_insert = "
                INSERT INTO purchase_description (id_ident, category, description, price, extension, total )
                VALUES (:id_ident, :category, :description, :price, :extension, :total )";
           
                    $statement = $conn->prepare($query_insert );
                    $statement->bindValue(':id_ident', $id_ident);
                    $statement->bindValue(':category', $category);
                    $statement->bindValue(':description', $description);
                    $statement->bindValue(':price', $price);
                    $statement->bindValue(':extension', $extension);
                    $statement->bindValue(':total', $total);			
                    $statement ->execute();
    
    
      } 
     }
    //////////////////////////////////end office supplies
     }//end try
    catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
 try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  $id_ident='';
      /////////////////////////////////pull out info for requestor name
      $quer_food = "SELECT id FROM purchase order by id desc limit 1";
      $statement = $conn->prepare($quer_food );
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
		// Get the row
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
          $id_ident=$row['id'] ;                                         
    
        }
	   }

   //////////////////////////////////////////for Travel
    $category_Travel='';
    $total_travel=0;    
    if (isset($_POST['travel']) && $requestor_name!='Nicole TAMI')
     {
      $status='Waiting for Approval';
      $category='Travel';
      $category_travel='Travel';
      $index_travel=0;
      
      for ($x = 0; $x <= count($_POST['Travelname']); $x++)
      {
       
      if ($_POST['Travelname'][$x]!='')
      {
       $description1=$_POST['TravelE'][$x];	  
       $description2=$_POST['Travelname'][$x];
       
       $date1=$_POST['Travel1UP'][$x];
       $date2=$_POST['Travel2UP'][$x];
       $extension=0;
       $description= $description2. ": " .$description1. ", ". $date1 . " - ". $date2 ;
       $price=0;
       $total=$_POST['Travelcost'][$x];
       $total_travel= $total_travel+$total;
      
    
       $query_insert = "
                INSERT INTO purchase_description (id_ident, category, description, price, extension, total )
                VALUES (:id_ident, :category, :description, :price, :extension, :total )";
           
               	    $statement = $conn->prepare($query_insert );
                    $statement->bindValue(':id_ident', $id_ident);
                    $statement->bindValue(':category', $category);
                    $statement->bindValue(':description', $description);
                    $statement->bindValue(':price', $price);
                    $statement->bindValue(':extension', $extension);
                    $statement->bindValue(':total', $total);			
                    $statement ->execute();    
       }       
      } 
     }
    
    //////////////////////////////////end Travel
     }//end try
    catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
 try 
	{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	  $id_ident='';
      /////////////////////////////////pull out info for requestor name
      $quer_food = "SELECT id FROM purchase order by id desc limit 1";
      $statement = $conn->prepare($quer_food );
      $statement ->execute();
      if ($statement->rowCount() >= 0) 
	  {
		// Get the row
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
          $id_ident=$row['id'] ;                                         
    
        }
	   }

    //////////////////////////////////////////for Rentals
     $category_Rentals='';
    $total_rentals=0;
        if (isset($_POST['rentals']))
     {
      $category='Rentals';
      $category_rentals='Rentals';
      $index_rentals=0;
    
      for ($x = 0; $x <= count($_POST['Rentalsname']); $x++)
      {
       $description=$_POST['Rentalsname'][$x];
       $price=$_POST['RentalsUP'][$x];
       $extension=$_POST['RentalsE'][$x];
       $total=$price*$extension;
       $total_rentals= $total_rentals+$total;
    
       $query_insert = "
                INSERT INTO purchase_description (id_ident, category, description, price, extension, total )
                VALUES (:id_ident, :category, :description, :price, :extension, :total )";
           
                    $statement = $conn->prepare($query_insert );
                    $statement->bindValue(':id_ident', $id_ident);
                    $statement->bindValue(':category', $category);
                    $statement->bindValue(':description', $description);
                    $statement->bindValue(':price', $price);
                    $statement->bindValue(':extension', $extension);
                    $statement->bindValue(':total', $total);			
                    $statement ->execute();
    
    
      }       
     } 
     }
       catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
 try 
{
   //////////////////////////////////////////for Other
    $category_Other='';
    $total_other=0;
    if (isset($_POST['other']))
     {
      $category='Other';
      $category_other='Other';
      $index_other=0;
    
      for ($x = 0; $x <= count($_POST['Othername']); $x++)
      {
       $description=$_POST['Othername'][$x];
       $price=$_POST['OtherUP'][$x];
       $extension=$_POST['OtherE'][$x];
       $total=$price*$extension;
       $total_other= $total_other+$total;
       $query_insert = "
                INSERT INTO purchase_description (id_ident, category, description, price, extension, total )
                VALUES (:id_ident, :category, :description, :price, :extension, :total )";
           
                    $statement = $conn->prepare($query_insert);
                    $statement->bindValue(':id_ident', $id_ident);
                    $statement->bindValue(':category', $category);
                    $statement->bindValue(':description', $description);
                    $statement->bindValue(':price', $price);
                    $statement->bindValue(':extension', $extension);
                    $statement->bindValue(':total', $total);			
                    $statement ->execute();
      } 
     }
    //////////////////////////////////end other
    }//end try
    catch (PDOException $e) {
      //echo "Error: " . $e->getMessage();
    }
    //////////////////////////check total purchase for approval
    $total_purchase1=$total_food +$total_IT +$total_office  +$total_travel+$total_rentals+$total_other;
    //enter information if staff request needs approval for purchases > $1000 and travels
    if ($total_purchase1>1000 && $requestor_name!='Nicole TAMI')
    {
    $status='Waiting for Approval';
    }
    if($status=='Waiting for Approval')
    {	try 
            {
         		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          		$query_update = "Update purchase set status=:status where id=:id ";       
                $statement_update  = $conn->prepare($query_update );
                $statement_update ->bindValue(':status', $status);
                $statement_update ->bindValue(':id', $id_ident);                			
                $statement_update  ->execute();
        	}//end try
        catch (PDOException $e) 
			{
            //echo "Error: " . $e->getMessage();
            }
    
    
     }//end enter information if staff request needs approval for purchases > $1000 and travels
     try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ///////////////////create dir to upload files//////////////////////
    exec (mkdir("/home/geo/purchase_files/".$id_ident));
    $target_dir = "/home/geo/purchase_files/".$id_ident."/";
    
    ///////////////////end ----------   create dir to upload files//////////////////////
    //////////////////upload passport/////////////////////////////////////
    $docFile_name = $_FILES['docFile']['name'];
    $target_file = $target_dir ."document.".pathinfo($docFile_name, PATHINFO_EXTENSION);
    if( $docFile_name!='')//check if the file was attemped to upload
	{
		if (move_uploaded_file($_FILES["docFile"]["tmp_name"], $target_file)) 
		{
			   echo "The file ". basename( $_FILES["docFile"]["name"]). " has been uploaded.<br/>";      
		} 
		else 
		{
			  echo "Sorry, there was an error uploading your".$docFile_name ." file. Please, go back and try to re-load the file";
			 
		}
	}//end --check if the file was attemped to upload
    //////////////////end --------- upload passport/////////////////////////////////////
    
    
    }//end try
    catch (PDOException $e) 
	{
      //echo "Error: " . $e->getMessage();
    }
    //////////////////////////////////end other
    /////////send e-mails//////////////////////
    $text = 'Please, switch to html version';
    $html_main=
            '    
         <h4>Dear Nicole TAMI,</h4>
         <p>You recieved this email, because request '.$id_ident.' submitted by 
        '.$requestor_name.':</p>
          <hr/>
         <h5>REQUESTOR INFO</h5>
         Requestor Name: <label>'.$requestor_name.'</label> <br/>
         Requestor Email: <label>'.$requestor_email.'</label>
         <h5>PROGRAM/DIVISION INFO</h5>
         Name: <label>'.$unit.'</label> <br/>
         Must be delivered by: <label>'.$deliver.'</label> <br/>
         Form of Purchse: <label>'.$form_purchase.'</label>
         <h5>VENDOR INFO</h5>
         Name: <label>'.$vendor_name.'</label>	
         <h5>TRAVEL INFO</h5>
         <strong>Purpose/Justification:</strong> <label>'.$purpose.'</label> <br/><br/>
         <strong>Travel Description:</strong><br/>
           ' ;
    
    $html = 
    '<html>
        <body>
        <form  method=post name="f1" action="" enctype="multipart/form-data" >';
        if($status=='Waiting for Approval')
            {
               $html .=   '<h4>Dear '.$supervisor_name. ',</h4> 
               <p>You recieved this email, because request #'.$id_ident.' submitted by 
               '.$requestor_name.':</p>';
        
            }
            $html .=  '<div style="background-color: #eeeeee; padding: 5px">
         <h5>REQUESTOR INFO</h5>
         Requestor Name: <label>'.$requestor_name.'</label> <br/>
         Requestor Email: <label>'.$requestor_email.'</label>
          <hr/>
         <h5>PROGRAM/DIVISION INFO</h5>
         Name: <label>'.$unit.'</label> <br/>
         Must be delivered by: <label>'.$deliver.'</label> <br/>
         Form of Purchse: <label>'.$form_purchase.'</label>
          <hr/>
         <h5>VENDOR INFO</h5>
         Name: <label>'.$vendor_name.'</label>	 <hr/>
         <h5>PURCHASE INFO</h5>
         <strong>Purpose/Justification:</strong> <label>'.$purpose.'</label> <br/><br/>
         <strong>Purchase Details:</strong><br/><br/>';
         $id=$id_ident;
         if($category_food=='Food')
         {
            $html .=  '<strong>'.$category_food.'</strong></br>';
             for ($index_food = 0; $index_food <= count($_POST['Foodname'])-1; $index_food ++)
              {
              if($_POST['Foodname'][$index_food])
              {
               $html .= $_POST['Foodname'][$index_food ].' | price per unit: '.$_POST['FoodUP'][$index_food ].' | # of units: '.$_POST['FoodE'][$index_food ].' | Total: $'.$_POST['FoodUP'][$index_food ]*$_POST['FoodE'][$index_food].'</br>';
               $total_purchase=$total_purchase+$_POST['FoodUP'][$index_food ]*$_POST['FoodE'][$index_food];
               }
               }
         }
         if($category_IT=='IT Supplies')
         {
            $html .=  '<strong>'.$category_IT.'</strong></br>';
             for ($index_IT = 0; $index_IT <= count($_POST['ITname'])-1; $index_IT ++)
              {
              if($_POST['ITname'][$index_IT])
              {
               $html .= $_POST['ITname'][$index_IT].' | price per unit: '.$_POST['ITUP'][$index_IT].' | # of units: '.$_POST['ITE'][$index_IT].' | Total: $'.$_POST['ITUP'][$index_IT ]*$_POST['ITE'][$index_IT].'</br>';
               $total_purchase=$total_purchase+$_POST['ITUP'][$index_IT ]*$_POST['ITE'][$index_IT];
               }
               }
         }
        
        if($category_office=='Office Supplies')
             {
                $html .=  '<strong>'.$category_office.'</strong></br>';
                 for ($index_office = 0; $index_office <= count($_POST['Officename'])-1; $index_office ++)
                  {
                  if($_POST['Officename'][$index_office])
                  {
                   $html .= $_POST['Officename'][$index_office ].' | price per unit: '.$_POST['OfficeUP'][$index_office ].' | # of units: '.$_POST['OfficeE'][$index_office ].' | Total: $'.$_POST['OfficeUP'][$index_office ]*$_POST['OfficeE'][$index_office].'</br>';
                   $total_purchase=$total_purchase+$_POST['OfficeUP'][$index_office ]*$_POST['OfficeE'][$index_office];
                   }
                   }
             }
        if($category_travel=='Travel')
         {
                  
                    
            $html .=  '<strong>'.$category_travel.'</strong></br>';
             for ($index_travel = 0; $index_travel <= count($_POST['Travelname'])-1; $index_travel ++)
              {
              if($_POST['Travelname'][$index_travel])
              {
               $html .= $_POST['Travelname'][$index_travel ].' | purpose: '.$_POST['TravelE'][$index_travel ].' | dates: '.$_POST['Travel1UP'][$index_travel ].' - '.$_POST['Travel2UP'][$index_travel ].'| Estimated Cost: $'.$_POST['Travelcost'][$index_travel ].'</br>';
    
                       $html_main .= $_POST['Travelname'][$index_travel ].' | purpose: '.$_POST['TravelE'][$index_travel ].' | dates: '.$_POST['Travel1UP'][$index_travel ].' - '.$_POST['Travel2UP'][$index_travel ].'| Estimated Cost: $'.$_POST['Travelcost'][$index_travel ].'</br> <hr/> <p> requires your approval</p>';
    
    
    
               $total_purchase=$total_purchase+$_POST['Travelcost'][$index_travel];
               }
               }
                     
         }
    
            if($category_rentals=='Rentals')
         {
            $html .=  '<strong>'.$category_rentals.'</strong></br>';
             for ($index_rentals = 0; $index_rentals <= count($_POST['Rentalsname'])-1; $index_rentals ++)
              {
              if($_POST['Rentalsname'][$index_rentals])
              {
               $html .= $_POST['Rentalsname'][$index_rentals ].' | price per unit: '.$_POST['RentalsUP'][$index_rentals ].' | # of units: '.$_POST['RentalsE'][$index_rentals ].' | Total: $'.$_POST['RentalsUP'][$index_rentals ]*$_POST['RentalsE'][$index_rentals].'</br>';
               $total_purchase=$total_purchase+$_POST['RentalsUP'][$index_rentals ]*$_POST['RentalsE'][$index_rentals];
               }
               }
         }
    
    if($category_other=='Other')
         {
            $html .=  '<strong>'.$category_other.'</strong></br>';
             for ($index_other = 0; $index_other <= count($_POST['Othername'])-1; $index_other ++)
              {
              if($_POST['Othername'][$index_other])
              {
               $html .= $_POST['Othername'][$index_other].' | price per unit: '.$_POST['OtherUP'][$index_other].' | # of units: '.$_POST['OtherE'][$index_other].' | Total: $'.$_POST['OtherUP'][$index_other]*$_POST['OtherE'][$index_other].'</br>';
               $total_purchase=$total_purchase+$_POST['OtherUP'][$index_other]*$_POST['OtherE'][$index_other];
               }
               }
         }
         
    $html .= ' <br/><strong>Total:</strong> $'.$total_purchase.'</div>';
    ////text to send to requestor
    $html_requestor=strstr($html,'<div style="background-color: #eeeeee;');
    /////required approval////////////////////
      
    

    if($total_purchase1>1000 ||  $status=='Waiting for Approval')
    {
        
        $html .= '<p> requires your approval</p>';
	    /////require executive director approval////////////////////
	    if($category_travel=='Travel' && $supervisor_name !='Nicole TAMI')
	    {
	    
	     $html .= '<a style="background-color:green; font-weight:bold;  border: solid 10px green; color:white; text-decoration:none" href="https://geo-apply.unm.edu/HR/purchase/approve_yes_travel.php?id='.$id.'&requestor_name='.$requestor_name.'&requestor_email='.$requestor_email.'&html_main='.$html_main.'" >APPROVE</a>&nbsp;&nbsp;';   
	     
	    }
	    
	    /////end require executive director approval////////////////////
	    else
	    {
	    
	     $html .= '<a  style="background-color:green; font-weight:bold;  border: solid 10px green; color:white; text-decoration:none" href="https://geo-apply.unm.edu/HR/purchase/approve_yes.php?id='.$id.'&requestor_name='.$requestor_name.'&requestor_email='.$requestor_email.'" >APPROVE</a>&nbsp;&nbsp;';
	    
	    }
	    $html .= '<a style="background-color:red; font-weight:bold; border: solid 10px red; color:white; text-decoration:none" href="https://geo-apply.unm.edu/HR/purchase/approve_no.php?id='.$id.'&requestor_email='.$requestor_email.'&requestor_name='.$requestor_name.'" >DISAPPROVE</a>';
    	$email=$supervisor_email; 
    }/////END required approval SECTION////////////////////
    else
    {
     $email='rflores4@unm.edu';
    }
            $html .= '
            <input type="hidden" name="category" id="category" value="'.$category_travel.'" /> 
            <input type="hidden" name="requestor_email" id="requestor_email" value="'.$requestor_email.'" />
            <input type="hidden" name="requestor_name" id="requestor_name" value="'.$requestor_name.'" />
            <input type="hidden" name="supervisor_name" id="supervisor_name" value="'.$supervisor_name.'" />
            <input type="hidden" name="supervisor_email" id="supervisor_email" value="'.$supervisor_email.'" />
            <input type="hidden" name="html_main" id="html_main" value="'.$html_main.'" />';
          
     
    
    echo' </form>
    </body>
    </html>';
    
    
    $hdrs = array(
                  'From'    => 'geo@unm.edu',
                  'Subject' => 'New Request #'.$id_ident.' MUST BE DELIVERED BY: '.$deliver,
                  'host'    =>'smtp.office365.com',
                  'cc'      =>'rflores4@unm.edu'
                  );
    
    
    $mime = new Mail_mime(array('eol' => $crlf));
    
    $mime->setTXTBody($text);
    $mime->setHTMLBody($html);
    
    
    $body = $mime->get();
    $hdrs = $mime->headers($hdrs);
    
    $mail =& Mail::factory('mail');
    $mail->send($email, $hdrs, $body);//change for $email
    
    
    /////////end send e-mails///////////////////////////required approval////////////////////
    ////////send email to requestor/////////////////////////////////////////////////////////
    $hdrs_requestor = array(
                  'From'    => 'geo@unm.edu',
                  'Subject' => 'You Submitted New Request #'.$id_ident.' MUST BE DELIVERED BY: '.$deliver,
                  'host'    =>'smtp.office365.com',
                 );
    $mime_requestor = new Mail_mime(array('eol' => $crlf));
    
    $mime_requestor->setTXTBody($text);
    $mime_requestor->setHTMLBody($html_requestor);
    
    
    $body_requestor = $mime_requestor->get();
    $hdrs_requestor = $mime_requestor->headers($hdrs_requestor);
    
    $mail_requestor =& Mail::factory('mail');
    $mail_requestor->send($requestor_email, $hdrs_requestor, $body_requestor);//change for $email
    ////////end send email to requestor///////////////////////////////////////////////////////// 
    ?>
    <div><img src="/images/celac-logo.png"/></div>
    <div>
    <?php
    
    echo "Dear ".$requestor_name." your request # ".$id_ident." was submitted. Please, keep this number for your future references.";
    ?>
    </div>
    <script>
    
    
      setTimeout(function () {
        window.location.href = "https://geo-apply.unm.edu/HR/purchase/request_form.php"
      }, 7000);
      </script>
    
</body>
</html>