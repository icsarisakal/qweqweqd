<?php
$id=z(8,'id');
if(z(8,'id')){
	$ID=z(8,'id');

	if(z(7,$tbl)){
	//_z(7,'iplikno');die; 	
		$_X=z(7,$tbl);
		z(6,$tbl);
	//if(!z(5,"WHERE arsiv='0' AND ad='".$_X['ad']."' AND ID<>'".$ID."'")){
		//if(empty($_X['atki']))$_X['atki']=0;
		$_X['tarihHatirlatici']=!empty($_X['tarihHatirlatici'])?$_X['tarihHatirlatici']:Null;
		$_X['bildirimPanel']=!empty($_X['bildirimPanel'])?$_X['bildirimPanel']:0;
		$_X['bildirimEposta']=!empty($_X['bildirimEposta'])?$_X['bildirimEposta']:0;
		$_X['bildirimSms']=!empty($_X['bildirimSms'])?$_X['bildirimSms']:0;
		$_X['herkes']=!empty($_X['herkes'])?$_X['herkes']:0;
		if(!empty($_X['gonderim']['departman'])){$_X['departman']=!empty($_X['gonderim']['departman'])?json_encode($_X['gonderim']['departman']):Null;}
		if(!empty($_X['gonderim']['departman'])){$_X['firmaTip']=!empty($_X['gonderim']['firmaTip'])?json_encode($_X['gonderim']['firmaTip']):Null;}
		if(!empty($_X['gonderim']['departman'])){$_X['rehberGrup']=!empty($_X['gonderim']['rehberGrup'])?json_encode($_X['gonderim']['rehberGrup']):Null;}
		if(!empty($_X['gonderim']['herkes'])){$_X['herkes']=$_X['gonderim']['herkes']=!empty($_X['gonderim']['herkes'])?$_X['gonderim']['herkes']:0;}
		if(!empty($_X['gonderim'])){unset($_X['gonderim']);}
		$_X['personelMulti']=!empty($_X['personelMulti'])?json_encode($_X['personelMulti']):Null;
		$_X['hftMulti']=!empty($_X['hftMulti'])?json_encode($_X['hftMulti']):Null;
		$grsid=z('lgn','ID');
		if($_X['herkes']==2){
			$_X['personelMulti']='["'.$grsid.'"]';
		}


		//$_X['ibFiyat']=z(36,$_X['ibFiyat']);
		postKontrolTh($_X);
		//__($_X);
		if(z(3,$ID,$_X)){
			$_Log['sonuc']=1;
			$_Log['mesaj']="[PERSONEL] isimli kullanıcı ".$ID." nolu hatırlatmayı düzenledi.";
			require('parca/log.php');
			z(33,'duzenle',1);
			z('git','yenile');
		}
		else {
			$_Log['sonuc']=0;
			$_Log['mesaj']="[PERSONEL] isimli kullanıcı ".$ID." nolu hatırlatmayı düzenleyeme çalıştı fakat başarısız oldu.";
			require('parca/log.php');
			z(33,'duzenle','-1');
		}
	//}
	//else {z(33,'duzenle',3);$_XAd=$_X['ad'];}
	}

	$_X=z(1,$ID,NULL,$tbl);
	if(!empty($_X)){
		?>
		<div class="sayfa">
			<div class="baslik"><h3>Modül Düzenle</h3></div>
			<div class="icerik">
				<?php switch(z(33,'duzenle')){
					case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
					case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
					case 3:_uyr(2,'<strong>'.(!empty($_XAd)?$_XAd:'').'</strong> daha önceden kaydedilmiş. Lütfen kontrol ediniz veya başka bir isim kullanınız.');break;
					case -1:_uyr(0,'Güncelleme başarısız');break;
				}?>
				<form action="" method="post">
					<div class="blok">
						<table cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<th colspan="2">DÜZENLE</th>
								</tr>
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
						<?php require(__DIR__.'/ekle_prc.php'); ?>

						<?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
							<tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td></tr>
						<?php }?>
						<tr><th colspan="2"><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a><a href="<?php echo '?s='.$tbl.'&a=listele&idx='.$id; ?>" onclick="return confirm('Silmek istediğine emin misin?')" class="btn" style="padding-top: 0px;margin-top: 4px;">Sil</a><input type="submit" value="Kaydet" /></th></tr>
	        			<?php /*/ ?>
	                    
	                    <tr><th colspan="2">
	                    	<a href="?s=<?php echo $tbl; ?>&a=listele" class="btnSub btn1 printx"><img src="img/geri.png" height="20" /> GERİ</a>
	                    	<input type="submit" value="Kaydet" />
	                    </th></tr>
	                    <?php /*/ ?>
	                </tbody>
	            </table>
	        </div>
	        <input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
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
	<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
	<?php }?>