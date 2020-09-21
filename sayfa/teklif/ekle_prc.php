

            <tr>
                <th>Proforma No:</th><td><?php echo !empty($_X['ad'])?$_X['ad']:''?></td>
            </tr>
            
            <tr>
                <th>Alıcı Firma</th>
                <td>
                    <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'','t'=>'firma','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0)); ?>
                </td>
            </tr>

           
            <<tr><th>Vergi Dairesi:</th><td><textarea name="<?php echo $tbl?>[vergiD]" class="" ><?php echo !empty($_X['vergiD'])?$_X['vergiD']:''?></textarea></td></tr>
             <tr><th>Vergi No.</th><td><?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?></td></tr>
            <tr><th>Kişi </th><td><input type="text" name="<?php echo $tbl?>[tel]" value="<?php echo !empty($_X['tel'])?z(36,$_X['tel'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Telefon </th><td><input type="text" name="<?php echo $tbl?>[tel]" value="<?php echo !empty($_X['tel'])?z(36,$_X['tel'],2):''?>" autocomplete="off"></td></tr>
             
        
             <tr><th>Adres:</th><td><textarea name="<?php echo $tbl?>[adres]" class="" ><?php echo !empty($_X['adres'])?$_X['adres']:''?></textarea></td></tr>

             <tr><th>Ürün Model ve Özellikleri:</th><td><textarea name="<?php echo $tbl?>[ozellik]" class="" ><?php echo !empty($_X['ozellik'])?$_X['ozellik']:''?></textarea></td></tr>

             <tr><th>Satıcı:</th><td><textarea name="<?php echo $tbl?>[satici]" class="" ><?php echo !empty($_X['satici'])?$_X['satici']:''?></textarea></td></tr>

             
             <tr><th>Ürün  Fotografı:</th><td><textarea name="<?php echo $tbl?>[aciklama]" class="" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>

             <tr><th>Adet</th><td><input type="text" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>

            <tr><th>Fiyat</th><td><input type="text" name="<?php echo $tbl?>[fiyat]" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],2):''?>" autocomplete="off"></td></tr>
            
        
            <?php /*/ ?>


            <tr><th>Atkı</th><td>
                <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
            </td></tr>
            <?php /*/ ?>

 
            <tr><th colspan="3" aling="center"><a href="javascript:pencereKapat('#<?php echo $syf ?>_ekle')" class="btn">İptal</a><input type="submit" value="Kaydet" /></th></tr>

    