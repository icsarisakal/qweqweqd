<div class="menu">
	<a href="?"><img src="img/logo.png" style="float:left;height:40px;margin-left:10px;" /></a>
    <div class="sag"><a href="?cikis=1">Çıkış</a><a href="?s=uyeler&a=profil"><?Php _z('lgn','ad')?></a><?Php /*for($i=6;$i>0;$i--){?><a href="?s=<?Php _z(8,'s')?>&a=<?Php _z(8,'a')?>&id=<?Php _z(8,'id')?>&tm=<?Php echo $i?>" <?Php echo $tm==$i?'style="color:#ccc"':''?>>T<?Php echo $i?></a><?Php }*/?></div>
    <?Php $_MA=$admn;if(empty($_MA))foreach($_MTip as $mtip=>$mad)$_MA+=ytk($mtip,'listele');$_MA+=ytk('destek','listele');if($_MA){?>
	<ul>
    	<?Php
    	/*if($admn||ytk('market','listele')){?><li><a href="?s=anasayfa" id="s_anasayfa">&nbsp;ANASAYFA&nbsp;</a></li><?Php }*/
		/*/
		if($admn||ytk('ornekmodul','listele')){?><li><a href="?s=ornekmodul" id="s_ornekmodul">&nbsp;Örnek Modül&nbsp;</a></li><?Php }
		/*/
		
		if($admn||ytk('musteritakip','listele')){?><li><a href="?s=musteritakip" id="s_musteritakip">&nbsp;Müşteri Takip&nbsp;</a></li><?Php }
		if($admn||ytk('siparistakip','listele')){?><li><a href="?s=siparistakip" id="s_siparistakip">&nbsp;Sipariş Takip&nbsp;</a></li><?Php }
		if($admn||ytk('teklif','listele')){?><li><a href="?s=teklif" id="s_teklif">&nbsp;Teklifler&nbsp;</a></li><?Php }
		if($admn||ytk('urun','listele')){?><li><a href="?s=urun" id="s_urun">&nbsp;Ürünler&nbsp;</a></li><?Php }
		if($admn||ytk('hatirlatici','listele')){?><li><a href="?s=hatirlatici" id="s_hatirlatici">&nbsp;Hatırlatmalar&nbsp;</a></li><?Php }
	/*	if($admn||ytk('gelirgider','listele')){?><li><a href="?s=gelirgider" id="s_gelirgider">&nbsp;Gelir Gider&nbsp;</a></li><?Php }*/
		
		/*/
		if($admn||ytk('stok','listele')){?><li><a href="?s=stok" id="s_stok">&nbsp;Stok&nbsp;</a></li><?Php }
		if($admn||ytk('ceki','listele')){?><li><a href="?s=ceki" id="s_ceki">&nbsp;Çeki Listeleri&nbsp;</a></li><?Php }
		/*/
		if($admn||ytk('firma','listele')){?><li><a href="?s=firma" id="s_firma">&nbsp;Kurumlar/Firmalar&nbsp;</a></li><?Php }
		if($admn||ytk('rehber','listele')){?><li><a href="?s=rehber" id="s_rehber">&nbsp;Kişi Rehberi&nbsp;</a></li><?Php }
		if($admn||ytk('personel','listele')){?><li><a href="?s=personel" id="s_personel">&nbsp;Personel&nbsp;</a></li><?Php }
		if($admn||ytk('nesne','listele')){?><li><a href="?s=nesne" id="s_nesne">Nesneler</a></li><?Php }
		/*if($admn||ytk('zamanlanmisgorev','listele')){?><li><a href="?s=zamanlanmisgorev" id="s_zamanlanmisgorev">Zamanlanmış Görevler</a></li><?Php }*/
		/*if($admn||ytk('destek','listele')){?><li><a href="?s=destek" id="s_destek">Destek Talep</a></li><?Php }
		/*
		if($admn||ytk('notlar','listele')){?><li><a href="?s=notlar" id="s_notlar">Notlar</a></li><?Php }	
		/*/
		
    	if($admn||ytk('log','listele')){?><li><a href="?s=log" id="s_log" style="color:red">&nbsp;LOG KAYITLARI&nbsp;</a></li><?Php }
    ?>
    </ul>
    <?Php }?>
</div>

<style type="text/css">
	* {
		margin: 0;
		padding: 0;
		text-decoration: none;
		box-sizing: border-box;
	}


	body {
		background: #555;
	}

	header {
		position: relative;
		width: 100%;
		background: #333;
	}

	.mtlogo {
		position: relative;
		z-index: 123;
		padding: 0px;
		font: 18px verdana;
		color: #6DDB07;
		float: left;
	}

	.mtlogo a {
		color: #6DDB07;
	}

	nav {
		position: relative;
		width: 100%;
		margin: 0 auto;
	}

	#mtcssmenu,
	#mtcssmenu ul,
	#mtcssmenu ul li,
	#mtcssmenu ul li a,
	#mtcssmenu #mthead-mobile {
		border: 0;
		list-style: none;
		line-height: 1;
		display: block;
		position: relative;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		margin-bottom: 0;
	}

	#mtcssmenu:after,
	#mtcssmenu > ul:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0
	}

	#mtcssmenu #mthead-mobile {
		display: none
	}

	#mtcssmenu {
		font-family: sans-serif;
		background: #333
	}

	#mtcssmenu > ul > li {
		float: left
	}

	#mtcssmenu > ul > li > a {
		padding: 17px;
		font-size: 12px;
		letter-spacing: 1px;
		text-decoration: none;
		color: #ddd;
		font-weight: 700;
	}

	#mtcssmenu > ul > li:hover > a,
	#mtcssmenu ul li.active a {
		color: #fff
	}

	#mtcssmenu > ul > li:hover,
	#mtcssmenu ul li.active:hover,
	#mtcssmenu ul li.active,
	#mtcssmenu ul li.has-sub.active:hover {
		background: #448D00!important;
		-webkit-transition: background .3s ease;
		-ms-transition: background .3s ease;
		transition: background .3s ease;
	}

	#mtcssmenu > ul > li.has-sub > a {
		padding-right: 30px
	}

	#mtcssmenu > ul > li.has-sub > a:after {
		position: absolute;
		top: 22px;
		right: 11px;
		width: 8px;
		height: 2px;
		display: block;
		background: #ddd;
		content: ''
	}

	#mtcssmenu > ul > li.has-sub > a:before {
		position: absolute;
		top: 19px;
		right: 14px;
		display: block;
		width: 2px;
		height: 8px;
		background: #ddd;
		content: '';
		-webkit-transition: all .25s ease;
		-ms-transition: all .25s ease;
		transition: all .25s ease
	}

	#mtcssmenu > ul > li.has-sub:hover > a:before {
		top: 23px;
		height: 0
	}

	#mtcssmenu ul ul {
		position: absolute;
		left: -9999px
	}

	#mtcssmenu ul ul li {
		height: 0;
		-webkit-transition: all .25s ease;
		-ms-transition: all .25s ease;
		background: #333;
		transition: all .25s ease
	}

	#mtcssmenu ul ul li:hover {}

	#mtcssmenu li:hover > ul {
		left: auto
	}

	#mtcssmenu li:hover > ul > li {
		height: 35px
	}

	#mtcssmenu ul ul ul {
		margin-left: 100%;
		top: 0
	}

	#mtcssmenu ul ul li a {
		border-bottom: 1px solid rgba(150, 150, 150, 0.15);
		padding: 11px 15px;
		width: 170px;
		font-size: 12px;
		text-decoration: none;
		color: #ddd;
		font-weight: 400;
	}

	#mtcssmenu ul ul li:last-child > a,
	#mtcssmenu ul ul li.last-item > a {
		border-bottom: 0
	}

	#mtcssmenu ul ul li:hover > a,
	#mtcssmenu ul ul li a:hover {
		color: #fff
	}

	#mtcssmenu ul ul li.has-sub > a:after {
		position: absolute;
		top: 16px;
		right: 11px;
		width: 8px;
		height: 2px;
		display: block;
		background: #ddd;
		content: ''
	}

	#mtcssmenu ul ul li.has-sub > a:before {
		position: absolute;
		top: 13px;
		right: 14px;
		display: block;
		width: 2px;
		height: 8px;
		background: #ddd;
		content: '';
		-webkit-transition: all .25s ease;
		-ms-transition: all .25s ease;
		transition: all .25s ease
	}

	#mtcssmenu ul ul > li.has-sub:hover > a:before {
		top: 17px;
		height: 0
	}

	#mtcssmenu ul ul li.has-sub:hover,
	#mtcssmenu ul li.has-sub ul li.has-sub ul li:hover {
		background: #363636;
	}

	#mtcssmenu ul ul ul li.active a {
		border-left: 1px solid #333
	}

	#mtcssmenu > ul > li.has-sub > ul > li.active > a,
	#mtcssmenu > ul ul > li.has-sub > ul > li.active > a {
		border-top: 1px solid #333
	}



	footer {
		background-color: #2a2a2a;
		color: #707070;
	}

	.footer-content {
		width: 90%;
		display: grid;
		grid-template-columns: 1fr;
		padding: 30px 10px;
		margin: auto;
	}

	.footer-content > div > h3 {
		color: #fff;
		font-weight: 500;
		text-align: center;
	}

	hr {
		display: block;
		border-width: 0.5px;
		border-color: #707070;
		margin-top: 0.5em;
	}

	.footer-content > div > h3 ~ p {
		padding: 15px 10px;
		line-height: 28px;
		font-size: 14px;
		text-align: justify;
	}

	.footer-content ul {
		list-style: none;
		margin: 0;
		padding: 0;
		text-align: center;
	}

	.footer-content ul:last-child{
		padding-top: 5px;
	}

	.footer-content li {
		font-size: 16px;
		padding: 7px 0;
		font-weight: 300;
	}

	.footer-content li:first-child {
		color: #fff;
		font-size: 16px;
	}

	.footer-content a {
		color: #707070;
		text-decoration: none;
		transition: .4s;
	}

	.menu a:hover {
		color: #fff;
	}

	.footer-content i {
		margin-right: 10px;
		transition: .4s;
	}

	.footer-content span i:hover {
		color: #fff;
	}

	.footer-content span i {
		font-size: 30px;
	}





	@media screen and (max-width:1000px) {
		.mtlogo {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 46px;
			text-align: center;
			padding: 5px 0 0 0;
			float: none
		}
		.mtlogo2 {
			display: none
		}
		nav {
			width: 100%;
		}
		#mtcssmenu {
			width: 100%
		}
		#mtcssmenu ul {
			width: 100%;
			display: none
		}
		#mtcssmenu ul li {
			width: 100%;
			border-top: 1px solid #444
		}
		#mtcssmenu ul li:hover {
			background: #363636;
		}
		#mtcssmenu ul ul li,
		#mtcssmenu li:hover > ul > li {
			height: auto
		}
		#mtcssmenu ul li a,
		#mtcssmenu ul ul li a {
			width: 100%;
			border-bottom: 0
		}
		#mtcssmenu > ul > li {
			float: none
		}
		#mtcssmenu ul ul li a {
			padding-left: 25px
		}
		#mtcssmenu ul ul li {
			background: #333!important;
		}
		#mtcssmenu ul ul li:hover {
			background: #363636!important
		}
		#mtcssmenu ul ul ul li a {
			padding-left: 35px
		}
		#mtcssmenu ul ul li a {
			color: #ddd;
			background: none
		}
		#mtcssmenu ul ul li:hover > a,
		#mtcssmenu ul ul li.active > a {
			color: #fff
		}
		#mtcssmenu ul ul,
		#mtcssmenu ul ul ul {
			position: relative;
			left: 0;
			width: 100%;
			margin: 0;
			text-align: left
		}
		#mtcssmenu > ul > li.has-sub > a:after,
		#mtcssmenu > ul > li.has-sub > a:before,
		#mtcssmenu ul ul > li.has-sub > a:after,
		#mtcssmenu ul ul > li.has-sub > a:before {
			display: none
		}
		#mtcssmenu #mthead-mobile {
			display: block;
			padding: 23px;
			color: #ddd;
			font-size: 12px;
			font-weight: 700
		}
		.button {
			width: 55px;
			height: 46px;
			position: absolute;
			right: 0;
			top: 0;
			cursor: pointer;
			z-index: 12399994;
		}
		.button:after {
			position: absolute;
			top: 22px;
			right: 20px;
			display: block;
			height: 4px;
			width: 20px;
			border-top: 2px solid #dddddd;
			border-bottom: 2px solid #dddddd;
			content: ''
		}
		.button:before {
			-webkit-transition: all .3s ease;
			-ms-transition: all .3s ease;
			transition: all .3s ease;
			position: absolute;
			top: 16px;
			right: 20px;
			display: block;
			height: 2px;
			width: 20px;
			background: #ddd;
			content: ''
		}
		.button.menu-opened:after {
			-webkit-transition: all .3s ease;
			-ms-transition: all .3s ease;
			transition: all .3s ease;
			top: 23px;
			border: 0;
			height: 2px;
			width: 19px;
			background: #fff;
			-webkit-transform: rotate(45deg);
			-moz-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			-o-transform: rotate(45deg);
			transform: rotate(45deg)
		}
		.button.menu-opened:before {
			top: 23px;
			background: #fff;
			width: 19px;
			-webkit-transform: rotate(-45deg);
			-moz-transform: rotate(-45deg);
			-ms-transform: rotate(-45deg);
			-o-transform: rotate(-45deg);
			transform: rotate(-45deg)
		}
		#mtcssmenu .submenu-button {
			position: absolute;
			z-index: 99;
			right: 0;
			top: 0;
			display: block;
			border-left: 1px solid #444;
			height: 46px;
			width: 46px;
			cursor: pointer
		}
		#mtcssmenu .submenu-button.submenu-opened {
			background: #262626
		}
		#mtcssmenu ul ul .submenu-button {
			height: 34px;
			width: 34px
		}
		#mtcssmenu .submenu-button:after {
			position: absolute;
			top: 22px;
			right: 19px;
			width: 8px;
			height: 2px;
			display: block;
			background: #ddd;
			content: ''
		}
		#mtcssmenu ul ul .submenu-button:after {
			top: 15px;
			right: 13px
		}
		#mtcssmenu .submenu-button.submenu-opened:after {
			background: #fff
		}
		#mtcssmenu .submenu-button:before {
			position: absolute;
			top: 19px;
			right: 22px;
			display: block;
			width: 2px;
			height: 8px;
			background: #ddd;
			content: ''
		}
		#mtcssmenu ul ul .submenu-button:before {
			top: 12px;
			right: 16px
		}
		#mtcssmenu .submenu-button.submenu-opened:before {
			display: none
		}
		#mtcssmenu ul ul ul li.active a {
			border-left: none
		}
		#mtcssmenu > ul > li.has-sub > ul > li.active > a,
		#mtcssmenu > ul ul > li.has-sub > ul > li.active > a {
			border-top: none
		}
	}

	@media only screen and (min-width: 992px) {
		.footer-content {
			width: 90%;
			grid-template-columns: 1fr 1fr 1fr;
		}

		.footer-content > div > h3 {
			text-align: left;
		}

		.footer-content > div > h3 ~ p {

		}

	}
</style>
<header>
	<nav id="mtcssmenu">
		<div class="mtlogo"><a href="./"><img src="./img/logo.png" alt="" width="42"></a></div>
		<div id="mthead-mobile"></div>
		<div class="button"></div>
		<ul>
			<?php /*/ ?><li class="active"><a href="#">Anasayfa</a></li><?php /*/ ?>
			<li><a href="#hakkimda">Hakkımda</a></li>
			<li><a href="#hizmetlerimiz">Alt Menü</a>
				<ul>
					<li><a href="#telmail">Tel/Mail</a></li>
					<li><a href="#ziyaret">Ziyaret</a></li>
					<li><a href="#teklif">Teklif</a></li>
					<li><a href="#sunum">Sunum</a></li>
					<li><a href="#sonkarar">Son Karar</a></li>
					<li><a href="#final">Final</a></li>
					<li><a href="#tumisler">Tüm İşler</a></li>
					<li><a href="#yeniisekle">Yeni İş Ekle</a></li>

					<?php /*/ ?>
					<li><a href="#">Takip Yazılımları</a>
						<ul>
							<li><a href="#erpcrm">ERP</a></li>
							<li><a href="#erpcrm">CRM</a></li>
						</ul>
					</li>
					<li><a href="#">Kurumsal</a>
						<ul>
							<li><a href="#">Wordpress</a></li>
							<li><a href="#">Özgün Kodlama</a></li>
						</ul>
					</li>
					<?php /*/ ?>
				</ul>
			</li>
			<li><a href="#iletisim">İletişim</a></li>
		</ul>
	</nav>
</header>
<script type="text/javascript">
	(function($) {
		$.fn.menumaker = function(options) {  
			var mtcssmenu = $(this), settings = $.extend({
				format: "dropdown",
				sticky: false
			}, options);
			return this.each(function() {
				$(this).find(".button").on('click', function(){
					$(this).toggleClass('menu-opened');
					var mainmenu = $(this).next('ul');
					if (mainmenu.hasClass('open')) { 
						mainmenu.slideToggle().removeClass('open');
					}
					else {
						mainmenu.slideToggle().addClass('open');
						if (settings.format === "dropdown") {
							mainmenu.find('ul').show();
						}
					}
				});
				mtcssmenu.find('li ul').parent().addClass('has-sub');
				multiTg = function() {
					mtcssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
					mtcssmenu.find('.submenu-button').on('click', function() {
						$(this).toggleClass('submenu-opened');
						if ($(this).siblings('ul').hasClass('open')) {
							$(this).siblings('ul').removeClass('open').slideToggle();
						}
						else {
							$(this).siblings('ul').addClass('open').slideToggle();
						}
					});
				};
				if (settings.format === 'multitoggle') multiTg();
				else mtcssmenu.addClass('dropdown');
				if (settings.sticky === true) mtcssmenu.css('position', 'fixed');
				resizeFix = function() {
					var mediasize = 1000;
					if ($( window ).width() > mediasize) {
						mtcssmenu.find('ul').show();
					}
					if ($(window).width() <= mediasize) {
						mtcssmenu.find('ul').hide().removeClass('open');
					}
				};
				resizeFix();
				return $(window).on('resize', resizeFix);
			});
		};
	})(jQuery);

	(function($){
		$(document).ready(function(){
			$("#mtcssmenu").menumaker({
				format: "multitoggle"
			});
		});
	})(jQuery);
</script>