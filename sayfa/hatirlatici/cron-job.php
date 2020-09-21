<?php
$bugun=z('date');
$personelcek=z(1,'','','personel');
$kisicek=z(1,'','','kisi');

require(__DIR__.'/../hatirlatici/ajax-hatirlatici-kontrol.php');

$konu='Otomasyon sisteminden hatırlatıcınız bulunmakta';
$icerik='Otomasyon hatırlatıcı gönderimi';
$gonderenAdi='Orhan Tutum';
$replyPosta='noreply@orhantutum.com.tr';
$file = 'img/logo.png';
$kime='metehanozkan20@gmail.com';

//print_r($_Kendime);
$kpersonelioku=0;
$kpersonelioku=0;
if(!empty($_Kendime[0]['personel_ID'])){
	$kpersonelioku=$_Kendime[0]['personel_ID'];
}
if(!empty($_Kendime[0]['ID'])){
	$khatirlaticioku=$_Kendime[0]['personel_ID']; 
}

if(!empty($kpersonelioku)&&!empty($khatirlaticioku)){
	$erteleoku=z(1,"WHERE hatirlatici_ID = ".$khatirlaticioku." AND personel_ID = ".$kpersonelioku,'','erteleme');
	$erteleoku=z(1,"WHERE hatirlatici_ID = ".$khatirlaticioku." AND personel_ID = ".$kpersonelioku,'','erteleme');
	if(!empty($erteleoku)){
		//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
	}
}

// MAİL DENEME
foreach ($personelcek as $pcek) {
	//sleep(1);
	if(!empty($pcek['eposta'])){

		$pdepartman='';
		if(!empty($pcek['departmanlar'])){
			$pdepartman=$pcek['departmanlar'];
		}

		$pfirmatip='';
		if(!empty($pcek['firmaTipleri'])){
			$pfirmatip=$pcek['firmaTipleri'];
		}

		$prehbergrup='';
		if(!empty($pcek['rehberGruplar'])){
			$prehbergrup=$pcek['rehberGruplar'];
		}

		$konu='Otomasyon sisteminden size bir adet mesaj var!';
		//$icerik='Deneme mail gönderimi';
		$gonderenAdi='Otomasyon Sistemi';
		$replyPosta='noreply@orhantutum.com.tr';
		$file = 'img/logo.png';
		$kime=$pcek['eposta'];
		if(!empty($_Kendime)){
			foreach ($_Kendime as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihHatirlatici']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_KendimeHaftalik)){
			foreach ($_KendimeHaftalik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['hftMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_KendimeToplu)){
			foreach ($_KendimeToplu as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_Personelsec)){
			foreach ($_Personelsec as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihHatirlatici']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_PersonelsecHaftalik)){
			foreach ($_PersonelsecHaftalik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['hftMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_PersonelsecToplu)){
			foreach ($_PersonelsecToplu as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_TekSeferlik)){
			foreach ($_TekSeferlik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihHatirlatici']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_Haftalik)){
			foreach ($_Haftalik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['hftMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_Aylik)){
			foreach ($_Aylik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihHatirlatici']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_Yillik)){
			foreach ($_Yillik as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihHatirlatici']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		if(!empty($_Toplu)){
			foreach ($_Toplu as $gelensorgu) {
				$sayisorgu=0;
				$erteleme=z(1,array('hatirlatici_ID'=>$gelensorgu['ID'],'personel_ID'=>$pcek['ID']),'','erteleme');
				$ertmail=$erteleme[0]['mail'];
				$ertid=$erteleme[0]['ID'];
				$aciklama='';
				if(!empty($gelensorgu['aciklama'])){$aciklama ="Açıklama notu: ".$gelensorgu['aciklama']; }
				$icerik=$gelensorgu['tarihMulti']." tarihinde hatırlatıcınız mevcuttur. ".$aciklama;
				$tekdep=str_replace(array('"','[',']'),'', $gelensorgu['departman']);
				$tekdep4=explode(",", $tekdep);
				$tekfir=str_replace(array('"','[',']'),'', $gelensorgu['firmaTip']);
				$tekfir4=explode(",", $tekfir);
				$tekreh=str_replace(array('"','[',']'),'', $gelensorgu['rehberGrup']);
				$tekreh4=explode(",", $tekreh);
				if($sayisorgu==0&&!empty($gelensorgu['departman'])&&$ertmail==0){
					foreach ($tekdep4 as $tdp) {	
						if(strpos($pdepartman,$tdp) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['firmaTip'])&&$ertmail==0){
					foreach ($tekfir4 as $tfr) {	
						if(strpos($pfirmatip,$tfr) == true&&$sayisorgu==0){
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							$sayisorgu=1;
						}
					}
				}
				if($sayisorgu==0&&!empty($gelensorgu['rehberGrup'])&&$ertmail==0){
					foreach ($tekreh4 as $trh) {	
						if(strpos($prehbergrup,$trh) == true&&$sayisorgu==0){
							//if(!empty($erteleme)){ z(3,$ertid,array('mail'=>1),'erteleme'); }
							//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
							$sayisorgu=1;
						}
					}
				}
			}
		}
		//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
	} else {
		//log kaydı oluşturulabilir
		echo $pcek['ad'].' '.$pcek['soyad'].' adlı kullanıcının maili boş olduğu için işlem gerçekleşemedi'.'<br>';
	}

	if(!empty($pcek['tarihDogum'])){
		$konu='Otomasyon üzerinden deneme';
		$icerik=$pcek['ad'].' '.$pcek['soyad'].' adlı personelinizin bugün doğum günü bugünü ona özel hissettirebilirsiniz.';
		$gonderenAdi='Gönderen Orhan';
		$replyPosta='noreply@orhantutum.com.tr';
		$file = 'img/logo.png';
		$kime='metehanozkan20@gmail.com';
		//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
	} else {
		//log kaydı oluşturulabilir
		echo $pcek['ad'].' '.$pcek['soyad'].' adlı kullanıcının doğum tarihi boş olduğu için gönderilemedi'.'<br>';
	}
}

foreach ($kisicek as $kcek) {
	//sleep(1);

	if(!empty($kcek['tarihDogum'])){
		$konu='Otomasyon üzerinden deneme';
		$icerik='Doğum gününüz kutlu olsun sizinle bir ömür çalışmak dileğiyle..';
		$gonderenAdi='Gönderen Orhan';
		$replyPosta='noreply@orhantutum.com.tr';
		$file = 'img/logo.png';
		$kime=$kcek['eposta'];
		//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
	} else {
		//log kaydı oluşturulabilir
		echo $kcek['ad'].' '.$kcek['soyad'].' adlı kullanıcının doğum tarihi boş olduğu için gönderilemedi'.'<br>';
	}
}

// HATIRLATICI SAYFASININ OTOMATİK AYLIK VE YILLIK OLARAK ERTELEMESİ
$simdikitarih=z('datetime');
$tarih = strtotime($simdikitarih);
$guntarih = date("Y-m-d H:i:s", strtotime("+1 day", $tarih));
$ayliksorgu="WHERE arsiv = 0 AND tarihHatirlatici <= '".$guntarih."' AND tekrar = 3 ";
$aylik=z(1,$ayliksorgu,'','hatirlatici');
$yilliksorgu="WHERE arsiv = 0 AND tarihHatirlatici <= '".$guntarih."' AND tekrar = 4 ";
$yillik=z(1,$yilliksorgu,'','hatirlatici');
if(!empty($aylik)){
	foreach ($aylik as $ayl) {
		$time = strtotime($ayl['tarihHatirlatici']);
		$ayertele = date("Y-m-d H:i:s", strtotime("+1 month", $time));
		z(3,$ayl['ID'],array('tarihHatirlatici'=>$ayertele),'hatirlatici');
		$silsorgu="WHERE hatirlatici_ID = ".$ayl['ID'];
		z(4,$silsorgu,'erteleme');
	}
}
if(!empty($yillik)){
	foreach ($yillik as $yil) {
		$time = strtotime($yil['tarihHatirlatici']);
		$yilertele = date("Y-m-d H:i:s", strtotime("+1 year", $time));
		z(3,$yil['ID'],array('tarihHatirlatici'=>$yilertele),'hatirlatici');
		$silsorgu="WHERE hatirlatici_ID = ".$yil['ID'];
		z(4,$silsorgu,'erteleme');
	}
}
?>