<!DOCTYPE=html>
<html>
<head>
	<title> Hospital  </title>
  <link rel="stylesheet" href="FormattingDesign.css">

</head>
<body>

<?php
	include "connecttodb.php";

  //Receive all the infromation about the hospitals from the database
	$query = 'SELECT * FROM hospital;';

	$result=mysqli_query($connection, $query);

	if (!$result)
  {
		die("Query has incurred an Error");
	}
?>

<!--Output all Hospitals too allow user to choose one to change-->
<form action="ConfirmHospitalName.php" method="post">
	<h2> Choose the Hospital Name to Change.</h2>

	<?php
	while ($row=mysqli_fetch_assoc($result))
  {
		echo '<input type = "radio" name="HospN" value="'.$row["code"].'" > Hospital Code: '. $row["code"] . '<br> Hospital Name: ' . $row["name"] . '<br><br>';
	}
	?>

	<h2> Input the updated name of the Hospital.</h2>
	<input type="text" name="newHosName"><br><br>
	<input type="submit" value="Update"/>
</form>


<?php
mysqli_free_result($result);
mysqli_close($connection);
?>


</body>
</html>

