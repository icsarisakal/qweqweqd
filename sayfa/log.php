<?Php
require(__DIR__.'/../parca/indirMenu.php');
require(__DIR__.'/log/ayar.php');
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	altMenu(array('listele'=>'Log Kayıtları'));
	
	if($admn||ytk(z(8,'s'),$a)){
		require(__DIR__.'/'.$tbl.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else{
	header('Location: ?s='.z(8,'s').'&a=listele');die;
	require(__DIR__.'/'.z(8,'s').'/listele.php');
}
?>