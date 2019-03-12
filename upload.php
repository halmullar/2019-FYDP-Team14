<html>
	
	<head>
		<title>Upload Page</title>
	</head>
	<link rel="stylesheet" href="stylesheets/default.css">

	<body>
	<center>
		<div class="default">
			 <div class = "logout">
	          <table>
	            <th>
	               <a href="index.html"> Menu </a>
	            </th>
	            <th width = 80%></th>
	            <th>
	                <a href="LoginPage.html"> Logout </a>
	            </th>
	          </table>
        	</div>
	        

				<h1>Upload OEE FIle</h1>
				
				Please upload your teams list in a excel file.<br><br>


				<?php
include('./my_connect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $description = "";
                if(isset($Row[1])) {
                    $description = mysqli_real_escape_string($conn,$Row[1]);
                }
                
                if (!empty($name) || !empty($description)) {
                    $query = "INSERT into Table(Date, Shift, Product, Weight, Machine, Cavity, OpeningShot, ClosingShot, OpeningBlow, ClosingBlow, numbags, quantitybags, wip, Purge, cycletime, runninghours, totalshot, totalblow, goodbottles) Values ('" . $toInsert[8] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[11] . "','" . $toInsert[13] ."','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[11]"','" . $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10] .  $toInsert[10]  "','" . $toInsert[10]  "','" . $toInsert[10]  "','" . "')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>

		</div>
	</center>
	</body>

</html>
