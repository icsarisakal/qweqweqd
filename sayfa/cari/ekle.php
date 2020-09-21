<?php
$eklekontrol=z(8,"iplikMarka");
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$markalar=(!empty($_X['markalar'])?array_filter($_X['markalar']):'');
				if(!empty($markalar)){$markalar=!empty($markalar)?json_encode($markalar):Null;}
				$_X['markalar']=(!empty($markalar)?$markalar:'');
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
				$_X['img']=!empty($_X['img'])?$_X['img']:'';
				$_X['nesne_IDmusteriTipi']=!empty($_X['nesne_IDmusteriTipi'])?$_X['nesne_IDmusteriTipi']:'0';
				$_X['nesne_IDcariTipi']=!empty($_X['nesne_IDcariTipi'])?$_X['nesne_IDcariTipi']:'0';
				$_X['nesne_IDtedarikciTipi']=!empty($_X['nesne_IDtedarikciTipi'])?$_X['nesne_IDtedarikciTipi']:'0';
				$_X['markalar']=!empty($_X['markalar'])?$_X['markalar']:'0';
				$sonveriyicek=z(1,"WHERE arsiv='0' OR arsiv='1' ORDER BY ID DESC LIMIT 1",'ID,artanSayi',$tbl);
				$sonartansayi=0;
				if(!empty($sonveriyicek)){
					$sonartansayi=(!empty($sonveriyicek[0]['artanSayi'])?!empty($sonveriyicek[0]['artanSayi']):'0');
				}

				$sonartansayi++;

				$_X['artanSayi']=$sonartansayi;
				//$_X['atki']=z('sayi',$_X['atki']);

				postKontrolTh($_X);
			//	__($_X);
				$SID=z(2,$_X,$tbl);
				if(!empty($SID)){

					
					if(!empty(z(7,'map_lat'))&&!empty(z(7,'map_long'))){
						
						if($_X['nesne_IDcariTipi']=='179'){$color='0';}
						elseif($_X['nesne_IDcariTipi']=='178'){		
							if($_X['nesne_IDmusteriTipi']=='209'){$color='2';}
							elseif($_X['nesne_IDmusteriTipi']=='208'){$color='3';}
						}		

						$coordinates = [
							'cari_ID' => $SID,
							'place_id' => z(7,'place_id'),
							'map_lat' => z(7,'map_lat'),
							'map_long' => z(7,'map_long'),
							'name' => z(7,'name'),
							'full_address' => z(7,'full_address'),
							'country' => z(7,'country'),
							'tarih' => z('datetime'),
							'color' => $color
						];

						z(2,$coordinates,'map');
						//__($coordinates);
					}

		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','geri');
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
				'soyad'=>$_X['soyad'],
				'telCep1'=>$_X['telCep1'],
				'unvan'=>$_X['unvan'],
			);
		}

		$json['mesaj']="Ekleme işlemi başarılı.";


	}
	else {
		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',-1);
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=0;
			$json['cevap']="";
			$json['mesaj']="Ekleme işlemi başarısız.";
		}
	}
}

//En kritik json sonucunu ekrana basan kod
if(z(8,'ajaxform')){
	echo json_encode($json);
	//_z(33,'ekle');
	die;
}

?>
<div class="sayfa">
	<div class="baslik"><h3><?php echo $metin['menu_yeni_ekle']; ?></h3></div>
    <div class="icerik">
    	<?php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
			case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
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

	              	<!-- Content area -->
	<div class="content pt-0">
		<!-- Dashboard content -->
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
			        	<form action="" method="post" id="cariForm">
							<?php require(__DIR__.'/ekle_prc.php'); ?>
							<div class="form-group row">
							    <div class="col-lg-12 text-right">
						    		<!--<input type="submit" class="btn btn-primary" value="Kaydet">-->
							    </div>
							</div>
			        	</form>
	        		</div>
				</div>
			</div>
		</div>
		<!-- /dashboard content -->
	</div>
	<!-- /content area -->


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

