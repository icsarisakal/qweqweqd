<?php 
if(!empty($ID)&&isset($_GET['ikiyebol'])){

	$ibx=z(1,$ID,'','stok');
	if(!empty($ibx)){
		$eskiMetre=z(36,$ibx['metraj']);
		$yeniMetre=z(8,'ikiyebol','sayi');


		// Kontrollü alanlar
		if(empty($ibx['tarihSonHareket'])){
			$ibx['tarihSonHareket']=$ibx['tarih'];
		}

		// İki parçadada kullanılacak
		$ibx['personel_ID']=z('lgn','ID');
		$ibx['stok_ID']=$ibx['ID'];
		$ibx['arsiv']=0;
		$ibx['durum']=0;
		$ibx['ceki_ID']=0;
		$ibx['tarih']=z('datetime');

		// İstenmeyenler
		unset(
			$ibx['ID'],
			$ibx['tarihArsiv'],
			$ibx['tarihDurum']
		);

		
		$bsrm=0;

		// İlk Parça (Geriye Kalan)		
		$ibx['metraj']=$eskiMetre-$yeniMetre;
		$bsrm+=z(2,$ibx,'stok')?1:0;

		// İkinci Parça (İstenen)		
		$ibx['metraj']=z(36,$yeniMetre);
		$ibSID=z(2,$ibx,'stok');
		$bsrm+=!empty($ibSID)?1:0;


		if($bsrm==2){
			z(33,'ikiyebol',1);
			z(6,'stok');
			z(3,$ID,'arsiv',1);
			z('git','?s=stok&a=detay&id='.$ibSID);
		}
		else if($bsrm>0){
			z(33,'ikiyebol',2);
		}
		else{
			z(33,'ikiyebol',-1);
		}

		z('git','geri');

	}


}
?>