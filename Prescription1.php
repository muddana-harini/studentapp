<html>
<head>
<link rel="stylesheet" type="text/css" href="app.css">
<style>
h1{color:darkslateblue;
text-align:center;}
body{background-image:url("prescription.jpg");
     background-attachment: fixed;
     background-size:cover;}
</style>
</head>
<body>
<?php

$db =new mysqli('localhost','root','','userid');
	if(isset($_POST['dprescription']))
	{	
		if(empty($_POST['t1']) || empty($_POST['t2']) || empty($_POST['t3']) || empty($_POST['t4']) || empty($_POST['doctor']))
		{
			echo '<script type="text/javascript">alert("Fill all the fields");</script>';
		}
		else
		{
			$patient=($_POST['t1']);
			$age=($_POST['t2']);
			$prescription=($_POST['t3']);
			$intake=$_POST['t4'];
			$doctor=$_POST['doctor'];
			$sql="INSERT INTO dprescription(pname,prescription,intake,age,doctor)
						VALUES ('$patient','$prescription','$intake','$age','$doctor')";
			if(mysqli_query($db, $sql))
				echo '<script type="text/javascript">alert("prescription submited");</script>';
		}	
		}
?>
<h1><font color="green" face="Colonna MT Regular" size=10>PRESCRIPTION</font></h1>
<center>
<form method="post" action="prescription1.php">
<table>
<tr>
<th>Doctor Name</th>
<td><select name="doctor">
<option value="None">None</option>
<option value="Dr.Harish">Dr.Harish-Heart surgeon</option>
<option value="Dr.Rakesh varma">Dr.Rakesh varma-pediatrician</option>
<option value="Dr.Amrutha">Dr.Amrutha-Gynecologist</option>
<option value="Dr.Rajashekar">Dr.Rajashekar-ENT</option>
</select>
</td>
</tr>
<tr><th>Name of the patient</th><td><input type="text" name="t1" placeholder="Enter Patient's Name"></td></tr>
<tr><th>Age</th><td><input type="number" name="t2" placeholder="Enter Age"></td></tr>
</table>
<table border="2">

<tr>
<th>Prescription</th>
<th>Intake for</th>
</tr>

<tr>
<td><textarea cols="15" rows="20" name="t3">
</textarea></td>
<td><textarea cols="7" rows="20" name="t4">
</textarea></td>
</tr>
</table>
<input type="submit" name="dprescription" value="submit">
</form>
</center>
</html>