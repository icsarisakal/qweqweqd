<?php 
// Ajax üzerinden POST gönderimi gelmiş mi?
if(z(8,'ajaxform')){
  $json['mesaj']="Ajax işlem";

  $_X=z(7,$tbl);
  if(!empty($_X['firma_ad'])){


    $secilenFirma=z(1,array('arsiv'=>'0','ad'=>$_X['firma_ad']),'ID,arsiv','firma');
    if(!empty($secilenFirma[0])){
      $json['mesaj']=$_X['firma_ad']. ' firmasi bulundu';

      $_X['personel_ID']=z('lgn','ID');
      $_X['tarih']=z('datetime');
      $_X['tarihKayit']=$_X['tarih'];
      $_X['aciklama']=!empty($_X['aciklama'])?$_X['aciklama']:'';
      $_X['kisi_ID']=!empty($_X['kisi_ID'])?$_X['kisi_ID']:0;
      $_X['firma_ID']=$secilenFirma[0]['ID'];
      if(!empty($_X['departman'])){
        $_DepartmanID=$_X['departman'];
        $_X['departman']=!empty($_X['departman'])?json_encode($_X['departman']):'';
      }
      if(!empty($_X['personelMulti'])){
        $_PersonelID=$_X['personelMulti'];
        $_X['personelMulti']=!empty($_X['personelMulti'])?json_encode($_X['personelMulti']):'';
      }
      unset($_X['firma_ad']);

      $ayniMusteritakip=z(1,array(
        'personel_ID'=>$_X['personel_ID'],
        'arsiv'=>'0',
        'firma_ID'=>$secilenFirma[0]['ID'],
        'kisi_ID'=>$_X['kisi_ID'],
        'aciklama'=>$_X['aciklama']
      ),'ID,arsiv','musteritakip');
      if(empty($ayniMusteritakip[0])){
        $SID=z(2,$_X,$tbl);
      }
      else{
        $SID=$ayniMusteritakip[0]['ID'];
      }

      //$SID=z(2,$_X,$tbl);
      if(!empty($SID)){

        $json['sonuc']=1;
        $json['cevap']=array(
          'ID'=>$SID
        );
        $json['mesaj']="Yeni ".$ayr['mobix']['mtn'][2]." başarı ile oluşturuldu.";

        
        // Hatırlatma eklenmesi istenmiş ise bu dosya otomatik olarak hatırlatmayı ekleyip sonid(SID) ye ilişkilendirecek
        require(__DIR__.'/hatirlatici-ekle-parca-post.php');

        // Personellere EPOSTA -- ONESIGNAL -- SMS Bildirimleri Gönder              
        // Aşağıdaki scriptin çalışabilmesi için
        // $_X['departman'] değişkeni içinde json string departman idler olmalı
        // $_X['personelMulti'] değişkeni içinde json string personel idler olmalı
        require(__DIR__.'/bildirim-gonder-parca-post.php');


       

      }
      else{
          $json['mesaj']="Ekleme işlemi başarısız. Lütfen alanları kontrol ediniz.";
      }
      



    }
    else{
      $json['mesaj']='<div style="color:red;margin-top:10px;">Kurum bulunamadı, daha önce eklenmemiş ise yeni kurum oluşturmayı deneyiniz.&nbsp;&nbsp;<a href="#" onclick="popupFirmaEkleAc()"><u>Yeni Kurum Oluşturun</u></a></div>';
    }

  }

} 

// Post yok normal sayfa isteniyor ise htmli ekrana dök
else { ?>
<div class="pages">
  <div data-page="firma-ekle" class="page no-navbar">
    <div class="page-content">
    
      <div class="navbarpages">
          <div class="navbarpages">
        <div class="nav_left_logo" style="color:white; font-size:30px; line-height: 50px; width: 80%;">YENİ <?php echo $ayr['mobix']['mtn'][3] ?> OLUŞTUR</div>
        <div class="nav_right_button" style=" width: 15%;">
            <a href="#" class="backbutton"><img src="mobix/images/icons/white/back.png" alt="" title="" /></a>
        </div>
      </div>
      </div>


      <div id="pages_maincontent">

        <div class="page_content"> 

          <div class="contactform">
          <form action="ajaxayar.php?s=musteritakip&a=mobix-ekle&ajaxform=1" method="post" id="form-musteritakip-ekle" onsubmit="return ajaxPostGonder( 'form-musteritakip-ekle', function(sonucText){
                  console.log(sonucText);

              if(sonucText && sonucText.length>1){
                var sonucJson=JSON.parse(sonucText);
                if(sonucJson.sonuc==1){
                  console.log(sonucJson);
                  myApp.addNotification({
                    title: '✔ Yeni <?php echo $ayr['mobix']['mtn'][1] ?> başarı ile oluşturuldu.',
                    hold:2000
                  });
                  mainView.router.load({'url':'yalinsayfa.php?s=musteritakip&a=mobix-detay&id='+sonucJson.cevap.ID});
                  /*/
                  setTimeout(function(){
                    window.location.href='#!/yalinsayfa.php?s=musteritakip&a=mobix-detay&id='+sonucJson.cevap.ID;
                    setTimeout(function(){ window.location.reload(); },1000);
                  },1500);
                  /*/

                }
                else{
                  $('.musteritakip-ekle-uyari-kutusu').html(sonucJson.mesaj).slideDown();
                }
              }
              
              $('.musteritakip-ekle-yukleniyor').slideUp();
              setTimeout(function(){
                $('#musteritakip-ekle-submit-butonu').attr('disabled',false).css({'opacity':1});
              },2000);

            }, function(){ 
              $('#musteritakip-ekle-submit-butonu').attr('disabled',true).css({'opacity':0.4});
              $('.musteritakip-ekle-yukleniyor').slideDown();
            });">

            <label>Kurum Belirtiniz *</label>
            <input type="text" name="musteritakip[firma_ad]" placeholder="" class="form_input" required="required" id="musteritakip-ekle-musteritakip-firma_ad" autocomplete="off">
            <div>
              Aradığınız kurum yok mu?&nbsp;&nbsp;<a href="#" data-popup=".popup-firma-ekle" class=" popup-firma-ekle-tetik"><u>Yeni Kurum Oluşturun</u></a>
            </div>
            

            <label style="margin-top: 4px;">Kurumun İlgili Kişisi</label>
            <div style="border:1px solid #ddd; padding: 4px;">
              <select name="musteritakip[kisi_ID]" class="form_input">
                <option value="" selected>&nbsp;</option>
              </select>
            </div>

            <p></p>
            <label><?php echo $ayr['mobix']['mtn'][1] ?> Açıklaması *</label>
            <textarea name="musteritakip[aciklama]" class="form_textarea" required="required" rows="" cols=""></textarea>



            <!-- İLGİLİ DEPARTMANLARI SEÇ -->
            <div class="custom-accordion accordion-list" style="margin-top:10px;">
              <div class="accordion-item">
                <div class="accordion-item-toggle">
                  <i class="icon icon-plus">+</i>
                  <i class="icon icon-minus">-</i>
                  <span>Personeli Haberdar Et</span>
                </div>
                <div class="accordion-item-content" style="margin-top:10px;">

                    <h2>Departmanları haberdar et</h2>
                    <?php $_Departman=z(1,"WHERE ad='departman'",'ID,metin1','nesne'); ?>
                    <?php foreach ($_Departman as $departman) { ?>
                    <label class="label-checkbox item-content">
                      <input type="checkbox" name="musteritakip[departman][]" value="<?php echo $departman['ID']; ?>">
                      <div class="item-media">
                        <i class="icon icon-form-checkbox"></i>
                      </div>
                      <div class="item-inner">
                        <div class="item-title"><?php echo (!empty($departman['metin1'])?$departman['metin1']:''); ?></div>
                      </div>
                    </label>
                    <?php } ?>

                    <h2 style="margin-top:10px;">Departman harici personeli haberdar et</h2>
                    <?php $_Personel=z(1,"WHERE arsiv='0'",'','personel'); ?>
                    <?php foreach ($_Personel as $personel) if($bnmID!=$personel['ID']){ ?>
                    <label class="label-checkbox item-content">
                      <input type="checkbox" name="musteritakip[personelMulti][]" value="<?php echo $personel['ID']; ?>">
                      <div class="item-media">
                        <i class="icon icon-form-checkbox"></i>
                      </div>
                      <div class="item-inner">
                        <div class="item-title"><?php echo $personel['ad'].(!empty($personel['soyad'])?' '.$personel['soyad']:''); ?></div>
                      </div>
                    </label>
                    <?php } ?>

                </div>
              </div>
            </div>
            <!-- İLGİLİ DEPARTMANLARI SEÇ SON -->


            <div>&nbsp;</div>



            <?php require(__DIR__.'/hatirlatici-ekle-parca-html.php'); // Hatırlatma ekleme formunu dahil et ?>

            
            
                

            <p class="musteritakip-ekle-uyari-kutusu"></p>
            <input type="submit" name="submit" class="form_submit" id="musteritakip-ekle-submit-butonu" value="KAYDET" />
            <div class="progressbar-infinite musteritakip-ekle-yukleniyor" style="display: none; margin-top: 20px; background-color: #800;"></div>

          </form>
          </div>
        
        </div>
      </div>
      
      

    </div>
  </div>
</div>
<?php } ?>