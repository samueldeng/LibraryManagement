<?php

include "./config_connect_database.php";
include "./checklogin.php";
 
$card_id = $_POST['card_id'];
$book_id = $_POST['book_id'];

$query = "SELECT * FROM borrow_record 
             WHERE card_id='$card_id' and book_id='$book_id'";



$borrow_record_query= mysql_query($query);
$has_borrow_record = mysql_num_rows($borrow_record_query)==0?false:true;

if($has_borrow_record){

	 mysql_query("UPDATE borrow_record
                 SET date_in = CURDATE()
                 WHERE card_id='$card_id' and book_id='$book_id'");
    	echo "checkin successfully";

}
$result = $dbh->query("SELECT * from book
			WHERE book_id in (SELECT book_id FROM borrow_record 
			WHERE card_id = '$card_id'
			AND date_in is NULL)");
$firephp->log("query. finish");
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