<?php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);

	$enbilgisi=(!empty($_X['enbilgisi'])?array_filter($_X['enbilgisi']):'');
	if(!empty($enbilgisi)){$enbilgisi=!empty($enbilgisi)?json_encode($enbilgisi):Null;}

	$enbilgisiaciken=(!empty($_X['enbilgisiaciken'])?array_filter($_X['enbilgisiaciken']):'');
	if(!empty($enbilgisiaciken)){$enbilgisiaciken=!empty($enbilgisiaciken)?json_encode($enbilgisiaciken):Null;}

	$fiyatselect=(!empty($_X['fiyatselect'])?array_filter($_X['fiyatselect']):'');
	if(!empty($fiyatselect)){$fiyatselect=!empty($fiyatselect)?json_encode($fiyatselect):Null;}
	$_X['enbilgisi']=(!empty($enbilgisi)?$enbilgisi:'');
	$_X['enbilgisiaciken']=(!empty($enbilgisiaciken)?$enbilgisiaciken:'');
	$_X['fiyatselect']=(!empty($fiyatselect)?$fiyatselect:'');

	$_X['personel_ID']=z('lgn','ID');
	$_X['tarih']=z('datetime');

	$_X['nesne_IDurunkategorileri']=(!empty($_X['nesne_IDurunkategorileri'])?$_X['nesne_IDurunkategorileri']:0);
	$_X['nesne_IDurunebatlari']=(!empty($_X['nesne_IDurunebatlari'])?$_X['nesne_IDurunebatlari']:0);
	
	if(!empty($_X['mkurusd'])){ $_X['mkurusd']=str_replace(",",".",$_X['mkurusd']); } 
	if(!empty($_X['mkureur'])){ $_X['mkureur']=str_replace(",",".",$_X['mkureur']); } 
	if(!empty($_X['mkurgbp'])){ $_X['mkurgbp']=str_replace(",",".",$_X['mkurgbp']); } 

	postKontrolTh($_X);

	//__($_X);
	$SID=z(2,$_X,$tbl);
	if(!empty($SID)){


		if(!z(8,'ajaxform')){ // Ymnlendirmeyi iptal et
			z(33,'ekle',1);
			z('git','?s='.$syf.'&a=duzenle&id='.$SID);
		}
		else{ // Json çıktısını doldur
			$json['sonuc']=1;
			$json['cevap']=array(
				'ID'=>$SID,
				'ad'=>$_X['ad'],
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

        <div class="content pt-0">
	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
		        	<form action="" method="post" id="formfiyatcalismasi">
						<table cellpadding="0" cellspacing="0" style="background: #eeeeee; margin-bottom: 20px;border: 2px solid #95989e;" class="table table-hover">
							<tbody style="border: 1px solid #ddd;">
								<?php
								$usd=kur(1,'USD','TRY');
								$eur=kur(1,'EUR','TRY');
								$eurusd=$eur/$usd;
								$eurusd=z(36,$eurusd,4);
								$_NesneDoviz=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));
								$farkli=z(8,'farkli');
								if(!empty($farkli)){
									$_X=z(1,$farkli,'',$tbl);
								}
								?>
								<tr>
									<th>-</th>
									<th>EUR / USD</th>
									<th>USD</th>
									<th>EUR</th>
									<th>GBP</th>
								</tr>
								<tr>
									<td><b>TCMB KUR</b></td>
									<td><b class=""><?php echo $eurusd; ?></b></td>
									<td><b class="mnkureurusd"><?php echo $usd; ?></b></td>
									<td><b class="mnkurusd"><?php echo $eur; ?></b></td>
									<td><b class="mnkureur">0</b></td>
								</tr>
								<tr>
									<td><b>Manuel Kur:</b></td>
									<td class="mkuroran" colspan="1"></td>
									<td class="mkurusd" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkurusd]" value="<?php echo (!empty($_X['mkurusd'])&&$_X['mkurusd']!=0?$_X['mkurusd']:$usd); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control"></b></td>
									<td class="mkureur" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkureur]" value="<?php echo (!empty($_X['mkureur'])&&$_X['mkureur']!=0?$_X['mkureur']:$eur); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control"></b></td>
									<td class="mkurgbp" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkurgbp]" value="<?php echo (!empty($_X['mkurgbp'])&&$_X['mkurgbp']!=0?$_X['mkurgbp']:'0'); ?>" autocomple="off" step="0.1" class="kurmdegisim2 form-control"></b></td>
								</tr>
							</tbody>
						</table>
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

