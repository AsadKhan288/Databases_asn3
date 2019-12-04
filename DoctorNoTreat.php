<!DOCTYPE=html>
<html>
<head>
	<title> Doctors not treating </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<h1> Patient-Less Doctors</h1>

<i><h2>'list of the doctors not treating any patients'</h2></i>

<br>
<?php
	include "connecttodb.php";

  //Get all the doctors from the database not treating any patients
	$query = 'SELECT * FROM doctor WHERE license NOT IN (SELECT license FROM treats);';

	$result=mysqli_query($connection, $query);


	if (!$result)
  {
		die("database query failed");
	}

  //Output the First Name And Last name of the patient-less Doctors
	while ($row=mysqli_fetch_assoc($result))
  {
		echo "First Name: " . $row["firstname"] . "<br> Last Name: " . $row["lastname"]."<br><br>";
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>

</body>
</html>


