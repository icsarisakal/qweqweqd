<?Php
$tbl='stok';
$syf='stok';
$_NSN=array(
'renkNo'=>array(
	'ad'=>'RENK NO',
	'alan'=>'metin1,metin2',
	'alan2'=>array('metin1'=>'Renk Adı','metin2'=>'Renk Kodu')),
'desenNo'=>array(
	'ad'=>'DESEN NO',
	'alan'=>'metin1,metin2',
	'alan2'=>array('metin1'=>'Desen','metin2'=>'Varyant')),
'kompozisyon'=>array(
	'ad'=>'KOMPOZİSYON',
	'alan'=>'metin1',
	'alan2'=>array('metin1'=>'Kompozisyon')),
'kalite'=>array(
	'ad'=>'KALİTE',
	'alan'=>'metin1',
	'alan2'=>array('metin1'=>'Kalite')),
/*'puan'=>array(
	'ad'=>'PUAN',
	'alan'=>'metin1',
	'alan2'=>array('metin1'=>'Puan'))
*/);
// ÇEKİ DURUMLARI
$_CkDrm=array(
	array('','Stokta bekliyor.'),
	array(4,'Çeki listesi için hazırda bekliyor.'),
	array(2,'Çeki listesine kaydoldu fakat henüz gönderilmedi.'),
	array(1,'Müşteriye gönderildi.')
);


$i_aktifduzenleA=1;
$i_aktifduzenleYetkiA=1;

if(!function_exists('i_aktifduzenleSonuc')){
    function i_aktifduzenleSonuc($tip,$tbl,$aln,$id,$yeniDeger){
        $_Snc=array(
            '_YeniDeger'=>array(
                // İşlem bittikten sonra yeni değerler
                //array('','m_boyatakip_boyahaneVaryant_'.$id,'otomatik doldur')
            )
        );
        if(!empty($aln)){
            switch ($aln) {
               
                
                default:
                    # code... 
                    break;
            }
        }
        return $_Snc;
    }
}

?>