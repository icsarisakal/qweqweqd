<?Php if((z(8,'iddrm')||z(8,'dsiddrm'))&&($admn||ytk(z(8,'s'),'duzenle'))){

	if(z(8,'iddrm')){
		$ID=z(8,'iddrm');
		$drm=z(8,'drm');
		z(6,$tbl);
	}
	else if(z(8,'dsiddrm')){
		$ID=z(8,'dsiddrm');
		$drm=z(8,'dsdrm');
		z(6,'dokumasiparis');
	}
	$ssnc=z(3,$ID,'durum',$drm);
	if(!empty($ssnc)){
		$json=array('sonuc'=>1,'yeniDurum'=>$drm,'htmlCikti'=>'');
		//__(z(1,"WHERE ad='dokumaDurum'",'ID,metin1,metin2,sayi1','nesne'));

		$json['htmlCikti'].='<div>';
		foreach ($_DokumaDurum as $ddrm=>$ddrmm) {
			$json['htmlCikti'].='<a href="?s='.$tbl.'&a=listele&iddrm='.$ID.'&drm='.$ddrm.'" class="drm_btn_'.$ddrm.' '.($ddrm==$drm?'aktif':'').'" title="'.$ddrmm['aciklama'].' olarak işaretle"></a>';
		}
		$json['htmlCikti'].='</div>';

	}
	z(33,'durum',$ssnc);
	$_Log=array('nesne'=>$tbl,'islem'=>'durum','sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'Durum değiştirme işlemi gerçekleştirildi. Etkilenen ID: "'.$ID.'"');
	require(__DIR__.'/log.php');
}else if(z(8,'iddrm'))z(33,'duzenle',101);?>