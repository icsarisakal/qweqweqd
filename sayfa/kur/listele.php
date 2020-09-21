<?Php
unset($_NSN);
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'idxsil'))require(__DIR__.'/../../parca/sil.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
kurGuncelle(z('date'));
?>

<div class="content pt-0">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive">
   <?Php switch(z(33,'sil')){
		case 1:_uyr(1,$bsl[0].' başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'sil2')){
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'ekle')){
		case 1:_uyr(1,$bsl[0].' ekleme işlemi başarıyla gerçekleştirildi.');break;
	}switch(z(33,'arsivle')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşive taşındı.');break;
		case 101:_uyr(2,'Arşive gönderme işlemi için yeterli yetkiniz yok.');break;
	}switch(z(33,'arsivac')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşivden çıkartıldı ve ana listeye taşındı.');break;
	}?>
	<form action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0" class="table text-nowrap">
        <colgroup>
            <col width="28" /><col width="28" /><col /><col /><col /><col /><col /><col width="110" />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
            <?Php if($admn||ytk($syf,'sil')){?><col width="32" class="printx" /><?Php }?>
        </colgroup>
        <thead>
        	<tr class="printx">
            <?Php
            	$_Ara=z(7,'ara'.$syf);
				if(empty($_Ara)){
					if($araHA&&z(11,'ara'.$syf)){
						$_Ara=z(11,'ara'.$syf);
					}
				}
            	$_LA=z(7,'la'.$syf);
				if(empty($_LA)){
					if($araHA&&z(11,'la'.$syf)){
						$_LA=z(11,'la'.$syf);
					}
				}
			?>
            <th colspan="2"><select name="la[adet]" class="ara" id="laAdet"><?Php if(!empty($ayr['genelListeSatirC']))foreach($ayr['genelListeSatirC'] as $fe){?><option value="<?Php echo $fe?>" <?Php echo (isset($_LA['adet'])&&$fe==$_LA['adet'])||(empty($_LA['adet'])&&$fe==$ayr['genelListeSatirA'])?'selected':''?>><?Php echo !empty($fe)?$fe.' Satır':'Tümü'?></option><?Php }?></select></th>
            <?Php foreach(array('tarih')as $trhad){?>
            <th class="araGrup"><?Php if(!empty($_Ara[$trhad])&&is_array($_Ara[$trhad])){foreach($_Ara[$trhad] as $aratrh){
				?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo $aratrh?>" /><?Php
            }}else{?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo !empty($_Ara[$trhad])?$_Ara[$trhad]:''?>" /><?Php }?></th><?Php }?>
            <th><input type="text" name="ara[usd]" class="ara ufakTxt" id="araUsd" value="<?Php echo !empty($_Ara['usd'])?$_Ara['usd']:''?>"></th>
            <th><input type="text" name="ara[eur]" class="ara ufakTxt" id="araEur" value="<?Php echo !empty($_Ara['eur'])?$_Ara['eur']:''?>"></th>
            <th><input type="text" name="ara[gbp]" class="ara ufakTxt" id="araGbp" value="<?Php echo !empty($_Ara['gbp'])?$_Ara['gbp']:''?>"></th>
            
            
            <?Php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?Php }?>
            </tr>
            <tr>
            	<th class="printx"><input class="tumunuSec" type="checkbox"></th><th>NO</th>
            	<th>KUR TARİHİ</th><th>USD</th><th>EUR</th><th>GBP</th>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                <?Php if($admn||ytk($syf,'sil')){?><th class="printx">SİL</th><?Php }?>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$syf.'/listele_prc.php')?>
        </tbody>
        <tfoot class="printx">
        <?Php /*
            <tr><th><script type="text/javascript">$(document).ready(function(e) {
                $('form').submit(function(e) {
                    return confirm('Seçili girdilere seçili işlemi uyarlamak istediğinizden emin misiniz?');
                });
            });</script><input class="tumunuSec" type="checkbox"></th><th colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+4?>"><select name="islemTip" id="islemSlct"><option value="">&nbsp;&nbsp;&nbsp;</option><option value="sil">Seçilileri Sil</option><?Php
            //if(strpos(z(8,'a'),'_arsv'))echo '<option value="arsivac">Seçilileri Arşivden Geri Al</option>';
			//else echo '<option value="arsivle">Seçilileri Arşive Taşı</option>';
			?></select><input type="submit" name="silsub" id="silSub" value="Uygula" /></th>
            <?Php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?Php }?></tr>
         */?><th colspan="7">&nbsp;</th>
         </tfoot>
    </table>
    </form>     
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>

<script type="text/javascript">
function ajaxAra(){
	$('.secilebilir').attr('checked',false);
    $('.tumunuSec').attr('checked',false);
	$.post('sayfa/<?Php echo $syf?>/listele_ajx.php?a=<?Php _z(8,'a')?>',{
	'ara<?Php echo $syf?>':araGrupla({durum:$('#araDurum').val(),
		'tarih':$('#araTarih').val(),
		'usd':$('#araUsd').val(),
		'eur':$('#araEur').val(),
		'gbp':$('#araGbp').val()
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo ",'nesne_ID".$ad."':$('#araNesne_ID".$ad."').val()";}?>
	}),'la<?Php echo $syf?>':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);
	genelBilgiYansit();});
}
function genelBilgiYansit(){
	//$('thead #toplamTutarYTd').html($('#toplamTutarTd').html()).show();
	$('#tbody tr:first-child').before('<tr class="toptr">'+$('#toplamTutarTr').html()+'</tr>');
}
$(document).ready(function(e) {
	$('.ara').change(ajaxAra).keyup(ajaxAra);
	genelBilgiYansit()
});
</script>