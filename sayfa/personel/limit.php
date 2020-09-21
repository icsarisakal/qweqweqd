<?Php session_start();ob_start();
require(__DIR__.'/../../ayar.php');
$snc=0;
require(__DIR__.'/limit_prc.php');
z(33,'limit',$snc);
header('Location: '.z('url','geri'));die;
ob_end_flush()?>