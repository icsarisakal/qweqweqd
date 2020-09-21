<?php 

        $musteri_ID = rtrim(z(8,'musteri'),',');
        $musteriboyabaski_ID = rtrim(z(8,'boyabaski'),',');
        $nesne_IDrenkadi = rtrim(z(8,'renkadi'),',');
        $id=z(8,'id');
        if(!empty($id)){
        $guncel = [
            'musteri_ID' => $musteri_ID,
            'musteriboyabaski_ID' => $musteriboyabaski_ID,
            'nesne_IDrenkadi' => $nesne_IDrenkadi
        ];
          $query = z(3,$id,$guncel,'renkkarti');
        }
$sonkontrol = z(1,$id,'musteri_ID,musteriboyabaski_ID,nesne_IDrenkadi','renkkarti');

if (empty($sonkontrol['musteri_ID'])){
  $guncel = [
    'musteri_ID' => '0', 
    'musteriboyabaski_ID' => '0',
    'nesne_IDrenkadi' => '0'
  ];
  z(3,$id,$guncel,'renkkarti');
}

$json['sonuc']=1;
$json['cevap']= array(
  'update'=>$query,
);
?>