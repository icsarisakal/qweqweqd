<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
if(!empty($_G)){
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
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihSiparis','tarihVade'))){
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihIslem','tarihVade'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ID','girisAdi','cikisAdi','aciklama','numuneIsmi','tarih','boyahanePartiNo'))){
					$araSd.=$ad." LIKE '%".$dgr."%'";
				}
				else if(in_array($ad,Array('mamulMetraj','cekmeBoy','cekmeEn'))){
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
$doksipSd=z(8,'dokumasiparis_ID','sayi')?" AND dokumasiparis_ID='".z(8,'dokumasiparis_ID','sayi')."'":"";
$bytsipSd=z(8,'boyatakipsiparis_ID','sayi')?" AND boyatakipsiparis_ID='".z(8,'boyatakipsiparis_ID','sayi')."'":"";
$bytSd=z(8,'boyatakip_ID','sayi')?" AND boyatakip_ID='".z(8,'boyatakip_ID','sayi')."'":"";
$hambezSd=z(8,'hambezstok_ID','sayi')?" AND hambezstok_ID='".z(8,'hambezstok_ID','sayi')."'":"";
$firmaSd=z(8,'firma_ID','sayi')?" AND firma_ID='".z(8,'firma_ID','sayi')."'":"";
$girisSd=z(8,'giris')?" AND giris='".z(8,'giris')."'":"";
$mmlBzStkDtySd=z(8,'mamulbezstokdetay_ID','sayi')?" AND mamulbezstokdetay_ID='".z(8,'mamulbezstokdetay_ID','sayi')."'":"";
$nmnBzStkDtySd=z(8,'numunebezstokdetay_ID','sayi')?" AND numunebezstokdetay_ID='".z(8,'numunebezstokdetay_ID','sayi')."'":"";

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
else $llimit='';
//echo "WHERE tip='1' AND ".$arsvsd.$araSd.$doksipSd.$bytSd.$bytsipSd.$mmlBzStkDtySd.$firmaSd.$girisSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit;
$_X=z(1,"WHERE tip='1' AND ".$arsvsd.$araSd.$doksipSd.$bytSd.$bytsipSd.$mmlBzStkDtySd.$firmaSd.$girisSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	
	

	$_Mamulkumas=z(37,z(1,"WHERE ".z(38,$_X,'mamulkumas_ID'),'ID,nesne_IDbOzellik,ad,numuneAdi','mamulkumas'));
	$_Mamulkumasdetay=z(37,z(1,"WHERE ".z(38,$_X,'mamulkumasdetay_ID'),'ID,mamulkumas_ID,ad,kod','mamulkumasdetay'));
	$_Personel=z(37,z(1,"WHERE ".z(38,$_X,'personel_ID'),'ID,ad','personel'));
	$_Nesne=z(37,z(1,("WHERE ".z(38,$_X,'nesne_IDkalite')." OR ".z(38,$_X,'nesne_IDboyahane')." OR ".z(38,$_Mamulkumas,'nesne_IDbOzellik')." OR ad='boyahane'"),'ID,metin1,metin2','nesne'));
	$_Top=array('top1K'=>0,'top1A'=>0,'top2K'=>0);	
	$_Boyatakip=z(37,z(1,"WHERE ".z(38,$_X,'boyatakip_ID'),'ID,nesne_IDboyahane','boyatakip'));
	$_Firma=z(37,z(1,"WHERE ".z(38,$_X,'firma_ID')." OR ".z(38,$_X,'firma_IDiade'),'ID,ad','firma'));
	
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			
			$x['top1K']=z(36,$x['top1K']);
			$_Top['top1K'] = !empty($_Top['top1K'])? $_Top['top1K']+$x['top1K']	: $x['top1K'];
			$x['top1A']=z(36,$x['top1A']);
			$_Top['top1A'] = !empty($_Top['top1A'])? $_Top['top1A']+$x['top1A']	: $x['top1A'];
			$x['top2K']=z(36,$x['top2K']);
			$_Top['top2K'] = !empty($_Top['top2K'])? $_Top['top2K']+$x['top2K']	: $x['top2K'];
			
			$x['cikisAdi']='';
			$x['girisAdi']='';

			switch ($x['cikis']) {
				case 'boyatakipsiparis':
					if(!empty($x['boyatakip_ID'])){
						$x['cikisAdi']=$_Nesne[ $_Boyatakip[$x['boyatakip_ID']]['nesne_IDboyahane'] ]['metin1'];
					}
					break;
				
				case 'mamulbezstokdetay':
				case 'numunebezstokdetay':
				case 'mamulbezstok':
				case 'numunebezstok':
					$x['cikisAdi']=$ayr['mamulDepoAd'];
					break;
				
				case 'mamulbezsatis':
					$x['cikisAdi']=!empty($_Firma[$x['firma_IDiade']]['ad'])?($_Firma[$x['firma_IDiade']]['ad']):'FİRMA';
					break;
				
				case 'boyatakip':
					$x['cikisAdi']=!empty($_Boyatakip[$x['boyatakip_IDiade']]['nesne_IDboyahane'])
						&& !empty($_Nesne[$_Boyatakip[$x['boyatakip_IDiade']]['nesne_IDboyahane']]['metin1'])
						?$_Nesne[$_Boyatakip[$x['boyatakip_IDiade']]['nesne_IDboyahane']]['metin1']:'';
					break;
			}

			switch ($x['giris']) {
				case 'boyatakipsiparis':
					$x['girisAdi']="BOYA TAKİP";
					break;
				
				case 'mamulbezstokdetay':
				case 'numunebezstokdetay':
				case 'mamulbezstok':
				case 'numunebezstok':
					$x['girisAdi']=$ayr['mamulDepoAd'];
					break;
				
				case 'mamulbezsatis':
					$x['girisAdi']=!empty($_Firma[$x['firma_ID']]['ad'])?($_Firma[$x['firma_ID']]['ad']):'FİRMA';
					break;
			}

			
			echo '<tr '.($i%2==0?'class="tr2"':'').'>
			<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td>'.$i.'</td>';
			echo '
				<td><a href="?s='.$syf.'&a=mamuldetay&id='.$x['ID'].'" class="dty">'.blnn('ID',$x['ID']).'</a><a href="?s=mamul&a=listele&ceki_ID='.$x['ID'].'&sgeri=ceki&ageri=mamullistele" class="dzn" style="background-image:url(img/dzn.png); background-color:white;"></a></td>
			'./*/'
				<td><img src="img/drm'.$_CkDrm[$x['durum']][0].'.png" title="'.$_CkDrm[$x['durum']][1].'" height="20" /></td>
			'./*/'
				<td>'.$x['cikisAdi'].'</td>
				<td>'.$x['girisAdi'].'</td>
				<td class="aktifduzenle" data-aktifduzenle-id="m_'.$tbl.'_aciklama_'.$x['ID'].'">'.(!empty($x['aciklama'])?blnn('aciklama',$x['aciklama']):'&nbsp;').'</td>
				
				<td class="aktifduzenle" data-aktifduzenle-id="m_'.$tbl.'_boyahanePartiNo_'.$x['ID'].'">'.(!empty($x['boyahanePartiNo'])?blnn('boyahanePartiNo',$x['boyahanePartiNo']):'&nbsp;').'</td>

				<td>'.
				(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad'])?$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad']:'').' / '.
				(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod'])?$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod']:'').' / '.
				(!empty($_Mamulkumas[$x['mamulkumas_ID']]['nesne_IDbOzellik'])&&!empty($_Nesne[$_Mamulkumas[$x['mamulkumas_ID']]['nesne_IDbOzellik']]['metin1'])?$_Nesne[$_Mamulkumas[$x['mamulkumas_ID']]['nesne_IDbOzellik']]['metin1']:'').
				'</td>

				<td>'.
				(!empty($_Mamulkumas[$x['mamulkumas_ID']]['ad'])?$_Mamulkumas[$x['mamulkumas_ID']]['ad']:'').' / '.
				(!empty($_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi'])?$_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi']:'').
				'</td>
				
				<td>'.(!empty($x['top1K'])?blnn('top1K',z(36,$x['top1K'],2,1)):'&nbsp;').'</td>
				<td>'.(!empty($x['top1A'])?blnn('top1A',z(36,$x['top1A'],2,1)):'&nbsp;').'</td>
				<td>'.(!empty($x['top2K'])?blnn('top2K',z(36,$x['top2K'],2,1)):'&nbsp;').'</td>
				

				<td>'.(!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'').'</td>
				<td>'.z('tarih',$x['tarihIslem']).'</td>
				';
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			}
			if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$syf.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$syf.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}
			if($admn||ytk($tbl,'sil'))echo '<td class="printx"><a href="?s='.$syf.'&a='.z(9,'a','listele').'&idx='.$x['ID'].'" onClick="return confirm(\'Siparişi silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';

			echo '<tr><td colspan="10" class="printytd">&nbsp;</td></tr>';
			
		}



		echo '<tr id="toplamTutarTr" class="toptr"><th class="printx">&nbsp;</th>
		<td class="toplamTr" colspan="13">
		<b>Top adeti: '.($i).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			foreach ($_Top as $nsm2 => $val) if(!empty($nsm2)){ $nsm2=str_replace('top', '', $nsm2);
				echo '<b>'.(!empty($_KaliteTip[$nsm2])?$_KaliteTip[$nsm2]:$nsm2).': '.(!empty($val)?sayi($val,2,1):0).' mt</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		echo '</td>';
		if($admn||ytk($syf,'arsivle'))echo '<td class="printx">&nbsp;</td>';
		if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
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
?>