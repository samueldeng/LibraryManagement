<form id="bookQueryForm" method="post" action="single_book_entry.php">
	ISBN: <input type="text" name="book_id" />
	category:<input type="text"	name="category" />
	title:<input type="text"	name="title" /> 
	Author: <input type="text" name="author" />
	publisher:<input type="text"	name="publisher" />
	year:<input type="text"	name="year"	/>
	price:<input type="text"	name="price"/>
	quantity: <input type="text"	name="qty_total"/>
	<input type="submit" value="submit"/>
</form>

<br/><br/>
<form enctype="multipart/form-data" action="multi_book_entry.php" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
	Choose a file to upload: <input name="uploadedfile" type="file" /><br />
	<input type="submit" value="Upload File" />
</form>
