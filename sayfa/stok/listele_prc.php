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
	$araSd='';$ayrc=' AND ';
	$_xOR=Array('komisyoncu_ID1','komisyoncu_ID2');
	foreach($_G as $ad=>$dgr){
		if(isset($dgr)){
			if($dgr!==''){
				if(!empty($araSd)){
					$araSd.=$ayrc;
				}
				if(array_search($ad,$_xOR)===0){$araSd.='(';$ayrc=' OR ';}
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihSonHareket'))){
					$araSd.=$ad.">='".$dgr[0]."' AND ".$ad."<'".date('Y-m-d',strtotime($dgr[1]." +1 day"))."'";
				}
				/*else if(is_array($dgr)&&in_array($ad,Array('durum'))){
		if($ad=='durum'){print_r($dgr);die;}

					$araSd.='(';$fea=0;
					foreach($dgr as $i=>$dg){
						if($dg!==''&&$dg!=-100){
							if(!empty($fea))$araSd.=' OR ';else $fea++;
							$dg=str_replace(array('_bos','_sifir'),array('','0'),$dg);
							$araSd.=$ad."='".$dg."'";
						}
					}
					$araSd.=')';
				}*/
				else if(is_array($dgr)){
					$araSd.='(';$fea=0;
					foreach($dgr as $i=>$dg){
						if($dg!==''){
							if(!empty($fea))$araSd.=' OR ';else $fea++;
							$dg=str_replace(array('_bos','_sifir'),array('','0'),$dg);
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihSiparis','tarihVade'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ID','lotNo','tarih','dokSalTopNo','notlar'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				else if(in_array($ad,Array('metraj','enHam','hkHamGramaj'))){
					$araSd.=$ad." LIKE '%".z(36,$dgr)."%'";
				}
				// alt urun tablosu
				else if(in_array($ad,Array('firma_IDteklif'))){
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
				else {
					$dgr=str_replace(array('_bos','_sifir'),array('','0'),$dgr);
					$araSd.=$ad."='".$dgr."'";
				}
				
				if(array_search($ad,$_xOR)===count($_xOR)-1){$araSd.=')';$ayrc=' AND ';}
			}
		}
	}
}

$araSd=!empty($araSd)?" AND (".$araSd.")":'';
$arsvsd=strpos(z(8,'a'),'_arsv')!==false?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv='0'";
$hambezSd=z(8,'hambezstok_ID','sayi')?" AND hambezstok_ID='".z(8,'hambezstok_ID','sayi')."'":"";
$firmaSd=z(8,'firma_ID','sayi')?" AND firma_ID='".z(8,'firma_ID','sayi')."'":"";
$bytkpSd=z(8,'boyatakip_ID','sayi')?" AND boyatakip_ID='".z(8,'boyatakip_ID','sayi')."'":"";

if(empty($phpExcelA)){
	$_LA=z(7,'la'.$syf);
	if(empty($_LA)){
		if($araHA&&z(11,'la'.$syf)){
			$_LA=z(11,'la'.$syf);
		}
	}
	if(!empty($_LA['adet'])||$_LA['adet']==='0'){
		$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:'';
	}
	else{
		$llimit=!empty($ayr['genelListeSatirA'])?' LIMIT '.$ayr['genelListeSatirA']:'';
	}
	z(11,'la'.$syf,$_LA);
}
else $llimit='';

$_X=z(1,"WHERE tip='0' AND durum<>'3' AND ".$arsvsd.$araSd.$hambezSd.$firmaSd.$bytkpSd.(!empty($ozelSd)?$ozelSd:'')." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	function dzn($tip,$ad){
		static $tix=array(),$i=0;
		$ilk=$i==0;
		if(empty($tix[$ad])){
			$i++;
			$tix[$ad]=$i;
		}
		$x=!empty($GLOBALS['x'])?$GLOBALS['x']:'';
		$_Nesne=z(37,z(1,"WHERE arsiv='0' AND ad='iplikTip'",'ID,ad,metin1,metin2','nesne'));//!empty($GLOBALS['_Nesne'])?$GLOBALS['_Nesne']:'';
		if($GLOBALS['dznA']==false){
			switch ($tip) {
				case 'sayi':
					return !empty( $x[$ad] ) ? z('sayi',$x[$ad],2) : 0;
					break;
				case 'nesne':
					return (!empty($_Nesne[$x['nesne_ID'.$ad]]['metin1'])?$_Nesne[$x['nesne_ID'.$ad]]['metin1']:'&nbsp;');
					break;
				default:
					return !empty( $x[$ad] ) ? $x[$ad] : '';
					break;
			}
		}
		else{
			switch ($tip) {
				case 'sayi':
					return '<input name="'.$GLOBALS['tbl'].'['.$x['ID'].']['.$ad.']" tabindex="'.$tix[$ad].'" '.($ilk?'autofocus="autofocus"':'').' value="'.(!empty( $x[$ad] ) ? z('sayi',$x[$ad],4) : '').'" >';
					break;

				case 'nesne':
					$icrk='<select name="'.$GLOBALS['tbl'].'['.$x['ID'].'][nesne_ID'.$ad.']">
					<option value="0">&nbsp;</option>';
					if(!empty($_Nesne)){
						foreach ($_Nesne as $nsn) {
							if($nsn['ad']==$ad){
								$icrk.='<option value="'.$nsn['ID'].'" '. ($nsn['ID']==$x['nesne_ID'.$ad]?'selected="selected"':'') .'>'.$nsn['metin1'].' '.$nsn['metin2'].'</option>';
							}
						}
					}
					else $icrk.='<option>Seçenek bulunamadı!</option>';
					$icrk.='</select>';
					return $icrk;
				default:
					return '<input name="'.$GLOBALS['tbl'].'['.$x['ID'].']['.$ad.']" tabindex="'.$ad.'" value="'.(!empty( $x[$ad] ) ? $x[$ad] : '').'" >';
					break;
			} 
		}
	}

	$_Nesne=z(37,z(1,"WHERE "
		.z(38,$_X,'nesne_IDkalite')
		." OR ".z(38,$_X,'nesne_IDkompozisyon')
		." OR ".z(38,$_X,'nesne_IDorguTipi')
		." OR ".z(38,$_X,'nesne_IDdokumaSalonu')
	,'ID,metin1,metin2','nesne'));
	//$_Firma=z(37,z(1,NULL,NULL,'firma'));
	$_Iplikno=z(37,z(1,/*"WHERE ".z(38,$_XAC,'iplikno_ID','ID')*/'','ID,ad','iplikno'));
	$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_X,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
	//$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_X,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
	$_Top=array('metraj'=>array('1K'=>0,'1A'=>0,'2K'=>0));	
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			
			$x['metraj']=sayi($x['metraj']);
			if(!empty($_Nesne[$x['nesne_IDkalite']]['metin2']) && in_array($_Nesne[$x['nesne_IDkalite']]['metin2'], array('1K','1A','2K'))){
				$_Top['metraj'][ $_Nesne[$x['nesne_IDkalite']]['metin2'] ]=
				!empty($_Top['metraj'][ $_Nesne[$x['nesne_IDkalite']]['metin2'] ])?
				$_Top['metraj'][ $_Nesne[$x['nesne_IDkalite']]['metin2'] ]+$x['metraj']
				:$x['metraj'];
			}
			
			echo '<tr '.($i%2==0?'class="tr2"':'').' title="'.(!empty($_StokTip[$x['tip']])?$_StokTip[$x['tip']]:'').'">
			<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td>'.$i.'</td>';
			echo '
				<td><a href="?s='.$tbl.'&a=detay&id='.$x['ID'].'" class="dty">'.blnn('ID',$x['ID']).'</a></td>
				<td>'.(!empty($x['dokumastok_ID'])?$x['dokumastok_ID']:'').'</td>
				<td>'
					.(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi']:'&nbsp;')
					.(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi'])?' '.$_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi']:'&nbsp;')
				.'</td>
				<td>'.(!empty($x['lotNo'])?blnn('lotNo',$x['lotNo']):'&nbsp;').'</td>
				<td>'.(!empty($x['metraj'])?blnn('metraj',z(36,$x['metraj'],2,1)).'&nbsp;mt':'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDkalite']]['metin1'])?$_Nesne[$x['nesne_IDkalite']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDkompozisyon']]['metin1'])?$_Nesne[$x['nesne_IDkompozisyon']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDorguTipi']]['metin1'])?$_Nesne[$x['nesne_IDorguTipi']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($x['enHam'])?blnn('enHam',z(36,$x['enHam'],2,1)):'&nbsp;').'</td>
				<td>'.(!empty($x['hkHamGramaj'])?blnn('hkHamGramaj',z(36,$x['hkHamGramaj'],2,1)):'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDdokumaSalonu']]['metin1'])?$_Nesne[$x['nesne_IDdokumaSalonu']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($x['dokSalTopNo'])?blnn('dokSalTopNo',$x['dokSalTopNo']):'&nbsp;').'</td>
				<td>'.(!empty($x['tarihSonHareket'])?z('tarih',$x['tarihSonHareket']):'&nbsp;').'</td>
				'/*
				<td>'.(!empty($x['notlar'])?blnn('notlar',$x['notlar']):'&nbsp;').'</td>
				<td>'.(!empty($x['aciklama'])?@blnn('aciklama',$x['aciklama']):'&nbsp;').'</td>'*/;
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			}
			/*if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}*/

			if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}
			if($admn||ytk($tbl,'sil'))echo '<td class="printx"><a href="?s='.$tbl.'&a='.z(9,'a','listele').'&idx='.$x['ID'].'" onClick="return confirm(\'Siparişi silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';
			
		}

		echo '<tr id="toplamTutarTr" class="toptr"><th class="printx">&nbsp;</th>
		<td class="toplamTr" colspan="14">
		<b>Top adeti: '.($i).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		foreach(array('metraj') as $fed){
			foreach ($_Top[$fed] as $nsm2 => $val) if(!empty($nsm2)){
				echo '<b>'.(!empty($_KaliteTip[$nsm2])?$_KaliteTip[$nsm2]:$nsm2).': '.(!empty($val)?sayi($val,2,1):0).' mt</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		}
		echo '</td>';
		if($admn||ytk($syf,'arsivle'))echo '<td class="printx">&nbsp;</td>';
		if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
		echo '</tr>';
	}
	else{
		
		// AYAR
		$bi=2;$ii=3;
		$basH='A'; $sonH='P';
		$ab=array();for($j=$basH;$j<=$sonH;$j++)$ab[]=$j;
		// HEAD
		$hd=array('NO','STOK NO','DURUM',/*'TİP NO',*/'PARTİ NO','KUMAŞ CİNSİ','RENK NO','DESEN NO','MAMUL EN / GR','KOMPOZİSYON','KALİTE','TOP NO','LOT NO','METRAJ','TARİH','AÇIKLAMA');
		$phpExcelStyle=$basH.$bi.':'.$sonH.$bi;
		foreach($hd as $fei=>$fed)$objPHPExcel->getActiveSheet()->setCellValue($ab[$fei].$bi,$fed);
		
		$currencyFormat = html_entity_decode("0,0.00",ENT_QUOTES,'UTF-8');
		
        // GİRDİLER
		foreach($_X as $i=>$x){$i++;
			
			// TOPLA
			$_Top['metraj']=!empty($_Top['metraj'])?$_Top['metraj']+$x['metraj']:$x['metraj'];
			
			
			// SATIRLARI OLUŞTUR
			$a=0;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),$i);$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['ID'])?$x['ID']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_CkDrm[$x['durum']][1])?$_CkDrm[$x['durum']][1]:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['partiNo'])?$x['partiNo']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_Kalite[$x['kalite_ID']]['ad'])?trmtn($_Kalite[$x['kalite_ID']]['ad']):'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_Z[$x['nesne_IDrenkNo']]['metin1'])?$_Z[$x['nesne_IDrenkNo']]['metin1']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_Z[$x['nesne_IDdesenNo']]['metin1'])?$_Z[$x['nesne_IDdesenNo']]['metin1']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_Z[$x['nesne_IDkompozisyon']]['metin1'])?$_Z[$x['nesne_IDkompozisyon']]['metin1']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($_Z[$x['nesne_IDkalite']]['metin1'])?$_Z[$x['nesne_IDkalite']]['metin1']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['topNo'])?$x['topNo']:'');$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['lotNo'])?$x['lotNo']:'');$a++;
			$objPHPExcel->getActiveSheet()->getStyle($ab[$a].($i+$ii))->getNumberFormat()->setFormatCode($currencyFormat);
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['metraj'])?$x['metraj']:0);$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),z('tarihsaat',$x['tarih']));$a++;
			$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].($i+$ii),!empty($x['aciklama'])?$x['aciklama']:'');$a++;
										  
			//SATIRLARI ÇERÇEVELE			  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+$ii))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		
		// ÜST BİLGİ
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'1:'.$sonH.'1');
        $objPHPExcel->getActiveSheet()->getStyle($basH.'1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->setCellValue($basH.'1','Bu çıktı '.z('tarihsaat').' tarihinde '.$_Personel[z('lgn','ID')]['ad'].' '.$_Personel[z('lgn','ID')]['soyad']./*'('.$_Personel[z('lgn','ID')]['kullanici'].')*/' isimli kullanıcı tarafından dışa aktarılmıştır.');
		
		// TOPLAMI GÖSTER ÜSTTE
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFont()->setBold(true);
		//$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3:'.$sonH.'3')->getFill()->getStartColor()->setRGB('ffffdd');
		// TOPLAM STUNLARI
		$a=1;
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'3:'.$ab[$a].'3');
		$objPHPExcel->getActiveSheet()->getStyle($basH.'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.'3','TOPLAMLAR ');$a++;
		$objPHPExcel->getActiveSheet()->getStyle($ab[$a].'3')->getNumberFormat()->setFormatCode($PB[$x['pb']].' '.$currencyFormat);
		$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].'3',!empty($_Top['metraj'])?$_Top['metraj']:0);$a++;
			
		// TOPLAMI GÖSTER ALTTA
        $objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getBorders()->getAllBorders()
		->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle($basH.($i+$ii+1).':'.$sonH.($i+$ii+1))->getFill()->getStartColor()->setRGB('ffffdd');
		// TOPLAM STUNLARI
		$a=1;$iix=($i+$ii+1);
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.$iix.':'.$ab[$a].$iix);
		$objPHPExcel->getActiveSheet()->getStyle($basH.$iix)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->setCellValue($basH.$iix,'TOPLAMLAR ');$a++;
		$objPHPExcel->getActiveSheet()->getStyle($ab[$a].$iix)->getNumberFormat()->setFormatCode($PB[$x['pb']].' '.$currencyFormat);
		$objPHPExcel->getActiveSheet()->setCellValue($ab[$a].$iix,!empty($_Top['metraj'])?$_Top['metraj']:0);$a++;
		
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+18?>">Kayıt bulunamadı.<?php 
//echo "WHERE durum<>'3' AND ".$arsvsd.$araSd.(!empty($ozelSd)?$ozelSd:'')." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit; 
?></td></tr>
<?Php $phpExcelA=false;}
?>