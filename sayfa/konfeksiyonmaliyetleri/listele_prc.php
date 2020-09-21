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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihKayit','tarihVade','tarihTalep','tarihOkey'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ad','aciklama','renkKodu','cari_ID','sartlar','kodu','ismi','gtip'))){
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

//echo "WHERE ".$arsvsd.$tipSd.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit;
$_X=z(1,"WHERE ".$arsvsd.$tipSd.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){

	

	$_Nesne=z(37,z(1,"WHERE ad='' OR ad='urunkategorileri' OR ad='urunebatlari'",'ID,ad,metin1,metin2','nesne'));
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');

	$_Toplam=array(
		'adet'=>0
	);

	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;

			$_Toplam['adet'] += !empty($x['adet'])?$x['adet']:0;
			
            $ebatarray=(!empty($x['nesne_IDurunebatlari'])?json_decode($x['nesne_IDurunebatlari'],1):'-');    
			$fiyatarray=(!empty($x['fiyat'])?json_decode($x['fiyat'],1):'-');    
			$gtiparray=(!empty($x['gtip'])?json_decode($x['gtip'],1):'-');   
			$urunkategorileri=(!empty($_Nesne[$x['nesne_IDurunkategorileri']]['metin1'])?$_Nesne[$x['nesne_IDurunkategorileri']]['metin1']:'&nbsp;');
			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 
			echo '
			<tr class="allcheck tr'.($i%2?1:2).'" >
			


				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td class="tdi">'.$i.'</td>
				
				<td class="bunaozel">
					'.

					// Detay adı görüntüleme
					($admn||$ytkDty?
						'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty pl-4">'.bulunan('ID',$urunkategorileri).'</a>'
						: bulunan('ID',$urunkategorileri) 
					).
					($admn||$ytkDzn?
						'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'"><i class="icon-pencil7 mr-3 icon-1x"></i></a>'
						: ''
					).
					'
				</td>'
			  
			  	.'<td>'.(!empty($x['gtip'])?z('metin',bulunan('gtip',$x['gtip'])):'Belirtilmemiş').' </td> <td>';
                foreach ($ebatarray as $key => $ebats) { 
					$ebat = !empty($_Nesne[$ebats]['metin1'])?$_Nesne[$ebats]['metin1']:'<b> -- </b>'; 
					$fiyat = !empty($fiyatarray[$key])?$fiyatarray[$key]: '<b> -- </b>';
					$gtip = !empty($gtiparray[$key])?$gtiparray[$key]: '<b> -- </b> ';
					echo '<b>Ebat : </b>'.$ebat.'<br><b>Fiyat : </b>'.$fiyat.'<br><br>';
				}

				echo '</td>';

				echo '<td>'.(!empty($x['tarihKayit'])?z('metin',bulunan('tarihKayit',z('datetime',$x['tarihKayit']))):'').' </td>'; 

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

		/*	if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}
			if(($admn||ytk($tbl,'sil'))&&!$dznA)echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&idx='.$x['ID'].'" onClick="return confirm(\'Silmek istediğinizden emin misiniz?\');">x</a></td>';*/
			
			echo '</tr>';
			

			
		}
		
			
			echo '
		</tr>'; 

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