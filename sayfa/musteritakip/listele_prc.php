<?Php
$silme=z(8,'idx');
if(!empty($silme)){
	z(3,$silme,array('arsiv'=>'-1'),$tbl);
	$asamacek=z(1,array('modul_ID'=>$silme,'modul'=>$tbl),'','asama');
	if(!empty($asamacek))
		foreach ($asamacek as $ascek) {
			z(3,$ascek['ID'],array('arsiv'=>'-1'),'asama');
		}
	}
	?>
	<?php
	$changeasama=z(7,'asama');
	$changeasamaid=z(7,'asamaid');
	if(!empty($changeasama)&&$changeasamaid){
		z(3,$changeasamaid,array('asama'=>$changeasama),$tbl);
		z(2,array('personel_ID'=>z('lgn','ID'),'modul_ID'=>$changeasamaid,'durum'=>$changeasama,'tarih'=>z('datetime'),'modul'=>$tbl),'asama');
		$teklifcek=z(1,array('musteritakip_ID'=>$changeasamaid),'','teklif');
		if(!empty($teklifcek)){
			if($changeasama==11){
				foreach ($teklifcek as $tcek) {
					if($tcek['teklifdurum']!=2){
						z(3,$tcek['ID'],array('teklifdurum'=>2,'tarihDurum'=>z('datetime')),'teklif');
					}
				}
			}
			if($changeasama==10){
				foreach ($teklifcek as $tcek) {
					if($tcek['teklifdurum']!=10){
						z(3,$tcek['ID'],array('teklifdurum'=>10,'tarihDurum'=>z('datetime')),'teklif');
					}
				}
			}
		}
	}
	if(!empty($changeasamaid)&&empty($changeasama)){
		z(3,$changeasamaid,array('asama'=>$changeasama),$tbl);
	//z(2,array('personel_ID'=>z('lgn','ID'),'modul_ID'=>$changeasamaid,'durum'=>$changeasama,'tarih'=>z('datetime'),'modul'=>$tbl),'asama');
	}
	$_G=z(7,'ara'.$syf);
	if(empty($_G)){
		if($araHA&&z(11,'ara'.$syf)){
			$_G=z(11,'ara'.$syf);
		}
	}
	$musteritakiptopla='';
	if(!empty($_G)){
		$sehirtemizle=(!empty($_G['sehir_ID'])?array_filter($_G['sehir_ID']):'');
		if(!empty($sehirtemizle)&&in_array('_sifir', $sehirtemizle)){
			$musteritakiptopla='firma_ID = 0';
		}
		unset($_G['sehir_ID']);
		$sehirtopla='(';
		if (!empty($sehirtemizle)){
			foreach ($sehirtemizle as $shroku) {
				$shroku=str_replace('_sifir', '0', $shroku);
				$sehirtopla.='sehir_ID = '.$shroku.' OR ';
			}
			$sehirtopla.='1231';
			$sehirtopla=str_replace('OR 1231', '', $sehirtopla);
			$sehirtopla.=')';
			$firmaoku=z(1,"WHERE arsiv = 0 AND ".$sehirtopla,'ID','firma');
			$musteritakiptopla='(';
			if(!empty($firmaoku)){
				foreach ($firmaoku as $frmoku) {
					$musteritakiptopla.='firma_ID = '.$frmoku.' OR ';
				}
				$musteritakiptopla.='1231';
				$musteritakiptopla=str_replace('OR 1231', '', $musteritakiptopla);
				$musteritakiptopla.=')';

			}
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

					if(is_array($dgr)&&count($dgr)==2&&in_array($ad,Array('tarih','tarihKayit','tarihTermin'))){
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
							$araSd.=$ad.(in_array($ad,Array('tarih','tarihSiparis','tarihKayit'))?" LIKE '%".$dg."%'":"='".$dg."'");
						}
					}
					$araSd.=')';
				}
				else if(in_array($ad,Array('ad','aciklama','siparisNo','ID'))){
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

$durumsorgu='';

if(z(8,'a')=='listele_durum0'){
	$durumsorgu='AND asama = 0';
}

if(z(8,'a')=='listele_durum1'){
	$durumsorgu='AND asama = 1';
}

if(z(8,'a')=='listele_durum2'){
	$durumsorgu='AND asama = 2';
}

if(z(8,'a')=='listele_durum3'){
	$durumsorgu='AND asama = 3';
}

if(z(8,'a')=='listele_durum4'){
	$durumsorgu='AND asama = 4';
}

if(z(8,'a')=='listele_durum5'){
	$durumsorgu='AND asama = 5';
}

if(z(8,'a')=='listele_durum6'){
	$durumsorgu='AND asama = 6';
}

if(z(8,'a')=='listele_durum7'){
	$durumsorgu='AND asama = 7';
}

if(z(8,'a')=='listele_durum8'){
	$durumsorgu='AND asama = 8';
}

if(z(8,'a')=='listele_durum9'){
	$durumsorgu='AND asama = 9';
}

if(z(8,'a')=='listele_durum10'){
	$durumsorgu='AND asama = 10';
}

if(z(8,'a')=='listele_durum11'){
	$durumsorgu='AND asama = 11';
}

if(z(8,'a')=='listele_durum12'){
	$durumsorgu='AND asama = 12';
}

if(z(8,'a')=='listele_durum13'){
	$durumsorgu='AND asama = 13';
}

if(z(8,'a')=='listele_durum14'){
	$durumsorgu='AND asama = 14';
}

if(z(8,'a')=='listele_durum15'){
	$durumsorgu='AND asama = 15';
}

// yetki ozel1 : Herkesin Girdilerini Görebilme
$musterifirmasehiroku=(!empty($musteritakiptopla)?" AND ".$musteritakiptopla:'');
$ytkOzel1=ytk('musteritakip','ozel1');
$sahipSd=(!$admn&&!$ytkOzel1?" AND personel_ID='".$bnmID."'":'');
$_X=z(1,"WHERE ".$arsvsd.$sahipSd.$durumsorgu.$araSd.$musterifirmasehiroku." ORDER BY ID ".(empty($phpExcelA)?'DESC':'ASC').$llimit,NULL,$tbl);
if(!empty($_X)){

	

	$_Nesne=z(37,z(1,"WHERE ad='nereden'",'ID,ad,metin1,metin2','nesne'));
	$_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
	$_NesneTip=z(37,z(1,"WHERE ad='asama'",'ID,ad,sayi1,metin1,metin2,metin3','nesne'),'sayi1');

	$_Firma=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'firma_ID'),'ID,ad,sehir_ID','firma'));
	$_Personel=z(37,z(1,"WHERE arsiv<>'-1' AND ".z(38,$_X,'personel_ID'),'ID,ad,soyad','personel'));
	$ytkDty=ytk($tbl,'detay');
	$ytkDzn=ytk($tbl,'duzenle');

	if(empty($phpExcelA)){
		foreach($_X as $i=>$x){$i++;
			

			// Aşağıdaki tr içeriği listelenin değer sütunlarıdır
			// sütunlar burada, sutunlar burada 

			/*/
			$sehirwh="WHERE sehir_key =".$x['il_ID'];
			$_sehir2=z(1,$sehirwh,'','sehir');
			$sehiroku=$_sehir2[0]['sehir_title'];

			$ilcewh="WHERE ilce_key =".$x['ilce_ID'];
			$_ilce2=z(1,$ilcewh,'','ilce');
			$ilceoku=$_ilce2[0]['ilce_title'];

			$mahallewh="WHERE mahalle_id =".$x['mahalle_ID'];
			$_mahalle2=z(1,$mahallewh,'','mahalle');
			$mahalleoku=$_mahalle2[0]['mahalle_title'];
			<td>'.(!empty($sehiroku)?$sehiroku:'&nbsp;').'</td>
				
				<td>'.(!empty($ilceoku)?$ilceoku:'&nbsp;').'</td>

				<td>'.(!empty($mahalleoku)?$mahalleoku:'&nbsp;').'</td>
				/*/
				$hsorgu="WHERE arsiv = 0 AND hmodul = '".$tbl."' AND hmodul_ID = ".$x['ID'];
				$Hadet=z(5,$hsorgu,'','hatirlatici');
				$firmasehir = $_Firma[$x['firma_ID']]['sehir_ID'];
				$firmasehiroku = z(1,"WHERE sehir_key = ".$firmasehir,'','sehir');
				$fsehirad = $firmasehiroku[0]['sehir_title'];
				echo '
				<tr class="tr'.($i%2?1:2).' asama_'.$x['asama'].' "  >



				<th class="printx"><input name="sec['.$x['ID'].']" value="1" type="checkbox" class="secilebilir"></th>
				<td class="tdi">'.$i.'</td>


				'./*<td><img src="img/drm'.$_Drm[$x['onayli']][0].'.png" title="'.$_Drm[$x['onayli']][1].'" height="20" /></td>*/'
				
				<td colspan="1">
				'.
					// Detay adı görüntüleme
				($admn||$ytkDty?
					'<a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.(!empty($x['ID'])?z('metin',bulunan('ID',$x['ID'])):'&nbsp;').(!empty($Hadet)?'<span class="htrlticon"></span>':'').(!empty($x['teklifVar'])?'<span class="teklificon"></span>':'').(!empty($x['siparisVar'])?'<span class="siparisicon"></span>':'').'</a>'
					: bulunan('ID',$x['ID']) 
				).
				'<a href="?s=siparistakip&a=ekle&mustbl='.$tbl.'&musid='.$x['ID'].'" style="background:#ffe; border:1px solid #ccc; padding:2px; border-radius:4px; margin-left:2px;">Sipariş&nbsp;Oluştur</a>'.
				'<a href="?s=teklif&a=ekle&mustbl='.$tbl.'&musid='.$x['ID'].'" style="background:#ffe; border:1px solid #ccc; padding:2px; border-radius:4px; margin-left:2px;">Teklif&nbsp;Hazırla</a>'.
				($admn||$ytkDzn?
					'&nbsp;<a href="?s='.$tbl.'&a=duzenle&id='.$x['ID'].'" class="dzn"></a>'
					: ''
				).
				'</td>
				<td>'.
				(!empty($_Nesne[$x['nesne_IDnereden']]['metin1'])?$_Nesne[$x['nesne_IDnereden']]['metin1']:'&nbsp;').
				'</td>
				<td>'.
				(!empty($fsehirad)?$fsehirad:'&nbsp;').
				'</td>
				<td>
				'.(!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'&nbsp;').'
				</td>';?>
				<form action="" method="post"><td><input type="hidden" class="asamaid" name="asamaid" value="<?php echo $x['ID']; ?>">
					<select name="asama" class="asamaguncelle">
						<option value="0" selected>&nbsp;</option>
						<?php foreach ($_NesneTip as $ntip) {?>
							<option value="<?php echo $ntip['sayi1']; ?>"<?php if(!empty($_NesneTip[$x['asama']]['metin1'])&&$_NesneTip[$x['asama']]['sayi1']==$ntip['sayi1']){ echo 'selected'; } ?>><?php echo $ntip['metin1']; ?></option>
						<?php } ?>
					</select></td></form>
					<?php
					echo '
					<td>
					'.(!empty($_Personel[$x['personel_ID']]['ad'])?$_Personel[$x['personel_ID']]['ad']:'&nbsp;').(!empty($_Personel[$x['personel_ID']]['soyad'])?'&nbsp;'.$_Personel[$x['personel_ID']]['soyad']:'').'
					</td>';
				/*/
				<td>'.
					(!empty($_NesneTip[$x['asama']]['metin3'])?'<img  style="vertical-align:top;" src="mobix/images/icons/white/'.$_NesneTip[$x['asama']]['metin3'].'.png" width="24" />&nbsp;&nbsp;':'&nbsp;').
					(!empty($_NesneTip[$x['asama']]['metin1'])?'<span style="vertical-align:middle; line-height:24px;">'.$_NesneTip[$x['asama']]['metin1'].'</span>':'&nbsp;').
					'</td>/*/
					echo '<td>'.(!empty($x['aciklama'])?z('metin',bulunan('aciklama',$x['aciklama'])):'&nbsp;').'</td>

					<td>'.(!empty($x['tarihKayit'])?z('tarih',$x['tarihKayit']):'&nbsp;').'</td>';


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
		}
		else{
			$phpExcelCols=array('A1'=>'NO','B1'=>'SİPARİŞ NUMARASI','C1'=>'İLGİLİ FİRMA','D1'=>'SON DURUM','E1'=>'AÇIKLAMA','F1'=>'SİPARİŞ TARİHİ'
		//,'G1'=>'TEL','H1'=>'FAX','I1'=>'E-POSTA','J1'=>'VERGİ DAİRESİ','K1'=>'VERGİ NO','L1'=>'FATURA ADRESİ','M1'=>'SEVK ADRESİ'
		);
			$basH='A'; $sonH='F';
			$phpExcelStyle=$basH.'1:'.$sonH.'1';
			foreach($phpExcelCols as $fei=>$fed)
				$objPHPExcel->getActiveSheet()->setCellValue($fei,$fed);


			foreach($_X as $i=>$x){$i++;
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($i+1),$i)
				->setCellValue('B'.($i+1),$x['ID'])
				->setCellValue('C'.($i+1),(!empty($_Firma[$x['firma_ID']]['ad'])?$_Firma[$x['firma_ID']]['ad']:'-'))
				->setCellValue('D'.($i+1),(!empty($_NesneTip[$x['asama']]['metin1'])?$_NesneTip[$x['asama']]['metin1']:'-'))
				->setCellValue('E'.($i+1),(!empty($x['aciklama'])?z('metin',bulunan('aciklama',$x['aciklama'])):'-'))
				->setCellValue('F'.($i+1),(!empty($x['tarihKayit'])?z('tarihsaat',$x['tarihKayit']):'-'))
			/*/
			->setCellValue('G'.($i+1),$x['tel'])
			->setCellValue('H'.($i+1),$x['fax'])
			->setCellValue('I'.($i+1),$x['eposta'])
			->setCellValue('J'.($i+1),$x['vergiD'])
			->setCellValue('K'.($i+1),$x['vergiNo'])
			->setCellValue('L'.($i+1),$x['adresFatura'])
			->setCellValue('M'.($i+1),$x['adresSevk'])
			/*/
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
	<?Php $phpExcelA=false;
}?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.asamaguncelle').change(function(e){
			e.preventDefault();
			var idno = $(this).parent().children('.asamaid').val();
			var mesaj = "Seçtiğiniz "+idno+" nolu aşamayı güncellemek istediğinizden emin misiniz?";
			if(confirm(mesaj)){
				this.form.submit();
			}
			else{
				$(this).prop('checked',false);
			}
		});
	});
</script>