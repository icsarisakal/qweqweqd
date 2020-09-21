<style>
.resimsil{
    color: black;
    display: block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.yuklemebaslat{
    color: black;
    display: block;
    border: 1px solid #96f196;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    padding:2px;
}
</style>

    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Aksesuar Kodu</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[renkKodu]" autofocus="autofocus" required="required"  value="<?php echo !empty($_X['renkKodu'])?$_X['renkKodu']:''?>" autocomplete="off">
        </div>
    </div>

    <div class="form-group row">
         <label class="col-lg-3 col-form-label">Açıklama </label>
        <div class="col-lg-9">
         <textarea name="<?php echo $tbl?>[aciklama]" rows="5" cols="5" class="form-control" tabindex="1"  utofocus="autofocus"  value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off">
            <?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>
        </textarea>
        </div>
    </div>


    <?php $boyaHane=z(37,z(1,"WHERE arsiv='0' AND nesne_IDcariTipi='179'",'ID,ad,ozelkod','cari')); 

        if (!empty($boyaHane)) { ?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tedarikci</label>
                <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[cari_ID]" class="form-control" required="required">
                <option value=0>Seçiniz..</option>
                    <?php foreach ($boyaHane as $n) { echo $n['ID']?>
                    <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['cari_ID'])&&$_X['cari_ID']==$n['ID']){ echo 'selected'; } ?>
                    ><?php echo $n['ad']; ?>    
                    </option>
                    <?php } ?>
            </select>
                </div>
        </div>
    <?php } ?>

    <?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
        </div>
    </div>
<?php }?>

    <?php $boyabaski=z(37,z(1,"WHERE arsiv='0'",'','boyabaski')); 
/* 
        if (!empty($boyabaski)) { ?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Grubu</label>
                <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[boyabaski_ID]" class="form-control" required="required">
                <option value=0>Seçiniz..</option>
                    <?php foreach ($boyabaski as $n) { echo $n['ID']?>
                    <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['boyabaski_ID'])&&$_X['boyabaski_ID']==$n['ID']){ echo 'selected'; } ?>
                    ><?php echo $n['tipi']; ?>    
                    </option>
                    <?php } ?>
            </select>
                </div>
        </div>
    <?php } */ ?>

    <?php $musteri=z(37,z(1,"WHERE arsiv='0' AND nesne_IDcariTipi='178'",'ID,ad,unvan','cari')); 
    /*
        if (!empty($musteri)) { ?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Müşteri</label>
                <div class="col-lg-9">
                    <select name="<?php echo $tbl; ?>[musteri_ID]" class="form-control" required="required">
                        <option value=0>Seçiniz..</option>
                        <?php foreach ($musteri as $n) { echo $n['ID']?>
                            <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['musteri_ID'])&&$_X['musteri_ID']==$n['ID']){ echo 'selected'; } ?>
                            ><?php echo $n['ad']; ?>    
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    <?php } */ ?>
    

<?php /* ?>
    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Varyant (Renk)</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[varyant]" autofocus="autofocus"  value="<?php echo !empty($_X['varyant'])?$_X['varyant']:''?>" autocomplete="off">
        </div>
    </div>


            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Özel Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ozelKodu]" autofocus="autofocus"  value="<?php echo !empty($_X['ozelKodu'])?$_X['ozelKodu']:''?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Erişim Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[erisimKodu]" autofocus="autofocus"  value="<?php echo !empty($_X['erisimKodu'])?$_X['erisimKodu']:''?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Pantone No</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[pantoneNo]" autofocus="autofocus"  value="<?php echo !empty($_X['pantoneNo'])?$_X['pantoneNo']:''?>" autocomplete="off">
                </div>
            </div>


            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Mamül Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[mamulKodu]" autofocus="autofocus"  value="<?php echo !empty($_X['mamulKodu'])?$_X['mamulKodu']:''?>" autocomplete="off">
                </div>
            </div>
<?php */ ?>



     <div class="form-group row">
        <label class="col-lg-3 col-form-label">Fiyat</label>
        <div class="col-lg-9">
            <input type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[fiyat]" autofocus="autofocus"  value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],0):''?>" autocomplete="off" step=".01">
        </div>
    </div>

<?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
        </div>
    </div>
<?php }?>

<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            </div>
    </div>
<?php }?>


    
<th>Resim</th>
<td>
<?php $id=z(8,'id'); ?>
<input type="file" class="form-control" id="resimfile" name="<?php echo $tbl; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;" multiple>
<?php if(!z(8,'ekle')){ ?>
    <a href="#yuklemebaslat" class="yuklemebaslat">Yüklemeyi Başlat</a> <br>
<?php } ?>
<?php $galericek=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$id),'ID,img','galeri'); ?>
<?php  if(!empty($galericek)){ ?>
    <?php foreach ($galericek as $gl => $galeri) {?>
        <div style="float:left;">
            <img data-fancybox="gallery1" href="upload/kumaskarti/<?php echo $galeri['img']; ?>" src="upload/kumaskarti/<?php echo $galeri['img']; ?>" style="width:140px; height:140px; padding:5px; cursor:pointer;">
            <span class="spanisim"><?php echo $galeri['img']; ?></span>
            <a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a>
            <input type="hidden" name="neonemivar" value="<?php echo $galeri['ID']; ?>">
        </div>
    <?php } ?>
<?php } ?>
<div class="resimekaciklama"></div>
</td>
<?php /*/ ?>

    <tr><th>Şartlar</th><td><textarea name="<?php echo $tbl?>[sartlar]" class="" ><?php echo !empty($_X['sartlar'])?$_X['sartlar']:''?></textarea></td></tr>
    <?php /*/ ?>
<div class="form-group row">
                <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
                <div class="input-group col-lg-9">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                    </span>
                    <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarih]" value="<?php echo (!empty($_X['tarih'])?z('date',$_X['tarih']):z('datetime')); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Talep Tarihi</label>
                <div class="input-group col-lg-9">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                    </span>
                    <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihTalep]" value="<?php echo (!empty($_X['tarihTalep'])?z('date',$_X['tarihTalep']):z('datetime')); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Okey Tarihi</label>
                <div class="input-group col-lg-9">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                    </span>
                    <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihOkey]" value="<?php echo (!empty($_X['tarihOkey'])?z('date',$_X['tarihOkey']):z('datetime')); ?>">
                </div>
            </div>

<script>
$('.yuklemebaslat').on('click', function() {
    var file_length = $('#resimfile').prop('files').length;   
    for (i = 0; i < file_length; i++) {
        var file_data = $('#resimfile').prop('files')[i];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        var id=<?php echo $id; ?>;
        var tbl="<?php echo $tbl; ?>";
        $.ajax({
            url: 'ajaxayar.php?s=kumaskarti&a=ajaxsorgu3&id='+id+"&tblgonder="+tbl,
            dataType: 'text',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success:function(gelensorgu){
                var gelensorgu=JSON.parse(gelensorgu);
                console.log(gelensorgu);
                if(gelensorgu.sonuc==1){
                    var dosyaAd=gelensorgu.cevap.dosyaAd;
                    var dosyaid=gelensorgu.cevap.dosyaid;
                    var icerik='<div style="float:left;"><img data-fancybox="gallery1" href="upload/kumaskarti/'+dosyaAd+'" src="upload/kumaskarti/'+dosyaAd+'" style="width:140px; height:140px; padding:5px; cursor:pointer;"><span class="spanisim">'+dosyaAd+'</span><a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a><input type="hidden" name="neonemivar" value="'+dosyaid+'"></div>';
                    $(".resimekaciklama").after(icerik);
                }
            }
        });
    }
});
function resimsil(ths){
    var resimsil=$(ths).parent().find("input").val();
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&resimsil="+resimsil,
            success:function(gelensorgu){
                $(ths).parent().remove();
                alert("Resim kalıcı olarak silindi");
            }
        });
}
</script>
