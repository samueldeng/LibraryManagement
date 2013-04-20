<?php

include "./config_connect_database.php";

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

?>