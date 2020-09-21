<style>

.btnbtnxs{
    padding: .25rem .4rem;
    font-size: .875rem;
    line-height: .5;
    border-radius: .2rem;
}

</style>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Ürün Kategorileri</label>
    <div class="col-lg-9">
    <?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.' urunkategori_ID form-control select2 select-search" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
    <?php }?>
    </div>
</div>

<div class="form-group row">
<label class="col-lg-3 col-form-label"> G.T.İ.P</label>
    <div class="col-lg-9">
        <input type="text" value="<?php echo !empty($_X['gtip'])?$_X['gtip']:'';?>" placeholder="G.T.İ.P" class="gtip form-control" name="<?php echo $tbl; ?>[gtip]" autocomplete="off">
    </div> 
</div>

<div class="urundiv">
<?php if (z(8,'a')=='ekle') { ?>
    <div class="form-group row thisclone">
            <label class="col-lg-3 col-form-label"> Ebat / Ürün Fiyat  <span class="btn btnbtnxs btn-success urunarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger urunazalt" style="cursor:pointer;">Sil</span></label>
        <div class="col-lg-9 row">
            <div class="col-lg-1">
                <input type="checkbox" class="form-control silinecekurundiv">
            </div>
            <div class="col-lg-5">
            <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="nesneSlc_'.$ad.' urunebatlari_ID form-control select2 select-search" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Ebat Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            <?php }?>
            </div>
            <div class="col-lg-5">
                <input type="text" placeholder="Fiyat Giriniz" class="fiyat form-control" name="<?php echo $tbl; ?>[fiyat][]" autocomplete="off">
            </div>
            <!-- <div class="col-lg-3">
                <input type="text" placeholder="G.T.İ.P" class="gtip form-control" name="[gtip][]" autocomplete="off">
            </div> -->
        </div>
    </div>
<?php } ?>

<?php if (z(8,'a')=='duzenle') { 
    
    $ebatarray=(!empty($_X['nesne_IDurunebatlari'])?json_decode($_X['nesne_IDurunebatlari'],1):'');    
    $fiyatarray=(!empty($_X['fiyat'])?json_decode($_X['fiyat'],1):'');    
    // $gtiparray=(!empty($_X['gtip'])?json_decode($_X['gtip'],1):'');   
    // __($ebatarray);
    if(!empty($ebatarray)){ foreach ($ebatarray as $ebatkey => $ebatvalue) {
        $ebats = z(1,$ebatarray[$ebatkey],'metin1','nesne');
        $ebat=(!empty($ebatvalue)?$ebatvalue:null);
        $fiyat=(!empty($fiyatarray[$ebatkey])?$fiyatarray[$ebatkey]:null);
        // $gtip=(!empty($gtiparray[$ebatkey])?$gtiparray[$ebatkey]:null);
?>

    <div class="form-group row thisclone">
    <label class="col-lg-3 col-form-label"> Ebat / Ürün Fiyat <?php if($ebatkey==0){?><span class="btn btnbtnxs btn-success urunarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger urunazalt" style="cursor:pointer;">Sil</span> <?php } ?> </label>
        <div class="col-lg-9 row">
            <div class="col-lg-1">
                <input type="checkbox" class="form-control silinecekurundiv">
            </div>
            <div class="col-lg-3">
            <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="nesneSlc_'.$ad.' urunebatlari_ID form-control select2 select-search" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Ebat Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>$ebat))?>
            <?php }?>
            </div>
            <div class="col-lg-3">
                <input type="text" value="<?php echo $fiyat;?>" placeholder="Fiyat Giriniz" class="fiyat form-control" name="<?php echo $tbl; ?>[fiyat][]" autocomplete="off">
            </div>
            <!-- <div class="col-lg-3">
                <input type="text" value="" placeholder="G.T.İ.P" class="gtip form-control" name="[gtip][]" autocomplete="off">
            </div> -->
        </div>
    </div>

    <?php } } else { ?> 
        <div class="form-group row thisclone">
            <label class="col-lg-3 col-form-label"> Ebat / Ürün Fiyat <span class="btn btnbtnxs btn-success urunarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger urunazalt" style="cursor:pointer;">Sil</span></label>
        <div class="col-lg-9 row">
            <div class="col-lg-1">
                <input type="checkbox" class="form-control silinecekurundiv">
            </div>
            <div class="col-lg-3">
            <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="nesneSlc_'.$ad.' urunebatlari_ID form-control select2 select-search" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Ebat Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            <?php }?>
            </div>
            <div class="col-lg-3">
                <input type="text" placeholder="Fiyat Giriniz" class="fiyat form-control" name="<?php echo $tbl; ?>[fiyat][]" autocomplete="off">
            </div>
            <!-- <div class="col-lg-3">
                <input type="text" class="gtip form-control" placeholder="G.T.İ.P" name="" autocomplete="off">
            </div> -->
        </div>
    </div>
    <?php } ?>

<?php } ?>

</div>



<div style="margin-left:8px;" class="form-group row">
    <label class="col-lg-3 col-form-label">Kayıt Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>

<script>
function select2kontrol(ths){
    var selectadi;
    var selectsayi=0;
    $('select').each(function(ip, objselect){
        selectsayi++;
        selectadi="selectyeni"+selectsayi;
        $(objselect).parent().find("select").attr("id",selectadi);
        $(objselect).parent().find(".select2-container").remove();
        $(objselect).parent().find("select").removeAttr('data-select2-id');
        $('#'+selectadi).select2();
    }); 
}
</script>

<script>
$( document ).ready(function() {   
    $(".urunkategori_ID").attr("required","required");

    $(".urunarttir").click(function(){
      var clone = $('.thisclone:eq(0)').clone();
      $('.urundiv').append(clone);
      $('.thisclone:last .urunarttir').remove();
      $('.thisclone:last .urunazalt').remove();
      select2kontrol();

    });

    $(".urunazalt").click(function(){
        $('.silinecekurundiv').each(function(iham, objham){
            if(iham!=0){
                var chekinboksusayi=$('.silinecekurundiv').length;
                if(objham.checked&&chekinboksusayi>1){
                    $(objham).parent().parent().parent().remove();
                }
                if(objham.checked&&chekinboksusayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            }

        });
    });
    
});
</script>

