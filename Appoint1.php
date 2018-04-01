<!DOCTYPE html>
<html>
<head>
	<title>Doctor's appointment</title>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
	<?php
        $db=new mysqli('localhost','root','','userid');
        if (isset($_POST['get']))
        { if(isset($_POST['dname'])){
        	$name=$_POST['dname'];
        	$sql="SELECT * FROM appoint WHERE doctor='$name'";
        	$result=$db->query($sql);}
        }
    ?>
<form method="post" action="Appoint1.php" style="width: 40%; margin: 0 auto; padding-top: 5px;">
    <h4><center><font="Comic Sans MS">Check appionment</font></center></h4>
      <label>
        <input name="dname" type="radio" value="Dr.Harish">
        <span>Dr.Harish</span>
      </label>
      <label>
        <input name="dname" type="radio" value="Dr.Rakesh varma">
        <span>Dr.Rakesh varma</span>
      </label>
      <p>
      <label>
        <input name="dname" type="radio" value="Dr.Amrutha">
        <span>Dr.Amrutha</span>
      </label>
      <label>
        <input name="dname" type="radio" value="Dr.Rajashekar">
        <span>Dr.Rajashekar</span>
      </label>
  </p>

	<br><br><button class="btn" type="submit" name="get" style="margin-bottom: 20px; display: inline;">Submit</button>
</form>
<table>
	<thead>
		<th>sno</th>
		<th>Patient name</th>
		<th>Age</th>
		<th>Phone number</th>
		<th>sex</th>
		<th>Blood group</th>
		<th>symptoms</th>
		<th>Date</th>
		<th>Time</th>
	</thead>
	<?php if(!empty($result))
	if ($result->num_rows > 0){
	while ($rows=$result->fetch_assoc()) {
		?>	
	<tr>
		<td><?php echo $rows["sno"];?></td>
		<td><?php echo $rows["pname"];?></td>
		<td><?php echo $rows["age"];?></td>
		<td><?php echo $rows["phone"];?></td>
		<td><?php echo $rows["sex"];?></td>
		<td><?php echo $rows["blood"];?></td>
		<td><?php echo $rows["symptoms"];?></td>
		<td><?php echo $rows["dates"];?></td>
		<td><?php echo $rows["avail"];?></td>
	</tr>
	<?php
}

}
?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>