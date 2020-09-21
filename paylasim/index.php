<?php session_start();error_reporting(E_ALL);ini_set("display_errors", 1);date_default_timezone_set('Europe/Istanbul');ob_start();$mct=microtime(true);
require(__DIR__.'/../ayar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ayr['siteAd'].' | '.$ayr['firmaAd']; ?></title>
	<link rel="stylesheet" href="../css/style6.css">
	<link rel="stylesheet" href="../css/genel09.css">
	<link rel="stylesheet" href="../css/panel2-1.css">
	<meta charset="utf-8">
</head>
<body>
	<?php 
		if(z(8,'ceki')){
			$KOD=z(8,'ceki');
			if(strlen($KOD)<46){
				$tbl='ceki';
				$syf='ceki';
				$cekiTip=2;
				require(__DIR__.'/../sayfa/ceki/detay.php');
			}
		}
		else if(z(8,'teklif')){
			$KOD=z(8,'teklif');
			if(strlen($KOD)<46){
				$tbl='teklif';
				$syf='teklif';
				require(__DIR__.'/../sayfa/teklif/detay.php');
			}
		}
		else if(z(8,'stok')){
			$KOD=z(8,'stok');
			if(strlen($KOD)<46){
				$tbl='stok';
				$syf='stok';
				$paylasim=1;
				require(__DIR__.'/../sayfa/stok/detay.php');
			}
		}
	?>
</body>
</html>