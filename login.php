<html>
<head>
<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body style="background-image: url('hosp.jpg');">
<?php
	if(isset($_POST['login']))
{
	$db =new mysqli('localhost','root','','userid');
	$username=($_POST['username']);
	$password=($_POST['password']);
	$mailidcheck=" SELECT * FROM signup WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$mailidcheck);
		$logyes=mysqli_num_rows($result);
		if($logyes == 1)
		{
			echo("<script>location.href ='Frames.php';</script>");
		}
		else
		{
			echo '<script type="text/javascript">alert("Invalid username or password");</script>';
		}
}
?>
 <div class="loginbox">
<img src="logo.jpg" class="logo">
<h1>User Login</h1>
<form action="login.php" method="post">
<p>Username</p>
<input type="text" name="username" placeholder="Enter Username">
<p>Password</p>
<input type="password" name="password" placeholder=" EnterPassword">
<button type="submit" name="login">Login</button>
<a href="register.php">Don't have an account?</a>
</form>
 </div>
</body>
</html>