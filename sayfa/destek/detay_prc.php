<?Php 
if(z(8,'id')||z(8,'kod')){
$ID=z(8,'id');
if(z(8,'kod'))$ID=z(34,z(8,'kod'),1);
$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
if($admn||ytk($syf,'duzenle')||$_X['personel_ID']==z('lgn','ID')){
$_Mesaj=z(1,"WHERE destek_ID='".$ID."'",NULL,$tbl.'mesaj');
if(!empty($_Mesaj)){
	$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Nesne[$y['ID']]=$y;
	foreach($_Mesaj as $mesaj){?>
		<div class="mesaj">
			<div class="yazan"><?Php echo !empty($_Personel[$mesaj['personel_ID']]['ad'])?$_Personel[$mesaj['personel_ID']]['ad']:'Misafir'?></div>
			<div class="micerik"><?Php echo str_replace("\n",'<br />',$mesaj['mesaj'])?>
			<div class="mtarih"><?Php echo z('tarihsaat',$mesaj['tarih'])?></div>
			<div class="mimza"><?Php echo !empty($_Personel[$mesaj['personel_ID']]['ad'])?$_Personel[$mesaj['personel_ID']]['ad']:'Misafir'?> 
            <?Php echo !empty($_Personel[$mesaj['personel_ID']]['tel'])?'( '.$_Personel[$mesaj['personel_ID']]['tel'].' )':''?><br />
			<?Php echo $ayr['destekAd'].' / '.$_Nesne[$_X['nesne_IDddepartman']]['metin2']?></div>
            </div>
		</div>
	<?Php }
}else{?>
	<div class="mesaj">
		<div class="micerik">Henüz mesaj gönderilmemiş.</div>
	</div>
<?Php }}}}?>