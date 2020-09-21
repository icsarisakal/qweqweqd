<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/kumaskarti/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array(
		'listele'=>$metin['menu_baslik'],
		'listele_duzenle'=>'Düzenle *',
		'listele_arsv1'=>'Arşiv'
	);
	if(z('lgn','admin')||ytk(z(8,'s'),'ekle'))$_AltM['ekle_ajxbtn']=$metin['menu_yeni_ekle'];
	altMenu($_AltM);
	
	if(z('lgn','admin')||ytk(z(8,'s'), str_replace(array('listele','detay','ekle','duzenle','ekletedarik','duzenletedarik','eklekombinasyon','duzenlekombinasyon','ajaxsorgu','ajaxsorgu2','ajaxsorgu3','ajaxsorgu4','ajaxsorgu5','rapor','ozel2'),array('listele','detay','ekle','duzenle','ekle','duzenle','ekle','duzenle','listele','listele','listele','listele','listele','ozel1','ozel2'),$a) )){
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