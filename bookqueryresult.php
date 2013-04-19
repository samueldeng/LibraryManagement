<?php
/**
*
*	This Document is used to generate the HTML document to the bookquery.php in the bookquery Block
*
*
*	( 书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存 )
*
*	可选要求: 可以按用户指定属性对图书信息进行排序. (默认是书名)
*
*
**/


require_once('FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);


include "./config_connect_database.php";

if(isset($_POST['category'])&&!empty($_POST['category'])){
    $where_cond+=$_POST['category'];}
if(isset($_POST['title'])&&!empty($_POST['title'])){
    $where_cond+=$_POST['title'];}
if(isset($_POST['year_min'])&&!empty($_POST['year_min'])){
$where_cond+=$_POST['publisher'];}

 $firephp->log($where_cond,"where_condition");

//$a[2]=$POST['title'];       //title
//$a[3]=$_POST['publisher'];  //publisher
//$a[4]=$_POST['year_min'];   //year_min 
//$a[5]=$_POST['year_max'];   //year_max 
//$a[6]=$_POST['author'];     //author   
//$a[7]=$_POST['price_min'];  //price_min
//$a[8]=$_POST['price_max'];  //price_max

//Generate the Query clause.

//$SELECT_WHERE_CLAUSE="SELECT * FROM book";





//Execute the query in database.

//$query=$SELECT_WHERE_CLAUSE+$WHERE_CLAUSE;

//$firephp->log($query, 'query statement');

$result=mysql_query($query);
$count=mysql_num_rows($result);
for($i=0;$i<$count;$i++){
	$row=mysql_fetch_array($result);
	echo $row + "<br>";
}
?>
