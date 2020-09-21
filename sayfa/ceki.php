<?Php
$indirMenuA=false;require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/ceki/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array(
	'listele'=>'<img src="img/drm.png" height="14" /> <span style="vertical-align:top">Ham Çeki</span>',
	//'listelepersonel'=>'<img src="img/personel-32.png" height="14" /> <span style="vertical-align:top">Personel Ham Çeki</span>',
	//'mamullistelepersonel'=>'<img src="img/personel-32.png" height="14" /> <span style="vertical-align:top">Personel Mamul Çeki</span>',
	'mamullistele'=>'<img src="img/drm1.png" height="14" /> <span style="vertical-align:top">Mamul Çeki</span>',
	'mamulgirislistele'=>'<img src="img/giris.png" height="14" /> <span style="vertical-align:top">Mamul Giriş</span>',
	'mamulcikislistele'=>'<span style="vertical-align:top">Mamul Çıkış</span> <img src="img/giris2.png" height="14" />',
/*,'listele_arsv1'=>'Arşiv'*/);
	//if(z('lgn','admin')||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='Yeni Çeki Oluştur';
	if(z(8,'boyatakip_ID')){
		if($admn||ytk('ceki','ekle'))$_AltM['mamulsevk']='<img src="img/drm1.png" height="14" /> <span style="vertical-align:top">Giriş Olarak Çeki Listesi Oluştur</span>'.
		'--- &barkodluA=1&cikistip=hambezstok&cikisformac=1&boyatakip_ID='.z(8,'boyatakip_ID');
	}
	altMenu($_AltM);
	
	if(z('lgn','admin')||ytk(z(8,'s'), str_replace(
		array('detay','mamullistele','mamulgirislistele','mamulcikislistele','mamulsevkbarkod','mamulsevk','topluekle','hamsevk'),
		array('listele','listele','listele','listele',						 'ekle','ekle','ekle','ekle'),$a) )){
		require(__DIR__.'/'.$tbl.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
/*else if(z('lgn','admin')||ytk(z(8,'s'),'ekle')){
	header('Location: ?s='.$tbl.'&a=ekle');die;
	require(__DIR__.'/'.z(8,'s').'/ekle.php');
}*/
else{
	header('Location: ?s='.$tbl.'&a=listele');die;
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>