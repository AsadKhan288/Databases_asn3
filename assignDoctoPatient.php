<!DOCTYPE=html>
<html>
<head>
	<title> Assign Doctor to Patient </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<h1>Choose the patient and the doctor providing the treatment</h1>
<br>
<h2>Choose the Patient, first: </h2>

<form action="TreatConfirm.php" method="post">
<?php
	include "connecttodb.php";

  //Get the information of the patients
	$query = 'SELECT * FROM patient;';

	$result=mysqli_query($connection, $query);

	if (!$result){
		die("Query has incurred an error");
	}

  //Show all the patients for one to be chosen
	while ($row=mysqli_fetch_assoc($result))
  {
		echo "<input type = 'radio' name='PatName' value='".$row['OHIP']."' > OHIP Number: ". $row['OHIP'] . "<br> Name: " . $row['firstname'] . " " . $row['lastname'] . "<br><br>";
	}
?>
<h2>Choose the Doctor: </h2>
<?php

  //Get the information of the doctors
	$query2 = 'SELECT * FROM doctor;';

	$result2=mysqli_query($connection, $query2);
	if (!$result2){
		die("Query has incurred an error");
	}

  //Show all the doctors for one to be chosen
	while ($row=mysqli_fetch_assoc($result2)){
		echo "<input type = 'radio' name='DoctorName' value='".$row['license']."' > <br> License Number: ". $row['license'] . " <br> Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
	}
?>
<br>
<input type="submit" value="submit"/>
<?php
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_close($connection);
?>

</body>
</html>

