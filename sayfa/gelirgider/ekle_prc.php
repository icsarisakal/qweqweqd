
           <tr>
                <th>Hizmet Adı</th><td><input type="text" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off"></td>
            </tr>
       

            <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
            <?php }?>

            <?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){
                $n['sutunAdi'] = !empty($n['sutunAdi'])?$n['sutunAdi']:$ad; ?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$n['sutunAdi'].']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."'",'icerik'=>'','sec'=>!empty($_X[''.$n['sutunAdi']])?$_X[''.$n['sutunAdi']]:0))?></td></tr>
            <?php }?>

            <tr><th>KDV</th><td><input type="text" name="<?php echo $tbl?>[kdvOran]" value="<?php echo !empty($_X['kdvOran'])?z(36,$_X['kdvOran'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>miktar</th><td><input type="text" name="<?php echo $tbl?>[miktar]" value="<?php echo !empty($_X['miktar'])?z(36,$_X['miktar'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Fiyat</th><td><input type="text" name="<?php echo $tbl?>[fiyat]" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Şartname</th><td><textarea name="<?php echo $tbl?>[sartName]" class="" ><?php echo !empty($_X['sartName'])?$_X['sartName']:''?></textarea></td></tr>
             <tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]" class="" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
             <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime'))?></td></tr> 
             <tr><th>Vade Tarihi</th><td><?php slctrh($tbl.'[tarihVade]',!empty($_X['tarihVade'])?$_X['tarihVade']:z('datetime'))?></td></tr>
              <tr><th>Son Tarihi</th><td><?php slctrh($tbl.'[tarihSon]',!empty($_X['tarihSon'])?$_X['tarihSon']:z('datetime'))?></td></tr>
           
               
            <?php /*/ ?>

            <tr><th>Atkı</th><td>
                <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
            </td></tr>
            <?php /*/ ?>

            <tr><th colspan="2"><a href="javascript:pencereKapat('#<?php echo $syf ?>_ekle')" class="btn">İptal</a><input type="submit" value="Kaydet" /></th></tr>
