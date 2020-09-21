<?Php
z(6,'stok');
if(z(8,'cekitrx')){
	$IDx=z(8,'cekitrx');
	if(is_numeric($IDx)){
		_z(3,$IDx,array('ceki_ID'=>0,'durum'=>0));
	}
	die;
}

$tip=1;
/*
if(strpos(z('sw','QUERY_STRING'),'mamul')){
	$tip=1;
}
*/

if(!empty($geriYukle)){
	$sd="WHERE arsiv='0' AND tip='".$tip."' AND durum='1'"/*" ".(z(8,'hambezstok_ID','sayi')?" AND hambezstok_ID='".z(8,'hambezstok_ID','sayi')."'":'')*/." ORDER BY ID";
	$_V['tasi']=1;
	$cekiTopMetre=0;
}
else{
	$_V=z(9);
	if(!empty($_V['etiketNO'])){
		$sd="WHERE arsiv='0' AND tip='".$tip."' AND ID='".$_V['etiketNO']."' LIMIT 1";
	}
}
if(!empty($sd)){
	$_X=z(1,$sd);
	if(!empty($_X)){
		function blnn($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
		
		$_Nesne=z(37,z(1,"WHERE ".z(38,$_X,'nesne_IDrenkNo')." OR ".z(38,$_X,'nesne_IDdesenNo')." OR ad='kalite' OR ad='bOzellik'"/*.z(38,$_X,'nesne_IDkalite')*/,'ID,ad,metin1,metin2','nesne'));
		$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_X,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
		$_Mamulkumas=z(37,z(1,"WHERE ".z(38,$_X,'mamulkumas_ID'),'ID,nesne_IDbOzellik,ad,numuneAdi','mamulkumas'));
		$_Mamulkumasdetay=z(37,z(1,"WHERE ".z(38,$_X,'mamulkumasdetay_ID'),'ID,ad,kod','mamulkumasdetay'));

		$_Top=array();
		

		$cekiAdet=0;
		$_X_=z(48,$_X,'mamulkumasdetay_ID');
		foreach ($_X_ as $mamulkumasdetay_ID=>$_X) {
			foreach ($_Nesne as $nsn) {
				if($nsn['ad']=='kalite'&&!empty($nsn['metin2'])){
					$_Top[$nsn['metin2']]=array('metraj'=>0);
				}
			}

			if(!empty($geriYukle))echo '<tbody class="kmsbody" id="kmsbody_'.$mamulkumasdetay_ID.'">
				<tr><th colspan="10">'.(!empty($_Mamulkumasdetay[$mamulkumasdetay_ID]['ad'])?$_Mamulkumasdetay[$mamulkumasdetay_ID]['ad']:'---').'</th></tr>';
			foreach($_X as $i=>$x){$i++;$cekiAdet++;



			if(!empty($geriYukle)||$x['durum']!=1){
				if(1||empty($x['ceki_ID'])||!empty($_V['tasi'])){
					if(empty($geriYukle)){
						z(6,'stok');
						z(3,$x['ID'],Array(
							//'hambezstok_ID'=>!empty($_V['hambezstok_ID'])?$_V['hambezstok_ID']:0,
							'durum'=>1,'tarihDurum'=>z('datetime')));
					}
					else{
						$cekiTopMetre+=$x['metraj'];
					}

					if(!empty($_Nesne[$x['nesne_IDkalite']]['metin2'])){
						$_Top[$_Nesne[$x['nesne_IDkalite']]['metin2']]['metraj']+=$x['metraj'];
					}
				
					echo '<tr class="cekitr '.($i%2==0?' tr2':'').'" id="tr_'.$x['ID'].'" 
					data-hamkumasstok_ID="'.$x['mamulkumasdetay_ID'].'" 
					data-nesne_IDkalite="'.$x['nesne_IDkalite'].'" 
					data-metraj="'.$x['metraj'].'" 
					data-kalite="'.(!empty($_Nesne[$x['nesne_IDkalite']]['metin2'])?$_Nesne[$x['nesne_IDkalite']]['metin2']:'').'"
					data-hamkumasstok="'.(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi']:'---').'"
					>
					'.
					'<input type="hidden" name="stok[ID][]" value="'.$x['ID'].'">'.
					'<input type="hidden" id="tr_'.$x['ID'].'_hamkumasstok_ID" value="'.$x['hamkumasstok_ID'].'">'.
					//'<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>'.
					'<td>'.$i.'</td>';
					echo '
					<td><a href="?s=stok&a=detay&id='.$x['ID'].'" class="dty">'.blnn('ID',$x['ID']).'</a></td>
					<td>'.
						(!empty($_Mamulkumas[$x['mamulkumas_ID']]['ad'])?$_Mamulkumas[$x['mamulkumas_ID']]['ad']:'').
						(!empty($_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi'])?' / '.$_Mamulkumas[$x['mamulkumas_ID']]['numuneAdi']:'').
					'</td>
					<td>'.
						(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad'])?$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['ad']:'').
						(!empty($_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod'])?'&nbsp;('.$_Mamulkumasdetay[$x['mamulkumasdetay_ID']]['kod'].')':'').
					'</td>
					<td>'.(!empty($_Nesne[$_Mamulkumas[$x['mamulkumas_ID']]['nesne_IDbOzellik']]['metin1'])?$_Nesne[$_Mamulkumas[$x['mamulkumas_ID']]['nesne_IDbOzellik']]['metin1']:'&nbsp;').'</td>
					<td>'.(!empty($_Nesne[$x['nesne_IDkalite']]['metin1'])?trmtn($_Nesne[$x['nesne_IDkalite']]['metin1']):'&nbsp;').'</td>
					'./*/'
					<td><img src="img/drm'.$_CkDrm[$x['durum']][0].'.png" title="'.$_CkDrm[$x['durum']][1].'" height="20" /></td>
					<td>'.(!empty($x['tipNo'])?blnn('tipNo',$x['tipNo']):'&nbsp;').'</td>
					<td>'.(!empty($x['partiNo'])?blnn('partiNo',$x['partiNo']):'&nbsp;').'</td>
					<td>'.(!empty($_Nesne[$x['nesne_IDrenkNo']]['metin1'])?trmtn($_Nesne[$x['nesne_IDrenkNo']]['metin1']):'&nbsp;').'</td>
					<td>'.(!empty($x['mamulEn'])?blnn('mamulEn',$x['mamulEn']):'&nbsp;').'</td>
					<td>'.(!empty($x['mamulGr'])?blnn('mamulGr',$x['mamulGr']):'&nbsp;').'</td>
					<td>'.(!empty($_Nesne[$x['nesne_IDkompozisyon']]['metin1'])?$_Nesne[$x['nesne_IDkompozisyon']]['metin1']:'&nbsp;').'</td>
					<td>'.(!empty($_Nesne[$x['nesne_IDkalite']]['metin1'])?trmtn($_Nesne[$x['nesne_IDkalite']]['metin1']):'&nbsp;').'</td>
					<td>'.(!empty($_Nesne[$x['nesne_IDpuan']]['metin1'])?$_Nesne[$x['nesne_IDpuan']]['metin1']:'&nbsp;').'</td>
					<td>'.(!empty($x['topNo'])?blnn('topNo',$x['topNo']):'&nbsp;').'</td>
					if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<td>';foreach($n['alan2'] as $fei=>$fed)echo !empty($_Nesne[$x['nesne_ID'.$ad]][$fei])?$_Nesne[$x['nesne_ID'.$ad]][$fei].' ':'&nbsp;';echo '</td>';}
					'./*/'
					<td>'.(!empty($x['metraj'])?blnn('metraj',sayi($x['metraj'],2,1)):'&nbsp;').'<input type="hidden" class="metreTxt" value="'.$x['metraj'].'" /></td>
					<td>'.(!empty($x['lotNo'])?blnn('lotNo',$x['lotNo']):'&nbsp;').'</td>
					<td>'.(!empty($x['dokSalTopNo'])?blnn('dokSalTopNo',$x['dokSalTopNo']):'&nbsp;').'</td>
					'./* <td>'.z('tarihsaat',$x['tarih']).'</td> */'
					';
					echo '<td class="printx"><input type="button" onClick="trSil('.$x['ID'].','.$x['ID'].');" value="sil"></td>';
					
				}else echo '2';
			}else if(empty($geriYukle))echo '3';
			}
			if(!empty($geriYukle))echo '</tbody>';
			if(!empty($geriYukle)){
				echo '<tbody><tr class="kmstoplam" >';
				//if(!empty($_Top))foreach ($_Top as $klt=>$tplm) {
					foreach ($_Nesne as $nsn) {	if($nsn['ad']=='kalite'&&!empty($nsn['metin2'])){
						$klt=$nsn['metin2'];
						$tplm = !empty($_Top[$klt])?$_Top[$klt]:array('metraj'=>0);

						echo '<td colspan="2">TOPLAM: <b><span id="kmstoplam_'.$mamulkumasdetay_ID.'_'.$klt.'">'.$tplm['metraj'].'</span> mt</b> <b>'.$klt.'</b></td>';
					} }
				//}
				echo '<td colspan="2">&nbsp;</td>';
				echo '<td colspan="2">&nbsp;</td>';

				echo '</tr><tr><td colspan="8"></td></tr></tbody>';
			}
		}
	}else if(empty($geriYukle))echo '0';
}?>