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

table {
    /*border-collapse: collapse;*/
    border-radius: 2px;
    box-shadow: 1px 1px 1px 1px #666; /* this draws the table border  */ 
}

</style>

    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Renk / Desen Kodu</label>
        <div class="col-lg-9">
            <input required type="text" class="form-control" tabindex="1"  name="<?php echo $tbl?>[renkKodu]" autofocus="autofocus" value="<?php echo !empty($_X['renkKodu'])?$_X['renkKodu']:''?>" autocomplete="off">
        </div>
    </div>

    <div class="form-group row">
         <label class="col-lg-3 col-form-label">Açıklama </label>
        <div class="col-lg-9">
         <textarea name="<?php echo $tbl?>[aciklama]" rows="5" cols="5" class="form-control" tabindex="1"  utofocus="autofocus" value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off">
            <?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>
        </textarea>
        </div>
    </div>


    <?php $boyaHane=z(37,z(1,"WHERE arsiv='0' AND nesne_IDcariTipi='179'",'ID,ad,ozelkod','cari')); 
     $boyabaski=z(37,z(1,"WHERE arsiv='0'",'','boyabaski')); 

        if (!empty($boyaHane)) { ?>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Boyahane / Grubu</label>
                    <div class="col-lg-9">
                <select style="margin-right:2%; float:left; width:49%;" name="<?php echo $tbl; ?>[cari_ID]" class="form-control">
                    <option value="">Boyahane Seçiniz..</option>
                        <?php foreach ($boyaHane as $n) { echo $n['ID']?>
                        <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['cari_ID'])&&$_X['cari_ID']==$n['ID']){ echo 'selected'; } ?>
                        ><?php echo $n['ad']; ?>    
                        </option>
                        <?php } ?>
                </select>
               <?php if (!empty($boyabaski)) { ?>
                <select style="width:49%;" name="<?php echo $tbl; ?>[boyabaski_ID]" class="form-control" >
                    <option value="">Grup Seçiniz..</option>
                    <?php foreach ($boyabaski as $n) { echo $n['ID']?>
                        <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['boyabaski_ID'])&&$_X['boyabaski_ID']==$n['ID']){ echo 'selected'; } ?>
                        ><?php echo $n['tipi']; ?>    
                    </option>
                    <?php } ?>
                </select>
                    <?php } ?>
                    </div>
            </div>
    <?php } ?>
  
<?php 
        
    if(z(8,'id')&&z(8,'a')=='duzenle'){  
        $id = z(8,'id');
        $_X['musteri_ID'] = explode(',',$_X['musteri_ID']);
        $_X['musteriboyabaski_ID'] = explode(',',$_X['musteriboyabaski_ID']);
        $_X['nesne_IDrenkadi'] = explode(',',$_X['nesne_IDrenkadi']);
        //__($_X);
        $musteriler = array();
        for($i=0;$i<count($_X['musteri_ID']);$i++){
            $musteriler[$i]['musteri_ID'] = !empty($_X['musteri_ID'][$i])?$_X['musteri_ID'][$i]:'0';
            $musteriler[$i]['ad'] = !empty($_X['musteriboyabaski_ID'][$i])?z(1,$musteriler[$i]['musteri_ID'],'ad','cari'):'0';   
            $musteriler[$i]['musteriboyabaski_ID'] = !empty($_X['musteriboyabaski_ID'][$i])?$_X['musteriboyabaski_ID'][$i]:'0'; 
            $musteriler[$i]['boyabaski'] = !empty($_X['musteriboyabaski_ID'][$i])?z(1,$musteriler[$i]['musteriboyabaski_ID'],'tipi','boyabaski'):'0';   
            $musteriler[$i]['nesne_IDrenkadi'] = !empty($_X['nesne_IDrenkadi'][$i])?$_X['nesne_IDrenkadi'][$i]:'0';
            $musteriler[$i]['renkadi'] = !empty($_X['nesne_IDrenkadi'][$i])?z(1,$musteriler[$i]['nesne_IDrenkadi'],'metin1','nesne'):'0';   
        }
       //__($musteriler);
    } ?>

<?php $musteri=z(37,z(1,"WHERE arsiv='0' AND nesne_IDcariTipi='178'",'ID,ad,ozelkod','cari')); 

    if (!empty($musteri)) { ?>
        <div class="form-group row">
            <label style="margin-top:2%;" class="col-lg-3 col-form-label">Müşteri / Grubu / Renk Adı &nbsp;
            <a href="#" class="musteriarttir btn btn-success"><i style="margin-top:3px; line-height:0px; font-size:10px;"class="icon-plus3 icon-1x"></i></a>
            <a href="#" class="musterisil btn btn-danger"><i style="margin-top:3px; line-height:0px; font-size:10px;" class="icon-minus3 icon-1x"></i></a>
            </label>
            <div class="musteridiv col-lg-9">
                <select style="margin-top:3%; margin-right:2%; float:left; width:32%;" name="<?php echo $tbl; ?>[musteri_ID][0]" class="form-control">
                    <option value="0">Müşteri Seçiniz..</option>
                    <?php foreach ($musteri as $n) { echo $n['ID']?>
                        <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['musteri_ID'])&&$_X['musteri_ID']==$n['ID']){ echo 'selected'; } ?>
                        ><?php echo $n['ad']; ?>    
                        </option>
                    <?php } ?>
                </select>
                <?php if (!empty($boyabaski)) { ?>
                <select required style="float:left;margin-top:3%; margin-right:1%; width:32%;" name="<?php echo $tbl; ?>[musteriboyabaski_ID][0]" class="form-control" >
                    <option value="0">Grup Seçiniz..</option>
                    <?php foreach ($boyabaski as $n) { echo $n['ID']?>
                        <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['musteriboyabaski_ID'])&&$_X['musteriboyabaski_ID']==$n['ID']){ echo 'selected'; } ?>
                        ><?php echo $n['tipi']; ?>    
                    </option>
                    <?php } ?>
                </select>
                    <?php } ?>

            <?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){
                // print_r($n);?>
            
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][0]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">Renk Adı</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            <?php }?>

            </div>
            
        </div>
<?php } ?>


<?php if(!empty($musteriler)){?>
<?php if($musteriler[0]['musteri_ID']!=0){?>
<table id="data-table" style="width:65%; margin-left:26%; margin-bottom:20px;">
        <tr>
            <th>##</th>
            <th>Müşteri</th>
            <th>Grubu</th>
            <th>Renk Adı</th>

        </tr>
            <?php $i=0; foreach($musteriler as $k){?>
        <tr class=<?php echo "data-item".$i; ?> data-info="naber" data-valueee=<?php echo $k['nesne_IDrenkadi'];?> data-valuee="<?php echo $k['musteriboyabaski_ID'];?>" data-value="<?php echo $k['musteri_ID'];?>">
            <td><a href="#" class="deleteRow" onClick=<?php echo "deleteRow(".$i.")";?>><b>Sil</b></a></td>
            <td><?php echo !empty($k['ad'])?$k['ad']:''; ?></td>
            <td><?php echo !empty($k['boyabaski'])?$k['boyabaski']:''; ?></td>
            <td><?php echo !empty($k['renkadi'])?$k['renkadi']:''; ?></td>
        </tr>
            <?php $i++;} ?>
</table>
<?php } } ?>


    <div class="form-group row">
            <label class="col-lg-3 col-form-label">Varyant (Renk)</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[varyant]" autofocus="autofocus" value="<?php echo !empty($_X['varyant'])?$_X['varyant']:''?>" autocomplete="off">
        </div>
    </div>


            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Özel Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ozelKodu]" autofocus="autofocus" value="<?php echo !empty($_X['ozelKodu'])?$_X['ozelKodu']:''?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Erişim Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[erisimKodu]" autofocus="autofocus" value="<?php echo !empty($_X['erisimKodu'])?$_X['erisimKodu']:''?>" autocomplete="off">
                </div>
            </div>

            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Pantone No</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[pantoneNo]" autofocus="autofocus" value="<?php echo !empty($_X['pantoneNo'])?$_X['pantoneNo']:''?>" autocomplete="off">
                </div>
            </div>


            <div class="form-group row" style="display:none;">
                    <label class="col-lg-3 col-form-label">Mamül Kodu</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[mamulKodu]" autofocus="autofocus" value="<?php echo !empty($_X['mamulKodu'])?$_X['mamulKodu']:''?>" autocomplete="off">
                </div>
            </div>



     <div class="form-group row">
    <label class="col-lg-3 col-form-label">Fiyat</label>
    <div class="col-lg-9">
        <input type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[fiyat]" autofocus="autofocus" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],0):''?>" autocomplete="off" step=".01">
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
            <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
 
 $( document ).ready(function() {
    $('.musteridiv select:eq(2)').css('width','33%');
    $('.musteridiv select:eq(2)').css('margin-top','3%');
    // $('.musteridiv select:eq(2)').attr('required','required');
});



function deleteRow(i){
   var musteri_IDs = '';
   var musteriboyabaski_IDs = '';
   var nesne_IDrenkadi='';

    $('.data-item'+i).remove();
    for(var jj=0;i<=$('#data-table tr').length;i++){
            $('.data-item'+(i+1)).attr('class','data-item'+i);
    }

for(var t=0;t<$('#data-table tr').length-1;t++){
    musteri_IDs = musteri_IDs+$('.data-item'+t).data('value')+',';
    musteriboyabaski_IDs = musteriboyabaski_IDs+$('.data-item'+t).data('valuee')+',';
    nesne_IDrenkadi = nesne_IDrenkadi+$('.data-item'+t).data('valueee')+',';
}

var id=<?php echo (!empty($id)?$id:'-1'); ?>;      
     $.ajax({
           type:"POST",
           url:"ajaxayar.php?s=renkkarti&a=ajaxsorgu&musteri="+musteri_IDs+"&boyabaski="+musteriboyabaski_IDs+"&renkadi="+nesne_IDrenkadi+"&id="+id,
           success:function(gelensorgu){
                var update=gelensorgu.cevap.update;
                 var sonkontrol=gelensorgu.cevap.sonkontrol;
                console.log(sonkontrol);
                if(update==1){
                    alert("Silme işlemi başarılı.");
                    location.reload();
                }                
            }
    });
}



$('.yuklemebaslat').on('click', function() {
    var file_length = $('#resimfile').prop('files').length;   
    for (i = 0; i < file_length; i++) {
        var file_data = $('#resimfile').prop('files')[i];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        var id="<?php $id; ?>";
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

var chx=1;
$(".musteriarttir").click(function(){
    var selectClone0 = $('.musteridiv select:eq(0)').clone();
    var selectClone1 = $('.musteridiv select:eq(1)').clone();
    var selectClone2 = $('.musteridiv select:eq(2)').clone();
    selectClone0.attr('name','renkkarti[musteri_ID]['+chx+']');
    selectClone1.attr('name','renkkarti[musteriboyabaski_ID]['+chx+']');
    selectClone2.attr('name','renkkarti[nesne_IDrenkadi]['+chx+']');

    newSelect0 = $('.musteridiv').append(selectClone0);
   newSelect1 = $('.musteridiv').append(selectClone1);
   newSelect2 = $('.musteridiv').append(selectClone2);
console.log(newSelect0.html(),newSelect1.html());
    chx++;
});

$(".musterisil").click(function(){
    if(chx>1){
        $('.musteridiv select:last-child').remove();
        $('.musteridiv select:last-child').remove();
        $('.musteridiv select:last-child').remove();
        chx--;
    }
});

</script>
