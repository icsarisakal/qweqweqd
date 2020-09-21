<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	
	$_X=z(7,$tbl);
	//z(6,$tbl);
	$iplikkartlari=(!empty($_X['iplikkartlari'])?array_filter($_X['iplikkartlari']):'');
	if(!empty($iplikkartlari)){$iplikkartlari=!empty($iplikkartlari)?json_encode($iplikkartlari):Null;}
	if(!empty($iplikkartlari)){
		$iplikkartlari=str_replace(':"',':"puan',$iplikkartlari);
	}
	$_X['iplikkartlari']=(!empty($iplikkartlari)?$iplikkartlari:'');

	$iplikfireleri=(!empty($_X['iplikfireleri'])?array_filter($_X['iplikfireleri']):'');
	if(!empty($iplikfireleri)){$iplikfireleri=!empty($iplikfireleri)?json_encode($iplikfireleri):Null;}
	
	$_X['iplikfireleri']=(!empty($iplikfireleri)?$iplikfireleri:'');

	$pusvefayn=(!empty($_X['pusvefayn'])?array_filter($_X['pusvefayn']):'');
	if(!empty($pusvefayn)){$pusvefayn=!empty($pusvefayn)?json_encode($pusvefayn):Null;}
	
	$_X['pusvefayn']=(!empty($pusvefayn)?$pusvefayn:'');

	$pusvefaynaciken=(!empty($_X['pusvefaynaciken'])?array_filter($_X['pusvefaynaciken']):'');
	if(!empty($pusvefaynaciken)){$pusvefaynaciken=!empty($pusvefaynaciken)?json_encode($pusvefaynaciken):Null;}
	
	$_X['pusvefaynaciken']=(!empty($pusvefaynaciken)?$pusvefaynaciken:'');


	$fiyatlar=(!empty($_X['fiyatlar'])?array_filter($_X['fiyatlar']):'');
	if(!empty($fiyatlar)){$fiyatlar=!empty($fiyatlar)?json_encode($fiyatlar):Null;}
	$_X['fiyatlar']=(!empty($fiyatlar)?$fiyatlar:'');
	
	$karoranlari=(!empty($_X['karoranlari'])?array_filter($_X['karoranlari']):'');
	if(!empty($karoranlari)){$karoranlari=!empty($karoranlari)?json_encode($karoranlari):Null;}
	
	$_X['karoranlari']=(!empty($karoranlari)?$karoranlari:'');

	$ekhizmet=(!empty($_X['ekhizmet'])?array_filter($_X['ekhizmet']):'');
	if(!empty($ekhizmet)){$ekhizmet=!empty($ekhizmet)?json_encode($ekhizmet):Null;}
	
	$_X['ekhizmet']=(!empty($ekhizmet)?$ekhizmet:'');
	
	$boyamaliyet=(!empty($_X['boyamaliyet'])?array_filter($_X['boyamaliyet']):'');
	if(!empty($boyamaliyet)){$boyamaliyet=!empty($boyamaliyet)?json_encode($boyamaliyet):Null;}
	if(!empty($boyamaliyet)){
		$boyamaliyet=str_replace(':"',':"puan',$boyamaliyet);
	}
	$_X['boyamaliyet']=(!empty($boyamaliyet)?$boyamaliyet:'');
	$_X['nesne_IDdoviz']=(!empty($_X['nesne_IDdoviz'])?$_X['nesne_IDdoviz']:0);
	$_X['nesne_IDdovizfason']=(!empty($_X['nesne_IDdovizfason'])?$_X['nesne_IDdovizfason']:0);
	$_X['nesne_IDkumasTipi']=(!empty($_X['nesne_IDkumasTipi'])?$_X['nesne_IDkumasTipi']:0);
	$_X['imgtext']=(!empty($_X['imgtext'])?$_X['imgtext']:0);
	$_X['fasonmaliyet2']=(!empty($_X['fasonmaliyet2'])?$_X['fasonmaliyet2']:0);

	if(!empty($_X['mkurusd'])){ $_X['mkurusd']=str_replace(",",".",$_X['mkurusd']); } 
	if(!empty($_X['mkureur'])){ $_X['mkureur']=str_replace(",",".",$_X['mkureur']); } 
	if(!empty($_X['mkurgbp'])){ $_X['mkurgbp']=str_replace(",",".",$_X['mkurgbp']); } 

	/*/
	$urund=z(10,$tbl);
	if(!empty($urund)){
		if(!empty($urund)){
			$imgsorgu=array();
			foreach ($urund as $urun) {
				$dosya= $urun;
				if(in_array($dosya['type'], array('image/jpeg','image/pjpeg','image/png','age/x-png','image/gif'))){
					$dosyaAd=z('yukle',__DIR__.'/../../upload/kumaskarti',$dosya); 
				}
				if (!empty($dosyaAd)) {
					$imgsorgu[]=$dosyaAd;
					$perid=z('lgn','ID');
					$starih=z('datetime');
					$galeriarray=array(
						'arsiv'=>0,
						'personel_ID'=>$perid,
						'tarih'=>$starih,
						'tablo'=>$tbl,
						'tablo_ID'=>$ID,
						'img'=>$dosyaAd,
					);
					z(2,$galeriarray,'galeri');
				}
			}
		}
	}
	/*/


	postKontrolTh($_X);


		if(z(3,$ID,$_X,$tbl)){
			if(!empty($ID)){
				$_X['revize_ID']=$ID;
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				z(2,$_X,'kumaskarti');
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

		<script>
			window.onscroll = function() { scrollFunction() };
			function scrollFunction() {
				var contentwidth=$(".page-header-light").width();
				if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 60) {
					$('.breadcrumb-line-light').addClass('ustblokbilgi');
					$('.breadcrumb-line-light').addClass('ustblokbilgi2');
					//$('.header-elements').attr("style","display:none !important");
					$('.breadcrumb-line-light').attr("style","width:"+contentwidth+"px");
				} else {
					$('.breadcrumb-line-light').removeClass('ustblokbilgi');
					$('.breadcrumb-line-light').removeClass('ustblokbilgi2');
					//$('.header-elements').attr("style","display:block !important");
					$('.breadcrumb-line-light').attr("style","width:auto");
				}
			}
		</script>

		<!-- Page header -->
		<div class="page-header page-header-light mb-3">

			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb">
						<a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i><?php echo $anamoduladi; ?></a>
						<span class="breadcrumb-item active">Üretim Düzenle</span>
						<span class="breadcrumb-item geneltanim" style="font-weight:bold;"> <?php echo (!empty($_X['kodu'])?$_X['kodu']:''); ?></span>
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
		            <div class="card cardborder">
		                <div class="table-responsive">
					        <form action="" method="post" enctype="multipart/form-data" id="formId">
								<div class="ilktablo" style="float: left;width: 100%;"> 
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
									<?php /* ?>
								</div>
								<br>
					            <div class="blok bilgikumas" style="float:left;">
								<?php */ ?>
					                <table cellpadding="0" cellspacing="0" style="border: 2px solid #95989e;">
					                	<tbody>
											
						        			<?php require(__DIR__.'/ekle_prc.php'); ?>

						                    <tr style="display: none;"><th colspan="2">
						                    	<a href="?s=<?php echo $tbl; ?>&a=listele" class="btnSub btn1 printx"><img src="img/geri.png" height="20" /> GERİ</a>
						                    	<input type="submit" value="Kaydet" />
						                    </th></tr>
						        			
						                </tbody>
						            </table>
					            </div>
					            <input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
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



<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>
<?php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?php }?>