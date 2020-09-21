<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$_H=z(7,'hatirlatici');
	$_X['personel_ID']=z('lgn','ID');
	$_X['tarih']=z('datetime');
	$SHID='';

	if(!empty($_H['secim'])){
		$_H['personel_ID']=z('lgn','ID');
		$_H['tarih']=z('datetime');
		$_H['tarihHatirlatici']=!empty($_H['tarihHatirlatici'])?$_H['tarihHatirlatici']:Null;
		$_H['tarihSaat']=!empty($_H['tarihSaat'])?$_H['tarihSaat']:Null;
		if(!empty($_H['gonderim']['departman'])){$_H['departman']=!empty($_H['gonderim']['departman'])?json_encode($_H['gonderim']['departman']):Null;}
		if(!empty($_H['gonderim']['departman'])){$_H['firmaTip']=!empty($_H['gonderim']['firmaTip'])?json_encode($_H['gonderim']['firmaTip']):Null;}
		if(!empty($_H['gonderim']['departman'])){$_H['rehberGrup']=!empty($_H['gonderim']['rehberGrup'])?json_encode($_H['gonderim']['rehberGrup']):Null;}
		if(!empty($_H['gonderim']['departman'])){$_H['herkes']=!empty($_H['gonderim']['herkes'])?json_encode($_H['gonderim']['herkes']):0;}
		if(!empty($_H['gonderim'])){unset($_H['gonderim']);}
		$_H['personelMulti']=!empty($_H['personelMulti'])?json_encode($_H['personelMulti']):Null;
		$_H['hftMulti']=!empty($_H['hftMulti'])?json_encode($_H['hftMulti']):Null;
		$grsid=z('lgn','ID');
		if($_H['herkes']==2){
			$_H['personelMulti']='["'.$grsid.'"]';
		}
		$_H['hmodul']=$tbl;

		$SHID=z(2,$_H,'hatirlatici');

		$_X['hatirlaticilar']=$SHID;
		$_X['hatirlaticiVar']=1;
	} else {
		unset($_H);
	}
	unset($_X['check']);
	postKontrolTh($_X);


	$SID=z(2,$_X,$tbl);
	if(!empty($SID)){
		if(!empty($_X['asamais'])){
			z(2,array('durum'=>$_X['asamais'],'personel_ID'=>$_X['personel_ID'],'modul_ID'=>$SID,'modul'=>$tbl,'tarih'=>$_X['tarih'],'aciklama'=>$_X['aciklama']),'asama');
		}
		$_Log['sonuc']=1;
		$_Log['mesaj']="[PERSONEL] isimli kullanıcı ".$SID." nolu yeni iş takibi(musteritakip) ekledi.";
		require('parca/log.php');
		z(33,'ekle',1);

		if(!empty($SHID)){
			z(3,$SHID,array('hmodul_ID'=>$SID),'hatirlatici');
		}

		if(!z(8,'ajaxform')){
			z('git','?s='.$syf.'&a=listele');
		}

	}
	else {
		$_Log['sonuc']=0;
		$_Log['mesaj']="[PERSONEL] isimli kullanıcı iş takibi(musteritakip) eklemeye çalıştı fakat başarısız oldu.";
		require('parca/log.php');
		z(33,'ekle',-1);
	}

	if(z(8,'ajaxform')){
		_z(33,'ekle');die;
	}
}

?>
<div class="sayfa">
	<div class="baslik"><h3><?php echo $metin['menu_yeni_ekle']; ?></h3></div>
	<div class="icerik">
		<?php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
			case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
		}?>

		<form action="" method="post" id="siparisdetay_ekle">
			<div class="blok">
				<table cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th colspan="2">YENİ GİRDİ EKLE</th>
						</tr>
						<?php require(__DIR__.'/ekle_prc.php'); ?>

					</tbody>
				</table>
			</div>
		</form>


	</div>
</div>


<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI -->
<?php if(!empty($hizliEkleForm)) foreach ($hizliEkleForm as $hef) {
	if(file_exists(__DIR__.'/../'.$hef.'/hizli-ekle-form.php')){
		$formAdi=$hef;
		require(__DIR__.'/../'.$hef.'/hizli-ekle-form.php'); 
	}
}?>
<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI SON -->


<!-- AÇILIR NESNE EKLEME FORMU -->
<?php require(__DIR__.'/../../parca/nesne-hizli-ekle-form.php'); ?>
<!-- AÇILIR NESNE EKLEME FORMU SON -->

