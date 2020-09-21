<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/pamuk/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array('listele'=>$bsl[4]);
	//if($admn||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='Yeni Ekle';
	altMenu($_AltM);
	
	if($admn||ytk(z(8,'s'),str_replace(array('detay','listeleUrun'),'listele',$a))||$a=='duzenle'){
		require(__DIR__.'/'.$syf.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	header('Location: ?s='.$syf.'&a=listele');die;
}
?>