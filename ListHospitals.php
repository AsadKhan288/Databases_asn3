<!DOCTYPE=html>
<html>
<head>
	<title> Hospital  </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<h1> List of Hospitals </h1>
<ol>
<?php
	include "connecttodb.php";

  //Query to receive the information about each hospital and their head
	$query = 'SELECT hospital.name, hospital.headstartdate, doctor.firstname, doctor.lastname FROM hospital INNER JOIN doctor ON head=license ORDER BY name;';

	$result=mysqli_query($connection, $query);
	if (!$result)
  {
		die("Query has incurred an Error");
	}

  //Output all the Hospitals and their heads and head start dates
	while ($row=mysqli_fetch_assoc($result))
  {
		
		echo "<br><br> Hospital Name: ".$row["name"]."<br>First Name of Head Doctor: " . $row["firstname"] . " <br>Last Name of Head Doctor " . $row["lastname"] ."<br>Start Date of Head Doctor: " . $row["headstartdate"];
	}


	mysqli_free_result($result);
	mysqli_close($connection);
?>


</ol>

</body>
</html>

