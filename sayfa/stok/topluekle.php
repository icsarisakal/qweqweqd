<?php
$hambezstok_ID=z(8,'hambezstok_ID');
if(!empty($hambezstok_ID)){
	$hambezstok=z(1,$hambezstok_ID,'ID,hamkumasstok_ID','hambezstok');
	$hamkumasstok_ID=!empty($hambezstok['hamkumasstok_ID'])?$hambezstok['hamkumasstok_ID']:0;
}
if(!empty($hamkumasstok_ID)){
	$hamkumasstok=z(1,$hamkumasstok_ID,NULL,'hamkumasstok');
}

if(!empty($hamkumasstok)){
?>
<?php require(__DIR__.'/topluekle_pst.php'); ?>
<?php
	$barkodluA=0;
 ?>

<?php if(z(8,'cikisformac')){ ?>
<script type="text/javascript">
	cikis_frm2.formAc({<?php echo z(8,'hambezstok_ID')?'"hamkumasstok_ID":"'.z(1,z(8,'hambezstok_ID'),'hamkumasstok_ID','hambezstok').'"':'' ?>});
</script>
<?php } ?>


<div class="sayfa">
	<div class="baslik printx"><h3>TOP EKLEME SAYFASI</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'topluekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['tipNo'].'</strong> tip numarasına sahip bir girdi bulunuyor. Lütfen başka bir numara belirtiniz.');break;
			case 11:_uyr(2,'Lütfen tip no giriniz.');break;
			case 12:_uyr(2,'Lütfen bir kumaş kalitesi seçiniz.');break;
			case 13:_uyr(2,'Lütfen parti no giriniz.');break;
		}?>
        <form action="" method="post">
<div class="w-5-3 pd6 va-t">
        		

				<table cellpadding="0" cellspacing="0">
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
							<th colspan="7">
								<span class="f18">TOP BİLGİLERİNİ SIRASIYLA GİRİNİZ</span>
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
		                    <th>NO</th><th>BARKOD NO</th><th>KUMAŞ KALİTESİ</th><th>KALİTE</th><th>METRAJ</th><th>LOT</th><th>Dok.Salonu.Top.No</th><th class="printx">SİL</th>
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
							<td><input type="text" class="paylasimli-inp w-1-1" data-paylasim-id='[name="stok[dokSalTopNo][]"]' placeholder="Dok.Sal.TopNo" tabindex="1" /></td>
							<td>&nbsp;</td>
						</tr>

						<tr>
		                    <th>NO</th><th>BARKOD NO</th><th>METRAJ</th><th>LOT</th><th>KALİTE</th><th>Dok.Salonu.Top.No</th><th class="printx">SİL</th>
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
							<td><input type="text" class="tr-inp buyuk-text" name="stok[metraj][]" autofocus="autofocus" placeholder="metraj" tabindex="1" 
							value="'.(!empty($GLOBALS['_XStok']['metraj'][$i])?z(36,$GLOBALS['_XStok']['metraj'][$i],2):'').'" 
							/></td>
							<td><input type="text" class="tr-inp buyuk-text" name="stok[lotNo][]" placeholder="lotNo" tabindex="1" 
							value="'.(!empty($GLOBALS['_XStok']['lotNo'][$i])?$GLOBALS['_XStok']['lotNo'][$i]:'').'" 
							/></td>
							<td>'.select(Array('name'=>'stok[nesne_IDkalite][]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kalite' ORDER BY ID ASC",'detay'=>'class="buyuk-select" id="araNesne_IDkalite" tabindex="2"',
						            	//'icerik'=>'<option value="">-Seçiniz-</option>',
						            'sec'=>!empty($_X['nesne_IDkalite'])?$_X['nesne_IDkalite']:'')).'
							</td>
							<td><input type="text" class=" buyuk-text" name="stok[dokSalTopNo][]" placeholder="Dok.Sal.TopNo" tabindex="3" 
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
					<tbody class="bunun-icine-yapistir cekibody">
						<?Php if(!empty($barkodluA)){$geriYukle=1;require('sayfa/'.$tbl.'/cekitr_prc.php'); } ?>
					</tbody>
					<!-- TOP EKLEMEK İÇİN DİNAMİK JS FORM TABLOSU END -->

					<tfoot>
						<tr>
							<th colspan="14">
								<input type="button" value="TOP EKLE" class="f16 pd1m" onclick="trEkle()">
								<input type="submit" value="KAYDET" class="f16 pd1m" />
							</th>
						</tr>
					</tfoot>

				</table>
        	</div>


        	

        	

				


			<!-- GİZLİ İNPUTLAR -->
		    <input type="hidden" name="<?php echo $tbl.'[giris]' ?>" value="<?php echo !empty($_XP['giris'])?$_XP['giris']:''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDboyahane]' ?>" value="<?php echo !empty($_XP['nesne_IDboyahane'])?z(36,$_XP['nesne_IDboyahane'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[hamkumasstok_ID]' ?>" value="<?php echo !empty($_XP['hamkumasstok_ID'])?z(36,$_XP['hamkumasstok_ID'],2):$hamkumasstok_ID; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[hambezstok_ID]' ?>" value="<?php echo !empty($_XP['hambezstok_ID'])?z(36,$_XP['hambezstok_ID'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[dokumasiparis_ID]' ?>" value="<?php echo !empty($_XP['dokumasiparis_ID'])?z(36,$_XP['dokumasiparis_ID'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[dokumastok_ID]' ?>" value="<?php echo !empty($_XP['dokumastok_ID'])?z(36,$_XP['dokumastok_ID'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDdokumaSalonu]' ?>" value="<?php echo !empty($_XP['nesne_IDdokumaSalonu'])?z(36,$_XP['nesne_IDdokumaSalonu'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[nesne_IDkomposizyon]' ?>" value="<?php echo !empty($_XP['nesne_IDkomposizyon'])?z(36,$_XP['nesne_IDkomposizyon'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[firma_ID]' ?>" value="<?php echo !empty($_XP['firma_ID'])?z(36,$_XP['firma_ID'],2):''; ?>" />
		    <input type="hidden" name="<?php echo $tbl.'[tarihIslem]' ?>" value="<?php echo !empty($_XP['tarihIslem'][2])?
		    $_XP['tarihIslem'][2].'-'.$_XP['tarihIslem'][1].'-'.$_XP['tarihIslem'][0]
		    :''; ?>" />
			<!-- GİZLİ İNPUTLAR END -->


            <input type="hidden" name="git1" value="<?php _z('url','geri'); ?>" />




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
<?php
		require(__DIR__.'/topluekle_js.php');
} else echo "İlgili girdiye ham kumaş çeşiti seçilmemiş."; ?>