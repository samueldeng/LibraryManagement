<?php

include "./config_connect_database.php";
include "./checklogin.php";

$card_id = $_POST['card_id'];
$book_id = $_POST['book_id'];
$date_in = date("m/d/y");

//Test Code Segment
$firephp->log($card_id,"card_id");
$firephp->log($book_id,"book_id");
$firephp->log($date_in);
//TODO
//只输入card_id,输出借书的条目。


//还书

//This Segment code was used in FirePHP
 require_once('FirePHPCore/FirePHP.class.php');
 ob_start();
 $firephp = FirePHP::getInstance(true);

$borrow_record_query= mysql_query("SELECT * FROM borrow_record 
             WHERE card_id='$card_id' and book_id='$book_id'");
$has_borrow_record = mysql_num_rows($borrow_record_query)==0?false:true;

if($has_borrow_record){
	$firephp->log($borrow_record_query,"borrow_record_query");
	mysql_query("UPDATE book
                 SET qty_available = qty_available + 1
                 WHERE book_id= $book_id");//更新book.avalio
	 msyql_query("Update borrow_record
                 SET date_in = '$date_in'
                 WHERE card_id='$card_id' and book_id='$book_id'");//更新归还时间
    	echo "checkin successfully";
}  else {
	echo "borrow record doesn't exit";
}
?>
