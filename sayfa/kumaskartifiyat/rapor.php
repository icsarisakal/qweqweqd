<?php echo '<h1><b>Bu ara modüldür rapor giremezsin.</b></h1>'; exit(); ?>
<?php
$tbl2='rapor';
$ekle=z(8,'ekle');
$vt=array();
$id=z(8,'id');

//Ekleme yeri
if(!empty($ekle)){
   
if(z(7,$tbl2)){
    $_X=z(7,$tbl2);
    $id=z(8,'id');

	$yoldizilim=(!empty($_X['yoldizilim'])?$_X['yoldizilim']:'');
    if(!empty($yoldizilim)){$yoldizilim=!empty($yoldizilim)?json_encode($yoldizilim):Null;}
    $_X['yoldizilim']=(!empty($yoldizilim)?$yoldizilim:'');

    $yoldizilim2=(!empty($_X['yoldizilim2'])?$_X['yoldizilim2']:'');
    if(!empty($yoldizilim2)){$yoldizilim2=!empty($yoldizilim2)?json_encode($yoldizilim2):Null;}
    $_X['yoldizilim2']=(!empty($yoldizilim2)?$yoldizilim2:'');

    $iplikdizilim=(!empty($_X['iplikdizilim'])?$_X['iplikdizilim']:'');
    if(!empty($iplikdizilim)){$iplikdizilim=!empty($iplikdizilim)?json_encode($iplikdizilim):Null;}
    $_X['iplikdizilim']=(!empty($iplikdizilim)?$iplikdizilim:'');

    $iplikdizilim2=(!empty($_X['iplikdizilim2'])?$_X['iplikdizilim2']:'');
    if(!empty($iplikdizilim2)){$iplikdizilim2=!empty($iplikdizilim2)?json_encode($iplikdizilim2):Null;}
    $_X['iplikdizilim2']=(!empty($iplikdizilim2)?$iplikdizilim2:'');

    $ignedizilim=(!empty($_X['ignedizilim'])?$_X['ignedizilim']:'');
    if(!empty($ignedizilim)){$ignedizilim=!empty($ignedizilim)?json_encode($ignedizilim):Null;}
    $_X['ignedizilim']=(!empty($ignedizilim)?$ignedizilim:'');

    $ignedizilim2=(!empty($_X['ignedizilim2'])?$_X['ignedizilim2']:'');
    if(!empty($ignedizilim2)){$ignedizilim2=!empty($ignedizilim2)?json_encode($ignedizilim2):Null;}
    $_X['ignedizilim2']=(!empty($ignedizilim2)?$ignedizilim2:'');

    $ignedizilimadet=(!empty($_X['ignedizilimadet'])?$_X['ignedizilimadet']:'');
    if(!empty($ignedizilimadet)){$ignedizilimadet=!empty($ignedizilimadet)?json_encode($ignedizilimadet):Null;}
    $_X['ignedizilimadet']=(!empty($ignedizilimadet)?$ignedizilimadet:'');

    $ignedizilimadet2=(!empty($_X['ignedizilimadet2'])?$_X['ignedizilimadet2']:'');
    if(!empty($ignedizilimadet2)){$ignedizilimadet2=!empty($ignedizilimadet2)?json_encode($ignedizilimadet2):Null;}
    $_X['ignedizilimadet2']=(!empty($ignedizilimadet2)?$ignedizilimadet2:'');

    $sistemsayi=(!empty($_X['sistemsayi'])?$_X['sistemsayi']:'');
    if(!empty($sistemsayi)){$sistemsayi=!empty($sistemsayi)?json_encode($sistemsayi):Null;}
    $_X['sistemsayi']=(!empty($sistemsayi)?$sistemsayi:'');

    $sistemsayi2=(!empty($_X['sistemsayi2'])?$_X['sistemsayi2']:'');
    if(!empty($sistemsayi2)){$sistemsayi2=!empty($sistemsayi2)?json_encode($sistemsayi2):Null;}
    $_X['sistemsayi2']=(!empty($sistemsayi2)?$sistemsayi2:'');

    $sistemiptalsayi=(!empty($_X['sistemiptalsayi'])?$_X['sistemiptalsayi']:'');
    if(!empty($sistemiptalsayi)){$sistemiptalsayi=!empty($sistemiptalsayi)?json_encode($sistemiptalsayi):Null;}
    $_X['sistemiptalsayi']=(!empty($sistemiptalsayi)?$sistemiptalsayi:'');

    $sistemiptalsayi2=(!empty($_X['sistemiptalsayi2'])?$_X['sistemiptalsayi2']:'');
    if(!empty($sistemiptalsayi2)){$sistemiptalsayi2=!empty($sistemiptalsayi2)?json_encode($sistemiptalsayi2):Null;}
    $_X['sistemiptalsayi2']=(!empty($sistemiptalsayi2)?$sistemiptalsayi2:'');

    $raporsayi=(!empty($_X['raporsayi'])?$_X['raporsayi']:'');
    if(!empty($raporsayi)){$raporsayi=!empty($raporsayi)?json_encode($raporsayi):Null;}
    $_X['raporsayi']=(!empty($raporsayi)?$raporsayi:'');

    $raporsayi2=(!empty($_X['raporsayi2'])?$_X['raporsayi2']:'');
    if(!empty($raporsayi2)){$raporsayi2=!empty($raporsayi2)?json_encode($raporsayi2):Null;}
    $_X['raporsayi2']=(!empty($raporsayi2)?$raporsayi2:'');

    $raporignesayi=(!empty($_X['raporignesayi'])?$_X['raporignesayi']:'');
    if(!empty($raporignesayi)){$raporignesayi=!empty($raporignesayi)?json_encode($raporignesayi):Null;}
    $_X['raporignesayi']=(!empty($raporignesayi)?$raporignesayi:'');

    $raporignesayi2=(!empty($_X['raporignesayi2'])?$_X['raporignesayi2']:'');
    if(!empty($raporignesayi2)){$raporignesayi2=!empty($raporignesayi2)?json_encode($raporignesayi2):Null;}
    $_X['raporignesayi2']=(!empty($raporignesayi2)?$raporignesayi2:'');

    $ignecesidisayi=(!empty($_X['ignecesidisayi'])?$_X['ignecesidisayi']:'');
    if(!empty($ignecesidisayi)){$ignecesidisayi=!empty($ignecesidisayi)?json_encode($ignecesidisayi):Null;}
    $_X['ignecesidisayi']=(!empty($ignecesidisayi)?$ignecesidisayi:'');

    $ignecesidisayi2=(!empty($_X['ignecesidisayi2'])?$_X['ignecesidisayi2']:'');
    if(!empty($ignecesidisayi2)){$ignecesidisayi2=!empty($ignecesidisayi2)?json_encode($ignecesidisayi2):Null;}
    $_X['ignecesidisayi2']=(!empty($ignecesidisayi2)?$ignecesidisayi2:'');

    $eknot=(!empty($_X['eknot'])?$_X['eknot']:'');
    if(!empty($eknot)){$eknot=!empty($eknot)?json_encode($eknot):Null;}
    $_X['eknot']=(!empty($eknot)?$eknot:'');

    $eknot2=(!empty($_X['eknot2'])?$_X['eknot2']:'');
    if(!empty($eknot2)){$eknot2=!empty($eknot2)?json_encode($eknot2):Null;}
    $_X['eknot2']=(!empty($eknot2)?$eknot2:'');

    $makineignesayi=(!empty($_X['makineignesayi'])?$_X['makineignesayi']:'');
    if(!empty($makineignesayi)){$makineignesayi=!empty($makineignesayi)?json_encode($makineignesayi):Null;}
    $_X['makineignesayi']=(!empty($makineignesayi)?$makineignesayi:'');

    $makineignesayi2=(!empty($_X['makineignesayi2'])?$_X['makineignesayi2']:'');
    if(!empty($makineignesayi2)){$makineignesayi2=!empty($makineignesayi2)?json_encode($makineignesayi2):Null;}
    $_X['makineignesayi2']=(!empty($makineignesayi2)?$makineignesayi2:'');


   /*/ $urund=z(10,$tbl2);
    $dosya= $urund['img'];
    if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif'))){
        $dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti/',$dosya); 
    }
    if (!empty($dosyaAd)) {
        $_X['img']=$dosyaAd;
    }/*/

    $_X['personel_ID']=z('lgn','ID');
    $_X['tarih']=z('datetime');
    $_X['modul']=$tbl;
    $_X['modul_ID']=$id;

    postKontrolTh($_X);
    
    $SID=z(2,$_X,$tbl2);
    if(!empty($SID)){
        z(33,'ekle',1);

        $urund=z(10,$tbl2);
        if(!empty($urund)){
            foreach ($urund as $urun) {
                $dosya=$urun;
                if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif','application/pdf'))){
                    $dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti/',$dosya); 
                }
                if (!empty($dosyaAd)) {
                    $galeriarray=array(
                        'arsiv'=>0,
                        'personel_ID'=>z('lgn','ID'),
                        'tarih'=>z('datetime'),
                        'tablo'=>$tbl2,
                        'tablo_ID'=>$SID,
                        'img'=>$dosyaAd
                    );
                    z(2,$galeriarray,'galeri');
                }
            }
        }

        if(!z(8,'ajaxform') || empty($ajaxAnahtar)){
            z('git','?s='.$syf.'&a=rapor&id='.$SID);
        }
    }
    else z(33,'ekle',-1);

}
if(z(8,'ajaxform') || !empty($ajaxAnahtar)){
    _z(33,'ekle');die;
}

} else {
$id=z(8,'id');
$vt=z(1,$id,'','rapor');

    if(z(7,$tbl2)){
        $_X=z(7,$tbl2);
        $id=z(8,'id');
    
        //$yoldizilim=(!empty($_X['yoldizilim'])?$_X['yoldizilim']:'');
        $yoldizilim=(!empty($_X['yoldizilim'])?array_filter($_X['yoldizilim']):'');
        if(!empty($yoldizilim)){$yoldizilim=!empty($yoldizilim)?json_encode($yoldizilim):Null;}
        $_X['yoldizilim']=(!empty($yoldizilim)?$yoldizilim:'');

        $yoldizilim2=(!empty($_X['yoldizilim2'])?array_filter($_X['yoldizilim2']):'');
        if(!empty($yoldizilim2)){$yoldizilim2=!empty($yoldizilim2)?json_encode($yoldizilim2):Null;}
        $_X['yoldizilim2']=(!empty($yoldizilim2)?$yoldizilim2:'');
    
        $iplikdizilim=(!empty($_X['iplikdizilim'])?$_X['iplikdizilim']:'');
        if(!empty($iplikdizilim)){$iplikdizilim=!empty($iplikdizilim)?json_encode($iplikdizilim):Null;}
        $_X['iplikdizilim']=(!empty($iplikdizilim)?$iplikdizilim:'');

        $iplikdizilim2=(!empty($_X['iplikdizilim2'])?$_X['iplikdizilim2']:'');
        if(!empty($iplikdizilim2)){$iplikdizilim2=!empty($iplikdizilim2)?json_encode($iplikdizilim2):Null;}
        $_X['iplikdizilim2']=(!empty($iplikdizilim2)?$iplikdizilim2:'');
        
        $ignedizilim=(!empty($_X['ignedizilim'])?$_X['ignedizilim']:'');
        if(!empty($ignedizilim)){$ignedizilim=!empty($ignedizilim)?json_encode($ignedizilim):Null;}
        $_X['ignedizilim']=(!empty($ignedizilim)?$ignedizilim:'');

        $ignedizilim2=(!empty($_X['ignedizilim2'])?$_X['ignedizilim2']:'');
        if(!empty($ignedizilim2)){$ignedizilim2=!empty($ignedizilim2)?json_encode($ignedizilim2):Null;}
        $_X['ignedizilim2']=(!empty($ignedizilim2)?$ignedizilim2:'');

        $ignedizilimadet=(!empty($_X['ignedizilimadet'])?$_X['ignedizilimadet']:'');
        if(!empty($ignedizilimadet)){$ignedizilimadet=!empty($ignedizilimadet)?json_encode($ignedizilimadet):Null;}
        $_X['ignedizilimadet']=(!empty($ignedizilimadet)?$ignedizilimadet:'');

        $ignedizilimadet2=(!empty($_X['ignedizilimadet2'])?$_X['ignedizilimadet2']:'');
        if(!empty($ignedizilimadet2)){$ignedizilimadet2=!empty($ignedizilimadet2)?json_encode($ignedizilimadet2):Null;}
        $_X['ignedizilimadet2']=(!empty($ignedizilimadet2)?$ignedizilimadet2:'');


        $sistemsayi=(!empty($_X['sistemsayi'])?$_X['sistemsayi']:'');
        if(!empty($sistemsayi)){$sistemsayi=!empty($sistemsayi)?json_encode($sistemsayi):Null;}
        $_X['sistemsayi']=(!empty($sistemsayi)?$sistemsayi:'');

        $sistemsayi2=(!empty($_X['sistemsayi2'])?$_X['sistemsayi2']:'');
        if(!empty($sistemsayi2)){$sistemsayi2=!empty($sistemsayi2)?json_encode($sistemsayi2):Null;}
        $_X['sistemsayi2']=(!empty($sistemsayi2)?$sistemsayi2:'');

        $sistemiptalsayi=(!empty($_X['sistemiptalsayi'])?$_X['sistemiptalsayi']:'');
        if(!empty($sistemiptalsayi)){$sistemiptalsayi=!empty($sistemiptalsayi)?json_encode($sistemiptalsayi):Null;}
        $_X['sistemiptalsayi']=(!empty($sistemiptalsayi)?$sistemiptalsayi:'');

        $sistemiptalsayi2=(!empty($_X['sistemiptalsayi2'])?$_X['sistemiptalsayi2']:'');
        if(!empty($sistemiptalsayi2)){$sistemiptalsayi2=!empty($sistemiptalsayi2)?json_encode($sistemiptalsayi2):Null;}
        $_X['sistemiptalsayi2']=(!empty($sistemiptalsayi2)?$sistemiptalsayi2:'');

        $raporsayi=(!empty($_X['raporsayi'])?$_X['raporsayi']:'');
        if(!empty($raporsayi)){$raporsayi=!empty($raporsayi)?json_encode($raporsayi):Null;}
        $_X['raporsayi']=(!empty($raporsayi)?$raporsayi:'');

        $raporsayi2=(!empty($_X['raporsayi2'])?$_X['raporsayi2']:'');
        if(!empty($raporsayi2)){$raporsayi2=!empty($raporsayi2)?json_encode($raporsayi2):Null;}
        $_X['raporsayi2']=(!empty($raporsayi2)?$raporsayi2:'');

        $raporignesayi=(!empty($_X['raporignesayi'])?$_X['raporignesayi']:'');
        if(!empty($raporignesayi)){$raporignesayi=!empty($raporignesayi)?json_encode($raporignesayi):Null;}
        $_X['raporignesayi']=(!empty($raporignesayi)?$raporignesayi:'');

        $raporignesayi2=(!empty($_X['raporignesayi2'])?$_X['raporignesayi2']:'');
        if(!empty($raporignesayi2)){$raporignesayi2=!empty($raporignesayi2)?json_encode($raporignesayi2):Null;}
        $_X['raporignesayi2']=(!empty($raporignesayi2)?$raporignesayi2:'');

        $ignecesidisayi=(!empty($_X['ignecesidisayi'])?$_X['ignecesidisayi']:'');
        if(!empty($ignecesidisayi)){$ignecesidisayi=!empty($ignecesidisayi)?json_encode($ignecesidisayi):Null;}
        $_X['ignecesidisayi']=(!empty($ignecesidisayi)?$ignecesidisayi:'');

        $ignecesidisayi2=(!empty($_X['ignecesidisayi2'])?$_X['ignecesidisayi2']:'');
        if(!empty($ignecesidisayi2)){$ignecesidisayi2=!empty($ignecesidisayi2)?json_encode($ignecesidisayi2):Null;}
        $_X['ignecesidisayi2']=(!empty($ignecesidisayi2)?$ignecesidisayi2:'');

        $makineignesayi=(!empty($_X['makineignesayi'])?$_X['makineignesayi']:'');
        if(!empty($makineignesayi)){$makineignesayi=!empty($makineignesayi)?json_encode($makineignesayi):Null;}
        $_X['makineignesayi']=(!empty($makineignesayi)?$makineignesayi:'');

        $makineignesayi2=(!empty($_X['makineignesayi2'])?$_X['makineignesayi2']:'');
        if(!empty($makineignesayi2)){$makineignesayi2=!empty($makineignesayi2)?json_encode($makineignesayi2):Null;}
        $_X['makineignesayi2']=(!empty($makineignesayi2)?$makineignesayi2:'');

        $eknot=(!empty($_X['eknot'])?$_X['eknot']:'');
        if(!empty($eknot)){$eknot=!empty($eknot)?json_encode($eknot):Null;}
        $_X['eknot']=(!empty($eknot)?$eknot:'');

        $eknot2=(!empty($_X['eknot2'])?$_X['eknot2']:'');
        if(!empty($eknot2)){$eknot2=!empty($eknot2)?json_encode($eknot2):Null;}
        $_X['eknot2']=(!empty($eknot2)?$eknot2:'');

        $urund=z(10,$tbl2);
        $dosya= $urund['img'];
		if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif'))){
			$dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti/',$dosya); 
		}
		if (!empty($dosyaAd)) {
			$_X['img']=$dosyaAd;
        }

        

    
        postKontrolTh($_X);
        
        if(z(3,$id,$_X,$tbl2)){
			z(33,'duzenle',1);
			z('git','yenile');
		}
		else z(33,'duzenle','-1');
    
    }
}
?>

<?php
$pusvefaynarray=array();
$pusvefayn2array=array();
$sistemsayiarray=array();
$sistemsayi2array=array();
$sistemiptalsayiarray=array();
$sistemiptalsayi2array=array();
$raporsayiarray=array();
$raporsayi2array=array();
$yolsayiarray=array();
$yolsayi2array=array();
$raporignesayiarray=array();
$raporignesayi2array=array();
$ignecesidisayiarray=array();
$ignecesidisayi2array=array();
$makineignesayiarray=array();
$makineignesayi2array=array();
$eknotarray=array();
$eknot2array=array();
$ignedizilimarray=array();
$ignedizilim2array=array();
$ignedizilimadetarray=array();
$ignedizilimadet2array=array();
if(!empty($vt)){
$sistemsayicek=$vt['sistemsayi'];
$sistemsayiarray=(!empty($vt['sistemsayi'])?json_decode($vt['sistemsayi'],1):'');
$sistemsayi2array=(!empty($vt['sistemsayi2'])?json_decode($vt['sistemsayi2'],1):'');
$sistemiptalsayicek=$vt['sistemiptalsayi'];
$sistemiptalsayiarray=(!empty($vt['sistemiptalsayi'])?json_decode($vt['sistemiptalsayi'],1):'');
$sistemiptalsayi2array=(!empty($vt['sistemiptalsayi2'])?json_decode($vt['sistemiptalsayi2'],1):'');
$raporsayicek=$vt['raporsayi'];
$raporsayiarray=(!empty($vt['raporsayi'])?json_decode($vt['raporsayi'],1):'');
$raporsayi2array=(!empty($vt['raporsayi2'])?json_decode($vt['raporsayi2'],1):'');
$raporignesayicek=$vt['raporignesayi'];
$raporignesayiarray=(!empty($vt['raporignesayi'])?json_decode($vt['raporignesayi'],1):'');
$raporignesayi2array=(!empty($vt['raporignesayi2'])?json_decode($vt['raporignesayi2'],1):'');
$ignecesidisayicek=$vt['ignecesidisayi'];
$ignecesidisayiarray=(!empty($vt['ignecesidisayi'])?json_decode($vt['ignecesidisayi'],1):'');
$ignecesidisayi2array=(!empty($vt['ignecesidisayi2'])?json_decode($vt['ignecesidisayi2'],1):'');
$makineignesayicek=$vt['makineignesayi'];
$makineignesayiarray=(!empty($vt['makineignesayi'])?json_decode($vt['makineignesayi'],1):'');
$makineignesayi2array=(!empty($vt['makineignesayi2'])?json_decode($vt['makineignesayi2'],1):'');
$yolsayicek=$vt['yolsayi'];
$yolsayiarray=(!empty($vt['yolsayi'])?json_decode($vt['yolsayi'],1):'');
$yolsayi2array=(!empty($vt['yolsayi2'])?json_decode($vt['yolsayi2'],1):'');
$yoldizilimcek=$vt['yoldizilim'];
$yoldizilimarray=(!empty($vt['yoldizilim'])?json_decode($vt['yoldizilim'],1):'');
$yoldizilim2array=(!empty($vt['yoldizilim2'])?json_decode($vt['yoldizilim2'],1):'');
$iplikdizilimcek=$vt['iplikdizilim'];
$iplikdizilimarray=(!empty($vt['iplikdizilim'])?json_decode($vt['iplikdizilim'],1):'');
$iplikdizilim2array=(!empty($vt['iplikdizilim2'])?json_decode($vt['iplikdizilim2'],1):'');
$eknotcek=$vt['eknot'];
$eknotarray=(!empty($vt['eknot'])?json_decode($vt['eknot'],1):'');
$eknot2array=(!empty($vt['eknot2'])?json_decode($vt['eknot2'],1):'');
$ignedizilimcek=$vt['ignedizilim'];
$ignedizilimarray=(!empty($vt['ignedizilim'])?json_decode($vt['ignedizilim'],1):'');
$ignedizilim2array=(!empty($vt['ignedizilim2'])?json_decode($vt['ignedizilim2'],1):'');
$ignedizilimadetcek=$vt['ignedizilimadet'];
$ignedizilimadetarray=(!empty($vt['ignedizilimadet'])?json_decode($vt['ignedizilimadet'],1):'');
$ignedizilimadet2array=(!empty($vt['ignedizilimadet2'])?json_decode($vt['ignedizilimadet2'],1):'');
}
$eskiveri='';
if(!empty($vt['modul_ID'])||!empty($vt['modul'])){
$eskiveri=z(1,$vt['modul_ID'],'',$vt['modul']);
} else {
    $eskiveri=z(1,$id,'','kumaskarti');
}


$pus='';
$fayn='';
$sistem='';
$igne='';
$plaka='';
$pusvefaynmetni='';
$pusvefaynmetni2='';
$kumaspusvefayn=0;
$pusvefaynjson=array();
if(!empty($eskiveri)){
    if($eskiveri['kumasturu_ID']){
        $kumasturu2=z(1,$eskiveri['kumasturu_ID'],'','kumasturu');
        $kumaspusvefayn=(!empty($eskiveri['pusvefayn'])?$eskiveri['pusvefayn']:0);
    }
    if($eskiveri['makinacesitleri_ID']){
        $makinecesitlerinioku=z(1,$eskiveri['makinacesitleri_ID'],'','makinacesitleri');
        $makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
        $makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
        $makinesistemsayi=(!empty($makinecesitlerinioku['sistemsayi'])?json_decode($makinecesitlerinioku['sistemsayi'],1):0);
        $makineignesayi=(!empty($makinecesitlerinioku['ignesayi'])?json_decode($makinecesitlerinioku['ignesayi'],1):0);
        $makineplakasayi=(!empty($makinecesitlerinioku['plakasayi'])?json_decode($makinecesitlerinioku['plakasayi'],1):0);
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
            $makinedongupus=(!empty($makinepus[$makinedonguid])?$makinepus[$makinedonguid]:'');
            $makinedongufayn=(!empty($makinefayn[$makinedonguid])?$makinefayn[$makinedonguid]:'');
            $makinedongusistem=(!empty($makinesistemsayi[$makinedonguid])?$makinesistemsayi[$makinedonguid]:'');
            $makinedonguigne=(!empty($makineignesayi[$makinedonguid])?$makineignesayi[$makinedonguid]:'');
            $makinedonguplaka=(!empty($makineplakasayi[$makinedonguid])?$makineplakasayi[$makinedonguid]:'');
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
                    $pus=$makinedongupus[$pf];
                }
                if(!empty($makinedongufayn[$pf])){
                    $fayn=$makinedongufayn[$pf];
                }
                if(!empty($makinedongusistem[$pf])){
                    $sistem=$makinedongusistem[$pf];
                }
                if(!empty($makinedonguigne[$pf])){
                    $igne=$makinedonguigne[$pf];
                }
                if(!empty($makinedonguplaka[$pf])){
                    $plaka=$makinedonguplaka[$pf];
                }
                $pusvefayncheck=(!empty($pfarray[0])?$pfarray[0]:'');
                $pusvefayndeger=(!empty($pfarray[1])?$pfarray[1]:$pfarray[0]);
               
                $pusvefaynjson[$pf]['pus']=$pus;
                $pusvefaynjson[$pf]['fayn']=$fayn;
                $pusvefaynjson[$pf]['sistem']=$sistem;
                $pusvefaynjson[$pf]['igne']=$igne;
                $pusvefaynjson[$pf]['plaka']=$plaka;
                $pusvefaynjson[$pf]['deger']=$pusvefayndeger;
                $pusvefaynjson[$pf]['check']=$pusvefayncheck;
                $pusvefaynjson[$pf]['id']=$pf;
            }
        }

    }
}
$nesneyedekparca=z(37,z(1,"WHERE ad='yedekParcalar'",'ID,ad,metin1,metin2','nesne'));
$yedekparca=z(1,"WHERE arsiv='0'",'','yedekparca');
$yedekparcaall=z(37, $yedekparca);
?>
<?php
$_NesneIplik=z(37,z(1,"WHERE ad='iplikkartTipi' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
$iplikyeniarray=array();
$ipliksecilensorgu="WHERE arsiv='0'";
$secileniplik=(!empty($eskiveri['iplikkartlari'])?$eskiveri['iplikkartlari']:'');
$secileniplik=(!empty($secileniplik)?json_decode($secileniplik,1):'');
if(!empty($secileniplik)){
    $ipliksecilensorgu.=' AND (';
    $secilenipliksayi=count($secileniplik);
    $sayilarimiz=0;
    foreach($secileniplik as $sec => $seciplik){
        $sayilarimiz++;
        if($sayilarimiz!=$secilenipliksayi){
            $ipliksecilensorgu.="ID='".$sec."' OR ";
        } else {
            $ipliksecilensorgu.="ID='".$sec."'";
        }
        
    }
    $ipliksecilensorgu.=')';
}
?>
<?php $_IplikKartlari=z(1,$ipliksecilensorgu,'','iplik');  ?>
<?php if(!empty($_IplikKartlari)){ foreach($_IplikKartlari as $iplk){ ?>
<?php
$iplikkart=(!empty($_NesneIplik[$iplk['nesne_IDiplikkartTipi']]['metin1'])?$_NesneIplik[$iplk['nesne_IDiplikkartTipi']]['metin1']:'');
$uretimTipi=(!empty($_NesneIplik[$iplk['nesne_IDuretimTipi']]['metin1'])?$_NesneIplik[$iplk['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
$boyaKontrol=(!empty($_NesneIplik[$iplk['nesne_IDboyaKontrol']]['metin1'])?$_NesneIplik[$iplk['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
$elyafmetin="";
if(!empty($iplk['elyaf'])){ 
    $elyafcek=$iplk['elyaf'];
    $elyafarray=(!empty($iplk['elyaf'])?json_decode($iplk['elyaf'],1):'');
    if(!empty($elyafarray)){
        $elyafarray=str_replace('puan','',$elyafarray);
    }
    if(!empty($elyafarray)){ foreach($elyafarray as $i => $elyf){
        $elyafnesne=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
        $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
    } } 
} 
$iplikkart=$iplikkart.(!empty($iplikkart)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.(!empty($boyakontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
$iplikyeniarray[$iplk['ID']]=$iplikkart;
?>
<?php } } ?> 
<style>
.ekcss{
    float: left;
    padding-right: 2px;
    padding-left: 2px;
}
select{
    /*width:100%;*/
}
input{
    /*width:100% !important;*/
}
.buldegistirimg{
    display:none;
    padding:3px;
    width:100%;
}
.resimgoster{
    display:initial;
}
.eknotumuz{
    display:none;
}
td{
    background:white;
}
.selectarttir{
    font-size: 10px;
    color: black;
    cursor:pointer;
}
.selectsil{
    font-size: 10px;
    color: black;
}
.selectisil{
    display:none;
}
.dtyborder{
    background: #5c5c5c;
    font-size: 12px;
    letter-spacing: 1px;
    text-decoration: none;
    font-weight: 700;
    border-radius: 42px;
    padding-right: 10px;
    padding-left: 10px;
    color: #f8f8f8;
    padding: 0.4em 0.4em 0.4em 1em;
    text-transform: uppercase;
    text-align: center;
}
.tablemiz{
    background: #f8f8f8;
    border: none;
    overflow: scroll;
    width: 100%;
    overflow-y: hidden;
    table-layout: auto;
}
.tablemiz tbody{
    display:block;
}
.tablemiz select{
    width:100%;
}
.tablemiz input{
    width:100%;
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
    display: none;
    border: 1px solid #96f196;
    background: white;
    border-radius: 10px;
    cursor: pointer;
    padding:2px;
}

.spanisim{
    color: black;
    display: block;
    border: 1px solid #ddd;
    border-radius: 10px;
}

.raporresim{
    overflow:hidden;
}

.raporresim img{
    width:100% !important;
    height: auto !important;
}

.raporresim div{
    width:170px;
}

.tablemiz td{
    width: 106px;
    min-width: 106px;
    max-width: 106px;
    display: table-cell;
}
.siralama td{
    width:auto;
}
.tablemiz th{
    width:120px;
}

.select-search{
    width: 100% !important;
}

.select2-container{
    width: 100% !important;
}
</style>
<?php
$plakakontrol=0;
$plakasorgu=" AND plaka='1' ";
if(!empty($pusvefaynjson)){
    foreach ($pusvefaynjson as $pfs => $pusvefayn) {
        if(!empty($pusvefayn['check']=='on')){
            if($pusvefayn['plaka']=='2'){
                $plakakontrol++;
                $plakasorgu=" AND plaka='2' ";
            }
        }
    }
}
?>
<?php $raporlaricek=z(1,"WHERE arsiv='0' AND sistemsayi!='' AND ignecesidisayi!='' ".$plakasorgu,'','rapor'); $raporlaricek2=z(37, $raporlaricek); ?>
<?php $raporlaricek0=z(1,"WHERE arsiv='0' AND sistemsayi2!='' AND ignecesidisayi2!='' ".$plakasorgu,'','rapor'); $raporlaricek02=z(37, $raporlaricek0); ?>
<script>
$(document).ready(function(){
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu4",
        success:function(gelensorgu){
            var yedekparcaall=gelensorgu.cevap.yedekparcaall;
            window.yedekparcaall=yedekparcaall;
        }
    });
});
function selectarttir(ths){
    var clonela = $(ths).parent().find("div:eq(0)").clone();
    clonela.find("a").removeClass("selectisil");
    $(ths).parent().append(clonela);
}
function selectsil(ths){
    $(ths).parent().remove();
}
var optionumuz='<option value="0">Seçiniz</option>';
<?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp => $ydkprc) { ?>
    optionumuz=optionumuz+'<option value="<?php echo $ydkprc['ID']; ?>"><?php echo (!empty($ydkprc['ad'])?$ydkprc['ad']:''); ?></option>';
<?php } } ?>

var optionumuz2='<option value="0">Seçiniz</option>';
<?php if(!empty($iplikyeniarray)){ foreach ($iplikyeniarray as $yp2 => $ydkprc2) { ?>
    optionumuz2=optionumuz2+'<option value="<?php echo $yp2; ?>"><?php echo (!empty($ydkprc2)?$ydkprc2:''); ?></option>';
<?php } } ?>

var raporlar='';
var raporlar2='';

<?php if(!empty($raporlaricek2)){
    $raporlaricek2=$raporlaricek2;
} else {
    $raporlaricek2='{}';
} ?>

<?php if(!empty($raporlaricek2)){
    $raporlaricek02=$raporlaricek02;
} else {
    $raporlaricek02='{}';
} ?>

var raporlar=<?php echo json_encode($raporlaricek); ?>;
var raporlar2=<?php echo json_encode($raporlaricek02); ?>;

function raporsayi2bul(ths){
    //var deger=$(ths).val();
    var deger=$(ths).parent().parent().find(".sistemsayi2si").val();
    var sistemsayisi=$(ths).parent().parent().find(".sistembilgi span").text();
    var sistemiptalsayisi=$(ths).parent().parent().find(".sistemiptalsayi2").val();
    if(sistemiptalsayisi=='null'){
        var sistemiptalsayisi=0;
    }
    var yeniraporsayisi=sy(sistemsayisi-sistemiptalsayisi)/deger;
    $(ths).parent().parent().find(".raporsayi2si").val(yeniraporsayisi);
}
function raportekrarsayi2bul(ths){
    //var deger=$(ths).val();
    var deger=$(ths).parent().parent().find(".sistemsayi2si").val();
    var makinedekiraporsayisi=$(ths).parent().parent().find(".raporsayi2si").val();
    var sistemsayisi=$(ths).parent().parent().find(".sistembilgi span").text();
    var sistemiptalsayisi=$(ths).parent().parent().find(".sistemiptalsayi2").val();
    if(sistemiptalsayisi=='null'){
        var sistemiptalsayisi=0;
    }
    var yenisistemiptalsayisi=sy(deger*makinedekiraporsayisi)-sistemsayisi;
    //yenisistemiptalsayisi=Math.abs(yenisistemiptalsayisi);
    $(ths).parent().parent().find(".sistemiptalsayi2").val(yenisistemiptalsayisi);
}
function raporignesayi2bul(ths){
    var deger=$(ths).val();
    var sistemsayisi=$(ths).parent().parent().find(".ignebilgi span").text();
    var yeniraporsayisi=sy(sistemsayisi/deger);
    $(ths).parent().parent().find(".makineignesayi2").val(yeniraporsayisi);
}
function ignecesidi2guncelle(ths){
    var ignecesidisayival=$(ths).val();
    $(".ignecesidisayi2").val(ignecesidisayival);
    var ozgurtr='';
    var ozgurtr2='';

    var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" autocomplete="off" value="0">';
    for (i3 = 0; i3 < ignecesidisayival; i3++) {
        ozgurtr2=ozgurtr2+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg">'+adetbilgimiz+'</td>';
    }
    ozgurtr=ozgurtr+'';
    var ozgurtryeni=ozgurtr2;
    ozgurtr2='<tr class="ignedizilimi2"><th>İğne Dizilimi / Adet </th>'+ozgurtr2+'</tr>';
    
    var ozgurcogalma='';
    var ozgurilk='';
    var ozguriki='';
    /*
    var i2=0;
    for (i2 = 0; i2 < ignecesidisayival; i2++) {
        ozguriki=ozguriki+'<tr><th>İğne Dizilimi / Adet '+(i2+1)+'.İğne Çeşidi</th>'+ozgurtryeni+'<tr>';
        var ozguriki=ozguriki.split('rapor[ignedizilim][]').join('rapor[ignedizilim]['+i2+'][]');
        var ozguriki=ozguriki.split('rapor[ignedizilimadet][]').join('rapor[ignedizilimadet]['+i2+'][]');
    }
    */
    //console.log(ozguriki);
    $('.ignedizilimi2').remove();
    $(".ignetbody2").html(ozgurtr2);

}

function raporyansit2(ths){
    var yolselect='';
    var yoltr='';
    var yoltryeni='';
    var yoldizilimsayi=0;

    var siralama='';
    var eknotbilgi='<tr class="notdizilimi2"><th>Not Dizilimi</th>';

    var iplikselect='';
    var iplikselectust='';
    var iplikselectyeni='';
    var iplikselectyeni2='';
    var ipliktr='';
    var iplikdizilimsayi=0;

    var igneselect='';
    var igneselectust='';
    var igneselectyeni='';
    var ignetr='';
    var ignedizilimsayi=0;


    var deger=$(ths).val();
    var raporuoku=raporlar2[deger];
    var yolsayi='';
    if(raporuoku["yolsayi2"]!=null){
        var yolsayi=raporuoku["yolsayi2"];
        if(yolsayi!=null){
            $(ths).parent().parent().parent().find(".yolsayidegistir2").val(yolsayi).attr("selected","selected");
        }
    } else {
        var yolsayi="1";
        if(yolsayi!=null){
            $(ths).parent().parent().parent().find(".yolsayidegistir2").val(yolsayi).attr("selected","selected");
        }

    }

    var sistemsayivt='';
    var sistemsayivt=JSON.parse(raporuoku["sistemsayi2"]);
    var sistemsayivt=sistemsayivt[0];
    
    var yoldizilim='';
    if(raporuoku["yoldizilim2"]!=null){
        var yoldizilim=JSON.parse(raporuoku["yoldizilim2"]);
        if(yoldizilim!=null){
            $.each(yoldizilim, function(k, v) {
                yoldizilimsayi++;
                siralama='<tr class="siralama2"><th>Sıralama</th>';
                var siralamasayi=0;
                yolselect='';
                var yolsayiyansit=yolsayi;
                $.each(yoldizilim[k], function(c, x) {
                    siralamasayi++;
                    siralama=siralama+'<td>'+(siralamasayi)+'</td>';
                    var resimadi=window.yedekparcaall[x];
                    var resimimg='sprem.png';
                    var resimstyle='display:none;';
                    if(resimadi!=null&&resimadi["img"]!=null){
                        resimimg=resimadi["img"];
                        resimstyle='display:initial;';
                    }
                    var optionumuzyeni=optionumuz;
                    optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                    yolselect=yolselect+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim2]['+k+'][]">'+optionumuzyeni+'</select><img src="upload/kumaskarti/'+resimimg+'" width="75" class="buldegistirimg" style="'+resimstyle+'"></td>';
                }); 
                yoltryeni=yoltryeni+'<tr class="yenitbody2"><th>'+yoldizilimsayi+'.Yol</th>'+yolselect+'</tr>';
            }); 
            yoltr=yoltryeni;
            siralama=siralama+'</tr>';
        }
    } else {
        siralama='<tr class="siralama2"><th>Sıralama</th>';
        var siralamasayi=0;
        yolselect='';
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            siralamasayi++;
            siralama=siralama+'<td>'+(siralamasayi)+'</td>';
            var resimimg='sprem.png';
            var resimstyle='display:none;';
            var optionumuzyeni=optionumuz;
            yolselect=yolselect+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim2][0][]">'+optionumuzyeni+'</select><img src="upload/kumaskarti/'+resimimg+'" width="75" class="buldegistirimg" style="'+resimstyle+'"></td>';
        }
        yoltryeni=yoltryeni+'<tr class="yenitbody2"><th>1.Yol</th>'+yolselect+'</tr>';
        yoltr=yoltryeni;
        siralama=siralama+'</tr>';
    }
    
    var eknot='';
    if(raporuoku["eknot2"]!=null){
        var eknot=JSON.parse(raporuoku["eknot2"]);
        if(eknot!=null){
            $.each(eknot, function(k, v) {
                eknotbilgi=eknotbilgi+'<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot2]['+k+']" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;" value="'+v+'"></td>';
            }); 
        }
        eknotbilgi=eknotbilgi+'</tr>';
    } else {
        var dongusayi=0;
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            eknotbilgi=eknotbilgi+'<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot2]['+dongusayi+']" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;" value=""></td>';
            dongusayi++;
        }
        eknotbilgi=eknotbilgi+'</tr>';
    }

    var selectarttir='<a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>';
    var selectsil='<a href="#selectiplik22" class="selectsil selectisil" onclick="selectsil(this)">Sil (-)</a>';
    var iplikdizilim='';
    if(raporuoku["iplikdizilim2"]!=null){
        var iplikdizilim=JSON.parse(raporuoku["iplikdizilim2"]);
        if(iplikdizilim!=null){
            $.each(iplikdizilim, function(k, v) {
                iplikdizilimsayi++;
                var iplikselectust='<td class="selectiplik" id="selectiplik">'+selectarttir;
                iplikselect='';
                var silsayikontrol=0;
                $.each(iplikdizilim[k], function(c, x) {
                    var selectclass="selectisil";
                    if(silsayikontrol!=0){
                        var selectclass="";
                    }
                    var selectsil='<a href="#selectiplik22" class="selectsil '+selectclass+'" onclick="selectsil(this)">Sil (-)</a>';
                    var optionumuzyeni=optionumuz2;
                    optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                    iplikselect=iplikselect+'<div class="selectdiv"><select name="rapor[iplikdizilim2]['+k+'][]">'+optionumuzyeni+'</select>'+selectsil+'</div>';
                    silsayikontrol++;
                }); 
                iplikselectyeni=iplikselectyeni+iplikselectust+iplikselect+'</td>';
            }); 
            ipliktr='<tr class="iplikdizilimi2"><th>İplik Dizilimi</th>'+iplikselectyeni+'</tr>';
        }
    } else {
        var dongusayi=0;
        var iplikselectust='<td class="selectiplik" id="selectiplik">'+selectarttir;
        iplikselect='';
        var sistemfor;
        var silsayikontrol=0;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            var selectsil='<a href="#selectiplik22" class="selectsil" onclick="selectsil(this)">Sil (-)</a>';
            var optionumuzyeni=optionumuz2;
            iplikselect=iplikselect+'<div class="selectdiv"><select name="rapor[iplikdizilim2]['+dongusayi+'][]">'+optionumuzyeni+'</select>'+selectsil+'</div>';
            dongusayi++;
        }
        iplikselectyeni=iplikselectyeni+iplikselectust+iplikselect+'</td>';
        ipliktr='<tr class="iplikdizilimi2"><th>İplik Dizilimi</th>'+iplikselectyeni+'</tr>';
    }

    var ignedizilim='';
    if(raporuoku["ignedizilim2"]!=null){
        var ignedizilim=JSON.parse(raporuoku["ignedizilim2"]);
        var ignedizilimadet=JSON.parse(raporuoku["ignedizilimadet2"]);
        if(ignedizilim!=null){
            $.each(ignedizilim, function(c, x) {
                var resimadi=window.yedekparcaall[x];
                var resimimg='sprem.png';
                var resimanahtar='1';
                var resimboyut='100';
                var resimstyle='display:none;';
            
                if(resimadi!=null&&resimadi["img"]!=null){
                    resimimg=resimadi["img"];
                    resimanahtar=resimadi["anahtar"];
                    resimstyle='display:initial;';
                }
                if(resimanahtar=='2'){
                    resimboyut='16';
                } else {
                    resimboyut='100';
                }
                
                if(ignedizilimadet[c]!=null){
                    var igneadetgetir=ignedizilimadet[c];
                } else {
                    var igneadetgetir="0";
                }
                var optionumuzyeni=optionumuz;
                var igneimg='<img src="upload/kumaskarti/'+resimimg+'" style="width:'+resimboyut+'%; display:initial;" class="buldegistirimg" style="'+resimstyle+'">';
                var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" autocomplete="off" value="'+igneadetgetir+'">';
                optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                igneselect=igneselect+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]">'+optionumuzyeni+'</select>'+igneimg+adetbilgimiz+'</td>';
            }); 
            ignetr='<tr class="ignedizilimi2"><th>İğne Dizilimi / Adet</th>'+igneselect+'</tr>';
        }
    } else {
        var resimimg='sprem.png';
        var resimanahtar='1';
        var resimboyut='100';
        var resimstyle='display:none;';
        var igneadetgetir="0";
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            var optionumuzyeni=optionumuz;
            var igneimg='<img src="upload/kumaskarti/'+resimimg+'" style="width:'+resimboyut+'%; display:initial;" class="buldegistirimg" style="'+resimstyle+'">';
            var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" autocomplete="off" value="'+igneadetgetir+'">';
            igneselect=igneselect+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]">'+optionumuzyeni+'</select>'+igneimg+adetbilgimiz+'</td>';
        }
        ignetr='<tr class="ignedizilimi2"><th>İğne Dizilimi / Adet</th>'+igneselect+'</tr>';
    }

    //var ilktbodyicerigi=siralama+yoltr+eknotbilgi+ipliktr;
    var ilktbodyicerigi=siralama+yoltr+eknotbilgi;
    var ikincitbody='<tbody class="ignetbody2">'+ignetr+'</tbody>';

    $('.ignetbody2').remove();
    $('.yenitbody2').remove();
    $('.siralama2').remove();
    $('.iplikdizilimi2').remove();
    $('.notdizilimi2').remove();
    $(ths).parent().parent().parent().find("tr:eq(1)").after(ilktbodyicerigi);

    $('.ignedizilimi2').remove();
    $(ths).parent().parent().parent().after(ikincitbody);
}

function yoldegistir2(ths){
    var index=$(ths).parent().parent().parent().index();
    var inputgizli=$(ths).parent().parent().parent().find(".cekbilgiyi").val();
    var ozgurtbody='<tbody class="yenitbody yeni'+inputgizli+'">';
    var tiklanansayi=$(ths).val();

    var sistemsayisival=$(".sistemsayi2si:eq(0)").val();
    var raporignesayisival=$(".raporignesayi2:eq(0)").val();
    var ignecesidisayival=$(".ignecesidisayi2:eq(0)").val();

    var ozgurtr='';
    var ozgurtr2='';
    var iplikdizilim='';
    var notdizilim='';
    var ozgurhead='<tr class="siralama2"><th>Sıralama</th>';
    var inputgizli2=sy(inputgizli)+1;


    var i2=0;
    var checkbox='<br>Ek not:<input type="checkbox" onclick="checket(this)" value="0">';
    var eknotumuz='<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot2][]" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;"></td>';
    var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" autocomplete="off" value="0">';
    for (i2 = 0; i2 < sistemsayisival; i2++) {
        ozgurtr=ozgurtr+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim2][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg"></td>';
        ozgurhead=ozgurhead+'<td>'+(i2+1)+'</td>';
        var selectarttir='<a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>';
        var selectsil='<a href="#selectiplik22" class="selectsil selectisil" onclick="selectsil(this)">Sil (-)</a>';
        iplikdizilim=iplikdizilim+'<td class="selectiplik" id="selectiplik">'+selectarttir+'<div class="selectdiv"><select name="rapor[iplikdizilim2]['+i2+'][]">'+optionumuz2+'</select>'+selectsil+'<div></td>';
        notdizilim=notdizilim+eknotumuz;
    }
    for (i3 = 0; i3 < raporignesayisival; i3++) {
        ozgurtr2=ozgurtr2+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg">'+adetbilgimiz+'</td>';
    }
    ozgurtr=ozgurtr+'';
    var ozgurtryeni=ozgurtr2;
    ozgurtr2='<tr class="ignedizilimi2"><th>İğne Dizilimi / Adet </th>'+ozgurtr2+'</tr>';
    iplikdizilim='<tr class="iplikdizilimi2"><th>İplik Dizilimi</th>'+iplikdizilim+'</tr>';
    notdizilim='<tr class="notdizilimi2"><th>Not Dizilimi</th>'+notdizilim+'</tr>';
    ozgurtbody=ozgurtbody+ozgurhead+'<tr>';

    var ozgurcogalma='';
    var ozgurilk='';
    var ozguriki='';

    var i=0;
    var yolsayiyansit=tiklanansayi;
    for (i = 0; i < tiklanansayi; i++) {
        ozgurilk='<tr class="yenitbody2"><th>'+(yolsayiyansit)+'.Yol</th>'+ozgurtr+'<tr>';
        yolsayiyansit--;
        //var ozgurilk=ozgurilk.replace('rapor[yoldizilim]['+inputgizli+'][][]', 'rapor[yoldizilim]['+inputgizli+']['+i+'][]');
        var ozgurilk=ozgurilk.split('rapor[yoldizilim2][]').join('rapor[yoldizilim2]['+yolsayiyansit+'][]');
        var ozgurilk=ozgurilk.split('rapor[iplikdizilim2][]').join('rapor[iplikdizilim2]['+i+'][]');
        var ozgurilk=ozgurilk.split('rapor[eknot2][]').join('rapor[eknot2]['+i+'][]');
        ozgurcogalma=ozgurcogalma+ozgurilk;
    }

    var i2=0;
    for (i2 = 0; i2 < ignecesidisayival; i2++) {
        ozguriki=ozguriki+'<tr><th>İğne Dizilimi / Adet '+(i2+1)+'.İğne Çeşidi</th>'+ozgurtryeni+'<tr>';
        var ozguriki=ozguriki.split('rapor[ignedizilim2][]').join('rapor[ignedizilim2]['+i2+'][]');
        var ozguriki=ozguriki.split('rapor[ignedizilimadet2][]').join('rapor[ignedizilimadet2]['+i2+'][]');
    }
    console.log(tiklanansayi+"tiklanansayi");
    console.log(ignecesidisayival+"ignecesidisayival");
    //ozgurtbody=ozgurtbody+ozgurcogalma+notdizilim+iplikdizilim+'</tbody>';
    ozgurtbody=ozgurtbody+ozgurcogalma+notdizilim+'</tbody>';
    //$('.yeni'+inputgizli).remove();
    $('.yenitbody2').remove();
    $('.siralama2').remove();
    $('.iplikdizilimi2').remove();
    $('.notdizilimi2').remove();
    //$('.ignedizilimi').remove();
    $(ths).parent().parent().parent().after(ozgurtbody);
    //$(".ignetbody").html(ozgurtr2);
}



function raporsayibul(ths){
    //var deger=$(ths).val();
    var deger=$(ths).parent().parent().find(".sistemsayisi").val();
    var sistemsayisi=$(ths).parent().parent().find(".sistembilgi span").text();
    var sistemiptalsayisi=$(ths).parent().parent().find(".sistemiptalsayi").val();
    if(sistemiptalsayisi=='null'){
        var sistemiptalsayisi=0;
    }
    var yeniraporsayisi=sy(sistemsayisi-sistemiptalsayisi)/deger;
    $(ths).parent().parent().find(".raporsayisi").val(yeniraporsayisi);
}
function raportekrarsayibul(ths){
    //var deger=$(ths).val();
    var deger=$(ths).parent().parent().find(".sistemsayisi").val();
    var makinedekiraporsayisi=$(ths).parent().parent().find(".raporsayisi").val();
    var sistemsayisi=$(ths).parent().parent().find(".sistembilgi span").text();
    var sistemiptalsayisi=$(ths).parent().parent().find(".sistemiptalsayi").val();
    if(sistemiptalsayisi=='null'){
        var sistemiptalsayisi=0;
    }
    var yenisistemiptalsayisi=sy(deger*makinedekiraporsayisi)-sistemsayisi;
    //yenisistemiptalsayisi=Math.abs(yenisistemiptalsayisi);
    $(ths).parent().parent().find(".sistemiptalsayi").val(yenisistemiptalsayisi);
}
function raporignesayibul(ths){
    var deger=$(ths).val();
    var sistemsayisi=$(ths).parent().parent().find(".ignebilgi span").text();
    var yeniraporsayisi=sy(sistemsayisi/deger);
    $(ths).parent().parent().find(".makineignesayi").val(yeniraporsayisi);
}

function checket(ths){
    console.log("check etti");
    var deger=$(ths).val();
    console.log(deger);
    if(deger=='0'){
        console.log("if etti");
        $(ths).parent().find(".eknotumuz").show();
        $(ths).val("1");
    } else {
        console.log("else etti");
        $(ths).parent().find(".eknotumuz").hide();
        $(ths).parent().find(".eknotumuz").val("");
        $(ths).val("0");
    }
}

function raporyansit(ths){
    console.log("sa");
    var yolselect='';
    var yoltr='';
    var yoltryeni='';
    var yoldizilimsayi=0;

    var siralama='';
    var eknotbilgi='<tr class="notdizilimi"><th>Not Dizilimi</th>';

    var iplikselect='';
    var iplikselectust='';
    var iplikselectyeni='';
    var iplikselectyeni2='';
    var ipliktr='';
    var iplikdizilimsayi=0;

    var igneselect='';
    var igneselectust='';
    var igneselectyeni='';
    var ignetr='';
    var ignedizilimsayi=0;


    var deger=$(ths).val();
    var raporuoku=raporlar[deger];
    console.log(raporoku);
    var yolsayi='';
    if(raporuoku["yolsayi"]!=null){
        var yolsayi=raporuoku["yolsayi"];
        if(yolsayi!=null){
            $(ths).parent().parent().parent().find(".yolsayidegistir").val(yolsayi).attr("selected","selected");
        }
    } else {
        var yolsayi="1";
        if(yolsayi!=null){
            $(ths).parent().parent().parent().find(".yolsayidegistir").val(yolsayi).attr("selected","selected");
        }

    }

    var sistemsayivt='';
    var sistemsayivt=JSON.parse(raporuoku["sistemsayi"]);
    var sistemsayivt=sistemsayivt[0];
    
    var yoldizilim='';
    if(raporuoku["yoldizilim"]!=null){
        var yoldizilim=JSON.parse(raporuoku["yoldizilim"]);
        if(yoldizilim!=null){
            $.each(yoldizilim, function(k, v) {
                yoldizilimsayi++;
                siralama='<tr class="siralama"><th>Sıralama</th>';
                var siralamasayi=0;
                yolselect='';
                $.each(yoldizilim[k], function(c, x) {
                    siralamasayi++;
                    siralama=siralama+'<td>'+(siralamasayi)+'</td>';
                    var resimadi=window.yedekparcaall[x];
                    var resimimg='sprem.png';
                    var resimstyle='display:none;';
                    if(resimadi!=null&&resimadi["img"]!=null){
                        resimimg=resimadi["img"];
                        resimstyle='display:initial;';
                    }
                    var optionumuzyeni=optionumuz;
                    optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                    yolselect=yolselect+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim]['+k+'][]">'+optionumuzyeni+'</select><img src="upload/kumaskarti/'+resimimg+'" width="75" class="buldegistirimg" style="'+resimstyle+'"></td>';
                }); 
                yoltryeni=yoltryeni+'<tr class="yenitbody"><th>'+yoldizilimsayi+'.Yol</th>'+yolselect+'</tr>';
            }); 
            yoltr=yoltryeni;
            siralama=siralama+'</tr>';
        }
    } else {
        siralama='<tr class="siralama2"><th>Sıralama</th>';
        var siralamasayi=0;
        yolselect='';
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            siralamasayi++;
            siralama=siralama+'<td>'+(siralamasayi)+'</td>';
            var resimimg='sprem.png';
            var resimstyle='display:none;';
            var optionumuzyeni=optionumuz;
            yolselect=yolselect+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim][0][]">'+optionumuzyeni+'</select><img src="upload/kumaskarti/'+resimimg+'" width="75" class="buldegistirimg" style="'+resimstyle+'"></td>';
        }
        yoltryeni=yoltryeni+'<tr class="yenitbody"><th>1.Yol</th>'+yolselect+'</tr>';
        yoltr=yoltryeni;
        siralama=siralama+'</tr>';
    }

    var eknot='';
    if(raporuoku["eknot"]!=null){
        var eknot=JSON.parse(raporuoku["eknot"]);
            if(eknot!=null){
                $.each(eknot, function(k, v) {
                eknotbilgi=eknotbilgi+'<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot]['+k+']" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;" value="'+v+'"></td>';
            }); 
        }
        eknotbilgi=eknotbilgi+'</tr>';
    } else {
        var dongusayi=0;
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            eknotbilgi=eknotbilgi+'<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot]['+dongusayi+']" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;" value=""></td>';
            dongusayi++;
        }
        eknotbilgi=eknotbilgi+'</tr>';
    }


    var selectarttir='<a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>';
    var selectsil='<a href="#selectiplik22" class="selectsil selectisil" onclick="selectsil(this)">Sil (-)</a>';
    var iplikdizilim='';
    if(raporuoku["iplikdizilim"]!=null){
        var iplikdizilim=JSON.parse(raporuoku["iplikdizilim"]);
        if(iplikdizilim!=null){
            $.each(iplikdizilim, function(k, v) {
                iplikdizilimsayi++;
                var iplikselectust='<td class="selectiplik" id="selectiplik">'+selectarttir;
                iplikselect='';
                var silsayikontrol=0;
                $.each(iplikdizilim[k], function(c, x) {
                    var selectclass="selectisil";
                    if(silsayikontrol!=0){
                        var selectclass="";
                    }
                    var selectsil='<a href="#selectiplik22" class="selectsil '+selectclass+'" onclick="selectsil(this)">Sil (-)</a>';
                    var optionumuzyeni=optionumuz2;
                    optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                    iplikselect=iplikselect+'<div class="selectdiv"><select name="rapor[iplikdizilim]['+k+'][]">'+optionumuzyeni+'</select>'+selectsil+'</div>';
                    silsayikontrol++;
                }); 
                iplikselectyeni=iplikselectyeni+iplikselectust+iplikselect+'</td>';
            }); 
            ipliktr='<tr class="iplikdizilimi"><th>İplik Dizilimi</th>'+iplikselectyeni+'</tr>';
        }
    } else {
        var dongusayi=0;
        var iplikselectust='<td class="selectiplik" id="selectiplik">'+selectarttir;
        iplikselect='';
        var sistemfor;
        var silsayikontrol=0;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            var selectsil='<a href="#selectiplik22" class="selectsil" onclick="selectsil(this)">Sil (-)</a>';
            var optionumuzyeni=optionumuz2;
            iplikselect=iplikselect+'<div class="selectdiv"><select name="rapor[iplikdizilim]['+dongusayi+'][]">'+optionumuzyeni+'</select>'+selectsil+'</div>';
            dongusayi++;
        }
        iplikselectyeni=iplikselectyeni+iplikselectust+iplikselect+'</td>';
        ipliktr='<tr class="iplikdizilimi"><th>İplik Dizilimi</th>'+iplikselectyeni+'</tr>';
    }



    var ignedizilim='';
    if(raporuoku["ignedizilim"]!=null){
        var ignedizilim=JSON.parse(raporuoku["ignedizilim"]);
        var ignedizilimadet=JSON.parse(raporuoku["ignedizilimadet"]);
        if(ignedizilim!=null){
            $.each(ignedizilim, function(c, x) {
                var resimadi=window.yedekparcaall[x];
                var resimimg='sprem.png';
                var resimanahtar='1';
                var resimboyut='100';
                var resimstyle='display:none;';
            
                if(resimadi!=null&&resimadi["img"]!=null){
                    resimimg=resimadi["img"];
                    resimanahtar=resimadi["anahtar"];
                    resimstyle='display:initial;';
                }
                if(resimanahtar=='2'){
                    resimboyut='16';
                } else {
                    resimboyut='100';
                }
                
                if(ignedizilimadet[c]!=null){
                    var igneadetgetir=ignedizilimadet[c];
                } else {
                    var igneadetgetir="0";
                }
                var optionumuzyeni=optionumuz;
                var igneimg='<img src="upload/kumaskarti/'+resimimg+'" style="width:'+resimboyut+'%; display:initial;" class="buldegistirimg" style="'+resimstyle+'">';
                var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" autocomplete="off" value="'+igneadetgetir+'">';
                optionumuzyeni=optionumuzyeni.split('<option value="'+x+'">').join('<option value="'+x+'" selected>');
                igneselect=igneselect+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]">'+optionumuzyeni+'</select>'+igneimg+adetbilgimiz+'</td>';
            }); 
            ignetr='<tr class="ignedizilimi2"><th>İğne Dizilimi / Adet</th>'+igneselect+'</tr>';
        }
    } else {
        var resimimg='sprem.png';
        var resimanahtar='1';
        var resimboyut='100';
        var resimstyle='display:none;';
        var igneadetgetir="0";
        var sistemfor;
        for (sistemfor = 0; sistemfor < sistemsayivt; sistemfor++) {
            var optionumuzyeni=optionumuz;
            var igneimg='<img src="upload/kumaskarti/'+resimimg+'" style="width:'+resimboyut+'%; display:initial;" class="buldegistirimg" style="'+resimstyle+'">';
            var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" autocomplete="off" value="'+igneadetgetir+'">';
            igneselect=igneselect+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]">'+optionumuzyeni+'</select>'+igneimg+adetbilgimiz+'</td>';
        }
        ignetr='<tr class="ignedizilimi"><th>İğne Dizilimi / Adet</th>'+igneselect+'</tr>';
    }


    var ilktbodyicerigi=siralama+yoltr+eknotbilgi+ipliktr;
    var ikincitbody='<tbody class="ignetbody">'+ignetr+'</tbody>';

    $('.ignetbody').remove();
    $('.yenitbody').remove();
    $('.siralama').remove();
    $('.iplikdizilimi').remove();
    $('.notdizilimi').remove();
    $(ths).parent().parent().parent().find("tr:eq(1)").after(ilktbodyicerigi);

    $('.ignedizilimi').remove();
    $(ths).parent().parent().parent().after(ikincitbody);
}
function yoldegistir(ths){
    var index=$(ths).parent().parent().parent().index();
    var inputgizli=$(ths).parent().parent().parent().find(".cekbilgiyi").val();
    var ozgurtbody='<tbody class="yenitbody yeni'+inputgizli+'">';
    var tiklanansayi=$(ths).val();

    var sistemsayisival=$(".sistemsayisi:eq(0)").val();
    var raporignesayisival=$(".raporignesayi:eq(0)").val();
    var ignecesidisayival=$(".ignecesidisayi:eq(0)").val();

    var ozgurtr='';
    var ozgurtr2='';
    var iplikdizilim='';
    var notdizilim='';
    var ozgurhead='<tr class="siralama"><th>Sıralama</th>';
    var inputgizli2=sy(inputgizli)+1;


    var i2=0;
    var checkbox='<br>Ek not:<input type="checkbox" onclick="checket(this)" value="0">';
    var eknotumuz='<br><td class="eknot" id="eknot"><input type="text" name="rapor[eknot][]" class="eknotumuz" autocomplete="off" placeholder="Ek not" style="display:block;"></td>';
    var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" autocomplete="off" value="0">';
    for (i2 = 0; i2 < sistemsayisival; i2++) {
        ozgurtr=ozgurtr+'<td><select onchange="bulresimyukle(this)" name="rapor[yoldizilim][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg"></td>';
        ozgurhead=ozgurhead+'<td>'+(i2+1)+'</td>';
        var selectarttir='<a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>';
        var selectsil='<a href="#selectiplik22" class="selectsil selectisil" onclick="selectsil(this)">Sil (-)</a>';
        iplikdizilim=iplikdizilim+'<td class="selectiplik" id="selectiplik">'+selectarttir+'<div class="selectdiv"><select name="rapor[iplikdizilim]['+i2+'][]">'+optionumuz2+'</select>'+selectsil+'<div></td>';
        notdizilim=notdizilim+eknotumuz;
    }
    for (i3 = 0; i3 < raporignesayisival; i3++) {
        ozgurtr2=ozgurtr2+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg">'+adetbilgimiz+'</td>';
    }
    ozgurtr=ozgurtr+'';
    var ozgurtryeni=ozgurtr2;
    ozgurtr2='<tr class="ignedizilimi"><th>İğne Dizilimi / Adet </th>'+ozgurtr2+'</tr>';
    iplikdizilim='<tr class="iplikdizilimi"><th>İplik Dizilimi</th>'+iplikdizilim+'</tr>';
    notdizilim='<tr class="notdizilimi"><th>Not Dizilimi</th>'+notdizilim+'</tr>';
    ozgurtbody=ozgurtbody+ozgurhead+'<tr>';

    var ozgurcogalma='';
    var ozgurilk='';
    var ozguriki='';

    var i=0;
    for (i = 0; i < tiklanansayi; i++) {
        ozgurilk='<tr><th>'+(i+1)+'.Yol</th>'+ozgurtr+'<tr>';
        //var ozgurilk=ozgurilk.replace('rapor[yoldizilim]['+inputgizli+'][][]', 'rapor[yoldizilim]['+inputgizli+']['+i+'][]');
        var ozgurilk=ozgurilk.split('rapor[yoldizilim][]').join('rapor[yoldizilim]['+i+'][]');
        var ozgurilk=ozgurilk.split('rapor[iplikdizilim][]').join('rapor[iplikdizilim]['+i+'][]');
        var ozgurilk=ozgurilk.split('rapor[eknot][]').join('rapor[eknot]['+i+'][]');
        ozgurcogalma=ozgurcogalma+ozgurilk;
    }

    var i2=0;
    for (i2 = 0; i2 < ignecesidisayival; i2++) {
        ozguriki=ozguriki+'<tr><th>İğne Dizilimi / Adet '+(i2+1)+'.İğne Çeşidi</th>'+ozgurtryeni+'<tr>';
        var ozguriki=ozguriki.split('rapor[ignedizilim][]').join('rapor[ignedizilim]['+i2+'][]');
        var ozguriki=ozguriki.split('rapor[ignedizilimadet][]').join('rapor[ignedizilimadet]['+i2+'][]');
    }
    ozgurtbody=ozgurtbody+ozgurcogalma+notdizilim+iplikdizilim+'</tbody>';
    //$('.yeni'+inputgizli).remove();
    $('.yenitbody').remove();
    $('.siralama').remove();
    $('.iplikdizilimi').remove();
    $('.notdizilimi').remove();
    //$('.ignedizilimi').remove();
    $(ths).parent().parent().parent().after(ozgurtbody);
    //$(".ignetbody").html(ozgurtr2);
}

function ignecesidiguncelle(ths){
    var ignecesidisayival=$(ths).val();
    $(".ignecesidisayi").val(ignecesidisayival);
    var ozgurtr='';
    var ozgurtr2='';

    var adetbilgimiz='<br><input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" autocomplete="off" value="0">';
    for (i3 = 0; i3 < ignecesidisayival; i3++) {
        ozgurtr2=ozgurtr2+'<td><select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]">'+optionumuz+'</select><img src="upload/kumaskarti/sprem.png" width="75" class="buldegistirimg">'+adetbilgimiz+'</td>';
    }
    ozgurtr=ozgurtr+'';
    var ozgurtryeni=ozgurtr2;
    ozgurtr2='<tr class="ignedizilimi"><th>İğne Dizilimi / Adet </th>'+ozgurtr2+'</tr>';
    
    var ozgurcogalma='';
    var ozgurilk='';
    var ozguriki='';
    /*
    var i2=0;
    for (i2 = 0; i2 < ignecesidisayival; i2++) {
        ozguriki=ozguriki+'<tr><th>İğne Dizilimi / Adet '+(i2+1)+'.İğne Çeşidi</th>'+ozgurtryeni+'<tr>';
        var ozguriki=ozguriki.split('rapor[ignedizilim][]').join('rapor[ignedizilim]['+i2+'][]');
        var ozguriki=ozguriki.split('rapor[ignedizilimadet][]').join('rapor[ignedizilimadet]['+i2+'][]');
    }
    */
    //console.log(ozguriki);
    $('.ignedizilimi').remove();
    $(".ignetbody").html(ozgurtr2);

}

function bulresimyukle(ths){
    var deger=$(ths).val();
    var resimadi=window.yedekparcaall[deger];
    if(deger=='0'){
        $(ths).parent().find("img").css("display","none");
    }
    if(resimadi["img"]!=null){
        $(ths).parent().find("img").css("display","initial");
        $(ths).parent().find("img").attr("src","upload/kumaskarti/"+resimadi["img"]);
    } else {
        $(ths).parent().find("img").css("display","none");
    }
    if(resimadi["anahtar"]!=null){
        if(resimadi["anahtar"]==1){
            $(ths).parent().find("img").css("width","100%");
        }
        if(resimadi["anahtar"]==2){
            $(ths).parent().find("img").css("width","16%");
        }
    }
    var trsayi=$(ths).parent().parent().find("td").length;
    var index=$(ths).parent().index();
    var durdurucu=1;
    for (i = index; i < trsayi; i++) {
        var sonrakideger=$(ths).parent().parent().find("td:eq("+i+")");
        var sonrakiselect=sonrakideger.find("select").val();
        $(ths).parent().parent().find("td:eq("+i+")").find("select").val(deger).attr("selected","selected");
        
        if(resimadi["img"]!=null){
             $(ths).parent().parent().find("td:eq("+i+")").find("img").css("display","initial");
             $(ths).parent().parent().find("td:eq("+i+")").find("img").attr("src","upload/kumaskarti/"+resimadi["img"]);
        } else {
             $(ths).parent().parent().find("td:eq("+i+")").find("img").css("display","none");
        }
        if(resimadi["anahtar"]!=null){
            if(resimadi["anahtar"]==1){
                $(ths).parent().parent().find("td:eq("+i+")").find("img").css("width","100%");
            }
            if(resimadi["anahtar"]==2){
                $(ths).parent().parent().find("td:eq("+i+")").find("img").css("width","16%");
            }
        }

    }
}
</script>

<?php //echo '<pre>'; print_r($yoldizilimarray); echo '</pre>'; ?> 
<?php


$iplikkarticek=z(1,"WHERE arsiv='0' ORDER BY sira ASC",'','iplik');
$_NesneIplik=z(37,z(1,"WHERE ad='iplikkartTipi' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
?>
<div class="content pt-0">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="blok" style="width: 98%;border: 2px solid #888282;background: #ffffff;">
                        <?php if(!empty($pusvefayn['plaka'])&&$pusvefayn['plaka']=='2'){ echo '<input type="hidden" name="'.$tbl2.'[plaka]" value="2">'; } else{ echo '<input type="hidden" name="'.$tbl2.'[plaka]" value="1">'; } ?> 
                            <table cellpadding="0" cellspacing="0" class="table table-hover" style="background: #f8f8f8; border: none; display: block;overflow: scroll;width: 100%;overflow-y: hidden;">
                            <?php if($plakakontrol>0){ ?>
                            <tbody class="tbody">
                                <tr>
                                    <th>Pus</th>
                                    <th>Fayn</th>
                                    <th>Sistem sayısı</th>
                                    <th>İğne sayısı</th>
                                    <th>Plaka durumu</th>
                                    <th>Bir rapordaki sistem sayısı[Kapak]</th>
                                    <th>Makinadaki tekrar rapor sayısı[Kapak]</th>
                                    <th>İptal sistem sayısı[Kapak]</th>
                                    <th>Bir rapordaki iğne sayısı[Kapak]</th>
                                    <th>İğne çeşidi sayısı[Kapak]</th>
                                    <th>Makinadaki tekrar iğne sayısı[Kapak]</th>
                                </tr>
                                    <?php
                                    $sayimiz=0;
                                    $sistemsayimiz=0;
                                    $ignesayimiz=0;
                                    
                                    if(!empty($pusvefaynjson)){
                                        foreach ($pusvefaynjson as $pfs => $pusvefayn) {
                                            if(!empty($pusvefayn['check']=='on')){

                                            $sistemsayimiz=(!empty($iplikdizilimarray)?count($iplikdizilimarray):0);
                                            $ignesayimiz=(!empty($raporignesayiarray[$pfs])?$raporignesayiarray[$pfs]:0);
                                                ?>
                                                <tr>
                                                    <td><div class="pusbilgi ekcss"><?php if($pusvefayn['pus']){ echo  '<span>'.$pusvefayn['pus'].'</span>'; } ?></div></td>
                                                    <td><div class="faynbilgi ekcss"><?php if($pusvefayn['fayn']){ echo  '<span>'.$pusvefayn['fayn'].'</span>'; } ?></div></td>
                                                    <td><div class="sistembilgi ekcss"><?php if($pusvefayn['sistem']){ echo  '<span>'.$pusvefayn['sistem'].'</span>'; } ?></div></td>
                                                    <td><div class="ignebilgi ekcss"><?php if($pusvefayn['igne']){ echo  '<span>'.$pusvefayn['igne'].'</span>'; } ?></div> </td>
                                                    <td><div class="plakabilgi ekcss"> <?php if($pusvefayn['plaka']){ echo  '<span>'.($pusvefayn['plaka']=='1'?'Tek':'Çift').'</span>'; } ?></div></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[sistemsayi2][]" autofocus="autofocus" onkeyup="raporsayi2bul(this)" value="<?php echo !empty($sistemsayi2array[$pfs])?$sistemsayi2array[$pfs]:''?>" autocomplete="off" class="sistemsayi2si form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[raporsayi2][]" autofocus="autofocus" onkeyup="raportekrarsayi2bul(this)" value="<?php echo !empty($raporsayi2array[$pfs])?$raporsayi2array[$pfs]:''?>" autocomplete="off" class="raporsayi2si form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[sistemiptalsayi2][]" autofocus="autofocus" onkeyup="raporsayi2bul(this)" value="<?php echo !empty($sistemiptalsayi2array[$pfs])?$sistemiptalsayi2array[$pfs]:''?>" autocomplete="off" class="sistemiptalsayi2 form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[raporignesayi2][]" autofocus="autofocus" onkeyup="raporignesayi2bul(this)" value="<?php echo !empty($raporignesayi2array[$pfs])?$raporignesayi2array[$pfs]:''?>" autocomplete="off" class="raporignesayi2 form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[ignecesidisayi2][]" autofocus="autofocus" onkeyup="ignecesidi2guncelle(this)" value="<?php echo !empty($ignecesidisayi2array[$pfs])?$ignecesidisayi2array[$pfs]:''?>" autocomplete="off" class="ignecesidisayi2 form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[makineignesayi2][]" autofocus="autofocus" value="<?php echo !empty($makineignesayi2array[$pfs])?$makineignesayi2array[$pfs]:''?>" autocomplete="off" class="makineignesayi2 form-control"></td>
                                                </tr>
                                                <input type="hidden" name="neonemivar" class="cekbilgiyi" value="<?php if(!empty($pusvefayn['id'])||$pusvefayn['id']=='0'){ echo $pusvefayn['id']; } ?>">
                                                <?php   ?>
                                    <?php } $sayimiz++; } } ?>
                                    </tbody>
                                    <tbody>
                                    <?php } ?>
                                    <tbody class="tbody">
                                <tr>
                                    <th>Pus</th>
                                    <th>Fayn</th>
                                    <th>Sistem sayısı</th>
                                    <th>İğne sayısı</th>
                                    <th>Plaka durumu</th>
                                    <th>Bir rapordaki sistem sayısı[Silindir]</th>
                                    <th>Makinadaki tekrar rapor sayısı[Silindir]</th>
                                    <th>İptal sistem sayısı[Silindir]</th>
                                    <th>Bir rapordaki iğne sayısı[Silindir]</th>
                                    <th>İğne çeşidi sayısı[Silindir]</th>
                                    <th>Makinadaki tekrar iğne sayısı[Silindir]</th>
                                </tr>
                                    <?php
                                    $sayimiz=0;
                                    $sistemsayimiz=0;
                                    $ignesayimiz=0;
                                    
                                    if(!empty($pusvefaynjson)){
                                        foreach ($pusvefaynjson as $pfs => $pusvefayn) {
                                            if(!empty($pusvefayn['check']=='on')){

                                            $sistemsayimiz=(!empty($iplikdizilimarray)?count($iplikdizilimarray):0);
                                            $ignesayimiz=(!empty($raporignesayiarray[$pfs])?$raporignesayiarray[$pfs]:0);
                                                ?>
                                                <tr>
                                                    <td><div class="pusbilgi ekcss"><?php if($pusvefayn['pus']){ echo  '<span>'.$pusvefayn['pus'].'</span>'; } ?></div></td>
                                                    <td><div class="faynbilgi ekcss"><?php if($pusvefayn['fayn']){ echo  '<span>'.$pusvefayn['fayn'].'</span>'; } ?></div></td>
                                                    <td><div class="sistembilgi ekcss"><?php if($pusvefayn['sistem']){ echo  '<span>'.$pusvefayn['sistem'].'</span>'; } ?></div></td>
                                                    <td><div class="ignebilgi ekcss"><?php if($pusvefayn['igne']){ echo  '<span>'.$pusvefayn['igne'].'</span>'; } ?></div> </td>
                                                    <td><div class="plakabilgi ekcss"><?php if($pusvefayn['plaka']){ echo  '<span>'.($pusvefayn['plaka']=='1'?'Tek':'Çift').'</span>'; } ?></div></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[sistemsayi][]" autofocus="autofocus" onkeyup="raporsayibul(this)" value="<?php echo !empty($sistemsayiarray[$pfs])?$sistemsayiarray[$pfs]:''?>" autocomplete="off" class="sistemsayisi form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[raporsayi][]" autofocus="autofocus" onkeyup="raportekrarsayibul(this)" value="<?php echo !empty($raporsayiarray[$pfs])?$raporsayiarray[$pfs]:''?>" autocomplete="off" class="raporsayisi form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[sistemiptalsayi][]" autofocus="autofocus" onkeyup="raporsayibul(this)" value="<?php echo !empty($sistemiptalsayiarray[$pfs])?$sistemiptalsayiarray[$pfs]:''?>" autocomplete="off" class="sistemiptalsayi form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[raporignesayi][]" autofocus="autofocus" onkeyup="raporignesayibul(this)" value="<?php echo !empty($raporignesayiarray[$pfs])?$raporignesayiarray[$pfs]:''?>" autocomplete="off" class="raporignesayi form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[ignecesidisayi][]" autofocus="autofocus" onkeyup="ignecesidiguncelle(this)" value="<?php echo !empty($ignecesidisayiarray[$pfs])?$ignecesidisayiarray[$pfs]:''?>" autocomplete="off" class="ignecesidisayi form-control"></td>
                                                    <td><input type="text" tabindex="1" name="<?php echo $tbl2?>[makineignesayi][]" autofocus="autofocus" value="<?php echo !empty($makineignesayiarray[$pfs])?$makineignesayiarray[$pfs]:''?>" autocomplete="off" class="makineignesayi form-control"></td>
                                                </tr>
                                                <input type="hidden" name="neonemivar" class="cekbilgiyi" value="<?php if(!empty($pusvefayn['id'])||$pusvefayn['id']=='0'){ echo $pusvefayn['id']; } ?>">
                                                <?php   ?>
                                                
                                                    

                                    <?php } $sayimiz++; } } ?>
                                    </tbody>
                                    <tbody>
                                    </table>
                                    
                                    <?php if($plakakontrol>0){ ?>
                                    <br>
                                    <div class="dtyborder">KAPAK</div>
                                    <table cellpadding="0" cellspacing="0" class="tablemiz table table-hover">
                                    <tbody class="yeni">
                                    <tr>
                                        <th>Rapor kopyalama </th>
                                        <td style="width: 340px;">
                                        <select name="onemsiz" onchange="raporyansit2(this)" class="select2 select-search">
                                        <option value="0">Seçiniz</option>
                                        <?php if(!empty($raporlaricek0)){  foreach($raporlaricek0 as $rprlar){ $kumasoku=''; if(!empty($rprlar['modul_ID'])){ $kumasoku=z(1,$rprlar['modul_ID'],'ID,ismi,kodu','kumaskarti'); } ?>
                                            <option value="<?php echo $rprlar['ID']; ?>"><?php echo (!empty($kumasoku['kodu'])?$kumasoku['kodu']:'').' '.(!empty($kumasoku['ismi'])?$kumasoku['ismi']:''); ?></option>
                                        <?php } } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php /*/ ?>
                                    <tr>
                                        <th>İplik Seçimi </th>
                                        <td>
                                        <select name="<?php echo $tbl2?>[iplik2_ID]" class="select2">
                                        <option value="0">Seçiniz</option>
                                        <?php $iplikkart=''; if(!empty($iplikkarticek)){ $iplikkart=''; foreach($iplikkarticek as $iplik){
                                            $iplikkart=(!empty($_NesneIplik[$iplik['nesne_IDiplikkartTipi']]['metin1'])?$_NesneIplik[$iplik['nesne_IDiplikkartTipi']]['metin1']:'');
                                            $uretimTipi=(!empty($_NesneIplik[$iplik['nesne_IDuretimTipi']]['metin1'])?$_NesneIplik[$iplik['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
                                            $boyaKontrol=(!empty($_NesneIplik[$iplik['nesne_IDboyaKontrol']]['metin1'])?$_NesneIplik[$iplik['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
                                            $elyafmetin="";
                                            if(!empty($iplik['elyaf'])){ 
                                                $elyafcek=$iplik['elyaf'];
                                                $elyafarray=(!empty($iplik['elyaf'])?json_decode($iplik['elyaf'],1):'');
                                                if(!empty($elyafarray)){
                                                    $elyafarray=str_replace('puan','',$elyafarray);
                                                }
                                                if(!empty($elyafarray)){ foreach($elyafarray as $i => $elyf){
                                                    $elyafnesne=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
                                                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                                                } } 
                                            } 
                                            $iplikkart=$iplikkart.(!empty($iplikkart)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.(!empty($boyakontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
                                            ?>
                                            <option value="<?php echo $iplik['ID']; ?>" <?php if(!empty($vt['iplik2_ID'])&&$vt['iplik2_ID']==$iplik['ID']){ echo 'selected'; } ?>><?php echo (!empty($iplikkart)?$iplikkart:''); ?></option>
                                        <?php } } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php /*/ ?>
                                    <tr>
                                        <th>Yol Sayısı *  </th><td><select name="<?php echo $tbl2?>[yolsayi2]" class="yolsayidegistir2 form-control" onchange="yoldegistir2(this)">
                                        <option value="1" <?php if(!empty($vt['yolsayi2'])&&$vt['yolsayi2']=='1'){ echo 'selected'; } ?>>1</option>
                                        <option value="2" <?php if(!empty($vt['yolsayi2'])&&$vt['yolsayi2']=='2'){ echo 'selected'; } ?>>2</option>
                                        <option value="3" <?php if(!empty($vt['yolsayi2'])&&$vt['yolsayi2']=='3'){ echo 'selected'; } ?>>3</option>
                                        <option value="4" <?php if(!empty($vt['yolsayi2'])&&$vt['yolsayi2']=='4'){ echo 'selected'; } ?>>4</option>
                                        </select></td>
                                    </tr>
                                    <?php //echo '<pre>'; print_r($iplikdizilimarray); echo '</pre>'; ?>
                                    <tr class="siralama2">
                                    <th>Sıralama</th>
                                    <?php if(!empty($sistemsayimiz)){
                                        for($is = 0; $is < $sistemsayimiz; ++$is)
                                        {
                                            echo '<td>'.($is+1).'</td>';
                                        }
                                    } ?>
                                    </tr>
                                    <?php $yolsayisi=count($yoldizilim2array); krsort($yoldizilim2array); if(!empty($yoldizilim2array)){ foreach ($yoldizilim2array as $ydz => $yoldiz) { ?>
                                        <tr class="yenitbody2">
                                        <th><?php echo $yolsayisi; $yolsayisi--; ?>.Yol</th>
                                        <?php if(!empty($yoldiz)){ foreach ($yoldiz as $ydz2 => $yoldiz2) { ?>
                                        <td>
                                            <select onchange="bulresimyukle(this)" name="rapor[yoldizilim2][<?php echo $ydz; ?>][]" class="form-control">
                                                <option value="0" <?php if(!empty($yoldiz2)&&$yoldiz2=='0'){ echo 'selected'; } ?>>Seçiniz</option>
                                                <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                    <option value="<?php echo $ydkprc2['ID']; ?>" <?php if(!empty($yoldiz2)&&$yoldiz2==$ydkprc2['ID']){ echo 'selected'; } ?>><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                <?php } } ?>
                                            </select>
                                            <?php  ?>
                                            <style>
                                            .prcimg{
                                                width:<?php if(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;
                                            }
                                            </style>
                                            <img src="upload/kumaskarti/<?php echo (!empty($yedekparcaall[$yoldiz2]['img'])?$yedekparcaall[$yoldiz2]['img']:''); ?>" style="width:<?php if(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;" class=" buldegistirimg<?php if(!empty($yedekparcaall[$yoldiz2]['img'])){ echo' resimgoster'; } ?>">
                                        </td>
                                        <?php } } ?>
                                    </tr>

                                    <?php } } ?>
                                    <tr class="notdizilimi2">
                                    <th>Not Dizilimi</th>
                                    <?php if(!empty($eknot2array)){ foreach ($eknot2array as $ynot => $yolnot) { ?>
                                        <td class="eknot" id="eknot">
                                            <input type="text" name="rapor[eknot2][<?php echo $ynot; ?>]" class="eknotumuz form-control" value="<?php echo (!empty($eknot2array[$ynot])?$eknot2array[$ynot]:''); ?>" style="display:block;" autocomplete="off" placeholder="Ek not">
                                        </td>
                                    <?php } } ?>
                                    </tr>
                                    <?php /*/ ?>
                                    <tr class="iplikdizilimi2">
                                    <th>İplik Dizilimi</th>
                                    <?php if(!empty($iplikdizilim2array)){ foreach ($iplikdizilim2array as $ipdz => $iplikdiz) { ?>
                                        <td class="selectiplik" id="selectiplik2">
                                        <a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>
                                        <?php if(!empty($iplikdiz)){ foreach ($iplikdiz as $ipdz2 => $iplikdiz2) { ?>
                                        <div class="selectdiv">
                                            <select name="rapor[iplikdizilim2][<?php echo $ipdz; ?>][]">
                                                <option value="0">Seçiniz</option>
                                                <?php if(!empty($iplikyeniarray)){ foreach($iplikyeniarray as $iplk2 => $iplikler){ ?>
                                                <option value="<?php echo (!empty($iplk2)?$iplk2:''); ?>" <?php if(!empty($iplikdizilim2array[$ipdz][$ipdz2])&&$iplikdizilim2array[$ipdz][$ipdz2]==$iplk2){ echo 'selected'; } ?>><?php echo (!empty($iplikler)?$iplikler:''); ?></option>
                                                <?php } } ?> 
                                            </select>
                                            <a href="#selectiplik22" class="selectsil <?php if($ipdz2=='0'){ echo 'selectisil'; } ?>" onclick="selectsil(this)">Sil (-)</a>
                                        </div>
                                        <?php } } else { ?>
                                            <div>
                                                <select name="rapor[iplikdizilim2][<?php echo $ipdz; ?>][]">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($iplikyeniarray)){ foreach($iplikyeniarray as $iplk2 => $iplikler){ ?>
                                                    <option value="<?php echo (!empty($iplk2)?$iplk2:''); ?>"><?php echo (!empty($iplikler)?$iplikler:''); ?></option>
                                                    <?php } } ?> 
                                                </select>
                                            </div>
                                       <?php } ?>
                                        </td>
                                    <?php } } ?>
                                    </tr>
                                    <?php /*/ ?>
                                    </tbody>
                                    <tbody class="ignetbody2">
                                    <tr class="ignedizilimi2">
                                        <th>İğne Dizilimi / Adet </th>
                                        <?php if(!empty($ignedizilim2array)){ foreach ($ignedizilim2array as $igdz => $ignediz) { ?>
                                            <td>
                                            <?php //print_r($ignedizilim2array); ?>
                                                <select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]" class="form-control">
                                                    <option value="0" <?php if(!empty($ignedizilim2array[$igne])&&$ignedizilim2array[$igne]=='0'){ echo 'selected'; } ?>>Seçiniz</option>
                                                    <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                        <option value="<?php echo $ydkprc2['ID']; ?>" <?php if(!empty($ignedizilim2array[$igdz])&&$ignedizilim2array[$igdz]==$ydkprc2['ID']){ echo 'selected'; } ?>><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <style>
                                                .prcimg{
                                                    width:<?php if(!empty($yedekparcaall[$ignedizilim2array[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilim2array[$igdz]]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$ignedizilim2array[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilim2array[$igdz]]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;
                                                }
                                                </style>
                                                <img src="upload/kumaskarti/<?php echo (!empty($yedekparcaall[$ignedizilim2array[$igdz]]['img'])?$yedekparcaall[$ignedizilim2array[$igdz]]['img']:''); ?>" style="width:<?php if(!empty($yedekparcaall[$ignedizilim2array[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilim2array[$igdz]]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$ignedizilim2array[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilim2array[$igdz]]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;" class=" buldegistirimg <?php if(!empty($yedekparcaall[$ignedizilim2array[$igdz]]['img'])&&!empty($ignedizilim2array)){ echo' resimgoster'; } ?>">
                                                <input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" class="form-control" autocomplete="off" value="<?php echo (!empty($ignedizilimadet2array[$igdz])?$ignedizilimadet2array[$igdz]:''); ?>">
                                            </td>
                                        <?php } } else { ?>
                                        <?php for($i4 = 0; $i4 < $ignesayimiz; ++$i4){ ?>
                                            <td>
                                                <select onchange="bulresimyukle(this)" name="rapor[ignedizilim2][]" class="form-control">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                        <option value="<?php echo $ydkprc2['ID']; ?>"><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <img src="upload/kumaskarti/sprm.png" width="75" class="buldegistirimg">
                                                <input type="text" name="rapor[ignedizilimadet2][]" placeholder="Adet" class="form-control" autocomplete="off" value="">
                                            </td>
                                           <?php } ?>
                                        <?php } ?>
                                    </tr>
                                    </table>
                                    <?php } ?>
                                    
                                    <div class="dtyborder">SİLİNDİR</div>
                                    <table cellpadding="0" cellspacing="0" class="tablemiz table table-hover">
                                    <tbody class="yeni">
                                    <tr>
                                        <th>Rapor kopyalama</th>
                                        <td style="width: 340px;">
                                        <select name="onemsiz" onchange="raporyansit(this)" class="select2 select-search">
                                        <option value="0">Seçiniz</option>
                                        <?php if(!empty($raporlaricek)){ foreach($raporlaricek as $rprlar){ $kumasoku=''; if(!empty($rprlar['modul_ID'])){ $kumasoku=z(1,$rprlar['modul_ID'],'ID,ismi,kodu','kumaskarti'); } ?>
                                            <option value="<?php echo $rprlar['ID']; ?>"><?php echo (!empty($kumasoku['kodu'])?$kumasoku['kodu']:'').' '.(!empty($kumasoku['ismi'])?$kumasoku['ismi']:''); ?></option>
                                        <?php } } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php /*/ ?>
                                    <tr>
                                        <th>İplik Seçimi </th>
                                        <td>
                                        <select name="<?php echo $tbl2?>[iplik_ID]" class="select2">
                                        <option value="0">Seçiniz</option>
                                        <?php $iplikkart=''; if(!empty($iplikkarticek)){ $iplikkart=''; foreach($iplikkarticek as $iplik){
                                            $iplikkart=(!empty($_NesneIplik[$iplik['nesne_IDiplikkartTipi']]['metin1'])?$_NesneIplik[$iplik['nesne_IDiplikkartTipi']]['metin1']:'');
                                            $uretimTipi=(!empty($_NesneIplik[$iplik['nesne_IDuretimTipi']]['metin1'])?$_NesneIplik[$iplik['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
                                            $boyaKontrol=(!empty($_NesneIplik[$iplik['nesne_IDboyaKontrol']]['metin1'])?$_NesneIplik[$iplik['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
                                            $elyafmetin="";
                                            if(!empty($iplik['elyaf'])){ 
                                                $elyafcek=$iplik['elyaf'];
                                                $elyafarray=(!empty($iplik['elyaf'])?json_decode($iplik['elyaf'],1):'');
                                                if(!empty($elyafarray)){
                                                    $elyafarray=str_replace('puan','',$elyafarray);
                                                }
                                                if(!empty($elyafarray)){ foreach($elyafarray as $i => $elyf){
                                                    $elyafnesne=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
                                                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                                                } } 
                                            } 
                                            $iplikkart=$iplikkart.(!empty($iplikkart)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.(!empty($boyakontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
                                            ?>
                                            <option value="<?php echo $iplik['ID']; ?>" <?php if(!empty($vt['iplik_ID'])&&$vt['iplik_ID']==$iplik['ID']){ echo 'selected'; } ?>><?php echo (!empty($iplikkart)?$iplikkart:''); ?></option>
                                        <?php } } ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php /*/ ?>
                                    <tr>
                                        <th>Yol Sayısı *  </th><td><select name="<?php echo $tbl2?>[yolsayi]" class="yolsayidegistir form-control" onchange="yoldegistir(this)">
                                        <option value="1" <?php if(!empty($vt['yolsayi'])&&$vt['yolsayi']=='1'){ echo 'selected'; } ?>>1</option>
                                        <option value="2" <?php if(!empty($vt['yolsayi'])&&$vt['yolsayi']=='2'){ echo 'selected'; } ?>>2</option>
                                        <option value="3" <?php if(!empty($vt['yolsayi'])&&$vt['yolsayi']=='3'){ echo 'selected'; } ?>>3</option>
                                        <option value="4" <?php if(!empty($vt['yolsayi'])&&$vt['yolsayi']=='4'){ echo 'selected'; } ?>>4</option>
                                        </select></td>
                                    </tr>
                                    <?php //echo '<pre>'; print_r($iplikdizilimarray); echo '</pre>'; ?>
                                    <tr class="siralama">
                                    <th>Sıralama</th>
                                    <?php if(!empty($sistemsayimiz)){
                                        for($is = 0; $is < $sistemsayimiz; ++$is)
                                        {
                                            echo '<td>'.($is+1).'</td>';
                                        }
                                    } ?>
                                    </tr>
                                    <?php if(!empty($yoldizilimarray)){ foreach ($yoldizilimarray as $ydz => $yoldiz) { ?>
                                        <tr class="yenitbody">
                                        <th><?php echo $ydz+1; ?>.Yol</th>
                                        <?php if(!empty($yoldiz)){ foreach ($yoldiz as $ydz2 => $yoldiz2) { ?>
                                        <td>
                                            <select onchange="bulresimyukle(this)" name="rapor[yoldizilim][<?php echo $ydz; ?>][]" class="form-control">
                                                <option value="0" <?php if(!empty($yoldiz2)&&$yoldiz2=='0'){ echo 'selected'; } ?>>Seçiniz</option>
                                                <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                    <option value="<?php echo $ydkprc2['ID']; ?>" <?php if(!empty($yoldiz2)&&$yoldiz2==$ydkprc2['ID']){ echo 'selected'; } ?>><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                <?php } } ?>
                                            </select>
                                            <style>
                                                .prcimg{
                                                    width:<?php if(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;
                                                }
                                            </style>
                                            <img src="upload/kumaskarti/<?php echo (!empty($yedekparcaall[$yoldiz2]['img'])?$yedekparcaall[$yoldiz2]['img']:''); ?>" style="width:<?php if(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$yoldiz2]['anahtar'])&&$yedekparcaall[$yoldiz2]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;" class=" buldegistirimg<?php if(!empty($yedekparcaall[$yoldiz2]['img'])){ echo' resimgoster'; } ?>">
                                            <?php /*/ ?>
                                            <br>Ek not:
                                            <input type="checkbox" onclick="checket(this)" value="<?php echo (!empty($eknotarray[$ydz][$ydz2])?'1':'0'); ?>" <?php if(!empty($eknotarray[$ydz][$ydz2])){ echo 'checked'; } ?>>
                                            <br>
                                            <input type="text" name="rapor[eknot][<?php echo $ydz; ?>][]" class="eknotumuz" value="<?php echo (!empty($eknotarray[$ydz][$ydz2])?$eknotarray[$ydz][$ydz2]:''); ?>" style="<?php echo (!empty($eknotarray[$ydz][$ydz2])?'display:block;':''); ?>" autocomplete="off" placeholder="Ek not">
                                            <?php /*/ ?>
                                        </td>
                                        <?php } } ?>
                                    </tr>

                                    <?php } } ?>
                                    <tr class="notdizilimi">
                                    <th>Not Dizilimi</th>
                                    <?php if(!empty($eknotarray)){ foreach ($eknotarray as $ynot => $yolnot) { ?>
                                        <td class="eknot" id="eknot">
                                            <input type="text" name="rapor[eknot][<?php echo $ynot; ?>]" class="eknotumuz form-control" value="<?php echo (!empty($eknotarray[$ynot])?$eknotarray[$ynot]:''); ?>" style="display:block;" autocomplete="off" placeholder="Ek not">
                                        </td>
                                    <?php } } ?>
                                    </tr>
                                    <tr class="iplikdizilimi">
                                    <th>İplik Dizilimi</th>
                                    <?php if(!empty($iplikdizilimarray)){ foreach ($iplikdizilimarray as $ipdz => $iplikdiz) { ?>
                                        <td class="selectiplik" id="selectiplik">
                                        <a href="#selectiplik22" class="selectarttir" onclick="selectarttir(this)">Çoğalt (+)</a>
                                        <?php if(!empty($iplikdiz)){ foreach ($iplikdiz as $ipdz2 => $iplikdiz2) { ?>
                                        <div class="selectdiv">
                                            <select name="rapor[iplikdizilim][<?php echo $ipdz; ?>][]" class="form-control">
                                                <option value="0">Seçiniz</option>
                                                <?php if(!empty($iplikyeniarray)){ foreach($iplikyeniarray as $iplk2 => $iplikler){ ?>
                                                <option value="<?php echo (!empty($iplk2)?$iplk2:''); ?>" <?php if(!empty($iplikdizilimarray[$ipdz][$ipdz2])&&$iplikdizilimarray[$ipdz][$ipdz2]==$iplk2){ echo 'selected'; } ?>><?php echo (!empty($iplikler)?$iplikler:''); ?></option>
                                                <?php } } ?> 
                                            </select>
                                            <a href="#selectsil22" class="selectsil <?php if($ipdz2=='0'){ echo 'selectisil'; } ?>" onclick="selectsil(this)">Sil (-)</a>
                                        </div>
                                        <?php } } else { ?>
                                            <div>
                                                <select name="rapor[iplikdizilim][<?php echo $ipdz; ?>][]" class="form-control">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($iplikyeniarray)){ foreach($iplikyeniarray as $iplk2 => $iplikler){ ?>
                                                    <option value="<?php echo (!empty($iplk2)?$iplk2:''); ?>"><?php echo (!empty($iplikler)?$iplikler:''); ?></option>
                                                    <?php } } ?> 
                                                </select>
                                            </div>
                                       <?php } ?>
                                        </td>
                                    <?php } } ?>
                                    </tr>
                                    </tbody>
                                    <tbody class="ignetbody">
                                    <tr class="ignedizilimi">
                                        <th>İğne Dizilimi / Adet </th>
                                        <?php if(!empty($ignedizilimarray)){ foreach ($ignedizilimarray as $igdz => $ignediz) { ?>
                                            <td>
                                            <?php //print_r($ignedizilimarray); ?>
                                                <select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]" class="form-control">
                                                    <option value="0" <?php if(!empty($ignedizilimarray[$igne])&&$ignedizilimarray[$igne]=='0'){ echo 'selected'; } ?>>Seçiniz</option>
                                                    <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                        <option value="<?php echo $ydkprc2['ID']; ?>" <?php if(!empty($ignedizilimarray[$igdz])&&$ignedizilimarray[$igdz]==$ydkprc2['ID']){ echo 'selected'; } ?>><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <style>
                                                .prcimg{
                                                    width:<?php if(!empty($yedekparcaall[$ignedizilimarray[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilimarray[$igdz]]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$ignedizilimarray[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilimarray[$igdz]]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;
                                                }
                                            </style>
                                                <img src="upload/kumaskarti/<?php echo (!empty($yedekparcaall[$ignedizilimarray[$igdz]]['img'])?$yedekparcaall[$ignedizilimarray[$igdz]]['img']:''); ?>" style="width:<?php if(!empty($yedekparcaall[$ignedizilimarray[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilimarray[$igdz]]['anahtar']==1){ echo '100%'; } elseif(!empty($yedekparcaall[$ignedizilimarray[$igdz]]['anahtar'])&&$yedekparcaall[$ignedizilimarray[$igdz]]['anahtar']==2) { echo '16%'; } else{ echo '100%'; } ?>;" class=" buldegistirimg <?php if(!empty($yedekparcaall[$ignedizilimarray[$igdz]]['img'])&&!empty($ignedizilimarray)){ echo' resimgoster'; } ?>">
                                                <input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" class="form-control" autocomplete="off" value="<?php echo (!empty($ignedizilimadetarray[$igdz])?$ignedizilimadetarray[$igdz]:''); ?>">
                                            </td>
                                        <?php } } else { ?>
                                        <?php for($i4 = 0; $i4 < $ignesayimiz; ++$i4){ ?>
                                            <td>
                                                <select onchange="bulresimyukle(this)" name="rapor[ignedizilim][]" class="form-control">
                                                    <option value="0">Seçiniz</option>
                                                    <?php if(!empty($yedekparca)){ foreach ($yedekparca as $yp2 => $ydkprc2) { ?>
                                                        <option value="<?php echo $ydkprc2['ID']; ?>"><?php echo (!empty($ydkprc2['ad'])?$ydkprc2['ad']:''); ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <img src="upload/kumaskarti/sprm.png" width="75" class="buldegistirimg">
                                                <input type="text" name="rapor[ignedizilimadet][]" placeholder="Adet" class="form-control" autocomplete="off" value="">
                                            </td>
                                           <?php } ?>
                                        <?php } ?>
                                    </tr>
                                    </table>
                                    
                                    <table cellpadding="0" cellspacing="0" class="tablemiz2 table table-hover">
                                    </tbody>
                                    <tr>
                                    <th>Resim</th>
                                    <td class="raporresim">
                                        <input type="file" class="form-control" id="resimfile" name="<?php echo $tbl2; ?>[img]" accept="image/x-png,image/gif,image/jpeg" style="position: relative; width:100%; left: 0px; visibility:visible;" multiple>
                                        <?php if(!z(8,'ekle')){ ?>
                                            <a href="#yuklemebaslat" class="yuklemebaslat">Yüklemeyi Başlat</a>
                                        <?php } ?>
                                        <?php $galericek=z(1,array('arsiv'=>0,'tablo'=>$tbl2,'tablo_ID'=>$id),'ID,img','galeri'); ?>
                                        <?php  if(!empty($galericek)){ ?>
                                            <?php foreach ($galericek as $gl => $galeri) {?>
                                                <div style="float:left;">
                                                    <img data-fancybox="gallery1" href="upload/kumaskarti/<?php echo $galeri['img']; ?>" src="upload/kumaskarti/<?php echo $galeri['img']; ?>" style="width:140px; height:140px; padding:5px; cursor:pointer;">
                                                    <span class="spanisim"><?php echo $galeri['img']; ?></span>
                                                    <a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a>
                                                    <input type="hidden" name="neonemivar" value="<?php echo $galeri['ID']; ?>">
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="resimekaciklama"></div>
                                    </td>
                                    </tr>
                                    <tr id="kumasbilgisi">
                                    <th><b>Kumaş Bilgisi</b></th>
                                    <td colspan="1">
                                    <a href="./?s=kumaskarti&a=detay&id=<?php echo $eskiveri['ID']; ?>" target="_blank"><?php echo (!empty($eskiveri['ismi'])?$eskiveri['ismi']:''); ?><?php echo (!empty($eskiveri['kodu'])?' | '.$eskiveri['kodu']:''); ?></a>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Kayit Tarihi</th>
                                        <td>
                                            <div class="input-group col-lg-12">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                                </span>
                                                <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl2?>[tarihKayit]" value="<?php echo (!empty($vt['tarihKayit'])?z('date',$vt['tarihKayit']):''); ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-right">
                                            <input type="submit" value="Kaydet"  tabindex="1" class="btn btn-primary" />
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->

<script>

<?php $eklekontrol=z(8,'ekle'); if(empty($eklekontrol)){ ?>
    $('#resimfile').on("change", function(){
        var file_length = $('#resimfile').prop('files').length;   
        for (i = 0; i < file_length; i++) {
            var file_data = $('#resimfile').prop('files')[i];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            var id=<?php echo $id; ?>;
            var tbl="<?php echo $tbl2; ?>";
            $.ajax({
                url: 'ajaxayar.php?s=kumaskarti&a=ajaxsorgu3&id='+id+"&tblgonder="+tbl,
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
                        var icerik='<div style="float:left;"><img data-fancybox="gallery1" href="upload/kumaskarti/'+dosyaAd+'" src="upload/kumaskarti/'+dosyaAd+'" style="width:140px; height:140px; padding:5px; cursor:pointer;"><span class="spanisim">'+dosyaAd+'</span><a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a><input type="hidden" name="neonemivar" value="'+dosyaid+'"></div>';
                        $(".resimekaciklama").after(icerik);
                    }
                }
            });
        }
    });
<?php } ?>

$('.yuklemebaslat').on('click', function() {
    var file_length = $('#resimfile').prop('files').length;   
    for (i = 0; i < file_length; i++) {
        var file_data = $('#resimfile').prop('files')[i];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        var id=<?php echo $id; ?>;
        var tbl="<?php echo $tbl2; ?>";
        $.ajax({
            url: 'ajaxayar.php?s=kumaskarti&a=ajaxsorgu3&id='+id+"&tblgonder="+tbl,
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
                    var icerik='<div style="float:left;"><img data-fancybox="gallery1" href="upload/kumaskarti/'+dosyaAd+'" src="upload/kumaskarti/'+dosyaAd+'" style="width:140px; height:140px; padding:5px; cursor:pointer;"><span class="spanisim">'+dosyaAd+'</span><a href="#resimsil" class="resimsil" onclick="resimsil(this)">Kalıcı olarak sil</a><input type="hidden" name="neonemivar" value="'+dosyaid+'"></div>';
                    $(".resimekaciklama").after(icerik);
                }
            }
        });
    }
});
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
</script>