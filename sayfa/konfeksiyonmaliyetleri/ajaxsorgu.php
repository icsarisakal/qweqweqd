<?php 
$urunkontrol='0';
$urunkategori_ID=z(8,'urunkategori_ID');
$urunebatlari_ID=z(8,'urunebatlari_ID');
$fiyat=z(8,'fiyat');
$idmiz=z(8,'idmiz');

$sorgu="WHERE arsiv='0' AND urunkategori_ID='".$urunkategori_ID."' AND urunebatlari_ID='".$urunebatlari_ID."' AND fiyat='".$fiyat."' AND idmiz!='".$idmiz."'";
$vt=z(1,$sorgu,'',$tbl);
if(!empty($vt)){
    $urunkontrol='1';
}

$json['sonuc']=1;
$json['cevap']= array(
	'urunkontrol'=>$urunkontrol,
);
?>