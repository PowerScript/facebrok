<?php
	$version="1.9";
    function check_install(){if(!file_exists("croak/configuration.php")) {header("location:croak/install/");}}
	function check_install_in_croak(){if(!file_exists("configuration.php")) {header("location:install/");}}

?>