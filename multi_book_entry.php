<?php

include "./config_connect_database.php";
include "checklogin.php";
include "header.html";
include "layout_top.php";

$file_temp = $_FILES['uploadedfile']['tmp_name'];

$query = "LOAD DATA LOCAL INFILE '$file_temp' INTO TABLE book
FIELDS TERMINATED BY ','
LINES STARTING BY '('
TERMINATED BY ')\\n'";

$result = mysql_query($query)or die ('Error: '.mysql_error ());
if($result){
	echo("<br>Books successfully entered.");
} else{
	echo("<br>Error");
}

include "layout_bottom.php";

?>