<?Php
$tbl='gelirgider';
$syf='gelirgider';


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
        'thIcerigi'=>'<th>Hizmet Adı</th>',
        'genislik'=>'',
        'filtreGrup'=>'ad'
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
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'odemeTipi', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Ödeme Tipi</th>',
        'genislik'=>'',
        'filtreGrup'=>'odemeTipi'
    ),
    
       // Destek Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'Hizmetler', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th> Hizmetler</th>',
        'genislik'=>'',
        'filtreGrup'=>'Hizmetler'
    ),

    // Durum (nesneDurum)
    array(
        'tip'=>'nesneDurum',
        'sutunAdi'=>'durum', 
        'deger'=>'',
        'iliskiliSutunAdlari'=>'gelirGiderDurum',
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
        'iliskiliSutunAdlari'=>'gelirGiderTip',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Gelir Gider</th>',
        'genislik'=>'',
        'filtreGrup'=>'tip'
    ),
    /*
    array(
        'tip'=>'anahtar',
        'sutunAdi'=>'kdvAnahtar',
        'iliskiliSutunAdlari'=>'',
        'deger'=>array('0'=>'Dahil Değil', '1'=>'Dahil'),
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kdv Dahil</th>',
        'genislik'=>''
    ),
    */

    // Tip (nesneTip)
    array(
        'tip'=>'nesneTip',
        'sutunAdi'=>'kdvAnahtar', // Tablomuzdaki sutun adi
        'deger'=>'',
        'iliskiliSutunAdlari'=>'kdvAnahtar', // Nesne adı
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kdv Dahil</th>',
        'genislik'=>'',
        'filtreGrup'=>'kdvAnahtar'
    ),
    
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'kdvOran',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Kdv Oranı</th>',
        'genislik'=>'',
        'filtreGrup'=>'kdvOran'
    ),
    // Gramaj (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'miktar',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Miktar</th>',
        'genislik'=>'',
        'filtreGrup'=>'miktar'
    ),
     // Destek Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'miktarBirim', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Birim</th>',
        'genislik'=>'',
        'filtreGrup'=>'miktarBirim'
    ),

    // Gramaj (sayi)
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
    // Gramaj (sayi)
    array(
        'tip'=>'yok',
        'sutunAdi'=>'yok',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tutar</th>',
        'genislik'=>'',
        'filtreGrup'=>''
    ),

     // Açıklama (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'sartName',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Şartname</th>',
        'genislik'=>'',
        'filtreGrup'=>'sartName'
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
     // Destek Departman (nesne)
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'tedarikci', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tedarikçi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tedarikci'
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
    // Kayıt Tarihi (tarih)
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihVade',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Vade Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarihVade'
    ),
    // Kayıt Tarihi (tarih)
    array(
        'tip'=>'tarih',
        'sutunAdi'=>'tarihSon',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Son Tarihi</th>',
        'genislik'=>'',
        'filtreGrup'=>'tarihSon'
    ),
   







    /*/
    array('text','numuneAdi','','','','<th>Hizmet Adı</th>'),  
    array('select','firma','','ID,kumasIsmi,numuneIsmi','','<th>Firma</th>'),
    array('selectNesne','bOzellik','','','','<th>Boyama Özelliği(Terbiye)</th>'),
    array('sayi','mamulGr','','','','<th>Mamul Gramaj</th>'),
    array('yok','mamulEn','','','','<th>Mamul En</th>'),
    array('yok','cekmeBoy','','','','<th>Çekme Boy</th>'),
    array('yok','cekmeEn','','','','<th>Çekme En</th>'),
    array('yok','kompozisyon','','','','<th>Kompozisyon</th>'),
    array('yok','orgu','','','','<th>Örgü</th>'),
    array('yok','siklik','','','','<th>Sıklık</th>'),
    array('yok','iplik','','','','<th>İplik</th>'),
    //array('tarih','tarih','','','','<th>Tarih</th>')
    /*/
);
$_NSN=array(


    'departman'=>array(
        'ad'=>'Departman Adı',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Departman Adı')),
    'odemeTipi'=>array(
        'ad'=>'Ödeme Tipi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Ödeme Tipi')),
    'hizmetTipi'=>array(
        'ad'=>'Hizmetler',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Hizmetler')),
    'miktarBirim'=>array(
        'ad'=>' Birim',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Birim')),
    'tedarikci'=>array(
        'ad'=>' Tedarikçi',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Tedarikçi')),
);
$_OZNSN=array( // Tip veya durum kullanımları

   'gelirGiderDurum'=>array(
        'ad'=>'Durum',
        'tip'=>'durum',
        'sutunAdi'=>'durum',
        'alan'=>'sayi1,metin2',
        'alan2'=>array('metin1'=>'Durum')),

    'gelirGiderTip'=>array(
        'ad'=>'Gelir Gider Tipi',
        'tip'=>'tip',
        'sutunAdi'=>'tip',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Gelir Gider')),

    'kdvAnahtar'=>array(
        'ad'=>'Kdv Dahil Mi?',
        'tip'=>'tip',
        'sutunAdi'=>'kdvAnahtar',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Kdv Dahil')),

);

// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tüm Gelir ve Giderler',
    'menu_yeni_ekle'=>'Yeni Kayıt Ekle *',
    'kayit_bulunamadi'=>'Gelir/Gider kaydı bulunamadı!',

    'tekil_isim'=>'Açıklama'
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