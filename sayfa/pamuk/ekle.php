<?Php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			if(!z(5,'WHERE ad="'.$_X['ad'].'"')){
				$_X['siparisS']=sayi($_X['siparisS']);
				$_X['usd']=sayi($_X['usd']);
				$_X['eur']=sayi($_X['eur']);
				$_X['gbp']=sayi($_X['gbp']);
				$_X['tarih']=z('datetime');
				if(z(2,$_X)){
					z(33,'ekle',1);
					if(z(7,'git1'))git();
					unset($_X);
				}
				else z(33,'ekle',-1);
			}
			else z(33,'ekle',3);
		//}
		//else z(33,'ekle',12);
	}
	else z(33,'ekle',11);
}
?>
<div class="sayfa">
	<div class="baslik"><h3><?Php echo $bsl[0]?> Ekle</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Kayıt başarılı.');break;
			case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
			case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
		}?>
        <form action="" method="post">
            <div class="blok">
                <table cellpadding="0" cellspacing="0"><tbody>
                	<tr><th><?Php echo $bsl[2]?> AD *</th><td><input type="text" class="required" required autofocus name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" /></td></tr>
					<?Php /* if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }*/?>
					<tr><th>SİPARİŞ SAYISI</th><td><input type="text" name="<?Php echo $tbl?>[siparisS]" value="<?Php echo !empty($_X['siparisS'])?$_X['siparisS']:''?>" /></td></tr>
					<tr><th>USD</th><td><input type="text" name="<?Php echo $tbl?>[usd]" value="<?Php echo !empty($_X['usd'])?$_X['usd']:''?>" /></td></tr>
					<tr><th>EURO</th><td><input type="text" name="<?Php echo $tbl?>[eur]" value="<?Php echo !empty($_X['eur'])?$_X['eur']:''?>" /></td></tr>
					<tr><th>GBP</th><td><input type="text" name="<?Php echo $tbl?>[gbp]" value="<?Php echo !empty($_X['gbp'])?$_X['gbp']:''?>" /></td></tr>
					
                    
                    <tr><th colspan="2"><input type="submit" value="Kaydet" /></th></tr>
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
    </div>
</div>
<?Php if(!empty($_NSN)){?>
<script type="text/javascript">
$(document).ready(function(e) {
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
});
</script>
<?Php }?>