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
	<title>Cardmanage page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html,
body {
height: 100%;
text-align:center;
margin: 0 auto;
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
	margin: 0 auto 20px;
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
	$name = $_POST['name'];
	$department = $_POST['department'];
	$card_type = $_POST['card_type'];

	$query = "INSERT INTO card
				(card_id, name, department, card_type)
				VALUES
				('$card_id', '$name', '$department', '$card_type')";


	$result = $dbh->query($query);
	if($result){
		echo("<div class='alert alert-success'>Card successfully added!</div>");
	} else{
		// $error = $result->errorInfo();
		// print_r($error);
		echo("<div class='alert alert-error'>Error</div>");
	}
}
?>

<script>
	// Client-side form validation
	$(document).ready(function() {
		$('.submit-btn').click(function(e){
			e.preventDefault();
			var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
			var card_id = $('#card_id').val();
			var card_name = $('#card_name').val();
			var dept = $('#dept').val();
			var card_type = $('#card_type').val();

			if(card_id.length != 10 || !numberRegex.test(card_id)) {
				alert("Card ID must be a 10-digit number.")
			} else if (card_name == '' || dept == '' || card_type == ''){
				alert("One or more fields is missing!");
			} else {
				$('.form-signin').submit();
			}
		});
	});
</script>
	<div id="inputField" class="container">


		<form class="form-signin" method="post" action="try_card_add.php">
			<h2 align="center" class="form-signin-heading">Add a card</h2>
			<label for="ID">ID:</label><input type="text" name="card_id" id="card_id" />
			<label for="ID">Name:</label><input type="text" name="name" id="card_name"/>
			<label for="ID">Department</label><input type="text" name="department" id="dept"/>
			<label for="ID">Type:</label><input type="text" name="card_type" id="card_type"/>
			<button class="btn btn-primary submit-btn" type="submit">Add card</button>
		</form>
	</div>

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
