


            <tr>
                <th>Tedarikci Adı *</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off"></td>
            </tr>


            <tr>
                <th>Soyadı</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[soyad]" value="<?php echo !empty($_X['soyad'])?$_X['soyad']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Cep Telefonu</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[telCep1]" value="<?php echo !empty($_X['telCep1'])?$_X['telCep1']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Unvanı</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[unvan]" value="<?php echo !empty($_X['unvan'])?$_X['unvan']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>E-Posta Adresi</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[eposta]" value="<?php echo !empty($_X['eposta'])?$_X['eposta']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>2. Cep Telefonu</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[telCep2]" value="<?php echo !empty($_X['telCep2'])?$_X['telCep2']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Sabit Hat</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[telSabit]" value="<?php echo !empty($_X['telSabit'])?$_X['telSabit']:''?>" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Fax No</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[telFax]" value="<?php echo !empty($_X['telFax'])?$_X['telFax']:''?>" autocomplete="off"></td>
            </tr>
            <tr><th>Adres</th><td><textarea name="<?php echo $tbl?>[adres]"  tabindex="1" ><?php echo !empty($_X['adres'])?$_X['adres']:''?></textarea></td></tr>
            <tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]"  tabindex="1" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
            <?php $nesnemarka=z(37,z(1,"WHERE ad='' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne')); ?>
            <?php 
            $markalar=array();
            if(!empty($_X['markalar'])){
                $markalar=(!empty($_X['markalar'])?json_decode($_X['markalar'],1):'');
            }
            ?>
            <tr>
                    <th>Marka</th>
                    <td class="markalar">
                        <a href="#yenimarka" class="yenimarka" style="display: block;border: 1px solid #9a9a9a;background: white;cursor: pointer;color: black;font-size: 14px;padding: 2px;">Yeni Marka Ekle</a>
                        <?php if(!empty($nesnemarka)){ foreach ($nesnemarka as $nm => $nmarka) { ?>
                            <input type="checkbox" id="marka<?php echo $nm; ?>" name="<?php echo $tbl; ?>[markalar][]" value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>" <?php if(!empty($nmarka['ID'])&&in_array($nmarka['ID'],$markalar)){echo 'checked';} ?>>
                            <label for="marka<?php echo $nm; ?>"> <?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></label><br>
                        <?php } } ?> 
                    </td>
            </tr>

            <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
            <?php }?>

            <?php /*/ ?>


            
            <tr><th>Adet</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>
            <tr><th>Gramaj</th><td><input type="text" name="<?php echo $tbl?>[gramaj]" value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''?>" autocomplete="off"></td></tr>
             <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></td></tr>
           


            <tr><th>Atkı</th><td>
                <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
            </td></tr>
            <?php /*/ ?>
