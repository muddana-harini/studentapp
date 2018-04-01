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
        $db=new mysqli('localhost','root','','userid');
        if (isset($_POST['dprescription']))
        {
        	$name=$_POST['doctor'];
        	$paname=$_POST['paname'];
        	$sql="SELECT * FROM dprescription WHERE doctor='$name' AND pname='$paname'";
        	$result=$db->query($sql);
        }
    ?>
<h1><font color="green" face="Colonna MT Regular" size=10>PRESCRIPTION</font></h1>
<center>
<form method="post" action="prescription.php">
<table>
<tr><th>Name of the patient</th><td><input type="text" name="paname" placeholder="Enter Patient's Name"></td></tr>
<th>Select Doctor's Name</th>
<td><select name="doctor">
<option value="None">None</option>
<option value="Dr.Harish">Dr.Harish-Heart surgeon</option>
<option value="Dr.Rakesh varma">Dr.Rakesh varma-pediatrician</option>
<option value="Dr.Amrutha">Dr.Amrutha-Gynecologist</option>
<option value="Dr.Rajashekar">Dr.Rajashekar-ENT</option>
</select>
</td>
</table>
<input type="submit" name="dprescription" value="submit"><br><br>
<table border="2">
        <tr>
<th><font color="Green">Prescription</b></font></th>
<th><font color="Green">Intake for</b></font></th>
</tr>

<!--tr>
<td><textarea cols="15" rows="20" name="prescription">
</textarea></td>
<td><textarea cols="10" rows="20" name="intake">
</textarea></td>
</tr-->
<?php 
     if(!empty($result))
	if ($result->num_rows > 0){
	while ($rows=$result->fetch_assoc()) {
		?>	
	<tr>
		<td><?php $temp=$rows["prescription"]; echo nl2br($temp);?></td>
		<td><?php $temp1=$rows["intake"]; echo nl2br($temp1);?></td>
			</tr>
	<?php
}

}
?>
</table>
</form>
</center>
</html>
