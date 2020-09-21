<?Php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$_Yetki=z(7,'yetki');
	if(!$admn)unset($_Yetki['personel']);
	$_Departman=z(7,'departman');
	$_DDepartman=z(7,'ddepartman');
	$_FirmaTip=z(7,'firmaTip');
	$_RehberGruplar=z(7,'rehberGruplar');
	z(6,$tbl);
	if(!empty($_X['ad'])){
		if(!empty($_X['kullanici'])||!empty($_X['eposta'])){
			$sdK=!empty($_X['kullanici'])?"kullanici='".$_X['kullanici']."'":'0';
			$sdE=!empty($_X['eposta'])?"eposta='".$_X['eposta']."'":'0';
			if(!z(5,'WHERE '.$sdK.' OR '.$sdE)){
				if(!empty($_X['sifre'])){
					if(!empty($_X['resifre'])&&$_X['sifre']==$_X['resifre']){
						//if(!empty($_Departman)){
							unset($_X['resifre']);
							$_X['sifre']=md5($_X['sifre']);
							$_X['limitMax']=$_X['limitD']=!empty($_X['limitD'])?sayi($_X['limitD']):0;
							$_X['tarih']=z('datetime');
							$_X['tarihLimitS']=$_X['tarih'];
							$_X['tarihLimitS2']=$_X['tarih'];
							$_X['departmanlar']='';
							$_X['firmaTipleri']='';
							$_X['rehberGruplar']='';

							if(!empty($_RehberGruplar)){
                            	foreach($_RehberGruplar as $fei=>$fed){
                                if(!empty($_X['rehberGruplar']))$_X['rehberGruplar'].=',';
                                if(!empty($fed))$_X['rehberGruplar'].=trim($fei);
                            	}
                        	}

							if(!empty($_FirmaTip)){
								foreach($_FirmaTip as $fei=>$fed){
									if(!empty($_X['firmaTipleri']))$_X['firmaTipleri'].=',';
									if(!empty($fed))$_X['firmaTipleri'].=trim($fei);
								}
							}
							
							if(!empty($_Departman)){
								foreach($_Departman as $fei=>$fed){
									if(!empty($_X['departmanlar']))$_X['departmanlar'].=',';
									if(!empty($fed))$_X['departmanlar'].=trim($fei);
								}
                                $_X['departmanMulti']=json_encode($_DDepartman);
							}
							
							$_X['ddepartmanlar']='';
							if(!empty($_DDepartman)){
								foreach($_DDepartman as $fei=>$fed){
									if(!empty($_X['ddepartmanlar']))$_X['ddepartmanlar'].=',';
									if(!empty($fed))$_X['ddepartmanlar'].=trim($fei);
								}
							}
							if(z(2,$_X)){
								
								if(!empty($_Yetki)){
									$ID=z(1,'son','ID');
									z(6,'yetki');
									foreach($_Yetki as $ytip=>$yetki){
										$yetki['personel_ID']=$ID;
										$yetki['tip']=$ytip;
										z(2,$yetki);
									}
								}
								
								z(33,'ekle',1);
								if(z(7,'git1'))git();
								unset($_X);
							}
							else z(33,'ekle',-1);
						//}
						//else z(33,'ekle',15);
					}
					else z(33,'ekle',14);
				}
				else z(33,'ekle',13);
			}
			else z(33,'ekle',3);
		}
		else z(33,'ekle',12);
	}
	else z(33,'ekle',11);
}
?>
<div class="">
	<div class="baslik"><h3>Personel Ekle</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Personel ekleme işlemi başarıyla gerçekleştirildi.');break;
			case 3:_uyr(2,'Kullanıcı adı veya E-posta adresi daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen e-posta veya kullanıcı adı belirtiniz. Sisteme giriş için kullanılacaktır.');break;
			case 13:_uyr(2,'Lütfen şifre belirtiniz.');break;
			case 14:_uyr(2,'Şifreler uyuşmuyor.');break;
			case 15:_uyr(2,'Lütfen en az bir adet departman seçiniz.');break;
		}?>

            <div class="content pt-0">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="siparisdetay_ekle">       
                    <div class="form-group row">
                        <div class="form-group row">
                                <label class="col-lg-5 col-form-label">PERSONEL ADI</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" required autofocus name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" />
                            </div>
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <div class="form-group row">
                                <label class="col-lg-5 col-form-label">KULLANICI ADI</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="<?Php echo $tbl?>[kullanici]" value="<?Php echo !empty($_X['kullanici'])?$_X['kullanici']:''?>" />
                            </div>
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <div class="form-group row">
                                <label class="col-lg-5 col-form-label">E-POSTASI ***</label>
                            <div class="col-lg-7">
                                <input type="email" class="form-control" name="<?Php echo $tbl?>[eposta]" value="<?Php echo !empty($_X['eposta'])?$_X['eposta']:''?>" />
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="form-group row">
                                <label class="col-lg-5 col-form-label">ŞİFRESİ </label>
                            <div class="col-lg-7">
                                <input type="password" class="form-control required" required name="<?Php echo $tbl?>[sifre]" value="<?Php echo !empty($_X['sifre'])?$_X['sifre']:''?>" />
                            </div>
                        </div> 
                    </div>
                   <div class="form-group row">
                        <div class="form-group row">
                                <label class="col-lg-5 col-form-label">ŞİFRE TEKRARI </label>
                            <div class="col-lg-7">
                                <input type="password" class="form-control required" required name="<?Php echo $tbl?>[resifre]" value="<?Php echo !empty($_X['resifre'])?$_X['resifre']:''?>" />
                            </div>
                        </div> 
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->

        <form action="" method="post">
            <div class="blok" style="border:0px;margin-right:0px;">
                <table cellpadding="0" cellspacing="0"><tbody>
                    <tr><th colspan="2">PERSONELİN BİLGİLERİ</th></tr>
                	<tr><th>PERSONELİN ADI *</th><td><input type="text" class="required" required autofocus name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" /></td></tr>

					<tr><th>KULLANICI ADI</th><td><input type="text" name="<?Php echo $tbl?>[kullanici]" value="<?Php echo !empty($_X['kullanici'])?$_X['kullanici']:''?>" /></td></tr>
                    <tr><th>E-POSTASI</th><td><input type="email" name="<?Php echo $tbl?>[eposta]" value="<?Php echo !empty($_X['eposta'])?$_X['eposta']:''?>" /></td></tr>
                    <tr><th>ŞİFRESİ *</th><td><input type="password" class="required" required name="<?Php echo $tbl?>[sifre]" value="<?Php echo !empty($_X['sifre'])?$_X['sifre']:''?>" /></td></tr>
                    <tr><th>ŞİFRE TEKRARI *</th><td><input type="password" class="required" required name="<?Php echo $tbl?>[resifre]" value="<?Php echo !empty($_X['resifre'])?$_X['resifre']:''?>" /></td></tr>
                    <tr><th>MAİL E-POSTASI</th><td><input type="email" name="<?Php echo $tbl?>[meposta]" value="" /></td></tr>
                    <tr><th>MAİL ŞİFRESİ *</th><td><input type="password" class="required" required name="<?Php echo $tbl?>[msifre]" value="" /></td></tr>

					
					
                    <?php /*/ ?>

		            <tr>
		                <th>Firma</th>
		                <td>
		                    <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'','t'=>'firma','alan'=>'','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0)); ?>
		                </td>
		            </tr>
                    <?php /*/ ?>
		            <tr><th>TEL NUMARASI</th><td><input type="text" name="<?Php echo $tbl?>[tel]" value="<?Php echo !empty($_X['tel'])?$_X['tel']:''?>" /></td></tr>
                    <tr><th>Doğum Tarihi</th><td><?php slctrh($tbl.'[tarihDogum]',!empty($_X['tarihDogum'])?$_X['tarihDogum']:'')?></td></tr>
                    <?php /*/ ?>
                    <tr><th>PERSONELİN LİMİTİ</th><td><input type="text" placeholder="<?Php echo $pb?>0,0" name="<?Php echo $tbl?>[limitD]" value="<?Php echo !empty($_X['limitD'])?$_X['limitD']:(isset($_X['limitD'])?0:'')?>" /></td></tr>
                   	<tr><th>LİMİT TİPİ</th><td>
                        <select name="<?Php echo $tbl?>[limitT]">
                        	<?Php foreach($_LimitT as $fei=>$fed){?><option value="<?Php echo $fei?>" <?Php echo isset($_X['limitT'])&&$_X['limitT']==$fei?'selected':''?>><?Php echo $fed?></option><?Php }?>
                        </select>
                    </td></tr>
                    <tr><th>YILLIK LİMİTİ <span class="soru" title="Doldurulması zorunlu değildir. Yılda bir yenilenir. Sipariş başına limiti olan personellerin fazla harcamadan kaçınması için kullanılmalıdır. Ör:Sipariş başına 100TL limiti olan bir personel bu yıl 10.000TL'yi geçemesin. (Boş bırakılırsa yıllık kontrol yapılmaz.)">?</span></th><td><input type="text" placeholder="<?Php echo $pb?>0,0" name="<?Php echo $tbl?>[limitD2]" value="<?Php echo !empty($_X['limitD2'])?$_X['limitD2']:(isset($_X['limitD2'])?0:'')?>" /></td></tr>
                    <?php /*/ ?>
                    
                    </tbody></table></div><div class="blok" style="border:0px;margin-right:0px;">
                    <table cellpadding="0" cellspacing="0"><tbody>
                    
                    <tr><th colspan="2">PERSONELİN YETKİLERİ <input type="checkbox" class="tumunu-sec-hedef" data-hedef="fieldset input[type=checkbox]" value="1"></th></tr>
                    <tr><td colspan="2">
                    <?Php foreach($_MTip as $mtip=>$mad){if($admn||$mtip!='personel'){?>
                    <fieldset>
                    	<legend><?Php echo $mad?></legend>
                    	<label><input type="checkbox" name="yetki[<?Php echo $mtip?>][listele]" value="1" <?Php if(!empty($_Yetki[$mtip]['listele'])){?>checked="checked"<?Php }?>>Görüntüle</label>

                        
                    	<label><input type="checkbox" name="yetki[<?Php echo $mtip?>][detay]" value="1" <?Php if(!empty($_Yetki[$mtip]['detay'])){?>checked="checked"<?Php }?>>Detay</label>
                    	<label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ekle]" value="1" <?Php if(!empty($_Yetki[$mtip]['ekle'])){?>checked="checked"<?Php }?>>Ekle</label>
                    	<label><input type="checkbox" name="yetki[<?Php echo $mtip?>][duzenle]" value="1" <?Php if(!empty($_Yetki[$mtip]['duzenle'])){?>checked="checked"<?Php }?>>Düzenle</label>
                    	<label><input type="checkbox" name="yetki[<?Php echo $mtip?>][sil]" value="1" <?Php if(!empty($_Yetki[$mtip]['sil'])){?>checked="checked"<?Php }?>>Sil</label>

                        <?Php if($mtip=='musteritakip'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel1'])){?>checked="checked"<?Php }?>>Herkesin Girdilerini Görebilme</label>
                        <?Php } ?>
                        <?Php if($mtip=='istakip'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel1'])){?>checked="checked"<?Php }?>>Herkesin Girdilerini Görebilme</label>
                        <?Php } ?>
						<?Php if($mtip=='kumaskarti'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel1'])){?>checked="checked"<?Php }?>>Rapor</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel2]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel2'])){?>checked="checked"<?Php }?>>Fiyat Görüntüleme</label>
                        <?Php } ?>

                        <?Php if($mtip=='market'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][onayla]" value="1" <?Php if(!empty($_Yetki[$mtip]['onayla'])){?>checked="checked"<?Php }?>>Onayla</label>
                        <?Php }?>
                        <?Php if($mtip=='market'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][arsivle]" value="1" <?Php if(!empty($_Yetki[$mtip]['arsivle'])){?>checked="checked"<?Php }?>>Arşivle</label>
                        <?Php }?>
                        <?Php if($mtip=='market'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][eposta]" value="1" <?Php if(!empty($_Yetki[$mtip]['eposta'])){?>checked="checked"<?Php }?>>E-posta Gönder</label>
                        <?Php }?>
                        <?Php if($mtip=='dokumastok'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel1'])){?>checked="checked"<?Php }?>>Hareket Detayı</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel2]" value="1" <?Php if(!empty($_Yetki[$mtip]['ozel2'])){?>checked="checked"<?Php }?>>Hesaplama Sayfası</label>
                        <?Php } ?>
                    </fieldset>
                    <?Php }}
					
					$_Y=z(1,"WHERE ad='departman'",NULL,'nesne');if(!empty($_Y)){/*?>
                    <fieldset>
                    	<legend>İlgili Departmanlar</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_Y as $y){?>
                    	<label><input type="checkbox" name="departman[<?Php echo $y['ID']?>]" value="1" <?Php if(!empty($_Departman[$y['ID']])){?>checked="checked"<?Php }?>><?Php echo $y['metin1']?></label>
                    	<?Php }?></div>
                    </fieldset>
						<?Php */ }?>
                    
                    <?Php if(!empty($ayr['destekA'])){?>
                    <fieldset>
                    	<legend>Destek Talep Yetkileri</legend>
                    	<label><input type="checkbox" name="yetki[destek][listele]" value="1" <?Php if(!empty($_Yetki['destek']['listele'])){?>checked="checked"<?Php }?>>Görüntüle</label>
                    	<label><input type="checkbox" name="yetki[destek][ekle]" value="1" <?Php if(!empty($_Yetki['destek']['ekle'])){?>checked="checked"<?Php }?>>Yaz</label>
                    	<label><input type="checkbox" name="yetki[destek][duzenle]" value="1" <?Php if(!empty($_Yetki['destek']['duzenle'])){?>checked="checked"<?Php }?>>Cevapla</label>
                    	<?Php /*<label><input type="checkbox" name="yetki[destek][sil]" value="1" <?Php if(!empty($_Yetki['destek']['sil'])){?>checked="checked"<?Php }?>>Sil</label>*/?>
                        <div>                        
						<?Php $_Y=z(1,"WHERE ad='ddepartman'",NULL,'nesne');if(!empty($_Y)){?>
                        <fieldset>
                            <legend>Cevap Verebileceği Destek Departmanları</legend>
                            <div style="max-width:460px; text-align:center;">
                            <?Php foreach($_Y as $y){?>
                            <label><input type="checkbox" name="ddepartman[<?Php echo $y['ID']?>]" value="1" <?Php if(!empty($_DDepartman[$y['ID']])){?>checked="checked"<?Php }?>><?Php echo $y['metin1']?></label>
                            <?Php }?></div>
                        </fieldset>
                        <?Php }?>
                        </div>
                    </fieldset>
                    <?Php }?>

                    <?php /*/ ?>
                    <?php
                    $_F=z(1,"WHERE ad='firmaTip'",NULL,'nesne');if(!empty($_F)){?>
                    <fieldset>
                    	<legend>Firma Tipleri</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_F as $f){?>
                    	<label><input type="checkbox" name="firmaTip[<?Php echo $f['ID']?>]" value="1" <?Php if(!empty($_FirmaTip[$f['ID']])){?>checked="checked"<?Php }?>><?Php echo $f['metin1']?></label>
                    	<?Php }?></div>
                    </fieldset>
                    <?Php }?>

                    <?php
                    $_R=z(1,"WHERE ad='rehberGrup'",NULL,'nesne');if(!empty($_R)){?>
                    <fieldset>
                    	<legend>Rehber Grupları</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_R as $r){?>
                    	<label><input type="checkbox" name="rehberGruplar[<?Php echo $r['ID']?>]" value="1" <?Php if(!empty($_RehberGruplar[$r['ID']])){?>checked="checked"<?Php }?>><?Php echo $r['metin1']?></label>
                    	<?Php }?></div>
                    </fieldset>
                    <?Php }?>
                    <?php /*/ ?>

                    </td></tr>
					
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }?>
                    
                    </tbody></table></div><div class="blok" style="border:0px;margin-right:0px;">
                    <table cellpadding="0" cellspacing="0"><tbody>
                    
                    <tr><td colspan="2"><input type="submit" value="Kaydet" class="btn3" /></td></tr>
                </tbody></table>
            </div>
            <input type="hidden" name="git1" value="?s=<?Php echo $tbl?>&a=listele" />
        </form>
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
        <div id="ekleForm_<?Php echo $ad?>" style="display:none">
        <form action="sayfa/nesne/yonet_ajx.php?ekle=<?Php echo $ad?>" class="ajaxNesneEkle" method="post">
            <table cellpadding="0" cellspacing="0">
                <?Php foreach($n['alan2'] as $fei=>$fed){
                    echo '<tr><th>'.$fed.'</th><td><input type="text" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
                }?>
                <tr><th colspan="2" align="center"><input type="submit" value="KAYDET" /></th></tr>
            </table>
        </form>
        </div>
        <?Php }?>
    </div>
</div>
<?Php if(!empty($_NSN)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?Php foreach($_NSN as $ad=>$n){?>
	$(".nesneSlc_<?Php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?Php echo $ad?>");
			$("#ekleForm_<?Php echo $ad?> input:first").focus();
		}
    });
	$('#ekleForm_<?Php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?Php echo $ad?>").append('<option value="'+e+'">'+<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val()+' '+<?Php }?>'</option>');
			$(".nesneSlc_<?Php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?Php echo $ad?> option:last-child").attr('selected',true);
			<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val('');<?Php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?Php }?>
});
</script>
<?Php }?>