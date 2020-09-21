<?php // $formAdi='firma'; // Varsayılanda dışarıdan dolu gelir. ?>
<div id="hizli-ekle-form-<?php echo $formAdi; ?>"  style="display:none">	
	<form action="ajaxayar.php?s=<?php echo $formAdi; ?>&a=ekle&ajaxform=1" method="post">
		<div class="blok">
			<table cellpadding="0" cellspacing="0"><tbody>
				

				<tr>
					<th>İlg. Kişi Adı </th>
					<td>
						<input type="text" autofocus="autofocus" name="<?php echo $formAdi; ?>[ad]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>İlg. Kişi Soyadı </th>
					<td>
						<input type="text" autofocus="autofocus" name="<?php echo $formAdi; ?>[soyad]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>İlg. Kişi Telefonu </th>
					<td>
						<input type="text" autofocus="autofocus" name="<?php echo $formAdi; ?>[telCep1]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<th>İlg. Kişi Ünvanı </th>
					<td>
						<input type="text" autofocus="autofocus" name="<?php echo $formAdi; ?>[unvan]" autocomplete="off" />
					</td>
				</tr>

				<tr><th colspan="2"><input type="submit" value="Kaydet" /></th></tr>
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

		   /* // Formdaki nesne input değeri değişnce
			$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>]"]').change(function(e) {
				console.log("icerdeyiz");
		        // Seçilen girdi 'yeni' ekleme girdisiyse
		        if($(this).val()=='yeni'){

		        	pencereAc("#hizli-ekle-form-<?php echo $formAdi; ?>");
		        	setTimeout(function(){
		        		$("#hizli-ekle-form-<?php echo $formAdi; ?> input:first").focus();
		        	},300);
		        }
		    }); */

			$('.kisiekleme').click(function(){
				pencereAc("#hizli-ekle-form-<?php echo $formAdi; ?>");
				setTimeout(function(){
					$("#hizli-ekle-form-<?php echo $formAdi; ?> input:first").focus();
				},300);
			});


			$('#hizli-ekle-form-<?php echo $formAdi; ?> form').ajaxForm(function(sonucJson) {
				if(typeof sonucJson=="string"){
					sonucJson=JSON.parse(sonucJson);
				}



				if(sonucJson.sonuc==1){
					//$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"]').append('<option value="'+sonucJson.cevap.ID+'">'+sonucJson.cevap.ad+'</option>');
					//$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"] option').attr('selected',false);
					//$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"] option:last-child').attr('selected',true);
					//$('[name="<?php echo $tbl ?>[<?php echo $formAdi; ?>_ID]"]').css('background-color','green');
					$('.kisilerisec').append('<tr><td>'+sonucJson.cevap.ad+'</td><td>'+sonucJson.cevap.soyad+'</td><td>'+sonucJson.cevap.telCep1+'</td><td>'+sonucJson.cevap.unvan+'</td></tr>');
					$('.kisiler').append('<input type="hidden" name="kisigonder[kisiler][][<?php echo $formAdi; ?>_ID]" value="'+sonucJson.cevap.ID+'">');
						//var ileti = sonucJson.cevap.telCep1+" - "+sonucJson.cevap.unvan;
						//$('.ilgilibilgi').show();
						//$('.ilgilitelunvan').text(ileti);
						pencereKapat();
					}
					else{
						alert(sonucJson.mesaj);
					}
				});

		});
	</script>
</div>