<style>
.musteritipi{
    display:none;
}
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
    <label class="col-lg-3 col-form-label">Firma Adı *</label>
    <div class="col-lg-9">
        <input type="text" id="cari_ad" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Özel Kod</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ozelkod]" autofocus="autofocus"  value="<?php echo !empty($_X['ozelkod'])?$_X['ozelkod']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
     <label class="col-lg-3 col-form-label">Adres</label>
    <div class="col-lg-9">
    <input name="<?php echo $tbl?>[adres]" value="<?php echo !empty($_X['adres'])?$_X['adres']:''?>" id="map-search" class="controls form-control" type="text" placeholder="Konum Seçiniz" size="104">
    <input hidden name="map_lat" type="text" class="latitude">
    <input hidden name="map_long" type="text" class="longitude">
    <input hidden type="text" class="reg-input-city" placeholder="City">
    <textarea hidden name="full_address" id="formatted_address" cols="30" rows="10"></textarea>
    <textarea hidden name="place_id" id="place_id" cols="30" rows="10"></textarea>
    <textarea hidden name="name" id="name" cols="30" rows="10"></textarea>
    <div hidden id="adr_address"></div>
    <input hidden name="country" id="country"></input>
    </div>
</div>
<div hidden id="map-canvas"></div>
<script src="sayfa/cari/map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCU_8HRhB4QYKIrCoDesIY9ImMU-I1yWnY&libraries=places&callback=initialize"></script>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Telefon-Fax Numarası</label>
        <input style="width:300px;margin-left:10px;margin-right:5px;" placeholder="Telefon Numarası" type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[tel]" autofocus="autofocus" value="<?php echo !empty($_X['tel'])?$_X['tel']:''?>" autocomplete="off">
        <input style="width:300px;" type="text" class="form-control" placeholder="Fax Numarası" tabindex="1" name="<?php echo $tbl?>[faxNo]" autofocus="autofocus" value="<?php echo !empty($_X['faxNo'])?$_X['faxNo']:''?>" autocomplete="off">
</div>

        
<div class="form-group row">
    <label class="col-lg-3 col-form-label">1. Kontak Kişi</label>
        <input style="width:170px;margin-left:10px;margin-right:5px;"  placeholder="Ad" type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[kontak1Ad]" autofocus="autofocus" value="<?php echo !empty($_X['kontak1Ad'])?$_X['kontak1Ad']:''?>" autocomplete="off">
        <input style="width:170px;" type="text" class="form-control" placeholder="E-Posta Adresi" tabindex="1" name="<?php echo $tbl?>[kontak1Mail]" autofocus="autofocus" value="<?php echo !empty($_X['kontak1Mail'])?$_X['kontak1Mail']:''?>" autocomplete="off">
        <input style="width:170px;margin-left:5px;" type="text" class="form-control" placeholder="Telefon Numarası" tabindex="1" name="<?php echo $tbl?>[kontak1Tel]" autofocus="autofocus" value="<?php echo !empty($_X['kontak1Tel'])?$_X['kontak1Tel']:''?>" autocomplete="off">
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">2. Kontak Kişi</label>
        <input style="width:170px;margin-left:10px;margin-right:5px;"  placeholder="Ad" type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[kontak2Ad]" autofocus="autofocus" value="<?php echo !empty($_X['kontak2Ad'])?$_X['kontak2Ad']:''?>" autocomplete="off">
        <input style="width:170px;" type="text" class="form-control" placeholder="E-Posta Adresi" tabindex="1" name="<?php echo $tbl?>[kontak2Mail]" autofocus="autofocus" value="<?php echo !empty($_X['kontak2Mail'])?$_X['kontak2Mail']:''?>" autocomplete="off">
        <input style="width:170px;margin-left:5px;" type="text" class="form-control" placeholder="Telefon Numarası" tabindex="1" name="<?php echo $tbl?>[kontak2Tel]" autofocus="autofocus" value="<?php echo !empty($_X['kontak2Tel'])?$_X['kontak2Tel']:''?>" autocomplete="off">
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Aracı Kurum/Kişi</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[araciKurum]" autofocus="autofocus" value="<?php echo !empty($_X['araciKurum'])?$_X['araciKurum']:''?>" autocomplete="off">
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

<?php $temsilciPersonel=z(37,z(1,"WHERE arsiv='0'",'','personel')); 

if (!empty($temsilciPersonel)) { ?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Müşteri Temsilci Personel</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[temsilciPersonel_ID]" class="form-control" required="required">
                <option value=0>Seçiniz..</option>
                <?php foreach ($temsilciPersonel as $n) { echo $n['ID']?>
                    <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['temsilciPersonel_ID'])&&$_X['temsilciPersonel_ID']==$n['ID']){ echo 'selected'; } ?>
                    ><?php echo $n['ad']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>


<!--<div class="form-group row">
    <label class="col-lg-3 col-form-label">Müşteri Temsilci Personel</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[temsilciPersonel]" autofocus="autofocus" value="<?php echo !empty($_X['temsilciPersonel'])?$_X['temsilciPersonel']:''?>" autocomplete="off">
    </div>
</div>-->


<?php if(!empty($_NSN4))foreach($_NSN4 as $ad=>$n){?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            </div>
    </div>
<?php }?>

<div class="form-group row">
         <label class="col-lg-3 col-form-label">Banka Bilgileri </label>
        <div class="col-lg-9">
            <textarea name="<?php echo $tbl?>[bankaBilgileri]" rows="5" cols="5" class="form-control" tabindex="1"  autofocus="autofocus"  autocomplete="off"><?php echo !empty($_X['bankaBilgileri'])?$_X['bankaBilgileri']:''?></textarea>
        </div>
</div>


<div class="form-group row">
         <label class="col-lg-3 col-form-label">Ödeme Şartları </label>
        <div class="col-lg-9">
            <textarea name="<?php echo $tbl?>[odemeSartlari]" rows="5" cols="5" class="form-control" tabindex="1"  autofocus="autofocus"  autocomplete="off"><?php echo !empty($_X['odemeSartlari'])?$_X['odemeSartlari']:''?></textarea>
        </div>
</div>


<div class="form-group row">
         <label class="col-lg-3 col-form-label">Açıklama </label>
        <div class="col-lg-9">
            <textarea name="<?php echo $tbl?>[aciklama]" rows="5" cols="5" class="form-control" tabindex="1"  autofocus="autofocus"  autocomplete="off"><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea>
        </div>
    </div>

    <th>Resim</th>
<td>
<?php $id=empty(z(8,'id'))?z(1,'son','ID','cari')+1:z(8,'id'); ?>
<input type="file" class="form-control" id="resimfile" name="<?php echo $tbl; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;" multiple>
<?php if(!z(8,'ekle')){ ?>
    <a href="#yuklemebaslat" class="yuklemebaslat">Yüklemeyi Başlat</a> <br>
<?php } ?>

    <?php if(!empty($_X['img'])){  ?>                   
     <div style="float:left;">
        <img width="120px" height="120px" src=<?php echo 'upload/kumaskarti/'.$_X['img']; ?>><br>
        <span class="spanisim"><?php echo $_X['img']; ?></span><br>
        <a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a>
        <input type="hidden" name="neonemivar" value="<?php echo $_X['ID']; ?>">
    </div>                      
    <?php  } ?>      

<div class="resimekaciklama"></div>
</td>



<?php /*$nesnemarka=z(37,z(1,"WHERE ad='' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne')); ?>
<?php 
$markalar=array();
if(!empty($_X['markalar'])){
    $markalar=(!empty($_X['markalar'])?json_decode($_X['markalar'],1):'');
}
*/?>

<!--<div class="form-group row">
    <label class="col-lg-3 col-form-label">Marka</label>
    <div class="col-lg-9">
        <a href="#yenimarka" class="yenimarka form-control" style="display: block;border: 1px solid #ddd;background: white;cursor: pointer;color: black;font-size: 12px;padding: 5px;">Yeni Marka Ekle</a><br>
        
        <?php /*if(!empty($nesnemarka)){ foreach ($nesnemarka as $nm => $nmarka) { ?>
                <input type="checkbox" id="marka<?php echo $nm; ?>" name="<?php echo $tbl; ?>[markalar][]" value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>" <?php if(!empty($nmarka['ID'])&&in_array($nmarka['ID'],$markalar)){echo 'checked';} ?>>
                <label for="marka<?php echo $nm; ?>"> <?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></label><br>
            <?php } } */?> 

    </div>
</div>-->
                        
                        

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
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="caridurumu form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            </div>
        </div>

    <?php }?>
<?php } ?>


<?php 

$musteridurumu=false;
$tedarikcidurumu=false;
if(!empty($_X['nesne_IDcariTipi'])&&$_X['nesne_IDcariTipi']=='178'){
$musteridurumu = ($_X['nesne_IDmusteriTipi']=='0')?true:false;
// $tedarikcidurumu = ($_X['nesne_IDtedarikciTipi']=='0')?true:false;
}
elseif(!empty($_X['nesne_IDcariTipi'])&&$_X['nesne_IDcariTipi']=='179'){
    // $musteridurumu = ($_X['nesne_IDmusteriTipi']=='0')?true:false;
    $tedarikcidurumu = ($_X['nesne_IDtedarikciTipi']=='0')?true:false;
}


if(!empty($adm)||!empty($mevcut)||!empty($potansiyel)||!empty($_X['nesne_IDmusteriTipi'])||$musteridurumu==true){ ?>
    <?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class=" form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
                </div>
        </div>
    <?php }?>  
<?php } ?>


<?php if(!empty($adm)||!empty($tedarikci)||!empty($_X['nesne_IDtedarikciTipi'])||$tedarikcidurumu==true){ ?>
    <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class=" form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
           </div>
</div>
    <?php }?>  
<?php } ?>

<div class="col-lg-12 text-right">
<a href="#" style="margin-left: 500px;"class="yenikaydet btn btn-success" onClick=checkForm()>Kaydet</a>
</div>

<?php $idmiz=z(8,'id'); ?>



<?php /*/ ?>

<tr><th>Adet</th><td><input type="text" tabindex="1" name="<?php echo $tbl?>[adet]" value="<?php echo !empty($_X['adet'])?z(36,$_X['adet'],2):''?>" autocomplete="off"></td></tr>
<tr><th>Gramaj</th><td><input type="text" name="<?php echo $tbl?>[gramaj]" value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''?>" autocomplete="off"></td></tr>
    <tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></td></tr>



<tr><th>Atkı</th><td>
    <label><input type="checkbox" name="<?php echo $tbl?>[atki]" value="1" <?php echo !empty($_X['atki'])?'checked="checked"':''?>" /> Atkı</label>
</td></tr>
<?php /*/ ?>

<script>

function checkForm(){

    var cari_ad = $('#cari_ad').val();  
    var idmiz=<?php echo (!empty($idmiz)?$idmiz:'-1'); ?>;      
         $.ajax({
               type:"POST",
               url:"ajaxayar.php?s=cari&a=ajaxsorgu&cari="+cari_ad+"&idmiz="+idmiz,
               success:function(gelensorgu){
                    var cari=gelensorgu.cevap.cari;
                    if(cari==0){
                        $("#cariForm").submit();
                    } else {
                        alert("Bu Firma İsmi Zaten Kayıtlı");
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