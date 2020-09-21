<div class="form-group row">
    <label class="col-lg-3 col-form-label">Makina Adı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Plaka Sayısı</label>
    <div class="col-lg-9">
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="tek1" class="form-check-input-styled" name="<?php echo $tbl?>[plakasayi]" value="1" <?php if(!empty($_X['plakasayi'])&&$_X['plakasayi']==1){ echo 'checked'; } ?>>
                Tek
            </label>
            <label class="form-check-label">
                <input type="radio" id="cift2" class="form-check-input-styled" name="<?php echo $tbl?>[plakasayi]" value="2" <?php if(!empty($_X['plakasayi'])&&$_X['plakasayi']==2){ echo 'checked'; } ?>>
                Çift
            </label>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Pus *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[pus]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['pus'])?$_X['pus']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Fayn *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[fayn]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['fayn'])?$_X['fayn']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Sistem Sayısı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[sistemsayi]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['sistemsayi'])?$_X['sistemsayi']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">İğne Sayısı *</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ignesayi]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ignesayi'])?$_X['ignesayi']:''?>" autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>">
    </div>
</div>