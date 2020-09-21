<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	//_z(7,'iplikno');die; 	
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!z(5,"WHERE arsiv='0' AND ad='".$_X['ad']."' AND ID<>'".$ID."'")){
		//if(empty($_X['atki']))$_X['atki']=0;
		$_X['nesne_IDbirimTipi']=!empty($_X['nesne_IDbirimTipi'])?$_X['nesne_IDbirimTipi']:'0';
		$_X['cari_ID']=!empty($_X['cari_ID'])?$_X['cari_ID']:'0';
		$_X['boyabaski_ID']=!empty($_X['boyabaski_ID'])?$_X['boyabaski_ID']:'0';

		$newMusteri = "";
		$newMusteriBoyaBaski = "";
		$newNesneRenkAdi = "";

	$ddata = z(1,$ID,'musteri_ID,musteriboyabaski_ID,nesne_IDrenkadi','renkkarti');
	$ddata['musteri_ID'] = explode(',',$ddata['musteri_ID']);
	$ddata['musteriboyabaski_ID'] = explode(',',$ddata['musteriboyabaski_ID']);
	$ddata['nesne_IDrenkadi'] = explode(',',$ddata['nesne_IDrenkadi']);


	foreach ($ddata['musteri_ID'] as $data) {
		array_push($_X['musteri_ID'],$data);
	}
	foreach ($ddata['musteriboyabaski_ID'] as $data) {
		array_push($_X['musteriboyabaski_ID'],$data);
	}

	foreach ($ddata['nesne_IDrenkadi'] as $data) {
		array_push($_X['nesne_IDrenkadi'],$data);
	}


	if(!empty($_X['musteri_ID'])){
		foreach ($_X['musteri_ID'] as $key => $kontrol) {
			if($kontrol==0){
				unset($_X['musteri_ID'][$key]);
				// unset($_X['musteriboyabaski_ID'][$key]);
				// unset($_X['nesne_IDrenkadi'][$key]);
			}
		}	

		if(count($_X['musteri_ID'])==1){
			foreach($_X['musteri_ID'] as $musteriler){
				$newMusteri = $musteriler;  
			}
			$_X['musteri_ID'] = $newMusteri;
		}
		else{
		foreach($_X['musteri_ID'] as $musteriler){
			$newMusteri .= $musteriler . ",";  
		}			
		$_X['musteri_ID'] = rtrim($newMusteri,',');
		}
	}
	else{$_X['musteri_ID']='0';}


	if(!empty($_X['musteriboyabaski_ID'])){
		foreach ($_X['musteriboyabaski_ID'] as $key => $kontrol) {
			if($kontrol==0){
				unset($_X['musteriboyabaski_ID'][$key]);
				// unset($_X['musteri_ID'][$key]);
				// unset($_X['nesne_IDrenkadi'][$key]);
			}
		}
		if(count($_X['musteriboyabaski_ID'])==1){
			foreach($_X['musteriboyabaski_ID'] as $musteriler){
				$newMusteriBoyaBaski = $musteriler;  
			}
			$_X['musteriboyabaski_ID'] = $newMusteriBoyaBaski;
		}
		else{
		foreach($_X['musteriboyabaski_ID'] as $musteriler){
			$newMusteriBoyaBaski .= $musteriler . ",";  
		}			
		$_X['musteriboyabaski_ID'] = rtrim($newMusteriBoyaBaski,',');
		}
	}
	else{$_X['musteriboyabaski_ID']='0';}

// __($_X);	
	if(!empty($_X['nesne_IDrenkadi'])){
		foreach ($_X['nesne_IDrenkadi'] as $key => $kontrol) {
			if($kontrol==0){
				unset($_X['nesne_IDrenkadi'][$key]);
				// unset($_X['musteriboyabaski_ID'][$key]);
				// unset($_X['musteri_ID'][$key]);
			}
		}
		if(count($_X['nesne_IDrenkadi'])==1){
			foreach($_X['nesne_IDrenkadi'] as $musteriler){
				$newNesneRenkAdi = $musteriler;  
			}
			$_X['nesne_IDrenkadi'] = $newNesneRenkAdi;
		}
		else{
		foreach($_X['nesne_IDrenkadi'] as $musteriler){
			$newNesneRenkAdi .= $musteriler . ",";  
		}			
		$_X['nesne_IDrenkadi'] = rtrim($newNesneRenkAdi,',');
		}
	}
	else{$_X['nesne_IDrenkadi']='0';}


 


		//__($_X);
		postKontrolTh($_X);
		$_X['fiyat']=z(36,$_X['fiyat']);
		

		if(z(3,$ID,$_X)){
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
						<a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Renk Kartı</a>
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
			        	<form action="" method="post" enctype="multipart/form-data">
							<?php require(__DIR__.'/ekle_prc.php'); ?>
	           				<input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
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