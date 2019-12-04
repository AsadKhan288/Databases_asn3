<!DOCTYPE=html>
<html>
<head>
	<title> Doctors Office </title>
  <link rel="stylesheet" href="FormattingDesign.css">
</head>

<body>
<?php

	include "connecttodb.php";
  //Get the license number that was inputted in previous page

	$LicNumb = $_POST["licensenumber"];

  //Check to see if doctor which is being deleted exists
	$query = 'select count(license) as x from doctor WHERE license="'.$LicNumb.'";';

	$result=mysqli_query($connection, $query);

	$row=mysqli_fetch_assoc($result);

	if ($row["x"]==0)
  {
		die("Doctor to be deleted does NOT exist");
	}

  //Check to see if doctor has any patients he/she is treating 
	$query2 = 'select count(license) as y from treats WHERE license="'.$LicNumb.'";';

	$result2=mysqli_query($connection, $query2);

	$row=mysqli_fetch_assoc($result2);

	if ($row["y"]==0)
  {
		echo "No Patients are being treated by Doctor..still Delete Doctor?.<br>";
		
	}

	else
	{
		echo "This Doctor has patients he/she is treating..still delete Doctor?.<br>";
	}
	?>	

  
  <!-- Confirm delete -->
	<form action="DeleteConfirm.php" method="post">
		<input type="radio" name="Confirm" value="<?php echo $_POST['licensenumber']; ?>" > Yes <br>
		<input type="radio" name="Confirm" value="No" checked="checked"> No <br>
	
		<input type="submit" value="Submit"><br>
	</form>


<?php
	mysqli_free_result($result);
	mysqli_free_result($result2);

	mysqli_close($connection);
?>
</body>
</html>

