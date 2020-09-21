<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
if(!empty($_G)){
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
				else if(in_array($ad,Array('tarih','tarihSiparis','ID','AfirmaAd','Vunvani'))){
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
	$llimit=!empty($_LA['adet'])?' LIMIT '.$_LA['adet']:(!isset($_LA['adet'])?' LIMIT 30':'');
}
else $llimit='';

$_X=z(1,"WHERE ".$arsvsd.$araSd." AND tip='".$tip."' ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){
	function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Y=z(1,NULL,'ID,ad,soyad','personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	$_Y=z(1,NULL,'ID,ad','firma');if(!empty($_Y))foreach($_Y as $y)$_Firma[$y['ID']]=$y;
	
	$_Drm=array(
		array('','Limit yetersizliği sebebiyle otomatik onaylanamadı, onay bekliyor.'),
		array(1,'Sipariş formu onaylanmış.'),
		array(0,'Sipariş formu reddedilmiş.')
	);
	$_TopTutar=array();
	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			$urunAdet=0;$departman='';
			$_Tutar=array();
			$_Y=z(1,"WHERE sepet_ID='".$x['ID']."'",'ID,nesne_IDddepartman,tutar,pb,kdvA,kdv',$tbl.'urun');if(!empty($_Y))foreach($_Y as $y){
				
				$ttr=!empty($y['kdvA'])?$y['tutar']:$y['tutar']*($y['kdv']/100+1);
				if(!empty($_Tutar[$y['pb']]))$_Tutar[$y['pb']]+=$ttr;else $_Tutar[$y['pb']]=$ttr;
				if(!empty($_TopTutar[$y['pb']]))$_TopTutar[$y['pb']]+=$ttr;else $_TopTutar[$y['pb']]=$ttr;
				
				$urunAdet++;
				$dprtmnx=!empty($_Z[$y['nesne_IDddepartman']]['metin1'])?$_Z[$y['nesne_IDddepartman']]['metin1']:'';
				$dprtmnx='<a href="?s='.$syf.'&a=listeleUrun&aramarketurun[nesne_IDddepartman]='.$y['nesne_IDddepartman'].'&la[adet]=0">'.$dprtmnx.'</a>';
				if(!empty($departman)){
					if(strpos($departman,$dprtmnx)===false){
					$departman.=', ';
					$departman.=$dprtmnx;
					}
				}
				else $departman.=$dprtmnx;
			}
			$tutar='';
			foreach($_Tutar as $fei=>$fed){
				if(!empty($tutar))$tutar.=' - ';
				$tutar.=$PB[$fei].sayi($fed,2);
			}
				
			
			$onaylayan=(!empty($x['durum'])?(!empty($_Personel[$x['personel_IDonay']]['ad'])?'('.$_Personel[$x['personel_IDonay']]['ad'].' tarafından)':'(Sistem tarafından)'):'');
			
			echo '<tr '.($i%2==0?'class="tr2"':'').'><th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td>'.$i.'</td>';
			echo '
				<td><img src="img/drm'.$_Drm[$x['durum']][0].'.png" title="'.$_Drm[$x['durum']][1].' '.$onaylayan.'" height="20" /></td>
				<td>'.(!empty($_Personel[$x['personel_ID']]['ad'])?($admn||ytk('personel','duzenle')?'<a href="?s=personel&a=duzenle&id='.$x['personel_ID'].'">'.$_Personel[$x['personel_ID']]['ad'].'</a>':$_Personel[$x['personel_ID']]['ad']):'').'</td>
				<td><a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.z('tarihsaat',$x['tarih']).'</a></td>
				<td>'.z('tarih',$x['tarihSiparis']).'</td>
				<td>'.blnn('ID',$x['ID']).'</td>'.
				//<td>'.(!empty($_Firma[$x['firma_IDalici']]['ad'])?($admn||ytk('firma','duzenle')?'<a href="?s=firma&a=duzenle&id='.$x['firma_IDalici'].'">'.$_Firma[$x['firma_IDalici']]['ad'].'</a>':$_Firma[$x['firma_IDalici']]['ad']):'').'</td>
				//<td>'.(!empty($_Firma[$x['firma_IDsatici']]['ad'])?($admn||ytk('firma','duzenle')?'<a href="?s=firma&a=duzenle&id='.$x['firma_IDsatici'].'">'.$_Firma[$x['firma_IDsatici']]['ad'].'</a>':$_Firma[$x['firma_IDsatici']]['ad']):'').'</td>
				//<td>'.blnn('AfirmaAd',$x['AfirmaAd']).'</td>
				//<td>'.blnn('Vunvani',$x['Vunvani']).'</td>
				'<td>'.(!empty($departman)?$departman:'&nbsp;').'</td>
				<td>'.$urunAdet.'</td>
				<td>'.$tutar.'</td>
				<td>'.(!empty($_Z[$x['nesne_IDodemeTip']]['metin1'])?$_Z[$x['nesne_IDodemeTip']]['metin1']:'&nbsp;').'</td>';
			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
				echo '<td>';
				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
				echo '</td>';
			}
			if($admn||ytk($syf,'arsiv'))
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$syf.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$syf.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			if($admn||ytk($syf,'sil'))echo '<td class="printx"><a href="?s='.$syf.'&a='.z(9,'a','listele').'&idx='.$x['ID'].'" onClick="return confirm(\'Siparişi silmek istediğinizden emin misiniz?\');">x</a></td>';
			echo '</tr>';
			
		}
		$topTutar='';
		foreach($_TopTutar as $fei=>$fed){
			if(!empty($topTutar))$topTutar.=' - ';
			$topTutar.=$PB[$fei].sayi($fed,2);
		}
		echo '<tr><td class="printx">&nbsp;</td><td colspan="9" style="text-align:right" id="toplamTutarTd"><strong>TOPLAM TUTARLAR&nbsp;&nbsp;:&nbsp;&nbsp;'.$topTutar.'</strong>&nbsp;</td><td>';
		if($admn||ytk($syf,'arsiv'))echo '<td class="printx">&nbsp;</td>';
		if($admn||ytk($syf,'sil'))echo '<td class="printx">&nbsp;</td>';
		echo '</tr>';
	}
	else{
		$phpExcelCols=array('A1'=>'NO','B1'=>'DURUM','C1'=>'DÜZENLEYEN','D1'=>'DÜZENLEME TARİHİ','E1'=>'SİPARİŞ TARİHİ','F1'=>'SİPARİŞ NO','G1'=>'DEPARTMAN','H1'=>'ÜRÜN ADET','I1'=>'TUTAR','J1'=>'ÖDEME TİPİ');
		$basH='A'; $sonH='J';
		$phpExcelStyle=$basH.'1:'.$sonH.'1';
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			$urunAdet=0;$departman='';
			$_Tutar=array();
			$_Y=z(1,"WHERE sepet_ID='".$x['ID']."'",'ID,nesne_IDddepartman,tutar,pb,kdvA,kdv',$tbl.'urun');if(!empty($_Y))foreach($_Y as $y){
				
				$ttr=!empty($y['kdvA'])?$y['tutar']:$y['tutar']*($y['kdv']/100+1);
				if(!empty($_Tutar[$y['pb']]))$_Tutar[$y['pb']]+=$ttr;else $_Tutar[$y['pb']]=$ttr;
				if(!empty($_TopTutar[$y['pb']]))$_TopTutar[$y['pb']]+=$ttr;else $_TopTutar[$y['pb']]=$ttr;
				
				$urunAdet++;
				$dprtmnx=!empty($_Z[$y['nesne_IDddepartman']]['metin1'])?$_Z[$y['nesne_IDddepartman']]['metin1']:'';
				if(!empty($departman)){
					if(strpos($departman,$dprtmnx)===false){
					$departman.=', ';
					$departman.=$dprtmnx;
					}
				}
				else $departman.=$dprtmnx;
			}
			$tutar='';
			foreach($_Tutar as $fei=>$fed){
				if(!empty($tutar))$tutar.=' - ';
				$tutar.=sayi($fed,2).' '.$fei;
			}
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
										  ->setCellValue('B'.($i+1),!empty($x['durum'])?str_replace(array('1','2'),array('Onaylı','İptal'),$x['durum']):'Bekleyen')
										  ->setCellValue('C'.($i+1),!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'')
										  ->setCellValue('D'.($i+1),z('tarihsaat',$x['tarih']))
										  ->setCellValue('E'.($i+1),z('tarih',$x['tarihSiparis']))
										  ->setCellValue('F'.($i+1),$x['ID'])
										  ->setCellValue('G'.($i+1),!empty($departman)?$departman:'')
										  ->setCellValue('H'.($i+1),$urunAdet)
										  ->setCellValue('I'.($i+1),$tutar)
										  ->setCellValue('J'.($i+1),!empty($_Z[$x['nesne_IDodemeTip']]['metin1'])?$_Z[$x['nesne_IDodemeTip']]['metin1']:'');
										  
										  
			for($k=$basH;$k<=$sonH;$k++)
			$objPHPExcel->getActiveSheet()->getStyle($k.($i+1))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
		}
		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+13?>">Kayıt bulunamadı.</td></tr>
<?Php $phpExcelA=false;}
?>