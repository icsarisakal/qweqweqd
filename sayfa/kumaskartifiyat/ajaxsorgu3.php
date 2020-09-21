<?php 
$resim=z(8,'resim');
$dosyaAd=null;
$dosyaid=null;
$id=z(8,'id');
$tbl2=z(8,'tblgonder');
$id=(!empty($id)?$id:0);
$tbl='kumaskartifiyat';

if(!empty($tbl2)){
	$tbl=$tbl2;
}

if(!empty($_FILES['file'])){
	$dosya=$_FILES['file'];
	if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif','image\/png','application/pdf'))){
		$dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti/',$dosya); 
	}
	if (!empty($dosyaAd)) {
		$perid=z('lgn','ID'); 
		$starih=z('datetime');
		$galeriarray=array(
			'arsiv'=>0,
			'personel_ID'=>$perid,
			'tarih'=>$starih,
			'tablo'=>$tbl,
			'tablo_ID'=>$id,
			'img'=>$dosyaAd,
		);
		$dosyaid=z(2,$galeriarray,'galeri');
	}
}

if(!empty($resim)){
	$resim=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$resim),'ID,img','galeri');
}
$json['sonuc']=1;
$json['cevap']= array(
	'resim'=>$resim,
	'dosyaAd'=>$dosyaAd,
	'dosyaid'=>$dosyaid,
);
?>