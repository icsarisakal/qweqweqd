<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$_K=z(7,'kisi');
	$_Kg=z(7,'kisigonder');
	z(6,$tbl);
	$_X['personel_ID']=z('lgn','ID');
	$_X['tarih']=z('datetime');
	$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
	$_X['eposta']=!empty($_X['eposta'])?$_X['eposta']:'';
	$_X['bolge_ID']=!empty($_X['bolge_ID'])?$_X['bolge_ID']:'0';
	$_X['sehir_ID']=!empty($_X['sehir_ID'])?$_X['sehir_ID']:'0';
	$_K['kisiad'] = !empty($_K['kisiad']) ? $_K['kisiad'] : '';
	$_K['kisisoyad'] = !empty($_K['kisisoyad']) ? $_K['kisisoyad'] : '';
	$_K['kisitel'] = !empty($_K['kisitel']) ? $_K['kisitel'] : '';
	
	
	/*/
	if(empty($_X['ilgili'])){unset($_X['ilgili']);}
	if(empty($_X['unvani'])){unset($_X['unvani']);}
	if(empty($_X['fax'])){unset($_X['fax']);}
	if(empty($_X['eposta'])){unset($_X['eposta']);}
	if(empty($_X['vergiD'])){unset($_X['vergiD']);}
	if(empty($_X['vergiNo'])){unset($_X['vergiNo']);}
	if(empty($_X['adresFatura'])){unset($_X['adresFatura']);}
	if(empty($_X['adresSevk'])){unset($_X['adresSevk']);}
	if(empty($_X['firmaTip'])){unset($_X['firmaTip']);}
	if(empty($_X['tel'])){unset($_X['tel']);}
	/*/
	$kisiler= $_Kg['kisiler'];
	

	postKontrolTh($_X);

	//__($_X);
	
	$SID=z(2,$_X);
	if(!empty($SID)){
		if(!empty($kisiler)){
			foreach ($kisiler as $kisi) {
				z(3,$kisi['kisi_ID'],array('firma_ID'=>$SID),'kisi');
			}
		}

		if(!empty($_K['kisiad'])){
			z(2,array('firma_ID'=>$SID,'ad'=>$_K['kisiad'],'soyad'=>$_K['kisisoyad'],'telCep1'=>$_K['kisitel'],'tarih'=>z('datetime')),'kisi');
		}
		
		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','geri');
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
				'bolge_ID'=>$_X['bolge_ID'],
				'sehir_ID'=>$_X['sehir_ID']
			);
		}

		$json['mesaj']="Ekleme işlemi başarılı.";


	}
	else {
		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',-1);
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=0;
			$json['cevap']="";
			$json['mesaj']="Ekleme işlemi başarısız.";
		}
	}

}

//En kritik json sonucunu ekrana basan kod
if(z(8,'ajaxform')){
	echo json_encode($json);
	//_z(33,'ekle');
	die;
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
			<div class="blok">
				<div style="background: #00f5; border: 1px solid #fff; overflow: hidden;">
					<span style="color:#fff;">Firmanın Kişileri	</span>
					<span class="kisiekleme" style="color:#fff; background: #4cd82c9e; cursor: pointer; float: right;">Yeni Kişi Ekle</span>
				</div>
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th>Ad</th>
							<th>Soyad</th>
							<th>Tel</th>
							<th>Unvan</th>
						</tr>
					</thead>
					<tbody class="kisilerisec">
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

