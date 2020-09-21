<?Php if((z(8,'ida1','sayi')||z(8,'ida0'))&&($admn||ytk(z(8,'s'),'arsivle'))){
	z(6,$tbl);
	if(z(8,'ida1','sayi')){
		$ID=z(8,'ida1','sayi');
		$ssnc=z(3,$ID,array('arsiv'=>1,'tarihArsiv'=>z('datetime')));
		$islm='arsivle';
		z(33,$islm,$ssnc);
		$logmsj='-4';
	}
	else if(z(8,'ida0')){
		$ID=z(8,'ida0');
		$ssnc=z(3,$ID,array('arsiv'=>0,'tarihArsiv'=>z('datetime')));
		$islm='arsivac';
		z(33,$islm,$ssnc);
		$logmsj='-5';

		if (z(8,'s')=='cari') {
			$check = z(1,'WHERE cari_ID='.z(8,'ida0'),'','map');
				if ($check) {
					z(3,'WHERE cari_ID='.z(8,'ida0'),['arsiv'=>0],'map');
				}
		}

	}
	$_Log=array('nesne'=>$tbl,'islem'=>$islm,'sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'[MESAJ]'.$logmsj.'[/MESAJ] İlgili ID: "'.$ID.'"');
	require('parca/log.php');
}else z(33,'arsiv',101);?>