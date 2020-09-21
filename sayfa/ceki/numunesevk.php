<?php
	if(z(8,'cikistip'))$_XP['cikis']=z(8,'cikistip');
?>

<?php require(__DIR__.'/../boyatakip/ceki_prc/cikis_frm_pst.php'); ?>
<?php require(__DIR__.'/../boyatakip/ceki_prc/topluekle_pst.php'); ?>
<?php require(__DIR__.'/../boyatakip/ceki_prc/cikis_frm.php'); ?>
<?php require(__DIR__.'/../boyatakip/ceki_prc/cikis_frm_js.php'); ?>
<?php
	/*
	if($_XP['cikis']=='dokumastok'){
		$barkodluA=0;
	}
	else{
		$barkodluA=1;
	}
	*/
	$barkodluA=z(8,'barkodluA');
	$hamkumasstok_ID=0;
 ?>

<?php 
    if(z(8,'mamulbezstokdetay_ID','sayi')){ 
        $mamulbezstokdetay=z(1,z(8,'mamulbezstokdetay_ID','sayi'),'ID,mamulkumas_ID,mamulkumasdetay_ID','mamulbezstokdetay');
        $_XP['mamulkumas_ID']=$mamulbezstokdetay['mamulkumas_ID'];
        $_XP['mamulkumasdetay_ID']=$mamulbezstokdetay['mamulkumasdetay_ID'];
		z(12,'cekicikisfrm',$_XP);

    }
    if(z(8,'numunebezstokdetay_ID','sayi')){ 
        $numunebezstokdetay=z(1,z(8,'numunebezstokdetay_ID','sayi'),'ID,mamulkumas_ID,mamulkumasdetay_ID','numunebezstokdetay');
        $_XP['mamulkumas_ID']=$numunebezstokdetay['mamulkumas_ID'];
        $_XP['mamulkumasdetay_ID']=$numunebezstokdetay['mamulkumasdetay_ID'];
		z(12,'cekicikisfrm',$_XP);

    }
?>




<?php if(z(8,'cikisformac')){ ?>
<script type="text/javascript">
	cikis_frm2.formAc({<?php 
		echo z(8,"boyatakipsiparis_ID")?'"boyatakipsiparis_ID":"'.z(8,"boyatakipsiparis_ID").'"':''; 
	 	echo !empty($_XP['mamulkumasdetay_ID'])?'"mamulkumasdetay_ID":"'.$_XP['mamulkumasdetay_ID'].'"':'';
	 ?>});
</script>
<?php } ?>


<div class="sayfa">
	<div class="baslik printx"><h3>YENİ ÇEKİ LİSTESİ</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['tipNo'].'</strong> tip numarasına sahip bir girdi bulunuyor. Lütfen başka bir numara belirtiniz.');break;
			case 11:_uyr(2,'Lütfen tip no giriniz.');break;
			case 12:_uyr(2,'Lütfen bir kumaş kalitesi seçiniz.');break;
			case 13:_uyr(2,'Lütfen parti no giriniz.');break;
		}?>
        <form action="" method="post">
        	<?php 
        	//echo "<pre>"; print_r($_XP);
        	if(!empty($_XP['boyatakipsiparis_ID'])){
        		$bsprs=z(1,$_XP['boyatakipsiparis_ID'],'ID,boyatakip_ID,firma_ID','boyatakipsiparis');
	        	if(!empty($bsprs['firma_ID'])){
	        		$firma=z(1,$bsprs['firma_ID'],'ID,ad','firma');
	        	}
        	}
        	$nsnSd="WHERE arsiv <> '-1'";
        	if(!empty($_XP['nesne_IDboyahane'])){
        		$nsnSd.=" AND (ID='".$_XP['nesne_IDboyahane']."')";
        	}
	        $_Nesne=z(37,z(1,$nsnSd,'ID,metin1','nesne'));
        	?>
        	<div class="w-5-2 pd6 va-t">
				<table cellpadding="0" cellspacing="0">
					<colgroup>
						<col width="40%">
						<col width="60%">
					</colgroup>

					<thead>
						<tr>
							<th colspan="2" class="f18 pd8-v">SEVK HAREKET BİLGİLERİ</th>
						</tr>
					</thead>

					<tbody>
						<?php switch ($_XP['cikis']) {
							case 'dokumastok': 
								break;

							case 'mamulbezstok': ?>
								<tr>
									<td colspan="2" class="f14 pd8-v"><?php echo !empty($firma['ad'])?$firma['ad']:'' ?> FİRMASINDAN ... BOYAHANESİNE ÇIKIŞ</td>
								</tr>
							<?php break;

							case 'boyatakip': ?>
								<tr>
									<td colspan="2" class="f14 pd8-v"><?php echo !empty($firma['ad'])?$firma['ad']:'' ?> FİRMASINDAN ... BOYAHANESİNE ÇIKIŞ</td>
								</tr>
							<?php break;
							
							default:
								break;
						} ?>


						<?php switch ($_XP['giris']) {
							case 'dokumastok': 
								break;

							case 'boyatakip': ?>
								<tr>
									<td colspan="2" class="f14 pd8-v"><?php echo !empty($firma['ad'])?$firma['ad']:'' ?> FİRMASINDAN --&gt; <?php echo !empty($_Nesne[$_XP['nesne_IDboyahane']]['metin1'])?'<b>'.$_Nesne[$_XP['nesne_IDboyahane']]['metin1'].'</b>':'' ?> BOYAHANESİNE ÇIKIŞ</td>
								</tr>
							<?php break;

							case 'mamulbezstok': ?>
								<tr>
									<td colspan="2" class="f14 pd8-v"><?php echo !empty($firma['ad'])?$firma['ad']:'' ?> FİRMASINDAN --&gt; <?php echo $ayr['firmaAd'] ?> DEPOYA ÇIKIŞ</td>
								</tr>
							<?php break;
							
							case 'numunebezstok': ?>
								<tr>
									<td colspan="2" class="f14 pd8-v"><?php echo !empty($firma['ad'])?$firma['ad']:'' ?> FİRMASINDAN --&gt; <?php echo $ayr['firmaAd'] ?> NUMUNE DEPOYA ÇIKIŞ</td>
								</tr>
							<?php break;


						} ?>
					</tbody>


				
					<thead>
						<tr>
							<th colspan="2" class="f14 pd8-v">MAMUL GENEL BİLGİLERİ</th>
						</tr>
					</thead>

					<tbody>
						<tr>
			        		<th class=" ta-r pd1m-r f14">--</th><td class=" fw-b"><?php echo (!empty($_XP['nesne_IDkompozisyon'])?$_XP['nesne_IDkompozisyon']:'') ?></td>
						</tr>
					</tbody>

					<?php /*/ ?>


	                <tbody>
	                	<tr>
	                    	<th>PARTİ NO *<?Php echo gstr('partiNo',$_X)?></th><td><input type="text" class="autoPartiNo" autofocus tabindex="1" name="<?Php echo $tbl?>[partiNo]" value="<?Php echo !empty($_X['partiNo'])?$_X['partiNo']:''?>" /></td>
	                        <th>TOP NO<?Php echo gstr('boyahaneTopNo',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[boyahaneTopNo]" value="<?Php echo !empty($_X['boyahaneTopNo'])?$_X['boyahaneTopNo']:''?>" /></td>
	                    </tr>
	                	<tr>
	                    	<th>TİP NO *<?Php echo gstr('tipNo',$_X)?></th><td><input type="text" class="autoTipNo" tabindex="1" name="<?Php echo $tbl?>[tipNo]" value="<?Php echo !empty($_X['tipNo'])?$_X['tipNo']:''?>" /></td>
	                    	<th>LOT NO<?Php echo gstr('lotNo',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[lotNo]" value="<?Php echo !empty($_X['lotNo'])?$_X['lotNo']:''?>" /></td>
	                    </tr>
	                    <tr>
	                    	<th>KUMAŞ CİNSİ *<?Php echo gstr('kalite_ID',$_X)?></th><td><?Php 
							$_Kalite=z(1,"WHERE id<>'0'",NULL,'kalite');
							if(!empty($_Kalite)){
								echo '<select name="'.$tbl.'[kalite_ID]"><option value="">seçiniz</option>';
								foreach($_Kalite as $fe){
									echo '<option value="'.$fe['id'].'" '.(!empty($_X['kalite_ID'])&&$_X['kalite_ID']==$fe['id']?'selected':'').'>'.trmtn($fe['ad']).'</option>';
								}
								echo '</select>';
							}
							?></td>
	                        <th>METRAJ<?Php echo gstr('metraj',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[metraj]" placeholder="0,00 mt" value="<?Php echo !empty($_X['metraj'])?$_X['metraj']:''?>" /></td>
	                    </tr>
	                    <tr>
	                    	<th>RENK NO<?Php echo gstr('nesne_IDrenkNo',$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_IDrenkNo]','detay'=>'class="nesneSlc_renkNo" tabindex="1"','t'=>'nesne','alan'=>'ID,metin1,metin2','ayrac'=>' - ','sd'=>"WHERE ad='renkNo'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_IDrenkNo'])?$_X['nesne_IDrenkNo']:substr(z('date'),0,7)))?></td>
	                        
	                        <th rowspan="5">AÇIKLAMA<?Php echo gstr('aciklama',$_X,0)?></th><td rowspan="5"><textarea type="text" style="height:100%;" tabindex="2" name="<?Php echo $tbl?>[aciklama]" ><?Php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td>
	                    </tr>
	                    <tr><th>DESEN NO<?Php echo gstr('nesne_IDdesenNo',$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_IDdesenNo]','detay'=>'class="nesneSlc_desenNo" tabindex="1"','t'=>'nesne','alan'=>'ID,metin1,metin2','ayrac'=>' - ','sd'=>"WHERE ad='desenNo'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_IDdesenNo'])?$_X['nesne_IDdesenNo']:substr(z('date'),0,7)))?></td></tr>
						
	                    <tr><th>MAMUL EN / GR m²<?Php echo gstr('mamulEn',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[mamulEn]" placeholder="0,00 m²" value="<?Php echo !empty($_X['mamulEn'])?$_X['mamulEn']:''?>" /></td>
	                    </tr>
	                    <tr>
	                    	<th>MAMUL GR<?Php echo gstr('mamulGr',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[mamulGr]" placeholder="0,00 gr/m²" value="<?Php echo !empty($_X['mamulGr'])?$_X['mamulGr']:''?>" /></td>
	                        
	                    </tr>
	                    
						<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){if(!in_array($ad,array('renkNo','desenNo'))){?>
	                    <tr><th><?Php echo $n['ad']?><?Php echo gstr($ad,$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'" tabindex="1"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:0))?></td></tr>
	                    <?Php }}?>
	                    
	                    <tr><th colspan="4"><input type="submit" class="btn3" tabindex="3" value="Kaydet" /></th></tr>
					<?php /*/ ?>
	                </tbody>


				</table>
			</div><div class="w-5-3 pd6 va-t">
			<?php /*/ ?><table cellpadding="0" cellspacing="0">
					<colgroup>
						<col width="40%">
						<col width="60%">
					</colgroup>


					<thead>
						<tr>
							<th colspan="2" class="f18 pd8-v">SEVK DETAY BİLGİLERİ</th>
						</tr>
					</thead>

					<tbody>
	        			<tr>
			        		<td class=" ta-r pd1m-r">Ürün Kalitesi:</td><td class=" fw-b">
			        			<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
						            <?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."' ORDER BY ID ASC",'detay'=>'class="buyuk-select" id="araNesne_ID'.$ad.'" tabindex="1" autofocus="autofocus"',
						            	//'icerik'=>'<option value="">-Seçiniz-</option>',
						            'sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:''))?>
						        <?Php }?>
			        		</td>
			        	</tr>
			        	<tr>
			         		<td class=" ta-r pd1m-r">Gramaj:</td><td class="">
			         			<input type="" name="<?php echo $tbl.'[gramaj]' ?>" class="buyuk-text" tabindex="1"
			         			value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''; ?>" />
			         		</td>
						</tr>


						<tr>
			        		<td class=" ta-r pd1m-r">Dokuma Salonu:</td><td class=" fw-b"><?php echo !empty($dokumaSalonu['metin1'])?$dokumaSalonu['metin1']:''; ?></td>
						</tr>
						<tr>
				         	<td class=" ta-r pd1m-r">Dokuma İş No:</td><td class=" fw-b"><?php echo !empty($dokumastok['ID'])?$dokumastok['ID']:''; ?></td>
						</tr>
						<tr>
				         	<td class=" ta-r pd1m-r">Kumaş Kalitesi:</td><td class=" fw-b"><?php echo !empty($hamkumasstok['kumasIsmi'])?$hamkumasstok['kumasIsmi']:''; ?></td>
						</tr>
						<tr>
			         		<td class=" ta-r pd1m-r">Numune İsmi:</td><td class=" fw-b"><?php echo !empty($hamkumasstok['numuneIsmi'])?$hamkumasstok['numuneIsmi']:''; ?></td>
						</tr>
						<tr>
			         		<td class=" ta-r pd1m-r">Gramaj:</td><td class="">
			         			<input type="" name="<?php echo $tbl.'[gramaj]' ?>" class="buyuk-text" tabindex="1"
			         			value="<?php echo !empty($_X['gramaj'])?z(36,$_X['gramaj'],2):''; ?>" />
			         		</td>
						</tr>
						<tr>
			         		<td class=" ta-r pd1m-r">Ham En:</td><td class="">
			         			<input type="" name="<?php echo $tbl.'[hamEn]' ?>" class="buyuk-text" tabindex="1"
			         			value="<?php echo !empty($_X['hamEn'])?z(36,$_X['hamEn'],2):''; ?>" />
			         		</td>
						</tr>
					</tbody>


					<tfoot>
						<tr>
							<th colspan="14">
								<input type="submit" value="KAYDET">
							</th>
						</tr>
					</tfoot>
				</table>


        	</div><?php /*/ ?>
	        			
        		

				<table cellpadding="0" cellspacing="0"  id="cekitable">
					<colgroup>
						<col width="10%">
						<col width="15%">
						<col width="10%">
						<col width="15%">
						<col width="10%">
						<col width="15%">
						<col width="10%">
						<col width="15%">
					</colgroup>


					<!-- DURUMA GÖRE DEĞİŞEN ÜST BİLGİLER -->
		        	<?php if(z(8,'dokumasiparis_ID')){ ?>	
					<?php 
						// İlgili dokumasiparis'in bilgilerini oku
						$dokumasiparis_ID=z(8,'dokumasiparis_ID');
						$dokumasiparis=z(1,$dokumasiparis_ID,'','dokumasiparis');
						$dokumastok=z(1,$dokumasiparis['dokumastok_ID'],'','dokumastok');
						$dokumaSalonu=z(1,$dokumastok['nesne_IDdokumaSalonu'],'ID,metin1','nesne');
						$hamkumasstok=z(1,$dokumastok['hamkumasstok_ID'],'ID,kumasIsmi,numuneIsmi','hamkumasstok');

					?>
					
					<!-- HAM BEZ STOK DETAYI -->
					<?php } //else if(z(8,'hambezstok_ID','sayi')){ ?>
					<thead>
						<tr>
							<th colspan="10">
								<span class="f18">SEVK EDİLECEK TOP LİSTESİ</span>
								<a 
								<?php /*/ ?>
									href="javascript:cikis_frm2.formAc({});"
								<?php /*/ ?>
									href="?<?php _z('sw','QUERY_STRING') ?>&cikisformac=1<?php echo (!empty($_XP['boyatakipsiparis_ID'])?"&boyatakipsiparis_ID=".$_XP['boyatakipsiparis_ID']:'') ?>"

									class="btnSub btn1 printx"><img src="img/duzenle.png" height="12" /> Çıkış Penceresini Tekrar Aç</a>
							</th>
						</tr>

						<?php if(!empty($barkodluA)){ ?>
						<tr class="printx">
							<td colspan="14">
								<div class="w-4-3">
				                    <input class="txt buyuk-text f12 pd1m" id="txt" placeholder="Lütfen barkod numarasını elle veya barkod okuma cihazıyla giriniz." >
								</div><div class="w-4-1">
				                    <input type="button" id="gndrBtn" class="buyuk-button pd1m f12" value="&nbsp;TOPU EKLE&nbsp;">
				                </div> 
				            </td>
			            </tr>
						
						<tr>
		                    <th>NO</th><th>BARKOD NO</th><th>MAMUL KUMAŞ İSMİ</th><th>RENK / DESEN</th><th>TERBİYE</th><th>KALİTE</th><th>METRAJ</th><th>LOT</th><th>Boyahane Top No</th><th class="printx">SİL</th>
		                </tr>
			            <?php } else { ?>

						<tr>
							<td colspan="2">Hepsine Uyarla</td>
							<td><input type="text" class="paylasimli-inp w-1-1" data-paylasim-id='[name="stok[metraj][]"]' placeholder="metraj" tabindex="1" /></td>
							<td><input type="text" class="paylasimli-inp w-1-1" data-paylasim-id='[name="stok[lotNo][]"]' placeholder="lotNo" tabindex="1" /></td>
							<td>
								<?php echo select(Array('name'=>' ','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kalite' ORDER BY ID ASC",
									'detay'=>'class="paylasimli-slc w-1-1" data-paylasim-id=\'[name="stok[nesne_IDkalite][]"]\' tabindex="1"'
								)) ?>
							</td>
							<td><input type="text" class="paylasimli-inp w-1-1" data-paylasim-id='[name="stok[boyahaneTopNo][]"]' placeholder="Boyahane Top No" tabindex="1" /></td>
							<td>&nbsp;</td>
						</tr>

						<tr>
		                    <th>NO</th><th>BARKOD NO</th><th>METRAJ</th><th>LOT</th><th>KALİTE</th><th>Boyahane Top No</th><th class="printx">SİL</th>
		                </tr>
			            <?php } ?>
					</thead>
					<?php //} ?>
					<!-- HAM BEZ STOK DETAYI END -->
	    			

	    			<!-- DURUMA GÖRE DEĞİŞEN ÜST BİLGİLER END -->


					
	    			<?php 
	    			function kopyaTrSablon($i=NULL){
	                	if(empty($GLOBALS['barkodluA'])){
	                	echo 
	'					<tr>
							<td><!-- SAYAÇ --></td>
							<td>-otomatik-</td>
							<td><input type="text" class="tr-inp buyuk-text" name="stok[metraj][]" placeholder="metraj" tabindex="1" 
							value="'.(!empty($GLOBALS['_XStok']['metraj'][$i])?z(36,$GLOBALS['_XStok']['metraj'][$i],2):'').'" 
							/></td>
							<td><input type="text" class="buyuk-text" name="stok[lotNo][]" placeholder="lotNo" tabindex="2" 
							value="'.(!empty($GLOBALS['_XStok']['lotNo'][$i])?$GLOBALS['_XStok']['lotNo'][$i]:'').'" 
							/></td>
							<td>'.select(Array('name'=>'stok[nesne_IDkalite][]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kalite' ORDER BY ID ASC",'detay'=>'class="buyuk-select" id="araNesne_IDkalite" tabindex="2"',
						            	//'icerik'=>'<option value="">-Seçiniz-</option>',
						            'sec'=>!empty($_X['nesne_IDkalite'])?$_X['nesne_IDkalite']:'')).'
							</td>
							<td><input type="text" class=" " name="stok[boyahaneTopNo][]" placeholder="Boyahane Top No" tabindex="3" 
							value="'.(!empty($GLOBALS['_XStok']['lotNo'][$i])?$GLOBALS['_XStok']['lotNo'][$i]:'').'" 
							/></td>
							
							<td>'.($i===NULL?'<!-- SİL -->':'<input type="button" onclick="trSil(this)" value="x" />').'</td>
						</tr>';
	                	}
	                	else{

	                	echo 
	'					<tr>
							<td><input type="text" class="tr-inp buyuk-text" name="stok[ID][]" /></td>
							<td>'.(!empty($GLOBALS['_XStok']['metraj'][$i])?z(36,$GLOBALS['_XStok']['metraj'][$i],2):'').'</td>
							<td>'.(!empty($GLOBALS['_XStok']['lotNo'][$i])?$GLOBALS['_XStok']['lotNo'][$i]:'').'</td>
							<td>'.(!empty($GLOBALS['_XStok']['lotNo'][$i])?$GLOBALS['_XStok']['lotNo'][$i]:'').'</td>
							<td colspan="2">&nbsp;</td>
							<td>'.($i===NULL?'<!-- SİL -->':'<input type="button" onclick="trSil(this)" value="x" />').'</td>
						</tr>';
	                	}
	    			}
	    			?>

					<!-- POSTTAN GELEN TOPLAR -->
	    			<thead>
	    				<?php if(!empty($_XStok['metraj']))foreach ($_XStok['metraj'] as $fei => $fev) {
							kopyaTrSablon($fei);
						} ?>
	    			</thead>

					<!-- KOPYALAMAK İÇİN TOP ŞABLONU -->
					<?php if(empty($barkodluA)){ ?>
	    			<thead class="bunun-icini-kopyala">
						<?php kopyaTrSablon(); ?>
	    			</thead>
	    			<?php } ?>
					<!-- TOP EKLEMEK İÇİN DİNAMİK JS FORM TABLOSU -->
					<tbody class="bunun-icine-yapistir cekibody" id="cekibody">
						<?Php if(!empty($barkodluA)){$geriYukle=1;require('sayfa/'.$tbl.'/cekitr_prc.php'); } ?>
					</tbody>
					<!-- TOP EKLEMEK İÇİN DİNAMİK JS FORM TABLOSU END -->

					<tfoot>
						<tr>
							<th colspan="14">
								<?Php if(empty($barkodluA)){ ?>
								<input type="button" value="TOP EKLE" class="f16 pd1m" onclick="trEkle()">
								<?php } ?>
								<input type="submit" value="KAYDET" class="f16 pd1m" />
							</th>
						</tr>
					</tfoot>

				</table>
        	</div>


        	

        	

				


			<!-- GİZLİ İNPUTLAR -->
		    <input type="hidden" name="<?php echo $tbl.'[giris]' ?>" value="<?php echo !empty($_XP['giris'])?$_XP['giris']:''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[cikis]' ?>" value="<?php echo !empty($_XP['cikis'])?$_XP['cikis']:''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDboyahane]' ?>" value="<?php echo !empty($_XP['nesne_IDboyahane'])?$_XP['nesne_IDboyahane']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[hamkumasstok_ID]' ?>" value="<?php echo !empty($_XP['hamkumasstok_ID'])?$_XP['hamkumasstok_ID']:$hamkumasstok_ID; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[hambezstok_ID]' ?>" value="<?php echo !empty($_XP['hambezstok_ID'])?$_XP['hambezstok_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[dokumasiparis_ID]' ?>" value="<?php echo !empty($_XP['dokumasiparis_ID'])?$_XP['dokumasiparis_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[boyatakipsiparis_ID]' ?>" value="<?php echo !empty($_XP['boyatakipsiparis_ID'])?$_XP['boyatakipsiparis_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[dokumastok_ID]' ?>" value="<?php echo !empty($_XP['dokumastok_ID'])?$_XP['dokumastok_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[boyatakip_ID]' ?>" value="<?php echo !empty($_XP['boyatakip_ID'])?$_XP['boyatakip_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDdokumaSalonu]' ?>" value="<?php echo !empty($_XP['nesne_IDdokumaSalonu'])?$_XP['nesne_IDdokumaSalonu']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDkomposizyon]' ?>" value="<?php echo !empty($_XP['nesne_IDkomposizyon'])?$_XP['nesne_IDkomposizyon']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[firma_ID]' ?>" value="<?php echo !empty($_XP['firma_ID'])?$_XP['firma_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[aciklama]' ?>" value="<?php echo !empty($_XP['aciklama'])?$_XP['aciklama']:''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[tarihIslem]' ?>" value="<?php echo !empty($_XP['tarihIslem'])?
		    $_XP['tarihIslem']
		    :''; ?>" />

		    <input type="hidden" name="<?php echo $tbl.'[mamulkumas_ID]' ?>" value="<?php echo !empty($_XP['mamulkumas_ID'])?$_XP['mamulkumas_ID']:'0'; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[mamulkumasdetay_ID]' ?>" value="<?php echo !empty($_XP['mamulkumasdetay_ID'])?$_XP['mamulkumasdetay_ID']:'0'; ?>" />

			<!-- GİZLİ İNPUTLAR END -->






        </form>
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
        <div id="ekleForm_<?Php echo $ad?>" style="display:none">
        <form action="sayfa/nesne/yonet_ajx.php?ekle=<?Php echo $ad?>" class="ajaxNesneEkle" method="post">
            <table cellpadding="0" cellspacing="0">
                <?Php foreach($n['alan2'] as $fei=>$fed){
                    echo '<tr><th>'.$fed.'</th><td><input type="text" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
                }?>
                <tr><th colspan="2" align="center"><input type="submit" value="KAYDET" /></th></tr>
            </table>
        </form>
        </div>
        <?Php }?>
        <div class="blok" id="boya_takip"></div>
    </div>
</div>
<div id="gizli" style="display: none;"></div>
<?php
	if(empty($barkodluA)){
		require(__DIR__.'/topluekle_js.php');
	}
	else{
		require(__DIR__.'/topluekle_barkodlu_js.php');
	}
?>