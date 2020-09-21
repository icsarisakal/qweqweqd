<?php 

$id = z(8,'id');

$vt=z(1,$id,'',$tbl);
$vt['musteri_ID'] = explode(',',$vt['musteri_ID']);
$vt['musteriboyabaski_ID'] = explode(',',$vt['musteriboyabaski_ID']);
$vt['nesne_IDrenkadi'] = explode(',',$vt['nesne_IDrenkadi']);

$musteriler = array();
for($i=0;$i<count($vt['musteri_ID']);$i++){
$musteriler[$i]['musteri_ID'] = ($vt['musteri_ID'][$i]!='0')?$vt['musteri_ID'][$i]:'0';
$musteriler[$i]['ad'] = ($vt['musteriboyabaski_ID'][$i]!='0')?z(1,$musteriler[$i]['musteri_ID'],'ad','cari'):'0';   
$musteriler[$i]['musteriboyabaski_ID'] = ($vt['musteriboyabaski_ID'][$i]!='0')?$vt['musteriboyabaski_ID'][$i]:'0'; 
$musteriler[$i]['boyabaski'] = ($vt['musteriboyabaski_ID'][$i]!='0')?z(1,$musteriler[$i]['musteriboyabaski_ID'],'tipi','boyabaski'):'0';   
$musteriler[$i]['nesne_IDrenkadi'] = ($vt['nesne_IDrenkadi'][$i]!='0')?$vt['nesne_IDrenkadi'][$i]:'';
$musteriler[$i]['metin1'] = ($vt['musteriboyabaski_ID'][$i]!='0')?z(1,$musteriler[$i]['nesne_IDrenkadi'],'metin1','nesne'):'0';   
}

foreach($musteriler as $key => $kontrol)
{
$kontrol[$key] = $kontrol;
}

$json['sonuc']=1;
$json['cevap']= array(
  'dataTablo'=>$musteriler,
);


?>