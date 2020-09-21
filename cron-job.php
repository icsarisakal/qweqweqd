<?php session_start();ob_start();
/*

Bu sayfa normalde görüntülenebilen sayfaların ajax olarak açılabilmesine olanak sağlar.
Daha çok saf json çıktı ihtiyacı duyulduğunda kullanılır.
Javascript eventlerle ajax üzerinden yerine getirilmesi istenen görevler için de kullanılabilir.

*/

// Gerekli kütüphaneleri ve varsayılan ayarları yükle
require(__DIR__.'/ayar.php');

z('de','cron.txt',"
Cron Deneme ".z('datetime')
,'a');

ob_end_flush();
?>

