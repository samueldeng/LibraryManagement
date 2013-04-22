<?php

/**
*	This PHP file is used to check the user' login' status
*	IF not login, the page will be redirect to login.php
*
*	But Notice that the hacker will modifie the session varialbes, //
*	So, it is better to requery the name in the database. 
**/

session_start();

if(!$_SESSION['admin_name'])
{
	header("Location: try.php");
}

?>
