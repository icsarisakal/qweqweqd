<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	//_z(7,'iplikno');die; 	
	$_X=z(7,$tbl);
	z(6,$tbl);
	$markalar=(!empty($_X['markalar'])?array_filter($_X['markalar']):'');
	if(!empty($markalar)){$markalar=!empty($markalar)?json_encode($markalar):Null;}
	
	$_X['markalar']=(!empty($markalar)?$markalar:'');
	$_X['img']=!empty($_X['img'])?$_X['img']:'';

	//if(!z(5,"WHERE arsiv='0' AND ad='".$_X['ad']."' AND ID<>'".$ID."'")){
		//if(empty($_X['atki']))$_X['atki']=0;

		//$_X['ibFiyat']=z(36,$_X['ibFiyat']);
		postKontrolTh($_X);

		$coordinates = [
			'cari_ID' => $ID,
			'place_id' => z(7,'place_id'),
			'map_lat' => z(7,'map_lat'),
			'map_long' => z(7,'map_long'),
			'name' => z(7,'name'),
			'full_address' => z(7,'full_address'),
			'country' => z(7,'country'),
			'tarih' => z('datetime')
		];
	

		//__($tbl,$_X);
		if(z(3,$ID,$_X)){
			if (!empty($coordinates['map_lat'])) {
				if (z(1,'WHERE cari_ID='.$ID,'','map')) {
				z(3,'WHERE cari_ID='.$ID,$coordinates,'map');
				}
				else{
					z(2,$coordinates,'map');
				}			
			}
		z(33,'duzenle',1);
			z('git','yenile');
		}
		else z(33,'duzenle','-1');
	//}
	//else {z(33,'duzenle',3);$_XAd=$_X['ad'];}
}

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
?>
<div class="">
	<div class="baslik"><h3>Modül Düzenle</h3></div>
    <div class="icerik">
    	<?php switch(z(33,'duzenle')){
			case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
			case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
			case 3:_uyr(2,'<strong>'.(!empty($_XAd)?$_XAd:'').'</strong> daha önceden kaydedilmiş. Lütfen kontrol ediniz veya başka bir isim kullanınız.');break;
			case -1:_uyr(0,'Güncelleme başarısız');break;
		}?>

		<!-- Page header -->
		<div class="page-header page-header-light mb-3">

			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i><?php echo $anamoduladi; ?></a>
						<span class="breadcrumb-item active"><?php echo $yanmoduladi; ?></span>
					</div>

					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>

				<div class="header-elements d-none">
					<div class="breadcrumb justify-content-center">
						<a href="#" class="breadcrumb-elements-item">
							<i class="icon-comment-discussion mr-2"></i>
							Support
						</a>

						<div class="breadcrumb-elements-item dropdown p-0">
							<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
								<i class="icon-gear mr-2"></i>
								Settings
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
								<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
								<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>

		</div>
		<!-- /page header -->

		<div class="content pt-0">
			<!-- Dashboard content -->
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
				        	<form id="cariForm" action="" method="post">
								<?php require(__DIR__.'/ekle_prc.php'); ?>
		           				<input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
								<div class="form-group row">
								    <div class="col-lg-12 text-right">
							    	<!--<input hidden="hidden" type="submit" class="btn btn-primary" value="Kaydet">-->
								    </div>
								</div>
				        	</form>
		        		</div>
					</div>
				</div>
			</div>
			<!-- /dashboard content -->
    	</div>
	</div>
</div>

<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI -->
<?php if(!empty($hizliEkleForm)) foreach ($hizliEkleForm as $hef) {
    if(file_exists(__DIR__.'/../'.$hef.'/hizli-ekle-form.php')){
        $formAdi=$hef;
        require(__DIR__.'/../'.$hef.'/hizli-ekle-form.php'); 
    }
}?>
<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI SON -->


<!-- AÇILIR NESNE EKLEME FORMU -->
<?php require(__DIR__.'/../../parca/nesne-hizli-ekle-form.php'); ?>
<!-- AÇILIR NESNE EKLEME FORMU SON -->



<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>
<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>