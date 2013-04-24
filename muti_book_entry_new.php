<?php

include "./config_connect_database.php";
include "checklogin.php";
include "header.html";
include "layout_top.php";

require_once('FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);




$file = file_get_contents($_FILES['uploadedfile']['tmp_name']);

$book_entries=  split("\n", $file);

foreach ($book_entries as $book_entry){
    $book_entry_attributes= split(",", substr($book_entry,1,strlen($book_entry)-2));
$sql = "INSERT INTO book (book_id, category, title, publisher, year, author, price, qty_total, qty_available) 
        VALUES ('$book_entry_attributes[0]','$book_entry_attributes[1]','$book_entry_attributes[2]'
                ,'$book_entry_attributes[3]','$book_entry_attributes[4]','$book_entry_attributes[5]','$book_entry_attributes[6]'
                    ,'$book_entry_attributes[7]','$book_entry_attributes[7]');";
$firephp->log($sql,"sql");
mysql_query($sql) or die("Oops, You can't insert the books into table");

}

echo "<div class='alert alert-success'>Insert Successfully</div>";


include "layout_bottom.php";

?>

