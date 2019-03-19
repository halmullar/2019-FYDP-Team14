<?php  
$servername = "35.237.124.28";
$username = "root";
$password = "password";

// Create connection
$connect = new mysqli($servername, $username, $password);
if ($connect) {
  echo 'connected';
} else {
  echo 'not connected';
}

if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    


     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {

             $sql = "INSERT into RawData3(Date, Shift, Product, Weight, Machine, Cavity, Openingshot, Closingshot, Openingblow, Closingblow, numbags, quantitybag, wip, Purge, cycletime, runninghours, DownTime, Reason, totalshot, totalblow, goodbottles, rejectedperform, rejectedbottles, GoodMaterial, WasteMaterial, PlannedProduction, ActualProduction, Performance by Product, QualitybyProduct, availability, OEE)  
                


                Values ("'" . $toInsert[8] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[10] "'");
                mysqli_query($connect, $query);
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";   
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file); 
     }
  }  

?> 
