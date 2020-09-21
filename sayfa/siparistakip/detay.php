<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$_NesneDurum=z(37,z(1,"WHERE ad='asamasip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$_NesneTip=z(37,z(1,"WHERE ad='tekrar'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$firma=z(1,$vt['firma_ID'],'','firma');
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="sayfa">
		<div class="baslik" style="color: white; padding: 0.4em;">Modulün Detayı</div>
		<div class="icerik">
			<div class="blok">
				<table cellpadding="0" cellspacing="0">
					<tbody>
						<tr>Görüntüle</tr>
						<?php if(!empty($vt['firma_ID'])){ ?>
							<?php $firma=z(1,$vt['firma_ID'],'','firma'); ?>
							<tr><th>Firma</th><td><?php if(!empty($firma)){ ?><a href="?s=firma&a=duzenle&id=<?php echo $firma['ID']; ?>" style="background: black; color: white; padding: 2px;"><?php echo $firma['ad']; ?></a><?php } ?></td></tr>
						<?php } else {  ?>
							<tr><th>Firma</th><td>Firma Bulunamadı</td></tr>
						<?php } ?>
						<?php if(!empty($vt['aciklama'])){ ?>
							<tr><th>Açıklama</th><td><?php echo $vt['aciklama'];  ?></td></tr>
						<?php } ?>
						<?php if(!empty($vt['asamasip'])){ ?>
							<tr><th>Durum</th><td><?php if($_NesneDurum[$vt['asamasip']]['metin1']){ echo $_NesneDurum[$vt['asamasip']]['metin1'];} ?></td></tr>
						<?php } else {  ?>
							<tr><th>Durum</th><td>Henüz Okunmadı</td></tr>
						<?php } ?>
						<?php if(!empty($vt['tarihSiparis'])){ ?>
							<tr><th>Kayıt Tarihi</th><td><?php _z('tarih',$vt['tarihSiparis']); ?></td></tr>
						<?php } else {  ?>
							<tr><th>Kayıt Tarihi</th><td>Tarih Bulunamadı</td></tr>
						<?php } ?>
						<?php if(!empty($vt['hmodul_ID'])){ ?>
							<tr><th>İlişkili Modül</th><td><a href="?s=<?php echo $vt['hmodul'].'&a=duzenle&id='.$vt['hmodul_ID']; ?>" style="background: black; color: white; padding: 2px;"><?php echo $vt['hmodul']; ?></a></td></tr>
						<?php } ?>
						<tr><th>Düzenle</th><td><a href="<?php echo '?s='.$tbl.'&a=duzenle&id='.$id; ?>" style="background: black; color: white; padding: 2px;">Düzenle</a></td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php if(!empty($vt['hatirlaticilar'])){ ?>
		<?php 

		$htstr=str_replace(',', ' OR ID=', $vt['hatirlaticilar']);
		if(strpos($vt['hatirlaticilar'],",")){
			$htstr2="AND ID =".$htstr;
		} else {
			$htstr=str_replace(',', '', $vt['hatirlaticilar']);
			$htstr2="AND ID =".$htstr;
		}
		$htsorgu="WHERE arsiv<>-1 ".$htstr2;
		$hatirlatici=z(1,$htsorgu,'','hatirlatici');

		?>
	<?php } ?>
	<div class="sayfa">
		<div class="baslik" style="padding: 0.4em;"><a href="?s=hatirlatici&a=ekle&tbl=<?php echo $tbl; ?>&id=<?php echo z(8,'id'); ?>" style="color:#ffffff;border: 1px solid #dddddd;background:#30962e;font-size: 20px;">Yeni Hatırlatıcı Ekle</a></div>
		<?php if(!empty($hatirlatici)){ ?>
			<div class="icerik">
				<?php foreach ($hatirlatici as $htr) {?>
					<div class="blok">
						<table cellpadding="0" cellspacing="0">
							<tbody>
								<a href="?s=hatirlatici&a=duzenle&id=<?php echo $htr['ID']; ?>" style="color:#000000;display: block;"><tr>Hatırlatıcı</tr></a>
								<?php if(!empty($htr['aciklama'])){ ?>
									<tr><th>Açıklama</th><td><?php echo $htr['aciklama'];  ?></td></tr>
								<?php } ?> 
								<?php if(!empty($htr['tekrar'])){ ?>
									<tr><th>Tekrar</th><td><?php if($_NesneTip[$htr['tekrar']]['metin1']){ echo $_NesneTip[$htr['tekrar']]['metin1'];} ?></td></tr>
								<?php } ?>
								<?php if(!empty($htr['hftMulti'])){ ?>
									<tr><th>Haftalık tekrar günleri</th><td><?php echo $htr['hftMulti'];  ?></td></tr>
									<tr><th>Haftalık tekrar saatleri</th><td><?php if(!empty($htr['tarihSaat'])){ echo z('saat',$htr['tarihSaat']); }  ?></td></tr>
								<?php } ?>
								<?php if(!empty($htr['tarihHatirlatici'])){ ?>
									<tr><th>Hatırlatıcı Tarihi</th><td><?php echo $htr['tarihHatirlatici'];  ?></td></tr>
								<?php } ?>
								<?php if(!empty($htr['tarihMulti'])){ ?>
									<tr><th>Toplu Tarih</th><td><?php echo $htr['tarihMulti'];  ?></td></tr>
								<?php } ?>
								<tr><th>Hatırlatıcıyı Düzenleme</th><td><a href="?s=hatirlatici&a=duzenle&id=<?php echo $htr['ID']; ?>">Düzenlemeye git</a></td></tr>
							</tbody>
						</table>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

	<style type="text/css">
		.notify {
			position: relative;
			width: 500px;
			height: 42px;
			font-family: "Open Sans";
			font-size: 0.9em;
			font-weight: 300;
			padding: 4px;
			margin: 20px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
			-moz-box-shadow: 0 0 10px Black;
			-webkit-box-shadow: 0 0 10px black;
			box-shadow: 0 0 10px black;
		}

		.notify span {
			display: block;
			margin-left: 50px;
			font-weight: 700;
			font-size: 12px;
			margin-top: 4px;
		}

		.notify img {
			display: inline-block;
			background-position: 0px 0px;
			background-size: contain;
			margin-left: 4px;
			position: absolute;
			top: 0px;
			width: 40px;
		}

		.info {
			color: #004d7e;
			border: 1px solid #318eff;
			background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #cae2ff), color-stop(100%, #97c6ff));
			background: -moz-linear-gradient(top, #cae2ff, #97c6ff);
			background: -webkit-linear-gradient(top, #cae2ff, #97c6ff);
			background: linear-gradient(to bottom, #cae2ff, #97c6ff);
		}

		.success {
			color: #0d8801;
			border: 1px solid #6dc84d;
			background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #cdecc2), color-stop(100%, #ade09b));
			background: -moz-linear-gradient(top, #cdecc2, #ade09b);
			background: -webkit-linear-gradient(top, #cdecc2, #ade09b);
			background: linear-gradient(to bottom, #cdecc2, #ade09b);
		}

		.warning {
			color: #7a5f24;
			border: 1px solid #ffa803;
			background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffdd9c), color-stop(100%, #ffcb69));
			background: -moz-linear-gradient(top, #ffdd9c, #ffcb69);
			background: -webkit-linear-gradient(top, #ffdd9c, #ffcb69);
			background: linear-gradient(to bottom, #ffdd9c, #ffcb69);
		}

		.error {
			color: #a44646;
			border: 1px solid #ff3535;
			background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffcece), color-stop(100%, #ff9b9b));
			background: -moz-linear-gradient(top, #ffcece, #ff9b9b);
			background: -webkit-linear-gradient(top, #ffcece, #ff9b9b);
			background: linear-gradient(to bottom, #ffcece, #ff9b9b);
		}

		.dark {
			color: #ddd;
			border: 1px solid black;
			background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #3e3e3e), color-stop(100%, #252525));
			background: -moz-linear-gradient(top, #3e3e3e, #252525);
			background: -webkit-linear-gradient(top, #3e3e3e, #252525);
			background: linear-gradient(to bottom, #3e3e3e, #252525);
		}
	</style>
	<?php 
	$asamacek=z(1,array('arsiv'=>0,'modul_ID'=>$id,'modul'=>$tbl),'','asama');
	?>
	<?php if(!empty($asamacek)){ ?>
		<div class="sayfa" style="background: #eeeeee; overflow: hidden;">
			<div class="baslik" style="color: white;padding: 0.4em;">
				Modulün Asamaları
			</div>
			<?php foreach ($asamacek as $ascek) { ?>
				<style type="text/css">
					<?php 
					$_NesneAsama=z(37,z(1,"WHERE ad='asamasip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
					if(!empty($_NesneAsama))foreach ($_NesneAsama as $nesneAsama) {
						echo '.asama_'.$nesneAsama['sayi1'].'{ background-color: '.$nesneAsama['metin2'].'; }';
					} 
					?>
				</style>
				<div class="notify asama_<?php echo $ascek['durum']; ?>">
					<span><?php echo $ascek['tarih']; ?> tarihinde <?php echo $_NesneAsama[$ascek['durum']]['metin1']; ?></span>
					<?php if(!empty($ascek['aciklama'])){ ?>
						<span style="font-weight: 400; font-size: 11px;"><b>Açıklama: </b><?php echo $ascek['aciklama']; ?></span>
					<?php } ?>
					<img src="img/dot-arrow.svg">
				</div>
			<?php }  ?>
		</div>
	<?php } ?>
	<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>