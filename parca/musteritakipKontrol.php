<?Php session_start();ob_start();
require(__DIR__.'/../zcon.php');
$grsid=z('ID','lgn');
$prscek=z(1,$grsid,'ID,departmanlar','personel');
$prsorgu='';
/*
if(!empty($prscek['departmanlar'])){
	$prsexplode=explode(',', $prscek['departmanlar']);
	foreach ($prsexplode as $prex) {
		$prsorgu.='personelMulti LIKE \'%"'.$prex.'"%\' OR ';
	}
	$prsorgu.='1233';
	$prsorgu=str_replace(' OR 1233', '', $prsorgu);
}
$msorgu="WHERE arsiv='0' AND asama='0'".(!empty($prsorgu)?' AND '.$prsorgu:'');
$_ID=z(1,$msorgu,'ID','musteritakip');
$sure=z(8,'sure');

if(!empty($_ID)&&$sure){
	$SKsure=(int)z(11,'musteritakipKontrolSure');
	if($SKsure+$sure>time())$_SK=z(11,'musteritakipKontrol');
	$_IDx=!empty($_SK)?array_diff($_ID,$_SK):$_ID;
	if(!empty($_IDx)){
		z(11,'musteritakipKontrol',$_ID);
		z(11,'musteritakipKontrolSure',time());
	}else unset($_ID);
}
else if(!empty($_ID)&&z(8,'surex')){z(11,'musteritakipKontrolSure',time());}
*/
if(!empty($_ID))echo json_encode($_ID);
ob_end_flush()?>