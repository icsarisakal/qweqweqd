<?Php
$tbl='ceki';
$syf='ceki';
// ÇEKİ DURUMLARI
$_CkDrm=array(
	array('','Gönderilmeye Hazır'),
	array(1,'Müşteriye Gönderildi'),
	array(4,'Tekrar Gönderilmeye Hazır')
);
$_VsDrm=array('ceki'=>1,'stok'=>3);

$_NSN=array(
/*'musteri'=>array(
	'ad'=>'MÜŞTERİ',
	'alan'=>'metin1,metin2',
	'alan2'=>array('metin1'=>'Ad','metin2'=>'Soyad')),*/
'kalite'=>array(
	'ad'=>'Ürün Kalitesi',
	'alan'=>'metin1',
	'alan2'=>array('metin1'=>'Kalite')),
);


$i_aktifduzenleA=1;
if(!function_exists('i_aktifduzenleSonuc')){
    function i_aktifduzenleSonuc($tip,$tbl,$aln,$id,$yeniDeger){
    	$_Snc=array(
            '_YeniDeger'=>array(
                // İşlem bittikten sonra yeni değerler
                //array('','m_boyatakip_boyahaneVaryant_'.$id,'otomatik doldur')
            )
        );
        /*/
        if(!empty($aln)){
	        switch ($aln) {
	        	case 'dokunanMetraj':
	        		//$_Snc['_YeniDeger'][]=array('','m_dokumastok_hamMetraj_'.$id,'55');
	        		$dokumastok=z(1,$id,'ID,hamMetraj,sevk1K,sevk1A,sevk2K');
	        		if(!empty($dokumastok)){
	        			$xyd=$dokumastok['hamMetraj'] - $dokumastok['sevk1K'] - $dokumastok['sevk1A'] - $dokumastok['sevk2K'] - $yeniDeger;
	        			z(3,$id,array('kalanMetraj'=>$xyd));
	        			$_Snc['_YeniDeger'][]=array('','s_dokumastok_kalanMetraj_'.$id,z(36,$xyd,2,1));
	        		}
	        		break;
	        	
	        	default:
	        		# code...
	        		break;
	        }
        }
        /*/
        return $_Snc;
    }
}
?>