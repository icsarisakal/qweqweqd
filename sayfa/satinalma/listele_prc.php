
<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
$elyaftopla=array();

if(!empty($_G)){
	z(11,'ara'.$syf,$_G);
	$araSd='';$ayrc=' AND ';
	$_xOR=Array('komisyoncu_ID1','komisyoncu_ID2');
	$elyafnesne=(!empty($_G['nesne_IDelyafTipi'])?array_filter($_G['nesne_IDelyafTipi']):'');
			unset($_G['nesne_IDelyafTipi']);
			if(!empty($elyafnesne)){
				foreach($elyafnesne as $elyfn){
					if(!in_array($elyfn,$elyaftopla)){
					$elyaftopla[]=$elyfn;
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
				else if(in_array($ad,Array('ad','aciklama','sartlar','tarihKayit','tipi'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				//Sayısal Değer
				else if(in_array($ad,Array('adet','fiyat'))){
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
$elyafsorgu="";
if(!empty($elyaftopla)){
	$elyafsorgu=" AND (";
	foreach($elyaftopla as $elyftpl){
		$elyafsorgu.=' elyaf LIKE  \'%'.'"'.$elyftpl.'"'.'%\' OR';
	}
	$elyafsorgu.='1234';
	$elyafsorgu=str_replace('OR1234',")",$elyafsorgu);
}
$ktsorgu=" AND kategori_ID = '0' ";
if(!empty(z(8,'kategori'))){
	$kategori_ID=z(8,'kategori');
	$ktsorgu=" AND kategori_ID = '".$kategori_ID."'";
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
$_X=z(1,"WHERE ".$arsvsd.$elyafsorgu.$ktsorgu.$tipSd.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='aksesuargruplari' OR ad='doviz' OR ad='birimTipi' OR ad='boyaBaskiHizmetleri'",'ID,ad,metin1,metin2','nesne'));
$kumaskartidata = z(37,z(1,'WHERE arsiv=0 AND revize_ID=0','ID,kodu','kumaskarti'));
$_X=z(1,'WHERE arsiv=0','',$tbl);
if(!empty($_X)){
	function dzn($tip,$ad){
		static $tix=array(),$i=0;
		$ilk=$i==0;
		if(empty($tix[$ad])){
			$i++;
			$tix[$ad]=$i;
		}
		$x=!empty($GLOBALS['x'])?$GLOBALS['x']:'';
		$_Nesnedzn=z(37,z(1,"WHERE ad='' OR ad='doviz' OR ad='birimTipi'",'ID,ad,metin1,metin2','nesne'));//!empty($GLOBALS['_Nesne'])?$GLOBALS['_Nesne']:'';
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
	
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');
	
	
	if(empty($phpExcelA)){
		//__($_X);
		foreach($_X as $i=>$x){$i++;$h = -1;$h++;
			
			

	
			// $doviz=(!empty($_Nesne[$x['nesne_IDdoviz']]['metin1'])?$_Nesne[$x['nesne_IDdoviz']]['metin1']:'&nbsp;');
			// $tipi=(!empty($x['tipi'])?$x['tipi']:'&nbsp;');
			// $birimTipi=(!empty($_Nesne[$x['nesne_IDbirimTipi']]['metin1'])?$_Nesne[$x['nesne_IDbirimTipi']]['metin1']:'&nbsp;');
			// $baskiTipi=(!empty($_Nesne[$x['nesne_IDboyaBaskiHizmetleri']]['metin1'])?$_Nesne[$x['nesne_IDboyaBaskiHizmetleri']]['metin1']:'&nbsp;');
				$siparisTip=(!empty($x['nesne_IDsatinalmaTip'])?z(1,'WHERE ID='.$x['nesne_IDsatinalmaTip'].'','metin1','nesne'):null);
				$cari_ID=(!empty($x['cari_ID'])?z(1,$x['cari_ID'],'ad','cari'):null);
				$depo=(!empty($x['nesne_IDdepo'])?z(1,$x['nesne_IDdepo'],'metin1','nesne'):null);
				// $birim=(!empty($x['nesne_IDbirimTipi'])?z(1,$x['nesne_IDbirimTipi'],'metin1','nesne'):null);
				// $doviz=(!empty($x['nesne_IDdoviz'])?z(1,$x['nesne_IDdoviz'],'metin1','nesne'):null);
				$fisNo=!empty($x['fisNo'])?$x['fisNo']:''; 
				  
				$malzemeKodu = !empty($x['malzemeKodu'])?json_decode($x['malzemeKodu']):'-';
				$malzemeAd = !empty($x['malzemeAd'])?json_decode($x['malzemeAd']):'-';
				
				
				  // Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 
			echo '
			<tr class="allcheck tr'.($i%2?1:2).'" >
			


				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td class="tdi">'.$i.'</td>


				'./*<td><img src="img/drm'.$_Drm[$x['onayli']][0].'.png" title="'.$_Drm[$x['onayli']][1].'" height="20" /></td>*/
				
				//' <td colspan="1" style="text-align:left;">
				 //	<b>'
				// 	.($admn||$ytkDzn?
				// 	'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty pl-4">'.bulunan('ID',$tipi).'</a>'
				// 	: bulunan('ID',$tipi)
				// ).
				// ($admn||$ytkDzn?
				// '&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" ><i class="icon-pencil7 mr-3 icon-1x"></i></a>'
				// : ''
				// ). '</td>'.

					// Detay adı görüntüleme
				/*($admn||$ytkDzn?
						'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.bulunan('ID',$tipi).'</a>'
						: bulunan('ID',$tipi) 
					).
					($admn||$ytkDzn?
					'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" class="dzn"></a>'
					: ''
					).*/
					
					
					/*/
					($x['ID']!=''&&z(8,'kategori')==''?
						'&nbsp;<a href="?s='.$tbl.'&a=listele&kategori='.$x['ID'].'" class="iliskilimodulicon"></a>'
						: ''
					).
					($admn||$ytkDty?
						'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.bulunan('ad',$x['ad']).'</a>'
						: bulunan('ad',$x['ad']) 
					).
					($admn||$ytkDzn?
						'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" class="dzn"></a>'
						: ''
					).
					/*/
					
					'
				<td> <span class="link"><a href="?s='.$syf.'&a=detay&id='.$x['ID'].'">'.$fisNo.'</a></span> <span class="link"><a href="?s='.$syf.'&a=duzenle&id='.$x['ID'].'"><i class="icon-pencil7 mr-3 icon-1x"></i></a></span></td>
			  <td>'.(!empty($siparisTip[0])?$siparisTip[0]:'').' </td> 
			  <td>'.(!empty($x['belgeNo'])?$x['belgeNo']:'').' </td> 
			  <td>'.(!empty($cari_ID)?$cari_ID:'').' </td> 
			  <td>'.(!empty($depo)?$depo:'').' </td><td>';

			  foreach ($malzemeAd as $key => $adets) { 
				if($x['nesne_IDsatinalmaTip']=='264'||$x['nesne_IDsatinalmaTip']=='266'){
					if($malzemeKodu[$key]!=0){
					$malzemeKodlari[$key] = $_Nesne[$malzemeKodu[$key]]['metin1'];
				}else{$malzemeKodlari[$key]='--';}
				}
				elseif($x['nesne_IDsatinalmaTip']=='265'){
					if($malzemeKodu[$key]!=0){
					$malzemeKodlari[$key] = $kumaskartidata[$malzemeKodu[$key]]['kodu'];
					}else{$malzemeKodlari[$key]='--';}
				}
				
				 $malzemeAdi = !empty($malzemeAd[$key])?$malzemeAd[$key]: '<b> -- </b> ';				
				echo '<b>Malzeme Kodu : </b>'.$malzemeKodlari[$key].'<br><b>Malzeme Adı : </b>'.$malzemeAdi.'<br><br>';
			}
				echo '</td><td>'.(!empty($x['tarihFis'])?$x['tarihFis']:'').' </td>
				<td>'.(!empty($x['tarih'])?$x['tarih']:'').' </td>';


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
			/*if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}*/
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


}
else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+20?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>