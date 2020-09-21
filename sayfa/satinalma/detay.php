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
		width: 40%;
		float: left;
		padding-top:8px;
		padding-right: 22px;
	}
	.tasiyici2{
		width: 40%;
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
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='depo' OR ad='aksesuargruplari' OR ad='iplikkartTipi' OR ad='doviz' OR ad='satinalmaTip' OR ad='birimTipi'",'ID,ad,metin1,metin2','nesne'));
$cari_ID=z(1,$vt['cari_ID'],'ad','cari');
$kumaskarti = z(37,z(1,'WHERE arsiv=0 AND revize_ID=0','ID,kodu','kumaskarti'));

?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="dtysayfa">
		<div class="tasiyici">
			<div class="tasiyici1">
					<?php if(!empty($vt['fisNo'])){  ?>
						<div class="dtyborder dtybaslik2">Fiş No </div>
						<div class="dtyaciklama"><?php if(!empty($vt['fisNo'])){ echo $vt['fisNo']; } ?></div>
					<?php } ?>
					<?php if(!empty($vt['nesne_IDsatinalmaTip'])){ ?>
						<div class="dtyborder dtybaslik2">Sipariş Tip</div>
						<div class="dtyaciklama"><?php if($_Nesne[$vt['nesne_IDsatinalmaTip']]['metin1']){ echo $_Nesne[$vt['nesne_IDsatinalmaTip']]['metin1'];} ?></div>
					<?php } ?>
					<?php if(!empty($vt['belgeNo'])){ ?>
						<div class="dtyborder dtybaslik2">Belge No</div>
						<div class="dtyaciklama"><?php echo (!empty($vt['belgeNo'])?$vt['belgeNo']:'');  ?></div>
					<?php } ?>
					<?php if(!empty($vt['cari_ID'])){ ?>
						<div class="dtyborder dtybaslik2">Cari Hesap</div>
						<div class="dtyaciklama"><?php echo (!empty($cari_ID)?$cari_ID:'');  ?></div>
					<?php } ?>
					<?php if(!empty($vt['nesne_IDdepo'])){ ?>
						<div class="dtyborder dtybaslik2">Depo</div>
						<div class="dtyaciklama"><?php if($_Nesne[$vt['nesne_IDdepo']]['metin1']){ echo $_Nesne[$vt['nesne_IDdepo']]['metin1'];} ?></div>
					<?php } ?>
					
					
                    <br>
                    <a href="?s=<?php echo z(8,'s'); ?>&a=duzenle&id=<?php echo z(8,'id'); ?>" class="formduzenleme printx">BU FORMU DÜZENLE</a>
					<?php if(($admn||ytk($tbl,'sil'))){ ?>
					<br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=listele&idx=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background: #d20000;color: white;" onclick="return confirm('Kalıcı olarak silmek istediğine emin misin?')">BU FORMU KALICI OLARAK SİL /<br> DELETE THIS FORM PERMANENTLY</a>
					<?php } ?>
                    <br>
				</div>
						<?php 
							    
								
	

						

							
							$malzemeKod= !empty($vt['malzemeKodu'])?json_decode($vt['malzemeKodu']):'--';	
							$malzemeAd= !empty($vt['malzemeAd'])?json_decode($vt['malzemeAd']):'--';			
							$malzemeAciklama= !empty($vt['aciklama'])?json_decode($vt['aciklama']):'--';			
							$malzemeSipMik= !empty($vt['siparisMiktar'])?json_decode($vt['siparisMiktar']):'--';			
							$malzemeGelenMik= !empty($vt['gelenMiktar'])?json_decode($vt['gelenMiktar']):'--';			
							$malzemeKalanMik= !empty($vt['kalanMiktar'])?json_decode($vt['kalanMiktar']):'--';			
							$malzemeFiyat= !empty($vt['fiyat'])?json_decode($vt['fiyat']):'--';			
							$malzemeBirim= !empty($vt['nesne_IDbirimTipi'])?json_decode($vt['nesne_IDbirimTipi']):'';			
							$malzemeDoviz= !empty($vt['nesne_IDdoviz'])?json_decode($vt['nesne_IDdoviz']):'';
							$malzemeTermin= !empty($vt['tarihTermin'])?json_decode($vt['tarihTermin']):'--';	

						?>
				<div class="tasiyici2">

				<table class="tablegroup" bordercolor="Gray" border='1' cellpading='10'>
						<tr>
							<th>Malzeme Kodu</th>
							<th>Malzeme Adı</th>
							<th>Açıklama</th>					
							<th>Sipariş Miktarı</th>
							<th>Gelen Miktar</th>
							<th>Kalan Miktar</th>			
							<th>Fiyat</th>
							<th>Birim</th>
							<th>Döviz</th>						
							<th>Termin</th>
						</tr>
						<?php foreach ($malzemeAd as $key => $malzemeDty) {  ?>
							
						<tr>
						<?php if($vt['nesne_IDsatinalmaTip']=='264'||$vt['nesne_IDsatinalmaTip']=='266'){  ?>
							<td><?php  echo $malzemeKod[$key]!=0?$_Nesne[$malzemeKod[$key]]['metin1']:'--'; ?></td>
						<?php } 					
						elseif($vt['nesne_IDsatinalmaTip']=='265'){
						?>							
						<td><?php  echo $malzemeKod[$key]!=0?$kumaskarti[$malzemeKod[$key]]['kodu']:'--'; ?></td>
						<?php } ?>
							
							<td><?php echo $malzemeDty; ?></td>
							<td><?php echo $malzemeAciklama[$key]; ?></td>
							<td><?php echo $malzemeSipMik[$key]; ?></td>
							<td><?php echo $malzemeGelenMik[$key]; ?></td>
							<td><?php echo $malzemeKalanMik[$key]; ?></td>
							<td><?php echo $malzemeFiyat[$key]; ?></td>
							<td><?php echo !empty($_Nesne[$malzemeBirim[$key]]['metin1'])?$_Nesne[$malzemeBirim[$key]]['metin1']:'-'; ?></td>
							<td><?php echo !empty($_Nesne[$malzemeDoviz[$key]]['metin1'])?$_Nesne[$malzemeDoviz[$key]]['metin1']:'-'; ?></td>
							<td><?php echo $malzemeTermin[$key]; ?></td>


						</tr>
						<?php } ?>
						
				</table><br>
				<?php if(!empty($vt['tarihFis'])){ ?>
						<div class="dtyborder dtybaslik2">Fiş Tarih</div>
						<div class="dtyaciklama"><?php echo (!empty($vt['tarihFis'])?$vt['tarihFis']:'');  ?></div>
					<?php } ?>	
					<?php if(!empty($vt['tarih'])){ ?>
						<div class="dtyborder dtybaslik2">Tarih</div>
						<div class="dtyaciklama"><?php echo (!empty($vt['tarih'])?$vt['tarih']:'');  ?></div>
					<?php } ?>	

				<?php 
					$fiyatarsivicek=z(1,array('arsiv'=>0,'modul_ID'=>$id,'modul'=>$tbl),'','fiyatarsiv');
					?>
                    <?php if(!empty($fiyatarsivicek)){ ?>
                    <div class="divblock">
                        <div class="dtyborder">FİYAT GEÇMİŞİ</div>
                    </div>
                    <table class="dtytable" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th><span>Sıra</span></th>
                                <th><span>Tarih</span></th>
                                <th><span>Birim Fiyatı</span></th>
                                <th><span>Döviz Cinsi</span></th>
                                <th><span>Düzenleyen Personel</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fiyatarsivicek as $i => $ascek) { 
                                $personelcek=z(1,$ascek['personel_ID'],'ID,ad,soyad','personel'); 
                            ?>
                            
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo z('tarihsaat',$ascek['tarih']); ?></td>
                                <td><?php echo (!empty($ascek['fiyat'])?z(36,$ascek['fiyat']):'0');  ?></td>
                                <td><?php if(!empty($ascek['nesne_IDdoviz'])){ if($_Nesne[$ascek['nesne_IDdoviz']]['metin1']){ echo $_Nesne[$ascek['nesne_IDdoviz']]['metin1'];} } ?></td>
                                <td><?php echo (!empty($personelcek['ad'])?$personelcek['ad']:'').'&nbsp;'.(!empty($personelcek['soyad'])?$personelcek['soyad']:''); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
					
				</div>
			</div>
		</div>
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>


        