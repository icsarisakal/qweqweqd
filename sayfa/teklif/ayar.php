<?Php
$tbl='teklif';
$syf='teklif';


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
            <th>NO</th>
            ',
        'filtreGrup'=>''
    ),

    // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'proformaNo',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Proforma No</th>',
        'genislik'=>'',
        'filtreGrup'=>'proformaNo'
    ),

    // Firma (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'firma', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İlgili Firma</th>',
        'genislik'=>'',
        'filtreGrup'=>'firma'
    ),

    // Firma (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'kisi', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'ID,ad,soyad',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İlgili Kişi</th>',
        'genislik'=>'',
        'filtreGrup'=>'kisi'
    ),

    // Personel (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'personel', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>"WHERE arsiv='0' AND admin='0'",
        'thIcerigi'=>'<th>Hangi Personel Gönderdi?</th>',
        'genislik'=>'',
        'filtreGrup'=>'personel'
    ),

    // Bölge (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'bolge', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>"",
        'thIcerigi'=>'<th>Bölge</th>',
        'genislik'=>'',
        'filtreGrup'=>'bolge'
    ),

    // Sehir (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'sehir', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>"",
        'thIcerigi'=>'<th>Sehir</th>',
        'genislik'=>'',
        'filtreGrup'=>'sehir'
    ),
       
// Açıklama (text)
  /*  array(
        'tip'=>'text',
        'sutunAdi'=>'vergiD',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Vergi Dairesi</th>',
        'genislik'=>''
    ),
  /* // Açıklama (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'adres',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adres</th>',
        'genislik'=>''
    ),*/
      // Adı (text)
   /* array(
        'tip'=>'text',
        'sutunAdi'=>'urunAdi',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Ürün Adı</th>',
        'genislik'=>''
    ),*/
// Açıklama (text)
   /* array(
        'tip'=>'text',
        'sutunAdi'=>'ozellik',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Model/Özellikleri</th>',
        'genislik'=>''
    ),*/
    // Açıklama (text)
   /* array(
        'tip'=>'text',
        'sutunAdi'=>'sartlar',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Şartlar</th>',
        'genislik'=>''
    ),*/

     // Tip (nesneTip)
    array(
        'tip'=>'nesneTip',
        'sutunAdi'=>'teklifdurum',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Son Durum</th>',
        'genislik'=>'',
        'filtreGrup'=>'teklifdurum'
    ),  
   
    // Adet (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'fiyat',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Teklif Tutarı</th>',
        'genislik'=>'',
        'filtreGrup'=>'fiyat'
    ),
    
     
    // Kayıt Tarihi (tarih)
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihKayit',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kayıt Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarihKayit'
    ),

    
    // Açıklama (text)
    /*array(
        'tip'=>'text',
        'sutunAdi'=>'aciklama',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Açıklama</th>',
        'genislik'=>''
    ),
*/
);
$_NSN=array(


    'departman'=>array(
        'ad'=>'Departman Adı',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Departman Adı')),
    'ddepartman'=>array(
        'ad'=>'Destek Departman Adı',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Destek Departman Adı')),
      
    'odemeSekli'=>array(
        'ad'=>'Ödeme Şekli',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Ödeme Şekli')),
);
$_OZNSN=array(

   'durum'=>array(
        'ad'=>'Durum',
        'tip'=>'durum',
        'alan'=>'sayi1,metin2',
        'alan2'=>array('metin1'=>'Durum')),
    'tip'=>array(
        'ad'=>'Tip',
        'tip'=>'tip',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Tip')),
      
);

// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tüm Teklifler',
    'menu_yeni_ekle'=>'Yeni Teklif Ekle',
    'kayit_bulunamadi'=>'Teklif bulunamadı!',

    'tekil_isim'=>'Teklif Numarası'
);

$hizliEkleForm=array('firma');



$tFootC=count($_Th)+3;


$ozel1=1;
/*/

$_NSN=array(
    'bOzellik'=>array(
    'ad'=>'Boyama Özelliği',
    'alan'=>'metin1',
    'alan2'=>array('metin1'=>'Terbiye')),
);
if($admn||ytk('ornekmodul','ozel1')){
    $ozel1=1;
}
else{
    unset($_Th[11],$_Th[12]);
}
/*/


/*/
$_DokumaDurum=array(
    '0'=>array('renk'=>'#ccc','aciklama'=>'Normal girdi'),
    '1'=>array('renk'=>'#fffa65','aciklama'=>'Sarı'),
    '2'=>array('renk'=>'#686de0','aciklama'=>'Mavi'),
    '3'=>array('renk'=>'#22a6b3','aciklama'=>'Turkuaz'),
    '4'=>array('renk'=>'#cd84f1','aciklama'=>'Lila'),
    '5'=>array('renk'=>'#ffcccc','aciklama'=>'Pudra'),
    '6'=>array('renk'=>'#ff4d4d','aciklama'=>'Kırmızı'),
);


$_NSNDokumaDurum=z(1,array('ad'=>'boyatakipDurum'),'ID,sayi1,metin1,metin2','nesne');
if(!empty($_NSNDokumaDurum)){
    foreach ($_NSNDokumaDurum as $i=>$nsndd) {
        $_DokumaDurum[(int)$nsndd['sayi1']]=array('renk'=>$nsndd['metin1'],'aciklama'=>$nsndd['metin2']);
    }
}


$_DokumasiparisDurum=array();
$_NSNDokumasiparisDurum=z(1,array('ad'=>'boyatakipsiparisDurum'),'ID,sayi1,metin1,metin2','nesne');
if(!empty($_NSNDokumasiparisDurum)){
    foreach ($_NSNDokumasiparisDurum as $i=>$nsndd) {
        $_DokumasiparisDurum[(int)$nsndd['sayi1']]=array('renk'=>$nsndd['metin1'],'aciklama'=>$nsndd['metin2']);
    }
}
/*/




$i_aktifduzenleA=1;

if(!function_exists('i_aktifduzenleSonuc')){
    function i_aktifduzenleSonuc($tip,$tbl,$aln,$id,$yeniDeger){
        $_Snc=array(
            '_YeniDeger'=>array(
                // İşlem bittikten sonra yeni değerler
                //array('','m_boyatakip_boyahaneVaryant_'.$id,'otomatik doldur')
            )
        );
        //if(!empty($aln)){
            //switch ($aln) {
                //case 'fireHesapDegeri':
                    //$_Snc['_YeniDeger'][]=array('','m_dokumastok_hamMetraj_'.$id,'55');
                    //$_Nesne=z(1,array('ad'=>'kalite'),'ID,metin1','nesne');
                    //$_Stok=z(1, "WHERE arsiv<>'-1' AND boyatakip_ID='".$id."'", 'ID,metraj','boyatakip');
                    //if(!empty($dokumastok)){
                        //$xyd=$dokumastok['hamMetraj'] - $dokumastok['sevk1K'] - $dokumastok['sevk1A'] - $dokumastok['sevk2K'] - $yeniDeger;
                        //z(3,$id,array('kalanMetraj'=>$xyd));
                        //$yh['ID']=$id;
                        //$yh['tbl']='boyatakip';
                        //$yh['aln']='sevk';

                        //$yh_boyatakip=boyatakipFireHesapFonksiyonu($yh);

                        //$_Snc['_YeniDeger'][]=array('','s_boyatakip_fireHesapDegeri_'.$id, (z(36,$yh_boyatakip['fireHesapDegeri'],0)));
                        //$_Snc['_YeniDeger'][]=array('','s_boyatakip_fireOrani_'.$id, (z(36,$yh_boyatakip['fireOrani'],1)) /*z(36,$xyd,2,1)*/);
                        //$_Snc['_YeniDeger'][]=array('','s_boyatakip_fireMt_'.$id, (z(36,$yh_boyatakip['fireMt'],1,1)) /*z(36,$xyd,2,1)*/);
                    //}


                    //break;
                
                //default:
                    # code... 
                    //break;
            //}
        //}
        return $_Snc;
    }
}


?>