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
    display: none;
    border: 1px solid #96f196;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    padding:2px;
}
</style>

    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Ürün Kodu </label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
        </div>
    </div>


    <div class="form-group row">
         <label class="col-lg-3 col-form-label">Açıklama </label>
        <div class="col-lg-9">
            <textarea name="<?php echo $tbl?>[aciklama]" rows="5" cols="5" class="form-control" tabindex="1"  utofocus="autofocus" required="required" value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off">
                <?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>
            </textarea>
        </div>
    </div>

    <div class="form-group row">
         <label class="col-lg-3 col-form-label">Renk Kodu </label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[renkKodu]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['renkKodu'])?$_X['renkKodu']:''?>" autocomplete="off">
        </div>
    </div>


    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Barkod Numarası</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[barkodNo]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['barkodNo'])?$_X['barkodNo']:''?>" autocomplete="off">
        </div>
    </div>

     <div class="form-group row">
            <label class="col-lg-3 col-form-label">Artikel Numarası</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[artikelNo]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['artikelNo'])?$_X['artikelNo']:''?>" autocomplete="off">
        </div>
    </div>


     <div class="form-group row">
            <label class="col-lg-3 col-form-label">Fiyat</label>
         <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[fiyat]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],2):''?>" autocomplete="off">
         </div>
    </div>

    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Stok Adedi</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[adet]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off">
        </div>
    </div>

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
</tr>
<?php /*/ ?>

    <tr><th>Şartlar</th><td><textarea name="<?php echo $tbl?>[sartlar]" class="" ><?php echo !empty($_X['sartlar'])?$_X['sartlar']:''?></textarea></td></tr>
    <?php /*/ ?>
 <div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>">
    </div>
</div>

<script>

<?php $eklekontrol=z(8,'ekle'); if(empty($eklekontrol)){ ?>
    $('#resimfile').on("change", function(){
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
<?php } ?>

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
