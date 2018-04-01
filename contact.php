

<!DOCTYPE HTML>
<html>
	<head>
		<title>HMS | Contact us</title>
		<link href="style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
$db =new mysqli('localhost','root','','userid');
	if(isset($_POST['contact']))
	{	
		if(empty($_POST['t1']) || empty($_POST['t2']) || empty($_POST['t3']))
		{
			echo '<script type="text/javascript">alert("Please fill all the fields");</script>';
		}
		else
		{
			$name=($_POST['t1']);		
			$phone=($_POST['t2']);
			$subject=($_POST['t3']);
			$sql="INSERT INTO contact(name,phone,subject)
						VALUES ('$name','$phone','$subject')";
			if(mysqli_query($db, $sql))
				echo '<script type="text/javascript">alert("Thank you for your feedback");</script>';
		}	
		}
?>
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					
      			<div class="company_address">
				     	<h2>Hospital Address  :</h2>
						    	<p>Near Qutub Minar</p>
						   		<p>22-56-2-9 Gandhi Street, NewDelhi</p>
						   		<p>India</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Mobile:7397406206</p>
				  <form>
				  <p> mail to </p>
				  <a href="mailto:healthcare@gmail.com" >healthcare@gmail.com</a>
				   </form>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="post" action="contact.php">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="t1" placeholder="Enter name"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="t2" placeholder="Enter number"></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="t3"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="contact" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	<div class="clear"> </div>
	</div>
	
		  
		 
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>