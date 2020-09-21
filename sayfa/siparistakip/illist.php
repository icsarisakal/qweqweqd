<?php 
$sehir=z(8,'sehir');
$ilce=z(1,array('ilce_sehirkey'=>$sehir),'','ilce');
$json['sonuc']=1;
$json['cevap']= array(
	'ilce'=>$ilce
);
?>