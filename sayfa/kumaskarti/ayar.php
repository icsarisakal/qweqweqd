<?Php
$tbl='kumaskarti';
$syf='kumaskarti';

$ytkFyt=ytk($tbl,'ozel2');
?>
<?php 


// Listeleme sayfasının sütunları
$_Th=array(

    // Adet kısmını boş geçilmeli (Bu kısım değiştirilmek zorunda değil)
    array(
        'tip'=>'adet',
        'sutunAdi'=>'',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'
            <th class="printx"><input class="tumunuSec" type="checkbox"></th>
            <th class="tdi">Sıra No</th>
            ',
        'filtreGrup'=>''
    ),

    

    array(
        'tip'=>'text',
        'sutunAdi'=>'kodu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kumaş Kodu</th>',
        'genislik'=>'',
        'filtreGrup'=>'kodu'
    ),

    array(
        'tip'=>'yok',
        'sutunAdi'=>'img',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Resim</th>',
        'genislik'=>'',
        'filtreGrup'=>''
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'ismi',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kumaş İsmi</th>',
        'genislik'=>'',
        'filtreGrup'=>'ismi'
    ),
    
    /*// Açıklama (text)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'kumasTipi', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kumaş Tipi</th>',
        'genislik'=>''
    ),*/

    array(
        'tip'=>'tablo',
        'sutunAdi'=>'makinacesitleri',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Makina Çeşitleri</th>',
        'genislik'=>'',
        'filtreGrup'=>'makinacesitleri_ID'
    ),

    array(
        'tip'=>'tablo',
        'sutunAdi'=>'kumasturu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kumaş Türü</th>',
        'genislik'=>'',
        'filtreGrup'=>'kumasturu_ID'
    ),

    /*
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'iplikkartTipi', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İplik Numara Kartı</th>',
        'genislik'=>''
    ),
    */

    array(
        'tip'=>'yok',
        'sutunAdi'=>'iplikkartlari', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kompozisyon</th>',
        'genislik'=>'',
        'filtreGrup'=>''
    ),

    array(
        'tip'=>'tabloiplik',
        'sutunAdi'=>'iplikkartlari', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İplik Kartları</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDiplikkartTipi'
    ),

    /*
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'fiyat',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Fiyat</th>',
        'genislik'=>''
    ),
    */
    /*
    array(
        'tip'=>'text',
        'sutunAdi'=>'fiyatlar',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th class="yetkiozel2durum">Fiyat</th>',
        'genislik'=>''
    ),
    */

    array(
        'tip'=>'tablo',
        'sutunAdi'=>'rapor',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'ID',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Rapor</th>',
        'genislik'=>'',
        'filtreGrup'=>'rapor_ID'
    ),
    
    // Açıklama (text)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'doviz', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th class="yetkiozel2durum">Döviz</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDdoviz'
    ),
    
    
    /*// Kayıt Tarihi (tarih)
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihKayit',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kayıt Tarihi</th>',
        'genislik'=>''
    ),*/

    
    


);
$_NSN=array(
    'iplikkartTipi'=>array(
        'ad'=>'İplik Numara Kartı',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'İplik Numara Kartı')
    ),/*
    'elyafTipi'=>array(
        'ad'=>'Elyaf',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Elyaf')
    ),*/
    'uretimTipi'=>array(
        'ad'=>'İplik Üretim Tekniği',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'İplik Üretim Tekniği')
    )
);
$_NSN2=array(
    'doviz'=>array(
        'ad'=>'Döviz Cinsi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Döviz Cinsi','metin2'=>'Döviz Sembolü')
    ),
);
$_NSN3=array(
    'boyaKontrol'=>array(
        'ad'=>'Boya Durumu',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Boya Durumu')
    ),
);

$_NSN4=array(
    'doviz'=>array(
        'ad'=>'Fason Manuel Döviz Cinsi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Döviz Cinsi','metin2'=>'Döviz Sembolü')
    ),
);

$_NSN5=array(
    'kumasTipi'=>array(
        'ad'=>'Kumaş Üretim Tipi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Kumaş Üretim Tipi')
    ),
);
$_OZNSN=array(

  /* 'durum'=>array(
        'ad'=>'Durum',
        'tip'=>'durum',
        'alan'=>'sayi1,metin2',
        'alan2'=>array('metin1'=>'Durum')),*/
      
);

// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tüm Örnek Modüller',
    'menu_yeni_ekle'=>'Menü Yeni Ekle',
    'kayit_bulunamadi'=>'Örnek modül bulunamadı!',

    'tekil_isim'=>'Örnek Modül Adı'
);

$hizliEkleForm=array('firma');



$tFootC=count($_Th)+2;


$ozel1=1;

$i_aktifduzenleA=1;

if(!function_exists('i_aktifduzenleSonuc')){
    function i_aktifduzenleSonuc($tip,$tbl,$aln,$id,$yeniDeger){
        $_Snc=array(
            '_YeniDeger'=>array(
                // İşlem bittikten sonra yeni değerler
                //array('','m_boyatakip_boyahaneVaryant_'.$id,'otomatik doldur')
            )
        );
        return $_Snc;
    }
}


?>