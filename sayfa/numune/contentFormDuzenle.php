
<?php $cID=z(8,'id');
$geciciAkss=array();
$geciciKmss=array();
$nData=z(1,'WHERE arsiv=0 AND ID='.$cID.' ','','numune')[0];
//__($nData);
if($numuneTur[$nData['numuneTur']]=='Kumaş'){
    $numuneKumas=z(1,'WHERE arsiv=0 AND ID='.$nData['numune_ID'].'','','numunekumas')[0];
    //__($numuneKumas);
     $geciciKmss+=['kumaskarti_ID'=>json_decode($numuneKumas['kumaskarti_ID'])];
     $geciciKmss+=['renkKarti_ID'=>json_decode($numuneKumas['renkKarti_ID'])];
     $geciciKmss+=['nesne_IDnumuneDurumTip1'=>json_decode($numuneKumas['nesne_IDnumuneDurumTip1'])];
     $geciciKmss+=['sizeKumas'=>json_decode($numuneKumas['sizeKumas'])];
     
    //__($geciciKmss);
    
  
}
if($numuneTur[$nData['numuneTur']]=='Aksesuar'){
    $numuneAksesuar=z(1,'WHERE arsiv=0 AND ID='.$nData['numune_ID'].'','','numuneaksesuar')[0];
   //__($numuneAksesuar);
    $geciciAkss+=['aksesuar_ID'=>json_decode($numuneAksesuar['aksesuar_ID'])];
    $geciciAkss+=['nesne_IDnumuneDurumTip2'=>json_decode($numuneAksesuar['nesne_IDnumuneDurumTip2'])];
    $geciciAkss+=['sizeAksesuar'=>json_decode($numuneAksesuar['sizeAksesuar'])];
   // __($geciciAkss);
  
}

?>

<div class="numuneClass2">

<?php if(!empty($geciciKmss)){ foreach ($geciciKmss['kumaskarti_ID'] as $kms => $value) { ?>
  
  

<div class="cocukClassKumas">
<input hidden type="text" name="<?php echo $tbl;?>[numuneCesitInput][]" value="277">

<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label"><?php echo $n['ad']?></label>
                    <div class="col-lg-3">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'1][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($geciciKmss['nesne_ID'.$ad.'1'][$kms])?$geciciKmss['nesne_ID'.$ad.'1'][$kms]:substr(z('date'),0,7)))?>
                    </div><div class="col-lg-4" > <div class="buttonClass" style="float:right;" ><div class="btn btn-danger sil" >-</div></div></div>
                    
            </div>
 <?php }?>


 <?php $kumasKarti=z(1,"WHERE arsiv='0' AND revize_ID='0' ORDER BY kodu ASC",'','kumaskarti'); 

if (!empty($kumasKarti)) {  ?>
    <div class="form-group row kumasKartiSelect" >
        <label class="col-lg-2 col-form-label">Kumaş:  <label  class="col-lg-4"><a class="kumaskartiIDdty" href=""><i class="icon-pencil7 mr-3 icon-1x"></i></a></label></label>
        <div class="col-lg-3">
            <select name="<?php echo $tbl; ?>[kumasKarti_ID][]" class="form-control select2" required="required">
                <option value=0>Seçiniz..</option>
                <?php foreach ($kumasKarti as $key => $value) { ?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($geciciKmss['kumaskarti_ID'][$kms])&&$geciciKmss['kumaskarti_ID'][$kms]==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['kodu']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
       
        
    </div>
<?php  }  ?>





<div class="form-group row">
<div class="col-lg-6 row">
    <label class="col-lg-3 col-form-label"> Article:</label>
    <div class="col-lg-3">
    <label class="col-form-label article"> <?php echo !empty($_X['article'])?$_X['article']:''?> </label>
        <input hidden type="text" class="form-control articleInput" tabindex="1" name="<?php echo $tbl?>[article][]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['article'])?$_X['article']:''?>" autocomplete="off">
    </div>
</div>

<div class="col-lg-6 row">
    <label class="col-lg-3 col-form-label"> Ağırlık :</label>
    <div class="col-lg-3">
    <label class="col-form-label agirlik"> <?php echo !empty($_X['agirlik'])?$_X['agirlik']:''?> </label>
        <input hidden type="text" class="form-control agirlikInput" tabindex="1" name="<?php echo $tbl?>[agirlik][]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['agirlik'])?$_X['agirlik']:''?>" autocomplete="off">
    </div>
</div>
</div>
<div class="form-group row">

</div>




<!-- <div class="form-group row">
        <label class="col-lg-3 col-form-label">İplik Tipi</label>
        <div class="col-lg-9">
        <?php// getIplikSelect($tbl); ?>
            
        </div>
    </div> -->


<!-- <div class="form-group row">
        <label class="col-lg-3 col-form-label">İplik</label>
        <div class="col-lg-9">
        <?php //getIplikSelect($tbl); ?>
            
        </div>
</div> -->
<div class="form-group row">
<?php $renkKarti=z(1,"WHERE arsiv='0'",'','renkkarti'); 

if (!empty($renkKarti)) { ?>
    <div class="col-lg-6 row">
        <label class="col-lg-4 col-form-label">Renk Kodu :</label>
        <div class="col-lg-3">
            <select name="<?php echo $tbl; ?>[renkKarti_ID][]" class="form-control" required="required">
                <option value=0>Seçiniz..</option>
                <?php foreach ($renkKarti as $key => $value) { ?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($_X['rekKarti_ID'])&&$_X['renkKarti_ID']==$n['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['renkKodu']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>

<div class="col-lg-6 row">
    <label class="col-lg-3 col-form-label">Size/Ebat :</label>
    <div class="col-lg-3">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[sizeKumas][]" autofocus="autofocus" required="required" value="<?php echo !empty($geciciKmss['sizeKumas'][$kms])?$geciciKmss['sizeKumas'][$kms]:''?>" autocomplete="off">
    </div>
</div>
</div>
<!--cocukClass--> </div>
<?php } } ?>

<?php if(!empty($geciciAkss)){ foreach ($geciciAkss['aksesuar_ID'] as $aks => $value) {
    # code...
 ?>  
<div class="cocukClassAksesuar">

<input hidden type="text" name="<?php echo $tbl;?>[numuneCesitInput][]" value="278">

<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label"><?php echo $n['ad']?></label>
                <div class="col-lg-3">
                    <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'2][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($geciciAkss['nesne_ID'.$ad.'2'][$aks])?$geciciAkss['nesne_ID'.$ad.'2'][$aks]:substr(z('date'),0,7)))?>
                 </div>
                <div class="col-lg-5" > <div class="buttonClass" style="float:right;" ><div class="btn btn-danger sil" >-</div></div></div>
                    
            </div>
 <?php }?>


 <?php $aksesuarKarti=z(1,"WHERE arsiv='0' ",'','aksesuarkarti');// __($aksesuarKarti);
//__($geciciAkss['aksesuar_ID']);

if (!empty($aksesuarKarti)) { ?>
    <div class="form-group row aksesuarSelect" >
        <label class="col-lg-2 col-form-label">Aksesuar:<a class="aksesuarIDdty" href=""><i class="icon-pencil7 mr-3 icon-1x"></i> </a></label>
        <div class="col-lg-3">
            <select name="<?php echo $tbl?>[aksesuar_ID][]" class="form-control select2" required="required">
                <option value=0>Seçiniz..</option>
                <?php foreach ($aksesuarKarti as $key => $value) { ?>
                    <option value=<?php echo $value['ID'] ?> <?php if(!empty($geciciAkss['aksesuar_ID'][$aks]) && $geciciAkss['aksesuar_ID'][$aks]==$value['ID']){ echo 'selected'; } ?>
                    ><?php echo $value['renkKodu']; ?>    
                </option>
                <?php } ?>
            </select>
        </div>
       
       
    </div>
<?php } ?>





<div class="form-group row">
<div class="col-lg-6 row">
    <label class="col-lg-4 col-form-label"> Açıklama :</label>
    <div class="col-lg-3">
    <label class="col-form-label aciklamaA"> <?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?> </label>
        <input hidden type="text" class="form-control aciklamaAInput" tabindex="1" name="<?php echo $tbl?>[aciklama][]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off">
    </div>
</div>

<div class="col-lg-6 row">
    <label class="col-lg-3 col-form-label"> Tedarikci :</label>
    <div class="col-lg-3">
    <label class="col-form-label tedarikA"> <?php echo !empty($_X['tedarikci'])?$_X['tedarikci']:''?> </label>
        <input hidden type="text" class="form-control tedarikAInput" tabindex="1" name="<?php echo $tbl?>[tedarikci][]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['tedarikci'])?$_X['tedarikci']:''?>" autocomplete="off">
    </div>
</div>
</div>




<div class="form-group row">
<div class="col-lg-6 row">
    <label class="col-lg-4 col-form-label"> Aksesuar Grubu :</label>
   
    <div class="col-lg-3">
        <label class="col-form-label grupA"> <?php echo !empty($_X['nesne_IDaksesuargrubu'])?$_X['nesne_IDaksesuargrubu']:''?> </label>
        <input hidden type="text" class="form-control grupAInput" tabindex="1" name="<?php echo $tbl?>[nesne_IDaksesuargrubu][]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['nesne_IDaksesuargrubu'])?$_X['nesne_IDaksesuargrubu']:''?>" autocomplete="off">
    </div>
</div>






<!-- <div class="form-group row">
        <label class="col-lg-3 col-form-label">İplik Tipi</label>
        <div class="col-lg-9">
        <?php// getIplikSelect($tbl); ?>
            
        </div>
    </div> -->


<!-- <div class="form-group row">
        <label class="col-lg-3 col-form-label">İplik</label>
        <div class="col-lg-9">
        <?php //getIplikSelect($tbl); ?>
            
        </div>
</div> -->


<div class="col-lg-6 row">
    <label class="col-lg-3 col-form-label">Size/Ebat :</label>
    <div class="col-lg-3">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[sizeAksesuar][]" autofocus="autofocus" required="required" value="<?php echo !empty($geciciAkss['sizeAksesuar'][$aks])?$geciciAkss['sizeAksesuar'][$aks]:'';?>" autocomplete="off">
    </div>
</div>
</div>
<!--cocukClass--> </div>

<?php }} ?>




<!--numuneClass--></div>

<script>
 
 
</script>