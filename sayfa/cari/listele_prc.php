<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
///ssss
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
				
				if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihKayit','tarihDogum'))){
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihKayit','tarihVade','tarihDogum'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ad','soyad','telCep1','telCep2','telSabit','telFax','eposta','adres','aciklama','artanSayi'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				//Sayısal Değer
				else if(in_array($ad,Array('adet','gramaj','cekmeEn'))){
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

$musteritipi='';
$musteriget=z(8,'musteri');
if(!empty($musteriget)){
	$musteritipi=" AND nesne_IDmusteriTipi='".$musteriget."' ";
}

$nesnemarka=z(37,z(1,"WHERE ad='' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne'));
$_X=z(1,"WHERE ".$arsvsd.$araSd.$musteritipi." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){

	

	$_Nesne=z(37,z(1,"WHERE ad='tedarikciTipi' OR ad='cariTipi'",'ID,ad,metin1,metin2','nesne'));
	//$_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
	//$_NesneTip=z(37,z(1,"WHERE ad='tip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');

	$_Firma=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'firma_ID'),'ID,ad','firma'));
	
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');


	// Altta ve üstte beliren toplam satırı için dizi tanımlama
	$_Toplam=array(
		'gramaj'=>0
	);


	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			
			// Toplanacak değerleri toplam değişkenine ekle
			$_Toplam['gramaj'] += !empty($x['gramaj'])?$x['gramaj']:0;

			$markalar=array();
			$markalarmetin='';
			$markasayi='';
            if(!empty($x['markalar'])){
				$markalar=(!empty($x['markalar'])?json_decode($x['markalar'],1):'');
				$markasayi=count($markalar);
			}
			
			if(!empty($nesnemarka)){
				foreach ($nesnemarka as $nm => $nmarka) { 
					if(!empty($nmarka['ID'])&&in_array($nmarka['ID'],$markalar)){
						$markalarmetin.=(!empty($nmarka['metin1'])?$nmarka['metin1']:'');
						$markalarmetin.=(!empty($nmarka['metin1'])&&$nm!=$markasayi?'<br>':'');
					}
			 	}
			} 


			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 
			echo '
			<tr class="allcheck tr'.($i%2?1:2).' durum_'.$x['durum'].'" >
			


				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td class="tdi">'.$i.'</td>


				'./*<td><img src="img/drm'.$_Drm[$x['onayli']][0].'.png" title="'.$_Drm[$x['onayli']][1].'" height="20" /></td>*/'
				
				<td colspan="1" style="text-align:left;">
					<b>'
					.($admn||$ytkDzn?
					'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty pl-4">'.bulunan('ad',$x['ad']).'</a>'
					: bulunan('ad',$x['ad'])
				).
				($admn||$ytkDzn?
				'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" ><i class="icon-pencil7 mr-3 icon-1x"></i></a>'
				: ''
				).'

				<td>'.
					(!empty($_Nesne[$x['nesne_IDcariTipi']]['metin1'])?$_Nesne[$x['nesne_IDcariTipi']]['metin1']:'Belirtilmemiş').
				'</td>
				<td>'.
					(!empty($_Nesne[$x['nesne_IDtedarikciTipi']]['metin1'])?$_Nesne[$x['nesne_IDtedarikciTipi']]['metin1']:'Belirtilmemiş').
				'</td>
				<td>'.$markalarmetin.'</td>
				<td>'.(!empty($x['telCep1'])?bulunan('telCep1',$x['telCep1']):'&nbsp;').'</td>
				<td>'.(!empty($x['eposta'])?bulunan('eposta',$x['eposta']):'&nbsp;').'</td>
				
				
				<td>'.(!empty($x['telCep2'])?bulunan('telCep2',$x['telCep2']):'&nbsp;').'</td>
				<td>'.(!empty($x['telFax'])?bulunan('telFax',$x['telFax']):'&nbsp;').'</td>
				<td>'.(!empty($x['adres'])?z('metin',bulunan('adres',$x['adres'])):'&nbsp;').'</td>				
				<td>'.(!empty($x['aciklama'])?z('metin',bulunan('aciklama',$x['aciklama'])):'&nbsp;').'</td>				

				'./*/'
				<td>'.
					(!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'&nbsp;').
					(!empty($_Firma[$x['firma_ID']]['ilgili'])?' / '.$_Firma[$x['firma_ID']]['ilgili']:'&nbsp;').
				'</td>


				<td>'.
					(!empty($_Nesne[$x['nesne_IDddepartman']]['metin1'])?$_Nesne[$x['nesne_IDddepartman']]['metin1']:'&nbsp;').
				'</td>


				<td>'.
					(!empty($_NesneDurum[$x['durum']]['metin2'])?$_NesneDurum[$x['durum']]['metin2']:'&nbsp;').
				'</td>


				<td>'.
					(!empty($_NesneTip[$x['tip']]['metin1'])?$_NesneTip[$x['tip']]['metin1']:'&nbsp;').
				'</td>





				<td>'.(!empty($x['tarih'])?z('tarih',$x['tarih']):'&nbsp;').'</td>
				<td>'.(!empty($x['adet'])?bulunan('adet',z(36,$x['adet'],2)):'0').'</td>
				<td>'.(!empty($x['gramaj'])?bulunan('gramaj',z(36,$x['gramaj'],2)):'0').'</td>
				<td>'.(!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'&nbsp;').'</td>

				<td>'.duzenlenebilir('numuneAdi','numuneAdi').'</td>
				

				<td>'.duzenlenebilir('tablo','ad','firma').'</td>

				
				<td>'.duzenlenebilir('nesne','bOzellik').'</td>
				
				<td>'.(!empty($x['mamulEn'])?bulunan('mamulEn',z(36,$x['mamulEn'],2)):'&nbsp;').'</td>
				<td>'.(!empty($x['cekmeBoy'])?bulunan('cekmeBoy',z(36,$x['cekmeBoy'],2)):'&nbsp;').'</td>
				<td>'.(!empty($x['cekmeEn'])?bulunan('cekmeEn',z(36,$x['cekmeEn'],2)):'&nbsp;').'</td>

				<td>'.(!empty($x['tarih'])?z('tarih',$x['tarih']):'&nbsp;').'</td>
				'./*/'

				';


				/*/
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

		/*/
		
		// Üstte ve altta beliren toplam satırı
		echo '
		<tr id="toplamTutarTr" class="toptr">
		
			<th>&nbsp;</th>
			<td colspan="7"><b>Toplam Satır Adeti: '.($i).'</b></td>
			<td>&nbsp;</td>
			<td class="toptd"><b>Toplam: '.(!empty($_Toplam['gramaj'])?z(36,$_Toplam['gramaj'],2,1):'0').' gram</b></td>
			<td colspan="3">&nbsp;</td>';
			if($admn||ytk($syf,'arsivle'))echo '<td class="printx">&nbsp;</td>';
			if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
		
		echo '
		</tr>';

		/*/
			
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
