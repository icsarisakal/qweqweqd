<?php 
$acilis=z(8,'acilis');
$kapanis=z(8,'kapanis');
$pamukcek=z(1,"ORDER BY ID DESC",'','pamuk');
$pamukcek=$pamukcek[0];
$pamukcektarih=$pamukcek['tarih'];
$pamukcektarih=z('tarih',$pamukcektarih);
$tarih=z('tarih');
$tarih2=z('datetime');
if($tarih!=$pamukcektarih||empty($pamukcek)){
    $pamukarray=array();
    $pamukarray['tarih']=$tarih2;
    $pamukarray['acilis']=$acilis;
    $pamukarray['kapanis']=$kapanis;
    z(2,$pamukarray,'pamuk');
    z('git','yenile');

}

$json['sonuc']=1;
?>