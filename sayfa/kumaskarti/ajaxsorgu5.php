<?php 
$kumasbelirtilmesi=z(8,'kumasbelirtilmesi');
$boyabaskiall='';
$nesnedoviz='';
$kayitdurum=z(11,'kayit');
$kapat=z(8,'kapat');
if(!empty($kayitdurum)&&$kayitdurum=='oldu'){
    $boyabaskiall=z(1,'','ID,fiyat,fire,nesne_IDdoviz','boyabaski');
    $nesnedoviz=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
    $boyabaskiall=z(37, $boyabaskiall);
    z(11,'kayit','tamamlandi');
}

if(!empty($kapat)){
    $boyabaskiall=z(1,'','ID,fiyat,fire,nesne_IDdoviz','boyabaski');
    $nesnedoviz=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
    $boyabaskiall=z(37, $boyabaskiall);
}

$kumaskartiall='';
$kumaskartifiyatall='';
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

$kumaskodu=z(8,'kumaskodu');
$idmiz=z(8,'idmiz');
if(!empty($kumaskodu)){
    $idkontrol='';
    if(!empty($idmiz)){
        $idkontrol="AND ID!='".$idmiz."'";
    }
    $kodsorgusu="WHERE arsiv='0' AND kodu LIKE '%".$kumaskodu."%' AND revize_ID=='0' ".$idkontrol;
    //echo $kodsorgusu;
    $kodsorgusu=z(1,$kodsorgusu,'','kumaskarti');
    $kumaskodu=count($kodsorgusu);
}

$boyamaliyetarray=array();
$kumastipveri=array();
$kumasgonder=z(8,'kumasgonder');
if(!empty($kumasgonder)){
    $tablosecimi="kumaskarti";
    if(!empty($kumasbelirtilmesi)){
        $tablosecimi=$kumasbelirtilmesi;
    }
    $kumaskarticek=z(1,$kumasgonder,'',$tablosecimi);
    
    $boyamaliyetarray=(!empty($kumaskarticek['boyamaliyet'])?json_decode($kumaskarticek['boyamaliyet'],1):'');
    if(!empty($boyamaliyetarray)){
        $boyamaliyetarray=str_replace('puan','',$boyamaliyetarray);
    }
    if(!empty($boyamaliyetarray)){ foreach($boyamaliyetarray as $bymlyt => $bymlytler){ 
        $ustboyabaskicek=z(1,$bymlyt,'','boyabaski');
        $boyabaskitipiust=(!empty($ustboyabaskicek['tipi'])?$ustboyabaskicek['tipi'].'-':'-');
        array_push($kumastipveri,$boyabaskitipiust);
    } }
}

$json['sonuc']=1;
$json['cevap']= array(
	'boyabaskiall'=>$boyabaskiall,
    'nesnedoviz'=>$nesnedoviz,
	'kumaskartiall'=>$kumaskartiall,
	'kumaskartifiyatall'=>$kumaskartifiyatall,
	'boyabaskiall'=>$boyabaskiall,
	'aksesuarkartiall'=>$aksesuarkartiall,
	'nesneall'=>$nesneall,
	'kompmetin'=>$kompmetin,
	'kumaskodu'=>$kumaskodu,
	'kumastipveri'=>$kumastipveri,
);
?>