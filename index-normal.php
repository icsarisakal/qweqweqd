<style>


.sidebar-content::-webkit-scrollbar{
	display:none;
}


</style>

<?Php


//mymenu modülü için veri tabanında mymenu tablosunda personel kaydı olup olmadığını kontrol eder...
function yenikayit($innn){

   
	if(empty($innn)){z(2,['personel_ID'=>z('lgn','ID')],'mymenu'); header("Refresh:0");}


}
//mymenu bitis



if(z('lgn')){
	$personelcek=z(1,z('lgn','ID'),'','personel');
	$online_info = ['personel_ID' => $personelcek['ID'] , 'girisTarih' => z('datetime')];
	$vt_check = z(1,"WHERE personel_ID = ".$personelcek['ID'],"","online");
	
	if (empty($vt_check)){
		$online_Users=z(2,$online_info,'online'); 
	}
	$persmail=$personelcek['meposta'];
	$perssifre=$personelcek['msifre'];
	
	//mymenu baslangic
	$mymenukontrolet= z(1,'WHERE personel_ID='.$personelcek['ID'],'','mymenu');
	
	
	yenikayit($mymenukontrolet);
	//mymenubitis
}

// Kullanıcı Girişi
if(z(9,'kullanici')&&z(9,'sifre')){
	$_Log['nesne']='personel';
	$_Log['islem']='giris';
	
	z('lgna','hataliGiris',array('hataliGiris',$ayr['hataliGirisAdet'],'bloke',1));
	$lsnc=z('lgn',array(z(9,'kullanici'),z(9,'sifre'),z(9,'hatirla'),1,0));
	if($lsnc==1){
		$sGet=z(8,'s')?'s='.z(8,'s'):'s='.$ayr['anaS'];
		$sGet.=z(8,'a')?'&a='.z(8,'a'):'';
		$sGet.=z(8,'id')?'&id='.z(8,'id'):'';
		$sGet.=z(8,'kod')?'&kod='.z(8,'kod'):'';
		$_Log['sonuc']=$lsnc;
		$_Log['mesaj']=1;
		require('parca/log.php');
		header('Location: ?'.$sGet);
		die;
	}
	else if($lsnc==11){
		_uyr(2,'Üyeliğiniz aktif edilmemiş!');
		$_Log['mesaj']=11;
	}
	else if($lsnc==12){
		_uyr(2,'Üyeliğiniz '.$ayr['hataliGirisAdet'].' sefer hatalı giriş nedeni ile bloke edilmiş! Lütfen yetkililere bildiriniz.');
		$_Log['mesaj']=12;
	}
	else if($lsnc==100||$lsnc==101){
		_uyr(2,'Üyeliğiniz '.$ayr['hataliGirisAdet'].' sefer hatalı giriş nedeni ile bloke edildi!');
		$_Log['mesaj']=$lsnc-87;
	}
	else{
		_uyr(2,'Kullanıcı adı veya parola hatalı! '.($lsnc>110?'('.($lsnc-110).'/'.$ayr['hataliGirisAdet'].')':''));
		$_Log['mesaj']='[MESAJ]2[/MESAJ] '.($lsnc>110?'('.($lsnc-110).'/'.$ayr['hataliGirisAdet'].')':'');
		z('lgn','');
	}
	
	$_Log['sonuc']=$lsnc;
	require('parca/log.php');
	
}else if(z(8,'cikis')){
	if(z('lgn')){
		$_Log=array('nesne'=>'personel','islem'=>'cikis','sonuc'=>1,'mesaj'=>3);
		require('parca/log.php');
	}
	z('lgn','');
}
z('lgn');


?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/ico" href="img/favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<title><?Php echo $TITLE; ?></title>
	<link rel="stylesheet" href="css/style<?Php if(z(8,'tm')){$tm=z(8,'tm');z(12,'tema',$tm);}else $tm=z(12,'tema');echo !empty($tm)?$tm:8?>.css">
	<link rel="stylesheet" href="css/flatpickr.css">
	<link rel="stylesheet" type="text/css" href="css/kur.css"> 
	<link rel="stylesheet" href="css/genel11.css">
	<link rel="stylesheet" href="css/panel2-1.css">
	<link rel="stylesheet" href="css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<!--<link rel="stylesheet" href="css/select2.min.css" />-->
	<link rel="stylesheet" href="css/header-sticky.css">

	<!-- Global tema stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="full/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="full/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="full/assets/css/components2.min.css" rel="stylesheet" type="text/css">
	<link href="full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global tema stylesheets -->


	<style type="text/css">
		#s_<?php echo z(8,'s')?z(8,'s'):$ayr['anaS']?>{ background:url(img/h50bg.png); }
		#a_<?php echo z(8,'a')?z(8,'a'):'listele'?>{ background:url(img/h50bg.png); background-position: 2px 2px; color:#fff;}
		body{ background-color: #f8f8f8 !important; }
	</style>
	<script type="text/javascript">
		window.onload=function(){ document.body.style.opacity=1;};
	</script>
	<script src="js/jq-1.8.js"></script>
	<script src="js/jquery.searchabledropdown-1.0.8.min.js"></script>
	<script src="js/genel-07.js"></script>	
	<script src="js/panel2-1.js"></script>
	<script src="js/form.js"></script>
	<script src="js/uyanikkal.js"></script>
	<script src="js/header-sticky.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>

	<!-- Core tema JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	
	<!-- /core tema JS files -->

	<!-- Theme tema JS files -->
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="full/assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="global_assets/js/demo_pages/form_select2.js"></script>
	<script src="global_assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script src="global_assets/js/demo_pages/picker_date.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>


	<!-- /theme tema JS files -->
	


	<?php
	//echo phpinfo();
	$scek=z(8,'s');
	$acek=z(8,'a');
	$sacek=$scek.$acek;
	?>
	<?php if(z('lgn')){ require('sayfa/pamuk/verioku.php'); } ?>
	<?php if(z('lgn')&&$sacek!='teklifekle'&&$sacek!='teklifduzenle'){ ?>
		<script src="js/hatirlat.js"></script>
		<!--<script src="js/musteritakipKontrol.js"></script>-->
	<?php } ?>
	<?Php /* if($admn){?><script src="js/siparisKontrol.js"></script><?Php } 
	if(!empty($ayr['destekA'])&&z('lgn')&&$sacek!='teklifekle'&&$sacek!='teklifduzenle'){?><script src="js/destekKontrol.js"></script>	<?Php } */ ?>
	<?php $sidebarcontrol=z(11,'sidebarcontrol');  ?>
		<script type="text/javascript">
			$( document ).ready(function() {

				$(".yenitarih").datetimepicker( {
				    format:'Y-m-d',
				    lang:'tr',
				    timepicker:false,
				}).on('change', function (ev) {
				    $(this).datetimepicker('hide');
				});
				$( ".allcheck" ).click(function() {
					if($(this).find('.secilebilir').is(':not(:checked)')){
							$(this).find('.secilebilir').prop('checked',true);
					}
					else if($(this).find('.secilebilir').prop('checked')==true){
							$(this).find('.secilebilir').prop('checked',false);
					}
				});

				$( ".secilebilir" ).click(function() {
					if($(this).is(':not(:checked)')){
							$(this).prop('checked',true);
					}
					else if($(this).prop('checked')==true){
							$(this).prop('checked',false);
					}
				});

				var sidebarcontrol=window.localStorage['sidebarcontrol'];
				$( ".sidebar-control" ).click(function() {
					var sidebarcontrol=window.localStorage['sidebarcontrol'];
					if(sidebarcontrol=='acik'){
						window.localStorage['sidebarcontrol']='kapali';
					} else if(sidebarcontrol=='kapali'){
						window.localStorage['sidebarcontrol']='acik';
					} else {
						window.localStorage['sidebarcontrol']='acik';
					}
				});

				if(sidebarcontrol=='kapali'){
					$('.sidebar-control').click();
					window.localStorage['sidebarcontrol']='kapali';
				}

			});
        	function filtreyetikla(ths){
			    var araGizliGrup=$(ths).parent().find("div");
			    $(".araGrupBtn").click(function(){
					//$(araGizliGrup).toggle();
				});
			}
		</script>
		<script>
			$( document ).ready(function() {
				var browser = function() {
				// Return cached result if avalible, else get result then cache it.
				if (browser.prototype._cachedResult)
					return browser.prototype._cachedResult;
					// Safari 3.0+ "[object HTMLElementConstructor]" 
					var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					// Chrome 1+
					var isChrome = !!window.chrome && !!window.chrome.webstore;
					return browser.prototype._cachedResult =
						isSafari ? 'Safari' :
						isChrome ? 'Chrome' :
						"Don't know";
				};
				$(".dty").css("display","contents");
				if(browser()=='Safari'){
					$("tr").css("text-align","left");
					$(".navbar").css("min-height","50px");
					$(".card-sidebar-mobile").css("background","#2a3140");
					<?php if(z(8,'a')=='ekle'||z(8,'a')=='ekletedarik'||z(8,'a')=='eklekombinasyon'){ ?>
						$("td").css("border","none").css("background","white");
						$("th").css("border","none").css("background","white");
					<?php } ?>
					<?php if(z(8,'s')=='kumaskarti'&&z(8,'a')=='ekle'){ ?>
						//$(".navbar").css("height","180px");
					<?php } ?>
					<?php if(z(8,'s')=='kumaskarti'&&z(8,'a')=='duzenle'){ ?>
						//$(".navbar").css("height","180px");
					<?php } ?>
					$(".dty").css("padding","3px").css("text-indent","20px").css("background","none");
					console.log("safari");
					<?php if(z(8,'a')=='listele'||z(8,'a')=='rapor'){ ?>
						//$(".navbarsafari").css("padding","20px");
						//$(".navbarsafari").css("margin-bottom","15px");
					<?php } ?>
					<?php if(z(8,'s')=='kumaskarti'&&z(8,'a')=='ekle'){ ?>
						//$(".navbarsafari").css("padding","20px");
						//$(".navbarsafari").css("margin-bottom","55px");
					<?php } ?>
					<?php if(z(8,'s')=='cari'&&z(8,'a')=='ekle'){ ?>
						//$(".navbarsafari").css("padding","15px");
					<?php } ?>
					<?php if(z(8,'s')=='cari'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='makinaparkuru'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='kumaskarti'&&z(8,'a')=='listele'){ ?>
						//$(".navbarsafari").css("margin-bottom","20px");
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='yedekparca'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='personel'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='personel'&&z(8,'a')=='ekle'){ ?>
						//$(".navbarsafari").css("padding","15px");
					<?php } ?>
					<?php if(z(8,'s')=='pamuk'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("margin-bottom","0");
					<?php } ?>
					<?php if(z(8,'s')=='log'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("margin-bottom","0");
					<?php } ?>
					<?php if(z(8,'s')=='kur'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("margin-bottom","0");
					<?php } ?>
					<?php if(z(8,'s')=='einel'&&z(8,'a')=='listele'){ ?>
						$(".navbarsafari").css("margin-bottom","0");
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='iplik'&&z(8,'a')=='listele'){ ?>
						//$(".navbarsafari").css("margin-bottom","9%");
						$(".navbarsafari").css("padding","0");
					<?php } ?>
					<?php if(z(8,'s')=='kumasturu'&&z(8,'a')=='listele'){ ?>
						//$(".navbarsafari").css("margin-bottom","5%");
					<?php } ?>
					<?php if(z(8,'s')=='makinacesitleri'&&z(8,'a')=='listele'){ ?>
						//$(".navbarsafari").css("margin-bottom","5%");
					<?php } ?>
					<?php if(z(8,'s')=='kumaskarti'&&z(8,'a')=='ekletedarik'){ ?>
						//$(".navbarsafari").css("padding","20px");
						//$(".navbarsafari").css("margin-bottom","22px");
					<?php } ?>
					$(".dropdownsafari").css("margin-top","5px");
				}
			});

			
		</script>
</head>
<body>
	<style type="text/css">
		.articlegoster{
		}
		.araGizliGrup{
    		/*margin-left: 30px;*/
		}
		<?php if(z(8,'a')=='listele'){ ?>
		.table td, .table th, .table tr{
			background:none !important;
		}
		tr:hover{
			background:#a79579 !important;
			color:white;
		}
		.table td, .table th{
			border-left: none;
    		border-right: none;
			text-align:left !important;
		}
		<?php } ?>
		td{
			border-left: none !important;
			border-right: none !important;
			background:white !important;
		}
		th{
			border-left: none !important;
			border-right: none !important;
			background:white !important;
		}
		<?php if(z(8,'a')=='ekle'||z(8,'a')=='ekletedarik'||z(8,'a')=='eklekombinasyon'){ ?>
		td{
			border: none !important;
			background:white !important;
		}
		th{
			border: none !important;
			background:white !important;
		}
		.pusvefayntbody th{
			text-align:left;
		}
		<?php } ?>
		<?php if(z(8,'a')=='duzenle'||z(8,'a')=='duzenletedarik'||z(8,'a')=='duzenlekombinasyon'){ ?>
		td{
			border: none !important;
			background:white !important;
		}
		th{
			border: none !important;
			background:white !important;
		}
		.pusvefayntbody th{
			text-align:left;
		}
		<?php } ?>
		.bg-teal {
			background-color: #009688 !important;
			background: #009688 !important;
		}
		.extsidemenu{
			position: fixed;
			box-sizing: content-box;
			z-index: 1040;
			transition: all ease-in-out .15s;
			overflow-y: scroll;
		}
	</style>
	<?Php
	// Genel Uyarılar
	if(z(33,'siparisOnayla')==1)_uyr(1,'Sipariş formu başarıyla onaylandı.'.(!z('lgn','ID')?' Giriş yaparak detayı görüntüleyebilirsiniz.':''));
	if(z(33,'siparisReddet')==1)_uyr(4,'Sipariş formu reddedildi.'.(!z('lgn','ID')?' Giriş yaparak detayı görüntüleyebilirsiniz.':''));
	if(z(33,'sifreg')==1)_uyr(1,'Şifre güncelleme işlemi başarıyla gerçekleştirildi. Lütfen yeni şifrenizle giriş yapınız.');
	
	
	if(z('lgn')){ 

		$online_users = z(1,'','','online');
		?>
			<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center" style="margin-top:0;">
			<div align="center" class="navbar-brand navbar-brand-md" style="padding:0;">
			<a href="./">
				<img style="margin-left: -30px;height: 34px;" src="img/kaytekslogomuzz.png" class="img-fluid">
			</a>
			 <a style="text-decoration: none; display:none; font-family: Tahoma; font-size: 25px; color: white; font-weight: bold; text-shadow: gray 5px 5px 5px; " href="./">KAYTEKS</a>  	
			</div>
			
			<div class="navbar-brand navbar-brand-xs" style="padding:0;">
				<img style="margin-left: 8px;height: 34px;" src="img/kayteksyenilogo.png">
			</div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
			 <a style="text-decoration: none; font-family: Tahoma; font-size: 25px; color: black; font-weight: bold; text-shadow: gray 5px 5px 5px; " href="./">KAYTEKS</a>  
			</div>	

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse navbar-dark navbarsafari" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item sidebutton">
					<a href="#" id="navClick" class="navbar-nav-link sidebar-control sidebar-main-toggle  d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

	<span class=" ml-md-3 mr-md-auto">
	
	</span>

			<ul class="navbar-nav">
			
			<li class="nav-item dropdown dropdownsafari" >
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="d-md-none ml-2">Users</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"><?php echo count($online_users); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Çevrimiçi Kullanıcılar</span>

						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">

								<?php foreach ($online_users as $users) { 
									$onn=z(1,$users['personel_ID'],'ID,ad,kullanici,nesne_IDdepartman,img','personel'); 
									$dep = z(1,$onn['nesne_IDdepartman'],'metin1','nesne');
									$dep = ($onn['nesne_IDdepartman'] == 0 ? ' ':$dep) ; 
									//$pp = 'upload/kumaskarti/'.$personelcek['img'];//echo $pp;
									$onn['img'] = !empty($onn['img'])?'upload/kumaskarti/'.$onn['img']:'img/logo.jpg';
									$onn['ad']= !empty($onn['ad'])?$onn['ad']:'';
																			
									?>
									<li class="media">
									<div class="mr-3">
										<img <?php echo 'src='.$onn['img']; ?> width="36" height="36" class="rounded-circle" alt="">
									</div>
				
									<div class="media-body">
										<a href="<?php echo './?s=profil&a=detay&id='.$onn['ID']; ?>" class="media-title font-weight-semibold">
											<?php echo $onn['ad'];?>
										</a>
										<span class="d-block text-muted font-size-sm">
											<?php echo $dep; ?>
										</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>
								<?php } ?>				
							
							</ul>
						</div>
					</div>
				</li>



					<li class="nav-item dropdown dropdownsafari" id="mesajbox">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="d-md-none ml-2">Mesajlar</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0" id="bildirimKutusuSayi"></span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Mesajlar</span>
							<a href="?s=mesaj&a=gelenkutusu&yenimesaj=true" class="text-default"><img  class="yeniMesajIcon" style="widht:30px;height:30px;" src="upload/kumaskarti/yeniMesaj.png" alt=""></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable" id="gelenkutusubildirim">
							<ul>YENİ MESAJ YOK</ul>
						</div>

						<div class="dropdown-content-footer justify-content-center p-0">
							<a href="?s=mesaj&a=gelenkutusu&yenimesaj" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Gelen Kutusu"><i class="icon-menu7 d-block top-0"></i></a>
						</div>
					</div>
				</li>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<?php $personelcek['img'] = !empty($personelcek['img'])?'upload/kumaskarti/'.$personelcek['img']:'img/logo.jpg';?>
						<img <?php echo 'src='.$personelcek['img']?> class="rounded-circle mr-2" width="36" height="36" alt="">
						<span><?php if(!empty($personelcek)){ echo (!empty($personelcek['ad'])?$personelcek['ad']:''); } else { echo 'Yetkili Adı'; } ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">

						<a href="<?php echo './?s=profil&a=detay&id='.$personelcek['ID']; ?>" class="dropdown-item"><i class="icon-user-plus"></i>Profil Görüntüle</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="?s=mesaj&a=gelenkutusu&yenimesaj" class="dropdown-item"><i class="icon-comment-discussion"></i> Mesajlar <span  id="bildirimKutusuSayi2" class="badge badge-pill bg-blue ml-auto"></span></a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo './?s=profil&a=profiledit&id='.$personelcek['ID']; ?>" class="dropdown-item"><i class="icon-cog5"></i> Profil Düzenle</a>
						<a href="./?s=cikis&a=cikis" class="dropdown-item"><i class="icon-switch2"></i> Çıkış Yap</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
	</div>

<input hidden class="deger" type="text" name="id" value=<?php echo z('lgn','ID') ;?>> 

<?php /* ?>
<script type="text/javascript"> 
			$.noConflict(); // Çakışan kütüphanelerin çözümü (Anlık değişim yapmıyor güncel kurlar refresh yapıldığında geliyor)


			var tip =  $('#pair_66 .js-col-pair_name').clone().appendTo(".dt .eur");
			var eur_try_alis =  $('#pair_66 .pid-66-bid').clone().appendTo(".dt .eur");
			var eur_try_satis = $('#pair_66 .pid-66-ask').clone().appendTo(".dt .eur");
			var tip =  $('#pair_18 .js-col-pair_name').clone().appendTo(".dt .usd");
			var usd_try_alis =  $('#pair_18 .pid-18-bid').clone().appendTo(".dt .usd");
			var usd_try_satis = $('#pair_18 .pid-18-ask').clone().appendTo(".dt .usd");
			var tip =  $('#pair_97 .js-col-pair_name').clone().appendTo(".dt .gbp");
			var gbp_try_alis =  $('#pair_97 .pid-97-bid').clone().appendTo(".dt .gbp");
			var gbp_try_satis = $('#pair_97 .pid-97-ask').clone().appendTo(".dt .gbp");

			$('.dt').css("margin-left","250px");
			$('.dt a').removeAttr("href");
			$("link[href*='https://i-invdn-com.akamaized.net/invwidgets/css/liveCurrencyCrossRatesMin_v4d.css']").remove();
</script>
<?php */ ?>

<script type="text/javascript">

var deger = $('.deger').val();  
setInterval(function(){ 
    $.ajax({
    url: "ajaxsorgu.php?userid="+deger,
    success: function(response){
        //console.log(response);
        }
    });
},30000); // 30 sn'de bir gidip tarihi güncelleyecek

setInterval(function(){ 
    $.ajax({
    url: "check.php?",
    success: function(response){
        //console.log(response);
        }
    });
},30000); // 30 sn'de bir gidip tarih güncellenmiş mi diye bakacak. Eğer tarih 1 dakikadan fazla bir süre güncellenmemiş ise çıkış yapacak.


//mesaj gelen  kutusu bildirim baslangic


function yeniBildirimEkle(el){
	//console.log(el);
	$('#gelenkutusubildirim').prepend(el);


  }
var toplamSayisi=0;
function bildirimEkle(yenibildirim,el,id,personel_IDgonderen,ad,tarih,mesaj,sayisi,img){
     mesaj=mesaj+'...';
	if(sayisi<=0){


		
          
		el.append('<li class="media"><div class="mr-3 position-relative"><img src="upload/kumaskarti/'+img+'" width="36" height="36" class="rounded-circle" alt=""></div><div class="media-body"><div class="media-title"><a href="?s=mesaj&a=gelenkutusu&personel_IDgonderen='+personel_IDgonderen+'&ad='+ad+'"><span class="font-weight-semibold">'+ad+'</span><span class="text-muted float-right font-size-sm"></span></a></div><span class="text-muted">'+mesaj+'</span></div></li>');	    







}else {
	
	yenibildirim.prepend('<li class="media"><div class="mr-3 position-relative" ><img src="upload/kumaskarti/'+img+'" width="36" height="36" class="rounded-circle" alt=""></div><div class="media-body"><div class="media-title"><a href="?s=mesaj&a=gelenkutusu&personel_IDgonderen='+personel_IDgonderen+'&ad='+ad+'"><span class="font-weight-semibold">'+ad+'</span><span class="text-muted float-right font-size-sm"><span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">'+sayisi+'</span></span></a></div><span class="text-muted">'+mesaj+'</span></div></li>');	    
	
	
	
	
	toplamSayisi+=sayisi;
}


}






//gelen kutusu yenileme
var $_ajxControl = <?php echo json_encode($_GET); ?>;
if($_ajxControl['s']!='mesaj'){
setInterval(function(){ 
  // console.log('bildirim kutusu yenileme');
   
  
$.ajax({


	url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenkisiler&bildirimkutusu=1',
	success:function(e){
	//	console.log('ajax calisti');
	toplamSayisi=0;
	//alert('test');
	var dataMesajlar=e.cevap.bildirimkutusu;
	var personel_IDgonderenYeni=0
	var imgYeni='default_profile.png';
	var loginID=$('.deger').val();
	var gelenliste=[];
	var el=$('<ul id="bildirim" class="media-list"></ul>');
	var yenibildirim=$('<ul id="yenibildirim" class="media-list"></ul>');
	//console.log(sayi);

	dataMesajlar.forEach(function(key,value){


			if(key.personel_IDgonderen==loginID){

 				 personel_IDgonderenYeni=key.personel_IDalici;



			}else if(key.personel_IDalici==loginID){
  				personel_IDgonderenYeni=key.personel_IDgonderen;


			}
			// console.log('Sayisi: '+ key.yeniMesaj);
			// console.log('personel ıd gonderen '+key.personel_IDgonderen);
			// console.log('personel ıd alici '+key.personel_IDalici);
			// console.log('login id '+loginID);
		
			if(key.img!='yok'){imgYeni=key.img;}else{imgYeni='default_profile.png';}  
			
			bildirimEkle(yenibildirim,el,key.ID,personel_IDgonderenYeni,key.ad,key.tarih,key.mesaj,key.yeniMesaj,imgYeni);


	 

});


  

  

  
  $('#gelenkutusubildirim').html(el);  $('#bildirimKutusuSayi').text(toplamSayisi); $('#bildirimKutusuSayi2').text(toplamSayisi); yeniBildirimEkle(yenibildirim); }});}, 4000);


//tek seferlik bildirim yenileme ilk açılış
   
  
$.ajax({


	url:'ajaxayar.php?s=mesaj&a=ajaxsorgu&durum=gelenkisiler&bildirimkutusu=1',
	success:function(e){
	//	console.log('ajax calisti');
	toplamSayisi=0;
	//alert('test');
	var dataMesajlar=e.cevap.bildirimkutusu;
	var personel_IDgonderenYeni=0
	var imgYeni='default_profile.png';
	var loginID=$('.deger').val();
	var gelenliste=[];
	var el=$('<ul id="bildirim" class="media-list"></ul>');
	var yenibildirim=$('<ul id="yenibildirim" class="media-list"></ul>');
	//console.log(sayi);

	dataMesajlar.forEach(function(key,value){


			if(key.personel_IDgonderen==loginID){

 				 personel_IDgonderenYeni=key.personel_IDalici;



			}else if(key.personel_IDalici==loginID){
  				personel_IDgonderenYeni=key.personel_IDgonderen;


			}
			// console.log('Sayisi: '+ key.yeniMesaj);
			// console.log('personel ıd gonderen '+key.personel_IDgonderen);
			// console.log('personel ıd alici '+key.personel_IDalici);
			// console.log('login id '+loginID);
		
			if(key.img!='yok'){imgYeni=key.img;}else{imgYeni='default_profile.png';}  
			
			bildirimEkle(yenibildirim,el,key.ID,personel_IDgonderenYeni,key.ad,key.tarih,key.mesaj,key.yeniMesaj,imgYeni);


	 

});


  

  

  
  $('#gelenkutusubildirim').html(el);  $('#bildirimKutusuSayi').text(toplamSayisi); $('#bildirimKutusuSayi2').text(toplamSayisi); yeniBildirimEkle(yenibildirim); }});

}


//soldaki menuyu açmak kapamak için aşağıdaki buton

$(document).ready(function(){
	var sideW=$('.sidebar-content').width();
if(sideW>60){

	$('.sidebar-content').css({
		'position':'sticky',
		'top':'0px',
		'overflow':'auto',
		'height':'700px' 

	});

} else if(sideW<=60) {
	$('.sidebar-content').css({
		'position':'sticky',
		'top':'0px',
		'overflow':'visible',
		'height':'700px' 

	});

}		

//	alert('test');
$('#solMenu').append('<li class="nav-item nav-item-submenu"  ><a title="Sol menüyü açar kapatır...!" style="text-align:center !important; margin-left:auto; margin-right:auto; width:50px;" class="menuToggle nav-link"  href="#"><i class="icon-transmission"></i></a></li>');

$('.menuToggle').click(function(){
	$('#navClick').click();
});

$('#navClick').on('click',function(){

	var wdt=$('.sidebar-content').width();
	if(wdt<=60){
		
		$('.sidebar-content').css('overflow','visible');
		

	}else{
		$('.sidebar-content').css('overflow','auto');
	}



});





});

// bitis soldaki menuyu açmak kapamak için aşağıdaki buton 

</script>




	<!-- /main navbar -->
	<div class="page-content">

	<?php 
	require('parca/0sidebar.php');
	?>
	<div class="content-wrapper">
	<?php


		$useragent=$_SERVER['HTTP_USER_AGENT'];

	if(z(8,'s')){
		require('sayfa/'.z(8,'s').'.php');
		require(__DIR__.'/sayfa/hatirlatici/hatirlatici-modal.php');
	}
	else{
		require('sayfa/'.$ayr['anaS'].'.php');
		require(__DIR__.'/sayfa/hatirlatici/hatirlatici-modal.php');
	}
		
	//baslangic windowForm Kontrol ve yeniFiltreFront
	
	$modulAdi=z(8,'s');
	$modulBolum=z(8,'a');
	$kontrolListesiWindow=array('ekle','duzenle','rapor','listele_duzenle','eklekombinasyon','ekletedarik');
	$kontrolListesiFiltre=array('listele','listele_arsv1');
	$yasakliModul=array('mymenu','kumaskarti');
	if(!empty($_MTip[$modulAdi])){
		
		if(in_array($modulBolum,$kontrolListesiWindow)){
				
				require(__DIR__.'/parca/windowFormJS.php');
	 }	
	
	
	// if(in_array($modulBolum,$kontrolListesiFiltre)){
			
	// 		if(in_array($modulAdi,$yasakliModul)){

	// 		}
	// 		else{
	// 			require(__DIR__.'/parca/yeniFiltreFrontJS.php');
	// 		}
 			


	// }


} 

	//bitis windowForm Kontrol ve yeniFiltreFront

	
	?>
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	<?php
		//echo '<a href="setup/setup.exe" accesskey="1">&nbsp;</a>';
}else{
	require(__DIR__.'/parca/0giris.php');
}
		//echo '<a href="setup/argox.exe" accesskey="2">&nbsp;</a>';
?>
<?Php //if(z('host')=='localhost')echo $mct-microtime(true);?>
<?php if(z('lgn')){ /* require(__DIR__.'/class/onesignal/onesignal_js.php'); */ } else {?>
<!--<script type="text/javascript">localStorage.onesignalUserId="";</script>-->
<?php } ?>
<?Php require('parca/surum.php'); ?>
</body>
</html>