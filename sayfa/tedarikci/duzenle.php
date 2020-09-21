<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	//_z(7,'iplikno');die; 	
	$_X=z(7,$tbl);
	z(6,$tbl);
	$markalar=(!empty($_X['markalar'])?array_filter($_X['markalar']):'');
	if(!empty($markalar)){$markalar=!empty($markalar)?json_encode($markalar):Null;}
	
	$_X['markalar']=(!empty($markalar)?$markalar:'');
	//if(!z(5,"WHERE arsiv='0' AND ad='".$_X['ad']."' AND ID<>'".$ID."'")){
		//if(empty($_X['atki']))$_X['atki']=0;

		//$_X['ibFiyat']=z(36,$_X['ibFiyat']);
		postKontrolTh($_X);
		//__($tbl,$_X);
		if(z(3,$ID,$_X)){
			z(33,'duzenle',1);
			z('git','yenile');
		}
		else z(33,'duzenle','-1');
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
            			<tr>
            				<th colspan="2">
            					<a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a>
	            				<input type="submit" value="Kaydet"  tabindex="1" />
	            			</th>
	            		</tr>
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