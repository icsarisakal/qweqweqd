

<div class="form-group row">
     <label class="col-lg-3 col-form-label">Alıcı</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[personel_IDalici]" class="form-control">

                <option value="0">Bir Alıcı Seçiniz</option>
                <?php
                    $alici = z(1,'WHERE arsiv!="-1"','ID,ad','personel');
                    
                      foreach ($alici as $key => $value) { echo "<option value='".$value['ID']."'>".$value['ad']."</option>"; }
                ?>
            </select>
        </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Konu </label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[konu]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['konu'])?$_X['konu']:''?>" autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Mesaj </label>
    <div class="col-lg-9">
        <textarea type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[mesaj]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['mesaj'])?$_X['mesaj']:''?>" autocomplete="off"></textarea>
    </div>
</div>

   



<style>
.prcimg{
    width:<?php if(!empty($_X['anahtar'])&&$_X['anahtar']==1){ echo '20%'; } elseif(!empty($_X['anahtar'])&&$_X['anahtar']==2) { echo '5%'; } else{ echo '100%'; } ?>;

}
</style>


