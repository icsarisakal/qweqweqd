<script type="text/javascript">
var urunI=<?Php echo !empty($_Urun)?count($_Urun)-1:0?>,urunTr='';
function trEkle(tblID,btnID){
	$(btnID).click(function(e) {
		if(!urunTr)urunTr=$(tblID+' tbody tr:first-child').html();
		urunI++;
        $(tblID+' tbody').append('<tr>'+urunTr.replace(/\[0\]/g,'['+urunI+']')+'</tr>');
		$('.sil').click(function(e){if($(tblID+' tbody tr').length>1){$(this).parent().parent().remove();klnLmt();}});
		sonrakiInput();
		$('.fiyat,.miktar,.pb,.kdvA,.kdv').change(klnLmt);
		klnLmt();
    });
}
var submitA=true;
function sonrakiInput(frmID,inpID){
	if(!frmID)frmID='form';
	if(!inpID)inpID='input';
	$(inpID).keydown(function(e) {
        if(e.which==13){
  			var inputs = $(this).closest(frmID).find(':'+inpID);
  			inputs.eq( inputs.index(this)+ 1 ).focus().select();
			submitA=false;
		}
    }).keyup(function(e){submitA=true;});
	$(frmID+' input[type=submit]').hover(function(e){submitA=true;}).dblclick(function(e){submitA=true;});
}
function sonrakiInputSubmit(frmID){
	if(!frmID)frmID='form';
	$(frmID).submit(function(e){
		if(submitA){
			var bosVar=false;
			$(frmID+' .required').each(function(index, element) {
				if(!$(frmID+' .required:eq('+index+')').val()){
					$(frmID+' .required:eq('+index+')').css('background-color','#fcc');
					if(!bosVar)$(frmID+' .required:eq('+index+')').select();
					setTimeout(function(){$(frmID+' .required:eq('+index+')').css('background-color',false);},1000);
					submitA=false;
					bosVar=true;
				}
			});
		}
		return submitA;
	});
}
var ilkKlnLmt=0,klnLmtx=0;
function klnLmt(){
	if(!ilkKlnLmt)ilkKlnLmt=sy($('#klnLmt').html());
	var klnLmtD=ilkKlnLmt+klnLmtx;
	var sprsTtr=0;
	var _Tutar=Array();
	$('.sprsTtr').hide();
	$('#urunTbl tbody tr').each(function(index, element) {
		var _Urun=Array();
		_Urun['fiyat']=sy($('#urunTbl tbody tr:eq('+index+') .fiyat').val());
		_Urun['pb']=$('#urunTbl tbody tr:eq('+index+') .pb:checked').val();
		_Urun['miktar']=sy($('#urunTbl tbody tr:eq('+index+') .miktar').val());
		_Urun['kdvA']=$('#urunTbl tbody tr:eq('+index+') .kdvA:checked').val();
		_Urun['kdv']=sy($('#urunTbl tbody tr:eq('+index+') .kdv').val());
		
		if(!_Tutar[_Urun['pb']]){
			$('#sprsTtr'+_Urun['pb']).show();
			if(_Urun['kdvA'])_Tutar[_Urun['pb']]=_Urun['fiyat']*_Urun['miktar'];
			else _Tutar[_Urun['pb']]=_Urun['fiyat']*_Urun['miktar']*(_Urun['kdv']/100+1);
		}
		else{
			$('#sprsTtr'+_Urun['pb']).show();
			if(_Urun['kdvA'])_Tutar[_Urun['pb']]+=_Urun['fiyat']*_Urun['miktar'];
			else _Tutar[_Urun['pb']]+=_Urun['fiyat']*_Urun['miktar']*(_Urun['kdv']/100+1);
		}
		tarih=$('select[name="sepet[tarihSiparis][]"]:eq(2)').val()+'-'+$('select[name="sepet[tarihSiparis][]"]:eq(1)').val()+'-'+$('select[name="sepet[tarihSiparis][]"]:eq(0)').val();
		$.get('parca/kur.php?fiyat='+_Urun['fiyat']+'&bunu='+_Urun['pb']+'&tarih='+tarih,function(fiyat){
			_Urun['tutar']=fiyat*_Urun['miktar'];
			if(!_Urun['kdvA'])_Urun['tutar']*=(_Urun['kdv']/100+1);
			sprsTtr+=_Urun['tutar'];
			klnLmtD-=_Urun['tutar'];
			
			if(klnLmtD<0)$('#klnLmt').fadeOut('fast',function(){
				$(this).html('0');
				$(this).css('color','#f00').fadeIn('fast');
			});
			else $('#klnLmt').fadeOut('fast',function(){
				$(this).css('color','#00f').html(sy(klnLmtD,100)).fadeIn('fast');
			});
			$('#sprsTtr').fadeOut('fast',function(){
				$(this).html(sy(sprsTtr,100)).fadeIn('fast');
			});
		});
		$('#sprsTtr'+_Urun['pb']).fadeOut('fast',function(){
			$('#sprsTtr'+_Urun['pb']+' span').html(sy(_Tutar[_Urun['pb']],100));
			$(this).fadeIn('fast');
		});
    });
}
$(document).ready(function(e) {
	trEkle('#urunTbl','#urunEkleBtn');
	sonrakiInput();
	sonrakiInputSubmit();
	$('.sil').click(function(e){if($('#urunTbl tbody tr').length>1){$(this).parent().parent().remove();klnLmt();}});
	$('.fiyat,.miktar,.pb,.kdvA,.kdv').change(klnLmt);
	klnLmt();
	
<?Php if(($admn||ytk('nesne','ekle'))&&!empty($_NSN)){?>
	<?Php foreach($_NSN as $ad=>$n){?>
	$(".nesneSlc_<?Php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?Php echo $ad?>");
			$("#ekleForm_<?Php echo $ad?> input:first").focus();
		}
    });
	$('#ekleForm_<?Php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?Php echo $ad?>").append('<option value="'+e+'">'+<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val()+' '+<?Php }?>'</option>');
			$(".nesneSlc_<?Php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?Php echo $ad?> option:last-child").attr('selected',true);
			<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val('');<?Php }?>
			pencereKapat();
		}
		else{alert(e);
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?Php }?>
<?Php }?>
});
</script>