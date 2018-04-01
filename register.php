<html>
<head>
<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
<?php

$db =new mysqli('localhost','root','','userid');
$emailerr=$passerr=$mailid=$mailidcheck=$phoneno=$userid=$pass1=$phoneerr='';
	if(isset($_POST['signup']))
	{	
		if(empty($_POST['mailid']) || empty($_POST['userid']) || empty($_POST['phone']) || empty($_POST['pass1']))
		{
			echo '<script type="text/javascript">alert("Please fill all the fields");</script>';
		}
		else
		{
		if(empty($_POST['mailid']))
		{
			$emailerr="email required";
		}
		else
		{
			$mailid=($_POST['mailid']);		
		}
		if(empty($_POST['userid']))
		{
			$usererr="userid required";
		}
		else		
		{
			$userid=($_POST['userid']);
		}
		if(empty($_POST['pass1']))
		{
			$passerr="password required";
		}
		else	
		{
			$pass1=($_POST['pass1']);
		}
		if(empty($_POST['phone']))
		{
			$phoneerr="Mobile no. required";
		}
		else
		{
			$phoneno=$_POST['phone'];
		}
		$mailidcheck=" SELECT * FROM signup WHERE email='$mailid' OR username='$userid'";
		$result=$db->query($mailidcheck);
		$logyes=$result->num_rows;
		if($logyes >0)
		{
			echo '<script type="text/javascript">alert("Email or Userid exists already");</script>';
		}
		else
		{
			$sql="INSERT INTO signup(username,email,password,phone)
						VALUES ('$userid','$mailid','$pass1','$phoneno')";
			if(mysqli_query($db, $sql))
				echo '<script type="text/javascript">alert("Registered successfully");</script>';
		}
}
}
?>
 <div class="loginbox">
<img src="logo.jpg" class="logo">
<h1>Register Here</h1>
<form method="post" action="register.php">
<p>Username</p>
<input type="text" name="userid" placeholder="Enter Username">
<p>Email</p>
<input type="email" name="mailid" placeholder="Enter Emailid">
<p>PhoneNo</p>
<input type="text" name="phone" placeholder="Enter PhoneNo">
<p>Password</p>
<input type="password" name="pass1" placeholder=" EnterPassword">
<input type="submit" name="signup" value="Signup">
<p> already registered?<a href="login.php">login</a></p>
</form>
 </div>
</body>
</html>