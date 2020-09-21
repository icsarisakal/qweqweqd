<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
$iplikkarttopla=array();
$raporsorgusu='';

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
	$raporid=(!empty($_G['rapor_ID'])?array_filter($_G['rapor_ID']):'');
	if(!empty($raporid)){
		$raporsorgusu=" AND (";
		foreach ($raporid as $rsrg => $rapsrg) {
			$raporcek=z(1,$rapsrg,'ID,modul_ID','rapor');
			$rapormodulid=$raporcek['modul_ID'];
			$raporsorgusu.=" ID='".$rapormodulid."' OR ";
		}
		$raporsorgusu.='12345';
		$raporsorgusu=str_replace("OR 12345","",$raporsorgusu);
		$raporsorgusu.=")";
	}
	unset($_G['rapor_ID']);

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
				else if(in_array($ad,Array('ad','aciklama','sartlar','tarihKayit','kodu','ismi'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				//Sayısal Değer
				else if(in_array($ad,Array('adet','fiyat','fiyatlar'))){
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
$revizesorgu=" AND revize_ID='0' ";
$_X=z(1,"WHERE ".$arsvsd.$iplikkartsorgu.$revizesorgu.$raporsorgusu.$tipSd.$araSd." ORDER BY SUBSTRING(kodu,5) ".$llimit,NULL,$tbl);



$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='kumasTipi'",'ID,ad,metin1,metin2','nesne'));
if(!empty($_X)){

	$_X=z(37, $_X);
	$veriarray=array();
	if(!empty($_X)){
		foreach ($_X as $key => $veri) {
			if(!empty($veri['kodu'])){
				$veriarray[]=$veri['kodu'].'*_-_*'.$veri["ID"];
			}
		}
	}

	usort($veriarray, "strnatcmp");

	$veriarray2=array();
	foreach ($veriarray as $key2 => $veri2) {
		$explode=explode('*_-_*', $veri2);
		$veri1=$explode[0];
		$veri2=$explode[1];
		$veriarray2[$veri2]=$veri1;
	}
	

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
	
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');
	$ytkFyt=ytk($tbl,'ozel2');
?>
<?php

	if(empty($phpExcelA)){
		$ysayi=0;
		foreach($veriarray2 as $key3=>$veri3){
			$x=$_X[$key3];
			echo $x[0];
			$kumastipiduzenle='duzenle';
			if($x['nesne_IDkumasTipi']=='176'){
				$kumastipiduzenle='duzenletedarik';
			}
			if($x['nesne_IDkumasTipi']=='180'){
				$kumastipiduzenle='duzenlekombinasyon';
			}
			$sayimiz=$ysayi+1;
			$ysayi++;
			$iplikkart=(!empty($_Nesne[$x['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$x['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
			$doviz=(!empty($_Nesne[$x['nesne_IDdoviz']]['metin1'])?$_Nesne[$x['nesne_IDdoviz']]['metin1']:'&nbsp;');
			$kumastipi=(!empty($_Nesne[$x['nesne_IDkumasTipi']]['metin1'])?$_Nesne[$x['nesne_IDkumasTipi']]['metin1']:'&nbsp;');
			$dovizsayi=(!empty($x['nesne_IDdoviz'])?$x['nesne_IDdoviz']:'&nbsp;');
			$_MakinaCesitleri=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'makinacesitleri_ID'),'ID,ad','makinacesitleri'));
			$_Kumasturu=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'kumasturu_ID'),'ID,ad','kumasturu'));
			$iplikkartlarimetin="";
			$iplikkartlarimetin2="";
			$srg="WHERE arsiv='0' AND modul='".$tbl."' AND modul_ID='".$x['ID']."' ORDER BY ID DESC";
			$rapor=z(1,$srg,'','rapor');
			$rapor=$rapor[0];
			$raporadi=($rapor['ID']&&$x['kodu']?$x['kodu'].'-'.$rapor['ID']:'');
			$raporid=$rapor['ID'];
			$kompozisyonarray=array();
			if(!empty($x['iplikkartlari'])){
				$iplikkartlaricek=$x['iplikkartlari'];
				$iplikkartlariarray=(!empty($x['iplikkartlari'])?json_decode($x['iplikkartlari'],1):'');
				if(!empty($iplikkartlariarray)){
					$iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
				}
				if(!empty($iplikkartlariarray)){
					foreach($iplikkartlariarray as $i => $elyf){
						$iplikokuma=z(1,$i,'','iplik');
						$iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
						$uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
    					$boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
						$elyafTipi=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
						$iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
						$elyafmetin="";
						if(!empty($iplikokuma['elyaf'])){
							$elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
							if(!empty($elyafarray)){
								$elyafarray=str_replace('puan','',$elyafarray);
							}
							if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
								$elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
								$elyfbhesapla=($elyfb/100)*$elyf;
								$elyfbhesapla=number_format($elyfbhesapla);
								$elyafmetin.='%'.$elyfbhesapla.' '.$elyafnesne.' ';
								if(!empty($kompozisyonarray[$elyafnesne])){
									$eskihesaplama=$kompozisyonarray[$elyafnesne];
									$yenihesaplama=($eskihesaplama+$elyfbhesapla);
									$kompozisyonarray[$elyafnesne]=$yenihesaplama;
								} else {
									$kompozisyonarray[$elyafnesne]=$elyfbhesapla;
								}
							} }
						}
						$elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
						$iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
						//$iplikkartlarimetin2.=$iplikkart.' <br> ';
						$iplikkartlarimetin2.=$elyafmetin.' <br> ';
					} 
				}  
			}
			$kompmetin='';
			if(!empty($x['elyaforanlari'])){
				$elyaforanlaricek=$x['elyaforanlari'];
				$elyaforanlariarray=(!empty($x['elyaforanlari'])?json_decode($x['elyaforanlari'],1):'');
				if(!empty($elyaforanlariarray)){
					$elyaforanlariarray=str_replace('puan','',$elyaforanlariarray);
				}
				if(!empty($elyaforanlariarray)){
					foreach($elyaforanlariarray as $i2 => $elyaf){
						$nesneyioku=(!empty($_Nesne[$i2]['metin1'])?$_Nesne[$i2]['metin1']:'');
						$kompmetin.='%'.$elyaf.' '.$nesneyioku;
						
					} 
				}  
			}

			$metinhazirla=$iplikkartlarimetin2;
			$metinhazirla=str_replace(array("(",")"),"",$metinhazirla);
			
			if(!empty($kompozisyonarray)){
				foreach ($kompozisyonarray as $karray => $kompozisyon2) {
					$kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
				}
			}
			$resim=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$x['ID']),'ID,img','galeri');
			

			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 
			$fiyatoku='';
			$fiyatlariyazdir='';
			if($x['fiyatlar']){
				$cevirelecekkur=1;
				if(!empty($dovizsayi)){
					if($dovizsayi=='75'){
						$cevirelecekkur=(!empty($x['mkurusd'])?$x['mkurusd']:'1');
					}
					if($dovizsayi=='76'){
						$cevirelecekkur=(!empty($x['mkureur'])?$x['mkureur']:'1');
					}
				}
				$fiyatlararray=(!empty($x['fiyatlar'])?json_decode($x['fiyatlar'],1):'');
				$fiyatlarsayi=(!empty($fiyatlararray)?count($fiyatlararray):'0');
				if(!empty($fiyatlararray)){
					foreach ($fiyatlararray as $fary => $fiyatjson) {
						$dovizecevir=($fiyatjson/$cevirelecekkur);
						$dovizecevir=z(36,$dovizecevir,2);
						if($fary+1!=$fiyatlarsayi){
							$fiyatlariyazdir.=$dovizecevir.' - ';
						} else {
							$fiyatlariyazdir.=$dovizecevir;
						}
					}
				}
				$fiyatoku=str_replace(array('"','[',']'),"",$x['fiyatlar']);

				$fiyatoku=str_replace(array(','),", ",$fiyatoku).' ₺';
			}

			echo '
			<tr class="tr'.($ysayi%2?1:2).'" >
			


				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td>'.$sayimiz.'</td>


				'./*<td><img src="img/drm'.$_Drm[$x['onayli']][0].'.png" title="'.$_Drm[$x['onayli']][1].'" height="20" /></td>*/'
				
				<td colspan="1" style="text-align:left;">
					'.
					// Detay adı görüntüleme
					($admn||$ytkDzn?
						'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.bulunan('ID',$x['kodu']).'</a>'
						: bulunan('ID',$x['kodu']) 
					).
					($admn||$ytkDzn?
					'&nbsp;<a href="?s='.$tbl.'&a='.$kumastipiduzenle.'&id='.$x['ID'].'" class="dzn"></a>'
					: ''
					).
					(!empty($resim)?'<a href="#resim" class="icongaleri" onclick="tiklagelsin('.$x['ID'].')" id="myBtn">&nbsp;</a>':'').
					
					/*/
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
			 <td>'.(!empty($x['ismi'])?bulunan('ismi',$x['ismi']):'&nbsp;').'</td>
			 <td>'.(!empty($kumastipi)?$kumastipi:'&nbsp;').'</td>
			 <td>'.(!empty($_MakinaCesitleri[$x['makinacesitleri_ID']]['ad'])?$_MakinaCesitleri[$x['makinacesitleri_ID']]['ad']:'&nbsp;').'</td>
			 <td>'.(!empty($_Kumasturu[$x['kumasturu_ID']]['ad'])?$_Kumasturu[$x['kumasturu_ID']]['ad']:'&nbsp;').'</td>
			 <td>'.(!empty($kompmetin)?$kompmetin:'&nbsp;').'</td>
			 <td>'.(!empty($rapor)?'<a href="?s='.$syf.'&a=rapor&id='.$raporid.'" style="border: 1px solid #fffff4;background: black;color: white;padding: 2px;" target="_blank">'.$raporadi.'</a>':'').'</td>';
			 echo '<td>'.$doviz.'</td>';
			 echo '<td>'.(!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'&nbsp;').' </td>
				';


				/*/
				if(!empty($ytkFyt)||$admn){
					echo '<td>'.$fiyatlariyazdir.'</td><td>'.$doviz.'</td>';
				}
			 	<td>'.dzn('sayi','fiyat').' </td> 
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
			if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}
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