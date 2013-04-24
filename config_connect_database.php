<?php
/**
*
*	This Php file is used to connect the database in the localhost//
*	LibraryManagement.
*
**/


$mysql_hostname = "127.0.0.1";
$mysql_user = "root";
$mysql_password = "897375";
$mysql_database = "LibraryManagement";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("oops, cannt connect to the database.");
mysql_select_db($mysql_database, $bd) or die("Oops, cannt select the LibraryManagement DB"); 

try {
    $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_database", $mysql_user, $mysql_password);
  }
catch(PDOException $e)
    {
    echo $e->getMessage();
  }

?>
