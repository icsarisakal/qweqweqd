<?php
  /*
   * Bulutfon Api
   * SMS Gönderme
   */
   function bulutfonSmsGonder($alici,$mesaj){
       
        if(z(8,'test')){
          z('de',__DIR__.'/bulutfon.txt',"Alıcı: $alici -- Mesaj: $mesaj -- Tarih: ".z('datetime')."\n",'a');
          return;
        }
       
        $token = "e4cb1894fdd0713f0846457a4627e9185bdbf7aef2609c3e9a9ebc2ee8856b71"; // Bulutfon panelinden alcağınız master token
        $title = "NetADIM";//"309"; // Bulutfon üzerinden onaylattığınız sms başlığı
        

        //$receivers = ""; // Formdan gelen alıcı listesi
        //$message   = "012345 Listelerim aktivasyon kodunuz"; // Formdan gelen mesaj alanı        
        //http://hnc.ng.zertel.net/ajax.php?s=ornekmodul&a=bulutfon-kontrol

        $ch = curl_init(); // Curl oturumunu başlattık
        curl_setopt($ch, CURLOPT_URL, 'https://api.bulutfon.com/messages'); // SMS gönderimi için kullanacağımız api adresi
        curl_setopt($ch, CURLOPT_POST, 1); // Burada curl post kullanacagımızı belirttik 1 yerine  true de denebilir
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'title=' . $title . '&access_token=' . $token . '&receivers=' . $alici . '&content=' . $mesaj);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //$sonuc=curl_exec($ch); // Curl calıştır.
        curl_close($ch); // Curl oturumunu kapat

        $sonuc='https://api.bulutfon.com/messages'.'?'.'title=' . $title . '&access_token=' . $token . '&receivers=' . $alici . '&content=' . $mesaj .'';

        //echo file_get_contents("https://api.bulutfon.com/messages?title=NetADIM&receivers=%2B905322776608&content=Deneme%20SMS&access_token=e4cb1894fdd0713f0846457a4627e9185bdbf7aef2609c3e9a9ebc2ee8856b71");

        return $sonuc;

   }
  ?>

