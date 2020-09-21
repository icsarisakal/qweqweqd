<?php
$id=z(8,'id');
$modul=z(1,$id,'',$tbl);
$htstr=str_replace(',', ' OR ID=', $modul['hatirlaticilar']);
if(strpos($modul['hatirlaticilar'],",")){
	$htstr2="AND ID =".$htstr;
} else {
	$htstr=str_replace(',', '', $modul['hatirlaticilar']);
	$htstr2="AND ID =".$htstr;
}
$htsorgu="WHERE arsiv<>-1 ".$htstr2;
$hatirlatici=z(1,$htsorgu,'','hatirlatici');
$_NesneTip=z(37,z(1,"WHERE ad='tekrar'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
$_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
if(!empty($hatirlatici)){ ?>
	<div class="sayfa">
		<div class="baslik"><a href="?s=hatirlatici&a=ekle&tbl=<?php echo $tbl; ?>&id=<?php echo z(8,'id'); ?>" style="color:#ffffff;border: 1px solid #dddddd;background:#30962e;">Yeni Hatırlatıcı Ekle</a></div>
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
		</div>
	</div>
<?php } else {
	z('git','geri');
}
?>