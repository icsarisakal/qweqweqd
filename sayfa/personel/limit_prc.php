<?Php
switch(z(33,'limit')){
	case 1:_uyr(1,'Limit sıfırlama işlemi başarıyla gerçekleştirildi.');break;
	case 11:_uyr(4,$_LimitT[z(1,z('lgn','ID'),'limitT','personel')].' limitiniz sıfırlandı.','alarm');break;
}
switch(z(33,'limit2')){
	case 12:_uyr(4,'Yıllık limitiniz sıfırlandı.');break;
}
$ID=z(8,'perid');
if(empty($ID)){
	$ID=z('lgn','ID');
	if(!empty($ID)){
		$p=z(1,$ID,'limitT,limitD,limitD2,limitTop,tarihLimitS,tarihLimitS2','personel');
		if(!empty($p['limitT'])&&!empty($p['limitD'])&&!empty($p['tarihLimitS'])){
			$_LTip=array('0'=>'','1'=>'day','2'=>'week','3'=>'month','4'=>'year');
			$ltm=strtotime(substr($p['tarihLimitS'],0,10).' +1 '.$_LTip[$p['limitT']]);
			if(time()>=$ltm){
				$snc=z(3,$ID,array('limitMax'=>$p['limitTop']+$p['limitD'],'tarihLimitS'=>z('datetime')));
				if($snc==1)z(33,'limit',11);
			}
		}
		if(!empty($p['limitD2'])&&!empty($p['tarihLimitS2'])){
			$ltm=strtotime(substr($p['tarihLimitS2'],0,10).' +1 year');
			if(time()>=$ltm){
				$snc=z(3,$ID,array('limitMax2'=>$p['limitTop']+$p['limitD2'],'tarihLimitS2'=>z('datetime')));
				if($snc==1)z(33,'limit2',12);
			}
		}
	}
}
else{
	if($admn){
		if(!z(8,'l2')){
			$p=z(1,$ID,'limitT,limitD,limitTop','personel');
			$snc=z(3,$ID,array('limitMax'=>$p['limitTop']+$p['limitD'],'tarihLimitS'=>z('datetime')));
		}
		else{
			$p=z(1,$ID,'limitD2,limitTop','personel');
			$snc=z(3,$ID,array('limitMax2'=>$p['limitTop']+$p['limitD2'],'tarihLimitS2'=>z('datetime')));
		}
	}
}
?>