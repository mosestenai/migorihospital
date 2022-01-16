<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php
session_start();
// including database connection file
require 'config.php';
//log in
//checking if the user has entered both the username and password
 if (isset($_POST['login_user'])) {
  $username = ($_POST['username']);
  $password = ($_POST['password']);
	//displaying an error message when a fied is empty
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
//checking in the database if the username and paaword exists
  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  	$results = $db->query($query);
	//logging in the user if the credentials are found in the database
  	if ($results->rowCount() == 1) {
	$user=$results->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: main.php');
	}
  	}
  //displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
 }


// REGISTER USER

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $password_1 = ($_POST['password_1']);
  $password_2 =($_POST['password_2']);

   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = $db->query($user_check_query);
  $user=$result->fetch(PDO::FETCH_OBJ);
  
 
  if ($user) { // if user exists
    if ($user->username == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user->email == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	$db->query($query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: main.php');
  }
}
//submitting entry
if (isset($_POST['submit_entry'])) {
	//receiving posted data
	$district = ($_POST['district']);
  $province = ($_POST['province']);
  $village = ($_POST['village']);
  $name = ($_POST['name']);
  $birthdate = ($_POST['birthdate']);
  $sex = ($_POST['sex']);
  $fathername = ($_POST['fathername']);
  $mothername = ($_POST['mothername']);
  $fg = $_SESSION['username'];
  $informantdescription = ($_POST['informantdescription']);
  $registrationdate = ($_POST['registrationdate ']);
	$typename = $_POST['typename'];
	//displaying an error on an empty field
	if(empty($district)){	array_push($errors, "District name is required");} 
	if(empty($province)){	array_push($errors, "province name is required");} 
	if(empty($village)){	array_push($errors, "village/sub location name is required");} 
	if(empty($name)){	array_push($errors, "child's name is required");} 
	if(empty($birthdate)){	array_push($errors, "birth date is required");} 
	if(empty($sex)){	array_push($errors, "select one of the sexes");} 
	if(empty($fathername)){	array_push($errors, "father's  name is required");} 
	if(empty($mothername)){	array_push($errors, "mother's name is required");} 
	if(empty($informantdescription)){	array_push($errors, "informants description  is required");} 
	//inserting into the database when there's zero errors
	if(count($errors) == 0){
		$query = "INSERT INTO certificates (username,district,province,village,registrationdate,name,birthdate,sex,fathername,mothername,informantdescription,typename
		)
		VALUES ('$fg','$district','$province','$village','$registrationdate','$name','$birthdate','$sex','$fathername','$mothername','$informantdescription','$typename')";
		$db->query($query);
		header('location: cert.php');
		
	}
	
	
	
}