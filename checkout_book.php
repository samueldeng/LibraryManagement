<?php
	$card_id = $_POST['card_id'];
	$book_id = $_POST['book_id'];
	//$date_out = date("m/d/y");
	$admin_id = $_POST['admin_id'];

	include "./config_connect_database.php";
	include "./checklogin.php";
	include "header.html";
	include "layout_top.php";

	echo $card_id;

	// Book checkout
	if($book_id != '' and $admin_id != '') {
		$sql = "SELECT COUNT(*) FROM book WHERE book_id = '$book_id'";

		if ($res = $dbh->query($sql)) {
			if ($res->fetchColumn == 0) {
				echo "This book is not in the system.";
			} else {
				$sql = "SELECT qty_available FROM book WHERE book_id = '$book_id'";
				$qty_avail = $dbh->$query($sql)->fetchColumn();

				if($qty_avail > 0) {

				}
			}
		}

		} else {
			// Check if there are enough books available
			$qty_avail = $dbh->query("SELECT qty_available FROM book
							WHERE book_id = '$book_id'")->fetchColumn();
			echo $qty_avail;

			if($qty_avail > 0){
				// create borrow_record
				$borrow_qry = "INSERT INTO borrow_record
								(book_id, card_id, date_out, admin_id)
						  		VALUES
						  		('$book_id', '$card_id', CURDATE(), '$admin_id')";

				$borrow_result = mysql_query($borrow_qry) or die ('Error: '.mysql_error ());

				if($borrow_result){
					echo("<br>Book successfully checked out.");

				} else {
					echo("Error");
				}

			} else {
				echo("This book is not currently available.");

				// 且输出最近归还的时间
				$sth = $dbh->query(
					"SELECT DATE_FORMAT( DATE_ADD( date_out, INTERVAL 40 DAY),  '%m/%d/%Y' )
					FROM borrow_record
					WHERE book_id = '$book_id'
					AND date_in is NULL
					ORDER BY date_out ASC");
				$next_avail = $sth->fetchColumn();
				if($next_avail) {
					echo("It should be available on ".$next_avail);
				}
			}
		}
	}
	// Get books checked out by this user that haven't been returned yet.


	$result = $dbh->query(
		"SELECT * from book
		WHERE book_id in
			(SELECT book_id
			FROM borrow_record
			WHERE card_id = '$card_id'
			AND date_in is NULL)");
?>

<p>
	<?php if($result->nextRowSet()) : ?>
		<?php //Display books checked out by this user that haven't been returned yet. ?>
		<h3>Books currently checked out by Card <?php echo $card_id; ?></h3>
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
	<?php else : ?>
		There are no books checked out under this ID.
	<?php endif ?>
</p>
<?php include "layout_bottom.php" ?>;
