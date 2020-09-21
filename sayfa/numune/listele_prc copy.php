<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
$iplikkarttopla=array();

if(!empty($_G)){
	z(11,'ara'.$syf,$_G);
	$araSd='';$ayrc=' AND ';
	$_xOR=Array('komisyoncu_ID1','komisyoncu_ID2');
	$iplikkartnesne=(!empty($_G['nesne_IDiplikkartTipi'])?array_filter($_G['nesne_IDiplikkartTipi']):'');
	$iplikkartnesne=str_replace("_sifir","",$iplikkartnesne);
	$iplikkartnesne=(!empty($iplikkartnesne)?array_filter($iplikkartnesne):'');
			unset($_G['nesne_IDiplikkartTipi']);
			if(!empty($iplikkartnesne)){
				foreach($iplikkartnesne as $elyfn){
					if(!in_array($elyfn,$iplikkarttopla)){
					$iplikkarttopla[]=$elyfn;
					}
				}
			}

	foreach($_G as $ad=>$dgr){
		if(isset($dgr)){
			
			

			if($dgr!==''){
				if(!empty($araSd)){
					$araSd.=$ayrc;
				}
				if(array_search($ad,$_xOR)===0){$araSd.='(';$ayrc=' OR ';}
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihKayit','tarihVade'))){
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihVade'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('aciklama','sartlar','tarihKayit','kodu','ismi','sampleName','personel_IDkayit','cari_ID','ad'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				//Sayısal Değer
				else if(in_array($ad,Array('pus','fayn'))){
					if($dgr[0]=='='){
						$dgr=str_replace('=','',$dgr);
						$araSd.=$ad." = '".$dgr."'";
					}
					else if($dgr[0]=='>'&&$dgr[1]=='='){
						$dgr=str_replace('>=','',$dgr);
						$araSd.=$ad." >= '".$dgr."'";
					}
					else if($dgr[0]=='<'&&$dgr[1]=='='){
						$dgr=str_replace('<=','',$dgr);
						$araSd.=$ad." <= '".$dgr."'";
					}
					else if($dgr[0]=='<'){
						$dgr=str_replace('<','',$dgr);
						$araSd.=$ad." < '".$dgr."'";
					}
					else if($dgr[0]=='>'){
						$dgr=str_replace('>','',$dgr);
						$araSd.=$ad." > '".$dgr."'";
					}
					else if($dgr[0]=='!'){
						$dgr=str_replace('!','',$dgr);
						$araSd.=$ad." <> '".$dgr."'";
					}
					else if($dgr[0]==' '){
						$araSd.=$ad." = '0'";
					}
					else{
						$araSd.=$ad." LIKE '%".z(36,$dgr)."%'";
					}
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
$iplikkartsorgu="";
if(!empty($iplikkarttopla)){
	$iplikkartsorgu=" AND (";
	foreach($iplikkarttopla as $elyftpl){
		$iplikkartsorgu.=' nesne_IDiplikkartTipi =  '.$elyftpl.' OR';
	}
	$iplikkartsorgu.='1234';
	$iplikkartsorgu=str_replace('OR1234',")",$iplikkartsorgu);
	$iplikoku=z(1,"WHERe arsiv='0'".$iplikkartsorgu,'','iplik');
	if(!empty($iplikoku)){
	$iplikkartsorgu=" AND (";
	foreach($iplikoku as $elyftpl){
		$iplikkartsorgu.=' iplikkartlari LIKE  \'%'.'"'.$elyftpl['ID'].'"'.'%\' OR';
	}
	$iplikkartsorgu.='1234';
	$iplikkartsorgu=str_replace('OR1234',") ",$iplikkartsorgu);
	}

}
$araSd=!empty($araSd)?" AND (".$araSd.")":'';
$arsvsd=strpos(z(8,'a'),'_arsv')!==false?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv='0'";
$tipSd=strpos(z(8,'a'),'_tip')!==false?" AND firmaTip='".substr(z(8,'a'),-1)."'":"";
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
$_X=z(1,"WHERE ".$arsvsd.$iplikkartsorgu.$tipSd.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);

$_Nesne=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
			
if(!empty($_X)){
	function dzn($tip,$ad){
		static $tix=array(),$i=0;
		$ilk=$i==0;
		if(empty($tix[$ad])){
			$i++;
			$tix[$ad]=$i;
		}
		$x=!empty($GLOBALS['x'])?$GLOBALS['x']:'';
		$_Nesnedzn=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));//!empty($GLOBALS['_Nesne'])?$GLOBALS['_Nesne']:'';
		if($GLOBALS['dznA']==false){
			switch ($tip) {
				case 'sayi':
					return !empty( $x[$ad] ) ? z('sayi',$x[$ad],2) : 0;
					break;
				case 'nesne':
					return (!empty($_Nesnedzn[$x['nesne_ID'.$ad]]['metin1'])?$_Nesnedzn[$x['nesne_ID'.$ad]]['metin1']:'&nbsp;');
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
					if(!empty($_Nesnedzn)){
						foreach ($_Nesnedzn as $nsn) {
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
	

	

	//$_Nesne=z(37,z(1,"WHERE ad='' OR ad='ddepartman'",'ID,ad,metin1,metin2','nesne'));
	//$_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
	//$_NesneTip=z(37,z(1,"WHERE ad='firmaTip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');

	//$_Firma=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'firma_ID'),'ID,ad','firma'));
	//$nesnemakineyetenegi=z(37,z(1,"WHERE ad='' OR ad='makineYetenegi'",'ID,ad,metin1,metin2','nesne'));
	
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');
//__($_X);
	$cariData=z(37,z(1,'WHERE arsiv=0','','cari'));
	$personelData=z(37,z(1,'WHERE arsiv=0','','personel'));
	$sampleArray=array();
//__($_X);
	//__($cariMusteri);
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			//__($x);
			// if($numuneTur[$x['numuneTur']]=='Aksesuar'){
			// 	$numuneKod=z(1,$x['numune_ID'],'renkKodu','a')
			// }
			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 

			$sName='';
			//__($sName);
			foreach (json_decode($x['sampleName']) as $key => $value) {
				if($sName==''){ $sName.='<div>'.$value.'<div>';}
				else { $sName.='<div>'.$value.'<div>'; }
			}
			array_push($sampleArray,['sampleName2'=>$sName]);
			echo '
			<tr class="allcheck tr'.($i%2?1:2).'" >
			
			

			<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td class="tdi">'.$i.'</td>

				<td colspan="1" style="text-align:left;">
					<b>'
					.($admn||$ytkDzn?
					'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty pl-4">'.bulunan('sampleName',$sName).'</a>'
					: bulunan('sampleName',$sName)
				).
				($admn||$ytkDzn?
				'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" ><i class="icon-pencil7 mr-3 icon-1x"></i></a>'
				: ''
				). '</td>

				<td>'.(!empty($x['cari_ID'])?$cariData[$x['cari_ID']]['ad']:'&nbsp;').' </td>
				<td>'.(!empty($x['personel_IDkayit'])?$personelData[$x['personel_IDkayit']]['ad']:'&nbsp;').' </td>
				<td>'.(!empty($x['tarih'])?$x['tarih']:'&nbsp;').' </td>
				
				';


				/*/
				 <td>'.(!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'&nbsp;').' </td>

				<td>'.duzenlenebilir('sayi','tel').'</td>
				if($ozel1){
					echo '<td>'.
						(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['cozguMamul'])?z(36,$_Hamkumasstok[$x['hamkumasstok_ID']]['cozguMamul'],0,1):'&nbsp;').
						(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['atkiMamul'])?' X '.z(36,$_Hamkumasstok[$x['hamkumasstok_ID']]['atkiMamul'],0,1):'&nbsp;').
					'</td>';
	 			}
				/*/



				/*/
				DÜZENLEME MODU
				
				<td>'.duzenlenebilir('sayi','ne').'</td>

				<td><a href="?s='.$tbl.'&a=detay&id='.$x['ID'].'" class="dty">'.bulunan('ID',$x['ID']).'</a></td>
				<td>'.(!empty($x['ad'])?bulunan('ad',$x['ad']):'&nbsp;').'</td>';
				/*/
                
                //if(!empty($_NSN))foreach($_NSN as $ad=>$n)echo '<td>'.duzenlenebilir('nesne',$ad).'</td>';

				/*/
				echo 
				'
				
				';
				/*/
				?>

			<td class="text-center">
				<div class="list-icons">
					<div class="dropdown">
						<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<?php if($admn||$ytkDty){ ?>
								<a href="?s=<?php echo $tbl; ?>&a=detay&id=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-stats"></i>Detay</a>
							<?php } ?>
							<?php if($admn||$ytkDzn){ ?>
								<a href="?s=<?php echo $tbl; ?>&a=duzenle&id=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-text2"></i>Düzenle</a>
							<?php } ?>
							<?php if($admn||ytk($tbl,'arsivle')){ ?>
								<?php if(empty($x['arsiv'])){ ?>
									<a href="?s=<?php echo $tbl; ?>&a=listele&ida1=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-locked"></i>Arşivle</a>
								<?php } else { ?>
									<a href="?s=<?php echo $tbl; ?>&a=listele_arsv<?php echo $x['arsiv']; ?>&ida0=<?php echo $x['ID']; ?>" class="dropdown-item"><i class="icon-file-locked"></i>Arşivden al</a>
								<?php } ?>
							<?php } ?>
							<?php if($admn||$ytkDty){ ?>
								<a href="?s=<?php echo $tbl; ?>&a=listele&idx=<?php echo $x['ID']; ?>" onClick="return confirm('Silmek istediğinizden emin misiniz?')" class="dropdown-item"><i class="icon-file-stats"></i>X</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</td>

			<?php 
			//if(($admn||ytk($tbl,'sil'))&&!$dznA)echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&idx='.$x['ID'].'" onClick="return confirm(\'Silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';

			
		}
	}
	else{
		$phpExcelCols=array('A1'=>'NO','B1'=>'FİRMA ADI','C1'=>'ONAYLI FİRMA','D1'=>'EKLENME TARİHİ','E1'=>'İLGİLİ','F1'=>'ÜNVANI','G1'=>'TEL','H1'=>'FAX','I1'=>'E-POSTA','J1'=>'VERGİ DAİRESİ','K1'=>'VERGİ NO','L1'=>'FATURA ADRESİ','M1'=>'SEVK ADRESİ');
		$basH='A'; $sonH='M';
		$phpExcelStyle=$basH.'1:'.$sonH.'1';
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
										  ->setCellValue('B'.($i+1),$x['ad'])
										  ->setCellValue('C'.($i+1),!empty($x['onayli'])?'Evet':'Hayır')
										  ->setCellValue('D'.($i+1),z('tarihsaat',$x['tarih']))
										  ->setCellValue('E'.($i+1),$x['ilgili'])
										  ->setCellValue('F'.($i+1),$x['unvani'])
										  ->setCellValue('G'.($i+1),$x['tel'])
										  ->setCellValue('H'.($i+1),$x['fax'])
										  ->setCellValue('I'.($i+1),$x['eposta'])
										  ->setCellValue('J'.($i+1),$x['vergiD'])
										  ->setCellValue('K'.($i+1),$x['vergiNo'])
										  ->setCellValue('L'.($i+1),$x['adresFatura'])
										  ->setCellValue('M'.($i+1),$x['adresSevk']);
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+1))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
	//__($sampleArray);

}
else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+20?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>