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
    padding: 4px;
    display: inline-block;
    font-weight: bold;
    border-radius: 26%; 
    cursor:pointer;
}
.elyafsil:hover{
    border: 1px solid #8c8989;
    background: white;
    color: black;
}
.elyaflartr div{
    margin-bottom:5px;
}
.elyafdiv{
    display:table;
    width: 100%;
}

.elyafdiv select{
    width: 44%;
    float: left;
    margin-left:1%;
}

.elyafdiv input{
    width: 44%;
    float: left;
    margin-left:1%;
}

.elyafdiv .elyafsil{
    width: 5%;
    float: left;
    text-align: center;
    border-radius: 16% !important;
    margin-left: 10px;
    margin-top: 3px;
    margin-left: 10px;
}

.yenikaydet{
    border: 1px solid #ddd;
    border-radius: 30px;
    background-color: #fff;
    outline: none;
    color: black;
    text-decoration: none;
    font-size: 16px;
    padding: 0.4em 1em;
    display: inline-block;
}

.tedarikarttir{
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
.tedariksil{
    border: 1px solid #8c8989;
    background: white;
    padding: 4px;
    display: inline-block;
    color: black;
    font-weight: bold;
    border-radius: 26%; 
    cursor:pointer;
}
.tedariklartr div{
    margin-bottom:5px;
}

.tedarikdiv{
    display:table;
    width: 100%;
}

.tedarikdiv select:nth-child(1){
    width: 34%;
    float: left;
    margin-left:1%;
}
.tedarikdiv select:nth-child(2){
    width: 34%;
    float: left;
    margin-left:1%;
}

.tedarikdiv input{
    width: 19%;
    float: left;
    margin-left:1%;
}

.tedarikdiv .elyafsil{
    width: 5%;
    float: left;
    text-align: center;
    border-radius: 16% !important;
    margin-top: 3px;
    margin-left:1%;
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

    $(".tedarikarttir").click(function(){
        var silObj = $(".silmedivi").html();
        var cloneObj = $('.tedarik').clone();
        var cloneObj =cloneObj.removeClass("tedarik");
        var cloneObj =cloneObj.append(silObj);
        $(".tedariklartr").append(cloneObj);
    });
});
function sil(ths){
    $(ths).parent().remove();
}
function degisim(ths){
    var id = $(ths).val();
    $(ths).parent().find("input").attr('name', 'iplik[elyaf]['+id+']');
}

function degisim2(ths){
    var id = $(ths).val();
    var index=$(ths).parent().index();
    <?php if(z(8,'a')=='ekle'){ ?>
        index=index-1;
    <?php } else { ?>
        index=index+1;
    <?php } ?>
    console.log(index);
    $(ths).parent().find("input").attr('name', 'iplik[tedarikci]['+index+']['+id+'][]');
    $(ths).parent().find(".markaselect").attr('name', 'iplik[tedarikci]['+index+']['+id+'][]');
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=iplik&a=ajaxsorgu&marka="+id,
        success:function(gelensorgu){

            var marka=gelensorgu.cevap.marka;
            
            if(marka!=null){

            } else{
                alert('Tedarikciye marka eklenmemiş veya bulunamadı.');
            }
        }
    });
}
var sum = 0;
var degeroran=0;
function hesapla() {
var sum = 0;
var degeroran=0;

$('.hesapla').each(function(ip, objoran){
    var iplikoran=$(objoran).val();
    var iplikoran = sy(iplikoran);
    degeroran=parseFloat(degeroran+iplikoran);
}); 
/*/
if(degeroran>100){
    alert("Toplam elyaf oranı toplamı 100'den fazla olamaz. Tam 100 olmalıdır.");
}
if(degeroran<100){
    alert("Toplam elyaf oranı toplamı 100'den az olamaz. Tam 100 olmalıdır.");
}
/*/

$('.elyaftoplam').html(degeroran);
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
<?php 
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
?>

<?php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
    <div class="col-lg-9">
        <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'" data-fouc','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
    </div>
</div>
<?php }?>

<?php $_Nesne=z(37,z(1,"WHERE ad='elyafTipi'",'ID,ad,metin1,metin2','nesne'));  ?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Elyaf</label>
    <div class="col-lg-9 elyaflartr">
        <a href="#elyafcogalt" class="elyafarttir"><b style="font-size:14px;">ELYAF ARTTIR </b></a>
    <div class="silmedivi" style="display:none;">
        <div class="elyafsil btn btn-danger" onclick="sil(this)"><i class="icon-minus3 mr-1 icon-1x"></i></div>
    </div>
    <p><b>Elyafların tamamının toplamı => %<span class="elyaftoplam">0</span></b></p>

    <?php if(z(8,'a')=='ekle'&&empty($farkli)){ ?>
    <div class="elyaf elyafdiv">
        <select class="form-control" onchange="degisim(this)">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesne)){ foreach($_Nesne as $nsn){ ?>
        <option value="<?php echo (!empty($nsn['ID'])?$nsn['ID']:''); ?>"><?php echo (!empty($nsn['metin1'])?$nsn['metin1']:''); ?></option>
        <?php } } ?> 
        </select>
        <input type="number" min="0" max="100" step=".01" class="hesapla form-control" onkeyup="hesapla()" value="0" name="<?php echo $tbl; ?>[elyaf][0]">
    </div>
    <?php } ?>

    <?php $toplam=0; ?>
    <?php if(z(8,'a')=='duzenle'||!empty($farkli)){ ?>
    <?php 
        $elyafcek=$_X['elyaf'];
        $elyafarray=(!empty($_X['elyaf'])?json_decode($_X['elyaf'],1):'');
        if(!empty($elyafarray)){
            $elyafarray=str_replace('puan','',$elyafarray);
        }
        $sayi=0;
        if(!empty($elyafarray)){ foreach($elyafarray as $i => $elyf){ $sayi++; $toplam=$toplam+$elyf; ?>
        <div class="<?php if($sayi==1){ echo 'elyaf'; } ?> elyafdiv">
            <select class="form-control" onchange="degisim(this)">
            <option value="0">Seçiniz</option>
            <?php if(!empty($_Nesne)){ foreach($_Nesne as $nsn){ ?>
            <option value="<?php echo (!empty($nsn['ID'])?$nsn['ID']:''); ?>" <?php if($nsn['ID']==$i){ echo 'selected'; } ?>><?php echo (!empty($nsn['metin1'])?$nsn['metin1']:''); ?></option>
            <?php } } ?> 
            </select>
            <input type="number" min="0" max="100" step=".01" class="hesapla form-control" onkeyup="hesapla()" value="<?php echo $elyf; ?>" name="<?php echo $tbl; ?>[elyaf][<?php echo $i; ?>]">
            <?php if($sayi!=1){ ?>
                <div class="elyafsil btn btn-danger" onclick="sil(this)"><i class="icon-minus3 mr-1 icon-1x"></i></div>
            <?php } ?>
        </div>
    <?php } } else { ?>
        <div class="elyaf elyafdiv">
            <select class="form-control" onchange="degisim(this)">
            <option value="0">Seçiniz</option>
            <?php if(!empty($_Nesne)){ foreach($_Nesne as $nsn){ ?>
            <option value="<?php echo (!empty($nsn['ID'])?$nsn['ID']:''); ?>"><?php echo (!empty($nsn['metin1'])?$nsn['metin1']:''); ?></option>
            <?php } } ?> 
            </select>
            <input type="number" min="0" max="100" step=".01" class="hesapla form-control" onkeyup="hesapla()" value="0" name="<?php echo $tbl; ?>[elyaf][0]">
        </div>
    <?php } ?>
    <?php } ?>
    <?php if($toplam>0){ ?>
        <script>
        var elyaftoplam=<?php echo $toplam; ?>;
        $('.elyaftoplam').html(elyaftoplam);
        </script>
    <?php } ?>
    </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Birim Fiyat</label>
        <div class="col-lg-9">
           <input type="number" class="form-control" name="<?php echo $tbl?>[fiyat]" value="<?php echo !empty($_X['fiyat'])?z(36,$_X['fiyat'],0):''?>" autocomplete="off" step=".01">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Fire</label>
        <div class="col-lg-9">
           <input type="number" class="form-control" name="<?php echo $tbl?>[fire]" value="<?php echo !empty($_X['fire'])?z(36,$_X['fire'],0):''?>" autocomplete="off" step=".01">
        </div>
    </div>
    
<?php $_NesneMarka=z(37,z(1,"WHERE ad='iplikMarka'",'ID,ad,metin1,metin2','nesne'));  ?>
<?php $_Tedarikci=z(37,z(1,"WHERE arsiv='0'",'','tedarikci'));  ?>
    <div class="form-group row tedariklartd">
        <label class="col-lg-3 col-form-label">Tedarikci Fiyatı</label>
        <div class="col-lg-9 tedariklartr">
           <a href="#tedarikcogalt" class="tedarikarttir"><b style="font-size:14px;">TEDARİKCİ ARTTIR </b></a>
    <div class="silmedivi" style="display:none;">
        <div class="tedariksil" onclick="sil(this)"><i class="icon-minus3 mr-1 icon-1x"></i></div>
    </div>

    <?php if(z(8,'a')=='ekle'&&empty($farkli)){ ?>
    <div class="tedarik tedarikdiv">
        <select class="form-control" onchange="degisim2(this)">
        <option value="0">Tedarikci Seçiniz</option>
        <?php if(!empty($_Tedarikci)){ foreach($_Tedarikci as $tedrik){ ?>
        <option value="<?php echo (!empty($tedrik['ID'])?$tedrik['ID']:''); ?>"><?php echo (!empty($tedrik['ad'])?$tedrik['ad']:'').(!empty($tedrik['soyad'])?' '.$tedrik['soyad']:''); ?></option>
        <?php } } ?> 
        </select>
        <select name="<?php echo $tbl; ?>[tedarikci][1][0][]" class="markaselect form-control">
        <option value="0">Marka Seçiniz</option>
        <?php if(!empty($_NesneMarka)){ foreach($_NesneMarka as $nmarka){ ?>
        <option value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>"><?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></option>
        <?php } } ?> 
        </select>
        <input type="number" min="0" max="100" step=".01" class="hesapla2 form-control"  value="" placeholder="tedarikci fiyatı" name="<?php echo $tbl; ?>[tedarikci][1][0][]">
    </div>
    <?php } ?>

    <?php $toplam=0; ?>
    <?php if(z(8,'a')=='duzenle'||!empty($farkli)){ ?>
    <?php 
        $tedarikcek=$_X['tedarikci'];
        $tedarikarray=(!empty($_X['tedarikci'])?json_decode($_X['tedarikci'],1):'');
        $sayi=0;
        if(!empty($tedarikarray)){ foreach($tedarikarray as $i2 => $tdrk){ $sayi++; 
            if(!empty($tdrk)){ foreach($tdrk as $i3 => $tdrk2){
        ?>
        <div class="<?php if($sayi==1){ echo 'tedarik'; } ?> tedarikdiv">
            <select class="form-control" onchange="degisim2(this)">
            <option value="0">Tedarikci Seçiniz <?php echo $i2; ?></option>
            <?php if(!empty($_Tedarikci)){ foreach($_Tedarikci as $tedrik){ ?>
            <option value="<?php echo (!empty($tedrik['ID'])?$tedrik['ID']:''); ?>" <?php if($tedrik['ID']==$i3){ echo 'selected'; } ?>><?php echo (!empty($tedrik['ad'])?$tedrik['ad']:'').(!empty($tedrik['soyad'])?' '.$tedrik['soyad']:''); ?></option>
            <?php } } ?> 
            </select>
            <select name="<?php echo $tbl; ?>[tedarikci][<?php echo $i2; ?>][<?php echo $i3; ?>][]" class="markaselect form-control">
            <option value="0">Marka Seçiniz </option>
            <?php if(!empty($_NesneMarka)){ foreach($_NesneMarka as $nmarka){ ?>
            <option value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>" <?php if($nmarka['ID']==$tdrk[$i3][0]){ echo 'selected'; } ?>><?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></option>
            <?php } } ?> 
            </select>
            <input type="number" min="0" max="100" step=".01" class="hesapla2 form-control"  value="<?php echo (!empty($tdrk[$i3][1])?$tdrk[$i3][1]:''); ?>" placeholder="tedarikci fiyatı" name="<?php echo $tbl; ?>[tedarikci][<?php echo $i2; ?>][<?php echo $i3; ?>][]">
            <?php if($sayi!=1){ ?>
                <div class="tedariksil" onclick="sil(this)"><i class="icon-minus3 mr-1 icon-1x"></i></div>
            <?php } ?>
        </div>
    <?php } } } } else { ?>
        <div class="tedarik tedarikdiv">
            <select class="form-control" onchange="degisim2(this)">
            <option value="0">Tedarikci Seçiniz</option>
            <?php if(!empty($_Tedarikci)){ foreach($_Tedarikci as $tedrik){ ?>
            <option value="<?php echo (!empty($tedrik['ID'])?$tedrik['ID']:''); ?>"><?php echo (!empty($tedrik['ad'])?$tedrik['ad']:'').(!empty($tedrik['soyad'])?' '.$tedrik['soyad']:''); ?></option>
            <?php } } ?> 
            </select>
            <select name="<?php echo $tbl; ?>[tedarikci][1][0][]" class="markaselect form-control">
            <option value="0">Marka Seçiniz</option>
            <?php if(!empty($_NesneMarka)){ foreach($_NesneMarka as $nmarka){ ?>
            <option value="<?php echo (!empty($nmarka['ID'])?$nmarka['ID']:''); ?>"><?php echo (!empty($nmarka['metin1'])?$nmarka['metin1']:''); ?></option>
            <?php } } ?> 
            </select>
            <input type="number" min="0" max="100" step=".01" class="hesapla2 form-control"  value="" placeholder="tedarikci fiyatı" name="<?php echo $tbl; ?>[tedarikci][1][0][]">
        </div>
    <?php } ?>
    <?php } ?>
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
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>">
    </div>
</div>

 <?php if(!empty($_NSN3))foreach($_NSN3 as $ad=>$n){?>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label"><?php echo $n['ad']?></label>
            <div class="col-lg-9">
                <?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="form-control select-search nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            </div>
        </div>
    <?php }?>
						
						
<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        var degeroran=0;

        $('.hesapla').each(function(ip, objoran){
            var iplikoran=$(objoran).val();
            var iplikoran = sy(iplikoran);
            degeroran=parseFloat(degeroran+iplikoran);
        }); 
        console.log(degeroran);
        if(degeroran>100){
            alert("Toplam elyaf oranı toplamı 100'den fazla olamaz. Tam 100 olmalıdır.");
        }
        else if(degeroran<100){
            alert("Toplam elyaf oranı toplamı 100'den az olamaz. Tam 100 olmalıdır.");
        } else {
            $("#formId").submit();
        }
        /*/
        if(degeroran=='100'){
            $("#formId").submit();
        }
        /*/
        
    }
</script>