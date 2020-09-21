<?Php
$tbl='aksesuarkarti';
$syf='aksesuarkarti';


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
            <th class="tdi">NO</th>
            ',
        'filtreGrup'=>''
    ),

    // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'renkKodu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Aksesuar Kodu</th>',
        'genislik'=>'',
        'filtreGrup'=>'renkKodu'
    ),

    
  // Açıklama (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'aciklama',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Açıklama</th>',
        'genislik'=>'',
        'filtreGrup'=>'aciklama'
    ),

    array(
        'tip'=>'tablo',
        'sutunAdi'=>'cari',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tedarikçi</th>',
        'genislik'=>'',
        'filtreGrup'=>'cari_ID'
    ),

    array(
        'tip'=>'nesne',
        'sutunAdi'=>'aksesuargruplari', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Aksesuar Grupları</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDaksesuargruplari'
    ),


   /* array(
        'tip'=>'text',
        'sutunAdi'=>'varyant',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Varyant(Renk)</th>',
        'genislik'=>''
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'ozelKodu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Özel Kodu</th>',
        'genislik'=>''
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'erisimKodu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Erişim Kodu</th>',
        'genislik'=>''
    ),

     array(
        'tip'=>'text',
        'sutunAdi'=>'mamulKodu',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Mamül Kodu</th>',
        'genislik'=>''
    ),

    // Gramaj (sayi)
    array(
        'tip'=>'text',
        'sutunAdi'=>'pantoneNo',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Pantone No</th>',
        'genislik'=>''
    ),*/
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'fiyat',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Fiyat</th>',
        'genislik'=>'',
        'filtreGrup'=>'fiyat'
    ),


    array(
        'tip'=>'nesne',
        'sutunAdi'=>'birimTipi', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Birim</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDbirimTipi'
    ),


    array(
        'tip'=>'nesne',
        'sutunAdi'=>'doviz', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Döviz</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDdoviz'
    ),


     // Adet (sayi)
     array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarih',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tarih</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarih'
    ),
    
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihTalep',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Talep Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarihTalep'
    ),    

    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihOkey',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Okey Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarihOkey'
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
    'doviz'=>array(
        'ad'=>'Döviz Cinsi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Döviz Cinsi','metin2'=>'Döviz Sembolü')
    ),
);
$_NSN2=array(
    'birimTipi'=>array(
        'ad'=>'Birim',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Birim')
    ),
);
$_NSN3=array(
    'aksesuargruplari'=>array(
        'ad'=>'Aksesuar Grupları',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Aksesuar Grupları')
    ),
);
$_OZNSN=array(

  /* 'durum'=>array(
        'ad'=>'Durum',
        'tip'=>'durum',
        'alan'=>'sayi1,metin2',
        'alan2'=>array('metin1'=>'Durum')),
    'tip'=>array(
        'ad'=>'Tip',
        'tip'=>'tip',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Tip')),*/
      
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