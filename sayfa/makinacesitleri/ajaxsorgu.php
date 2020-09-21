<?php 
$pus=z(8,'pus');
$fayn=z(8,'fayn');
$sorgu="WHERE arsiv='0' AND pus='".$pus."' AND fayn='".$fayn."'";
$makinaparkuru=z(1,$sorgu,'','makinaparkuru');
$makinaparkuru=$makinaparkuru[0];

$json['sonuc']=1;
$json['cevap']= array(
	'makinaparkuru'=>$makinaparkuru,
);
?>