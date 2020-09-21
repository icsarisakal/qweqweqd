<style>
.makinedegerisil{
    cursor: pointer;
    width: 5%;
    float: left;
    text-align: center;
    border-radius: 16% !important;
    margin-left: 10px;
    padding:0px;
}

.makinedegerisil:hover{
    border: 1px solid #ddd;
    background: white;
    color: black;
}

.makine2degerisil{
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.makineislevisil{
    cursor: pointer;
    width: 5%;
    float: left;
    text-align: center;
    border-radius: 5% !important;
    margin-left: 10px;
    padding:0px;
}

.makineislevisil:hover{
    border: 1px solid #ddd;
    background: white;
    color: black;
}

.selectsecim{
    width:-webkit-fill-available;
}

.makineislevitr{
    display:flex;
}

.labelmisgibi{
    display: inline-block;
    border: 1px solid #fff;
    border-radius: 4px;
    padding-right: 4px;
    cursor:pointer;
    float: left;
    margin-left: 1%;
}

.inpt{
    float: left;
    margin-top: 4px;
}

..makineislevitr:nth-child(1){
    display:flex;
}

.makine2degerihepsi .cakmatbody:nth-child(1) .makineislevisil{
    display:none;
}

.makine2degeriarttir{
    border: 1px solid #8c8989;
    background: white;
    padding: 4px;
    display: block;
    color: black !important;
    font-weight: bold;
    margin-bottom: 5px;
    width: 98%;
    text-align: center;
    position: relative;
    left: 1%;
    border-radius: 20px;
}

.makinedegeriarttir{
    border: 1px solid #8c8989;
    background: white;
    padding: 4px;
    display: block;
    color: black !important;
    font-weight: bold;
    margin-bottom: 5px;
    width: 98%;
    text-align: center;
    position: relative;
    left: 1%;
    border-radius: 20px;
}

.makselecti{
    width: 90%;
    float: left;
}

.selectpussfaynn select{
    width: 18%;
    margin-left: 1%;
    float: left;
}

.selectpussfaynn input[type=text]{
    width: 18%;
    margin-left: 1%;
    float: left;
}

.selectpussfaynn .form-check{
    width: 6%;
    float: left;
    margin: 0;
    margin-top: 10px;
}

.cakmatbody{
    border: 1px solid #a5b5d8;
    padding: 5px;
    margin-bottom: 20px;
}

<?php if(z(8,'a')=='duzenle'||z(8,'a')=='ekle'){ ?>
table tbody tr:nth-child(4) a {
    display:none;
}
<?php } ?>
</style>

<?php 
$sayi2=0;
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
$nesnemakineyetenegi=z(37,z(1,"WHERE ad='' OR ad='makineYetenegi'",'ID,ad,metin1,metin2','nesne'));
$makinesayi=0;
$makinesayi2=0;
if(!empty($_X)){
    $makinedegeripusarray=(!empty($_X['pus'])?json_decode($_X['pus'],1):'');
    $makinedegerifaynarray=(!empty($_X['fayn'])?json_decode($_X['fayn'],1):'');
    $sistemsayiarray=(!empty($_X['sistemsayi'])?json_decode($_X['sistemsayi'],1):'');
    $ignesayiarray=(!empty($_X['ignesayi'])?json_decode($_X['ignesayi'],1):'');
    $makinedegeriarray=(!empty($_X['makineyetenegi'])?json_decode($_X['makineyetenegi'],1):'');
    $plakasayiarray=(!empty($_X['plakasayi'])?json_decode($_X['plakasayi'],1):'');
    $makinesayi=count($makinedegeripusarray);
    $makinesayi2=count($makinedegeriarray);
}
?>
<script>
$( document ).ready(function() {
/*/
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=makinacesitleri&a=ajaxsorgu",
        success:function(gelensorgu){
            var makinaparkuruall=gelensorgu.cevap.makinaparkuruall;
            window.makinaparkuruall=makinaparkuruall;
        }
    });
/*/

});



var degerimiz=0;
function makineislevicogalt(ths){
    degerimiz++;
    var tbody=$(ths).parent().parent().parent();
    var index=$(ths).parent().parent().parent().parent().find(".cakmatbody").length;
    var index=(index-1);
    var index2=(index+1);
    var cloneObj3 = $(tbody).clone();
    $(".makine2degerihepsi").append(cloneObj3);
    $(".makine2degerihepsi .cakmatbody:last-child select option:eq(0)").prop('selected', true); 
    $(".makine2degerihepsi .cakmatbody:last-child .selectmakine").attr("name","makinacesitleri[makineyetenegi][0]");
    $(".makine2degerihepsi .cakmatbody:last-child .makselecti").attr("name","makinacesitleri[makineyetenegi][0]");
    $(".makine2degerihepsi .cakmatbody:last-child .selectpus").attr("name","makinacesitleri[pus][0][]");
    $(".makine2degerihepsi .cakmatbody:last-child .selectfayn").attr("name","makinacesitleri[fayn][0][]");
    $(".makine2degerihepsi .cakmatbody:last-child .sistemsayi").attr("name","makinacesitleri[sistemsayi][0][]");
    $(".makine2degerihepsi .cakmatbody:last-child .ignesayi").attr("name","makinacesitleri[ignesayi][0][]");
    $(".makine2degerihepsi .cakmatbody:last-child .plakasayi").attr("name","makinacesitleri[plakasayi][0][]");
    /*/
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectmakine").attr("name","makinacesitleri[makineyetenegi]["+index+"]");
    $(".makine2degerihepsi .cakmatbody:eq("+index2+") .selectmakine").attr("name","makinacesitleri[makineyetenegi]["+index2+"]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectpus").attr("name","makinacesitleri[pus]["+index+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectfayn").attr("name","makinacesitleri[fayn]["+index+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index2+") .selectpus").attr("name","makinacesitleri[pus]["+index2+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index2+") .selectfayn").attr("name","makinacesitleri[fayn]["+index2+"][]");
    /*/
}

function makinedegistir(ths){
    var ID=$(ths).val();
    var index=$(ths).parent().parent().parent().index();
    console.log(index);
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectmakine").attr("name","makinacesitleri[makineyetenegi]["+ID+"]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .makselecti").attr("name","makinacesitleri[makineyetenegi]["+ID+"]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectpus").attr("name","makinacesitleri[pus]["+ID+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .selectfayn").attr("name","makinacesitleri[fayn]["+ID+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .sistemsayi").attr("name","makinacesitleri[sistemsayi]["+ID+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .ignesayi").attr("name","makinacesitleri[ignesayi]["+ID+"][]");
    $(".makine2degerihepsi .cakmatbody:eq("+index+") .plakasayi").attr("name","makinacesitleri[plakasayi]["+ID+"][]");
}

function faynuygula(ths){
    var pus=$(ths).parent().find(".selectpus").val();
    var fayn=$(ths).parent().find(".selectfayn").val();
    if(pus!='0'&&fayn!=0){
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=makinacesitleri&a=ajaxsorgu&fayn="+fayn+"&pus="+pus,
            success:function(gelensorgu){
                var makinaparkuru=gelensorgu.cevap.makinaparkuru;
                var sistemsayisi=makinaparkuru.sistemsayi;
                var ignesayisi=makinaparkuru.ignesayi;
                var plakasayisi=makinaparkuru.plakasayi;
                $(ths).parent().find(".sistemsayi").val(sistemsayisi);
                $(ths).parent().find(".ignesayi").val(ignesayisi);
                if(plakasayisi=='1'){
                    $(ths).parent().find("input").prop('checked', false);
                    $(ths).parent().find(".plaka1").prop('checked', true);
                }
                if(plakasayisi=='2'){
                    $(ths).parent().find("input").prop('checked', false);
                    $(ths).parent().find(".plaka2").prop('checked', true);
                }
                console.log(makinaparkuru);
            }
        });
    }
    
}


function pusvefayncogalt(ths){
    var index=$(ths).parent().parent().parent().index();
    var tr=$(ths).parent().parent().parent().find(".makinedegeri1:eq(0)");
    var ypstr=$(ths).parent().parent().parent();
    var cloneObj4 = $(tr).clone();
    $(ypstr).append(cloneObj4);
}

var tiklamasayi=0;
function tiklat(ths){
    var index=$(ths).index();
    if(index=='4'){
        tiklamasayi=2;
    }
    if(index=='6'){
        tiklamasayi=3;
    }
    $(ths).parent().find("input").prop('checked', false); 
    $(ths).parent().find("input:eq("+tiklamasayi+")").prop('checked', true);
}

function tiklat2(ths){
    var index=$(ths).index();
    $(ths).parent().find("input").prop('checked', false); 
    $(ths).prop('checked', true); 
}

function sil(ths){
    $(ths).parent().parent().remove();
}

function makineislevisil(ths){
    $(ths).parent().parent().parent().remove();
    degerimiz--;
}

function namedegistir(ths){

}
</script>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Makina Adı *</label>
    <div class="col-lg-9">
       <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[ad]" autofocus="autofocus" required="required" value="<?php echo !empty($_X['ad'])?$_X['ad']:''?>" autocomplete="off">
    </div>
</div>
<div class="makine2degerihepsi">
<?php if(z(8,'a')=='ekle'&&empty($farkli)){ ?>
    <div class="cakmatbody">
        <div class="form-group row makineislevitr">
            <label class="col-lg-3 col-form-label">&nbsp;</label>
            <div class="col-lg-9">
               <a href="#makinecogalt2" class="makine2degeriarttir" onclick="makineislevicogalt(this)"><b style="font-size:14px;">MAKİNE İŞLEVİ (+) </b></a>
            </div>
        </div>

        <div class="form-group row makine2degeri1" id="makina2degerleri">
            <label class="col-lg-3 col-form-label">Makine İşlevi</label>
            <div class="col-lg-9">
               <select class="form-control makselecti" name="<?php echo $tbl?>[makineyetenegi][0]" class="selectmakine" onchange="makinedegistir(this)">
                <option value="0">Seçiniz</option>
                <?php if(!empty($nesnemakineyetenegi)){ foreach ($nesnemakineyetenegi as $my => $makineyetenegi) { ?>
                   <option value="<?php echo $makineyetenegi['ID']; ?>"><?php echo (!empty($makineyetenegi['metin1'])?$makineyetenegi['metin1']:''); ?></option>
                <?php } } ?>
                </select>
                <a href="#" class="makineislevisil btn btn-danger" onclick="makineislevisil(this)">Makineyi Sil</a>
            </div>
        </div>

    <div class="form-group row makinedegerleriyeni" style="display:flex;">
        <label class="col-lg-3 col-form-label">&nbsp;</label>
        <div class="col-lg-9">
           <a href="#makinecogalt" class="makinedegeriarttir" onclick="pusvefayncogalt(this)"><b style="font-size:14px;">PUS/FAYN & SİSTEM/İĞNE SAYISI (+) </b></a>
        </div>
    </div>

    <div class="form-group row makinedegeri1" id="makinadegerleri" style="display:flex;">
        <label class="col-lg-3 col-form-label">Pus/Fayn &<br> Sistem Sayısı & İğne Sayısı</label>
        <div class="col-lg-9 selectpussfaynn">
            <select name="<?php echo $tbl?>[pus][0][]" class="selectpus form-control" onchange="faynuygula(this)">
                <option value="0">Seçiniz</option>
                <option value="26">26</option>
                <option value="30">30</option>
                <option value="32">32</option>
                <option value="34">34</option>
                <option value="36">36</option>
                <option value="38">38</option>
                <option value="42">42</option>
                <option value="48">48</option>
                <option value="60">60</option>
            </select>
            <select name="<?php echo $tbl?>[fayn][0][]" class="selectfayn form-control" onchange="faynuygula(this)">
                <option value="0">Seçiniz</option>
                <option value="28">28</option>
                <option value="20">20</option>
                <option value="22">22</option>
                <option value="26">26</option>
                <option value="24">24</option>
                <option value="18">18</option>
                <option value="30">30</option>
            </select>

            <input type="text" class="sistemsayi form-control" name="<?php echo $tbl?>[sistemsayi][0][]" placeholder="Sistem sayısı">
            <input type="text" class="ignesayi form-control" name="<?php echo $tbl?>[ignesayi][0][]" placeholder="İğne sayısı">
           
            <div class="labelmisgibi" onclick="tiklat(this)"> Tek</div>
            <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka1 inpt" value="1" name="<?php echo $tbl?>[plakasayi][0][]" >
            <div class="labelmisgibi" onclick="tiklat(this)"> Çift</div>
            <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka2 inpt" value="2" name="<?php echo $tbl?>[plakasayi][0][]" >

            <a class="makinedegerisil btn btn-danger" href="#makdegerisil" onclick="sil(this)">Sil</a>
        </div>
    </div>
</div>
<?php } ?>
<?php if(z(8,'a')=='duzenle'||!empty($farkli)){ ?>
<?php
if(!empty($_X)){
    $makinedegeripusarray=(!empty($_X['pus'])?json_decode($_X['pus'],1):'');
    $makinedegerifaynarray=(!empty($_X['fayn'])?json_decode($_X['fayn'],1):'');
    $sistemsayiarray=(!empty($_X['sistemsayi'])?json_decode($_X['sistemsayi'],1):'');
    $ignesayiarray=(!empty($_X['ignesayi'])?json_decode($_X['ignesayi'],1):'');
    $makinedegeriarray=(!empty($_X['makineyetenegi'])?json_decode($_X['makineyetenegi'],1):'');
    $plakasayiarray=(!empty($_X['plakasayi'])?json_decode($_X['plakasayi'],1):'');
    $makinesayi=count($makinedegeripusarray);
    $makinesayi2=count($makinedegeriarray);
}
?>
<?php if(!empty($makinedegeriarray)){ ?>
    <?php $maksayimiz=0; ?>
    <?php foreach($makinedegeriarray as $mk => $makinedegeri){ ?>
        <div class="cakmatbody">
            <div class="form-group row makineislevitr">
            <label class="col-lg-3 col-form-label">&nbsp;</label>
            <div class="col-lg-9">
               <a href="#makinecogalt2" class="makine2degeriarttir" onclick="makineislevicogalt(this)"><b style="font-size:14px;">MAKİNE İŞLEVİ (+) </b></a>
            </div>
        </div>

        <div class="form-group row makine2degeri1" id="makina2degerleri">
            <label class="col-lg-3 col-form-label">Makine İşlevi</label>
            <div class="col-lg-9">
               <select class="form-control makselecti" name="<?php echo $tbl?>[makineyetenegi][<?php echo $mk; ?>]" class="selectmakine" onchange="makinedegistir(this)">
                <option value="0">Seçiniz</option>
                <?php if(!empty($nesnemakineyetenegi)){ foreach ($nesnemakineyetenegi as $my => $makineyetenegi) { ?>
                   <option value="<?php echo $makineyetenegi['ID']; ?>" <?php if($makineyetenegi['ID']==$mk){ echo 'selected'; } ?>><?php echo (!empty($makineyetenegi['metin1'])?$makineyetenegi['metin1']:''); ?></option>
                <?php } } ?>
                </select>
                <a href="#" class="makineislevisil btn btn-danger" onclick="makineislevisil(this)">Makineyi Sil</a>
            </div>
        </div>
        
        <div class="form-group row makinedegerleriyeni" style="display:flex;">
            <label class="col-lg-3 col-form-label">&nbsp;</label>
            <div class="col-lg-9">
               <a href="#makinecogalt" class="makinedegeriarttir" onclick="pusvefayncogalt(this)"><b style="font-size:14px;">PUS/FAYN & SİSTEM/İĞNE SAYISI (+) </b></a>
            </div>
        </div>
        <?php if(!empty($makinedegeripusarray)){ ?>
        <?php //echo '<pre>'; print_r($makinedegeripusarray); print_r($makinedegerifaynarray); ?>
            <?php foreach($makinedegeripusarray[$mk] as $mkf => $mkfpus){ ?>
                <div class="form-group row makinedegeri1" id="makinadegerleri" style="display:flex;">
                    <label class="col-lg-3 col-form-label">Pus/Fayn &<br> Sistem Sayısı & İğne Sayısı</label>
                    <div class="col-lg-9 selectpussfaynn">
                        <select name="<?php echo $tbl?>[pus][<?php echo $mk; ?>][]" class="selectpus form-control" onchange="faynuygula(this)">
                            <option value="0" <?php if($makinedegeripusarray[$mk][$mkf]==0){ echo 'selected'; } ?>>Seçiniz</option>
                            <option value="26" <?php if($makinedegeripusarray[$mk][$mkf]==26){ echo 'selected'; } ?>>26</option>
                            <option value="30" <?php if($makinedegeripusarray[$mk][$mkf]==30){ echo 'selected'; } ?>>30</option>
                            <option value="32" <?php if($makinedegeripusarray[$mk][$mkf]==32){ echo 'selected'; } ?>>32</option>
                            <option value="34" <?php if($makinedegeripusarray[$mk][$mkf]==34){ echo 'selected'; } ?>>34</option>
                            <option value="36" <?php if($makinedegeripusarray[$mk][$mkf]==36){ echo 'selected'; } ?>>36</option>
                            <option value="38" <?php if($makinedegeripusarray[$mk][$mkf]==38){ echo 'selected'; } ?>>38</option>
                            <option value="42" <?php if($makinedegeripusarray[$mk][$mkf]==42){ echo 'selected'; } ?>>42</option>
                            <option value="48" <?php if($makinedegeripusarray[$mk][$mkf]==48){ echo 'selected'; } ?>>48</option>
                            <option value="60" <?php if($makinedegeripusarray[$mk][$mkf]==60){ echo 'selected'; } ?>>60</option>
                        </select>
                        <select name="<?php echo $tbl?>[fayn][<?php echo $mk; ?>][]" class="selectfayn form-control" onchange="faynuygula(this)">
                            <option value="0" <?php if($makinedegerifaynarray[$mk][$mkf]==0){ echo 'selected'; } ?>>Seçiniz</option>
                            <option value="28" <?php if($makinedegerifaynarray[$mk][$mkf]==28){ echo 'selected'; } ?>>28</option>
                            <option value="20" <?php if($makinedegerifaynarray[$mk][$mkf]==20){ echo 'selected'; } ?>>20</option>
                            <option value="22" <?php if($makinedegerifaynarray[$mk][$mkf]==22){ echo 'selected'; } ?>>22</option>
                            <option value="26" <?php if($makinedegerifaynarray[$mk][$mkf]==26){ echo 'selected'; } ?>>26</option>
                            <option value="24" <?php if($makinedegerifaynarray[$mk][$mkf]==24){ echo 'selected'; } ?>>24</option>
                            <option value="18" <?php if($makinedegerifaynarray[$mk][$mkf]==18){ echo 'selected'; } ?>>18</option>
                            <option value="30" <?php if($makinedegerifaynarray[$mk][$mkf]==30){ echo 'selected'; } ?>>30</option>
                        </select>

                        <input type="text" class="sistemsayi form-control" name="<?php echo $tbl?>[sistemsayi][<?php echo $mk; ?>][]" value="<?php echo (!empty($sistemsayiarray[$mk][$mkf])?$sistemsayiarray[$mk][$mkf]:''); ?>" placeholder="Sistem sayısı">
                        <input type="text" class="ignesayi form-control" name="<?php echo $tbl?>[ignesayi][<?php echo $mk; ?>][]" value="<?php echo (!empty($ignesayiarray[$mk][$mkf])?$ignesayiarray[$mk][$mkf]:''); ?>" placeholder="İğne sayısı">

                        <div class="labelmisgibi" onclick="tiklat(this)"> Tek</div>
                        <input type="checkbox"  onclick="tiklat2(this)" class="plakasayi plaka1 inpt" name="<?php echo $tbl?>[plakasayi][<?php echo $mk; ?>][]" value="1" <?php echo (!empty($plakasayiarray[$mk][$mkf])&&$plakasayiarray[$mk][$mkf]=='1'?'checked':''); ?>>
                        <div class="labelmisgibi" onclick="tiklat(this)"> Çift</div>
                        <input type="checkbox"  onclick="tiklat2(this)" class="plakasayi plaka2 inpt" name="<?php echo $tbl?>[plakasayi][<?php echo $mk; ?>][]" value="2" <?php echo (!empty($plakasayiarray[$mk][$mkf])&&$plakasayiarray[$mk][$mkf]=='2'?'checked':''); ?>>

                        <a class="makinedegerisil btn btn-danger" href="#makdegerisil" onclick="sil(this)">Sil</a>
                    </div>
                </div>
                
             <?php } ?>
        <?php } else { ?>
            <div class="form-group row makinedegeri1" id="makinadegerleri" style="display:flex;">
                <label class="col-lg-3 col-form-label">Pus/Fayn &<br> Sistem Sayısı & İğne Sayısı</label>
                <div class="col-lg-9 selectpussfaynn">
                    <select name="<?php echo $tbl?>[pus][0][]" class="selectpus form-control" onchange="faynuygula(this)">
                        <option value="0">Seçiniz</option>
                        <option value="26">26</option>
                        <option value="30">30</option>
                        <option value="32">32</option>
                        <option value="34">34</option>
                        <option value="36">36</option>
                        <option value="38">38</option>
                        <option value="42">42</option>
                        <option value="48">48</option>
                        <option value="60">60</option>
                    </select>
                    <select name="<?php echo $tbl?>[fayn][0][]" class="selectfayn form-control" onchange="faynuygula(this)">
                        <option value="0">Seçiniz</option>
                        <option value="28">28</option>
                        <option value="20">20</option>
                        <option value="22">22</option>
                        <option value="26">26</option>
                        <option value="24">24</option>
                        <option value="18">18</option>
                        <option value="30">30</option>
                    </select>

                    <input type="text" class="sistemsayi form-control" name="<?php echo $tbl?>[sistemsayi][0][]" placeholder="Sistem sayısı">
                    <input type="text" class="ignesayi form-control" name="<?php echo $tbl?>[ignesayi][0][]" placeholder="İğne sayısı">
                   
                    <div class="labelmisgibi" onclick="tiklat(this)"> Tek</div>
                    <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka1 inpt" value="1" name="<?php echo $tbl?>[plakasayi][0][]" >
                    <div class="labelmisgibi" onclick="tiklat(this)"> Çift</div>
                    <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka2 inpt" value="2" name="<?php echo $tbl?>[plakasayi][0][]" >

                    <a class="makinedegerisil btn btn-danger" href="#makdegerisil" onclick="sil(this)">Sil</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php $maksayimiz++; ?>
    <?php } ?>
    <?php } else { ?>
        <div class="cakmatbody">
    <div class="form-group row makineislevitr">
        <label class="col-lg-3 col-form-label">&nbsp;</label>
        <div class="col-lg-9">
           <a href="#makinecogalt2" class="makine2degeriarttir" onclick="makineislevicogalt(this)"><b style="font-size:14px;">MAKİNE İŞLEVİ (+) </b></a>
        </div>
    </div>

    <div class="form-group row makine2degeri1" id="makina2degerleri">
        <label class="col-lg-3 col-form-label">Makine İşlevi</label>
        <div class="col-lg-9">
           <select class="form-control makselecti" name="<?php echo $tbl?>[makineyetenegi][0]" class="selectmakine" onchange="makinedegistir(this)">
            <option value="0">Seçiniz</option>
            <?php if(!empty($nesnemakineyetenegi)){ foreach ($nesnemakineyetenegi as $my => $makineyetenegi) { ?>
               <option value="<?php echo $makineyetenegi['ID']; ?>"><?php echo (!empty($makineyetenegi['metin1'])?$makineyetenegi['metin1']:''); ?></option>
            <?php } } ?>
            </select>
            <a href="#" class="makineislevisil btn btn-danger" onclick="makineislevisil(this)">Sil</a>
        </div>
    </div>

<div class="form-group row" style="display:flex;">
    <label class="col-lg-3 col-form-label">&nbsp;</label>
    <div class="col-lg-9">
       <a href="#makinecogalt" class="makinedegeriarttir" onclick="pusvefayncogalt(this)"><b style="font-size:14px;">PUS/FAYN & SİSTEM/İĞNE SAYISI (+) </b></a>
    </div>
</div>

<div class="form-group row makinedegeri1" id="makinadegerleri" style="display:flex;">
    <label class="col-lg-3 col-form-label">Pus/Fayn &<br> Sistem Sayısı & İğne Sayısı</label>
    <div class="col-lg-9 selectpussfaynn">
        <select name="<?php echo $tbl?>[pus][0][]" class="selectpus form-control" onchange="faynuygula(this)">
            <option value="0">Seçiniz</option>
            <option value="26">26</option>
            <option value="30">30</option>
            <option value="32">32</option>
            <option value="34">34</option>
            <option value="36">36</option>
            <option value="38">38</option>
            <option value="42">42</option>
            <option value="48">48</option>
            <option value="60">60</option>
        </select>
        <select name="<?php echo $tbl?>[fayn][0][]" class="selectfayn form-control" onchange="faynuygula(this)">
            <option value="0">Seçiniz</option>
            <option value="28">28</option>
            <option value="20">20</option>
            <option value="22">22</option>
            <option value="26">26</option>
            <option value="24">24</option>
            <option value="18">18</option>
            <option value="30">30</option>
        </select>

        <input type="text" class="sistemsayi form-control" name="<?php echo $tbl?>[sistemsayi][0][]" placeholder="Sistem sayısı">
        <input type="text" class="ignesayi form-control" name="<?php echo $tbl?>[ignesayi][0][]" placeholder="İğne sayısı">

        <div class="labelmisgibi" onclick="tiklat(this)"> Tek</div>
        <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka1 inpt" value="1" name="<?php echo $tbl?>[plakasayi][0][]" >
        <div class="labelmisgibi" onclick="tiklat(this)"> Çift</div>
        <input type="checkbox" onclick="tiklat2(this)" class="plakasayi plaka2 inpt" value="2" name="<?php echo $tbl?>[plakasayi][0][]" >

        <a class="makinedegerisil btn btn-danger" href="#makdegerisil" onclick="sil(this)">Sil</a>
    </div>
</div>
</div>
       
        <?php } ?>
    <?php } ?>
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