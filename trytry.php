<?php

/**
*
*
* 1.输入借书证卡号
* 显示该借书证所有已借书籍 (返回, 格式同查询模块)
* 2.输入书号
* 如果该书在已借书籍列表内, 则还书成功, 同时库存加一.
* 否则输出出错信息.
*
*
* Tasklist:
* This is a code copy from bookquery, so you can to modified it later
*
*
**/
include "./config_connect_database.php"
include "./checklogin.php"

<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

<script>
$(document).ready(function(){
$("button").click(function(){
$.post("demo_test_post.asp",
{
name:"Donald Duck",
city:"Duckburg"
},
function(data,status){
alert("Data: " + data + "\nStatus: " + status);
}
);
});
});
</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>
)


?>
