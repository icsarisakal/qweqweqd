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

//__($personelcek);


if(!empty($_Favori)){
	



	
	//__($arry);
	

	foreach ($_Favori as $key => $value) {
		
			//echo('-'.$value['ID']);
			if($admn||ytk($value['get2'],$value['getA'])) { 
				echo '<tr '.ayarbutongizle($value['ID']).' >
						<td class="favsatir" id="txt" colspan="1">'.$value['ad'].'</td>
						<td onclick="favtikla(this)" style="padding:1px !important;" colspan="2"><input class="fav form-control" id="'.$value['ID'].'" value="'.$value['url'].'" name="'.$value['ad'].'"  type="checkbox" '.check($value['ID']).' ></td>
					<tr>';
			}


	}

	
	

}	


function ayarbutongizle($input){

	if($input==-1){return 'hidden="true"';}


}


function check($input){
	
$mymenuListe=z(1,'WHERE personel_ID='.z('lgn','ID'),'mymenuListe','mymenu');


$arry=explode(',',$mymenuListe[0]);


	
	foreach ($arry as $key => $value) {
			
		//echo 'value '.$value;
		//echo ' input '.$input.'<br>';
		
		if($input==$value){return 'checked';}

	}


}




// if(!empty($_X)){
	
	
	

	
// 	if(empty($phpExcelA)){
// 		foreach($_X as $i=>$x){$i++;
			

// 			echo '<tr><th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th><td class="tdi">'.$i.'</td>';
// 			echo '
// 				<td>'.($admn||ytk($tbl,'duzenle')?'<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'">'.blnn('ad',$x['ad']).'</a>':blnn('ad',$x['ad'])).'</td>
// 				<td>'.$tarih.'</td>
// 				<td>'.$tarihgiris.'</td>
// 				<td>'.blnn('eposta',$x['eposta']).'</td>
// 				<td>'.blnn('tel',$x['tel']).'</td>';
// 			if(!empty($_NSN))foreach($_NSN as $ad=>$n){
// 				echo '<td>';
// 				foreach($n['alan2'] as $fei=>$fed)echo !empty($_Z[$x['nesne_ID'.$ad]][$fei])?$_Z[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';
// 				echo '</td>';
// 			} ?>



		<?php echo '</tr>';
// 		}
// 	}
// 	else{
// 		$phpExcelCols=array('A1'=>'NO','B1'=>'PERSONEL İSMİ','C1'=>'İLGİLİ DEPARTMANLAR','D1'=>'KAYIT TARİHİ','E1'=>'SON GİRİŞ TARİHİ','F1'=>'E-POSTA','G1'=>'TEL');
// 		$basH='A'; $sonH='G';
// 		$phpExcelStyle=$basH.'1:'.$sonH.'1';
// 		foreach($phpExcelCols as $fei=>$fed)
//         $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
// 		foreach($_X as $i=>$x){$i++;
// 			$departmanlar='';
// 			if(!empty($x['departmanlar']))foreach(explode(',',$x['departmanlar']) as $fe){
// 				if(!empty($_Z[$fe]['metin1'])){
// 					if(!empty($departmanlar))$departmanlar.=', ';
// 					$departmanlar.=$_Z[$fe]['metin1'];
// 				}
// 			}
// 			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
// 										  ->setCellValue('B'.($i+1),$x['ad'])
// 										  ->setCellValue('C'.($i+1),(!empty($departmanlar)?$departmanlar:''))
// 										  ->setCellValue('D'.($i+1),z('tarihsaat',$x['tarih']))
// 										  ->setCellValue('E'.($i+1),z('tarihsaat',$x['tarihGiris']))
// 										  ->setCellValue('F'.($i+1),$x['eposta'])
// 										  ->setCellValue('G'.($i+1),$x['tel']);
										  
// 			for($k=$basH;$k<=$sonH;$k++)
// 			$objPHPExcel->getActiveSheet()->getStyle($k.($i+1))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
// 		}
// 		if(z(8,'tip')=='xls')for($k=$basH;$k<=$sonH;$k++)
// 		$objPHPExcel->getActiveSheet()->getColumnDimension($k)->setAutoSize(true);
// 	}
// }else{?>
 <!-- <tr><td colspan="<?Php //echo (!empty($_NSN)?count($_NSN):0)+8?>">Kayıt bulunamadı.</td></tr> -->
 <?Php //$phpExcelA=false;}
?>