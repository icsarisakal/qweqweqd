<?Php
$tbl='konfeksiyonmaliyetleri';
$syf='konfeksiyonmaliyetleri';


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

    array(
        'tip'=>'nesne',
        'sutunAdi'=>'urunkategorileri', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Ürün Kategorileri</th>',
        'genislik'=>'',
        'filtreGrup'=>'nesne_IDurunkategorileri'
    ),

    array(
        'tip'=>'text',
        'sutunAdi'=>'gtip', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>G.T.İ.P</th>',
        'genislik'=>'',
        'filtreGrup'=>'gtip'
    ),

    array(
        'tip'=>'yok',
        'sutunAdi'=>'urunebatlari', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Ebat / Fiyat</th>',
        'genislik'=>'',
        'filtreGrup'=>''
    ),

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
    

    // Gramaj (sayi)
    // array(
    //     'tip'=>'sayi',
    //     'sutunAdi'=>'fiyat',
    //     'deger'=>'',
    //     'iliskiliSutunAdlari'=>'',
    //     'sorguDetay'=>'',
    //     'thIcerigi'=>'<th>Fiyat</th>',
    //     'genislik'=>''
    // ),

);


$_NSN=array(
    'urunkategorileri'=>array(
        'ad'=>'Ürün Kategorileri',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Kategori Adı')),
);

$_NSN2=array(
    'urunebatlari'=>array(
        'ad'=>'Ürün Ebatları',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Ürün Ebatı')),
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
    'menu_baslik'=>'Kişi Listesi',
    'menu_yeni_ekle'=>'Kişi Ekle *',
    'kayit_bulunamadi'=>'Rehber kaydı bulunamadı!',

    'tekil_isim'=>'Rehber Kaydı'
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