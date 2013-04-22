<?php

/**	INTERFACE:
*	session_name = 'admin_name';
*	It will direct to ./bookquery.php
*	else direct to index.php
*
**/




//This Segment code was used in FirePHP
// require_once('FirePHPCore/FirePHP.class.php');
// ob_start();
// $firephp = FirePHP::getInstance(true);

 
include "./config_connect_database.php";



/**
*	This Segment code was included in config_connect_databse.php 
*
*	$mysql_hostname = "localhost";
*	$mysql_user = "root";
*	$mysql_password = "897375";
*	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("oops, cannt connect to the database.");
*	mysql_select_db('LibraryManagement', $bd) or die("Oops, cannt select the database"); 
**/


session_start();




if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	//There is no any security protection.

	$username=$_POST['username'];
	$password=$_POST['password'];
	$qry = "SELECT admin_id FROM admin WHERE name = '$username' and password= '$password'";
	$result=mysql_query($qry);
	$count=mysql_num_rows($result);
	if($count==1){
		
		$_SESSION['admin_name']=$username;
		header("Location: try_bookquery.php");
		echo $_SESSION['admin_name']; 
if(isset($_SESSION['admin_name'])) {
	echo "isset";
} else {
	echo "notset";
}
		echo "Login Successfully!<br>";
		echo "please click";
		echo "<a href='try_bookquery.php'>Here</a>";
		echo "to rediret to your home<br>";
	} else {
		
		echo "username or password is wrong<br>";
		echo "please click ";
		echo "<a href='try.php'>Here </a>";
		echo "to return login page<br>";
	}
}


?>
