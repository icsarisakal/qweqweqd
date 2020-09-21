<style>
.table thead tr th{
    font-weight:600;
    font-size:14;
}
input:hover,select:hover{
    border: 2px solid black;
}
input:focus,select:focus{
    border: 2px solid red !important;
}
.card{
    border: 1px solid black;
}
.form-group .table {
    border: 1px solid black;

}
.nesneSlc_doviz{
    min-width:200px;
}
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
<?php   $fisNoSorgu = z(1,'WHERE arsiv!=-1 ORDER BY fisNo DESC LIMIT 1','fisNo','satinalma');
        $fisNo=!empty($fisNoSorgu)?$fisNoSorgu:''; 

      $cari=z(1,'WHERE arsiv=0 ORDER BY ad ASC','ID,ad','cari');
      empty($fisNo[0])?$fisNo[0]='':$fisNo[0]+=1;
     
      
?>
 <input hidden class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarih]" value="<?php echo (!empty($_X['tarih'])?z('date',$_X['tarih']):z('datetime')); ?>">
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Fiş No  </label>
    <div class="col-lg-9">
        <input disabled type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[fisNo][]" autofocus="autofocus"  value="<?php echo !empty($_X['fisNo'])?$_X['fisNo']:$fisNo[0]?>" autocomplete="off">

    </div>
</div>
<?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
<div class="form-group row">
        <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
    <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="siparistip form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
    </div>
</div>


<?php }?>



<div class="form-group row">
    <label class="col-lg-3 col-form-label">Sipariş/Fiş Tarihi</label>

    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihFis]" value="<?php echo (!empty($_X['tarihFis'])?z('date',$_X['tarihFis']):z('datetime')); ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Belge No </label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[belgeNo]" autofocus="autofocus"  value="<?php echo !empty($_X['belgeNo'])?$_X['belgeNo']:''?>" autocomplete="off">
    </div>
</div>


<div class="form-group row">
     <label class="col-lg-3 col-form-label">Cari Hesap</label>
        <div class="col-lg-9">
            <select name="<?php echo $tbl; ?>[cari_ID]" class="form-control">
                <option value="0">Seçiniz</option>
                <?php if(!empty($cari)){
                    foreach ($cari as $key => $value) {?>

                     <option value="<?php echo $value['ID']; ?>" <?php if(!empty($_X['ID'])&& ($_X['cari_ID']==$value['ID']))echo 'selected'; ?> > <?php echo $value['ad']; ?></option>   <?php } } ?>
            </select>
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


<div class="form-group"> 

<table class="table">
  <thead class="thead-light">
    <tr>
        <th>##</th>
        <th>
        <span class="btn btn-success malzemearttir" style="font-size:70%; cursor:pointer;">Arttır</span>
        <span class="btn btn-danger malzemeazalt" style="font-size:70%; cursor:pointer;">Sil</span>
        Malzeme Kodu
        </th>
        <th>Malzeme Adı</th>
        <th>Açıklama</th>
        <th>Termin</th>
        <th>Sipariş Miktarı</th>
        <th>Birim</th>
        <th>Fiyat</th>
        <th>Döviz</th>
        <th>Gelen Miktar</th>
        <th>Kalan Miktar</th>
    </tr>
  </thead>
  <tbody>
  <?php  if(z(8,'a')=='duzenle') { 
      
    $id = !empty(z(8,'id'))?z(8,'id'):0;
    $jsonData = z(1,$id,'','satinalma');
    $nesne_IDbirimTipi = !empty($jsonData['nesne_IDbirimTipi'])?json_decode($jsonData['nesne_IDbirimTipi']):'';
    $nesne_IDdoviz = !empty($jsonData['nesne_IDdoviz'])?json_decode($jsonData['nesne_IDdoviz']):'';
    $fiyat = !empty($jsonData['fiyat'])?json_decode($jsonData['fiyat']):'';
    $siparisMiktar = !empty($jsonData['siparisMiktar'])?json_decode($jsonData['siparisMiktar']):'';
    $gelenMiktar = !empty($jsonData['gelenMiktar'])?json_decode($jsonData['gelenMiktar']):'';
    $kalanMiktar = !empty($jsonData['kalanMiktar'])?json_decode($jsonData['kalanMiktar']):'';
    $malzemeKodu = !empty($jsonData['malzemeKodu'])?json_decode($jsonData['malzemeKodu']):'';
    $malzemeAd = !empty($jsonData['malzemeAd'])?json_decode($jsonData['malzemeAd']):'';
    $aciklama = !empty($jsonData['aciklama'])?json_decode($jsonData['aciklama']):'';
    $tarihTermin = !empty($jsonData['tarihTermin'])?json_decode($jsonData['tarihTermin']):'';
    if($jsonData['nesne_IDsatinalmaTip']=='264'||$jsonData['nesne_IDsatinalmaTip']=='266'){
        $malzemeKoduText = z(1,$jsonData['nesne_IDsatinalmaTip'],'ID,metin1','nesne');
    }
    elseif($jsonData['nesne_IDsatinalmaTip']=='265'){
        $malzemeKoduText = z(1,'WHERE arsiv=0 AND revize_ID=0','ID,kodu','kumaskarti');
    }
        foreach($malzemeKodu as $key => $selectedMalzeme){
            $birimTipiVal = z(1,$nesne_IDbirimTipi[$key],'ID,metin1','nesne');
            $dovizVal = z(1,$nesne_IDdoviz[$key],'ID,metin1','nesne');
            $siparisMiktarVal = $siparisMiktar[$key];
            $gelenMiktarVal = $gelenMiktar[$key];
            $kalanMiktarVal = $kalanMiktar[$key];
            $malzemeAdVal = $malzemeAd[$key];
            $fiyatVal = $fiyat[$key];
            $aciklamaVal = $aciklama[$key];
            $tarihTerminVal = $tarihTermin[$key];
            $malzemeKoduTxt = !empty($malzemeKoduText[$selectedMalzeme])?$malzemeKoduText[$selectedMalzeme]:'';
            $malzemeKoduSelectedID[$key] = $selectedMalzeme;
?>
    <tr class="cloneTr">
        <td>
            <div>
                <input type="checkbox" style="width:200%;" class="form-control silinecekurundiv">
            </div>
        </td>

      <td>
        <div>
        <select class="malzemekodu select2 select-search form-control" name="<?php echo $tbl?>[malzemeKodu][]">
            <option  value="0">Seçiniz</option>
        </select>
        </div>
    </td>
    
    <td>
        <div>
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[malzemeAd][]" autofocus="autofocus"  value="<?php echo !empty($malzemeAdVal)?$malzemeAdVal:''?>" autocomplete="off">
        </div>
    </td>
    <td>
        <div>
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[aciklama][]" autofocus="autofocus"  value="<?php echo !empty($aciklamaVal)?$aciklamaVal:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <div class="input-group">
                 <span class="input-group-prepend">
                     <span class="input-group-text"><i class="icon-calendar22"></i></span>
                 </span>
            <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihTermin][]" value="<?php echo (!empty($tarihTerminVal)?z('date',$tarihTerminVal):z('datetime')); ?>">
        </div>
    </td>
    <td >
        <div >
            <input  type="number" class="form-control"  name="<?php echo $tbl?>[siparisMiktar][]" autofocus="autofocus"  value="<?php echo !empty($siparisMiktarVal)?$siparisMiktarVal:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <?php if(!empty($_NSN1))foreach($_NSN1 as $ad=>$n){?>
            <div class="form-group row">
               
                 <div class="col">
                     <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($nesne_IDbirimTipi[$key])?$nesne_IDbirimTipi[$key]:substr(z('date'),0,7)))?>
             </div>
        </div>


        <?php }?>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[fiyat][]" autofocus="autofocus"  value="<?php echo !empty($fiyatVal)?$fiyatVal:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
            <div class="form-group row">
               
                 <div >
                     <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($nesne_IDdoviz[$key])?$nesne_IDdoviz[$key]:substr(z('date'),0,7)))?>
             </div>
        </div>


        <?php }?>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[gelenMiktar][]" autofocus="autofocus"  value="<?php echo !empty($gelenMiktarVal)?$gelenMiktarVal:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[kalanMiktar][]" autofocus="autofocus"  value="<?php echo !empty($kalanMiktarVal)?$kalanMiktarVal:''?>" autocomplete="off">
        </div>
    </td>

    </tr>

  <?php } } ?>
  </tbody>
  <?php if(z(8,'a')=='ekle') { ?>
  <tbody>
    <tr class="cloneTr">
        <td>
            <div>
                <input type="checkbox" style="width:200%;" class="form-control silinecekurundiv">
            </div>
        </td>

      <td>
        <div>
        <select class="malzemekodu select2 select-search form-control" name="<?php echo $tbl?>[malzemeKodu][]">
            <option  value="0">Seçiniz</option>
        </select>
        </div>
    </td>
    
    <td>
        <div>
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[malzemeAd][]" autofocus="autofocus"  value="<?php echo !empty($_X['malzemeAd'])?$_X['malzemeAd']:''?>" autocomplete="off">
        </div>
    </td>
    <td>
        <div>
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[aciklama][]" autofocus="autofocus"  value="<?php echo !empty($_X['aciklama'])?$_X['aciklama']:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <div class="input-group">
                 <span class="input-group-prepend">
                     <span class="input-group-text"><i class="icon-calendar22"></i></span>
                 </span>
            <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihTermin][]" value="<?php echo (!empty($_X['tarihTermin'])?z('date',$_X['tarihTermin']):z('datetime')); ?>">
        </div>
    </td>
    <td >
        <div >
            <input  type="number" class="form-control"  name="<?php echo $tbl?>[siparisMiktar][]" autofocus="autofocus"  value="<?php echo !empty($_X['siparisMiktar'])?$_X['siparisMiktar']:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <?php if(!empty($_NSN1))foreach($_NSN1 as $ad=>$n){?>
            <div class="form-group row">
               
                 <div class="col">
                     <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
             </div>
        </div>


        <?php }?>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[fiyat][]" autofocus="autofocus"  value="<?php echo !empty($_X['fiyat'])?$_X['fiyat']:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?>
            <div class="form-group row">
               
                 <div >
                     <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.'][]','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
             </div>
        </div>


        <?php }?>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[gelenMiktar][]" autofocus="autofocus"  value="<?php echo !empty($_X['gelenMiktar'])?$_X['gelenMiktar']:''?>" autocomplete="off">
        </div>
    </td>
    <td >
        <div >
            <input  type="text" class="form-control"  name="<?php echo $tbl?>[kalanMiktar][]" autofocus="autofocus"  value="<?php echo !empty($_X['kalanMiktar'])?$_X['kalanMiktar']:''?>" autocomplete="off">
        </div>
    </td>

    </tr>
  </tbody>
  <?php }  ?>
</table>
</div>

<input hidden class="sipariskodu" type="text" value="<?php echo !empty(z(8,'kod'))?z(8,'kod'):'0';?>">
<script>

$( document ).ready(function() {
    var siparistip = $(".sipariskodu").val();
    $(".siparistip").val(siparistip).change();
    
    
    var selectdata = [];
    var selectedVal = [];
    var tip = $(".siparistip").val();
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=satinalma&a=ajaxsorgu&tip="+tip,
        success:function(gelensorgu){
            $(".malzemekodu option[value=0]").nextAll().remove();
            selectdata = gelensorgu.cevap.selectdata;
            $.each( selectdata, function( key, value ) {
                    $(".malzemekodu").append(new Option(value['metin1'], value['ID']));        
            });
        }
    });
});

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

$(".malzemearttir").click(function(){
      var clone = $('.cloneTr:eq(0)').clone();
      $('.cloneTr:eq(0)').after(clone);
      select2kontrol();

    });

    $(".malzemeazalt").click(function(){
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


$(".siparistip").change(function(){
    var tip = $(".siparistip").val();
    var selectdata = [];
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=satinalma&a=ajaxsorgu&tip="+tip,
        success:function(gelensorgu){
            $(".malzemekodu option[value=0]").nextAll().remove();
            selectdata = gelensorgu.cevap.selectdata;
            $.each( selectdata, function( key, value ) {
                    $(".malzemekodu").append(new Option(value['metin1'], value['ID']));        
            });
        }
    });
});
</script>