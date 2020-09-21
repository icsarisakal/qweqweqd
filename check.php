<?php 
require(__DIR__.'/ayar.php');

$data = z(1,'','ID,girisTarih,personel_ID','online');

	foreach ($data as $key => $online) {
		z(11,'girisTarih',$online['girisTarih']);
		z(11,'simdikitarih',z('datetime'));
		$hatirla = z(11,'girisTarih');
		$suan = z(11,'simdikitarih');
		$zmn = strtotime($suan)-strtotime($hatirla);
		if ($zmn > 60) {
			z(4,$online['ID'],'online');
		}
	}
 ?>


