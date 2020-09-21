





            <tr>
                <th>Örnek Modülün Adı</th><td><input type="text" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Firma</th>
                <td>
                    <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'','t'=>'firma','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0)); ?>
                </td>
            </tr>

            <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
            <?php }?>

            <?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td></tr>
            <?php }?>

            
            <tr><th>Adet</th><td><input type="text" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Gramaj</th><td><input type="text" name="<?php echo $tbl?>[gramaj]" value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''?>" autocomplete="off"></td></tr>
             <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></td></tr>
           

             <tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]" class="" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
            <?php /*/ ?>

            <tr><th>Atkı</th><td>
                <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
            </td></tr>
            <?php /*/ ?>

            <tr><th colspan="2"><a href="javascript:pencereKapat('#<?php echo $syf ?>_ekle')" class="btn">İptal</a><input type="submit" value="Kaydet" /></th></tr>
