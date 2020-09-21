<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="icon" type="image/x-icon" href="img/favicon.ico" />
<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.png">
<title><?php echo $ayr['siteAd'] ?></title>
<link rel="stylesheet" href="mobix/css/framework7.css">
<link rel="stylesheet" href="mobix/style.css">
<link rel="stylesheet" href="mobix/css/colors/red.css">
<link type="text/css" rel="stylesheet" href="mobix/css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="mobix/css/animations.css" />
<link rel="stylesheet" href="css/jquery.datetimepicker.css">
<link rel="stylesheet" href="mobix/style-bizim.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
</head>
<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-cover">
          <div class="user_login_info">
            <div class="user_thumb">
              <?php /*/ ?>
              <div style="display: block; color: white;font-size: 14px; padding: 20px 0 80px 0; text-align: center;"><?php echo $ayr['firmaAd'] ?></div>
              <?php /*/ ?>
              <img src="img/logo3.jpg">
              <div class="user_details">
               <p>Merhaba, <span><?php _z('lgn','ad') ?></span></p>
              </div>  
              <div class="user_social">
                <?php /*/ ?>
                <a href="#" data-popup=".popup-social" class="open-popup"><img src="mobix/images/icons/white/twitter.png" alt="" title="" /></a>
                <?php /*/ ?>
              </div>       
            </div>

                  <nav class="user-nav">
                    <ul>
                      <?php /*/ ?>
                      <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/briefcase.png" alt="" title="" /><span>Hesap</span></a></li>
                      <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/message.png" alt="" title="" /><span>Mesajlar</span><strong class="green">12</strong></a></li>
                      <li><a href="features.html" class="close-panel"><img src="mobix/images/icons/white/download.png" alt="" title="" /><span>İndirmeler</span><strong class="blue">5</strong></a></li>
                      <?php /*/ ?>
                      <li><a href="yalinsayfa.php?s=musteritakip&a=mobix-ekle" class="close-panel"><img src="mobix/images/icons/white/plus.png" alt="" title="" /><span>Yeni <?php echo $ayr['mobix']['mtn'][1] ?> Oluştur</span></a></li>
                      <li><a href="yalinsayfa.php?s=mobix&a=cikis" class="close-panel"><img src="mobix/images/icons/white/lock.png" alt="" title="" /><span>Çıkış</span></a></li>
                    </ul>
                  </nav>
          </div>
    </div>

    <?php /*/ ?>
    <div class="panel panel-right panel-cover"> 
        <h2>Ara</h2>
        <div class="search_form">
        <form id="SearchForm" method="post">
        <input type="text" name="keyword" value="" class="search_input" placeholder="keyword" />
        <input type="image" name="submit" class="search_submit" id="submit" src="images/icons/white/search.png" />
        </form>
        </div>
        <div class="clear"></div>
        <h3>POPÜLER YAZILAR</h3>
        <ul class="popular_posts">
        <li>
        <a href="blog-single.html" class="close-panel"><img src="mobix/images/photos/photo1.jpg" alt="" title="" /></a>
        <span><a href="blog-single.html" class="close-panel">Design is not just what it looks like and feels like.</a></span>        </li>
        <li>
        <a href="blog-single.html" class="close-panel"><img src="mobix/images/photos/photo2.jpg" alt="" title="" /></a>
        <span><a href="blog-single.html" class="close-panel">Fashion fades, only style remains the same.</a></span>        </li>
        <li>
        <a href="blog-single.html" class="close-panel"><img src="mobix/images/photos/photo3.jpg" alt="" title="" /></a>
        <span><a href="blog-single.html" class="close-panel">Sed ut perspiciatis unde omnis iste accusantium.</a></span>        </li>
        <li>
        <a href="blog-single.html" class="close-panel"><img src="mobix/images/photos/photo4.jpg" alt="" title="" /></a>
        <span><a href="blog-single.html" class="close-panel">Nemo enim ipsam voluptatem quia voluptas.</a></span>        </li>
        <li>
        <a href="blog-single.html" class="close-panel"><img src="mobix/images/photos/photo5.jpg" alt="" title="" /></a>
        <span><a href="blog-single.html" class="close-panel">Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</a></span>        </li>
        </ul>
    </div>
    <?php /*/ ?>

    <div class="views">

      <div class="view view-main">

        <?php
          if(z('lgn')){
            require(__DIR__.'/sayfa/mobix/anasayfa.php');
          }
          else {
            require(__DIR__.'/sayfa/mobix/giris.php');
          } 
          ?>

        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner">
            <ul class="toolbar_icons">
              <li><a href="yalinsayfa.php?s=musteritakip&a=mobix-ekle"><img src="mobix/images/icons/white/plus.png" alt="" title="Yeni İş Oluşturun" /></a></li>
              <li><a href="yalinsayfa.php?s=hatirlatici&a=mobix-ekle"><img src="mobix/images/icons/white/blog-plus.png" alt="" title="Bağımsız Hatırlatma Ekleyin" /></a></li>
              <li class="menuicon" style="background-color: #b00"><a href="yalinsayfa.php?s=mobix&a=anasayfa"><img src="mobix/images/icons/white/home.png" alt="" title="" /></a></li>
              <li><a href="yalinsayfa.php?s=hatirlatici&a=mobix-listele"><img src="mobix/images/icons/white/blog.png" alt="" title="Hatırlatmalarım" /></a></li>
              <li><a href="#" data-panel="left" class="open-panel"><img src="mobix/images/icons/white/settings.png" alt="" title="" /></a></li>
            </ul>
          </div>  
        </div>

      </div>
    </div>
 
    
    <?php /*/ ?>
    <!-- Login Popup -->
    <div class="popup popup-login">
    <div class="content-block-login">
      <h4>GİRİŞ YAP</h4>
      <div class="form_logo"><img src="mobix/images/logo.png" alt="" title="" /></div>
      <div class="loginform">
        <form id="LoginForm" method="post">
          <input type="text" name="kullanici" value="" class="form_input required" placeholder="username" />
          <input type="password" name="sifre" value="" class="form_input required" placeholder="password" />
          <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Forgot Password?</a></div>
          <input type="submit" name="submit" class="form_submit" id="submit" value="GİRİŞ YAP" />
        </form>
        <div class="signup_bottom">
          <p>Don't have an account?</p>
          <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
        </div>
      </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    <?php /*/ ?>
    
    <?php /*/ ?>
    <!-- Register Popup -->
    <div class="popup popup-signup">
    <div class="content-block-login">
      <h4>REGISTER</h4>
      <div class="form_logo"><img src="mobix/images/logo.png" alt="" title="" /></div>
        <div class="loginform">
          <form id="LoginForm" method="post">
            <input type="text" name="Username" value="" class="form_input required" placeholder="username" />
            <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
            <input type="password" name="Password" value="" class="form_input required" placeholder="password" />
            <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN UP" />
          </form>
          <div class="signup_social">
            <a href="#" class="signup_facebook">FACEBOOK</a>
            <a href="#" class="signup_twitter">TWITTER</a>
          </div>
        </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    
    <!-- Login Popup -->
    <div class="popup popup-forgot">
    <div class="content-block-login">
      <h4>FORGOT PASSWORD</h4>
      <div class="form_logo"><img src="mobix/images/logo.png" alt="" title="" /></div>
            <div class="loginform">
            <form id="LoginForm" method="post">
            <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
            <input type="submit" name="submit" class="form_submit" id="submit" value="RESEND PASSWORD" />
            </form>
            <div class="signup_bottom">
            <p>Check your email and follow the instructions to reset your password.</p>
            </div>
            </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    <?php /*/ ?>
    
    
    <?php /*/ ?>
    <!-- Social Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Follow Us</h4>
      <p>Social icons solution that allows you share and increase your social popularity.</p>
      <ul class="social_share">
      <li><a href="#"><img src="mobix/images/icons/white/twitter.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="mobix/images/icons/white/facebook.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="mobix/images/icons/white/googleplus.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="mobix/images/icons/white/dribbble.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="mobix/images/icons/white/linkedin.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="mobix/images/icons/white/pinterest.png" alt="" title="" /></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup"><img src="mobix/images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>
    <?php /*/ ?>


    <!-- Kurum Ekle Popup -->
    <?php require(__DIR__.'/sayfa/firma/mobix-ekle-popup.php'); ?>
    
    <script type="text/javascript" src="mobix/js/jquery-1.10.1.min.js"></script>
    <script src="mobix/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="mobix/js/framework7.js"></script>
    <script type="text/javascript" src="mobix/js/classie.js"></script>
    <script type="text/javascript" src="mobix/js/selectFx.js"></script>
    <script type="text/javascript" src="mobix/js/my-app.js"></script>
    <script type="text/javascript" src="mobix/js/bizim.js"></script>
    <script type="text/javascript" src="mobix/js/jquery.swipebox.js"></script>
    <script type="text/javascript" src="mobix/js/email.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
    
    <!-- Bildirim Kontrol Js -->
    <?php if(z('lgn')){
      require(__DIR__.'/class/onesignal/onesignal_js.php');
      require(__DIR__.'/sayfa/mobix/bildirim-kontrol-js.php');
    } ?>
  </body>
</html>