<!DOCTYPE=html>
<html>
<head>
	<title> Delete Confirmation </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>
<body>

<?php
	include "connecttodb.php";
	
  //The inputted confirmation answer (yes or no)
	$confirmation = $_POST["Confirm"];

	if ($confirmation=="No"){
    
		echo "Doctor is not going to be Deleted";
		
	}
  //If confirmed...delete Doctor
	else{
		
		$query3 = 'DELETE FROM doctor WHERE license ="'.$confirmation.'";';

		mysqli_query($connection, $query3);
	
		echo "Doctor has been deleted ";
	}
	mysqli_close($connection);
?>

</body>
</html>

