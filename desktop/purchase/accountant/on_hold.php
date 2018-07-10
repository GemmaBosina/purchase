<?php require_once('/home/geo/secure-include/exchange_cred.php'); // Database details?>
<?php
	
$lastname="";
    // Make sure an ID was passed
    if(isset($_GET['id'])) {
    // Get the ID
        $id = intval($_GET['id']);
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
       else{
                     
       try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            // Fetch the file information
            $query = "
                SELECT *
                FROM `exchange`
                WHERE `ID` = :id";
           $statement = $conn->prepare($query);
        $statement->bindValue(':id', $id);
        $statement ->execute();
         if ($statement->rowCount() >= 0) {
       
            // Make sure the result is valid
            if ($statement->rowCount() == 1) {
           
                // Get the row
                $result = $statement->fetchAll();
                 foreach ($result as $row) {

     

           $lastname= $row['lastname'];
           $firstname= $row['firstname'];
           $midname= $row['midname'];
           $university_name= $row['university_name'];
           $university_country= $row['university_country'];
           $gender= $row['gender'];
           $date_birth= $row['date_birth'];
           $city_birth= $row['city_birth'];
           $country_birth= $row['country_birth'];
           $country_residence= $row['country_residence']; 
           $phone= $row['phone']; 
           $email= $row['email']; 
           $area_subject= $row['area_subject']; 
           $semester= $row['semester']; 
           $degree= $row['degree']; 
           $previous_unm= $row['previous_unm']; 
           $diploma_date= $row['diploma_date']; 
           $requirement= $row['requirement']; 
           $comments= $row['comments'];             
           }
           }
           }
           }//end try
     catch
    (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
         // Print data
		 
                    echo "<div style='max-width:60%; margin-left: 10%'> <h1>Exchange Program Application</h1>
					
					<div style='margin-left:3%'> <p><p>1. NAME(S) </p>
					<p>    LAST/FAMILY NAME:  ".$row['lastname']."</p> 
					<p>    FIRST/GIVEN NAME:  ".$row['firstname']."</p>
					<p>    MIDDLE NAME:  ".$row['midname']."</p>
					<p><strong>CURRENT UNIVERSITY:</strong> ".$row['university_name']."</p>
					<p><strong>CURRENT UNIVERSITY -- country:</strong>".$row['university_country']."</p>					
					<p>2. GENDER:  ".$row['gender']."</p>
					<p>3. DATE OF BIRTH:  ".$row['date_birth']."</p>
					<p>4. CITY OF BIRTH:  ".$row['city_birth']."</p>
					<p>5. COUNTRY OF BIRTH:  ".$row['country_birth']."</p>
					<p>6. COUNTRY OF CITIZENSHIP:  ".$row['country_citizenship']."</p>
					<p>7. COUNTRY OF OF LEGAL PERMANENT RESIDENCE:  ".$row['country_residence']."</p>
					
					<p>9. PHONE NUMBER:  ".$row['phone']."</p>
					<p>10. EMAIL ADDRESS:  ".$row['email']."</p>
					<p>11. PROPOSED AREA/SUBJECT OF STUDY AT THE UNIVERSITY OF NEW MEXICO:  ".$row['area_subject']."</p>
					<p>12. SEMESTER TO WHICH STUDENT IS APPLYING:  ".$row['semester']."</p>
					<p>13. DEGREE:  ".$row['degree']."</p>
					<p>14. HAS STUDENT PREVIOUSLY APPLIED TO THE UNIVERSITY OF NEW MEXICO?  ".$row['previous_unm']."</p>
					<p>15. EXPECTED GRADUATION DATE IN HOME COUNTRY:  ".$row['diploma_date']."</p>
					<p>16. WHAT MONTH / YEAR DID YOU GRADUATE FROM HIGH SCHOOL?  ".$row['high_school']."</p>
					<p>17. ENGLISH REWQUIREMENTS:  ".$row['requirement']."</p>";
					
					
					

				
					
					
					
	
	  
          echo "<form action='exchange_application_advisor_onhold.php' method='post' enctype='multipart/form-data'>
  <p>ID: &nbsp; &nbsp;".$row['ID']."
 </p>
   <p>NEW COMMENTS<br/>
   <textarea rows='10' cols='50' name='comment' id='comment' value='' ></textarea></p>
  <p>OLD COMMENTS<br/>  <textarea rows='10' cols='50' name='comment_old' id='comment_old' readonly>{$row["comments"]}</textarea></p>
  <br/>
	
	<p>STUDENT NEEDS PROVIDE NEW DOCUMENTS<br/>

    <input type='checkbox' name='english' id='english'  value='english'>Exam or Letter<br/>
      <input type='checkbox' name='transcript' id='transcript'   value='transcript'>Transcript<br/>
       <input type='checkbox' name='passport' id='passport'  value='passport'>Passport<br/>
       <input type='checkbox' name='financial' id='financial'   value='financial'>Financial Documents<br/>
       <input type='checkbox' name='course' id='course'   value='course'>List of Courses<br/> 
	
    <br/>
	 <br/>
	  <br/> <input type='hidden' style='width:0px; height:0px;' id='id' name='id' value='".$row['ID']."' > 
	  <input type='hidden' style='width:0px; height:0px;' id='lastname' name='lastname' value='".$row['lastname']."'> 
	  <input type='hidden' style='width:0px; height:0px;' id='firstname' name='firstname' value='".$row['firstname']."'> 
	  <input type='hidden' style='width:0px; height:0px;' id='email' name='email' value='".$row['email']."'>
	  <input type='hidden' style='width:0px; height:0px;' id='university_name' name='university_name' value='".$row['university_name']."'>
    <input type='submit' value='Submit'>
    <br/>
  </p>
</form>";      }
                     
              
            }


    
