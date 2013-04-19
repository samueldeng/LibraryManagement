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
<html>
	<head>
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
		<div id="inputField">
			<form id="bookQueryForm" method=post action=./bookqueryresult.php>
				category:<input type="text"	name="category"		id="1"/>
				title:<input type="text"	name="title"		id="2"/> 
				publisher:<input type="text"	name="publisher"	id="3"/>
				year_min:<input type="text"	name="year_min"		id="4"/>
				year_max:<input type="text"	name="year_max"		id="5"/>
				author:	<input type="text"	name="author"		id="6"/>
				price_min:<input type="text"	name="price_min"	id="7"/>
				price_max:<input type="text"	name="price_max"	id="8"/>
				<input type="submit" value="submit"/>
			</form>
		</div>
	
		<div id="bookQueryResultBlock">
		</div>
	
	</body>
</html>

