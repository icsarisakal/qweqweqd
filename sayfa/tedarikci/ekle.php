<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$markalar=(!empty($_X['markalar'])?array_filter($_X['markalar']):'');
				if(!empty($markalar)){$markalar=!empty($markalar)?json_encode($markalar):Null;}
				$_X['markalar']=(!empty($markalar)?$markalar:'');
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
				//$_X['atki']=z('sayi',$_X['atki']);

				postKontrolTh($_X);





				//__($_X);
				$SID=z(2,$_X,$tbl);
				if(!empty($SID)){


		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','geri');
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
				'soyad'=>$_X['soyad'],
				'telCep1'=>$_X['telCep1'],
				'unvan'=>$_X['unvan'],
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
            			<tr>
            				<th colspan="2">
            					<a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a>
	            				<input type="submit" value="Kaydet"  tabindex="1" />
	            			</th>
	            		</tr>

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

