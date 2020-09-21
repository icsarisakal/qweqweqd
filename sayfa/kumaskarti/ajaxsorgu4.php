<?php 
$yedekparcaall=z(1,'','ID,ad,img,anahtar','yedekparca');
$yedekparcaall=z(37, $yedekparcaall);
$json['sonuc']=1;
$json['cevap']= array(
	'yedekparcaall'=>$yedekparcaall,
);
?>