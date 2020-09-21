<?php 
$firma=z(8,'firma');
$firma=z(1,array('arsiv'=>0,'firma_ID'=>$firma),'','kisi');
$json['sonuc']=1;
$json['cevap']= array(
	'firma'=>$firma
);
?>