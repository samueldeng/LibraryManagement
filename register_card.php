<?php

include "./config_connect_database.php";

$card_id = $_POST['card_id'];
$name = $_POST['name'];
$department = $_POST['department'];
$card_type = $_POST['card_type'];

$query = "INSERT INTO card
			(card_id, name, department, card_type)
			VALUES
			('$card_id', '$name', '$department', '$card_type')";


$result = mysql_query($query);
if($result){
	echo("<br>Card successfully added!");
} else{
	echo("<br>Error");
}

?>
