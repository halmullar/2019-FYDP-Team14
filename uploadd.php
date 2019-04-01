<!DOCTYPE html>
<html>
<?php  
$servername = "35.237.124.28";
$username = "root";
$password = "3inawi4e";


// Create connection
$connect = new mysqli($servername, $username, $password);
//if ($connect) {
  //echo 'connected';
//} else {
  //echo 'not connected';
//}

if(isset($_POST["Import"]) && isset($_FILES["fileToUpload"])){

    $filename=$_FILES["fileToUpload"]["tmp_name"];    


     if($_FILES["fileToUpload"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into RawData3(Date, Shift, Product, Weight, Machine, Cavity, Openingshot, Closingshot, Openingblow, Closingblow, numbags, quantitybag, wip, Purge, cycletime, runninghours, DownTime, Reason, totalshot, totalblow, goodbottles, rejectedperform, rejectedbottles, GoodMaterial, WasteMaterial, PlannedProduction, ActualProduction, Performance by Product, QualitybyProduct, availability, OEE)  
                Values ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "','" . $getData[10] . "','" . $getData[11] . "','" . $getData[12] . "','" . $getData[13] . "','" . $getData[14] . "','" . $getData[15] . "','" . $getData[16] . "','" . $getData[17] . "','" . $getData[18] . "','" . $getData[19] . "','" . $getData[20] . "','" . $getData[21] . "','" . $getData[22] . "','" . $getData[23] . "','" . $getData[24] . "','" . $getData[25] . "','" . $getData[26] . "','" . $getData[27] . "','" . $getData[28] . "','" . $getData[29] . "')";
                   $result = mysqli_query($connect,$sql);


        if($result)
        {
          echo "<script type=\"text/javascript\">
            alert(\"Invalid File:Please Upload CSV File.\");
            window.location = \"UploadPage.html\"
          </script>";
           
        }
        else{
          echo "<script type=\"text/javascript\">
              alert(\"CSV File has been successfully Imported.\");
              window.location = \"UploadPage.html\"
              </script>"; 
        }


           }
      
           fclose($file); 
     }
  }  

?> 
</html>

