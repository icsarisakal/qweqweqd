
<?php
$mustbl=z(8,'mustbl');
$musid=z(8,'musid');
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$_T=z(7,'turun');
	$revizesorgu=0;
	if(!empty(z(8,'teklifid'))){$_X['teklif_ID']=z(8,'teklifid');}
	if(!empty(z(8,'revizeid'))){$revizesorgu=z(8,'revizeid');}
	
	$_X['revizeNo']=$revizesorgu;
	z(6,$tbl);
	//if(!empty($_X['ad'])){

		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				//$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
				$_X['kdv']=z(36,$_X['kdv']);
				$_X['iskonto']=z(36,$_X['iskonto']);
				$_X['fiyat']=z(36,$_X['fiyat']);
				$_X['fiyatiskontosuz']=z(36,$_X['fiyatiskontosuz']);


				// Ogrenci resimi yükleme başlangıcı
				$urund=z(10,$tbl);
				$dosya= $urund['ek'];
				//json_encode($dosya);
				//var_dump($dosya);
				//__($dosya); EKRANA GELİYOR MU KONTROL ETTİR
				if(in_array($dosya['type'], array('image/jpg','image/jpeg','image/pjpeg','image/png','age/x-png','image/gif'))){
					$dosyaAd=z('yukle',__DIR__.'/../../upload/ek',$dosya,50);
				}
				if(in_array($dosya['type'], array('application/octet-stream','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/msword','application/pdf'))){
					$dosyaAd=z('yukle',__DIR__.'/../../upload/ek',$dosya); 
				}
				//echo $dosyaAd;
				//exit;
				if (!empty($dosyaAd)) {
					$_X['ek']=$dosyaAd;
				}
				// Ogrenci resimi yükleme bitisi

				postKontrolTh($_X);

				$SID=z(2,$_X);
				$nesneProformaNo=z(1,array('ad'=>'teklifAyar','metin1'=>'proformaNo'),'ID,sayi1','nesne');
				$proid=$nesneProformaNo[0]['ID'];
				$yenino=$nesneProformaNo[0]['sayi1']+1;
				
				
				if(!empty($SID)){
					if(!empty($nesneProformaNo)){
						z(3,$proid,array('sayi1'=>$yenino),'nesne');
					}

					foreach ($_T as $turun) {
					z(2,array('teklif_ID'=>$SID,'personel_ID'=>$_X['personel_ID'],'tarih'=>$_X['tarih'],'urun_ID'=>$turun['urun_ID'],'img'=>$turun['img'],'adet'=>$turun['adet'],'fiyat'=>z(36,$turun['fiyat']),'toplam'=>z(36,$turun['toplam']),'ozellik'=>$turun['ozellik']),'teklifurun');
					}

					// Beş gün sonrasına otomatik hatırlatma ekle
					z(2,array(
						'personel_ID'=>$_X['personel_ID'],
						'bildirimPanel'=>1,
						'bildirimEposta'=>1,
						'bildirimSms'=>1,
						'herkes'=>2,
						'tarih'=>$_X['tarih'],
						'tarihHatirlatici'=>z('date','+5 days').' 10:00:00',
						'tarihTakvim'=>z('date','+5 days'),
						'ad'=>'Otomatik oluşan teklif hatırlatması. Proforma No: '.$_X['proformaNo'],
						'hmodul'=>'teklif',
						'hmodul_ID'=>$SID,
						'aciklama'=>'Teklif oluşumu üzerinden beş gün geçmiş. <br>Lütfen akıbetini kontrol ediniz. <br>Proforma No: '.$_X['proformaNo'],
						'personelMulti'=>json_encode(array($_X['personel_ID']))
					),'hatirlatici');

					z(33,'ekle',1);
					
				if(!empty($SID)){
					/*/
					if(!empty(z(8,'teklifid'))){
						z(3,$_X['teklif_ID'],array('revizeNo'=>$revizesorgu),$tbl);
					}
					/*/
					if(!empty($musid)){
						z(3,$musid,array('teklifVar'=>1),'musteritakip');
						z(3,$SID,array('musteritakip_ID'=>$musid),'teklif');
					}
					z(33,'ekle',1);
					z('git','?s=teklif&a=detay&id='.$SID.'&mustbl='.$mustbl.'&musid='.$musid);//kaydet işlemi tamamlandı geriye yönlerdir//			

				}
					if(!z(8,'ajaxform')){

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

	if(z(8,'ajaxform')){
		_z(33,'ekle');die;
	}
}

?>
<style type="text/css">
	.teklifsubmitkilit{
		display: none;
		background: black;
		opacity: 0.8;
		position: fixed;
		left: 0px;
		right: 0px;
		top: 0px;
		bottom: 0px;
	}
	.teklifsubmitkilit span{
		position: absolute;
		color: white;
		top: 320px;
		text-align: center;
		left: 320px;
		font-size: 50px;
	}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $("form").submit(function(){
            $(".teklifsubmitkilit").show();
        });
    });
</script>
<div class="teklifsubmitkilit">
	<span>İşleme alınıyor..</span>
</div>
<div class="sayfa">
	<div class="baslik"><h3><?php echo $metin['menu_yeni_ekle']; ?></h3></div>
    <div class="icerik">
    	<?php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Teklif başarıyla oluşturuldu.');break;
			case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
			case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
		}?>


        <form action="" method="post" id="siparisdetay_ekle" enctype="multipart/form-data">
        	<div class="blok">
			    <?php require(__DIR__.'/sozlesme.php'); ?>
		        <table cellpadding="0" cellspacing="0">
		        	<tbody>
		        		<tr>
		        			<td style="padding: 1em;">
					        	<center><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 10px;">İptal</a><input type="submit" value= "Kaydet"style= "font-size: 20px;"/></center>
		        			</td>
		        		</tr>
			        </tbody>
			    </table>

			    
		    </div>
        	<p>&nbsp;</p>
        	<p>&nbsp;</p>
        	<p>&nbsp;</p>
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

