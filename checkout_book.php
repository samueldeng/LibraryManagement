<?php

include "./config_connect_database.php";
include "./checklogin.php";

$card_id = $_POST['card_id'];
$book_id = $_POST['book_id'];
$date_out = date("m/d/y");
$admin_id = $_POST['admin_id'];

// Check if there are enough books available
$qty_avail = mysql_result(mysql_query("SELECT qty_available FROM book
				WHERE book_id = '$book_id'"), 0);

if($qty_avail > 0){
	// create borrow_record
	$record_qry = "INSERT INTO borrow_record
					(book_id, card_id, date_out, admin_id)
			  		VALUES
			  		('$book_id', '$card_id', '$date_out', '$admin_id')";

	$result = mysql_query($record_qry);
	if($result){
		echo("<br>Book successfully checked out.");
	} else {
		echo("Error");
	}
} else {
	echo("There are not enough books available to be checked out at this time!");
        //输出最近归还时间
}

?>