<?Php session_start();ob_start();
require(__DIR__.'/../../ayar.php');
require(__DIR__.'/ayar.php');
if($admn||ytk($syf,'listele')){
	require(__DIR__.'/detay_prc.php');
}else echo 100;
ob_end_flush()?>