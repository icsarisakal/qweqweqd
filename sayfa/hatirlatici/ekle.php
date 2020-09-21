<?php
$modultbl=z(8,'tbl');
$modulid=z(8,'id');
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	$_X['personel_ID']=z('lgn','ID');
	$_X['tarih']=z('datetime');
	$_X['tarihHatirlatici']=!empty($_X['tarihHatirlatici'])?$_X['tarihHatirlatici']:Null;
	$_X['tarihSaat']=!empty($_X['tarihSaat'])?$_X['tarihSaat']:Null;
	$_X['htarihsaat']=$htarihsaat;
	if(!empty($_X['gonderim']['departman'])){$_X['departman']=!empty($_X['gonderim']['departman'])?json_encode($_X['gonderim']['departman']):Null;}
	if(!empty($_X['gonderim']['departman'])){$_X['firmaTip']=!empty($_X['gonderim']['firmaTip'])?json_encode($_X['gonderim']['firmaTip']):Null;}
	if(!empty($_X['gonderim']['departman'])){$_X['rehberGrup']=!empty($_X['gonderim']['rehberGrup'])?json_encode($_X['gonderim']['rehberGrup']):Null;}
	if(!empty($_X['gonderim']['departman'])){$_X['herkes']=!empty($_X['gonderim']['herkes'])?json_encode($_X['gonderim']['herkes']):0;}
	if(!empty($_X['gonderim'])){unset($_X['gonderim']);}
	$_X['personelMulti']=!empty($_X['personelMulti'])?json_encode($_X['personelMulti']):Null;
	$_X['hftMulti']=!empty($_X['hftMulti'])?json_encode($_X['hftMulti']):Null;
	if(!empty($modultbl)){ $_X['hmodul']=$modultbl; }
	if(!empty($modulid)){ $_X['hmodul_ID']=$modulid; }
	$grsid=z('lgn','ID');
	if($_X['herkes']==2){
		$_X['personelMulti']='["'.$grsid.'"]';
	}

	postKontrolTh($_X); 
	//__($_X);
	$SID=z(2,$_X);
	if(!empty($modultbl)){
		$moduloku=z(1,$modulid,'',$modultbl);
		$ekleneceksid=$SID;
		$okunanht=$moduloku['hatirlaticilar'];
		if(!empty($moduloku['hatirlaticilar'])){
			$sonislem=$okunanht.','.$ekleneceksid;
		} else {
			$sonislem=$ekleneceksid;
		}
		z(3,$modulid,array('hatirlaticilar'=>$sonislem),$modultbl);
	}
	if(!empty($SID)){
		$_Log['sonuc']=1;
		$_Log['mesaj']="[PERSONEL] isimli kullanıcı ".$SID." nolu yeni hatırlatma ekledi.";
		require('parca/log.php');
		z(33,'ekle',1);
		if(!z(8,'ajaxform')){
			z('git','geri');
		}
	}
	else {
		$_Log['sonuc']=0;
		$_Log['mesaj']="[PERSONEL] isimli kullanıcı hatırlatma eklemeye çalıştı fakat başarısız oldu.";
		require('parca/log.php');
		z(33,'ekle',-1);
	}
	if(z(8,'ajaxform')){
		_z(33,'ekle');die;
	}
} ?>
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
						<tr><th colspan="2"><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a><input type="submit" value="Kaydet" /></th></tr>
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