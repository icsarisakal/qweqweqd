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
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihGiris','tarihVade'))){
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihGiris','tarihVade'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ID','lotNo','tarih','dokSalTopNo','notlar','ad','eposta','tel'))){
					$araSd.=$ad." LIKE '%".$dgr."%'";
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
$_X=z(1,"WHERE ".($admn?'arsiv = 0':"admin='0' AND arsiv = 0")./*$arsvsd.*/$araSd." ORDER BY ID ".(empty($phpExcelA)?'ASC'/*'DESC'*/:'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Firma=z(37,z(1,"WHERE ".z(38,$_X,'firma_ID'),'ID,ad','firma'));
	$iplikcek=z(1,5,'ID,nesne_IDdoviz,fiyat','iplik');//iplik tablosundan 5 numaralı ıd cektik
	$_Nesne=z(37,z(1,"WHERE ad='doviz'",'ID,ad,metin1,metin2','nesne'));//nesnelerde adı döviz olanları cekiyoruz
	$doviznesne=(!empty($_Nesne[$iplikcek['nesne_IDdoviz']]['metin1'])?$_Nesne[$iplikcek['nesne_IDdoviz']]['metin1']:'&nbsp;');//iplikten gelen  dövizi nesne ile ilişki şekilde cekmesini sagladık
	$fiyat=(!empty($iplikcek['fiyat'])?$iplikcek['fiyat']:'0');//fiyatı cektik
	//echo kur($fiyat,$doviznesne,'TRY');//ilk parametre fiyat ikince  parametre döviznesne 3 parametre de hangisine cevrilecekse onau yazıyoruz//
	$_nesneDep=z(37,z(1,"WHERE ad='departman' OR ad='ddepartman'","ID,metin1","nesne")); 

	
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			$departmanlar='';
			if(!empty($x['departmanlar']))foreach(explode(',',$x['departmanlar']) as $fe){
				if(!empty($_Z[$fe]['metin1'])){
					if(!empty($departmanlar))$departmanlar.=', ';
					$departmanlar.=$_Z[$fe]['metin1'];
				}
			}
			$tarih='';
			$tarihgiris='';
			if(!empty($x['tarih'])){
				$tarih=z('tarihsaat',$x['tarih']);
			}
			if(!empty($x['tarihGiris'])){
				$tarihgiris=z('tarihsaat',$x['tarihGiris']);
			}
			/* <td>'.(!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'&nbsp;').'</td>
				<td>'.(!empty($departmanlar)?$departmanlar:'&nbsp;').'</td> */
			echo '<tr class="allcheck"><th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td class="tdi">'.$i.'</td>';
			echo '
				<td>'.($admn||ytk($tbl,'duzenle')?'<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'">'.blnn('ad',$x['ad']).'</a>':blnn('ad',$x['ad'])).
				($admn||ytk($tbl,'ekle')?'&nbsp;<a href="?s='.$tbl.'&a=ekle&id='.$x['ID'].'"><i title="Personeli başka bir isimle kopyala" class="icon-paste"></i></a>':'').
				'</td>
				<td>'.(!empty($_nesneDep[$x['nesne_IDdepartman']])?$_nesneDep[$x['nesne_IDdepartman']]['metin1']:' ').'</td>
				<td>'.$tarih.'</td>
				<td>'.$tarihgiris.'</td>
				<td>'.blnn('eposta',$x['eposta']).'</td>
				<td>'.blnn('tel',$x['tel']).'</td>';
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			} ?>

			<td class="text-center">
				<div class="list-icons">
					<div class="dropdown">
						<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<?php if($admn||$ytkDzn){ ?>
								<a href="?s=<?php echo $tbl; ?>&a=duzenle&id=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-text2"></i>Düzenle</a>
							<?php } ?>
							<?php if(1!=1&&$admn||ytk($tbl,'arsivle')){ ?>
								<?php if(empty($x['arsiv'])){ ?>
									<a href="?s=<?php echo $tbl; ?>&a=listele&ida1=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-locked"></i>Arşivle</a>
								<?php } else { ?>
									<a href="?s=<?php echo $tbl; ?>&a=listele_arsv<?php echo $x['arsiv']; ?>&ida0=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-locked"></i>Arşivden al</a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</td>
							
			<?php echo '</tr>';
		}
	}
	else{
		$phpExcelCols=array('A1'=>'NO','B1'=>'PERSONEL İSMİ','C1'=>'İLGİLİ DEPARTMANLAR','D1'=>'KAYIT TARİHİ','E1'=>'SON GİRİŞ TARİHİ','F1'=>'E-POSTA','G1'=>'TEL');
		$basH='A'; $sonH='G';
		$phpExcelStyle=$basH.'1:'.$sonH.'1';
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			$departmanlar='';
			if(!empty($x['departmanlar']))foreach(explode(',',$x['departmanlar']) as $fe){
				if(!empty($_Z[$fe]['metin1'])){
					if(!empty($departmanlar))$departmanlar.=', ';
					$departmanlar.=$_Z[$fe]['metin1'];
				}
			}
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
										  ->setCellValue('B'.($i+1),$x['ad'])
										  ->setCellValue('C'.($i+1),(!empty($departmanlar)?$departmanlar:''))
										  ->setCellValue('D'.($i+1),z('tarihsaat',$x['tarih']))
										  ->setCellValue('E'.($i+1),z('tarihsaat',$x['tarihGiris']))
										  ->setCellValue('F'.($i+1),$x['eposta'])
										  ->setCellValue('G'.($i+1),$x['tel']);
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+1))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+8?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>