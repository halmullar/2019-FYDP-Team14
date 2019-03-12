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
				
				Please upload excel file.<br><br>

		
<form
    action="uploadd.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" class="button" value="Upload" name="submit">
</form>

		</div>
	</center>
	</body>

</html>
