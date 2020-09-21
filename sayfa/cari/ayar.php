<?Php
$tbl='cari';
$syf='cari';


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
        'sutunAdi'=>'ad',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Firma Adı</th>',
        'genislik'=>'',
        'filtreGrup'=>'ad'
    ),

    array(
        'tip'=>'nesne',
        'sutunAdi'=>'cariTipi',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Cari Durumu</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDcariTipi'
    ),  
    
    array(
        'tip'=>'nesne',
        'sutunAdi'=>'tedarikciTipi',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Tedarikci Durumu</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDtedarikciTipi'
    ),  

    array(
        'tip'=>'nesne',
        'sutunAdi'=>'musteriTipi',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Müşteri Durumu</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDmusteriTipi'
    ),  


    array(
        'tip'=>'yok',
        'sutunAdi'=>'personel',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Müşteri Temsilci Personel</th>',
        'genislik'=>'',
        'filtreGrup'=>''
    ),  


    array(
        'tip'=>'text',
        'sutunAdi'=>'ozelkod',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Özel Kod</th>',
        'genislik'=>'',
        'filtreGrup'=>'ozelkod'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'tel',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Telefon Numarası</th>',
        'genislik'=>'',
        'filtreGrup'=>'tel'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'faxNo',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Fax Numarası</th>',
        'genislik'=>'',
        'filtreGrup'=>'faxNo'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'araciKurum',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Aracı Kurum</th>',
        'genislik'=>'',
        'filtreGrup'=>'araciKurum'
    ),

    array(
        'tip'=>'nesne',
        'sutunAdi'=>'banka',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Banka</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDbanka'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'bankaBilgileri',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Banka Bilgileri</th>',
        'genislik'=>'',
        'filtreGrup'=>'bankaBilgileri'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'odemeSartlari',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Ödeme Şartları</th>',
        'genislik'=>'',
        'filtreGrup'=>'odemeSartlari'
    ),


    array(
        'tip'=>'text',
        'sutunAdi'=>'adres',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adres</th>',
        'genislik'=>'',
        'filtreGrup'=>'adres'
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
    'cariTipi'=>array(
        'ad'=>'Cari Durumu',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Cari Durumu')),
);

$_NSN2=array(
    'tedarikciTipi'=>array(
        'ad'=>'Tedarikci Durumu',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Tedarikci Durumu')),
);

$_NSN3=array(
    'musteriTipi'=>array(
        'ad'=>'Cari Hesap Türü',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Müşteri Tipi')),
);

$_NSN4=array(
    'banka'=>array(
        'ad'=>'Banka',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Banka')),
);

/*/
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
/*/

// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tedarikci Listesi',
    'menu_yeni_ekle'=>'Tedarikci Ekle *',
    'kayit_bulunamadi'=>'Tedarikci kaydı bulunamadı!',

    'tekil_isim'=>'Tedarikci Kaydı'
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
if($admn||ytk('rehber','ozel1')){
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