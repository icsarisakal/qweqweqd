<?php
if(!empty($_GET['kod'])){
	require_once('../class/barkod/BCGFontFile.php');
	require_once('../class/barkod/BCGColor.php');
	require_once('../class/barkod/BCGDrawing.php');
	require_once('../class/barkod/BCGcode128.barcode.php');
	$font = new BCGFontFile('../font/Arial.ttf', !empty($_GET['fs'])?$_GET['fs']:14);
	$text = $_GET['kod'];
	$color_black = new BCGColor(0, 0, 0);
	$color_white = new BCGColor(255, 255, 255);
	$drawException = null;
	try {
		$code = new BCGcode128();
		$code->setScale(2); // Resolution
		$code->setThickness(!empty($_GET['h'])?$_GET['h']:18); // Thickness
		$code->setForegroundColor($color_black); // Color of bars
		$code->setBackgroundColor($color_white); // Color of spaces
		$code->setFont($font); // Font (or 0)
		$code->parse($text); // Text
	} catch(Exception $exception) {
		$drawException = $exception;
	}
	$drawing = new BCGDrawing('', $color_white);
	if($drawException) {
		$drawing->drawException($drawException);
	} else {
		$drawing->setBarcode($code);
		$drawing->draw();
	}
	header('Content-Type: image/png');
	header('Content-Disposition: inline; filename="barkod.png"');
	$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
}
?>