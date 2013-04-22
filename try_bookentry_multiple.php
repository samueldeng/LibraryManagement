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
	<title>Bookentry page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
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
max-width: 480px;
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
</style>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	
	</head>
	
	
<?php 
include "./config_connect_database.php";
include "checklogin.php";
include "layout_top.php";
?>
		<div id="inputField" class="container">
			<form class="form-signin" enctype="multipart/form-data" action="multi_book_entry.php" method="POST">
				<h2 align="center" class="form-signin-heading">Multiple-book entry</h2>
				<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
				Choose a file to upload: <input name="uploadedfile" type="file" /><br />
				<input class="btn-primary" type="submit" value="Upload File" />		
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
