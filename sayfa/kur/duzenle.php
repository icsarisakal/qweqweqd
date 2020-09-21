<?Php
if(z(8,'id')){
$ID=z(8,'id');

if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!z(5,'WHERE ad="'.$_X['ad'].'" AND ID<>"'.$ID.'"')){
		$_X['siparisS']=sayi($_X['siparisS']);
		$_X['usd']=sayi($_X['usd']);
		$_X['eur']=sayi($_X['eur']);
		$_X['gbp']=sayi($_X['gbp']);
		if(z(3,$ID,$_X)){
			z(33,'duzenle',1);
		}
	}
	else {z(33,'duzenle',3);$_XAd=$_X['ad'];}
}

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
?>
<div class="sayfa">
	<div class="baslik"><h3><?Php echo $bsl[0]?> Düzenle</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'duzenle')){
			case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
			case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
			case 3:_uyr(2,'<strong>'.(!empty($_XAd)?$_XAd:'').'</strong> daha önceden kaydedilmiş. Lütfen kontrol ediniz veya başka bir isim kullanınız.');break;
		}?>
        <form action="" method="post">
            <div class="blok">
                <table cellpadding="0" cellspacing="0"><tbody>
                	<tr><th><?Php echo $bsl[2]?> AD *</th><td><input type="text" class="required" required autofocus name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" /></td></tr>
                    
					<?Php /* if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }*/?>
					<tr><th>SİPARİŞ SAYISI</th><td><input type="text" name="<?Php echo $tbl?>[siparisS]" value="<?Php echo !empty($_X['siparisS'])?$_X['siparisS']:''?>" /></td></tr>
					<tr><th>USD</th><td><input type="text" name="<?Php echo $tbl?>[usd]" value="<?Php echo !empty($_X['usd'])?sayi($_X['usd'],2):''?>" /></td></tr>
					<tr><th>EURO</th><td><input type="text" name="<?Php echo $tbl?>[eur]" value="<?Php echo !empty($_X['eur'])?sayi($_X['eur'],2):''?>" /></td></tr>
					<tr><th>GBP</th><td><input type="text" name="<?Php echo $tbl?>[gbp]" value="<?Php echo !empty($_X['gbp'])?sayi($_X['gbp'],2):''?>" /></td></tr>
					
					
                    
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
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>