<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<?php
	if(isset($_POST['login']))
{
	$db =new mysqli('localhost','root','','userid');
	$username=($_POST['username']);
	$password=($_POST['password']);
	$mailidcheck=" SELECT * FROM login WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$mailidcheck);
		$logyes=mysqli_num_rows($result);
		if($logyes == 1)
		{
			echo("<script>location.href ='Frame1.php';</script>");
		}
		else
		{
			echo '<script type="text/javascript">alert("Invalid username or password");</script>';
		}
}
?>
 <div class="loginbox">
<img src="logo.jpg" class="logo">
<h1>Doctor Login</h1>
<form  method="post" action="doc.php">
<p>Username</p>
<input type="text" name="username" placeholder="Enter Username">
<p>Password</p>
<input type="password" name="password" placeholder=" EnterPassword">
<input type="submit" name="login" value="Login">
</form>
 </div>
</body>
</html>