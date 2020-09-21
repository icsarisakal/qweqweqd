<?php 
$firma=z(8,'firma');
$kisi=z(1,array('firma_ID'=>$firma),'','kisi');
$firma=z(1,$firma,'','firma');
$json['sonuc']=1;
$json['cevap']= array(
	'kisi'=>$kisi,
	'firma'=>$firma,
);
?>