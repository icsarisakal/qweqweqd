<?php /*/ ?>
<tr>
    <th>İl</th>
    <td>
        <?php $sehir=z(1,'','','sehir'); ?>
        <select name="<?php echo $tbl; ?>[il_ID]" id="select1">
            <option value="0" disabled="disabled" selected="selected">İli Seçiniz..</option>
            <?php foreach ($sehir as $sh) { ?>
                <option value="<?php echo $sh['sehir_key']; ?>" <?php if(!empty($_X['il_ID'])&&$_X['il_ID']==$sh['sehir_key']){echo 'selected';} ?>><?php echo $sh['sehir_title']; ?></option>
            <?php } ?>
        </select>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function(){
        $('#ilceler').hide();
        <?php if(!empty($_X['ilce_ID'])){?>
            var country_id = <?php echo $_X['ilce_ID']; ?>;
        <?php } ?>
        $('#select1').change(function() {
            var country_id = select1.options[select1.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=musteritakip&a=illist&sehir="+country_id,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        console.log(gelensorgu.cevap.ilce);
                        var ilce=gelensorgu.cevap.ilce;
                        if(ilce!=null){
                            $('#select2 option').remove();
                            $('#ilceler').show();
                            $.each(ilce, function(k, v) {
                                $('<option>').val(v.ilce_key).text(v.ilce_title).appendTo('#select2');
                            });
                        }
                    } else {
                        alert('İlçe okuma başarısız');
                    }
                }
            });
        });
        <?php if(!empty($_X['ilce_ID'])){?>
            $('#ilceler').show();
        <?php } ?>
    });
</script>
<tr id="ilceler">
    <th>İlçe</th>   
    <td>
        <select name="<?php echo $tbl; ?>[ilce_ID]" id="select2">
            <?php if(!empty($_X['il_ID'])){?>
                <?php
                $ilcecek=z(1,array('ilce_sehirkey'=>$_X['il_ID']),'','ilce');
                foreach ($ilcecek as $ic) { ?>
                    <option value="<?php echo $ic['ilce_key']; ?>" <?php if(!empty($_X['ilce_ID'])&&$_X['ilce_ID']==$ic['ilce_key']){echo 'selected';} ?> ><?php echo $ic['ilce_title']; ?></option>
                <?php }
            } ?> 
        </select>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function(){
        $('#mahalle').hide();
        $('#select2').change(function() {
            var ilce_id = select2.options[select2.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=musteritakip&a=ilcelist&ilce="+ilce_id,
                success:function(ilcesorgu){
                    if(ilcesorgu.sonuc==1){
                        console.log(ilcesorgu.cevap.mahalle);
                        var mahalle=ilcesorgu.cevap.mahalle;
                        if(mahalle!=null){
                            $('#select3 option').remove();
                            $('#mahalle').show();
                            $.each(mahalle, function(k, v) {
                                $('<option>').val(v.mahalle_id).text(v.mahalle_title).appendTo('#select3');
                            });
                        }
                    } else {
                        alert('İlçe okuma başarısız');
                    }
                }
            });
        });
        <?php if(!empty($_X['mahalle_ID'])){?>
            $('#mahalle').show();
        <?php } ?>
    });
</script>
<tr id="mahalle"><th>Mahalle</th><td>
    <select name="<?php echo $tbl; ?>[mahalle_ID]" id="select3">
        <?php if(!empty($_X['ilce_ID'])){?>
            <?php
            $mahallecek=z(1,array('mahalle_ilcekey'=>$_X['ilce_ID']),'','mahalle');
            foreach ($mahallecek as $mc) { ?>
                <option value="<?php echo $mc['mahalle_id']; ?>" <?php if(!empty($_X['mahalle_ID'])&&$_X['mahalle_ID']==$mc['mahalle_id']){echo 'selected';} ?> ><?php echo $mc['mahalle_title']; ?></option>
            <?php }
        } ?>
    </select>
</td></tr>

<tr><th>Telefon</th><td><input type="text" name="<?php echo $tbl?>[tel]" value="<?php echo !empty($_X['tel'])?z(36,$_X['tel'],2):''?>" autocomplete="off"></td></tr>
<tr><th>E-Posta</th><td><textarea name="<?php echo $tbl?>[eposta]" class="" ><?php echo !empty($_X['eposta'])?$_X['eposta']:''?></textarea></td></tr>
<tr><th>Adres</th><td><textarea name="<?php echo $tbl?>[adres]" class="" ><?php echo !empty($_X['adres'])?$_X['adres']:''?></textarea></td></tr>

<?php /*/ ?>
<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
            <?php }?>
<tr>
    <th>Firma/Kurum</th>
    <td>
        <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'id="select1"','t'=>'firma','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"WHERE firmaTip = 0 AND arsiv = 0",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0)); ?>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kisiler').hide();
        <?php if(!empty($_X['kisi_ID'])){?>
            var kisi_ID = <?php echo $_X['kisi_ID']; ?>;
        <?php } ?>
        $('#select1').change(function() {
            var kisi_ID = select1.options[select1.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=musteritakip&a=kisilist&firma="+kisi_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        //console.log(gelensorgu.cevap.kisi);
                        var kisi=gelensorgu.cevap.firma;
                        if(kisi!=null){
                            $('#selectkisi option').remove();
                            $('#kisiler').show();
                            $.each(kisi, function(k, v) {
                                var soyad ='';
                                if(v.soyad!=null){
                                    var soyad=v.soyad;
                                }
                                $('<option>').val(v.ID).text(v.ad+" "+soyad).appendTo('#selectkisi');
                            });
                        } else{
                            $('#selectkisi option').remove();
                        }
                    } else {
                        alert('Kişi okuma başarısız');
                    }
                }
            });
        });
        <?php if(!empty($_X['kisi_ID'])){?>
            $('#kisiler').show();
        <?php } ?>
    });
    function kisilist(){
        var kisi_ID = select1.options[select1.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=musteritakip&a=kisilist&firma="+kisi_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        //console.log(gelensorgu.cevap.kisi);
                        var kisi=gelensorgu.cevap.firma;
                        if(kisi!=null){
                            $('#selectkisi option').remove();
                            $('#kisiler').show();
                            $.each(kisi, function(k, v) {
                                var soyad ='';
                                if(v.soyad!=null){
                                    var soyad=v.soyad;
                                }
                                $('<option>').val(v.ID).text(v.ad+" "+soyad).appendTo('#selectkisi');
                            });
                        } else{
                            $('#selectkisi option').remove();
                        }
                    } else {
                        alert('Kişi okuma başarısız');
                    }
                }
            });
    }
</script>
<tr id="kisiler">
    <th>İlgili Kişi</th>
    <td><select name="<?php echo $tbl; ?>[kisi_ID]" id="selectkisi" class="select2">
        <?php if(!empty($_X['kisi_ID'])){?>
            <?php
            $mahallecek=z(1,array('arsiv'=>0,'firma_ID'=>$_X['firma_ID']),'','kisi');
            foreach ($mahallecek as $mc) { ?>
                <option value="<?php echo $mc['ID']; ?>" <?php if(!empty($_X['kisi_ID'])&&$_X['kisi_ID']==$mc['ID']){echo 'selected';} ?> ><?php echo $mc['ad'].' '.$mc['soyad']; ?></option>
            <?php }
        } ?>
    </select></td>
</tr>
<?php if(z(8,'a')=='ekle'){ ?>
    <?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
        <tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."' ORDER BY sayi1",'icerik'=>'<option value="0">&nbsp;</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td></tr>
    <?php } ?>
<?php } ?>
<?php if(z(8,'a')=='duzenle'){ ?>
    <?php if(!empty($_OZNSN))foreach($_OZNSN as $ad=>$n){?>
        <?php $_NesneTip=z(37,z(1,"WHERE ad='asama'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1'); ?>
        <tr>
            <th><?php echo $n['ad']?></th>
            <td class="asamatext">
                <span style="background: black; color: white; padding: 2px;"><?php if(!empty($_NesneTip[$_X['asama']]['metin1'])){ echo $_NesneTip[$_X['asama']]['metin1']; } ?></span>
                <a href="#" class="asamadegistir">Durumu güncelle</a>
            </td>
            <td class="asamaselect" style="display: none;"><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>' disabled class="asamaslct nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."' ORDER BY sayi1",'icerik'=>'<option value="0">&nbsp;</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td>
        </tr>
    <?php } ?>
<?php } ?>
<tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]" class="" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
<tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime'))?></td></tr>
<?php if(z(8,'a')=='duzenle'){ ?>
    <?php 
    $hsorgu="WHERE arsiv = 0 AND hmodul = '".$tbl."' AND hmodul_ID = ".$_X['ID'];
    $Hadet=z(5,$hsorgu,'','hatirlatici');
    ?>
    <?php if(!empty($Hadet)){ ?>
        <tr><th>Hatırlatıcılar</th><td><a href="?s=<?php echo $tbl.'&a=detay&id='.z(8,'id'); ?>">Hatırlatıcıya git</a></td></tr>
    <?php } else { ?>
        <tr><th>Hatırlatma Eklensin mi?</th><td><a href="?s=hatirlatici&a=ekle&tbl=<?php echo $tbl; ?>&id=<?php echo z(8,'id'); ?>" style="color:#ffffff;border: 1px solid #dddddd;background:#30962e;">Yeni Hatırlatıcı Ekle</a></tr>
        <?php } ?>
    <?php } else { ?>
        <tr><th>Hatırlatma Eklensin mi?</th><td><input type="checkbox" name="check" class="check"></tr>
        <?php } ?>

        <tbody class="hatirlaticimodal">
            <?php $tbl='hatirlatici'; ?>
            <?php require(__DIR__.'/../hatirlatici/ekle_prc.php'); ?>
        </tbody>

<?php /*/ ?>
<tr><th>Atkı</th><td>
    <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
</td></tr>
<?php /*/ ?>
<?php $tbl='musteritakip'; ?>

<tr><th colspan="2"><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a><input type="submit" value="Kaydet" /></th></tr>
<script type="text/javascript">
    $(document).ready(function(){
        $(".hatirlaticimodal").hide();
        $(".check").change(function(){
            if($(this).prop('checked')){
                $(".hatirlaticimodal").show();
            }
            else{
                $(".hatirlaticimodal").hide();
            }
        });
        $(".asamaselect").hide();
        $(".asamadegistir").click(function(){
            $(".asamaslct").removeAttr("disabled");
            $(".asamaselect").show();
            $(".asamatext").hide();
        });
    });
</script>