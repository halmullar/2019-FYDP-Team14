
<?php  
$servername = "localhost";
$username = "root";
$password = "password";

// Create connection
$connect = new mysqli($servername, $username, $password);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
echo "Connected successfully";
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $query = "INSERT into RawData2(ActualProduction, Cavity, Closingblow, Closingshot, Date, DownTime, GoodMaterial, Machine, OEE, Openingblow, Openingshot, Performance by Product, PlannedProduction, Product, Purge, QualitybyProduct, Reason, Shift, WasteMaterial, Weight, availability, cycletime, goodbottles, numbags, qauntitybag, rejectedbottles, rejectedperform, runninghours, totalblow, totalshot, wip) 
                Values ('". $toInsert[8] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] . "','" . $toInsert[2] . "','" . $toInsert[10] . "','" . $toInsert[10] "');
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?> 
