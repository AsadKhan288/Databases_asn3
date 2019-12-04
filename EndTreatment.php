<!DOCTYPE=html>
<html>
<head>
	<title> End Treatment </title>
  <link rel="stylesheet" href="FormattingDesign.css">
</head>
<body>
<h1> End Treatment of Patient by Doctor </h1>

<h2>Choose the Patient, first: </h2>


<form action="EndTreatmentConfirm.php" method="post">
<?php
	include "connecttodb.php";

  //Get all the information of the patients from the database 
	$query = 'SELECT * FROM patient;';
	$result=mysqli_query($connection, $query);


	if (!$result)
  {
		die("Query has incurred an Error");
	}
  //Provide all the patients for the user to choose one
	while ($row=mysqli_fetch_assoc($result))
  {
		echo "<input type = 'radio' name='PatientName' value='".$row['OHIP']."' > OHIP Number: ". $row['OHIP'] . " <br>FirstName: " . $row['firstname'] . " <br>LastName: " . $row['lastname'] . "<br><br>";
	}

?>
<h2>Choose the Doctor to end the treatment</h2>
<?php

  //Get all the information of the doctors from the database
	$query2 = 'SELECT * FROM doctor;';

	$result2=mysqli_query($connection, $query2);

	if (!$result2)
  {
		die("Query has incurred an Error");
	}
  //Provide all the doctors for the user to choose one to stop the treatment
	while ($row=mysqli_fetch_assoc($result2))
  {
		echo "<input type = 'radio' name='DocName' value='".$row['license']."' > License Number: ". $row['license'] . " <br>FirstName: " . $row['firstname'] . " <br>LastName: " . $row['lastname'] . "<br><br>";
	}
?>
<input type="submit" value="submit"/>
<?php
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_close($connection);
?>

</body>
</html>

