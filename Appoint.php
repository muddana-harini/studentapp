<html>
<head>
<link rel="stylesheet" type="text/css" href="app.css">
<title>Appointment </title>
<style>
h1{color:darkslateblue;
text-align:center;}
body{background-image:url("app.jpg");
 background-attachment: fixed;
background-size:cover;}
</style>
</head>
<body>
<th><font color="black"><b>In this page "symptoms" and "blood group" are not mandatory fields</b></font></th>
<?php
$db =new mysqli('localhost','root','','userid');
	if(isset($_POST['appoint']))
	{	
		if(empty($_POST['t1']) || empty($_POST['t2']) || empty($_POST['t3']) || empty($_POST['sex'])  || empty($_POST['doctor']) || empty($_POST['date1']) || empty($_POST['timings']))
		{
			echo '<script type="text/javascript">alert("Fill all the fields");</script>';
		}
		else
		{
			$patient=($_POST['t1']);		
			$age=($_POST['t2']);
			$sex=($_POST['sex']);
			$phoneno=$_POST['t3'];
			$blood=$_POST['blood'];
			$symptoms=$_POST['ta'];
			$doctor=$_POST['doctor'];
			$date=$_POST['date1'];
			$avail=$_POST['timings'];
			$sql="INSERT INTO appoint(pname,age,phone,sex,blood,symptoms,doctor,dates,avail)
						VALUES ('$patient','$age','$phoneno','$sex','$blood','$symptoms','$doctor','$date','$avail')";
			if(mysqli_query($db, $sql))
				echo '<script type="text/javascript">alert("Appointment Confirmed");</script>';
		}	
		}
?>

<h1><font  face="Colonna MT Regular" size=10>APPOINTMENT</font><h1>
<center><form method="post" action="Appoint.php">
<table>

<tr>
<th>Name of the Patient</th>
<td><input type="text" name="t1" placeholder="Enter Patient's Name"></td>
</tr>

<tr>
<th>Age</th>
<td><input type="number" name="t2" placeholder="Enter Age"></td>
</tr>
<tr>
<th>Contact Number</th>
<td><input type="text" name="t3" placeholder="Enter Contact Number"></td>
</tr>
<tr>
<th>Sex</th>
<td>
<input type="radio" name="sex" value="male">Male
<input type="radio" name="sex" value="female">Female
<input type="radio" name="sex" value="other">others<br>
</td>
</tr>
<tr>
<th>Blood Group</th>
<td><select name="blood">
<option value="Group">Group</option>
<option value="A+">A+</option>
<option value="B+">B+</option>
<option value="A-">A-</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
</select>
</td>
</tr>
<tr>
<th>symptoms</th>
<td><textarea name="ta" rows="5" cols="25">
</textarea> </td>
</tr>

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

<tr>
<th>Date</th>
<td><input name="date1" type="date">
</td>
</tr>


<tr>
<th>Doctor Availability</th>
<td><select name="timings">
<optgroup label="Morning">
<option value="9:30 to 1:00">9:30 to 1:00</option>
</optgroup>
<optgroup label="Evening">
<option value="5:00 to 9:30">5:00 to 9:30</option>
</optgroup>
</select>
</td>
</tr>
<br>
</table>
<input type="submit" name="appoint" value="submit">
</form>
</center>
</body>
</html>
