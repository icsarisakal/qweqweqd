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

.fotoyutopla{
    display:none;
}

.btn-success{
    padding:4px !important;
}

.btn-danger{
    padding:4px !important;
}

.icerik {
    background: #e0e0e0;
}

.card{
    background: #e0e0e0;
}

.tabloelyafdiv{
    border: 2px solid #95989e;
}

.iplikkartlari{
    background:#eeeeee;
}
.iplikkartsil{
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.iplikkarti1 .iplikkartsil{
    display:none;
}
.selectsecim{
    width:-webkit-fill-available;
}
.pusvefayn{
    /*display:none !important;*/
}
<?php if(z(8,'a')=='duzenletedarik'||z(8,'a')=='farkli'){  ?>
.pusvefayn{
    display:table-row;
}
<?php } ?>

.boyamaliyetiartir{
    color:black;
    text-decoration: none;
}
.boyabaskimaliyet{
    float:left;
}
.boyabaskimaliyet a{
    display:block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}
.boyabaskimaliyet:nth-child(1) a{
    display:none;
}
.fasonorgumaliyetii2 span{
    width:auto !important;
}
.fasonorgumaliyetii2 span b{
    margin-left: -14px !important;
}

.boyamaliyetlerimiz a{
    color: black;
    display: block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.boyamaliyetiinputt1 a{
    display:none;
}

.ekhizmetartir{
    //display:none;
}

.ekhizmetartir:nth-child(1){
    display:block;
}

.ekhizmetsil{
    display: block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    color: black;
    font-size:14px;
}

.ekhizmetkumas span{
    display:none;
}

.ekhizmetkumas:nth-child(1) span{
    display:block;
}

.ekhizmetkumas .ekth{
    display:none;
}

.ekhizmetkumas:nth-child(1) .ekth{
    display:block;
}

.ekhizmetkumas:nth-child(1) .ekhizmetsil{
    display:none;
}

.karoransil{
    color: black;
    display: none;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.boyamaliyetkarlari1 a{
    display:none;
}

.elyaforansil{
    color: black;
    display: none;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    text-align: center;
}

.elyaforanlari1 a{
    display:none;
}

.labelimiz{
    background: white;
    border: 1px solid #cac;
    padding: 4px 4px;
}

.resimsil{
    color: black;
    display: block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.yuklemebaslat{
    color: black;
    display: block;
    border: 1px solid #96f196;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    padding:2px;
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

.selectmaliyet select{
    border: 1px solid #ddd;
    padding: 10px;
    width: 100%;
}

.selectboyabaskisi select{
    border: 1px solid #ddd;
    padding: 10px;
    width: 100%;
}

.spanisim{
    color: black;
    display: block;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding:4px;
}
<?php
$ytkFyt=ytk($tbl,'ozel2');
if(empty($ytkFyt)&&empty($admn)){?>
.yetkikontrol{
    display:none !important;
}
.boyamaliyethesapla{
    display:none !important;
}
.thiplikbirimfiyat,
.thiplikfiyat,
.thiplikfire,
.thfirelifiyat{
    display:none !important;
}

.iplikbirimfiyat,
.iplikfiyat,
.iplikfire,
.iplikfirelifiyat{
    display:none !important;
}

.iplikkartitoplamc{
    display:none !important;
}
<?php } ?>

textarea{
    width:400px;
}

.telsayisi{
    display:none;
}

.durumkontrolet{
    display:none;
}

.fiyatguncelle{
    position: absolute;
    right: 0;
    background: red;
    width: 160px;
    height: 40px;
    color: white;
    text-align: center;
    z-index: 1;
    padding-top: 10px;
    font-weight: bold;
    display:none;
    cursor:pointer;
}

.kurmdegisim{
    width: 100% !important;
    text-align: left;
}

.kurmdegisim2{
    width: 100% !important;
    text-align: left;
}



</style>
<?php 
$sayi2=0;
$idmiz=z(8,'id');
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
if(!empty($_X)){
    $iplikkartlaricek=$_X['iplikkartlari'];
    $iplikkartlariarray=(!empty($_X['iplikkartlari'])?json_decode($_X['iplikkartlari'],1):'');
    if(!empty($iplikkartlariarray)){
        $iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
    }
    if(!empty($iplikkartlariarray)){ foreach($iplikkartlariarray as $i => $iplkkrtlari){ $sayi2++;} }
}
?>
<style>
<?php if(!empty($_X['telsayisi'])){ ?>
    .telsayisi{
        display:block;
    }
<?php } ?>
<?php if(!empty($_X['makinacesitleri_ID'])&&$_X['makinacesitleri_ID']=='30'){ ?>
    .telsayisi{
        display:inline-block;
    }
<?php } ?>
<?php if(!empty($_X['hamTipi'])&&$_X['hamTipi']=='1'){ ?>
    .durumkontrolet{
        display:inline-flex;
    }
<?php } ?>
</style>
<script type="text/javascript">
setInterval(function() {
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu5",
            success:function(gelensorgu){
                var boyabaskiall=gelensorgu.cevap.boyabaskiall;
                var nesnedoviz=gelensorgu.cevap.nesnedoviz;
                if(boyabaskiall!=null&&boyabaskiall!=''){
                    window.boyabaskiall=boyabaskiall;
                    console.log("Boya baskı güncellendi");
                }
                if(nesnedoviz!=null&&nesnedoviz!=''){
                    window.nesnedoviz=nesnedoviz;
                    console.log("Nesne Döviz güncellendi");
                }
            }
        });
}, 5000); // Wait 5000ms before running again
    $(document).ready(function(){

        <?php if(z(8,'a')=='ekletedarik'){ ?>
            $(".ekhizmetkumas select").val(10).attr("selected","selected");
            $(".boyamaliyetlerimiz select").val(10).attr("selected","selected");
            $(".mkurdovizcinsi select").select2().val(74).change();
            setTimeout(function(){ siraylacalistir3(); }, 2000);
            
        <?php } ?>

        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu2",
            success:function(gelensorgu){
                var boyabaskiall=gelensorgu.cevap.boyabaskiall;
                var nesnedoviz=gelensorgu.cevap.nesnedoviz;
                window.boyabaskiall=boyabaskiall;
                window.nesnedoviz=nesnedoviz;
            }
        });

        $(".secilielyaforani").click(function(){
            $('.silinecekelyaforani').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekelyaforani').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    $(objham).parent().parent().remove();
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        $(".seciliilavegider").click(function(){
            $('.silinecekilavegider').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekilavegider').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    $(objham).parent().parent().remove();
                    siraylacalistir();
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        window.kompozisyonarray={};

        $( ".fasonorgumaliyeti2" ).keyup(function() {
            siraylacalistir3();
        });
        $( ".fasondoviz2" ).change(function() {
            siraylacalistir3();
        });

        $( ".mkurusd input" ).keyup(function() {
            siraylacalistir3();
        });
        $( ".mkureur input" ).keyup(function() {
            siraylacalistir3();
        });

        $( ".iplikoranlari" ).keyup(function() {
            siraylacalistir3();
        });
        $( ".iplikfiresi input" ).keyup(function() {
            siraylacalistir3();
        });

        $( ".kurmdegisim" ).keyup(function() {
            manuelkuroran();
        });

        $(document).ready(function(){
            setTimeout(function(){ manuelkuroran(); }, 2000);
        });
        

        function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
            callback.apply(context, args);
            }, ms || 0);
        };
        }

        $('.iplikoran input').keyup(delay(function (e) {
        console.log('Time elapsed!', this.value);
        alert("Anlık Kompozisyon Görünümü çalışıyor lütfen bitene kadar bekleyiniz");
        iplikdegisimkur2();
        }, 1600));


        $('.hamtipi').change(function() {
            var hamtipi_ID = $('.hamtipi').val();
            if(hamtipi_ID=="1"){
                $(".durumkontrolet").css("display","inline-flex");
            } else {
                $(".durumkontrolet").hide();
            }
         });
         

        $('#makinacesidi').change(function() {
            var makinacesidi_ID = makinacesidi.options[makinacesidi.selectedIndex].value;

            if(makinacesidi_ID=="30"){
                $(".telsayisi").show();
                $(".birimtipi").val(2).attr("selected","selected");
            }

            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&kumas="+makinacesidi_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        var kumas=gelensorgu.cevap.kumas;
                        var pusvefaynmetni=gelensorgu.cevap.pusvefaynmetni;
                        var pusvefaynjson=gelensorgu.cevap.pusvefaynjson;
                        var kumasfasonorgu=gelensorgu.cevap.kumasfasonorgu;
                        var fasondoviz=gelensorgu.cevap.fasondoviz;
                        console.log(gelensorgu);
                        if(kumas!=null){
                            $('#kumasturu option').remove();
                            $.each(kumas, function(k, v) {
                                $('<option>').val(v.ID).text(v.sanalveri).appendTo('#kumasturu');
                            }); 
                        } else {
                            $('#kumasturu option').remove();
                        }
                        if(pusvefaynjson!=null){
                            $('.pusvefaynselect option').remove();
                            $('.pusvefayntr td').html('');
                            $.each(pusvefaynjson, function(k, v) {
                                //$('<input>').val(k).text(v).appendTo('.pusvefayntr td');
                                var clonemuz='<label for="fname'+k+'" class="labelimiz">'+v+':</label><input type="checkbox" id="fname'+k+'" name="kumaskarti[pusvefayn]['+k+'][]"><span> EN: </span><input type="text" value="0" name="kumaskarti[pusvefayn]['+k+'][]" autocomplete="off"><span>cm</span><br>';
                                $(".pusvefayntr td").append(clonemuz);
                            });
                        }
                        if(pusvefaynmetni!=null){
                        $('.pusvefayn').css("display","table-row");
                        //$('.pusvefayn td').html(pusvefaynmetni);
                        $('.fasonorgumaliyeti').val(kumasfasonorgu);
                        $('.fasondoviz').html(fasondoviz);
                        siraylacalistir3();
                        //hesapla();
        
                        }
                    } else {
                        alert('Makina Çeşitlerini okuma başarısız');
                    }
                }
            });
        });
        $('#kumasturu').change(function() {
            var kumasturu_ID = kumasturu.options[kumasturu.selectedIndex].value;
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&kumasturu="+kumasturu_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        var pusvefaynmetni2=gelensorgu.cevap.pusvefaynmetni2;
                        var pusvefaynjson=gelensorgu.cevap.pusvefaynjson;
                        var kumasfasonorgu2=gelensorgu.cevap.kumasfasonorgu2;
                        var fasondoviz2=gelensorgu.cevap.fasondoviz2;
                        console.log(pusvefaynmetni2);
                        if(pusvefaynmetni2!=null){
                        $('.pusvefayn').css("display","table-row");
                        //$('.pusvefayn td').html(pusvefaynmetni2);
                        $('.fasonorgumaliyeti').val(kumasfasonorgu2);
                        $('.fasondoviz').html(fasondoviz2);
                        siraylacalistir3();
                        //hesapla();
        
                        }
                        if(pusvefaynjson!=null){
                            $('.pusvefaynselect option').remove();
                            $('.pusvefayntr td').html('');
                            $.each(pusvefaynjson, function(k, v) {
                                //$('<option>').val(k).text(v).appendTo('.pusvefaynselect');
                                var clonemuz='<label for="fname'+k+'" class="labelimiz">'+v+':</label><input type="checkbox" id="fname'+k+'" name="kumaskarti[pusvefayn]['+k+'][]"><span> EN: </span><input type="text" value="0" name="kumaskarti[pusvefayn]['+k+'][]" autocomplete="off"><span>cm</span><br>';
                                $(".pusvefayntr td").append(clonemuz);
                            });
                        }
                    } else {
                        alert('Kumaş Türünü okuma başarısız');
                    }
                }
            });
        });
    });
</script>
<script>

function hesapla(ths) {
var toplamfiyat = 0;
var toplamfirefiyat = 0;
var toplamfirelifiyat = 0;
var degeroran=0;
$('.iplikoran').each(function(ip, objoran){
    var iplikoran=$(objoran).find("input").val();
    var iplikoran = sy(iplikoran);
    degeroran=parseFloat(degeroran+iplikoran);
}); 
/*/
if(degeroran!=0){
    if(degeroran>100){
        alert("Toplam iplik oranı değeri 100'den fazla olamaz");
    }
    if(degeroran<100){
        alert("Toplam iplik oranı değeri 100'den az olamaz");
    }
}
/*/

$('.iplikkartihepsi tr').each(function(i, obj){
    var eachiplikoran=$(obj).find("input").val()/100;
    var eachbirimfiyat=$(obj).find(".iplikbirimfiyat").html();
    var eachiplikfiresi=$(obj).find(".iplikfiresi input").val();
    var eachiplikfiresi2=$(obj).find(".iplikfiresi div").html();
    if(eachiplikfiresi==''){
        var eachiplikfiresi=eachiplikfiresi2;
    }
    var numiplikoran = sy(eachiplikoran);
    var numbirimfiyat = sy(eachbirimfiyat);
    var numiplikfiresi = sy(eachiplikfiresi);
    var numfiyathesapla = sy(numbirimfiyat*numiplikoran,2);
    $(obj).find(".iplikfiyat").html(numfiyathesapla);
    var fiyaticek = $(obj).find(".iplikfiyat").html();
    var fiyaticek2 = sy(fiyaticek);
    var firefiyati = sy(numiplikfiresi*fiyaticek2)/100;
    var firefiyati2 = sy(firefiyati,2);
    $(obj).find(".iplikfire").html(firefiyati2);
    var fireyicek = $(obj).find(".iplikfire").html();
    var fireyicek2 = sy(fireyicek);
    var firelifiyat= sy(fiyaticek2+fireyicek2);
    var firelifiyat2 = sy(firelifiyat,2);
    $(obj).find(".iplikfirelifiyat").html(firelifiyat2);
    var firelifiyatcek = $(obj).find(".iplikfirelifiyat").html();
    var firelifiyatcek2 = sy(firelifiyatcek);

    toplamfiyat += parseFloat(fiyaticek2);
    toplamfirefiyat += parseFloat(fireyicek2);
    toplamfirelifiyat += parseFloat(firelifiyatcek2);
}); 
    toplamfiyat = sy(toplamfiyat,2);
    toplamfirefiyat = sy(toplamfirefiyat,2);
    toplamfirelifiyat = sy(toplamfirelifiyat,2);
    $('.toplamfiyatcek').html(toplamfiyat);
    $('.toplamfirefiyaticek').html(toplamfirefiyat);
    $('.toplamfirelifiyaticek').html(toplamfirelifiyat);
    
    /*
    console.log("Baslangic");
    console.log("-");
    console.log(toplamfiyat);
    console.log("-");
    console.log(toplamfirefiyat);
    console.log("-");
    console.log(toplamfirelifiyat);
    console.log("-");
    console.log("Bitis");
    */
}
$( document ).ready(function() {
$(".dovizdegistir").select2('destroy');
    var deger=1<?php echo ' + '.$sayi2; ?>;
    $(".iplikkartiarttir").click(function(){
        var iplikeski="iplikkarti"+deger;
        var selecteski="select"+deger;
        deger++;
        var iplikyeni="iplikkarti"+deger;
        var selectyeni="select"+deger;
        var cloneObj2 = $('#iplikkartlari').clone(true);
        var cloneObj2 =cloneObj2.removeClass(iplikeski);
        var cloneObj2 =cloneObj2.removeClass("iplikkarti1");
        var cloneObj2 =cloneObj2.addClass(iplikyeni);
        $(".iplikkartihepsi").append(cloneObj2);
        $('.'+iplikyeni).find("select").attr("id",selectyeni);
        $('.'+iplikyeni).find(".select2-container").remove();
        $('.'+iplikyeni).find("select").removeAttr('data-select2-id');
        $('#select'+deger).select2();
        for (i = 0; i < deger; i++) {
            $('#select'+i).select2();
        }
        $('#select'+deger).select2();
    });
    $(".boyamaliyetiar2tir").click(function(){
        var inputeski="boyamaliyetiinput"+deger2;
        var selecteski="boyamaliyetiselect"+deger2;
        deger2++;
        var inputyeni="boyamaliyetiinput"+deger2;
        var selectyeni="boyamaliyetiselect"+deger2;

        var cloneObje1 = $('.boyamaliyetiinput1').clone();
        var cloneObje1 =cloneObje1.removeClass(inputeski);
        var cloneObje1 =cloneObje1.removeClass("boyamaliyetiinput1");
        var cloneObje1 =cloneObje1.addClass(inputyeni);
        $(".boyamaliyetiinputt1").append(cloneObje1);

        var cloneObje2 = $('.boyamaliyetiselect1').clone();
        var cloneObje2 =cloneObje2.removeClass(selecteski);
        var cloneObje2 =cloneObje2.removeClass("boyamaliyetiselect1");
        var cloneObje2 =cloneObje2.addClass(selectyeni);
        $(".boyamaliyetiselectt1").append(cloneObje2);

    });
    var deger3=1;
    $(".ustboyamaliyetiartir").click(function(){
        var inputeski="boyabaskimaliyet"+deger3;
        deger3++;
        var inputyeni="boyabaskimaliyet"+deger3;

        var clone1 = $('.boyabaskimaliyet1').clone();
        var clone1 = clone1.removeClass(inputeski);
        var clone1 = clone1.removeClass("boyabaskimaliyet1");
        var clone1 =clone1.addClass(inputyeni);
        $(".selectboyatd").append(clone1);
        $('.'+inputyeni).find("select").prop("disabled", false);
    });

    var deger4=1;
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    if(boyamaliyetlerimizlength>1){
        deger4=boyamaliyetlerimizlength;
    }
    $(".altboyamaliyetiartir").click(function(){
        var classeski="boyamaliyetiinputt"+deger4;
        var classeski1="boyamaliyetiinput"+deger4;
        var degereski=deger4;
        deger4++;
        var classyeni="boyamaliyetiinputt"+deger4;
        var classyeni1="boyamaliyetiinput"+deger4;
        var degeryeni=deger4;

        var clone2 = $('.boyamaliyetiinputt1').clone();
        var clone2 = clone2.removeClass(classeski);
        var clone2 = clone2.removeClass("boyamaliyetiinputt1");
        var clone2 =clone2.addClass(classyeni);
        //var klonmetin='<tr class="boyamaliyetlerimiz '+classyeni+'"><th colspan="2">'+clone2+'<a href="#altmaliyetsil" onclick="altmaliyetsilme(this)">Sil</a></th><td class="'+classyeni1+'"></td></tr>';
        $(".boyamaliyetihepsi").append(clone2);
        $('.'+classeski).find("select").attr("class",degereski);
        $('.'+classyeni).find("select").attr("class",degeryeni);
        $('.'+classyeni).find("select option:eq(0)").attr("selected",true);
        $('.'+classyeni).find("div").html('&nbsp;');
        $('.'+classyeni).find("input").val('0');
    });

    var deger5=1;
    $(".ekhizmetartir").click(function(){
        var classeski="ekhizmetkumaslari"+deger5;
        var degereski=deger5;
        deger5++;
        var classyeni="ekhizmetkumaslari"+deger5;
        var degeryeni=deger5;

        var clone3 = $('.ekhizmetkumas:nth-child(1)').clone();
        var clone3 = clone3.removeClass(classeski);
        var clone3 = clone3.removeClass("ekhizmetkumaslari1");
        var clone3 =clone3.addClass(classyeni);
        $(".ekhizmetler").append(clone3);
        $('.'+classeski).find("select").attr("class",degereski);
        $('.'+classyeni).find("select").attr("class",degeryeni);
        $('.'+classyeni).find(".ekhizmetartir").hide();
    });

    var deger6=1;
    $(".karoranartir").click(function(){
        var classeski="boyamaliyetkarlari"+deger6;
        var degereski=deger6;
        deger6++;
        var classyeni="boyamaliyetkarlari"+deger6;
        var degeryeni=deger6;

        var clone4 = $('.boyamaliyetkarlari tr:nth-child(2)').clone();
        var clone4 = clone4.removeClass(classeski);
        var clone4 = clone4.removeClass("boyamaliyetkarlari1");
        var clone4 =clone4.addClass(classyeni);
        $(".boyamaliyetkarlari").append(clone4);
    });
    
    var deger7=1;
    $(".elyaforanarttir").click(function(){
        var classeski="elyaforanlari1"+deger7;
        var degereski=deger7;
        deger7++;
        var classyeni="elyaforanlari1"+deger7;
        var degeryeni=deger7;

        var clone5 = $('.elyaforanlarii tr:nth-child(2)').clone();
        var clone5 = clone5.removeClass(classeski);
        var clone5 = clone5.removeClass("elyaforanlari1");
        var clone5 =clone5.addClass(classyeni);
        $(".elyaforanlarii").append(clone5);
    });
});

function ekhizmetsilme(ths){
    $(ths).parent().parent().parent().remove();
    siraylacalistir3();
}

function resimsil(ths){
    var resimsil=$(ths).parent().find("input").val();
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&resimsil="+resimsil,
            success:function(gelensorgu){
                $(ths).parent().remove();
                alert("Resim kalıcı olarak silindi");
            }
        });
}

function fiyatyansit(ths){
    var fiyatyansit=$(".kumasfiyati").val();
    fiyatyansit=fiyatyansit.replace(",",".");
    console.log(fiyatyansit);
    var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var manuelkurtl="1";
    var eurid="76";
    var tryid="74";
    var usdid="75";
    var bunacevir=manuelkurtl;
    var hesaplananfiyattl=0;
    var hesaplananfiyatusd=0;
    var hesaplananfiyateur=0;
    if(manuelkurcins==tryid){
        var bunacevir=manuelkurtl;
        var hesaplananfiyattl = (fiyatyansit * bunacevir) / manuelkurtl;
        var hesaplananfiyatusd = (fiyatyansit * bunacevir) / manuelkurusd;
        var hesaplananfiyateur = (fiyatyansit * bunacevir) / manuelkureur;
    }
    if(manuelkurcins==usdid){
        var bunacevir=manuelkurusd;
        var hesaplananfiyattl = (fiyatyansit * bunacevir) / manuelkurtl;
        var hesaplananfiyatusd = (fiyatyansit * bunacevir) / manuelkurusd;
        var hesaplananfiyateur = (fiyatyansit * bunacevir) / manuelkureur;
    }
    if(manuelkurcins==eurid){
        var bunacevir=manuelkureur;
        var hesaplananfiyattl = (fiyatyansit * bunacevir) / manuelkurtl;
        var hesaplananfiyatusd = (fiyatyansit * bunacevir) / manuelkurusd;
        var hesaplananfiyateur = (fiyatyansit * bunacevir) / manuelkureur;
    }
    $('.tpfiyattl').html(hesaplananfiyattl);
    $('.tpfiyatusd').html(hesaplananfiyatusd);
    $('.tpfiyateur').html(hesaplananfiyateur);

    var boyakontrolet=$(".boyamaliyetiinput1 input").val();
    if(boyakontrolet==undefined){
        var tlfiyat='<input type="text" value="'+hesaplananfiyattl+'" class="form-control" autocomplete="off" disabled=""><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+hesaplananfiyattl+'">';
        var usdfiyat='<input type="text" value="'+hesaplananfiyatusd+'" class="form-control" autocomplete="off" disabled="">';
        var eurfiyat='<input type="text" value="'+hesaplananfiyateur+'" class="form-control" autocomplete="off" disabled="">';
        
        $('.tlboyamaliyetimiz td').html(tlfiyat);
        $('.usdboyamaliyetimiz td').html(usdfiyat);
        $('.eurboyamaliyetimiz td').html(eurfiyat);
    } else {
        siraylacalistir3();
    }

    
}
<?php if(z(8,'a')=='duzenletedarik'){ ?> 
setTimeout(function(){ fiyatyansit(); }, 1000);
<?php } ?>


function maliyetsilme(ths){
    $(ths).parent().remove();
    var classid=$(ths).parent().find("select option:selected").val();
    if(classid!=''){
        $('.boyamaliyetiinputt'+classid).remove();
        bolhesapla();
        siraylacalistir2();
        //altboyadegistir2();
    }
}

function altmaliyetsilme(ths){
    $(ths).parent().parent().remove();
    bolhesapla();
    altboyahamhizmet();
    siraylacalistir();
    //altboyadegistir2();
}

function karoransilme(ths){
    $(ths).parent().parent().remove();
    siraylacalistir();
}

function elyaforansilme(ths){
    $(ths).parent().parent().parent().remove();
}





function hesapla(ths) {
var toplamfiyat = 0;
var toplamfirefiyat = 0;
var toplamfirelifiyat = 0;

var degeroran=0;
$('.iplikoran').each(function(ip, objoran){
    var iplikoran=$(objoran).find("input").val();
    var iplikoran = sy(iplikoran);
    degeroran=parseFloat(degeroran+iplikoran);
}); 

/*/
if(degeroran!=0){
    if(degeroran>100){
        alert("Toplam iplik oranı değeri 100'den fazla olamaz");
    }
    if(degeroran<100){
        alert("Toplam iplik oranı değeri 100'den az olamaz");
    }
}
/*/
var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
var cekilenhamfasonorgudoviz=$('.fasondoviz').html();
var cekilenhamfasonorgumaliyeti = sy(cekilenhamfasonorgumaliyeti);
var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
var manuelkurusd=$(".mkurusd input").val();
var manuelkureur=$(".mkureur input").val();
manuelkurusd=manuelkurusd.replace(",",".");
manuelkureur=manuelkureur.replace(",",".");
var manuelkurtl="1";
var eurid="76";
var tryid="74";
var usdid="75";
var bunacevir=manuelkurtl;
if(cekilenhamfasonorgudoviz=='TRY'){
    var bunacevir=manuelkurtl;
}
if(cekilenhamfasonorgudoviz=='USD'){
    var bunacevir=manuelkurusd;
}
if(cekilenhamfasonorgudoviz=='EUR'){
    var bunacevir=manuelkureur;
}
if(manuelkurcins==eurid){
    var cekilenhamfasonorgumaliyeti = (cekilenhamfasonorgumaliyeti * bunacevir) / manuelkureur;
}
if(manuelkurcins==tryid){
    var cekilenhamfasonorgumaliyeti = (cekilenhamfasonorgumaliyeti * bunacevir) / manuelkurtl;
}
if(manuelkurcins==usdid){
    var cekilenhamfasonorgumaliyeti = (cekilenhamfasonorgumaliyeti * bunacevir) / manuelkurusd;
}

var cekilenhamfasonorgumaliyeti2=$('.fasonorgumaliyeti2').val();
var cekilenhamfasonorgudoviz2=$('.fasondoviz2').find("option:selected").text();
if(cekilenhamfasonorgumaliyeti2!=''){
    var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var manuelkurtl="1";
    var eurid="76";
    var tryid="74";
    var usdid="75";
    var bunacevir=manuelkurtl;
    if(cekilenhamfasonorgudoviz2=='TRY'){
        var bunacevir=manuelkurtl;
    }
    if(cekilenhamfasonorgudoviz2=='USD'){
        var bunacevir=manuelkurusd;
    }
    if(cekilenhamfasonorgudoviz2=='EUR'){
        var bunacevir=manuelkureur;
    }
    if(manuelkurcins==eurid){
        var cekilenhamfasonorgumaliyeti2 = (cekilenhamfasonorgumaliyeti2 * bunacevir) / manuelkureur;
    }
    if(manuelkurcins==tryid){
        var cekilenhamfasonorgumaliyeti2 = (cekilenhamfasonorgumaliyeti2 * bunacevir) / manuelkurtl;
    }
    if(manuelkurcins==usdid){
        var cekilenhamfasonorgumaliyeti2 = (cekilenhamfasonorgumaliyeti2 * bunacevir) / manuelkurusd;
    }
    var cekilenhamfasonorgumaliyeti=cekilenhamfasonorgumaliyeti2
}

$('.iplikkartihepsi tr').each(function(i, obj){
    var eachiplikoran=$(obj).find("input").val()/100;
    var eachbirimfiyat=$(obj).find(".iplikbirimfiyat").html();
    var eachiplikfiresi=$(obj).find(".iplikfiresi input").val();
    var eachiplikfiresi2=$(obj).find(".iplikfiresi div").html();
    if(eachiplikfiresi==''){
        var eachiplikfiresi=eachiplikfiresi2;
    }
    var numiplikoran = sy(eachiplikoran);
    var numbirimfiyat = sy(eachbirimfiyat);
    var numiplikfiresi = sy(eachiplikfiresi);
    var numfiyathesapla = sy(numbirimfiyat*numiplikoran,2);
    $(obj).find(".iplikfiyat").html(numfiyathesapla);
    var fiyaticek = $(obj).find(".iplikfiyat").html();
    var fiyaticek2 = sy(fiyaticek);
    var firefiyati = sy(numiplikfiresi*fiyaticek2)/100;
    var firefiyati2 = sy(firefiyati,4);
    $(obj).find(".iplikfire").html(firefiyati2);
    var fireyicek = $(obj).find(".iplikfire").html();
    var fireyicek2 = sy(fireyicek);
    var firelifiyat= sy(fiyaticek2+fireyicek2);
    var firelifiyat2 = sy(firelifiyat,4);
    $(obj).find(".iplikfirelifiyat").html(firelifiyat2);
    var firelifiyatcek = $(obj).find(".iplikfirelifiyat").html();
    var firelifiyatcek2 = sy(firelifiyatcek);

    toplamfiyat += parseFloat(fiyaticek2);
    toplamfirefiyat += parseFloat(fireyicek2);
    toplamfirelifiyat += parseFloat(firelifiyatcek2);
}); 
    toplamfiyat = sy(toplamfiyat,4);
    toplamfirefiyat = sy(toplamfirefiyat,4);
    toplamfirelifiyat = sy(toplamfirelifiyat,4);
    $('.toplamfiyatcek').html(toplamfiyat);
    $('.toplamfirefiyaticek').html(toplamfirefiyat);
    $('.toplamfirelifiyaticek').html(toplamfirelifiyat);
    var toplamfirelifiyaticek = $(obj).find(".toplamfirelifiyaticek").html();
    var toplamfirelifiyaticek2 = sy(toplamfirelifiyaticek);
    var toplamfirelifiyaticek3 = parseFloat(toplamfirelifiyaticek);
    var eurid="76";
    var tryid="74";
    var usdid="75";
    var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var manuelkurtl="1";
    var kurumuz="TRY";
    var rmanuelkurtl = sy(manuelkurtl);
    var rmanuelkureur = sy(manuelkureur);
    var rmanuelkurusd = sy(manuelkurusd);
    var toplamfirelifiyat =toplamfirelifiyat.replace(",", ".");
    var kumasturucek=$("#kumasturu option:selected").val();
    if(cekilenhamfasonorgumaliyeti!=''){
        
    }

    var toplamfirelifiyat = (parseFloat(toplamfirelifiyat) + parseFloat(cekilenhamfasonorgumaliyeti));
    
    if(manuelkurcins==eurid){
        var fiyathesaplatl = (toplamfirelifiyat * manuelkureur) / manuelkurtl;
        var fiyathesaplaeur = (toplamfirelifiyat * manuelkureur) / manuelkureur;
        var fiyathesaplausd = (toplamfirelifiyat * manuelkureur) / manuelkurusd;
        $('.tpfiyattl').html(fiyathesaplatl.toFixed(2));
        $('.tpfiyateur').html(fiyathesaplaeur.toFixed(2));
        $('.tpfiyatusd').html(fiyathesaplausd.toFixed(2));
    }
    if(manuelkurcins==tryid){
        var fiyathesaplatl = (toplamfirelifiyat * manuelkurtl) / manuelkurtl;
        var fiyathesaplaeur = (toplamfirelifiyat * manuelkurtl) / manuelkureur;
        var fiyathesaplausd = (toplamfirelifiyat * manuelkurtl) / manuelkurusd;
        $('.tpfiyattl').html(fiyathesaplatl.toFixed(2));
        $('.tpfiyateur').html(fiyathesaplaeur.toFixed(2));
        $('.tpfiyatusd').html(fiyathesaplausd.toFixed(2));
    }
    if(manuelkurcins==usdid){
        var fiyathesaplatl = (toplamfirelifiyat * manuelkurusd) / manuelkurtl;
        var fiyathesaplaeur = (toplamfirelifiyat * manuelkurusd) / manuelkureur;
        var fiyathesaplausd = (toplamfirelifiyat * manuelkurusd) / manuelkurusd;
        $('.tpfiyattl').html(fiyathesaplatl.toFixed(2));
        $('.tpfiyateur').html(fiyathesaplaeur.toFixed(2));
        $('.tpfiyatusd').html(fiyathesaplausd.toFixed(2));
    }
    dovizver();
    $('.maliyetham').val(fiyathesaplatl);
    
}
function sil(ths){
    $(ths).parent().remove();
    hesapla();
    siraylacalistir3();
}

var deger2=1;
function boyamaliyetiarttir(dgr){
    var inputeski="boyamaliyetiinput1";
    var selecteski="boyamaliyetiselect1";
    deger2++;
    var inputyeni="boyamaliyetiinput"+deger2;
    var selectyeni="boyamaliyetiselect"+deger2;

    var cloneObje1 = $('.boyamaliyetiinputt'+dgr+' .boyamaliyetiinput1').clone();
    var cloneObje1 =cloneObje1.removeClass(inputeski);
    var cloneObje1 =cloneObje1.removeClass("boyamaliyetiinput1");
    var cloneObje1 =cloneObje1.addClass(inputyeni);
    $(".boyamaliyetiinputt"+dgr).append(cloneObje1);

    var cloneObje2 = $('.boyamaliyetiselectt'+dgr+' .boyamaliyetiselect1').clone();
    var cloneObje2 =cloneObje2.removeClass(selecteski);
    var cloneObje2 =cloneObje2.removeClass("boyamaliyetiselect1");
    var cloneObje2 =cloneObje2.addClass(selectyeni);
    $(".boyamaliyetiselectt"+dgr).append(cloneObje2);
}



var boyamaliyetdegeri=0;
var inputlar='';
function boyamaliyetiyansit(ths){
    var boyabaski_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    //$('.boyamaliyetiinputt'+boyabaski_ID).remove();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();


    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&boyabaski="+boyabaski_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenhamkumastl="+cekilensonhamkumastl+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur,
        success:function(gelensorgu){
            var boyabaskiformul=gelensorgu.cevap.boyabaskiformul;
            //inputlar=inputlar+'<input type="text" name="kumaskarti[boyamaliyet]['+boyabaskitipi+']['+boyabaski_ID+'][]" value="" autocomplete="off">';
            
            if(boyabaskiformul!=null){

                /*/
                var option='';
                $.each(nesneboyabaski, function(k, v) {
                    option=option+'<option value="'+v.ID+'">'+v.tipi+'</option>';
                });
                /*/
                
                //var select='<select onchange="altboyadegistiryeni(this)" class="'+boyabaski_ID+'" id="'+boyabaskifiyat+'">'+'<option value="0">Seçiniz</option>'+option+'</select>';
                //var klonolustur='<tr class="boyamaliyetlerimiz boyamaliyetiinputt'+boyabaski_ID+'"><th colspan="2">'+select+'</th><td class="boyamaliyetiinput1">'+inputlar+'</td></tr>';
                //$(".boyamaliyetihepsi").append(klonolustur);
                //boyamaliyetdegeri++;
                //altboyadegistir2();

                $(ths).parent().find("div").html(boyabaskiformul);
                
            } else{
                alert('Boya Baskı hizmetleri bulunamadı veya okumada bir sorun oluştu.');
            }
        }
    });
}


var boyamaliyetdegeri=0;
var inputlar='';
window.selectboyatdanahtar=0;
function boyamaliyetiyansityeni(ths){
    
    var boyabaski_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
    var cekilensonhamkumastl2=sy(cekilensonhamkumastl);
    if(cekilensonhamkumastl!=''){
        cekilenhamtl2=cekilensonhamkumastl2;
    }
    //$('.boyamaliyetiinputt'+boyabaski_ID).remove();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;

    
    
    boyamaliyetiyansiteach2();
    var y_ustboyabaski=window.boyabaskiall[boyabaski_ID];
    var y_ustboyabaskifire=y_ustboyabaski["fire"];
    var y_ustboyabaskifire2=sy(y_ustboyabaskifire)+100;
    var y_ustboyabaskifire2=sy(y_ustboyabaskifire2)/100;
    var y_ustboyabaskifiyat=y_ustboyabaski["fiyat"];
    var y_ustboyabaskinesnedoviz=y_ustboyabaski["nesne_IDdoviz"];
    var y_ustfiyathesaplatl=y_ustboyabaskifiyat;

    if(y_ustboyabaskinesnedoviz=='75'){
        var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkurusd;
    }
    if(y_ustboyabaskinesnedoviz=='76'){
        var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkureur;
    }

    var usttengelenfiyat=0;
    if(cekilensonhamkumastl!=0){
        usttengelenfiyat=cekilensonhamkumastl;
    } else {
        usttengelenfiyat=fasonorgumaliyet;
    }

    var y_ustbaskitoplam=sy(usttengelenfiyat)+y_ustfiyathesaplatl;
    var y_ustbaskitoplam2=sy(y_ustbaskitoplam)*y_ustboyabaskifire2;
    var y_ustbaskitoplam2=y_ustbaskitoplam2.toFixed(2);

    if(window.selectboyatdanahtar==0){
        siradakisayac++;
        window.selectboyatdanahtar=1;
    }

    $(ths).parent().find("div").html(y_ustbaskitoplam2);

}

function boyamaliyetiyansityeni2(ths){
    
    var boyabaski_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
    var cekilensonhamkumastl2=sy(cekilensonhamkumastl);
    if(cekilensonhamkumastl!=''){
        cekilenhamtl2=cekilensonhamkumastl2;
    }
    //$('.boyamaliyetiinputt'+boyabaski_ID).remove();
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;
    
    var y_ustboyabaski=window.boyabaskiall[boyabaski_ID];
    var y_ustboyabaskifire=y_ustboyabaski["fire"];
    var y_ustboyabaskifire2=sy(y_ustboyabaskifire)+100;
    var y_ustboyabaskifire2=sy(y_ustboyabaskifire2)/100;
    var y_ustboyabaskifiyat=y_ustboyabaski["fiyat"];
    var y_ustboyabaskinesnedoviz=y_ustboyabaski["nesne_IDdoviz"];
    var y_ustfiyathesaplatl=y_ustboyabaskifiyat;

    if(y_ustboyabaskinesnedoviz=='75'){
        var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkurusd;
    }
    if(y_ustboyabaskinesnedoviz=='76'){
        var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkureur;
    }

    var usttengelenfiyat=0;
    if(cekilensonhamkumastl!=0){
        usttengelenfiyat=cekilensonhamkumastl;
    } else {
        usttengelenfiyat=fasonorgumaliyet;
    }

    var y_ustbaskitoplam=sy(usttengelenfiyat)+y_ustfiyathesaplatl;
    var y_ustbaskitoplam2=sy(y_ustbaskitoplam)*y_ustboyabaskifire2;
    var y_ustbaskitoplam2=y_ustbaskitoplam2.toFixed(2);

    if(window.selectboyatdanahtar==0){
        siradakisayac++;
        window.selectboyatdanahtar=1;
    }

    $(ths).parent().find("div").html(y_ustbaskitoplam2);

}

function boyamaliyetiyansiteach(){
    var indexsayi=0;
    var selectboyatdlength=$('.selectboyatd .boyabaskimaliyet ').length;
    $('.selectboyatd .boyabaskimaliyet').each(function(i2, objeach){
        window.altsayac3++;
        var alttabloindex=$(objeach).index();
        if(indexsayi==alttabloindex){
            var obj_ID=$(".selectboyatd select:eq("+alttabloindex+")");
            window.obj_ID=obj_ID;
            boyamaliyetiyansityeni(obj_ID)
        }
        indexsayi++;
    });
}

function boyamaliyetiyansiteach2(){
    var indexsayi=0;
    var selectboyatdlength=$('.selectboyatd .boyabaskimaliyet ').length;
    $('.selectboyatd .boyabaskimaliyet').each(function(i2, objeach){
        window.altsayac3++;
        var alttabloindex=$(objeach).index();
        if(indexsayi==alttabloindex){
            var obj_ID=$(".selectboyatd select:eq("+alttabloindex+")");
            window.obj_ID=obj_ID;
            boyamaliyetiyansityeni2(obj_ID)
        }
        indexsayi++;
    });
    siraylacalistir();

}

var siraylacalistirsayac2=0;
function siraylacalistir2(){
    var selectboyatdlength=$('.selectboyatd select').length;
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu",
        success:function(gelensorgu){

            boyamaliyetiyansiteach();
            
            if(siraylacalistirsayac2<selectboyatdlength){
                siraylacalistirsayac2++;
                siraylacalistir2();
            } else {
                siraylacalistirsayac2=0;
                var siradakisayac=2;
                var islemdekisayac=-1;
            }

        }
    });
}

window.altsayac=0;
function bitti(sonsayac,boyabaski_ID,boyatext){
    if(sonsayac<=window.altsayac){
        $('.altboyabaski'+boyabaski_ID).remove();
        var sanalalt='<tr class="altboyabaskilar altboyabaski'+boyabaski_ID+'"><th colspan="2">'+boyatext+'</th><td class="altboyabaskitext">'+window.altbaskitext+'</td></tr>';
        $(".mamulboyamaliyeti").before(sanalalt);
    }
}

window.altsayac2=0;
function bitti2(sonsayac2,hamhizmet){
    if(sonsayac2<=window.altsayac2){
        var sanalveri='<input type="text" value="'+window.hamhizmet+'" autocomplete="off" name="ekhizmet" disabled="disabled">';
        //$('.tlekboyamaliyeti td').html(sanalveri);
    }
}

function altboyadegistir(ths){
    var boyabaski_ID = $(ths).val();
    var boyabaskiust_ID = $(ths).attr("class");
    var boyabaskiustfiyat = $('.'+boyabaskiust_ID).attr("id");
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    var alttabloindex=$(ths).parent().parent().index();
    var alttabloindex2=(alttabloindex-4);

    $('.boyamaliyetfiyati .tlboyamaliyetimiz td input').remove();
    $('.boyamaliyetfiyati .usdboyamaliyetimiz td input').remove();
    $('.boyamaliyetfiyati .eurboyamaliyetimiz td input').remove();

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;

    var karmiktari=0;
    var karihesapla=0;
    $('.karoranlari').each(function(kar, objkar){
        var karmiktariobj=$(objkar).val();
        karmiktari=parseFloat(karmiktariobj)+karmiktari;
    });
    if(karmiktari!=0){
        var karihesapla=(karmiktari+100)/100;
    }
    
    var option='';
    var input='';
    var ustboyabaski='';
    var hamhizmet=0;
    var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
    var cekilensonhamkumastl2=sy(cekilensonhamkumastl);
    if(cekilensonhamkumastl!=''){
        cekilenhamtl2=cekilensonhamkumastl2;
    }
    var iplikclass="boyamaliyetiinputt"+boyabaskiust_ID;
    $('.'+iplikclass+' .boyamaliyetiinput1').html(input);
    //$('.boyamaliyetihepsi select').prop("disabled", true);
    var boyainput=1;
    var sayac1=0;
    window.sayacimiz=0;
    window.yinput='';
    window.yinput2='';
    window.ytoplaminput='';
    window.ytoplaminput2='';
    window.ytoplaminput3='';
    window.kartoplaminput='';
    window.kartoplaminput2='';
    window.kartoplaminput3='';
    window.selectboyatdanahtar=0;
    $('.selectboyatd select').each(function(i, obj){
        var iplik_ID = $(obj).find("option:selected").val();
        var input='';
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&ustboyabaski="+iplik_ID+"&altboyabaski="+boyabaski_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenhamkumastl="+cekilensonhamkumastl+"&cekilenfasonorgu"+cekilenhamfasonorgumaliyeti+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur,
            success:function(gelensorgu){
                if(window.selectboyatdanahtar==0){
                    siradakisayac++;
                    window.selectboyatdanahtar=1;
                }
                $('.boyamaliyetfiyati .tlboyamaliyetimiz td input').remove();
                $('.boyamaliyetfiyati .usdboyamaliyetimiz td input').remove();
                $('.boyamaliyetfiyati .eurboyamaliyetimiz td input').remove();
                var ustboyabaski=gelensorgu.cevap.ustboyabaski;
                if(ustboyabaski==0){
                    ustboyabaski=parseFloat(cekilenhamtl2);
                }
                var ustbaskitoplam=gelensorgu.cevap.ustbaskitoplam;
                var altbaskitoplam=gelensorgu.cevap.altbaskitoplam;
                if(ustboyabaski!=null){
                var input='<input type="text" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+ustboyabaski+'" autocomplete="off" class="boyamaliyethesapla boyainput'+boyainput+'" disabled><input type="hidden" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+ustboyabaski+'" autocomplete="off" class="boyamaliyethesapla">';
                window.yinput=window.yinput+input;

                var ustboyabaskikar=0;
                var toplameskiveyenifiyat1=0;
                var toplaminput='';
                var toplaminput2='';
                var toplaminput3='';
                if(karihesapla!=0){
                    console.log("burda if y");
                    ustboyabaskikar=sy(ustboyabaski)*karihesapla;
                    var toplaminput=ustboyabaskikar.toFixed(2);
                    var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled>';
                    
                    var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                    var toplaminput2=fiyathesaplaeur.toFixed(2);
                    var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';
                    
                    var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                    var toplaminput3=fiyathesaplausd.toFixed(2);
                    var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                    window.ytoplaminput=window.ytoplaminput+toplaminput;
                    window.ytoplaminput2=window.ytoplaminput2+toplaminput2;
                    window.ytoplaminput3=window.ytoplaminput3+toplaminput3;
                } else {
                    console.log("burda else y");
                    ustboyabaskikar=ustboyabaski;
                    var toplaminput=ustboyabaskikar;
                    var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled>';

                    var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                    var toplaminput2=fiyathesaplaeur;
                    var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                    var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                    var toplaminput3=fiyathesaplausd;
                    var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                    window.ytoplaminput=window.ytoplaminput+toplaminput;
                    window.ytoplaminput2=window.ytoplaminput2+toplaminput2;
                    window.ytoplaminput3=window.ytoplaminput3+toplaminput3;
                }

                if(alttabloindex==3){
                    $('.'+iplikclass+' .boyamaliyetiinput1').html(window.yinput);
                    $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.ytoplaminput);
                    $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.ytoplaminput2);
                    $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.ytoplaminput3);
                } else if(boyamaliyetlerimizlength>1){
                    var inputsec=$('.boyamaliyetlerimiz:eq('+alttabloindex2+') input[type=text]:eq('+sayac1+')').val();
                    var inputsec=sy(inputsec);
                    var ustboyabaski=sy(ustboyabaski);
                    var toplameskiveyenifiyat1=sy(inputsec+ustboyabaski);
                    var toplameskiveyenifiyat=toplameskiveyenifiyat1.toFixed(2);
                    var input='<input type="text" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+toplameskiveyenifiyat+'" autocomplete="off" class="boyamaliyethesapla boyainput'+boyainput+'" disabled><input type="hidden" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+toplameskiveyenifiyat+'" autocomplete="off" class="boyamaliyethesapla">';
                    window.yinput2=window.yinput2+input;
                    $('.'+iplikclass+' .boyamaliyetiinput1').html(window.yinput2);

                    var toplaminput='';
                    var toplaminput2='';
                    var toplaminput3='';
                    var ustboyabaskikar=0;
                    if(karihesapla!=0){
                        console.log("burda if");
                        ustboyabaskikar=sy(toplameskiveyenifiyat1)*karihesapla;
                        var toplaminput=ustboyabaskikar.toFixed(2);
                        var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled>';

                        var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                        var toplaminput2=fiyathesaplaeur.toFixed(2);
                        var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                        var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                        var toplaminput3=fiyathesaplausd.toFixed(2);
                        var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                        window.kartoplaminput=window.kartoplaminput+toplaminput;
                        window.kartoplaminput2=window.kartoplaminput2+toplaminput2;
                        window.kartoplaminput3=window.kartoplaminput3+toplaminput3;
                        
                        $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.kartoplaminput);
                        $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.kartoplaminput2);
                        $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.kartoplaminput3);
                    } else {
                        console.log("burda else");
                        ustboyabaskikar=ustboyabaski;
                        var toplaminput=ustboyabaskikar.toFixed(2);
                        var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled>';

                        var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                        var toplaminput2=fiyathesaplaeur.toFixed(2);
                        var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                        var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                        var toplaminput3=fiyathesaplausd.toFixed(2);
                        var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                        window.kartoplaminput=window.kartoplaminput+toplaminput;
                        window.kartoplaminput2=window.kartoplaminput2+toplaminput2;
                        window.kartoplaminput3=window.kartoplaminput3+toplaminput3;

                        $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.kartoplaminput);
                        $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.kartoplaminput2);
                        $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.kartoplaminput3);
                    }


                    window.sayacimiz++;
                    sayac1++;
                } else {

                }
                boyainput++;
                //altboyadegistir2();
                //altboyahamhizmet();
                $(ths).parent().find("div").html(altbaskitoplam.toFixed(2));
                } 
            }
        });
    });
    

    //$('.boyamaliyetihepsi select').prop("disabled", false);
    //setTimeout(function(){ bolhesapla(); }, 4000);
}





function altboyadegistireach(){
    var indexsayi=3;
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    $('.boyamaliyetlerimiz').each(function(i2, objeach){
        window.altsayac3++;
        var alttabloindex=$(objeach).index();
        if(indexsayi==alttabloindex){
            var obj_ID=$(".boyamaliyetihepsi tr:eq("+alttabloindex+")").find("select");
            window.obj_ID=obj_ID;
            bitti3(boyamaliyetlerimizlength,obj_ID);
        }
        
        indexsayi++;
    });
}

var siradakisayac=2;
var islemdekisayac=-1;
function altboyadegistirsiradaki(){
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    if(siradakisayac!=islemdekisayac){
        islemdekisayac=siradakisayac;
        var obj_ID=$(".boyamaliyetihepsi tr:eq("+siradakisayac+")").find("select");
        console.log("boyamaliyetihepsi tr:eq("+siradakisayac+")");
        window.obj_ID=obj_ID;
        bitti3(boyamaliyetlerimizlength,obj_ID);
    }
}

var siraylacalistirsayac=0;
function siraylacalistir(){
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu",
        success:function(gelensorgu){

            altboyadegistireach();
            
            if(siraylacalistirsayac<boyamaliyetlerimizlength-1){
                siraylacalistirsayac++;
                siraylacalistir();
            } else {
                siraylacalistirsayac=0;
                var siradakisayac=2;
                var islemdekisayac=-1;
            }

        }
    });
}

/*
SENKRON BASİT ÖRNEK
var siraylacalistirsayac=0;
function siraylacalistir(){
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu",
        success:function(gelensorgu){
            if(siraylacalistirsayac<boyamaliyetlerimizlength-1){
                console.log("siraylacalistir if içine girdi");
                siraylacalistirsayac++;
                siraylacalistir();
            } else {
                siraylacalistirsayac=0;
            }

        }
    });
}
*/

/*
var siradakisayac=2;
var islemdekisayac=-1;
function altboyadegistirsiradaki2(){
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    setTimeout(function(){  
        var i;
        for (i = 0; i < boyamaliyetlerimizlength; i++) {
            if(siradakisayac!=islemdekisayac){
                islemdekisayac=siradakisayac;
                var obj_ID=$(".boyamaliyetihepsi tr:eq("+siradakisayac+")").find("select");
                console.log("boyamaliyetihepsi tr:eq("+siradakisayac+")");
                window.obj_ID=obj_ID;
                bitti3(boyamaliyetlerimizlength,obj_ID);
            }
        }
    }, 2000);
}
*/

function dovizver(sorgu){
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;

    var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var toplaminput=cekilenhamtl2;

    var fiyathesaplaeur = (toplaminput)  / manuelkureur;
    var toplaminput2=fiyathesaplaeur;

    var fiyathesaplausd = (toplaminput) / manuelkurusd;
    var toplaminput3=fiyathesaplausd;
    var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+toplaminput+'">';
    var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';
    var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

    $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(toplaminput);
    $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(toplaminput2);
    $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(toplaminput3);
}

function altboyadegistiryeni(ths){
    var boyabaski_ID = $(ths).val();
    var boyabaskiust_ID = $(ths).attr("class");
    var boyabaskiustfiyat = $('.'+boyabaskiust_ID).attr("id");
    var boyamaliyetlerimizlength=$('.tablealt .boyamaliyetlerimiz').length;
    var boyamaliyetlerimizlength2=$('.boyamaliyetihepsi tr').length;
    var boyamaliyetlerimizlengthorj=$('.boyamaliyetihepsi .boyamaliyetlerimiz').length;
    var alttabloindex=$(ths).parent().parent().index();
    var alttabloindex2=(alttabloindex-4);
    var alttabloindex3=(alttabloindex-3);
    

    $('.boyamaliyetfiyati .tlboyamaliyetimiz td input').remove();
    $('.boyamaliyetfiyati .usdboyamaliyetimiz td input').remove();
    $('.boyamaliyetfiyati .eurboyamaliyetimiz td input').remove();

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;

    var karmiktari=0;
    var karihesapla=0;
    $('.karoranlari').each(function(kar, objkar){
        var karmiktariobj=$(objkar).val();
        if(karmiktariobj!=''){
            karmiktari=parseFloat(karmiktariobj)+karmiktari;
        }
    });
    if(karmiktari!=0){
        var karihesapla=(karmiktari+100)/100;
    }
    if(karmiktari==''){
        var karihesapla=1;
    }
    console.log("karmiktari"+karmiktari);

    
    var option='';
    var input='';
    var ustboyabaski='';
    var hamhizmet=0;
    var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
    var cekilensonhamkumastl2=sy(cekilensonhamkumastl);
    if(cekilensonhamkumastl!=''){
        cekilenhamtl2=cekilensonhamkumastl2;
    }
    var iplikclass="boyamaliyetiinputt"+boyabaskiust_ID;
    $('.'+iplikclass+' .boyamaliyetiinput1').html(input);
    //$('.boyamaliyetihepsi select').prop("disabled", true);
    var boyainput=1;
    var sayac1=0;
    window.sayacimiz=0;
    window.yinput='';
    window.yinput2='';
    window.ytoplaminput='';
    window.ytoplaminput2='';
    window.ytoplaminput3='';
    window.kartoplaminput='';
    window.kartoplaminput2='';
    window.kartoplaminput3='';
    window.selectboyatdanahtar=0;
    var input='';
    var verisayi=0;
    $('.selectboyatd select').each(function(i, obj){
        var selectvalfiyat=$('.boyamaliyetihepsi tr:eq('+alttabloindex+') input[type=text]:eq('+verisayi+')').val();
        verisayi++;
        if(window.selectboyatdanahtar==0){
            siradakisayac++;
            window.selectboyatdanahtar=1;
        }
        var iplik_ID = $(obj).find("option:selected").val();

        var y_ustboyabaski=window.boyabaskiall[iplik_ID];
        var y_ustboyabaskifire=y_ustboyabaski["fire"];
        var y_ustboyabaskifire2=sy(y_ustboyabaskifire)+100;
        var y_ustboyabaskifire2=sy(y_ustboyabaskifire2)/100;
        var y_ustboyabaskifiyat=y_ustboyabaski["fiyat"];
        var y_ustboyabaskinesnedoviz=y_ustboyabaski["nesne_IDdoviz"];

        var y_altboyabaski=window.boyabaskiall[boyabaski_ID];
        var y_altboyabaskifire=y_altboyabaski["fire"];
        var y_altboyabaskifire2=sy(y_altboyabaskifire)+100;
        var y_altboyabaskifire2=sy(y_altboyabaskifire2)/100;
        var y_altboyabaskifiyat=y_altboyabaski["fiyat"];
        var y_altboyabaskinesnedoviz=y_altboyabaski["nesne_IDdoviz"];

        var y_ustfiyathesaplatl=y_ustboyabaskifiyat;


        if(y_ustboyabaskinesnedoviz=='75'){
            var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkurusd;
        }
        if(y_ustboyabaskinesnedoviz=='76'){
            var y_ustfiyathesaplatl=(y_ustboyabaskifiyat)*manuelkureur;
        }


        var y_altfiyathesaplatl=y_altboyabaskifiyat;


        if(y_altboyabaskinesnedoviz=='75'){
            var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkurusd;
        }
        if(y_altboyabaskinesnedoviz=='76'){
            var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkureur;
        }

        
        var usttengelenfiyat=0;
        if(cekilensonhamkumastl!=0){
            usttengelenfiyat=cekilensonhamkumastl;
        } else {
            usttengelenfiyat=fasonorgumaliyet;
        }

        if(alttabloindex3!=0){
            usttengelenfiyat=selectvalfiyat;
        }

        

        var y_ustbaskitoplam=sy(usttengelenfiyat)+y_ustfiyathesaplatl;
        var y_ustbaskitoplam2=sy(y_ustbaskitoplam)*y_ustboyabaskifire2;
       


        var y_altbaskitoplam=sy(y_altfiyathesaplatl)*y_altboyabaskifire2;

        var baskitoplam=(y_ustbaskitoplam2)+y_altfiyathesaplatl;
        var baskitoplam2=(baskitoplam)*y_altboyabaskifire2;

                if(window.selectboyatdanahtar==0){
                    siradakisayac++;
                    window.selectboyatdanahtar=1;
                }
                var ustbaskitoplam=y_ustbaskitoplam2;
                var altbaskitoplam=y_altbaskitoplam;
                boyamaliyetlerimizlength2=(boyamaliyetlerimizlength2-1);
                
                var ustboyabaski=baskitoplam2.toFixed(4);
                if(y_altfiyathesaplatl==0){
                    if(boyamaliyetlerimizlengthorj!=1){
                        var ustboyabaski=parseFloat(usttengelenfiyat);
                    }
                    else {
                        var ustboyabaski=parseFloat(ustbaskitoplam);
                    }
                }
                console.log("ustboyabaski1"+ustboyabaski);
                if(ustboyabaski==0||ustboyabaski==''||ustboyabaski==null||ustboyabaski==NaN){
                    ustboyabaski=parseFloat(usttengelenfiyat);
                }
                console.log("ustboyabaski2"+ustboyabaski);
                var input='<input type="text" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+ustboyabaski+'" autocomplete="off" class="boyamaliyethesapla boyainput'+boyainput+'" disabled><input type="hidden" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+ustboyabaski+'" autocomplete="off" class="boyamaliyethesapla">';
                window.yinput=window.yinput+input;

                var ustboyabaskikar=0;
                var toplameskiveyenifiyat1=0;
                var toplaminput='';
                var toplaminput2='';
                var toplaminput3='';
                console.log(karihesapla);
                if(karihesapla!=0){
                    console.log("if1");
                    ustboyabaskikar=sy(ustboyabaski)*karihesapla;
                    var toplaminput=ustboyabaskikar.toFixed(2);
                    var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+toplaminput+'">';
                    
                    var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                    var toplaminput2=fiyathesaplaeur.toFixed(2);
                    var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';
                    
                    var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                    var toplaminput3=fiyathesaplausd.toFixed(2);
                    var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                    window.ytoplaminput=window.ytoplaminput+toplaminput;
                    window.ytoplaminput2=window.ytoplaminput2+toplaminput2;
                    window.ytoplaminput3=window.ytoplaminput3+toplaminput3;
                } else {
                    console.log("else1");
                    ustboyabaskikar=ustboyabaski;
                    var toplaminput=ustboyabaskikar;
                    var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+toplaminput+'">';

                    var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                    var toplaminput2=fiyathesaplaeur;
                    var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                    var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                    var toplaminput3=fiyathesaplausd;
                    var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                    window.ytoplaminput=window.ytoplaminput+toplaminput;
                    window.ytoplaminput2=window.ytoplaminput2+toplaminput2;
                    window.ytoplaminput3=window.ytoplaminput3+toplaminput3;
                }
                
                if(alttabloindex==3){
                    
                    $('.'+iplikclass+' .boyamaliyetiinput1').html(window.yinput);
                        $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.ytoplaminput);
                        $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.ytoplaminput2);
                        $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.ytoplaminput3);
                    
                } else if(boyamaliyetlerimizlength>1){
                    var inputsec=$('.boyamaliyetlerimiz:eq('+alttabloindex2+') input[type=text]:eq('+sayac1+')').val();
                    var inputsec=sy(inputsec);
                    var ustboyabaski=sy(ustboyabaski);
                    var toplameskiveyenifiyat1=sy(inputsec+ustboyabaski);
                    var toplameskiveyenifiyat=toplameskiveyenifiyat1.toFixed(2);
                    var input='<input type="text" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+toplameskiveyenifiyat+'" autocomplete="off" class="boyamaliyethesapla boyainput'+boyainput+'" disabled><input type="hidden" name="kumaskarti[boyamaliyet]['+iplik_ID+']['+boyabaski_ID+']" value="'+toplameskiveyenifiyat+'" autocomplete="off" class="boyamaliyethesapla">';
                    window.yinput2=window.yinput2+input;
                    $('.'+iplikclass+' .boyamaliyetiinput1').html(window.yinput2);

                    var toplaminput='';
                    var toplaminput2='';
                    var toplaminput3='';
                    var ustboyabaskikar=0;
                    if(karihesapla!=0){
                        console.log("if2");
                        ustboyabaskikar=sy(toplameskiveyenifiyat1)*karihesapla;
                        var toplaminput=ustboyabaskikar.toFixed(2);
                        var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+toplaminput+'">';

                        var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                        var toplaminput2=fiyathesaplaeur.toFixed(2);
                        var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                        var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                        var toplaminput3=fiyathesaplausd.toFixed(2);
                        var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                        window.kartoplaminput=window.kartoplaminput+toplaminput;
                        window.kartoplaminput2=window.kartoplaminput2+toplaminput2;
                        window.kartoplaminput3=window.kartoplaminput3+toplaminput3;

                            $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.kartoplaminput);
                            $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.kartoplaminput2);
                            $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.kartoplaminput3);
                        
                        
                    } else {
                        console.log("else2");
                        ustboyabaskikar=ustboyabaski;
                        var toplaminput=ustboyabaskikar;
                        var toplaminput='<input type="text" value="'+toplaminput+'" autocomplete="off"disabled><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+toplaminput+'">';

                        var fiyathesaplaeur = (ustboyabaskikar)  / manuelkureur;
                        var toplaminput2=fiyathesaplaeur;
                        var toplaminput2='<input type="text" value="'+toplaminput2+'" autocomplete="off"disabled>';

                        var fiyathesaplausd = (ustboyabaskikar) / manuelkurusd;
                        var toplaminput3=fiyathesaplausd;
                        var toplaminput3='<input type="text" value="'+toplaminput3+'" autocomplete="off"disabled>';

                        window.kartoplaminput=window.kartoplaminput+toplaminput;
                        window.kartoplaminput2=window.kartoplaminput2+toplaminput2;
                        window.kartoplaminput3=window.kartoplaminput3+toplaminput3;

                            $('.boyamaliyetfiyati .tlboyamaliyetimiz td').html(window.kartoplaminput);
                            $('.boyamaliyetfiyati .usdboyamaliyetimiz td').html(window.kartoplaminput2);
                            $('.boyamaliyetfiyati .eurboyamaliyetimiz td').html(window.kartoplaminput3);

                        
                    }


                    window.sayacimiz++;
                    sayac1++;
                } else {

                }
                boyainput++;
                //altboyadegistir2();
                //altboyahamhizmet();
                $(ths).parent().find("div").html(altbaskitoplam.toFixed(2));

           
    });
    

    //$('.boyamaliyetihepsi select').prop("disabled", false);
    //setTimeout(function(){ bolhesapla(); }, 4000);
}

window.altsayac3=0;
function bitti3(sonsayac3,obj_ID){
    if(sonsayac3<=window.altsayac3){
            $('.boyamaliyetfiyati .tlboyamaliyetimiz td input').remove();
            $('.boyamaliyetfiyati .usdboyamaliyetimiz td input').remove();
            $('.boyamaliyetfiyati .eurboyamaliyetimiz td input').remove();
            altboyadegistiryeni(obj_ID);
    } else {
        siraylacalistir();
    }
}



function boyamaliyetihizmetyansiteach(){
    var indexsayi=0;
    var ekhizmetlength=$('.ekhizmetler .ekhizmetkumas').length;
    $('.ekhizmetkumas').each(function(i2, objeach){
        var alttabloindex=$(objeach).index();
        if(indexsayi==alttabloindex){
            var obj_ID=$(".ekhizmetkumas:eq("+(alttabloindex)+") tr:eq(1)").find("select");
            setTimeout(function(){ 
                boyamaliyetihizmetyansit2(obj_ID);
            }, 2000);
        }
        indexsayi++;
    });
}





function boyamaliyetihizmetyansit2(ths){
    var select_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilenhamkumastl='';
    var cekilenhamkumasindex=$(ths).parent().parent().parent().index();
    var cekilenhamkumaslength=$(ths).parent().parent().parent().parent().find("tbody").length;
    if(cekilenhamkumaslength>1){
        var cekilenhamkumastl=$(ths).parent().parent().parent().parent().find("tbody:eq("+(cekilenhamkumasindex-1)+") .tlekboyamaliyeti input").val();
    }
    if(cekilenhamkumasindex==0){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    if(cekilenhamkumastl==''||cekilenhamkumastl==null){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
    /*/
    console.log("*************");
    console.log("cekilenhamkumasindex => "+(cekilenhamkumasindex-1));
    console.log("cekilenhamkumaslength => "+cekilenhamkumaslength);
    console.log("cekilenhamkumastl => "+cekilenhamkumastl);
    console.log("cekilensonhamkumastl => "+cekilensonhamkumastl);
    console.log("------------");
    /*/

    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&boyabaskialt="+select_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenhamkumastl="+cekilenhamkumastl+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur,
        success:function(gelensorgu){

            var select_ID = $(ths).val();
            var cekilenhamtl=$('.tpfiyattl').html();
            var cekilenhamtl2=sy(cekilenhamtl);
            var fasonorgumaliyet=cekilenhamtl;
            var cekilenhamkumastl='';
            var cekilenhamkumasindex=$(ths).parent().parent().parent().index();
            var cekilenhamkumaslength=$(ths).parent().parent().parent().parent().find("tbody").length;
            if(cekilenhamkumaslength>1){
                var cekilenhamkumastl=$(ths).parent().parent().parent().parent().find("tbody:eq("+(cekilenhamkumasindex-1)+") .tlekboyamaliyeti input").val();
            }
            if(cekilenhamkumasindex==0){
                var cekilenhamkumastl=cekilenhamtl2;
            }
            if(cekilenhamkumastl==''||cekilenhamkumastl==null){
                var cekilenhamkumastl=cekilenhamtl2;
            }
            var manuelkurusd=$(".mkurusd input").val();
            var manuelkureur=$(".mkureur input").val();
            manuelkurusd=manuelkurusd.replace(",",".");
            manuelkureur=manuelkureur.replace(",",".");
            var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();
            console.log("*************");
            console.log("cekilenhamkumasindex => "+(cekilenhamkumasindex-1));
            console.log("cekilenhamkumaslength => "+cekilenhamkumaslength);
            console.log("cekilenhamkumastl => "+cekilenhamkumastl);
            console.log("cekilensonhamkumastl => "+cekilensonhamkumastl);
            console.log("------------");

            var boyabaskialtfiyat=gelensorgu.cevap.boyabaskialtfiyat;
            var boyabaskialtfiyat2=gelensorgu.cevap.boyabaskialtfiyat2;
            var boyabaskialtdoviz=gelensorgu.cevap.boyabaskialtdoviz;
            
            if(boyabaskialtfiyat!=null){
                $(ths).parent().parent().parent().find(".tlekboyamaliyeti input").val(boyabaskialtfiyat);
                $(ths).parent().parent().parent().find(".tlekhizmetbirim td").html(boyabaskialtfiyat2);
                $(ths).parent().parent().parent().find(".tlekhizmetdoviz td").html(boyabaskialtdoviz);

                var fiyathesaplaeur = (boyabaskialtfiyat)  / manuelkureur;
                var ornekinput2=fiyathesaplaeur.toFixed(2);
                $(ths).parent().parent().parent().find(".eurekboyamaliyeti td").html(ornekinput2);

                var fiyathesaplausd = (boyabaskialtfiyat) / manuelkurusd;
                var ornekinput3=fiyathesaplausd.toFixed(2);
                $(ths).parent().parent().parent().find(".usdekboyamaliyeti td").html(ornekinput3);


            } else{
                alert('Boya Baskı hizmetleri bulunamadı veya okumada bir sorun oluştu.');
            }
        }
    });
}




function boyamaliyetihizmetyansit(ths){
    var select_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilenhamkumastl='';
    var cekilenhamkumasindex=$(ths).parent().parent().parent().index();
    var cekilenhamkumaslength=$(ths).parent().parent().parent().parent().find("tbody").length;
    if(cekilenhamkumaslength>1){
        var cekilenhamkumastl=$(ths).parent().parent().parent().parent().find("tbody:eq("+(cekilenhamkumasindex-1)+") .tlekboyamaliyeti input").val();
    }
    if(cekilenhamkumasindex==0){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    if(cekilenhamkumastl==''||cekilenhamkumastl==null){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();

    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&boyabaskialt="+select_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenhamkumastl="+cekilenhamkumastl+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur,
        success:function(gelensorgu){
            var boyabaskialtfiyat=gelensorgu.cevap.boyabaskialtfiyat;
            var boyabaskialtfiyat2=gelensorgu.cevap.boyabaskialtfiyat2;
            var boyabaskialtdoviz=gelensorgu.cevap.boyabaskialtdoviz;
            
            if(boyabaskialtfiyat!=null){
                $(ths).parent().parent().parent().find(".tlekboyamaliyeti input").val(boyabaskialtfiyat);
                $(ths).parent().parent().parent().find(".tlekhizmetbirim td").html(boyabaskialtfiyat2);
                $(ths).parent().parent().parent().find(".tlekhizmetdoviz td").html(boyabaskialtdoviz);

                var fiyathesaplaeur = (boyabaskialtfiyat)  / manuelkureur;
                var ornekinput2=fiyathesaplaeur.toFixed(2);
                $(ths).parent().parent().parent().find(".eurekboyamaliyeti td").html(ornekinput2);

                var fiyathesaplausd = (boyabaskialtfiyat) / manuelkurusd;
                var ornekinput3=fiyathesaplausd.toFixed(2);
                $(ths).parent().parent().parent().find(".usdekboyamaliyeti td").html(ornekinput3);


                var i;
                for (i = cekilenhamkumasindex+1; i < cekilenhamkumaslength+1; i++) {
                    $('.ekhizmetler').find("tbody:eq("+(cekilenhamkumasindex+1)+")").remove();
                }

            } else{
                alert('Boya Baskı hizmetleri bulunamadı veya okumada bir sorun oluştu.');
            }
        }
    });
}

window.selectboyatdanahtar3=0;
function boyamaliyetihizmetyansityeni(ths){
    var select_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilenhamkumastl='';
    var sayihamkumas=$('.ekhizmetler tbody').length;
    
    var cekilenhamkumasindex=$(ths).parent().parent().parent().index();
    var cekilenhamkumaslength=$(ths).parent().parent().parent().parent().find("tbody").length;
    if(cekilenhamkumaslength>1){
        var cekilenhamkumastl=$(ths).parent().parent().parent().parent().find("tbody:eq("+(cekilenhamkumasindex-1)+") .tlekboyamaliyeti input").val();
    }
    if(cekilenhamkumasindex==0){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    if(cekilenhamkumastl==''||cekilenhamkumastl==null){
        var cekilenhamkumastl=cekilenhamtl2;
    }

        boyamaliyetihizmetyansityenieach2();

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();

    var y_altboyabaski=window.boyabaskiall[select_ID];
    var y_altboyabaskifire=y_altboyabaski["fire"];
    var y_altboyabaskifire2=sy(y_altboyabaskifire)+100;
    var y_altboyabaskifire2=sy(y_altboyabaskifire2)/100;
    var y_altboyabaskifiyat=y_altboyabaski["fiyat"];
    var y_altboyabaskinesnedoviz=y_altboyabaski["nesne_IDdoviz"];
    var y_altfiyathesaplatl=y_altboyabaskifiyat;
    var dovizadi='TRY';

    if(y_altboyabaskinesnedoviz=='75'){
        var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkurusd;
        var dovizadi='USD';
    }
    if(y_altboyabaskinesnedoviz=='76'){
        var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkureur;
        var dovizadi='EUR';
    }

    var usttengelenfiyat=0;
    usttengelenfiyat=cekilenhamkumastl;
    
    usttengelenfiyat=sy(usttengelenfiyat);
    y_altfiyathesaplatl=sy(y_altfiyathesaplatl);
    var y_altbaskitoplam=sy(usttengelenfiyat+y_altfiyathesaplatl);
    var y_altbaskitoplam2=sy(y_altbaskitoplam)*y_altboyabaskifire2;
    var y_altbaskitoplambirim=sy(y_altbaskitoplam2)-usttengelenfiyat;
    var y_altbaskitoplambirim=sy(y_altbaskitoplam2)-usttengelenfiyat;
    var y_altbaskitoplambirim=y_altbaskitoplambirim.toFixed(4);

    if(window.selectboyatdanahtar3==0){
        siradakisayac3++;
        window.selectboyatdanahtar3=1;
    }

    
    var boyabaskialtfiyat=y_altbaskitoplam2;
    var boyabaskialtfiyat2=y_altbaskitoplambirim;
    var boyabaskialtdoviz=dovizadi;
    
    if(boyabaskialtfiyat!=null){
        $(ths).parent().parent().parent().find(".tlekboyamaliyeti input").val(boyabaskialtfiyat);
        $(ths).parent().parent().parent().find(".tlekhizmetbirim td").html(boyabaskialtfiyat2);
        $(ths).parent().parent().parent().find(".tlekhizmetdoviz td").html(boyabaskialtdoviz);

        var fiyathesaplaeur = (boyabaskialtfiyat)  / manuelkureur;
        var ornekinput2=fiyathesaplaeur.toFixed(2);
        $(ths).parent().parent().parent().find(".eurekboyamaliyeti td").html(ornekinput2);

        var fiyathesaplausd = (boyabaskialtfiyat) / manuelkurusd;
        var ornekinput3=fiyathesaplausd.toFixed(2);
        $(ths).parent().parent().parent().find(".usdekboyamaliyeti td").html(ornekinput3);

    } 
}

function boyamaliyetihizmetyansityeni2(ths){
    var select_ID = $(ths).val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var cekilenhamtl2=sy(cekilenhamtl);
    var fasonorgumaliyet=cekilenhamtl;
    var cekilenhamkumastl='';
    var sayihamkumas=$('.selectboyatd select').length;
    
    var cekilenhamkumasindex=$(ths).parent().parent().parent().index();
    var cekilenhamkumaslength=$(ths).parent().parent().parent().parent().find("tbody").length;
    if(cekilenhamkumaslength>1){
        var cekilenhamkumastl=$(ths).parent().parent().parent().parent().find("tbody:eq("+(cekilenhamkumasindex-1)+") .tlekboyamaliyeti input").val();
    }
    if(cekilenhamkumasindex==0){
        var cekilenhamkumastl=cekilenhamtl2;
    }
    if(cekilenhamkumastl==''||cekilenhamkumastl==null){
        var cekilenhamkumastl=cekilenhamtl2;
    }

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var cekilensonhamkumastl=$('.ekhizmetler').find("tbody:last-child .tlekboyamaliyeti input").val();

    var y_altboyabaski=window.boyabaskiall[select_ID];
    var y_altboyabaskifire=y_altboyabaski["fire"];
    var y_altboyabaskifire2=sy(y_altboyabaskifire)+100;
    var y_altboyabaskifire2=sy(y_altboyabaskifire2)/100;
    var y_altboyabaskifiyat=y_altboyabaski["fiyat"];
    var y_altboyabaskinesnedoviz=y_altboyabaski["nesne_IDdoviz"];
    var y_altfiyathesaplatl=y_altboyabaskifiyat;
    var dovizadi='TRY';

    if(y_altboyabaskinesnedoviz=='75'){
        var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkurusd;
        var dovizadi='USD';
    }
    if(y_altboyabaskinesnedoviz=='76'){
        var y_altfiyathesaplatl=(y_altboyabaskifiyat)*manuelkureur;
        var dovizadi='EUR';
    }

    var usttengelenfiyat=0;
    usttengelenfiyat=cekilenhamkumastl;
    if(y_altbaskitoplam==''||y_altbaskitoplam==0||y_altbaskitoplam==undefined||y_altbaskitoplam==null){
        y_altbaskitoplam=cekilenhamkumastl;
        $(ths).parent().parent().parent().find(".tlekboyamaliyeti input").val(cekilenhamkumastl);
    }
    console.log(y_altbaskitoplam+"yaltbaskitoplam");
    usttengelenfiyat=sy(usttengelenfiyat);
    y_altfiyathesaplatl=sy(y_altfiyathesaplatl);
    var y_altbaskitoplam=sy(usttengelenfiyat+y_altfiyathesaplatl);
    var y_altbaskitoplam2=sy(y_altbaskitoplam)*y_altboyabaskifire2;
    var y_altbaskitoplambirim=sy(y_altbaskitoplam2)-usttengelenfiyat;
    var y_altbaskitoplambirim=sy(y_altbaskitoplam2)-usttengelenfiyat;
    var y_altbaskitoplambirim=y_altbaskitoplambirim.toFixed(4);
    console.log(usttengelenfiyat+"usttengelenfiyat");
    console.log(y_altfiyathesaplatl+"y_altfiyathesaplatl");
    console.log(y_altbaskitoplam+"y_altbaskitoplam");
    console.log(y_altbaskitoplam2+"y_altbaskitoplam2");

    if(window.selectboyatdanahtar3==0){
        siradakisayac3++;
        window.selectboyatdanahtar3=1;
    }

    
    var boyabaskialtfiyat=y_altbaskitoplam2;
    var boyabaskialtfiyat2=y_altbaskitoplambirim;
    var boyabaskialtdoviz=dovizadi;
    console.log(y_altbaskitoplam2+"y_altbaskitoplam2");
    
    if(boyabaskialtfiyat!=null){
        $(ths).parent().parent().parent().find(".tlekboyamaliyeti input").val(boyabaskialtfiyat);
        $(ths).parent().parent().parent().find(".tlekhizmetbirim td").html(boyabaskialtfiyat2);
        $(ths).parent().parent().parent().find(".tlekhizmetdoviz td").html(boyabaskialtdoviz);

        var fiyathesaplaeur = (boyabaskialtfiyat)  / manuelkureur;
        var ornekinput2=fiyathesaplaeur.toFixed(2);
        $(ths).parent().parent().parent().find(".eurekboyamaliyeti td").html(ornekinput2);

        var fiyathesaplausd = (boyabaskialtfiyat) / manuelkurusd;
        var ornekinput3=fiyathesaplausd.toFixed(2);
        $(ths).parent().parent().parent().find(".usdekboyamaliyeti td").html(ornekinput3);

    } 
}


function boyamaliyetihizmetyansityenieach(){
    var indexsayi3=0;
    var ekhizmetlerlength=$('.ekhizmetler tbody').length;
    $('.ekhizmetler tbody').each(function(i2, objeach){
        var alttabloindex=$(objeach).index();
        if(indexsayi3==alttabloindex){
            var obj_ID=$(".ekhizmetler tbody:eq("+alttabloindex+")").find("select");
            window.obj_ID=obj_ID;
            boyamaliyetihizmetyansityeni(obj_ID)
        }
        indexsayi3++;
    });
}

function boyamaliyetihizmetyansityenieach2(){
    var indexsayi3=0;
    var ekhizmetlerlength=$('.ekhizmetler tbody').length;
    $('.ekhizmetler tbody').each(function(i2, objeach){
        var alttabloindex=$(objeach).index();
        if(indexsayi3==alttabloindex){
            var obj_ID=$(".ekhizmetler tbody:eq("+alttabloindex+")").find("select");
            window.obj_ID=obj_ID;
            boyamaliyetihizmetyansityeni2(obj_ID)
        }
        indexsayi3++;
    });
    siraylacalistir2();

}

var siradakisayac3=2;
var islemdekisayac3=-1;
var siraylacalistirsayac3=0;
function siraylacalistir3(){
    var ekhizmetlerlength=$('.ekhizmetler tbody').length;
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu",
        success:function(gelensorgu){

            boyamaliyetihizmetyansityenieach();
            
            if(siraylacalistirsayac3<ekhizmetlerlength){
                siraylacalistirsayac3++;
                siraylacalistir3();
            } else {
                siraylacalistirsayac3=0;
                var siradakisayac3=2;
                var islemdekisayac3=-1;
            }

        }
    });
}

function altboyahamhizmet(ths){
    /*
    var option='';
    var input='';
    var ustboyabaski='';
    var hamhizmet=0;

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;

    $('.boyamaliyetlerimiz').each(function(i2, obj2){
    var boyabaski_ID = $(obj2).find("select option:selected").val();
    var boyatext = $(obj2).find("select option:selected").text();
    var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var fasonorgumaliyet=cekilenhamtl;
    var selectboyatdlength=$('.selectboyatd select').length;
    
    var hamhizmet=0;
    window.hamhizmet=0;
    $('.selectboyatd select').each(function(i, obj){
        var iplik_ID = $(obj).find("option:selected").val();
        var input='';
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&ustboyabaski="+iplik_ID+"&altboyabaski="+boyabaski_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenfasonorgu"+cekilenhamfasonorgumaliyeti,
            success:function(gelensorgu){
                var hamhizmet=gelensorgu.cevap.hamhizmet;
                window.hamhizmet=window.hamhizmet+hamhizmet;
                var sanalveri='<input type="text" value="'+window.hamhizmet.toFixed(2)+'" autocomplete="off" name="ekhizmet" disabled="disabled">';
                //$('.tlekboyamaliyeti td').html(sanalveri);
            
                var fiyathesaplaeur = (window.hamhizmet)  / manuelkureur;
                var ornekinput2='<input type="text" value="'+fiyathesaplaeur.toFixed(2)+'" autocomplete="off" name="ekhizmet" disabled="disabled">';
                //$('.eurekboyamaliyeti td').html(ornekinput2);

                var fiyathesaplausd = (window.hamhizmet) / manuelkurusd;
                var ornekinput3='<input type="text" value="'+fiyathesaplausd.toFixed(2)+'" autocomplete="off" name="ekhizmet" disabled="disabled">';
                //$('.usdekboyamaliyeti td').html(ornekinput3);

                window.altsayac2++;
                //bitti2(selectboyatdlength,hamhizmet);
            }
        });
    });
    
    });
    */
}



function altboyadegistir2(ths){
    var option='';
    var input='';
    var ustboyabaski='';
    $('.altboyabaskilar').remove();

    $('.boyamaliyetlerimiz').each(function(i2, obj2){
    window.altsayac=0;
    var boyabaski_ID = $(obj2).find("select option:selected").val();
    var boyatext = $(obj2).find("select option:selected").text();
    var cekilenhamfasonorgumaliyeti=$('.fasonorgumaliyeti').val();
    var cekilenhamtl=$('.tpfiyattl').html();
    var fasonorgumaliyet=cekilenhamtl;
    window.altbaskitext='';
    $('.boyamaliyetihepsi select').prop("disabled", true);

    var selectboyatdlength=$('.selectboyatd select').length;
    
    $('.selectboyatd select').each(function(i, obj){
        var iplik_ID = $(obj).find("option:selected").val();
        var input='';
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&ustboyabaski="+iplik_ID+"&altboyabaski="+boyabaski_ID+"&fasonorgumaliyet="+fasonorgumaliyet+"&cekilenfasonorgu"+cekilenhamfasonorgumaliyeti,
            success:function(gelensorgu){
                var altbaskitoplam=gelensorgu.cevap.altbaskitoplam;
                var altbaskitoplam = altbaskitoplam.toFixed(2);
                /*
                if(altbaskitoplam!=null){
                    window.altbaskitex='<div style="text:align:left;>'+altbaskitoplam+'</div>';
                }*/
                window.altsayac++;
                //bitti(selectboyatdlength,boyabaski_ID,boyatext);
                $('.altboyabaski'+boyabaski_ID).remove();
                //var sanalalt='<tr class="altboyabaskilar altboyabaski'+boyabaski_ID+'"><th colspan="2">'+boyatext+'</th><td class="altboyabaskitext">'+window.altbaskitext+'</td></tr>';
                var sanalalt='<tr class="altboyabaskilar altboyabaski'+boyabaski_ID+'"><th colspan="2">'+boyatext+'</th><td class="altboyabaskitext">'+altbaskitoplam+'</td></tr>';
                $(".mamulboyamaliyeti").before(sanalalt);
            }
        });
    });



    
   

    $('.boyamaliyetihepsi select').prop("disabled", false);
    setTimeout(function(){ bolhesapla(); }, 4000);
    
    
    });
}

function manuelkuroran(ths){
    var usdyicek = $(".mkurusd input").val();
    var euryicek = $(".mkureur input").val();
    usdyicek=usdyicek.replace(",",".");
    euryicek=euryicek.replace(",",".");
    var eurusdoran=0;
    eurusdoran=(euryicek)/usdyicek;
    eurusdoran=sy(eurusdoran,4);
    $(".mkuroran").html(eurusdoran);
}


<?php if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>
    $(document).ready(function(){
        setTimeout(function(){ manuelkuroran(); }, 1000);
        setTimeout(function(){ bolhesapla(); }, 4000);
        setTimeout(function(){ altboyahamhizmet(); }, 6000);
        setTimeout(function(){ siraylacalistir(); }, 4500);
    });
<?php } ?>


function boyadegisimi(ths){
    var boya_ID = $(ths).val();
    var namehazirla="kumaskarti[boyamaliyet]["+boya_ID+"][]";
    var selectclass = $(ths).parent().attr("class");
    var trclass = $(ths).parent().parent().attr("class");
    var degisenselect=selectclass.replace("select", "input");
    var degisentr=trclass.replace("select", "input");
    $('.'+degisentr+' .'+degisenselect+' input').attr("name",namehazirla);
}


function bolhesapla(ths){
    /*/
    $('.tlboyamaliyeti td').html('&nbsp;');
    $('.eurboyamaliyeti td').html('&nbsp;');
    $('.usdboyamaliyeti td').html('&nbsp;');
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    manuelkurusd=manuelkurusd.replace(",",".");
    manuelkureur=manuelkureur.replace(",",".");
    var degertd=1;


        var i;
        for (i = 0; i < 14; i++) {
            var iplikfiyat=0;
            $('.boyainput'+i).each(function(i, obj){
                var iplikfiyatcek=sy($(obj).val());
                iplikfiyat=sy(iplikfiyat+iplikfiyatcek);
            });
            if(iplikfiyat!=0){
                var ornekinput='<input type="text" value="'+iplikfiyat.toFixed(2)+'" autocomplete="off" name="kumasci" disabled="disabled">';
                $('.tlboyamaliyeti td').append(ornekinput);
            
                var fiyathesaplaeur = (iplikfiyat)  / manuelkureur;
                var ornekinput2='<input type="text" value="'+fiyathesaplaeur.toFixed(2)+'" autocomplete="off" name="kumasci" disabled="disabled">';
                $('.eurboyamaliyeti td').append(ornekinput2);

                var fiyathesaplausd = (iplikfiyat) / manuelkurusd;
                var ornekinput3='<input type="text" value="'+fiyathesaplausd.toFixed(2)+'" autocomplete="off" name="kumasci" disabled="disabled">';
                $('.usdboyamaliyeti td').append(ornekinput3);
            }
        }

        /*/

}


</script>



<?php 
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
?>
<tr><th>Kumaş Kodu</th><td><input type="text" name="<?php echo $tbl?>[kodu]" value="<?php echo !empty($_X['kodu'])?$_X['kodu']:''?>" autocomplete="off" class="1kumaskodu form-control"></td></tr>
<tr><th>Kumaş İsmi</th><td><input type="text" name="<?php echo $tbl?>[ismi]" value="<?php echo !empty($_X['ismi'])?$_X['ismi']:''?>" autocomplete="off" class="1kumasismi form-control"></td></tr>
<input type="hidden" name="<?php echo $tbl?>[nesne_IDkumasTipi]" value="176">
<tr>
    <th>Article</th>
    <td>
    <input type="text" name="<?php echo $tbl?>[article]" value="<?php echo !empty($_X['article'])?$_X['article']:''?>" autocomplete="off" class="articlemiz form-control">
    </td>
</tr>
<?php $tedarikcibul=z(1,"WHERE arsiv='0' AND nesne_IDcariTipi='179'",'','cari'); ?>
<tr>
    <th>Tedarikci</th>
    <td>
    <select name="<?php echo $tbl?>[tedarikci_ID]" class="form-control">
    <option value="0">Seçiniz</option>
    <?php if(!empty($tedarikcibul)){ foreach ($tedarikcibul as $tdr => $tdrk) { ?>
        <option value="<?php echo $tdrk['ID']; ?>" <?php if(!empty($_X['tedarikci_ID'])&&$_X['tedarikci_ID']==$tdrk['ID']){ echo 'selected'; } ?> ><?php echo (!empty($tdrk['ad'])?$tdrk['ad'].' ':'').(!empty($tdrk['soyad'])?$tdrk['soyad'].' ':''); ?></option>
    <?php } } ?>
    </select>
    </td>
</tr>
<?php
$metinhazirla='';
$iplikkartlarimetin="";
$iplikkartlarimetin2="";
$kompozisyonarray=array();
if(!empty($_X['iplikkartlari'])){
    $_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
	$iplikkartlaricek=$_X['iplikkartlari'];
	$iplikkartlariarray=(!empty($_X['iplikkartlari'])?json_decode($_X['iplikkartlari'],1):'');
	if(!empty($iplikkartlariarray)){
		$iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
	}
	if(!empty($iplikkartlariarray)){
		foreach($iplikkartlariarray as $i => $elyf){
			$iplikokuma=z(1,$i,'','iplik');
			$iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
			$uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
			$boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
			$elyafTipi=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
			$iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
			$elyafmetin="";
			if(!empty($iplikokuma['elyaf'])){
				$elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
				if(!empty($elyafarray)){
					$elyafarray=str_replace('puan','',$elyafarray);
				}
				if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
					$elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
					$elyfbhesapla=($elyfb/100)*$elyf;
					$elyfbhesapla=number_format($elyfbhesapla);
					$elyafmetin.='%'.$elyfbhesapla.' '.$elyafnesne.' ';
					if(!empty($kompozisyonarray[$elyafnesne])){
						$eskihesaplama=$kompozisyonarray[$elyafnesne];
						$yenihesaplama=($eskihesaplama+$elyfbhesapla);
						$kompozisyonarray[$elyafnesne]=$yenihesaplama;
					} else {
						$kompozisyonarray[$elyafnesne]=$elyfbhesapla;
					}
				} }
			}
			
			$elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
			$iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
			//$iplikkartlarimetin2.=$iplikkart.' <br> ';
			$iplikkartlarimetin2.=$elyafmetin.' <br> ';
		} 
	}  
}
$kompmetin='';
if(!empty($kompozisyonarray)){
	foreach ($kompozisyonarray as $karray => $kompozisyon2) {
		$kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
	}
}
?>
<?php /*/ ?>
<tr>
    <th><b>Kumaş Üretim Tipi:</b></th>
    <td class="kumasuretimtipi" colspan="2">
        <?php if(!empty($_NSN5))foreach($_NSN5 as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
        <?php }?>
    </td>
</tr>
<?php /*/ ?>
<tr>
    <th>Makina Çeşidi</th>
    <td>
    <?php echo select(Array('name'=>$tbl.'[makinacesitleri_ID]','detay'=>' class="select2 select-search" id="makinacesidi" ','t'=>'makinacesitleri','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['makinacesitleri_ID'])?$_X['makinacesitleri_ID']:0)); ?>
    </td>
</tr>
<tr>
    <th>Kumaş Türü</th>
    <td>
    <?php
    $sorgukumas="WHERE arsiv='0'";
    if(!empty($_X['makinacesitleri_ID'])){
        $sorgukumas="WHERE arsiv='0' AND makinacesitleri_ID='".$_X['makinacesitleri_ID']."'";
    }
    $kumasturlerinicek=z(1,$sorgukumas,'','kumasturu');
    ?>
    <select name="<?php echo $tbl; ?>[kumasturu_ID]" id="kumasturu" class="select2 select-search">
    <option value="0">Seçiniz</option>
    <?php if(!empty($kumasturlerinicek)){ foreach($kumasturlerinicek as $kturcek){ ?>
        <?php $kumasveritopla=(!empty($kturcek['ad'])?$kturcek['ad']:' '); ?>
        <?php
        if(!empty($kturcek['makinacesitleri_ID'])){
            $kumasadi=(!empty($kturcek['ad'])?$kturcek['ad']:' ');
            $kumaspusvefayn=(!empty($kturcek['pusvefayn'])?$kturcek['pusvefayn']:' ');
            $makinecesitlerinioku=z(1,$kturcek['makinacesitleri_ID'],'','makinacesitleri');
            $makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
            $makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
            $makinesayi=count($makinepus);
            $pusmakine='';
            if(!empty($kumaspusvefayn)){
                $pusmakine=$makinepus[$kumaspusvefayn][0];
            }
            $faynmakine='';
            if(!empty($kumaspusvefayn)){
                $faynmakine=$makinefayn[$kumaspusvefayn][0];
            }
            //$kumasveritopla = $kumasadi.' '.$pusmakine.' / '.$faynmakine;
            $kumasveritopla = $kumasadi;
        }
        ?>
        <option value="<?php echo $kturcek['ID']; ?>" <?php if(!empty($_X['kumasturu_ID'])&&$_X['kumasturu_ID']==$kturcek['ID']){ echo 'selected'; } ?>><?php echo (!empty($kumasveritopla)?$kumasveritopla:''); ?></option>
    <?php } } ?>
    </select> 
    </td>
</tr>
<?php
$pusvefaynmetni='';
$pusvefaynmetni2='';
$kumaspusvefayn=0;
$pusvefaynjson=array();
if(z(8,'a')=='duzenletedarik'||!empty($farkli)){
    if($_X['kumasturu_ID']){
        $kumasturu2=z(1,$_X['kumasturu_ID'],'','kumasturu');
        $kumaspusvefayn=(!empty($_X['pusvefayn'])?$_X['pusvefayn']:0);
    }
    if($_X['makinacesitleri_ID']){
        $makinecesitlerinioku=z(1,$_X['makinacesitleri_ID'],'','makinacesitleri');
        $makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
        $makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
        $makinesayi=count($makinepus);
        $makinedegeriarray=(!empty($makinecesitlerinioku['makineyetenegi'])?json_decode($makinecesitlerinioku['makineyetenegi'],1):'');
        $makineislevi=(!empty($kumasturu2['nesne_IDmakineYetenegi'])?$kumasturu2['nesne_IDmakineYetenegi']:'');
        $makinedonguid='';
        
        $makinedegerleri=array();
        $makinedegerleri2=array();
        if(!empty($makinedegeriarray)){
            foreach ($makinedegeriarray as $mkd => $makinedegeri) {
                $nesneoku=z(1,$makinedegeri,'','nesne');
                $nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
                $nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$mkd);
                $makinedegerleri[$nesnemetinid]=$nesnemetin1;
                if(!empty($makineislevi)){
                    if($makineislevi==$nesnemetinid){
                        $makinedonguid=$mkd;
                    }
                }
            }
        }

        if(!empty($makinedonguid)){
            $makinedongupus=$makinepus[$makinedonguid];
            $makinedongufayn=$makinefayn[$makinedonguid];
        }

        $pusvefaynmetni2='';
        $pusvefaynsayi=0;
        if(!empty($kumaspusvefayn)){
            $kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
        }
        if(!empty($kumaspusvefayn)){
            foreach($kumaspusvefayn as $pf => $pfarray){
                $pusvefaynsayi=$pfarray;
                if(!empty($makinedongupus[$pf])){
                    $pusvefaynmetni2=' Pus: '.$makinedongupus[$pf];
                }
                if(!empty($makinedongufayn[$pf])){
                    $pusvefaynmetni2.=' Fayn: '.$makinedongufayn[$pf];

                }
                $pusvefayncheck=(!empty($pfarray[0])?$pfarray[0]:'');
                $pusvefayndeger=(!empty($pfarray[1])?$pfarray[1]:$pfarray[0]);
               
                $pusvefaynjson[$pf]['pusvefayn']=$pusvefaynmetni2;
                $pusvefaynjson[$pf]['deger']=$pusvefayndeger;
                $pusvefaynjson[$pf]['check']=$pusvefayncheck;
            }
        }

    }
}
?>
<?php 
$kumasturufasonmaliyet='';
$kumasturunesnedoviz='';
if(!empty($_X['kumasturu_ID'])){
    $kumasturucekmek=z(1,$_X['kumasturu_ID'],'ID,nesne_IDdoviz,fasonmaliyet','kumasturu');
    $_Nesnedoviz=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
    $kumasturufasonmaliyet=(!empty($kumasturucekmek['fasonmaliyet'])?$kumasturucekmek['fasonmaliyet']:'');
    $kumasturunesnedoviz=(!empty($kumasturucekmek['nesne_IDdoviz'])?$kumasturucekmek['nesne_IDdoviz']:'');
    $kumasturunesnedoviz=(!empty($_Nesnedoviz[$kumasturunesnedoviz]['metin1'])?$_Nesnedoviz[$kumasturunesnedoviz]['metin1']:'&nbsp;');
}
?>
<tr>
    <th>Kumaş Fiyatı</th>
    <td>
        <input type="text" name="<?php echo $tbl?>[kumasfiyat]" class="kumasfiyati form-control" value="<?php echo (!empty($_X['kumasfiyat'])?$_X['kumasfiyat']:''); ?>" autocomplete="off" onkeyup="fiyatyansit(this)" style="width: auto; float: left;">
        <div class="mkurdovizcinsi" style="display:inline-flex; width: auto; float: left;">
            <?php if(!empty($_NSN2))foreach($_NSN2 as $ad=>$n){?><?php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.' dovizdegistir form-control" onchange="fiyatyansit(this)" ','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?>
            <?php }?>
        </div>
        <select name="<?php echo $tbl; ?>[birimTipi]" class="birimtipi form-control" style="width: auto; float: left;">
            <option value="0">Birim Seçiniz</option>
            <option value="1" <?php echo (!empty($_X['birimTipi'])&&$_X['birimTipi']=='1'?'selected':''); ?>>kg</option>
            <option value="2" <?php echo (!empty($_X['birimTipi'])&&$_X['birimTipi']=='2'?'selected':''); ?>>m</option>
        </select>
        <select name="<?php echo $tbl; ?>[hamTipi]" class="hamtipi form-control" style="width: auto; float: left;">
            <option value="0">Durum Seçiniz</option>
            <option value="1" <?php echo (!empty($_X['hamTipi'])&&$_X['hamTipi']=='1'?'selected':''); ?>>Ham</option>
            <option value="2" <?php echo (!empty($_X['hamTipi'])&&$_X['hamTipi']=='2'?'selected':''); ?>>Hazır</option>
        </select>
    </td>
</tr>
<tr>
    <th>Kumaş Eni</th>
    <td>
        <input type="text" name="<?php echo $tbl?>[kumasen]" class="kumaseni form-control" value="<?php echo !empty($_X['kumasen'])?$_X['kumasen']:''?>" autocomplete="off"><span>cm</span>
    </td>
</tr>
<tr><th>Gr/m</th><td>
<input type="text" name="<?php echo $tbl?>[grm]" class="form-control" value="<?php echo !empty($_X['grm'])?$_X['grm']:''?>" autocomplete="off" placeholder="Gr/m">
<input type="text" name="<?php echo $tbl?>[telsayisi]" value="<?php echo !empty($_X['telsayisi'])?$_X['telsayisi']:''?>" class="telsayisi form-control" autocomplete="off" placeholder="Tel Sayısı">
</td></tr>
<tr>
    <th>İlave Not</th><td>
    <textarea name="<?php echo $tbl?>[ilavenot]" class="form-control" cols="40" rows="4" style=""><?php echo !empty($_X['ilavenot'])?$_X['ilavenot']:''?></textarea>
</tr>
</tbody>
</table>
</div>


<?php
$_Nesneelyf=z(37,z(1,"WHERE ad='' OR ad='elyafTipi'",'ID,ad,metin1,metin2','nesne'));
?>
<div class="blok tabloelyafdiv">
<table cellpadding="0" cellspacing="0" class="tableelyaf table table-hover">
<tbody class="elyaforanlarii">
<tr><th colspan="1">Silme</th><th colspan="6">Elyaf Oranlarını arttır 
<a href="#secililerisil" class="secilielyaforani btn btn-danger"><i class="icon-minus3 icon-1x"></i></a>
&nbsp;<a href="#elyaforancogalt" class="elyaforanarttir btn btn-success"><b style="font-size:14px; color:white;"> <i class="icon-plus3 icon-1x"></i> </b></a>
</th></tr>
<?php if(z(8,'a')=='ekletedarik'&&empty($farkli)){ ?>  
<tr class="elyaforanlarimiz elyaforanlari1">
<th colspan="1"><input type="checkbox" class="silinecekelyaforani form-control"></th>
   <th colspan="2">
   <div>
        <select onchange="elyaforandegistir(this)" class="form-control">
            <option value="0">Seçiniz</option>
            <?php if(!empty($_Nesneelyf)){ foreach($_Nesneelyf as $elyf){ ?>
                <option value="<?php echo $elyf['ID']; ?>"><?php echo (!empty($elyf['metin1'])?$elyf['metin1']:0); ?></option>
            <?php } } ?>
        </select>
        <a href="#elyaforansil" class="elyaforansil" onclick="elyaforansilme(this)">Sil</a>
    </div>
   </th>
   <td>
    <input type="text" class="elyaforanlari form-control" onkeyup="elyaforandegistir()" name="<?php echo $tbl; ?>[elyaforanlari][0]">
   </td>
</tr>
<?php } ?>
<?php if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>
<?php
$elyaforanlaricek=$_X['elyaforanlari'];
$elyaforanlariarray=(!empty($_X['elyaforanlari'])?json_decode($_X['elyaforanlari'],1):'');
$karsayi=0;
if(!empty($elyaforanlariarray)){ foreach($elyaforanlariarray as $ikar => $elyaforanlari){ $karsayi++; 
?>
<tr class="elyaforanlarimiz elyaforanlari<?php echo $karsayi; ?>">
<th colspan="1"><input type="checkbox" class="silinecekelyaforani form-control"></th>
   <th colspan="2">
   <div>
    <select onchange="elyaforandegistir(this)" class="form-control">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesneelyf)){ foreach($_Nesneelyf as $elyf){ ?>
            <option value="<?php echo $elyf['ID']; ?>" <?php if($elyf['ID']==$ikar){ echo 'selected'; } ?> ><?php echo (!empty($elyf['metin1'])?$elyf['metin1']:0); ?></option>
        <?php } } ?>
    </select>
    <a href="#elyaforansil" class="elyaforansil" onclick="elyaforansilme(this)">Sil</a>
    </div>
   </th>
   <td>
    <input type="text" class="elyaforanlari form-control" onkeyup="elyaforandegistir()" name="<?php echo $tbl; ?>[elyaforanlari][<?php echo $ikar; ?>]" value="<?php echo $elyaforanlari; ?>">
   </td>
</tr>
<?php } } else { ?>
<tr class="elyaforanlarimiz elyaforanlari1">
<th colspan="1"><input type="checkbox" class="silinecekelyaforani form-control"></th>
<th colspan="2">
    <div>
        <select onchange="elyaforandegistir(this)" class="form-control">
            <option value="0">Seçiniz</option>
            <?php if(!empty($_Nesneelyf)){ foreach($_Nesneelyf as $elyf){ ?>
                <option value="<?php echo $elyf['ID']; ?>"><?php echo (!empty($elyf['metin1'])?$elyf['metin1']:0); ?></option>
            <?php } } ?>
        </select>
        <a href="#elyaforansil" class="elyaforansil" onclick="elyaforansilme(this)">Sil</a>
    </div>
</th>
<td>
    <input type="text" class="elyaforanlari form-control" onkeyup="elyaforandegistir()" name="<?php echo $tbl; ?>[elyaforanlari][0]">
</td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
</div>




<div class="blok" style="border: 2px solid #95989e;">
<table cellpadding="0" cellspacing="0" style="background: #eeeeee;" class="table table-hover">
<tbody>
<?php if(z(8,'a')=='ekletedarik'){ ?>
    <tr>
        <th>Resim</th>
        <td style="width:auto;">
        <input type="file" class="form-control" name="<?php echo $tbl; ?>[img][]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;" multiple="multiple">
        <?php $galericek=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$idmiz),'ID,img','galeri'); ?>
        <?php if($galericek){
        //$imgarray=(!empty($_X['img'])?json_decode($_X['img'],1):'');
        foreach ($galericek as $gl => $galeri) {
        ?>
        <div style="float:left;">
            <img data-fancybox="gallery1" href="upload/kumaskarti/<?php echo $galeri['img']; ?>" src="upload/kumaskarti/<?php echo $galeri['img']; ?>" style="width:100px; height:100px; padding:5px; cursor:pointer;">
            <span class="spanisim"><?php echo $galeri['img']; ?></span>
            <a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a>
            <input type="hidden" name="neonemivar" value="<?php echo $galeri['ID']; ?>">
        </div>
        <?php } } ?>
        <br>
        <b>Ek açıklama</b>
        <input type="text" class="form-control" name="<?php echo $tbl; ?>[imgtext]" value="<?php echo !empty($_X['imgtext'])?$_X['imgtext']:''?>"  autocomplete="off" style="position: relative; width:100%; left: 0px; visibility:visible;">
        </td>
    </tr>
<?php } ?>
<?php $idmiz=(!empty($farkli)?$farkli:$idmiz); if(z(8,'a')=='duzenletedarik'){ ?>
    <tr>
        <th>Resim</th>
        <td style="width:auto;" class="resimlerinyeri">
        <input type="file" class="form-control" id="resimfile" name="<?php echo $tbl; ?>[img][]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;" multiple="multiple">
        <a href="#yuklemebaslat" class="yuklemebaslat">Yüklemeyi Başlat)</a>
        <?php $galericek=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$idmiz),'ID,img','galeri'); ?>
        <?php if($galericek){
        //$imgarray=(!empty($_X['img'])?json_decode($_X['img'],1):'');
        foreach ($galericek as $gl => $galeri) {
        ?>
        <div style="float:left;">
            <img data-fancybox="gallery1" href="upload/kumaskarti/<?php echo $galeri['img']; ?>" src="upload/kumaskarti/<?php echo $galeri['img']; ?>" style="width:100px; height:100px; padding:5px; cursor:pointer;">
            <span class="spanisim"><?php echo $galeri['img']; ?></span>
            <a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a>
            <input type="hidden" name="neonemivar" value="<?php echo $galeri['ID']; ?>">
        </div>
        <?php } } ?>
        <div class="resimekaciklama"></div> 
        <br>
        <b style="float:left;">Ek açıklama</b>
        <input type="text" class="form-control" name="<?php echo $tbl; ?>[imgtext]" value="<?php echo !empty($_X['imgtext'])?$_X['imgtext']:''?>"  autocomplete="off" style="position: relative; width:100%; left: 0px; visibility:visible;">
        </td>
    </tr>
    <script>
    $('.yuklemebaslat').on('click', function() {
        var file_length = $('#resimfile').prop('files').length;   
        for (i = 0; i < file_length; i++) {
            var file_data = $('#resimfile').prop('files')[i];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            var id=<?php echo $idmiz; ?>;
            $.ajax({
                url: 'ajaxayar.php?s=kumaskarti&a=ajaxsorgu3&id='+id,
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success:function(gelensorgu){
                    var gelensorgu=JSON.parse(gelensorgu);
                    console.log(gelensorgu);
                    if(gelensorgu.sonuc==1){
                        var dosyaAd=gelensorgu.cevap.dosyaAd;
                        var dosyaid=gelensorgu.cevap.dosyaid;
                        var icerik='<div><img data-fancybox="gallery1" href="upload/kumaskarti/'+dosyaAd+'" src="upload/kumaskarti/'+dosyaAd+'" style="width:200px; padding:5px; cursor:pointer;"><span class="spanisim">'+dosyaAd+'</span><a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a><input type="hidden" name="neonemivar" value="'+dosyaid+'"></div>';
                        $(".resimekaciklama").after(icerik);
                    }
                }
            });
        }
    });
</script>
<?php } ?>
</tbody>
</table>
</div>
<br>

<script type="text/javascript">
function iplikdegisim(ths){
    $(document).ready(function(){
        var iplikid=$(ths).attr('id');
        console.log(iplikid);
        var iplik_ID = $(ths).val();
        console.log(iplik_ID);
        var iplikclass="#"+$(ths).parent().parent().attr('id');
        console.log(iplikclass);
        var manuelkurusd=$(".mkurusd input").val();
        var manuelkureur=$(".mkureur input").val();
        manuelkurusd=manuelkurusd.replace(",",".");
        manuelkureur=manuelkureur.replace(",",".");
        var dovizdegistir=$(".dovizdegistir option:selected").text();
        var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
        $(ths).parent().parent().find("input:nth-child(1)").attr('name', 'kumaskarti[iplikkartlari]['+iplik_ID+']');
        $(ths).parent().parent().find("input:nth-child(3)").attr('name', 'kumaskarti[iplikfireleri]['+iplik_ID+']');
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&iplik="+iplik_ID+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur+"&mkurdovizcinsi="+manuelkurcins,
            success:function(gelensorgu){
                
                if(gelensorgu.sonuc==1){
                    var iplikfire=gelensorgu.cevap.iplikfire;
                    var iplikfiyat=gelensorgu.cevap.iplikfiyat;
                    console.log(gelensorgu.cevap);
                    var numaracins=gelensorgu.cevap.numaracins;
                    var boyaKontrol=gelensorgu.cevap.boyaKontrol;
                    var dovizCinsi=gelensorgu.cevap.dovizCinsi;
                    var dovizyazdir=dovizCinsi+" => "+dovizdegistir;
                    $(ths).parent().parent().find('.ipliknumaracins').html(numaracins);
                    $(ths).parent().parent().find('.iplikboyadurumu').html(boyaKontrol);
                    $(ths).parent().parent().find('.iplikbirimfiyat').html(iplikfiyat);
                    $(ths).parent().parent().find('.iplikfiresi div').html(iplikfire);
                    //$($(ths).parent().parent().find()+'.iplikfiresi input').val(iplikfire);
                    $(ths).parent().parent().find('.iplikbirimdoviz').html(dovizyazdir);
                    hesapla();
                } else {
                    alert('İplik kartı okuması başarısız');
                }
            }
        });
    });
}

// Kur değişince olan iplik seçim
function iplikdegisimkur(ths){
    $(document).ready(function(){
        //window.kompozisyonarray={};
        //window.kompozisyonmetin='';
        //window.akildakimetin='';
        var iplikkartilength=$('.iplikkartihepsi tr').length;
        var ipliksayi=0;
        $('.iplikkartihepsi tr').each(function(i, obj){
            ipliksayi++;
            var iplik_ID = $(obj).find("select option:selected").val();
            var iplikclass="#"+$(obj).attr('id');
            var manuelkurusd=$(".mkurusd input").val();
            var manuelkureur=$(".mkureur input").val();
            manuelkurusd=manuelkurusd.replace(",",".");
            manuelkureur=manuelkureur.replace(",",".");
            var dovizdegistir=$(".dovizdegistir option:selected").text();
            var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
            var iplikoran=$(obj).find(".iplikoranlari").val();
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&iplik="+iplik_ID+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur+"&mkurdovizcinsi="+manuelkurcins+"&getiplikoran="+iplikoran,
                success:function(gelensorgu){
                    
                    if(gelensorgu.sonuc==1){
                        var iplikfire=gelensorgu.cevap.iplikfire;
                        var iplikfiyat=gelensorgu.cevap.iplikfiyat;
                        var kompozisyonarray=gelensorgu.cevap.kompozisyonarray;
                        console.log(gelensorgu.cevap);
                        var numaracins=gelensorgu.cevap.numaracins;
                        var boyaKontrol=gelensorgu.cevap.boyaKontrol;
                        var dovizCinsi=gelensorgu.cevap.dovizCinsi;
                        var dovizyazdir=dovizCinsi+" => "+dovizdegistir;
                        $(iplikclass+' .ipliknumaracins').html(numaracins);
                        $(iplikclass+' .iplikboyadurumu').html(boyaKontrol);
                        $(iplikclass+' .iplikbirimfiyat').html(iplikfiyat);
                        $(iplikclass+' .iplikfiresi div').html(iplikfire);
                        //$(iplikclass+' .iplikfiresi input').val(iplikfire);
                        $(iplikclass+' .iplikbirimdoviz').html(dovizyazdir);
                        hesapla();
                        /*
                        if(kompozisyonarray!=null){
                            window.kompozisyonsayi=0;
                            $.each(kompozisyonarray, function(k, v) {
                                window.kompozisyonsayi++;
                                var sayimizz= window.kompozisyonsayi;
                                var akildakimetineski=window.akildakimetin;
                              
                                if(window.kompozisyonarray[k]!=null){
                                    var akildangelen=sy(window.kompozisyonarray[k]);
                                    var dongudengelen=sy(v);
                                    var toplaknk=sy(akildangelen)+dongudengelen;
                                    window.kompozisyonarray[k]=toplaknk;
                                    var eskimetin=' %'+akildangelen+' '+k;
                                    var eskimetin2=' %'+toplaknk+' '+k;
                                    var ornekmetin=' %'+dongudengelen+' '+k;
                                    var birlestirmetin=akildakimetineski+ornekmetin;
                                    birlestirmetin=birlestirmetin.split(eskimetin).join(eskimetin2);
                                    birlestirmetin=birlestirmetin.split(ornekmetin).join('');
                                    window.akildakimetin=birlestirmetin;
                                } else {
                                    var dongudengelen=sy(v);
                                    window.kompozisyonarray[k]=dongudengelen;
                                    var ornekmetin=' %'+dongudengelen+' '+k;
                                    window.akildakimetin=akildakimetineski+ornekmetin;
                                }
                                $(".kompozisyontd").html(window.akildakimetin);
                            }); 
                        }
                        */
                    } else {
                        alert('İplik kartı okuması başarısız');
                    }
                }
            });
        }); 
        hesapla();
    });
}

window.altsayaciplik=0;
function iplikdegisimkur2(ths){
    $(document).ready(function(){
        window.kompozisyonarray={};
        window.akildakimetin='';
        var iplikkartilength=$('.iplikkartihepsi tr').length;
        var ipliksayi=0;
        $('.iplikkartihepsi tr').each(function(i, obj){
            ipliksayi++;
            var iplik_ID = $(obj).find("select option:selected").val();
            var iplikclass="#"+$(obj).attr('id');
            var manuelkurusd=$(".mkurusd input").val();
            var manuelkureur=$(".mkureur input").val();
            manuelkurusd=manuelkurusd.replace(",",".");
            manuelkureur=manuelkureur.replace(",",".");
            var dovizdegistir=$(".dovizdegistir option:selected").text();
            var manuelkurcins=$(".mkurdovizcinsi select option:selected").val();
            var iplikoran=$(obj).find(".iplikoranlari").val();
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu&iplik="+iplik_ID+"&mkurusd="+manuelkurusd+"&mkureur="+manuelkureur+"&mkurdovizcinsi="+manuelkurcins+"&getiplikoran="+iplikoran,
                success:function(gelensorgu){
                    
                    if(gelensorgu.sonuc==1){
                        var kompozisyonarray=gelensorgu.cevap.kompozisyonarray;
                        window.altsayaciplik++;
                        if(kompozisyonarray!=null){
                            $.each(kompozisyonarray, function(k, v) {
                                var akildakimetineski=window.akildakimetin;
                                if(window.kompozisyonarray[k]!=null){
                                    var akildangelen=sy(window.kompozisyonarray[k]);
                                    var dongudengelen=sy(v);
                                    var toplaknk=sy(akildangelen)+dongudengelen;
                                    window.kompozisyonarray[k]=toplaknk;
                                    var eskimetin=' %'+akildangelen+' '+k;
                                    var eskimetin2=' %'+toplaknk+' '+k;
                                    var ornekmetin=' %'+dongudengelen+' '+k;
                                    var birlestirmetin=akildakimetineski+ornekmetin;
                                    birlestirmetin=birlestirmetin.split(eskimetin).join(eskimetin2);
                                    birlestirmetin=birlestirmetin.split(ornekmetin).join('');
                                    window.akildakimetin=birlestirmetin;
                                } else {
                                    var dongudengelen=sy(v);
                                    window.kompozisyonarray[k]=dongudengelen;
                                    var ornekmetin=' %'+dongudengelen+' '+k;
                                    window.akildakimetin=akildakimetineski+ornekmetin;
                                }
                                $(".kompozisyontd").html(window.akildakimetin);
                            }); 
                        }
                    } else {
                        alert('İplik kartı okuması başarısız');
                    }
                }
            });
        }); 
    });
}

function karorandegistirdegisim(ths){
    siraylacalistir();
}

function karorandegistir(ths){
    $(document).ready(function(){
        var kar_ID = $(ths).parent().parent().find("select").val();
        $(ths).parent().parent().find("input:nth-child(1)").attr('name', 'kumaskarti[karoranlari]['+kar_ID+']');
        var boyakontrolet=$(".boyamaliyetiinput1 input").val();
        if(boyakontrolet==undefined){
            var fiyatyansit=$(".tpfiyattl").html();
            fiyatyansit=sy(fiyatyansit);
            var karmiktari=0;
            var karihesapla=0;
            var karlihesap=fiyatyansit;
            $('.karoranlari').each(function(kar, objkar){
                var karmiktariobj=$(objkar).val();
                karmiktari=parseFloat(karmiktariobj)+karmiktari;
            });

            if(karmiktari>0){
                var karihesapla=(karmiktari+100)/100;
                var karlihesap=sy(karlihesap)*karihesapla;
                var manuelkurusd=$(".mkurusd input").val();
                var manuelkureur=$(".mkureur input").val();
                manuelkurusd=manuelkurusd.replace(",",".");
                manuelkureur=manuelkureur.replace(",",".");
                var manuelkurtl="1";
                var hesaplananfiyattl=0;
                var hesaplananfiyatusd=0;
                var hesaplananfiyateur=0;
                var hesaplananfiyattl = (karlihesap) / manuelkurtl;
                var hesaplananfiyatusd = (karlihesap) / manuelkurusd;
                var hesaplananfiyateur = (karlihesap) / manuelkureur;

                var tlfiyat='<input type="text" value="'+hesaplananfiyattl+'" class="form-control" autocomplete="off" disabled=""><input type="hidden" name="kumaskarti[fiyatlar][]" value="'+hesaplananfiyattl+'">';
                var usdfiyat='<input type="text" value="'+hesaplananfiyatusd+'" class="form-control" autocomplete="off" disabled="">';
                var eurfiyat='<input type="text" value="'+hesaplananfiyateur+'" class="form-control" autocomplete="off" disabled="">';
                
                $('.tlboyamaliyetimiz td').html(tlfiyat);
                $('.usdboyamaliyetimiz td').html(usdfiyat);
                $('.eurboyamaliyetimiz td').html(eurfiyat);
            }
        } else {
            siraylacalistir();
        }
    
        
    });
}

function elyaforandegistir(ths){
    $(document).ready(function(){
        var elyf_ID = $(ths).parent().parent().parent().find("select").val();
        $(ths).parent().parent().parent().find("input:nth-child(1)").attr('name', 'kumaskarti[elyaforanlari]['+elyf_ID+']');
    });
}
</script>

<div class="yetkikontrol" style="border: 2px solid #95989e;">
<table cellpadding="0" cellspacing="0" style="background: #eeeeee;" class="table table-hover">
<tbody>
<?php
$usd=kur(1,'USD','TRY');
$eur=kur(1,'EUR','TRY');
$eurusd=$eur/$usd;
?>
<tr><th colspan="4" style="text-align: center;">HAM KUMAŞ MALİYETİ</th></tr>    
<tr>
    <th>&nbsp;</th>
    <th style="text-align: left;">TL</th>
    <th style="text-align: left;">USD</th>
    <th style="text-align: left;">EUR</th>
</tr>
<tr>
    <th>Fiyat</th>  
    <td><b class="tpfiyattl">-</b></td>
    <td><b class="tpfiyatusd">-</b></td>
    <td><b class="tpfiyateur">-</b></td>
</tr>
</tbody>
</table>
<input type="hidden" name="<?php echo $tbl; ?>[maliyetham]" class="maliyetham" value="0">
</div>
<br>
<?php
$boyabaskiall=z(1,"WHERE arsiv='0' AND kategori='2'",'','boyabaski');
$_NesneBoya=z(37,z(1,"WHERE ad='boyaBaskiHizmetleri'",'ID,ad,metin1,metin2','nesne'));
$_NesneDoviz=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));
?>
<div class="durumkontrolet">
<table cellpadding="0" cellspacing="0" style="background: #eeeeee;" class="ekhizmetler table table-hover">
<?php  if(z(8,'a')=='ekletedarik'&&empty($farkli)){ ?>
    <tbody class="ekhizmetkumas">
    <tr><th colspan="6" class="ekth"><span>BOYA ÖNCESİ HAM İŞLEM</span> <a href="#ekhizmetcogalt" class="ekhizmetartir"><b style="font-size:14px; color:black;"> (+) </b></a></th></tr>    
    <tr>
    <th colspan="2" class="selectboyabaskisi">
    <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetihizmetyansityeni(this)" name="<?php echo $tbl; ?>[ekhizmet][]">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
        <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
        <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
        <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
        <?php $boyaTipifire=(!empty($bybskall['fire'])?'%'.z(36,$bybskall['fire']):''); ?>
        <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
        <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipi.' '.$boyaTipifiyat.' '.$boyaTipidoviz.' '.$boyaTipifire; ?></option>
        <?php } } ?>
    </select>
    <a href="#ekhizmetsil" class="ekhizmetsil" onclick="ekhizmetsilme(this)">Sil</a>
    </th>
    <td class="tlekboyamaliyeti yetkikontrol"><input type="text" value="0" disabled="disabled"></td>
    </tr>
    </tbody>
<?php } ?>
<?php 
$ekhizmetarray='';
$maliyetham=(!empty($_X['maliyetham'])?$_X['maliyetham']:0);
if(!empty($_X['ekhizmet'])){
    $ekhizmetarray=(!empty($_X['ekhizmet'])?json_decode($_X['ekhizmet'],1):'');
}
?>
<?php if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>
<?php $sayimiz=0; $boyabaskitlfiyat=0; $usdkurlufiyat=0; $eurkurlufiyat=0; $tlkurlufiyat=0; ?>
<?php if(!empty($ekhizmetarray)){ foreach($ekhizmetarray as $ek => $ekhizmet ){ $sayimiz++; ?>
<?php
$boyabaskiyioku=z(1,$ekhizmet,'','boyabaski');
$doviznesne=(!empty($_NesneDoviz[$boyabaskiyioku['nesne_IDdoviz']]['metin1'])?$_NesneDoviz[$boyabaskiyioku['nesne_IDdoviz']]['metin1']:'&nbsp;');
$altboyabaski=(!empty($boyabaskiyioku['fiyat'])?$boyabaskiyioku['fiyat']:0);
$altboyabaskifire=(!empty($boyabaskiyioku['fire'])?$boyabaskiyioku['fire']:0);

$usdvt=(!empty($_X['mkurusd'])?$_X['mkurusd']:0);
$eurvt=(!empty($_X['mkureur'])?$_X['mkureur']:0);
$TRY=1;

if(!empty($doviznesne)&&$doviznesne=='USD'){
    $bnu=$usdvt;
}
if(!empty($doviznesne)&&$doviznesne=='EUR'){
    $bnu=$eurvt;
}
if(!empty($doviznesne)&&$doviznesne=='TRY'){
    $bnu=$TRY;
}

$fiyattoplama=(!empty($fiyattoplama)?$fiyattoplama:$maliyetham);
$dovizcinsi='TRY';
//$tlkurlufiyat=kur($altboyabaski,$doviznesne,'TRY');
$tlkurlufiyat=($altboyabaski*$bnu);
$hamhizmet=($fiyattoplama+$tlkurlufiyat)*(100+$altboyabaskifire)/100;
//$usdkurlufiyat=kur($hamhizmet,'TRY','USD');
$usdkurlufiyat=($hamhizmet/$usdvt);
//$eurkurlufiyat=kur($hamhizmet,'TRY','EUR');
$eurkurlufiyat=($hamhizmet/$eurvt);

$boyabaskitlfiyat=$hamhizmet;
$boyabaskitlfiyat2=($hamhizmet-$fiyattoplama);
$fiyattoplama=$boyabaskitlfiyat;
?>
    <tbody class="ekhizmetkumas">
<tr><th colspan="6" class="ekth">BOYA ÖNCESİ HAM İŞLEM <?php if($sayimiz==1){ ?><a href="#ekhizmetcogalt" class="ekhizmetartir"><b style="font-size:14px; color:black;"> (+) </b></a><?php } ?></th></tr>    
    <tr>
    <th colspan="2" class="selectboyabaskisi">
    <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetihizmetyansityeni(this)" name="<?php echo $tbl; ?>[ekhizmet][]">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
        <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
        <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
        <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
        <?php $boyaTipifire=(!empty($bybskall['fire'])?'%'.z(36,$bybskall['fire']):''); ?>
        <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
        <option value="<?php echo $bybskall['ID']; ?>" <?php if($bybskall['ID']==$ekhizmet){ echo 'selected'; } ?> ><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz.' '.$boyaTipifire; ?></option>
        <?php } } ?>
    </select>
    <a href="#ekhizmetsil" class="ekhizmetsil" onclick="ekhizmetsilme(this)">Sil</a>
    </th>
    <td class="tlekboyamaliyeti yetkikontrol">
    <input type="text" value="<?php echo $boyabaskitlfiyat; ?>" disabled="disabled">
    
    </td>
    </tr>
    </tbody>
<?php } } else { ?>
    <tbody class="ekhizmetkumas">
    <tr><th colspan="6" class="ekth">BOYA ÖNCESİ HAM İŞLEM <a href="#ekhizmetcogalt" class="ekhizmetartir"><b style="font-size:14px; color:black;"> (+) </b></a></th></tr>    
    <tr>
    <th colspan="2" class="selectboyabaskisi">
    <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetihizmetyansityeni(this)" name="<?php echo $tbl; ?>[ekhizmet][]">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
        <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
        <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
        <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
        <?php $boyaTipifire=(!empty($bybskall['fire'])?'%'.z(36,$bybskall['fire']):''); ?>
        <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
        <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz.' '.$boyaTipifire; ?></option>
        <?php } } ?>
    </select>
    <a href="#ekhizmetsil" class="ekhizmetsil" onclick="ekhizmetsilme(this)">Sil</a>
    </th>
    <td class="tlekboyamaliyeti yetkikontrol"><input type="text" value="0" disabled="disabled"></td>
    </tr>
    </tbody>
<?php } ?>

<?php } ?>
</table>
</div>
<br>

<?php
$boyabaskiall=z(1,"WHERE arsiv='0' AND kategori='1'",'','boyabaski');
$_NesneBoya=z(37,z(1,"WHERE ad='boyaBaskiHizmetleri'",'ID,ad,metin1,metin2','nesne'));
$_NesneDoviz=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));
?>
<div class="blok durumkontrolet" style="border: 2px solid #95989e;">
<table cellpadding="0" cellspacing="0" class="tablealt table table-hover">
<tbody class="boyamaliyetihepsi">
<tr><th colspan="6">Boyalı Kumaş Maliyeti</th></tr>    
<tr>
    <th colspan="2">Üst hizmeti arttır<a href="#boyamaliyeticogalt" class="ustboyamaliyetiartir"><b style="font-size:14px; color:black;"> (+) </b></a></th>
    <td colspan="4" class="selectboyatd">
    <?php if(z(8,'a')=='ekletedarik'&&empty($farkli)){ ?>
    <div class="boyabaskimaliyet boyabaskimaliyet1" style="float:left;">
    <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetiyansityeni(this)">
    <option value="0">Seçiniz</option>
    <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
    <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
    <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
    <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
    <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>

    <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
     <?php } } ?>
    </select>
    <div style="display:block;">&nbsp;</div>
    <a href="#maliyetsil" onclick="maliyetsilme(this)">Sil</a>
    </div>
    <?php } ?>
    <?php $maliyettoplam=0; ?>
    <?php if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>

    <?php 
    $fiyattoplama=(!empty($fiyattoplama)?$fiyattoplama:$maliyetham);
    $boyamaliyetcek=$_X['boyamaliyet'];
    $boyamaliyetarray=(!empty($_X['boyamaliyet'])?json_decode($_X['boyamaliyet'],1):'');
    if(!empty($boyamaliyetarray)){
        $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
    }
    $sayi=0;
    if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ $sayi++; 
        $ustboyabaskicek=z(1,$bymlyt,'','boyabaski');
        $doviznesne=(!empty($_NesneDoviz[$ustboyabaskicek['nesne_IDdoviz']]['metin1'])?$_NesneDoviz[$ustboyabaskicek['nesne_IDdoviz']]['metin1']:'&nbsp;');
        $ustboyabaski=(!empty($ustboyabaskicek['fiyat'])?$ustboyabaskicek['fiyat']:0);
        $ustboyabaskifire=(!empty($ustboyabaskicek['fire'])?$ustboyabaskicek['fire']:0);
        $ustboyabaskifire2=(!empty($ustboyabaskifire)?(($ustboyabaskifire+100)/100):0);

        $dovizcinsi='TRY';
        $kurlufiyat=kur($ustboyabaski,$doviznesne,$dovizcinsi);
        $ustboyabaski=$kurlufiyat;
        $ustbaskitoplam=($fiyattoplama+$ustboyabaski)*$ustboyabaskifire2;
        $ustbaskitoplam=z(36,$ustbaskitoplam,2);
    ?>
    <div class="boyabaskimaliyet boyabaskimaliyet<?php echo $sayi; ?>" style="float:left;">
    <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetiyansityeni(this)">
    <option value="0">Seçiniz</option>
    <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
    <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
    <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
    <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
    <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
    <option value="<?php echo $bybskall['ID']; ?>" <?php if($bybskall['ID']==$bymlyt){ echo 'selected'; } ?>><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
     <?php } } ?>
    </select>
    <div style="display:block;" class="yetkikontrol"><?php echo $ustbaskitoplam; ?></div>
    <a href="#maliyetsil" onclick="maliyetsilme(this)">Sil</a>
    </div>
    <?php } } else {  ?>
        <div class="boyabaskimaliyet boyabaskimaliyet1" style="float:left;">
        <select class="selectboyabaski" id="boyabaski" onchange="boyamaliyetiyansityeni(this)">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
        <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
        <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
        <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
        <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
        <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
        <?php } } ?>
        </select>
        <div style="display:block;" class="yetkikontrol">&nbsp;</div>
        <a href="#maliyetsil" onclick="maliyetsilme(this)">Sil</a>
        </div>
        <?php } ?>
    <?php } ?>

    </td>
</tr>
<?php $boyabaskiall=z(1,"WHERE arsiv='0' AND kategori='2'",'','boyabaski'); ?>
<tr class="mamulboyamaliyeti"><th colspan="60"><a href="#altboyamaliyeticogalt" class="altboyamaliyetiartir"><b style="font-size:14px; color:black;"> (+) </b></a>Alt hizmeti arttır</th></tr> 

<?php if(z(8,'a')=='ekletedarik'&&empty($farkli)){ ?>
<tr class="boyamaliyetlerimiz boyamaliyetiinputt1">
<th colspan="2" class="bunukopyala1">
<select onchange="altboyadegistiryeni(this)" class="1">
<option value="0">Seçiniz</option>
<?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
        <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
        <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
        <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
        <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
        <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
        <?php } } ?>
</select>
<div style="display:block;" class="yetkikontrol">&nbsp;</div>
<a href="#altmaliyetsil" onclick="altmaliyetsilme(this)">Sil</a>
</th>
<td class="boyamaliyetiinput1"></td>
</tr>
<?php } ?>

<?php $toplamb=0; if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>
<?php if(!empty($bymlytler)){ ?>
    <?php 
    $boyamaliyetarray=$bymlytler;
    if(!empty($boyamaliyetarray)){
        $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
    }
    $sayi=0;
    $sayi2=0;
    
    if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ $sayi++;  $sayi2++; 
    $altboyabaskicek=z(1,$bymlyt,'','boyabaski');
	$doviznesne=(!empty($_NesneDoviz[$altboyabaskicek['nesne_IDdoviz']]['metin1'])?$_NesneDoviz[$altboyabaskicek['nesne_IDdoviz']]['metin1']:'&nbsp;');
	$altboyabaski=(!empty($altboyabaskicek['fiyat'])?$altboyabaskicek['fiyat']:0);
	$altboyabaskifire=(!empty($altboyabaskicek['fire'])?$altboyabaskicek['fire']:0);
    $altboyabaskifire2=(!empty($altboyabaskifire)?(($altboyabaskifire+100)/100):0);
    
    $dovizcinsi='TRY';
	$kurlufiyat=kur($altboyabaski,$doviznesne,$dovizcinsi);
	$altboyabaski=$kurlufiyat;
	$altbaskitoplam=($altboyabaski*$altboyabaskifire2);
	$altbaskitoplam=z(36,$altbaskitoplam,2);
    ?>
   <tr class="boyamaliyetlerimiz boyamaliyetiinputt<?php echo $sayi2; ?>">
   <th colspan="2">
   <select onchange="altboyadegistiryeni(this)" class="<?php echo $sayi2; ?>">
   <option value="0">Seçiniz</option>
   <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
    <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
    <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
    <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
    <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
    <option value="<?php echo $bybskall['ID']; ?>" <?php if($bybskall['ID']==$bymlyt){ echo 'selected'; } ?>><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
     <?php } } ?>
   </select>
    <div style="display:block;" class="yetkikontrol"><?php echo $altbaskitoplam; ?></div>
    <a href="#altmaliyetsil" onclick="altmaliyetsilme(this)">Sil</a>
   </th>
   <td class="boyamaliyetiinput1">
   <?php 
    $boyamaliyetcek=$_X['boyamaliyet'];
    $boyamaliyetarray=(!empty($_X['boyamaliyet'])?json_decode($_X['boyamaliyet'],1):'');
    if(!empty($boyamaliyetarray)){
        $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
    }
    $sayi=0;
    if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt2 => $bymlytler2){ $sayi++; 
        if(!empty($bymlytler2)){
            $bymlytler2=str_replace('puan','',$bymlytler2);
        }
    ?>
   <input type="text" name="kumaskarti[boyamaliyet]<?php echo $bymlyt2; ?>][<?php echo $bymlyt; ?>]" value="<?php echo $bymlytler2[$bymlyt]; ?>" autocomplete="off" class="boyamaliyethesapla boyainput<?php echo $sayi; ?>" disabled="">
   <input type="hidden" name="kumaskarti[boyamaliyet][<?php echo $bymlyt2; ?>][<?php echo $bymlyt; ?>]" value="<?php echo $bymlytler2[$bymlyt]; ?>" autocomplete="off" class="boyamaliyethesapla">
   <?php } } ?>
   </td>
   </tr>
    <?php } } else { ?>
        <tr class="boyamaliyetlerimiz boyamaliyetiinputt1">
        <th colspan="2" class="bunukopyala1">
        <select onchange="altboyadegistiryeni(this)" class="1">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
                <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
                <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
                <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
                <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
                <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
                <?php } } ?>
        </select>
        <div style="display:block;" class="yetkikontrol">&nbsp;</div>
        <a href="#altmaliyetsil" onclick="altmaliyetsilme(this)">Sil</a>
        </th>
        <td class="boyamaliyetiinput1"></td>
        </tr>
    <?php } ?>
        
   <?php  } else { ?>
        <tr class="boyamaliyetlerimiz boyamaliyetiinputt1">
        <th colspan="2" class="bunukopyala1">
        <select onchange="altboyadegistiryeni(this)" class="1">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskiall)){  foreach($boyabaskiall as $bybskall){ ?>
                <?php $boyaTipi=(!empty($_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_NesneBoya[$bybskall['nesne_IDboyaBaskiHizmetleri']]['metin1']:''); ?>
                <?php $boyaTipitext=(!empty($bybskall['tipi'])?$bybskall['tipi']:''); ?>
                <?php $boyaTipifiyat=(!empty($bybskall['fiyat'])&&!empty($ytkFyt)||$admn?z(36,$bybskall['fiyat'],2,1):''); ?>
                <?php $boyaTipidoviz=(!empty($_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2'])&&!empty($ytkFyt)||$admn?$_NesneDoviz[$bybskall['nesne_IDdoviz']]['metin2']:''); ?>
                <option value="<?php echo $bybskall['ID']; ?>"><?php echo $boyaTipitext.' '.$boyaTipifiyat.' '.$boyaTipidoviz; ?></option>
                <?php } } ?>
        </select>
        <div style="display:block;" class="yetkikontrol">&nbsp;</div>
        <a href="#altmaliyetsil" onclick="altmaliyetsilme(this)">Sil</a>
        </th>
        <td class="boyamaliyetiinput1"></td>
        </tr>
    <?php }  ?>

<?php } ?>

</tbody>
</table>
</div>

<?php
$boyabaskiall=z(1,"WHERE arsiv='0' AND kategori='1'",'','boyabaski');
$_NesneBoya=z(37,z(1,"WHERE ad='boyaBaskiHizmetleri'",'ID,ad,metin1,metin2','nesne'));
$_NesneDoviz=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));
?>

<br>
<?php
$_Nesnekar=z(37,z(1,"WHERE ad='' OR ad='karBirimleri'",'ID,ad,metin1,metin2','nesne'));
?>
<div class="" style="border: 2px solid #95989e;">
<table cellpadding="0" cellspacing="0" class="tablekar table table-hover">
<tbody class="boyamaliyetkarlari">
<tr><th colspan="1">Silme</th><th colspan="6">İlave Giderler 
<br><a href="#secililerisil" class="seciliilavegider btn btn-danger"><i class="icon-minus3 icon-1x"></i></a>
&nbsp;<a href="#boyamaliyetkarlaricogalt" class="karoranartir btn btn-success"><b style="font-size:14px; color:white;"> <i class="icon-plus3 icon-1x"></i> </b></a>
 </th></tr>
<?php if(z(8,'a')=='ekletedarik'&&empty($farkli)){ ?>  
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari1">
<th colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></th>
   <th colspan="2">
    <select onchange="karorandegistir(this)" class="form-control">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>"><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
    <a href="#karoransil" class="karoransil" onclick="karoransilme(this)">Sil</a>
   </th>
   <td>
    <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][0]">
   </td>
</tr>
<?php } ?>
<?php if(z(8,'a')=='duzenletedarik'||!empty($farkli)){ ?>
<?php
$karoranlaricek=$_X['karoranlari'];
$karoranlariarray=(!empty($_X['karoranlari'])?json_decode($_X['karoranlari'],1):'');
$karsayi=0;
if(!empty($karoranlariarray)){ foreach($karoranlariarray as $ikar => $karoranlari){ $karsayi++; 
?>
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari<?php echo $karsayi; ?>">
<th colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></th>
   <th colspan="2">
    <select onchange="karorandegistir(this)" class="form-control">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>" <?php if($kar['ID']==$ikar){ echo 'selected'; } ?> ><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
    <a href="#karoransil" class="karoransil" onclick="karoransilme(this)">Sil</a>
   </th>
   <td>
    <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][<?php echo $ikar; ?>]" value="<?php echo $karoranlari; ?>">
   </td>
</tr>
<?php } } else { ?>
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari1">
<th colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></th>
<th colspan="2">
    <select onchange="karorandegistir(this)" class="form-control">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>"><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
    <a href="#karoransil" class="karoransil" onclick="karoransilme(this)">Sil</a>
</th>
<td>
    <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][0]">
</td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
</div>
<br>

<div class="yetkikontrol" style="border: 2px solid #95989e;">
    <table cellpadding="0" cellspacing="0" class="tablekar table table-hover">
        <tbody class="boyamaliyetfiyati">
            <tr class="tlboyamaliyetimiz">
                <th colspan="2" style="width:140px;">TL</th>
                <td class="karinputlari"></td>
            </tr>
            <tr class="usdboyamaliyetimiz">
                <th colspan="2" style="width:140px;">USD</th>
                <td class="karinputlari"></td>
            </tr>
            <tr class="eurboyamaliyetimiz">
                <th colspan="2" style="width:140px;">EUR</th>
                <td class="karinputlari"></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
$idcek=z(8,'id');
$srg="WHERE arsiv='0' AND modul='".$tbl."' AND modul_ID='".$idcek."' ORDER BY ID DESC";
$rapor=z(1,$srg,'','rapor');
$sayirapor=0;
if(!empty($rapor)){
    $sayirapor=count($rapor);
}
?>

<br>
<div class="" style="border: 2px solid #95989e;">
<table cellpadding="0" cellspacing="0" class="table table-hover">
<tbody>
<tr><th>Kayit Tarihi</th><td>
    <div class="input-group col-lg-12">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>" style="width: auto !important;">
    </div>
</td></tr>
<tr><th colspan="2">
<?php if(z(8,"a")=="duzenle"){ echo ' <a href="./?s='.$tbl.'&a=ekle&farkli='.z(8,'id').'" class="btn btn-info" style="padding-top: 0px; margin-top: 4px;" target="_blank">BU VERİYİ FARKLI DÜZENLE VE KAYDET</a> '; } ?>&nbsp; 
        <?php if(z(8,"a")=="duzenle"){ ?>
            <?php if($sayirapor=='1'||$sayirapor>1){ ?>
                <a href="?s=<?php echo z(8,'s'); ?>&a=rapor&id=<?php echo $rapor[0]['ID']; ?>" class="btn btn-danger" style="padding-top: 0px;margin-top: 4px;">Raporu Düzenle</a>
            <?php } else { ?>
                <a href="?s=<?php echo z(8,'s'); ?>&a=rapor&id=<?php echo z(8,'id'); ?>&ekle=1" class="btn btn-primary" style="padding-top: 0px;margin-top: 4px;">Rapor Oluştur</a>
            <?php } ?>
        <?php } ?>
<a href="#" class="yenikaydet btn btn-success" onClick='submitDetailsForm()'>Kaydet</a>
</th></tr>

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {

        var kumasismi=$(".1kumasismi").val();
        var kumaskodu=$(".1kumaskodu").val();
    
        var degeroran=0;

        $('.iplikoran').each(function(ip, objoran){
            var iplikoran=$(objoran).find("input").val();
            var iplikoran = sy(iplikoran);
            degeroran=parseFloat(degeroran+iplikoran);
        }); 
        if(degeroran!=0){
            if(degeroran>100){
                alert("Toplam iplik oranı değeri 100'den fazla olamaz");
            }
            else if(degeroran<100){
                alert("Toplam iplik oranı değeri 100'den az olamaz");
            } else if(kumasismi==''){
                alert("Kumaş ismi boş geçilemez");
            } else if(kumaskodu==''){
                alert("Kumaş kodu boş geçilemez");
            } else {
                $("#formId").submit();
            }
        } else if(kumasismi==''){
            alert("Kumaş ismi boş geçilemez");
        } else if(kumaskodu==''){
            alert("Kumaş kodu boş geçilemez");
        } else {
            $("#formId").submit();
        }
    }
</script>