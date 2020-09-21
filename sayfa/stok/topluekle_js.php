<?php /*/ ?>
<?php $_Siparis=z(1,"WHERE tipNo<>''",'id,tipNo,partiNo','boya_takip');if(!empty($_Siparis)){?><script src="js/jquery-ui.js"></script>
<script>
$(function(){
	$(".autoPartiNo").autocomplete({source: [<?php $tagsx='';$tagx=array();foreach($_Siparis as $fe)if(!in_array($fe['partiNo'],$tagx)){if(!empty($tagsx))$tagsx.=',';$tagsx.='"'.$fe['partiNo'].'"';$tagx[]=$fe['partiNo'];}echo $tagsx;?>]});
	$(".autoTipNo").autocomplete({source: [<?php $tagsx='';$tagx=array();foreach($_Siparis as $fe)if(!in_array($fe['tipNo'],$tagx)){if(!empty($tagsx))$tagsx.=',';$tagsx.='"'.$fe['tipNo'].'"';$tagx[]=$fe['tipNo'];}echo $tagsx;?>]});
});
</script><?php }?>
<?php /*/ ?>

<script type="text/javascript">





// Seçilen inputun içine birim belirteci ekler
function birimEkle(ad,ek){
	$('input[name="<?php echo $tbl?>['+ad+']"]').change(function(e) {
		var vl=$(this).val();
        if($.isNumeric(vl.replace(',','.')))$(this).val(vl+ek);
    });
}
// bunun-icini-kopyala clasın içindekileri bunun-icine-yapistir classına kopyalar ve kendisini silebilen sil butonu türetir
var trsayac=<?php echo !empty($_XStok)?count($_XStok):1 ?>;
function trEkle(){
	$('.bunun-icine-yapistir').append($('.bunun-icini-kopyala').html().replace('<!-- SİL -->','<input type="button" onclick="trSil(this)" value="x" />').replace('<!-- SAYAÇ -->', '<span id="sayac">'+(++trsayac)+"</span>" )
		);
}
function trSay(){
	trsayac=1;
	$('.bunun-icine-yapistir').children().each(function(){
		var ths=$(this);
		ths.html(ths.html().replace('<!-- SAYAÇ -->', '<span id="sayac">'+(++trsayac)+"</span>" ));
		ths.find("#sayac").html(trsayac);
	});
}
// Bulunduğu satırı siler
function trSil(ths){
	$(ths).parent().parent().remove();
	trSay();
}
// Enter tuşu ile bir sonraki tabindex değerine focuslanır 
function tabIndexEnterTab(){
	$('[tabindex]').keypress(function(e){
		if(e.keyCode==13 && $(this).context.type!='submit'){ 
			if(!window.gonderAnahtar){
				if($(this).context.nodeName!='TEXTAREA'){

				 	e.preventDefault();
				 	var tabx = $(this).attr('tabindex');
				 	var inpx=$('[tabindex="'+tabx+'"]');
				 	var j=0,lng=0;
				 	inpx.each(function(){lng++;});
				 	inpx.each(function(i,e2){
				 		if($(this).is(':focus')){
				 			if(lng-1 == j){
				 				j=-1;
				 				tabx++;
				 			}
				 			$('[tabindex="'+tabx+'"]:eq('+(j+1)+')').focus();
				 			return false;
				 		}
				 		j++;
				 	});
			 	
				}
			}
			window.gonderAnahtar=1; setTimeout(function(){window.gonderAnahtar=0;},200);
		}
	});
}
// son tr-inp classına sahip input da doldu ise yeni satır ekler
function trOtoEkle(){
	$('.tr-inp:last').focus(function(e){
		if($(this).val()==""){
			trEkle();
			tabIndexEnterTab();
			trOtoEkle();
		}
	});
}

$(document).ready(function(e) {
	tabIndexEnterTab();
	trOtoEkle();


	
	


<?php /*/ ?>
	//birimEkle('mamulEn',' cm');
	birimEkle('mamulEn',' m²');
	birimEkle('mamulGr',' gr/m²');
	birimEkle('metraj',' mt');
	$('input[name="<?php echo $tbl.'[partiNo]'?>"]').bind("change focusout",function(e) {
		var partiNo=$(this).val();
		if(partiNo)
		$.get('i.php?i=cvr&bunu=partiNo&buna=boya_takip&partiNo='+$(this).val(),function(e){
			if(e){
				//$('#boya_takip').html(e);
				e=JSON.parse(e);
				if(e){
					
					$('#boya_takip').html('<h3>Bulnan Boya Takip Detayı</h3><table cellpadding="0" cellspacing="0"><tbody><tr id="tr1"><th id="th1">Müşteri</th><th id="th2">Boyama Salonu</th><th id="th3">Boyama Özelliği</th><th id="th4">Tip NO</th><th id="th5">Parti NO</th><th id="th6">Kumaş Tipi</th><th id="th7">Mamul En Gramaj</th><th id="th8">Renk</th><th id="th9">Giren MT</th><th id="th10">Sipariş MT</th><th id="th11">Boyanan MT</th><th id="th12">Fire Oranı</th><th id="th13">Sevk Edilen MT</th><th id="th14">Boyaya Giriş T</th><th id="th15">Sipariş Tarihi</th><th id="th16">Sevk Tarihi</th><th id="th17">Teslim Tarihi</th><th id="th18">Notlar</th><th id="th19">Renk Takibi</th></tr></table>');
					
					
					if(e.tipNo)
					$('input[name="<?php echo $tbl.'[tipNo]'?>"]').val(e.tipNo).css('background-color','#ffc');
					if(e.tip){
						$('select[name="<?php echo $tbl.'[kalite_ID]'?>"] option').removeAttr('selected').filter('[value="'+e.tip+'"]').attr('selected',true);
						$('select[name="<?php echo $tbl.'[kalite_ID]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDrenkNo){
						$('select[name="<?php echo $tbl.'[nesne_IDrenkNo]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDrenkNo+'"]').attr('selected',true);
						$('select[name="<?php echo $tbl.'[nesne_IDrenkNo]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDdesenNo){
						$('select[name="<?php echo $tbl.'[nesne_IDdesenNo]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDdesenNo+'"]').attr('selected',true);
						$('select[name="<?php echo $tbl.'[nesne_IDdesenNo]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDkompozisyon){
						$('select[name="<?php echo $tbl.'[nesne_IDkompozisyon]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDkompozisyon+'"]').attr('selected',true);
						$('select[name="<?php echo $tbl.'[nesne_IDkompozisyon]'?>"]').css('background-color','#ffc');
					}
					if(e.ozellik)
					$('input[name="<?php echo $tbl.'[mamulEn]'?>"]').val(e.ozellik+'').css('background-color','#ffc');
					if(e.ozellik2)
					$('input[name="<?php echo $tbl.'[mamulGr]'?>"]').val(e.ozellik2+' gr/m²').css('background-color','#ffc');
					//if(e.siparis_mt)
					//$('input[name="<?php echo $tbl.'[metraj]'?>"]').val(e.siparis_mt+' mt').css('background-color','#ffc');
					
					//$('select[name="<?php echo $tbl.'[renkNo]'?>"] option').removeAttr('selected').filter('[value="'+e+'"]').attr('selected',true);
					
				}
				else uyr(partiNo+' parti numarasına sahip otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
			}
			else uyr(partiNo+' parti numarasına sahip otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
		});
    });
<?php /*/ ?>

	<?php if(!empty($_NSN)){?>
		<?php foreach($_NSN as $ad=>$n){?>
		$(".nesneSlc_<?php echo $ad?>").change(function(e) {
			if($(this).val()=='yeni'){
				pencereAc("#ekleForm_<?php echo $ad?>");
				$("#ekleForm_<?php echo $ad?> input:first").focus();
			}
		});
		$('#ekleForm_<?php echo $ad?> form').ajaxForm(function(e) { 
			if(e>0){
				$(".nesneSlc_<?php echo $ad?>").append('<option value="'+e+'">'+<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val()+' '+<?php }?>'</option>');
				$(".nesneSlc_<?php echo $ad?> option").attr('selected',false);
				$(".nesneSlc_<?php echo $ad?> option:last-child").attr('selected',true);
				<?php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?php echo $ad?> input[name="nesne[<?php echo $fei?>]"]').val('');<?php }?>
				pencereKapat();
			}
			else{
				alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
			}
		});
		<?php }?>
	<?php }?>

});
</script>