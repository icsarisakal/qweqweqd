<?Php if((z(8,'idx')||z(8,'idx2')||z(8,'idxsil'))&&($admn||ytk(z(8,'s'),'sil'))){
	z(6,$tbl);
	
	if(z(8,'idx2')){
		$ID=z(8,'idx2');
		$ssnc=z(3,$ID,'arsiv',-1);
		z(33,'sil',$ssnc);
		$logmsj='-1';
	}
	else if(z(8,'idx')){
		$ID=z(8,'idx');
		$ssnc=z(3,$ID,'arsiv',-1);
		z(33,'sil',$ssnc);
		$logmsj='-1';
	}

	
	if(z(8,'idxsil')){
		$ID=z(8,'idxsil');
		$ssnc=z(4,$ID);
		z(33,'sil',$ssnc);
		$logmsj='-2';
		z('git','geri');

		$_Log=array('nesne'=>$tbl,'islem'=>'sil','sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'[MESAJ]'.$logmsj.'[/MESAJ] Silinen ID: "'.$ID.'"');
		require('parca/log.php');
	}
	
	/*
	else if(z(8,'idx')){
		$ID=z(8,'idx');
		$ssnc=z(4,$ID);
		z(33,'sil',$ssnc);
		$logmsj='-2';
		z('git','geri');
	}
	*/
	$_Log=array('nesne'=>$tbl,'islem'=>'sil','sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'[MESAJ]'.$logmsj.'[/MESAJ] Silinen ID: "'.$ID.'"');
	require('parca/log.php');
}else if(z(8,'idx'))z(33,'sil',101);?>
