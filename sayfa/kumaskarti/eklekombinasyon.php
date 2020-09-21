<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$iplikkartlari=(!empty($_X['iplikkartlari'])?array_filter($_X['iplikkartlari']):'');
	if(!empty($iplikkartlari)){$iplikkartlari=!empty($iplikkartlari)?json_encode($iplikkartlari):Null;}
	if(!empty($iplikkartlari)){
		$iplikkartlari=str_replace(':"',':"puan',$iplikkartlari);
	}

	$iplikfireleri=(!empty($_X['iplikfireleri'])?array_filter($_X['iplikfireleri']):'');
	if(!empty($iplikfireleri)){$iplikfireleri=!empty($iplikfireleri)?json_encode($iplikfireleri):Null;}

	$pusvefayn=(!empty($_X['pusvefayn'])?array_filter($_X['pusvefayn']):'');
	if(!empty($pusvefayn)){$pusvefayn=!empty($pusvefayn)?json_encode($pusvefayn):Null;}

	$fiyatlar=(!empty($_X['fiyatlar'])?array_filter($_X['fiyatlar']):'');
	if(!empty($fiyatlar)){$fiyatlar=!empty($fiyatlar)?json_encode($fiyatlar):Null;}

	$enbilgisi=(!empty($_X['enbilgisi'])?array_filter($_X['enbilgisi']):'');
	if(!empty($enbilgisi)){$enbilgisi=!empty($enbilgisi)?json_encode($enbilgisi):Null;}

	$enbilgisiaciken=(!empty($_X['enbilgisiaciken'])?array_filter($_X['enbilgisiaciken']):'');
	if(!empty($enbilgisiaciken)){$enbilgisiaciken=!empty($enbilgisiaciken)?json_encode($enbilgisiaciken):Null;}

	$fiyatselect=(!empty($_X['fiyatselect'])?array_filter($_X['fiyatselect']):'');
	if(!empty($fiyatselect)){$fiyatselect=!empty($fiyatselect)?json_encode($fiyatselect):Null;}

	$ekkumas=(!empty($_X['ekkumas'])?array_filter($_X['ekkumas']):'');
	if(!empty($ekkumas)){$ekkumas=!empty($ekkumas)?json_encode($ekkumas):Null;}

	$karoranlari=(!empty($_X['karoranlari'])?array_filter($_X['karoranlari']):'');
	if(!empty($karoranlari)){$karoranlari=!empty($karoranlari)?json_encode($karoranlari):Null;}

	$ekhizmet=(!empty($_X['ekhizmet'])?array_filter($_X['ekhizmet']):'');
	if(!empty($ekhizmet)){$ekhizmet=!empty($ekhizmet)?json_encode($ekhizmet):Null;}

	$boyamaliyet=(!empty($_X['boyamaliyet'])?array_filter($_X['boyamaliyet']):'');
	if(!empty($boyamaliyet)){$boyamaliyet=!empty($boyamaliyet)?json_encode($boyamaliyet):Null;}
	if(!empty($boyamaliyet)){
		$boyamaliyet=str_replace(':"',':"puan',$boyamaliyet);
	}

	$elyaforanlari=(!empty($_X['elyaforanlari'])?array_filter($_X['elyaforanlari']):'');
	if(!empty($elyaforanlari)){$elyaforanlari=!empty($elyaforanlari)?json_encode($elyaforanlari):Null;}

	//z(6,$tbl);
	//if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(1,"WHERE arsiv='0' AND ad='".$_X['ad']."'")){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['iplikkartlari']=(!empty($iplikkartlari)?$iplikkartlari:'');
				$_X['iplikfireleri']=(!empty($iplikfireleri)?$iplikfireleri:'');
				$_X['pusvefayn']=(!empty($pusvefayn)?$pusvefayn:'');
				$_X['fiyatlar']=(!empty($fiyatlar)?$fiyatlar:'');
				$_X['enbilgisi']=(!empty($enbilgisi)?$enbilgisi:'');
				$_X['enbilgisiaciken']=(!empty($enbilgisiaciken)?$enbilgisiaciken:'');
				$_X['fiyatselect']=(!empty($fiyatselect)?$fiyatselect:'');
				$_X['ekkumas']=(!empty($ekkumas)?$ekkumas:'');
				$_X['karoranlari']=(!empty($karoranlari)?$karoranlari:'');
				$_X['elyaforanlari']=(!empty($elyaforanlari)?$elyaforanlari:'');
				$_X['ekhizmet']=(!empty($ekhizmet)?$ekhizmet:'');
				$_X['boyamaliyet']=(!empty($boyamaliyet)?$boyamaliyet:'');
				$_X['nesne_IDdoviz']=(!empty($_X['nesne_IDdoviz'])?$_X['nesne_IDdoviz']:0);
				$_X['nesne_IDdovizfason']=(!empty($_X['nesne_IDdovizfason'])?$_X['nesne_IDdovizfason']:0);
				$_X['nesne_IDkumasTipi']=(!empty($_X['nesne_IDkumasTipi'])?$_X['nesne_IDkumasTipi']:0);
				$_X['nesne_IDiplikkartTipi']=(!empty($_X['nesne_IDiplikkartTipi'])?$_X['nesne_IDiplikkartTipi']:0);
				//$_X['atki']=z('sayi',$_X['atki']);
				$_X['img']='';

				if(!empty($_X['mkurusd'])){ $_X['mkurusd']=str_replace(",",".",$_X['mkurusd']); } 
				if(!empty($_X['mkureur'])){ $_X['mkureur']=str_replace(",",".",$_X['mkureur']); } 
				if(!empty($_X['mkurgbp'])){ $_X['mkurgbp']=str_replace(",",".",$_X['mkurgbp']); } 


		
				postKontrolTh($_X);

        // __($_X);

				
				$SID=z(2,$_X,$tbl);
				if(!empty($SID)){
					z(33,'ekle',1);

					$urund=z(10,$tbl);
					if(!empty($urund)){
						foreach ($urund as $urun) {
							$dosya=$urun;
							if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif','application/pdf'))){
								$dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti',$dosya); 
							}
							if (!empty($dosyaAd)) {
								$galeriarray=array(
									'arsiv'=>0,
									'personel_ID'=>z('lgn','ID'),
									'tarih'=>z('datetime'),
									'tablo'=>$tbl,
									'tablo_ID'=>$SID,
									'img'=>$dosyaAd
								);
								z(2,$galeriarray,'galeri');
							}
						}
					}

					if(!z(8,'ajaxform') || empty($ajaxAnahtar)){
						z('git','?s='.$syf.'&a=duzenlekombinasyon&id='.$SID);
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

		<?php 
		$farkli=z(8,'farkli');
		if(!empty($farkli)){
			$_X=z(1,$farkli,'',$tbl);
		}
		?>

		<!-- Page header -->
		<div class="page-header page-header-light mb-3">

			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i><?php echo $anamoduladi; ?></a>
						<span class="breadcrumb-item active">Kombinasyon Ekle</span>
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
                <div class="table-responsive">
			        <form action="" method="post" class="formelyaf"  enctype="multipart/form-data" id="formId">
						<div class="kumaskombin" style="width:100%;border: 2px solid #95989e;"> 
							<table cellpadding="0" cellspacing="0" style="background: #ffffff;" class="table table-hover">
								<tbody>
									<?php
									$usd=kur(1,'USD','TRY');
									$eur=kur(1,'EUR','TRY');
									$eurusd=$eur/$usd;
									$eurusd=z(36,$eurusd,4);
									$_NesneDoviz=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));
									?>
									<tr>
										<th>-</th>
										<th>EUR / USD PARİTE</th>
										<th>USD</th>
										<th>EUR</th>
										<th>GBP</th>
										<th>Kumaş Kodu</th>
										<th>Kumaş İsmi</th>
										<th>Article</th>
									</tr>
									<tr>
										<td><b>TCMB KUR</b></td>
										<td><b><?php echo $eurusd; ?></b></td>
										<td><b><?php echo $usd; ?></b></td>
										<td><b><?php echo $eur; ?></b></td>
										<td><b>0</b></td>
									</tr>
									<tr>
										<td><b>Manuel Kur:</b></td>
										<td class="mkuroran" colspan="1"></td>
										<td class="mkurusd" colspan="1"><b>
											<input type="text" name="<?php echo $tbl; ?>[mkurusd]" value="<?php echo (!empty($_X['mkurusd'])&&$_X['mkurusd']!=0?$_X['mkurusd']:$usd); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control">
										</b></td>
										<td class="mkureur" colspan="1"><b>
											<input type="text" name="<?php echo $tbl; ?>[mkureur]" value="<?php echo (!empty($_X['mkureur'])&&$_X['mkureur']!=0?$_X['mkureur']:$eur); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control">
										</b></td>
										<td class="mkurgbp" colspan="1"><b>
											<input type="text" name="<?php echo $tbl; ?>[mkurgbp]" value="<?php echo (!empty($_X['mkurgbp'])&&$_X['mkurgbp']!=0?$_X['mkurgbp']:'0'); ?>" autocomple="off" step="0.1" class="form-control">
										</b></td>
										<td>
											<input type="text" name="<?php echo $tbl?>[kodu]" value="<?php echo !empty($_X['kodu'])?$_X['kodu']:''?>" autocomplete="off" class="1kumaskodu form-control">
										</td>
										<td>
											<input type="text" name="<?php echo $tbl?>[ismi]" value="<?php echo !empty($_X['ismi'])?$_X['ismi']:''?>" autocomplete="off" class="1kumasismi form-control">
										</td>
										<td>
											<input type="text" name="<?php echo $tbl?>[article]" value="<?php echo !empty($_X['article'])?$_X['article']:''?>" autocomplete="off" class="articlemiz form-control">
										</td>
										<input type="hidden" name="<?php echo $tbl?>[nesne_IDkumasTipi]" value="180">
									</tr>
								</tbody>
							</table>
						</div>
						<table cellpadding="0" cellspacing="0" style="border: 2px solid #95989e;">
					        	<tbody>
						        	<?php require(__DIR__.'/ekle_prckombinasyon.php'); ?>
						        </tbody>
						    </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$( ".row_position" ).sortable({
      delay: 150,
      stop: function() {
        console.log("sıralama degistir");
      }
    });
</script>


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

