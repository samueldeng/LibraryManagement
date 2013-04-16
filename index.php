<!DOCTYPE html>    
<html>
	<head>
		<title>LibraryManagement:Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
<body>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<form id='login' action='./login.php' method='post' accept-charset='UTF-8'>
		<fieldset>
			<legend>Login</legend>
			 
			<label for='username' >UserName:</label>
			<input type='text' name='username' id='username'/>
			 
			<label for='password' >Password:</label>
			<input type='password' name='password' id='password'/>
			 
			<input  type='submit' name='Submit' value='Submit' />
	 
		</fieldset>
	</form>	
</body>
 </html>

