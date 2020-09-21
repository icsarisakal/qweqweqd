<?Php
exit;
session_start();ob_start();
require(__DIR__.'/../zcon.php');
$_ID=z(1,"WHERE arsiv='0' AND durum='0'",'ID','sepet');
$sure=z(8,'sure');
if(!empty($_ID)&&$sure){
	$SKsure=(int)z(11,'siparisKontrolSure');
	if($SKsure+$sure>time())$_SK=z(11,'siparisKontrol');
	$_IDx=!empty($_SK)?array_diff($_ID,$_SK):$_ID;
	if(!empty($_IDx)){
		z(11,'siparisKontrol',$_ID);
		z(11,'siparisKontrolSure',time());
	}else unset($_ID);
}
else if(!empty($_ID)&&z(8,'surex')){z(11,'siparisKontrolSure',time());}
if(!empty($_ID))echo json_encode($_ID);
ob_end_flush()?>