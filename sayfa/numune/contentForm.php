<div class="gizliClass">

<div class="cocukClassKumas  col-lg-10">
<input class="numuneCesitInput" hidden type="text" name="<?php echo $tbl;?>[numuneCesitInput][]" value="<?php echo !empty($_X['numuneCesitInput'][$k])?$_X['numuneCesitInput'][$k]:''?>">



 <div class="form-group row anaRow"><!--ana row baslangic-->
<div class="form-group col"><!--sutun1 baslangic--> 



<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                    <div class="col-lg-5">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="numuneTip form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
                    </div>
                    
            </div>
 <?php }?>


<?php $kumasKarti=z(1,"WHERE arsiv='0' AND revize_ID='0' ORDER BY kodu ASC",'','kumaskarti'); 

if (!empty($kumasKarti)) { ?>
    <div class="form-group row kumasKartiSelect" >
        <label class="col-lg-3 col-form-label">Kumaş<a class="kumaskartiIDdty" href=""> <i class="icon-files-empty2"></i> </a></label>
        <div class="col-lg-5">
            <select name="<?php echo $tbl; ?>[kumaskarti_ID][]" class="form-control select2" >
                <option value=0>Seçiniz..</option>
                <?php foreach ($kumasKarti as $key => $value) { ?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['kumaskarti_ID'][$k])&&$_X['kumaskarti_ID'][$k]==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['kodu']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
        <label  class="col-lg-4"></label>
        
    </div>
<?php  }  ?>


 


<?php $renkKarti=z(1,"WHERE arsiv='0'",'','renkkarti'); 

if (!empty($renkKarti)) { ?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Renk Kodu :</label>
        <div class="col-lg-5">
            <select name="<?php echo $tbl; ?>[renkkarti_ID][]" class="form-control select2 renkSelect" >
                <option value=0>Seçiniz..</option>
                <?php foreach ($renkKarti as $key => $value) { ?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['renkkarti_ID'][$k])&&$_X['renkkarti_ID'][$k]==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['renkKodu']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>


<div class="form-group row">

    <label class="col-lg-3 col-form-label">Size/Ebat :</label>
    <div class="col-lg-5">
        <input type="text" class="form-control ebat" tabindex="1" name="<?php echo $tbl?>[ebat][]" autofocus="autofocus"  value="<?php echo !empty($_X['ebat'][$k])?$_X['ebat'][$k]:' '?>" autocomplete="off">
    </div>

</div>
<div class="form-group row">

    <label class="col-lg-3 col-form-label">Açıklama :</label>
    <div class="col-lg-5">
        <input type="text" class="form-control aciklama" tabindex="1" name="<?php echo $tbl?>[aciklama][]" autofocus="autofocus"  value="<?php echo !empty($_X['aciklama'][$k])?$_X['aciklama'][$k]:' '?>" autocomplete="off">
    </div>

</div>






<!-- sutun1 bitis --></div>



<div class="form-group col stickerNumune"><!-- sutun2 baslangic-->

<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Customer Name :</label>
    <div class="col-lg-6">
    <label class="col-form-label cari_name"> <?php echo !empty($_X['cari_ID'])?$_cariName[$_X['cari_ID']]['ad']:''?> </label>
        <input hidden type="text" class="form-control cari_nameInput" tabindex="1" name="<?php echo $tbl?>[cari_name][]" autofocus="autofocus" value="<?php echo !empty($_X['cari_ID'])?$_cariName[$_X['cari_ID']]['ad']:''?> " autocomplete="off">
    </div>
</div>


<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Sample Name :</label>
    <div class="col-lg-6">
    <label class="col-form-label sampleName"> <?php echo !empty($_X['sampleName'][$k])?$_X['sampleName'][$k]:''?> </label>
        <input hidden type="text" class="form-control sampleNameInput" tabindex="1" name="<?php echo $tbl?>[sampleName][]" autofocus="autofocus" value="<?php echo !empty($_X['sampleName'][$k])?$_X['sampleName'][$k]:' '?>" autocomplete="off">
    </div>
</div>

<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Sample Type :</label>
    <div class="col-lg-6">
    <label class="col-form-label sampleType"  > <?php echo !empty($_X['sampleType'][$k])?$_X['sampleType'][$k]:''?> </label>
        <input hidden type="text" class="form-control sampleTypeInput" tabindex="1" name="<?php echo $tbl?>[sampleType][]" autofocus="autofocus" value="<?php echo !empty($_X['sampleType'][$k])?$_X['sampleType'][$k]:' '?>" autocomplete="off">
    </div>
</div>
<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label" > Fabric :</label>
    <div class="col-lg-6">
    <label class="col-form-label fabric"  > <?php echo !empty($_X['fabric'][$k])?$_X['fabric'][$k]:''?> </label>
        <input hidden type="text" class="form-control fabricInput" tabindex="1" name="<?php echo $tbl?>[fabric][]" autofocus="autofocus"  value="<?php echo !empty($_X['fabric'][$k])?$_X['fabric'][$k]:' '?>" autocomplete="off">
    </div>
</div>

<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label" > Composition :</label>
    <div class="col-lg-6">
    <label class="col-form-label composition"  > <?php echo !empty($_X['composition'][$k])?$_X['composition'][$k]:''?> </label>
        <input hidden type="text" class="form-control compositionInput" tabindex="1" name="<?php echo $tbl?>[composition][]" autofocus="autofocus"  value="<?php echo !empty($_X['composition'][$k])?$_X['composition'][$k]:' '?>" autocomplete="off">
    </div>
</div>
<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Color :</label>
    <div class="col-lg-6">
    <label class="col-form-label color"> <?php echo !empty($_X['color'][$k])?$_X['color'][$k]:''?> </label>
        <input hidden type="text" class="form-control colorInput" tabindex="1" name="<?php echo $tbl?>[color][]" autofocus="autofocus"  value="<?php echo !empty($_X['color'][$k])?$_X['color'][$k]:' '?>" autocomplete="off">
    </div>
</div>


<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Weight :</label>
    <div class="col-lg-6">
    <label class="col-form-label weight"> <?php echo !empty($_X['weight'][$k])?$_X['weight'][$k]:''?> </label>
        <input hidden type="text" class="form-control weightInput" tabindex="1" name="<?php echo $tbl?>[weight][]" autofocus="autofocus"  value="<?php echo !empty($_X['weight'][$k])?$_X['weight'][$k]:' '?>" autocomplete="off">
    </div>
</div>

<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Size:</label>
    <div class="col-lg-6">
    <label class="col-form-label size"> <?php echo !empty($_X['size'][$k])?$_X['size'][$k]:''?> </label>
        <input hidden type="text" class="form-control sizeInput" tabindex="1" name="<?php echo $tbl?>[size][]" autofocus="autofocus"  value="<?php echo !empty($_X['size'][$k])?$_X['size'][$k]:' '?>" autocomplete="off">
    </div>
</div>


<div class="col-lg-12 row">
    <label class="col-lg-4 col-form-label"> Comment :</label>
    <div class="col-lg-6">
    <label class="col-form-label comment"> <?php echo !empty($_X['comment'][$k])?$_X['comment'][$k]:''?> </label>
        <input hidden type="text" class="form-control commentInput" tabindex="1" name="<?php echo $tbl?>[comment][]" autofocus="autofocus"  value="<?php echo !empty($_X['comment'][$k])?$_X['comment'][$k]:' '?>" autocomplete="off">
    </div>
</div>

<!-- sutun2 bitis--></div>


<div class="col-lg-2" > <div class="buttonClass" style="float:right;" ><div class="btn btn-danger sil" >-</div></div></div>



<!--ana row bitis--></div>


<!--cocukClass--> </div>
<!--gizliclASS--></div>