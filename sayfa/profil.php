<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/profil/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	$_AltM=array('listele'=>'Personel Listesi');
	if($admn||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='Yeni Ekle';
	altMenu($_AltM);
	
	if(($admn)||z(8,'id')==z('lgn','ID')||($a=='detay'&&z('lgn','ID'))){
		require(__DIR__.'/'.'profil'.'/'.$a.'.php');
		}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	header('Location: ?s='.z(8,'s').'&a=listele');die;
}
?>