<!DOCTYPE=html>
<html>
<head>
	<title>Add or Delete Doctor</title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>
<body>

<?php

	include "connecttodb.php";
	$query = 'SELECT * FROM hospital;';

	$result=mysqli_query($connection, $query);
  
	if (!$result)
  {
    //If query fails...
		die("Error in Query");
	}
?>

<!-- Information to add the doctor -->
<h2>Add Doctor</h2>
<form action="DoctorAdd.php" method="post">
	First Name: <br></br> <input type="text" name="firstname"><br><br>
	Last Name: <br></br><input type="text" name="lastname"> <br><br>
  License Num: <br></br><input type="text" name="licensenum"> <br><br>
	Specialty: <br></br><input type="text" name="specialty"><br><br>
	License Date: <br></br> <input type="date" name="licensedate"><br><br>
	Hospital: <br></br>
  <?php

//Force the user to select a hospital 
	while ($row=mysqli_fetch_assoc($result)){
		echo '<input type = "radio" name="hospitalname" value="'.$row["code"].'" > Hospital Code: '. $row["code"] . ' <br> Hospital Name: ' . $row["name"] . '<br><br>';
	}
	?>
  <br></br>
	<input type="submit" value="Submit"/>
</form>
<?php

	mysqli_free_result($result);

	mysqli_close($connection);
?>

<p>
<hr>
<p>


<h2>Delete a Doctor</h2>
<form action="DoctorDelete.php" method="post">

<h3> Input the License Number of the Doctor ?</h3>
	<input type="text" name="licensenumber"><br>
  <br>
	<input type="submit" value="Submit"/>
</form>


<br>
<p>
<hr>
<p>


</body>
</html> 
