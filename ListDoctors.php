<!DOCTYPE=html>
<html>
<head>
	<title> List Doctors  </title>
  <link rel="stylesheet" href="FormattingDesign.css">
</head>
<body>

<?php
include 'connecttodb.php';
?>
<br>
<p>
<hr>
<p>
<h2>List all Doctors</h2>

<h3> Sort by: </h3>

<form action="SortedDoctorList.php" method="post" >
	
      
		<input type="radio" value="firstname" name="name">Sort by First Name<br>
		<input type="radio" value="lastname" name="name">Sort by Last Name<br>
	
    <h3> Order by: </h3>
		<input type="radio" value="ASC" name="order">Ascending Order<br>
		<input type="radio" value="DESC"name="order">Decending Order<br>
	
  <br></br>
	<input type="submit" value="View the list of doctors">
</form>
<br>

<p>
<hr>
<p>

<h2>List doctors licensed before specific date</h2>
<h3>Enter date:</h3>
<form action="getdoctorlicensedate.php" method="post">
	<input type="date" name="licensedate">
	<input type="submit" value="View the list of doctors">
</form>
<br>
<p>
<hr>
<p>

<h2>List all the doctors not treating any patients</h2>
<form action="DoctorNoTreat.php" method="post">
<input type="submit" value="Start Request"/>
</form>
<br>

<p>
<hr>
<p>

</body>
</html>

