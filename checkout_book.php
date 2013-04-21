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
	$borrow_qry = "INSERT INTO borrow_record
					(book_id, card_id, date_out, admin_id)
			  		VALUES
			  		('$book_id', '$card_id', '$date_out', '$admin_id')";

	$borrow_result = mysql_query($borrow_qry) or die ('Error: '.mysql_error ());
	
	if($borrow_result){
		echo("<br>Book successfully checked out.");

	} else {
		echo("Error");
	}

} else {
	echo("There are not enough books available to be checked out at this time!");
        //输出最近归还时间
}
// Display books checked out by this user that haven't been returned yet.
$result = $dbh->query("SELECT * from book
						WHERE book_id in (SELECT book_id FROM borrow_record 
											WHERE card_id = '$card_id'
											AND date_in is NULL)");
?>

<table class="table table-striped">
	<tr>
		<th>ISBN</th>
		<th>Category</th>
		<th>Title</th>
		<th>Published</th>
		<th>Year</th>
		<th>Author</th>
		<th>Price</th>
		<th>Owned</th>
		<th>Available</th>
	</tr>
	<?php foreach(($result) as $row) : ?>
		<tr>
			<td><?php echo $row['book_id']; ?></td>
			<td><?php echo $row['category']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['publisher']; ?></td>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['qty_total']; ?></td>
			<td><?php echo $row['qty_available']; ?></td>
		</tr>
	<?php endforeach ?>
</table> 


