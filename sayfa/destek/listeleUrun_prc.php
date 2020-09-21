<?Php
if(!empty($phpExcelA)){
	$tbl.='urun';
	$syf2=$syf.'urun';
}
$_G=z(9,'ara'.$syf2);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf2)){
		$_G=z(11,'ara'.$syf2);
	}
}
if(!empty($_G)){
	z(11,'ara'.$syf2,$_G);
	$araSd='';
	foreach($_G as $ad=>$dgr){
		if(isset($dgr)){
			if($dgr!==''){
				if(!empty($araSd)){
					$araSd.=' AND ';
				}
				if(is_array($dgr)&&count($dgr)==2&&$ad=='tarih'){
					$araSd.=$ad.">='".$dgr[0]."' AND ".$ad."<='".date('Y-m-d',strtotime($dgr[1]." +1 day"))."'";
				}
				else if(is_array($dgr)&&count($dgr)>2&&$ad=='tarih'){
					$araSd.='(';
					foreach($dgr as $i=>$dg){
						if($i)$araSd.=' OR ';
						$araSd.=$ad." LIKE '%".$dg."%'";
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('tarih','ad','aciklama','miktar','fiyat','tutar'))){
					if(in_array($ad,Array('miktar','fiyat','tutar')))$dgr=sayi($dgr);
					$araSd.=$ad." LIKE '%".$dgr."%'";
				}
				else $araSd.=$ad."='".$dgr."'";
			}
		}
	}
}
$araSd=!empty($araSd)?" AND (".$araSd.")":'';
$arsvsd=strpos(z(8,'a'),'_arsv')!==false?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv='0'";
if(empty($phpExcelA)){
	$_LA=z(9,'la');
	$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:(!isset($_LA['adet'])?' LIMIT 30':'');
}
else $llimit='';
$_X=z(1,"WHERE 1 ".$araSd." ".$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'firma');if(!empty($_Y))foreach($_Y as $y)$_Firma[$y['ID']]=$y;
	
	$_SepetID=array();
	foreach($_X as $x)$_SepetID[]=$x['sepet_ID'];
	$_SepetID=array_unique($_SepetID);
	$sptSd='';
	if(!empty($_SepetID))foreach($_SepetID as $sepetID){
		if(!empty($sptSd))$sptSd.=" OR ";
		$sptSd.="ID='".$sepetID."'";
	}
	if(!empty($sptSd))$sptSd="WHERE ".$sptSd;
	$_Y=z(1,$sptSd,NULL,'sepet');if(!empty($_Y))foreach($_Y as $y)$_Sepet[$y['ID']]=$y;
	
	$_Drm=array(
		array('','Limit yetersizliği sebebiyle otomatik onaylanamadı, onay bekliyor.'),
		array(1,'Sipariş formu onaylanmış.'),
		array(0,'Sipariş formu reddedilmiş.')
	);
	$icerik='';
	$_TopTutar=array();
	$_DrmTutar=array();
	$j=0;
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){
			if(!empty($x['sepet_ID'])&&!empty($_Sepet[$x['sepet_ID']])&&$_Sepet[$x['sepet_ID']]['arsiv']!=-1){
				$i++;$j++;
				$kdvTutar=(!empty($x['kdvA'])?sayi($x['tutar'],2):sayi($x['tutar']*($x['kdv']/100+1),2));
				
				$drm=$_Sepet[$x['sepet_ID']]['durum'];
				if(!empty($_TopTutar[$x['pb']]))$_TopTutar[$x['pb']]+=$kdvTutar;
				else $_TopTutar[$x['pb']]=$kdvTutar;
				if(!empty($_DrmTutar[$drm][$x['pb']]))$_DrmTutar[$drm][$x['pb']]+=$kdvTutar;
				else $_DrmTutar[$drm][$x['pb']]=$kdvTutar;
				
				$icerik.='<tr '.($j%2==0?'class="tr2"':'').'><td>'.$j.'</td>';
				$icerik.='
					<td><img src="img/drm'.$_Drm[$_Sepet[$x['sepet_ID']]['durum']][0].'.png" title="'.$_Drm[$_Sepet[$x['sepet_ID']]['durum']][1].'" height="20" /></td>
					<td>'.(!empty($_Personel[$x['personel_ID']]['ad'])?($admn||ytk('personel','duzenle')?'<a href="?s=personel&a=duzenle&id='.$x['personel_ID'].'">'.$_Personel[$x['personel_ID']]['ad'].'</a>':$_Personel[$x['personel_ID']]['ad']):'').'</td>
					<td>'.z('tarih',$x['tarih']).'</td>
					<td>'.(!empty($x['ad'])?blnn('ad',$x['ad']):'&nbsp;').'</td>
					<td>'.(!empty($x['aciklama'])?blnn('aciklama',$x['aciklama']):'&nbsp;').'</td>
					<td>'.(!empty($_Firma[$x['firma_IDteklif']]['ad'])?($admn||ytk('firma','duzenle')?'<a href="?s=firma&a=duzenle&id='.$x['firma_IDteklif'].'">'.$_Firma[$x['firma_IDteklif']]['ad'].'</a>':$_Firma[$x['firma_IDteklif']]['ad']):'').'</td>
					<td>'.(!empty($_Z[$x['nesne_IDddepartman']]['metin1'])?$_Z[$x['nesne_IDddepartman']]['metin1']:'&nbsp;').'</td>
					<td>'.blnn('miktar',sayi($x['miktar'])).'</td>
					<td>'.blnn('fiyat',(!empty($x['fiyat'])?(!empty($x['pb'])?$PB[$x['pb']]:'').(!empty($x['kdvA'])?sayi($x['fiyat'],2):sayi($x['fiyat'],2).' + Kdv'):'')).'</td>
					<td>'.blnn('tutar',(!empty($x['tutar'])?(!empty($x['pb'])?$PB[$x['pb']]:'').sayi($x['tutar'],2):0)).'</td>
					<td>'.blnn('kdv',$x['kdv']).'</td>
					<td>'.(!empty($x['tutar'])?(!empty($x['pb'])?$PB[$x['pb']]:'').$kdvTutar:0).'</td>
					';
				$icerik.='</tr>';
				
			}
		}
		$onyTutarM='';
		if(!empty($_DrmTutar[1]))foreach($_DrmTutar[1] as $fei=>$fed){if(!empty($onyTutarM))$onyTutarM.=' - ';$onyTutarM.=$PB[$fei].sayi($fed,2);}
		$redTutarM='';
		if(!empty($_DrmTutar[2]))foreach($_DrmTutar[2] as $fei=>$fed){if(!empty($redTutarM))$redTutarM.=' - ';$redTutarM.=$PB[$fei].sayi($fed,2);}
		$bekTutarM='';
		if(!empty($_DrmTutar[0]))foreach($_DrmTutar[0] as $fei=>$fed){if(!empty($bekTutarM))$bekTutarM.=' - ';$bekTutarM.=$PB[$fei].sayi($fed,2);}
		$topTutarM='';
		if(!empty($_TopTutar))foreach($_TopTutar as $fei=>$fed){if(!empty($topTutarM))$topTutarM.=' - ';$topTutarM.=$PB[$fei].sayi($fed,2);}
		$tarihM=z('tarih',$_X[0]['tarih']).' ile '.z('tarih',$x['tarih']).' tarih aralığı görüntüleniyor ';
		$icerik='<tr id="genelBilgilerTr"><td colspan="13" style="text-align:left">
			'.(!empty($_G['nesne_IDddepartman'])&&!empty($_Z[$x['nesne_IDddepartman']]['metin1'])?'<h3 style="text-indent:10px">'.strtoupper($_Z[$x['nesne_IDddepartman']]['metin1']).' DEPARTMANINA ALINMIŞ MALZEMELER</h3>':'<h3 style="text-indent:10px">MALZEME LİSTESİ</h3>').
			'<span class="blok" style="border:0px;margin:0px;margin-left:10px;">'.$tarihM.'</span><br>'.
			(!empty($bekTutarM)?'<span class="blok" style="border:0px;"><b>BEKLEYEN TUTAR :&nbsp;&nbsp;'.$bekTutarM.'</b></span>':'').
			(!empty($onyTutarM)?'<span class="blok" style="border:0px;"><b>ONAYLANMIŞ TUTAR :&nbsp;&nbsp;'.$onyTutarM.'</b></span>':'').
			(!empty($redTutarM)?'<span class="blok" style="border:0px;"><b>REDDEDİLMİŞ TUTAR :&nbsp;&nbsp;'.$redTutarM.'</b></span>':'').
			(!empty($topTutarM)?'<span class="blok" style="border:0px;"><b>TOPLAM TUTAR :&nbsp;&nbsp;'.$topTutarM.'</b></span>':'').
		'</td></tr>'.$icerik;
		echo $icerik;
	}
	else{
		$phpExcelCols=array('A4'=>'NO','B4'=>'DURUM','C4'=>'DÜZENLEYEN','D4'=>'DÜZENLEME TARİHİ','E4'=>'MALZEME CİNSİ','F4'=>'TEKNİK ŞARTNAME','G4'=>'TEDARİKÇİ FİRMA','H4'=>'DEPARTMAN','I4'=>'MİKTAR','J4'=>'FİYAT','K4'=>'TUTAR','L4'=>'KDV ORAN','M4'=>'KDV DAHİL TUTAR');
		$basH='A'; $sonH='M';
		$phpExcelStyle=$basH.'4:'.$sonH.'4';
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
		foreach($_X as $i=>$x){
        	if(!empty($x['sepet_ID'])&&!empty($_Sepet[$x['sepet_ID']])&&$_Sepet[$x['sepet_ID']]['arsiv']!=-1){
				$i++;$j++;
				$kdvTutar=(!empty($x['kdvA'])?sayi($x['tutar'],2):sayi($x['tutar']*($x['kdv']/100+1),2));
				
				$drm=$_Sepet[$x['sepet_ID']]['durum'];
				if(!empty($_TopTutar[$x['pb']]))$_TopTutar[$x['pb']]+=$kdvTutar;
				else $_TopTutar[$x['pb']]=$kdvTutar;
				if(!empty($_DrmTutar[$drm][$x['pb']]))$_DrmTutar[$drm][$x['pb']]+=$kdvTutar;
				else $_DrmTutar[$drm][$x['pb']]=$kdvTutar;
			
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($j+4),$j)
											  ->setCellValue('B'.($j+4),!empty($_Sepet[$x['sepet_ID']]['durum'])?str_replace(array('1','2'),array('Onaylı','İptal'),$_Sepet[$x['sepet_ID']]['durum']):'Bekleyen')
											  ->setCellValue('C'.($j+4),!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'')
											  ->setCellValue('D'.($j+4),z('tarihsaat',$x['tarih']))
											  ->setCellValue('E'.($j+4),$x['ad'])
											  ->setCellValue('F'.($j+4),$x['aciklama'])
											  ->setCellValue('G'.($j+4),!empty($_Firma[$x['firma_IDteklif']]['ad'])?$_Firma[$x['firma_IDteklif']]['ad']:'')
											  ->setCellValue('H'.($j+4),!empty($_Z[$x['nesne_IDddepartman']]['metin1'])?$_Z[$x['nesne_IDddepartman']]['metin1']:'')
											  ->setCellValue('I'.($j+4),sayi($x['miktar'],2))
											  ->setCellValue('J'.($j+4),!empty($x['fiyat'])?(!empty($x['kdvA'])?sayi($x['fiyat'],2).' '.(!empty($x['pb'])?$x['pb']:''):sayi($x['fiyat'],2).' '.(!empty($x['pb'])?$x['pb']:'').' + Kdv'):'')
											  ->setCellValue('K'.($j+4),!empty($x['tutar'])?sayi($x['tutar'],2).' '.(!empty($x['pb'])?$x['pb']:''):0)
											  ->setCellValue('L'.($j+4),$x['kdv'])
											  ->setCellValue('M'.($j+4),!empty($x['tutar'])?$kdvTutar.' '.(!empty($x['pb'])?$x['pb']:''):0);
											  
											  
				for($k=$basH;$k<=$sonH;$k++)
				$objPHPExcel->getActiveSheet()->getStyle($k.($j+4))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$dosyaIsmi=(!empty($_G['nesne_IDddepartman'])&&!empty($_Z[$x['nesne_IDddepartman']]['metin1'])?strtoupper($_Z[$x['nesne_IDddepartman']]['metin1']).' DEPARTMANINA ALINMIŞ MALZEMELER':'MALZEME LİSTESİ');
				
				//RENK
				if(($j+4)%2==0){
				$objPHPExcel->getActiveSheet()->getStyle($basH.($j+4).':'.$sonH.($j+4))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				$objPHPExcel->getActiveSheet()->getStyle($basH.($j+4).':'.$sonH.($j+4))->getFill()->getStartColor()->setRGB('eeeeee');}
			}
		}
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++){
			$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
		}
		
		// HEADER
		$onyTutarM='';
		if(!empty($_DrmTutar[1]))foreach($_DrmTutar[1] as $fei=>$fed){if(!empty($onyTutarM))$onyTutarM.=' - ';$onyTutarM.=sayi($fed,2).' '.$fei;}
		$redTutarM='';
		if(!empty($_DrmTutar[2]))foreach($_DrmTutar[2] as $fei=>$fed){if(!empty($redTutarM))$redTutarM.=' - ';$redTutarM.=sayi($fed,2).' '.$fei;}
		$bekTutarM='';
		if(!empty($_DrmTutar[0]))foreach($_DrmTutar[0] as $fei=>$fed){if(!empty($bekTutarM))$bekTutarM.=' - ';$bekTutarM.=sayi($fed,2).' '.$fei;}
		$topTutarM='';
		if(!empty($_TopTutar))foreach($_TopTutar as $fei=>$fed){if(!empty($topTutarM))$topTutarM.=' - ';$topTutarM.=sayi($fed,2).' '.$fei;}
		$tarihM=z('tarih',$_X[0]['tarih']).' ile '.z('tarih',$x['tarih']).' tarih aralığı görüntüleniyor ';
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'1:'.$sonH.'1');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'2:'.$sonH.'2');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'3:'.$sonH.'3');
		$objPHPExcel->getActiveSheet()->getStyle($basH.'1:'.$sonH.'1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'2:'.$sonH.'2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
        $objPHPExcel->getActiveSheet()->getStyle($basH.'1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle($basH.'3')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.'1',$dosyaIsmi);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.'2',$tarihM);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.'3',
			(!empty($bekTutarM)?'BEKLEYEN TUTAR : '.$bekTutarM.'          ':'').
			(!empty($onyTutarM)?'ONAYLANMIŞ TUTAR : '.$onyTutarM.'          ':'').
			(!empty($redTutarM)?'REDDEDİLMİŞ TUTAR : '.$redTutarM.'          ':'').
			(!empty($topTutarM)?'TOPLAM TUTAR : '.$topTutarM.'          ':''));
	}
}if(empty($j)){?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+13?>">Kayıt bulunamadı.</td></tr>
<?Php }
?>