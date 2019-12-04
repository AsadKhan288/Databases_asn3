<!DOCTYPE=html>
<html>
<head>
	<title> Hospital Name Change</title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>

<body>
<?php

  //Hospital to have it's name changed
	$HosCode = $_POST["HospN"];

  //updated hospital name
	$HosName = $_POST["newHosName"];


  //If input is empty, output appropriate response
	if($HosCode=="" || $HosName=="")
  {
		die("Input incurred an Error, complete required fields.");
	}
	include "connecttodb.php";

  //Update the hospital Name
	$query = 'UPDATE hospital SET name="'.$HosName.'" WHERE code="'.$HosCode.'";';

	$result=mysqli_query($connection, $query);
	
	echo "Hospital Name has been Updated";

	mysqli_close($connection);


?>	

</body>
</html>

