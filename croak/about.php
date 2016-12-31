<?php

	include 'core.function.php';
	$facebrok = new facebrok();
	$facebrok->error_disable();
	if($facebrok->check_session()){

		?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><link rel="shortcut icon" href="asses/facebook.ico" />
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>FACEBROK Panel - templates</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><img src="asses/facebrok_icon.png"></h1>

		</div>
		<!-- End Logo + Top Nav -->
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="index.php" class="active"><span>Dashboard</span></a></li>
			    <li><a href="templates.php"><span>Templates</span></a></li>
			    <li><a href="spammer.php"><span>Spam</span></a></li>
			    <li><a href="config.php"><span>Config</span></a></li>
			    <li><a href="about.php"><span>About</span></a></li>
			    <li><a href="index.php?action=logout"><span>Log out</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">about</a>
			<span>&gt;</span>
			ABOUT
		</div>
		<!-- End Small Nav -->
		

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
		<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>ABOUT</h2>
					</div>
					<!-- End Box Head -->
					
						
						<!-- Form -->
						<div class="form">
								<p>
									<label>Project</label>
									<input class="field size4" name="name" value="facebrok" disabled type="text">
								</p>
																<p>
									<label>Version</label>
									<input class="field size4" name="name" value="1.9" disabled type="text">
								</p>								<p>
									<label>Author</label>
									<input class="field size4" name="name" value="RedToor" disabled type="text">
								</p>								<p>
									<label>Country</label>
									<input class="field size4" name="name" value="Colombia" disabled type="text">
								</p>								<p>
									<label>Contact   </label>
									<input class="field size4" name="name" value="redtoor@inbox.ru" disabled type="text">
								</p>								<p>
									<label>URL Project</label>
									<a href="https://facebrok.sourceforge.net"><input class="field size4" name="name" value="https://facebrok.sourceforge.net" disabled type="text"></a>
								</p>
								

				</div>
	</div>
</div>
<!-- End Container -->


</body>
</html>

		<?php }else{header("location: ../croak/");} ?>