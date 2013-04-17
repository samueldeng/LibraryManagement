<?php

/**
*
*	要求可以对书的 类别, 书名, 出版社, 年份(年份区间), 作者, 价格(区间) 进行查询. 每条图书信息包括以下内容:
*	( 书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存 )
*
*	可选要求: 可以按用户指定属性对图书信息进行排序. (默认是书名)
*	
*	需要在POST中利用IQUERY选中元素，进行POST。
*	需要在HTML中添加适当的文本域提供输入。
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
					category:	"None",
					bookname:	"None",
					publisher:	"None",
					year_min:	"None",
					year_max:	"None",
					author:		"None",
					price_min:	"None",
					price_max:	"None",	
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
	<div id="bookQueryResultBlock"><h3>Let AJAX change this text</h3></div>
	<button type="button" id="showQueryResultButton" onclick="loadBookQueryResults">Change Content</button>

</body>
</html>

?>
