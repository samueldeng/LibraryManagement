<?php

include "./config_connect_database.php";

$card_id = $_POST['card_id'];

$query = "DELETE FROM card
			WHERE card_id = '$card_id'";

$result = mysql_query($query);
if($result){
	echo("<br>Card deleted.");
} else{
	echo("<br>Error");
}