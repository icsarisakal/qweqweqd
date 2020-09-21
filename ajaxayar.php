<?php session_start();ob_start();
sleep(1);
/*

Bu sayfa normalde görüntülenebilen sayfaların ajax olarak açılabilmesine olanak sağlar.
Daha çok saf json çıktı ihtiyacı duyulduğunda kullanılır.
Javascript eventlerle ajax üzerinden yerine getirilmesi istenen görevler için de kullanılabilir.

*/

// Gerekli kütüphaneleri ve varsayılan ayarları yükle
require(__DIR__.'/ayar.php');
if(!z('lgn'))die;
$ajaxAnahtar=1;
$json=array(
	'sonuc'=>'0',
	'cevap'=>'',
	'mesaj'=>'İşlem sonlandırıldı.'
);

// istenilen sayfayı sayfa klasöründen import eder
if(z(8,'s')){

	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0]; $sayfaTipi=$exp[1]; }

	$ajxdir=__DIR__.'/sayfa/'.str_replace(array('/','\\','.'),'',z(8,'s')).'/';
	$ajxsyf=$ajxdir.str_replace(array('/','\\','.'),'',$a).'.php';
	if(file_exists($ajxsyf)){
		if(file_exists($ajxdir.'ayar.php')){
			require($ajxdir.'ayar.php');
		}
		require($ajxsyf);
	}
	//else require(__DIR__.'/sayfa/404.php');
}

// Eğer sonuç ajax olarak isteniyorsa çıktıyı JSON olarak ekrana bas
if(isset($json)){
	header("Content-Type: application/json; charset=utf-8");
	echo json_encode( $json );
}

ob_end_flush();
?>

