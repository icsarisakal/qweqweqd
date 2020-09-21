<?php 
/*/if(z(8,'id','sayi') && z(8,'id','durum')){
		z(2,array(
			'personel_ID'=>$bnmID,
			'modul_ID'=>z(8,'id','sayi'),
			'modul'=>'musteritakip',
			'durum'=>z(8,'durum','sayi'),
			'tarih'=>
		),)
	}
	/*/
// Ajax üzerinden POST gönderimi gelmiş mi?
if(z(8,'ajaxform')){
  $json['mesaj']="Ajax işlem bitti";


  $tbl='asama';
  $_X=z(7,$tbl);


  if(z(8,'id','sayi')&&z(8,'durum','sayi')){
    $musteritakip_ID=z(8,'id','sayi');
    $durum=z(8,'durum','sayi');

    $secilenMusteriTakip=z(1,$musteritakip_ID,'ID,arsiv','musteritakip');
    if(!empty($secilenMusteriTakip)){

      $_X['personel_ID']=z('lgn','ID');
      $_X['tarih']=z('datetime');
      $_X['tarihKayit']=!empty($_X['tarihKayit'])?$_X['tarihKayit']:$_X['tarih'];
      $_X['aciklama']=!empty($_X['aciklama'])?$_X['aciklama']:'';
      $_X['modul']='musteritakip';
      $_X['modul_ID']=$musteritakip_ID;
      $_X['durum']=$durum;

      $ayniAsama=z(1,$_X,'ID,arsiv','musteritakip');
      if(empty($ayniAsama)){
        $SID=z(2,$_X,$tbl);
      }
      else{
        $SID=$ayniAsama[0]['ID'];
      }

      //$SID=z(2,$_X,$tbl);
      if(!empty($SID)){

        $json['sonuc']=1;
        $json['cevap']=array(
          'asama_ID'=>$SID,
          'ID'=>$musteritakip_ID
        );
        $json['mesaj']='✔ '.$ayr['mobix']['mtn'][4].' durumu başarı ile değiştirildi.';

        z(3,$musteritakip_ID,array('asama'=>$durum),'musteritakip');

        $tbl='musteritakip';
        $SID=$musteritakip_ID;
        // Hatırlatma eklenmesi istenmiş ise bu dosya otomatik olarak hatırlatmayı ekleyip sonid(SID) ye ilişkilendirecek
        require(__DIR__.'/hatirlatici-ekle-parca-post.php');

        if(!empty($json['cevap']['hatirlaticiAnahtar'])){
          if(!empty($json['cevap']['hatirlatici_ID'])){
            $json['mesaj'].=" Ayrıca hatırlatması başarı ile oluşturuldu.";
          }
          else{
            $json['mesaj'].=" Fakat hatırlatma kaydı oluşturulamadı. Lütfen ".$ayr['mobix']['mtn'][5]." detay sayfasındaki hatırlatmalar bölümünü kontrol ediniz.";
          }
        }



      }
      else{
          $json['mesaj']="Kayıt başarısız. Lütfen alanları kontrol ediniz.";
      }
      



    }
    else{
      $json['mesaj']='<div style="color:red;margin-top:10px;">Girdi belirtilmemiş.</div>';
    }

  }
  else $json['mesaj']="Get bilgileri eksik";

} 

// Post yok normal sayfa isteniyor ise htmli ekrana dök
else { 

$ID=z(8,'id','sayi');
$durum=z(8,'durum','sayi');
?>
<div class="pages">
  <div data-page="musteritakip-durum-degistir" class="page no-toolbar no-navbar">
    <div class="page-content">
    
      <div class="navbarpages">
          <div class="navbarpages">
        <div class="nav_left_logo" style="color:white; font-size:30px; line-height: 50px; width: 80%;">DURUM DEĞİŞTİR</div>
        <div class="nav_right_button" style=" width: 15%;">
            <a href="#" class="backbutton"><img src="mobix/images/icons/white/back.png" alt="" title="" /></a>
        </div>
      </div>
      </div>


      <div id="pages_maincontent">

        <div class="page_content"> 

          <div class="contactform">
          <form action="ajaxayar.php?s=musteritakip&a=mobix-durum-degistir&ajaxform=1&id=<?php _z(8,'id','sayi') ?>&durum=<?php _z(8,'durum','sayi') ?>" method="post" id="form-musteritakip-durum-degistir" onsubmit="return ajaxPostGonder( 'form-musteritakip-durum-degistir', function(sonucText){
              console.log(sonucText);
              if(sonucText && sonucText.length>1){
                var sonucJson=JSON.parse(sonucText);
                if(sonucJson.sonuc==1){
                  console.log(sonucJson);
                  myApp.addNotification({
                    title: sonucJson.mesaj,
                    hold:1000
                  });
                  setTimeout(function(){
                    myApp.mainView.history=['/'];
                    mainView.router.load({'url':'yalinsayfa.php?s=musteritakip&a=mobix-detay&id='+sonucJson.cevap.ID+'&asama_ID='+sonucJson.cevap.asama_ID});
                  },1000);

                }
                else{
                  $('.musteritakip-durum-degistir-uyari-kutusu').html(sonucJson.mesaj).slideDown();
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



            <?php 
              // Müşteri takip girdisinin aşamalarını ardından aşamalardaki personelleri son olarak ise durumların isim, renk ve simgelerini oku
              $_AsamaDurum=z(37,z(1,"WHERE ad='asama' AND sayi1='".$durum."'",'ID,sayi1,metin1,metin2,metin3','nesne'),'sayi1');
            ?>
            <p style="margin-top:20px; padding-bottom: 6px; display: block;">
              <?php if(!empty($_AsamaDurum))foreach($_AsamaDurum as $asDrm){ ?>
              <a
                class="button_full"
                style="background:url(mobix/images/icons/white/<?php echo $asDrm['metin3'] ?>.png) no-repeat <?php echo $asDrm['metin2'] ?>; 
                	background-size: 30px; 
                	background-position: 4px; 
                	text-indent: 40px;
	                margin-bottom: 0;
	                text-align: left;
                "
              >
                <b><?php echo $asDrm['metin1'] ?></b>
              </a>
              <?php } ?>
            </p>
            <label>Yeni Durumun Açıklaması</label>
            <textarea name="asama[aciklama]" class="form_textarea" rows="" cols="" autofocus="autofocus"></textarea>

            <label>Durumun Tarihi</label>
            <input type="text" name="asama[tarihKayit]" value="<?php _z('datetime') ?>" placeholder="" class="form_input jstarihsaat" autocomplete="off" />


            <?php require(__DIR__.'/hatirlatici-ekle-parca-html.php'); // Hatırlatma ekleme formunu dahil et ?>
            
            
                

            <p class="musteritakip-durum-degistir-uyari-kutusu"></p>
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