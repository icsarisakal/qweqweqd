<?Php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	//if(!z(5,'WHERE topNo="'.$_X['topNo'].'" ' /* AND ID<>"'.$ID.'" */)){
		$_X['metraj']=sayi($_X['metraj']);
		$_X['goster']=!empty($_X['goster'])?json_encode($_X['goster']):'';
		if(z(3,$ID,$_X)){
			z(33,'duzenle',1);
			
			$yh['ID']=$ID;
			$yh['tbl']='stok';
			require(__DIR__.'/../ceki/yh/ceki_top1K1A2K.php');
			
			$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>1,'mesaj'=>'[MESAJ]302[/MESAJ] ID: "'.$ID.'" Tip NO: "'.(!empty($_X['tipNo'])?$_X['tipNo']:'').'"');
			require('parca/log.php');
			if(z(7,'git1'))git();
		}
		else z(33,'duzenle',-1);
	//}
	//else {z(33,'duzenle',3);$_XAd=$_X['topNo'];}
}

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X['goster'])){$_X['goster']=(array)json_decode($_X['goster']);}
if(!empty($_X)){
?>
<div class="sayfa">
	<div class="baslik"><h3>Stok Düzenle</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'duzenle')){
			case -1:_uyr(0,'Düzenleme işlemi başarısız!');break;
			case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
			case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
			case 3:_uyr(2,'<strong>'.$_XAd.'</strong> top numarasına sahip bir girdi bulunuyor. Lütfen başka bir numara belirtiniz.');break;
		}?>
        <form action="" method="post">
            <div class="blok">
                <table cellpadding="0" cellspacing="0"><tbody>
                	<tr>
                    	<th>PARTİ NO<?Php echo gstr('partiNo',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[partiNo]" value="<?Php echo !empty($_X['partiNo'])?$_X['partiNo']:''?>" /></td>
                        <th>TOP NO<?Php echo gstr('topNo',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[topNo]" value="<?Php echo !empty($_X['topNo'])?$_X['topNo']:''?>" /></td>
                    </tr>
                	<tr>
                    	<th>TİP NO<?Php echo gstr('tipNo',$_X)?></th><td><input type="text" class="autoTipNo" autofocus tabindex="1" name="<?Php echo $tbl?>[tipNo]" value="<?Php echo !empty($_X['tipNo'])?$_X['tipNo']:''?>" placeholder="Tip No" /></td>
                    	<th>LOT NO<?Php echo gstr('lotNo',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[lotNo]" value="<?Php echo !empty($_X['lotNo'])?$_X['lotNo']:''?>" /></td>
                    </tr>
                    <tr>
                    	<th>KUMAŞ CİNSİ<?Php echo gstr('kalite_ID',$_X)?></th><td><?Php 
						$_Kalite=z(1,"WHERE id<>'0'",NULL,'kalite');
						if(!empty($_Kalite)){
							echo '<select name="'.$tbl.'[kalite_ID]"><option value="">seçiniz</option>';
							foreach($_Kalite as $fe){
								echo '<option value="'.$fe['id'].'" '.(!empty($_X['kalite_ID'])&&$_X['kalite_ID']==$fe['id']?'selected':'').'>'.trmtn($fe['ad']).'</option>';
							}
							echo '</select>';
						}
						?></td>
                        <th>METRAJ<?Php echo gstr('metraj',$_X)?></th><td><input type="text" tabindex="2" name="<?Php echo $tbl?>[metraj]" value="<?Php echo !empty($_X['metraj'])?sayi($_X['metraj'],2):''?>" /></td>
                    </tr>
                    <tr>
                    	<th>RENK NO<?Php echo gstr('nesne_IDrenkNo',$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_IDrenkNo]','detay'=>'class="nesneSlc_renkNo" tabindex="1"','t'=>'nesne','alan'=>'ID,metin1,metin2','ayrac'=>' - ','sd'=>"WHERE ad='renkNo'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_IDrenkNo'])?$_X['nesne_IDrenkNo']:substr(z('date'),0,7)))?></td>
                        
                        <th rowspan="5">AÇIKLAMA<?Php echo gstr('aciklama',$_X,0)?></th><td rowspan="5"><textarea type="text" style="height:100%;" tabindex="2" name="<?Php echo $tbl?>[aciklama]" ><?Php echo !empty($_X['aciklama'])?$_X['aciklama']:''?></textarea></td>
                    </tr>
                    <tr><th>DESEN NO<?Php echo gstr('nesne_IDdesenNo',$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_IDdesenNo]','detay'=>'class="nesneSlc_desenNo" tabindex="1"','t'=>'nesne','alan'=>'ID,metin1,metin2','ayrac'=>' - ','sd'=>"WHERE ad='desenNo'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_IDdesenNo'])?$_X['nesne_IDdesenNo']:substr(z('date'),0,7)))?></td></tr>
					
                    <tr><th>MAMUL EN / GR m²<?Php echo gstr('mamulEn',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[mamulEn]" value="<?Php echo !empty($_X['mamulEn'])?$_X['mamulEn']:''?>" /></td></tr>
                    <?Php /*<tr>
                    	<th>MAMUL GR<?Php echo gstr('mamulGr',$_X)?></th><td><input type="text" tabindex="1" name="<?Php echo $tbl?>[mamulGr]" value="<?Php echo !empty($_X['mamulGr'])?sayi($_X['mamulGr']):''?>" /></td>
                        <th rowspan="4">&nbsp;</th><td rowspan="4">&nbsp;</td>
                    </tr>*/?>
                    
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){if(!in_array($ad,array('renkNo','desenNo'))){?>
                    <tr><th><?Php echo $n['ad']?><?Php echo gstr($ad,$_X)?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'" tabindex="1"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:0))?></td></tr>
                    <?Php }}?>
                    
                    <tr><th><a href="?s=<?Php echo $tbl?>&a=detay&id=<?Php echo $ID?>" class="btnSub btn1">İptal</a></th><th colspan="3"><input type="submit" class="btn3" value="Kaydet" /></th></tr>
                </tbody></table>
            </div>
            <input type="hidden" name="git1" value="?s=<?Php echo $tbl?>&a=detay&id=<?Php echo $ID?>" />
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
    </div>
</div>
<?Php $_Siparis=z(1,"WHERE tipNo<>''",'id,tipNo,partiNo','boya_takip');if(!empty($_Siparis)){?><script src="js/jquery-ui.js"></script>
<script>var availableTags = [<?Php $tagsx='';foreach($_Siparis as $fe){if(!empty($tagsx))$tagsx.=',';$tagsx.='"'.$fe['tipNo'].'"';}echo $tagsx;?>];
$(function(){
	$(".autoTipNo").autocomplete({source: availableTags});
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
	/*$('input[name="<?Php echo $tbl.'[tipNo]'?>"]').change(function(e) {
		var tipNo=$(this).val();
		$.get('i.php?i=cvr&bunu=tipNo&buna=boya_takip&tipNo='+$(this).val(),function(e){
			if(e){
				//$('#boya_takip').html(e);
				e=JSON.parse(e);
				if(e){
					if(e.partiNo)
					$('input[name="<?Php echo $tbl.'[partiNo]'?>"]').val(e.partiNo).css('background-color','#ffc');
					if(e.tipID){
						$('select[name="<?Php echo $tbl.'[kalite_ID]'?>"] option').removeAttr('selected').filter('[value="'+e.tipID+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[kalite_ID]'?>"]').css('background-color','#ffc');
					}
					if(e.renkID){
						$('select[name="<?Php echo $tbl.'[nesne_IDrenkNo]'?>"] option').removeAttr('selected').filter('[value="'+e.renkID+'"]').attr('selected',true);
						$('select[name="<?Php echo $tbl.'[nesne_IDrenkNo]'?>"]').css('background-color','#ffc');
					}
					if(e.ozellik)
					$('input[name="<?Php echo $tbl.'[mamulEn]'?>"]').val(e.ozellik+' cm').css('background-color','#ffc');
					if(e.ozellik2)
					$('input[name="<?Php echo $tbl.'[mamulGr]'?>"]').val(e.ozellik2+' gr/m²').css('background-color','#ffc');
					if(e.siparis_mt)
					$('input[name="<?Php echo $tbl.'[metraj]'?>"]').val(e.siparis_mt+' mt').css('background-color','#ffc');
				}
				else uyr(tipNo+' adına otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
			}
			else uyr(tipNo+' adına otomatik doldurma verileri için herhangi bir sonuç bulunamadı!');
		});
    });*/
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
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>