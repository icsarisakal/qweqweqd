<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$iliskisorgu='';
$iliskimdl='';
$kisimdl='';
$firmamdl='';
if(!empty($vt['hmodul'])&&$vt['hmodul']=='musteritakip'&&!empty($vt['hmodul_ID'])){
	$iliskimdl=z(1,$vt['hmodul_ID'],'ID,kisi_ID,firma_ID','musteritakip');
	if(!empty($iliskimdl)){
		$kisimdl=z(1,$iliskimdl['kisi_ID'],'','kisi');
		$firmamdl=z(1,$iliskimdl['firma_ID'],'','firma');
	}
}
if(!empty($vt['hmodul'])&&$vt['hmodul']=='istakip'&&!empty($vt['hmodul_ID'])){
	$iliskimdl=z(1,$vt['hmodul_ID'],'','istakip');
	if(!empty($iliskimdl)){
		$kisimdl=z(1,$iliskimdl['kisi_ID'],'','kisi');
		$firmamdl=z(1,$iliskimdl['firma_ID'],'','firma');
	}
}
if(!empty($vt['hmodul'])&&$vt['hmodul']=='siparistakip'&&!empty($vt['hmodul_ID'])){
	$iliskimdll=z(1,$vt['hmodul_ID'],'','siparistakip');
	$iliskimdl=z(1,$iliskimdll['musteritakip_ID'],'ID,kisi_ID,firma_ID','musteritakip');
	if(!empty($iliskimdl)){
		$kisimdl=z(1,$iliskimdl['kisi_ID'],'','kisi');
		$firmamdl=z(1,$iliskimdl['firma_ID'],'','firma');
	}
}
if(!empty($vt['hmodul'])&&$vt['hmodul']=='teklif'&&!empty($vt['hmodul_ID'])){
	$iliskimdll=z(1,$vt['hmodul_ID'],'','teklif');
	$iliskimdl=z(1,$iliskimdll['musteritakip_ID'],'ID,kisi_ID,firma_ID','musteritakip');
	if(!empty($iliskimdl)){
		$kisimdl=z(1,$iliskimdl['kisi_ID'],'','kisi');
		$firmamdl=z(1,$iliskimdl['firma_ID'],'','firma');
	}
}
$kisiadsoyad='';
$firmaisim='';
if(!empty($kisimdl['ad'])){$kisiadsoyad.=$kisimdl['ad'];}
if(!empty($kisimdl['soyad'])){$kisiadsoyad.=' '.$kisimdl['soyad'];}
if(!empty($firmamdl['ad'])){$firmaisim.=$firmamdl['ad'];}
$_NesneTip=z(37,z(1,"WHERE ad='tekrar'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="sayfa">
		<div class="baslik">Detay Sayfası</div>
		<div class="icerik">
			<div class="blok">
				<table cellpadding="0" cellspacing="0">
					<tbody>
						<tr>Görüntüle</tr>
						<?php if(!empty($vt['aciklama'])){ ?>
							<tr><th>Açıklama</th><td><?php echo $vt['aciklama'];  ?></td></tr>
						<?php } ?>
						<?php if(!empty($vt['tekrar'])){ ?>
							<tr><th>Tekrar</th><td><?php if($_NesneTip[$vt['tekrar']]['metin1']){ echo $_NesneTip[$vt['tekrar']]['metin1'];} ?></td></tr>
						<?php } ?>
						<?php if(!empty($vt['hftMulti'])){ ?>
							<tr><th>Haftalık tekrar günleri</th><td><?php echo $vt['hftMulti'];  ?></td></tr>
						<?php } ?>
						<?php if(!empty($vt['tarihHatirlatici'])){ ?>
							<tr><th>Hatırlatıcı Tarihi</th><td><?php echo $vt['tarihHatirlatici'];  ?></td></tr>
						<?php } ?>
						<?php if(!empty($vt['tarihMulti'])){ ?>
							<tr><th>Toplu Tarih</th><td><?php echo $vt['tarihMulti'];  ?></td></tr>
						<?php } ?>
							<tr><th>İlişkili Firma</th><td><?php echo $firmaisim;  ?></td></tr>
							<tr><th>İlişkili Kişi</th><td><?php echo $kisiadsoyad;  ?></td></tr>
						<?php if(!empty($vt['durum'])){ ?>
							<tr><th>Durum</th><td style="background:<?php if($_NesneDurum[$vt['durum']]['metin1']){ echo $_NesneDurum[$vt['durum']]['metin1'];} ?>;"><?php if($_NesneDurum[$vt['durum']]['metin2']){ echo $_NesneDurum[$vt['durum']]['metin2'];} ?></td></tr>
						<?php } else {  ?>
							<tr><th>Durum</th><td>Henüz Okunmadı</td></tr>
						<?php } ?>
						<?php if(!empty($vt['hmodul_ID'])){ ?>
							<tr><th>İlişkili Modül</th><td><a href="?s=<?php echo $vt['hmodul'].'&a=duzenle&id='.$vt['hmodul_ID']; ?>" style="background: black; color: white; padding: 2px;"><?php echo $vt['hmodul']; ?></a></td></tr>
						<?php } ?>
						<tr><th>Düzenle</th><td><a href="<?php echo '?s='.$tbl.'&a=duzenle&id='.$id; ?>" style="background: black; color: white; padding: 2px;">Düzenle</a></td></tr>
						<tr><th>Sil</th><td><a href="<?php echo '?s='.$tbl.'&a=listele&idx='.$id; ?>" onclick="return confirm('Silmek istediğine emin misin?')" style="background: black; color: white; padding: 2px;">Sil</a></td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php } else { echo 'Veri silinmiş görüntülenemiyor.'; } ?>