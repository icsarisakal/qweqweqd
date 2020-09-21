<?php 
$ilce=z(8,'ilce');
$mahalle=z(1,array('mahalle_ilcekey'=>$ilce),'','mahalle');
$json['sonuc']=1;
$json['cevap']= array(
	'mahalle'=>$mahalle
);
?>