<?php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	
	postKontrolTh($_X);
	
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
   <div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
		        	<form action="" method="post" enctype="multipart/form-data" id="formId">
						<?php require(__DIR__.'/ekle_prc.php'); ?>
           				<input type="hidden" name="git1" value="?s=<?php echo $tbl?>&a=listele" />
						<div class="form-group row">
						    <div class="col-lg-12 text-right">
					    		<input type="submit" class="btn btn-primary" value="Kaydet">
								<a href="#" style="display:none;" class="yenikaydet btn btn-success" onClick='submitDetailsForm()'>Kaydet(Buna Tıklama)</a>
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

<?php $idmiz=z(8,'id'); ?>
<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
        var urunkategori_ID=$(".urunkategori_ID").val();
        var urunebatlari_ID=$(".urunebatlari_ID").val();
        var fiyat=$(".fiyat").val();
		var idmiz=<?php echo (!empty($idmiz)?$idmiz:'-1'); ?>;
		$.ajax({
			type:"POST",
			url:"ajaxayar.php?s=konfeksiyonmaliyetleri&a=ajaxsorgu&urunkategori_ID="+urunkategori_ID+"&urunebatlari_ID="+urunebatlari_ID+"&fiyat="+fiyat+"&idmiz="+idmiz,
			success:function(gelensorgu){
				var urunkontrol=gelensorgu.cevap.urunkontrol;
				if(urunkontrol==0){
					$("#formId").submit();
				} else {
					alert("Aynı bilgiler mevcut değiştirin tekrar deneyin");
				}
			}
		});
    }
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