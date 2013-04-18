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

include "./checklogin.php"



<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
	<script>
	$(document).ready(function(){
		$("#showQueryResultButton").click(function(){
			$.post(
				"./bookqueryresult.php",
				{
					category:	$("#category"),
					bookname:	$("#category"), 
					publisher:	$("#publisher"),
					year_min:	$("#year_min"),    
					year_max:	$("#year_max"),
					author:		$("#author"),
					price_min:	$("#price_min"),
					price_max:	$("#price_max"),
				},
				function(data,status){
					if(status=="success"){
					$("#bookQueryResultBlock").html(data);//Need to generate a html document displayed in BLOCK.
					}else{
					$("#bookQueryResultBlock").html("Can't get bookquery result from Server.");
					}
				}
			);		
		});
});

	</script>
</head>
<body>
	//Need to add some textfield HERE.	
	
	<div id="inputField">
		category:	<input type="text",name="category">
        	bookname:	<input type="text",name="bookname"> 
        	publisher:	<input type="text",name="publisher">
        	year_min:	<input type="text",name="year_min">
        	year_max:	<input type="text",name="year_max">
        	author:		<input type="text",name="author">
        	price_min:	<input type="text",name="price_min">
		price_max:	<input type="text",name="price_max">
	</div>

	<div id="bookQueryResultBlock">
		<h3>Let AJAX change this text</h3>
	</div>


	<divi id="submitButton">
		<button type="button" id="showQueryResultButton" onclick="loadBookQueryResults">Change Content</button>
	</div>
	

</body>
</html>

?>
