<style>
.musteritipi{
    display:none;
}
</style>

    <div class="form-group row">
    <label class="col-lg-3 col-form-label">Firma Adı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Unvanı</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[unvan]" autofocus="autofocus"  value="<?php echo !empty($_X['unvan'])?$_X['unvan']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
     <label class="col-lg-3 col-form-label">Cinsiyet</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[cinsiyet]" class="form-control">
                <option value="0">Cinsiyet Seçiniz</option>
                <option value="1" <?php echo (!empty($_X['cinsiyet'])&&$_X['cinsiyet']=='1'?'selected':''); ?> >Erkek</option>
                <option value="2" <?php echo (!empty($_X['cinsiyet'])&&$_X['cinsiyet']=='2'?'selected':''); ?> >Kadın</option>

            </select>
        </div>
</div>


 <div class="form-group row">
    <label class="col-lg-3 col-form-label">Mail Adresi</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[eposta]" autofocus="autofocus" value="<?php echo !empty($_X['eposta'])?$_X['eposta']:''?>" autocomplete="off">
        </div>
</div>

        
 <div class="form-group row">
    <label class="col-lg-3 col-form-label">Cep Telefonu</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[telCep1]" autofocus="autofocus" value="<?php echo !empty($_X['telCep1'])?$_X['telCep1']:''?>" autocomplete="off">
    </div>
</div>


 <div class="form-group row">
    <label class="col-lg-3 col-form-label">2.Cep Telefonu</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[telCep2]" autofocus="autofocus" value="<?php echo !empty($_X['telCep2'])?$_X['telCep2']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Fax No</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[telFax]" autofocus="autofocus" value="<?php echo !empty($_X['telFax'])?$_X['telFax']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Vergi No</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[vergiNo]" autofocus="autofocus" value="<?php echo !empty($_X['vergiNo'])?$_X['vergiNo']:''?>" autocomplete="off">
    </div>
</div>


 <div class="form-group row">
    <label class="col-lg-3 col-form-label">Vergi Dairesi</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[vergiDairesi]" autofocus="autofocus" value="<?php echo !empty($_X['vergiDairesi'])?$_X['vergiDairesi']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Mersis No</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[mersisNo]" autofocus="autofocus" value="<?php echo !empty($_X['mersisNo'])?$_X['mersisNo']:''?>" autocomplete="off">
    </div>
</div>



<div class="form-group row">
     <label class="col-lg-3 col-form-label">Adres</label>
    <div class="col-lg-9">
        <textarea name="<?php echo $tbl?>[adres]" rows="5" cols="5" class="form-control" tabindex="1"  utofocus="autofocus" value="<?php echo !empty($_X['adres'])?$_X['adres']:''?>" autocomplete="off"></textarea>
    </div>
</div>


<div class="form-group row">
         <label class="col-lg-3 col-form-label">Açıklama </label>
        <div class="col-lg-9">
            <textarea name="<?php echo $tbl?>[aciklama]" rows="5" cols="5" class="form-control" tabindex="1"  utofocus="autofocus" value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off"></textarea>
        </div>
    </div>


<?php $nesnemarka=z(37,z(1,"WHERE ad='' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne')); ?>
<?php 
$markalar=array();
if(!empty($_X['markalar'])){
    $markalar=(!empty($_X['markalar'])?json_decode($_X['markalar'],1):'');
}
?>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Marka</label>
    <div class="col-lg-9">
        <a href="#yenimarka" class="yenimarka form-control" style="display: block;border: 1px solid #ddd;background: white;cursor: pointer;color: black;font-size: 12px;padding: 5px;">Yeni Marka Ekle</a><br>
        
        <?php if(!empty($nesnemarka)){ foreach ($nesnemarka as $nm => $nmarka) { ?>
                <input type="checkbox" id="marka<?php echo $nm; ?>" name="<?php echo $tbl; ?>[markalar][]" value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>" <?php if(!empty($nmarka['ID'])&&in_array($nmarka['ID'],$markalar)){echo 'checked';} ?>>
                <label for="marka<?php echo $nm; ?>"> <?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></label><br>
            <?php } } ?> 

    </div>
</div>
                        
                        

<?php
$adm=z(8,'adm');
$tedarikci=z(8,'tedarikci');
$mevcut=z(8,'mevcut');
$potansiyel=z(8,'potansiyel');
?>

<?php if(!empty($mevcut)){ ?>
<input type="hidden" name="<?php echo $tbl; ?>[nesne_IDmusteriTipi]" value="<?php echo $mevcut; ?>">
<input type="hidden" name="<?php echo $tbl; ?>[nesne_IDcariTipi]" value="178">
<?php } ?>

<?php if(!empty($potansiyel)){ ?>
<input type="hidden" name="<?php echo $tbl; ?>[nesne_IDmusteriTipi]" value="<?php echo $potansiyel; ?>">
<input type="hidden" name="<?php echo $tbl; ?>[nesne_IDcariTipi]" value="178">
<?php } ?>

<?php if(!empty($tedarikci)){ ?>
<input type="hidden" name="<?php echo $tbl; ?>[nesne_IDcariTipi]" value="179">
<?php } ?>


<?php if(!empty($adm)){ ?>
    <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="caridurumu form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            </div>
        </div>

    <?php }?>
<?php } ?>


<?php if(!empty($adm)||!empty($mevcut)||!empty($potansiyel)||!empty($_X['nesne_IDmusteriTipi'])){ ?>
    <?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class=" form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
                </div>
        </div>
    <?php }?>  
<?php } ?>


<?php if(!empty($adm)||!empty($tedarikci)||!empty($_X['nesne_IDtedarikciTipi'])){ ?>
    <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class=" form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
           </div>
</div>
    <?php }?>  
<?php } ?>



<?php /*/ ?>

<tr><th>Adet</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>
<tr><th>Gramaj</th><td><input type="text" name="<?php echo $tbl?>[gramaj]" value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''?>" autocomplete="off"></td></tr>
    <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></td></tr>



<tr><th>Atkı</th><td>
    <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
</td></tr>
<?php /*/ ?>

<script>
$('.caridurumu').change(function() {
    var caridurumu_ID = $(".caridurumu option:selected").val();
    console.log(caridurumu_ID);
    if(caridurumu_ID=='178'){
        $(".musteritipi").show();
    } else {
        $(".musteritipi").hide();
    }
});

<?php if(!empty($_X['nesne_IDcariTipi'])&&$_X['nesne_IDcariTipi']=='178'){ ?>
    $(".musteritipi").show();
<?php } ?>
</script>