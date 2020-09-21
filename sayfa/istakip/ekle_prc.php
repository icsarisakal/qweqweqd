<tr><th>Açıklama</th><td><textarea name="<?php echo $tbl?>[aciklama]" class="" ><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td></tr>
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
                                $('<option>').val(v.ID).text(v.ad+" "+v.soyad).appendTo('#selectkisi');
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
                                $('<option>').val(v.ID).text(v.ad+" "+v.soyad).appendTo('#selectkisi');
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
        <?php $_NesneTip=z(37,z(1,"WHERE ad='asamais'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1'); ?>
        <tr>
            <th><?php echo $n['ad']?></th>
            <td class="asamatext">
                <span style="background: black; color: white; padding: 2px;"><?php if(!empty($_NesneTip[$_X['asamais']]['metin1'])){ echo $_NesneTip[$_X['asamais']]['metin1']; } ?></span>
                <a href="#" class="asamadegistir">Durumu güncelle</a>
            </td>
            <td class="asamaselect" style="display: none;"><?php echo select(Array('name'=>$tbl.'['.$ad.']','detay'=>' disabled class="asamaslct nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'], 'value'=>'sayi1', 'sd'=>"WHERE ad='".$ad."' ORDER BY sayi1",'icerik'=>'<option value="0">&nbsp;</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:0))?></td>
        </tr>
    <?php } ?>
<?php } ?>
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
<?php $tbl='istakip'; ?>

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