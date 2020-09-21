<?php
	$_Firma=z(1,"WHERE arsiv='0' AND firmaTip='0'",'ID,ad','firma');
	//$_Kisi=z(1,"WHERE ".z(38,$_Firma,'ID','firma_ID'),'ID,firma_ID,ad,soyad,telCep1','kisi');
	//$_Kisi=z(48,$_Kisi,'firma_ID');
	$json['sonuc']=1;
	$json['cevap']=array(
		'musteriler'=>$_Firma,
	//	'kisiler'=>$_Kisi
	);
	$json['mesaj']='Firma bilgileri okundu.';
?>