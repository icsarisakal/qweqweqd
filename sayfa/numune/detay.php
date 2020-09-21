<style type="text/css">
	body{
		background: white;
	}
	.dtysayfa{
		max-width: 1200px;
		padding: 20px;
		box-sizing: border-box;
		margin:auto;
		margin-top: 20px;
		background: white;
		border-radius: 24px;
		border: 1px solid #fff;
		overflow: hidden;
		-webkit-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		-moz-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
	}

    .formduzenleme{
        background: #14eed0;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 50px;
        display: block;
        text-align: center;
        color: #433c3c;
        font-weight: bold;
        font-size: 16px;
    }
	.tasiyici{
		width: 100%;
		height: auto;
		padding:4px;
		overflow: hidden;
	}
	.tasiyici1{
		width: 50%;
		float: left;
		padding-top:8px;
		padding-right: 22px;
	}
	.tasiyici2{
		width: 50%;
		float: left;
		padding-left: 4px;
	}
	.dtybaslik{
		text-decoration: underline;
		font-size: 10px;
		margin-top: 8px;
	}
	.dtyaciklama{
		margin-top: 2px;
		font-size: 14px;
		padding: 11px 12px 11px 20px;
	}
	.divblock{
		width: 100%;
		float: left;
		margin-top: 8px;
	}
	.dtyborder{
		background: #f8f8f8;
		font-size: 12px;
		letter-spacing: 1px;
		text-decoration: none;
		font-weight: 700;
		border-radius: 12px;
		padding-right: 10px;
		padding-left: 10px;
		color: #666;
		padding: 0.4em 0.4em 0.4em 1em;
		text-transform: uppercase;
	}
	.dtytable{
		margin-top:10px;
		float: left;
		border: none;
	}
	.dtytr td{
		background: #f07f0c;
		color:white;
	}
	.dtydurum{
		border-radius: 12px;
		border: 1px solid #f0f0f0;
		padding-left: 10px;
		padding-right: 10px;
	}
	.dtytext{
		font-size: 10px;
	}
	.dtybaslik2{
		font-weight: normal;
	}
	@media only screen and (max-width: 978px) {
		.tasiyici1 {
			width:100%;
		}
		.tasiyici2 {
			width:100%;
			margin-top: 20px;
		}
	}
    @media print {
        .printx{
            display:none;
        }
    }
</style>

<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
?>
<style>
.prcimg{
    width:<?php if(!empty($vt['anahtar'])&&$vt['anahtar']==1){ echo '20%'; } elseif(!empty($vt['anahtar'])&&$vt['anahtar']==2) { echo '5%'; } else{ echo '100%'; } ?>;

}
</style>
<?php 

	$cariData=z(37,z(1,'WHERE arsiv=0','','cari'));
	if(!empty($vt)&&$vt['arsiv']!='-1'){  //__($vt); ?>
	<div class="dtysayfa">
		<div class="tasiyici">
			<div class="tasiyici1">
					<?php if(!empty($vt['numuneTur'])){  ?>
						<div class="dtyborder dtybaslik2"> Numune Türü:</div>
						<div class="dtyaciklama"><?php if(!empty($vt['numuneTur'])){ echo $numuneTur[$vt['numuneTur']]; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['cari_ID'])){  ?>
						<div class="dtyborder dtybaslik2"> Müşteri Adı:</div>
						<div class="dtyaciklama"><?php if(!empty($vt['cari_ID'])){ echo $cariData[$vt['cari_ID']]['ad']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['img'])){  ?>
						<div class="dtyborder dtybaslik2"> Resim</div>
						<div class="dtyaciklama"> <img src="upload/kumaskarti/<?php echo $vt['img'];?>" class="prcimg"> <span style="float:left;"><?php echo $vt['img'];?></span></div>
					<?php } ?>

					<?php if(!empty($vt['personel_IDkayit'])){ 
						$personelcek=z(1,$vt['personel_IDkayit'],'','personel'); ?>
						<div class="dtyborder dtybaslik2">GÖNDEREN PERSONEL</div>
						<div class="dtyaciklama"><?php if(!empty($personelcek['ad'])){ echo $personelcek['ad'].' '; } if(!empty($personelcek['soyad'])){ echo $personelcek['soyad']; } ?></div>
					<?php } ?>
					

					<?php if(!empty($vt['tarihKayit'])){ ?>
						<div class="dtyborder dtybaslik2">KAYIT TARİHİ</div>
						<div class="dtyaciklama"><?php _z('tarih',$vt['tarihKayit']); ?></div>
					<?php } ?>
                    <br>
                    <a href="?s=<?php echo z(8,'s'); ?>&a=duzenle&id=<?php echo z(8,'id'); ?>" class="formduzenleme printx">BU FORMU DÜZENLE</a>
					<?php if(($admn||ytk($tbl,'sil'))){ ?>
					<br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=listele&idx=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background: #d20000;color: white;" onclick="return confirm('Kalıcı olarak silmek istediğine emin misin?')">BU FORMU KALICI OLARAK SİL /<br> DELETE THIS FORM PERMANENTLY</a>
					<?php } ?>
                    <br>
				</div>
				<div class="tasiyici2">
				<?php 

			




					
					
			
					
					$geciciNumuneKms=array();
					$geciciNumuneKms+=['kumaskarti_ID'=>json_decode($vt['kumaskarti_ID'])];
					$geciciNumuneKms+=['renkkarti_ID'=>json_decode($vt['renkkarti_ID'])];
					$geciciNumuneKms+=['nesne_IDnumuneDurumTip'=>json_decode($vt['nesne_IDnumuneDurumTip'])];
					$geciciNumuneKms+=['numuneCesitInput'=>json_decode($vt['numuneCesitInput'])];
					$geciciNumuneKms+=['ebat'=>json_decode($vt['ebat'])];
					$geciciNumuneKms+=['aciklama'=>json_decode($vt['aciklama'])];
					$geciciNumuneKms+=['sampleName'=>json_decode($vt['sampleName'])];
					$geciciNumuneKms+=['sampleType'=>json_decode($vt['sampleType'])];
					$geciciNumuneKms+=['fabric'=>json_decode($vt['fabric'])];
					$geciciNumuneKms+=['color'=>json_decode($vt['color'])];
					$geciciNumuneKms+=['weight'=>json_decode($vt['weight'])];
					$geciciNumuneKms+=['size'=>json_decode($vt['size'])];
					$geciciNumuneKms+=['comment'=>json_decode($vt['comment'])];
					$geciciNumuneKms+=['composition'=>json_decode($vt['composition'])];	
					
					
					
					
					
					
					

					
					
				//	__($geciciNumuneKms);
					$sayiNumune=count($geciciNumuneKms['kumaskarti_ID']);
					
				// 	if($numuneTur[$vt['numuneTur']]=='Aksesuar'){

				// 		$numuneKumas=z(1,array('arsiv'=>0,'ID'=>$vt['numune_ID']),'','numuneaksesuar');
				// 	//__($numuneKumas);
				// 	$geciciNumuneAks=array();
				// 	$geciciNumuneAks+=['aksesuar_ID'=>json_decode($numuneKumas[0]['aksesuar_ID'])];
				// 	$geciciNumuneAks+=['nesne_IDnumuneDurumTip2'=>json_decode($numuneKumas[0]['nesne_IDnumuneDurumTip2'])];
				// 	$geciciNumuneAks+=['sizeAksesuar'=>json_decode($numuneKumas[0]['sizeAksesuar'])];
				

					
					
				// //	__($geciciNumune);
				// 	$sayiNumune=count($geciciNumuneAks['aksesuar_ID']);


				// 	}

				
					
					
					if(!empty($geciciNumuneKms)){
							
						$kumasKartiCek=z(37,z(1,'WHERE arsiv=0','','kumaskarti'));
						$kumasTuruCek=z(37,z(1,'WHERE arsiv=0','','kumasturu'));
						$renkKartiCek=z(37,z(1,'WHERE arsiv=0','','renkkarti'));
						$makinaCek=z(37,z(1,'WHERE arsiv=0','','makinacesitleri'));
						$nesneTip=z(37,z(1,'WHERE arsiv=0 and ad="numuneDurumTip"','','nesne'));

						
						
						?>
						<div class="divblock">
							<div class="dtyborder">Numune Detayları</div>
						</div>
						<table class="dtytable" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><span>No</span></th>
									<th><span>Ad</span></th>
									<th><span>Tip</span></th>
									<th><span>Kumaş Kodu</span></th>
									<th><span>Kompozisyon</span></th>
									<th><span>Renk</span></th>
									<th><span>Ağırlık</span></th>
									<th><span>Ebat</span></th>
									<th><span>Açıklama</span></th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php 
								
								
								for ($i=0; $i < $sayiNumune; $i++) { 
									
									//$personelcek=z(1,$ascek['personel_ID'],'ID,ad,soyad','personel'); 
								?>
								
	
	
								<tr>
									<td><?php echo $i+1; ?></td>
									<td><?php echo !empty($geciciNumuneKms['sampleName'][$i])?$geciciNumuneKms['sampleName'][$i]:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['nesne_IDnumuneDurumTip'][$i])?$nesneTip[$geciciNumuneKms['nesne_IDnumuneDurumTip'][$i]]['metin1']:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['kumaskarti_ID'][$i])?!empty($kumasKartiCek[$geciciNumuneKms['kumaskarti_ID'][$i]]['kodu'])?$kumasKartiCek[$geciciNumuneKms['kumaskarti_ID'][$i]]['kodu']:'':''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['composition'][$i])?$geciciNumuneKms['composition'][$i]:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['color'][$i])?$geciciNumuneKms['color'][$i]:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['weight'][$i])?$geciciNumuneKms['weight'][$i]:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['size'][$i])?$geciciNumuneKms['size'][$i]:''; ?></td>
									<td><?php echo !empty($geciciNumuneKms['comment'][$i])?$geciciNumuneKms['comment'][$i]:''; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php }
					
					
					
					
					?>
					
				</div>
			</div>
		</div>
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>


        