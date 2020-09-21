<?php session_start();ob_start();
sleep(1);
/*

Sadece sayfa yüklensin.
Bu sayfa normalde görüntülenebilen sayfaların head ve footer olmadan, sadece contenti(yani kendi içeriğini) yükler

*/

// Gerekli kütüphaneleri ve varsayılan ayarları yükle
require(__DIR__.'/ayar.php');

// Üyelik girşi yok ise durdur
//if(!z('lgn'))die;


// istenilen sayfayı sayfa klasöründen import eder
if(z(8,'s')){

	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0]; $sayfaTipi=$exp[1]; }

	$ajxdir=__DIR__.'/sayfa/'.str_replace(array('/','\\','.'),'',z(8,'s')).'/';
	$ajxsyf=$ajxdir.str_replace(array('/','\\','.'),'',$a).'.php';
	if(file_exists($ajxsyf)){
		require($ajxsyf);
	}
	//else require(__DIR__.'/sayfa/404.php');
}


ob_end_flush();
?>

