<?php 

include('server.php'); 
 if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>birth certificate</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form class="red" method="post">
<h1 align="middle"><font color="navy"><i>MIGORI HOSPITAL</i></font></h1>
<br><br>
<h3 align="middle"><font color="red"><u>REPUBLIC OF KENYA</u></font></h3>
<br><h2 align="middle"><font color="red">CERTIFICATE OF BIRTH</font></h2>
<?php include('errors.php'); ?>
<div class="input-group2">
<label>District of birth</label>
<input type="text" name="district"><label>Province of birth</label>
<input type="text" name="province">
<label>village of birth</label>
<input type="text" name="village"><br><br>
<label>Name of the child</label>
<input type="text" name="name">
<label>Date of birth</label>
<input type="date" name="birthdate">
</div>
Male:<input type="radio" name="sex" value="male" ><br>
Female:<input type="radio" name="sex" value="female" >
<div class="input-group2">
<label>Father's name</label>
<input type="text" name="fathername">
<label>Mother's name</label>
<input type="text" name="mothername">
<label>informants description</label>
<input type="text" name="informantdescription"><br><br>
<label>Date of registration</label>
<input type="date" name="registrationdate"><br><br>
<label>Typed by:</label>
<input type="text" name="typename">
</div><br>
<div class="input-group">
  		<button type="submit" class="loginbtn" name="submit_entry">SUBMIT</button>
  	</div><br>
	</form>
</body>
</html>