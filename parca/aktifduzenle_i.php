<?php
	/*
	Belirteç stili özel yazılmalı
	.aktifduzenle:hover{}

	İlgili tabloya aktif düzenle özelliğini açmak için anahtar yazılmalı
	$i_aktifduzenleA=1;

	İşlem sonucunda çalışması gereken işlemler için özel fonksiyon tablonun ayar.php sine yazılmalı
	if(!function_exists('i_aktifduzenleSonuc')){
	    function i_aktifduzenleSonuc($tip,$tbl,$aln,$id,$yeniDeger){
	        return array(
	            '_YeniDeger'=>array(
	                // İşlem bittikten sonra yeni değerler verilirse ajax sonucu otomatik yansır
	                array('','m_boyatakip_boyahaneVaryant_'.$id,'otomatik doldur')
	            )
	        );
	    }
	}





	*/


	$snc=array('sonuc'=>0);
	//if($admn||ytk($tbl,'duzenle')){
		$adid=z(8,'id');
		$add=z(8,'d');
		if(!empty($adid)){
			$exp=explode('_', $adid);
			if(count($exp)==4){ 
				// 0 : tip
				// 1 : tablo adı
				// 2 : alan adı
				// 3 : id
				// s : sayı
				// m : metin
				// t : tarih
				// ts: tarihsaat

				switch ($exp[0]) {
					case 's':  // sayı tipinde ise
						//if(strpos($add,'.')&&strpos($add,',')){
							$add=str_replace('.','',$add);
						//}
						$add=z(36,$add);
						break;
					case 'm':  // metin tipinde ise
						$add=(string)$add;
						break;
				}

				if(!empty($exp[0])&&!empty($exp[1])&&!empty($exp[2])&&!empty($exp[3])){
					$ayarPath=__DIR__.'/../sayfa/'.$exp[1].'/ayar.php';
					if(file_exists($ayarPath)){
						require($ayarPath);
						if(!empty($i_aktifduzenleA)){
							z(6,$exp[1]);
							if(z(3,$exp[3], array($exp[2]=>$add) )){
								$snc['sonuc']=1;
								switch ($exp[0]) {
									case 's':
										$snc['yeniDeger']=z(36,$add,2,1);
										break;
									
									default:
										$snc['yeniDeger']=$add;
										break;
								}
								if(function_exists('i_aktifduzenleSonuc')){
									$snc['data']=i_aktifduzenleSonuc($exp[0],$exp[1],$exp[2],$exp[3],$add);
								}
							}
							else $snc['sonuc']=array('İşlem başarısız',$exp,$add);
						}
						else $snc['sonuc']=101;
					}
					else $snc['sonuc']=4; // dosya bulunamadı
				}
				else $snc['sonuc']=3; // alan eksik
			}
			else $snc['sonuc']=3; // alan eksik
		}
		else $snc['sonuc']=2; // id yok
	//}
	//else $snc['sonuc']=101;

	echo json_encode($snc);
?>