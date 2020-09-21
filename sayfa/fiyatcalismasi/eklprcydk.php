<style>
.icblok{
    border: 1px solid #633c3c;
    padding: 10px;
    border-radius: 20px;
    max-width: 99%;
}
.kapsayiciblok{
    border: 1px solid #633c3c;
    padding: 10px;
    padding-left: 20px;
}
.kapsayiciblok2{
    border: 1px solid #633c3c;
    padding: 10px;
    padding-left: 20px;
    width: 100%;
    float: left;
    overflow: hidden;
    margin-top: 20px;
    display:none;
}

.altdovizbirimi{
    float: right;
    margin-left: 4px;
    font-size: 16px;
    font-weight: bold;
    background: #efefef;
    padding: 5px;
}

.urunbaslik{
    font-size:16px;
}

.altkumasbirimfiyati span{
    display:block;
    margin-bottom: 5px;
}

.modified{
    float: left;
    padding-left: 20%;
    display:none;
}

.alttoplamfiyat span{
    display:block;
    margin-bottom: 5px;
}

.bloklar{
    width:100%;
}
.anablok1{
    width:97%;
    float:left;
}
.anablok2{
    width:3%;
    float:left;
    padding-top: 0%;
}

.kumasduzenle{
    float: right;
    padding: 1px;
    margin-top: 10px;
    cursor:pointer;
}

.kumastr td{
    padding:5px !important;
}
.tumblok{
    width:100%;
    float:left;
    overflow: hidden;
    margin-top:20px;
}
.icblok2 input{
    position:relative;
    top:25%;
}

.toplamaltfiyat{
    float:right;
}

.kumasselectli .secilidurum{
    float: left;
    padding: 1px;
    margin-right: 9px;
    margin-top: 10px;
    margin-left: -4px;
    cursor:pointer;
}

.aksesuarlar .secilidurum{
    float: left;
    padding: 1px;
    margin-right: 9px;
    margin-top: 10px;
    margin-left: -4px;
    cursor:pointer;
}

.formrow{
    display:none;
}

.uruntoggle i{
    cursor:pointer;
}

.kumaspusu{
    display:none;
}

.kumaspusuth{
    display:none;
}

.kumasselectli .select2-container{
    width:80% !important;
    float:left;
}
.aksesuarlar .select2-container{
    width:80% !important;
    float:left;
}
.aksesuarcogalt{
    padding: 4px;
    margin-left: 6px;
    cursor:pointer;
    font-size:14px;
}
.fiyatcogalt{
    background: #2a3140;
    color: white;
    padding: 4px;
    border-radius: 6px;
    -webkit-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    -moz-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    margin-left: 6px;
    cursor:pointer;
    font-size:14px;
}
.kayitbilgisi{
    padding-top:20px;
}
.aksesuarislem a{
    border: 1px solid #c56565;
    padding: 10px;
    width: 40%;
    float: left;
    text-align: center;
    color: white;
    background: red;
    -webkit-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    -moz-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    border-radius: 4px;
}
.aksesuarislem a:hover{
    color: white;
}
.aksesuar1 .aksesuarislem a{
    display:none;
}

.altkumasbirimfiyatith{
    min-width: 160px;
}

.aksesuarmiktari{
    max-width: 70px !important;
}

.aksesuarislem .select2{
    max-width:80px !important;
}

.aksesuarislem .select2-selection__rendered{
    font-size:7px !important;
}

.uruntoggle{
    float:right;
}

.anablok2 a{
    border: 1px solid #c56565;
    padding: 10px;
    width: 95%;
    float: right;
    text-align: center;
    color: white;
    background: red;
    -webkit-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    -moz-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
    border-radius: 4px;
}
.anablok2 a:hover{
    color: white;
}
.anablok2 input{
    float: left;
    width: 50%;
}
.tumblok1 .anablok2 a{
    display:none;
}
.kumasenselect{
    min-width: 80px;
}
.kumasacikeni{
    display:none;
}

.kumasacikeniust{
    display:none;
}
.fiyatselect{
    min-width:80px;
}
.secimkumas{
    min-width:160px;
}
.inputcheckbox{
    width: 20px;
    float: right;
    margin-top: -10px;
}
.inputcheckbox2{
    width: 20px;
    float: right;
    margin-top: -10px;
}
.inputcheckbox3{
    width: 20px;
    float: right;
    margin-top: -10px;
}
.kumaspastalboyukesimi input{
    min-width:60px;
}
.kumaspastalissayisi input{
    min-width:60px;
}
.kumasbirimgramaji input{
    min-width:70px;
}

@media screen and (max-width: 1024px) {
    .kapsayiciblok2 table {
        overflow: scroll;
        display: block;
    }
    .urunbaslik {
        font-size: 14px;
    }
}

</style>






<?php
$urunkategorileriarray=(!empty($_X['urunkategorileri'])?json_decode($_X['urunkategorileri'],1):'');
$urunkategorilerisayi=(!empty($urunkategorileriarray)?count($urunkategorileriarray):1);
?>

<script>

$( document ).ready(function() {
    <?php if(z(8,'a')=='duzenle'){ ?>
        setTimeout(function(){ select2kontrol(); }, 1000);
        alttoplamfiyatyansiteach();

        setInterval(function() {
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol",
                success:function(gelensorgu){
                    var kumaskartifiyatall=gelensorgu.cevap.kumaskartifiyatall;
                    if(kumaskartifiyatall){
                        window.kumaskartifiyatall=kumaskartifiyatall;
                        console.log("kumaskartifiyat degisti");
                        kumasinfiyatieach2();
                        kumasdegisikliktetikle();
                    }
                }
            });
        }, 5000); // Wait 5000ms before running again
    <?php } ?>
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&kumaskarti=1&aksesuarkarti=1&nesneyioku=1",
        success:function(gelensorgu){
            var kumaskartiall=gelensorgu.cevap.kumaskartiall;
            window.kumaskartiall=kumaskartiall;
            var boyabaskiall=gelensorgu.cevap.boyabaskiall;
            window.boyabaskiall=boyabaskiall;
            var aksesuarkartiall=gelensorgu.cevap.aksesuarkartiall;
            window.aksesuarkartiall=aksesuarkartiall;
            var nesneall=gelensorgu.cevap.nesneall;
            window.nesneall=nesneall;
            var kumaskartifiyatall=gelensorgu.cevap.kumaskartifiyatall;
            window.kumaskartifiyatall=kumaskartifiyatall;
        }
    });

    var deger=1;
    $(".aksesuarc2ogalt").click(function(){
        var iplikeski="aksesuar"+deger;
        var selecteski="select"+deger;
        deger++;
        var iplikyeni="aksesuar"+deger;
        var selectyeni="select"+deger;
        var cloneObj2 = $('.aksesuar1').clone();
        var cloneObj2 =cloneObj2.removeClass(iplikeski);
        var cloneObj2 =cloneObj2.removeClass("aksesuar1");
        var cloneObj2 =cloneObj2.addClass(iplikyeni);
        $(".aksesuarlar").append(cloneObj2);
        select2kontrol();
    });

    var deger2=<?php echo (!empty($urunkategorilerisayi)?$urunkategorilerisayi:1); ?>;
    $(".fiyatcogalt").click(function(){
        var randomsayi=Math.floor(Math.random() * (100 - 70)) + 70;
        var color =randomcolor()+randomsayi;

        var iplikeski="tumblok"+deger2;
        var tumbloksayi=$(".tumblok").length;
        tumbloksayi=tumbloksayi+1;
        var urunbaslik=tumbloksayi+'.Ürün <span class="kapakmusteriebati"><b>Müşteri Ebatı :</b> <span></span></span> <span class="uruntoggle" onclick="uruntoggle(this)"><i class="icon-circle-right2 mr-3 ml-3 icon-2x"></i></span><span class="altdovizbirimi"></span><span class="toplamaltfiyat"></span>';
        deger2++;
        var iplikyeni="tumblok"+deger2;
        var cloneObj2 = $('.tumblok1').clone();
        var cloneObj2 =cloneObj2.removeClass(iplikeski);
        var cloneObj2 =cloneObj2.removeClass("tumblok1");
        var cloneObj2 =cloneObj2.addClass(iplikyeni);
        $(".bloklar").append(cloneObj2);
        $("."+iplikyeni+" .urunbaslik").html(urunbaslik);
        $("."+iplikyeni+" .anablok1").css("background",color);
        var tumbloksayisi=$(".tumblok").length;
        var blokname=(tumbloksayisi)-1;
        select2kontrol();
        toplamurunsayisi();
        aksesuarlarnameguncelle();
        arakatmanguncelle();
        altislemnameguncelle();
        ebatyansiteach();
    });

    <?php
            $enbilgisisayi=0;
            if(z(8,'a')!='eklekombinasyon'){
                $enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
                $enbilgisisayi=count($enbilgisiarray);
            }
        ?>
        var deger1=<?php echo (!empty($enbilgisisayi)?$enbilgisisayi:1); ?>;
        $(".kumasart2tir").click(function(){
            var classeski="kumastr"+deger1;
            var tbodyeski="kumastbody"+deger1;
            var selecteski="select"+deger1;
            var degereski=deger1;
            deger1++;
            var classyeni="kumastr"+deger1;
            var tbodyyeni="kumastbody"+deger1;
            var selectyeni="select"+deger1;
            var degeryeni=deger1;

            var clone1 = $('.kumastbody1 tr:nth-child(1)').clone();
            var clone1 = clone1.removeClass(classeski);
            var clone1 = clone1.removeClass("kumastr1");
            var clone1 =clone1.addClass(classyeni);
            var sanaltbody='<tbody class="'+tbodyyeni+'"></tbody>';
            $(".tablekumaslar").append(sanaltbody);
            $('.'+tbodyyeni).html(clone1);
            select2kontrol();
        });

        $(".secili1kumas").click(function(){
            $('.silinecekkumas').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekkumas').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    if(iham!='0'){
                        $(objham).parent().parent().remove();
                        kumastrhesapla();
                    }
                    
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        $(".aksesuar1silme").click(function(){
            $('.silinecekaksesuar').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekaksesuar').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    if(iham!='0'){
                        $(objham).parent().parent().remove();
                        toplamurunsayisi();
                    }
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

    
});

function uruntoggle(ths){
    var alttoplamfiyat=$(ths).parent().parent().parent().parent().find(".alttoplamfiyat").html();
    var alttoplamdovizbirim=$(ths).parent().parent().parent().parent().find(".aksesuardovizselect option:selected").text();
    $(ths).parent().parent().find(".formrow").toggle();
    $(ths).parent().parent().find(".kapakmusteriebati").toggle();
    $(ths).parent().parent().parent().parent().find(".kapsayiciblok2").toggle();
    $(ths).find("i").toggleClass("icon-circle-down2");
    $(ths).parent().find(".toplamaltfiyat").html(alttoplamfiyat);
    $(ths).parent().find(".altdovizbirimi").html(alttoplamdovizbirim);
    $(ths).parent().parent().find(".toplamaltfiyat").toggle();
    $(ths).parent().parent().find(".altdovizbirimi").toggle();
}

function alttoplamfiyatyansiteach(ths){
    $('.tumblok').each(function(ip, objtumblokaltfiyat){
        var alttoplamfiyat=$(objtumblokaltfiyat).find(".alttoplamfiyat").html();
        var alttoplamdovizbirim=$(objtumblokaltfiyat).find(".aksesuardovizselect option:selected").text();
        $(objtumblokaltfiyat).find(".toplamaltfiyat").html(alttoplamfiyat);
        $(objtumblokaltfiyat).find(".altdovizbirimi").html(alttoplamdovizbirim);
    }); 
}


function bloksilme(ths){
    var fiyatid=$('.getid').val();
    var blokid=$(ths).parent().parent().index();
    $(ths).parent().parent().find(".kumastr").each(function(i, objtablekumas){
        var kumasid=$(objtablekumas).find(".secimkumas option:selected").val();
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&fiyat="+fiyatid+"&kumas="+kumasid+"&blok="+blokid,
            success:function(gelensorgu){
                
            }
        });
    });
    $(ths).parent().parent().remove();
    toplamurunsayisi();
    $("#formfiyatcalismasi").submit();
}

function aksesuarcarptir(ths){
    var valid=$(ths).parent().parent().find(".selectislem option:selected").val();
    var akseuarvalid=$(ths).parent().parent().find(".aksesuarselect option:selected").val();
    var aksesuarbirimfiyat; 
    var aksesuarmiktar;
    var aksesuarfiyat;
    var aksesuardoviztipi;

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    var manuelkurtl="1";

    var aksesuarioku=window.aksesuarkartiall[akseuarvalid];
    var aksesuardoviz=aksesuarioku['nesne_IDdoviz'];
    var aksesuarfiyat=aksesuarioku['fiyat'];

    //aksesuarbirimfiyat=$(ths).parent().parent().find(".aksesuarfiyat div").html();
    aksesuarbirimfiyat=aksesuarfiyat;
    aksesuarmiktar=$(ths).parent().parent().find(".aksesuarmiktari").val();

    var str = aksesuarbirimfiyat;
    aksesuarbirimfiyat = str.replace(",", ".");
    aksesuarbirimfiyat = sy(aksesuarbirimfiyat);

    if(valid==1){
        aksesuarfiyat=(aksesuarbirimfiyat)*aksesuarmiktar;
    }
    if(valid==2){
        aksesuarfiyat=(aksesuarbirimfiyat)/aksesuarmiktar;
    }

    aksesuarfiyat = sy(aksesuarfiyat);

    //aksesuarfiyat = aksesuarfiyat.replace(".", ",");

    if(aksesuardoviz=='74'){
        aksesuarfiyat=sy(aksesuarfiyat)*manuelkurtl;
        aksesuardoviztipi='₺';
    }
    if(aksesuardoviz=='75'){
        aksesuarfiyat=sy(aksesuarfiyat)*manuelkurusd;
        aksesuardoviztipi='$';
    }
    if(aksesuardoviz=='76'){
        aksesuarfiyat=sy(aksesuarfiyat)*manuelkureur;
        aksesuardoviztipi='€';
    }


    $(ths).parent().parent().find(".aksesuarfiyatii").html(aksesuarfiyat);
    aksesuarfiyatitetikle();
}
var kumasbilgiobject={};

function kumasinfiyatieach(ths){
    var metinbilgi='';

    $(".tablekumaslar").each(function(i, objtablekumas){

        kumasbilgiobject={};
        $(objtablekumas).find(".kumastr").each(function(ik, objkumastr){
            metinbilgi='';
            var konumubul=$(objkumastr).find(".kumaseni select"); 
            kumashesapla2(konumubul);
            $.each( kumasbilgiobject, function( key, value ) {
                metinbilgi+='<span>'+key+'-'+value+'₺</span>';
            });
        });
        $('.altkumasbirimfiyati:eq('+i+')').html(metinbilgi);

    });


}

function kumasinfiyatieach2(ths){
    $(".tablekumaslar").each(function(i, objtablekumas){
        $(objtablekumas).find(".kumastr").each(function(ik, objkumastr){
            var secimkumas=$(objkumastr).find(".secimkumas"); 
            kumasdegistir(secimkumas);
        });
    });
}

function secilikumasisil(ths){

    var kumastrsayisi=$(ths).parent().parent().parent().parent().find(".kumastr").length;
    var kumastrindex=$(ths).parent().parent().parent().index();
    var kumasindex2=$(ths).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().index();
    var kumasval=$(ths).parent().find("select option:selected").val();
    var getid=$(".getid").val();
    if(kumastrindex!="1"){
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&fiyat="+getid+"&kumas="+kumasval+"&blok="+kumasindex2,
            success:function(gelensorgu){
                var kompmetin=gelensorgu.cevap.kompmetin;
                if(kompmetin){
                    $(ths).parent().parent().parent().find(".kumaskompozisyonu").html(kompmetin);
                }
            }
        });
        $(ths).parent().parent().remove();
        kumastrhesapla();
    }

    kumasdegisikliktetikle();
    
}

function seciliaksesuarsil(ths){

    var aksesuarsayisi=$(ths).parent().parent().parent().find(".aksesuarlar tr").length;
    var aksesuarindex=$(ths).parent().parent().index();
    if(aksesuarindex!="0"){
        $(ths).parent().parent().remove();
        toplamurunsayisi();
    }
    aksesuarfiyatitetikle();
}

function aksesuarfiyatihesapla(ths){
    var aksesuarfiyati=0;
    var birimfiyati=0;
    var sayi=0;

    $('.aksesuarlar').each(function(aks, objaksesuarlar){
        var aksesuarfiyati=0;
        var birimfiyati=0;

        $(objaksesuarlar).find('.aksesuarfiyatii').each(function(ip, objaksesuarfiyati){
            birimfiyati=$(objaksesuarfiyati).html();
            birimfiyati=birimfiyati.split("₺").join("");
            birimfiyati=parseFloat(birimfiyati);
            aksesuarfiyati=parseFloat(aksesuarfiyati);
            birimfiyati=aksesuarfiyati+birimfiyati;
            aksesuarfiyati=birimfiyati;
        }); 
        birimfiyati=birimfiyati.toFixed(2);
        $(".altaksesuarfiyati:eq("+sayi+")").html(birimfiyati+"₺");
        sayi++;

    });

}

function kumasdegisikliktetikle(ths){
    kumasinfiyatieach();
    aksesuarfiyatitetikle();
}

function aksesuarfiyatitetikle(ths){
    aksesuarfiyatihesapla();
    sonislemeach();
}

function sonislemeach(ths){
    $('.altaksesuarfiyati').each(function(aks, objaksesuarlar){
        navlunyuzde(objaksesuarlar);
    });
}

function navlunfiyat(ths){
    navlunyuzde(ths);
}

function navlunfiyatdoviz(ths){
    navlunyuzde(ths);
}

function navlunyuzde(ths){
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    var manuelkurtl="1";
    var eurid="76";
    var tryid="74";
    var usdid="75";
    var bunacevir=manuelkurtl;
    var bunacevirdoviz=manuelkurtl;
    var altnavlundoviz=$(ths).parent().parent().find(".altnavlun select option:selected").val();
    var altdoviz=$(ths).parent().parent().find(".aksesuardovizselect option:selected").val();
    var altfasondikim=$(ths).parent().parent().find(".altfasondikimfiyati input").val();
    altfasondikim=parseFloat(altfasondikim);

    if(altnavlundoviz==eurid){
        bunacevir=manuelkureur;
    }

    if(altnavlundoviz==usdid){
        bunacevir=manuelkurusd;
    }

    if(altdoviz==eurid){
        bunacevirdoviz=manuelkureur;
    }

    if(altdoviz==usdid){
        bunacevirdoviz=manuelkurusd;
    }


    var altnavlunfiyat;
    var akslitlfiyati;
    var aksesuarfiyati=$(ths).parent().parent().find(".altaksesuarfiyati").html();
    aksesuarfiyati=aksesuarfiyati.split("₺").join("");
    aksesuarfiyati=parseFloat(aksesuarfiyati);
    var altnavlun=$(ths).parent().parent().find(".altnavlun input").val();
    altnavlun=altnavlun.split(",").join(".");
    altnavlunfiyat=(altnavlun)*bunacevir;
    altnavlunfiyat=parseFloat(altnavlunfiyat);
    
    var altamortisman=$(ths).parent().parent().find(".altamorisman input").val();
    altamortisman=parseFloat(altamortisman);
    var altfire=$(ths).parent().parent().find(".altfire input").val();
    altfire=parseFloat(altfire);
    var altkar=$(ths).parent().parent().find(".altkar input").val();
    altkar=parseFloat(altkar);
    var altkomisyon=$(ths).parent().parent().find(".altkomisyon input").val();
    altkomisyon=parseFloat(altkomisyon);
    var fiyatbilgi;
    var toplambirimfiyat;
    var yuzde;
    var toplambilgi;

    if(altfasondikim){
        akslitlfiyati=parseFloat(altnavlunfiyat+aksesuarfiyati+altfasondikim);
    } else {
        akslitlfiyati=parseFloat(altnavlunfiyat+aksesuarfiyati);
    }


    

    var sayi=0;

    var altkumasspansayi=$(ths).parent().parent().find('.altkumasbirimfiyati span').length;
    
    var span;
    var spanmetin='';
    for (span = 0; span < altkumasspansayi; span++) {
        spanmetin +='<span></span>';
    }

    $(ths).parent().parent().find(".alttoplamfiyat").html(spanmetin);

    $(ths).parent().parent().find('.altkumasbirimfiyati span').each(function(ip, objfiyatspan){
        yuzde=0;
        toplambirimfiyat=0;
        var fiyatimiz=$(objfiyatspan).prop('outerHTML');
        fiyatimiz=fiyatimiz.split("span").join("");
        fiyatimiz=fiyatimiz.split("<").join("");
        fiyatimiz=fiyatimiz.split("/").join("");
        fiyatimiz=fiyatimiz.split(">").join("");
        fiyatimiz=fiyatimiz.split(">").join("");
        fiyatimiz=fiyatimiz.split("₺").join("");

        fiyatimiz = fiyatimiz.split("-");
        fiyatbilgi = fiyatimiz[0];
        fiyatimiz = fiyatimiz[1];
        fiyatimiz=parseFloat(fiyatimiz);

        fiyatimiz=parseFloat(fiyatimiz+akslitlfiyati);
        
        
        toplambirimfiyat=fiyatimiz;
       
        if(altamortisman){
            yuzde=(100+altamortisman)/100;
            toplambirimfiyat=(toplambirimfiyat)*yuzde;
        }
        
        if(altfire){
            yuzde=(100+altfire)/100;
            toplambirimfiyat=(toplambirimfiyat)*yuzde;
        }
        
        if(altkar){
            yuzde=(100+altkar)/100;
            toplambirimfiyat=(toplambirimfiyat)*yuzde;
        }
       
        if(altkomisyon){
            yuzde=(100+altkomisyon)/100;
            toplambirimfiyat=(toplambirimfiyat)*yuzde;
        }

        toplambirimfiyat=(toplambirimfiyat)/bunacevirdoviz;

        toplambirimfiyat=toplambirimfiyat.toFixed(2);

        toplambilgi=fiyatbilgi+"-"+toplambirimfiyat;

        $(ths).parent().parent().find(".alttoplamfiyat span:eq("+sayi+")").html(toplambilgi);
        sayi++;

    }); 
    
}

function ebatyansit(ths){
    var musteriebati=$(ths).val();
    $(ths).parent().parent().parent().parent().parent().find(".kapakmusteriebati span").html(musteriebati);
    $(ths).parent().parent().parent().parent().parent().parent().parent().find(".altmusteriebati").html(musteriebati);
    $(ths).parent().parent().parent().parent().parent().find(".kapakmusteriebati").hide();
}

function ebatyansiteach(ths){
    $('.tumblok').each(function(ip, objtumblok){
        var musteriebati=$(objtumblok).find(".ebatgoster").val();
        $(objtumblok).find(".kapakmusteriebati span").html(musteriebati);
        $(objtumblok).find(".altmusteriebati").html(musteriebati);
        $(objtumblok).find(".kapakmusteriebati").toggle();
        $(objtumblok).find(".kapakmusteriebati").toggle();
    }); 
    
}

function randomcolor() {
    var values = ["#aaaaaa","#bbbbbb","#cccccc","#dddddd"],
        valueToUse = values[Math.floor(Math.random() * values.length)];
    // do something with the selected value
    return valueToUse;
}

function tumblokguncelle() {
    var selectadi;
    var tumbloksayi=0;
    $('.tumblok').each(function(ip, objtumblok){
        tumbloksayi++;
        tumblokadi="tumblok"+tumbloksayi;
        $("."+tumblokadi+" .anablok1").css("background",color);
    }); 
}

function aksesuarlarnameguncelle() {
    var aksesuarlarsayi=0;
    $('.aksesuarlar').each(function(ip, objaksesuarlar){
        var tumblokyeniarray="fiyatcalismasi[aksesuar]["+aksesuarlarsayi+"][]";
        var tumblokyeniarray2="fiyatcalismasi[aksesuarmiktari]["+aksesuarlarsayi+"][]";
        var aksesuarislemname="fiyatcalismasi[aksesuarislem]["+aksesuarlarsayi+"][]";
        $(objaksesuarlar).find(".aksesuarselect").attr("name",tumblokyeniarray);
        $(objaksesuarlar).find(".aksesuarmiktari").attr("name",tumblokyeniarray2);
        $(objaksesuarlar).find(".aksesuarislem select").attr("name",aksesuarislemname);
        aksesuarlarsayi++;
    }); 
}
function arakatmanguncelle() {
    var arakatmansayi=0;
    var id=$(".getid").val();
    $('.tablekumaslar').each(function(ip, objarakatman){
        var pastalboyuname="fiyatcalismasi[pastalboyu]["+arakatmansayi+"][]";
        var pastalissayisiname="fiyatcalismasi[pastalissayisi]["+arakatmansayi+"][]";
        var birimgramajiname="fiyatcalismasi[birimgramaji]["+arakatmansayi+"][]";
        $(objarakatman).find(".kumaspastalboyukesimi input").attr("name",pastalboyuname);
        $(objarakatman).find(".kumaspastalissayisi input").attr("name",pastalissayisiname);
        $(objarakatman).find(".kumasbirimgramaji input").attr("name",birimgramajiname);

        $(objarakatman).find(".kumastr").each(function(ip, objkumastr){
            var secimkumasval=$(objkumastr).find(".secimkumas option:selected").val();
            var enbilgisiname="fiyatcalismasi[enbilgisi]["+arakatmansayi+"]["+secimkumasval+"][]";
            $(objkumastr).find(".kumasenselect").attr("name",enbilgisiname);
            var kumastipiduzenleme=$(objkumastr).find(".kumastipiduzenleme").val();
            var origin=window.location.origin;
            var kumasfiyatihref=origin+"/?s=kumaskartifiyat&a="+kumastipiduzenleme+"&id=0&kumas="+secimkumasval+"&fiyat="+id+"&blok="+arakatmansayi;
            var kumasfiyatihreforj=origin+"/?s=kumaskarti&a="+kumastipiduzenleme+"&id="+secimkumasval;
            $(objkumastr).find(".kumasduzenlea").attr("href",kumasfiyatihref);
            $(objkumastr).find(".kumasduzenleo").attr("href",kumasfiyatihreforj);
        });
        arakatmansayi++;
    }); 
}

function altislemnameguncelle() {
    var altislemsayi=0;
    $('.kapsayiciblok2').each(function(ip, objaltislem){
        var aksesuarnavlunname="fiyatcalismasi[aksesuarnavlun]["+altislemsayi+"]";
        $(objaltislem).find(".altnavlun input").attr("name",aksesuarnavlunname);
        var aksesuarnavlundovizname="fiyatcalismasi[aksesuarnavlundoviz]["+altislemsayi+"]";
        $(objaltislem).find(".altnavlun select").attr("name",aksesuarnavlundovizname);
        var aksesuaramortismanname="fiyatcalismasi[aksesuaramortisman]["+altislemsayi+"]";
        $(objaltislem).find(".altamorisman input").attr("name",aksesuaramortismanname);
        var aksesuarfirename="fiyatcalismasi[aksesuarfire]["+altislemsayi+"]";
        $(objaltislem).find(".altfire input").attr("name",aksesuarfirename);
        var aksesuarkarname="fiyatcalismasi[aksesuarkar]["+altislemsayi+"]";
        $(objaltislem).find(".altkar input").attr("name",aksesuarkarname);
        var aksesuarkomisyonname="fiyatcalismasi[aksesuarkomisyon]["+altislemsayi+"]";
        $(objaltislem).find(".altkomisyon input").attr("name",aksesuarkomisyonname);
        altislemsayi++;
    }); 
}



function birimgrhesapla(ths) {
    var birimgr;
    var kumasgrmhesaplama1;
    var kumasenihesaplama1;
    var pastalkesimhesaplama1;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumaseni=$(ths).parent().parent().find(".kumasenselect option:selected").text();
    var pastalkesimboyu=$(ths).parent().parent().find(".kumaspastalboyukesimi input").val();
    var pastalissayisi=$(ths).parent().parent().find(".kumaspastalissayisi input").val();
    kumasgrmhesaplama1=(kumasgrm/1000);
    kumasenihesaplama1=(kumaseni/100);
    pastalkesimhesaplama1=(pastalkesimboyu/100);
    birimgr=(kumasgrmhesaplama1*kumasenihesaplama1*pastalkesimhesaplama1)/pastalissayisi;
    $(ths).parent().parent().find(".kumasbirimgramaji input").val(birimgr);
}

var deger1=<?php echo (!empty($enbilgisisayi)?$enbilgisisayi:1); ?>;
function kumasarttirma(ths){
    var classeski="kumastr"+deger1;
    var tbodyeski="kumastbody"+deger1;
    var selecteski="select"+deger1;
    var degereski=deger1;
    deger1++;
    var classyeni="kumastr"+deger1;
    var tbodyyeni="kumastbody"+deger1;
    var selectyeni="select"+deger1;
    var degeryeni=deger1;
    
    var fiyat_id=$('.getid').val();
    var kumasbloksayisi=$(ths).parent().parent().parent().parent().find('.kumastr').length;
    var parca_id=kumasbloksayisi+1;

    var clone1 = $(ths).parent().parent().parent().parent().find('.kumastbody1 tr:nth-child(1)').clone();
    var clone1 = clone1.removeClass(classeski);
    var clone1 = clone1.removeClass("kumastr1");
    var clone1 =clone1.addClass(classyeni);
    var sanaltbody='<tbody class="'+tbodyyeni+'"></tbody>';
    $(ths).parent().parent().parent().parent().append(sanaltbody);
    $('.'+tbodyyeni).html(clone1);
    select2kontrol();
    kumasdegisikliktetikle();
}

function kumassilme(ths){
    $(ths).parent().parent().parent().parent().find('.silinecekkumas').each(function(iham, objham){
        var silinecekhammaliyetsayi=$(ths).parent().parent().parent().parent().find('.silinecekkumas').length;
        if(objham.checked&&silinecekhammaliyetsayi>1){
            if(iham!='0'){
                $(objham).parent().parent().remove();
                kumastrhesapla();
            }
            
        }
        if(objham.checked&&silinecekhammaliyetsayi==1){
            alert("Son kalan veriyi silemezsiniz");
        }
    });
}

function urunbasliktetik(ths){
    //$(ths).find(".uruntoggle").click();
}

var deger=1;
function aksesuararttirma(ths){
    var iplikeski="aksesuar"+deger;
    var selecteski="select"+deger;
    deger++;
    var iplikyeni="aksesuar"+deger;
    var selectyeni="select"+deger;
    var cloneObj2 = $(ths).parent().parent().parent().parent().find('.aksesuar1').clone();
    var cloneObj2 =cloneObj2.removeClass(iplikeski);
    var cloneObj2 =cloneObj2.removeClass("aksesuar1");
    var cloneObj2 =cloneObj2.addClass(iplikyeni);
    $(ths).parent().parent().parent().parent().find(".aksesuarlar").append(cloneObj2);
    select2kontrol();
    aksesuarfiyatitetikle();
}

function aksesuarsilme(ths){
    $(ths).parent().parent().parent().parent().find('.silinecekaksesuar').each(function(iham, objham){
        var silinecekhammaliyetsayi=$(ths).parent().parent().parent().parent().find('.silinecekaksesuar').length;
        if(objham.checked&&silinecekhammaliyetsayi>1){
            if(iham!='0'){
                $(objham).parent().parent().remove();
                toplamurunsayisi();
            }
        }
        if(objham.checked&&silinecekhammaliyetsayi==1){
            alert("Son kalan veriyi silemezsiniz");
        }
    });
}

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

function kumasdegistir(ths){
    var selectval=$(ths).val();
    var degisimegorevalue=selectval;
    var id=$(".getid").val();
    var kumaskarticek=window.kumaskartiall[selectval];
    var bulundugutbodyninindexkonumu=$(ths).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().index();
    var kumasbelirtilmesi="kumaskarti";
    var nesnekumastipi="0";

    var deneme=window.kumaskartiall;
    deneme=Array.from(deneme);
    deneme = deneme.filter(function(elem) {
    return !(elem.fiyat_ID == id && elem.blok_ID == bulundugutbodyninindexkonumu && elem.kumas_ID == selectval)
    });

    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&fiyat="+id+"&kumas="+selectval+"&blok="+bulundugutbodyninindexkonumu,
        success:function(gelensorgu){
            var kontrol=gelensorgu.cevap.kontrol;
            console.log(gelensorgu);
            $(ths).parent().parent().find(".modified").hide();
            if(kontrol!=0){
                kumasbelirtilmesi="kumaskartifiyat";
                kumaskarticek=window.kumaskartifiyatall[kontrol];
                $(ths).parent().parent().find(".modified").show();
                degisimegorevalue=kontrol;
            }

            
    var kumastipi=175;
    kumastipi=kumaskarticek['nesne_IDkumasTipi'];
    var kumasduzenlemetipi='duzenle';
    if(kumastipi==176){
        kumasduzenlemetipi='duzenletedarik';
    }
    if(kumastipi==180){
        kumasduzenlemetipi='duzenlekombinasyon';
    }

    var origin=window.location.origin;
    var kumasfiyatihref=origin+"/?s=kumaskartifiyat&a="+kumasduzenlemetipi+"&id=0&kumas="+selectval+"&fiyat="+id+"&blok="+bulundugutbodyninindexkonumu;
    var kumasfiyatihreforj=origin+"/?s=kumaskarti&a="+kumasduzenlemetipi+"&id="+degisimegorevalue;
    $(ths).parent().find(".kumasduzenlea").attr("href",kumasfiyatihref);
    $(ths).parent().find(".kumasduzenleo").attr("href",kumasfiyatihreforj);
    $(ths).parent().parent().find(".kumastipiduzenleme").val(kumasduzenlemetipi);
    nesnekumastipi=kumaskarticek['nesne_IDkumasTipi'];

    if(kumaskarticek!=''){
        var enTipi=kumaskarticek['enTipi'];
        //var fiyatselect='<input type="hidden" class="enintipi" name="bironemiyok" value="'+enTipi+'"><select class="fiyatselect form-control" name="fiyatcalismasi[fiyatselect]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" onchange="kumashesapla(this)"><option value="0">Fiyat Seçiniz</option>';
        var fiyatselect='<div class="fiyatselect"><input type="hidden" class="enintipi" name="bironemiyok" value="'+enTipi+'"><input type="hidden" class="doviztipi" name="doviztipi" value="'+gelendoviz+'">';

        <?php
        $enbilgisisayi=0;
        if(z(8,'a')!='ekle'){
            $enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
            $enbilgisisayi=count($enbilgisiarray);
        }
        ?>
        var sayieach=<?php echo (!empty($enbilgisisayi)?$enbilgisisayi:1); ?>;
        $(ths).parent().parent().parent().find('.kumastralt').remove();
        var randsayi=0;
        var randsayi2=0;

        var boyaveri=[];

        if(nesnekumastipi!='180'){

                $.ajax({
                    type:"POST",
                    url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&kumasgonder="+degisimegorevalue+"&kumasbelirtilmesi="+kumasbelirtilmesi,
                    success:function(gelensorgu){
                        var kumastipveri=gelensorgu.cevap.kumastipveri;
                        var randomsayi=0;
                        if(kumastipveri){
                            $.each(kumastipveri, function(k, v) {
                                var boyabaskitipiekle=kumastipveri[randomsayi];
                                randomsayi++;
                                randsayi2++;
                                fiyatselect+='<span>'+boyabaskitipiekle+'</span><br>';
                            });
                            fiyatselect+='</div>';

                            $(ths).parent().parent().find(".kumasfiyat").html(fiyatselect);
                            $(ths).parent().parent().find(".kumasenselect").prop('disabled', false);
                            $(ths).parent().parent().find(".kumasenselect").css("border","1px solid #ddd");

                            
                        } else {
                                $(ths).parent().parent().find(".kumasenselect").prop('disabled', false);
                                $(ths).parent().parent().find(".kumasenselect").css("border","1px solid #ddd");
                        }

                    }
                });

                var enselect='<select name="fiyatcalismasi[enbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" style="border:1px solid #f00;" disabled><option value="0"></option>';
                var pusselect='<select name="fiyatcalismasi[pusbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumaspusselect form-control" ><option value="0"></option>';
                var enselectaciken='<select name="fiyatcalismasi[enbilgisiaciken]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" ><option value="0"></option>';
                var kumaskartienname='kumaskarti[enbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]';
                var indeximiz=$(ths).parent().parent().index();
                var gelendoviz=kumaskarticek["nesne_IDdoviz"];
                var gelendoviz=0;
                var birimTipi=kumaskarticek["birimTipi"];
                var enTipi=kumaskarticek["enTipi"];
                var birimyansit='kg';
                if(birimTipi=='1'){
                    birimyansit='kg';
                } else {
                    birimyansit='m';
                }
                $(ths).parent().parent().find(".kumasbirim2").html(birimyansit);

                var manuelkurusd=$(".mkurusd input").val();
                var manuelkureur=$(".mkureur input").val();
                var manuelkurtl="1";
                var eurid="76";
                var tryid="74";
                var usdid="75";
                var bunacevir=manuelkurtl;
                var fiyat=0;
            
                if(gelendoviz!=''){
                    if(gelendoviz=='76'){
                        gelendoviz='EUR';
                    }
                    if(gelendoviz=='75'){
                        gelendoviz='USD';
                    }
                    if(gelendoviz=='74'){
                        gelendoviz='TRY';
                    }
                    $(ths).parent().parent().find(".kumasfiyatdoviz").html(gelendoviz);
                    $(ths).parent().parent().find(".kumasmfiyatdovizi").html("TRY");
                } else {
                    gelendoviz='TRY';
                }
                if(kumaskarticek["grm"]!=''){
                    $(ths).parent().parent().find(".kumasgrm").html(kumaskarticek["grm"]);
                }
                if(kumaskarticek["pusvefayn"]!=''){
                    var kumaspusvefayn=JSON.parse(kumaskarticek["pusvefayn"]);
                
                    $.each(kumaspusvefayn, function(k, v) {
                        if(v[0]=="on"){
                            if(v[1]){
                                if(v[1]>0){
                                    enselect=enselect+'<option value="'+(k+1)+'">'+v[1]+'</option>';
                                    pusselect=pusselect+'<option value="'+(k+1)+'">'+v[1]+'</option>';
                                }
                            }
                        }
                    });
                    enselect=enselect+'</select>';
                    pusselect=pusselect+'</select>';
                    $(ths).parent().parent().find(".kumaseni").html(enselect);
                    $(ths).parent().parent().find(".kumaspusu").html(pusselect);
                    if(kumaskarticek["eni"]!=''){
                        $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
                    }
                } else{
                    if(kumaskarticek["eni"]!=''){
                        $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
                    }
                } 


        } else {
            // kumaş kartı kombinasyon ise kullanılacak verilerin işlenmesi buradan hesaplanacak

            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&kumasgonder="+degisimegorevalue+"&kumasbelirtilmesi="+kumasbelirtilmesi+"&nesnekumastipi=180",
                success:function(gelensorgu){
                    var kumastipveri=gelensorgu.cevap.kumastipveri;
                    var randomsayi=0;
                    if(kumastipveri){
                        $.each(kumastipveri, function(k, v) {
                            var boyabaskitipiekle=kumastipveri[randomsayi];
                            randomsayi++;
                            randsayi2++;
                            fiyatselect+='<span>'+boyabaskitipiekle+'</span><br>';
                        });
                        fiyatselect+='</div>';

                        $(ths).parent().parent().find(".kumasfiyat").html(fiyatselect);
                        $(ths).parent().parent().find(".kumasenselect").prop('disabled', false);
                        $(ths).parent().parent().find(".kumasenselect").css("border","1px solid #ddd");

                        
                    } else {
                            $(ths).parent().parent().find(".kumasenselect").prop('disabled', false);
                            $(ths).parent().parent().find(".kumasenselect").css("border","1px solid #ddd");
                    }

                }
            });

            var enselect='<select name="fiyatcalismasi[enbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" style="border:1px solid #f00;" disabled><option value="0"></option>';
            var pusselect='<select name="fiyatcalismasi[pusbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumaspusselect form-control" ><option value="0"></option>';
            var enselectaciken='<select name="fiyatcalismasi[enbilgisiaciken]['+bulundugutbodyninindexkonumu+']['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" ><option value="0"></option>';
            var kumaskartienname='kumaskarti[enbilgisi]['+bulundugutbodyninindexkonumu+']['+selectval+'][]';
            var indeximiz=$(ths).parent().parent().index();
            var gelendoviz=kumaskarticek["nesne_IDdoviz"];
            var gelendoviz=0;
            var birimTipi=kumaskarticek["birimTipi"];
            var enTipi=kumaskarticek["enTipi"];
            var birimyansit='kg';
            if(birimTipi=='1'){
                birimyansit='kg';
            } else {
                birimyansit='m';
            }
            $(ths).parent().parent().find(".kumasbirim2").html(birimyansit);

            var manuelkurusd=$(".mkurusd input").val();
            var manuelkureur=$(".mkureur input").val();
            var manuelkurtl="1";
            var eurid="76";
            var tryid="74";
            var usdid="75";
            var bunacevir=manuelkurtl;
            var fiyat=0;
        
            if(gelendoviz!=''){
                if(gelendoviz=='76'){
                    gelendoviz='EUR';
                }
                if(gelendoviz=='75'){
                    gelendoviz='USD';
                }
                if(gelendoviz=='74'){
                    gelendoviz='TRY';
                }
                $(ths).parent().parent().find(".kumasfiyatdoviz").html(gelendoviz);
                $(ths).parent().parent().find(".kumasmfiyatdovizi").html("TRY");
            } else {
                gelendoviz='TRY';
            }
            if(kumaskarticek["grm"]!=''){
                $(ths).parent().parent().find(".kumasgrm").html(kumaskarticek["grm"]);
            }
            if(kumaskarticek["pusvefayn"]!=''){
                var kumaspusvefayn=JSON.parse(kumaskarticek["pusvefayn"]);
            
                $.each(kumaspusvefayn, function(k, v) {
                    if(v[0]=="on"){
                        if(v[1]){
                            if(v[1]>0){
                                enselect=enselect+'<option value="'+(k+1)+'">'+v[1]+'</option>';
                                pusselect=pusselect+'<option value="'+(k+1)+'">'+v[1]+'</option>';
                            }
                        }
                    }
                });
                enselect=enselect+'</select>';
                pusselect=pusselect+'</select>';
                $(ths).parent().parent().find(".kumaseni").html(enselect);
                $(ths).parent().parent().find(".kumaspusu").html(pusselect);
                if(kumaskarticek["eni"]!=''){
                    $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
                }
            } else{
                if(kumaskarticek["eni"]!=''){
                    $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
                }
            } 

             // kumaş kartı kombinasyon hesap bitiş



        }
        $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&kompozisyongonder="+degisimegorevalue+"&kumasbelirtilmesi="+kumasbelirtilmesi,
            success:function(gelensorgu){
                var kompmetin=gelensorgu.cevap.kompmetin;
                if(kompmetin){
                    $(ths).parent().parent().parent().find(".kumaskompozisyonu").html(kompmetin);
                }
            }
        });
    }

    $('.toplamkumasfiyat .usdfiyat b').html('0');
    $('.toplamkumasfiyat .eurfiyat b').html('0');
    $('.toplamkumasfiyat .tryfiyat b').html('0');

    $('.toplamfiyat .usdfiyat b').html('0');
    $('.toplamfiyat .eurfiyat b').html('0');
    $('.toplamfiyat .tryfiyat b').html('0');
    
    $('.kombikumastl').html('<input type="hidden" name="fiyatcalismasi[kombikumastl]" value="0">');
    $('.kombitoplamtl').html('<input type="hidden" name="fiyatcalismasi[kombitoplamtl]" value="0">');

    $(ths).parent().parent().find('.kumasfiyatselect span').html("0");
            
        }


    });





}

var kumasbilgiobject={};

function kumashesapla(ths){
    var entipi=0;
    var kumasenselect=$(ths).parent().parent().find(".kumaseni option:selected").text();
    var kumasenselectaciken=$(ths).parent().parent().find(".kumasacikeni select option:selected").text();
    var kumasenselectacikensayi=$(ths).parent().parent().find(".kumasacikeni select option").length;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumasfiyat=$(ths).parent().parent().find(".fiyatselect option:selected").text();
    var kumasbirim2=$(ths).parent().parent().find(".kumasbirim2").html();
    var entipi=$(ths).parent().parent().find(".enintipi").val();
    var kumasid=$(ths).parent().parent().find(".kumasselectli select option:selected").val();

    var selectval=$(ths).parent().parent().find(".secimkumas option:selected").val();
    var id=$(".getid").val();
    var bulundugutbodyninindexkonumu=$(ths).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().index();

    

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    var manuelkurtl="1";

    var kumasioku=window.kumaskartiall[kumasid];
    var kumasentipi=kumasioku['enTipi'];

    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&fiyat="+id+"&kumas="+selectval+"&blok="+bulundugutbodyninindexkonumu,
        success:function(gelensorgu){
            var kontrol=gelensorgu.cevap.kontrol;
            console.log(gelensorgu);
            if(kontrol!=0){
                kumasioku=window.kumaskartifiyatall[kontrol];
                console.log(kumasioku);
                $(ths).parent().parent().find(".modified").show();
            }
        }
    });
    
    

    var boyabaskicek=window.boyabaskiall;
    if(boyabaskicek!=null){
        $.each(boyabaskicek, function(k, v) {
            var cevir=v.tipi+"-";
            kumasfiyat=kumasfiyat.split(cevir).join("");
        }); 
    }
    
    var metredekilogram=0;
    var kumasmetre=0;
    $(ths).parent().parent().find(".tlfiyatkullan").val(kumasfiyat);

    
    kumasenselect=sy(kumasenselect);
    kumasenselectaciken=sy(kumasenselectaciken);
    kumasgrm=sy(kumasgrm);
    kumasfiyat=sy(kumasfiyat);
    metredekilogram=(kumasgrm/100000);

    if(kumasenselect){
        if(kumasbirim2=='kg'){
            metredekilogram=(kumasenselect*kumasgrm)/100000;
            if(entipi=='1'){
                metredekilogram=(metredekilogram)*2;
            }
        }
        kumasmetre=(metredekilogram*kumasfiyat);
    }
    
    metredekilogram=sy(metredekilogram,4);
    kumasmetre=sy(kumasmetre,4);
    $(ths).parent().parent().find(".kumasmkg").html(metredekilogram);
    $(ths).parent().parent().find(".kumasmfiyat").html(kumasmetre);
    kumastrhesapla();

    var birimgr;
    var kumasgrmhesaplama1;
    var kumasenihesaplama1;
    var pastalkesimhesaplama1;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumaseni=$(ths).parent().parent().find(".kumasenselect option:selected").text();
    var pastalkesimboyu=$(ths).parent().parent().find(".kumaspastalboyukesimi input").val();
    var pastalissayisi=$(ths).parent().parent().find(".kumaspastalissayisi input").val();
    kumasgrmhesaplama1=(kumasgrm/1000);
    kumasenihesaplama1=(kumaseni/100);
    if(kumasentipi==1){
        kumasenihesaplama1=(kumasenihesaplama1)*2;
    }
    pastalkesimhesaplama1=(pastalkesimboyu/100);
    birimgr=(kumasgrmhesaplama1*kumasenihesaplama1*pastalkesimhesaplama1)/pastalissayisi;
    var birimgr2=birimgr;
    birimgr=sy(birimgr,2);
    $(ths).parent().parent().find(".kumasbirimgramaji input").val(birimgr);

    var metrefiyatbilgi='<div class="kumasfiyatselect">';
    var kumasbirimdovizi=$(ths).parent().parent().find('.doviztipi').val();
    $(ths).parent().parent().find('.kumasfiyat span').each(function(ip, objkumasfiyat){
        var toplambilgi;
        var hesaplananbirimfiyat;
        var kumasfiyati=$(objkumasfiyat).html();
        var str = kumasfiyati;
        var res = str.split("-");
        var kumasfiyati=sy(res[1]);
        var kumassafbilgi=res[0];
        hesaplananbirimfiyat=(kumasfiyati)*birimgr2;

        if(kumasbirimdovizi=='USD'){
            hesaplananbirimfiyat=hesaplananbirimfiyat*manuelkurusd;
        }
        if(kumasbirimdovizi=='EUR'){
            hesaplananbirimfiyat=hesaplananbirimfiyat*manuelkureur;
        }

        hesaplananbirimfiyat=sy(hesaplananbirimfiyat,2);

        var fiyatidoktur=sy(hesaplananbirimfiyat);

        var kumasmetinbilgi=kumasbilgiobject[kumassafbilgi];
        var kumasbirimfiyatlari=0;
        
        if(kumasmetinbilgi){
            kumasbirimfiyatlari=kumasmetinbilgi+fiyatidoktur;
            kumasbilgiobject[kumassafbilgi]=kumasbirimfiyatlari;
        } else {
            kumasbilgiobject[kumassafbilgi]=fiyatidoktur;
        }
        
        metrefiyatbilgi+='<span>'+hesaplananbirimfiyat+'</span><br>';
    });
    metrefiyatbilgi+='</div>';

    $(ths).parent().parent().find(".kumasmfiyat").html(metrefiyatbilgi);
    setTimeout(function(){ kumasdegisikliktetikle(); }, 1000);

    
    
}

function kumashesapla2(ths){
    var entipi=0;
    var kumasenselect=$(ths).parent().parent().find(".kumaseni option:selected").text();
    var kumasenselectaciken=$(ths).parent().parent().find(".kumasacikeni select option:selected").text();
    var kumasenselectacikensayi=$(ths).parent().parent().find(".kumasacikeni select option").length;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumasfiyat=$(ths).parent().parent().find(".fiyatselect option:selected").text();
    var kumasbirim2=$(ths).parent().parent().find(".kumasbirim2").html();
    var entipi=$(ths).parent().parent().find(".enintipi").val();
    var kumasid=$(ths).parent().parent().find(".kumasselectli select option:selected").val();

    var selectval=$(ths).parent().parent().find(".secimkumas option:selected").val();
    var id=$(".getid").val();
    var bulundugutbodyninindexkonumu=$(ths).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().index();

    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    var manuelkurtl="1";

    var kumasioku=window.kumaskartiall[kumasid];
    var kumasentipi=kumasioku['enTipi'];

    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxkartkontrol&fiyat="+id+"&kumas="+selectval+"&blok="+bulundugutbodyninindexkonumu,
        success:function(gelensorgu){
            var kontrol=gelensorgu.cevap.kontrol;
            console.log(gelensorgu);
            if(kontrol!=0){
                kumasioku=window.kumaskartifiyatall[kontrol];
                console.log(kumasioku);
                $(ths).parent().parent().find(".modified").show();
            }
        }
    });
    

    var boyabaskicek=window.boyabaskiall;
    if(boyabaskicek!=null){
        $.each(boyabaskicek, function(k, v) {
            var cevir=v.tipi+"-";
            kumasfiyat=kumasfiyat.split(cevir).join("");
        }); 
    }
    
    var metredekilogram=0;
    var kumasmetre=0;
    $(ths).parent().parent().find(".tlfiyatkullan").val(kumasfiyat);

    
    kumasenselect=sy(kumasenselect);
    kumasenselectaciken=sy(kumasenselectaciken);
    kumasgrm=sy(kumasgrm);
    kumasfiyat=sy(kumasfiyat);
    metredekilogram=(kumasgrm/100000);

    if(kumasenselect){
        if(kumasbirim2=='kg'){
            metredekilogram=(kumasenselect*kumasgrm)/100000;
            if(entipi=='1'){
                metredekilogram=(metredekilogram)*2;
            }
        }
        kumasmetre=(metredekilogram*kumasfiyat);
    }
    
    metredekilogram=sy(metredekilogram,4);
    kumasmetre=sy(kumasmetre,4);
    $(ths).parent().parent().find(".kumasmkg").html(metredekilogram);
    $(ths).parent().parent().find(".kumasmfiyat").html(kumasmetre);
    kumastrhesapla();

    var birimgr;
    var kumasgrmhesaplama1;
    var kumasenihesaplama1;
    var pastalkesimhesaplama1;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumaseni=$(ths).parent().parent().find(".kumasenselect option:selected").text();
    var pastalkesimboyu=$(ths).parent().parent().find(".kumaspastalboyukesimi input").val();
    var pastalissayisi=$(ths).parent().parent().find(".kumaspastalissayisi input").val();
    kumasgrmhesaplama1=(kumasgrm/1000);
    kumasenihesaplama1=(kumaseni/100);
    if(kumasentipi==1){
        kumasenihesaplama1=(kumasenihesaplama1)*2;
    }
    pastalkesimhesaplama1=(pastalkesimboyu/100);
    birimgr=(kumasgrmhesaplama1*kumasenihesaplama1*pastalkesimhesaplama1)/pastalissayisi;
    var birimgr2=birimgr;
    birimgr=sy(birimgr,2);
    $(ths).parent().parent().find(".kumasbirimgramaji input").val(birimgr);

    var metrefiyatbilgi='<div class="kumasfiyatselect">';
    var kumasbirimdovizi=$(ths).parent().parent().find('.doviztipi').val();
    $(ths).parent().parent().find('.kumasfiyat span').each(function(ip, objkumasfiyat){
        var toplambilgi;
        var hesaplananbirimfiyat;
        var kumasfiyati=$(objkumasfiyat).html();
        var str = kumasfiyati;
        var res = str.split("-");
        var kumasfiyati=sy(res[1]);
        var kumassafbilgi=res[0];
        hesaplananbirimfiyat=(kumasfiyati)*birimgr2;

        if(kumasbirimdovizi=='USD'){
            hesaplananbirimfiyat=hesaplananbirimfiyat*manuelkurusd;
        }
        if(kumasbirimdovizi=='EUR'){
            hesaplananbirimfiyat=hesaplananbirimfiyat*manuelkureur;
        }

        hesaplananbirimfiyat=sy(hesaplananbirimfiyat,2);

        var fiyatidoktur=sy(hesaplananbirimfiyat);

        var kumasmetinbilgi=kumasbilgiobject[kumassafbilgi];
        var kumasbirimfiyatlari=0;
        
        if(kumasmetinbilgi){
            kumasbirimfiyatlari=kumasmetinbilgi+fiyatidoktur;
            kumasbilgiobject[kumassafbilgi]=kumasbirimfiyatlari;
        } else {
            kumasbilgiobject[kumassafbilgi]=fiyatidoktur;
        }
        
        metrefiyatbilgi+='<span>'+hesaplananbirimfiyat+'</span><br>';
    });
    metrefiyatbilgi+='</div>';

    $(ths).parent().parent().find(".kumasmfiyat").html(metrefiyatbilgi);
    
}

function kumasfiyatguncelle(ths){
    kumashesapla(ths);
}


function kumastrhesapla(ths){
    var toplamfiyattl=0;
    var toplamfiyateur=0;
    var toplamfiyatusd=0;
    var tlfiyat=0;
    var tlfiyatboyabaski=0;
    var karorani=0;
    var fiyat=0;
    var manuelkurusd=$(".mkurusd input").val();
    var manuelkureur=$(".mkureur input").val();
    var manuelkurtl="1";
    var eurid="76";
    var tryid="74";
    var usdid="75";
    var gelendoviz="";
    var bunacevir=manuelkurtl;

    $('.kumastr').each(function(ip, objoran){
        var kumasmfiyat=$(objoran).find(".fiyatselect option:selected").text();

        var boyabaskicek=window.boyabaskiall;
        if(boyabaskicek!=null){
            $.each(boyabaskicek, function(k, v) {
                var cevir=v.tipi+"-";
                kumasmfiyat=kumasmfiyat.split(cevir).join("");
            }); 
        }
      
        var kumasmfiyattl=$(objoran).find(".tlfiyatkullan").val();
        var kumasmfiyatdovizi=$(objoran).find(".kumasmfiyatdovizi").html();
        var gelendoviz=kumasmfiyatdovizi;
        var fiyat=kumasmfiyattl;
        if(gelendoviz!=''){
            if(gelendoviz=='76'){
                gelendoviz='EUR';
            }
            if(gelendoviz=='75'){
                gelendoviz='USD';
            }
            if(gelendoviz=='74'){
                gelendoviz='TRY';
            }
        }
        if(gelendoviz=='TRY'){
            fiyat=sy(fiyat)*manuelkurtl;
        }
        if(gelendoviz=='USD'){
            fiyat=sy(fiyat)*manuelkurusd;
        }
        if(gelendoviz=='EUR'){
            fiyat=sy(fiyat)*manuelkureur;
        }
        fiyat=sy(fiyat);
        tlfiyat=tlfiyat+fiyat;
    }); 

    
    if(tlfiyat){
        toplamfiyattl=tlfiyat;
        toplamfiyateur=(tlfiyat)/manuelkureur;
        toplamfiyatusd=(tlfiyat)/manuelkurusd;
        var cevirondalıktoplamtl=sy(toplamfiyattl,4);
        var cevirondalıktoplameur=sy(toplamfiyateur,4);
        var cevirondalıktoplamusd=sy(toplamfiyatusd,4);
        $('.toplamkumasfiyat .usdfiyat b').html(cevirondalıktoplamusd);
        $('.toplamkumasfiyat .eurfiyat b').html(cevirondalıktoplameur);
        $('.toplamkumasfiyat .tryfiyat b').html(cevirondalıktoplamtl);

        $('.toplamfiyat .usdfiyat b').html(cevirondalıktoplamusd);
        $('.toplamfiyat .eurfiyat b').html(cevirondalıktoplameur);
        $('.toplamfiyat .tryfiyat b').html(cevirondalıktoplamtl);

        $('.kombikumastl').html('<input type="hidden" name="fiyatcalismasi[kombikumastl]" value="'+toplamfiyattl+'">');
        $('.kombitoplamtl').html('<input type="hidden" name="fiyatcalismasi[kombitoplamtl]" value="'+toplamfiyattl+'">');
    }

    $('.boyabaskitr').each(function(ip, objoran){
        var boyabaskimfiyat=$(objoran).find(".boyabaskimfiyat").html();
        var boyabaskimfiyatdovizi=$(objoran).find(".boyabaskimfiyatdovizi").html();
        var gelendoviz=boyabaskimfiyatdovizi;
        var fiyat=boyabaskimfiyat;
        if(gelendoviz!=''){
            if(gelendoviz=='76'){
                gelendoviz='EUR';
            }
            if(gelendoviz=='75'){
                gelendoviz='USD';
            }
            if(gelendoviz=='74'){
                gelendoviz='TRY';
            }
        }
        if(gelendoviz=='TRY'){
            fiyat=sy(fiyat)*manuelkurtl;
        }
        if(gelendoviz=='USD'){
            fiyat=sy(fiyat)*manuelkurusd;
        }
        if(gelendoviz=='EUR'){
            fiyat=sy(fiyat)*manuelkureur;
        }
        fiyat=sy(fiyat);
        if(gelendoviz!='doviz'){
            tlfiyatboyabaski=tlfiyatboyabaski+fiyat;
        }
    }); 
    


    if(tlfiyatboyabaski){
        tlfiyatboyabaski=tlfiyatboyabaski+toplamfiyattl;
        toplamfiyattl=tlfiyatboyabaski;
        toplamfiyateur=(tlfiyatboyabaski)/manuelkureur;
        toplamfiyatusd=(tlfiyatboyabaski)/manuelkurusd;
        var cevirondalıktoplamtl=sy(toplamfiyattl,4);
        var cevirondalıktoplameur=sy(toplamfiyateur,4);
        var cevirondalıktoplamusd=sy(toplamfiyatusd,4);
        $('.toplamkumasfiyat .usdfiyat b').html(cevirondalıktoplamusd);
        $('.toplamkumasfiyat .eurfiyat b').html(cevirondalıktoplameur);
        $('.toplamkumasfiyat .tryfiyat b').html(cevirondalıktoplamtl);

        $('.toplamfiyat .usdfiyat b').html(cevirondalıktoplamusd);
        $('.toplamfiyat .eurfiyat b').html(cevirondalıktoplameur);
        $('.toplamfiyat .tryfiyat b').html(cevirondalıktoplamtl);

        $('.kombikumastl').html('<input type="hidden" name="fiyatcalismasi[kombikumastl]" value="'+toplamfiyattl+'">');
        $('.kombitoplamtl').html('<input type="hidden" name="fiyatcalismasi[kombitoplamtl]" value="'+toplamfiyattl+'">');
    }

    $('.karoranlari').each(function(ip, objoran){
        var karoranlarimoran=$(objoran).val();
        karoranlarimoran=sy(karoranlarimoran);
        if(karoranlarimoran){
            karorani=karorani+karoranlarimoran;
        }
    }); 
    if(tlfiyatboyabaski){ }else {
        tlfiyatboyabaski=toplamfiyattl;
    }

    if(karorani){
        var karlioran=(karorani+100)/100
        tlfiyatboyabaski=(tlfiyatboyabaski*karlioran);
        toplamfiyattl=tlfiyatboyabaski;
        toplamfiyateur=(tlfiyatboyabaski)/manuelkureur;
        toplamfiyatusd=(tlfiyatboyabaski)/manuelkurusd;
        var cevirondalıktoplamtl=sy(toplamfiyattl,4);
        var cevirondalıktoplameur=sy(toplamfiyateur,4);
        var cevirondalıktoplamusd=sy(toplamfiyatusd,4);
        $('.toplamfiyat .usdfiyat b').html(cevirondalıktoplamusd);
        $('.toplamfiyat .eurfiyat b').html(cevirondalıktoplameur);
        $('.toplamfiyat .tryfiyat b').html(cevirondalıktoplamtl);

        $('.kombitoplamtl').html('<input type="hidden" name="fiyatcalismasi[kombitoplamtl]" value="'+toplamfiyattl+'">');
    }
   
}


function urunkategoridegistir(ths){
    var urunkategorileri_ID = $(ths).val();
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&urunkategori_ID="+urunkategorileri_ID,
        success:function(gelensorgu){
            console.log(gelensorgu);
            console.log("gelensorgu");
            if(gelensorgu.sonuc==1){
                var ebatlar=gelensorgu.cevap.ebatlar;
                if(ebatlar!=null){
                    $(ths).parent().parent().parent().find(".urunebatlari option").remove();
                    var urunebatlari='<option value="0">Seçiniz</option>';
                    $.each(ebatlar, function(k, v) {
                        urunebatlari+='<option value="'+v.nesne_IDurunebatlari+'">'+v.sanalveri+'</option>';
                    }); 
                    $(ths).parent().parent().parent().find(".urunebatlari").html(urunebatlari);
                    select2kontrol();
                } else {
                    $(ths).parent().parent().parent().find(".urunebatlari option").remove();
                }
            } else {
                alert('Ürün ebatlarını okuma başarısız');
            }
        }
    });
}

function urunebatininfiyatiniyansit(ths){
    var urunkategorileri_ID = $(ths).parent().parent().parent().find(".urunkategorileri option:selected").val();
    var urunebatlari_ID = $(ths).val();
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&urunebatlari_ID="+urunebatlari_ID+"&urunkategori_ID="+urunkategorileri_ID,
        success:function(gelensorgu){
            if(gelensorgu.sonuc==1){
                var fasonfiyati=gelensorgu.cevap.fasonfiyati;
                if(fasonfiyati!=null){
                    $(ths).parent().parent().parent().find(".fasonfiyati").val(fasonfiyati);
                }
            } else {
                alert('Fason fiyatını okuma başarısız');
            }
        }
    });
}

function toplamurunsayisi(ths){
 var tumbloksayisi=$(".tumblok").length;
 $(".toplambloksayisi").val(tumbloksayisi);
}

function aksesuarfiyatyansit(ths){
    var aksesuardanoku;
    var aksesuarbirimtipi;
    var aksesuarbirimtipiid;
    var aksesuarkartival=$(ths).val();

    if(aksesuarkartival){
        aksesuardanoku=window.aksesuarkartiall[aksesuarkartival];
        aksesuarbirimtipiid=aksesuardanoku['nesne_IDbirimTipi'];
        aksesuarbirimtipi=window.nesneall[aksesuarbirimtipiid]['metin1'];
        var aksesuardoviz=aksesuardanoku['nesne_IDdoviz'];
        var aksesuardoviztipi='₺';
        if(aksesuardoviz=='74'){
            aksesuardoviztipi='₺';
        }
        if(aksesuardoviz=='75'){
            aksesuardoviztipi='$';
        }
        if(aksesuardoviz=='76'){
            aksesuardoviztipi='€';
        }
        if(aksesuardanoku['fiyat']){
            var aksesuarokufiyati=sy(aksesuardanoku['fiyat'],2);
            var aksesuarfiyatliadet='<div>'+aksesuarokufiyati+' '+aksesuardoviztipi+'</div> <span>'+aksesuarbirimtipi+'</span>';
            $(ths).parent().parent().find(".aksesuarfiyat").html(aksesuarfiyatliadet);
        }
        if(aksesuardanoku['nesne_IDdoviz']){
            if(aksesuardanoku['nesne_IDdoviz']=='74'){
                $(ths).parent().parent().find(".aksesuardoviz").html("₺");
            }
            if(aksesuardanoku['nesne_IDdoviz']=='75'){
                $(ths).parent().parent().find(".aksesuardoviz").html("$");
            }
            if(aksesuardanoku['nesne_IDdoviz']=='76'){
                $(ths).parent().parent().find(".aksesuardoviz").html("€");
            }
        }
        var origin=window.location.origin;
        var aksesuarduzenlemeurl=origin+'/?s=aksesuarkarti&a=duzenle&id='+aksesuarkartival;
        $(ths).parent().find(".aksesuarduzenle").attr("href",aksesuarduzenlemeurl);
    }
    aksesuarfiyatitetikle();
    aksesuarcarptir(ths);
}



</script>

<script type="text/javascript">
    $(document).ready(function(){
        /*$('.urunkategorileri').change(function() {
            var urunkategorileri_ID = $(".urunkategorileri option:selected").val();
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&urunkategori_ID="+urunkategorileri_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        var ebatlar=gelensorgu.cevap.ebatlar;
                        if(ebatlar!=null){
                            $('.urunebatlari option').remove();
                            $('<option>').val(0).text("Seçiniz").appendTo('.urunebatlari');
                            $.each(ebatlar, function(k, v) {
                                $('<option>').val(v.nesne_IDurunebatlari).text(v.sanalveri).appendTo('.urunebatlari');
                            }); 
                        } else {
                            $('.urunebatlari option').remove();
                        }
                    } else {
                        alert('Ürün ebatlarını okuma başarısız');
                    }
                }
            });
        });*/

        /*$('.urunebatlari').change(function() {
            var urunkategorileri_ID = $(".urunkategorileri option:selected").val();
            var urunebatlari_ID = $(".urunebatlari option:selected").val();
            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=fiyatcalismasi&a=ajaxsorgu&urunebatlari_ID="+urunebatlari_ID+"&urunkategori_ID="+urunkategorileri_ID,
                success:function(gelensorgu){
                    if(gelensorgu.sonuc==1){
                        var fasonfiyati=gelensorgu.cevap.fasonfiyati;
                        if(fasonfiyati!=null){
                            $(".fasonfiyati").val(fasonfiyati);
                        }
                    } else {
                        alert('Fason fiyatını okuma başarısız');
                    }
                }
            });
        });*/
    });
</script>



<?php 
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
?>

<?php $urunsayi=(!empty($_X['urunsayi'])?$_X['urunsayi']:'1'); ?>



<?php
$sonsorgu="WHERE arsiv!='-1' ORDER BY ID DESC LIMIT 1";
$sonfiyatcalismasinicek=z(1,$sonsorgu,'','fiyatcalismasi');
$teklifbaslik='OFR-';
$teklifkodu="";
$teklifyili=date("Y");
$teklifsayiyeni=1;
if (!empty($sonfiyatcalismasinicek[0])) {
    $teklifsayieski=(!empty($sonfiyatcalismasinicek[0]['teklifsayi'])?$sonfiyatcalismasinicek[0]['teklifsayi']+1:'0');
    $teklifsayiyeni=$teklifsayieski;
}
if(!empty($_X['teklifsayi'])){
    $teklifsayiyeni=(!empty($_X['teklifsayi'])?$_X['teklifsayi']:$teklifsayiyeni);
}
if(!empty($_X['teklifyili'])){
    $teklifyili=(!empty($_X['teklifyili'])?$_X['teklifyili']:$teklifyili);
}
$teklifkodu=$teklifbaslik.$teklifyili.'-'.$teklifsayiyeni;
if(!empty($_X['teklifkodu'])){
    $teklifkodu=(!empty($_X['teklifkodu'])?$_X['teklifkodu']:$teklifkodu);
}
?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Teklif Kodu </label>
    <div class="col-lg-9">
        <input type="text" class="form-control" tabindex="1" name="<?php echo $tbl?>[teklifkodu]" disabled="disabled" autofocus="autofocus" value="<?php echo $teklifkodu; ?>" autocomplete="off" style="color: black;font-weight: bold;">
        <input type="hidden" name="<?php echo $tbl?>[teklifkodu]" value="<?php echo $teklifkodu; ?>">
        <input type="hidden" name="<?php echo $tbl?>[teklifyili]" value="<?php echo $teklifyili; ?>">
        <input type="hidden" name="<?php echo $tbl?>[teklifsayi]" value="<?php echo $teklifsayiyeni; ?>">
    </div>
</div>
<input type="hidden" class="getid" value="<?php echo z(8,'id'); ?>">


<?php
$caricek=z(1,"WHERE arsiv='0'",'','cari');
$kumaskarticek=z(1,"WHERE arsiv='0' AND revize_ID='0'",'','kumaskarti');
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='urunkategorileri' OR ad='urunebatlari' ",'ID,ad,metin1,metin2','nesne'));
?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Müşteri </label>
    <div class="col-lg-9">
    <select name="<?php echo $tbl?>[cari_ID]" class="form-control select2 select-search">
    <option value="0">Seçiniz</option>
    <?php if(!empty($caricek)){ ?>
        <?php foreach($caricek as $cari){ ?>
        <option value="<?php echo $cari['ID']; ?>" <?php if(!empty($_X['cari_ID'])&&$_X['cari_ID']==$cari['ID']){ echo 'selected'; } ?>><?php echo (!empty($cari['ad'])?$cari['ad'].' ':' ').' '.(!empty($cari['soyad'])?$cari['soyad'].' ':' '); ?></option>
        <?php } ?>
    <?php } ?>
    </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Teklif Konusu </label>
    <div class="col-lg-9">
        <textarea name="<?php echo $tbl?>[teklifkonusu]" class="form-control"><?php echo !empty($_X['teklifkonusu'])?$_X['teklifkonusu']:''?></textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-3 col-form-label"> Referans(Kimden geldi) </label>
    <div class="col-lg-9">
        <textarea name="<?php echo $tbl?>[referans]" class="form-control"><?php echo !empty($_X['referans'])?$_X['referans']:''?></textarea>
    </div>
</div>

<?php if(z(8,'a')=='ekle'){ ?>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Set Durumu</label>
    <div class="col-lg-9">
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" id="tek1" class="form-check-input-styled" name="<?php echo $tbl?>[durum]" value="1" <?php if(!empty($_X['durum'])&&$_X['durum']==1){ echo 'checked'; } ?>>
                Set
            </label>
            <label class="form-check-label">
                <input type="radio" id="cift2" class="form-check-input-styled" name="<?php echo $tbl?>[durum]" value="2" <?php if(!empty($_X['durum'])&&$_X['durum']==2){ echo 'checked'; } ?>>
                Normal
            </label>
        </div>
    </div>
</div> 
<?php } ?>


<?php if(z(8,'a')=='duzenle'){ ?>
<?php $konfeksiyonmaliyetleri=z(1,"WHERE arsiv='0'",'','konfeksiyonmaliyetleri'); ?>
<?php $urunkategorileri=z(1,"WHERE ad='urunkategorileri'",'','nesne'); $urunkategorileri=z(37,$urunkategorileri); ?>
<?php $urunebatlari=z(1,"WHERE ad='urunebatlari'",'','nesne'); ?>
<?php //$aksesuargruplari=z(1,"WHERE ad='aksesuargruplari'",'','nesne'); ?>
<?php $aksesuargruplari=z(1,"WHERE arsiv='0'",'','aksesuarkarti'); ?>
<?php 
$urunkategorileriarray=(!empty($_X['urunkategorileri'])?json_decode($_X['urunkategorileri'],1):'');
$hesaplanacakebatlararray=(!empty($_X['hesaplanacakebatlar'])?json_decode($_X['hesaplanacakebatlar'],1):'');
$fasonfiyatiarray=(!empty($_X['fasonfiyati'])?json_decode($_X['fasonfiyati'],1):'');
$musteriebatiarray=(!empty($_X['musteriebati'])?json_decode($_X['musteriebati'],1):'');
$aksesuararray=(!empty($_X['aksesuar'])?json_decode($_X['aksesuar'],1):'');
$aksesuarmiktariarray=(!empty($_X['aksesuarmiktari'])?json_decode($_X['aksesuarmiktari'],1):'');
?>
<h2>Fiyat Çalışması <span class="fiyatcogalt">ÇOĞALT</span></h2>
<div class="bloklar">
<?php $urunsayi=0; $artansayi=0; $artmissayi=0; ?>
    <?php if(!empty($urunkategorileriarray)){ foreach ($urunkategorileriarray as $uk => $uksingle) { $urunsayi++; ?>
        <div class="tumblok tumblok<?php echo $urunsayi; ?>">
        <div class="anablok1">
            <div class="kapsayiciblok">
                <h2 class="urunbaslik" onclick="urunbasliktetik(this)"><?php echo $urunsayi; ?>.Ürün <span class="kapakmusteriebati"><b>Müşteri Ebatı :</b> <span><?php echo (!empty($musteriebatiarray[$uk])?$musteriebatiarray[$uk]:0); ?></span></span><span class="uruntoggle" onclick="uruntoggle(this)"><i class="icon-circle-right2 mr-3 ml-3 icon-2x"></i></span><span class="altdovizbirimi"></span><span class="toplamaltfiyat"></span></h2>
                <div class="form-group formrow row">
                    <div class="icblok urunblok col-12">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Kategori </label>
                            <div class="col-lg-8">
                                <select name="<?php echo $tbl; ?>[urunkategorileri][]" onchange="urunkategoridegistir(this)" class="form-control urunkategorileri select-search select2">
                                    <option value="0">Seçiniz</option>
                                    <?php if(!empty($konfeksiyonmaliyetleri)){ foreach ($konfeksiyonmaliyetleri as $urnk => $ukategori) { ?>
                                    <?php $urunkategorinesne_id=(!empty($ukategori['nesne_IDurunkategorileri'])?$ukategori['nesne_IDurunkategorileri']:0); $konfeksiyonkategoriad = (!empty($urunkategorileri[$urunkategorinesne_id]['metin1'])?$urunkategorileri[$urunkategorinesne_id]['metin1']:''); ?>
                                        <option value="<?php echo $ukategori['ID']; ?>" <?php if($urunkategorileriarray[$uk]==$ukategori['ID']){ echo 'selected'; } ?>><?php echo $konfeksiyonkategoriad; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <?php if(ytk('nesne','listele')||$admn){ ?>
                                    <a href=".?s=nesne&dznl=urunkategorileri" target="_blank"><i class="icon-pencil7 mr-3 icon-1x"></i></a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Hesaplanacak Ebat</label>
                            <div class="col-lg-9">
                            <select name="<?php echo $tbl; ?>[hesaplanacakebatlar][]" class="form-control urunebatlari select-search select2" onchange="urunebatininfiyatiniyansit(this)">
                                <option value="0">Seçiniz</option>
                                <?php if(!empty($urunebatlari)){ foreach ($urunebatlari as $urne => $uebat) { ?>
                                    <option value="<?php echo $uebat['ID']; ?>" <?php if($hesaplanacakebatlararray[$uk]==$uebat['ID']){ echo 'selected'; } ?>><?php echo (!empty($uebat['metin1'])?$uebat['metin1']:''); ?></option>
                                <?php } } ?>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Fason Fiyatı</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control fasonfiyati" tabindex="1" placeholder="" name="<?php echo $tbl; ?>[fasonfiyati][]" autofocus="autofocus" value="<?php echo (!empty($fasonfiyatiarray[$uk])?$fasonfiyatiarray[$uk]:0); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Müşteri Ebatı</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control ebatgoster" onkeyup="ebatyansit(this)" tabindex="1" placeholder="ÖRNEK => 150x200" name="<?php echo $tbl; ?>[musteriebati][]" autofocus="autofocus" value="<?php echo (!empty($musteriebatiarray[$uk])?$musteriebatiarray[$uk]:0); ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row table-responsive" style="padding:2px;">
                        <table class="table tablekumaslar" style="border:none;">
                            <thead>
                                <tr>
                                    <th scope="col">Kumaş Seçimi 
                                    &nbsp;<a href="#kumascogalt" onclick="kumasarttirma(this)" class="kumasarttir btn btn-success" style="padding: 4px;padding-top: 0px;padding-bottom: 0px;"><b style="font-size: 11px;color: white;font-weight: 400;"> Ekle </b></a></th>
                                    <th scope="col">Kompozisyon</th>
                                    <th scope="col" >Gr/m </th>
                                    <th scope="col">Kumaş Eni </th>
                                    <th scope="col" class="kumaspusuth">Kumaş Pusu </th>
                                    <th scope="col">Pastal Boyu Kesim</th>
                                    <th scope="col">Pastal İş Sayısı</th>
                                    <th scope="col">Birim Gramajı</th>
                                    <th scope="col" colspan="1">Kumaş Fiyatı</th>
                                    <th scope="col" colspan="2">Kumaş Birim Fiyatı</th>
                                </tr>
                            </thead>
                            <tbody class="kumastbody1">
                            
                            <?php
                            $enbilgisicek=$_X['enbilgisi'];
                            $enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
                            $enbilgisicekaciken=$_X['enbilgisiaciken'];
                            $enbilgisiacikenarray=(!empty($_X['enbilgisiaciken'])?json_decode($_X['enbilgisiaciken'],1):'');
                            $pusbilgisicek=$_X['pusbilgisi'];
                            $pusbilgisiarray=(!empty($_X['pusbilgisi'])?json_decode($_X['pusbilgisi'],1):'');
                            $pastalboyu=$_X['pastalboyu'];
                            $pastalboyuarray=(!empty($_X['pastalboyu'])?json_decode($_X['pastalboyu'],1):'');
                            $pastalissayisi=$_X['pastalissayisi'];
                            $pastalissayisiarray=(!empty($_X['pastalissayisi'])?json_decode($_X['pastalissayisi'],1):'');
                            $birimgramaji=$_X['birimgramaji'];
                            $birimgramajiarray=(!empty($_X['birimgramaji'])?json_decode($_X['birimgramaji'],1):'');
                            $aksesuarislem=$_X['aksesuarislem'];
                            $aksesuarislemarray=(!empty($_X['aksesuarislem'])?json_decode($_X['aksesuarislem'],1):'');
                            $ensayi=0;
                            $ensayiyeni=0;
                            $tipsayi=0;
                            $ensayi2=1;
                            $ensayiyeni2=0;
                            $kumaskartipusvefaynaciken='';
                            $kumaskartipusvefayn='';
                            $artacakolansayi=0;
                            $sorgukumas=0;
                            $pastalsayi=0;
                                
                                if(!empty($enbilgisiarray[$uk])){ $kumasbirimfiyatiarray=array(); $kumasbirimmetniarray=array(); $aksesuarfiyatitoplam=0; foreach($enbilgisiarray[$uk] as $ien2 => $enbilgisi2){ 
                                    $ensayi++;
                                    $ensayi2++;
                                    $enoption=(!empty($enbilgisiacikenarray[$ien2][0])?$enbilgisiacikenarray[$ien2][0]:0);
                                    $ensayi2=0;
                                    $altsayi=0;
                                    $tipsayi=0;
                                    $ipliksayi=0;

                                    if($ensayi>1){ echo '</tbody><tbody class="kumastbody'.$ensayi2.'">'; } 

                                    $enbilgisi2degismis=(!empty($enbilgisi2[0])?$enbilgisi2[0]:0);
                                    $pusbilgisi2degismis=(!empty($enbilgisi2[0])?$enbilgisi2[0]:0);
                                    $kumaskartibilgisi=z(1,$ien2,'','kumaskarti');
                                    $orjkumas=$kumaskartibilgisi;
                                    // Buradan klonlanmış kartın ayarını güncelleyeceğiz..
                                    $fiyat_id=z(8,'id');
                                    $kumas_id=$ien2;
                                    $blok_id=$artmissayi;
                                    $kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$kumas_id."' AND blok_ID='".$blok_id."'";
                                    //echo $kumasfiyatkontrol.'-';
                                    $kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
                                    $kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);
                                    $kumaskartibilgisi=$kumasfiyatveri;
                                    $kumasorjid=(!empty($kumaskartibilgisi['kumas_ID'])?$kumaskartibilgisi['kumas_ID']:$orjkumas['ID']);

                                    $kumaskartipusvefayn=(!empty($kumaskartibilgisi['pusvefayn'])?json_decode($kumaskartibilgisi['pusvefayn'],1):'');
                                    $kumaskartipusvefaynaciken=(!empty($kumaskartibilgisi['pusvefaynaciken'])?json_decode($kumaskartibilgisi['pusvefaynaciken'],1):'');
                                    $kumaskartifiyatlar=(!empty($kumaskartibilgisi['fiyatlar'])?json_decode($kumaskartibilgisi['fiyatlar'],1):'');
                                    $kumaskartibirimTipi=(!empty($kumaskartibilgisi['birimTipi'])?json_decode($kumaskartibilgisi['birimTipi'],1):'');
                                    $birimyansit='kg';
                                    if($kumaskartibirimTipi=='1'){
                                        $birimyansit='kg';
                                    } else {
                                        $birimyansit='m';
                                    }
                                    $kumaskartifiyat=0;
                                    if(!empty($kumaskartifiyatlar[$ensayi2])){
                                        $kumaskartifiyat=$kumaskartifiyatlar[$ensayi2];
                                    } elseif (!empty($kumaskartibilgisi['kumasfiyat'])) {
                                        $kumaskartifiyat=$kumaskartibilgisi['kumasfiyat'];
                                    }
                                    $manuelkurusd=(!empty($kumaskartibilgisi['mkurusd'])?$kumaskartibilgisi['mkurusd']:'');
                                    $manuelkureur=(!empty($kumaskartibilgisi['mkureur'])?$kumaskartibilgisi['mkureur']:'');
                                    $kumaskartidoviz=(!empty($kumaskartibilgisi['nesne_IDdoviz'])?$kumaskartibilgisi['nesne_IDdoviz']:'');

                                    $kumaskartidovizmetin='';
                                    $kumaskartidovizmiktar=0;
                                    if($kumaskartidoviz=='74'){
                                        $kumaskartidovizmetin='TRY';
                                        $kumaskartidovizmiktar=1;
                                    }
                                    if($kumaskartidoviz=='75'){
                                        $kumaskartidovizmetin='USD';
                                        $kumaskartidovizmiktar=$manuelkurusd;
                                    }
                                    if($kumaskartidoviz=='76'){
                                        $kumaskartidovizmetin='EUR';
                                        $kumaskartidovizmiktar=$manuelkureur;
                                    }
                                    if(!empty($kumaskartidovizmiktar)){
                                        $kumaskartifiyat=($kumaskartifiyat/$kumaskartidovizmiktar);
                                    }

                                    
                                    $manuelkurtl=1;
                                    $ensayi2++; 
                                    $metinhazirla='';
                                    $iplikkartlarimetin="";
                                    $iplikkartlarimetin2="";
                                    $kompozisyonarray=array();
                                    if(!empty($kumaskartibilgisi['iplikkartlari'])){
                                        $_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
                                        $iplikkartlaricek=$kumaskartibilgisi['iplikkartlari'];
                                        $iplikkartlariarray=(!empty($kumaskartibilgisi['iplikkartlari'])?json_decode($kumaskartibilgisi['iplikkartlari'],1):'');
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
                                    $ensayiyeni++;
                                    $class='';
                                    $style='';
                                    if($altsayi!='0'){
                                        $class='kumastralt';
                                        $style='';
                                    } else {
                                        $class='';
                                        $style='';
                                    }
                                    $altsayi++;
                            ?>
                                    <?php
                                    $vtkumasfiyat=(!empty($_X['fiyatselect'])?json_decode($_X['fiyatselect'],1):'');
                                    $kumasfiyatisayisi=(!empty($vtkumasfiyat[$artansayi][$ien2][0])?$vtkumasfiyat[$artansayi][$ien2][0]:0);
                                    $sorgukumas++;
                                    $eachvtfiyat=(!empty($vtkumasfiyat[$ien2][$tipsayi])?$vtkumasfiyat[$ien2][$tipsayi]:'0');
                                    $eachvtfiyat2=(!empty($vtkumasfiyat[$ien2][$tipsayi])?($vtkumasfiyat[$ien2][$tipsayi]-1):'0');
                                    $kumastrfiyati=(!empty($kumaskartifiyatlar[$eachvtfiyat2])?$kumaskartifiyatlar[$eachvtfiyat2]:'0');
                                    if(!empty($kumaskartidovizmiktar)){
                                        $kumastrfiyati=($kumastrfiyati/$kumaskartidovizmiktar);
                                    }

                                    ?>
                                    <?php $kumaseni=0; if(!empty($kumaskartipusvefayn)){ foreach ($kumaskartipusvefayn as $kmspus2 => $kmspus2cek) { ?>
                                        <?php if(($kmspus2+1)==$enbilgisi2degismis){ $kumaseni=$kmspus2cek[1]; } ?>
                                    <?php } } ?>
                                    <?php
                                        $kumasgrm=(!empty($kumaskartibilgisi['grm'])?$kumaskartibilgisi['grm']:'');
                                        $kumasid=(!empty($kumaskartibilgisi['ID'])?$kumaskartibilgisi['ID']:0);
                                        $kumasentipi=(!empty($kumaskartibilgisi['enTipi'])?$kumaskartibilgisi['enTipi']:'');
                                        $nesnekumastipiorj=(!empty($kumaskartibilgisi['nesne_IDkumasTipi'])?$kumaskartibilgisi['nesne_IDkumasTipi']:'');
                                        $fiyat_id=z(8,'id');
                                        $kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$ien2."' AND blok_ID='".$artmissayi."'";
                                        $kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
                                        $kumasfiyattablo2=$kumasfiyattablo[0];
                                        $kumasfiyat_id=(!empty($kumasfiyattablo2['ID'])?$kumasfiyattablo2['ID']:0);
                                        $nesnekumastipi=(!empty($kumasfiyattablo2['nesne_IDkumasTipi'])?$kumasfiyattablo2['nesne_IDkumasTipi']:'');

                                        $kumastipiduzenle='duzenle';
                                        if($nesnekumastipi=='176'){
                                            $kumastipiduzenle='duzenletedarik';
                                        }
                                        if($nesnekumastipi=='180'){
                                            $kumastipiduzenle='duzenlekombinasyon';
                                        }

                                        $kumastipiduzenleorj='duzenle';
                                        if($nesnekumastipiorj=='176'){
                                            $kumastipiduzenleorj='duzenletedarik';
                                        }
                                        if($nesnekumastipiorj=='180'){
                                            $kumastipiduzenleorj='duzenlekombinasyon';
                                        }

                                        $kumasmhesabi=($kumasgrm/100000);
                                        if($birimyansit=='kg'){
                                            $kumasmhesabi=($kumaseni*$kumasgrm)/100000;
                                            //$kumasmhesabi=($kumasmhesabi*2);
                                        }
                                        $kumasmetrefiyati=($kumaskartifiyat*$kumasmhesabi);
                                        $boyamaliyetarray=array();
                                        $boyamaliyetpush=array();
                                        $boyamaliyetarray=(!empty($kumaskartibilgisi['boyamaliyet'])?json_decode($kumaskartibilgisi['boyamaliyet'],1):'');
                                        if(!empty($boyamaliyetarray)){
                                            $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
                                        }
                                        if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ 
                                            $ustboyabaskicek=z(1,$bymlyt,'','boyabaski');
                                            $boyabaskitipiust=(!empty($ustboyabaskicek['tipi'])?$ustboyabaskicek['tipi'].'-':'-');
                                            array_push($boyamaliyetpush,$boyabaskitipiust);
                                        } } 
                                        ?>
                                    <tr class="kumastr kumastr<?php echo $ensayiyeni; ?> <?php echo $class; ?>">
                                    
        
                                        <td class="kumasselectli">
                                            <span class="secilidurum btn btn-danger" onclick="secilikumasisil(this)">Sil</span>
                                            <a href="./?s=kumaskartifiyat&a=<?php echo $kumastipiduzenle; ?>&id=<?php echo $kumasfiyat_id; ?><?php echo "&kumas=".$ien2."&fiyat=".$fiyat_id."&blok=".$artmissayi; ?>" class="kumasduzenlea" target="_blank"><span class="kumasduzenle btn btn-warning"><i class="icon-clippy icon-1x"></i></span></a>
                                            <?php if($admn){ ?><a href="./?s=kumaskarti&a=<?php echo $kumastipiduzenleorj; ?>&id=<?php echo $kumasorjid; ?>" class="kumasduzenleo" target="_blank"><span class="kumasduzenle btn btn-primary"><i class="icon-clippy icon-1x"></i></span></a><?php } ?>
                                        <select  class="secimkumas select2 select-search" onchange="kumasdegistir(this)" id="select<?php echo $ensayiyeni; ?>" style="width:100%;" <?php echo $style; ?>>
                                        <option value="0">Seçiniz</option>
                                        <?php if(!empty($kumaskarticek)){ foreach ($kumaskarticek as $kms => $kmscek) { ?>
                                        <option value="<?php echo $kmscek['ID']; ?>" <?php if($kmscek['ID']==$ien2){ echo 'selected'; } ?>><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' | ':'').(!empty($kmscek['ismi'])?$kmscek['ismi'].' ':''); ?></option>
                                        <?php } } ?> 
                                        </select>
                                        <span class="modified">Modified!</span>
                                        <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="<?php echo $kumastrfiyati; ?>"> 
                                        </td>
                                        <td class="kumaskompozisyonu"><?php echo (!empty($kompmetin)?$kompmetin:''); ?></td>
                                        <td class="kumasgrm"><?php echo $kumasgrm; ?></td>
                                        <td class="kumaseni">
                                            <select name="fiyatcalismasi[enbilgisi][<?php echo $artmissayi; ?>][<?php echo $ien2; ?>][]" class="kumasenselect form-control" onchange="kumashesapla(this)">
                                                <option value="0">Seçiniz</option>
                                                <?php $kumaseni=0; if(!empty($kumaskartipusvefayn)){ foreach ($kumaskartipusvefayn as $kmspus => $kmspuscek) { ?>
                                                
                                                    <?php if(!empty($kmspuscek[1])&&$kmspuscek[0]=='on') { ?>
                                                        <option value="<?php echo ($kmspus+1); ?>" <?php if(($kmspus+1)==$enbilgisi2degismis){ echo 'selected'; } ?>><?php echo (!empty($kmspuscek[1])?$kmspuscek[1]:''); ?><?php ?></option>
                                                    <?php } ?>
                                                    <?php if(($kmspus+1)==$enbilgisi2degismis){ $kumaseni=$kmspuscek[1]; } ?>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                        <td class="kumaspusu">
                                            <select name="fiyatcalismasi[pusbilgisi][<?php echo $artmissayi; ?>][<?php echo $ien2; ?>][]" class="kumaspusselect form-control">
                                                <option value="0">Seçiniz</option>
                                                <?php $kumaspusu=0; if(!empty($kumaskartipusvefayn)){ foreach ($kumaskartipusvefayn as $kmspus => $kmspuscek) { ?>
                                                
                                                    <?php if(!empty($kmspuscek[1])&&$kmspuscek[0]=='on') { ?>
                                                        <option value="<?php echo ($kmspus+1); ?>" <?php if(($kmspus+1)==$pusbilgisi2degismis){ echo 'selected'; } ?>><?php echo (!empty($kmspuscek[1])?$kmspuscek[1]:''); ?><?php ?></option>
                                                    <?php } ?>
                                                    <?php if(($kmspus+1)==$pusbilgisi2degismis){ $kumaspusu=$kmspuscek[1]; } ?>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                        <?php $birimgramajinigoster=(!empty($birimgramajiarray[$artmissayi][$pastalsayi])?$birimgramajiarray[$artmissayi][$pastalsayi]:0); $birimgramajinigoster2=$birimgramajinigoster; ?>
                                        <td class="kumaspastalboyukesimi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalboyu][<?php echo $artmissayi; ?>][]" value="<?php echo (!empty($pastalboyuarray[$artmissayi][$pastalsayi])?$pastalboyuarray[$artmissayi][$pastalsayi]:0); ?>" class="form-control"></td>
                                        <td class="kumaspastalissayisi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalissayisi][<?php echo $artmissayi; ?>][]" value="<?php echo (!empty($pastalissayisiarray[$artmissayi][$pastalsayi])?$pastalissayisiarray[$artmissayi][$pastalsayi]:0); ?>" class="form-control"></td>
                                        <td class="kumasbirimgramaji"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[birimgramaji][<?php echo $artmissayi; ?>][]" value="<?php echo $birimgramajinigoster2; ?>" class="form-control"></td>
                                        <?php $pastalsayi++; ?>
                                        <?php $kumasfiyatlariarray=array(); ?>
                                        <td class="kumasfiyat">
                                        <input type="hidden" class="enintipi" name="bironemiyok" value="<?php echo $kumasentipi; ?>">
                                        <input type="hidden" class="kumastipiduzenleme" name="kumastipi" value="<?php echo $kumastipiduzenle; ?>">
                                        <input type="hidden" class="doviztipi" name="doviztipi" value="<?php echo $kumaskartidovizmetin; ?>">
                                            <div class="fiyatselect">
                                                <?php 
                                                if(!empty($kumaskartifiyatlar)){ foreach ($kumaskartifiyatlar as $kmskrt => $kumasfyt) {
                                                $kumasid=($kmskrt+1);
                                                //$kumasfyt=($kumasfyt/$kumaskartidovizmiktar);
                                                
                                                /*if($kumasentipi=='1'){
                                                    $kumasfyt=($kumasfyt)*2;
                                                }*/
                                                $kumasfiyatii=number_format($kumasfyt,2, '.', '');
                                                $boyabaskitipi=(!empty($boyamaliyetpush[$kmskrt])?$boyamaliyetpush[$kmskrt]:'');
                                                $kumasfiyatlariarray[] = $kumasfiyatii;
                                                $birimgramajinigoster=str_replace(",",".",$birimgramajinigoster);
                                                $kfiyatidok=($kumasfiyatii*$birimgramajinigoster);
                                                $kfiyatidok=number_format($kfiyatidok,2, '.', '');
                                                if(empty($kumasbirimmetniarray[$boyabaskitipi])){
                                                    $kumasbirimmetniarray[$boyabaskitipi]=0;
                                                    $kumasbirimmetniarray[$boyabaskitipi]=$kumasbirimmetniarray[$boyabaskitipi]+$kfiyatidok;
                                                } else {
                                                    $kumasbirimmetniarray[$boyabaskitipi]=$kumasbirimmetniarray[$boyabaskitipi]+$kfiyatidok;
                                                } 
                                                ?>
                                                <span><?php echo $boyabaskitipi.$kumasfiyatii; ?></span><br>
                                                <?php } $ensayiyeni2++; } ?>
                                            </div>
                                        
                                        
                                        </td>
                                        <?php $tipsayi++; ?>
                                        <td class="kumasmfiyat">
                                            <div class="kumasfiyatselect">
                                            <?php if(!empty($kumasfiyatlariarray)){ foreach ($kumasfiyatlariarray as $karray => $kfiyati) { ?>
                                                <?php $birimgramajinigoster=str_replace(",",".",$birimgramajinigoster); ?>
                                                <?php $kfiyatidok=($kfiyati*$birimgramajinigoster);?>
                                                <?php $kfiyatidok=z(36,$kfiyatidok,2); $kumasbirimfiyatiarray[] = $kfiyatidok;  ?>
                                                <span><?php echo $kfiyatidok; ?></span><br>
                                            <?php } } ?>
                                            </div>
                                        </td>
                                        <td class="kumasmfiyatdovizi"><?php echo 'TRY'; //$kumaskartidovizmetin; ?></td>
                                    </tr>
                                <?php }  } if($ensayi>1){ echo '</tbody>'; } $pastalsayi=0; $artansayi++; $artacakolansayi++;   ?>

                            <?php if(empty($enbilgisiarray)&&empty($enbilgisiacikenarray)) { ?>

                            <tr class="kumastr kumastr1">

                                <td class="kumasselectli">
                                    <span class="secilidurum btn btn-danger" onclick="secilikumasisil(this)">Sil</span>
                                    <a href="#" class="kumasduzenlea" target="_blank"><span class="kumasduzenle btn btn-warning"><i class="icon-clippy icon-1x"></i></span></a>
                                    <?php if($admn){ ?><a href="#" class="kumasduzenleo" target="_blank"><span class="kumasduzenle btn btn-primary"><i class="icon-clippy icon-1x"></i></span></a><?php } ?>
                                <select class="secimkumas select2 select-search" onchange="kumasdegistir(this)" style="width:100%;" id="select1">
                                <option value="0">Seçiniz</option>
                                <?php if(!empty($kumaskarticek)){ foreach ($kumaskarticek as $kms => $kmscek) { ?>
                                <option value="<?php echo $kmscek['ID']; ?>"><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' ':'').(!empty($kmscek['ismi'])?' | '.$kmscek['ismi']:''); ?></option>
                                <?php } } ?>
                                </select>
                                <span class="modified">Modified!</span>
                                <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="0"> 
                                </td>
                                <td class="kumaskompozisyonu">-</td>
                                <td class="kumasgrm">-</td>
                                <td class="kumaseni">-</td>
                                <td class="kumaspusu">-</td>
                                <td class="kumaspastalboyukesimi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalboyu][]" class="form-control"></td>
                                <td class="kumaspastalissayisi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalissayisi][]" class="form-control"></td>
                                <td class="kumasbirimgramaji"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[birimgramaji][0][]" class="form-control" disabled></td>
                                <td class="kumasacikeni">-</td>
                                <td class="kumasfiyat">0</td>
                                <td class="kumasmfiyat">0</td>
                                <td class="kumasmfiyatdovizi">TRY</td>
                            </tr>

                            <?php } ?>

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="icblok2 col-1">
                    </div>
                </div>
            
                <div class="form-group formrow row">
                    <div class="icblok col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Aksesuar <a href="#aksesuarcogalt" class="aksesuarcogalt btn btn-success" onclick="aksesuararttirma(this)" style="padding: 4px;padding-top: 0px;padding-bottom: 0px;"><b style="font-size: 11px;color: white;font-weight: 400;"> Ekle </b></a></th>
                                            <th>Birim Fiyat</th>
                                            <th>Miktar</th>
                                            <th>İşlem</th>
                                            <th>Fiyat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="aksesuarlar">
                                    <?php  if(!empty($aksesuararray[$uk])){ foreach ($aksesuararray[$uk] as $aks => $aksuar) { $aksesuarsayi=$aks+1; ?>
                                        <tr class="aksesuar<?php echo $aksesuarsayi; ?>">
                                            <td>
                                                <span class="secilidurum btn btn-danger" onclick="seciliaksesuarsil(this)">Sil</span>
                                                <select name="<?php echo $tbl; ?>[aksesuar][<?php echo $uk; ?>][]" onchange="aksesuarfiyatyansit(this)" class="form-control aksesuarselect select-search select2">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($aksesuargruplari)){ foreach ($aksesuargruplari as $aksg => $aksgrup) { ?>
                                                        <option value="<?php echo $aksgrup['ID']; ?>" <?php if($aksesuararray[$uk][$aks]==$aksgrup['ID']){ echo 'selected'; } ?>><?php echo (!empty($aksgrup['renkKodu'])?$aksgrup['renkKodu']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <?php if(ytk('aksesuarkarti','listele')||$admn){ ?>
                                                    <a href=".?s=aksesuarkarti&a=duzenle&id=<?php echo (!empty($aksgrup['ID'])?$aksgrup['ID']:0); ?>" target="_blank" class="aksesuarduzenle"><i class="icon-pencil7 mr-3 icon-1x"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td class="aksesuarfiyat">
                                            <?php $seciliaksesuar=(!empty($aksesuargruplari[$aksesuararray[$uk][$aks]])?$aksesuargruplari[$aksesuararray[$uk][$aks]]:0); $aksesuarid=(!empty($aksesuararray[$uk][$aks])?$aksesuararray[$uk][$aks]:0); $aksesuarigoster=z(1,$aksesuararray[$uk][$aks],'','aksesuarkarti'); $aksesuardoviz=(!empty($aksesuarigoster['nesne_IDdoviz'])?$aksesuarigoster['nesne_IDdoviz']:0); $aksesuarnesneoku=z(1,$aksesuardoviz,'','nesne'); $aksesuarbirim=(!empty($aksesuarigoster['nesne_IDbirimTipi'])?$aksesuarigoster['nesne_IDbirimTipi']:0); $aksesuarbirimnesneoku=z(1,$aksesuarbirim,'','nesne'); ?>
                                            <div><?php $aksesuarbirimfiyati=(!empty($aksesuarigoster['fiyat'])?z(36,$aksesuarigoster['fiyat'],2):0); echo $aksesuarbirimfiyati; ?> <?php echo (!empty($aksesuarnesneoku['metin2'])?$aksesuarnesneoku['metin2']:''); ?></div> <span><?php echo (!empty($aksesuarbirimnesneoku['metin1'])?$aksesuarbirimnesneoku['metin1']:''); ?></span>
                                            </td>
                                            <td><input type="text" name="<?php echo $tbl; ?>[aksesuarmiktari][<?php echo $uk; ?>][]" value="<?php $aksesuarmiktari=(!empty($aksesuarmiktariarray[$uk][$aks])?$aksesuarmiktariarray[$uk][$aks]:''); echo $aksesuarmiktari; ?>" class="form-control aksesuarmiktari" onkeyup="aksesuarcarptir(this)"></td>
                                            <td class="aksesuarislem">
                                                <select class="select2 selectislem" name="<?php echo $tbl; ?>[aksesuarislem][<?php echo $uk; ?>][]" onchange="aksesuarcarptir(this)">
                                                    <option value="0" selected>Seçiniz</option>
                                                    <option value="1" <?php if(!empty($aksesuarislemarray[$uk][$aks])&&$aksesuarislemarray[$uk][$aks]==1){ echo 'selected'; } ?>>Çarpma</option>
                                                    <option value="2" <?php if(!empty($aksesuarislemarray[$uk][$aks])&&$aksesuarislemarray[$uk][$aks]==2){ echo 'selected'; } ?>>Bölme</option>
                                                </select>
                                            </td>
                                            
                                            <td class="aksesuarfiyatii">
                                                <?php
                                                $kurfiyati=1;
                                                $manuelkurtl='1';
                                                $manuelkurusd=(!empty($_X['mkurusd'])?$_X['mkurusd']:'1');
                                                $manuelkureur=(!empty($_X['mkureur'])?$_X['mkureur']:'1');
                                                if($aksesuardoviz=='75'){
                                                    $kurfiyati=$manuelkurusd;
                                                }
                                                if($aksesuardoviz=='76'){
                                                    $kurfiyati=$manuelkureur;
                                                }
                                                $aksesuarfiyati=0;
                                                $aksesuarbirimfiyati=str_replace(",",".",$aksesuarbirimfiyati);
                                                if(!empty($aksesuarislemarray[$uk][$aks])&&$aksesuarislemarray[$uk][$aks]==1){
                                                    $aksesuarfiyati=($aksesuarbirimfiyati)*$aksesuarmiktari;
                                                    $aksesuarfiyati=($aksesuarfiyati)*$kurfiyati;
                                                }
                                                if(!empty($aksesuarislemarray[$uk][$aks])&&$aksesuarislemarray[$uk][$aks]==2){
                                                    $aksesuarfiyati=($aksesuarbirimfiyati)/$aksesuarmiktari;
                                                    $aksesuarfiyati=($aksesuarfiyati)*$kurfiyati;
                                                }
                                                $aksesuarfiyati=number_format($aksesuarfiyati,2, '.', '');
                                                $aksesuarfiyatitoplam=$aksesuarfiyatitoplam+$aksesuarfiyati;
                                                echo $aksesuarfiyati.'₺';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } } else { ?>
                                        <tr class="aksesuar1">
                                            <td>
                                                <select name="<?php echo $tbl; ?>[aksesuar][<?php echo $uk; ?>][]" onchange="aksesuarfiyatyansit(this)" class="form-control aksesuarselect select-search select2">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($aksesuargruplari)){ foreach ($aksesuargruplari as $aksg => $aksgrup) { ?>
                                                        <option value="<?php echo $aksgrup['ID']; ?>"><?php echo (!empty($aksgrup['renkKodu'])?$aksgrup['renkKodu']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <?php if(ytk('aksesuarkarti','listele')||$admn){ ?>
                                                    <a href=".?s=aksesuarkarti&a=duzenle&id=" target="_blank" style="display:none;" class="aksesuarduzenle"><i class="icon-pencil7 mr-3 icon-1x"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td><input type="text" name="<?php echo $tbl; ?>[aksesuarmiktari][0][]" value="0" class="form-control aksesuarmiktari" onkeyup="aksesuarcarptir(this)"></td>
                                            <td class="aksesuarfiyat">0,0</td>
                                            <td class="aksesuarislem">
                                                <select class="select2 selectislem" name="<?php echo $tbl; ?>[aksesuarislem][0][]" onchange="aksesuarcarptir(this)">
                                                    <option value="0">Seçiniz</option>
                                                    <option value="1">Çarpma</option>
                                                    <option value="2">Bölme</option>
                                                </select>
                                            </td>
                                            <td class="aksesuarfiyatii">0</td>
                                        </tr>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="icblok2 col-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="anablok2">
            <a href="#sil" onclick="bloksilme(this)" style="font-weight:bold; padding: 3px; margin-top: 4px;">Sil</a>
        </div>
        <div class="kapsayiciblok2">
        <table class="table" style="border:none;">
            <thead>
                <tr>
                    <th scope="col" class="altmusteriebatith">Müşteri Ebatı</th>
                    <th scope="col" class="altkumasbirimfiyatith">Kumaş Birim Fiyatı</th>
                    <th scope="col" class="altaksesuarfiyatith">Aksesuar Fiyatı</th>
                    <th scope="col" class="altfasondikimfiyatith">Fason Dikim Fiyatı</th>
                    <th scope="col" class="altnavlunth">Navlun | Doviz</th>
                    <th scope="col" class="altamorismanth">Amortisman</th>
                    <th scope="col" class="altfireth">Fire</th>
                    <th scope="col" class="altkarth">Kar</th>
                    <th scope="col" class="altkomisyonth">Komisyon</th>
                    <th scope="col" class="dovizsecimith">Doviz Seçimi</th>
                    <th scope="col" class="alttoplamfiyatth">Toplam Fiyat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $aksesuarnavlunarray=(!empty($_X['aksesuarnavlun'])?json_decode($_X['aksesuarnavlun'],1):'');
                $aksesuarnavlundovizarray=(!empty($_X['aksesuarnavlundoviz'])?json_decode($_X['aksesuarnavlundoviz'],1):'');
                $aksesuardovizarray=(!empty($_X['aksesuardoviz'])?json_decode($_X['aksesuardoviz'],1):'');
                $aksesuarkomisyonarray=(!empty($_X['aksesuarkomisyon'])?json_decode($_X['aksesuarkomisyon'],1):'');
                $aksesuaramortismanarray=(!empty($_X['aksesuaramortisman'])?json_decode($_X['aksesuaramortisman'],1):'');
                $aksesuarfirearray=(!empty($_X['aksesuarfire'])?json_decode($_X['aksesuarfire'],1):'');
                $aksesuarkararray=(!empty($_X['aksesuarkar'])?json_decode($_X['aksesuarkar'],1):'');
                $aksesuarfasondikimfiyatiarray=(!empty($_X['aksesuarfasondikimfiyati'])?json_decode($_X['aksesuarfasondikimfiyati'],1):'');
                ?>
                <?php if(!empty($enbilgisiarray[$uk])){ ?>
                    <?php
                    $manuelkurtl='1';
                    $manuelkurusd=(!empty($_X['mkurusd'])?$_X['mkurusd']:'1');
                    $manuelkureur=(!empty($_X['mkureur'])?$_X['mkureur']:'1');
                    $aksesuarnavlunfiyat=(!empty($aksesuarnavlunarray[$uk])?$aksesuarnavlunarray[$uk]:0);   
                    $aksesuarnavlundoviz=(!empty($aksesuarnavlundovizarray[$uk])?$aksesuarnavlundovizarray[$uk]:0);   
                    $aksesuardoviz=(!empty($aksesuardovizarray[$uk])?$aksesuardovizarray[$uk]:0);   
                    $aksesuarkomisyon=(!empty($aksesuarkomisyonarray[$uk])?$aksesuarkomisyonarray[$uk]:0);   
                    $aksesuaramortisman=(!empty($aksesuaramortismanarray[$uk])?$aksesuaramortismanarray[$uk]:0);   
                    $aksesuarfire=(!empty($aksesuarfirearray[$uk])?$aksesuarfirearray[$uk]:0);   
                    $aksesuarkar=(!empty($aksesuarkararray[$uk])?$aksesuarkararray[$uk]:0);
                    $aksesuarfasondikimfiyati=(!empty($aksesuarfasondikimfiyatiarray[$uk])?$aksesuarfasondikimfiyatiarray[$uk]:0);
                    $kurfiyati='1';
                    if($aksesuarnavlundoviz=='75'){
                        $kurfiyati=$manuelkurusd;
                    }
                    if($aksesuarnavlundoviz=='76'){
                        $kurfiyati=$manuelkureur;
                    }
                    $kurfiyatidoviz='1';
                    if($aksesuardoviz=='75'){
                        $kurfiyatidoviz=$manuelkurusd;
                    }
                    if($aksesuardoviz=='76'){
                        $kurfiyatidoviz=$manuelkureur;
                    }
                    $aksesuarnavlunfiyat2=str_replace(",",".",$aksesuarnavlunfiyat);
                    $aksesuardovizlifiyat=($aksesuarnavlunfiyat2)*$kurfiyati;
                    ?>
                <tr class="sonislemtr">
                    <td class="altmusteriebati"><?php echo (!empty($musteriebatiarray[$uk])?$musteriebatiarray[$uk]:0); ?></td>
                    <td class="altkumasbirimfiyati">
                        <?php if(!empty($kumasbirimmetniarray)){ foreach ($kumasbirimmetniarray as $kbrfiyat => $kmsbrmfiyat) { ?>
                            <span><?php echo $kbrfiyat.$kmsbrmfiyat.'₺'; ?></span>
                        <?php } } ?>
                    </td>
                    <td class="altaksesuarfiyati"><?php echo $aksesuarfiyatitoplam.'₺'; ?></td>
                    <td class="altfasondikimfiyati"><input type="text" name="<?php echo $tbl; ?>[aksesuarfasondikimfiyati][<?php echo $uk; ?>]" autocomplete="off" value="<?php echo $aksesuarfasondikimfiyati; ?>" onkeyup="navlunyuzde(this)" class="form-control"></td>
                    <td class="altnavlun"><input type="text" class="form-control" autocomplete="off" name="<?php echo $tbl; ?>[aksesuarnavlun][<?php echo $uk; ?>]" onkeyup="navlunfiyat(this)" value="<?php echo $aksesuarnavlunfiyat; ?>">
                        <select class="select2 form-control altdovizselect" name="<?php echo $tbl; ?>[aksesuarnavlundoviz][<?php echo $uk; ?>]" onchange="navlunfiyatdoviz(this)">
                            <option value="0">Seçiniz</option>
                            <option value="74" <?php echo (!empty($aksesuarnavlundoviz)&&$aksesuarnavlundoviz=="74"?'selected':''); ?>>₺</option>
                            <option value="75" <?php echo (!empty($aksesuarnavlundoviz)&&$aksesuarnavlundoviz=="75"?'selected':''); ?>>$</option>
                            <option value="76" <?php echo (!empty($aksesuarnavlundoviz)&&$aksesuarnavlundoviz=="76"?'selected':''); ?>>€</option>
                        </select>
                    </td>
                    <td class="altamorisman"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuaramortisman][<?php echo $uk; ?>]" value="<?php echo $aksesuaramortisman; ?>"></td>
                    <td class="altfire"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarfire][<?php echo $uk; ?>]" value="<?php echo $aksesuarfire; ?>"></td>
                    <td class="altkar"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarkar][<?php echo $uk; ?>]" value="<?php echo $aksesuarkar; ?>"></td>
                    <td class="altkomisyon"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarkomisyon][<?php echo $uk; ?>]" value="<?php echo $aksesuarkomisyon; ?>"></td>
                    <td class="aksesuardoviz">
                        <select class="select2 form-control aksesuardovizselect" name="<?php echo $tbl; ?>[aksesuardoviz][<?php echo $uk; ?>]" onchange="navlunyuzde(this)">
                            <option value="0">Seçiniz</option>
                            <option value="74" <?php echo (!empty($aksesuardoviz)&&$aksesuardoviz=="74"?'selected':''); ?>>₺</option>
                            <option value="75" <?php echo (!empty($aksesuardoviz)&&$aksesuardoviz=="75"?'selected':''); ?>>$</option>
                            <option value="76" <?php echo (!empty($aksesuardoviz)&&$aksesuardoviz=="76"?'selected':''); ?>>€</option>
                        </select>
                    </td>
                    <td class="alttoplamfiyat">
                    <?php if(!empty($kumasbirimmetniarray)){ foreach ($kumasbirimmetniarray as $kbrfiyat => $kmsbrmfiyat) { ?>
                            <span>
                                <?php
                                    $kumasbirimfiyati=($kmsbrmfiyat+$aksesuarfiyatitoplam+$aksesuardovizlifiyat);
                                    $aksesuarkomisyonyuzde=(100+$aksesuarkomisyon)/100;
                                    $aksesuaramortismanyuzde=(100+$aksesuaramortisman)/100;
                                    $aksesuarfireyuzde=(100+$aksesuarfire)/100;
                                    $aksesuarkaryuzde=(100+$aksesuarkar)/100;
                                    $kumasbirimfiyati=($kumasbirimfiyati)*$aksesuarkomisyonyuzde;
                                    $kumasbirimfiyati=($kumasbirimfiyati)*$aksesuaramortismanyuzde;
                                    $kumasbirimfiyati=($kumasbirimfiyati)*$aksesuarfireyuzde;
                                    $kumasbirimfiyati=($kumasbirimfiyati)*$aksesuarkaryuzde;
                                    $kumasbirimfiyati=($kumasbirimfiyati)/$kurfiyatidoviz;
                                    $kumasbirimfiyati=number_format($kumasbirimfiyati,2, '.', '');
                                    echo $kbrfiyat.$kumasbirimfiyati; 
                                ?></span>
                        <?php } } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php $artmissayi++; } ?>

    
    
    <?php } else { ?>





        <div class="tumblok tumblok1">
        <div class="anablok1">
            <div class="kapsayiciblok">
                <h2 class="urunbaslik" onclick="urunbasliktetik(this)">1.Ürün <span class="kapakmusteriebati"><b>Müşteri Ebatı :</b> <span></span></span><span class="uruntoggle" onclick="uruntoggle(this)"><i class="icon-circle-right2 mr-3 ml-3 icon-2x"></i><span></h2>
                <div class="form-group formrow row">
                    <div class="icblok urunblok col-12">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Kategori </label>
                            <div class="col-lg-8">
                                <select name="<?php echo $tbl; ?>[urunkategorileri][]" onchange="urunkategoridegistir(this)" class="form-control urunkategorileri select-search select2">
                                    <option value="0">Seçiniz</option>
                                    <?php if(!empty($konfeksiyonmaliyetleri)){ foreach ($konfeksiyonmaliyetleri as $urnk => $ukategori) { ?>
                                    <?php $urunkategorinesne_id=(!empty($ukategori['nesne_IDurunkategorileri'])?$ukategori['nesne_IDurunkategorileri']:0); $konfeksiyonkategoriad = (!empty($urunkategorileri[$urunkategorinesne_id]['metin1'])?$urunkategorileri[$urunkategorinesne_id]['metin1']:''); ?>
                                        <option value="<?php echo $ukategori['ID']; ?>" ><?php echo $konfeksiyonkategoriad; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <?php if(ytk('nesne','listele')||$admn){ ?>
                                    <a href=".?s=nesne&dznl=urunkategorileri" target="_blank"><i class="icon-pencil7 mr-3 icon-1x"></i></a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Hesaplanacak Ebat</label>
                            <div class="col-lg-9">
                            <select name="<?php echo $tbl; ?>[hesaplanacakebatlar][]" class="form-control urunebatlari select-search select2" onchange="urunebatininfiyatiniyansit(this)">
                                <option value="0">Seçiniz</option>
                                <?php if(!empty($urunebatlari)){ foreach ($urunebatlari as $urne => $uebat) { ?>
                                    <option value="<?php echo $uebat['ID']; ?>"><?php echo (!empty($uebat['metin1'])?$uebat['metin1']:''); ?></option>
                                <?php } } ?>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Fason Fiyatı</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control fasonfiyati" tabindex="1" placeholder="" name="<?php echo $tbl; ?>[fasonfiyati][]" autofocus="autofocus" value="" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Müşteri Ebatı</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control ebatgoster" onkeyup="ebatyansit(this)" tabindex="1" placeholder="ÖRNEK => 150x200" name="<?php echo $tbl; ?>[musteriebati][]" autofocus="autofocus" value="" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row table-responsive" style="padding:2px;">
                        <table class="table tablekumaslar" style="border:none;">
                            <thead>
                                <tr>
                                    <th scope="col">Kumaş Seçimi 
                                    &nbsp;<a href="#kumascogalt" onclick="kumasarttirma(this)" class="kumasarttir btn btn-success" style="padding: 4px;padding-top: 0px;padding-bottom: 0px;"><b style="font-size: 11px;color: white;font-weight: 400;"> Ekle </b></a></th>
                                    <th scope="col">Kompozisyon</th>
                                    <th scope="col" >Kumaş Gr/m </th>
                                    <th scope="col">Kumaş Eni </th>
                                    <th scope="col">Pastal Boyu Kesim</th>
                                    <th scope="col">Pastal İş Sayısı</th>
                                    <th scope="col">Birim Gramajı</th>
                                    <th scope="col">Kumaş Fiyatı</th>
                                    <th scope="col" colspan="2">Kumaş Birim Fiyatı</th>
                                </tr>
                            </thead>
                            <tbody class="kumastbody1">
                            
                                <tr class="kumastr kumastr1">
    
                                    <td class="kumasselectli">
                                        <span class="secilidurum btn btn-danger" onclick="secilikumasisil(this)">Sil</span>
                                        <a href="#" class="kumasduzenlea" target="_blank"><span class="kumasduzenle btn btn-warning"><i class="icon-clippy icon-1x"></i></span></a>
                                        <?php if($admn){ ?><a href="#" class="kumasduzenleo" target="_blank"><span class="kumasduzenle btn btn-primary"><i class="icon-clippy icon-1x"></i></span></a><?php } ?>
                                    <select  class="secimkumas select2 select-search" onchange="kumasdegistir(this)" id="select1" style="width:100%;">
                                    <option value="0">Seçiniz</option>
                                    <?php if(!empty($kumaskarticek)){ foreach ($kumaskarticek as $kms => $kmscek) { ?>
                                    <option value="<?php echo $kmscek['ID']; ?>"><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' | ':'').(!empty($kmscek['ismi'])?$kmscek['ismi'].' ':''); ?></option>
                                    <?php } } ?> 
                                    </select>
                                    <span class="modified">Modified!</span>
                                    <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="0"> 
                                    </td>
                                    <td class="kumaskompozisyonu">-</td>
                                    <td class="kumasgrm">-</td>
                                    <td class="kumaseni"> -</td>
                                    <td class="kumaspusu"> -</td>
                                    <td class="kumaspastalboyukesimi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalboyu][0][]" value="" class="form-control"></td>
                                    <td class="kumaspastalissayisi"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[pastalissayisi][0][]" value="" class="form-control"></td>
                                    <td class="kumasbirimgramaji"><input type="text" autocomplete="off" onkeyup="kumasfiyatguncelle(this)" name="<?php echo $tbl; ?>[birimgramaji][0][]" value="" class="form-control" disabled></td>
                                    <td class="kumasfiyat"><input type="hidden" class="enintipi" name="bironemiyok" value="0"><input type="hidden" class="doviztipi" name="doviztipi" value="TRY">0</td>
                                    <td class="kumasmfiyat">-</td>
                                    <td class="kumasmfiyatdovizi">TRY</td>
                                </tr>

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="icblok2 col-1">
                    </div>
                </div>
                <div class="form-group formrow row">
                    <div class="icblok col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Aksesuar <a href="#aksesuarcogalt" class="aksesuarcogalt btn btn-success" onclick="aksesuararttirma(this)" style="padding: 4px;padding-top: 0px;padding-bottom: 0px;"><b style="font-size: 11px;color: white;font-weight: 400;"> Ekle </b></a></th>
                                            <th>Birim Fiyat</th>
                                            <th>Miktar</th>
                                            <th>İşlem</th>
                                            <th>Fiyat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="aksesuarlar">
                                    <tr class="aksesuar1">
                                            <td>
                                                <span class="secilidurum btn btn-danger" onclick="seciliaksesuarsil(this)">Sil</span>
                                                <select name="<?php echo $tbl; ?>[aksesuar][0][]" onchange="aksesuarfiyatyansit(this)" class="form-control aksesuarselect select-search select2">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($aksesuargruplari)){ foreach ($aksesuargruplari as $aksg => $aksgrup) { ?>
                                                        <option value="<?php echo $aksgrup['ID']; ?>"><?php echo (!empty($aksgrup['renkKodu'])?$aksgrup['renkKodu']:''); ?></option>
                                                    <?php } } ?>
                                                    <?php if(ytk('aksesuarkarti','listele')||$admn){ ?>
                                                        <a href=".?s=aksesuarkarti&a=duzenle&id=" target="_blank" style="display:none;" class="aksesuarduzenle"><i class="icon-pencil7 mr-3 icon-1x"></i></a>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td class="aksesuarfiyat"></td>
                                            <td><input type="text" name="<?php echo $tbl; ?>[aksesuarmiktari][0][]" value="" class="form-control aksesuarmiktari" onkeyup="aksesuarcarptir(this)"></td>
                                            <td class="aksesuarislem">
                                                <select class="select2 selectislem" name="<?php echo $tbl; ?>[aksesuarislem][0][]" onchange="aksesuarcarptir(this)">
                                                    <option value="0">Seçiniz</option>
                                                    <option value="1">Çarpma</option>
                                                    <option value="2">Bölme</option>
                                                </select>
                                            </td>
                                            <td class="aksesuarfiyatii">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="icblok2 col-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="anablok2">
            <a href="#sil" onclick="bloksilme(this)" style="font-weight:bold; padding: 3px; margin-top: 4px;">Sil</a>
        </div>
        <div class="kapsayiciblok2">
            <table class="table" style="border:none;">
                <thead>
                    <tr>
                        <th scope="col" class="altmusteriebatith">Müşteri Ebatı</th>
                        <th scope="col" class="altkumasbirimfiyatith">Kumaş Birim Fiyatı</th>
                        <th scope="col" class="altaksesuarfiyatith">Aksesuar Fiyatı</th>
                        <th scope="col" class="altfasondikimfiyatith">Fason Dikim Fiyatı</th>
                        <th scope="col" class="altnavlunth">Navlun | Doviz</th>
                        <th scope="col" class="altamorismanth">Amortisman</th>
                        <th scope="col" class="altfireth">Fire</th>
                        <th scope="col" class="altkarth">Kar</th>
                        <th scope="col" class="altkomisyonth">Komisyon</th>
                        <th scope="col" class="dovizsecimith">Doviz Seçimi</th>
                        <th scope="col" class="alttoplamfiyatth">Toplam Fiyat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="sonislemtr">
                        <td class="altmusteriebati"></td>
                        <td class="altkumasbirimfiyati"> </td>
                        <td class="altaksesuarfiyati"></td>
                        <td class="altfasondikimfiyati"><input type="text" name="<?php echo $tbl; ?>[aksesuarfasondikimfiyati][0]" autocomplete="off" onkeyup="navlunyuzde(this)" class="form-control"></td>
                        <td class="altnavlun">
                            <input type="text" class="form-control" autocomplete="off" name="<?php echo $tbl; ?>[aksesuarnavlun][0]" onkeyup="navlunfiyat(this)" value="0">
                            <select class="select2 form-control altdovizselect" name="<?php echo $tbl; ?>[aksesuarnavlundoviz][0]" onchange="navlunfiyatdoviz(this)">
                                <option value="0">Seçiniz</option>
                                <option value="74">₺</option>
                                <option value="75">$</option>
                                <option value="76">€</option>
                            </select>
                        </td>
                        <td class="altamorisman"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuaramortisman][0]" value="0"></td>
                        <td class="altfire"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarfire][0]" value="0"></td>
                        <td class="altkar"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarkar][0]" value="0"></td>
                        <td class="altkomisyon"><input type="text" class="form-control" autocomplete="off" onkeyup="navlunyuzde(this)" name="<?php echo $tbl; ?>[aksesuarkomisyon][0]" value="0"></td>
                        <td class="aksesuardoviz">
                            <select class="select2 form-control aksesuardovizselect" name="<?php echo $tbl; ?>[aksesuardoviz][0]" onchange="navlunyuzde(this)">
                                <option value="0">Seçiniz</option>
                                <option value="74">₺</option>
                                <option value="75">$</option>
                                <option value="76">€</option>
                            </select>
                        </td>
                        <td class="alttoplamfiyat"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>




    




    <?php } ?>

</div>

<input type="hidden" class="toplambloksayisi" name="<?php echo $tbl; ?>[urunsayi]" value="<?php echo (!empty($_X['urunsayi'])?$_X['urunsayi']:1); ?>">
<?php } ?>



<br>
<div class="form-group row kayitbilgisi">
    <label class="col-lg-3 col-form-label">Kayit Tarihi</label>
    <div class="input-group col-lg-9">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo !empty($_X['tarihKayit'])?$_X['tarihKayit']:z('datetime')?>">
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">KYT-015 Düzenleme Ekranı</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Veriler Burada Gözükecek
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Güncelle</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        </div>
        
      </div>
    </div>
  </div>

<?php if(z(8,'a')=='ekle'){ ?>
    <div class="alert bg-teal text-white alert-styled-left alert-styled-custom alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        Kayıt oluşturulduktan sonra fiyat çalışması yapabilirsiniz.
    </div>
<?php } ?>