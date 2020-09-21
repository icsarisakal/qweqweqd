<?Php
$_X=NULL;
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!empty($_X['partiNo'])){
		if(!empty($_X['tipNo'])){
			if(!empty($_X['kalite_ID'])){
				//if(!z(5,'WHERE tipNo="'.$_X['tipNo'].'"')){
					//$_X['mamulEn']=sayi($_X['mamulEn']);
					$_X['mamulGr']=sayi($_X['mamulGr']);
					$_X['metraj']=sayi($_X['metraj']);
					$_X['personel_ID']=z('lgn','ID');
					$_X['tarih']=z('datetime');
					$_X['goster']=!empty($_X['goster'])?json_encode($_X['goster']):'';
					z(6,$tbl);
					if(z(2,$_X)){
						$ID=z(1,'son','ID');
						z(33,'ekle',1);
						$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>1,'mesaj'=>'[MESAJ]1001[/MESAJ] Stok ID: "'.$ID.'" Tip No: "'.$_X['tipNo'].'" Kumaş ID: "'.$_X['kalite_ID'].'"');
						require('parca/log.php');
						header('Location: ?s='.$syf.'&a=detay&id='.$ID);die;
						//if(z(7,'git1'))git();
						unset($_X);
					}
					else z(33,'ekle',-1);
				//}
				//else z(33,'ekle',3);
			}
			else z(33,'ekle',12);
		}
		else z(33,'ekle',11);
	}
	else z(33,'ekle',13);
}
?>
<div class="sayfa">
	<div class="baslik"><h3>Stok Girişi</h3></div>
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
            <div class="blok">
                <table cellpadding="0" cellspacing="0"><tbody>
                	<tr>
                    	<th>PARTİ NO *<?Php echo gstr('partiNo',$_X)?></th><td><input type="text" class="autoPartiNo" autofocus tabindex="1" name="<?Php echo $tbl?>[partiNo]" value="<?Php echo !empty($_X['partiNo'])?$_X['partiNo']:''?>" /></td>
                        <th>TOP NO<?Php echo gstr('topNo',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[topNo]" value="<?Php echo !empty($_X['topNo'])?$_X['topNo']:''?>" /></td>
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
                    <?Php /*<tr>
                    	<th>MAMUL GR<?Php echo gstr('mamulGr',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[mamulGr]" placeholder="0,00 gr/m²" value="<?Php echo !empty($_X['mamulGr'])?$_X['mamulGr']:''?>" /></td>
                        
                    </tr>*/?>
                    
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){if(!in_array($ad,array('renkNo','desenNo'))){?>
                    <tr><th><?Php echo $n['ad']?><?Php echo gstr($ad,$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'" tabindex="1"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:0))?></td></tr>
                    <?Php }}?>
                    
                    <tr><th colspan="4"><input type="submit" class="btn3" tabindex="3" value="Kaydet" /></th></tr>
                </tbody></table>
            </div>
            <input type="hidden" name="git1" value="?s=<?Php echo $tbl?>&a=listele" />
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
<?Php $_Siparis=z(1,"WHERE tipNo<>''",'id,tipNo,partiNo','boya_takip');if(!empty($_Siparis)){?><script src="js/jquery-ui.js"></script>
<script>
$(function(){
	$(".autoPartiNo").autocomplete({source: [<?Php $tagsx='';$tagx=array();foreach($_Siparis as $fe)if(!in_array($fe['partiNo'],$tagx)){if(!empty($tagsx))$tagsx.=',';$tagsx.='"'.$fe['partiNo'].'"';$tagx[]=$fe['partiNo'];}echo $tagsx;?>]});
	$(".autoTipNo").autocomplete({source: [<?Php $tagsx='';$tagx=array();foreach($_Siparis as $fe)if(!in_array($fe['tipNo'],$tagx)){if(!empty($tagsx))$tagsx.=',';$tagsx.='"'.$fe['tipNo'].'"';$tagx[]=$fe['tipNo'];}echo $tagsx;?>]});
});
</script><?Php }?>
<script type="text/javascript">
function birimEkle(ad,ek){
	$('input[name="<?Php echo $tbl?>['+ad+']"]').change(function(e) {
		var vl=$(this).val();
        if($.isNumeric(vl.replace(',','.')))$(this).val(vl+ek);
    });
}
$(document).ready(function(e) {
	//birimEkle('mamulEn',' cm');
	birimEkle('mamulEn',' m²');
	birimEkle('mamulGr',' gr/m²');
	birimEkle('metraj',' mt');
	$('input[name="<?Php echo $tbl.'[partiNo]'?>"]').bind("change focusout",function(e) {
		var partiNo=$(this).val();
		if(partiNo)
		$.get('i.php?i=cvr&bunu=partiNo&buna=boya_takip&partiNo='+$(this).val(),function(e){
			if(e){
				//$('#boya_takip').html(e);
				e=JSON.parse(e);
				if(e){
					
					/*$('#boya_takip').html('<h3>Bulnan Boya Takip Detayı</h3><table cellpadding="0" cellspacing="0"><tbody><tr id="tr1"><th id="th1">Müşteri</th><th id="th2">Boyama Salonu</th><th id="th3">Boyama Özelliği</th><th id="th4">Tip NO</th><th id="th5">Parti NO</th><th id="th6">Kumaş Tipi</th><th id="th7">Mamul En Gramaj</th><th id="th8">Renk</th><th id="th9">Giren MT</th><th id="th10">Sipariş MT</th><th id="th11">Boyanan MT</th><th id="th12">Fire Oranı</th><th id="th13">Sevk Edilen MT</th><th id="th14">Boyaya Giriş T</th><th id="th15">Sipariş Tarihi</th><th id="th16">Sevk Tarihi</th><th id="th17">Teslim Tarihi</th><th id="th18">Notlar</th><th id="th19">Renk Takibi</th></tr></table>');*/
					
					
					if(e.tipNo)
					$('input[name="<?Php echo $tbl.'[tipNo]'?>"]').val(e.tipNo).css('background-color','#ffc');
					if(e.tip){
						$('select[name="<?Php echo $tbl.'[kalite_ID]'?>"] option').removeAttr('selected').filter('[value="'+e.tip+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[kalite_ID]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDrenkNo){
						$('select[name="<?Php echo $tbl.'[nesne_IDrenkNo]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDrenkNo+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[nesne_IDrenkNo]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDdesenNo){
						$('select[name="<?Php echo $tbl.'[nesne_IDdesenNo]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDdesenNo+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[nesne_IDdesenNo]'?>"]').css('background-color','#ffc');
					}
					if(e.nesne_IDkompozisyon){
						$('select[name="<?Php echo $tbl.'[nesne_IDkompozisyon]'?>"] option').removeAttr('selected').filter('[value="'+e.nesne_IDkompozisyon+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[nesne_IDkompozisyon]'?>"]').css('background-color','#ffc');
					}
					if(e.ozellik)
					$('input[name="<?Php echo $tbl.'[mamulEn]'?>"]').val(e.ozellik+'').css('background-color','#ffc');
					if(e.ozellik2)
					$('input[name="<?Php echo $tbl.'[mamulGr]'?>"]').val(e.ozellik2+' gr/m²').css('background-color','#ffc');
					//if(e.siparis_mt)
					//$('input[name="<?Php echo $tbl.'[metraj]'?>"]').val(e.siparis_mt+' mt').css('background-color','#ffc');
					
					//$('select[name="<?Php echo $tbl.'[renkNo]'?>"] option').removeAttr('selected').filter('[value="'+e+'"]').attr('selected',true);
					
				}
				else uyr(partiNo+' parti numarasına sahip otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
			}
			else uyr(partiNo+' parti numarasına sahip otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
		});
    });
	<?Php if(!empty($_NSN)){?>
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
			else{
				alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
			}
		});
		<?Php }?>
	<?Php }?>
});
</script>