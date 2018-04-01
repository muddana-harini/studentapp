<html>
<head>
<link rel="stylesheet" type="text/css" href="style3.css">
<script type="text/javascript">
var image1=new Image()
image1.src="hospital.jpg"
var image2=new Image()
image2.src="pic1.jpg"
var image3=new Image()
image3.src="pic2.jpg"
</script>
</head>
<body>
<img src="hosp.jpg" name="slide" width=100% height=75%>
<script type="text/javascript">
var step=1
function slideit(){
document.images.slide.src=eval("image"+step+".src")
if(step<3)
step++
else
step=1
setTimeout("slideit()",2500)
}
slideit()
</script>
<center><h1><font face="Comic Sans MS">HealthCare Hospitals</h1></center>
<div class="slide">
<h2>For Users</h2>
<form action="login.php">
<input type="submit" name="" value="UserLogin">
</form>
<p align="right"><h2>For Doctors</h2></p>
<form action="doc.php">
<input type="submit" name="" value="DoctorLogin">
</form>

</div>
</body>
</html>