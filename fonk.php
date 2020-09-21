<?Php
function trmtn($metin){$bunu=array("Ã¶","Ã–","Ã§","Ã‡","ÅŸ","Åž","Å","Ä±","Ä°","ÄŸ","Äž","Ä","Ã¼","Ãœ","Â²");$buna=array("ö", "Ö", "ç", "Ç", "ş", "Ş","Ş","ı", "İ", "ğ", "Ğ","Ğ","ü","Ü","²");$metin=str_replace($bunu,$buna,$metin);return $metin;}
function select($_X){
	if(empty($_X['name'])){
		$_X['name']='musteri';
	}
	if(empty($_X['alan'])){
		$_X['alan']='ID,ad';
	}
	if(empty($_X['value'])){
		$_X['value']='ID';
	}
	else $_X['alan'].=','.$_X['value'];
	if(empty($_X['t'])){
		$_X['t']='musteri';
	}
	if(empty($_X['sd'])){
		$_X['sd']="WHERE arsiv='0'".(strpos($_X['alan'],'ad')!==false?' ORDER BY ad':'');
	}
	if(strpos($_X['sd'],'ORDER BY')===false&&strpos($_X['alan'],'ad')!==false){
		$_X['sd'].=' ORDER BY ad';
	}
	if(strpos($_X['sd'],'ORDER BY')===false&&strpos($_X['alan'],'metin1')!==false){
		$_X['sd'].=' ORDER BY metin1';
	}
	if(empty($_X['sec'])){
		$_X['sec']='';
	}
	if(empty($_X['detay'])){
		$_X['detay']='';
	}
	if(empty($_X['icerik'])){
		$_X['icerik']='';
	}
	if(empty($_X['ayrac'])){
		$_X['ayrac']=' ';
	}
	if(strpos($_X['detay'],'class="')!==false && empty($_X['ayar']['selectTip'])){
		$_X['detay']=str_replace('class="', 'class="select2 ', $_X['detay']);
	}
	else if(empty($_X['ayar']['selectTip'])){
		$_X['detay'].=' class="select2" ';
	}
	
	$x='<select name="'.$_X['name'].'" '.$_X['detay'].'>'.$_X['icerik'];
	$_Musteri=z(1,$_X['sd'],$_X['alan'],$_X['t']);
	if(!empty($_Musteri)){
		foreach($_Musteri as $musteri){
			$x.='<option value="'.$musteri[$_X['value']].'" ';
			if($_X['sec']==$musteri[$_X['value']]){
				$x.='selected="selected"';
			}
			$x.='>';
			unset($musteri[$_X['value']]);
			$xv='';
			foreach($musteri as $i=>$mus){
				$mus=trmtn($mus);
				if(!empty($xv))$xv.=$_X['ayrac'];
				$xv.=$mus;
			}
			$x.=$xv.'</option>';
		}
	}
	$x.='</select>';
	return $x;
}

/*/
function selectNesne (){
	retunr select(Array('name'=>$tbl.'['.$ad.']','detay'=>'class="nesneSlc_'.$ad.'" required="required"','t'=>'nesne','alan'=>'sayi1,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X[''.$ad])?$_X[''.$ad]:substr(z('date'),0,7)))

	if(empty($_X['alan'])){
		$_X['alan']='ID,metin1';
	}
	if(empty($_X['value'])){
		$_X['value']='ID';
	}
	else $_X['alan'].=','.$_X['value'];
	if(empty($_X['t'])){
		$_X['t']='musteri';
	}
	if(empty($_X['sd'])){
		$_X['sd']="WHERE arsiv='0'".(strpos($_X['alan'],'ad')!==false?' ORDER BY ad':'');
	}
	if(strpos($_X['sd'],'ORDER BY')===false&&strpos($_X['alan'],'ad')!==false){
		$_X['sd'].=' ORDER BY ad';
	}
	if(strpos($_X['sd'],'ORDER BY')===false&&strpos($_X['alan'],'metin1')!==false){
		$_X['sd'].=' ORDER BY metin1';
	}
	if(empty($_X['sec'])){
		$_X['sec']='';
	}
	if(empty($_X['detay'])){
		$_X['detay']='';
	}
	if(empty($_X['icerik'])){
		$_X['icerik']='';
	}
	if(empty($_X['ayrac'])){
		$_X['ayrac']=' ';
	}
	if(strpos($_X['detay'],'class="')!==false && empty($_X['ayar']['selectTip'])){
		$_X['detay']=str_replace('class="', 'class="select2 ', $_X['detay']);
	}
	else if(empty($_X['ayar']['selectTip'])){
		$_X['detay'].=' class="select2" ';
	}
	
	$x='<select name="'.$_X['name'].'" '.$_X['detay'].'>'.$_X['icerik'];
	$_Musteri=z(1,$_X['sd'],$_X['alan'],$_X['t']);
	if(!empty($_Musteri)){
		foreach($_Musteri as $musteri){
			$x.='<option value="'.$musteri[$_X['value']].'" ';
			if($_X['sec']==$musteri[$_X['value']]){
				$x.='selected="selected"';
			}
			$x.='>';
			unset($musteri[$_X['value']]);
			$xv='';
			foreach($musteri as $i=>$mus){
				$mus=trmtn($mus);
				if(!empty($xv))$xv.=$_X['ayrac'];
				$xv.=$mus;
			}
			$x.=$xv.'</option>';
		}
	}
	$x.='</select>';
	return $x;

}
/*/

// Filtre Fonksiyonu
function filtreTh($a,$ad='',$dgr='',$aln='',$sd='',$ttl='',$alt=''){
	$_Ara=$GLOBALS['_Ara'];
	$_LA=$GLOBALS['_LA'];
	$tbl=$GLOBALS['tbl'];
	$syf=$GLOBALS['syf'];
	$ayr=$GLOBALS['ayr'];

	static $alanlar=array();
	//print_r($alanlar);
	//print_r($_Ara);
	switch ($a) {
		case'sayi': ?>
			<?php 
			array_push($alanlar,$ad);
			?>
			<th>
				<input type="text" name="ara[<?php echo $ad; ?>]" class="ara ufakTxt" id="ara<?php echo ucfirst($ad); ?>" value="<?Php echo !empty($GLOBALS['_Ara'][$ad])?$GLOBALS['_Ara'][$ad]:''; ?>" title="Sayının öncesine '<', '>', '=', '!', '<=', '>=' karakterlerini girerek opsiyonel filtreleme yapabilirsiniz. Örneğin '<10' yazarak 10'dan küçük sayılara sahip girdileri listeleyebilirsiniz. Bir adet boşluk girerek ise de değeri sıfır olan girdileri listeleyebilirsiniz.">
			</th>
		<?php break;

		case 'select':
		case 'tablo':
		 ?>
			<?php 
			if(empty($aln))$aln='ID,ad';

			$xaln=explode(',', $aln);
			array_push($alanlar,$ad.'_'.$xaln[0]);

			if(empty($dgr)){
				$dgr=!empty($_Ara[$ad.'_'.$xaln[0].$alt])?$_Ara[$ad.'_'.$xaln[0].$alt]:'';
			}
			?>
			<th class="araGrupChck">
				<div><?php echo $ttl; ?></div>
		        <button type="button" class="araGrupBtn" onclick="filtreyetikla(this)">&nbsp;</button>
		        <div class="araGizliGrup">
		            <div class="ggth">
		            	<label><input type="checkbox" class="ggtumu" value="1" />Tümünü Seç</label><label><input type="checkbox" class="ara" name="ara[<?Php echo $ad.'_ID'.$alt ?>]" value="_sifir" <?Php echo (!empty($dgr[0])?'checked':'')?> />Boş</label>
		            </div>
		            <div class="ggtd">
		                <div class="ggtds"><input type="text" class="labelSearch" placeholder="Ara" /></div>
		                <div class="ggtdi"><?Php
		                	switch ($ad) {
		                		case 'mamulkumas':
				                    $_Mamulkumas=z(1,"WHERE arsiv<>-1 AND (ad<>'' OR numuneAdi<>'')",'ID,hamkumasstok_ID,nesne_IDbOzellik,ad,numuneAdi',$ad);
				                    $_Hamkumasstok=z(37,z(1,"WHERE arsiv<>-1 AND (kumasIsmi<>'' OR numuneIsmi<>'') AND ".z(38,$_Mamulkumas,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
									$_Nesne=z(37,z(1,"WHERE ".z(38,$_Mamulkumas,'nesne_IDbOzellik'),'ID,metin1,metin2','nesne'));
									if(!empty($_Mamulkumas)){
					                	foreach($_Mamulkumas as $fei=>$x){
					                        echo '
					                        <label>
					                        	<input type="checkbox" class="ara" name="ara['.$ad.'_'.$xaln[0].$alt.']" value="'.$x['ID'].'"'.(!empty($dgr[$fei+1])?'checked':'').' />
					                        	<span class="va-t lh18">
					                        		'.
					                        			(!empty($x['ad'])?$x['ad']:'').
					                        			' | '.
					                        			(!empty($x['numuneAdi'])?$x['numuneAdi']:'').
					                        			' | '.
					                        			(!empty($_Nesne[$x['nesne_IDbOzellik']]['metin1'])?$_Nesne[$x['nesne_IDbOzellik']]['metin1']:'').
					                        			' | '.
					                        			(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$x['hamkumasstok_ID']]['kumasIsmi']:'').
					                        			' | '.
					                        			(!empty($_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$x['hamkumasstok_ID']]['numuneIsmi']:'').
					                        			
					                        		'
					                        	</span>
					                        </label>';
					                    }
					                }
									break;
									case 'rapor':
										$_Rapor=z(1,"WHERE arsiv='0'",'','rapor');
										$raporkodu='';
										if(!empty($_Rapor)){
											foreach($_Rapor as $fei=>$x){
												$rapormodulid=$x['modul_ID'];
												if(!empty($rapormodulid)){
													$kumaskartigoster=z(1,$rapormodulid,'ID,kodu','kumaskarti');
													$raporkodu=(!empty($kumaskartigoster['kodu'])?$kumaskartigoster['kodu'].'-':'');
												}
												echo '
												<label>
													<input type="checkbox" class="ara" name="ara['.$ad.'_'.$xaln[0].$alt.']" value="'.$x['ID'].'"'.(!empty($dgr[$fei+1])?'checked':'').' />
													<span class="va-t lh18">
														'.
															$raporkodu.(!empty($x['ID'])?$x['ID']:'').
															
														'
													</span>
												</label>';
											}
										}
									break;
									case 'iplikkartlari':
										$iplikoku=z(1,"WHERE arsiv='0'",'','iplik');
										$_Nesneiplik=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
										if(!empty($iplikoku)){
											foreach($iplikoku as $iplk => $iplkler){
												$iplikartid=(!empty($iplkler['nesne_IDiplikkartTipi'])?$iplkler['nesne_IDiplikkartTipi']:0);
												$iplikkarti=(!empty($_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
												$uretimTipi=(!empty($_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
												$boyaKontrol=(!empty($_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
												$elyafmetin="";
												if(!empty($iplkler['elyaf'])){
													$elyafcek=$iplkler['elyaf'];
													$elyafarray=(!empty($iplkler['elyaf'])?json_decode($iplkler['elyaf'],1):'');
													if(!empty($elyafarray)){
														$elyafarray=str_replace('puan','',$elyafarray);
													}
													if(!empty($elyafarray)){
														foreach($elyafarray as $i => $elyf){
															$elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
															$elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
														} 
													}  
												}
												$elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
												$iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
												$metinolustur=$iplikkart;
												
												echo '
												<label>
													<input type="checkbox" class="ara" name="ara[nesne_IDiplikkartTipi]" value="'.$iplikartid.'"'.(!empty($dgr[$iplk+1])?'checked':'').' />
													<span class="va-t lh18">'.$iplikkart.'
														
													</span>
												</label>';

											}
										}
										
											
										break;
		                			case 'bolge':
		                			$_X=z(1,'LIMIT 1','',$ad);
					                if(!empty($_X)){
					                	foreach($_X as $fei=>$x){
					                		$blgsor=z(11,'bolgesorgu');
					                		if(!empty($dgr)){$ydgr=array_filter($dgr);}
					                        echo '
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="1" '
					                        .(!empty($ydgr[1])&&$ydgr[1]=="1"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Akdeniz</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="2" '
					                        .(!empty($ydgr[2])&&$ydgr[2]=="2"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Ege</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="3" '
					                        .(!empty($ydgr[3])&&$ydgr[3]=="3"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Marmara</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="4" '
					                        .(!empty($ydgr[4])&&$ydgr[4]=="4"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Karadeniz</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="5" '
					                        .(!empty($ydgr[5])&&$ydgr[5]=="5"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">İç Anadolu</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="6" '
					                        .(!empty($ydgr[6])&&$ydgr[6]=="6"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Doğu Anadolu</span></label>
					                        <label><input type="checkbox" class="ara" name="ara[bolge_ID]" value="7" '
					                        .(!empty($ydgr[7])&&$ydgr[7]=="7"?'checked':'').
					                        ' style="background-color: rgb(0, 170, 0); color: rgb(255, 255, 255); font-size: 13px;"><span class="va-t lh18">Güneydoğu Anadolu</span></label>
					                        ';
					                    }
					                }
			                		else echo 'Girdi bulunamadı.';
		                			break;

		                			case 'sehir':
		                			$_X=z(1,'ORDER BY sehir_key ASC','',$ad);
					                if(!empty($_X)){
					                	foreach($_X as $fei=>$x){
					                        echo '<label>
					                        <input type="checkbox" class="ara" name="ara[sehir_ID]" value="'.$x['sehir_key'].'"'
					                        .(!empty($dgr[$fei+1])?'checked':'').
					                        ' /><span class="va-t lh18">'.
					                        $x['sehir_title'].'</span></label>';
					                    }
					                }
			                		else echo 'Girdi bulunamadı.';
		                			break;
		                		
		                		default:
				                    $_X=z(1,( empty($sd)?array('arsiv'=>array('<>','-1')):$sd),$aln,$ad);
					                if(!empty($_X)){
					                	foreach($_X as $fei=>$x){
					                        echo '<label>
					                        <input type="checkbox" class="ara" name="ara['.$ad.'_'.$xaln[0].$alt.
					                        ']" value="'.$x[$xaln[0]].'"'
					                        .(!empty($dgr[$fei+1])?'checked':'').
					                        ' /><span class="va-t lh18">'.
					                        $x[$xaln[1]].
					                        (!empty($xaln[2])&&!empty($x[$xaln[2]])?
					                        	' | '.$x[$xaln[2]]:'').
					                        '</span></label>';
					                    }
					                }
			                		else echo 'Girdi bulunamadı.';
		                		break;
		                	}
			            ?></div>
		            </div>
		        </div>
		    </th>
		<?Php break;
		case 'tabloiplik':
			?>
			   <?php 
			   if(empty($aln))$aln='ID,ad';
   
			   $xaln=explode(',', $aln);
			   array_push($alanlar,$ad.'_'.$xaln[0]);
   
			   if(empty($dgr)){
				   $dgr=!empty($_Ara[$ad.'_'.$xaln[0].$alt])?$_Ara[$ad.'_'.$xaln[0].$alt]:'';
			   }
			   ?>
			   <th class="araGrupChck">
				   <div><?php echo $ttl; ?></div>
				   <button type="button" class="araGrupBtn" onclick="filtreyetikla(this)">&nbsp;</button>
				   <div class="araGizliGrup">
					   <div class="ggth">
						   <label><input type="checkbox" class="ggtumu" value="1" />Tümünü Seç</label><label><input type="checkbox" class="ara" name="ara[nesne_IDiplikkartTipi]" value="_sifir" <?Php echo (!empty($dgr[0])?'checked':'')?> />Boş</label>
					   </div>
					   <div class="ggtd">
						   <div class="ggtds"><input type="text" class="labelSearch" placeholder="Ara" /></div>
						   <div class="ggtdi"><?Php
							   switch ($ad) {
									   case 'iplikkartlari':
										   $iplikoku=z(1,"WHERE arsiv='0'",'','iplik');
										   $_Nesneiplik=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
										   if(!empty($iplikoku)){
											   foreach($iplikoku as $iplk => $iplkler){
												   $iplikartid=(!empty($iplkler['nesne_IDiplikkartTipi'])?$iplkler['nesne_IDiplikkartTipi']:0);
												   $iplikkarti=(!empty($_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
												   $uretimTipi=(!empty($_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
												   $boyaKontrol=(!empty($_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1'])?$_Nesneiplik[$iplkler['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
												   $elyafmetin="";
												   if(!empty($iplkler['elyaf'])){
													   $elyafcek=$iplkler['elyaf'];
													   $elyafarray=(!empty($iplkler['elyaf'])?json_decode($iplkler['elyaf'],1):'');
													   if(!empty($elyafarray)){
														   $elyafarray=str_replace('puan','',$elyafarray);
													   }
													   if(!empty($elyafarray)){
														   foreach($elyafarray as $i => $elyf){
															   $elyafnesne=(!empty($_Nesneiplik[$i]['metin1'])?$_Nesneiplik[$i]['metin1']:'&nbsp;');
															   $elyafmetin.='%'.$elyf.' '.$elyafnesne.' '; 
														   } 
													   }  
												   }
												   $elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
												   $iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
												   $metinolustur=$iplikkart;
												   
												   echo '
												   <label>
													   <input type="checkbox" class="ara" name="ara[nesne_IDiplikkartTipi]" value="'.$iplikartid.'"'.(!empty($dgr[$iplk+1])?'checked':'').' />
													   <span class="va-t lh18">'.$iplikkart.'
														   
													   </span>
												   </label>';
   
											   }
										   }
										   
											   
										   break;
								   
								   default:
									   $_X=z(1,( empty($sd)?array('arsiv'=>array('<>','-1')):$sd),$aln,$ad);
									   if(!empty($_X)){
										   foreach($_X as $fei=>$x){
											   echo '<label>
											   <input type="checkbox" class="ara" name="ara['.$ad.'_'.$xaln[0].$alt.
											   ']" value="'.$x[$xaln[0]].'"'
											   .(!empty($dgr[$fei+1])?'checked':'').
											   ' /><span class="va-t lh18">'.
											   $x[$xaln[1]].
											   (!empty($xaln[2])&&!empty($x[$xaln[2]])?
												   ' | '.$x[$xaln[2]]:'').
											   '</span></label>';
										   }
									   }
									   else echo 'Girdi bulunamadı.';
								   break;
							   }
						   ?></div>
					   </div>
				   </div>
			   </th>
		   <?Php break;

		case 'selectNesne':
		case 'nesne':
		 ?>

			<?php 
			array_push($alanlar,'nesne_ID'.$ad);

			if(empty($dgr)){
				$dgr=!empty($_Ara['nesne_ID'.$ad])?$_Ara['nesne_ID'.$ad]:'';
			} ?>
			<th class="araGrupChck">
		        <button type="button" class="araGrupBtn" onclick="filtreyetikla(this)">&nbsp;</button>
		        <div class="araGizliGrup">
		            <div class="ggth">
		            	<label><input type="checkbox" class="ggtumu" value="1" />Tümünü Seç</label><label><input type="checkbox" class="ara" name="ara[nesne_ID<?Php echo $ad; ?>]" value="_sifir" <?Php echo (!empty($dgr[0])?'checked':'')?> />Boş</label>
		            </div>
		            <div class="ggtd">
		                <div class="ggtds"><input type="text" class="labelSearch" placeholder="Ara" /></div>
		                <div class="ggtdi"><?Php
		                    $_X=z(1,"WHERE ad='".$ad."'".$sd,'ID,metin1,metin2','nesne');
		                    if(!empty($_X))
		                    foreach($_X as $i=>$x){
		                        echo '<label><input type="checkbox" class="ara" name="ara[nesne_ID'.$ad.']" value="'.$x['ID'].'" '.(!empty($dgr[$i+1])?'checked':'').' />'.
		                        	(!empty($x['metin1'])?$x['metin1']:'').
		                        	(!empty($x['metin1'])&&!empty($x['metin2'])?' ':'').
		                        	(!empty($x['metin2'])?$x['metin2']:'').
		                        '</label>';
		                    }
			            ?></div>
		            </div>
		        </div>
		    </th>
		<?Php break;


		case 'nesneDurum':
		 ?>

			<?php 
			array_push($alanlar,$ad);
			$aln=!empty($aln)?$aln:$ad;
			
			if(empty($dgr)){
				$dgr=!empty($_Ara[$ad])?$_Ara[$ad]:'';
			} ?>
			<th class="araGrupChck">
		        <button type="button" class="araGrupBtn" onclick="filtreyetikla(this)">&nbsp;</button>
		        <div class="araGizliGrup">
		            <div class="ggth">
		            	<label><input type="checkbox" class="ggtumu" value="1" />Tümünü Seç</label><label><input type="checkbox" class="ara" name="ara[<?Php echo $ad; ?>]" value="_sifir" <?Php echo (!empty($dgr[0])?'checked':'')?> />Boş</label>
		            </div>
		            <div class="ggtd">
		                <div class="ggtds"><input type="text" class="labelSearch" placeholder="Ara" /></div>
		                <div class="ggtdi"><?Php
		                    $_X=z(1,"WHERE ad='".$aln."'".$sd,'ID,sayi1,metin1,metin2','nesne');
		                    if(!empty($_X))
		                    foreach($_X as $i=>$x){
		                        echo '<label style="background-color:'.
		                        	(!empty($x['metin1'])?$x['metin1']:'').

		                        	'"><input type="checkbox" class="ara" name="ara['.$ad.']" value="'.$x['sayi1'].'" '.(!empty($dgr[$i+1])?'checked':'').' />'.
		                        	(!empty($x['metin2'])?$x['metin2']:'').
		                        '</label>';
		                    }
			            ?></div>
		            </div>
		        </div>
		    </th>
		<?Php break;

		case 'nesneTip':
		 ?>

			<?php 
			array_push($alanlar,$ad);
			$aln=!empty($aln)?$aln:$ad;

			if(empty($dgr)){
				$dgr=!empty($_Ara[$ad])?$_Ara[$ad]:'';
			} ?>
			<th class="araGrupChck">
		        <button type="button" class="araGrupBtn" onclick="filtreyetikla(this)">&nbsp;</button>
		        <div class="araGizliGrup">
		            <div class="ggth">
		            	<label><input type="checkbox" class="ggtumu" value="1" />Tümünü Seç</label><label><input type="checkbox" class="ara" name="ara[<?Php echo $ad; ?>]" value="_sifir" <?Php echo (!empty($dgr[0])?'checked':'')?> />Boş</label>
		            </div>
		            <div class="ggtd">
		                <div class="ggtds"><input type="text" class="labelSearch" placeholder="Ara" /></div>
		                <div class="ggtdi"><?Php
		                    $_X=z(1,"WHERE ad='".$aln."'".$sd,'ID,sayi1,metin1,metin2','nesne');
		                    if(!empty($_X))
		                    foreach($_X as $i=>$x){
		                        echo '<label style="background-color:'.
		                        	(!empty($x['metin1'])?$x['metin1']:'').

		                        	'"><input type="checkbox" class="ara" name="ara['.$ad.']" value="'.$x['sayi1'].'" '.(!empty($dgr[$i+1])?'checked':'').' />'.
		                        	(!empty($x['metin1'])?$x['metin1']:'').
		                        '</label>';
		                    }
			            ?></div>
		            </div>
		        </div>
		    </th>
		<?Php break;


		
		case 'tarih': ?>
			<?php 
			array_push($alanlar,$ad);

			if(empty($dgr)){
				$dgr=!empty($_Ara[$ad])?$_Ara[$ad]:'';
			}

			?>
			<th class="araGrup">
				<?Php if(!empty($dgr)&&is_array($dgr)){foreach($dgr as $aratrh){ 
					?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $ad?>" value="<?Php echo $aratrh?>" autocomplete="off"/><?Php
            	}}
            	else{
            		?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $ad?>" value="<?Php echo !empty($dgr)?$dgr:''?>" autocomplete="off"/><?Php 
            	}?>
            </th>
        <?php break;

        case 'adet': ?>
        	<th colspan="2">
	        	<select name="la[adet]" class="ara" id="laAdet">
	    		<?php if(!empty($ayr['genelListeSatirC'])){
	        		foreach($ayr['genelListeSatirC'] as $fe){
	        			?><option value="<?php echo $fe?>" <?php 
	        				echo (isset($_LA['adet'])&&$fe==$_LA['adet'])||(empty($_LA['adet'])&&$fe==$ayr['genelListeSatirA'])?'selected="selected"':''; 
	        				?> ><?php echo !empty($fe)?$fe.' Satır':'Tümü'; 
	        			?></option><?php
	        		}
	    		} ?>
	        	</select>
        	</th>
        <?php break;
 		
 		case 'durum': ?>
        	<th>
        		<select name="<?Php echo $ad?>" class="ara ufakTxt">
        			<option value="">&nbsp;</option>
        			<?php foreach ($dgr as $dg => $xmtn) {?>
                    <option value="<?php echo $dg ?>" <?Php if(!empty($_Ara[$ad]))echo $_Ara[$ad]==$dg?'selected':''?>><?php echo $xmtn ?></option>
        			<?php } ?>
             	</select>
	         </th>
        
        <?php break;

		// FİLTRE AJAX JAVASCRİPT DÖKÜMÜ
        case 'ajaxAraJs': 
        ?>
			<div id="ajaxAraEngelleyici" style="display:none;position: fixed;left: 0;top:0;right: 0;bottom: 0; background-image:url(img/drk20.png); font-weight: bold; text-align: center;padding-top:300px; font-size: 24pt; color:white;text-shadow: 2px 2px #000;">LÜTFEN BEKLEYİNİZ...</div>
			<script type="text/javascript">
			var aramayaKalanSure=0;
			function ajaxAra(){
			    $('.secilebilir').attr('checked',false);
			    $('.tumunuSec').attr('checked',false);
			    aramayaKalanSure=7;
			    renkYenileMini();
			    bekleVeAra();
			}
			var bekleVeAraAnahtar=0;
			function bekleVeAra(a){
			    if(bekleVeAraAnahtar==0){
			        bekleVeAraAnahtar=1;
			        aramayaKalanSure=10;
			        bekleVeAra(1);
			    }
			    else if(a){
			        console.log(aramayaKalanSure+" saniye sonra ara");
			        if(aramayaKalanSure<1){
			        	renkYenile();
			            $('#ajaxAraEngelleyici').fadeIn('fast');

			            $.post('./sayfa/<?Php echo !empty($syf)?$syf:$tbl; ?>/<?php echo (empty($ad['dosya'])?'listele_ajx.php':$ad['dosya']); ?>?s=<?Php echo $syf?>&a=<?Php _z(8,'a'); echo 
			            	(z(8,'firma_ID','sayi')?'&firma_ID='.z(8,'firma_ID','sayi'):'').
			            	(z(8,'dokumasiparis_ID','sayi')?'&dokumasiparis_ID='.z(8,'dokumasiparis_ID','sayi'):'').
			            	(z(8,'boyatakip_ID','sayi')?'&boyatakip_ID='.z(8,'boyatakip_ID','sayi'):'').
			            	(z(8,'boyatakipsiparis_ID','sayi')?'&boyatakipsiparis_ID='.z(8,'boyatakipsiparis_ID','sayi'):'').
			            	(z(8,'hambezstok_ID','sayi')?'&hambezstok_ID='.z(8,'hambezstok_ID','sayi'):'').
			            	(z(8,'mamulkumas_ID','sayi')?'&mamulkumas_ID='.z(8,'mamulkumas_ID','sayi'):'').
			            	(z(8,'mamulbezstok_ID','sayi')?'&mamulbezstok_ID='.z(8,'mamulbezstok_ID','sayi'):'').
			            	(z(8,'mamulbezstokdetay_ID','sayi')?'&mamulbezstokdetay_ID='.z(8,'mamulbezstokdetay_ID','sayi'):'').
			            	(z(8,'numunebezstok_ID','sayi')?'&numunebezstok_ID='.z(8,'numunebezstok_ID','sayi'):'').
			            	(z(8,'numunebezstokdetay_ID','sayi')?'&numunebezstokdetay_ID='.z(8,'numunebezstokdetay_ID','sayi'):'').
			            	(z(8,'id','sayi')?'&id='.z(8,'id','sayi'):'').
			            	(z(8,'giris')?'&giris='.z(8,'giris'):'')
			            	;

			            	?>',{
							
							'ara<?Php echo (!empty($ad['dty'])?$ad['dty']:'').(!empty($syf)?$syf:$tbl); ?>':araGrupla({
								<?php foreach ($alanlar as $xi=>$alnAraAd) { if($xi>0)echo ",\n							";	echo $alnAraAd.':$(\'#ara'.ucfirst($alnAraAd).'\').val()';	} ?>

							}),
							'la<?Php echo (!empty($ad['dty'])?$ad['dty']:'').$syf; ?>':{'adet':$('#laAdet').val()}
						},
						function(a){
			                $('#tbody').html(a);
			                genelBilgiYansit();
			                if(aktifListeEventListener){
			                	aktifListeEventListener();
			            	}
			                $('#ajaxAraEngelleyici').fadeOut('fast');
			                bekleVeAraAnahtar=0;
			            });
			        }
			        else{
			            aramayaKalanSure--;
			            setTimeout(function(){bekleVeAra(1);},100);
			        }
			    }
			    /*/
			    else{
			        aramayaKalanSure=1;
			    }
			    /*/

			}
			function genelBilgiYansit(){
				//$('thead #toplamTutarYTd').html($('#toplamTutarTd').html()).show();
				$('#tbody tr:first-child').before('<tr class="toptr">'+$('#toplamTutarTr').html()+'</tr>');
			}
			$(document).ready(function(e) {
				$('.ara')/*.change(ajaxAra)*/.keyup(ajaxAra);
				$('input[type="checkbox"].ara,select.ara,.jstarih.ara').change(ajaxAra);
				genelBilgiYansit();

			    $('#ajaxAraEngelleyici').dblclick(function(){
			        $(this).fadeOut('fast');
			    });

			    setTimeout(function(){
			        $('.araGrupBtn').fadeIn('slow');
			    },300);

			    var stickyTableUyarlaAnahtar=0;
			    $(document).scroll(function(e){
			        if(stickyTableUyarlaAnahtar==0){
			            if($(this).scrollTop()>80){
			                stickyTableUyarla();
			            }
			        }
			    });
			    
			});
			</script><?php
			// FİLTRE AJAX JAVASCRİPT DÖKÜMÜ SON
        	break;


		case 'yok': ?>
			<th>&nbsp;</th>
		<?php break;

		default: ?>
			<?php 
			array_push($alanlar,$ad);
			?>
			<th>
				<input type="text" name="ara[<?php echo $ad; ?>]" class="ara ufakTxt" id="ara<?php echo ucfirst($ad); ?>" value="<?Php echo !empty($GLOBALS['_Ara'][$ad])?$GLOBALS['_Ara'][$ad]:''; ?>">
			</th>
		<?php break;
	}
	 	
}

function postKontrolTh(&$_X){
	if(!empty($GLOBALS['_Th']) && !empty($_X)){
		$_Th=$GLOBALS['_Th'];
		foreach ($_Th as $th) {
			if($th['tip']=='sayi' || $th['tip']=='nesneDurum' || $th['tip']=='nesneTip'){
				if(!empty($th['sutunAdi'])&&empty($_X[$th['sutunAdi']])&&isset($_X[$th['sutunAdi']])){
					$_X[$th['sutunAdi']]=0;
				}
			}
			else if($th['tip']=='tablo'){
				if(!empty($th['sutunAdi'])&&empty($_X[$th['sutunAdi'].'_ID'])&&isset($_X[$th['sutunAdi'].'_ID'])){
					$_X[$th['sutunAdi'].'_ID']=0;
				}
			}
			else if($th['tip']=='nesne'){
				if(!empty($th['sutunAdi'])&&empty($_X['nesne_ID'.$th['sutunAdi']])&&isset($_X['nesne_ID'.$th['sutunAdi']])){
					$_X['nesne_ID'.$th['sutunAdi']]=0;
				}
			}
			else if($th['tip']=='text'){
				if(!empty($th['sutunAdi'])&&empty($_X[$th['sutunAdi']])&&isset($_X[$th['sutunAdi']])){
					$_X[$th['sutunAdi']]='';
				}
			}
		}
	}

}





function sayi($a,$b=NULL,$c=NULL){
	if(empty($c))return !empty($b)?str_replace('.',',',round($a,$b)):(!empty($a)?(float)str_replace(',','.',str_replace(array_merge($GLOBALS['PB'],array('%')),'',$a)):0);
	else{
		$a=str_replace(',','.',number_format((float)$a,$b));
		if($a[strlen($a)-$b-1]=='.')$a[strlen($a)-$b-1]=',';
		if($b>2)if($a[strlen($a)-1]=='0')$a[strlen($a)-1]='';
		return $a;
	}
}
function altMenu($_Menu,$s=NULL){
	/*/
	if(!empty($_Menu)){
		if(empty($s))$s=z(8,'s');
		echo '<div class="printx"><div class="altMenu">';
		if(z(8,'sgeri')||z(8,'ageri')){
			$sgeri=z(8,'sgeri');
			$ageri=z(8,'ageri');
			echo '<a href="?s='.$sgeri.(!empty($ageri)?'&a='.$ageri:'').'"><img src="img/geri.png" height="12"> <span style="vertical-align:top">Geri</span></a>';
		}


		foreach($_Menu as $ad=>$mtn){
			if(strpos($mtn,'---')){
				$xhrf=explode('---',$mtn);
				$mtn=trim($xhrf[0]);
			}
			if(!strpos($ad,'_ajxbtn')){
				$a=!empty($ad)?'&a='.$ad:'';
				echo '<a href="?s='.$s.$a.(!empty($xhrf[1])?trim($xhrf[1]):'').'" id="a_'.$ad.'">'.$mtn.'</a>';
			}
			else{
				echo '<a href="#" class="'.$ad.'" id="a_'.$ad.'">'.$mtn.'</a>';
			}
		}
		echo '&nbsp;&nbsp;&nbsp;<a href="?cikis=1" class="responsive-logout">Çıkış</a></div></div>';
	}
	/*/
}
function git($a=1){
	if(empty($a))$a=0;
	if(z(7,'git'.$a))header('Location: '.z(7,'git'.$a));die();
}
function slctrh($a='tarih',$trh=NULL,$yBas=2010,$ySon=0,$bos=0){
	$plc='yyyy-aa-gg';//z('tarih');
	if(empty($trh)&&empty($bos)){
		$trh=z('date');
	}
	/*
	if(!empty($trh)){
		if(is_string($trh)){
			$_Ex=explode(' ',$trh);
			$trh=explode('-',$_Ex[0]);
		}
		else{
			if($trh[2]>1900){
				$x=$trh[2];
				$trh[2]=$trh[0];
				$trh[0]=$x;
			}
		}
	}
	else{
		$trh=Array(date('Y'),date('m'),date('d'));
	}
	if(empty($yBas))$yBas=$trh[0];
	if(empty($ySon))$ySon=date('Y');
	echo '<select name="'.$a.'[]" class="trh_'.$a.'" tabindex="1" style="width:29%">';
	echo '<option value="0">&nbsp;</option>';
	for($i=1;$i<32;$i++){
		echo '<option value="'.substr('0'.$i,-2).'"';
		if(!empty($trh[2]))if($trh[2]==$i){
			echo ' selected';
		}
		echo '>'.$i.'</option>';
	}
	echo '</select>';
	$_Ay=Array('','Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');
	echo '<select name="'.$a.'[]" class="trh_'.$a.'" tabindex="1" style="width:38%">';
	echo '<option value="0">&nbsp;</option>';
	for($i=1;$i<13;$i++){
		echo '<option value="'.substr('0'.$i,-2).'"';
		if($trh[1]==$i){
			echo ' selected';
		}
		echo '>'.$_Ay[$i].'</option>';
	}
	echo '</select>';
	echo '<select name="'.$a.'[]" class="trh_'.$a.'" tabindex="1" style="width:29%">';
	echo '<option value="0">&nbsp;</option>';
	for($i=$yBas;$i<=$ySon;$i++){
		echo '<option value="'.$i.'"';
		if($trh[0]==$i){
			echo ' selected';
		}
		echo '>'.$i.'</option>';
	}
	echo '</select>';
	*/
	echo '<input type="text" name="'.$a.'" class="trh_'.$a.' jstarih w-4-3" value="'.$trh.'" placeholder="'.$plc.'" autocomplete="off" tabindex="1" style="background-size:contain; text-indent:24px;">';
}
function slctrh2($a='tarih',$trh=''){
	$plc='yyyy-aa-gg';//z('tarih');
	echo '<input type="text" name="'.$a.'" class="trh_'.$a.' jstarih w-4-3" value="'.$trh.'" placeholder="'.$plc.'" autocomplete="off" tabindex="1" style="background-size:contain; text-indent:24px;">';
}
function slctrhsaat($a='tarih',$trh=NULL,$yBas=2010,$ySon=0,$bos=0){
	$plc='yyyy-aa-gg hh:mm';//z('tarih');
	echo '<input type="text" name="'.$a.'" class="trh_'.$a.' jstarihsaat w-4-3" value="'.$trh.'" placeholder="'.$plc.'" autocomplete="off" tabindex="1" style="background-size:contain; text-indent:24px;">';
}
function slctrhflat($a='tarih',$trh=NULL,$yBas=2010,$ySon=0,$bos=0){
	$plc='yyyy-aa-gg';//z('tarih');
	echo '<input type="text" name="'.$a.'" class="trh_'.$a.' flatpickr w-4-3" value="'.$trh.'" placeholder="'.$plc.'" autocomplete="off" tabindex="1" style="background-size:contain; text-indent:24px;">';
}
function uyr($a,$m){return '<div class="pencerelik"><img src="img/drm'.$a.'.png" width="20"> '.$m.'</div>';}
function _uyr($a,$m){echo uyr($a,$m);}
function ytk($a,$b,$ID=NULL){static $_Ytk=array();if(empty($ID))$ID=z('lgn','ID');if(!isset($_Ytk[$ID])){$_X=z(1,"WHERE personel_ID='".$ID."'",NULL,'yetki');if(!empty($_X))foreach($_X as $x)$_Ytk[$ID][$x['tip']]=$x;else $_Ytk[$ID]=array();}return isset($_Ytk[$ID][$a][$b])?$_Ytk[$ID][$a][$b]:0;}
function kur($fyt,$bnu=NULL,$bna=NULL,$trh=NULL){
	if(!empty($fyt)&&$fyt>0){
		if(empty($bnu))$bnu=$GLOBALS['pbT'];
		if(empty($bna))$bna=$GLOBALS['pbT'];
		if(empty($trh))$trh=date('Y-m-d');
		$sd="WHERE tarih LIKE '".substr($trh,0,10)."%' LIMIT 1";
		$x=z(1,$sd,NULL,'kur');
		if(empty($x)){kurGuncelle($trh);$x=z(1,$sd,NULL,'kur');}
		$PBD=$x[0];$PBD['TRY']=1;
		return !empty($PBD[$bnu])&&!empty($PBD[$bna])?$fyt*$PBD[$bnu]/$PBD[$bna]:$fyt;
	}
	else return 0;
}

function kurOku($kT=NULL,$tip='ForexBuying'){//ForexBuying ForexSelling BanknoteSelling BanknoteBuying
	$_Kur=NULL;
	if(empty($kT))$kT=date('Y-m-d');
	$kT=strstr($kT,' ',true);
	$kT=explode('-',$kT);
	// Tarih bu gün ise 3:30 dan önceki kuru kullan
	if($kT[0]==date('Y')&&$kT[1]==date('m')&&$kT[2]==date('d')&&(date('H')+(date('i')/60)>15.5))$kT[2]--;
	$kT[1]=!empty($kT[1])?substr('0'.$kT[1],-2):'01';
	$kT[2]=!empty($kT[2])?substr('0'.$kT[2],-2):'01';
		//echo 'http://www.tcmb.gov.tr/kurlar/'.$kT[0].$kT[1].'/'.$kT[2].$kT[1].$kT[0].'.xml<br>';
	for($i=0;$i<50;$i++){
		$xml=@simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$kT[0].$kT[1].'/'.$kT[2].$kT[1].$kT[0].'.xml');

		if(!empty($xml)){
			$_Kur=array();
			foreach($xml->Currency as $c)if($c->Unit==1)$_Kur[(string)$c['Kod']]=(float)$c->$tip;
			break;
		}
		else {
			$tm=strtotime($kT[0].'-'.$kT[1].'-'.$kT[2].' -1 day');
			$kT[2]=date('d',$tm);
			$kT[1]=date('m',$tm);
			$kT[0]=date('Y',$tm);
		}
	}
	//die;
	return $_Kur;
}
function kurGuncelle($kT){
	if(!z(5,"WHERE tarih='".$kT."'",NULL,'kur')){
		$_Kur=kurOku($kT);
		if(!empty($_Kur)){
			$_Kur['TRY']=1;
			$_xK['tarih']=$kT;
			foreach($GLOBALS['PB'] as $fei=>$fed)$_xK[$fei]=$_Kur[$fei];
			z(2,$_xK);
		}
	}
}
function upload($_Ayr){
	if(empty($_Ayr['dizin']))$_Ayr['dizin']=__DIR__.'/upload';
	$bunu=Array('ğ','ü','ş','ç','ö','ı','Ğ','Ü','Ş','Ç','Ö',' ','%','+');
	$buna=Array('g','u','s','c','o','i','G','U','S','C','O','_','_','_');
	$dui=str_replace($bunu,$buna,$_Ayr['name']);
	if(file_exists($_Ayr['dizin'].'/'.$dui)){
		$exp=explode('.',$dui);
		$uznt=$exp[count($exp)-1];
		unset($exp[count($exp)-1]);
		$j=0;do{$j++;
			$dui='';
			foreach($exp as $xp){
				if(!empty($dui))$dui.='.';
				$dui.=$xp;
			}
			$dui.='('.$j.').'.$uznt;
		}while(file_exists($_Ayr['dizin'].'/'.$dui));
	}
	if(move_uploaded_file($_Ayr['tmp_name'],$_Ayr['dizin'].'/'.$dui))
	return $dui;
	else return 0;
}
function dosya($ad='dosya',$_Ayr=NULL){
	if(empty($ad))$ad='dosya';
	if(empty($_Ayr['dizin']))$_Ayr['dizin']='upload';
	$_Dosya=z(10,$ad);
	$bsrm=0;$sizx=0;$typx=0;
	if(!empty($_Dosya))foreach($_Dosya as $d){if(empty($d['error'])){
		if(empty($_Ayr['maxsize'])||($d['size']<=$_Ayr['maxsize'])){
			if(empty($_Ayr['type'])||(in_array($d['type'],$_Ayr['type']))){
				$d['name']=upload(array('name'=>$d['name'],'tmp_name'=>$d['tmp_name']));
				if($d['name'])
				if(z(2,array(
					'nesne'=>!empty($_Ayr['nesne'])?$_Ayr['nesne']:'',
					'nesneID'=>!empty($_Ayr['nesneID'])?$_Ayr['nesneID']:0,
					'type'=>$d['type'],
					'name'=>$d['name'],
					'size'=>$d['size'],
					'tarih'=>z('datetime')
				),'dosya'))$bsrm++;
			}else $typx++;
		}else $sizx++;
	}}
	if($bsrm==count($_Dosya))return 1;
	else if($bsrm&&$sizx)return 2; // Dosyaların bazıları boyutu aşıyor
	else if($bsrm&&$typx)return 3; // Dosyaların bazılarının türü desteklenmiyor
	else if($sizx)return 4; // Dosyaların boyutları maximum boyutu aşıyor
	else if($typx)return 5; // Dosyaların türleri desteklenmiyor
	else return -1;
}
function sifrele($a){return md5($a);}
function mtn($mtn){return str_replace("\n",'<br />',$mtn);}

function gstr($ad,$_X=NULL,$a=1){return '<input type="checkbox" name="'.$GLOBALS['tbl'].'[goster]['.$ad.']" value="1" '.(!empty($_X['goster'][$ad])||(!isset($_X['goster'])&&$a)?'checked':'').' tabindex="4" class="printx" title="Etikette görünsün mü?" />';}
function gstr2($ad,$_X){return !empty($_X['goster'][$ad])?'<img src="img/drm1.png" height="12" title="Etikette görüntüleniyor." class="printx" />':'';}
function geri($a='listele',$id=NULL){echo '<a href="?s='.$GLOBALS['syf'].'&a='.$a.(!empty($id)?'&id='.$id:'').'" class="geri">&nbsp;</a><span>';}
function qs($_R=NULL,$a=false,$b=''){
	if(empty($a))$_QS=explode('&',$_SERVER['QUERY_STRING']);
	if(!empty($_QS))foreach($_QS as $fe){
		$exp=explode('=',$fe);
		if(!isset($_R[$exp[0]])){
			$_R[$exp[0]]=$exp[1];
		}
		else if($_R[$exp[0]]===''){
			unset($_R[$exp[0]]);
		}
	}
	return http_build_query($_R).$b;
}
function k($a,$b=''/*'_BOS_'*/){
	return !empty($a)?str_replace(array('-','"',"'",'/','\\','(',')','[',']','{','}','@','*','=',':','~',',','.','&','%','+','<','>','|','½','$','£'), '_', $a):$b;
}



function listeleTfoot($c=3,$tip=1,$dty=''){
		$admn=$GLOBALS['admn'];
		$syf=$GLOBALS['syf'];
		// tip 1 full
		// tip 2 arşiv eksik
		?>
	    <tfoot class="printx">
	        <tr>
	            <th>
	                <input class="tumunuSec" type="checkbox">
	            </th>
	            <th colspan="<?Php echo /*(!empty($GLOBALS['_NSN'])?count($GLOBALS['_NSN']):0)*/
	            	+($tip!=2&&($admn||ytk($syf,'arsivle'))?1:0)
	            	+($admn||ytk($syf,'sil')?1:0)
	            	-($tip!=3?1:0)
	            	+$c-2;
	            	?>">
	                <script type="text/javascript">
	                    $(document).ready(function(e) {
	                        $('#topluIslemForm').submit(function(e) {
	                            return confirm('Seçili girdilere seçili işlemi uyarlamak istediğinizden emin misiniz?');
	                        });
	                    });
	                </script>
	                <select name="islemTip" id="islemSlct" class="buyuk-select w-200" style="box-sizing: border-box;">
	                    <option value="">&nbsp;&nbsp;&nbsp;</option>
	                    <?php if($admn||ytk($syf,'sil')){?>
	                    <option value="sil">Seçilileri Sil</option>
	                    <?php } ?>
						<?php if(z(8,'s')=='kumaskarti'){?>
	                    <option value="sticker">Seçilileri Sticker olarak yazdır </option>
	                    <?php } ?>
	                    <?php if($tip==1&&($admn||ytk($syf,'arsivle'))){?>
	                    	<?Php if(strpos(z(8,'a'),'_arsv')){ ?>
	                    <option value="arsivac">Seçilileri Arşivden Geri Al</option>
	                    	<?php } else { ?>
	                    <option value="arsivle">Seçilileri Arşive Taşı</option>
	                    	<?php }?>
	                    <?php }?>

	                    <?php if(!empty($dty['cokluIslem']))foreach ($dty['cokluIslem'] as $fei => $fev) {
	                    	echo '<option value="'.$fei.'">'.$fev.'</option>';
	                    } ?>
	                </select><!--
	             --><input type="submit" name="silsub" id="silSub" class="buyuk-select w-100" style="height: 36px;line-height: 0;margin-top:-1px;vertical-align: top;box-sizing: border-box;" value="Uygula" />
	            </th>
	        </tr>
	    </tfoot>
	    <?php
}


	function p($aln,$tip,$inm='',$tab='',$dty=''){ 
		//echo $aln.' '.$tip.' '.$inm.' '.$tab.' '.$dty;
		$admn=$GLOBALS['admn'];
		$syf=$GLOBALS['syf'];
		

		// Atkı çözgü döngüden ufak olarak geliyor
		$xac=!empty($GLOBALS['xac'])?$GLOBALS['xac']:'';

		$dgr='';
				
		if(!empty($GLOBALS['_X'])){
			$_X=$GLOBALS['_X'];
			$acaln=str_replace('.','',strstr($aln, '.'));
			if(empty($acaln)){
				switch ($tip) {
					case 'nesne':
						$dgr=!empty($_X['nesne_ID'.$aln])?$_X['nesne_ID'.$aln]:'';
						break;
					
					default:
						$dgr=!empty($_X[$aln])?$_X[$aln]:'';
						break;
				}
			}
			else{
				$dgr=!empty($xac[$acaln])?$xac[$acaln]:'';
			}
		}



		if(!empty($GLOBALS['duzenleA'])){
			switch ($tip) {
				case 'metin':
					echo '<input type="text" name="'.$inm.'"  '.$dty.'
						autocomplete="off"
						value="'.(!empty($dgr)?$dgr:'').'" 
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').'
					>';
					break;
				case 'buyukmetin':
					echo '<textarea name="'.$inm.'" '.$dty.' 
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').'
					>'.$dgr.'</textarea>';
					break;
				
				case 'ondalik':
					echo '<input type="text" name="'.$inm.'" '.$dty.'
						onchange="hesap.hesapTetik(event)" 
						onkeyup="hesap.hesapTetik(event)" 
						autocomplete="off"
						placeholder="0" 
						value="'.(!empty($dgr)?z('sayi',$dgr,2):'').'" 
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').'
					>';
					break;
				
				case 'ufakondalik':
					echo '<input type="text" name="'.$inm.'" '.$dty.'
						onchange="hesap.hesapTetik(event)" 
						onkeyup="hesap.hesapTetik(event)" 
						autocomplete="off"
						placeholder="0" 
						value="'.z('sayi',$dgr,2).'" 
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').' 
						style="width:20px;"
					>';
					break;

				case 'lira':
					echo '<input type="text" name="'.$inm.'" '.$dty.'
						onchange="hesap.hesapTetik(event)"
						onkeyup="hesap.hesapTetik(event)"
						autocomplete="off"
						placeholder="₺0,00"
						value="'.(!empty($dgr)?z('sayi',$dgr,2):'').'" 
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').' 
					>';
					break;
				case 'usd':
					echo '<input type="text" name="'.$inm.'" 
						onchange="hesap.hesapTetik(event)" 
						onkeyup="hesap.hesapTetik(event)" 
						autocomplete="off"
						placeholder="$0,00" 
						value="'.(!empty($dgr)?z('sayi',$dgr,2):'').'"
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').' 
					>';
					break;
				case 'eur':
					echo '<input type="text" name="'.$inm.'" 
						onchange="hesap.hesapTetik(event)" 
						onkeyup="hesap.hesapTetik(event)" 
						autocomplete="off"
						placeholder="€0,00" 
						value="'.(!empty($dgr)?z('sayi',$dgr,2):'').'"
						'.(!empty($tab)?'tabindex="'.$tab.'"':'').' 
					>';
					break;
				
				case 'nesne':
					echo select(Array('name'=>$inm,
						'detay'=>$dty.'
						'.(!empty($tab)?'tabindex="'.$tab.'"':'')
						,'t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='".$aln."'",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$aln])?$_X['nesne_ID'.$aln]:0));
					break;
				case 'tarih':
					_z('tarih');
					echo '<input type="hidden" value="'.z('datetime').'">';
					break;
				case 'gizli':
					echo '<input type="hidden" name="'.$inm.'" '.$dty.' value="'.(!empty($dgr)?z('sayi',$dgr,2):'').'" >';
					break;
				case 'sadecegorsel':
					echo '<span '.$dty.' name="'.$inm.'">'.(!empty($dgr)?$dgr:'').'</span>';
					echo '<input type="hidden" name="'.$inm.'" value="'.(!empty($dgr)?$dgr:'').'" />';
					break;

				case 'buton':
					switch ($aln) {
						case 'kaydet':
							echo '<input type="submit" style="padding:1em" class="mr4"  value="'.(empty($_X['ID'])?$inm[0]:$inm[1]).'">';
							break;
						case 'farklikaydet':
							if(!empty($_X['ID'])){
								echo '<input type="submit" name="farklikaydet" style="padding:1em;" id="hmkmsstk_farklikaydet_btn" class="mr4-b" value="'.$inm.'">';
							}
							break;
						
						case 'cozguEkle':
							echo '
								<div style="display:table;">
									<input type="button" class="btnEkleTuruncu" value="&nbsp;" tabindex="2" onclick="hesap.cozguEkle()">
									<label><input type="checkbox" id="cozguSecimiBaslat" checked="checked" > Seçimi Başlat</label>
								</div>';
							break;
						
						case 'atkiEkle':
							echo '
								<div style="display:table;">
									<input type="button" class="btnEkleMavi" value="&nbsp;" tabindex="2" onclick="hesap.atkiEkle()">
									<label><input type="checkbox" id="atkiSecimiBaslat" checked="checked" > Seçimi Başlat</label>
								</div>';
							break;

						case 'hamkumasstok':
							switch ($aln) {
								case 'kumasIsmi':
									echo select(Array('name'=>$inm,
										'detay'=>$dty.'
										'.(!empty($tab)?'tabindex="'.$tab.'"':'')
										,'t'=>$tip,'alan'=>'ID,kumasIsmi,numuneIsmi','ayrac'=>' /// ','sd'=>"WHERE arsiv='0' AND (kumasIsmi<>'' OR numuneIsmi<>'')",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X[$tip.'_ID'])?$_X[$tip.'_ID']:0));
									break;
								default:
									echo !empty($dgr)?'<b>'.$dgr.'</b>':'';
									break;
							}
							
							break;

						default:
							# code...
							break;
					}

					break;

				case 'iplikno':
					echo '<input type="hidden" name="'.$inm.'" value="'.(!empty($dgr)?$dgr:0).'" >'.
					'<span style="color:white;font-size:14px;" class="'.str_replace(array('iplikno_ID','[',']'),array('ipliknoAd','_','_'),$inm).'" >'.(!empty($dgr)?z(1,$dgr,'ad','iplikno'):'').'</span>';
					break;

				case 'hamkumasstok':
					if($aln=='kumasIsmi')
					echo select(Array('name'=>$inm,
						'detay'=>$dty.'
						'.(!empty($tab)?'tabindex="'.$tab.'"':'')
						,'t'=>$tip,'alan'=>'ID,kumasIsmi,numuneIsmi','ayrac'=>' /// ','sd'=>"WHERE arsiv='0' AND (kumasIsmi<>'' OR numuneIsmi<>'')",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X[$tip.'_ID'])?$_X[$tip.'_ID']:0));
					break;

				default:
					# code...
					break;
			}
		}
		else{

			switch ($tip) {
				case 'metin':
					echo $dgr;
					break;
				case 'buyukmetin':
					echo str_replace("\n",'<br>',$dgr);
					break;
				case 'ondalik':
					_z('sayi',$dgr,2,1);
					break;
				case 'ufakondalik':
					_z('sayi',$dgr,2,1);
					break;
				case 'lira':
					echo '₺'.z('sayi',$dgr,2,1);
					break;
				case 'usd':
					echo '$'.z('sayi',$dgr,2,1);
					break;
				case 'eur':
					echo '€'.z('sayi',$dgr,2,1);
					break;
				case 'nesne':
					if(!empty($dgr))_z(1,$dgr,'metin1','nesne');
					break;
				case 'tarih':
					_z('tarih',$dgr);
					break;

				case 'buton':
					switch ($aln) {
						case 'kaydet':
							if($admn||ytk($syf,'duzenle'))
							echo '<a href="?s='.z(8,'s').'&a=duzenle&id='.$_X['ID'].'" class="btn4"><img src="img/duzenle.png" height="20" /> <span style="display:inline-block;vertical-align:top;line-height:20px;">DÜZENLE</span></a>';
							break;
						case 'farklikaydet':
							if($admn||ytk($syf,'ekle'))
							echo '<a href="?s=dokumastok&a=dokumastok&hamkumasstok_ID='.$_X['ID'].'" class="btn4"><img src="img/ekle.png" height="20" /> <span style="display:inline-block;vertical-align:top;line-height:20px;">SİPARİŞ AÇ</span></a>';
							break;
						case 'cozguGiriscikis':
							echo '<a href="?s='.z(8,'s').'&a=iplikgiriscikis&id='.$_X['ID'].'" class="btn4"><img src="img/giris4.png" height="20" /> <span style="display:inline-block;vertical-align:top;line-height:20px;">GİRİŞ/ÇIKIŞ</span></a>';
							break;
					}
					break;
				// Özel değerler

				case 'iplikno':
					echo '<span style="color:white;font-size:14px;">'.z(1,$dgr,'ad','iplikno').'</span>';
					break;

				case 'hamkumasstok':
					echo !empty($dgr)?'<b>'.$dgr.'</b>':'';
					break;
			}

			

		}

	}

function __($a,$b='',$c='',$d=''){
	echo '<pre>'; print_r($a); print_r($b); print_r($c); print_r($d); die;
}

function boyatakipFireHesapFonksiyonu($yh){
	

		$yh_boyatakip=z(1,$yh['ID'],'ID,fireOrani,fireHesapDegeri,gelen1K,gelen1A,gelen2K,mgelen1K,mgelen1A,mgelen2K,sevk1K,sevk1A,sevk2K',$yh['tbl']);
		$toplamGirenMt=($yh_boyatakip['gelen1K']+$yh_boyatakip['gelen1A']+$yh_boyatakip['gelen2K'] + $yh_boyatakip['mgelen1K']+$yh_boyatakip['mgelen1A']+$yh_boyatakip['mgelen2K']);
		//echo '<pre>'; print_r($yh_boyatakip);
		
		if(($yh_boyatakip['sevk1K']+$yh_boyatakip['sevk1A'])>$toplamGirenMt){
			if($toplamGirenMt>0){
			    $yh_boyatakip['fireOrani'] = $fire = ( ($yh_boyatakip['sevk1K']+$yh_boyatakip['sevk1A']) / $toplamGirenMt ) * 100;
			}
		}
		else{
			$yh_boyatakip['fireOrani'] = $fire = (1 - ( ($yh_boyatakip['sevk1K']+$yh_boyatakip['sevk1A']) / $toplamGirenMt ) )* 100;
		}
		
		if($yh_boyatakip['fireOrani']<$yh_boyatakip['fireHesapDegeri']){
			$yh_boyatakip['fireMt'] = 0;
		}
		else if($yh_boyatakip['fireOrani']>100){

			$yh_boyatakip['fireMt'] = 0;
		}
		else
			$yh_boyatakip['fireMt'] = ((1- ($yh_boyatakip['fireHesapDegeri']/100) * $toplamGirenMt ) - (1-($fire/100)*$toplamGirenMt) );
		//__($yh_boyatakip,$toplamGirenMt,' -- '.$fire);

		unset($yh_boyatakip['ID']);
		z(3,$yh['ID'],$yh_boyatakip);

		return $yh_boyatakip;
}

function smtpMailGonder($kime, $konu, $icerik, $gonderenAdi, $replyPosta="",$file=""){
		$alici = $kime;
		$subject = $konu;
		$message = $icerik;
		$pName=$gonderenAdi;
		$rplyEmail=$replyPosta;
		$rplyFile=$file;

		require(__DIR__.'/class/smtp-gonderici/manuel-gonderim.php');

		return $mailSonuc;
}

// Bulutfon fonksiyonu
require(__DIR__.'/class/bulutfon/bulutfon_api.php');

// OneSignal fonksiyonu
require(__DIR__.'/class/onesignal/onesignal_api.php');

// Modüler Fonksiyonular (Modül yüklü ise yükle)
if(file_exists(__DIR__.'/sayfa/zamanlanmisgorev/zamanlanmis-gorev-ekle_fonk.php')){
	require(__DIR__.'/sayfa/zamanlanmisgorev/zamanlanmis-gorev-ekle_fonk.php');
}


function bulunan($ad,$dgr){return !empty($GLOBALS['_G'][$ad])?str_replace($GLOBALS['_G'][$ad],'<u>'.$GLOBALS['_G'][$ad].'</u>',$dgr):$dgr;}
function duzenlenebilir($tip,$ad,$ozl_tbl='',$aln2=''){
		static $tix=array(),$i=0;
		$ilk=$i==0;
		if(empty($tix[$ad])){
			$i++;
			$tix[$ad]=$i;
		}
		$x=!empty($GLOBALS['x'])?$GLOBALS['x']:'';
		$_Nesne=!empty($GLOBALS['_Nesne'])?$GLOBALS['_Nesne']:'';
		if($GLOBALS['dznA']==false){
			switch ($tip) {
				case 'sayi':
					return !empty( $x[$ad] ) ? z('sayi',$x[$ad],2) : 0;
					break;
				case 'nesne':
					return (!empty($_Nesne[$x['nesne_ID'.$ad]]['metin1'])?$_Nesne[$x['nesne_ID'.$ad]]['metin1']:'&nbsp;');
					break;
				case 'tablo':
					if(!empty($ozl_tbl) && !empty($ad)){

						$_X=!empty($GLOBALS['_'.ucfirst($ozl_tbl)])?$GLOBALS['_'.ucfirst($ozl_tbl)]:'';
						return (!empty($_X[$x[$ozl_tbl.'_ID']][$ad])?$_X[$x[$ozl_tbl.'_ID']][$ad]:'&nbsp;');

					}
					else return "alan adı boş";
					break;
				default:
					return !empty( $x[$ad] ) ? $x[$ad] : '';
					break;
			}
		}
		else{
			switch ($tip) {
				case 'sayi':
					return '<input name="'.$GLOBALS['tbl'].'['.$x['ID'].']['.$ad.']" tabindex="'.$tix[$ad].'" '.($ilk?'autofocus="autofocus"':'').' value="'.(!empty( $x[$ad] ) ? z('sayi',$x[$ad],2) : '').'" >';
					break;

				case 'nesne':
					$icrk='<select name="'.$GLOBALS['tbl'].'['.$x['ID'].'][nesne_ID'.$ad.']">
					<option value="0">&nbsp;</option>';
					if(!empty($_Nesne)){
						foreach ($_Nesne as $nsn) {
							if($nsn['ad']==$ad){
								$icrk.='<option value="'.$nsn['ID'].'" '. ($nsn['ID']==$x['nesne_ID'.$ad]?'selected="selected"':'') .'>'.$nsn['metin1'].' '.$nsn['metin2'].'</option>';
							}
						}
					}
					else $icrk.='<option>Seçenek bulunamadı!</option>';
					$icrk.='</select>';
					return $icrk;

				case 'tablo':

					if(!empty($ozl_tbl) && !empty($ad)){

						$_X=!empty($GLOBALS['_'.ucfirst($ozl_tbl)])?$GLOBALS['_'.ucfirst($ozl_tbl)]:'';
						$icrk='<select name="'.$GLOBALS['tbl'].'['.$x['ID'].']['.$ozl_tbl.'_ID]">
						<option value="0">&nbsp;</option>';
						if(!empty($_X)){
							foreach ($_X as $fed) {
								//if($fed['ad']==$ad){
									$icrk.='<option value="'.$fed['ID'].'" '. ($fed['ID']==$x[$ozl_tbl.'_ID']?'selected="selected"':'') .'>'.$fed[$ad].' '/*.(!empty($x[$aln2])?$x[$aln2]:$x[$aln2])*/.'</option>';
								//}
							}
						}
						else $icrk.='<option>Seçenek bulunamadı!</option>';
						$icrk.='</select>';
						return $icrk;

					}
					else return "alan adı boş";

				default:
					return '<input name="'.$GLOBALS['tbl'].'['.$x['ID'].']['.$ad.']" tabindex="'.$ad.'" value="'.(!empty( $x[$ad] ) ? $x[$ad] : '').'" >';
					break;
			} 
		}
	}
?>