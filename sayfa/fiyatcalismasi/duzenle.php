<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	$_X=z(7,$tbl);

	$enbilgisi=(!empty($_X['enbilgisi'])?array_filter($_X['enbilgisi']):'');
	if(!empty($enbilgisi)){$enbilgisi=!empty($enbilgisi)?json_encode($enbilgisi):Null;}
	
	$_X['enbilgisi']=(!empty($enbilgisi)?$enbilgisi:'');

	$blokid=0;
	$parca_id=0;
	$verikontrol=0;
	$fiyatid=$ID;
	$silmekontrol="WHERE fiyat_ID='".$fiyatid."' ";
	$enbilgisiarray=(!empty($enbilgisi)?json_decode($enbilgisi,1):'');
	if(!empty($enbilgisiarray)){
		$silmekontrol.=" AND ";
		foreach ($enbilgisiarray as $enkey => $enbilgivalue) {
			foreach ($enbilgivalue as $ekey => $envalue) {
				foreach ($envalue as $kumasid => $envalue2) {
					
					$kumasbilgi=z(1,$kumasid,'','kumaskarti');
					$nesne_IDkumasTipi = !empty($kumasbilgi['nesne_IDkumasTipi'])?$kumasbilgi['nesne_IDkumasTipi']:'0';
					$kumasfiyatkontrol="WHERE arsiv='0' AND nesne_IDkumasTipi='".$nesne_IDkumasTipi."' AND fiyat_ID='".$fiyatid."' AND kumas_ID='".$kumasid."' AND blok_ID='".$blokid."' AND set_ID='".$enkey."' ";
					//__($kumasfiyatkontrol);

					$kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
					$kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);

					if(!empty($kumasfiyatveri)){

					} else {

						if(!empty($kumasid)){
							

							$yenikumasarray=array();
							$yenikumasarray['personel_ID']=z('lgn','ID');
							$yenikumasarray['tarih']=z('datetime');
							$yenikumasarray['fiyat_ID']=$fiyatid;
							$yenikumasarray['kumas_ID']=$kumasid;
							$yenikumasarray['set_ID']=$enkey;
							$yenikumasarray['blok_ID']=$blokid;
							$yenikumasarray['parca_ID']=$parca_id;
							$yenikumasarray['nesne_IDiplikkartTipi']=(!empty($kumasbilgi['nesne_IDiplikkartTipi'])?$kumasbilgi['nesne_IDiplikkartTipi']:0);
							$yenikumasarray['nesne_IDdoviz']=(!empty($kumasbilgi['nesne_IDdoviz'])?$kumasbilgi['nesne_IDdoviz']:0);
							$yenikumasarray['nesne_IDdovizfason']=(!empty($kumasbilgi['nesne_IDdovizfason'])?$kumasbilgi['nesne_IDdovizfason']:0);
							$yenikumasarray['nesne_IDkumasTipi']=(!empty($kumasbilgi['nesne_IDkumasTipi'])?$kumasbilgi['nesne_IDkumasTipi']:0);
							$yenikumasarray['makinacesitleri_ID']=(!empty($kumasbilgi['makinacesitleri_ID'])?$kumasbilgi['makinacesitleri_ID']:0);
							$yenikumasarray['kumasturu_ID']=(!empty($kumasbilgi['kumasturu_ID'])?$kumasbilgi['kumasturu_ID']:0);
							$yenikumasarray['boyabaski_ID']=(!empty($kumasbilgi['boyabaski_ID'])?$kumasbilgi['boyabaski_ID']:0);
							$yenikumasarray['revize_ID']=(!empty($kumasbilgi['revize_ID'])?$kumasbilgi['revize_ID']:0);
							$yenikumasarray['tedarikci_ID']=(!empty($kumasbilgi['tedarikci_ID'])?$kumasbilgi['tedarikci_ID']:0);
							$yenikumasarray['birimTipi']=(!empty($kumasbilgi['birimTipi'])?$kumasbilgi['birimTipi']:0);
							$yenikumasarray['hamTipi']=(!empty($kumasbilgi['hamTipi'])?$kumasbilgi['hamTipi']:0);
							$yenikumasarray['enTipi']=(!empty($kumasbilgi['enTipi'])?$kumasbilgi['enTipi']:0);
							$yenikumasarray['mkurusd']=(!empty($kumasbilgi['mkurusd'])?$kumasbilgi['mkurusd']:0);
							$yenikumasarray['mkureur']=(!empty($kumasbilgi['mkureur'])?$kumasbilgi['mkureur']:0);
							$yenikumasarray['mkurgbp']=(!empty($kumasbilgi['mkurgbp'])?$kumasbilgi['mkurgbp']:0);
							$yenikumasarray['fiyat']=(!empty($kumasbilgi['fiyat'])?$kumasbilgi['fiyat']:0);
							$yenikumasarray['kumasfiyat']=(!empty($kumasbilgi['kumasfiyat'])?$kumasbilgi['kumasfiyat']:0);
							$yenikumasarray['fire']=(!empty($kumasbilgi['fire'])?$kumasbilgi['fire']:0);
							$yenikumasarray['kodu']=(!empty($kumasbilgi['kodu'])?$kumasbilgi['kodu']:null);
							$yenikumasarray['fasonmaliyet']=(!empty($kumasbilgi['fasonmaliyet'])?$kumasbilgi['fasonmaliyet']:null);
							$yenikumasarray['fasonmaliyet2']=(!empty($kumasbilgi['fasonmaliyet2'])?$kumasbilgi['fasonmaliyet2']:null);
							$yenikumasarray['grm']=(!empty($kumasbilgi['grm'])?$kumasbilgi['grm']:null);
							$yenikumasarray['kumasen']=(!empty($kumasbilgi['kumasen'])?$kumasbilgi['kumasen']:null);
							$yenikumasarray['telsayisi']=(!empty($kumasbilgi['telsayisi'])?$kumasbilgi['telsayisi']:null);
							$yenikumasarray['kombikumastl']=(!empty($kumasbilgi['kombikumastl'])?$kumasbilgi['kombikumastl']:null);
							$yenikumasarray['kombitoplamtl']=(!empty($kumasbilgi['kombitoplamtl'])?$kumasbilgi['kombitoplamtl']:null);
							$yenikumasarray['fiyatselect']=(!empty($kumasbilgi['fiyatselect'])?$kumasbilgi['fiyatselect']:null);
							$yenikumasarray['ismi']=(!empty($kumasbilgi['ismi'])?$kumasbilgi['ismi']:null);
							$yenikumasarray['iplikkartlari']=(!empty($kumasbilgi['iplikkartlari'])?$kumasbilgi['iplikkartlari']:null);
							$yenikumasarray['iplikfireleri']=(!empty($kumasbilgi['iplikfireleri'])?$kumasbilgi['iplikfireleri']:null);
							$yenikumasarray['boyamaliyet']=(!empty($kumasbilgi['boyamaliyet'])?$kumasbilgi['boyamaliyet']:null);
							$yenikumasarray['ekhizmet']=(!empty($kumasbilgi['ekhizmet'])?$kumasbilgi['ekhizmet']:null);
							$yenikumasarray['maliyetham']=(!empty($kumasbilgi['maliyetham'])?$kumasbilgi['maliyetham']:null);
							$yenikumasarray['enbilgisi']=(!empty($kumasbilgi['enbilgisi'])?$kumasbilgi['enbilgisi']:null);
							$yenikumasarray['enbilgisiaciken']=(!empty($kumasbilgi['enbilgisiaciken'])?$kumasbilgi['enbilgisiaciken']:null);
							$yenikumasarray['ekkumas']=(!empty($kumasbilgi['ekkumas'])?$kumasbilgi['ekkumas']:null);
							$yenikumasarray['karoranlari']=(!empty($kumasbilgi['karoranlari'])?$kumasbilgi['karoranlari']:null);
							$yenikumasarray['elyaforanlari']=(!empty($kumasbilgi['elyaforanlari'])?$kumasbilgi['elyaforanlari']:null);
							$yenikumasarray['pusvefayn']=(!empty($kumasbilgi['pusvefayn'])?$kumasbilgi['pusvefayn']:null);
							$yenikumasarray['pusvefaynaciken']=(!empty($kumasbilgi['pusvefaynaciken'])?$kumasbilgi['pusvefaynaciken']:null);
							$yenikumasarray['img']=(!empty($kumasbilgi['img'])?$kumasbilgi['img']:null);
							$yenikumasarray['imgtext']=(!empty($kumasbilgi['imgtext'])?$kumasbilgi['imgtext']:null);
							$yenikumasarray['article']=(!empty($kumasbilgi['article'])?$kumasbilgi['article']:null);
							$yenikumasarray['fiyatlar']=(!empty($kumasbilgi['fiyatlar'])?$kumasbilgi['fiyatlar']:null);
							$yenikumasarray['ilavenot']=(!empty($kumasbilgi['ilavenot'])?$kumasbilgi['ilavenot']:null);


							$yenikumastipi=$yenikumasarray['nesne_IDkumasTipi'];
							$yenienbilgi=$yenikumasarray['enbilgisi'];

							$sonid=z(2,$yenikumasarray,'kumaskartifiyat');
							$sonolusanveri=z(1,$sonid,'','kumaskartifiyat');

							if($yenikumastipi==180){
								$yenienbilgi=!empty($yenienbilgi)?json_decode($yenienbilgi):Null;
								if(!empty($yenienbilgi)){
									foreach ($yenienbilgi as $yenikey => $yenivalue) {
										$orjuretimkumas=z(1,$yenikey,'','kumaskarti');
										$orjuretimkumas['fiyat_ID']=$yenikumasarray['fiyat_ID'];
										$orjuretimkumas['kumas_ID']=$yenikey;
										$orjuretimkumas['cakmakumas_ID']=$sonid;
										$orjuretimkumas['personel_ID']=z('lgn','ID');
										$orjuretimkumas['tarih']=z('datetime');
										unset($orjuretimkumas['ID']);
										foreach ($yenivalue as $yenikey2 => $yenivalue2) {
											$orjuretimkumas['parca_ID']=$yenikey2;
											z(2,$orjuretimkumas,'kumaskartifiyat');
										}
										z(11,"sonduzenleme",1);
									}
								}
							}

						}


					}

					$silmekontrol.=" ( blok_ID='".$blokid."'  OR kumas_ID!='".$kumasid."' ) AND ";
					$verikontrol++;
					$parca_id++;

				}
				$parca_id=0;
				$blokid++;
				//$silmekontrol.=" ) ";
			}
			$blokid=0;
		}
		

	}
	$silmekontrol.='1234';
	$silmekontrol=str_replace('AND 1234','',$silmekontrol);
	if($verikontrol>0){
		$silinecekkartlar=z(1,$silmekontrol,'','kumaskartifiyat');
		if(!empty($silinecekkartlar)){
			foreach ($silinecekkartlar as $keysil => $valuesil) {
				$silid=$valuesil['ID'];
				//z(4,$silid,'kumaskartifiyat');
			}
		}
	}


	


	
	$enbilgisiaciken=(!empty($_X['enbilgisiaciken'])?array_filter($_X['enbilgisiaciken']):'');
	if(!empty($enbilgisiaciken)){$enbilgisiaciken=!empty($enbilgisiaciken)?json_encode($enbilgisiaciken):Null;}
	
	$_X['enbilgisiaciken']=(!empty($enbilgisiaciken)?$enbilgisiaciken:'');

	$pusbilgisi=(!empty($_X['pusbilgisi'])?array_filter($_X['pusbilgisi']):'');
	if(!empty($pusbilgisi)){$pusbilgisi=!empty($pusbilgisi)?json_encode($pusbilgisi):Null;}
	
	$_X['pusbilgisi']=(!empty($pusbilgisi)?$pusbilgisi:'');

	$fiyatselect=(!empty($_X['fiyatselect'])?array_filter($_X['fiyatselect']):'');
	if(!empty($fiyatselect)){$fiyatselect=!empty($fiyatselect)?json_encode($fiyatselect):Null;}
	
	$_X['fiyatselect']=(!empty($fiyatselect)?$fiyatselect:'');

	$pastalboyu=(!empty($_X['pastalboyu'])?array_filter($_X['pastalboyu']):'');
	if(!empty($pastalboyu)){$pastalboyu=!empty($pastalboyu)?json_encode($pastalboyu):Null;}
	$_X['pastalboyu']=(!empty($pastalboyu)?$pastalboyu:'');

	$pastalissayisi=(!empty($_X['pastalissayisi'])?array_filter($_X['pastalissayisi']):'');
	if(!empty($pastalissayisi)){$pastalissayisi=!empty($pastalissayisi)?json_encode($pastalissayisi):Null;}
	$_X['pastalissayisi']=(!empty($pastalissayisi)?$pastalissayisi:'');

	$birimgramaji=(!empty($_X['birimgramaji'])?array_filter($_X['birimgramaji']):'');
	if(!empty($birimgramaji)){$birimgramaji=!empty($birimgramaji)?json_encode($birimgramaji):Null;}
	$_X['birimgramaji']=(!empty($birimgramaji)?$birimgramaji:'');

	$fasonfiyati=(!empty($_X['fasonfiyati'])?array_filter($_X['fasonfiyati']):'');
	if(!empty($fasonfiyati)){$fasonfiyati=!empty($fasonfiyati)?json_encode($fasonfiyati):Null;}
	$_X['fasonfiyati']=(!empty($fasonfiyati)?$fasonfiyati:'');

	$musteriebati=(!empty($_X['musteriebati'])?array_filter($_X['musteriebati']):'');
	if(!empty($musteriebati)){$musteriebati=!empty($musteriebati)?json_encode($musteriebati):Null;}
	$_X['musteriebati']=(!empty($musteriebati)?$musteriebati:'');

	$urunkategorileri=(!empty($_X['urunkategorileri'])?array_filter($_X['urunkategorileri']):'');
	if(!empty($urunkategorileri)){$urunkategorileri=!empty($urunkategorileri)?json_encode($urunkategorileri):Null;}
	$_X['urunkategorileri']=(!empty($urunkategorileri)?$urunkategorileri:'');

	$aksesuarislem=(!empty($_X['aksesuarislem'])?array_filter($_X['aksesuarislem']):'');
	if(!empty($aksesuarislem)){$aksesuarislem=!empty($aksesuarislem)?json_encode($aksesuarislem):Null;}
	$_X['aksesuarislem']=(!empty($aksesuarislem)?$aksesuarislem:'');

	$ortaksesuar=(!empty($_X['ortaksesuar'])?array_filter($_X['ortaksesuar']):'');
	if(!empty($ortaksesuar)){$ortaksesuar=!empty($ortaksesuar)?json_encode($ortaksesuar):Null;}
	$_X['ortaksesuar']=(!empty($ortaksesuar)?$ortaksesuar:'');
	
	$ortakaksesuarmiktari=(!empty($_X['ortakaksesuarmiktari'])?array_filter($_X['ortakaksesuarmiktari']):'');
	if(!empty($ortakaksesuarmiktari)){$ortakaksesuarmiktari=!empty($ortakaksesuarmiktari)?json_encode($ortakaksesuarmiktari):Null;}
	$_X['ortakaksesuarmiktari']=(!empty($ortakaksesuarmiktari)?$ortakaksesuarmiktari:'');

	$ortakaksesuarislem=(!empty($_X['ortakaksesuarislem'])?array_filter($_X['ortakaksesuarislem']):'');
	if(!empty($ortakaksesuarislem)){$ortakaksesuarislem=!empty($ortakaksesuarislem)?json_encode($ortakaksesuarislem):Null;}
	$_X['ortakaksesuarislem']=(!empty($ortakaksesuarislem)?$ortakaksesuarislem:'');

	$hesaplanacakebatlar=(!empty($_X['hesaplanacakebatlar'])?array_filter($_X['hesaplanacakebatlar']):'');
	if(!empty($hesaplanacakebatlar)){$hesaplanacakebatlar=!empty($hesaplanacakebatlar)?json_encode($hesaplanacakebatlar):Null;}
	$_X['hesaplanacakebatlar']=(!empty($hesaplanacakebatlar)?$hesaplanacakebatlar:'');

	$_X['nesne_IDurunkategorileri']=(!empty($_X['nesne_IDurunkategorileri'])?$_X['nesne_IDurunkategorileri']:0);
	$_X['nesne_IDurunebatlari']=(!empty($_X['nesne_IDurunebatlari'])?$_X['nesne_IDurunebatlari']:0);
	$_X['urunsayi']=(!empty($_X['urunsayi'])?$_X['urunsayi']:0);

	if(!empty($_X['mkurusd'])){ $_X['mkurusd']=str_replace(",",".",$_X['mkurusd']); } 
	if(!empty($_X['mkureur'])){ $_X['mkureur']=str_replace(",",".",$_X['mkureur']); } 
	if(!empty($_X['mkurgbp'])){ $_X['mkurgbp']=str_replace(",",".",$_X['mkurgbp']); } 


	postKontrolTh($_X);
	z(6,$tbl);

	
	//__($tbl,$_X);
	if(z(3,$ID,$_X)){
		z(33,'duzenle',1);
		z('git','yenile');
	}
	else z(33,'duzenle','-1');
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
						<span class="breadcrumb-item active"><?php echo $yanmoduladi; ?></span>
						<span class="breadcrumb-item geneltanim" style="font-weight:bold;"> <?php echo (!empty($_X['teklifkodu'])?$_X['teklifkodu']:''); ?></span>
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
   <div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
		        	<form action="" method="post" enctype="multipart/form-data" id="formfiyatcalismasi">
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