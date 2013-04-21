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
include "./config_connect_database.php";
include "layout_top.php";
?>

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

<?php include "layout_bottom.php" ?>
