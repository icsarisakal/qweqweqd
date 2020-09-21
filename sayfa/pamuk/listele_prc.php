<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
if(!empty($_G)){
	unset($_NSN);
	z(11,'ara'.$syf,$_G);
	$araSd='';
	foreach($_G as $ad=>$dgr){
		if(isset($dgr)){
			if($dgr!==''){
				if(!empty($araSd)){
					$araSd.=' AND ';
				}
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihSiparis'))){
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
				else if(in_array($ad,Array('tarih'))){
					$araSd.=$ad." LIKE '%".$dgr."%'";
				}
				else if(in_array($ad,Array('usd','eur','gbp'))){
					$araSd.=$ad." LIKE '%".sayi($dgr)."%'";
				}
				else if(in_array($ad,Array('nesne_IDdepartman','firma_IDteklif'))){
					$_ID=z(1,"WHERE ".$ad."='".$dgr."'",$tbl.'_ID',$tbl.'urun');
					if(!empty($_ID)){
						$araSd.='(';
						foreach($_ID as $i=>$dg){
							if($i)$araSd.=' OR ';
							$araSd.="ID='".$dg."'";
						}
						$araSd.=')';
					}else $araSd.=' 0 ';
					unset($_G[$ad]);
				}
				else $araSd.=$ad."='".$dgr."'";
			}
		}
	}
}

$araSd=!empty($araSd)?" AND (".$araSd.")":'';
//$arsvA=strpos(z(8,'a'),'_arsv');
//$arsvsd=$arsvA!==false?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv='0'";
$llimit='';
if(empty($phpExcelA)){
	$_LA=z(7,'la'.$syf);
	if(empty($_LA)){
		if($araHA&&z(11,'la'.$syf)){
			$_LA=z(11,'la'.$syf);
		}
	}
	if(!empty($_LA['adet'])){
		$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:'';
	}
	else{
		$llimit=!empty($ayr['genelListeSatirA'])?' LIMIT '.$ayr['genelListeSatirA']:'';
	}
	z(11,'la'.$syf,$_LA);
}
$_X=z(1,"WHERE ".(!empty($arsvsd)?$arsvsd:'1').$araSd." ORDER BY ".(empty($arsvA)?'tarih':'tarihArsiv')." ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Y=z(1,NULL,'ID,ad,soyad','personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	//$_Y=z(1,NULL,NULL,'firma');if(!empty($_Y))foreach($_Y as $y)$_Firma[$y['ID']]=$y;
	
	$_Top=array();
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			
			echo '<tr class="allcheck tr'.(($i%2)+1).'"><th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td>'.$i.'</td>';
			echo '
				<td>'.(0&&($admn||ytk($tbl,'duzenle'))?'<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" class="dty">'.z('tarih',$x['tarih']).'</a>':z('tarih',$x['tarih'])).'</td>
				<td>'.(!empty($x['acilis'])?blnn('acilis',z("36",$x['acilis'])):'&nbsp;').'</td>
				<td>'.(!empty($x['kapanis'])?blnn('kapanis',z("36",$x['kapanis'])):'&nbsp;').'</td>
				';
			if($admn||ytk($syf,'sil'))echo '<td class="printx"><a href="?s='.$syf.'&a='.z(9,'a','listele').'&idxsil='.$x['ID'].'" onClick="return confirm(\' Silinen girdi geri getirilemez, yinede silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';
			
		}
		/*echo '<tr id="toplamTutarTr" class="toptr"><th class="printx">&nbsp;</th><td>&nbsp;</td><td>&nbsp;</td>
		<td class="toptd"><span style="font-size:10px;">top:</span>&nbsp;&nbsp;&nbsp;'.(!empty($_Top['usd'])?$PB['USD'].sayi($_Top['usd'],2,1):'&nbsp;').'</td>
		<td class="toptd"><span style="font-size:10px;">top:</span>&nbsp;&nbsp;&nbsp;'.(!empty($_Top['eur'])?$PB['EUR'].sayi($_Top['eur'],2,1):'&nbsp;').'</td>
		<td class="toptd"><span style="font-size:10px;">top:</span>&nbsp;&nbsp;&nbsp;'.(!empty($_Top['gbp'])?$PB['GBP'].sayi($_Top['gbp'],2,1):'&nbsp;').'</td>
		';
		if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
		echo '</tr>';*/
	}
	else{
		$bi=2;
		$ii=2;
		$phpExcelCols=array('A'.$bi=>'NO','B'.$bi=>'TARİH','C'.$bi=>'USD','D'.$bi=>'EUR','E'.$bi=>'GBP');
		$basH='A'; $sonH='E';
		$phpExcelStyle=$basH.$bi.':'.$sonH.$bi;
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			/*$_Top['usd']=!empty($_Top['usd'])?$_Top['usd']+$x['USD']:$x['USD'];
			$_Top['eur']=!empty($_Top['eur'])?$_Top['eur']+$x['EUR']:$x['EUR'];
			$_Top['gbp']=!empty($_Top['gbp'])?$_Top['gbp']+$x['GBP']:$x['GBP'];*/
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+$ii),$i)
										  ->setCellValue('B'.($i+$ii),z('tarihsaat',$x['tarih']))
										  ->setCellValue('C'.($i+$ii),!empty($x['USD'])?$x['USD']:0)
										  ->setCellValue('D'.($i+$ii),!empty($x['EUR'])?$x['EUR']:0)
										  ->setCellValue('E'.($i+$ii),!empty($x['GBP'])?$x['GBP']:0);
										  
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+$ii))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'1:'.$sonH.'1');
        $objPHPExcel->getActiveSheet()->getStyle($basH.'1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->setCellValue($basH.'1','Bu çıktı '.z('tarihsaat').' tarihinde '.$_Personel[z('lgn','ID')]['ad'].' '.$_Personel[z('lgn','ID')]['soyad']./*'('.$_Personel[z('lgn','ID')]['kullanici'].')*/' isimli kullanıcı tarafından dışa aktarılmıştır.');
		
		/*$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFont()->setBold(true);
		//$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFill()->getStartColor()->setRGB('ffffdd');
		$objPHPExcel->getActiveSheet()->setCellValue('B3','TOPLAMLAR');
		$objPHPExcel->getActiveSheet()->setCellValue('C3',!empty($_Top['siparisS'])?$_Top['siparisS']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('D3',!empty($_Top['usd'])?$_Top['usd']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('E3',!empty($_Top['eur'])?$_Top['eur']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('F3',!empty($_Top['gbp'])?$_Top['gbp']:0);
		
        $objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getBorders()->getAllBorders()
		->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFill()->getStartColor()->setRGB('ffffdd');
		$objPHPExcel->getActiveSheet()->setCellValue('B'.($i+$ii+1),'TOPLAMLAR');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($i+$ii+1),!empty($_Top['siparisS'])?$_Top['siparisS']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.($i+$ii+1),!empty($_Top['usd'])?$_Top['usd']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.($i+$ii+1),!empty($_Top['eur'])?$_Top['eur']:0);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.($i+$ii+1),!empty($_Top['gbp'])?$_Top['gbp']:0);*/
		
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+7?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>