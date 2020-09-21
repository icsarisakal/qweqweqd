<?Php
$_G=z(7,'ara'.$tbl);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$tbl)){
		$_G=z(11,'ara'.$tbl);
	}
}
if(!empty($_G)){
	z(11,'ara'.$tbl,$_G);
	$araSd='';
	foreach($_G as $ad=>$dgr){
		if(isset($dgr)){
			if($dgr!==''){
				if(!empty($araSd)){
					$araSd.=' AND ';
				}
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih'))){
					$araSd.=$ad.">='".$dgr[0]."' AND ".$ad."<'".date('Y-m-d',strtotime($dgr[1]." +1 day"))."'";
				}
				else if(is_array($dgr)&&count($dgr)>1){
					$araSd.='(';
					foreach($dgr as $i=>$dg){
						if($i)$araSd.=' OR ';
						$araSd.=$ad." LIKE '%".$dg."%'";
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('tarih','mesaj','ip'))){
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
	$_LA=z(7,'la');
	$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:' LIMIT 30';
}
else $llimit='';

$_X=z(1,"WHERE ".$arsvsd.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr);}
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	$_Snc=array(
		array(0,'Başarısız İşlem!'),
		array(1,'Başarılı İşlem'),
		array(2,'Uyarı'),
		array(3,'Özel Uyarı')
	);
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			$islemM=!empty($_LogTip[$x['nesne']][$x['islem']])?$_LogTip[$x['nesne']][$x['islem']]:(!empty($_Islm[$x['islem']])?$_Islm[$x['islem']]:'&nbsp;');
			echo '<tr class="allcheck tr'.($i%2?1:2).'">';
			//<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td>'.$i.'</td>';
			echo '
				<td>'.$x['ID'].'</td>
				<td>'.z('tarihsaniye',$x['tarih']).'</td>
				<td>'.blnn('mesaj',$x['mesaj']).'</td>
				<td>'.(!empty($_LogTip[$x['nesne']]['ad'])?$_LogTip[$x['nesne']]['ad']:'&nbsp;').'</td>
				<td>'.$islemM.'</td>
				<td>'.(!empty($_Snc[$x['sonuc']])?'<img src="img/drm'.$_Snc[$x['sonuc']][0].'.png" title="'.$_Snc[$x['sonuc']][1].'" height="20" />':'&nbsp;').'</td>
				<td>'.(!empty($_Personel[$x['personel_ID']]['ad'])?($admn||ytk('personel','duzenle')?'<a href="?s=personel&a=duzenle&id='.$x['personel_ID'].'">'.$_Personel[$x['personel_ID']]['ad'].'</a>':$_Personel[$x['personel_ID']]['ad']):'&nbsp;').'</td>
				<td>'.blnn('ip',$x['ip']).'</td>
				';
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			}
			//if($admn||ytk($tbl,'sil'))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&idx='.$x['ID'].'" onClick="return confirm(\'Silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';
		}
	}
	else{
		$ii=2;
		$phpExcelCols=array('A'.$ii=>'ID','B'.$ii=>'TARİH','C'.$ii=>'MESAJ','D'.$ii=>'TİP','E'.$ii=>'İŞLEM','F'.$ii=>'SONUÇ','G'.$ii=>'PERSONEL','H'.$ii=>'IP');
		$basH='A'; $sonH='H';
		$phpExcelStyle=$basH.$ii.':'.$sonH.$ii;
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
		
			$islemM=!empty($_LogTip[$x['nesne']][$x['islem']])?$_LogTip[$x['nesne']][$x['islem']]:(!empty($_Islm[$x['islem']])?$_Islm[$x['islem']]:'&nbsp;');
			$personelAd=(!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad'].' (ID:'.(!empty($x['personel_ID'])?$x['personel_ID']:'').')':'');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+$ii),$x['ID'])
										  ->setCellValue('B'.($i+$ii),z('tarihsaat',$x['tarih']))
										  ->setCellValue('C'.($i+$ii),strip_tags($x['mesaj']))
										  ->setCellValue('D'.($i+$ii),!empty($_LogTip[$x['nesne']]['ad'])?$_LogTip[$x['nesne']]['ad']:'&nbsp;')
										  ->setCellValue('E'.($i+$ii),$islemM)
										  ->setCellValue('F'.($i+$ii),(!empty($_Snc[$x['sonuc']][1])?$_Snc[$x['sonuc']][1]:'tanımsız').' (KOD:'.(!empty($x['sonuc'])?$x['sonuc']:'').')')
										  ->setCellValue('G'.($i+$ii),$personelAd)
										  ->setCellValue('H'.($i+$ii),$x['ip']);
										  
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+$ii))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'1:'.$sonH.'1');
		$objPHPExcel->getActiveSheet()->getStyle($basH.'1:'.$sonH.'1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
        $objPHPExcel->getActiveSheet()->getStyle($basH.'1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.'1','Bu log kayıtları "'.z('tarihsaat').'" tarihinde "'.(!empty($_Personel[z('lgn','ID')]['ad'])?$_Personel[z('lgn','ID')]['ad']:'..').' (ID:'.z('lgn','ID').')" isimli kulllanıcı tarafından indirilmiştir.');
		
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+14?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>