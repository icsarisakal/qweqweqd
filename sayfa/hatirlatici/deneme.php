<?php

$tarihh=z('datetime');
$dd=strtotime($tarihh);
$gunn = date("D", $dd);
$gunno=array(
	'Mon'=>'pzt',
	'Tue'=>'sal',
	'Wed'=>'crs',
	'Thu'=>'prs',
	'Fri'=>'cum',
	'Sat'=>'cmt',
	'Sun'=>'pzr',
);

?>

<?php 
$dt = '2015-12-01';
$day = date('l',strtotime($dt));
$ay= date('m');
$yil= date('y');
$gun= date('d');
$saat= date('H');
$dakika= date('i');

//echo $day;
$suankitarih=z('datetime');
$date1=z('date');
$tekseferlik="WHERE tarihHatirlatici <= '".$suankitarih."' AND durum = 0 AND arsiv = 0 AND secim = 1 AND tekrar = 1 ORDER BY id DESC";
$haftalik="WHERE durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 2 AND hftMulti LIKE '%\"".$gunno[$gunn]."\"%' ORDER BY id DESC";
$aylik="WHERE tarihHatirlatici <= '".$suankitarih."' AND durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 3 ORDER BY id DESC";
$yillik="WHERE tarihHatirlatici <= '".$suankitarih."' AND durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 4 ORDER BY id DESC";
$toplu="WHERE durum = 0 AND secim = 2 AND arsiv = 0 AND tekrar = 0 AND tarihMulti LIKE '%".$date1."%' ORDER BY id DESC";
$htekseferlik=z(1,$tekseferlik,'','hatirlatici');
$hhaftalik=z(1,$haftalik,'','hatirlatici');
$haylik=z(1,$aylik,'','hatirlatici');
$hyillik=z(1,$yillik,'','hatirlatici');
$htoplu=z(1,$toplu,'','hatirlatici');
$gizlenen=z(8,'hgizle');
if(!empty($gizlenen)){ z(3,$gizlenen,array('durum'=>'1'),'hatirlatici'); z('git','geri'); }
?>
<script>
	$(document).ready(function(){
		var gizle="gizle"+"1";
		alert(gizle);
		$(.gizle).hide();
	});
</script>
<div style="width:100%;float: left;position: absolute;">
	<div style="width: 20%;float:right;padding:10px;">
		<?php if(!empty($htekseferlik)){ ?>
			<?php foreach ($htekseferlik as $ht1) { ?>
				<div style="width:100%;float:left; margin-bottom:2px;" class="gizle<?php echo $ht1['ID'];?>">
				<h2>Tek Seferlik</h2>
					<div style="width:100%;float:left;border: 1px solid #ddd;background: #bbb;padding:2px;">
						<div style="width: 100%;border-bottom: 1px solid #ddd;padding-top:2px;padding-bottom:2px;float:left;">
							<b>Departman adı</b>
						</div>
						<div>
							<div style="float: right; margin-right:10px;">
								<a href="./?s=hatirlatici&a=deneme&hgizle=<?php echo $ht1['ID'];?>" style="text-decoration:none;">✔</a>
							</div>
							<p><b>Açıklama:</b><?php echo !empty($ht1['aciklama'])?$ht1['aciklama']:''; ?></p>
							<?php if(!empty($ht1['tarihHatirlatici'])){ ?>
								<span><b>Hatırlatma tarihi:</b><?php echo !empty($ht1['tarihHatirlatici']) ? z('tarihsaat',$ht1['tarihHatirlatici']):''; ?></span>
							<?php } ?>
							<?php if(!empty($ht2['hftMulti'])){ ?>
								<?php $exphft=str_replace(array('"', '[', ']'), '', $ht2['hftMulti']);  $exphft2=str_replace(array(','), ', ', $exphft); ?>
								<span><b>Haftalık tekrar günleri:</b><?php echo $exphft2; ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<a href="?s=hatirlatici&a=listele" style="width: 100%;float: left;text-decoration: none;color: #fff;font-weight: bold;border: 1px solid #ddd;background: #353434;padding: 2px;"><center>Tüm Bildirimlere Git</center></a>
		<?php } ?>
	</div>
	<div style="width: 20%;float:right;padding:10px;">
		<?php if(!empty($hhaftalik)){ ?>
			<?php foreach ($hhaftalik as $ht2) { ?>
				<div style="width:100%;float:left; margin-bottom:2px;" class="gizle<?php echo $ht2['ID'];?>">
				<h2>Haftalık</h2>
					<div style="width:100%;float:left;border: 1px solid #ddd;background: #bbb;padding:2px;">
						<div style="width: 100%;border-bottom: 1px solid #ddd;padding-top:2px;padding-bottom:2px;float:left;">
							<b>Departman adı</b>
						</div>
						<div>
							<div style="float: right; margin-right:10px;">
								<a href="./?s=hatirlatici&a=deneme&hgizle=<?php echo $ht2['ID'];?>" style="text-decoration:none;">✔</a>
							</div>
							<p><b>Açıklama:</b><?php echo !empty($ht2['aciklama'])?$ht2['aciklama']:''; ?></p>
							<?php if(!empty($ht2['tarihHatirlatici'])){ ?>
								<span><b>Hatırlatma tarihi:</b><?php echo !empty($ht2['tarihHatirlatici']) ? z('tarihsaat',$ht2['tarihHatirlatici']):''; ?></span>
							<?php } ?>
							<?php if(!empty($ht2['hftMulti'])){ ?>
								<?php $exphft=str_replace(array('"', '[', ']'), '', $ht2['hftMulti']);  $exphft2=str_replace(array(','), ', ', $exphft); ?>
								<span><b>Haftalık tekrar günleri:</b><?php echo $exphft2; ?></span>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<a href="?s=hatirlatici&a=listele" style="width: 100%;float: left;text-decoration: none;color: #fff;font-weight2: bold;border: 1px solid #ddd;background: #353434;padding: 2px;"><center>Tüm Bildirimlere Git</center></a>
		<?php } ?>
	</div>
	<div style="width: 20%;float:right;padding:10px;">
		<?php $ayb=0; ?>
		<?php if(!empty($haylik)){ ?>
			<?php foreach ($haylik as $ht3) { ?>
				<?php
				$trhayhtr=$ht3['tarihHatirlatici'];
				$vtgun = date('d',strtotime($trhayhtr));
				$vtyil = date('Y',strtotime($trhayhtr));
				$vttarih=$vtyil.'-'.$ay.'-'.$vtgun;
				$nowtarih=z('date');
				if($nowtarih>$vttarih){
					?>
					<div style="width:100%;float:left; margin-bottom:2px;" class="gizle<?php echo $ht3['ID'];?>">
					<h2>Aylık</h2>
						<div style="width:100%;float:left;border: 1px solid #ddd;background: #bbb;padding:2px;">
							<div style="width: 100%;border-bottom: 1px solid #ddd;padding-top:2px;padding-bottom:2px;float:left;">
								<b>Departman adı</b>
							</div>
							<div>
								<div style="float: right; margin-right:10px;">
									<a href="./?s=hatirlatici&a=deneme&hgizle=<?php echo $ht3['ID'];?>" style="text-decoration:none;">✔</a>
								</div>
								<p><b>Açıklama:</b><?php echo !empty($ht3['aciklama'])?$ht3['aciklama']:''; ?></p>
								<?php if(!empty($ht3['tarihHatirlatici'])){ ?>
									<span><b>Hatırlatma tarihi:</b><?php echo !empty($ht3['tarihHatirlatici']) ? z('tarihsaat',$ht3['tarihHatirlatici']):''; ?></span>
								<?php } ?>
								<?php if(!empty($ht3['hftMulti'])){ ?>
									<?php $exphft=str_replace(array('"', '[', ']'), '', $ht3['hftMulti']);  $exphft2=str_replace(array(','), ', ', $exphft); ?>
									<span><b>Haftalık tekrar günleri:</b><?php echo $exphft2; ?></span>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php $ayb=1; ?>
				<?php } ?>
			<?php } ?>
			<?php if($ayb==1){ ?>
				<a href="?s=hatirlatici&a=listele" style="width: 100%;float: left;text-decoration: none;color: #fff;font-weight2: bold;border: 1px solid #ddd;background: #353434;padding: 2px;"><center>Tüm Bildirimlere Git</center></a>
			<?php } ?>
		<?php } ?>
	</div>
	<div style="width: 20%;float:right;padding:10px;">
		<?php $yb=0; ?>
		<?php if(!empty($hyillik)){ ?>
			<?php foreach ($hyillik as $ht4) { ?>
				<?php
				$newyil= date('Y');
				$trhayhtr=$ht4['tarihHatirlatici'];
				$vtgun = date('d',strtotime($trhayhtr));
				$vtay = date('m',strtotime($trhayhtr));
				$vttarih=$newyil.'-'.$vtay.'-'.$vtgun;
				$nowtarih=z('date');
				if($nowtarih>$vttarih){
					?>
					<div style="width:100%;float:left; margin-bottom:2px;" class="gizle<?php echo $ht4['ID'];?>">
					<h2>Yıllık</h2>
						<div style="width:100%;float:left;border: 1px solid #ddd;background: #bbb;padding:2px;">
							<div style="width: 100%;border-bottom: 1px solid #ddd;padding-top:2px;padding-bottom:2px;float:left;">
								<b>Departman adı</b>
							</div>
							<div>
								<div style="float: right; margin-right:10px;">
									<a href="./?s=hatirlatici&a=deneme&hgizle=<?php echo $ht4['ID'];?>" style="text-decoration:none;">✔</a>
								</div>
								<p><b>Açıklama:</b><?php echo !empty($ht4['aciklama'])?$ht4['aciklama']:''; ?></p>
								<?php if(!empty($ht4['tarihHatirlatici'])){ ?>
									<span><b>Hatırlatma tarihi:</b><?php echo !empty($ht4['tarihHatirlatici']) ? z('tarihsaat',$ht4['tarihHatirlatici']):''; ?></span>
								<?php } ?>
								<?php if(!empty($ht4['hftMulti'])){ ?>
									<?php $exphft=str_replace(array('"', '[', ']'), '', $ht4['hftMulti']);  $exphft2=str_replace(array(','), ', ', $exphft); ?>
									<span><b>Haftalık tekrar günleri:</b><?php echo $exphft2; ?></span>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php $yb=1; ?>
				<?php } ?>
			<?php } ?>
			<?php if($yb==1){ ?>
				<a href="?s=hatirlatici&a=listele" style="width: 100%;float: left;text-decoration: none;color: #fff;font-weight2: bold;border: 1px solid #ddd;background: #353434;padding: 2px;"><center>Tüm Bildirimlere Git</center></a>
			<?php } ?>
		<?php } ?>
	</div>
	<div style="width: 20%;float:right;padding:10px;">
		<?php $yb=0; ?>
		<?php if(!empty($htoplu)){ ?>
			<?php foreach ($htoplu as $ht5) { ?>
					<div style="width:100%;float:left; margin-bottom:2px;" class="gizle<?php echo $ht5['ID'];?>">
					<h2>Toplu Tarih</h2>
						<div style="width:100%;float:left;border: 1px solid #ddd;background: #bbb;padding:2px;">
							<div style="width: 100%;border-bottom: 1px solid #ddd;padding-top:2px;padding-bottom:2px;float:left;">
								<b>Departman adı</b>
							</div>
							<div>
								<div style="float: right; margin-right:10px;">
									<a href="./?s=hatirlatici&a=deneme&hgizle=<?php echo $ht5['ID'];?>" style="text-decoration:none;">✔</a>
								</div>
								<p><b>Açıklama:</b><?php echo !empty($ht5['aciklama'])?$ht5['aciklama']:''; ?></p>
								<?php if(!empty($ht5['tarihMulti'])) { ?>
									<span><b>Toplu tarihler:</b> <?php echo $ht5['tarihMulti']; ?></span>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php $yb=1; ?>
			<?php } ?>
			<?php if($yb==1){ ?>
				<a href="?s=hatirlatici&a=listele" style="width: 100%;float: left;text-decoration: none;color: #fff;font-weight2: bold;border: 1px solid #ddd;background: #353434;padding: 2px;"><center>Tüm Bildirimlere Git</center></a>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php
if(!empty($ht1)){
$veri1=array(
	'ID'=>$ht1['ID'],
	'secim'=>$ht1['secim'],
	'tekrar'=>$ht1['tekrar'],
	'tarihHatirlatici'=>$ht1['tarihHatirlatici'],
	'aciklama'=>$ht1['aciklama'],
	'departman'=>$ht1['departman'],
	'firmaTip'=>$ht1['firmaTip'],
	'rehberGrup'=>$ht1['rehberGrup'],
	);
} else{
	$veri1=NULL;
}

if(!empty($ht2)){
$veri2=array(
	'ID'=>$ht2['ID'],
	'secim'=>$ht2['secim'],
	'tekrar'=>$ht2['tekrar'],
	'hftMulti'=>$exphft2,
	'aciklama'=>$ht2['aciklama'],
	'departman'=>$ht2['departman'],
	'firmaTip'=>$ht2['firmaTip'],
	'rehberGrup'=>$ht2['rehberGrup'],
	);
} else{
	$veri2=NULL;
}

if(!empty($ht3)){
$veri3=array(
	'ID'=>$ht3['ID'],
	'secim'=>$ht3['secim'],
	'tekrar'=>$ht3['tekrar'],
	'tarihHatirlatici'=>$ht3['tarihHatirlatici'],
	'aciklama'=>$ht3['aciklama'],
	'departman'=>$ht3['departman'],
	'firmaTip'=>$ht3['firmaTip'],
	'rehberGrup'=>$ht3['rehberGrup'],
	);
} else{
	$veri3=NULL;
}

if(!empty($ht4)){
$veri4=array(
	'ID'=>$ht4['ID'],
	'secim'=>$ht4['secim'],
	'tekrar'=>$ht4['tekrar'],
	'tarihHatirlatici'=>$ht4['tarihHatirlatici'],
	'aciklama'=>$ht4['aciklama'],
	'departman'=>$ht4['departman'],
	'firmaTip'=>$ht4['firmaTip'],
	'rehberGrup'=>$ht4['rehberGrup'],
	);
} else{
	$veri4=NULL;
}

if(!empty($ht5)){
$veri5=array(
	'ID'=>$ht5['ID'],
	'secim'=>$ht5['secim'],
	'tarihMulti'=>$ht5['tarihMulti'],
	'aciklama'=>$ht5['aciklama'],
	'departman'=>$ht5['departman'],
	'firmaTip'=>$ht5['firmaTip'],
	'rehberGrup'=>$ht5['rehberGrup'],
	);
} else{
	$veri5=NULL;
}
$sonuc=array('sonuc'=>'0');
if(!empty($ht1)||!empty($ht2)||!empty($ht3)||!empty($ht4)||!empty($ht5)){
	$sonuc=array('sonuc'=>'1');
}
$json['cevap']= array($sonuc,$veri1,$veri2,$veri3,$veri4,$veri5);
?>
<?php /*/ $json['cevap']=array(
	array(
	'ID'=>$ht1['ID'],
	'secim'=>$ht1['secim'],
	'tekrar'=>$ht1['tekrar'],
	'tarihHatirlatici'=>$ht1['tarihHatirlatici'],
	'aciklama'=>$ht1['aciklama'],
	'departman'=>$ht1['departman'],
	'firmaTip'=>$ht1['firmaTip'],
	'rehberGrup'=>$ht1['rehberGrup'],
	),
	array(
	'ID'=>$ht2['ID'],
	'secim'=>$ht2['secim'],
	'tekrar'=>$ht2['tekrar'],
	'hftMulti'=>$ht2['hftMulti'],
	'aciklama'=>$ht2['aciklama'],
	'departman'=>$ht2['departman'],
	'firmaTip'=>$ht2['firmaTip'],
	'rehberGrup'=>$ht2['rehberGrup'],
	),
	array(
	'ID'=>$ht3['ID'],
	'secim'=>$ht3['secim'],
	'tekrar'=>$ht3['tekrar'],
	'tarihHatirlatici'=>$ht3['tarihHatirlatici'],
	'aciklama'=>$ht3['aciklama'],
	'departman'=>$ht3['departman'],
	'firmaTip'=>$ht3['firmaTip'],
	'rehberGrup'=>$ht3['rehberGrup'],
	),
	array(
	'ID'=>$ht4['ID'],
	'secim'=>$ht4['secim'],
	'tekrar'=>$ht4['tekrar'],
	'tarihHatirlatici'=>$ht4['tarihHatirlatici'],
	'aciklama'=>$ht4['aciklama'],
	'departman'=>$ht4['departman'],
	'firmaTip'=>$ht4['firmaTip'],
	'rehberGrup'=>$ht4['rehberGrup'],
	),
	array(
	'ID'=>$ht5['ID'],
	'secim'=>$ht5['secim'],
	'hftMulti'=>$ht5['hftMulti'],
	'aciklama'=>$ht5['aciklama'],
	'departman'=>$ht5['departman'],
	'firmaTip'=>$ht5['firmaTip'],
	'rehberGrup'=>$ht5['rehberGrup'],
	),
); /*/ ?>