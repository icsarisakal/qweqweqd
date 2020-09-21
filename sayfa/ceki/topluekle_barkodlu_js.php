<script type="text/javascript" language="javascript">
var detayGirA=false;
$(document).ready(function(e) {
	//$('form').submit(function(e){e.preventDefault();});
	//$('#subBtn').hover(function(e){$('form').unbind('submit');},function(a){e.preventDefault();});

    $('#musteriYaz').hide();
    $('#kumasCinsYaz').hide();
	$('.bilgi').hide();
    $('.dtyTxt').attr('disabled',true);
	
    $('#txt').focus().change(function(){kodGonder(0)}).keypress(function(e) {
		if(e.keyCode==13 && $(this).context.type!='submit'){ 
			e.preventDefault();
			kodGonder(0);
		}
    });
	$('#detayGirBtn').click(detayGir);
	$(document).keydown(function(e) {
        if(!detayGirA){
			<?php if(!z(8,'cikisformac','sayi')){ ?>
			$('#txt').focus();
    		<?php } ?>
		}
    });
	$('form').submit(function(e) {
        $('.dtyTxt').attr('disabled',false);
    });
	$('.topMetre').html(topMetre);
	$('.metreTxt').change(function(e){metreleriTopla();});
});
function yeni(a){
	$('#'+a+'Yaz').toggle();
	$('#'+a+'Sec').toggle();
	$('#'+a+'Yaz input').val('');
	detayGirA=0;
	$('#detayGirBtn').trigger('click');
}


var kod='',kodGonderimA=false;
function kodGonder(tasi){
	//if(kodGonderimA) return;
	kod=$('#txt').val();
	//$.get('i.php',{"i":"cvr","bunu":"stok_ID","buna":"stok","stok_ID":kod},function(a){

	if(kodGonderimA==false){
		kodGonderimA=true;

		$.get('sayfa/<?Php echo $tbl?>/cekitr_ajx.php',{'etiketNO':kod,'tasi':tasi,'hambezstok_ID':'<?php _z(8,'hambezstok_ID','sayi') ?>'},function(a){
			kodGonderimA=false;
			
			if(a=='0'){
				uyr('Belirtilen numaraya sahip top bulunamadı!','top_bulunamadi','alarm',2);
				$('#txt').val('');
			}
			else if(a=='2'){
				if(confirm('Uyari! Bu top başka bir çeki listesinde zaten bulunuyor. O listeden kaldırılıp buraya taşınsın mı?')){
					kodGonder(1);
				}
				else{
					$('#txt').val('');
				}
			}
			else if(a=='3'){
				uyr('Belirtilen numaraya sahip top zaten bu listede bulunuyor.','top_var','alarm',2);
				$('#txt').val('');
			}
			else{
				if(a){
					
					var yenitr=$(a);
					var hamkumasstok_ID=yenitr.attr('data-hamkumasstok_ID');
					var kalite=yenitr.attr('data-kalite');
					var metraj=sy(yenitr.attr('data-metraj'));
					var hamkumasstok=yenitr.attr('data-hamkumasstok');
					if($('#kmsbody_'+hamkumasstok_ID).length>0){
						$('#kmsbody_'+hamkumasstok_ID).append(a);
					}
					else{
						$('#cekitable').append('<tbody class="kmsbody" id="kmsbody_'+hamkumasstok_ID+'"><tr><th colspan="8">'+hamkumasstok+'</th></tr>'+a+'</tbody>'+
							'<tbody>'+
								'<tr>'+
								'<td colspan="2">TOPLAM: <b><span id="kmstoplam_'+hamkumasstok_ID+'_1K">0</span> mt</b> <b>1K</b></td>'+
								'<td colspan="2">TOPLAM: <b><span id="kmstoplam_'+hamkumasstok_ID+'_1A">0</span> mt</b> <b>1A</b></td>'+
								'<td colspan="2">TOPLAM: <b><span id="kmstoplam_'+hamkumasstok_ID+'_2K">0</span> mt</b> <b>2K</b></td>'+
								'<td colspan="2">&nbsp;</td>'+
								'<td colspan="2">&nbsp;</td>'+
								'</tr>'+
								'<tr><td colspan="8"></td></tr>'+
							'</tbody>');
					}
					if(kalite){
						$('#kmstoplam_'+hamkumasstok_ID+'_'+kalite).text( sy( sy($('#kmstoplam_'+hamkumasstok_ID+'_'+kalite).text()) + metraj ,2) );
					}
					sirala();
					metreleriTopla();
					$('#subBtn').attr('disabled',false);
					$('.dtyTxt').attr('disabled',true);
					$('#txt').val('');
					ses('tamam');
				}
			}
			//setTimeout(function(){
			//},200);
		});
	}
	$('#txt').focus();
}
var sira=<?Php echo !empty($cekiAdet)?$cekiAdet:0?>;
function sirala(){
	//var _CekibodyTr=document.getElementById('cekibody').getElementsByClassName('cekitr');
	//console.log(_CekibodyTr);
	/*for (var i = 0; i < _CekibodyTr.length; i++) {
		console.log(_CekibodyTr[i].getAttrubute('data-hamkumasstok_ID'));
	}*/
	/*var _Cekitr=document.getElementsByClassName('cekitr');
	if(_Cekitr.length>0){
		for (var i = 0; i < _Cekitr.length; i++) {
			alert(document.getElementById(_Cekitr[i].id+"_hamkumasstok_ID").value);
		}
	}*/
	sira++;
	$('.sira_'+kod).html(sira);
}
var topMetre=<?Php echo !empty($cekiTopMetre)?$cekiTopMetre:0?>;
function metreTopla(){
	var mtr=parseInt($('.metre_'+kod).val());
	if(mtr){
		topMetre+=mtr;
		$('.topMetre').html(topMetre);
	}
}
function metreleriTopla(){
	topMetre=0;
	$('.metreTxt').each(function(index, element) {
		var mtr=parseFloat($(this).val());
		if(mtr){
			topMetre+=mtr;
		}
    });
	$('.topMetre').html(topMetre);
}
function metreCikart(etiketNO){
	var mtr=parseInt($('.metre_'+etiketNO).val());
	if(mtr){
		topMetre-=mtr;
		$('.topMetre').html(topMetre);
	}
}
function trSil(id,etiketNO){
	$.get('sayfa/<?Php echo $tbl?>/cekitr_ajx.php',{'cekitrx':id},function(a){
		if(a==1){
			//metreCikart(etiketNO);
			$('#tr_'+id).remove();
			metreleriTopla();
			sirala();
		}
		else{
			alert('Bir hata oluştu ve girdi kaldırılamadı! Tekrar deneyiniz.');
		}
	});
}
function detayGir() {
	if(detayGirA){
		detayGirA=false;
		$(this).css('background-color','midnightblue');
		$('#txt').attr('disabled',false).focus();
		$('.dtyTxt').attr('disabled',true);
	}
	else{
		detayGirA=true;
		$(this).css('background-color','#3C3');
		$('#txt').attr('disabled',true);
		$('.dtyTxt').attr('disabled',false);
	}
}
</script>