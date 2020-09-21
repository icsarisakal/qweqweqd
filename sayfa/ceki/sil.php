<?Php if((z(8,'idx'))&&($admn||ytk(z(8,'s'),'sil'))){
	z(6,$tbl);
	if(z(8,'idx')){
		$ID=z(8,'idx');
		$ssnc=z(3,$ID,'arsiv',-1);
		z(33,'sil',$ssnc);

		$sx=z(1,$ID,'ID,dokumastok_ID,dokumasiparis_ID',$tbl);
		if(!empty($sx['dokumasiparis_ID'])){
			$yh['ID']=$sx['dokumasiparis_ID'];
			$yh['tbl']='dokumasiparis';
			require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_1K1A2K.php');
		}
		if(!empty($sx['dokumastok_ID'])){
			$yh['ID']=$sx['dokumastok_ID'];
			$yh['tbl']='dokumastok';
			require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_sevk1K1A2K.php');
		} 

		$logmsj='-1';
	}
	
	$_Log=array('nesne'=>$tbl,'islem'=>'sil','sonuc'=>$ssnc,'nesne'=>$tbl,'mesaj'=>'[MESAJ]'.$logmsj.'[/MESAJ] Silinen ID: "'.$ID.'"');
	//require('parca/log.php');
}else if(z(8,'idx'))z(33,'sil',101);?>