

<?php function getIplikSelect($tablo){ ?> <select name="<?php echo $tablo; ?>[iplikKarti_ID]" id="iplikKarti" class="form-control"><option data-name="ara[nesne_IDiplikkartTipi]" value="0">Seçiniz...</option>
 
 <?php
$iplikoku=z(1,"WHERE arsiv='0'",'','iplik');
$_Nesneiplik=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
if(!empty($iplikoku)){
    foreach($iplikoku as $iplk => $iplkler){
        //$iplikartid=(!empty($iplkler['nesne_IDiplikkartTipi'])?$iplkler['nesne_IDiplikkartTipi']:0);
        
        $iplikkarti=(!empty($_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
        $uretimTipi=(!empty($_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
        $boyaKontrol=(!empty($_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
        $elyafmetin="";
        if(!empty($iplkler['elyaf'])){
            $elyafcek=$iplkler['elyaf'];
            $elyafarray=(!empty($iplkler['elyaf'])?json_decode($iplkler['elyaf'],1):'');
            if(!empty($elyafarray)){
                $elyafarray=str_replace('puan','',$elyafarray);
            }
            if(!empty($elyafarray)){
                foreach($elyafarray as $i => $elyf){
                    $elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                } 
            }  
        }
        $elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
        $iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
        $metinolustur=$iplikkart;
         if(!empty($_X['cari_ID'])&&$_X['cari_ID']==$n['ID']){ echo 'selected'; }
        echo '
            <option data-name="ara[nesne_IDiplikkartTipi]" value="'.$iplkler['ID'].'" >'.$iplikkart.'</option>
        ';

    }
}

 ?> </select> <?php } ?>


 
<?php function getKompozisyonSelect($tablo){ ?> <select name="<?php echo $tablo?>[numuneKompozisyon]" id="numuneKompozisyon">

<?php
$iplikoku=z(1,"WHERE arsiv='0'",'','iplik');
$_Nesneiplik=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
if(!empty($iplikoku)){
    foreach($iplikoku as $iplk => $iplkler){
        $iplikartid=(!empty($iplkler['nesne_IDiplikkartTipi'])?$iplkler['nesne_IDiplikkartTipi']:0);
        $iplikkarti=(!empty($_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
        $uretimTipi=(!empty($_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
        $boyaKontrol=(!empty($_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
        $elyafmetin="";
        if(!empty($iplkler['elyaf'])){
            $elyafcek=$iplkler['elyaf'];
            $elyafarray=(!empty($iplkler['elyaf'])?json_decode($iplkler['elyaf'],1):'');
            if(!empty($elyafarray)){
                $elyafarray=str_replace('puan','',$elyafarray);
            }
            if(!empty($elyafarray)){
                foreach($elyafarray as $i => $elyf){
                    $elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                } 
            }  
        }
        $elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
        $iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
        $metinolustur=$iplikkart;
        
        echo '
            <option data-name="ara[nesne_IDiplikkartTipi]" value="'.$iplikartid.'">'.$elyafmetinekle.'</option>
        ';

    }
}

?> </select> <?php } getKompozisyonSelect('test'); ?>
 

 <?php 
    function elyafKompozisyon($elyafKompozisyon){
    
        if(!empty($elyafKompozisyon)){
            $elyafcek=$elyafKompozisyon;
            $elyafarray=(!empty($elyafKompozisyon)?json_decode($elyafKompozisyon,1):'');
            if(!empty($elyafarray)){
                $elyafarray=str_replace('puan','',$elyafarray);
            }
            if(!empty($elyafarray)){
                foreach($elyafarray as $i => $elyf){
                    $elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
                    $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
                } 
            }  
        }

        return $elyafMetin;
    }
        
    ?>