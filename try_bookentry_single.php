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
	<script>
		$(document).ready(function(){
			$("#bookQueryForm").submit(function(event){
				event.preventDefault();
				$.post(
					"./bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(), 
						publisher:$("#3").val(),
						year_min:$("#4").val(),    
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
					},
					function(data){
						$("#bookQueryResultBlock").html(data);
					}
				);

			});

		});
	</script> 
	</head>
	
	
	<body>
		<div id="wrap">

			<div class="navbar">
				<div class="navbar-inner">
					<a class="brand" href="try_bookentry_single.php">Librarymanage System</a>
					<ul class="nav">
						<li><a href="try_bookquery.php">Book_query</a></li>
					</ul>
					
					<ul class="nav nav-tabs">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Book_manage<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
							<li><a href="try_bookborrow.php">Book_borrow</a></li>
							<li><a href="try_bookreturn.php">Book_return</a></li>
							
							 <li class="dropdown-submenu">
								 <a tabindex="-1" href="#">Book_entry</a>
								 <ul class="dropdown-menu">
								 <li><a href="try_bookentry_single.php">Book_entry_single</a></li>
								 <li><a href="try_bookentry_multiple.php">Book_entry_multiple</a></li>
								 </ul>
							</li>
							</ul>
						</li>
					</ul>

					<ul class="nav nav-tabs">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Card_manage<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
							<li><a href="try_card_add.php">Card_add</a></li>
							<li><a href="try_card_delete.php">Card_delete</a></li>
							</ul>
						</li>
					</ul>
								
					<ul class="nav pull-right">
						<li><a href="try.php">Exit</a></li>
					</ul>
					<p class="navbar-text" align="right">Hello, <a href="">xxxx</a>!<!--here maybe need a php transfered information-username--></p>
				
				</div>
			</div>

		<div id="inputField" class="container">
			
			
			
			<form class="form-signin" id="bookQueryForm" method="post" action="single_book_entry.php">
				<h2 align="center" class="form-signin-heading">Single-book entry</h2>
				
				<div width="250px" class="pull-left">
				<label for='ISBN'>ISBN:</label><input class="input-large" type="text" name="book_id" id="book_id"/>
				</div>
				
				<div width="250px" class="pull-right">
				<label for='category'>category:</label><input type="text"	name="category" id="category"/>
				</div>
				
				<div width="250px" class="pull-left">
				<label for='title'>title:</label><input type="text"	name="title" id="title"/>
				</div>
				
				<div width="250px" class="pull-right">
				<label for='Author'>Author:</label><input type="text" name="author" id="author"/>
				</div>
				
				<div width="250px" class="pull-left">
				<label for='publisher'>publisher:</label><input type="text"	name="publisher" id="publisher"/>
				</div>
				
				<div width="250px" class="pull-right">
				<label for='year'>year:</label><input type="text"	name="year"	id="year"/>
				</div>
				
				<div width="250px" class="pull-left">
				<label for='price'>price:</label><input type="text"	name="price" id="price"/>
				</div>
				
				<div width="250px" class="pull-right">
				<label for='quantity'>quantity:</label><input type="text"	name="qty_total" id="qty_total"/><br/><br/>
				</div>
				
				<input class="btn btn-large btn-primary" type="submit" value="submit"/>
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