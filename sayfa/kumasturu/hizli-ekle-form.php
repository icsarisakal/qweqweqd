<?php  $formAdi='makinacesitleri'; // Varsayılanda dışarıdan dolu gelir. ?>
<div id="hizli-ekle-form-<?php echo $formAdi; ?>"  style="display:none">	
	<form action="ajaxayar.php?s=<?php echo $formAdi; ?>&a=ekle&ajaxform=1" method="post">
		<div class="blok">
			<table cellpadding="0" cellspacing="0"><tbody>
				<tr>
					<th>Makina Çeşidi Adı *</th>
					<td>
						<input type="text" class="required" required autofocus="autofocus" name="<?php echo $formAdi; ?>[ad]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>Pus</th>
					<td>
						<input type="text" class="required" required autofocus="autofocus" name="<?php echo $formAdi; ?>[pus]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>Fayn</th>
					<td>
						<input type="text" class="required" required autofocus="autofocus" name="<?php echo $formAdi; ?>[fayn]" autocomplete="off" />
					</td>
				</tr>
				<input type="hidden" name="<?php echo $formAdi; ?>[tarihKayit]" value="<?php _z('datetime'); ?>">
				
				<tr><th colspan="2"><input type="submit" value="Kaydet" class="firmaekle"></th></tr>
			</tbody></table>
		</div>
	</form>
	<script type="text/javascript">
		$(document).ready(function(e) {

			// Formdaki input değeri değişnce
			$('[name="<?php echo $tbl ?>[makinacesitleri_ID]"]').change(function(e) {

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
					$('[name="<?php echo $tbl ?>[makinacesitleri_ID]"]').append('<option value="'+sonucJson.cevap.ID+'">'+sonucJson.cevap.ad+'</option>');
					$('[name="<?php echo $tbl ?>[makinacesitleri_ID]"] option').attr('selected',false);
					$('[name="<?php echo $tbl ?>[makinacesitleri_ID]"] option:last-child').attr('selected',true);
					$('[name="<?php echo $tbl ?>[makinacesitleri_ID]"]').css('background-color','green');
					pencereKapat();
				}
				else{
					alert(sonucJson.mesaj);
				}
			});

		});
	</script>
</div>