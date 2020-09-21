<?php session_start();error_reporting(E_ALL);ini_set("display_errors", 1);date_default_timezone_set('Europe/Istanbul');ob_start();$mct=microtime(true);
require('ayar.php');
$tbl='ceki';
$cekiTip=2;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Starteks Çeki Listesi</title>
<link rel="stylesheet" href="css/style6.css">
<link rel="stylesheet" href="css/genel04.css">
<link rel="stylesheet" href="css/panel2-1.css">
<meta charset="utf-8">

</head>
<body>
	<?php 
		require(__DIR__.'/sayfa/ceki/detay.php');
	?>
</body>
</html>