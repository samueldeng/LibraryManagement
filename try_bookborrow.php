<!DOCTYPE html>
<?php

/**
*
*	要求可以对书的 类别, 书名, 出版社, 年份(年份区间), 作者, 价格(区间) 进行查询. 每条图书信息包括以下内容:
*	( 书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存 )
*
*	可选要求: 可以按用户指定属性对图书信息进行排序. (默认是书名)
*
*
**/



?>
<html lang="en">
	<head>
	<title>Bookborrow page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html,
body {
height: 100%;
/* The html and body elements cannot have any padding or margin. */
}
/* Wrapper for page content to push down footer */
#wrap {
min-height: 100%;
height: auto !important;
height: 100%;
/* Negative indent footer by it's height */
margin: 0 auto -60px;
}
/* Set the fixed height of the footer here */
#push,
#footer {
height: 60px;
}
#footer {
background-color: #f5f5f5;
}
/* Lastly, apply responsive CSS fixes as necessary */
@media (max-width: 767px) {
#footer {
margin-left: -20px;
margin-right: -20px;
padding-left: 20px;
padding-right: 20px;
}
}
.form-signin {
max-width: 230px;
padding: 19px 29px 29px;
margin: 0 auto 20px;
background-color: #f5f5f5;
border: 1px solid #e5e5e5;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
font-size: 16px;
height: auto;
margin-bottom: 15px;
padding: 7px 9px;}

.container {
width: auto;
max-width: 1100px;
}
.container .credit {
margin: 20px 0;
}

.alert {
	min-width: 400px;
	max-width: 100px;
}
</style>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	</head>


<?php
	include "./config_connect_database.php";
	include "checklogin.php";
	include "layout_top.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$card_id = $_POST['card_id'];
		$book_id = $_POST['book_id'];
		$admin_id = $_POST['admin_id'];
	}
?>


<div id="inputField" class="container">

	<form class="form-signin" method="post" action="try_bookborrow.php">
		<h2 align="center" class="form-signin-heading">Checking out</h2>
		<label for="Card ID">Card ID</label><input type="text" name="card_id" value="<?php echo($card_id); ?>"/>
		<label for="ISBN">ISBN</label><input type="text" name="book_id" value="<?php echo($book_id); ?>"/>
		<label for="Admin ID">Admin ID</label><input type="text" name="admin_id" value="<?php echo($admin_id); ?>"/>
		<!--Use present ID number?-->
		<button class="btn btn-primary" type="submit">Checkout book</button>
	</form>

</div>

<center>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$card_qry = "SELECT COUNT(*) FROM card WHERE card_id = '$card_id'";

		$book_qry = "SELECT COUNT(*) FROM book WHERE book_id = '$book_id'";

		$admin_qry = "SELECT COUNT(*) FROM admin WHERE admin_id = '$admin_id'";

		$dups_qry = "SELECT COUNT(*) FROM borrow_record
					WHERE card_id = '$card_id'
					AND book_id = '$book_id'
					AND date_in is NULL";

		if($dbh->query($card_qry)->fetchColumn() == 0) {
			echo("<div class='alert alert-error'>Please enter a valid card ID.</div>");
		} else if($book_id != '' && $dbh->query($book_qry)->fetchColumn() == 0) {
			echo("<div class='alert alert-error'>Please enter a valid ISBN.</div>");
		} else if($admin_id != '' && $dbh->query($admin_qry)->fetchColumn() == 0) {
			echo("<div class='alert alert-error'>Please enter a valid admin ID.</div>");
		} else if($dbh->query($dups_qry)->fetchColumn() > 0) {
			echo("<div class='alert alert-error'>This book has already been checked out under card ".$card_id);
		} else {

			// Book checkout
			// Check if there are enough books available
			$qty_avail = $dbh->query("SELECT qty_available FROM book
							WHERE book_id = '$book_id'")->fetchColumn();

			if($qty_avail > 0){
				// create borrow_record
				$borrow_qry = "INSERT INTO borrow_record
								(book_id, card_id, date_out, admin_id)
						  		VALUES
						  		('$book_id', '$card_id', CURDATE(), '$admin_id')";

				$borrow_result = mysql_query($borrow_qry) or die ('Error: '.mysql_error ());

				if($borrow_result){
					echo("<div class='alert alert-success'>Book successfully checked out.</div>");

				} else {
					echo("<div class='alert alert-error'>Error</div>");
				}
			} else {
				// 且输出最近归还的时间
				$sth = $dbh->query(
					"SELECT DATE_FORMAT( DATE_ADD( date_out, INTERVAL 40 DAY),  '%m/%d/%Y' )
					FROM borrow_record
					WHERE book_id = '$book_id'
					AND date_in is NULL
					ORDER BY date_out ASC");
				$next_avail = $sth->fetchColumn();
				if($next_avail) {
					echo("<div class='alert alert-error'>This book is not currently available. It should be available on ".$next_avail."</div>");
				}
			}

			$records_qry = "SELECT count(*) from book
							WHERE book_id in
								(SELECT book_id
								FROM borrow_record
								WHERE card_id = '$card_id'
								AND date_in is NULL)";

			if($dbh->query($records_qry)->fetchColumn() == 0) {
				echo("<div class='alert alert-error'>There are no books checked out under this ID.</div>");
			} else {

				// Get books checked out by this user that haven't been returned yet.
				$result = $dbh->query(
					"SELECT * from book
					WHERE book_id in
						(SELECT book_id
						FROM borrow_record
						WHERE card_id = '$card_id'
						AND date_in is NULL)");
			}
		}
	}
?>

<p>
	<?php if($result) : ?>
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
	<?php endif ?>
</p>
</center>

<div id="push"></div>
</div>

<div id="footer">
	<div class="container" align="center">
		<p class="muted credit">
		Created by
		<a href="mailto:mr.dengshuoling@gmail.com?subject=Hello%20Shuoling!">@Shuoling Deng</a>
		,
		<a href="mailto:jenkliu@gmail.com?subject=Hello%20Jen!">@Jen Liu</a>
		and
		<a href="mailto:sdmorrisys@gmail.com?subject=Hello%20Shuo!">@Shuo Yang</a>
		.
		</p>
	</div>
</div>


		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
