 
 <?php error_reporting (E_ALL ^ E_NOTICE  && E_WARNING);?>
 <?php 
 session_start();
  require 'config.php';
  
  $username= $_SESSION['username'];
  $query= "SELECT * FROM certificates WHERE username = '$username'";
  $results= $db->query($query) or die($db->error);
  if ($results->rowCount() > 0){
  if ($results= $db->query($query)) {
  while ($row = $results->fetch(PDO::FETCH_OBJ)){
  
  ?>
  
<!DOCTYPE html>
<html>
<head>
<title>birth cert</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h3 align="middle"><font color="red"><u>REPUBLIC OF KENYA</u></font></h3>
<br>
<h2 align="middle"><font color="red">CERTIFICATE OF BIRTH</font></h2>
<hr color="red">
 <p><font color="red">Birth in the</font><font color="white">gdfgxdfxxgxfxfgxgxf</font><u> <?php echo $row->district; ?></u> <font color="white">
 gdfgxdfxxgxfxfgxgxf</font><font color="red">District in the</font> <font color="white">gdfgxdfxxgxfxfgxgxf</font><u> <?php echo $row->province; ?></u>
 <font color="white">gdfgxdfxxgxfxfgxgxf</font> <font color="red">Province</font> <br>
 <hr color="red">
 <font color="red">NO   |</font><font color="white">gdfghjhjhhjjhjhxhhgh</font><font color="red">| Where Born |</font><font color="white">hjjhjhxhhgh</font>
 <?php echo $row->village; ?>
 <font color="white">gdfjjjjjjgh</font><font color="red">| Name |</font><font color="white">gdfghjhjhhjjhjhxhhgh</font><?php echo $row->name; ?><br><br>
 <hr color="red">
 <font color="red"> Date of Birth |</font><font color="white">gdfjjjjjh</font><?php echo $row->birthdate; ?><font color="white">gdjhjhhjhjhjhfjjjjh</font>
 <font color="red">| Sex |</font><font color="white">gdfjh</font><?php echo $row->sex; ?><font color="white">gdfhhjjhjhhjhjhjhjh</font>
 <font color="red">| Name and Surname of Father |</font><font color="white">gdfjh</font><?php echo $row->fathername; ?><br>
 <hr color="red">
 <font color="red"> Name and Maiden / Name of Mother | </font><font color="white">gdfjhhhhhhhhh</font><?php echo $row->mothername; ?><br><br>
 <hr color="red">
 <font color="red"> Signature, Description and Residence of Informant |</font> <font color="white">gdfjh</font><?php echo $row->informantdescription; ?><br><br>
 <hr color="red">
 <font color="red"> Signature of Registering Officer |</font></font><font color="white">gdfjhhhhhh</font><?php echo $row->typename; ?><font color="white">gdfjhhhhhh</font>
 <font color="red">| Date of registration |</font>
  <font color="white">gdfjh</font><?php echo $row->registrationdate; ?><br>
  <hr color="red">
  <font color="red">Baptism Name if added or altered after Registration of Birth |</font><br>
  <hr color="red">
   <font color="white">gdfjh</font><font color="red">Certified to be a true copy of a return/an entry in the Register of Births in the District above mentioned<br>
    <font color="white">gdfjh</font>Given under the seal of the Principal Registrar on </font><font color="white">gdfjh</font><?php echo $row->registrationdate; ?><br>
	<hr color="red">
   <font color="white">gdfjh</font></p>
   <p align="middle">
   <font color="red">This certificate is issued in persuance of the Births and Deaths Registration Act (Cap. 149) which provides that a certified copy of<br>
    any entry in any register or return purporting to be sealed or stamped with the seal of the Principal Registrar shall be received as <br>
	evidence of the dates and facts therein without any other proof of such entry.<br><br></p>
	Typed by:(_________________)<br>
	<br>
	Checked by:(_________________)<br><br>
	<b>FEE PAID: Fifty Shillings</b>
	<br>
	<br>
	<form method="get" action="cert.php">
	<button type="submit" name="download">Download</button>
	</form>
	<?php 
	if(isset($_GET['download'])){
		/*$dom = new DOMDocument;
		$dom->load('http://localhost/migorihospital/cert.php');
		*/
		/*
		$homepage = file_get_contents('http://localhost/migorihospital/cert.php');
		echo $homepage;
		*/
		$url = 'http://localhost/migorihospital/cert.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec ($ch);
		curl_close ($ch);
		echo $data;
	}
   ?>
</body>
</html>


<?php
  }}}
?>
  