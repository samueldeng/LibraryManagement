<?php

include "./config_connect_database.php";
include "checklogin.php";
include "header.html";
include "layout_top.php";

$book_id = $_POST['book_id'];
$category = $_POST['category'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year = (int)$_POST['year'];
$price = (float)$_POST['price'];
$qty_total = (int)$_POST['qty_total'];

$query = "INSERT INTO book
		(book_id, category, title, publisher, year, author, price, qty_total, qty_available)
		VALUES
		('$book_id', '$category', '$title', '$publisher', '$year', '$author', '$price', '$qty_total', '$qty_total')";

$result = mysql_query($query);
if($result){
	echo("<br>Book successfully entered.");
} else{
	echo("<br>Error");
}

include "layout_bottom.php";

?>

