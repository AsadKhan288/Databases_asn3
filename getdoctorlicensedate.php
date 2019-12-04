<!DOCTYPE=html>
<html>
<head>
	<title> Licensed Doctors </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>


<?php
	include "connecttodb.php";
?>


<h1> List of licensed doctors before specified date</h1>
<ol>

<?php
	$License_Date = $_POST["licensedate"];//Get the input date 

  //Check to see if input failed
	if (!$License_Date){
		echo "Error in inputting date";
	}

  //query for doctors licensed before input date
	$query2 = 'SELECT * FROM doctor WHERE licensedate < "' . $License_Date . '";';

	$result2=mysqli_query($connection, $query2);

	if (!$result2)
  {
		die("Query has incurred an Error");
	}

	while ($row=mysqli_fetch_assoc($result2))
  {
		echo  "<br><br>Name: " . $row["firstname"] . " " . $row["lastname"] ."<br>Specialization: " .$row["specialty"] ."<br>License Date: " .$row["licensedate"];
	}
	mysqli_free_result($result2);


?>
</ol>
<?php
	mysqli_close($connection);
?>
</body>
</html>

