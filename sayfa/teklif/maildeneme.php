<?php
$teklif=z(1,5,'','teklif');
$konu=$ayr['firmaAd'].' || Teklif Formu';
$icerik='sa';
$gonderenAdi=$ayr['siteAd'];
$replyPosta='noreply@orhantutum.com.tr';
$file='img/logo.png';
if(!empty($teklif['ek'])){
	$file='upload/ek/'.$teklif['ek'];
}
$kime='orhan.tutum@netadim.com.tr';
echo $konu.'<br>';
echo $icerik.'<br>';
echo $gonderenAdi.'<br>';
echo $replyPosta.'<br>';
echo $file.'<br>';
echo $kime.'<br>';
smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);

?>