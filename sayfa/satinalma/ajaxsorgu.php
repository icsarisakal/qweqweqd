<?php 

$tip = !empty(z(8,'tip'))?z(8,'tip'):'';
if(!empty($tip)){
    $metin1=z(1,$tip,'metin1','nesne');
    if($tip == '266'){
      $selectdata = z(1,'WHERE arsiv=0 AND ad="aksesuargruplari"','ID,metin1','nesne');
    }
    elseif($tip == '264'){
      $selectdata = z(1,'WHERE arsiv=0 AND ad="iplikkartTipi"','ID,metin1','nesne');
    }
    elseif($tip == '265'){
      $kumaskodu = z(1,'WHERE arsiv=0 AND revize_ID=0','ID,kodu','kumaskarti');
      foreach ($kumaskodu as $key => $select) {
        $selectdata[$key]['ID'] = $select['ID'];
        $selectdata[$key]['metin1'] = $select['kodu'];
      }
    }
    
}
$json['sonuc']=1;
$json['cevap']= array(
  'tip'=>$tip,
  'selectdata'=>$selectdata,
);
?>