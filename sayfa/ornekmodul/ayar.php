<?Php
$tbl='ornekmodul';
$syf='ornekmodul';


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
        'sutunAdi'=>'ad',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Örnek Modül Adı</th>',
        'genislik'=>'',
        'filtreGrup'=>'ad'
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

    // Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'departman', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Departman</th>',
        'genislik'=>'',
        'filtreGrup'=>'departman'
    ),

    // Destek Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'ddepartman', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Destek Departman</th>',
        'genislik'=>'',
        'filtreGrup'=>'ddepartman'
    ),

    // Durum (nesneDurum)
    array(
        'tip'=>'nesneDurum',
        'sutunAdi'=>'durum', 
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Durum</th>',
        'genislik'=>'',
        'filtreGrup'=>'durum'
    ),

    // Tip (nesneTip)
    array(
        'tip'=>'nesneTip',
        'sutunAdi'=>'tip',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tip</th>',
        'genislik'=>'',
        'filtreGrup'=>'tip'
    ),

    // Adet (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'adet',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adet</th>',
        'genislik'=>'',
        'filtreGrup'=>'adet'
    ),

    // Gramaj (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'gramaj',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Gramaj</th>',
        'genislik'=>'',
        'filtreGrup'=>'gramaj'
    ),

    array(
        'tip'=>'anahtar',
        'sutunAdi'=>'kdvAnahtar',
        'iliskiliSutunAdlari'=>'',
        'deger'=>array('0'=>'Dahil Değil', '1'=>'Dahil'),
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Sistem Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'kdvAnahtar'
    ),

     // Kayıt Tarihi (tarih)
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarih',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Sistem Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarih'
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
    'menu_baslik'=>'Tüm Örnek Modüller',
    'menu_yeni_ekle'=>'Menü Yeni Ekle',
    'kayit_bulunamadi'=>'Örnek modül bulunamadı!',

    'tekil_isim'=>'Örnek Modül Adı'
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