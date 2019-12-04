<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Page</title>
<link rel="stylesheet" href="FormattingDesign.css">
</head>
<body>

<?php
include 'connecttodb.php';
?>
<h1>Welcome to the Doctor Database Management System!</h1>
<br>
<h2>Please Choose One of the Options Below:<h2>
<br>

<p>
<hr>
<p>


<h2>Get Information on Doctors</h2>
<form action="ListDoctors.php" method="post">
<input type="submit" value="Proceed"><br>
</form>
<br>

<p>
<hr>
<p>

<h2>Add or Delete a Doctor</h2>
<form action="AddDeleteDoctor.php" method="post">
<input type="submit" value="Proceed"><br>
</form>
<br>

<p>
<hr>
<p>

<h2>List all Hospitals</h2>
<form action="ListHospitals.php" method="post">
	<input type="submit" value="Proceed"><br>
</form>
<br>

<p>
<hr>
<p>

<h2>Update a Hospital Name</h2>
<form action="ChangeHospitalName.php" method="post">
	<input type="submit" value="Proceed"><br>
</form>
<br>



<p>
<hr>
<p>
<h2>Get a Patient's Information</h2>
<form action="PatientInformation.php" method="post">
	Enter Patient OHIP Number: 
  <input type="text" name="OHIP"><br>
  <br></br>
	<input type="submit" value="submit"><br>
</form>
<br>

<p>
<hr>
<p>

<h2>Assign a Doctor to a Patient</h2>
<form action="assignDoctoPatient.php" method="post">
<input type="submit" value="Proceed"/>
</form>
<br>

<p>
<hr>
<p>

<h2>End Treatment of a Patient by a Doctor</h2>
<form action="EndTreatment.php" method="post">
<input type="submit" value="Proceed"/>
</form>
<br>
<p>
<hr>
<p>


</body>
</html> 

