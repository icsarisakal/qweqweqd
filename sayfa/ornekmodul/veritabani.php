<?php 
// TABLO İSMİNİ BAŞKA YERDEN ÇEKTİĞİMİZ İÇİN YAZIYORUZ KENDİ TABLOSU OLSAYDI $tbl KULLANILMASI GEREKİR
// Z1 BAŞLANGIC FONKSİYONU
//Bu işlem kişi tablosundaki tüm veriyi çeker
$vericek=z(1,'','','kisi');
//print_r($vericek);// Tablodan gelen arrayı ekrana dök

$id=1; // Rastgele bir ıd oluşturduk nmormalde urlden okunan ıdleri yazılması gerekiyor z(8,'id');

// id'den gelen veriyi tek kayıt olarak çekmek
$tekvericek=z(1,$id,'','kisi');
//echo $tekvericek['ad'].' '.$tekvericek['soyad'];//Kişinin adını ve soyadını çektik.

// Tablodan arsivi 0 ve personel ıd'si 2 olan tüm verileri çek
$istenilenegorevericek=z(1,array('arsiv'=>0,'personel_ID'=>2),'','kisi');
//print_r($istenilenegorevericek); Gelen veriyi ekrana dökmek

//Çekilen tabloda sadece istenilen verileri ekrana çağır
$kisitliveri=z(1,'','ad,soyad','kisi');
//echo '<pre>'; // Ekranda düzgün çıksın diye açılışı yapıyoruz
//print_r($kisitliveri); // Kısıtlı veriyi ekranan dökmek
//echo '</pre>'; // Ekranda düzgün çıksın diye kapanışı yapıyoruz

//Gelen veriyi foreach ile ekrana listelemek
/*/
foreach ($vericek as $vcek) {
	echo $vcek['ad'].' '.$vcek['soyad'];
}
/*/

//Z1 BİTİŞ FONKSİYONU

//Z2 BAŞLANGIC FONKSİYONU

// Formda dolduran veya başka yerden gelen veriyi veritabanı tablosunda ekleme yapması
//z(2,array('arsiv'=>0,'tarih'=>z('datetime')),$tbl); // ekleme yaparken anlık tarihi gönderiyor

//Z2 BİTİŞ FONKSİYONU

//Z3 BAŞLANGIC FONKSİYONU
//Örnek modüldeki veritabanı adet sayısını güncellemek için yapılan fonksiyon
//z(3,$id,array('adet'=>10,'tip'=>2),$tbl); // Örnek modül tablosundaki adeti 10 ile güncelleme
//Z3 BAŞLANGIC FONKSİYONU

//Z4 BİTİŞ FONKSİYONU
//z(4,$id,$tbl);// $id fonkisyonunda gelen sayıyı tablodan sildi
//z(4,4,$tbl);// 4 nolu ıdyi tablodan sildi
$coklusilmewhere="WHERE ID = 5 OR ID = 3"; // ID si 5 veya 3 olan ıdlerin sorgusu
//z(4,$coklusilmewhere,$tbl);// 3 nolu ve 5 nolu ıdyi tablodan sildi
//Z4 BAŞLANGIC FONKSİYONU

//Z7 BİTİŞ FONKSİYONU
//Form methodu post olan verileri ekrana dökmeye yarar form işlemleri olması lazım
//Z7 BAŞLANGIC FONKSİYONU

//Z8 BİTİŞ FONKSİYONU
//Form methodu get olan verileri ekrana dökmeye yarar form işlemleri olması lazım
//Z8 BAŞLANGIC FONKSİYONU
?>