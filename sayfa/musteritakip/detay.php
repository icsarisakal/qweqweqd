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
</style>
<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$_Nesne=z(37,z(1,"WHERE ad='nereden'",'ID,ad,metin1,metin2','nesne'));
$_NesneDurum=z(37,z(1,"WHERE ad='asama'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$_NesneTip=z(37,z(1,"WHERE ad='tekrar'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$_NesneTeklif=z(37,z(1,"WHERE ad='teklifdurum'",'ID,sayi1,metin1,metin2,metin3,metin4','nesne'),'sayi1');
$_NesneSip=z(37,z(1,"WHERE ad='asamasip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$firma=z(1,$vt['firma_ID'],'','firma');
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="dtysayfa">
		<div class="tasiyici">
			<div class="tasiyici1">
				<?php if(!empty($vt['firma_ID'])){ ?>
					<?php $firma=z(1,$vt['firma_ID'],'','firma'); ?>
					<div class="dtyborder dtybaslik2">Kurum</div>
					<?php if(!empty($firma)){ ?>
						<div class="dtyaciklama"><a href="?s=firma&a=duzenle&id=<?php echo $firma['ID']; ?>" style="color:black;"><?php echo $firma['ad']; ?></a></div>
						
					<?php } else {  ?>
						<div class="dtyaciklama"><a href="#" style="color:black;">Firma Bulunamadı.</a></div>
					<?php } } ?>
					<?php if(!empty($firma['tel'])){ ?>
						<div class="dtyborder dtybaslik2">Kurum Telefon Numarası</div>
						<div class="dtyaciklama"><?php echo $firma['tel']; ?></div>
					<?php } ?>
					<?php if(!empty($vt['aciklama'])){ ?>
						<div class="dtyborder dtybaslik2">Açıklama</div>
						<div class="dtyaciklama"><?php echo $vt['aciklama'];  ?></div>
					<?php } ?>
					<?php if(!empty($vt['asama'])){ ?>
						<div class="dtyborder dtybaslik2">Son Durum</div>
						<div class="dtyaciklama"><?php if($_NesneDurum[$vt['asama']]['metin1']){ echo $_NesneDurum[$vt['asama']]['metin1'];} ?></div>
					<?php } ?>
					<?php if(!empty($_Nesne[$vt['nesne_IDnereden']]['metin1'])){  ?>
						<div class="dtyborder dtybaslik2">Müşteri İlişkisi</div>
						<div class="dtyaciklama"><?php echo $_Nesne[$vt['nesne_IDnereden']]['metin1']; ?></div>
					<?php } ?>
					<?php if(!empty($vt['personel_ID'])){ 
						$personelcek=z(1,$vt['personel_ID'],'','personel'); ?>
						<div class="dtyborder dtybaslik2">Ekleyen Personel</div>
						<div class="dtyaciklama"><?php if(!empty($personelcek['ad'])){ echo $personelcek['ad'].' '; } if(!empty($personelcek['soyad'])){ echo $personelcek['soyad']; } ?></div>
					<?php } ?>
					<?php if(!empty($vt['tarihKayit'])){ ?>
						<div class="dtyborder dtybaslik2">Eklenme Tarihi</div>
						<div class="dtyaciklama"><?php _z('tarih',$vt['tarihKayit']); ?></div>
					<?php } ?>
				</div>
				<div class="tasiyici2">
					<?php $teklifcek=z(1,array('arsiv'=>0,'musteritakip_ID'=>z(8,'id')),'','teklif'); ?>
					<?php if(!empty($teklifcek)){ ?>
						<div class="divblock">
							<div class="dtyborder">TEKLİFLER</div>
						</div>
						<table class="dtytable" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><span>Proforma No</span></th>
									<th><span>İlgili Kişi</span></th>
									<th><span>Teklif Tutar</span></th>
									<th><span>Son Durum</span></th>
									<th><span>Tarih</span></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($teklifcek as $tcek) { ?>
									<tr>
										<td><a href="?s=teklif&a=detay&id=<?php echo $tcek['ID']; ?>" class="dty dtytext"><?php if(!empty($tcek['proformaNo'])){ echo $tcek ['proformaNo']; } ?></a></td>
										<td>
											<?php if(!empty($tcek['kisi_ID'])){
												$kisicek=z(1,$tcek['kisi_ID'],'','kisi');
												if(!empty($kisicek['ad'])){
													echo $kisicek['ad'].' ';
												}
												if(!empty($kisicek['soyad'])){
													echo $kisicek['soyad'];
												}
											} ?>
										</td>
										<td><?php if(!empty($tcek['fiyat'])){ echo z('sayi',$tcek['fiyat'],2); } ?> TL</td>
										<td><?php if(!empty($_NesneDurum[$tcek['teklifdurum']]['metin1'])){ echo $_NesneDurum[$tcek['teklifdurum']]['metin1']; } ?>
										<td><?php if(!empty($tcek['tarihKayit'])){ echo z('tarihsaat',$tcek['tarihKayit']); } ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
					<?php $ilgilikisiler=z(1,array('firma_ID'=>$firma['ID']),'','kisi'); ?>
					<?php if(!empty($ilgilikisiler)){ ?>
					<div class="divblock">
						<div class="dtyborder">İLGİLİ KİŞİLER</div>
					</div>
					<table class="dtytable" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th><span>Kişi Adı</span></th>
								<th><span>Kişi Soyadı</span></th>
								<th><span>Telefon Numarası</span></th>
								<th><span>Ünvanı</span></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ilgilikisiler as $ilgksicek) { ?>
								<tr>
									<td><?php if(!empty($ilgksicek['ad'])){ echo $ilgksicek['ad']; } ?></td>
									<td><?php if(!empty($ilgksicek['soyad'])){ echo $ilgksicek['soyad']; } ?></td>
									<td><?php if(!empty($ilgksicek['telCep1'])){ echo $ilgksicek['telCep1']; } ?></td>
									<td><?php if(!empty($ilgksicek['unvan'])){ echo $ilgksicek['unvan']; } ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php } ?>
					<?php $sipariscek=z(1,array('arsiv'=>0,'musteritakip_ID'=>z(8,'id')),'','siparistakip'); ?>
					<?php if(!empty($sipariscek)){ ?>
						<div class="divblock">
							<div class="dtyborder">SİPARİŞLER</div>
						</div>
						<table class="dtytable" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><span>Sipariş No</span></th>
									<th><span>Son Durum</span></th>
									<th><span>Tarih</span></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sipariscek as $sipcek) { ?>
									<tr>
										<td><a href="?s=siparis&a=detay&id=<?php echo $sipcek['ID']; ?>" class="dty dtytext"><?php if(!empty($sipcek['teklifno'])){ echo $sipcek['teklifno']; } ?></a></td>
										<td><?php if($_NesneSip[$sipcek['asamasip']]['metin1']){ echo $_NesneSip[$sipcek['asamasip']]['metin1'];} ?></td>
										<td><?php if(!empty($sipcek['tarihSiparis'])){ echo z('tarihsaat',$sipcek['tarihSiparis']); } ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
					<?php $hatirlatici=z(1,array('arsiv'=>0,'hmodul'=>'musteritakip','hmodul_ID'=>$id),'','hatirlatici');
					if(!empty($hatirlatici)){ ?>
						<div class="divblock">
							<div class="dtyborder">HATIRLATMALAR <a href="?s=hatirlatici&a=ekle&tbl=<?php echo $tbl; ?>&id=<?php echo z(8,'id'); ?>" style="color:#ffffff;border: 1px solid #dddddd;background:#30962e;padding: 1px;border-radius: 10px;padding-right: 10px;padding-left: 10px;">HATIRLATICI EKLE</a></div>
						</div>
						<table class="dtytable" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><span>Tarih</span></th>
									<th><span>Tip</span></th>
									<th><span>Açıklama</span></th>
								</tr>
							</thead>
							<tbody>
								<?php $tarihclass=''; ?>
								<?php foreach ($hatirlatici as $htr) {?>
									<?php
									if(!empty($htr['tarihHatirlatici'])){
										$htrtarih=z('tarihsaat',$htr['tarihHatirlatici']);
										$tarih=z('tarihsaat');
										if($htrtarih<$tarih){
											$tarihclass='dtytr';
										}
									} ?>
									<tr class="<?php echo $tarihclass; ?>">
										<?php if (!empty($htr['hftMulti'])) {?>
											<td><?php echo $htr['hftMulti']; ?></td>
										<?php } ?>
										<?php if(!empty($htr['tarihHatirlatici'])){ ?>
											<td><?php echo z('tarihsaat',$htr['tarihHatirlatici']);  ?></td>
										<?php } ?>
										<?php if(!empty($htr['tekrar'])){ ?>
											<td><?php if($_NesneTip[$htr['tekrar']]['metin1']){ echo $_NesneTip[$htr['tekrar']]['metin1'];} ?></td>
										<?php } ?>
										<?php if(!empty($htr['aciklama'])){ ?>
											<td><?php echo $htr['aciklama']; ?></td>
										<?php } else { ?>
											<td>&nbsp;</td>
										<?php } ?>
									</tr>
									<?php $tarihclass=''; ?>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
					<?php 
					$asamacek=z(1,array('arsiv'=>0,'modul_ID'=>$id,'modul'=>$tbl),'','asama');
					?>
					<?php if(!empty($asamacek)){ ?>
						<div class="divblock">
							<div class="dtyborder">DURUM GEÇMİŞİ</div>
						</div>
						<table class="dtytable" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th><span>Tarih</span></th>
									<th><span>Durum</span></th>
									<th><span>Açıklama</span></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($asamacek as $ascek) { ?>
									<style type="text/css">
										<?php 
										$_NesneAsama=z(37,z(1,"WHERE ad='asama'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
										if(!empty($_NesneAsama))foreach ($_NesneAsama as $nesneAsama) {
											echo '.dtydurum_'.$nesneAsama['sayi1'].'{ background-color: '.$nesneAsama['metin2'].'; }';
										} 
										?>
									</style>
									<tr>
										<td><?php echo z('tarihsaat',$ascek['tarih']); ?></td>
										<td><span class="dtydurum dtydurum_<?php echo $ascek['durum']; ?>"><?php echo $_NesneAsama[$ascek['durum']]['metin1']; ?></span></td>
										<?php if(!empty($ascek['aciklama'])){ ?>
											<td><?php echo $ascek['aciklama']; ?></td>
										<?php } else { ?>
											<td>Açıklama Bulunamadı..</td>
										<?php } ?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>