<?php
	$sd="";
	if(z(8,'firma_ad')){
		$_Firma=z(1,"WHERE arsiv='0' AND firmaTip='0' AND ad='".z(8,'firma_ad')."'",'ID,ad','firma');
		if(!empty($_Firma)){
			$sd="WHERE ".z(38,$_Firma,'ID','firma_ID');
		}
		else{
			$sd="WHERE 0";
		}
	}
	$_Kisi=z(1,$sd,'ID,firma_ID,ad,soyad,telCep1','kisi');
	//$_Kisi=z(48,$_Kisi,'firma_ID');
	$json['sonuc']=1;
	$json['cevap']=$_Kisi;
	$json['mesaj']='Firma bilgileri okundu.';
?>