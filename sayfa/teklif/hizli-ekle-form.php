<?php // $formAdi='firma'; // Varsayılanda dışarıdan dolu gelir. ?>
<div id="hizli-ekle-form-<?php echo $formAdi; ?>"  style="display:none">	
	<form action="ajaxayar.php?s=<?php echo $formAdi; ?>&a=ekle" method="post">
        <div class="blok">
            <table cellpadding="0" cellspacing="0"><tbody>
            	<tr>
            		<th>FİRMA AD *</th>
            		<td>
            			<input type="text" class="required" required autofocus="autofocus" name="<?php echo $formAdi; ?>[ad]"  />
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


		    $('#hizli-ekle-form-<?php echo $formAdi; ?> form').ajaxForm(function(sonucJson) { 

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
			});

		});
	</script>
</div>