<?php 

  // EN ERKEN HATIRLATMAYI YAKALA **************
  $enErkenHatirlatmaSd="
    WHERE arsiv='0' 
    AND tarihHatirlatici > '".z('datetime')."'
    AND (
      personel_ID='".$bnmID."' 
      OR personelMulti LIKE '%\"".$bnmID."\"%' 
      ".(z('lgn','departmanlar') ? "OR (departman LIKE '%\"".str_replace(',',"\"%' OR departman LIKE '%\"",z('lgn','departmanlar'))."\"%')" : "")."
    )
    ORDER BY tarihHatirlatici ASC
    LIMIT 1
  ";
  //echo $enErkenHatirlatmaSd;
  $_Hatirlatici=z(1,$enErkenHatirlatmaSd,'ID,tarihHatirlatici','hatirlatici');
  if(!empty($_Hatirlatici)){
    $enErkenHatirlatma=!empty($_Hatirlatici[0]) ? $_Hatirlatici[0] : '';
  }



  // Müşteri Takip yetki ozel1 : Herkesin Girdilerini Görebilme
  $ytkOzel1=$admn||ytk('musteritakip','ozel1');
  $sahipSd=(!$ytkOzel1?" AND personel_ID='".$bnmID."'":'');

  if($ytkOzel1){

    // GÖNDERİM ÜZERİNDEN BİR HAFTA GEÇMİŞ TEKLİFLERİ SAY *************
    $birHaftaGecmisTeklifAdet=z(5,"WHERE arsiv='0' AND durum='1' AND tarihDurum IS NOT NULL",'ID','teklif');

    // KAZANILMIŞ FAKAT SİPARİŞİ OLUŞMAMIŞ İŞLERİ SAY *************
    $siparisiOlmayanIsAdet=z(5,"WHERE arsiv='0' AND asama='6' AND siparisVar='0'",'ID','musteritakip');

    // ÜRETİM SÜRECİNDEKİ İŞLERİ SAY *************
    $uretimdekiIsAdet=z(5,"WHERE arsiv='0' AND asamasip='1'",'ID','siparistakip');

  }
  
  // BU YIL ZİYARET EDİLEN İŞLER
  $_Asama=z(48,z(1,"WHERE arsiv='0' AND modul='musteritakip' ".$sahipSd." AND tarih>'".z('yil')."-01-01' GROUP BY durum,modul_ID",'ID,durum','asama'),'durum');
  $buYilZiyaretEdilenIsler=!empty($_Asama[2]) ? count($_Asama[2]) : 0;

  // BU YIL TEKLİF YAPILAN İŞLER
  $buYilteklifYapilanIsler=!empty($_Asama[3]) ? count($_Asama[3]) : 0;

  // BU YIL SUNUM YAPILAN İŞLER
  $buYilSunumYapilanIsler=!empty($_Asama[4]) ? count($_Asama[4]) : 0;




  // YENİ OLUŞTURULMUŞ İŞLERİ GETİR                            
  $_MusteriTakipYeni=z(1,"WHERE arsiv='0' AND asama<>'6' AND asama<>'10' ".$sahipSd." ORDER BY ID DESC LIMIT 5",'ID,firma_ID,asama,tarih','musteritakip');
  $yenileriHaricBirak="";
  if(!empty($_MusteriTakipYeni)){
    foreach ($_MusteriTakipYeni as $mi=>$mty) {
      if(!empty($mi)){
        $yenileriHaricBirak.=" AND ";
      }
      $yenileriHaricBirak.="ID<>'".$mty['ID']."'";
    }
  }

  // İŞLEMİ BİTMEMİŞ EN ESKİ İŞLERİ GETİR                            
  $_MusteriTakipEski=z(1,"WHERE arsiv='0' AND asama<>'6' AND asama<>'10' ".$sahipSd." AND (".$yenileriHaricBirak.") ORDER BY ID ASC LIMIT 5",'ID,firma_ID,asama,tarih','musteritakip');
  $_Firma=z(37,z(1,"WHERE ".z(38,$_MusteriTakipYeni,'firma_ID').(!empty($_MusteriTakipYeni)&&!empty($_MusteriTakipEski)?" OR ":'').z(38,$_MusteriTakipEski,'firma_ID'),'ID,ad','firma'));


?>


        <div class="pages  toolbar-through">

          <div data-page="index" class="page homepage">
            <div class="page-content">
          
                  <!-- Slider -->
                  <div class="swiper-container swiper-init" data-effect="slide" data-direction="vertical" data-pagination=".swiper-pagination">
                    <div class="swiper-wrapper">
                    
                      <!-- GENEL BİLGİLENDİRME EKRANI -->
                      <div class="swiper-slide" style="color: #eee;">
                          <span><?php echo $ayr['siteAd'] ?></span>
                          <div style="color:white"><?php echo $ayr['firmaAd'] ?></div>
                          <hr>
                          <!--a href="about.html" class="swiper_read_more">slide down to see more</a-->
                          <br>
                          
                          <div class="bilgi-baslik">GENEL BİLGİLENDİRME</div>
                          <ul style="height: 300px; overflow: scroll;">


                            <?php $bilgiAdet=0; ?>
                            
                            <?php if(!empty($enErkenHatirlatma) && $bilgiAdet<3) { $bilgiAdet++; ?>
                            <li class="bilgi-maddesi">
                              <a href="yalinsayfa.php?s=hatirlatici&a=mobix-detay&id=1" class="bilgi-a" >
                                • En erken hatırlatmanız <b><?php _z('ayingununde',$enErkenHatirlatma['tarihHatirlatici']); ?></b>. 
                              </a>
                            </li>
                            <?php } ?>


                            <?php if($bilgiAdet<3) { $bilgiAdet++; ?>
                            <li class="bilgi-maddesi">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-genel-durum" class="bilgi-a" >
                                • Bu yıl <b><?php echo $buYilZiyaretEdilenIsler ?></b> ziyaret, <b><?php echo $buYilteklifYapilanIsler ?></b> teklif, <b><?php echo $buYilSunumYapilanIsler ?></b> sunum yapılmış.
                              </a>
                            </li>
                            <?php } ?>
                            

                            <?php if($ytkOzel1){ ?>

                              <?php if(!empty($birHaftaGecmisTeklifAdet) && $bilgiAdet<3) { $bilgiAdet++; ?>
                              <li class="bilgi-maddesi">
                                <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_teklif-sonucu-gecikmisler" class="bilgi-a" >
                                  • Gönderildikten sonra bir haftayı geçmiş ve henüz sonuçlanmamış <b><?php echo $birHaftaGecmisTeklifAdet ?> adet</b> teklifiniz var.
                                </a>
                              </li>
                              <?php } ?>


                              <?php if(!empty($siparisiOlmayanIsAdet) && $bilgiAdet<3) { $bilgiAdet++; ?>
                              <li class="bilgi-maddesi">
                                <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_siparise-donusmemisler" class="bilgi-a" >
                                  • Kazanılmış fakat sipariş kaydı henüz oluşturulmamış <b><?php echo $siparisiOlmayanIsAdet ?> adet</b> <?php echo $ayr['mobix']['mtn'][14] ?> var.
                                </a>
                              </li>
                              <?php } ?>


                              <?php if(!empty($uretimdekiIsAdet) && $bilgiAdet<3) { $bilgiAdet++; ?>
                              <li class="bilgi-maddesi">
                                <a href="yalinsayfa.php?s=siparistakip&a=mobix-listele_uretimdekiler" class="bilgi-a" >
                                  • Üretim sürecinde bulunan <b><?php echo $uretimdekiIsAdet ?>  adet</b> siparişiniz var.
                                </a>
                              </li>
                              <?php } ?>

                            <?php } ?>

                          </ul>

                      </div>
                      <!-- / GENEL BİLGİLENDİRME EKRANI SON -->



                      <!-- YENİ OLUŞTURULMUŞ İŞLER -->
                      <div class="swiper-slide">
                          <div>
                            &nbsp;
                          </div>
                          <hr>
                          <div class="bilgi-baslik">YENİ OLUŞTURULMUŞ <?php echo $ayr['mobix']['mtn'][9] ?></div>
                          <hr>
                          <ul style="height: 300px; overflow: scroll;">
                            <?php if(!empty($_MusteriTakipYeni))foreach($_MusteriTakipYeni as $musteritakip){ ?>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=<?php echo $musteritakip['ID'] ?>" class="bilgi-a" >
                                • <?php echo !empty($_Firma[$musteritakip['firma_ID']]['ad'])?'<b>'.$_Firma[$musteritakip['firma_ID']]['ad'].'</b> kurumuna '.z(55,$musteritakip['tarih']).' oluşturulan '.$ayr['mobix']['mtn'][2].'. '.$ayr['mobix']['mtn'][1].'No:&nbsp;<b>'.$musteritakip['ID'].'</b>':'' ?></b> <?php echo !empty($musteritakip['aciklama'])?$musteritakip['aciklama']:''; ?>
                              </a>
                            </li>
                            <?php } ?>
                          </ul>
                          <?php /*/ ?>
                          <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_en-yeni-isler" class="swiper_read_more">Tamamını Görün</a>
                          <?php /*/ ?>
                      </div>
                      <!-- / YENİ OLUŞTURULMUŞ İŞLER SON -->

                      
                      <!-- ESKİ İŞLER -->
                      <?php if(!empty($_MusteriTakipEski)) { ?>
                      <div class="swiper-slide">
                          <div>
                            &nbsp;
                          </div>
                          <hr>
                          <div class="bilgi-baslik">DAHA ÖNCEKİ <?php echo $ayr['mobix']['mtn'][9] ?></div>
                          <hr>
                          <ul style="height: 300px; overflow: scroll;">
                            <?php if(!empty($_MusteriTakipEski))foreach($_MusteriTakipEski as $musteritakip){ ?>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=<?php echo $musteritakip['ID'] ?>" class="bilgi-a" >
                                • <?php echo !empty($_Firma[$musteritakip['firma_ID']]['ad'])?'<b>'.$_Firma[$musteritakip['firma_ID']]['ad'].'</b> için '.z(55,$musteritakip['tarih']).' oluşturuldu. '.$ayr['mobix']['mtn'][1].'No:&nbsp;<b>'.$musteritakip['ID'].'</b>':'' ?></b> <?php echo !empty($musteritakip['aciklama'])?$musteritakip['aciklama']:''; ?>
                              </a>
                            </li>
                            <?php } ?>
                          </ul>
                          <?php /*/ ?>
                          <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_en-eski-isler" class="swiper_read_more">Tamamını Görün</a>
                          <?php /*/ ?>
                      </div>
                      <?php } ?>
                      <!-- / ESKİ İŞLER SON -->



                      <?php /*/ ?>
                      <div class="swiper-slide">
                          <div>
                            &nbsp;
                          </div>
                          <hr>
                          <div class="bilgi-baslik">EN AKTİF İŞLERİNİZ</div>
                          <hr>
                          <ul style="height: 300px; overflow: scroll;">
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=77" class="bilgi-a" >
                                • <b>DENİZLİ KOLEJİ OKULLARI</b> sunum bekliyor.
                              </a>
                            </li>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=2" class="bilgi-a" >
                                • <b>ISPARTA KOLEJİ</b> teklif bekliyor.
                              </a>
                            </li>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=3" class="bilgi-a" >
                                • <b>AYDIN OKULLARI</b> montaj için bekliyor.
                              </a>
                            </li>
                          </ul>
                          <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_en-aktif-isler" class="swiper_read_more">Tamamını Görün</a>
                      </div>

                      <div class="swiper-slide">
                          <div>
                            &nbsp;
                          </div>
                          <hr>
                          <div class="bilgi-baslik">DİKKAT EDİLMESİ GEREKENLER</div>
                          <hr>
                          <ul style="height: 300px; overflow: scroll;">
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=1" class="bilgi-a" >
                                • <b>ANTALYA KOLEJİ</b> teklif gönderilmiş fakat <b>8 gündür</b> sonuçlanmamış.
                              </a>
                            </li>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=2" class="bilgi-a" >
                                • <b>ISPARTA KOLEJİ</b> teklif bekliyor.
                              </a>
                            </li>
                            <li class="bilgi-maddesi-2">
                              <a href="yalinsayfa.php?s=musteritakip&a=mobix-detay&id=3" class="bilgi-a" >
                                • <b>AYDIN OKULLARI</b> montaj için bekliyor.
                              </a>
                            </li>
                          </ul>
                          <a href="yalinsayfa.php?s=musteritakip&a=mobix-listele_dikkat-edilmesi-gereken-isler" class="swiper_read_more">Tamamını Görün</a>
                      </div>
                      <?php /*/ ?>




                    </div>
                    <div class="swiper-pagination"></div>
                  </div>  
            </div>
          </div>
        </div>