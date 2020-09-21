<?php 
$position = z(7,'position');
$marka = z(8,'marka');
$i=1;
if(!empty($position)){
	foreach($position as $k=>$v){
		z(3,$v,array('sira'=>$i),$tbl);
		$i++;
	}
}
$nesnemarkacek='';

$yazimarka="WHERE arsiv='0' ";
if(!empty($marka)){
	$tedarikci=z(1,$marka,'','tedarikci');
	if(!empty($tedarikci['markalar'])){
		$yazimarka.='AND (';
		$markalar=(!empty($tedarikci['markalar'])?json_decode($tedarikci['markalar'],1):'');
		$markalarsayi=count($markalar);
		if(!empty($markalar)){
			foreach ($markalar as $mrk => $mark) {
				if($mrk+1!=$markalarsayi){
					$yazimarka.=" ID='".$mark."' OR ";
				} else {
					$yazimarka.=" ID='".$mark."'";
				}
			}
			$yazimarka.=')';
			$nesnemarkacek=z(1,$yazimarka,'ID,metin1,metin2','nesne');
		}
	}
}

$json['sonuc']=1;
$json['cevap']= array(
	'marka'=>$nesnemarkacek
);
?>