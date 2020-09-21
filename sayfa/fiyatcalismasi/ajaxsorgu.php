<?php 
$fasonfiyati='';
$ebatlar=array();
$urunkategori_ID=z(8,'urunkategori_ID');
$urunebatlari_ID=z(8,'urunebatlari_ID');
$urunebatlari_ID=z(8,'urunebatlari_ID');
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='urunkategorileri' OR ad='urunebatlari' ",'ID,ad,metin1,metin2','nesne'));

if(!empty($urunkategori_ID)){
	$sorgu="WHERE arsiv='0' AND nesne_IDurunkategorileri='".$urunkategori_ID."'";
	$vt=z(1,$sorgu,'','konfeksiyonmaliyetleri');
	$ebatlar=(!empty($vt)?$vt:'');
	if(!empty($vt)){
		foreach ($vt as $vts => $tekbilgi) {
			$nesneyioku=(!empty($_Nesne[$tekbilgi["nesne_IDurunebatlari"]]["metin1"])?$_Nesne[$tekbilgi["nesne_IDurunebatlari"]]["metin1"]:'');
			$ebatlar[$vts]['sanalveri']=$nesneyioku;
		}
	}
}
if(!empty($urunebatlari_ID)){
	$sorgu="WHERE arsiv='0' AND nesne_IDurunkategorileri='".$urunkategori_ID."' AND nesne_IDurunebatlari='".$urunebatlari_ID."'";
	$vt=z(1,$sorgu,'','konfeksiyonmaliyetleri');
	$fasonfiyati=(!empty($vt[0]['fiyat'])?$vt[0]['fiyat']:'');
}

$fiyat_id=z(8,'fiyat');
$kumas_id=z(8,'kumas');
$blok_id=z(8,'blok'); 
$blok_id=(!empty($blok_id)?$blok_id:0);
$kumas_id=(!empty($kumas_id)?$kumas_id:0);
$fiyat_id=(!empty($fiyat_id)?$fiyat_id:0);

$kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$kumas_id."' AND blok_ID='".$blok_id."'";
$kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
$kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);

if(!empty($kumasfiyatveri)){
	$kumaskartifiyatid=$kumasfiyatveri['ID'];
	z(4,$kumaskartifiyatid,'kumaskartifiyat');
} 

$json['sonuc']=1;
$json['cevap']= array(
	'fasonfiyati'=>$fasonfiyati,
	'ebatlar'=>$ebatlar,
);
?>