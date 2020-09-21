<?Php session_start();ob_start();
require(__DIR__.'/../../ayar.php');
require(__DIR__.'/ayar.php');
if($admn||ytk($tbl,'listele')){
	$dznA=z(7,'duzenle') && ($admn||ytk($tbl,'duzenle')); 
	require(__DIR__.'/listele_prc.php');
}else echo 100;
ob_end_flush()?>