<?php error_reporting (E_ALL ^ E_NOTICE);?><?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-54-211-176-156.compute-1.amazonaws.com";
$user="ffpzbuypeudsps";
$password="eff3df14ae54dea2d485d945d9f926941511996ed402a128efd7a96a354e2792";
$dbname="d88bif546uh3a2";
$port="5432";
 
try{
$db = new PDO("pgsql:host=$host;dbname=$dbname;port=$port",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
$error->getMessage();
}

?>