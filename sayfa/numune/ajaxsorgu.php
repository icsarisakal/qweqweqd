<?php


$dataVeriNumune=z(9);

$elyafMetin='';
$vt=array();
//$veri='tanımlanmadı ajaxsorgu.php kontrol et...!';

function iplikKartTipi(){

    
}

function elyafKompozisyon($id){
    $_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='kumasTipi'",'ID,ad,metin1,metin2','nesne'));
    
    // $elyafmetin='';
    
    // if(!empty($elyafKompozisyon)){
       
    //     $elyafcek=$elyafKompozisyon;
    //     $elyafarray=(!empty($elyafKompozisyon)?json_decode($elyafKompozisyon,1):'');
       
    //     if(!empty($elyafarray)){
    //         $elyafarray=str_replace('puan','',$elyafarray);
    //     }
        
    //     if(!empty($elyafarray)){
    //         foreach($elyafarray as $i => $elyf){
              
    //             print_r('i: '.$i);
    //             $veri=z(1,$i,'','iplik');
    //             //__($veri);
    //             $elyafnesne=(!empty($_Nesneiplik[$veri['nesne_IDiplikkartTipi']]['metin1'])?$_Nesneiplik[$veri['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
    //             $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
    //         } 
    //     }  
    // }
    // __($elyafmetin);
    // return $elyafmetin;

    $vt=z(1,$id,'','kumaskarti');
    
    $metinhazirla='';
    $iplikkartlarimetin="";
    $iplikkartlarimetin2="";
    $kompozisyonarray=array();

    
    
    if(!empty($vt['iplikkartlari'])){
    $iplikkartlaricek=$vt['iplikkartlari'];
    $iplikkartlariarray=(!empty($vt['iplikkartlari'])?json_decode($vt['iplikkartlari'],1):'');
    if(!empty($iplikkartlariarray)){
        $iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
    }
    if(!empty($iplikkartlariarray)){
        foreach($iplikkartlariarray as $i => $elyf){
            $iplikokuma=z(1,$i,'','iplik');
            $iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
            $uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
            $boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
            $elyafTipi=(!empty($_Nesne[$i]['metin2'])?$_Nesne[$i]['metin2']:'&nbsp;');
            $iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
            $elyafmetin="";
            if(!empty($iplikokuma['elyaf'])){
                $elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
                if(!empty($elyafarray)){
                    $elyafarray=str_replace('puan','',$elyafarray);
                }
                if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
                    $elyafnesne=(!empty($_Nesne[$el]['metin2'])?$_Nesne[$el]['metin2']:'&nbsp;');
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
    $metinhazirla=$iplikkartlarimetin2;
    $metinhazirla=str_replace(array("(",")"),"",$metinhazirla);
    return $kompmetin;
   
}

if($dataVeriNumune['durum']=='elyafcek'){

   $elyafMetin = elyafKompozisyon($dataVeriNumune['veri']);


}

$json['sonuc']=1;
$json['cevap']=array(
    'elyafmetin'=>$elyafMetin,
); 
?>