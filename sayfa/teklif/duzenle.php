<?php
if(z(8,'id')){
$ID=z(8,'id');
$_T=z(7,'turun');
$teklif2=z(1,$ID,'',$tbl);
if(!empty($teklif2['teklif_ID'])){
$teklif=z(1,$teklif2['teklif_ID'],'',$tbl);
} else {
$teklif=z(1,$ID,'',$tbl);
}

if(z(7,$tbl)){
	//_z(7,'iplikno');die; 	
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!z(5,"WHERE arsiv='0' AND ad='".$_X['ad']."' AND ID<>'".$ID."'")){
		//if(empty($_X['atki']))$_X['atki']=0;

		// Ogrenci resimi yükleme başlangıcı
		$urund=z(10,$tbl);
		$dosya= $urund['ek'];
		//json_encode($dosya);
		//var_dump($dosya);
		//__($dosya); //EKRANA GELİYOR MU KONTROL ETTİR
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

		//$_X['ibFiyat']=z(36,$_X['ibFiyat']);
		postKontrolTh($_X);
		$_X['fiyat']=z(36,$_X['fiyat']);
		$_X['fiyatiskontosuz']=z(36,$_X['fiyatiskontosuz']);
		
		//__($_X);
		if(z(3,$ID,$_X)){
			if(empty($_T)){
				z(4, "WHERE teklif_ID='".$ID."' ",'teklifurun'); 
			} 
			z(4, "WHERE teklif_ID='".$ID."' ",'teklifurun'); 
			foreach ($_T as $turun) {
					z(2,array('teklif_ID'=>$ID,'personel_ID'=>z('lgn','ID'),'tarih'=>z('datetime'),'urun_ID'=>$turun['urun_ID'],'img'=>$turun['img'],'adet'=>$turun['adet'],'fiyat'=>z(36,$turun['fiyat']),'toplam'=>z(36,$turun['toplam']),'ozellik'=>$turun['ozellik']),'teklifurun');
			}
			z(33,'duzenle',1);
			z('git','?s='.$syf.'&a=detay&id='.$ID);
		
	}
		else z(33,'duzenle','-1');
	//}
	//else {z(33,'duzenle',3);$_XAd=$_X['ad'];}
}


$altRevizeAdet=z(5,"WHERE arsiv='0' AND teklif_ID='".$ID."'",'ID','teklif');
if(empty($altRevizeAdet)){


$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
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
	<div class="baslik"><h3>Modül Düzenle</h3></div>
    <div class="icerik">
    	<?php switch(z(33,'duzenle')){
			case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
			case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
			case 3:_uyr(2,'<strong>'.(!empty($_XAd)?$_XAd:'').'</strong> daha önceden kaydedilmiş. Lütfen kontrol ediniz veya başka bir isim kullanınız.');break;
			case -1:_uyr(0,'Güncelleme başarısız');break;
		}?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="blok">
	        			<?php require(__DIR__.'/sozlesme.php'); ?>
                <table cellpadding="0" cellspacing="0">
	        		<tbody>
	        			<?php /*/ ?>
						<tr><th><?php echo $metin[3]; ?></th><td><input type="text" name="<?php echo $tbl?>[ad]" autofocus="autofocus" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" /></td></tr>

						<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
	                    <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:0))?></td></tr>
	                    <?php }?>
						
						<tr><th>Atkı</th><td>
							<label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /></label>
						</td></tr>
						<tr><th>nex</th><td><input type="text" name="<?php echo $tbl?>[ne]" value="<?php echo !empty($_X['ne'])?z(36,$_X['ne'],2):''?>" /></td></tr>
						<tr><th>Peşin F.</th><td><input type="text" name="<?php echo $tbl?>[fiyat]" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],2):''?>" /></td></tr>
						<tr><th>İplik B. F.</th><td><input type="text" name="<?php echo $tbl?>[ibFiyat]" value="<?php echo !empty($_X['ibFiyat'])?z(36,$_X['ibFiyat'],2):''?>" /></td></tr>
	        			<?php /*/ ?>


	        			<tr>
	        				<td style="padding: 1em;">
	        					<center>
	        						<input type="submit" value="SADECE KAYDET" style="font-size: 20px;" />&nbsp;
	        						<input type="submit" 
	        							formaction="?s=teklif&a=ekle&teklifid=<?php if(!empty($teklif['teklif_ID'])){echo $teklif['teklif_ID'];} else {echo $ID;} ?>&revizeid=<?php if($_X['revizeNo']==0){echo '1';}elseif($_X['revizeNo']>=0){echo $_X['revizeNo']+1;}else{echo '1';} ?>"
	        							value="YENİ REVİZE OLARAK KAYDET" style="font-size: 20px;" 
	        						/>
	        					</center>
	        				</td>
	        			</tr>

	                </tbody>
	                    
        			<?php /*/ ?>
                    <tr><th colspan="2">
                    	<a href="?s=<?php echo $tbl; ?>&a=listele" class="btnSub btn1 printx"><img src="img/geri.png" height="20" /> GERİ</a>
                    	<input type="submit" value="Kaydet" />
                    </th></tr>
        			<?php /*/ ?>

	            </table>
            </div>
            <input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
            
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



<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>

<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Bu teklifin revize kaydı bulunuyor, o sebeple düzenlenemez.</div></div></div>
<?php }?>
<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>