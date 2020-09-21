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

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Boya Baskı Tipi </label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[tipi]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['tipi'])?$_X['tipi']:''?>" autocomplete="off">
    </div>
</div>

<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
<div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
    <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
    </div>
</div>

<?php }?>
<?php $_Nesne=z(37,z(1,"WHERE ad='elyafTipi'",'ID,ad,metin1,metin2','nesne'));  ?>

<div class="form-group row">
     <label class="col-lg-3 col-form-label">Kategori</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[kategori]" class="form-control">
                <option value="0">Seçiniz</option>
                <option value="1" <?php if(!empty($_X['kategori'])&&$_X['kategori']==1){ echo 'selected'; } ?>>Boya Baskı İşlemleri</option>
                <option value="2" <?php if(!empty($_X['kategori'])&&$_X['kategori']==2){ echo 'selected'; } ?>>Son Terbiye İşlemleri</option>
                <option value="3" <?php if(!empty($_X['kategori'])&&$_X['kategori']==3){ echo 'selected'; } ?>>Fason İşlemleri</option>
            </select>
        </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Fire</label>
    <div class="col-lg-9">
        <input type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[fire]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['fire'])?z(36,$_X['fire'],0):''?>" autocomplete="off" step=".01">
    </div>
</div>


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Birim Fiyat</label>
    <div class="col-lg-9">
        <input type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[fiyat]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],0):''?>" autocomplete="off" step=".01">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Gramaj</label>
    <div class="col-lg-9">
        <input type="number" class="form-control" tabindex="1" name="<?php echo $tbl?>[ekgr]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ekgr'])?z(36,$_X['ekgr'],0):''?>" autocomplete="off" step=".01">
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


<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>">
    </div>
</div>