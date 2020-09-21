



<?php 
//__($_X);
// $_makinaCesitleri=z(1,'WHERE arsiv="0"','ID,ad','makinacesitleri');
// $_boyaBaski=z(1,'WHERE arsiv="0"','ID,tipi','boyabaski');


// $_aksesuarKarti=z(1,'WHERE arsiv="0"','','aksesuarkarti');
$_kumasTuru=z(1,'WHERE arsiv="0"','','kumasturu');
$_nesneData=z(1,'WHERE ad="numuneDurumTip"','','nesne');
$_cari_Musteri=z(1,"WHERE arsiv='0'",'','cari'); 

$musteriTipi=z(37,z(1,'WHERE ad="musteriTipi"','ID,metin1','nesne'));
$_kayitPersone=z(37,z(1,'WHERE arsiv="0"','ID,ad','personel')); 
$_cariName=z(37,$_cari_Musteri);
if (!empty($_cari_Musteri)) { ?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Müşteri</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[cari_ID]" class="form-control musteri" >
                <option value=0>Seçiniz..</option>
                <?php foreach ($_cari_Musteri as $key => $value) { $tipMusteri=!empty($musteriTipi[$value['nesne_IDmusteriTipi']])?' - '.$musteriTipi[$value['nesne_IDmusteriTipi']]['metin1']:''; 
                    echo $value['ID']?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['cari_ID'])&&$_X['cari_ID']==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['ad'].$tipMusteri; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>


<?php if (!empty($_kayitPersone)) { ?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Numune Gönderen Personel</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[personel_IDkayit]" class="form-control" >
                <option value=0>Seçiniz..</option>
                <?php foreach ($_kayitPersone as $key => $value) { 
                    echo $value['ID']?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['personel_IDkayit'])&&$_X['personel_IDkayit']==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['ad']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>



<?php $numuneCesitTip=z(1,"WHERE arsiv='0' AND ad='numuneCesitTip'",'','nesne'); 

if (!empty($numuneCesitTip)) { ?>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Numune Çeşidi</label>
        <div class="col-lg-5">
            <select name="<?php echo $tbl; ?>[numuneCesitTip]" class="form-control numuneCesitTip">
                <option value=0>Seçiniz..</option>
                <?php foreach ($numuneCesitTip as $key => $value) { 
                    echo $value['ID']?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['nesne_IDnumuneCesitTip'])&&$_X['nesne_IDnumuneCesitTip']==$n['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['metin1']; ?>    
                </option>
                <?php } ?>
            </select>
        </div><div class="col-lg-4" > <div class="buttonClass" style="float:left;" ><div  class="btn btn-primary arttir" >+</div></div></div>
    </div>
<?php } ?>

<div class="numuneClass">

<?php  if(!empty($_X)&&!empty($_X['kumaskarti_ID'])){ ?>
<?php //decode bolumu

    $_X['kumaskarti_ID']=!empty($_X['kumaskarti_ID'])?json_decode($_X['kumaskarti_ID']):'';
    $_X['renkkarti_ID']=!empty($_X['renkkarti_ID'])?json_decode($_X['renkkarti_ID']):'';
    $_X['nesne_IDnumuneDurumTip']=!empty($_X['nesne_IDnumuneDurumTip'])?json_decode($_X['nesne_IDnumuneDurumTip']):'';
    $_X['numuneCesitInput']=!empty($_X['numuneCesitInput'])?json_decode($_X['numuneCesitInput']):'';
    $_X['ebat']=!empty($_X['ebat'])?json_decode($_X['ebat']):'';
    $_X['aciklama']=!empty($_X['aciklama'])?json_decode($_X['aciklama']):'';
    $_X['sampleName']=!empty($_X['sampleName'])?json_decode($_X['sampleName']):'';
    $_X['sampleType']=!empty($_X['sampleType'])?json_decode($_X['sampleType']):'';
    $_X['fabric']=!empty($_X['fabric'])?json_decode($_X['fabric']):'';
    $_X['color']=!empty($_X['color'])?json_decode($_X['color']):'';
    $_X['weight']=!empty($_X['weight'])?json_decode($_X['weight']):'';
    $_X['size']=!empty($_X['size'])?json_decode($_X['size']):'';
    $_X['comment']=!empty($_X['comment'])?json_decode($_X['comment']):'';
    $_X['composition']=!empty($_X['composition'])?json_decode($_X['composition']):'';

    foreach ($_X['kumaskarti_ID'] as $k => $value) { 

?>


<div class="cocukClassKumas  col-lg-10">
<input class="numuneCesitInput" hidden type="text" name="<?php echo $tbl;?>[numuneCesitInput][]" value="<?php echo !empty($_X['numuneCesitInput'][$k])?$_X['numuneCesitInput'][$k]:''?>">



 <div class="form-group row anaRow"><!--ana row baslangic-->
<div class="form-group col"><!--sutun1 baslangic--> 



<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
                    <div class="col-lg-5">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="numuneTip form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad][$k])?$_X['nesne_ID'.$ad][$k]:substr(z('date'),0,7)))?>
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
<?php } } ?>


</div>

  
  


<style>
.prcimg{
    width:<?php if(!empty($_X['anahtar'])&&$_X['anahtar']==1){ echo '20%'; } elseif(!empty($_X['anahtar'])&&$_X['anahtar']==2) { echo '5%'; } else{ echo '100%'; } ?>;

}

</style>



<script>
 function select2kontrol(ths){
    var selectadi;
    var selectsayi=0;
    $(".select2").each(function(ip, objselect){
        selectsayi++;
        selectadi="selectyeni"+selectsayi;
        $(objselect).parent().find(".select2").attr("id",selectadi);
        $(objselect).parent().find(".select2-container").remove();
        $(objselect).parent().find(".select2").removeAttr('data-select2-id');
        $('#'+selectadi).select2();
    }); 

    //alert('asdas');

}
$(document).ready(function(){
   

select2kontrol();
});
</script>


