<?Php
if($admn||ytk($syf,'listele')||!empty($KOD)){
if(z(8,'id')||!empty($KOD)){
if(!empty($KOD)){
	$kodx=false;
	$ID=z(34,$KOD,1);
}
else{
	$ID=z(8,'id');
	$kodx=true;
}

if(!empty($ID)){
	
$_G=z(7,'araCkDty');
if(empty($_G)){
	if($araHA&&z(11,'araCkDty')){
		$_G=z(11,'araCkDty');
	}
}
if(!empty($_G)){
	unset($_NSN);
	z(11,'araCkDty',$_G);
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
				else if(in_array($ad,Array('ID','tipNo','partiNo','mamulEn','mamulGr','topNo','lotNo','metraj','tarih','aciklama'))){
					$araSd.=$ad." LIKE '%".$dgr."%'";
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
$arsvsd=strpos(z(8,'a'),'_arsv')!==false?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv<>'-1'";
if(empty($phpExcelA)){
	$_LA=z(7,'la');
	$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:(!isset($_LA['adet'])?' LIMIT 30':'');
}
else $llimit='';
$stkSd=z(38,z(1,array('ceki_ID'=>$ID),'ID,stok_ID','cekistok'),'stok_ID');
$_X=z(1,("WHERE ".$arsvsd.$araSd." AND ".$stkSd." ORDER BY ID ".(0&&empty($phpExcelA)?'DESC':'ASC')/*.$llimit*/),NULL,'stok');

if(!empty($_X)){
	function blnn($ad,$dgr){return str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr);}
	
	//$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	//$_Y=z(1,NULL,NULL,'uyeler');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['id']]=$y;
	$_Y=z(1,NULL,'id,ad','kalite');if(!empty($_Y))foreach($_Y as $y)$_Kalite[$y['id']]=$y;
	//$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_X,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
	$_Mamulkumas=z(37,z(1,("WHERE ".z(38,$_X,'mamulkumas_ID')),'ID,ad,numuneAdi,mamulGr,mamulEn','mamulkumas'));
	$_Mamulkumasdetay=z(37,z(1,("WHERE ".z(38,$_X,'mamulkumasdetay_ID')),'ID,ad,kod','mamulkumasdetay'));
	$_Boyatakip=z(37,z(1,("WHERE ".z(38,$_X,'boyatakip_ID')),'ID,partiNo','boyatakip'));
	$_Nesne=z(37,z(1,"WHERE ".z(38,$_X,'nesne_IDkalite')." OR ".z(38,$_X,'nesne_IDkompozisyon')." OR ".z(38,$_X,'nesne_IDorguTipi'),'ID,metin1,metin2','nesne'));
	$_Top=array();
	$nsnDil=(z(8,'dil')=='en'?'metin2':'metin1');
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;


			if(empty($x['boyahanePartiNo'])){
			    if(!empty($x['boyatakip_IDstok'])){
			        $boyatakip=z(1,$x['boyatakip_IDstok'],'ID,partiNo','boyatakip');
			        if(!empty($boyatakip)){
			            if(z(3,$x['ID'],array('boyahanePartiNo'=>$boyatakip['partiNo']),'stok')){
			            	$x['boyahanePartiNo']=$boyatakip['partiNo'];
			            }
			        }
			    }
			}
			
			$_Top['metraj']=!empty($_Top['metraj'])?$_Top['metraj']+$x['metraj']:$x['metraj'];
			
			echo '<tr '.($i%2==0?'class="tr2"':'').'>
				<td>'.$i.'</td>';
				//<td>'.(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi']:'&nbsp;').'</td>
			echo '
				<td>'.( $kodx ?( '<a href="'.( $kodx ?('?s=mamul&a=detay&id='.$x['ID']):('?stok='.z(34,$x['ID'])) ).'" class="dty">'.blnn('ID',$x['ID']).'</a>' ) :$x['ID']).'</td>
				<td>'.
					(!empty($_Mamulkumas[$x['mamulkumas_ID']]['ad'])?$_Mamulkumas[$x['mamulkumas_ID']]['ad']:'&nbsp;').
					(!empty($_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi'])?' / '.$_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi']:'&nbsp;').
				'</td>
				<td>'.
					(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad'])?$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad']:'&nbsp;').
				'</td>
				<td>'.
					(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod'])?$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod']:'&nbsp;').
				'</td>
				<td>'.(!empty($x['boyahanePartiNo'])?blnn('boyahanePartiNo',$x['boyahanePartiNo']):'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDkompozisyon']][$nsnDil])?$_Nesne[$x['nesne_IDkompozisyon']][$nsnDil]:'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDorguTipi']]['metin1'])?$_Nesne[$x['nesne_IDorguTipi']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($x['mamulEn'])?blnn('mamulEn',z(36,$x['mamulEn'],2)):'&nbsp;').' / '.(!empty($x['mamulGr'])?blnn('mamulGr',z(36,$x['mamulGr'],2)):'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDkalite']]['metin1'])?$_Nesne[$x['nesne_IDkalite']]['metin1']:'&nbsp;').'</td>
				<td>'.(!empty($x['boyahaneTopNo'])?blnn('boyahaneTopNo',$x['boyahaneTopNo']):'&nbsp;').'</td>
				<td>'.(!empty($x['lotNo'])?blnn('lotNo',$x['lotNo']):'&nbsp;').'</td>
				<td>'.(!empty($x['metraj'])?blnn('metraj',z(36,$x['metraj'],2)):'&nbsp;').'</td>
				'./*/'
				<td>'.(!empty($x['aciklama'])?blnn('aciklama',$x['aciklama']):'&nbsp;').'</td>
				<td>'.(!empty($_Nesne[$x['nesne_IDdokumaSalonu']]['metin1'])?$_Nesne[$x['nesne_IDdokumaSalonu']]['metin1']:'&nbsp;').'</td>
				'./*/'
				';
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			}
			
			
		}
		echo '<tr id="toplamTutarTr" class="toptr">';
		echo '<td colspan="6"><strong>'.(z(8,'dil')=='en'?'TOTAL&nbsp;ROLL':'TOP&nbsp;ADETİ').'&nbsp;: &nbsp;&nbsp;&nbsp;'.($i).'</strong></td>';
		echo '<td colspan="7"><strong>'.(z(8,'dil')=='en'?'TOTAL&nbsp;MT':'TOPLAM&nbsp;METRE').'&nbsp;: &nbsp;&nbsp;&nbsp;'.(!empty($_Top['metraj'])?sayi($_Top['metraj'],2,1):'0').'&nbsp;mt</strong></td>';
		//if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
		echo '</tr>';
	}
	else{
		$ii=4;
		$phpExcelCols=array('A'.$ii=>'NO','B'.$ii=>'STOK NO','C'.$ii=>'DURUM','D'.$ii=>'TİP NO','E'.$ii=>'PARTİ NO','F'.$ii=>'KUMAŞ CİNSİ','G'.$ii=>'RENK NO','H'.$ii=>'DESEN NO','I'.$ii=>'MAMUL EN','J'.$ii=>'MAMUL GR','K'.$ii=>'KOMPOZİSYON','L'.$ii=>'KALİTE','M'.$ii=>'PUAN','N'.$ii=>'TOP NO','O'.$ii=>'LOT NO','P'.$ii=>'METRAJ','Q'.$ii=>'TARİH','R'.$ii=>'AÇIKLAMA');
		$basH='A'; $sonH='R';
		$phpExcelStyle=$basH.$ii.':'.$sonH.$ii;
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+$ii),$i)
										  ->setCellValue('B'.($i+$ii),$x['ID'])
										  ->setCellValue('C'.($i+$ii),$_CkDrm[$x['durum']][1])
										  ->setCellValue('D'.($i+$ii),$x['tipNo'])
										  ->setCellValue('E'.($i+$ii),$x['partiNo'])
										  ->setCellValue('F'.($i+$ii),!empty($_Kalite[$x['kalite_ID']]['ad'])?$_Kalite[$x['kalite_ID']]['ad']:'')
										  ->setCellValue('G'.($i+$ii),!empty($_Z[$x['nesne_IDrenkNo']]['metin1'])?$_Z[$x['nesne_IDrenkNo']]['metin1']:'')
										  ->setCellValue('H'.($i+$ii),!empty($_Z[$x['nesne_IDdesenNo']]['metin1'])?$_Z[$x['nesne_IDdesenNo']]['metin1']:'')
										  ->setCellValue('I'.($i+$ii),$x['mamulEn'])
										  ->setCellValue('J'.($i+$ii),$x['mamulGr'])
										  ->setCellValue('K'.($i+$ii),!empty($_Z[$x['nesne_IDkompozisyon']]['metin1'])?$_Z[$x['nesne_IDkompozisyon']]['metin1']:'')
										  ->setCellValue('L'.($i+$ii),!empty($_Z[$x['nesne_IDkalite']]['metin1'])?$_Z[$x['nesne_IDkalite']]['metin1']:'')
										  ->setCellValue('M'.($i+$ii),!empty($_Z[$x['nesne_IDpuan']]['metin1'])?$_Z[$x['nesne_IDpuan']]['metin1']:'')
										  ->setCellValue('N'.($i+$ii),$x['topNo'])
										  ->setCellValue('O'.($i+$ii),$x['lotNo'])
										  ->setCellValue('P'.($i+$ii),$x['metraj'])
										  ->setCellValue('Q'.($i+$ii),z('tarihsaat',$x['tarih']))
										  ->setCellValue('R'.($i+$ii),$x['aciklama'])
										  
										//->setCellValue('C'.($i+$ii),!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'')
										  ;
										  
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+$ii))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		
		/*$topTutar='';
		foreach($_TopTutar as $fei=>$fed){
			if(!empty($topTutar))$topTutar.='              ';
			$topTutar.=sayi($fed,2,1).' '.$fei;
		}*/
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells($basH.'2:'.$sonH.'2');
		$objPHPExcel->getActiveSheet()->getStyle($basH.'2:'.$sonH.'2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
        $objPHPExcel->getActiveSheet()->getStyle($basH.'2')->getFont()->setBold(true);
		//$objPHPExcel->getActiveSheet()->setCellValue($basH.'2','TOPLAM TUTARLAR:      '.$topTutar);
		
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+21?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}

}
}else _uyr(2,'Görüntülenecek içerik bulunamadı.');
}else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
?>