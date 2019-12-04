<!DOCTYPE=html>
<html>
<head>
	<title>DocInfo </title>
  <link rel="stylesheet" href="FormattingDesign.css">
</head>

<body>
<br>
<h1> Specific Doctor Information</h1>

<?php

	include "connecttodb.php";

	$SelectedDoctor=$_POST["DocTORS"];

  //Get the information about the specific doctor
	$query = 'SELECT doctor.*, hospital.name, hospital.city  FROM doctor INNER JOIN hospital ON workoutof =code WHERE license="' . $SelectedDoctor .'";';
	$result=mysqli_query($connection, $query);


	if (!$result){
		die("query for specific doctor information failed");
	}


//Printing all the doctor information
	while ($row=mysqli_fetch_assoc($result)){
		echo "<br>Doctor Name: " . $row["firstname"] . " " . $row["lastname"] ."<br><br>Speciality: " . $row["specialty"] . "<br><br>License Number: ". $row["license"] . "<br><br>License Date: " .$row["licensedate"] . "<br> <br>Hospital works out of: " .  $row["name"]." in ".  $row["city"];
	}


  //Close Connection
	mysqli_free_result($result);
	mysqli_close($connection);
?>


</body>
</html>

