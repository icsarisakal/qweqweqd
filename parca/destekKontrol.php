<?Php session_start();ob_start();
require(__DIR__.'/../zcon.php');
$admn=0;//z('lgn','admin');
$pid=z('lgn','ID');
$dprtmnSd='';
if(!$admn){$departmanlar=z(1,$pid,'ddepartmanlar','personel');if(!empty($departmanlar)){$_Exp=explode(',',$departmanlar);if(!empty($_Exp))foreach($_Exp as $fed){if(!empty($fed)){if(!empty($dprtmnSd))$dprtmnSd.=" OR ";$dprtmnSd.="nesne_IDddepartman='".$fed."'";}}}if(!empty($dprtmnSd))$dprtmnSd=" AND (".$dprtmnSd.")";else $dprtmnSd=" AND 0";}
$px=z(1,"WHERE personel_ID='".$pid."' AND tip='destek' LIMIT 1",'duzenle','yetki');
$ytkl=$admn||$px[0];
$_Destek=z(1,"WHERE arsiv='0' AND ".(!empty($ytkl)?"durum<2 ".($admn?'':$dprtmnSd):"durum='2' AND personel_ID='".$pid."'")." ORDER BY oncelik DESC",'ID,baslik,personel_ID,nesne_IDddepartman','destek');
$sure=z(8,'sure');
if(!empty($_Destek)&&$sure){
	$_ID=array();
	foreach($_Destek as $dstk)$_ID[]=$dstk['ID'];
	$SKsure=(int)z(11,'destekKontrolSure');
	if($SKsure+$sure>time())$_SK=z(11,'destekKontrol');
	$_IDx=!empty($_SK)?array_diff($_ID,$_SK):$_ID;
	if(!empty($_IDx)){
		z(11,'destekKontrol',$_ID);
		z(11,'destekKontrolSure',time());
	}else unset($_ID);
}
else if(!empty($_Destek)&&z(8,'surex')){z(11,'destekKontrolSure',time());}
if(!empty($_ID)){
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Nesne[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	$destekler='';foreach($_Destek as $dstk){$destekler.='• <b><a href="?s=destek&a=detay&id='.$dstk['ID'].'">'.$_Nesne[$dstk['nesne_IDddepartman']]['metin1'].' -> '.$dstk['baslik'].'</a></b>'.(!empty($ytkl)?'&nbsp;&nbsp;(Yazan: <strong>'.$_Personel[$dstk['personel_ID']]['ad'].'</strong>)':'').'<br>';}
	echo json_encode(array(
		'mesaj'=>(!empty($ytkl)
		?'Cevap bekleyen '.count($_ID).' adet destek talebi var. Lütfen kontrol ediniz.<br><br>'.$destekler
		:'Destek talebiniz cevaplandı.<br><br>'.$destekler)
	));
}
ob_end_flush()?>