<?Php
unset($_NSN);

$tbl.='urun';
$syf2=$syf.'urun';
?>
<div class="sayfa">
    <div class="icerik">
   <?Php switch(z(33,'sil')){
		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'sil2')){
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}?>
	<?Php switch(z(33,'ekle')){
		case 1:_uyr(1,'Yeni sipariş formu oluşturuldu ve otomatik onaylandı.');break;
		case 2:_uyr(2,'Yeni sipariş formu oluşturuldu fakat bazı ürün girdileri kaydolamadı. Lütfen kontrol ediniz.');break;
		case 3:_uyr(4,'Yeni sipariş formu oluşturuldu fakat limit yetersizliği sebebiyle yetkililerin onayını bekliyor.');break;
	}?>
    <table cellpadding="0" cellspacing="0" border="0">
        <colgroup>
            <col width="28" /><col width="44" /><col /><col width="140" /><col width="160" /><col /><col /><col /><col width="70" /><col /><col /><col width="60" /><col />
        </colgroup>
        <thead>
        	<tr class="printx">
				<?Php
                    $_Ara=z(9,'ara'.$syf2);
                    if(empty($_Ara)){
                        if($araHA&&z(11,'ara'.$syf2)){
                            $_Ara=z(11,'ara'.$syf2);
                        }
                    }
                ?>
                <th colspan="2"><select name="la[adet]" class="ara" id="laAdet" style="width:90%"><option value="5">5 Satır</option><option value="10">10 Satır</option><option value="20">20 Satır</option><option value="30" selected="selected">30 Satır</option><option value="50">50 Satır</option><option value="100">100 Satır</option><option value="0" <?Php echo isset($_GET['la']['adet'])&&$_GET['la']['adet']=='0'?'selected="selected"':''?>>Tümü</option></select></th>
                <?Php /*<th><select id="araDurum" class="ara"><option value="">&nbsp;</option><option value="0">YENİ</option><option value="1" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']==1?'selected':''?>>ONAYLI</option><option value="2" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']==2?'selected':''?>>İPTAL</option></select></th>*/?>
                <th><?Php echo select(Array('name'=>$syf.'[personel_ID]','t'=>'personel','sd'=>' ','detay'=>'class="ara" id="araPersonel_ID"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['personel_ID'])?$_Ara['personel_ID']:0))?></th>
                <th class="araGrup"><input type="text" class="ara ufakTxt jstarih" name="tarih" value="<?Php echo !empty($_Ara['tarih'])?$_Ara['tarih']:''?>" /></th>
                <th><input type="text" name="ara[ad]" class="ara ufakTxt" id="araAd" value="<?Php echo !empty($_Ara['ad'])?$_Ara['ad']:''?>"></th>
                <th><input type="text" name="ara[aciklama]" class="ara ufakTxt" id="araAciklama" value="<?Php echo !empty($_Ara['aciklama'])?$_Ara['aciklama']:''?>"></th>
                <th><?Php echo select(Array('name'=>$syf.'[firma_IDteklif]','t'=>'firma','sd'=>' ','detay'=>'class="ara" id="araFirma_IDteklif"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['firma_IDteklif'])?$_Ara['firma_IDteklif']:0))?></th>
                <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDddepartman]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='departman'",'detay'=>'class="ara" id="aranesne_IDddepartman"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDddepartman'])?$_Ara['nesne_IDddepartman']:0))?></th>
                <th><input type="text" name="ara[miktar]" class="ara ufakTxt" id="araMiktar" value="<?Php echo !empty($_Ara['miktar'])?$_Ara['miktar']:''?>"></th>
                <th><input type="text" name="ara[fiyat]" class="ara ufakTxt" id="araFiyat" value="<?Php echo !empty($_Ara['fiyat'])?$_Ara['fiyat']:''?>"></th>
                <th><input type="text" name="ara[tutar]" class="ara ufakTxt" id="araTutar" value="<?Php echo !empty($_Ara['tutar'])?$_Ara['tutar']:''?>"></th>
                <th><input type="text" name="ara[kdv]" class="ara ufakTxt" id="araKdv" value="<?Php echo !empty($_Ara['kdv'])?$_Ara['kdv']:''?>"></th>
                <th>&nbsp;</th>
            </tr>
            <tr id="genelBilgilerYTr" style="display:none;"><td>&nbsp;</td></tr>
            <tr>
            	<th>NO</th>
            	<th>DURUM</th><th>DÜZENLEYEN</th><th>DÜZENLEME TARİHİ</th><th>MALZEME CİNSİ</th><th>TEKNİK ŞARTNAME</th><th>TEDARİKÇİ FİRMA</th><th>DEPARTMAN</th><th>MİKTAR</th><th>FİYAT</th><th>TUTAR</th><th>KDV ORAN</th><th>KDV DAHİL TUTAR</th>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$syf.'/listeleUrun_prc.php')?>
        </tbody>
    </table>
    <div>&nbsp;</div>
    </div>
</div>
<script type="text/javascript">
function ajaxAra(){
	$('.secilebilir').attr('checked',false);
    $('.tumunuSec').attr('checked',false);	
	$.post('sayfa/<?Php echo $syf?>/listeleUrun_ajx.php',{
	'ara<?Php echo $syf2?>':araGrupla({
		'personel_ID':$('#araPersonel_ID').val(),
		'tarih':$('#araTarih').val(),
		'ad':$('#araAd').val(),
		'aciklama':$('#araAciklama').val(),
		'firma_IDteklif':$('#araFirma_IDteklif').val(),
		'nesne_IDddepartman':$('#aranesne_IDddepartman').val(),
		'miktar':$('#araMiktar').val(),
		'fiyat':$('#araFiyat').val(),
		'tutar':$('#araTutar').val(),
		'kdv':$('#araKdv').val()
	}),'la':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);
	genelBilgiYansit();});
}
function genelBilgiYansit(){
	$('thead #genelBilgilerYTr').html($('#genelBilgilerTr').html()).show();
	$('#genelBilgilerTr').remove();
}
$(document).ready(function(e) {
	uyr('NOT: Arşivdeki siparişlerde listeye dahildir.');
	$('.ara').change(ajaxAra).keyup(ajaxAra);
	genelBilgiYansit();
});
</script>