<?Php
unset($_NSN);
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
?>
<div class="sayfa">
    <div class="icerik">
   <?Php switch(z(33,'sil')){
		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'sil2')){
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'ekle')){
		case 1:_uyr(1,'Yeni sipariş formu oluşturuldu ve otomatik onaylandı.');break;
		case 2:_uyr(2,'Yeni sipariş formu oluşturuldu fakat bazı ürün girdileri kaydolamadı. Lütfen kontrol ediniz.');break;
		case 3:_uyr(4,'Yeni sipariş formu oluşturuldu fakat limit yetersizliği sebebiyle yetkililerin onayını bekliyor.');break;
	}switch(z(33,'arsivle')){
		case 1:_uyr(1,'Seçili siparişler başarıyla arşive taşındı.');break;
	}switch(z(33,'arsivac')){
		case 1:_uyr(1,'Seçili siparişler başarıyla arşivden çıkartıldı ve ana listeye taşındı.');break;
	}?>
	<form action="" method="post" id="topluIslemForm">
    <table cellpadding="0" cellspacing="0" border="0">
        <colgroup>
            <col width="28" /><col width="28" /><col width="44" /><col width="100" /><col width="160" />
            <col width="160" /><col width="100" /><col /><col /><col /><col width="80" />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
            <?Php if($admn||ytk($syf,'arsiv')){?><col width="46" class="printx" /><?Php }?>
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
			?>
            <th colspan="2"><select name="la[adet]" class="ara" id="laAdet" style="width:90%"><option value="5">5 Satır</option><option value="10">10 Satır</option><option value="20">20 Satır</option><option value="30" selected="selected">30 Satır</option><option value="50">50 Satır</option><option value="100">100 Satır</option><option value="0">Tümü</option></th>
            <th><select id="araDurum" class="ara"><option value="">&nbsp;</option><option value="0">YENİ</option><option value="1" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']==1?'selected':''?>>ONAYLI</option><option value="2" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']==2?'selected':''?>>İPTAL</option></select></th>
            <th><?Php echo select(Array('name'=>$syf.'[personel_ID]','t'=>'personel','sd'=>' ','detay'=>'class="ara" id="araPersonel_ID"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['personel_ID'])?$_Ara['personel_ID']:0))?></th>
            <?Php foreach(array('tarih','tarihSiparis')as $trhad){?>
            <th class="araGrup"><?Php if(!empty($_Ara[$trhad])&&is_array($_Ara[$trhad])){foreach($_Ara[$trhad] as $aratrh){
				?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo $aratrh?>" /><?Php
            }}else{?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo !empty($_Ara[$trhad])?$_Ara[$trhad]:''?>" /><?Php }?></th><?Php }?>
                    
            <th><input type="text" name="ara[ID]" class="ara ufakTxt" id="araID" value="<?Php echo !empty($_Ara['ID'])?$_Ara['ID']:''?>"></th>
            <?Php /*<th><?Php echo select(Array('name'=>$syf.'[firma_IDalici]','t'=>'firma','sd'=>' ','detay'=>'class="ara" id="araFirma_IDalici"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['firma_IDalici'])?$_Ara['firma_IDalici']:0))?></th>
            <th><?Php echo select(Array('name'=>$syf.'[firma_IDsatici]','t'=>'firma','sd'=>' ','detay'=>'class="ara" id="araFirma_IDsatici"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['firma_IDsatici'])?$_Ara['firma_IDsatici']:0))?></th>
            <th><input type="text" name="ara[AfirmaAd]" class="ara ufakTxt" id="araAfirmaAd" value="<?Php echo !empty($_Ara['AfirmaAd'])?$_Ara['AfirmaAd']:''?>"></th>
            <th><input type="text" name="ara[Vunvani]" class="ara ufakTxt" id="araVunvani" value="<?Php echo !empty($_Ara['Vunvani'])?$_Ara['Vunvani']:''?>"></th>*/?>
            <th colspan="3" id="toplamTutarYTd" style="font-size:14px">&nbsp;</th>
            <?Php /*<th><select id="araOdemeTip" class="ara"><option value="">&nbsp;</option><?Php foreach($_OdemeTip as $fei=>$fed){?><option value="<?Php echo $fei?>" <?Php if(!empty($_Ara['odemeTip']))echo $_Ara['odemeTip']==$fei?'selected':''?>><?Php echo $fed;?></option><?Php }?></select></th>*/?>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDodemeTip]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='odemeTip'",'detay'=>'class="ara" id="araNesne_IDodemeTip"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDodemeTip'])?$_Ara['nesne_IDodemeTip']:0))?></th>
            
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'detay'=>'class="ara" id="araNesne_IDodemeTip"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_ID'.$ad])?$_Ara['nesne_ID'.$ad]:0))?></th>
            <?Php }?>
            
            <?Php if($admn||ytk($syf,'arsiv')){?><th class="printx">&nbsp;</th><?Php }?>
            <?Php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?Php }?>
            </tr>
            <tr>
            	<th class="printx"><input class="tumunuSec" type="checkbox"></th><th>NO</th>
            	<th>DURUM</th><th>DÜZENLEYEN</th><th>DÜZENLEME TARİHİ</th><th>SİPARİŞ TARİHİ</th><th>SİPARİŞ NO</th><th>DEPARTMAN</th><th>ÜRÜN ADET</th><th>TUTAR</th><th>ÖDEME TİPİ</th>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                <?Php if($admn||ytk($syf,'arsiv')){?><th class="printx">ARŞİVLE</th><?Php }?>
                <?Php if($admn||ytk($syf,'sil')){?><th class="printx">SİL</th><?Php }?>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$syf.'/listele_prc.php')?>
        </tbody>
        <tfoot class="printx">
            <tr><th><script type="text/javascript">$(document).ready(function(e) {
                $('form').submit(function(e) {
                    return confirm('Seçili girdilere seçili işlemi uyarlamak istediğinizden emin misiniz?');
                });
            });</script><input class="tumunuSec" type="checkbox"></th><th colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+10?>"><select name="islemTip" id="islemSlct"><option value="">&nbsp;&nbsp;&nbsp;</option><option value="sil2">Seçilileri Sil</option><?Php
            if(strpos(z(8,'a'),'_arsv'))echo '<option value="arsivac">Seçilileri Arşivden Geri Al</option>';
			else echo '<option value="arsivle">Seçilileri Arşive Taşı</option>';
			?></select><input type="submit" name="silsub" id="silSub" value="Uygula" /></th>
            <?Php if($admn||ytk($syf,'arsiv')){?><th class="printx">&nbsp;</th><?Php }?>
            <?Php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?Php }?></tr>
        </tfoot>
    </table>
    </form>
    </div>
</div>
<script type="text/javascript">
function ajaxAra(){
	$('.secilebilir').attr('checked',false);
    $('.tumunuSec').attr('checked',false);
	$.post('sayfa/<?Php echo $syf?>/listele_ajx.php?a=<?Php _z(8,'a')?>',{
	'ara<?Php echo $syf?>':araGrupla({durum:$('#araDurum').val(),
		personel_ID:$('#araPersonel_ID').val(),
		nesne_IDodemeTip:$('#araNesne_IDodemeTip').val(),
		tarih:$('#araTarih').val(),
		tarihSiparis:$('#araTarihSiparis').val(),
		ID:$('#araID').val(),
		firma_IDalici:$('#araFirma_IDalici').val(),
		firma_IDsatici:$('#araFirma_IDsatici').val(),
		odemeTip:$('#araOdemeTip').val()
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo ",'nesne_ID".$ad."':$('#araNesne_ID".$ad."').val()";}?>
	}),'la':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);
	genelBilgiYansit();});
}
function genelBilgiYansit(){
	$('thead #toplamTutarYTd').html($('#toplamTutarTd').html()).show();
}
$(document).ready(function(e) {
	$('.ara').change(ajaxAra).keyup(ajaxAra);
	genelBilgiYansit()
});
</script>