<?Php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!empty($_X['ad'])){
		//if(!empty($_X['musteri_ID'])){
			if(!z(5,'WHERE ad="'.$_X['ad'].'"')){
				$_X['personel_ID']=z('lgn','ID');
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
	<div class="baslik"><h3>Firma Ekle</h3></div>
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
                	<tr><th>FİRMA AD *</th><td><input type="text" class="required" required autofocus name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" /><div style="margin-top:3px;"><label><input type="checkbox" name="<?Php echo $tbl?>[onayli]" value="1" <?Php echo !empty($_X['onayli'])?'checked=""checked':''?> />&nbsp;ONAYLI TEDARİKÇİ</label></div></td></tr>
					<tr><th>İLGİLİ</th><td><input type="text" name="<?Php echo $tbl?>[ilgili]" value="<?Php echo !empty($_X['ilgili'])?$_X['ilgili']:''?>" /></td></tr>
					<tr><th>ÜNVANI</th><td><input type="text" name="<?Php echo $tbl?>[unvani]" value="<?Php echo !empty($_X['unvani'])?$_X['unvani']:''?>" /></td></tr>
					<tr><th>TEL</th><td><input type="text" name="<?Php echo $tbl?>[tel]" value="<?Php echo !empty($_X['tel'])?$_X['tel']:''?>" /></td></tr>
					<tr><th>FAX</th><td><input type="text" name="<?Php echo $tbl?>[fax]" value="<?Php echo !empty($_X['fax'])?$_X['fax']:''?>" /></td></tr>
					<tr><th>E-POSTA</th><td><input type="email" name="<?Php echo $tbl?>[eposta]" value="<?Php echo !empty($_X['eposta'])?$_X['eposta']:''?>" /></td></tr>
					<tr><th>VERGİ D.</th><td><input type="text" name="<?Php echo $tbl?>[vergiD]" value="<?Php echo !empty($_X['vergiD'])?$_X['vergiD']:''?>" /></td></tr>
					<tr><th>VERGİ NO</th><td><input type="text" name="<?Php echo $tbl?>[vergiNo]" value="<?Php echo !empty($_X['vergiNo'])?$_X['vergiNo']:''?>" /></td></tr>
					<tr><th>FATURA ADRESİ</th><td><textarea name="<?Php echo $tbl?>[adresFatura]"><?Php echo !empty($_X['adresFatura'])?$_X['adresFatura']:''?></textarea></td></tr>
					<tr><th>SEVK ADRESİ</th><td><textarea name="<?Php echo $tbl?>[adresSevk]"><?Php echo !empty($_X['adresSevk'])?$_X['adresSevk']:''?></textarea></td></tr>
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }?>
                    
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