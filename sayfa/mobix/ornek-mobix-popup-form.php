<?php 
// Ajax üzerinden POST gönderimi gelmiş mi?
if(z(8,'ajaxform')){
  $json['mesaj']="Ajax işlem";

  $_X=z(7,$tbl);
  if(!empty($_X)){
/*/
    $_X['personel_ID']=z('lgn','ID');
    $_X['tarih']=z('datetime');
    $_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
    $_X['sehir_ID']=!empty($_X['sehir_ID'])?$_X['sehir_ID']:0;
    $_X['firmaTip']=!empty($_X['firmaTip'])?$_X['firmaTip']:0;

    $ayniFirma=z(1,array(
      'personel_ID'=>$_X['personel_ID'],
      'arsiv'=>'0',
      'firmaTip'=>$_X['firmaTip'],
      'sehir_ID'=>$_X['sehir_ID'],
      'ad'=>$_X['ad']
    ),'ID,arsiv','firma');
    
    if(empty($ayniFirma[0])){
      $SID=z(2,$_X,$tbl);
    }
    else{
      $SID=$ayniFirma[0]['ID'];
    }

    if(!empty($SID)){

      $json['sonuc']=1;
      $json['cevap']=array(
        'ID'=>$SID,
        'ad'=>$_X['ad'],
      );
      $json['mesaj']="Yeni kurum kaydı başarı ile gerçekleştirildi.";

      $_KP=z(7,'kisi');
      if(!empty($_KP)){

        $_K=array(
          'arsiv'=>'0',
          'personel_ID'=>$_X['personel_ID'],
          'firma_ID'=>$SID,
          'tarih'=>$_X['tarih'],
          'ad'=>!empty($_KP['ad'])?$_KP['ad']:'',
          'soyad'=>!empty($_KP['soyad'])?$_KP['soyad']:'',
          'telCep1'=>!empty($_KP['telCep1'])?$_KP['telCep1']:''
        );
        $_KX=$_K;
        unset($_KX['tarih']);
        $ayniKisi=z(1,$_KX,'ID,arsiv','kisi');
        if(empty($ayniKisi[0])){
          $json['cevap']['kisi_ID']=z(2,$_K,'kisi');
        }
        else{
          $json['cevap']['kisi_ID']=$ayniKisi[0]['ID'];
        }
            
      }

    }
    else{
        $json['mesaj']="Kurum ekleme işlemi başarısız. Lütfen alanları kontrol ediniz.";
    }
    /*/
  }

} 

// Post yok normal sayfa isteniyor ise htmli ekrana dök
else { ?>
<div class="popup popup-musteritakip-durum-degistir" style="background-color: #263239;">
    <div class="content-block-login">
      <h4>Durumu Değiştir</h4>
      <div class="contactform">
        <form action="ajaxayar.php?s=musteritakip&a=mobix-popup-durum-degistir&ajaxform=1" method="post" id="form-musteritakip-durum-degistir" onsubmit="return ajaxPostGonder( 'form-musteritakip-durum-degistir', function(sonucText){

            if(sonucText && sonucText.length>1){
              var sonucJson=JSON.parse(sonucText);
              if(sonucJson.sonuc==1){
                myApp.closeModal('.popup-musteritakip-durum-degistir');
                window.location.reload();
              }
              else{
                $('.giris-uyari-kutusu').html(sonucJson.mesaj).slideDown();
              }
            }
            
          });">

	        <p></p>
	        <label>Durum Açıklaması *</label>
	        <textarea name="musteritakip[aciklama]" class="form_textarea" required="required" rows="" cols=""></textarea>

          
          <label>Kurum Adı *</label>
          <input type="text" placeholder="" name="firma[ad]" required="required" class="form_input" id="popup-firma-ekle-firmaAd" autocomplete="off">
          
          <?php $_Il=z(1,"ORDER BY sehir_key",'','sehir'); ?>
          <label>İl Seçiniz</label>
          <div class="selector_overlay">
            <select name="firma[sehir_ID]" class="cs-select cs-skin-overlay selectoptions" >
              <option value="" selected>&nbsp;</option>
              <?php foreach($_Il as $il){ ?>
              <option value="<?php echo $il['sehir_id'] ?>"><?php echo $il['sehir_key'].'&nbsp;&nbsp;'.$il['sehir_title']; ?></option>
              <?php } ?>
            </select>
          </div>

          <hr>

          <label>İlgili Kişi Adı</label>
          <input type="text" placeholder="" name="kisi[ad]" class="form_input" autocomplete="off">
          
          <label>İlgili Kişi Soyadı</label>
          <input type="text" placeholder="" name="kisi[soyad]" class="form_input" autocomplete="off">
          
          <label>İlgili Kişi Telefon Numarası</label>
          <input type="text" placeholder="" name="kisi[telCep1]" class="form_input" autocomplete="off">
          
          <input type="submit" name="submit" class="form_submit" value="Kurumu Kaydet" />
        </form>
      </div>

      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
<?php } ?>