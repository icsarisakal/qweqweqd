<?php 
	// Aşağıdaki scriptin çalışabilmesi için
	// $_X['departman'] değişkeni içinde json string departman idler olmalı
	// $_X['personelMulti'] değişkeni içinde json string personel idler olmalı

          
        // ilgili departman idleri üzerinden personel idleri edin *
        if(!empty($_X['departman'])){
          $personelDepartmanSd="( departmanMulti LIKE '%\"".str_replace(array('["','"]','","'), array('','',"\"%' OR departmanMulti LIKE '%\""), $_X['departman'])."\"%' )";
        }
        // ilgili personel idlerini sorguda derle
        if(!empty($_X['personelMulti'])){
          $personelSd="( ID = '".str_replace(array('["','"]','","'), array('','',"' OR ID = '"), $_X['personelMulti'])."' )";
        }

        // Elde edilen personel idlerden sorgu metni oluştur ve tüm personelleri çek
        if(!empty($personelDepartmanSd) || !empty($personelSd)){
          $_DepartmanPersonel=z(1,
            "WHERE arsiv='0' AND ID<>'".$bnmID."' AND (" 
              .(!empty($personelDepartmanSd)?$personelDepartmanSd:'') 
              .(!empty($personelSd)? (!empty($personelDepartmanSd)?" OR ":'') .$personelSd:'') 
            .")"
            ,'ID,ad,soyad,eposta,tel,onesignalUserIds','personel');

          $json['cevap']['sorguDetay']="WHERE arsiv='0' AND ID<>'".$bnmID."' AND (".(!empty($personelDepartmanSd)?$personelDepartmanSd:'').(!empty($personelSd)? (!empty($personelDepartmanSd)?" OR ":'') .$personelSd:'').")";


          $json['cevap']['persolar']=$_DepartmanPersonel;

          if(!empty($_DepartmanPersonel)){

            foreach ($_DepartmanPersonel as $dprs) {
            	$mesaj='Sayın '.$dprs['ad'].', '.z('lgn','ad')." yeni bir ".$ayr['mobix']['mtn'][2]." oluşturdu. ".$ayr['mobix']['mtn'][1]." Numarası: ".$SID;

              // ONESIGNAL CİHAZLARI VAR İSE BİLDİRİM GÖNDER
              if(!empty($dprs['onesignalUserIds'])){
                $json['cevap']['OneSignalSend']=0;
                $onesignalUserIds=json_decode($dprs['onesignalUserIds']);
                if(!empty($onesignalUserIds)){
                  foreach ($onesignalUserIds as $onespid) {
                    if(!empty($onespid)){
                      $playerId=trim($onespid);
                      $json['cevap']['OneSignalSend']=OneSignalSend($playerId,$mesaj);
                    }
                  }
                }
              }
              
              
              // E-POSTA KAYITLIYSA MAİL GÖNDER *
              if(!empty($dprs['eposta'])){
              	$json['cevap']['eposta']=$dprs['eposta'];
                $kime=$dprs['eposta'];
                $konu=$ayr['siteAd'].' '.$SID.' Numaralı '.$ayr['mobix']['mtn'][1];
                $icerik=$mesaj.' 
                	<br><b>Açıklama</b>
                	<br>'.$_X['aciklama'].'
                	<br>
                	<br><a href="'.$ayr['siteUrl'].'/?s=istakip&a=detay&id='.$SID.'">'.$ayr['siteUrl'].'/?s=istakip&a=detay&id='.$SID.'</a> adresinden görüntüleyebilirsiniz.';
                $gonderenAdi=$ayr['siteAd'];
                $replyPosta='noreply@'.$ayr['siteDomain'];
                $json['cevap']['smtpMailGonder']=smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta);
              }              
              
              // TEL KAYITLIYSA SMS GÖNDER
              if(!empty($dprs['tel'])){
                $tel=str_replace(' ','',$dprs['tel']);
                if(!empty($tel)){
                  $mesaj=$mesaj.' --- Açıklama: '.$_X['aciklama'];
                  $json['cevap']['bulutfonSmsGonder']=$tel;
                  bulutfonSmsGonder($tel,$mesaj);
                }
              }


            }
          }
          
        }



?>