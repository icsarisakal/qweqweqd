<?Php session_start();ob_start();
require(__DIR__.'/../../ayar.php');
require(__DIR__.'/ayar.php');
if($admn||ytk($tbl,'ekle')){
	require(__DIR__.'/cekitr_prc.php');
}else echo 100;
ob_end_flush()?>