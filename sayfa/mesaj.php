<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/mesaj/ayar.php');

if(z(8,'a')){
	$a=z(8,'a');

//	__($a);
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
		$_AltM=array(
		'listele_tip0'=>'Müşteri Kurumlar',
		'listele_tip1'=>'İmalatçılar',
		'listele_tip2'=>'Tedarikçiler',
		'listele_tip3'=>'Nakliyeciler',
		'listele'=>$metin['menu_baslik'],
		'listele_arsv1'=>'Arşiv'
	);
	if(z('lgn','admin')||ytk(z(8,'s'),'ekle'))$_AltM['ekle_ajxbtn']=$metin['menu_yeni_ekle'];
	altMenu($_AltM);

	if(z('lgn','admin')||ytk(z(8,'s'), str_replace(array('detay','kartela','gelenkutusu'),array('listele','listele','ozel1'),$a) )){
		$dznA=!empty($exp[1]) && $exp[1]=='duzenle' && ($admn||ytk($tbl,'duzenle'));
			
		require(__DIR__.'/'.$tbl.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	
	z('git','?s='.$syf.'&a=listele_tip0');
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>