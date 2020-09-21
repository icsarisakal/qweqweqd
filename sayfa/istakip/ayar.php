<?Php
$tbl='istakip';
$syf='istakip';


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

    // Açıklama (text)
    array(
        'tip'=>'yok',
        'sutunAdi'=>'ID',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İş Numarası</th>',
        'genislik'=>'',
        'filtreGrup'=>'ID'
    ),
    
    /*/
    // Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'nereden', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Müşteri İlişkisi</th>',
        'genislik'=>''
    ),
     // Adet (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'tel',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Telefon</th>',
        'genislik'=>''
    ),
     // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'eposta',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>E-Posta</th>',
        'genislik'=>''
    ),
    // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'adres',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adres</th>',
        'genislik'=>''
    ),
    
    // Firma (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'il_ID', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İL</th>',
        'genislik'=>''
    ),
     // Firma (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'ilce_ID', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>İLÇE</th>',
        'genislik'=>''
    ),
    // Adı (text)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'mahalle_ID',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Mahalle</th>',
        'genislik'=>''
    ),
    /*/

    // Tip (nesneTip)
    array(
        'tip'=>'nesneTip',
        'sutunAdi'=>'asamais',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Son Durum</th>',
        'genislik'=>'',
        'filtreGrup'=>'asamis'
    ),    

     // Personel (tablo)
    array(
        'tip'=>'tablo',
        'sutunAdi'=>'personel', // Sütun adı tablo adına dönüştü
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>"WHERE arsiv='0' AND admin='0'",
        'thIcerigi'=>'<th>Personel</th>',
        'genislik'=>'',
        'filtreGrup'=>'personel'
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

   

);

$_NSN=array(
    'nereden'=>array(
        'ad'=>'Müşteri Bize Nerden Geldi?',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Müşteri Bize Nereden Geldi?')),
);
$_OZNSN=array(
   'asamais'=>array(
        'ad'=>'Durum(Opsiyonel)',
        'tip'=>'durum',
        'alan'=>'sayi1,metin1',
        'alan2'=>array('metin1'=>'Durum')),
);

// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tüm İşler',
    'menu_yeni_ekle'=>'Yeni İş Ekle',
    'kayit_bulunamadi'=>'İş bulunamadı!',

    'tekil_isim'=>'İş Adı'
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