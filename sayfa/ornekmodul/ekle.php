<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
				//$_X['atki']=z('sayi',$_X['atki']);

				postKontrolTh($_X);




				//__($_X);
				$SID=z(2,$_X);
				if(!empty($SID)){
					z(33,'ekle',1);

					// Mamul Bez Stok girdisi oluştur


					/*/ 
					// Ana girdi başarıyla eklendikten sonra ihtiyaç var ise ilişkili tabloya girdi ekleme kodları
					unset($_X['ad'],$_X['numuneAdi'],$_X['hamkumasstok_ID']);
					$_X['mamulkumas_ID']=$SID;
					$mamulbezstok_ID=z(2,$_X,'mamulbezstok');
					for ($i=0; $i < 30; $i++) { 
						$_XDty=array(
							'mamulkumas_ID'=>$SID,
							'tarih'=>$_X['tarih'],
							'ad'=>'',_NSN
							'kod'=>''
						);
						$mamulkumasdetay_ID=z(2,$_XDty,$tbl.'detay');

						unset($_XDty['ad'],$_XDty['kod']);
						$_XDty['mamulbezstok_ID']=$mamulbezstok_ID;
						$_XDty['mamulkumasdetay_ID']=$mamulkumasdetay_ID;
						z(2,$_XDty,'mamulbezstokdetay');
					}
					/*/

					if(!z(8,'ajaxform') || empty($ajaxAnahtar)){
						z('git','geri');
					}
					
					//unset($_X);
				}
				else z(33,'ekle',-1);
			//}
			//else z(33,'ekle',3);
		//}
		//else z(33,'ekle',12);
	//}
	//else z(33,'ekle',11);

}
	if(z(8,'ajaxform') || !empty($ajaxAnahtar)){
		_z(33,'ekle');die;
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

