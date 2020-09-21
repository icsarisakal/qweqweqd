<?Php
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
?>
<div class="content pt-0">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive">

    <?Php switch(z(33,'sil')){
		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}?>
	<?Php switch(z(33,'ekle')){
		case 1:_uyr(1,'Firma ekleme işlemi başarıyla gerçekleştirildi.');break;
	}?>
	<form action="" method="post" id="topluIslemForm">
    <table cellpadding="0" cellspacing="0" border="0" class="table text-nowrap">
        <colgroup>
            <col width="32" /><col width="150" /><col /><col /><col /><col /><col />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
            <?Php /*if($admn||ytk($tbl,'sil')){?><col width="32" /><?Php }*/?>
        </colgroup>
        <thead>
        	<tr class="printx">
            <?Php
            	$_Ara=z(7,'ara'.$tbl);
				if(empty($_Ara)){
					if($araHA&&z(11,'ara'.$tbl)){
						$_Ara=z(11,'ara'.$tbl);
					}
				}
			?>
            <th><select name="la[adet]" class="ara" id="laAdet" style="width:90%"><option value="5">5 Satır</option><option value="10">10 Satır</option><option value="20">20 Satır</option><option value="30" selected="selected">30 Satır</option><option value="50">50 Satır</option><option value="100">100 Satır</option><option value="0">Tümü</option></th>
            <?Php foreach(array('tarih')as $trhad){?>
            <th class="araGrup"><?Php if(!empty($_Ara[$trhad])&&is_array($_Ara[$trhad])){foreach($_Ara[$trhad] as $aratrh){
				?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo $aratrh?>" /><?Php
            }}else{?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo !empty($_Ara[$trhad])?$_Ara[$trhad]:''?>" /><?Php }?></th><?Php }?>
            <th><input type="text" name="ara[mesaj]" class="ara ufakTxt" id="araMesaj" value="<?Php echo !empty($_Ara['mesaj'])?$_Ara['mesaj']:''?>"></th>
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'detay'=>'class="ara" id="araNesne_ID'.$ad.'"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_ID'.$ad])?$_Ara['nesne_ID'.$ad]:substr(z('date'),0,7)))?></th>
            <?Php }?>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th><select id="araSonuc" class="ara"><option value="">&nbsp;</option><option value="1" <?Php if(!empty($_Ara['sonuc']))echo $_Ara['sonuc']==1?'selected':''?>>Başarılı</option><option value="0">Başarısız</option><option value="2">Uyarı</option><option value="3">Özel Uyarı</option></select></th>
            <th><?Php echo select(Array('name'=>$tbl.'[personel_ID]','t'=>'personel','sd'=>' ','detay'=>'class="ara" id="araPersonel_ID"','icerik'=>'<option value="">&nbsp;</option><option value="0">SİSTEM</option>','sec'=>!empty($_Ara['personel_ID'])?$_Ara['personel_ID']:0))?></th>
            <th><input type="text" name="ara[ip]" class="ara ufakTxt" id="araIp" value="<?Php echo !empty($_Ara['ip'])?$_Ara['ip']:''?>"></th>
            </tr>
            <tr>
            	<th>ID</th>
            	<th>TARİH</th><th>MESAJ</th><th>TİP</th><th>İŞLEM</th><th>SONUÇ</th><th>PERSONEL</th><th>IP</th>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$tbl.'/listele_prc.php')?>
        </tbody>
        <tfoot class="printx">
            <tr><th colspan="8">&nbsp;</th></tr>
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
	$.post('sayfa/<?Php echo $tbl?>/listele_ajx.php',{
	'ara<?Php echo $tbl?>':araGrupla({
		'tarih':$('#araTarih').val(),
		'mesaj':$('#araMesaj').val(),
		'personel_ID':$('#araPersonel_ID').val(),
		'ip':$('#araIp').val()
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo ",'nesne_ID".$ad."':$('#araNesne_ID".$ad."').val()";}?>
	}),'la':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);});
}
var secA=false;
$(document).ready(function(e) {
	$('.ara').change(ajaxAra).keyup(ajaxAra);
});
</script>