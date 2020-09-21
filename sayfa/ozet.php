<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/ozet/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array('listele'=>'Stok Listesi'/*,'listele_arsv1'=>'Arşiv'*/);
	if(z('lgn','admin')||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='Yeni Ekle';
	altMenu($_AltM);
	
	if(z('lgn','admin')||ytk(z(8,'s'),str_replace('etiket','detay',$a))){
		require(__DIR__.'/'.$syf.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	header('Location: ?s='.$syf.'&a=listele');die;
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>