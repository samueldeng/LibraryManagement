<?php 

//$filename = // file here
//$lines = file($filename, FILE_IGNORE_NEW_LINES);
//$filestring = file_get_contents($filename)

//$values = 
//$query = INSERT INTO book (a,b,c) VALUES(1,2,3),(4,5,6),(7,8,9);


// INSERT into book
// WHERE category = ?
// AND title = ?
// AND publisher = ?
// AND year = ?
// AND author = ?
// AND price = ?
// AND qty_total = ?
// AND qty_available = ?


// $stmt = $dbh->prepare("INSERT INTO BOOK (category, title, publisher, year, author, price, qty_total, qty_available) 
// 	VALUES (:category, :title, :publisher, :year, :author, :price, :qty_total, :qty_available)");
// $stmt->bindParam(':category', $category);
// $stmt->bindParam(':title', $title);

// $stmt->execute();

include "./config_connect_database.php";
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

?>

