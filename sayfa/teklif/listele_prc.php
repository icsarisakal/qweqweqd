<?Php
$_G=z(7,'ara'.$syf);
if(empty($_G)){
	if($araHA&&z(11,'ara'.$syf)){
		$_G=z(11,'ara'.$syf);
	}
}
$firmaysorgu='';
$firmaysorgu2='';
if(!empty($_G)){
	if(!empty($_G['bolge_ID'])){
		$bolgesorgu=array_filter($_G['bolge_ID']);
		$srogo=z(11,'bolgesorgu',$bolgesorgu);
		$srogoku=z(11,'bolgesorgu');
		$yenibsorgu='(';
		foreach ($bolgesorgu as $bs) {
			$yenibsorgu.='bolge_ID = '.$bs.' OR ';
		}
		$yenibsorgu.='123213';
		$yenibsorgu=str_replace('OR 123213', '', $yenibsorgu);
		$yenibsorgu.=')';
		$firmalarioku=z(1,'WHERE '.$yenibsorgu,'ID','firma');
		if(!empty($firmalarioku)){
		$firmaysorgu='(';
			foreach ($firmalarioku as $foku) {
				$firmaysorgu.='firma_ID = '.$foku.' OR ';
			}
		$firmaysorgu.='123213';
		$firmaysorgu=str_replace('OR 123213', '', $firmaysorgu);
		$firmaysorgu.=')';
		}
		unset($_G['bolge_ID']);
	}
	if(!empty($_G['sehir_ID'])){
		$bolgesorgu=array_filter($_G['sehir_ID']);
		$yenibsorgu='(';
		foreach ($bolgesorgu as $bs) {
			$yenibsorgu.='sehir_ID = '.$bs.' OR ';
		}
		$yenibsorgu.='123213';
		$yenibsorgu=str_replace('OR 123213', '', $yenibsorgu);
		$yenibsorgu.=')';
		$firmalarioku=z(1,'WHERE '.$yenibsorgu,'ID','firma');
		if(!empty($firmalarioku)){
		$firmaysorgu2='(';
			foreach ($firmalarioku as $foku) {
				$firmaysorgu2.='firma_ID = '.$foku.' OR ';
			}
		$firmaysorgu2.='123213';
		$firmaysorgu2=str_replace('OR 123213', '', $firmaysorgu2);
		$firmaysorgu2.=')';
		}
		unset($_G['sehir_ID']);
	}
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihKayit','tarihVade','tarihDogum'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('proformaNo','vergiD','adres','urunadi','ozallik','sartlar'))){
					if($dgr[0]!='@'){
						$araSd.=$ad." LIKE '%".$dgr."%'";
					}
					else{
						$dgr=str_replace("@",'',$dgr);
						$araSd.=$ad."='".$dgr."'";
					}
				}
				//Sayısal Değer
				else if(in_array($ad,Array('fiyat','gramaj','cekmeEn'))){
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
$araSd=$araSd.(!empty($firmaysorgu)?" AND ".$firmaysorgu:'').(!empty($firmaysorgu2)?" AND ".$firmaysorgu2:'');
//echo $araSd;
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

$durumsorgu='';

if(z(8,'a')=='listele_durum0'){
	$durumsorgu='AND teklifdurum = 0';
}

if(z(8,'a')=='listele_durum1'){
	$durumsorgu='AND teklifdurum = 1';
}

if(z(8,'a')=='listele_durum2'){
	$durumsorgu='AND teklifdurum = 2';
}

if(z(8,'a')=='listele_durum3'){
	$durumsorgu='AND teklifdurum = 3';
}

if(z(8,'a')=='listele_durum4'){
	$durumsorgu='AND teklifdurum = 4';
}

if(z(8,'a')=='listele_durum5'){
	$durumsorgu='AND teklifdurum = 5';
}

if(z(8,'a')=='listele_durum10'){
	$durumsorgu='AND teklifdurum = 10';
}
$_X=z(1,"WHERE ".$arsvsd.$durumsorgu.$araSd." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){

	

	$_Nesne=z(37,z(1,"WHERE ad='rehberGrup'",'ID,ad,metin1,metin2','nesne'));
	$_NesneDurum=z(37,z(1,"WHERE ad='teklifdurum'",'ID,sayi1,metin1,metin2,metin3,metin4','nesne'),'sayi1');
	//$_NesneTip=z(37,z(1,"WHERE ad='tip'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');

	$_Firma=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'firma_ID'),'ID,ad,sehir_ID,bolge_ID','firma'));
	
	$_Kisi=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'kisi_ID'),'ID,ad,soyad','kisi'));
	$_Personel=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'personel_ID'),'ID,ad,soyad','personel'));
	
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');


	// Altta ve üstte beliren toplam satırı için dizi tanımlama
	$_Toplam=array(
		'gramaj'=>0
	);


	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;

			$Fsehir=(!empty($_Firma[$x['firma_ID']]['sehir_ID'])?$_Firma[$x['firma_ID']]['sehir_ID']:'&nbsp;');
			$Fbolge=(!empty($_Firma[$x['firma_ID']]['bolge_ID'])?$_Firma[$x['firma_ID']]['bolge_ID']:'&nbsp;');
			$sehiroku='';
			$bolgeoku='';
			if(!empty($Fsehir)){
				$sehircek=z(1,"WHERE sehir_key = ".$Fsehir,'','sehir');
				$sehiroku=$sehircek[0]['sehir_title'];
			}
			if(!empty($Fbolge)){
				$bolgecek=z(1,"WHERE bolge_ID = ".$Fbolge,'','bolge');
				$bolgeoku=$bolgecek[0]['ad'];
			}
			//$_Sehir=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_Firma,'sehir_ID'),'','sehir'));
			
			// Toplanacak değerleri toplam değişkenine ekle
			$_Toplam['gramaj'] += !empty($x['gramaj'])?$x['gramaj']:0;



			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 
			echo '
		
				<tr class="allcheck tr'.($i%2?1:2).' durum_'.$x['teklifdurum'].' "  >
				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td>'.$i.'</td>

				'./*<td><img src="img/drm'.$_Drm[$x['onayli']][0].'.png" title="'.$_Drm[$x['onayli']][1].'" height="20" /></td>*/'
				
				<td colspan="1">
					'.
					// Detay adı görüntüleme
					($admn||$ytkDty?
						'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.bulunan('proformaNo',$x['proformaNo']).(!empty($x['revizeNo'])&&$x['teklif_ID']!=0?'(RVZ'.$x['revizeNo'].')':'&nbsp;').'</a>'
						: bulunan('proformaNo',$x['proformaNo']) 
					).
					($admn||$ytkDzn?
						'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" class="dzn"></a>'
						: ''
					).
					'
				</td>
                

				<td>'.
					(!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'&nbsp;').
					(!empty($_Firma[$x['firma_ID']]['ilgili'])?' / '.$_Firma[$x['firma_ID']]['ilgili']:'&nbsp;').
				'</td>
				<td>'.
					(!empty($_Kisi[$x['kisi_ID']]['ad'])?$_Kisi[$x['kisi_ID']]['ad']:'&nbsp;').' '.
					(!empty($_Kisi[$x['kisi_ID']]['soyad'])?$_Kisi[$x['kisi_ID']]['soyad']:'&nbsp;').
				'</td>
				<td>
				'.(!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'&nbsp;').(!empty($_Personel[$x['personel_ID']]['soyad'])?'&nbsp;'.$_Personel[$x['personel_ID']]['soyad']:'').'
				</td>
				<td>'.(!empty($bolgeoku)?$bolgeoku:'&nbsp;').'</td>
				<td>'.(!empty($sehiroku)?$sehiroku:'&nbsp;').'</td>
				<td>'.
					(!empty($_NesneDurum[$x['teklifdurum']]['metin1'])?$_NesneDurum[$x['teklifdurum']]['metin1']:'&nbsp;').
				'</td>
			    <td>'.(!empty($x['fiyat'])?bulunan('fiyat',z(36,$x['fiyat'],2,1)):'0').' TL</td> 
				<td>'.(!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'&nbsp;').'</td>				

				'./*/'
				<td>'.(!empty($x['sartlar'])?z('metin',bulunan('sartlar',$x['sartlar'])):'&nbsp;').'</td>
				<td>'.(!empty($x['ozellik'])?z('metin',bulunan('ozellik',$x['ozellik'])):'&nbsp;').'</td>
				<td>'.(!empty($x['adres'])?z('metin',bulunan('adres',$x['adres'])):'&nbsp;').'</td>
				<td>'.(!empty($x['VergiD'])?z('metin',bulunan('VergiD',$x['VergiD'])):'&nbsp;').'</td>
				<td>'.(!empty($x['urunAdi'])?bulunan('urunAdi',z(36,$x['urunAdi'],2)):'&nbsp;').'</td>
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
			if($admn||ytk($tbl,'arsivle')){
				if(empty($x['arsiv']))echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&ida1='.$x['ID'].'" title="Siparişi arşive gönder." onClick="return confirm(\'Siparişi arşive göndermek istediğinizden emin misiniz?\');">Arşivle</a></td>';
				else echo '<td class="printx"><a href="?s='.$tbl.'&a=listele_arsv'.$x['arsiv'].'&ida0='.$x['ID'].'" title="Siparişi arşivden çıkart." onClick="return confirm(\'Siparişi arşivden çıkartmak istediğinizden emin misiniz?\');">Geri al</a></td>';
			}
			if(($admn||ytk($tbl,'sil'))&&!$dznA)echo '<td class="printx"><a href="?s='.$tbl.'&a=listele&idx='.$x['ID'].'" onClick="return confirm(\'Silmek istediğinizden emin misiniz?\');">x</a></td>';
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
		$phpExcelCols=array('A1'=>'NO','B1'=>'PROFORMA NO','C1'=>'İLGİLİ FİRMA','D1'=>'İLGİLİ KİŞİ','E1'=>'SON DURUM','F1'=>'TEKLİF TUTARI','G1'=>'KAYIT TARİHİ');
		$basH='A'; $sonH='G';
		$phpExcelStyle=$basH.'1:'.$sonH.'1';
		foreach($phpExcelCols as $fei=>$fed)
        $objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);
		
                        
		foreach($_X as $i=>$x){$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
										  ->setCellValue('B'.($i+1),!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'-')
										  //->setCellValue('C'.($i+1),!empty($_Kisi[$x['kisi_ID']]['ad'])?$_Kisi[$x['kisi_ID']]['ad']:'-')
										  //->setCellValue('D'.($i+1),!empty($_NesneDurum[$x['teklifdurum']]['metin1'])?$_NesneDurum[$x['teklifdurum']]['metin1']:'-')
										  //->setCellValue('E'.($i+1),!empty($x['fiyat'])?z(36,$x['fiyat'],2,1):'-')
										  //->setCellValue('F'.($i+1),!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'-')7
										  ;
										  
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