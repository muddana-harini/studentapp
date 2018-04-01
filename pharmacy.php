<html>
<head>
<link rel="stylesheet" type="text/css" href="app.css">
<title>Pharmacy </title>
<style>
h1{color:darkslateblue;
text-align:center;}
body{background-image:url("pharmacy.jpg");
     background-attachment: fixed;
background-size:cover;}
</style>
</head>
<body>
<th><font color="Cyan"><b>Please fill all the fields in this page</b></font></th>
<?php
$db =new mysqli('localhost','root','','userid');
	if(isset($_POST['pharmacy']))
	{	
		if(empty($_POST['t1']) || empty($_POST['t2']) || empty($_POST['t3']) || empty($_POST['sno'])  || empty($_POST['des']) || empty($_POST['ta']) || empty($_POST['qa']) || empty($_POST['date1']))
		{
			echo '<script type="text/javascript">alert("Please fill all the fields");</script>';
		}
		else
		{
			$patient=($_POST['t1']);		
			$place=($_POST['t2']);
			$sno=($_POST['sno']);
			$phoneno=$_POST['t3'];
			$des=$_POST['des'];
			$address=$_POST['ta'];
			$quant=$_POST['qa'];
			$date=$_POST['date1'];
			$sql="INSERT INTO pharmacy(pname,sno,phone,description,quantity,place,dates,address)
						VALUES ('$patient','$sno','$phoneno','$des','$quant','$place','$date','$address')";
			if(mysqli_query($db, $sql))
				echo '<script type="text/javascript">alert("Details are taken into account");</script>';
		}	
		}
?>
<h1><font face="Colonna MT Regular" size=10>Pharmacy</font></h1>
<center>
<form method="post" action="pharmacy.php">
<table>
<tr><th>Name of the Patient</th><td><input type="text" name="t1" placeholder="Enter Patient's Name"></td></tr>
<tr><th>Place</th><td><input type="text" name="t2" placeholder="Enter Place"></td></tr>
<tr><th>Date</th><td><input type="date" name="date1"></td></tr>
<tr><th>Mobile No</th><td><input type="text" name="t3" placeholder="Enter mobile no"></td></tr>
<tr><th>Address</th><td><textarea rows="5" cols="20" name="ta">
</textarea><td></tr></table>
<table border="2">

<tr>
<th><font color="Green"><b>Sno</b></font></th>
<th><font color="Green">Description</b></font></th>
<th><font color="Green">Quantity</b></font></th>
</tr>

<tr>
<td><textarea cols="3" rows="20" name="sno">
</textarea></td>
<td><textarea cols="15" rows="20" name="des">
</textarea></td>
<td><textarea cols="7" rows="20" name="qa">
</textarea></td>
</tr>
</table>

<input type="submit" name="pharmacy" value="submit">
</form>
</center>
</html>
