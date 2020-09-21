<?Php
unset($_NSN);
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');

$ozelSd=" AND (durum='2')";
?>
<div class="sayfa">
    <div class="icerik">
   <?Php switch(z(33,'sil')){
		case 1:_uyr(1,'Seçili girdiler başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'sil2')){
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}switch(z(33,'ekle')){
		case 1:_uyr(1,'Yeni stok girişi başarıyla gerçekleştirildi.');break;
	}switch(z(33,'arsivle')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşive taşındı.');break;
		case 101:_uyr(2,'Arşive gönderme işlemi için yeterli yetkiniz yok.');break;
	}switch(z(33,'arsivac')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşivden çıkartıldı ve ana listeye taşındı.');break;
	}?>
	<form action="" method="post" id="topluIslemForm">
    <table cellpadding="0" cellspacing="0" border="0">
        <colgroup>
            <col width="28" /><col width="28" /><col /><col />
            <col /><col /><col /><col /><col /><col /><col /><col /><col /><col width="130" /><col />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
            <?Php if($admn||ytk($syf,'arsiv')){?><col width="46" class="printx" /><?Php }?>
            <?Php if($admn||ytk($tbl,'sil')){?><col width="32" /><?Php }?>
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
            	$_LA=z(7,'la'.$syf);
				if(empty($_LA)){
					if($araHA&&z(11,'la'.$syf)){
						$_LA=z(11,'la'.$syf);
					}
				}
            
			?>
            <th colspan="2"><select name="la[adet]" class="ara" id="laAdet"><?Php if(!empty($ayr['genelListeSatirC']))foreach($ayr['genelListeSatirC'] as $fe){?><option value="<?Php echo $fe?>" <?Php echo (isset($_LA['adet'])&&$fe==$_LA['adet'])||(empty($_LA['adet'])&&$fe==$ayr['genelListeSatirA'])?'selected':''?>><?Php echo !empty($fe)?$fe.' Satır':'Tümü'?></option><?Php }?></select></th>
			<th><input type="text" name="ara[ID]" class="ara ufakTxt" id="araID" value="<?Php echo !empty($_Ara['ID'])?$_Ara['ID']:''?>"></th>
			<?php /*?><th><select id="araDurum" class="ara"><option value="">&nbsp;</option><?Php if(!empty($_CkDrm))foreach($_CkDrm as $fei=>$fed){?><option value="<?Php echo $fei?>" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']===$fei?'selected':''?>><?Php echo $fed[1]?></option><?Php }?></select></th><?php */?>
            <th><input type="text" name="ara[partiNo]" class="ara ufakTxt" id="araPartiNo" value="<?Php echo !empty($_Ara['partiNo'])?$_Ara['partiNo']:''?>"></th>
            <?Php /*<th><input type="text" name="ara[tipNo]" class="ara ufakTxt" id="araTipNo" value="<?Php echo !empty($_Ara['tipNo'])?$_Ara['tipNo']:''?>"></th>*/?>
			
            <th><?Php echo select(Array('name'=>$tbl.'[kalite_ID]','t'=>'kalite','alan'=>'ID,ad','sd'=>"WHERE id<>'0'",'detay'=>'class="ara" id="araKalite_ID"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['kalite_ID'])?$_Ara['kalite_ID']:0))?></th>
            
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDrenkNo]','t'=>'nesne','alan'=>'ID,metin2,metin1','ayrac'=>' | ','sd'=>"WHERE ad='renkNo'",'detay'=>'class="ara" id="araNesne_IDrenkNo"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDrenkNo'])?$_Ara['nesne_IDrenkNo']:0))?></th>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDdesenNo]','t'=>'nesne','alan'=>'ID,metin2,metin1','ayrac'=>' | ','sd'=>"WHERE ad='desenNo'",'detay'=>'class="ara" id="araNesne_IDdesenNo"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDdesenNo'])?$_Ara['nesne_IDdesenNo']:0))?></th>
			
            <th><input type="text" name="ara[mamulEn]" class="ara ufakTxt" id="araMamulEn" value="<?Php echo !empty($_Ara['mamulEn'])?$_Ara['mamulEn']:''?>"></th>
            <?php /*?><th><input type="text" name="ara[mamulGr]" class="ara ufakTxt" id="araMamulGr" value="<?Php echo !empty($_Ara['mamulGr'])?$_Ara['mamulGr']:''?>"></th><?php */?>
            
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDkompozisyon]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kompozisyon'",'detay'=>'class="ara" id="araNesne_IDkompozisyon"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDkompozisyon'])?$_Ara['nesne_IDkompozisyon']:0))?></th>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDkalite]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kalite'",'detay'=>'class="ara" id="araNesne_IDkalite"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDkalite'])?$_Ara['nesne_IDkalite']:0))?></th>
            <?php /*?><th><?Php echo select(Array('name'=>$tbl.'[nesne_IDpuan]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='puan'",'detay'=>'class="ara" id="araNesne_IDpuan"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDpuan'])?$_Ara['nesne_IDpuan']:0))?></th><?php */?>
            
            <th><input type="text" name="ara[topNo]" class="ara ufakTxt" id="araTopNo" value="<?Php echo !empty($_Ara['topNo'])?$_Ara['topNo']:''?>"></th>
            <th><input type="text" name="ara[lotNo]" class="ara ufakTxt" id="araLotNo" value="<?Php echo !empty($_Ara['lotNo'])?$_Ara['lotNo']:''?>"></th>
            <th><input type="text" name="ara[metraj]" class="ara ufakTxt" id="araMetraj" value="<?Php echo !empty($_Ara['metraj'])?$_Ara['metraj']:''?>"></th>
            
			<?Php foreach(array('tarih')as $trhad){?>
            <th class="araGrup"><?Php if(!empty($_Ara[$trhad])&&is_array($_Ara[$trhad])){foreach($_Ara[$trhad] as $aratrh){
				?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo $aratrh?>" /><?Php
            }}else{?><input type="text" class="ara ufakTxt jstarih" name="<?Php echo $trhad?>" value="<?Php echo !empty($_Ara[$trhad])?$_Ara[$trhad]:''?>" /><?Php }?></th><?Php }?>
            <?Php /*<th><input type="text" name="ara[aciklama]" class="ara ufakTxt" id="araAciklama" value="<?Php echo !empty($_Ara['aciklama'])?$_Ara['aciklama']:''?>"></th>*/?>
			
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'detay'=>'class="ara" id="araNesne_ID'.$ad.'"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_ID'.$ad])?$_Ara['nesne_ID'.$ad]:substr(z('date'),0,7)))?></th>
            <?Php }?>
            <?php /*?><?Php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?Php }?><?php */?>
            <?Php if($admn||ytk($tbl,'sil')){?><th>&nbsp;</th><?Php }?>
            </tr>
            <tr>
            	<th class="printx"><input class="tumunuSec" type="checkbox"></th><th>NO</th><th>STOK NO</th>
            	<?php /*?><th>DURUM</th><?php */?><th>PARTİ NO</th><?php /*<th>TİP NO</th>*/?><th>KUMAŞ CİNSİ</th><th>RENK NO</th><th>DESEN NO</th><th>MAMUL EN / GR</th><th>KOMPOZİSYON</th><th>KALİTE</th><?php /*<th>PUAN</th>*/?><th>TOP NO</th><th>LOT NO</th><th>METRAJ</th><th>TARİH</th><?php /*<th>AÇIKLAMA</th>*/?>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                <?php /*?><?Php if($admn||ytk($syf,'arsivle')){?><th class="printx">ARŞİVLE</th><?Php }?><?php */?>
                <?Php if($admn||ytk($tbl,'sil')){?><th class="printx">SİL</th><?Php }?>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$tbl.'/listele_prc.php'); ?>
        </tbody>
        <tfoot class="printx">
            <tr><th><script type="text/javascript">$(document).ready(function(e) {
                $('form').submit(function(e) {
                    return confirm('Seçili girdilere seçili işlemi uyarlamak istediğinizden emin misiniz?');
                });
            });</script><input class="tumunuSec" type="checkbox"></th><th colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+13?>"><select name="islemTip" id="islemSlct"><option value="">&nbsp;&nbsp;&nbsp;</option><option value="sil2">Seçilileri Sil</option><?Php
            if(strpos(z(8,'a'),'_arsv'))echo '<option value="arsivac">Seçilileri Arşivden Geri Al</option>';
			else echo '<option value="arsivle">Seçilileri Arşive Taşı</option>';
			?></select><input type="submit" name="silsub" id="silSub" value="Uygula" /></th>
           <?php /*?> <?Php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?Php }?><?php */?>
            <?Php if($admn||ytk($tbl,'sil')){?><th class="printx">&nbsp;</th><?Php }?></tr>
        </tfoot>
    </table>
    </form>
    </div>
</div>
<script type="text/javascript">
function ajaxAra(){
	$('.secilebilir').attr('checked',false);
    $('.tumunuSec').attr('checked',false);
	$.post('sayfa/<?Php echo $tbl?>/listele_ajx.php',{
	'ara<?Php echo $tbl?>':araGrupla({
		'ID':$('#araID').val(),
		'durum':$('#araDurum').val(),
		'partiNo':$('#araPartiNo').val(),
		'tipNo':$('#araTipNo').val(),
		'kalite_ID':$('#araKalite_ID').val(),
		'nesne_IDrenkNo':$('#araNesne_IDrenkNo').val(),
		'nesne_IDdesenNo':$('#araNesne_IDdesenNo').val(),
		'mamulEn':$('#araMamulEn').val(),
		<?php /*?>'mamulGr':$('#araMamulGr').val(),<?php */?>
		'nesne_IDkompozisyon':$('#araMesne_IDkompozisyon').val(),
		'nesne_IDkalite':$('#araNesne_IDkalite').val(),
		<?php /*?>'nesne_IDpuan':$('#araMesne_IDpuan').val(),<?php */?>
		'topNo':$('#araTopNo').val(),
		'lotNo':$('#araLotNo').val(),
		'metraj':$('#araMetraj').val(),
		'tarih':$('#araTarih').val()/*,
		'aciklama':$('#araAciklama').val()*/
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo ",'nesne_ID".$ad."':$('#araNesne_ID".$ad."').val()";}?>
	}),'la<?Php echo $syf?>':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);genelBilgiYansit();});
}
var secA=false;
function genelBilgiYansit(){
    //$('thead #toplamTutarYTd').html($('#toplamTutarTd').html()).show();
    $('#tbody tr:first-child').before('<tr class="toptr">'+$('#toplamTutarTr').html()+'</tr>');
}
$(document).ready(function(e) {
    $('.ara').change(ajaxAra).keyup(ajaxAra);
    genelBilgiYansit();
});
</script>