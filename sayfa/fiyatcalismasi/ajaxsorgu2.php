<?php 

if(!empty(z(8,'urunkategori_ID')))
{
    $kategoriID = z(8,'urunkategori_ID');
    $konfeksiyonMaliyetleri = !empty(z(1,$kategoriID,'','konfeksiyonmaliyetleri'))?z(1,$kategoriID,'','konfeksiyonmaliyetleri'):'';
    $konfeksiyonMaliyetleriEbatArray = json_decode($konfeksiyonMaliyetleri['nesne_IDurunebatlari']);
    $konfeksiyonMaliyetleriFiyatArray = json_decode($konfeksiyonMaliyetleri['fiyat']);
    foreach ($konfeksiyonMaliyetleriEbatArray as $key => $nesneIDEbat) {
        if(!empty($nesneIDEbat)){
            $fiyat[$key]=$konfeksiyonMaliyetleriFiyatArray[$key];
            $ebat[$key]=z(1,$nesneIDEbat,'ID,ad,metin1','nesne');
        }
    }
    $json['sonuc']=1;
    $json['cevap']= array(
    'selectDataEbat' =>$ebat,
    'dataFiyat' =>$fiyat,
);

}
if(!empty(z(8,'ebat_ID'))){
    $ebatID = z(8,'ebat_ID');
    $kategoriID = z(8,'kategori_ID');
    $konfeksiyonMaliyetleri = !empty(z(1,$kategoriID,'','konfeksiyonmaliyetleri'))?z(1,$kategoriID,'','konfeksiyonmaliyetleri'):'';
    $konfeksiyonMaliyetleriEbatArray = json_decode($konfeksiyonMaliyetleri['nesne_IDurunebatlari']);
    $konfeksiyonMaliyetleriFiyatArray = json_decode($konfeksiyonMaliyetleri['fiyat']); 

    foreach ($konfeksiyonMaliyetleriEbatArray as $key => $nesneIDEbat) {
        if($nesneIDEbat==$ebatID){
            $fiyat = $konfeksiyonMaliyetleriFiyatArray[$key];
        }
    }
    $json['sonuc']=1;
    $json['cevap']= array(
        'fiyat' => $fiyat,
    );
}

?>