<?Php
if(z(8,'id')){
$ID=z(8,'id');

$_X=z(1,$ID,NULL,$tbl);
if($admn||ytk($syf,'duzenle')||($_X['durum']==0&&$_X['personel_ID']==z('lgn','ID'))){
if(!empty($_X)){
	if(z(7,$tbl))require(__DIR__.'/../../parca/sepetDuzenle.php');
	$_Urun=z(1,"WHERE sepet_ID='".$ID."'",NULL,$tbl.'urun');
?>
<div class="sayfa">
    <div class="icerik">
    	<?Php switch(z(33,'duzenle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Sipariş formu güncellendi ve otomatik onaylandı.');break;
			case 2:_uyr(2,'Sipariş formu güncellendi fakat bazı ürün girdileri kaydolamadı. Lütfen kontrol ediniz.');break;
			case 3:_uyr('','Sipariş formu güncellendi fakat limit yetersizliği sebebiyle yetkililerin onayını bekliyor.');break;
			//case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen en az bir adet ürün ekleyiniz.');break;
			case 12:_uyr(2,'Lütfen malzeme cins adlarını ve miktarlarını kontrol ediniz.');break;
			case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
		}?>
        <form action="" method="post">
            <table cellpadding="0" cellspacing="0" id="urunTbl">
            <colgroup>
            	<col /><col /><col width="100" /><col width="100" /><col width="100" /><col width="100" /><col width="120" /><col width="120" /><col width="70" /><col width="100" /><col width="34" />
            </colgroup>
            	<thead>
                    <tr>
                        <th>MALZEME CİNSİ *</th><th>TEKNİK ŞARTNAME</th><th>MİKTARI</th><th>BİRİM</th><th>FİYAT *</th><th>DEPARTMAN</th><th>TEDARİKÇİ FİRMA</th><th>PARA BİRİMİ</th><th>KDV</th><th>KDV ORAN</th><th>SİL</th>
                    </tr>
                </thead>
                <tbody>
                	<?Php $sprsTtr=0;?>
                	<?Php foreach(!empty($_Urun)?$_Urun:array('0'=>1) as $i=>$urun){?>
                    	<?Php $sprsTtr+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$urun['tarih']);?>
                	<tr>
                    	<td><input type="text" class="y96 required" name="<?Php echo $tbl?>urun[<?Php echo $i?>][ad]" value="<?Php echo !empty($urun['ad'])?$urun['ad']:''?>" autofocus /></td>
                        <td><input type="text" class="y96" name="<?Php echo $tbl?>urun[<?Php echo $i?>][aciklama]" value="<?Php echo !empty($urun['aciklama'])?$urun['aciklama']:''?>" /></td>
						<td><input type="text" class="y90 required miktar" name="<?Php echo $tbl?>urun[<?Php echo $i?>][miktar]" placeholder="0" value="<?Php echo !empty($urun['miktar'])?sayi($urun['miktar'],2):1?>" /></td>
						<td><?Php echo select(Array('name'=>$tbl.'urun['.$i.'][nesne_IDbirim]','detay'=>'class="nesneSlc_birim y90"','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='birim'",'sec'=>!empty($urun['nesne_IDbirim'])?$urun['nesne_IDbirim']:''))?></td>
						<td><input type="text" class="y90 required fiyat" name="<?Php echo $tbl?>urun[<?Php echo $i?>][fiyat]" placeholder="0,0" value="<?Php echo !empty($urun['fiyat'])?sayi($urun['fiyat'],2):''?>" /></td>
                        <td><?Php echo select(Array('name'=>$tbl.'urun['.$i.'][nesne_IDddepartman]','detay'=>'class="nesneSlc_departman y90"','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='departman'",'sec'=>!empty($urun['nesne_IDddepartman'])?$urun['nesne_IDddepartman']:''))?></td>
						<td><?Php 
							echo '<select name="'.$tbl.'urun['.$i.'][firma_IDteklif]" class="y90"><option value="0">&nbsp;</option>';
							$_Y=z(1,NULL,'ID,onayli,ad','firma');if(!empty($_Y))foreach($_Y as $y){
								echo '<option value="'.$y['ID'].'"';
								if(!empty($urun['firma_IDteklif'])&&$y['ID']==$urun['firma_IDteklif'])echo 'selected="selected"';
								echo '>'.$y['ad'].(!empty($y['onayli'])?' (onaylı)':'').'</option>';
							}
							echo '</select>';
						?></td>
                        <td>
                        	<?Php foreach($PB as $fei=>$fed){?><label><input type="radio" class="pb" name="<?Php echo $tbl?>urun[<?Php echo $i?>][pb]" value="<?Php echo $fei?>" <?Php echo !empty($urun['pb'])&&$urun['pb']==$fei?'checked':($fei==$pbT?'checked':''); //echo $fei!='USD'?' disabled':'';?>><?Php echo $fed?></label><?Php }?>
                        </td>
                        <td><label><input type="checkbox" class="kdvA" name="<?Php echo $tbl?>urun[<?Php echo $i?>][kdvA]" value="1" <?Php echo !empty($urun['kdvA'])?'checked':''?> />Dahil</label></td>
                        <td>
                        	<input type="text" class="y90 kdv" name="<?Php echo $tbl?>urun[<?Php echo $i?>][kdv]" value="<?Php echo isset($urun['kdv'])?$urun['kdv']:'18'?>" />
                        	<?Php /*<label><input type="radio" class="kdv" name="<?Php echo $tbl?>urun[<?Php echo $i?>][kdv]" value="8" <?Php echo !empty($urun['kdv'])&&$urun['kdv']==8?'checked':''?> />8%</label> 
                            <label><input type="radio" class="kdv" name="<?Php echo $tbl?>urun[<?Php echo $i?>][kdv]" value="18" <?Php echo (!empty($urun['kdv'])&&$urun['kdv']==18)||!isset($urun['kdv'])?'checked':''?> />18%</label>*/?>
                        </td>
                        <td><input type="button" class="sil" value="x" /></td>
                    </tr>
                    <?Php }?>
                </tbody>
                <tfoot>
                	<tr><td colspan="11"><input type="button" value="Ürün Ekle +" id="urunEkleBtn" /></td></tr>
                </tfoot>
            </table>
            <div class=""><div class="blok">
            <div class="baslik"><h3>Genel Bilgiler</h3></div>
            <?Php $_Personel=z(1,z('lgn','ID'),NULL,'personel')?>
            <table cellpadding="0" cellspacing="0">
            	<tbody>
                	<tr><th>SİPARİŞ TARİHİ</th><td><?Php slctrh($tbl.'[tarihSiparis]')?></td>
                    
                    <th>Sipariş Tutarı</th><td><?Php foreach($PB as $fei=>$fed){?><div <?Php if($fei!=$pbT){?>style="display:none;"<?Php }?> class="sprsTtr" id="sprsTtr<?Php echo $fei?>"><?Php echo $fed?><span>0</span></div><?Php }?></td></tr>
                    
                    <tr><th>ÖDEME TİPİ</th><?Php /*<td>
                        <div style="max-width:200px;"><?Php foreach($_OdemeTip as $fei=>$fed){?><label><input type="radio" name="<?Php echo $tbl?>[odemeTip]" value="<?Php echo $fei?>" <?Php echo (!empty($_X['odemeTip'])&&$_X['odemeTip']==$fei)?'checked':''?> /><?Php echo $fed?></label><?Php }?></div>
                    </td>*/?>
                    <td><?Php echo select(Array('name'=>$tbl.'[nesne_IDodemeTip]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='odemeTip'",'sec'=>!empty($_X['nesne_IDodemeTip'])?$_X['nesne_IDodemeTip']:''))?></td>
                    
                    <th>Limit</th><td><?Php echo $_LimitT[$_Personel['limitT']]?><br><?Php echo $pb.sayi($_Personel['limitD'],2);?></td></tr>
                    
                    <?Php /*<tr><th>ALICI FİRMA</th><td><?Php echo select(Array('name'=>$tbl.'[firma_IDalici]','t'=>'firma','sd'=>' ','icerik'=>'<option value="0">&nbsp;</option>','sec'=>!empty($_X['firma_IDalici'])?$_X['firma_IDalici']:''))?></td>*/?>
                    
                    
                    
                    <?Php /*<tr><th>SATICI FİRMA</th><td><?Php echo select(Array('name'=>$tbl.'[firma_IDsatici]','t'=>'firma','sd'=>' ','icerik'=>'<option value="0">&nbsp;</option>','sec'=>!empty($_X['firma_IDsatici'])?$_X['firma_IDsatici']:''))?></td>*/?>
                    
                    
                    <tr><th>AÇIKLAMA</th><td><textarea name="<?Php echo $tbl?>[aciklama]"><?Php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td>
                    <th>Kalan Limit</th><td>Bu <?Php echo str_replace(array(0,1,2,3,4),array('sipariş','gün','hafta','ay','yıl'),$_Personel['limitT'])?> için<br>
					<?Php $klnLmt=!empty($_Personel['limitT'])?$_Personel['limitMax']-$_Personel['limitTop']:$_Personel['limitD'];echo $pb.'<span id="klnLmt">'.sayi($klnLmt,2).'</span>';?></td></tr>
                    <tr><th><a href="?s=<?Php echo $syf?>&a=detay&id=<?Php echo $ID?>" class="btn1 btnSub" style="display:inline-block;margin:1px;">İPTAL</a></th><th colspan="3"><input type="submit" class="btn3" value="&nbsp;&nbsp;KAYDET&nbsp;&nbsp;" /></th>
                    
                    
                </tbody>
            </table>
            </div></div>
            <input type="hidden" name="git1" value="?s=<?Php echo $syf?>&a=listele" />
        </form>
		<?Php if(($admn||ytk('nesne','ekle'))&&!empty($_NSN))foreach($_NSN as $ad=>$n){?>
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
<?Php require(__DIR__.'/../../parca/sepetJs.php');?>
<script type="text/javascript">klnLmtx=<?Php echo !empty($sprsTtr)?$sprsTtr:0?>;</script>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>