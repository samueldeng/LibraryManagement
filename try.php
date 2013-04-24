<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to the book searching service.</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html,
body {
height: 100%;
/* The html and body elements cannot have any padding or margin. */
}
/* Wrapper for page content to push down footer */
#wrap {
min-height: 100%;
height: auto !important;
height: 100%;
/* Negative indent footer by it's height */
margin: 0 auto -60px;
}
/* Set the fixed height of the footer here */
#push,
#footer {
height: 60px;
}
#footer {
background-color: #f5f5f5;
}
/* Lastly, apply responsive CSS fixes as necessary */
@media (max-width: 767px) {
#footer {
margin-left: -20px;
margin-right: -20px;
padding-left: 20px;
padding-right: 20px;
}
}
.form-signin {
max-width: 230px;
padding: 19px 29px 29px;
margin: 0 auto 20px;
background-color: #f5f5f5;
border: 1px solid #e5e5e5;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
font-size: 16px;
height: auto;
margin-bottom: 15px;
padding: 7px 9px;}

.container {
width: auto;
max-width: 680px;
}
.container .credit {
margin: 20px 0;
}
</style>
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
</head>

<body>
	<div id="wrap">
		
			<div class="navbar">
				<div class="navbar-inner">
					<a class="brand" href="try.php">Librarymanage System</a>
					<ul class="nav pull-right">
						<li><a href="try.php">Please Sign-in</a></li>
					</ul>
				</div>
			</div>
		
		<div class="container" >
			<form class="form-signin" id='login' action='./login.php' method='post' accept-charset='UTF-8'>
				<h2 class="form-signin-heading" >Please sign in</h2>
				<label for='username' >UserName:</label>
				<input class="input-large" type="text" placeholder="Please enter your username" name='username' id='username'>
				
				<label for='password' >Password:</label>
				<input class="input-large" type="password" placeholder="Please enter your password" name='password' id='password'>
				
				
				<div class="controls controls-row">			
                                    <div>
                                        <button class="btn btn-small btn-primary" type="submit">Sign for Admin</button>
                                    </div>
                                    
                                    <div>
                                        <a class="btn btn-small" href="./try_bookquery_reader.php">Sign for Reader </a>
                                    </div>
                                </div>
			</form>
		</div>
		<div id="push"></div>
	</div>
	
	<div id="footer">
		<div class="container" align="center">
			<p class="muted credit">
			Created by
			<a href="mailto:mr.dengshuoling@gmail.com?subject=Hello%20Shuoling!">@Shuoling Deng</a>
			,
			<a href="mailto:jenkliu@gmail.com?subject=Hello%20Jen!">@Jen Liu</a>
			and
			<a href="mailto:sdmorrisys@gmail.com?subject=Hello%20Shuo!">@Shuo Yang</a>
			.
			</p>
		</div>
	</div>
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
