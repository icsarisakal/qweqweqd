<style>
.navactivemenu .navgoster{
	background:#3c7709 !important;
}
.navactivemenu .navgoster2{
	background:#3c7709 !important;
}
.navclickiptal{
	background:none !important;
}
</style>
<script>
$( document ).ready(function() {
	$(".navclick").removeClass("navgoster");
	$(".navtikla").click(function(){
		$(".navclick").removeClass("navgoster");
		$(this).addClass("navactivemenu");
		$(this).find(".navclick").addClass("navgoster");
	});
});
</script>
<?php $personelcek=''; if(z('lgn')){ $personelcek=z(1,z('lgn','ID'),'','personel'); 
$personelcek['img']=!empty($personelcek['img'])?'upload/kumaskarti/'.$personelcek['img']:'img/logo.jpg';
} ?>
<!-- Main sidebar -->
		<div id="solAnaMenu"  class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content extsidemenu">
				
				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="?s=profil&a=detay&id=<?php echo $personelcek['ID']; ?>"><img src="<?php echo $personelcek['img']; ?>" width="48" height="48" class="rounded-circle" alt=""></a><br>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">
									<?php if(!empty($personelcek)){
										if(!empty($personelcek['ad'])){
											echo $personelcek['ad'];
										}
										if(!empty($personelcek['soyad'])){
											echo ' '.$personelcek['soyad'];
										}
									} else { echo 'Yetkili Adı'; } ?>
								</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm d-none"></i> 
								</div>
							</div>

							<div class="ml-3 align-self-center">
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->

				
				<!-- Main navigation -->
				<div  id="solMenuCard" class="card card-sidebar-mobile">
					
					<ul  id="solMenu" class="nav nav-sidebar" data-nav-type="accordion">  
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menü</div> <i class="icon-menu" title="Main"></i></li>
			<?php /*/ ?><li class="active"><a href="#">Anasayfa</a></li><?php /*/ ?>
			<?php $_MA=$admn;if(empty($_MA))foreach($_MTip as $mtip=>$mad)$_MA+=ytk($mtip,'listele');$_MA+=ytk('destek','listele');if($_MA){?>
			
			<?php $menudurum=''; ?>
			<?php
			if(ytk('kumaskarti','listele')||ytk('kumaskarti','listele')||ytk('iplik','listele')||ytk('boyabaski','listele')||ytk('renkkarti','listele')||ytk('kumasturu','listele')||ytk('cari','listele')||ytk('makinacesitleri','listele')||ytk('makinaparkuru','listele')||ytk('yedekparca','listele')||ytk('aksesuarkarti','listele')||ytk('konfeksiyonmaliyetleri','listele')||ytk('modelkartlari','listele')){
				$tanimlamalar_array=array("tanimlamalar");
			} else {
				$tanimlamalar_array=array();
			}
			if(ytk('nesne','listele')||ytk('personel','listele')||ytk('log','listele')||ytk('pamuk','listele')||ytk('kur','listele')){
				$araclar_array=array("yonetim");
			} else {
				$araclar_array=array();
			}
			if(ytk('fiyatcalismasi','listele')||ytk('cari','listele')){
				$satispazarlama_array=array("satispazarlama");
			} else {
				$satispazarlama_array=array();
			}
			if(ytk('satinalma','listele')){
				$satinalma_array=array("satinalma");
			} else {
				$satinalma_array=array();
			}
			if(ytk('finans','listele')){
				$finans_array=array("finans");
			} else {
				$finans_array=array();
			}
			if(ytk('genelmuhasebe','listele')){
				$genelmuhasebe_array=array("genelmuhasebe");
			} else {
				$genelmuhasebe_array=array();
			}
			if(ytk('einel','listele')){
				$einel_array=array("einel");
			} else {
				$einel_array=array();
			}
			if(ytk('siparis','listele')){
				$orderyonetimi_array=array("siparis");
			} else {
				$orderyonetimi_array=array();
			}
			if(ytk('makinacesitleri','listele')||ytk('makinaparkuru','listele')||ytk('yedekparca','listele')||ytk('kumasturu','listele')){
				$maktanimlamalar_array=array("makinatanimlamalari");
			} else {
				$maktanimlamalar_array=array();
			}
			$mymenu_array=array("mymenu");
			$bos_array=array("bos");
			$maktanimlamalar_array2=array("makinacesitleri","makinaparkuru","yedekparca","kumasturu");
			$maktanimlamalar_array2=array("rastgele");
			if(ytk('makinacesitleri','listele')){ array_push($maktanimlamalar_array2,"makinacesitleri"); }
			if(ytk('makinaparkuru','listele')){ array_push($maktanimlamalar_array2,"makinaparkuru"); }
			if(ytk('yedekparca','listele')){ array_push($maktanimlamalar_array2,"yedekparca"); }
			if(ytk('kumasturu','listele')){ array_push($maktanimlamalar_array2,"kumasturu"); }


			$grupayar=array(
				'mymenu'=>$mymenu_array,
				'satispazarlama'=>$satispazarlama_array,
				'orderyonetimi'=>$orderyonetimi_array,
				'tanimlamalar'=>$tanimlamalar_array,
				'genelplanlama'=>$bos_array,
				'satinalma'=>$bos_array,
				'finans'=>$bos_array,
				'genelmuhasebe'=>$bos_array,
				'einel'=>$bos_array,
				'yonetim'=>$araclar_array,
			);
			
			?>
	        <?php
  				foreach ($ayr['menu'] as $fei => $fed) {
					  if($admn||$fei=='yonetim'||$fei=='mymenu'||ytk($fei,'listele')||in_array($fei,$grupayar[$fei])) 
					  echo '
  						<li class="nav-item nav-item-submenu '.(in_array($S,$fed['grup'])?'nav-item-open':'').($S==$fei?'nav-item-open':'').'" style="'.(!empty($fed['style'])?$fed['style']:'').'">
  							<a href="#" class="nav-link" id="s_'.$fei.'" 
  								'.(!empty($fed['style'])?' style="'.$fed['style'].'" ':'').'><i class="'.$fed['icon'].'"></i>
  								<span>'.(!empty($fed['ad'])?$fed['ad']:'').'</span>
  							</a>
  							';
  							if(!empty($fed['altMenu'])){
  								echo '<ul class="nav nav-group-sub '.$menudurum.'" style="'.(!empty($S)&&in_array($S,$fed['grup'])?'display:block; ':'').(!empty($S)&&$S==$fei?'display:block; ':'').'" data-submenu-title="'.$fed['ad'].'">';
	  								foreach ($fed['altMenu'] as $nbr => $altM) {
	  									if(empty($altM['url'])) $altM['url']='?s='.(!empty($altM['S'])?$altM['S']:$fei).'&a='.$altM['A'];
										  if(empty($altM['gizle']))
										  if($admn||$altM['get']=='yonetim'||$fei=='mymenu'||ytk($altM['get'],'listele')||in_array($altM['get'],$maktanimlamalar_array2)||$altM['get']=='cikis')
	  									echo '
										<li class="nav-item navtikla '.(!empty($altM['yanMenu'])?'nav-item-submenu ':'').(!empty($S)&&$S==$altM['get']?'nav-item-open ':'').(!empty($S)&&$S==$altM['get']?'navactivemenu':'').'">
										<a class="nav-link navclick navgoster '.(!empty($S)&&$S==$altM['get']?'navgoster2':'').'" '.( !isset($altM['aktif']) || !empty($altM['aktif']) ? 
											'href="'.$altM['url'].'"'
  											.(!empty($altM['style'])?' style="'.$altM['style'].'" ':'') 

										: 'style="color:#999;"' ).' >'.
										'<i class="'.$altM['icon'].'"></i>'.$altM['ad'].
										'</a>';
										if(!empty($altM['yanMenu'])){
										echo '<ul class="nav nav-group-sub" style="'.($S==$altM['get']?'display:block; ':'').'">';
											foreach ($altM['yanMenu'] as $yanM) {
												echo '<li class="nav-item '.(!empty($yanM['yanAltMenu'])?'nav-item-submenu ':'').'"><a href="'.$yanM['url'].'" class="nav-link"><i class="'.$yanM['icon'].'"></i>'.$yanM['ad'].'</a>';
												if(!empty($yanM['yanAltMenu'])){
													echo '<ul class="nav nav-group-sub">';
													foreach ($yanM['yanAltMenu'] as $yanAltM) {
														echo '<li class="nav-item '.(!empty($yanAltM['yanAltMenu2'])?'nav-item-submenu ':'').'"><a href="'.$yanAltM['url'].'" class="nav-link"><i class="'.$yanAltM['icon'].'"></i>'.$yanAltM['ad'].'</a>';
														if(!empty($yanAltM['yanAltMenu2'])){
															echo '<ul class="nav nav-group-sub">';
															foreach ($yanAltM['yanAltMenu2'] as $yanAltM2) {
																echo '<li class="nav-item"><a href="'.$yanAltM2['url'].'" class="nav-link"><i class="'.$yanAltM2['icon'].'"></i>'.$yanAltM2['ad'].'</a>';
																echo '</li>';
															}
															echo '</ul>';
														}
														echo '</li>';
													}
													echo '</ul>';
												}
												echo '</li>';
											}
										echo '</ul>';
										}
										
										echo '</li>';
	  								}

  								echo '</ul>';
  							}
  							echo '
  						</li>
  					';
  				}
  			?>

		    <?php } else { ?><li><a href="#">Sayın <?php _z('lgn','ad') ?>, henüz hiç yetki verilmemiş. Lütfen yöneticinize bildiriniz.</a></li><li><a href="?s=cikis">Çıkış</a></li><?php } ?>
		</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
