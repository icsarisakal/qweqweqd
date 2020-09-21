<?php // $formAdi='firma'; // Varsayılanda dışarıdan dolu gelir. ?>
<div id="hizli-ekle-form-<?php echo $formAdi; ?>"  style="display:none">	
	<form action="ajaxayar.php?s=<?php echo $formAdi; ?>&a=ekle&ajaxform=1" method="post">
		<div class="blok">
			<table cellpadding="0" cellspacing="0"><tbody>
				<tr>
					<th>Firma Ad *</th>
					<td>
						<input type="text" class="required" required autofocus="autofocus" name="<?php echo $formAdi; ?>[ad]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>Firma E-posta</th>
					<td>
						<input type="text" name="<?php echo $formAdi; ?>[eposta]" autocomplete="off" />
					</td>
				</tr>
				<tr><th>Firma Bölge</th><td>
					<select name="<?php echo $formAdi; ?>[bolge_ID]" class="select2" id="selectt1">
						<option value="0">&nbsp;</option>
						<option value="1">Akdeniz</option>
						<option value="2">Ege</option>
						<option value="3">Marmara</option>
						<option value="4">Karadeniz</option>
						<option value="5">İç Anadolu</option>
						<option value="6">Doğu Anadolu</option>
						<option value="7">Güneydoğu Anadolu</option>
					</select>
				</td></tr>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#sehirlerr').hide();

						$('#selectt1').change(function() {
							var bolge_id = selectt1.options[selectt1.selectedIndex].value;
							$.ajax({
								type:"POST",
								url:"ajaxayar.php?s=firma&a=bolgelist&bolge="+bolge_id,
								success:function(gelensorgu){
									if(gelensorgu.sonuc==1){
										var sehir=gelensorgu.cevap.bolge;
										if(sehir!=null){
											$('#selectt2 option').remove();
											$('#sehirlerr').show();
											$.each(sehir, function(k, v) {
												$('<option>').val(v.sehir_ID).text(v.sehir_ad).appendTo('#selectt2');
											});
										}
									} else {
										alert('İlçe okuma başarısız');
									}
								}
							});
						});
					});
				</script>
				<tr id="sehirlerr">
					<th>Firma Şehir</th>   
					<td>
						<select name="<?php echo $formAdi; ?>[sehir_ID]" class="select2" id="selectt2">
							
						</select>
					</td>
				</tr>
				<?php if($tbl=='musteritakip'){ ?>

					<tr>
						<th>İlg. Kişi Adı </th>
						<td>
							<input type="text" name="kisi[kisiad]" autocomplete="off" />
						</td>
					</tr>
					<tr>
						<th>İlg. Kişi Soyadı </th>
						<td>
							<input type="text" name="kisi[kisisoyad]" autocomplete="off" />
						</td>
					</tr>
					<tr>
						<th>İlg. Kişi Telefonu </th>
						<td>
							<input type="text" name="kisi[kisitel]" autocomplete="off" />
						</td>
					</tr>
				<?php } ?>
				
				<tr><th colspan="2"><input type="submit" value="Kaydet" class="firmaekle"></th></tr>
			</tbody></table>
		</div>
	</form>
	<script type="text/javascript">
		$(document).ready(function(e) {

			// Formdaki input değeri değişnce
			$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"]').change(function(e) {

		        // Seçilen girdi 'yeni' ekleme girdisiyse
		        if($(this).val()=='yeni'){

		        	pencereAc("#hizli-ekle-form-<?php echo $formAdi; ?>");
		        	setTimeout(function(){
		        		$("#hizli-ekle-form-<?php echo $formAdi; ?> input:first").focus();
		        	},300);
		        }
		    });


			$('#hizli-ekle-form-<?php echo $formAdi; ?> form').ajaxForm(function(sonucJson) {

				if(typeof sonucJson=="string"){
					sonucJson=JSON.parse(sonucJson);
				}


				if(sonucJson.sonuc==1){
					$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"]').append('<option value="'+sonucJson.cevap.ID+'">'+sonucJson.cevap.ad+'</option>');
					$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"] option').attr('selected',false);
					$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"] option:last-child').attr('selected',true);
					$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"]').css('background-color','green');
					pencereKapat();
				}
				else{
					alert(sonucJson.mesaj);
				}
				kisilist();
			});

		});
	</script>
</div>