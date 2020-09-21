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

select{
    min-width:70px;
}

.icerik {
    background: #e0e0e0;
}

.card{
    background: #e0e0e0;
}

.tablekumaslar{
    margin-bottom:10px;
    margin-top:10px;
    border: 2px solid #95989e;
}

.tablekumaslar tbody{
    border-top: none !important;
}

.kombitablo tbody{
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
<?php if(z(8,'a')=='duzenlekombinasyon'||z(8,'a')=='farkli'){  ?>
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

.boyamaliyetkarlari1 .karoransil{
    display:none;
}

.elyaforansil{
    color: black;
    display: block;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
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

.select2-selection{
    min-width:200px;
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

.kumassil{
    color: black;
    display: none;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.kumastr1 .kumassil{
    display:none;
}

.kumasaltbilgi .kumassil{
    display:none;
}

.boyabaskisil{
    color: black;
    display: none;
    border: 1px solid #ddd;
    background: white;
    border-radius: 10px;
    cursor: pointer;
}

.boyabaskitr1 .boyabaskisil{
    display:none;
}

.boyabaskialtbilgi .boyabaskisil{
    display:none;
}

.kayittarihi input{
    width:100% !important;
}

.kumaskombin tr{
    /*background: #3ab7b7;*/
    /*color: white;*/
}

.kumaskombin td{
    /*background: #2d151538;*/
}

.baslik{
    /*background: #379494 !important;*/
}

.kumasacikeni{
    display:none;
}

.kumasacikeniust{
    display:none;
}



</style>
<?php 
$sayi2=0;
$idmiz=z(8,'id');
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $( ".kurmdegisim" ).keyup(function() {
            manuelkuroran();
        });
        setTimeout(function(){ manuelkuroran(); }, 2000);
        
        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu5&kumaskarti=1",
            success:function(gelensorgu){
                var kumaskartiall=gelensorgu.cevap.kumaskartiall;
                window.kumaskartiall=kumaskartiall;
                var boyabaskiall=gelensorgu.cevap.boyabaskiall;
                window.boyabaskiall=boyabaskiall;
            }
        });
        select2kontrol();

        $(".seciliilavegider").click(function(){
            $('.silinecekilavegider').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekilavegider').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    $(objham).parent().parent().remove();
                    kumastrhesapla();
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        $(".seciliboyabaski").click(function(){
            $('.silinecekboyabaski').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekboyabaski').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    $(objham).parent().parent().remove();
                    kumastrhesapla();
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        $(".secilikumas").click(function(){
            $('.silinecekkumas').each(function(iham, objham){
                var silinecekhammaliyetsayi=$('.silinecekkumas').length;
                if(objham.checked&&silinecekhammaliyetsayi>1){
                    $(objham).parent().parent().remove();
                    kumastrhesapla();
                }
                if(objham.checked&&silinecekhammaliyetsayi==1){
                    alert("Son kalan veriyi silemezsiniz");
                }
            });
        });

        <?php
            $enbilgisisayi=0;
            if(z(8,'a')!='eklekombinasyon'){
                $enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
                $enbilgisisayi=count($enbilgisiarray);
            }
        ?>
        var deger1=<?php echo (!empty($enbilgisisayi)?$enbilgisisayi:1); ?>;
        $(".kumasarttir").click(function(){
            var classeski="kumastr"+deger1;
            var tbodyeski="kumastbody"+deger1;
            var selecteski="select"+deger1;
            var degereski=deger1;
            deger1++;
            var classyeni="kumastr"+deger1;
            var tbodyyeni="kumastbody"+deger1;
            var selectyeni="select"+deger1;
            var degeryeni=deger1;

            var clone1 = $('.kumastbody1 tr:nth-child(2)').clone();
            var clone1 = clone1.removeClass(classeski);
            var clone1 = clone1.removeClass("kumastr1");
            var clone1 =clone1.addClass(classyeni);
            var sanaltbody='<tbody class="'+tbodyyeni+'"></tbody>';
            $(".tablekumaslar").append(sanaltbody);
            $('.'+tbodyyeni).html(clone1);

            $('.'+classyeni).find("select").attr("id",selectyeni);
            $('.'+classyeni).find(".select2-container").remove();
            $('.'+classyeni).find("select").removeAttr('data-select2-id');
            select2kontrol();
        });

        var deger2=1;
        $(".boyabaskiarttir").click(function(){
            var classeski="boyabaskitr"+deger2;
            var degereski=deger2;
            deger2++;
            var classyeni="boyabaskitr"+deger2;
            var degeryeni=deger2;

            var clone2 = $('.boyabaskitbody tr:nth-child(2)').clone();
            var clone2 = clone2.removeClass(classeski);
            var clone2 = clone2.removeClass("boyabaskitr1");
            var clone2 =clone2.addClass(classyeni);
            $(".boyabaskitbody").append(clone2);
        });

        var deger3=1;
        $(".karoranartir").click(function(){
            var classeski="boyamaliyetkarlari"+deger3;
            var degereski=deger3;
            deger3++;
            var classyeni="boyamaliyetkarlari"+deger3;
            var degeryeni=deger3;

            var clone3 = $('.boyamaliyetkarlari tr:nth-child(2)').clone();
            var clone3 = clone3.removeClass(classeski);
            var clone3 = clone3.removeClass("boyamaliyetkarlari1");
            var clone3 =clone3.addClass(classyeni);
            $(".boyamaliyetkarlari").append(clone3);
        });
    });
</script>
<script>
function manuelkuroran(ths){
    var usdyicek = $(".mkurusd input").val();
    var euryicek = $(".mkureur input").val();
    var eurusdoran=0;
    eurusdoran=(euryicek)/usdyicek;
    eurusdoran=sy(eurusdoran,4);
    $(".mkuroran").html(eurusdoran);
}

function select2kontrol(ths){
    var selectadi;
    var selectsayi=0;
    $('.select2').each(function(ip, objselect){
        selectsayi++;
        selectadi="selectyeni"+selectsayi;
        $(objselect).parent().find("select").attr("id",selectadi);
        $(objselect).parent().find(".select2-container").remove();
        $(objselect).parent().find("select").removeAttr('data-select2-id');
        $('#'+selectadi).select2();
    }); 
    //$("select").removeAttr("disabled");
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
        var kumasmfiyat2=$(objoran).find(".kumasmfiyat").html();
        kumasmfiyat2=kumasmfiyat2.replace(",",".");

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
        var fiyat=kumasmfiyat2;
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
        $('.bilgikumasfiyati').html(cevirondalıktoplamtl+"₺");

        $('.kombikumastl').html('<input type="hidden" name="kumaskarti[kombikumastl]" value="'+toplamfiyattl+'">');
        $('.kombitoplamtl').html('<input type="hidden" name="kumaskarti[kombitoplamtl]" value="'+toplamfiyattl+'">');
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
        $('.bilgikumasfiyati').html(cevirondalıktoplamtl+"₺");

        $('.kombikumastl').html('<input type="hidden" name="kumaskarti[kombikumastl]" value="'+toplamfiyattl+'">');
        $('.kombitoplamtl').html('<input type="hidden" name="kumaskarti[kombitoplamtl]" value="'+toplamfiyattl+'">');
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
        $('.bilgikumasfiyati').html(cevirondalıktoplamtl+"₺");

        $('.kombitoplamtl').html('<input type="hidden" name="kumaskarti[kombitoplamtl]" value="'+toplamfiyattl+'">');
    }
   
}


<?php if(z(8,'a')=='duzenlekombinasyon'||!empty($farkli)){ ?>
    $(document).ready(function(){
        setTimeout(function(){ manuelkuroran(); }, 1000);
        setTimeout(function(){ kumastrhesapla(); }, 1000);
    });
<?php } ?>

function kumasdegistir(ths){
    var selectval=$(ths).val();
    var kumaskarticek=window.kumaskartiall[selectval];


    if(kumaskarticek!=''){
        var enselect='<select name="kumaskarti[enbilgisi]['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" ><option value="0"></option>';
        var enselectaciken='<select name="kumaskarti[enbilgisiaciken]['+selectval+'][]" class="kumasenselect form-control" onchange="kumashesapla(this)" ><option value="0"></option>';
        var kumaskartienname='kumaskarti[enbilgisi]['+selectval+'][]';
        var indeximiz=$(ths).parent().parent().index();
        var gelendoviz=kumaskarticek["nesne_IDdoviz"];
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
            $(ths).parent().parent().find(".kumasmfiyatdovizi").html(gelendoviz);
        }
        if(kumaskarticek["kodu"]!=''){
            $(ths).parent().parent().find(".kumaskodu").html(kumaskarticek["kodu"]);
        }
        if(kumaskarticek["ismi"]!=''){
            $(ths).parent().parent().find(".kumasismi").html(kumaskarticek["ismi"]);
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
                        }
                    }
                }
            });
            enselect=enselect+'</select>';
            $(ths).parent().parent().find(".kumaseni").html(enselect);
            if(kumaskarticek["eni"]!=''){
                $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
            }
        } else{
            if(kumaskarticek["eni"]!=''){
                $(ths).parent().parent().find(".kumaseni").html(kumaskarticek["eni"]);
            }
        } 

        /*
        if(kumaskarticek["pusvefaynaciken"]!=''){
            var kumaspusvefaynaciken=JSON.parse(kumaskarticek["pusvefaynaciken"]);

            $.each(kumaspusvefaynaciken, function(k, v) {
                if(v[0]){
                    if(v[0]>0){
                        enselectaciken=enselectaciken+'<option value="'+(k+1)+'">'+v[0]+'</option>';
                    }
                }
            });
            enselectaciken=enselectaciken+'</select>';
            $(ths).parent().parent().find(".kumasacikeni").html(enselectaciken);
            if(kumaskarticek["eni"]!=''){
                $(ths).parent().parent().find(".kumasacikeni").html(kumaskarticek["eni"]);
            }
        } else{
            if(kumaskarticek["eni"]!=''){
                $(ths).parent().parent().find(".kumasacikeni").html(kumaskarticek["eni"]);
            }
        } 
        */

        var fiyatselect='<input type="hidden" class="enintipi" name="bironemiyok" value="'+enTipi+'"><select class="fiyatselect form-control" name="kumaskarti[fiyatselect]['+selectval+'][]" onchange="kumashesapla(this)"><option value="0">Fiyat Seçiniz</option>';


        if(kumaskarticek["fiyatlar"]!=''){
            var kumasfiyatlar=JSON.parse(kumaskarticek["fiyatlar"]);
            <?php
            $enbilgisisayi=0;
            if(z(8,'a')!='eklekombinasyon'){
                $enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
                $enbilgisisayi=count($enbilgisiarray);
            }
            ?>
            var sayieach=<?php echo (!empty($enbilgisisayi)?$enbilgisisayi:1); ?>;
            $(ths).parent().parent().parent().find('.kumastralt').remove();
            var randsayi=0;
            var randsayi2=0;
            
            
            var boyaveri=[];

            $.ajax({
                type:"POST",
                url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu5&kumasgonder="+selectval,
                success:function(gelensorgu){
                    var kumastipveri=gelensorgu.cevap.kumastipveri;


                    
                    var randomsayi=0;
                    if(kumasfiyatlar){
                        $.each(kumasfiyatlar, function(k, v) {
                            
                            var boyabaskitipiekle=kumastipveri[randomsayi];
                            randomsayi++;
                            fiyat=v;
                            if(gelendoviz=='TRY'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkurtl;
                            }
                            if(gelendoviz=='USD'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkurusd;
                            }
                            if(gelendoviz=='EUR'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkureur;
                            }
                            fiyat=sy(fiyat,4);
                            randsayi2++;
                            fiyatselect+='<option value="'+randsayi2+'">'+boyabaskitipiekle+fiyat+'</option>';

                            /*/
                            
                            if(k==0){
                                $(ths).parent().parent().find(".kumasfiyat").html(fiyat);
                            } else {
                                var sayieach2=1;
                                var classeski="kumastr"+sayieach;
                                var classeskialt="kumastralt"+sayieach;
                                var degereski=sayieach;
                                sayieach++;
                                sayieach2++;
                                var classyeni="kumastr"+sayieach;
                                var degeryeni=sayieach;
                                var kumassecimitr=$(ths).parent().parent().clone();
                                var kumassecimitr = kumassecimitr.removeClass("kumastr1");
                                var kumassecimitr = kumassecimitr.removeClass(classeski);
                                var kumassecimitr = kumassecimitr.addClass(classyeni);
                                var kumassecimitr = kumassecimitr.addClass("kumastralt");

                                $(ths).parent().parent().after(kumassecimitr);
                                $(ths).parent().parent().parent().find(".secimkumas").val(selectval).select();
                                $(ths).parent().parent().parent().find(".secimkumas").prop('disabled', true);
                                $(ths).prop('disabled', false);
                                $(ths).parent().parent().after().find('.kumasfiyat').html(fiyat);
                            

                                sayieach++;
                            }

                            /*/
                            
                        });
                        fiyatselect+='</select>';
                        $(ths).parent().parent().find(".kumasfiyat").html(fiyatselect);
                        
                    } else {
                        var kumasfiyat=kumaskarticek["kumasfiyat"];
                        if(kumasfiyat){

                            fiyat=kumasfiyat;
                            if(gelendoviz=='TRY'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkurtl;
                            }
                            if(gelendoviz=='USD'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkurusd;
                            }
                            if(gelendoviz=='EUR'){
                                var fiyat = (fiyat * manuelkurtl) / manuelkureur;
                            }
                            fiyat=sy(fiyat,4);
                            randsayi2++;
                            fiyatselect+='<option value="'+randsayi2+'">'+fiyat+'</option>';
                            fiyatselect+='</select>';
                            $(ths).parent().parent().find(".kumasfiyat").html(fiyatselect);

                        }

                    }




                }
            });

            
        }

        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu5&kompozisyongonder="+selectval,
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
    $('.bilgikumasfiyati').html("0₺");
    
    $('.kombikumastl').html('<input type="hidden" name="kumaskarti[kombikumastl]" value="0">');
    $('.kombitoplamtl').html('<input type="hidden" name="kumaskarti[kombitoplamtl]" value="0">');

}

function boyabaskidegistir(ths){
    var selectval=$(ths).val();
    var boyabaskicek=window.boyabaskiall[selectval];
    console.log("boyabaskicek");
    console.log(boyabaskicek);

    if(boyabaskicek!=''){
        var gelendoviz=boyabaskicek["nesne_IDdoviz"];
        var gelenekgr=boyabaskicek["ekgr"];
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
        }

        if(boyabaskicek["fiyat"]!=''){
            fiyat=boyabaskicek["fiyat"];
            fiyat=sy(fiyat,4);
            $(ths).parent().parent().find(".boyabaskimfiyat").html(fiyat);
            $(ths).parent().parent().find(".boyabaskimfiyatdovizi").html(gelendoviz);
            $(ths).parent().parent().find(".boyabaskimekkumasgr input").val(gelenekgr);
        }

        
    }

    kumastrhesapla();

}

function kumassilme(ths){
    $(ths).parent().parent().remove();
    kumastrhesapla();
}

function boyabaskisilme(ths){
    $(ths).parent().parent().remove();
    kumastrhesapla();
}

function karoransilme(ths){
    $(ths).parent().parent().remove();
    kumastrhesapla();
}

function kumashesapla(ths){
    var entipi=0;
    var kumasenselect=$(ths).parent().parent().find(".kumaseni option:selected").text();
    var kumasenselectaciken=$(ths).parent().parent().find(".kumasacikeni select option:selected").text();
    var kumasenselectacikensayi=$(ths).parent().parent().find(".kumasacikeni select option").length;
    var kumasgrm=$(ths).parent().parent().find(".kumasgrm").html();
    var kumasfiyat=$(ths).parent().parent().find(".fiyatselect option:selected").text();
    var kumasbirim2=$(ths).parent().parent().find(".kumasbirim2").html();
    var entipi=$(ths).parent().parent().find(".enintipi").val();

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
    /*
    if(kumasenselectacikensayi>1&&kumasenselectaciken!=''){
        if(kumasenselectaciken){
            if(kumasbirim2=='kg'){
                metredekilogram=(kumasenselectaciken*kumasgrm)/100000;
                //metredekilogram=(metredekilogram)*2;
            }
            kumasmetre=(metredekilogram*kumasfiyat);
        }

    } else {
        
    }
    */

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
}



function karorandegistir(ths){
    var kar_ID = $(ths).parent().parent().find("select option:selected").val();
    $(ths).parent().parent().find(".karoranlari").attr('name', 'kumaskarti[karoranlari]['+kar_ID+']');
    kumastrhesapla();
}

</script>

<?php 
$farkli=z(8,'farkli');
if(!empty($farkli)){
    $_X=z(1,$farkli,'',$tbl);
}
?>

<?php
$kumaslaricek=z(1,"WHERE arsiv='0' AND revize_ID='0' AND nesne_IDkumasTipi!='180' ORDER BY lpad(kodu, 10, 0)",'','kumaskarti');

?>
<div class="kombikumastl" style="display:none;"></div>
<div class="kombitoplamtl" style="display:none;"></div>
<div class="blok kumaskombin" style="width:100%; margin-top: 0; margin:0;display:none;">
<table cellpadding="0" cellspacing="0" style="background: #eeeeee;" class="tablekumaslar table table-hover">
<tbody class="kumastbody1">
<tr>
    <th colspan="1">Silme</th>
    <th><b>KUMAŞ SEÇİMİ</b>
<br><a href="#secililerisil" class="secilikumas btn btn-danger"><i class="icon-minus3 icon-1x"></i></a>
&nbsp;<a href="#kumascogalt" class="kumasarttir btn btn-success"><b style="font-size:14px; color:white;"> <i class="icon-plus3 icon-1x"></i> </b></a>
    </th>
    <th>Kumaş Kodu</th>
    <th>Kumaş İsmi</th>
    <th>Kompozisyon</th>
    <th>Kumaş Eni</th>
    <th class="kumasacikeniust">Kumaş Açık Eni</th>
    <th>Birim</th>
    <th>Kumaş Gr/m</th>
    <th>Metrede Kg</th>
    <th colspan="2">Fiyatları</th>
    <th>Birim</th>
    <th <?php if(z(8,'a')=='ekle'){ echo 'colspan="2"'; } else { echo 'colspan="3"'; } ?>>Kumaş metre fiyatı</th>
</tr>
<?php if(z(8,'a')=='eklekombinasyon'&&empty($farkli)){ ?>  
<tr class="kumastr kumastr1">
    <td colspan="1"><input type="checkbox" class="silinecekkumas form-control"></td>
    <td>
    <select class="secimkumas select2 select-search" onchange="kumasdegistir(this)" style="width:100%;" id="select1">
    <option value="0">Seçiniz</option>
    <?php if(!empty($kumaslaricek)){ foreach ($kumaslaricek as $kms => $kmscek) { ?>
    <option value="<?php echo $kmscek['ID']; ?>"><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' ':'').(!empty($kmscek['ismi'])?$kmscek['ismi'].' ':''); ?></option>
    <?php } } ?>
    </select>
    <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="0"> 
    </td>
    <td class="kumaskodu">-</td>
    <td class="kumasismi">-</td>
    <td class="kumaskompozisyonu">-</td>
    <td class="kumaseni">-</td>
    <td class="kumasacikeni">-</td>
    <td class="kumasbirim1">cm</td>
    <td class="kumasgrm">-</td>
    <td class="kumasmkg">-</td>
    <td class="kumasfiyat">0</td>
    <td class="kumasfiyatdoviz">doviz</td>
    <td class="kumasbirim2">kg</td>
    <td class="kumasmfiyat">0</td>
    <td class="kumasmfiyatdovizi">doviz</td>
</tr>
<?php } ?>
<?php if(z(8,'a')=='duzenlekombinasyon'||!empty($farkli)){ ?>
    <?php
$enbilgisicek=$_X['enbilgisi'];
$enbilgisiarray=(!empty($_X['enbilgisi'])?json_decode($_X['enbilgisi'],1):'');
$enbilgisicekaciken=$_X['enbilgisiaciken'];
$enbilgisiacikenarray=(!empty($_X['enbilgisiaciken'])?json_decode($_X['enbilgisiaciken'],1):'');
$ensayi=0;
$tipsayi=0;
$ensayi2=1;
$ensayiyeni=0;
$kumaskartipusvefaynaciken='';
$kumaskartipusvefayn='';
if(!empty($enbilgisiarray)){ foreach($enbilgisiarray as $ien => $enbilgisi){ $ensayi++; $ensayi2++;
    $enoption=(!empty($enbilgisiacikenarray[$ien][0])?$enbilgisiacikenarray[$ien][0]:0);
    $ensayi2=0;
    $altsayi=0;
    $tipsayi=0;
    if($ensayi>1){ echo '</tbody><tbody class="kumastbody'.$ensayi2.'">'; } 
    if(!empty($enbilgisi)){ foreach($enbilgisi as $ien2 => $enbilgisi2){ 
        $kumaskartibilgisi=z(1,$ien,'','kumaskarti');
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
        } elseif ($kumaskartibilgisi['kumasfiyat']) {
            $kumaskartifiyat=$kumaskartibilgisi['kumasfiyat'];
        }
        $manuelkurusd=(!empty($kumaskartibilgisi['mkurusd'])?$kumaskartibilgisi['mkurusd']:'');
        $manuelkureur=(!empty($kumaskartibilgisi['mkureur'])?$kumaskartibilgisi['mkureur']:'');
        $kumaskartidoviz=(!empty($kumaskartibilgisi['nesne_IDdoviz'])?$kumaskartibilgisi['nesne_IDdoviz']:'');

        $kumaskartidovizmetin='';
        $kumaskartidovizmiktar='';
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
        $kumaskartifiyat=($kumaskartifiyat/$kumaskartidovizmiktar);

        
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
            $style='disabled';
        } else {
            $class='';
            $style='';
        }
        $altsayi++;
?>
        <?php
        $vtkumasfiyat=(!empty($_X['fiyatselect'])?json_decode($_X['fiyatselect'],1):'');
        $eachvtfiyat=(!empty($vtkumasfiyat[$ien][$tipsayi])?$vtkumasfiyat[$ien][$tipsayi]:'0');
        $eachvtfiyat2=(!empty($vtkumasfiyat[$ien][$tipsayi])?($vtkumasfiyat[$ien][$tipsayi]-1):'0');
        $kumastrfiyati=(!empty($kumaskartifiyatlar[$eachvtfiyat2])?$kumaskartifiyatlar[$eachvtfiyat2]:'0');
        $kumastrfiyati=($kumastrfiyati/$kumaskartidovizmiktar);

        ?>
        <tr class="kumastr kumastr<?php echo $ensayiyeni; ?> <?php echo $class; ?>">
            <td colspan="1"><input type="checkbox" class="silinecekkumas form-control"></td>
            <td>
            <select class="secimkumas select2 select-search" onchange="kumasdegistir(this)" id="select<?php echo $ensayiyeni; ?>" style="width:100%;" >
            <option value="0">Seçiniz</option>
            <?php if(!empty($kumaslaricek)){ foreach ($kumaslaricek as $kms => $kmscek) { ?>
            <option value="<?php echo $kmscek['ID']; ?>" <?php if($kmscek['ID']==$ien){ echo 'selected'; } ?>><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' ':'').(!empty($kmscek['ismi'])?$kmscek['ismi'].' ':''); ?></option>
            <?php } } ?>
            </select>
            <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="<?php echo $kumastrfiyati; ?>"> 
            </td>
            <td class="kumaskodu"><?php echo (!empty($kumaskartibilgisi['kodu'])?$kumaskartibilgisi['kodu']:''); ?></td>
            <td class="kumasismi"><?php echo (!empty($kumaskartibilgisi['ismi'])?$kumaskartibilgisi['ismi']:''); ?></td>
            <td class="kumaskompozisyonu"><?php echo (!empty($kompmetin)?$kompmetin:''); ?></td>
            <td class="kumaseni">
                <select name="kumaskarti[enbilgisi][<?php echo $ien; ?>][]" class="kumasenselect form-control" onchange="kumashesapla(this)">
                    <option value="0"></option>
                    <?php $kumaseni=0; if(!empty($kumaskartipusvefayn)){ foreach ($kumaskartipusvefayn as $kmspus => $kmspuscek) { ?>
                        <?php if(!empty($kmspuscek[1])&&$kmspuscek[0]=='on') { ?>
                            <option value="<?php echo ($kmspus+1); ?>" <?php if(($kmspus+1)==$enbilgisi2){ echo 'selected'; } ?>><?php echo (!empty($kmspuscek[1])?$kmspuscek[1]:''); ?></option>
                        <?php } ?>
                        <?php if(($kmspus+1)==$enbilgisi2){ $kumaseni=$kmspuscek[1]; } ?>
                    <?php } } ?>
                </select>
            </td>
            <?php /*/ ?>
            <td class="kumasacikeni">
                <select name="kumaskarti[enbilgisiaciken][<?php echo $ien; ?>][]" class="kumasenselect form-control" onchange="kumashesapla(this)">
                    <option value="0"></option>
                    <?php $kumasacikeni=0; if(!empty($kumaskartipusvefaynaciken)){ foreach ($kumaskartipusvefaynaciken as $kmspus2 => $kmspus2cek) { ?>
                    <?php if(!empty($kmspus2cek[0])&&$kmspus2cek[0]>0) { ?>
                        <option value="<?php echo ($kmspus2+1); ?>" <?php if(($kmspus2+1)==$enoption){ echo 'selected'; } ?> ><?php echo (!empty($kmspus2cek[0])?$kmspus2cek[0]:''); ?></option>
                        <?php //if(($kmspus2+1)==$enbilgisi2){ $kumasacikeni=$kmspus2cek[1]; } ?>
                    <?php } ?>
                    <?php } } ?>
                </select>
            </td>
            <?php /*/ ?>
            <?php
            $kumasgrm=(!empty($kumaskartibilgisi['grm'])?$kumaskartibilgisi['grm']:'');
            $kumasentipi=(!empty($kumaskartibilgisi['enTipi'])?$kumaskartibilgisi['enTipi']:'');
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
            <td class="kumasbirim1">cm</td>
            <td class="kumasgrm"><?php echo $kumasgrm; ?></td>
            <td class="kumasmkg"><?php echo $kumasmhesabi; ?></td>
            <td class="kumasfiyat">
            <input type="hidden" class="enintipi" name="bironemiyok" value="<?php echo $kumasentipi; ?>">
            
            <select class="fiyatselect form-control" name="kumaskarti[fiyatselect][<?php echo $ien; ?>][]" onchange="kumashesapla(this)">
            <option value="0">Fiyat Seçiniz</option>
            <?php 
            if(!empty($kumaskartifiyatlar)){ foreach ($kumaskartifiyatlar as $kmskrt => $kumasfyt) {
            $kumasid=($kmskrt+1);
            $kumasfyt=($kumasfyt/$kumaskartidovizmiktar);
            $boyabaskitipi=(!empty($boyamaliyetpush[$kmskrt])?$boyamaliyetpush[$kmskrt]:'');
            ?>
            <option value="<?php echo $kumasid; ?>" <?php if(!empty($eachvtfiyat)&&$eachvtfiyat==$kumasid){ echo 'selected'; } ?>><?php echo $boyabaskitipi; echo z(36,$kumasfyt,2); ?></option>
            <?php } } ?>
            </select>
            </td>
            <?php $tipsayi++; ?>
            <td class="kumasfiyatdoviz"><?php echo $kumaskartidovizmetin; ?></td>
            <td class="kumasbirim2"><?php echo $birimyansit; ?></td>
            <td class="kumasmfiyat"><?php echo z(36,$kumasmetrefiyati,4); ?></td>
            <td class="kumasmfiyatdovizi"><?php echo $kumaskartidovizmetin; ?></td>
            <td><div class="kumassil" onclick="kumassilme(this)">Sil</div></td>
        </tr>
    <?php } if($ensayi>1){ echo '</tbody>'; }   } ?>
<?php } } ?> 

<?php if(empty($enbilgisiarray)&&empty($enbilgisiacikenarray)) { ?>

<tr class="kumastr kumastr1">
    <td colspan="1"><input type="checkbox" class="silinecekkumas form-control"></td>
    <td>
    <select class="secimkumas select2 select-search" onchange="kumasdegistir(this)" style="width:100%;" id="select1">
    <option value="0">Seçiniz</option>
    <?php if(!empty($kumaslaricek)){ foreach ($kumaslaricek as $kms => $kmscek) { ?>
    <option value="<?php echo $kmscek['ID']; ?>"><?php echo (!empty($kmscek['kodu'])?$kmscek['kodu'].' ':'').(!empty($kmscek['ismi'])?$kmscek['ismi'].' ':''); ?></option>
    <?php } } ?>
    </select>
    <input type="hidden" name="neonemivar" class="tlfiyatkullan" value="0"> 
    </td>
    <td class="kumaskodu">-</td>
    <td class="kumasismi">-</td>
    <td class="kumaskompozisyonu">-</td>
    <td class="kumaseni">-</td>
    <td class="kumasacikeni">-</td>
    <td class="kumasbirim1">cm</td>
    <td class="kumasgrm">-</td>
    <td class="kumasmkg">-</td>
    <td class="kumasfiyat">0</td>
    <td class="kumasfiyatdoviz">doviz</td>
    <td class="kumasbirim2">kg</td>
    <td class="kumasmfiyat">0</td>
    <td class="kumasmfiyatdovizi">doviz</td>
    <td><div class="kumassil" onclick="kumassilme(this)">Sil</div></td>
</tr>

<?php } ?>
<?php } ?>
</tbody>
<?php
$boyabaskilaricek=z(1,"WHERE arsiv='0' AND kategori='3'",'','boyabaski');

?>
</table>
<table cellpadding="0" cellspacing="0" class="kombitablo" style="background: #e0e0e0;">

<tbody class="boyabaskitbody">
<tr>
    <th colspan="1">Silme</th>
    <th colspan="14"><b>FASON İŞLEM</b>
    <a href="#secililerisil" class="seciliboyabaski btn btn-danger"><i class="icon-minus3 icon-1x"></i></a>
&nbsp;<a href="#boyabaskicogalt" class="boyabaskiarttir btn btn-success"><b style="font-size:14px; color:white;"> <i class="icon-plus3 icon-1x"></i> </b></a>
    </th>
</tr>
<?php if(z(8,'a')=='eklekombinasyon'&&empty($farkli)){ ?>  
    <tr class="boyabaskitr boyabaskitr1">
        <td colspan="1"><input type="checkbox" class="silinecekboyabaski form-control"></td>
        <td colspan="10">
        <select class="secimboyabaski form-control" onchange="boyabaskidegistir(this)" name="<?php echo $tbl; ?>[ekkumas][]" style="width:100%;">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskilaricek)){ foreach ($boyabaskilaricek as $bybsk => $bybskcek) { ?>
        <option value="<?php echo $bybskcek['ID']; ?>"><?php echo (!empty($bybskcek['tipi'])?$bybskcek['tipi']:''); ?></option>
        <?php } } ?>
        </select>
        </td>
        <td class="boyabaskimekkumasgr"><input type="text" name="<?php echo $tbl; ?>[ekkumasgr][]" class="form-control" placeholder="gr"></td>
        <td class="boyabaskimfiyat">-</td>
        <td class="boyabaskimfiyatdovizi">doviz</td>
        <td><div class="boyabaskisil" onclick="boyabaskisilme(this)">Sil</div></td>
    </tr>
<?php } ?>
<?php if(z(8,'a')=='duzenlekombinasyon'||!empty($farkli)){ ?>
    <?php
$ekkumascek=$_X['ekkumas'];
$ekkumasarray=(!empty($_X['ekkumas'])?json_decode($_X['ekkumas'],1):'');
$ekkumasgrarray=(!empty($_X['ekkumasgr'])?json_decode($_X['ekkumasgr'],1):'');
$eksayi=0;
if(!empty($ekkumasarray)){ foreach($ekkumasarray as $iek => $ekkumas){ $eksayi++; 
    $ekkumastbl=z(1,$ekkumas,'','boyabaski');
    $_Nesnebybsk=z(37,z(1,"WHERE ad='' OR ad='doviz' OR ad='birimTipi'",'ID,ad,metin1,metin2','nesne'));
    $doviz=(!empty($_Nesnebybsk[$ekkumastbl['nesne_IDdoviz']]['metin1'])?$_Nesnebybsk[$ekkumastbl['nesne_IDdoviz']]['metin1']:'');
    $bybskfiyat=(!empty($ekkumastbl['fiyat'])?$ekkumastbl['fiyat']:'');
    $bybskfiyat=z(36,$bybskfiyat);
    $ekkumasgr=(!empty($ekkumasgrarray[$iek])?$ekkumasgrarray[$iek]:0);
?>
    <tr class="boyabaskitr boyabaskitr<?php echo $eksayi; ?>">
        <td colspan="1"><input type="checkbox" class="silinecekboyabaski form-control"></td>
        <td colspan="10">
        <select class="secimboyabaski form-control" onchange="boyabaskidegistir(this)" name="<?php echo $tbl; ?>[ekkumas][<?php echo $iek; ?>]" style="width:100%;">
        <option value="0">Seçiniz</option>
        <?php if(!empty($boyabaskilaricek)){ foreach ($boyabaskilaricek as $bybsk => $bybskcek) { ?>
        <option value="<?php echo $bybskcek['ID']; ?>" <?php if($bybskcek['ID']==$ekkumas){ echo 'selected'; } ?>><?php echo (!empty($bybskcek['tipi'])?$bybskcek['tipi']:''); ?></option>
        <?php } } ?>
        </select>
        </td>
        <td class="boyabaskimekkumasgr"><input type="text" name="<?php echo $tbl; ?>[ekkumasgr][]" class="form-control" placeholder="gr" value="<?php echo $ekkumasgr; ?>"></td>
        <td class="boyabaskimfiyat"><?php echo $bybskfiyat; ?></td>
        <td class="boyabaskimfiyatdovizi"><?php echo $doviz; ?></td>
        <td><div class="boyabaskisil" onclick="boyabaskisilme(this)">Sil</div></td>
    </tr>
    <?php } } else { ?>
        <tr class="boyabaskitr boyabaskitr1">
            <td colspan="1"><input type="checkbox" class="silinecekboyabaski form-control"></td>
            <td colspan="10">
            <select class="secimboyabaski form-control" onchange="boyabaskidegistir(this)" name="<?php echo $tbl; ?>[ekkumas][]" style="width:100%;">
            <option value="0">Seçiniz</option>
            <?php if(!empty($boyabaskilaricek)){ foreach ($boyabaskilaricek as $bybsk => $bybskcek) { ?>
            <option value="<?php echo $bybskcek['ID']; ?>"><?php echo (!empty($bybskcek['tipi'])?$bybskcek['tipi']:''); ?></option>
            <?php } } ?>
            </select>
            </td>
            <td class="boyabaskimekkumasgr"><input type="text" name="<?php echo $tbl; ?>[ekkumasgr][]" class="form-control" placeholder="gr"></td>
            <td class="boyabaskimfiyat">-</td>
            <td class="boyabaskimfiyatdovizi">doviz</td>
            <td><div class="boyabaskisil" onclick="boyabaskisilme(this)">Sil</div></td>
        </tr>

    <?php } ?>
<?php } ?>
</tbody>
<tbody class="toplamkumasfiyat">
<tr>
    <td colspan="8" style="text-align:right;"><b>TOPLAM KUMAŞ MALİYETİ :</b></td>
    <td colspan="1" class="usdfiyat"><b>0</b></td>
    <td colspan="1"><b>USD</b></td>
    <td colspan="1" class="eurfiyat"><b>0</b></td>
    <td colspan="1"><b>EUR</b></td>
    <td colspan="1" class="tryfiyat"><b>0</b></td>
    <td colspan="1"><b>TRY</b></td>
    <td></td>
</tr>
</tbody>
<?php
$_Nesnekar=z(37,z(1,"WHERE ad='' OR ad='karBirimleri'",'ID,ad,metin1,metin2','nesne'));
?>
<tbody class="boyamaliyetkarlari">
<tr><th colspan="1">Silme</th><th colspan="14">İlave Giderler 
<a href="#secililerisil" class="seciliilavegider btn btn-danger"><i class="icon-minus3 icon-1x"></i></a>
&nbsp;<a href="#boyamaliyetkarlaricogalt" class="karoranartir btn btn-success"><b style="font-size:14px; color:white;"> <i class="icon-plus3 icon-1x"></i> </b></a>
</th></tr>
<?php if(z(8,'a')=='eklekombinasyon'&&empty($farkli)){ ?>  
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari1">
<td colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></td>
   <td colspan="10">
    <select class="form-control" onchange="karorandegistir(this)" style="width:100%;">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>"><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
   </td>
   <td colspan="2">
        <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][]" style="width:100%;" placeholder="Kar oranı" autocomplete="off">
   </td>
   <td><div class="karoransil" onclick="karoransilme(this)">Sil</div></td>
   <?php if(z(8,'a')=='ekle'){ ?><td></td><?php } ?>
</tr>
<?php } ?>
<?php if(z(8,'a')=='duzenlekombinasyon'||!empty($farkli)){ ?>
<?php
$karoranlaricek=$_X['karoranlari'];
$karoranlariarray=(!empty($_X['karoranlari'])?json_decode($_X['karoranlari'],1):'');
$karsayi=0;
if(!empty($karoranlariarray)){ foreach($karoranlariarray as $ikar => $karoranlari){ $karsayi++; 
?>
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari<?php echo $karsayi; ?>">
<td colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></td>
   <th colspan="11">
    <select class="form-control" onchange="karorandegistir(this)" style="width:100%;">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>" <?php if($kar['ID']==$ikar){ echo 'selected'; } ?> ><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
   </th>
   <td colspan="2">
    <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][<?php echo $ikar; ?>]" value="<?php echo $karoranlari; ?>" style="width:100%;" placeholder="Kar oranı" autocomplete="off">
   </td>
   <td><div class="karoransil" onclick="karoransilme(this)">Sil</div></td>
   <?php if(z(8,'a')=='ekle'){ ?><td></td><?php } ?>
</tr>
<?php } } else { ?>
<tr class="boyamaliyetkarlarimiz boyamaliyetkarlari1">
<td colspan="1" style="width:4%;"><input type="checkbox" class="silinecekilavegider form-control"></td>
<th colspan="11">
    <select class="form-control" onchange="karorandegistir(this)" style="width:100%;">
        <option value="0">Seçiniz</option>
        <?php if(!empty($_Nesnekar)){ foreach($_Nesnekar as $kar){ ?>
            <option value="<?php echo $kar['ID']; ?>"><?php echo (!empty($kar['metin1'])?$kar['metin1']:0); ?></option>
        <?php } } ?>
    </select>
</th>
<td colspan="2">
    <input type="text" class="karoranlari form-control" onkeyup="karorandegistir()" name="<?php echo $tbl; ?>[karoranlari][]" style="width:100%;" placeholder="Kar oranı" autocomplete="off">
</td>
<td><div class="karoransil" onclick="karoransilme(this)">Sil</div></td>
<?php if(z(8,'a')=='ekle'){ ?><td></td><?php } ?>
</tr>
<?php } ?>
<?php } ?>
</tbody>
<tbody class="toplamfiyat">
<tr>
    <td colspan="8" style="text-align:right;"><b>TOPLAM FİYAT :</b></td>
    <td colspan="1" class="usdfiyat"><b>0</b></td>
    <td colspan="1"><b>USD</b></td>
    <td colspan="1" class="eurfiyat"><b>0</b></td>
    <td colspan="1"><b>EUR</b></td>
    <td colspan="1" class="tryfiyat"><b>0</b></td>
    <td colspan="1"><b>TRY</b></td>
    <td></td>
</tr>
</tbody>

<?php
$idcek=z(8,'id');
$srg="WHERE arsiv='0' AND modul='".$tbl."' AND modul_ID='".$idcek."' ORDER BY ID DESC";
$rapor=z(1,$srg,'','rapor');
$sayirapor=0;
if(!empty($rapor)){
    $sayirapor=count($rapor);
}
?>
<tbody>
<tr>
<td colspan="2"><b>Kumaş Eni</b></td>
<td colspan="2" class="bilgikumaseni"><input type="number" class="form-control" name="<?php echo $tbl; ?>[kombikumaseni]" value="<?php echo (!empty($_X['kombikumaseni'])?$_X['kombikumaseni']:0); ?>"></td>
<td colspan="2"><b>Kumaş Fiyatı</b></td>
<td colspan="9" class="bilgikumasfiyati">0₺</td>
</tr>
</tbody>

<tbody>
<tr class="kayittarihi"><th>Kayit Tarihi</th><td colspan="14">
    <div class="input-group col-lg-12">
        <span class="input-group-prepend">
            <span class="input-group-text"><i class="icon-calendar22"></i></span>
        </span>
        <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihKayit]" value="<?php echo (!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):z('datetime')); ?>" style="width: auto !important;">
    </div>
</td></tr>
<tr><th colspan="15" style="text-align: right;">
<?php if(z(8,"a")=="duzenle"){ echo ' <a href="./?s='.$tbl.'&a=ekle&farkli='.z(8,'id').'" class="btn" style="padding-top: 0px; margin-top: 4px;" target="_blank">BU VERİYİ FARKLI DÜZENLE VE KAYDET</a> '; } ?>&nbsp; 
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