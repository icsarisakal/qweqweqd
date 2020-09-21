<?Php $surum='kyt2020'; 
require('zcon.php');
require('fonk.php');
$kturl='ekle';
$dene23123='123123';
if(z(8,'kategori')){
	$ktid=z(8,'kategori');
	$kturl='ekle&kategori='.$ktid;
}
$tanimlamalar_array=array("kumaskarti","iplik","boyabaski","renkkarti","kumasturu","cari","makinacesitleri","makinaparkuru","yedekparca","aksesuarkarti","konfeksiyonmaliyetleri");
$araclar_array=array("nesne","personel","log","pamuk","kur");
$satispazarlama_array=array("fiyatcalismasi");
$satinalma_array=array("satinalma");
$mymenu_array=array("asd");
$orderyonetimi_array=array("dsadsda");
$maktanimlamalar_array=array("makinacesitleri","makinaparkuru","yedekparca","kumasturu");
$bos_array=array("bos");


//FAVORİ ARRAY SAKIN BU ARRAYİ GEREKMEDİKÇE EKLEME SİLME DÜZENLEME YAPMAYINIZ 
//DİKKAT EKLEME YAPARKEN LÜTFEN ARRAY LİSTESİNİN EN SONUNA YAPINIZ AKSİ TAKDİRDE TÜM FAVORİ SİSTEM ÇÖKECEKTİR...
$_Favori=array(
	array(
		'ID' => '-1',
		'ad' => 'Ayar',
		'get' => '',
		'get2' => 'mymenu',
		'icon' => 'icon-design',
		'url' => '?s=mymenu&a=listele',
		'getA' => 'listele'
	
		),
	array(
	'ID' => '1',
	'ad' => 'Fiyat Teklifleri',
	'get' => 'fiyatcalismasi',
	'get2' => 'fiyatcalismasi',
	'icon' => 'icon-design',
	'url' => '?s=fiyatcalismasi&a=listele',
	'getA' => 'listele'

	),
	array(
	'ID' => '2',
	'ad' => 'Fiyat Teklifleri Ekle',
	'get' => 'fiyatcalismasi',
	'get2' => 'fiyatcalismasi',
	'icon' => 'icon-design',
	'url' => '?s=fiyatcalismasi&a=ekle',
	'getA' => 'ekle'

	),
	array(
		'ID' => '3',
	'ad' => 'Fiyat Teklifleri Arşivlenmiş',
	'get' => 'fiyatcalismasi',
	'get2' => 'fiyatcalismasi',
	'icon' => 'icon-design',
	'url' => '?s=fiyatcalismasi&a=arsv1',
	'getA' => 'arsiv'

	),
	array(
		'ID' => '4',
	'ad'=>'Müşteri Portföyü',
	'get'=>'',
	'get2' => 'cari',
	'icon'=>'icon-reading',
	'url'=>'?s=cari&a=listele&musteri=208',
	'getA' => 'listele'

	),
	array(
		'ID' => '5',
		'ad'=>'Potansiyel Müşteriler',
		'get'=>'',
		'get2' => 'cari',
		'icon'=>'icon-book',
		'url'=>'?s=cari&a=listele&musteri=209',
		'getA' => 'listele'
	),
	array(
		'ID' => '6',
		'ad'=>'Müşteri Konumları(Harita)',
		'get'=>'',
		'get2' => 'cari',
		'icon'=>'icon-feed',
		'url'=>'?s=cari&a=listele',
		'getA' => 'listele',
	),
	array(
		'ID' => '7',
		'ad'=>'Satış Siparişleri(Aktif Değil)',
		'get'=>'',
		'get2' => 'siparis',
		'icon'=>'icon-stamp',
		'url'=>'?s=anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '8',
		'ad'=>'GB Listesi',
		'get'=>'gb',
		'get2' => 'gb',
		'icon'=>'icon-ampersand',
		'url'=>'?s=gb&a=listele',
		'getA' => 'listele',
	),
	array(
		'ID' => '9',
		'ad'=>'Sipariş Listele',
		'icon'=>'icon-circles2',
		'get'=>'',
		'get2' => 'siparis',
		'url'=>'?s=siparis&a=listele',
		'getA' => 'listele',
	),
	array(
		'ID' => '10',
		'ad'=>'Mevcut Siparişler',
		'icon'=>'icon-vector',
		'url'=>'?s=siparis&a=listele',
		'get'=>'',
		'get2' => 'siparis',
		'getA' => 'listele',
	),
	array(
		'ID' => '11',
		'ad'=>'Yüklenen Siparişler',
		'icon'=>'icon-circles2',
		'url'=>'?s=siparis&a=listele',
		'get'=>'',
		'get2' => 'siparis',
		'getA' => 'listele',
	),
	array(
		'ID' => '12',
		'ad'=>'Hareketler',
		'icon'=>'icon-circles2',
		'get'=>'hareketler',
		'url'=>'?s=fiyatcalismasi&a=listele',
		'get'=>'',
		'get2' => 'fiyatcalismasi',
		'getA' => 'listele',
	),
	array(
		'ID' => '13',
		'ad'=>'Order Girişi',
		'icon'=>'icon-media',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '14',
		'ad'=>'Tedarik İşlemleri',
		'icon'=>'icon-books',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '15',
		'ad'=>'İplik Tedarik',
		'icon'=>'icon-bookmark',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '16',
		'ad'=>'Kumaş Tedarik',
		'icon'=>'icon-speakers',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '17',
		'ad'=>'Aksesuar Tedarik',
		'icon'=>'icon-presentation',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '18',
		'ad'=>'İplik Planlama',
		'icon'=>'icon-dots',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '19',
		'ad'=>'Kumaş Planlama',
		'icon'=>'icon-unfold',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '20',
		'ad'=>'Aksesuar Planlama',
		'icon'=>'icon-versions',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '21',
		'ad'=>'Kesim İşlemleri',
		'icon'=>'icon-sync',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '22',
		'ad'=>'Kesim Kartı',
		'icon'=>'icon-person',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '23',
		'ad'=>'Order Üretim Girişleri',
		'icon'=>'icon-graph',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '24',
		'ad'=>'Order Üretim Girişleri Girişler',
		'icon'=>'icon-law',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	
	),
	array(
		'ID' => '25',
		'ad'=>'Fason Hareket Fişleri',
		'icon'=>'icon-diff',
		'url'=>'?s=anasayfa&a=listele',
		'get'=>'',
		'get2' => 'anasayfa',
		'getA' => 'listele',
	),
	array(
		'ID' => '26',
		'ad'=>'Model Kartları',
		'get'=>'modelkartlari',
		'icon'=>'icon-design',
		'url'=>'?s=modelkartlari&a=listele',
		'get'=>'',
		'get2' => 'modelkartlari',
		'getA' => 'listele',
	),
	array(
		'ID' => '27',
		'ad'=>'Kumaş Kartları',
		'get'=>'kumaskarti',
		'icon'=>'icon-dropbox',
		'url'=>'?s=kumaskarti&a=listele',
		'grup'=>'tanimlamalar',
		'get'=>'',
		'get2' => 'kumaskarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '28',
		'ad'=>'Kumaş Kartı Üretim',
		'icon'=>'icon-puzzle',
		'url'=>'?s=kumaskarti&a=ekle',
		'get'=>'',
		'get2' => 'kumaskarti',
		'getA' => 'ekle',
	),
	array(
		'ID' => '29',
		'ad'=>'Kumaş Kartı Tedarik',
		'icon'=>'icon-share2',
		'url'=>'?s=kumaskarti&a=ekletedarik',
		'get'=>'',
		'get2' => 'kumaskarti',
		'getA' => 'ekle',
	),
	array(
		'ID' => '30',
		'ad'=>'Kumaş Kartı Kombine',
		'icon'=>'icon-strategy',
		'url'=>'?s=kumaskarti&a=eklekombinasyon',
		'get'=>'',
		'get2' => 'kumaskarti',
		'getA' => 'ekle',
	),
	array(
		'ID' => '31',
		'ad'=>'Kumaş Kartı Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=kumaskarti&a=listele_arsv1',
		'get'=>'',
		'get2' => 'kumaskarti',
		'getA' => 'listele',
		
	),
	array(
		'ID' => '32',
		'ad'=>'İplik Kartları',
		'get'=>'iplik',
		'icon'=>'icon-quill4',
		'url'=>'?s=iplik&a=listele',
		'get2' => 'iplik',
		'getA' => 'listele',
	),
	array(
		'ID' => '33',
		'ad'=>'İplik Kartı Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=iplik&a=listele',
		'get'=>'',
		'get2' => 'iplik',
		'getA' => 'listele',
	),
	array(
		'ID' => '34',
		'ad'=>'İplik Kartı Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=iplik&a=ekle',
		'get'=>'',
		'get2' => 'iplik',
		'getA' => 'ekle',
	),
	array(
		'ID' => '35',
		'ad'=>'İplik Kartı Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=iplik&a=listele_arsv1',
		'get'=>'',
		'get2' => 'iplik',
		'getA' => 'listele',
	),
	array(
		'ID' => '36',
		'ad'=>'Kumaş Terbiye İşlemleri',
		'get'=>'boyabaski',
		'icon'=>'icon-spray',
		'url'=>'?s=boyabaski&a=listele',
		'get2' => 'boyabaski',
		'getA' => 'listele',
	),
	array(
		'ID' => '37',
		'ad'=>'Kumaş Terbiye İşlemleri Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=boyabaski&a=listele',
		'get'=>'',
		'get2' => 'boyabaski',
		'getA' => 'listele',
	),
	array(
		'ID' => '38',
		'ad'=>'Kumaş Terbiye İşlemleri Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=boyabaski&a=ekle',
		'get'=>'',
		'get2' => 'boyabaski',
		'getA' => 'ekle',
	),
	array(
		'ID' => '39',
		'ad'=>'Kumaş Terbiye İşlemleri Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=boyabaski&a=listele_arsv1',
		'get'=>'',
		'get2' => 'boyabaski',
		'getA' => 'listele',
	),
	array(
		'ID' => '40',
		'ad'=>'Renk Kartları',
		'get'=>'renkkarti',
		'icon'=>'icon-color-sampler',
		'url'=>'?s=renkkarti&a=listele',
		'get2' => 'renkkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '41',
		'ad'=>'Renk Kartları Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=renkkarti&a=listele',
		'get'=>'',
		'get2' => 'renkkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '42',
		'ad'=>'Renk Kartları Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=renkkarti&a=ekle',
		'get'=>'',
		'get2' => 'renkkarti',
		'getA' => 'ekle',
	),
	array(
		'ID' => '43',
		'ad'=>'Renk Kartları Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=renkkarti&a=listele_arsv1',
		'get'=>'',
		'get2' => 'renkkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '44',
		'ad'=>'Aksesuar Kartları',
		'get'=>'aksesuarkarti',
		'icon'=>'icon-unlink2',
		'url'=>'?s=aksesuarkarti&a=listele',
		'get2' => 'aksesuarkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '45',
		'ad'=>'Aksesuar Kartları Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=aksesuarkarti&a=listele',
		'get'=>'',
		'get2' => 'aksesuarkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '46',
		'ad'=>'Aksesuar Kartları Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=aksesuarkarti&a=ekle',
		'get'=>'',
		'get2' => 'aksesuarkarti',
		'getA' => 'ekle',
	),
	array(
		'ID' => '47',
		'ad'=>'Aksesuar Kartları Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=aksesuarkarti&a=listele_arsv1',
		'get'=>'',
		'get2' => 'aksesuarkarti',
		'getA' => 'listele',
	),
	array(
		'ID' => '48',
		'ad'=>'Cari Hesap Kartları Liste',
		'get'=>'cari',
		'icon'=>'icon-user',
		'url'=>'?s=cari&a=listele',
		'get2' => 'cari',
		'getA' => 'listele',
	),
	array(
		'ID' => '49',
		'ad'=>'Cari Hesap Kartları Tedarikci',
		'icon'=>'icon-collaboration',
		'url'=>'?s=cari&a=ekle&tedarikci=1',
		'get'=>'',
		'get2' => 'cari',
		'getA' => 'ekle',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '50',
		'ad'=>'Cari Hesap Kartları Mevcut Müşteri',
		'icon'=>'icon-user-check',
		'url'=>'?s=cari&a=ekle&mevcut=42',
		'get'=>'',
		'get2' => 'cari',
		'getA' => 'ekle',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '51',
		'ad'=>'Cari Hesap Kartları Potansiyel Müşteri',
		'icon'=>'icon-user-plus',
		'url'=>'?s=cari&a=ekle&potansiyel=43',
		'get'=>'',
		'get2' => 'cari',
		'getA' => 'ekle',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '52',
		'ad'=>'Cari Hesap Kartları Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=cari&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'cari',
	),
	array(
		'ID' => '53',
		'ad'=>'Makina Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=makinacesitleri&a=listele',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'makinacesitleri',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '54',
		'ad'=>'Makina Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=makinacesitleri&a=ekle',
		'get'=>'',
		'get2' => 'makinacesitleri',
		'getA' => 'ekle',	
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '55',
		'ad'=>'Makina Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=makinacesitleri&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'makinacesitleri',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '56',
		'ad'=>'Makina Parkuru Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=makinaparkuru&a=listele',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'makinaparkuru',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '57',
		'ad'=>'Makina Parkuru Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=makinaparkuru&a=ekle',
		'get'=>'',
		'getA' => 'ekle',
		'get2' => 'makinaparkuru',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '58',
		'ad'=>'Makina Parkuru Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=makinaparkuru&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'makinaparkuru',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '59',
		'ad'=>'Yedek Parça Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=yedekparca&a=listele',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'yedekparca',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '60',
		'ad'=>'Yedek Parça Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=yedekparca&a=ekle',
		'get'=>'',
		'getA' => 'ekle',
		'get2' => 'yedekparca',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '61',
		'ad'=>'Yedek Parça Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=yedekparca&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'yedekparca',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '62',
		'ad'=>'Kumaş Türü Liste',
		'icon'=>'icon-eye',
		'url'=>'?s=kumasturu&a=listele',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'kumasturu',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '63',
		'ad'=>'Kumaş Türü Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=kumasturu&a=ekle',
		'get'=>'',
		'getA' => 'ekle',
		'get2' => 'kumasturu',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '64',
		'ad'=>'Kumaş Türü Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=kumasturu&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'kumasturu',
		'yanAltMenu2'=>array(),
	),
	array(
		'ID' => '65',
		'ad'=>'İplik Siparişleri',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'siparis',
		'icon'=>'icon-pie5',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '66',
		'ad'=>'Kumaş Siparişleri',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'siparis',
		'icon'=>'icon-droplets',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '67',
		'ad'=>'Aksesuar Siparişleri',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'siparis',
		'icon'=>'icon-comments',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '68',
		'ad'=>'Einel Liste',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'einel',
		'icon'=>'icon-eye',
		'A'=>'listele',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '69',
		'ad'=>'Einel Ekle',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'einel',
		'icon'=>'icon-cart-add',
		'A'=>'ekle',
		'get2' => 'deneme',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '70',
		'ad'=>'Einel Arşivlenmişler',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'einel',
		'icon'=>'icon-archive',
		'A'=>'listele_arsv1',
		'url'=>'?s=anasayfa',
	),
	array(
		'ID' => '71',
		'ad'=>'Ekranı Yazdır',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'yazdir',
		'icon'=>'icon-printer',
		'url'=>'javascript:print()',
	),
	array(
		'ID' => '72',
		'gizle'=>!z('lgn','admin')&&!ytk('nesne','listele'),
		'get'=>'nesne',
		'get2' => 'nesne',
		'getA' => 'listele',
		'ad'=>'Nesneleri Yönet',
		'icon'=>'icon-drag-left',
		'url'=>'?s=nesne',
	),
	array(
		'ID' => '73',
		'ad'=>'Personel Liste',
		'get'=>'personel',
		'getA' => 'listele',
		'get2' => 'personel',
		'icon'=>'icon-vcard',
		'url'=>'?s=personel&a=listele',
	),
	array(
		'ID' => '74',
		'ad'=>'Personel Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=personel&a=ekle',
		'get'=>'',
		'getA' => 'ekle',
		'get2' => 'personel',
	),
	array(
		'ID' => '75',
		'ad'=>'Personel Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=personel&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'personel',
	),

	array(
		'ID' => '76',
		'ad'=>'Konfeksiyon Liste',
		'get'=>'Konfeksiyon',
		'getA' => 'listele',
		'get2' => 'konfeksiyonmaliyetleri',
		'icon'=>'icon-vcard',
		'url'=>'?s=konfeksiyonmaliyetleri&a=listele',
	),
	array(
		'ID' => '77',
		'ad'=>'Konfeksiyon Ekle',
		'icon'=>'icon-cart-add',
		'url'=>'?s=konfeksiyonmaliyetleri&a=ekle',
		'get'=>'',
		'getA' => 'ekle',
		'get2' => 'konfeksiyonmaliyetleri',
	),
	array(
		'ID' => '78',
		'ad'=>'Konfeksiyon Arşivlenmişler',
		'icon'=>'icon-archive',
		'url'=>'?s=konfeksiyonmaliyetleri&a=listele_arsv1',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'konfeksiyonmaliyetleri',
	),
	array(
		'ID' => '79',
		'gizle'=>!z('lgn','admin'),
		'ad'=>'Log Kayıtları',
		'get'=>'log',
		'getA' => 'listele',
		'get2' => 'log',
		'icon'=>'icon-file-eye',
		'url'=>'?s=log&a=listele',
	),
	array(
		'ID' => '80',
		'gizle'=>!z('lgn','admin'),
		'ad'=>'Pamuk Kayıtları',
		'get'=>'pamuk',
		'getA' => 'listele',
		'get2' => 'pamuk',
		'icon'=>'icon-percent',
		'url'=>'?s=pamuk&a=listele',
	),
	array(
		'ID' => '81',
		'gizle'=>!z('lgn','admin'),
		'ad'=>'Kur Kayıtları',
		'get'=>'kur',
		'get2' => 'kur',
		'getA' => 'listele',
		'icon'=>'icon-cash',
		'url'=>'?s=kur&a=listele',
	),
	array(
		'ID' => '82',
		'ad'=>'Numune Modülü',
		'icon'=>'icon-archive',
		'url'=>'?s=numune&a=listele',
		'get'=>'',
		'getA' => 'listele',
		'get2' => 'numune',
	)
	
);

//mymenu altına listeme için fonksiyonlar


$myliste= z(1,'WHERE personel_ID='.z('lgn','ID'),'mymenuListe','mymenu');
//$mymenukontrolet= z(1,'WHERE personel_ID='.z('lgn','ID'),'','mymenu');
//print_r($mymenukontrolet);
//yenikayit($mymenukontrolet);

$myliste=explode(',',$myliste[0]);
$newlist=array();
foreach ($_Favori as $key => $value) {

	foreach ($myliste as $k => $v) {

		if($value['ID']==$v){

			//print_r($value);
			array_push($newlist,$value);
		


		 }



	}


}





// function yenikayit($innn){

//     if($innn==null){z(2,['personel_ID'=>z('lgn','ID')],'mymenu');}else {}


// }

//return $newlist;
//__($newlist);




$ayr=array( 
	
	// Genel Ayarlar
	'firmaAd'=>'KAYTEKS ERP',
	'firmaUzunAd'=>'KAYTEKS ERP',
	'siteAd'=>'KAYTEKS ERP',
	'mamulDepoAd'=>' DEPO',
	'hamDepoAd'=>' DEPO',
	'siteUrl'=>'https://kayteks.demo.netadim.com/',
	'siteEposta'=>'info@kayteks.demo.netadim.com/',
	'siteDomain'=>'kayteks.demo.netadim.com/',
	'destekA'=>0,
	'logA'=>1,
	'anaS'=>'anasayfa',
	
	'antetA'=>1,
	'printListeSatir'=>16,
	'printTdPunto'=>10,
	'printThPunto'=>10,
	
	// Giriş Güvenliği Ayarları
	'sifreKarakterAdet'=>'8', // Minimum 12 karakter
	
    'sifreMaskesi'=>'',//'/^(?=(?:.*?[A-Z]){1})(?=(?:.*?[a-z]){1})(?=(?:.*?[0-9]){1})[A-Za-z0-9#,.\-_ĞğÜüŞşİıÖöÇç]{1,}$/x', // Büyük, küçük harf ve numara zorunluluğu
                //en az(1 Adet Büyük Harf)(1 Adet Küçük Harf)(  1 Adet Numara  )[Kullanılabilir karakterler ]
	'hataliGirisAdet'=>'5', // 5 yanlış şifre denemesinde üyeliği bloke et
	
	'sifreGuncellemeSuresi'=>'1 month', // Ayda bir şifre güncellemeyi zorunlu kıl
	
	'genelListeSatirC'=>array(5,10,30,50,100,300,500,1000,0),
	'genelListeSatirA'=>30,

	'bulutfonSmsTest'=>1,
	'onesignalTest'=>1,
	'epostaTest'=>1,

	'mobix'=>array(
		
		'mtn'=>array( '',
			'İş','iş','İŞ', 
			'İşin','işin','İŞİN',
			'İşler','işler','İŞLER',
			'İşleriniz','işleriniz','İŞLERİNİZ',
			'İşiniz','işiniz','İŞİNİZ',
		)
	),

	'menu'=>array(

		'mymenu'=>array(
			'tiklanamaz'=>1,
			'ad'=>'My Menü',
			'icon'=>'icon-chess-queen',
			'style'=>'',
			'grup'=>$mymenu_array,
			'altMenu'=>$newlist,//buraya veri tabanından cektigimiz favori menüleri atıyoruz
		),

		'satispazarlama'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Satış Pazarlama',
			'icon'=>'icon-profile',
			'grup'=>$satispazarlama_array,
			'altMenu'=>array(
				array(
					'ad'=>'Fiyat Teklifleri',
					'get'=>'fiyatcalismasi',
					'icon'=>'icon-design',
					'url'=>'?s=fiyatcalismasi&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Teklifler',
							'icon'=>'icon-eye',
							'url'=>'?s=fiyatcalismasi&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=fiyatcalismasi&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=fiyatcalismasi&a=listele_arsv1',
						)
					)
				),
					
				array(
					'ad'=>'Müşteri Portföyü',
					'get'=>'',
					'icon'=>'icon-reading',
					'url'=>'?s=cari&a=listele&musteri=208',
				),
				array(
					'ad'=>'Potansiyel Müşteriler',
					'get'=>'',
					'icon'=>'icon-book',
					'url'=>'?s=cari&a=listele&musteri=209',
				),
				array(
					'ad'=>'Müşteri Konumları(Harita)',
					'get'=>'',
					'icon'=>'icon-feed',
					'url'=>'?s=cari&a=map-list',
				),
				array(
					'ad'=>'Satış Siparişleri(Aktif Değil)',
					'get'=>'',
					'icon'=>'icon-stamp',
					'url'=>'?s=anasayfa',
				),
				array(
					'ad'=>'GB Listesi',
					'get'=>'gb',
					'icon'=>'icon-ampersand',
					'url'=>'?s=gb&a=listele',
				),
			),
		),

		'orderyonetimi'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Genel Planlama(Pasif)',
			'icon'=>'icon-droplet',
			'grup'=>$orderyonetimi_array,
			'style'=>'background:red;',
			'altMenu'=>array(
				array(
					'ad'=>'Sipariş',
					'get'=>'siparis',
					'icon'=>'icon-design',
					'url'=>'?s=siparis&a=listele',
					'grup'=>'siparis',
					'yanMenu'=>array(
						array(
							'ad'=>'Siparişler',
							'icon'=>'icon-circles2',
							'url'=>'?s=siparis&a=listele',
						),
						array(
							'ad'=>'Mevcut Siparişler',
							'icon'=>'icon-vector',
							'url'=>'?s=siparis&a=listele',
						),
						array(
							'ad'=>'Yüklenen Siparişler',
							'icon'=>'icon-circles2',
							'url'=>'?s=siparis&a=listele',
						)
					)
				),
				array(
					'ad'=>'Hareketler',
					'get'=>'hareketler',
					'icon'=>'icon-design',
					'url'=>'?s=fiyatcalismasi&a=listele',
					'grup'=>'hareketler',
					'yanMenu'=>array(
						array(
							'ad'=>'Order Girişi',
							'icon'=>'icon-media',
							'url'=>'?s=anasayfa&a=listele',
						),
						array(
							'ad'=>'Tedarik İşlemleri',
							'icon'=>'icon-books',
							'url'=>'?s=anasayfa&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'İplik Tedarik',
									'icon'=>'icon-bookmark',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Kumaş Tedarik',
									'icon'=>'icon-speakers',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Aksesuar Tedarik',
									'icon'=>'icon-presentation',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'İplik Planlama',
									'icon'=>'icon-dots',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Kumaş Planlama',
									'icon'=>'icon-unfold',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Aksesuar Planlama',
									'icon'=>'icon-versions',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
							),
						),
						array(
							'ad'=>'Kesim İşlemleri',
							'icon'=>'icon-sync',
							'url'=>'?s=anasayfa&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Kesim Kartı',
									'icon'=>'icon-person',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
							),
						),
						array(
							'ad'=>'Order Üretim Girişleri',
							'icon'=>'icon-graph',
							'url'=>'?s=anasayfa&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Girişler',
									'icon'=>'icon-law',
									'url'=>'?s=anasayfa&a=listele',
									'yanAltMenu2'=>array(),
								),
							),
						),
						array(
							'ad'=>'Fason Hareket Fişleri',
							'icon'=>'icon-diff',
							'url'=>'?s=anasayfa&a=listele',
						),
					)
				),
			),
		),

		'tanimlamalar'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Genel Tanımlamalar',
			'icon'=>'icon-chip',
			'grup'=>$tanimlamalar_array,
			'altMenu'=>array(
				array(
					'ad'=>'Model Kartları',
					'get'=>'modelkartlari',
					'icon'=>'icon-design',
					'url'=>'?s=modelkartlari&a=listele',
					'grup'=>'modelkartlari',
					'yanMenu'=>array()
				),
				array(
					'ad'=>'Kumaş Kartları',
					'get'=>'kumaskarti',
					'icon'=>'icon-dropbox',
					'url'=>'?s=kumaskarti&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=kumaskarti&a=listele',
						),
						array(
							'ad'=>'Yeni Kumaş Kartı Ekle',
							'icon'=>'icon-ungroup',
							'url'=>'?s=kumaskarti&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Üretim',
									'icon'=>'icon-puzzle',
									'url'=>'?s=kumaskarti&a=ekle',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Tedarik',
									'icon'=>'icon-share2',
									'url'=>'?s=kumaskarti&a=ekletedarik',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Kombine',
									'icon'=>'icon-strategy',
									'url'=>'?s=kumaskarti&a=eklekombinasyon',
									'yanAltMenu2'=>array(),
								),
							),
						),
						
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=kumaskarti&a=listele_arsv1',
						)
					)
				),
				array(
					'ad'=>'İplik Kartları',
					'get'=>'iplik',
					'icon'=>'icon-quill4',
					'url'=>'?s=iplik&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=iplik&a=listele',
						),
						array(
							'ad'=>'Hızlı Düzenle',
							'icon'=>'icon-eye2',
							'url'=>'?s=iplik&a=listele_duzenle',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=iplik&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=iplik&a=listele_arsv1',
						)
					)
				),
				array(
					'ad'=>'Kumaş Terbiye İşlemleri',
					'get'=>'boyabaski',
					'icon'=>'icon-spray',
					'url'=>'?s=boyabaski&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=boyabaski&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=boyabaski&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=boyabaski&a=listele_arsv1',
						)
					)
				),
				array(
					'ad'=>'Renk Kartları',
					'get'=>'renkkarti',
					'icon'=>'icon-color-sampler',
					'url'=>'?s=renkkarti&a=listele',
					'style'=>'',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=renkkarti&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=renkkarti&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=renkkarti&a=listele_arsv1',
						)
					)
				),
				array(
					'ad'=>'Aksesuar Kartları',
					'get'=>'aksesuarkarti',
					'icon'=>'icon-unlink2',
					'url'=>'?s=aksesuarkarti&a=listele',
					'style'=>'',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=aksesuarkarti&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=aksesuarkarti&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=aksesuarkarti&a=listele_arsv1',
						)
					)
				),
				/*array(
					'ad'=>'Kumaş Türü',
					'get'=>'kumasturu',
					'icon'=>'icon-price-tags',
					'url'=>'?s=kumasturu&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=kumasturu&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=kumasturu&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=kumasturu&a=listele_arsv1',
						)
					)
				),*/
				array(
					'ad'=>'Cari Hesap Kartları',
					'get'=>'cari',
					'icon'=>'icon-user',
					'url'=>'?s=cari&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=cari&a=listele',
						),
						array(
							'ad'=>'Yeni Cari Kartı Ekle',
							'icon'=>'icon-ungroup',
							'url'=>'?s=cari&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Tedarikci',
									'icon'=>'icon-collaboration',
									'url'=>'?s=cari&a=ekle&tedarikci=1',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Mevcut Müşteri',
									'icon'=>'icon-user-check',
									'url'=>'?s=cari&a=ekle&mevcut=42',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Potansiyel Müşteri',
									'icon'=>'icon-user-plus',
									'url'=>'?s=cari&a=ekle&potansiyel=43',
									'yanAltMenu2'=>array(),
								),
							),
						),
							array(
							'ad'=>'Müşteri Konumları',
							'icon'=>'icon-eye',
							'url'=>'?s=cari&a=map-list',
						),

						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=cari&a=listele_arsv1',
						)
					)
				),
				
				array(
					'ad'=>'Makine Tanımlamaları',
					'get'=>'makinacesitleri',
					'icon'=>'icon-equalizer2',
					'url'=>'?s=makinacesitleri&a=listele',
					'grup'=>$maktanimlamalar_array,
					'yanMenu'=>array(
						array(
							'ad'=>'Makine İşlevi',
							'icon'=>'icon-cogs',
							'get'=>'makinacesitleri',
							'url'=>'?s=makinecesitleri&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Liste',
									'icon'=>'icon-eye',
									'url'=>'?s=makinacesitleri&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Ekle',
									'icon'=>'icon-cart-add',
									'url'=>'?s=makinacesitleri&a=ekle',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Arşivlenmişler',
									'icon'=>'icon-archive',
									'url'=>'?s=makinacesitleri&a=listele_arsv1',
									'yanAltMenu2'=>array(),
								)
							),
						),
						array(
							'ad'=>'Makine Parkuru',
							'icon'=>'icon-air',
							'get'=>'makinaparkuru',
							'url'=>'?s=makinaparkuru&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Liste',
									'icon'=>'icon-eye',
									'url'=>'?s=makinaparkuru&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Ekle',
									'icon'=>'icon-cart-add',
									'url'=>'?s=makinaparkuru&a=ekle',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Arşivlenmişler',
									'icon'=>'icon-archive',
									'url'=>'?s=makinaparkuru&a=listele_arsv1',
									'yanAltMenu2'=>array(),
								)
							),
						),
						array(
							'ad'=>'Yedek Parça',
							'icon'=>'icon-hammer-wrench',
							'get'=>'yedekparca',
							'url'=>'?s=yedekparca&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Liste',
									'icon'=>'icon-eye',
									'url'=>'?s=yedekparca&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Ekle',
									'icon'=>'icon-cart-add',
									'url'=>'?s=yedekparca&a=ekle',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Arşivlenmişler',
									'icon'=>'icon-archive',
									'url'=>'?s=yedekparca&a=listele_arsv1',
									'yanAltMenu2'=>array(),
								)
							),
						),
						array(
							'ad'=>'Kumaş Türü',
							'icon'=>'icon-hammer-wrench',
							'get'=>'kumasturu',
							'url'=>'?s=kumasturu&a=listele',
							'yanAltMenu'=>array(
								array(
									'ad'=>'Liste',
									'icon'=>'icon-eye',
									'url'=>'?s=kumasturu&a=listele',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Ekle',
									'icon'=>'icon-cart-add',
									'url'=>'?s=kumasturu&a=ekle',
									'yanAltMenu2'=>array(),
								),
								array(
									'ad'=>'Arşivlenmişler',
									'icon'=>'icon-archive',
									'url'=>'?s=kumasturu&a=listele_arsv1',
									'yanAltMenu2'=>array(),
								)
							),
						),
					)
				),
				/*array(
					'ad'=>'Makine İşlevi',
					'get'=>'makinacesitleri',
					'icon'=>'icon-equalizer2',
					'url'=>'?s=makinacesitleri&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=makinacesitleri&a=ekle',
						),
						array(
							'ad'=>'Görüntüle',
							'icon'=>'icon-eye',
							'url'=>'?s=makinacesitleri&a=listele',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=makinacesitleri&a=listele_arsv1',
						)
					)
				),*/
				/*array(
					'ad'=>'Makine Parkuru',
					'get'=>'makinaparkuru',
					'icon'=>'icon-cogs',
					'url'=>'?s=makinaparkuru&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=makinaparkuru&a=ekle',
						),
						array(
							'ad'=>'Görüntüle',
							'icon'=>'icon-eye',
							'url'=>'?s=makinaparkuru&a=listele',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=makinaparkuru&a=listele_arsv1',
						)
					)
				),*/
				array(
					'ad'=>'Ürün Grupları ve Maliyetleri',
					'get'=>'konfeksiyonmaliyetleri',
					'icon'=>'icon-hammer-wrench',
					'url'=>'?s=konfeksiyonmaliyetleri&a=listele',
					'grup'=>'tanimlamalar',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=konfeksiyonmaliyetleri&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=konfeksiyonmaliyetleri&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=konfeksiyonmaliyetleri&a=listele_arsv1',
						)
					)
				),
				


			),
		),
		'satinalma'=>array(
			'ad'=>'Satın Alma',
			'icon'=>'icon-statistics',
			'grup'=>$satinalma_array,
			'style'=>'',
			'altMenu'=>array(
				array(
					'ad'=>'Liste',
					'icon'=>'icon-eye',
					'get'=>'',
					'url'=>'?s=satinalma&a=listele',
				),

					array(
						'ad'=>'İplik Siparişi Ekle',
						'icon'=>'icon-pie5',
						'get'=>'',
						'url'=>'?s=satinalma&a=ekle&kod=264',
						'yanAltMenu2'=>array(),
					),
					array(
						'ad'=>'Kumaş Siparişi Ekle',
						'icon'=>'icon-droplets',
						'get'=>'',
						'url'=>'?s=satinalma&a=ekle&kod=265',
						'yanAltMenu2'=>array(),
					),
					array(
						'ad'=>'Aksesuar Siparişi Ekle',
						'icon'=>'icon-comments',
						'get'=>'',
						'url'=>'?s=satinalma&a=ekle&kod=266',
						'yanAltMenu2'=>array(),
					),
				
				array(
					'ad'=>'Arşivlenmişler',
					'icon'=>'icon-archive',
					'get'=>'',
					'url'=>'?s=satinalma&a=listele_arsv1',
				)
			),
		),

		/*
		'urun'=>array(
			'ad'=>'E-Satış',
			'icon'=>'icon-trophy4',
			'aciklama'=>'Sistemi kullanabilen personelin, e-satış girişini yönetmesini sağlar.',
			'grup'=>array(),
			'altMenu'=>array(
				array(
					'ad'=>'Ekle',
					'get'=>'',
					'icon'=>'icon-cart-add',
					'A'=>'ekle'
				),
				array(
					'ad'=>'Görüntüle',
					'get'=>'',
					'icon'=>'icon-eye',
					'A'=>'listele'
				),
				array(
					'ad'=>'Arşivlenmişler',
					'get'=>'',
					'icon'=>'icon-archive',
					'A'=>'listele_arsv1'
				)
			) 
		),
		*/
		'finans'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Finans Yönetimi(Pasif)',
			'icon'=>'icon-coins',
			'style'=>'background:red;',
			'grup'=>$bos_array,
			'altMenu'=>array(
			),
		),

		'genelmuhasebe'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Genel Muhasebe(Pasif)',
			'icon'=>'icon-info22',
			'style'=>'background:red;',
			'grup'=>$bos_array,
			'altMenu'=>array(
			),
		),

		'einel'=>array(
			'ad'=>'Varietex GMBH',
			'icon'=>'icon-shutter',
			'aciklama'=>'Sistemi kullanabilen personelin, einel girişini yönetmesini sağlar.',
			'grup'=>$bos_array,
			'altMenu'=>array(
				array(
					'ad'=>'Liste',
					'get'=>'',
					'icon'=>'icon-eye',
					'A'=>'listele'
				),
				array(
					'ad'=>'Ekle',
					'get'=>'',
					'icon'=>'icon-cart-add',
					'A'=>'ekle'
				),
				array(
					'ad'=>'Arşivlenmişler',
					'get'=>'',
					'icon'=>'icon-archive',
					'A'=>'listele_arsv1'
				)
			) 
		),
		'numune'=>array(
			'ad'=>'Numune Modülü',
			'icon'=>'icon-shutter',
			'aciklama'=>'Demosu hazırlanıyor',
			'grup'=>$bos_array,
			'altMenu'=>array(
				array(
					'ad'=>'Liste',
					'get'=>'',
					'icon'=>'icon-eye',
					'A'=>'listele'
				),
				array(
					'ad'=>'Ekle',
					'get'=>'',
					'icon'=>'icon-cart-add',
					'A'=>'ekle'
				),
				array(
					'ad'=>'Arşivlenmişler',
					'get'=>'',
					'icon'=>'icon-archive',
					'A'=>'listele_arsv1'
				)
			) 
		),

		'yonetim'=>array(
			'tiklanamaz'=>1,
			'ad'=>'Araçlar',
			'icon'=>'icon-profile',
			'grup'=>$araclar_array,
			'altMenu'=>array(
				array(
					'ad'=>'Ekranı Yazdır',
					'get'=>'',
					'icon'=>'icon-printer',
					'url'=>'javascript:print()',
				),
				array(
					'gizle'=>!z('lgn','admin')&&!ytk('nesne','listele'),
					'get'=>'nesne',
					'ad'=>'Nesneleri Yönet',
					'icon'=>'icon-drag-left',
					'url'=>'?s=nesne',
				),
				array(
					'ad'=>'Personel',
					'get'=>'personel',
					'icon'=>'icon-vcard',
					'url'=>'?s=personel&a=listele',
					'yanMenu'=>array(
						array(
							'ad'=>'Liste',
							'icon'=>'icon-eye',
							'url'=>'?s=personel&a=listele',
						),
						array(
							'ad'=>'Ekle',
							'icon'=>'icon-cart-add',
							'url'=>'?s=personel&a=ekle',
						),
						array(
							'ad'=>'Arşivlenmişler',
							'icon'=>'icon-archive',
							'url'=>'?s=personel&a=listele_arsv1',
						)
					)
				),
				array(
					'gizle'=>!z('lgn','admin'),
					'ad'=>'Log Kayıtları',
					'get'=>'log',
					'icon'=>'icon-file-eye',
					'style'=>'',
					'url'=>'?s=log&a=listele',
				),
				array(
					'gizle'=>!z('lgn','admin'),
					'ad'=>'Pamuk Kayıtları',
					'get'=>'pamuk',
					'icon'=>'icon-percent',
					'style'=>'',
					'url'=>'?s=pamuk&a=listele',
				),
				array(
					'gizle'=>!z('lgn','admin'),
					'ad'=>'Kur Kayıtları',
					'get'=>'kur',
					'icon'=>'icon-cash',
					'url'=>'?s=kur&a=listele',
				),
				array(
					'ad'=>'Güvenli Çıkış Yap',
					'get'=>'cikis',
					'icon'=>'icon-switch',
					'S'=>'cikis',
					'A'=>'cikis',
					'style'=>'color:#f40;',
				)

			),
		),
	),

);
if(z('host')=='localhost')$ayr['siteUrl']='http://localhost/cloudroot/kayteks';
/*
$_Nesneis1=z(37,z(1,"WHERE ad='asamais' ORDER BY sayi1 ASC",'ID,sayi1,metin2,metin3,metin4','nesne'),'sayi1');
foreach ($_Nesneis1 as $nis) {
	$ayr['menu']['istakip']['altMenu'][]=array(
		'ad'=>$nis["metin4"],
		'A'=>'listele_durum'.$nis['sayi1'],
		'icon'=>'mobix/images/icons/white/'.$nis['metin3'].'.png',
		'renk'=>$nis['metin2']
	);
}

$ayr['menu']['istakip']['altMenu'][]=array(
	'ad'=>'Arşivlenmişler',
	'icon'=>'img/dsy/rar.png',
	'A'=>'listele_arsv1',
);


$_NesneMusteri1=z(37,z(1,"WHERE ad='asama' ORDER BY sayi1 ASC",'ID,sayi1,metin2,metin3,metin4','nesne'),'sayi1');
foreach ($_NesneMusteri1 as $nmust) {
	$ayr['menu']['musteritakip']['altMenu'][]=array(
		'ad'=>$nmust["metin4"],
		'A'=>'listele_durum'.$nmust['sayi1'],
		'icon'=>'mobix/images/icons/white/'.$nmust['metin3'].'.png',
		'renk'=>$nmust['metin2']
	);
}

$ayr['menu']['musteritakip']['altMenu'][]=array(
	'ad'=>'Arşivlenmişler',
	'icon'=>'img/dsy/rar.png',
	'A'=>'listele_arsv1',
);

$_NesneSiparis1=z(37,z(1,"WHERE ad='asamasip' ORDER BY sayi1 ASC",'ID,sayi1,metin2,metin3,metin4','nesne'),'sayi1');
foreach ($_NesneSiparis1 as $nsip) {
	$ayr['menu']['siparistakip']['altMenu'][]=array(
		'ad'=>$nsip["metin4"],
		'A'=>'listele_durum'.$nsip['sayi1'],
		'renk'=>$nsip['metin2']
	);
}

$ayr['menu']['siparistakip']['altMenu'][]=array(
	'ad'=>'Arşivlenmişler',
	'icon'=>'img/dsy/rar.png',
	'A'=>'listele_arsv1',
);

$_NesneTeklif1=z(37,z(1,"WHERE ad='teklifdurum' ORDER BY sayi1 ASC",'ID,sayi1,metin1,metin2,metin3,metin4','nesne'),'sayi1');
foreach ($_NesneTeklif1 as $nteklif) {
	$ayr['menu']['teklif']['altMenu'][]=array(
		'ad'=>$nteklif["metin4"],
		'A'=>'listele_durum'.$nteklif['sayi1'],
		//'icon'=>'mobix/images/icons/white/'.$nteklif['metin3'].'.png',
		'renk'=>$nteklif['metin2']
	);
}

$ayr['menu']['teklif']['altMenu'][]=array(
	'ad'=>'Arşivlenmişler',
	'icon'=>'img/dsy/rar.png',
	'A'=>'listele_arsv1',
);*/

$araHA=true;
$admn=z('lgn','admin');
$bnmID=z('lgn','ID');

$pb='₺';
$pbT='TRY';
$PB=array('TRY'=>'TL','USD'=>'USD','EUR'=>'EUR');


// TİP TANIMLARI
$_MTip=array(
	'mymenu'=>'Favori Menü',
	'deneme'=>'Deneme',
	'kumaskarti'=>'Kumaş Kartları',
	'iplik'=>'İplik Kartları',
	'renkkarti'=>'Renk Kartları',
	'aksesuarkarti'=>'Aksesuar Kartları',
	'boyabaski'=>'Boya Baskı',
	'kumasturu'=>'Kumaş Türü',
	'yedekparca'=>'Yedek Parça',
	'makinacesitleri'=>'Makina Çeşitleri',
	'makinaparkuru'=>'Makina Parkuru',
	'konfeksiyonmaliyetleri'=>'Ürün Grupları ve Maliyetleri',
	'cari'=>'Cari',
	'satinalma'=>'Satın Alma',
	'finans'=>'Finans',
	'genelmuhasebe'=>'Genel Muhasebe',
	'gb'=>'Gb',
	'fiyatcalismasi'=>'Fiyat Çalışması',
	'urun'=>'E-Satıs Listesi',
	'einel'=>'Einel',
	'kur'=>'Kur Listesi',
	'pamuk'=>'Pamuk Listesi',
	'log'=>'Log Listesi',
	'personel'=>'Personel',
	'nesne'=>'Nesneler',
	'mesaj'=> 'Mesajlaşma',
	'numune'=> 'Numune',
);


$_LogTip=array(
	'iplik'=>array('ad'=>'İplik'),
	'kumaskarti'=>array('ad'=>'Kumaş Kartı'),
	'boyabaski'=>array('ad'=>'İpBoya Baskı Hizmetleri'),
	'kumasturu'=>array('ad'=>'Kumaş Türü'),
	'makinacesitleri'=>array('ad'=>'Makine Çeşitleri'),
	'makinaparkuru'=>array('ad'=>'Makine Parkuru'),
	'yedekparca'=>array('ad'=>'Yedek Parça'),
	'konfeksiyonmaliyetleri'=>array('ad'=>'Konfeksiyon Maliyetleri'),
	'cari'=>array('ad'=>'Cari'),
	'fiyatcalismasi'=>array('ad'=>'Fiyat Çalışması'),
	'pamuk'=>array('ad'=>'Pamuk'),
	'hatirlatici'=>array('ad'=>'Hatırlatıcı'),
	'musteritakip'=>array('ad'=>'Müşteri Takip'),
	'siparistakip'=>array('ad'=>'Sipariş Takip'),
	'kisi'=>array('ad'=>'Kişi Rehberi'),
	'firma'=>array('ad'=>'Firma / Kurum'),
	'teklif'=>array('ad'=>'Teklif'),
	'urun'=>array('ad'=>'Ürünler'),
	'einel'=>array('ad'=>'Einel'),
	'gelirgider'=>array('ad'=>'Gelir Gider'),
	'firma'=>array('ad'=>'Firma'),
	'tedarikci'=>array('ad'=>'Tedarikci'),
	'rehber'=>array('ad'=>'Kişi Kaydı'),
	
	'ceki'=>array('ad'=>'Çeki'),
	'kur'=>array('ad'=>'Kur Kayıtları'),
	'pamuk'=>array('ad'=>'Pamuk Kayıtları'),
	'personel'=>array('ad'=>'Personel'),
	'uyeler'=>array('ad'=>'Personel'),
	'nesne'=>array('ad'=>'Nesne'),
	'destek'=>array('ad'=>'Destek'),
	'log'=>array('ad'=>'Log Kayıtları'),
);
$_Islm=array(
	'listele'=>'görüntüleme',
	'ekle'=>'ekleme',
	'duzenle'=>'düzenleme',
	'sil'=>'silme',
	'giris'=>'Giriş',
	'cikis'=>'Çıkış',
	'onayla'=>'Onaylama',
	'arsivle'=>'Arşivleme',
	'arsivac'=>'Arşivden Çıkart',
	'indir'=>'İndirme'
);
$_LimitT=array('0'=>'Her Siparişte','1'=>'Günlük','2'=>'Haftalık','3'=>'Aylık','4'=>'Yıllık');
$_CikisTip=array(
	'boyatakip'=>'BOYAHANE',
	'hambezstok'=>'DEPO',
	'dokumastok'=>'DOKUMA SALONU',
	'firma'=>'MÜŞTERİ FİRMA',
);
$_KaliteTip=array(
	'1K'=>'1.Kalite',
	'1A'=>'1-A&nbsp;Kalitesi',
	'2K'=>'2.Kalite'
);
$_StokTip=array(
	'0'=>'Ham Top',
	'1'=>'Mamul Top'
);

$sayfayiyakala1s=z(8,'s');
$sayfayiyakala1a=z(8,'a');
$anamoduladi=(!empty($_MTip[$sayfayiyakala1s])?$_MTip[$sayfayiyakala1s]:'');
$yanmoduladi=(!empty($sayfayiyakala1a)?ucfirst($sayfayiyakala1a):'');

// zWorkten Özellikler
	// GET'te Seçili SAYFA ve ALTSAYFAYI oku
$S=z('get','s');
$A=z('get','a');
	// Seçili SAYFA ve ALTSAYFAYI MenuTip key'i olarak kullan
$TITLE=(!empty($_MTip[$S])?$_MTip[$S].' Sayfası / ':'').$ayr['siteAd'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
?>