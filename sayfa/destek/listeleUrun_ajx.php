<?Php session_start();ob_start();
require(__DIR__.'/../../ayar.php');
require(__DIR__.'/ayar.php');
if($admn||ytk($syf,'listele')){
	$tbl.='urun';
	$syf2=$syf.'urun';
	unset($_NSN);
	require(__DIR__.'/listeleUrun_prc.php');
}else echo 100;
ob_end_flush()?>