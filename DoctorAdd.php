<!DOCTYPE=html>
<html>
<head>
	<title>DDMS</title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<?php
// Assign information inpputted to add the Doctor
	$F_name =$_POST["firstname"];
	$L_name=$_POST["lastname"];
	$L_num=$_POST["licensenum"];
	$L_date=$_POST["licensedate"];
	$S_pec=$_POST["specialty"];
	$HOSP=$_POST["hospitalname"];


	if($F_name=="" || $L_name=="" || $L_num=="" || $L_date=="" || $S_pec=="" || $HOSP=="")
  {
		die("Missing Information, Please Input ALL the fields");
	}
  
	include "connecttodb.php";

  //Query to check if license number already is in database
	$query = 'select license from doctor;';

	$result=mysqli_query($connection, $query);
	if (!$result)
  {
		die("query has incurred an error");
	}
	while ($row=mysqli_fetch_assoc($result))
  {
		if ($row["license"]=="$L_num"){
			die("License Number Already Exists!");//checking if it already exists
		}
	}	
  //Insert (in correct order) the doctor with the associating information
	$query2 = 'INSERT INTO doctor (firstname, lastname, license, licensedate, specialty, workoutof) VALUES("'.$F_name.'","'.$L_name.'","'.$L_num.'","'.$L_date.'","'.$S_pec.'","'.$HOSP.'");';
	


	mysqli_query($connection, $query2);
	mysqli_free_result($result);
	mysqli_close($connection);
?>

<h1> The Doctor has been added to the database </h1>
</body>
</html>

