<!DOCTYPE html>
<?php

/**
*
*	要求可以对书的 类别, 书名, 出版社, 年份(年份区间), 作者, 价格(区间) 进行查询. 每条图书信息包括以下内容:
*	( 书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存 )
*
*	可选要求: 可以按用户指定属性对图书信息进行排序. (默认是书名)
*
*	This is the query page viewable to anyone, without an account.
*
**/

?>
<html lang="en">
	<head>
	<title>Bookquery page</title>
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
max-width: 800px;
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
                    $("#1").keyup(function(){   
                        $.post(
					"./try_bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(),
						publisher:$("#3").val(),
						year_min:$("#4").val(),
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
//                                              sort:     $('#9').val()
					},
					function(data){
						$("#bookQueryResultBlock").html(data);
					}
				);
                    });
                   $("#2").keyup(function(){   
                        $.post(
					"./try_bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(),
						publisher:$("#3").val(),
						year_min:$("#4").val(),
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
//                                              sort:     $('#9').val()
					},
					function(data){
						$("#bookQueryResultBlock").html(data);
					}
				);
                    });
                   $("#3").keyup(function(){   
                        $.post(
					"./try_bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(),
						publisher:$("#3").val(),
						year_min:$("#4").val(),
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
//                                              sort:     $('#9').val()
					},
					function(data){
						$("#bookQueryResultBlock").html(data);
					}
				);
                    });
                   $("#6").keyup(function(){   
                        $.post(
					"./try_bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(),
						publisher:$("#3").val(),
						year_min:$("#4").val(),
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
//                                              sort:     $('#9').val()
					},
					function(data){
						$("#bookQueryResultBlock").html(data);
					}
				);
                    });
                    
                     $.post(
					"./try_bookqueryresult.php",
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
                    
                    
                    

			$("#bookQueryForm").submit(function(event){
				event.preventDefault();
				$.post(
					"./try_bookqueryresult.php",
					{
						category:$("#1").val(),
						title:$("#2").val(),
						publisher:$("#3").val(),
						year_min:$("#4").val(),
						year_max:$("#5").val(),
						author:	$("#6").val(),
						price_min:$("#7").val(),
						price_max:$("#8").val()
//                                              sort:     $('#9').val()
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
					<a class="brand" href="try_bookquery_reader.php">Librarymanage System</a>
					<ul class="nav">
						<li class="active"><a href="try_bookquery_reader.php">Book_query</a></li>
					</ul>
					<ul class="nav pull-right">
						<li><a href="try.php">Exit</a></li>
					</ul>
					<p class="navbar-text" align="right">Hello, <a href="">xxxx</a>!<!--here maybe need a php transfered information-username--></p>
				</div>
			</div>

		<div id="inputField" class="container">
			<form class="form-signin" id="bookQueryForm" method=post action=./try_bookqueryresult.php>
				<h2 align="center" class="form-signin-heading">Welcome to the book searching service</h2>
				<div class="controls controls-row">
				<input class="span4" type="text"	name="category"	id="1" placeholder="Please enter the category."/>
	 			<input class="span4" type="text" name='publisher' id="3" placeholder="Please enter the publisher.">
				</div>

				<div class="controls controls-row">
				<input class="span5" type="text" name='title' id="2" placeholder="Please enter the book name.">
				<input class="span3" type="text" name='author' id="6" placeholder="Please enter the book author.">
				</div>

			    <div class="controls controls-row">
				<input class="span2" type="text"	name="year_min"		id="4" placeholder="year_range_min"/>
				<input class="span2" type="text"	name="year_max"		id="5"placeholder="year_range_max"/>
				<input class="span2" type="text"	name="price_min"	id="7"placeholder="price_min"/>
				<input class="span2" type="text"	name="price_max"	id="8"placeholder="price_max"/>
<!--                                <select id="9">
                                    <option value="book_id" selected>Book_id</option>
                                    <option value="year">Year</option>
                                    <option value="price">Price</option>
                                    <option value="qty_available">Available Quantities</option>
                                </select>-->
				</div>

                <button type="submit" class="btn btn-primary">Begin searching</button>
                <button type="button" class="btn">Cancel</button>

			</form>
		</div>


		<div id="bookQueryResultBlock">
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
