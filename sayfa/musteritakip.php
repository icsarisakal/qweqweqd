<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/musteritakip/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array(
		'listele_durum0'=>'Tel/Mail',
		'listele_durum1'=>'Ziyaret',
		'listele_durum2'=>'Teklif',
		'listele_durum3'=>'Sunum',
		'listele_durum4'=>'Son Karar',
		'listele_durum5'=>'Final',

		'listele'=>$metin['menu_baslik'],
		//'listele_duzenle'=>'Düzenle *',
		//'listele_arsv1'=>'Arşiv'
	);
	if(z('lgn','admin')||ytk(z(8,'s'),'ekle'))$_AltM['ekle_ajxbtn']=$metin['menu_yeni_ekle'];
	altMenu($_AltM);
	
	if(z('lgn','admin')||ytk(z(8,'s'), str_replace(array('kartela'),array('listele'),$a) )){
		$dznA=!empty($exp[1]) && $exp[1]=='duzenle' && ($admn||ytk($tbl,'duzenle')); 

		require(__DIR__.'/'.$syf.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	z('git','?s='.$syf.'&a=listele');
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>