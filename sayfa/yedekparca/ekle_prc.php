
    <div class="form-group row">
    <label class="col-lg-3 col-form-label"> Adı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>

    <div class="form-group row">
    <label class="col-lg-3 col-form-label"> Parça Kodu *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[parcakodu]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['parcakodu'])?$_X['parcakodu']:''?>" autocomplete="off">
    </div>
</div>


<style>
.prcimg{
    width:<?php if(!empty($_X['anahtar'])&&$_X['anahtar']==1){ echo '20%'; } elseif(!empty($_X['anahtar'])&&$_X['anahtar']==2) { echo '5%'; } else{ echo '100%'; } ?>;

}
</style>

<tr><th>Resim</th><td><input type="file" class="form-control" name="<?php echo $tbl; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;"><?php /* bu satırdaki kodda resim olup olmadıgı sorguluyor yani kısacası sorgulama yaptırıyoruz.*/ ?>
<?php  if(!empty($_X['img'])){ ?><?php /* bu alanda ekleme sayfasına eklediğimiz resmi veya */?>
    <img src="upload/kumaskarti/<?php echo $_X['img'];?>" class="prcimg"><?php /* ?>fotografı görmek için yazılan koddur*/?> 
    <span style="float:left;"><?php echo $_X['img'];?></span>
<?php } ?>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Plaka Sayısı</label>
    <div class="col-lg-9">
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="tek1" class="form-check-input-styled" name="<?php echo $tbl?>[anahtar]" value="1" <?php if(!empty($_X['anahtar'])&&$_X['anahtar']==1){ echo 'checked'; } ?>>
                Çelik tarzı parça
            </label>
            
            <label class="form-check-label">
                <input type="radio" id="cift2" class="form-check-input-styled" name="<?php echo $tbl?>[anahtar]" value="2" <?php if(!empty($_X['anahtar'])&&$_X['anahtar']==2){ echo 'checked'; } ?>>
                İğne tarzı parça
            </label>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>