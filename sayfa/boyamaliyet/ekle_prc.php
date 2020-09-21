<style>
.elyafarttir{
    border: 1px solid #8c8989;
    background: white;
    padding: 4px;
    display: block;
    color: black;
    font-weight: bold;
    margin-bottom: 5px;
    width: 98%;
    text-align: center;
    position: relative;
    left: 1%;
    border-radius: 20px;
}
.elyafsil{
    border: 1px solid #8c8989;
    background: white;
    padding: 4px;
    display: inline-block;
    color: black;
    font-weight: bold;
    border-radius: 26%; 
    cursor:pointer;
}
.elyaflartr div{
    margin-bottom:5px;
}
.elyafdiv{
    display:table;
}
</style>
<script>
$( document ).ready(function() {
    $(".elyafarttir").click(function(){
        var silObj = $(".silmedivi").html();
        var cloneObj = $('.elyaf').clone();
        var cloneObj =cloneObj.removeClass("elyaf");
        var cloneObj =cloneObj.append(silObj);
        $(".elyaflartr").append(cloneObj);
        hesapla();
    });
});
function sil(ths){
    $(ths).parent().remove();
    }
function degisim(ths){
    var id = $(ths).val();
$(ths).parent().find("input").attr('name', 'iplik[elyaf]['+id+']');
}
var sum = 0;
function hesapla() {
var sum = 0;
$('.hesapla').each(function(){
    sum += parseFloat(this.value);
    if(sum>100){
        alert("Elyaf Değeri 0 dan büyük 100 den küçük olmalıdır.")
        return false;
    }
}); 

$('.elyaftoplam').html(sum);
}
<?php if(z(8,'a')=='duzenle'){ ?>
hesapla();
<?php } ?>

$( document ).ready(function() {
    $('#siparisdetay_ekle').submit(function(e){
        $("#siparisdetay_ekle").submit();
        
    });
});




</script>
<tr><th>Boya Baskı Tipi	</th><td><input type="text" name="<?php echo $tbl?>[tipi]" value="<?php echo !empty($_X['tipi'])?$_X['tipi']:''?>" autocomplete="off"></td></tr>
<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
<tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
<?php }?>
<?php $_Nesne=z(37,z(1,"WHERE ad='elyafTipi'",'ID,ad,metin1,metin2','nesne'));  ?>

<tr><th>Fire</th><td><input type="number" name="<?php echo $tbl?>[fire]" value="<?php echo !empty($_X['fire'])?z(36,$_X['fire'],0):''?>" autocomplete="off" step=".01"></td></tr>
<tr><th>Birim Fiyat</th><td><input type="number" name="<?php echo $tbl?>[fiyat]" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],0):''?>" autocomplete="off" step=".01"></td></tr>
<?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
<tr><th><?php echo $n['ad']?></th><td><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
<?php }?>
<tr><th>Kayit Tarihi</th><td><?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime'))?></td></tr>
<tr><th colspan="2"><a href="?s=<?php echo $tbl.'&a=listele'; ?>" class="btn" style="padding-top: 0px;margin-top: 4px;">İptal</a><input type="submit" value="Kaydet" /></th></tr>