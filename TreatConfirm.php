<!DOCTYPE=html>
<html>
<head>
	<title> Conifrm Treatment </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<form action="TreatConfirm.php" method="post">

<?php
  //Doctor name
	$Doc=$_POST["DoctorName"];
  //Patient to be treated
	$Patient=$_POST["PatName"];

  //Check to see if input was correct
	if($Doc=="" || $Patient==""){
		die("Error in Input");
	}
	include "connecttodb.php";

  //Insert into database the received information
	$query = 'INSERT INTO treats VALUES ("'.$Patient.'", "'.$Doc.'");';
	mysqli_query($connection, $query);


	echo "Patient is being treated by specified doctor";
	mysqli_close($connection);
?>

</body>
</html>

