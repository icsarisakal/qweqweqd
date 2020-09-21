<?php 
if(z(8,'id','sayi')){
  $ID=z(8,'id','sayi');
  $_X=z(1,$ID,NULL,'musteritakip');
  if(!empty($_X['firma_ID'])){
    $firma=z(1,$_X['firma_ID'],'ID,ad,tel','firma');
    $_Kisi=z(37,z(1,array('arsiv'=>0,'firma_ID'=>$_X['firma_ID']),'ID,ad,soyad,telCep1','kisi'));
  }
}
?>
<div class="pages">
  <div data-page="login" class="page no-navbar">
    <div class="page-content">
    
      <div class="navbarpages">
        <div class="nav_left_logo" style="color:white; font-size:30px; line-height: 50px; width: 70%;"><?php _z(8,'id'); ?> NOLU <?php echo $ayr['mobix']['mtn'][3] ?></div>
        <div class="nav_right_button" style=" width: 25%;">

            <a href="#" class="backbutton"><img src="mobix/images/icons/white/back.png" alt="" title="" /></a>
            <?php /*/ ?>
            <a href="?"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a>
            <a href="yalinsayfa.php?s=musteri&a=ekle""><img src="mobix/images/icons/white/plus.png" alt="" title="" /></a>
            <a href="yalinsayfa.php?s=mobix&a=menu"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a>
            <a href="#" data-panel="right" class="open-panel"><img src="mobix/images/icons/white/search.png" alt="" title="" /></a>
            <?php /*/ ?>

        </div>
      </div>


      <div id="pages_maincontent">
        <?php if(!empty($_X)){ ?>


        <div class="post_single">
          <?php /*/ ?>
          <div class="blog_nav">
          <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=1" class="prev_post" style="background-color: #600; border-right: 1px solid #500; box-sizing: border-box; width: 50%;"><img src="mobix/images/prev.png" alt="" title="" /></a>
          <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=3" class="next_post" style="background-color: #6f0000; border-left: 1px solid #700; box-sizing: border-box; width: 50%;"><img src="mobix/images/next.png" alt="" title="" /></a>
          </div>
          <div class="featured_image">
          </div>
          <?php /*/ ?>
               
          <div class="page_content"> 
            <div class="entry" style="padding-top: 12px">

              <?php /*/ ?>
              <h3><?php echo $ayr['mobix']['mtn'][1]; ?> Açıklaması</h3>
              <?php /*/ ?>
              <h2 class="page_title" style="border-radius: 10px">
                <?php echo !empty($_X['aciklama'])?$_X['aciklama']:'<i>Belirtilmemiş</i>' ?>
              </h2>
              <div style="text-align: right;padding:8px 8px 0 0;">
                Oluşturulma Tarihi: <?php _z('tarihsaat',$_X['tarih']) ?>
              </div>

              <blockquote></blockquote>



              <h3 style="margin-top: 38px;">İlgili Kurum Bilgileri</h3>

              <h2 class="page_title" style="border-radius: 10px; padding: 4px 0 0px 10px; width: 100%; box-sizing: border-box; margin-bottom:20px; font-size: 20px;">
                <?php echo !empty($firma['ad'])?
                  '<img src="mobix/images/icons/black/company.png" width="24" height="24" style="display:inline-block;margin-bottom:0;" >
                  <span style="vertical-align:top;">'.$firma['ad'].'</span>'
                  :'<i>Belirtilmemiş</i>'; ?>
              </h2>

              <?php if(!empty($firma['tel'])){ ?>
              <p style="margin-bottom: 0px;">
                <a href="tel:<?php echo str_replace(' ','',$firma['tel']) ?>" class="button_full external" style="padding: 2px; background-color: #40739e; border-radius: 20px;">
                  <img src="mobix/images/icons/white/phone.png" width="20" height="20" style="display:inline-block;margin-bottom:0;" >
                  <span style="vertical-align:top;"> Dokun ve Ara: <?php echo !empty($firma['tel'])?$firma['tel']:'' ?></span>
                </a>
              </p>
              <?php } ?>

              <h4>Kurumun Bu <?php echo $ayr['mobix']['mtn'][1] ?> İle İlgili Kişisi</h4>
              <ul class="simple_list" style="padding-bottom: 12px; padding-top:8px;">
              <?php if(!empty($_Kisi[$_X['kisi_ID']])){

                $ad=!empty($_Kisi[$_X['kisi_ID']]['ad'])?$_Kisi[$_X['kisi_ID']]['ad']:'';
                $sad=!empty($_Kisi[$_X['kisi_ID']]['soyad'])?$_Kisi[$_X['kisi_ID']]['soyad']:'';
                $tel=!empty($_Kisi[$_X['kisi_ID']]['cepTel1'])?$_Kisi[$_X['kisi_ID']]['cepTel1']:'';

                if($tel){ ?>
                <li>
                  <a href="tel:<?php echo str_replace(' ','',$tel); ?>" class="external"><?php echo $ad.($ad&&$sad?' ':'').$sad.' ('.$tel.')'; ?></a>
                </li>
                <?php } else { ?>
                <li>
                  <?php echo $ad.($ad&&$sad?' ':'').$sad; ?>
                </li>
                <?php } ?>
                <?php unset($_Kisi[$_X['kisi_ID']]); ?>
              <?php } else { ?>
                <li>
                  <i>Belirtilmemiş</i>
                </li>
              <?php } ?>
              </ul>
              
              <?php if(!empty($_Kisi)){ ?>
              <h4>Kurumun Diğer İlgili Kişileri</h4>
              <ul class="simple_list" style="padding-bottom: 0; padding-top:8px;">
              <?php foreach ($_Kisi as $kisi) {

                $ad=!empty($kisi['ad'])?$kisi['ad']:'';
                $sad=!empty($kisi['soyad'])?$kisi['soyad']:'';
                $tel=!empty($kisi['cepTel1'])?$kisi['cepTel1']:'';

                if($tel){ ?>
                <li>
                  <a href="tel:<?php echo str_replace(' ','',$tel); ?>" class="external"><?php echo $ad.($ad&&$sad?' ':'').$sad.' ('.$tel.')'; ?></a>
                </li>
                <?php } else { ?>
                <li>
                  <?php echo $ad.($ad&&$sad?' ':'').$sad; ?>
                </li>
                <?php } ?>

              <?php } ?>
              </ul>
              <?php } ?>

              <blockquote></blockquote>


              <?php 
                // Müşteri takip girdisinin aşamalarını ardından aşamalardaki personelleri son olarak ise durumların isim, renk ve simgelerini oku
                $_Asama=z(1,array('modul'=>'musteritakip','modul_ID'=>$ID),'','asama'); 
                $_AsamaPersonel=z(37,z(1,"WHERE ".z(38,$_Asama,'personel_ID'),'ID,ad,soyad','personel'));
                $_AsamaDurum=z(37,z(1,"WHERE ad='asama'",'ID,sayi1,metin1,metin2,metin3','nesne'),'sayi1');
              ?>
              <h3 style="margin-top: 38px;"><?php echo $ayr['mobix']['mtn'][4] ?> Hareket Geçmişi</h3>
              <ul class="comments">
                  
                  <?php if(!empty($_Asama)){ foreach ($_Asama as $asama) {

                    // Personel ve aşama durum isimlerini kısaltmak açısından değişkenlere ata
                    $ad=!empty($_AsamaPersonel[$asama['personel_ID']]['ad'])?$_AsamaPersonel[$asama['personel_ID']]['ad']:'';
                    $sad=!empty($_AsamaPersonel[$asama['personel_ID']]['soyad'])?$_AsamaPersonel[$asama['personel_ID']]['soyad']:'';
                    $durum=!empty($_AsamaDurum[$asama['durum']]['metin1'])?$_AsamaDurum[$asama['durum']]['metin1']:'';
                    $renk=!empty($_AsamaDurum[$asama['durum']]['metin2'])?$_AsamaDurum[$asama['durum']]['metin2']:'';
                    $simge=!empty($_AsamaDurum[$asama['durum']]['metin3'])?$_AsamaDurum[$asama['durum']]['metin3']:'';

                  ?>
                  <li class="comment_row" style="background-color: <?php echo $renk ?>;">
                      <div class="comm_avatar" style="height: 62px"><img src="mobix/images/icons/white/<?php echo $simge; ?>.png" alt="" title="" border="0" /></div>
                      <div class="comm_content">
                        <div>
                          <b><?php echo $durum ?></b> <?php _z('tarihsaat',$asama['tarih']); ?>
                          <?php echo !empty($asama['aciklama'])?'<br><i>'.$asama['aciklama'].'</i>':'' ?>
                          <div style="text-align: right;"><b><?php echo $ad.($ad&&$sad?' ':'').$sad; ?></b></div>
                        </div>
                      </div>
                  </li>
                  <?php }} else { ?>
                  <li class="comment_row" style="padding: 6px; width: 100%; box-sizing: border-box;">
                      <div class="comm_content">Henüz hiç durum değişikliği bildirilmemiş.</div>
                  </li>
                  <?php } ?>

                  <div class="clear"></div>
              </ul>

              <blockquote></blockquote>


              <?php 
              $_Hatirlatici=z(1,array('hmodul'=>'musteritakip','hmodul_ID'=>$ID),'ID,tarihHatirlatici,aciklama,personelMulti,departman','hatirlatici');
              if(!empty($_Hatirlatici)){
                
                // Tüm hatırlatmalardaki çoklu personel idleri tek bir dizide topla (tek seferde personellerin tamamını okumak için kullanılacak)
                $_HPID=array();
                foreach ($_Hatirlatici as $i=>$hatirlatici) {
                  if(!empty($hatirlatici['personelMulti'])){
                    $PID=json_decode($hatirlatici['personelMulti']);
                    $_Hatirlatici[$i]['personelMulti']=$PID;
                    $_HPID=array_merge($PID,$_HPID);
                  }
                  // Varsa ilişkili departmanlar yığınını da kendi içlerinde jsondan dizilere çevir
                  if(!empty($hatirlatici['departman'])){
                    $PID=json_decode($hatirlatici['departman']);
                    $_Hatirlatici[$i]['departman']=$PID;
                    $departmanOkuAnahtar=1;
                  }
                }
                // Birden fazla aynısı olan personel idleri temizle (birer tane kalsın)
                $_HPID=array_unique($_HPID);

                // Elde edilen personle id yığını ile personelleri tek seferde oku
                $_HatPer=z(37,z(1,"WHERE arsiv='0' AND (ID='".implode("' OR ID='", $_HPID)."')",'ID,ad,soyad,tel','personel'));
                if(!empty($departmanOkuAnahtar)){
                  $_HatDep=z(37,z(1,array('ad'=>'departman'),'ID,metin1','nesne'));
                }
              ?>
              <h3 style="margin-top: 38px;"><?php echo $ayr['mobix']['mtn'][4] ?> Hatırlatma<?php echo $i>1?'ları':'sı'; ?></h3>
              <ul class="comments">
                  <?php foreach ($_Hatirlatici as $hatirlatici) { ?>
                  <li class="comment_row">
                      <div class="comm_avatar"><img src="mobix/images/icons/black/alarm.png" alt="" title="" border="0" /></div>
                      <div class="comm_content">
                        <p>
                          <?php _z('tarihsaat',$hatirlatici['tarihHatirlatici']) ?> tarihinde 

                          <?php if(!empty($hatirlatici['departman'])){ ?>
                          <?php 
                          $j=0; 
                          foreach ($hatirlatici['departman'] as $hdid) {
                            if(!empty($_HatDep[$hdid])){
                              if(!empty($j)){
                                echo ', ';
                              } $j++;
                              echo '<b>'.(!empty($_HatDep[$hdid]['metin1'])?$_HatDep[$hdid]['metin1']:'').'</b>';
                            }
                          } ?>
                           departman<?php echo count($hatirlatici['departman'])>1?'lar':''; ?>ına 
                          <?php } ?>

                          <?php if(!empty($hatirlatici['personelMulti'])){ ?>
                          <?php 
                            echo !empty($hatirlatici['departman'])?' ve ':'';
                            $j=0; 
                            foreach ($hatirlatici['personelMulti'] as $hpid) {
                              if(!empty($_HatPer[$hpid])){
                                if(!empty($j)){
                                  echo ', ';
                                } $j++;
                                $ad=!empty($_HatPer[$hpid]['ad'])?$_HatPer[$hpid]['ad']:'';
                                $sad=!empty($_HatPer[$hpid]['soyad'])?$_HatPer[$hpid]['soyad']:'';
                                $tel=!empty($_HatPer[$hpid]['tel'])?$_HatPer[$hpid]['tel']:'';
                                echo ($tel?'<a href="tel:'.$tel.'" class="external"><b>':'<b>') . ($ad.($ad&&$sad?' ':'').$sad) . ($tel?'</b></a>':'</b>');
                              }
                            } 
                          ?>
                           isimli kullanıcı<?php echo count($hatirlatici['personelMulti'])>1?'lar':'y'; ?>a
                          <?php } ?>
                           hatırlatılacak.</p></div>
                  </li>
                  <?php } ?>
                  <div class="clear"></div>
              </ul>
              <?php } else { ?>
              <h3 style="margin-top: 38px;"><?php echo $ayr['mobix']['mtn'][4] ?> Hatırlatması</h3>
              <ul class="comments">
                  <li class="comment_row" style="padding: 6px; width: 100%; box-sizing: border-box;">
                      <div class="comm_content">Hiç hatırlatma tanımlanmamış.</div>
                  </li>
                  <div class="clear"></div>
              </ul>
              <?php } ?>

              <blockquote></blockquote>


            </div>

            <h2 class="page_subtitle">Yönetim</h2>
            <div class="custom-accordion accordion-list">
            
              <div class="accordion-item">
                <div class="accordion-item-toggle">
                  <i class="icon icon-plus">+</i>
                  <i class="icon icon-minus">-</i>
                  <span><?php echo $ayr['mobix']['mtn'][4] ?> durumunu değiştir</span>
                </div>
                <div class="accordion-item-content" style="margin-top:10px;">
                  <p>
                    <?php if(!empty($_AsamaDurum))foreach($_AsamaDurum as $asDrm){ ?>
                    <a href="yalinsayfa.php?s=musteritakip&a=mobix-durum-degistir&id=<?php echo $ID ?>&durum=<?php echo $asDrm['sayi1'] ?>" 
                      class="button_full"
                      style="background:url(mobix/images/icons/white/<?php echo $asDrm['metin3'] ?>.png) no-repeat <?php echo $asDrm['metin2'] ?>; background-size: 30px; background-position: 4px; text-indent: 30px;"
                    >
                        <b><?php echo $asDrm['metin1'] ?></b> olarak işaretle
                    </a>
                    <?php } ?>
                  </p>
                </div>
              </div>

              <p>&nbsp;</p>
              <p>&nbsp;</p>
                
            </div>

          </div>
          
        </div>


        <?php } else echo '<h3 style="margin:1em">İçerik bulunamadı</h3>'; ?>
      </div>
      
      
    </div>
  </div>
</div>
