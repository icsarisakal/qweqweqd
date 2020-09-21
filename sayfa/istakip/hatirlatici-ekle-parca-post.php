<?php 
// Bu dosya tek başına çalışmaz, başka bir ekleme sayfasına destek olarak kullanılır. (Bkz: mobix-durum-degistir.php, mobix-ekle.php)
// Hatırlatıcı ekleme işlemlerini birden fazla dosyada yapıyoruz o sebeple bir noktadan yönetmek daha kolay olacak.

        $_HP=z(7,'hatirlatici');
        if(!empty($_HP['hatirlaticiAnahtar']) && !empty($_HP['sure_secimi'])){
          $json['cevap']['hatirlaticiAnahtar']=1;
          $_H=array(
            'personel_ID'=>$_X['personel_ID'],
            'hmodul'=>$tbl,
            'hmodul_ID'=>$SID,
            'tarih'=>$_X['tarih'],
            'aciklama'=>$_X['aciklama'],
            'secim'=>'1',
            'tekrar'=>'1',
          );
          switch ($_HP['sure_secimi']) {
            case '15_dk':
            case '30_dk':
            case '45_dk':
            case '60_dk':
            case '120_dk':
            case '180_dk':
              $dk=explode('_', $_HP['sure_secimi']);
              $_H['tarihHatirlatici']=z('datetime','+'.$dk[0].' minutes');
            break;
            case 'ogleden_sonra':
              $_H['tarihHatirlatici']=z('date').' 13:00:00';
            break;
            case 'mesai_bitisi':
              $_H['tarihHatirlatici']=z('date').' 18:30:00';
            break;
            case 'aksam_8':
              $_H['tarihHatirlatici']=z('date').' 20:00:00';
            break;
            case 'mesai_baslangici':
              $_H['tarihHatirlatici']=z('date').' 08:00:00';
            break;
            case 'ozel_tarih':
              $_H['tarihHatirlatici']=$_HP['tarihHatirlatici'];
            break;
          }
          if(!empty($_HP['personel_ID'])){
            $_H['personelMulti']=json_encode($_HP['personel_ID']);
          }
          else{
            $_H['personelMulti']=json_encode(array($bnmID));
          }

          $json['cevap']['hatirlatici_ID']=z(2,$_H,'hatirlatici');
        }
?>