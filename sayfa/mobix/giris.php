<?php if(z(7,'kullanici')&&z(7,'sifre')){

// Post var giriş işlemini gerçekleştir

$_Log['nesne']='personel';
$_Log['islem']='giris';

z('lgna','hataliGiris',array('hataliGiris',$ayr['hataliGirisAdet'],'bloke',1));
$lsnc=z('lgn',array(z(9,'kullanici'),z(9,'sifre'),1,1,0));
if($lsnc==1){
	$json['mesaj']="Başarıyla giriş yapıldı";
	$json['sonuc']="1";	  
}
else{
	$json['mesaj']="Kullanıcı adı veya parola hatalı.";
	$json['sonuc']="2";		
}

$_Log['sonuc']=$lsnc;
$_Log['mesaj']=1;
require('parca/log.php');



// POST yok giriş formunu göster
} else { ?>
<div class="popup popup-login modal-in" style="display: block;">
<div class="content-block-login">
  <div style="border-top:2px solid #811308; margin:30px 30px 0 30px; border-radius: 100%;"></div>
  <div class="form_logo">
    <h1 style="font-size: 50px;"><?php echo $ayr['siteAd'] ?></h1>
    <h2 style="font-size: 14px;"><?php echo $ayr['firmaAd'] ?></h2>
  </div>
  <div style="border-top:2px solid #811308; margin:40px 30px 20px 30px; border-radius: 100%;"></div>
  <h4>PERSONEL GİRİŞİ</h4>
  <div class="loginform">
    <form id="LoginForm" method="post" method="post" action="ajax.php?s=mobix&a=giris" onsubmit="return ajaxPostGonder( 'LoginForm', function(sonucText){
        if(sonucText && sonucText.length>1){
          var sonucJson=JSON.parse(sonucText);
          if(sonucJson.sonuc==1){
            localStorage.onesignalUserId='';

            /*/
            if($('div[data-page=index]').length>0){
              if(onesignalUserIdKaydet)onesignalUserIdKaydet();
              window.location.href='#!/girisBasarili';
            }
            else{
              /*/
              //mainView.router.load({'url':'yalinsayfa.php?s=mobix&a=anasayfa'});
              window.location.href='./';
            //}
          }
          else{
            $('.giris-uyari-kutusu').html(sonucJson.mesaj).slideDown();
          }
        }

        $('.giris-yukleniyor').fadeOut();
        $('.giris-submit-btn').animate({'opacity':1});
      },function(){
        $('.giris-uyari-kutusu').html('').hide();
        $('.giris-yukleniyor').fadeIn();
        $('.giris-submit-btn').animate({'opacity':0.3});
      });">
      <input type="text" name="kullanici" value="" class="form_input required" placeholder="username" required="required">
      <input type="password" name="sifre" value="" class="form_input required" placeholder="password" required="required">
      <input type="submit" name="submit" class="form_submit giris-submit-btn" id="submit" value="GİRİŞ YAP">
      <div class="giris-uyari-kutusu" style="padding: 20px 0 10px 0; display: none;" ></div>
      <div class="progressbar-infinite giris-yukleniyor" style="display: none; margin-top: 20px; background-color: #800;"></div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
  window.onresize=function(){ window.scrollTo(0,document.body.scrollHeight); };
</script>
<?php } ?>