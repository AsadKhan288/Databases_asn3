<!DOCTYPE html>
<html>
<head>
<title>Sorted Doctor List</title>
<link rel="stylesheet" href="FormattingDesign.css">

</head>
<body>
<?php
	include"connecttodb.php";
?>

<h1> List of all Doctors </h1>
<br>
<h2> Select a Doctor to learn more about</h2>
<ol>
<?php

  //Inputted choice for sort by first name or last name
	$sort_ing = $_POST["name"];
  //Inputed selection  for order choice (asc or desc)
	$order_ing=$_POST["order"];
	
  //Query using specified sort and order
	$query = 'SELECT * FROM doctor ORDER BY ' .$sort_ing. ' ' .$order_ing.';'; 

  //Test Query
	$result=mysqli_query($connection, $query);
	if (!$result)
  {
		die("Query has incurred an Error");
	}
?>


<!-- Provide the results of the sorting to LearnMoreDoc to allow the user to choose a doctor to learn more about -->
<form action="LearnMoreDoc.php" method="post">

	<?php
	while ($row=mysqli_fetch_assoc($result))
  {
		echo '<input type = "radio" name="DocTORS" value="'.$row["license"].'" > ' . $row["firstname"] . ' ' . $row["lastname"] . '<br>';
	}
	?>

  <br>

	<input type="submit" value="Proceed"/>

</form>
</ol>
<?php
	
	mysqli_free_result($result);
	mysqli_close($connection);
?>

</body>
</html>


