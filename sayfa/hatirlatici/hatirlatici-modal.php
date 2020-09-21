<?php
$okundu=z(8,'okundu');
$ertele=z(8,'ertele');
$topluertele=z(8,'topluertele');
$modulertele=z(8,'modulertele');
$modultbl=z(8,'modultbl');
$persid=z('lgn','ID');
$suankitarih=z('datetime');
$ertelenensure='+10 minutes';
$ertelenensure5='+5 minutes';
$ertelenmistarih= date('Y-m-d H:i:s', strtotime($ertelenensure, strtotime($suankitarih)));
$ertelenmistarih5= date('Y-m-d H:i:s', strtotime($ertelenensure5, strtotime($suankitarih)));
$ertelenmistarih10= date('Y-m-d H:i:s', strtotime($ertelenensure, strtotime($suankitarih)));
$thatirla=z(11,'thatirla'); 
$thkey=z(11,'thkey'); 

if(!empty($okundu)){
    $erteleme=z(1,array('personel_ID'=>$persid,'hatirlatici_ID'=>$okundu),'','erteleme');
    $ertid = $erteleme[0]['ID'];
    if(!empty($erteleme)){
        z(3,$ertid,array('durumOkundu'=>'1'),'erteleme');
    } else{
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>$okundu,'durumOkundu'=>'1','tarih'=>z('datetime')),'erteleme');
    }
    z('git','geri');
}
if(!empty($ertele)){
    $erteleme=z(1,array('personel_ID'=>$persid,'hatirlatici_ID'=>$ertele),'','erteleme');
    $ertid = $erteleme[0]['ID'];
    if(!empty($erteleme)){
        z(3,$ertid,array('tarihErteleme'=>$ertelenmistarih),'erteleme');
    } else {
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>$ertele,'tarihErteleme'=>$ertelenmistarih,'tarih'=>z('datetime')),'erteleme');
    }
    z('git','geri');
}
if(!empty($topluertele)){
    $tperteleme=z(1,array('personel_ID'=>$persid,'hatirlatici_ID'=>0),'','erteleme');
    $tpertid = $tperteleme[0]['ID'];
    if(!empty($tperteleme)){
        z(4,$tpertid,'erteleme');
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>'0','tarihErteleme'=>$ertelenmistarih10,'tarih'=>z('datetime')),'erteleme');
    } else {
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>'0','tarihErteleme'=>$ertelenmistarih10,'tarih'=>z('datetime')),'erteleme');
    }
    /*/
    if(empty($thatirla)){
        z(11,'thatirla',$ertelenmistarih5);
        z(11,'thkey','1');
    }
    /*/
    z('git','geri');
}
if(!empty($modulertele)){
    $tperteleme=z(1,array('personel_ID'=>$persid,'hatirlatici_ID'=>0),'','erteleme');
    $tpertid = $tperteleme[0]['ID'];
    if(!empty($tperteleme)){
        z(4,$tpertid,'erteleme');
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>'0','tarihErteleme'=>$ertelenmistarih10,'tarih'=>z('datetime')),'erteleme');
    } else {
        z(2,array('personel_ID'=>$persid,'hatirlatici_ID'=>'0','tarihErteleme'=>$ertelenmistarih10,'tarih'=>z('datetime')),'erteleme');
    }
    /*/
    if(empty($thatirla)){
        z(11,'thatirla',$ertelenmistarih5);
        z(11,'thkey','1');
    }
    /*/
    z('git','./?s='.$modultbl.'&a=detay&id='.$modulertele);
}
if($thatirla<$suankitarih){
    z(11,'thatirla','0');
    z(11,'thkey','0');
}
?>
<style type="text/css">
    #okundu{
        text-align: center;
        width: 50%;
        float: left;
        border: 2px solid #ddd;
        display: block;
        background:green;
        color:#fff;
        text-decoration:none;
        margin-top:12px;
        padding: 8px 0;
    }
    #ertele{
        text-align: center;
        width: 33.3%;
        float: left;
        border: 2px solid #ddd;
        display: block;
        background:#b33a0c;
        color:#fff;
        text-decoration:none;
        margin-top:12px;
        padding: 8px 0;
        display: none;
    }
    #erteletoplu{
        text-align: center;
        width: 50%;
        float: left;
        border: 2px solid #ddd;
        display: block;
        background:#ff793f;
        color:#fff;
        text-decoration:none;
        margin-top:12px;
        padding: 8px 0;
    }

    #sonucubas{
        background-image: url(img/bell.svg);
        background-size:contain;
        background-repeat: no-repeat;
        padding-left: 200px;
    }

    @media only screen and (max-width: 1000px) {
        #erteletoplu, #ertele, #okundu{
            height: auto;
            min-height: 50px;
        }
    }
</style>
<?php if($thkey==0){ ?>
    <div class="gizli-forms gizlitab">
        <div id="sonucubas" style="width: 100%;float: left;">
            <div style="position: absolute; right: 12px;"><a href="#dznleme" id="dznleme"><img src="img/contract.svg" style="width: 24px; height: auto;"></a></div>
            <div id="baslikbas" style="width: 96%; float: left; letter-spacing: 0.2px; font-size: medium;"></div>
            <div id="aciklamabas" style="width: 96%;float: left;margin-top: 12px;"></div>
            <div id="detaybas" style="width: 96%;float: left;margin-top: 12px;"></div>
            <div id="iliskibas" style="width: 96%;float: left;margin-top: 12px;"></div>
            <a href="" id="iliskiliaciklama" style="width: 96%;float: left;margin-top: 12px;"></a>
            <a href="#okundu" id="okundu">Okundu Olarak İşaretle</a>
            <a href="#ertele" id="ertele">10 Dakika Ertele </a>
            <a href="?s=hatirlatici&a=listele&topluertele=1" id="erteletoplu">10 Dakika Tüm Hatırlatmaları Ertele </a>
        </div>
    </div>
    <div class="pencerekarart"></div>
    <?php } ?>