<!DOCTYPE=html>
<html>
<head>
	<title> Patient Information!  </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>

<?php
	include "connecttodb.php";

  //Receive the inputted OHIP number
	$OHIP_NUM=$_POST["OHIP"];

  //Receive the information for the specified patient
	$query = 'SELECT * FROM patient WHERE OHIP="'.$OHIP_NUM.'";';
	$result=mysqli_query($connection, $query);
	

	$row=mysqli_fetch_assoc($result);
	if (!$row){
		die("Error, no patient with such OHIP number exists.");
	}
		
  //Query to get the information about the patient and he/she's treating doctors
	$query2 = 'SELECT patient.firstname as FName, patient.lastname as LName, doctor.firstname, doctor.lastname, doctor.lastname FROM treats INNER JOIN doctor ON treats.license=doctor.license INNER JOIN patient ON patient.OHIP=treats.OHIP WHERE patient.OHIP="'.$OHIP_NUM.'";';


	$result2=mysqli_query($connection, $query2);

	$set ="1";


	while ($row2=mysqli_fetch_assoc($result2))
  {
		if ($set=="1")
    {
			echo "Patient First Name: " . $row["firstname"] . " <br> Patient Last Name: " . $row["lastname"] ."<br> ";
			echo "Being Treated by Doctor " . $row2["firstname"] . " " . $row2["lastname"];

      //Only allow to run once
			$set="2";
		}	
    //Else, if ther is more than one doctor treating the specified patient
		else
    {
			echo " and by Doctor " . $row2["firstname"] . " " . $row2["lastname"]."<br>";
		}
	}

  //Querying for patient that is present in the database but is not being treated
	$query3 = 'SELECT count(doctor.lastname) as x FROM treats INNER JOIN doctor ON treats.license=doctor.license INNER JOIN patient ON patient.OHIP=treats.OHIP WHERE patient.OHIP="'.$OHIP_NUM.'";';

	$result3=mysqli_query($connection, $query3);

	$test=mysqli_fetch_assoc($result3);

  //Output response if patient is not being treated
	if ($test[x]=="0")
  {
		echo "Patient's Name: " . $row["firstname"] . " " . $row["lastname"] ."<br> ";
		echo "The specified patient is not being treated by any doctor.";
	}
	
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($connection);
?>
</body>
</html>



