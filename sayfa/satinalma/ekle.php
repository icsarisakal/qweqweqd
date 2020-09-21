<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	
	z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				
				//$_X['atki']=z('sayi',$_X['atki']);
				
		
				$_X['cari_ID']=!empty($_X['cari_ID'])?$_X['cari_ID']:'0';
				$_X['tarihFis']=!empty($_X['tarihFis'])?$_X['tarihFis']:null;
				$_X['nesne_IDdepo']=!empty($_X['nesne_IDdepo'])?$_X['nesne_IDdepo']:'0';
				$_X['nesne_IDsatinalmaTip']=!empty($_X['nesne_IDsatinalmaTip'])?$_X['nesne_IDsatinalmaTip']:'0';
				$fisNo=z(1,'WHERE arsiv!=-1 ORDER BY fisNo DESC LIMIT 1','fisNo','satinalma'); 
				$fisNo=!empty(z(1,'WHERE arsiv!=-1 ORDER BY fisNo DESC LIMIT 1','fisNo','satinalma'))?z(1,'WHERE arsiv!=-1 ORDER BY fisNo DESC LIMIT 1','fisNo','satinalma'):''; 
				empty($fisNo[0])?$fisNo[0]='0':$fisNo[0]+=1;
				$_X['fisNo']=$fisNo[0];
     			 
		
				postKontrolTh($_X);

				if(!empty($_X['nesne_IDbirimTipi'])){$_X['nesne_IDbirimTipi']=json_encode($_X['nesne_IDbirimTipi']);}
				if(!empty($_X['nesne_IDdoviz'])){$_X['nesne_IDdoviz']=json_encode($_X['nesne_IDdoviz']);}
				if(!empty($_X['fiyat'])){$_X['fiyat']=json_encode($_X['fiyat']);}
				if(!empty($_X['gelenMiktar'])){$_X['gelenMiktar']=json_encode($_X['gelenMiktar']);}
				if(!empty($_X['kalanMiktar'])){$_X['kalanMiktar']=json_encode($_X['kalanMiktar']);}
				if(!empty($_X['siparisMiktar'])){$_X['siparisMiktar']=json_encode($_X['siparisMiktar']);}
				if(!empty($_X['malzemeKodu'])){$_X['malzemeKodu']=json_encode($_X['malzemeKodu']);}
				if(!empty($_X['malzemeAd'])){$_X['malzemeAd']=json_encode($_X['malzemeAd']);}
				if(!empty($_X['aciklama'])){$_X['aciklama']=json_encode($_X['aciklama']);}
				if(!empty($_X['tarihTermin'])){$_X['tarihTermin']=json_encode($_X['tarihTermin']);}

					
			//	__($_X);
				
				$SID=z(2,$_X);
				if(!empty($SID)){
					// $fyt=array();
					// $fyt['personel_ID']=z('lgn','ID');
					// $fyt['tarih']=z('datetime');
					// $fyt['modul']=$tbl;
					// $fyt['modul_ID']=$SID;
					// $fyt['fiyat']=(!empty($_X['fiyat'])?z(36,$_X['fiyat'],0):'0');
					// $fyt['nesne_IDdoviz']=(!empty($_X['nesne_IDdoviz'])?$_X['nesne_IDdoviz']:'0');
					// if(!empty($fyt)){
					// 	z(2,$fyt,'fiyatarsiv');
					// }
					// z(33,'ekle',1);

					// Mamul Bez Stok girdisi oluştur


					/*/ 
					// Ana girdi başarıyla eklendikten sonra ihtiyaç var ise ilişkili tabloya girdi ekleme kodları
					unset($_X['ad'],$_X['numuneAdi'],$_X['hamkumasstok_ID']);
					$_X['mamulkumas_ID']=$SID;
					$mamulbezstok_ID=z(2,$_X,'mamulbezstok');
					for ($i=0; $i < 30; $i++) { 
						$_XDty=array(
							'mamulkumas_ID'=>$SID,
							'tarih'=>$_X['tarih'],
							'ad'=>'',_NSN
							'kod'=>''
						);
						$mamulkumasdetay_ID=z(2,$_XDty,$tbl.'detay');

						unset($_XDty['ad'],$_XDty['kod']);
						$_XDty['mamulbezstok_ID']=$mamulbezstok_ID;
						$_XDty['mamulkumasdetay_ID']=$mamulkumasdetay_ID;
						z(2,$_XDty,'mamulbezstokdetay');
					}
					/*/

					if(!z(8,'ajaxform') || empty($ajaxAnahtar)){
						z('git','?s='.$syf.'&a=listele');
					}
					
					//unset($_X);
				}
				else z(33,'ekle',-1);
			//}
			//else z(33,'ekle',3);
		//}
		//else z(33,'ekle',12);
	//}
	//else z(33,'ekle',11);

}
	if(z(8,'ajaxform') || !empty($ajaxAnahtar)){
		_z(33,'ekle');die;
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

       <!-- Content area -->
	<div class="content pt-0">
		<!-- Dashboard content -->
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
			        	<form action="" method="post" id="siparisdetay_ekle" class="formelyaf"  enctype="multipart/form-data">
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

