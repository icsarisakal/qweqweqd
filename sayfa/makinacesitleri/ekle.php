<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['ad']=!empty($_X['ad'])?$_X['ad']:'';
				//$_X['atki']=z('sayi',$_X['atki']);
				$makinedegerleripus=(!empty($_X['pus'])?$_X['pus']:'');
				if(!empty($makinedegerleripus)){$makinedegerleripus=!empty($makinedegerleripus)?json_encode($makinedegerleripus):Null;}
				$_X['pus']=(!empty($makinedegerleripus)?$makinedegerleripus:'');

				$makinedegerlerifayn=(!empty($_X['fayn'])?$_X['fayn']:'');
				if(!empty($makinedegerlerifayn)){$makinedegerlerifayn=!empty($makinedegerlerifayn)?json_encode($makinedegerlerifayn):Null;}
				$_X['fayn']=(!empty($makinedegerlerifayn)?$makinedegerlerifayn:'');

				$sistemsayi=(!empty($_X['sistemsayi'])?$_X['sistemsayi']:'');
				if(!empty($sistemsayi)){$sistemsayi=!empty($sistemsayi)?json_encode($sistemsayi):Null;}
				$_X['sistemsayi']=(!empty($sistemsayi)?$sistemsayi:'');

				$ignesayi=(!empty($_X['ignesayi'])?$_X['ignesayi']:'');
				if(!empty($ignesayi)){$ignesayi=!empty($ignesayi)?json_encode($ignesayi):Null;}
				$_X['ignesayi']=(!empty($ignesayi)?$ignesayi:'');

				$makineyetenegi=(!empty($_X['makineyetenegi'])?$_X['makineyetenegi']:'');
				if(!empty($makineyetenegi)){$makineyetenegi=!empty($makineyetenegi)?json_encode($makineyetenegi):Null;}
				$_X['makineyetenegi']=(!empty($makineyetenegi)?$makineyetenegi:'');

				$plakasayi=(!empty($_X['plakasayi'])?$_X['plakasayi']:'');
				if(!empty($plakasayi)){$plakasayi=!empty($plakasayi)?json_encode($plakasayi):Null;}
				$_X['plakasayi']=(!empty($plakasayi)?$plakasayi:'');

				postKontrolTh($_X);




				//__($_X);
				$SID=z(2,$_X,$tbl);
				if(!empty($SID)){


		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','geri');
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
				'pus'=>$_X['pus'],
				'fayn'=>$_X['fayn'],
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
	z("git","geri");

	//_z(33,'ekle');
	die;
}

?>
<div class="">
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

        <div class="content pt-0">
	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
		        	<form action="" method="post" id="siparisdetay_ekle">
						<?php require(__DIR__.'/ekle_prc.php'); ?>
						<div class="form-group row">
						    <div class="col-lg-12 text-right">
					    		<input type="submit" class="btn btn-primary" value="Kaydet">
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

