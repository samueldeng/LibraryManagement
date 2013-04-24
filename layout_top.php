
	<body>
		<div id="wrap">

			<div class="navbar">
				<div class="navbar-inner">
					<a class="brand" href="try_bookentry_single.php">Librarymanage System</a>
					<ul class="nav">
						<li><a href="try_bookquery.php">Book_query</a></li>
					</ul>

					<?php if($_SESSION['admin_name']) : ?>
						<ul class="nav nav-tabs">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								Book_manage<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
								<li><a href="try_bookborrow.php">Book_borrow</a></li>
								<li><a href="try_bookreturn.php">Book_return</a></li>
								
								 <li class="dropdown-submenu">
									 <a tabindex="-1" href="#">Book_entry</a>
									 <ul class="dropdown-menu">
									 <li><a href="try_bookentry_single.php">Book_entry_single</a></li>
									 <li><a href="try_bookentry_multiple.php">Book_entry_multiple</a></li>
									 </ul>
								</li>
								</ul>
							</li>
						</ul>

						<ul class="nav nav-tabs">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								Card_manage<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
								<li><a href="try_card_add.php">Card_add</a></li>
								<li><a href="try_card_delete.php">Card_delete</a></li>
								</ul>
							</li>
						</ul>
									
						<ul class="nav pull-right">
							<li><a href="logout.php">Exit</a></li>
						</ul>
						<p class="navbar-text" align="right">Hello, <?php echo $_SESSION['admin_name'] ?>!<!--here maybe need a php transfered information-username--></p>

					<?php else : ?>
						<a class="navbar-text" align="right" href="try.php">Login</a>
					<?php endif ?>
				</div>
			</div>
