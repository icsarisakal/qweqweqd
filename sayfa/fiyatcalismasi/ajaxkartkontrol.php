<?php
$nesnekumastipi=z(8,'nesnekumastipi');
$kumasbelirtilmesi=z(8,'kumasbelirtilmesi');
$kumaskartifiyatall='';
$boyabaskiall="";
$sonduzenleme=z(11,"sonduzenleme");
$dipkumasgrm="";
$dipkumaspusvefayn="";
$dipkumasnesne_IDdoviz="";
$dipkumasbirimTipi="";
$dipkumasenTipi="";
$kombidengidenorjkumasdata="";

if(!empty($sonduzenleme)){
    if($sonduzenleme==1){
        $kumaskartifiyatall=z(1,"WHERE arsiv='0' AND revize_ID='0'",'','kumaskartifiyat');
        $kumaskartifiyatall=z(37, $kumaskartifiyatall);
        z(11,"sonduzenleme",0);
    }
}

$kumaskartiall='';
$kumaskartidurum=z(8,'kumaskarti');
if(!empty($kumaskartidurum)){
    $kumaskartiall=z(1,"WHERE arsiv='0' AND revize_ID='0'",'','kumaskarti');
    $kumaskartiall=z(37, $kumaskartiall);
    $kumaskartifiyatall=z(1,"WHERE arsiv='0' AND revize_ID='0'",'','kumaskartifiyat');
    $kumaskartifiyatall=z(37, $kumaskartifiyatall);
    $boyabaskiall=z(1,"WHERE arsiv='0'",'','boyabaski');
    $boyabaskiall=z(37, $boyabaskiall);
}

$aksesuarkartiall='';
$aksesuarkartidurum=z(8,'aksesuarkarti');
if(!empty($aksesuarkartidurum)){
    $aksesuarkartiall=z(1,"WHERE arsiv='0'",'','aksesuarkarti');
    $aksesuarkartiall=z(37, $aksesuarkartiall);
}

$nesneall='';
$nesnedurum=z(8,'nesneyioku');
if(!empty($nesnedurum)){
    $nesneall=z(1,"WHERE arsiv='0'",'','nesne');
    $nesneall=z(37, $nesneall);
}




$fiyat_id=z(8,'fiyat');
$kumas_id=z(8,'kumas');
$blok_id=z(8,'blok'); 
$blok_id=(!empty($blok_id)?$blok_id:0);
$kumas_id=(!empty($kumas_id)?$kumas_id:0);
$fiyat_id=(!empty($fiyat_id)?$fiyat_id:0);
$kontrol=0;

if(!empty($kumas_id)){

    $kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$kumas_id."' AND blok_ID='".$blok_id."'";
    $kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
    $kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);
    if(!empty($kumasfiyattablo)){
        $kontrol=$kumasfiyatveri['ID'];
    }

}

$boyamaliyetarray=array();
$kumastipveri=array();
$kumasgonder=z(8,'kumasgonder');
if(!empty($kumasgonder)){
    if($nesnekumastipi!='180'){
        $tablosecimi="kumaskarti";
        if(!empty($kumasbelirtilmesi)){
            $tablosecimi=$kumasbelirtilmesi;
        }
        $kumaskarticek=z(1,$kumasgonder,'',$tablosecimi);
        
        $boyamaliyetarray=(!empty($kumaskarticek['boyamaliyet'])?json_decode($kumaskarticek['boyamaliyet'],1):'');
        if(!empty($boyamaliyetarray)){
            $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
        }
        $fiyatlararray=(!empty($kumaskarticek['fiyatlar'])?json_decode($kumaskarticek['fiyatlar'],1):'');
        $xym=0;
        if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ 
            $ustboyabaskicek=z(1,$bymlyt,'','boyabaski');
            $fiyatlar = (!empty($fiyatlararray[$xym])?$fiyatlararray[$xym]:'');
            $boyabaskitipiust=(!empty($ustboyabaskicek['tipi'])?$ustboyabaskicek['tipi'].'-'.$fiyatlar:'-');
            array_push($kumastipveri,$boyabaskitipiust);
            $xym++;
        } }
    } else {
        $tablosecimi="kumaskarti";
        if(!empty($kumasbelirtilmesi)){
            $tablosecimi=$kumasbelirtilmesi;
        }
        $kumaskarticek=z(1,$kumasgonder,'ID,enbilgisi,fiyat_ID',$tablosecimi);
        $kumastangelenfiyat_ID=(!empty($kumaskarticek['fiyat_ID'])?$kumaskarticek['fiyat_ID']:0);
        
        $enbilgisiarray=(!empty($kumaskarticek['enbilgisi'])?json_decode($kumaskarticek['enbilgisi'],1):'');


        $enbilgisi=0;
        if(!empty($enbilgisiarray)){
            foreach ($enbilgisiarray as $enkey => $envalue) {
                $enbilgisi=$enkey;
                break;
            }
        }
        $gidengetkumas=$enbilgisi;
        $gidengetfiyat=$kumastangelenfiyat_ID;
        $gidenparca=0;
        $gidencakmakumas=$kumasgonder;

        $kumasicinyenisorgu="WHERE arsiv='0' AND revize_ID='0' AND fiyat_ID='".$gidengetfiyat."' AND kumas_ID='".$gidengetkumas."' AND parca_ID='".$gidenparca."' AND cakmakumas_ID='".$gidencakmakumas."'";

        $kumaskarticek=z(1,$enbilgisi,'','kumaskarti');
        $kumaskarticek=z(1,$kumasicinyenisorgu,'',$tablosecimi);
        $kumaskarticek=$kumaskarticek[0];
        if(empty($kumaskarticek)){
            $kombidengidenorjkumasdata=z(1,$kumasgonder,'','kumaskarti');
            $enbilgisiorjarray=(!empty($kombidengidenorjkumasdata['enbilgisi'])?json_decode($kombidengidenorjkumasdata['enbilgisi'],1):'');
            $enbilgisi2=0;
            if(!empty($enbilgisiorjarray)){
                foreach ($enbilgisiorjarray as $enkey2 => $envalue2) {
                    $enbilgisi2=$enkey2;
                    break;
                }
            }
            $kombidengidenorjkumasdata=z(1,$enbilgisi2,'','kumaskarti');
            $kumaskarticek=$kombidengidenorjkumasdata;
        }
        $dipkumasgrm=(!empty($kumaskarticek['grm'])?$kumaskarticek['grm']:'');
        $dipkumaspusvefayn=(!empty($kumaskarticek['pusvefayn'])?$kumaskarticek['pusvefayn']:'');
        $dipkumasnesne_IDdoviz=(!empty($kumaskarticek['nesne_IDdoviz'])?$kumaskarticek['nesne_IDdoviz']:'');
        $dipkumasbirimTipi=(!empty($kumaskarticek['birimTipi'])?$kumaskarticek['birimTipi']:'');
        $dipkumasenTipi=(!empty($kumaskarticek['enTipi'])?$kumaskarticek['enTipi']:'');

        $boyamaliyetarray=(!empty($kumaskarticek['boyamaliyet'])?json_decode($kumaskarticek['boyamaliyet'],1):'');
        if(!empty($boyamaliyetarray)){
            $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
        }
        $fiyatlararray=(!empty($kumaskarticek['fiyatlar'])?json_decode($kumaskarticek['fiyatlar'],1):'');

        $xym=0;
        if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ 
            $ustboyabaskicek=z(1,$bymlyt,'','boyabaski');
            $fiyatlar = (!empty($fiyatlararray[$xym])?$fiyatlararray[$xym]:'');
            $boyabaskitipiust=(!empty($ustboyabaskicek['tipi'])?$ustboyabaskicek['tipi'].'-'.$fiyatlar:'-');
            array_push($kumastipveri,$boyabaskitipiust);
            $xym++;
        } }
    }
}

$kompmetin='';
$kompozisyonget=z(8,'kompozisyongonder');
$kumascount=0;
if(!empty($kompozisyonget)){
    $tablosecimi="kumaskarti";
    if(!empty($kumasbelirtilmesi)){
        $tablosecimi=$kumasbelirtilmesi;
    }
    $getkumas=z(1,$kompozisyonget,'',$tablosecimi);
    $metinhazirla='';
    $iplikkartlarimetin="";
    $iplikkartlarimetin2="";
    $kompozisyonarray=array();
    if(!empty($getkumas['iplikkartlari'])){
        $kumascount=1;
        $_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
        $iplikkartlaricek=$getkumas['iplikkartlari'];
        $iplikkartlariarray=(!empty($getkumas['iplikkartlari'])?json_decode($getkumas['iplikkartlari'],1):'');
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
    if(!empty($getkumas['fiyatselect'])){
        $fiyatselectarray=(!empty($getkumas['fiyatselect'])?json_decode($getkumas['fiyatselect'],1):'');
        if(!empty($fiyatselectarray)){
            $kumascount=count($fiyatselectarray);
            foreach ($fiyatselectarray as $fiyatkey => $fiyatvalue) {
                $fiyatkumas=z(1,$fiyatkey,'','kumaskarti');
                if(!empty($fiyatkumas['iplikkartlari'])){
                    $_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
                    $iplikkartlaricek=$fiyatkumas['iplikkartlari'];
                    $iplikkartlariarray=(!empty($fiyatkumas['iplikkartlari'])?json_decode($fiyatkumas['iplikkartlari'],1):'');
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
            }
        }
        
    }
    $kompmetin='';
    if(!empty($kompozisyonarray)){
        foreach ($kompozisyonarray as $karray => $kompozisyon2) {
            $kompozisyon2=($kompozisyon2)/$kumascount;
            $kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
        }
    }
}


$json['sonuc']=1;
$json['cevap']= array(
	'kontrol'=>$kontrol,
	'dipkumasgrm'=>$dipkumasgrm,
	'dipkumaspusvefayn'=>$dipkumaspusvefayn,
	'dipkumasnesne_IDdoviz'=>$dipkumasnesne_IDdoviz,
	'dipkumasbirimTipi'=>$dipkumasbirimTipi,
	'dipkumasenTipi'=>$dipkumasenTipi,
	'kombidengidenorjkumasdata'=>$kombidengidenorjkumasdata,
    'kumaskartifiyatall'=>$kumaskartifiyatall,
    'kumastipveri'=>$kumastipveri,
    'kompmetin'=>$kompmetin,
    'boyabaskiall'=>$boyabaskiall,
    'kumaskartiall'=>$kumaskartiall,
	'aksesuarkartiall'=>$aksesuarkartiall,
	'nesneall'=>$nesneall,
);

?>