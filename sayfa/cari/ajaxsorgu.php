<?php 

        $cari_ad = z(8,'cari');
        $idmiz=z(8,'idmiz');
        $idkontrol='';
        if(!empty($cari_ad)){
          
            if(!empty($idmiz)){
              $idkontrol="AND ID!='".$idmiz."'";
          }
          //  $sorgu = "WHERE arsiv='0' AND ad LIKE '%".$cari_ad."%'";
            $sorgu = "WHERE arsiv='0' AND ad='".$cari_ad."'".$idkontrol;
            $exec=z(1,$sorgu,'','cari');             
            $cari_ad = count($exec);
        }

$json['sonuc']=1;
$json['cevap']= array(
	'cari'=>$cari_ad,
);


?>