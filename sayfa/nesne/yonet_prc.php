<style type="text/css">
	.baslik{
		display: block !important;
	}
	.baslik h2{
		display: none;
	}
</style>
<?Php
// Nesne Ekle
if(z(8,'ekle')&&($admn||ytk($tbl,'ekle'))){
	z(6,$tbl);
	if(!empty($_NSN[z(8,'ekle')])){
		$_X=z(7,$tbl);
		if(!empty($_X)){
			$_X['tarih']=z('datetime');
			$_X['ad']=z(8,'ekle');
			$_X['sayi1']=!empty($_X['sayi1'])?sayi($_X['sayi1']):0;
			$_X['sayi2']=!empty($_X['sayi2'])?sayi($_X['sayi2']):0;
			if(!empty($_X['sayi1'])||!empty($_X['sayi2'])||!empty($_X['metin1'])||!empty($_X['metin2'])){
				if(z(2,$_X)){
					if(empty($ajax)){
						$ID=z(1,'son','ID');
						z(33,'ekle',1);
						$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>1,'mesaj'=>'[MESAJ]401[/MESAJ] Nesne ID: "'.$ID.'" Yeni nesnenin grubu: "'.(!empty($_NSN[$_X['ad']]['ad'])?$_NSN[$_X['ad']]['ad']:$_X['ad']).'" Yeni nesnenin değeri: "'.(!empty($_X['metin1'])?$_X['metin1']:(!empty($_X['sayi1'])?$_X['sayi1']:'')).'"');
						require('parca/log.php');
						//unset($_X);
						header('Location: ?s='.$tbl.'&goster='.$_X['ad'].'&id='.$ID);die;
					} else _z(1,'son','ID');
					z("git","geri");
				}
			}else z(33,'ekle',2);
		}
	}
}else if(z(8,'ekle'))echo $ajax?100:uyr(2,'Ekleme işlemi için yetkiniz yok.');
// Nesne Düzenle
if(z(8,'dznl')&&($admn||ytk($tbl,'duzenle'))){
	z(6,$tbl);
	$_X=z(7,$tbl);
	if(!empty($_X)){
		$bsrm=0;
		$_NID=array();
		foreach($_X as $ID=>$x){
			if(empty($bsrm))$xad=z(1,$ID,'ad');
			$x['sayi1']=!empty($x['sayi1'])?sayi($x['sayi1']):0;
			$x['sayi2']=!empty($x['sayi2'])?sayi($x['sayi2']):0;
			if(z(3,$ID,$x)){$bsrm++;$_NID[1][]=$ID;}
			else $_NID[0][]=$ID;
		}
		if($bsrm==count($_X)){
			$snc=1;
			$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>1,'mesaj'=>'[MESAJ]402[/MESAJ] İlgili nesne grubu: "'.(!empty($_NSN[$xad]['ad'])?$_NSN[$xad]['ad']:$xad).'" Nesne ID\'leri: '.json_encode($_NID[1]));
			require('parca/log.php');
		}
		else if($bsrm>0){
			$snc=2;
			$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>1,'mesaj'=>'[MESAJ]403[/MESAJ] İlgili nesne grubu: "'.(!empty($_NSN[$xad]['ad'])?$_NSN[$xad]['ad']:$xad).'" Düzenlemesi;'.(!empty($_NID[1])?' Başarılı Nesne ID\'leri: '.json_encode($_NID[1]):'').(!empty($_NID[1])?' Başarısız Nesne ID\'leri: '.json_encode($_NID[0]):''));
			require('parca/log.php');
		}
		else{
			$snc=0;
			$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>0,'mesaj'=>'[MESAJ]404[/MESAJ] İlgili nesne grubu: "'.(!empty($_NSN[$xad]['ad'])?$_NSN[$xad]['ad']:$xad).'" Düzenlemesi;'.(!empty($_NID[1])?' Başarılı Nesne ID\'leri: '.json_encode($_NID[1]):'').(!empty($_NID[1])?' Başarısız Nesne ID\'leri: '.json_encode($_NID[0]):''));
			require('parca/log.php');
		}
		if(empty($ajax)){
			z(33,'guncelle',$snc);
			header('Location: ?s='.$tbl.'&goster='.$xad);die;
		}else echo $snc;
	}
}else if(z(8,'dznl'))echo !empty($ajax)?100:uyr(2,'Ekleme işlemi için yetkiniz yok.');
// Nesne Sil
if(z(8,'idx')&&($admn||ytk($tbl,'sil'))){
	$ID=z(8,'idx');
	z(6,$tbl);
	$xad=z(1,$ID,'ad');
	$ssnc=z(4,$ID);
	if(empty($ajax)){
		z(33,'sil',$ssnc);
		header('Location: ?s='.$tbl.'&goster='.$xad);die;

	}else echo $ssnc;
	$_Log=array('nesne'=>$tbl,'islem'=>'sil','sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'[MESAJ]-2[/MESAJ] Silinen ID: "'.$ID.'"');
	require('parca/log.php');
}else if(z(8,'idx'))echo $ajax?100:uyr(2,'Ekleme işlemi için yetkiniz yok.');
?>