<?php 
/*/
$tarihoku=z('date');
$giturl = "https://metehanozkn2.github.io/site/site.json";
$jsonveri = file_get_contents($giturl);
$jsonveri_data = json_decode($jsonveri, true);
$domainsorgu=$jsonveri_data["durum"];
$domainbildiri=$jsonveri_data["bildiri"];
$domainsorgu2=explode(',', $domainsorgu);
$domainadi=$_SERVER['SERVER_NAME'];
$ip='';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
}
$kullanicicek='';
$sifrecek='';
$panelbilgi='';
if(z('lgn')){
	if(!empty(z(11,'kullanicibilgi'))){
		$kullanicicek=z(11,'kullanicibilgi');
	}
	if(!empty(z(11,'sifrebilgi'))){
		$sifrecek=z(11,'sifrebilgi');
	}
	$panelbilgi=' Giriş Yaptığı Kullanıcı Adı=>'.$kullanicicek.'<br> Giriş Yaptığı Kullanıcı Sifresi=>'.$sifrecek;
}
$uyarimetnidir='';
if(!empty($domainsorgu2)){
	if (!in_array($domainadi, $domainsorgu2)) {
		$uyarimetnidir='İhlali yapan site=>'.$domainadi.'<br>İzin verilen domainler bunlardır=>'.$domainsorgu.'<br>İp adresi budur=>'.$ip;
		$icerik=$uyarimetnidir.$panelbilgi;
		$kime='metehanozkan20@gmail.com';
		$konu='Sistemde açık var dikkat Bilgisi';
		$gonderenAdi='Gönderen Sistem';
		$replyPosta='metenetadim@hotmail.com';
		$uyaritarih=(!empty(z(11,'uyaritarih'))?z(11,'uyaritarih'):'');
		if($tarihoku!=$uyaritarih){
			//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta);
			z(11,'uyaritarih',$tarihoku);
		}
		if($domainbildiri=='acik'){
			$domainmetin=(!empty($jsonveri_data["metin"])?$jsonveri_data["metin"]:'');
			if(!empty($domainmetin)){
				//echo '<b style="font-size:50px;">'.$domainmetin.'<b>';
				//exit;
			}
		}
	}
}
/*/
?>