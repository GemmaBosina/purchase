<?php require_once('/home/geo/secure-include/purchase_cred.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <title>UNM: Global Education Office</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="language" content="en-us"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" >

        <!-- Latest compiled and minified JavaScript -->
    <script src="/bootstrap/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.js" ></script>
    <script src="/javascript/sorttable.js"></script>
    <script type="text/javascript">
        <!--
                function removeClassName(elem, className) {
            elem.className = elem.className.replace(className, "").trim();
        }

        function addCSSClass(elem, className) {
            removeClassName(elem, className);
            elem.className = (elem.className + " " + className).trim();
        }

        String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/, "");
        }

        function stripedTable() {
            if (document.getElementById && document.getElementsByTagName) {
                var allTables = document.getElementsByTagName('table');
                if (!allTables) {
                    return;
                }

                for (var i = 0; i < allTables.length; i++) {
                    if (allTables[i].className.match(/[\w\s ]*scrollTable[\w\s ]*/)) {
                        var trs = allTables[i].getElementsByTagName("tr");
                        for (var j = 0; j < trs.length; j++) {
                            removeClassName(trs[j], 'alternateRow');
                            addCSSClass(trs[j], 'normalRow');
                        }
                        for (var k = 0; k < trs.length; k += 2) {
                            removeClassName(trs[k], 'normalRow');
                            addCSSClass(trs[k], 'alternateRow');
                        }
                    }
                }
            }
        }

        window.onload = function () {
            stripedTable();
        }
        -->
    </script>
    <style type="text/css">
<!--
/* Terence Ordona, portal[AT]imaputz[DOT]com         */
        /* http://creativecommons.org/licenses/by-sa/2.0/    */

        /* begin some basic styling here                     */

        table, td, a {
	color: #000;
	font: normal normal 12px Verdana, Geneva, Arial, Helvetica, sans-serif;
}
/* end basic styling                                 */

        /* define height and width of scrollable area. Add 16px to width for scrollbar          */
        div.tableContainer {
	clear: both;
	height: 100%;
	overflow: auto;
	width: 2638px
}
/* Reset overflow value to hidden for all non-IE browsers. */
        html > body div.tableContainer {
	overflow: hidden;
	width: 2638px
}
/* define width of table. IE browsers only                 */
        div.tableContainer table {
	float: left;
	width: 2522px
}
/* define width of table. Add 16px to width for scrollbar.           */
        /* All other non-IE browsers.                                        */
        html > body div.tableContainer table {
	width: 2638px
}
/* set table header to a fixed position. WinIE 6.x only                                       */
        /* In WinIE 6.x, any element with a position property set to relative and is a child of       */
        /* an element that has an overflow property set, the relative value translates into fixed.    */
        /* Ex: parent element DIV with a class of tableContainer has an overflow property set to auto */
        thead.fixedHeader tr {
	position: relative;
}
/* set THEAD element to have block level attributes. All other non-IE browsers            */
        /* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
        html > body thead.fixedHeader tr {
	display: block
}
/* make the TH elements pretty */
        thead.fixedHeader th {
	background: #C10037;
	color: #CCCCCC;
        

	text-align: left;
}
/* make the A elements pretty. makes for nice clickable headers                */
        thead.fixedHeader a, thead.fixedHeader a:link, thead.fixedHeader a:visited {
	color: #FFF;
	display: block;
	text-decoration: none;
}
/* make the A elements pretty. makes for nice clickable headers                */
        /* WARNING: swapping the background on hover may cause problems in WinIE 6.x   */
        thead.fixedHeader a:hover {
	color: #FFF;
	display: block;
	text-decoration: underline;
}
/* define the table content to be scrollable                                              */
        /* set TBODY element to have block level attributes. All other non-IE browsers            */
        /* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
        /* induced side effect is that child TDs no longer accept width: auto                     */
        html > body tbody.scrollContent {
	display: block;
	height: 700px;
	overflow: auto;
}
/* make TD elements pretty. Provide alternating classes for striping the table */
        /* http://www.alistapart.com/articles/zebratables/                             */
        tbody.scrollContent td, tbody.scrollContent tr.normalRow td {
	background: #FFF;
}
tbody.scrollContent tr.alternateRow td {
	background: #EEE;
}
/* define width of TH elements: 1st, 2nd, and 3rd respectively.          */
        /* Add 16px to last TH for scrollbar padding. All other non-IE browsers. */
        /* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors    */
        html > body thead.fixedHeader th {
}
html > body thead.fixedHeader th + th {
}
html > body thead.fixedHeader th + th + th {
}
/* define width of TD elements: 1st, 2nd, and 3rd respectively.          */
        /* All other non-IE browsers.                                            */
        /* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors   */
        html > body tbody.scrollContent td {
}
html > body tbody.scrollContent td + td {
}
html > body tbody.scrollContent td + td + td {
}
-->
</style>

    </head>

<?php

	$status ="%%";
	$supervisor ="";
	$requestor="%%";
        
	
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

<div id="tableContainer" class="tableContainer">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable sortable" style="width:100%">
<thead class="fixedHeader">
           <tr>
					
						  <th  width="72" style="width: 72px;" align="left">Request #</th>
						  <th  width="156" style="width: 156px;" align="left">Status</th>				 
						  <th  width="140" style="width: 140px;" align="left">Change <br/>Status </th> 
						  <th  width="300" style="width: 300px;" align="left">Requestor</th>
						  <th  width="300" style="width: 300px;" align="left">Suprvisor</th>
						  <th  width="140" style="width: 140px;" align="left">Program</th>
						  <th  width="156" style="width: 156px;" align="left">Must be delivered by</th> 
						  <th  width="156" style="width: 156px;" align="left">Form of Purchse</th> 
						  <th  width="300" style="width: 300px;" align="left">Vendor<br/>Info</th>
						  <th  width="300" style="width: 300px;" align="left">Purchase<br/>Purpose</th>
						  <th  width="156" style="width: 156px;" align="left">Purchase<br/>Details</th>
						  <th  width="156" style="width: 156px;" align="left">Comments</th>
                          <th  width="150" style="width: 150px" >Documents</th>
						  <th  width="140" style="width: 140px;" align="left">Submission<br/>Date</th>						
                    </tr></thead>
<tbody class="scrollContent">';
$result = $statement->fetchAll();
foreach ($result as $row) 
{
$id_ident=$row[id];
$name=$row[requestor_name];
 if ($bgcolor_int == 0) {
                echo "
                    <tr height='50' bgcolor='#D1D1D1' style='border-top:1px  '>";
                $bgcolor_int = 1;
            } else {
                echo "
                    <tr height='50' bgcolor='#F0F0F0' style='border-top:1px  '>";
                $bgcolor_int = 0;
            }
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





 echo '                   <td   width="72" style="width: 72px; word-wrap: break-word">'.$row[id].'</td>
						  <td   width="156" style="width: 156px; word-wrap: break-word">'.$row[status].'</td>						 
						  <td   width="140"style="width: 140px; word-wrap: break-word">
							  <a href="complete.php?id='.$row[id].'&requestor_name='.$row[requestor_name].'&requestor_email='.$row[requestor_email].'">Complete</a><br/>
							  <a href="pending.php?id='.$row[id].'">On Hold</a><br/>
							  <a href="withdraw.php?id='.$row[id].'">Withdraw</a><br/>
						  </td> 
						  <td  width="300" style="width: 300px; word-wrap: break-word">'.$row[requestor_name].'</td>
						  <td  width="300" style="width: 300px; word-wrap: break-word">'.$supervisor.'</td>
						  <td  width="140" style="width: 140px; word-wrap: break-word">'.$row[unit].'</td>
						  <td  width="156" style="width: 156px; word-wrap: break-word">'.$row[deliver].'</td> 
						  <td  width="156" style="width: 156px; word-wrap: break-word">'.$row[form_purchase].'</td> 
						  <td  width="300" style="width: 300px; word-wrap: break-word">Vendor: '.wordwrap($row[vendor_name],35,"<br>\n",TRUE).'<br/>Contact: '.wordwrap($row[vendor_contact],35,"<br>\n",TRUE).'<br/>Phone: '.$row[vendor_phone].'<br/> Website: <a style="color: #ba0c2f" href="'.$row[vendor_website].'" data-toggle="tooltip" data-placement="top" title="'.$row[vendor_website].'">Click here</a><br/></td>
						  <td  width="300" style="width: 300px; word-wrap: break-word">'.wordwrap($row[purpose],35,"<br>\n",TRUE).'</td>
						  <td  width="156" style="width: 156px; word-wrap: break-word">
                                                    <button type="button" class="btn" data-toggle="modal" data-target="#'.$row[id].'details">Purchase Details</button>
			    <div class="modal fade bs-example-modal-lg" id="'.$row[id].'details" tabindex="100" role="dialog" aria-labelledby="myLargeModalLabel">
			      <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content" style="padding: 3%">
				  '.$description.'				<div>
		    	      </div>
			    </div>
						  </td>
						  <td  width="156" style="width: 156px; word-wrap: break-word">
                                                    <button type="button" class="btn" data-toggle="modal" data-target="#'.$row[id].'comments">Comments</button>
			    <div class="modal fade bs-example-modal-lg" id="'.$row[id].'comments" tabindex="100" role="dialog" aria-labelledby="myLargeModalLabel">
			      <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content" style="padding: 3%">
				  '.nl2br($row[comments]).'				<div>
		    	      </div>
			    </div>
						  </td>
                        <td width="150" width="150px" style="width: 150px">';
			//documents
			$file_p1 = '/home/geo/purchase_files/' . $id_ident.'/document';
			    $matching = glob($file_p1 . ".*");			
			    $info = pathinfo($matching[0]);
			    $ext_p1 = $info['extension'];		    						
			$docFile_name=$id_ident.'/document.'.$ext_p1;						
			if($ext_p1 !='')
				{
				?>
				<a href='document.php?name=<?php echo $docFile_name ?>'>attached document</a>
				<?php						
				}
			    
	echo '		</td>


						<td  width="140" style="width: 140px; word-wrap: break-word">'.$row[date_submission].'</td>

      ';

}//end for each for table body


echo '</tbody>
</table>
</div>';

    }


}
    $conn = null;
}//end try
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

	

?>
</body>
</html>
