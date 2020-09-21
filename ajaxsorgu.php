<?php 
include 'ayar.php';
if(z('lgn')){
 	$uid = z(9,'userid');
    $now_time = z('datetime');
    $array = ["girisTarih" => $now_time]; 
    z(3,'WHERE personel_ID = '.$uid,$array,'online');
}

?>