<?php 
$konu='Otomasyon üzerinden deneme';
$icerik='Deneme mail gönderimi';
$gonderenAdi='Gönderen Orhan';
$replyPosta='noreply@orhantutum.com.tr';
$file = 'img/logo.png';
$personelcek=z(1,'','','personel');
foreach ($personelcek as $pcek) {
	if(!empty($pcek['eposta'])){
		$kime=$pcek['eposta'];
		//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
	} else {
		//log kaydı oluşturulabilir
		echo $pcek['ad'].' '.$pcek['soyad'].' adlı kullanıcının maili boş olduğu için gönderilemedi'.'<br>';
	}
}
?>