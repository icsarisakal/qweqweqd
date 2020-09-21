<?php

$ID=z(8,'id');

if(z(7,$tbl)){

	$fiyat_id=z(8,'fiyat');
	$kumas_id=z(8,'kumas');
	$blok_id=z(8,'blok'); 
	$blok_id=(!empty($blok_id)?$blok_id:0);
	$kumasfiyatkontrol="WHERE arsiv='0' AND fiyat_ID='".$fiyat_id."' AND kumas_ID='".$kumas_id."' AND blok_ID='".$blok_id."'";
	$kumasfiyattablo=z(1,$kumasfiyatkontrol,'','kumaskartifiyat');
	$kumasfiyatveri=(!empty($kumasfiyattablo[0])?$kumasfiyattablo[0]:0);
	if(!empty($kumasfiyatveri['ID'])){
		$ID=$kumasfiyatveri['ID'];
	}
	//__($kumasfiyatveri);
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


	$fiyatlar=(!empty($_X['fiyatlar'])?array_filter($_X['fiyatlar']):'');
	if(!empty($fiyatlar)){$fiyatlar=!empty($fiyatlar)?json_encode($fiyatlar):Null;}
	$_X['fiyatlar']=(!empty($fiyatlar)?$fiyatlar:'');
	
	$enbilgisi=(!empty($_X['enbilgisi'])?array_filter($_X['enbilgisi']):'');
	if(!empty($enbilgisi)){$enbilgisi=!empty($enbilgisi)?json_encode($enbilgisi):Null;}
	
	$_X['enbilgisi']=(!empty($enbilgisi)?$enbilgisi:'');

	$enbilgisiaciken=(!empty($_X['enbilgisiaciken'])?array_filter($_X['enbilgisiaciken']):'');
	if(!empty($enbilgisiaciken)){$enbilgisiaciken=!empty($enbilgisiaciken)?json_encode($enbilgisiaciken):Null;}
	
	$_X['enbilgisiaciken']=(!empty($enbilgisiaciken)?$enbilgisiaciken:'');

	$fiyatselect=(!empty($_X['fiyatselect'])?array_filter($_X['fiyatselect']):'');
	if(!empty($fiyatselect)){$fiyatselect=!empty($fiyatselect)?json_encode($fiyatselect):Null;}
	
	$_X['fiyatselect']=(!empty($fiyatselect)?$fiyatselect:'');

	$ekkumas=(!empty($_X['ekkumas'])?array_filter($_X['ekkumas']):'');
	if(!empty($ekkumas)){$ekkumas=!empty($ekkumas)?json_encode($ekkumas):Null;}
	
	$_X['ekkumas']=(!empty($ekkumas)?$ekkumas:'');

	$karoranlari=(!empty($_X['karoranlari'])?array_filter($_X['karoranlari']):'');
	if(!empty($karoranlari)){$karoranlari=!empty($karoranlari)?json_encode($karoranlari):Null;}
	
	$_X['karoranlari']=(!empty($karoranlari)?$karoranlari:'');

	$elyaforanlari=(!empty($_X['elyaforanlari'])?array_filter($_X['elyaforanlari']):'');
	if(!empty($elyaforanlari)){$elyaforanlari=!empty($elyaforanlari)?json_encode($elyaforanlari):Null;}
	
	$_X['elyaforanlari']=(!empty($elyaforanlari)?$elyaforanlari:'');

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
	$_X['img']='';
	if(!empty($_X['mkurusd'])){ $_X['mkurusd']=str_replace(",",".",$_X['mkurusd']); } 
	if(!empty($_X['mkureur'])){ $_X['mkureur']=str_replace(",",".",$_X['mkureur']); } 
	if(!empty($_X['mkurgbp'])){ $_X['mkurgbp']=str_replace(",",".",$_X['mkurgbp']); } 
	postKontrolTh($_X);
	$_X['tarihKayit']=!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):null;
//  __($_X);
		if(z(3,$ID,$_X,$tbl)){
			if(!empty($ID)){
				z(11,"sonduzenleme",1);
				$_X['revize_ID']=$ID;
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				z(2,$_X,'kumaskartifiyat');
			}
			z(33,'duzenle',1);
			z('git','yenile');
		}
		else z(33,'duzenle','-1');	
}

$_X=z(1,$ID,NULL,$tbl);
require(__DIR__.'/../fiyatcalismasi/kumaskontrol.php');
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

		<?php 
		$farkli=z(8,'farkli');
		if(!empty($farkli)){
			$_X=z(1,$farkli,'',$tbl);
		}
		?>

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
						<span class="breadcrumb-item active">Kombinasyon Düzenle</span>
						<span class="breadcrumb-item geneltanim" style="font-weight:bold;"> <?php echo (!empty($_X['kodu'])?$_X['kodu']:''); ?></span>
						<a href="./?s=kumaskartifiyat&a=detay&id=<?php echo $_X['ID']; ?>" class="btn btn-primary ml-2">Detay</a>
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
			        <form action="" method="post" enctype="multipart/form-data" id="formId">
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
										<td class="mkurusd" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkurusd]" value="<?php echo (!empty($_X['mkurusd'])&&$_X['mkurusd']!=0?$_X['mkurusd']:$usd); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control"></b></td>
										<td class="mkureur" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkureur]" value="<?php echo (!empty($_X['mkureur'])&&$_X['mkureur']!=0?$_X['mkureur']:$eur); ?>" autocomple="off" step="0.1" onkeyup="iplikdegisimkur()" class="kurmdegisim form-control"></b></td>
										<td class="mkurgbp" colspan="1"><b><input type="text" name="<?php echo $tbl; ?>[mkurgbp]" value="<?php echo (!empty($_X['mkurgbp'])&&$_X['mkurgbp']!=0?$_X['mkurgbp']:'0'); ?>" autocomple="off" step="0.1" class="form-control"></b></td>
										<td><input type="text" name="<?php echo $tbl?>[kodu]" value="<?php echo !empty($_X['kodu'])?$_X['kodu']:''?>" autocomplete="off" class="1kumaskodu form-control" disabled></td>
										<td><input type="text" name="<?php echo $tbl?>[ismi]" value="<?php echo !empty($_X['ismi'])?$_X['ismi']:''?>" autocomplete="off" class="1kumasismi form-control" disabled></td>
										<td><input type="text" name="<?php echo $tbl?>[article]" value="<?php echo !empty($_X['article'])?$_X['article']:''?>" autocomplete="off" class="articlemiz form-control" disabled></td>
										<input hidden type="text" name="<?php echo $tbl?>[kodu]" value="<?php echo !empty($_X['kodu'])?$_X['kodu']:''?>" autocomplete="off" class="1kumaskodu form-control">
										<input hidden type="text" name="<?php echo $tbl?>[ismi]" value="<?php echo !empty($_X['ismi'])?$_X['ismi']:''?>" autocomplete="off" class="1kumasismi form-control">
										<input hidden type="text" name="<?php echo $tbl?>[article]" value="<?php echo !empty($_X['article'])?$_X['article']:''?>" autocomplete="off" class="articlemiz form-control">

										<input type="hidden" name="<?php echo $tbl?>[nesne_IDkumasTipi]" value="180">
									</tr>
								</tbody>
							</table>
						</div>
						<table cellpadding="0" cellspacing="0" style="border: 2px solid #95989e;">
			                	<tbody>
									
									<?php require(__DIR__.'/ekle_prckombinasyon.php'); 
									$self_id = !empty($_X['ID'])?$_X['ID']:'""';
									$query = "WHERE revize_ID='0' AND cakmakumas_ID='".$self_id."' AND kumas_ID='".$ien."' AND fiyat_ID='".$fiyat_id."'";
									$first_data = !empty(z(1,$query,'','kumaskartifiyat'))?z(1,$query,'','kumaskartifiyat'):null;
									if($first_data!=null){
									foreach ($first_data as $key => $pageData_open) {	
										$selectedEnBilgisi = !empty($_X['enbilgisi'])?get_object_vars(json_decode($_X['enbilgisi'])):'0';
										$selectedEn[$key] = isset($selectedEnBilgisi[$ien][$key])?$selectedEnBilgisi[$ien][$key]:'0';
										$selectedInfoPrice = !empty($_X['fiyatselect'])?get_object_vars(json_decode($_X['fiyatselect'])):'0';		
										$selectedPrice[$key] = isset($selectedInfoPrice[$ien][$key])?$selectedInfoPrice[$ien][$key]:'0';
										$open_price = !empty($pageData_open['fiyatlar'])?json_decode($pageData_open['fiyatlar']):'';									
										$open_boyamaliyetkey = !empty($pageData_open['boyamaliyet'])?json_decode($pageData_open['boyamaliyet']):'';
										$open_pusvefayn = !empty($pageData_open['pusvefayn'])?json_decode($pageData_open['pusvefayn']):'';
										$open_birimTipi[$key] = !empty($pageData_open['birimTipi'])?$pageData_open['birimTipi']:'';
										$open_grm[$key] = !empty($pageData_open['grm'])?$pageData_open['grm']:'';
										if(!empty($open_birimTipi[$key])&&$open_birimTipi[$key]==1){$open_birimTipi[$key] = 'kg';}elseif(!empty($open_birimTipi[$key])&&$open_birimTipi[$key]==2){$open_birimTipi[$key] = 'm';}else{$open_birimTipi[$key] = '';}
										$open_boyamaliyetkey = get_object_vars($open_boyamaliyetkey);
										$open_boyamaliyetkeys = (array_keys($open_boyamaliyetkey));
										echo "<input hidden class=openBirimTipi".$key." value=".$open_birimTipi[$key].">";
										echo "<input hidden class=opengrm".$key." value=".$open_grm[$key].">";
										echo "<input hidden class=enSelected".$key." value=".$selectedEn[$key].">";
										echo "<input hidden class=priceSelected".$key." value=".$selectedPrice[$key].">";
										foreach($open_pusvefayn as $t => $psvfyn){
											if(isset($open_pusvefayn[$t][1])){
											echo "<input hidden class=pusvefayngizli".$key." value=".$open_pusvefayn[$t][1].">";
										}
									}
										for ($z=0; $z < count($open_price) ; $z++) { 
											$boyamaliyetTipi[$z] = z(1,$open_boyamaliyetkeys[$z],'tipi','boyabaski');
											echo "<input hidden class=parca".$key." type='text' value='".$boyamaliyetTipi[$z].'-'.$open_price[$z]."'>";
											echo "<input hidden class=parcavalue".$key." value=".$open_boyamaliyetkeys[$z].">";
										}
									}
								 }  ?>
								 
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

<input hidden type="text" value="<?php !empty(z(8,'')) ?>">
<script>
 
$(document).ready(function(){
	$(".getidkumas").attr('disabled','true');
	 var boyaBaskiName = '';
	 var birimTipi = [];
	 var grm = [];
	 var pusvefayn = [];
	 var selectedEn = [];
	 var selectedPrice = [];
	$( ".kumastr" ).each(function( index ) {
		 birimTipi[index] = $(".openBirimTipi"+index).val();
		 grm[index] = $(".opengrm"+index).val();
		selectedPrice[index] = $(".priceSelected"+index).val();
		 selectedEn[index] = $(".enSelected"+index).val();
		 $(".kumastr"+(index+1)+" .kumasenselect option").remove();
		$(".pusvefayngizli"+index).each(function(pvf){
			pusvefayn[pvf] = $(".pusvefayngizli"+index+":eq("+pvf+")").val();
			$(".kumastr"+(index+1)+" .kumasenselect").append(new Option(pusvefayn[pvf], pusvefayn[pvf]));
		});
			$(".kumastr"+(index+1)+" .kumasbirim2").text(birimTipi[index]);
			$(".kumastr"+(index+1)+" .kumasgrm").text(grm[index]);
		$(".kumastr"+(index+1)+" .fiyatselect option").remove();
		$( ".parca"+index ).each(function( keys ) {
			boyaBaskiName = $(".parca"+index+":eq("+keys+")").val();
			var boyaBaskiVal = $(".parcavalue"+index+":eq("+keys+")").val();
			$(".kumastr"+(index+1)+" .fiyatselect").append(new Option(boyaBaskiName, boyaBaskiVal));
		});

		$(".kumastr"+(index+1)+" .fiyatselect option[value="+selectedPrice[index]+"]").attr("selected","selected");
		$(".kumastr"+(index+1)+" .kumasenselect option[value="+selectedEn[index]+"]").attr("selected","selected");

	});

	var self_id=<?php echo $self_id;?>;
	var fiyat_id=<?php echo z(8,'fiyat');?>;
	var blok_id=<?php echo $blok_id;?>;
	var parca_id=<?php echo $parcaid;?>;
	setInterval(function() {

        $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=kumaskartifiyat&a=ajaxsorgu6&id="+self_id+"&fiyat_ID="+fiyat_id+"&blok_ID="+blok_id+"&parca_ID="+parca_id,
            success:function(gelensorgu){
				var kontrol = gelensorgu.cevap.kontrol;
				if(kontrol==1){
				var kumaskartifiyattabloveri = gelensorgu.cevap.kumaskartifiyatveri;
				var dovizler = gelensorgu.cevap.doviz;
				var fiyatlar = gelensorgu.cevap.fiyatlar;
				var pusvefayn = gelensorgu.cevap.pusvefayn;
				var boyabaskiname = gelensorgu.cevap.boyabaskiname;
				var boyabaskikey = gelensorgu.cevap.boyabaskikey;
				var birimTipi = gelensorgu.cevap.birimTipi;
				var artansayi = 0;		
				 $.each(kumaskartifiyattabloveri,function(index,value){
				 	$(".kumastr"+(index+1)+" .kumaskodu").text(value['kodu']);
				 	$(".kumastr"+(index+1)+" .kumasismi").text(value['ismi']);
				 	$(".kumastr"+(index+1)+" .kumasgrm").text(value['grm']);
				 	$(".kumastr"+(index+1)+" .kumasbirim2").text(birimTipi[index]);
				 	$(".kumastr"+(index+1)+" .kumasfiyatdoviz").text(dovizler[index]);
					$(".kumastr"+(index+1)+" .fiyatselect option").remove();
					$(".kumastr"+(index+1)+" .kumasenselect option").remove();

						for(var x=0;x<fiyatlar[0].length;x++){
							$(".kumastr"+(index+1)+" .fiyatselect").append(new Option(boyabaskiname[artansayi]+'-'+fiyatlar[index][x], boyabaskikey[x]));
							artansayi++;
						}
						$(".kumastr"+(index+1)+" .fiyatselect option[value="+selectedPrice[index]+"]").attr("selected","selected");
						for(var z=0;z<pusvefayn[index].length;z++){
							if(pusvefayn[index][z]!=""){
								$(".kumastr"+(index+1)+" .kumasenselect").append(new Option(pusvefayn[index][z][1],pusvefayn[index][z][1]));
							}
						}
						$(".kumastr"+(index+1)+" .kumasenselect option[value="+selectedEn[index]+"]").attr("selected","selected");

				 });
            	}
			}
        });
}, 5000); // Wait 5000ms before running again

});
</script>