<?php

require 'config.php';

$sql = "CREATE TABLE users (id SERIAL,username varchar(255),email varchar(255),password varchar(255))";
$db->query($sql);

$sql2 = "CREATE TABLE certificates (id SERIAL,username varchar(500),district varchar(500),province varchar(500),village varchar(500),registrationdate varchar(500),name varchar(500),birthdate varchar(500),sex varchar(500),fathername varchar(500),mothername varchar(500),informantdescription varchar(500),typename varchar(500))";
$db->query($sql2);
?>