<!DOCTYPE=html>
<html>
<head>
	<title> End Treatment Confirm  </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<?php
  
  //The chosen Doctor to stop treatment
	$Doc_Tor=$_POST["DocName"];

  //The chosen Patient to stop having treatment from specified Doctor
	$Pat_Ient=$_POST["PatientName"];

  //If Input is empty, do not process query
	if($Doc=="" || $Patient==""){
		die("Input was incomplete");
	}
	include "connecttodb.php";

  //End treatment of patient by doctor in database
	$query = 'DELETE FROM treats WHERE license="'.$Doc_Tor.'" AND OHIP = "'.$Pat_Ient.'";';

	mysqli_query($connection, $query);
  
	echo "Patient is no longer being treated by the chosen Doctor";


	mysqli_close($connection);
?>

</body>
</html>

