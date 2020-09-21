<?Php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!empty($_X['nesne_IDddepartman'])){
		if(!empty($_X['baslik']))$_X['baslik']=strip_tags($_X['baslik']);
		if(!empty($_X['baslik'])){
			if(!empty($_X['mesaj'])){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				$_X['ip']=z('sw','REMOTE_ADDR');
				$msj=$_X['mesaj'];unset($_X['mesaj']);
				
				if(z(2,$_X)){
					$ID=z(1,'son','ID');
					$_Mesaj=array(
						'destek_ID'=>z(1,'son','ID'),
						'personel_ID'=>$_X['personel_ID'],
						'tarih'=>$_X['tarih'],
						'mesaj'=>strip_tags($msj)
					);
					if(z(2,$_Mesaj,$tbl.'mesaj')){
						z(33,'ekle',1);
						$mtip='ekle';
						require(__DIR__.'/mail_prc.php');
						unset($_X);
						header('Location: ?s='.$tbl.'&a=detay&id='.$ID);die;
					}
				}
				else z(33,'ekle',-1);
			}
			else z(33,'ekle',13);
		}
		else z(33,'ekle',12);
	}
	else z(33,'ekle',11);
}
?>
<div class="sayfa">
	<div class="baslik"><h3>Destek Talebi Oluştur</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'ekle')){
			case -1:_uyr(0,'Kayıt başarısız.');break;
			case 1:_uyr(1,'Destek talebi başarıyla oluşturuldu.');break;
			case 11:_uyr(2,'Lütfen departman seçiniz.');break;
			case 12:_uyr(2,'Lütfen konuyu belirtiniz.');break;
			case 13:_uyr(2,'Lütfen mesajınızı yazınız.');break;
		}?>
        <form action="" method="post">
            <div class="blok">
                <table cellpadding="0" cellspacing="0"><tbody>
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.' required" required style="width:500px;"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="">seçiniz</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }?>
                	<tr><th>ÖNCELİK</th><td><?Php foreach($_Oncelik as $fei=>$fed){?><label><input type="radio" name="<?Php echo $tbl?>[oncelik]" value="<?Php echo $fei?>" <?Php echo (!empty($_X['oncelik'])&&$_X['oncelik']==$fei)||(!isset($_X['oncelik'])&&$fei==1)?'checked':''?> /><?Php echo $fed?></label><?Php }?></td></tr>
					<tr><th>KONU *</th><td><input type="text" class="required" style="width:500px;" required autofocus name="<?Php echo $tbl?>[baslik]" value="<?Php echo !empty($_X['baslik'])?$_X['baslik']:''?>" /></td></tr>
					<tr><th>MESAJ *</th><td><textarea name="<?Php echo $tbl?>[mesaj]" class="required" required style="width:500px;height:200px;"><?Php echo !empty($_X['mesaj'])?$_X['mesaj']:''?></textarea></td></tr>
                    <tr><th colspan="2"><input type="submit" value="Kaydet" /></th></tr>
                </tbody></table>
            </div>
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
<?Php /*if(!empty($_NSN)){?>
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
<?Php }?>*/?>