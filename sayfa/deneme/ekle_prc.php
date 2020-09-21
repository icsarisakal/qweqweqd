<style>

.btnbtnxs{
    padding: .25rem .4rem;
    font-size: .875rem;
    line-height: .5;
    border-radius: .2rem;
}

</style>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Adı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>

<div class="element">
<?php if(z(8,'a')=='ekle'){ ?>
    <div class="form-group row bunukopyala">
        <label class="col-lg-3 col-form-label"> Ebat / Adres  / Açıklama <span class="btn btnbtnxs btn-success cesitarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger cesitsil" style="cursor:pointer;">Sil aga</span></label>
        <div class="col-lg-9 row">
            <div class="col-lg-1">
                <input type="checkbox" class="form-control chekinboksu">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[ebat][]" autocomplete="off">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[adres][]" autocomplete="off">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[aciklama][]" autocomplete="off">
            </div>
        </div>
    </div>
<?php } ?>

<?php if(z(8,'a')=='duzenle'){ ?>
    <?php
    $ebatarray=(!empty($_X['ebat'])?json_decode($_X['ebat'],1):'');    
    $adresarray=(!empty($_X['adres'])?json_decode($_X['adres'],1):'');    
    $aciklamaarray=(!empty($_X['aciklama'])?json_decode($_X['aciklama'],1):'');   
    if(!empty($ebatarray)){ foreach ($ebatarray as $ebatkey => $ebatvalue) {
        $ebat=(!empty($ebatvalue)?$ebatvalue:null);
        $adres=(!empty($adresarray[$ebatkey])?$adresarray[$ebatkey]:null);
        $aciklama=(!empty($aciklamaarray[$ebatkey])?$aciklamaarray[$ebatkey]:null);
    ?>
        <div class="form-group row bunukopyala">
    <label class="col-lg-3 col-form-label"> Ebat / Adres  / Açıklama <?php if($ebatkey==0){ ?><span class="btn btnbtnxs btn-success cesitarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger cesitsil" style="cursor:pointer;">Sil aga</span><?php } ?></label>
            <div class="col-lg-9 row">
                <div class="col-lg-1">
                    <input type="checkbox" class="form-control chekinboksu">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="<?php echo $tbl; ?>[ebat][]" value="<?php echo $ebat; ?>" autocomplete="off">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="<?php echo $tbl; ?>[adres][]" value="<?php echo $adres; ?>" autocomplete="off">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="<?php echo $tbl; ?>[aciklama][]" value="<?php echo $aciklama; ?>" autocomplete="off">
                </div>
            </div>
        </div>
    <?php } } else { ?> 
        <div class="form-group row bunukopyala">
        <label class="col-lg-3 col-form-label"> Ebat / Adres  / Açıklama <span class="btn btnbtnxs btn-success cesitarttir" style="cursor:pointer;">Arttır</span> <span class="btn btnbtnxs btn-danger cesitsil" style="cursor:pointer;">Sil aga</span></label>
        <div class="col-lg-9 row">
            <div class="col-lg-1">
                <input type="checkbox" class="form-control chekinboksu">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[ebat][]" autocomplete="off">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[adres][]" autocomplete="off">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="<?php echo $tbl; ?>[aciklama][]" autocomplete="off">
            </div>
        </div>
    </div>
    <?php } ?>

<?php } ?>

<input type="text" class="form-control" name="<?php echo $tbl; ?>[veri][][]">
</div>


<script>
$( document ).ready(function() {

    $(".cesitarttir").click(function(){
        var clone=$(".bunukopyala:eq(0)").clone();
        $(".element").append(clone);
        $(".bunukopyala:last span").remove();
    });

    $(".cesitsil").click(function(){
        $('.chekinboksu').each(function(iham, objham){
            if(iham!=0){
                var chekinboksusayi=$('.chekinboksu').length;
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



<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>