<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/stok/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	$sayfaTipi=!empty($exp[1])?$exp[1]:'';
	
	$_AltM=array(
		'listele'=>'<img src="img/duzenle.png" height="14" /> <span style="vertical-align:top">Tüm Toplar</span>'.
		'--- &hambezstok_ID='.z(8,'hambezstok_ID')
	//	,'listele_duzenle'=>'Firma Seç'

	);
	if($admn||ytk(z(8,'s'),'arsivle'))$_AltM['listele_arsv1']='<img src="img/drm4.png" height="14" /> <span style="vertical-align:top">Bölünmüş Toplar</span>'.
		'--- &hambezstok_ID='.z(8,'hambezstok_ID')
		;
	//if($admn||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='<img src="img/ekle.png" height="14" /> <span style="vertical-align:top">Yeni Ekle</span>';
	if(z(8,'hambezstok_ID')){
		if($admn||ytk('stok','ekle'))$_AltM['topluekle']='<img src="img/ekle24-4.png" height="14" /> <span style="vertical-align:top">Top Ekle</span>'.
		'--- &hambezstok_ID='.z(8,'hambezstok_ID')
		;
		if($admn||ytk('ceki','ekle'))$_AltM['hamsevk']='<img src="img/drm1.png" height="14" /> <span style="vertical-align:top">Çeki Listesi Oluştur</span>'.
		'--- &barkodluA=1&cikistip=hambezstok&cikisformac=1&hambezstok_ID='.z(8,'hambezstok_ID');
	}
	if(z(8,'firma_ID')){
		if($admn||ytk('ceki','ekle'))$_AltM['hamsevk']='<img src="img/drm1.png" height="14" /> <span style="vertical-align:top">Çeki Listesi Oluştur</span>'.
		'--- &barkodluA=1&cikistip='.z(8,'giris').'&cikisformac=1&firma_ID='.z(8,'firma_ID');
	}
	if(z(8,'boyatakip_ID')){
		if($admn||ytk('ceki','ekle'))$_AltM['hamsevk']='<img src="img/drm1.png" height="14" /> <span style="vertical-align:top">Çeki Listesi Oluştur</span>'.
		'--- &barkodluA=1&cikistip=boyatakip&cikisformac=1&boyatakip_ID='.z(8,'boyatakip_ID');
	}


	altMenu($_AltM);
	
	if($admn||ytk(z(8,'s'), str_replace(array('etiket','detay','hamsevk','topluekle'),array('listele','listele','ekle','sil'),$a) )){
		$dznA=!empty($exp[1]) && $exp[1]=='duzenle' && ($admn||ytk($tbl,'duzenle')); 

		require(__DIR__.'/'.$tbl.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	header('Location: ?s='.$tbl.'&a=listele');die;
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>