<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 align="middle"><font color="blue"><i>MIGORI HOSPITAL</i></font></h1>
<br><br>
<div class="header"><h2>Register</h2>
  </div>
<form method="post" action="sign up.php">
<?php include('errors.php'); ?>
<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>">
</div><br>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo $email;?>">
</div><br>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div><br>
<div class="input-group">
<label>Confirm password</label>
<input type="password" name="password_2">
</div>
<br>
By continuing, you agree to this hospital's <a href="terms.php"><font color="navy">Terms of service </font></a>and <a href="terms.php"><font color="navy">Privacy Policy.</font></a>
<div class="input-group">
<button type="submit" class="loginbtn" name="reg_user">Register</button>
</div>
<p>
Already a member?<a href="login.php">	Log in</a>
</p><br>
<p align="right"><a href="index.php">Home</a></p>
&copy 2020 <font color="red"><u>MIGORI HOSPITAL</u></font>. Designed by <font color="navy"><u>TENAI TECH</u></font><br>
 <br>

</form>

</body>
</html>