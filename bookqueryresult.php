<?php
require_once('FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);


include "./config_connect_database.php";

$isAllEmpty = true;

if(($category=$_POST['category'])!==""){
    $where_cond .="category='$category' AND ";
    $isAllEmpty = false;
}
if(($title=$_POST['title'])!==""){
    $where_cond .= "title='$title' AND ";
    $isAllEmpty = false;
}
if(($publisher=$_POST['publisher'])!==""){
    $where_cond .= "publisher='$publisher' AND ";
    $isAllEmpty = false;
}
if(($year_min=$_POST['year_min'])!==""){
    $where_cond .= "year>'$year_min' AND ";
    $isAllEmpty = false;
}
if(($year_max=$_POST['year_max'])!==""){
    $where_cond.="year<'$year_max' AND ";
    $isAllEmpty = false;
}
if(($author=$_POST['author'])!==""){
    $where_cond.= "author='$author' AND ";
    $isAllEmpty = false;
}
if(($price_min=$_POST['price_min'])!==""){
    $where_cond.="price>'$price_min' AND ";
    $isAllEmpty = false;
}
if(($price_max=$_POST['price_max'])!==""){
    $where_cond.="price<'$price_max' AND ";
    $isAllEmpty = false;
}
if($isAllEmpty == true){
    $query = "SELECT * FROM book";
}else{
    $where_cond = substr($where_cond, 0, strlen($where_cond)-5);
    $query = "SELECT * FROM book WHERE ". $where_cond;
}



$firephp->log($query,"query");
$result=mysql_query($query);
$count=mysql_num_rows($result);
?>
<table class="table table-striped">
    <tr>
        <th>Book_ID</th>
        <th>Category</th>
        <th>Title</th>
        <th>Publisher</th>
        <th>year</th>
        <th>Author</th>
        <th>Price</th>
        <th>quantity_total</th>
        <th>quantity_available</th>
    </tr>
<?php
for($i=0;$i<$count;$i++){
        echo "<tr>";
	$row=mysql_fetch_array($result);
	echo "<td>".$row['book_id']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row["title"]."</td>";
        echo "<td>".$row['publisher']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['qty_total']."</td>";
        echo "<td>".$row['qty_available']."</td>";
        echo "<tr>";
}
?>
