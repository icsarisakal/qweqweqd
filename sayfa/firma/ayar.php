<?Php
$tbl='firma';
$syf='firma';


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
        'thIcerigi'=>'<th>Firma Adı</th>',
        'genislik'=>'',
        'filtreGrup'=>'ad'
    ),
     // Departman (nesne)
   /* array(
        'tip'=>'nesne',
        'sutunAdi'=>'departman', // Sütun adı nesne grup adı oldu
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Departman</th>',
        'genislik'=>''
    ),*/
      // Tip (nesneTip)
    array(
        'tip'=>'nesneTip',
        'sutunAdi'=>'firmaTip',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Firma Tip</th>',
        'genislik'=>'',
        'filtreGrup'=>'firmaTip'
    ),
     // Adet (sayi)
    array(
        'tip'=>'sayi',
        'sutunAdi'=>'tel',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Telefon</th>',
        'genislik'=>'',
        'filtreGrup'=>'tel'
    ),
     // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'eposta',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>E-posta</th>',
        'genislik'=>'',
        'filtreGrup'=>'eposta'
    ),
    
      // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'fax',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Fax</th>',
        'genislik'=>'',
        'filtreGrup'=>'fax'
    ),
        // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'vergiD',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Vergi Dairesi</th>',
        'genislik'=>'',
        'filtreGrup'=>'vergiD'
    ),
     // Adet (sayi)
        array(
            'tip'=>'sayi',
            'sutunAdi'=>'vergiNo',
            'deger'=>'',
            'iliskiliSutunAdlari'=>'',
            'sorguDetay'=>'',
            'thIcerigi'=>'<th>Vergi No</th>',
            'genislik'=>'',
            'filtreGrup'=>'vergiNo'
        ),
  
     // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'adresFatura',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adres Fatura</th>',
        'genislik'=>'',
        'filtreGrup'=>'adresFatura'
    ),
   
     // Adı (text)
    array(
        'tip'=>'text',
        'sutunAdi'=>'adresSevk',
        'deger'=>'',
        'iliskiliSutunAdlari'=>'',
        'sorguDetay'=>'',
        'thIcerigi'=>'<th>Adres Sevk</th>',
        'genislik'=>'',
        'filtreGrup'=>'adresSevk'
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




    
);




$_NSN=array(
    'departman'=>array(
        'ad'=>'Departman Adı',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'Departman Adı')),
);
$_OZNSN=array(
/*/
   'durum'=>array(
        'ad'=>'Durum',
        'tip'=>'durum',
        'alan'=>'sayi1,metin2',
        'alan2'=>array('metin1'=>'Durum')),
/*/
    'firmaTip'=>array(
        'ad'=>'Firma Tip',
        'tip'=>'tip',
        'alan'=>'metin1',
        'alan2'=>array('metin1'=>'firmaTip')),
      
);


// Sabit başlık metinleri
$metin=array(
    'menu_baslik'=>'Tüm Firmalar ',
    'menu_yeni_ekle'=>'Yeni Firma Ekle ',
    'kayit_bulunamadi'=>'Firma bulunamadı!',

    'tekil_isim'=>'Firma Adı'
);

$hizliEkleForm=array('kisi');



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