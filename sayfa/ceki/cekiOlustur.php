<?Php
if(z(7)){
	$_X=z(7);
	
	//KUMAŞ CİNSİ
	if(!empty($_X['detay']['kumasCins'])){
		z(6,'nesne');
		$nesneID=z(1,"WHERE ".$ysd." AND metin1='".$_X['detay']['kumasCins']."' LIMIT 1",'ID');
		if(empty($nesneID[0])){
			z(2,Array('yonetici_ID'=>$yonetici_ID,'ad'=>'kumasCins','metin1'=>$_X['detay']['kumasCins']));
			$_X['detay']['nesneKumasCins_ID']=z(1,'son','ID');
		}
		else{
			$_X['detay']['nesneKumasCins_ID']=$kumasID[0];
		}
	}
	unset($_X['detay']['kumasCins']);
	
	//MÜŞTERİ
	if(!empty($_X['detay']['musteri']['ad'])){
		if(empty($_X['detay']['musteri']['soyad'])){
			$_X['detay']['musteri']['soyad']='';
		}
		z(6,'musteri');
		$musteriID=z(1,"WHERE ".$ysd." AND ad='".$_X['detay']['musteri']['ad']."' AND soyad='".$_X['detay']['musteri']['soyad']."' LIMIT 1",'ID');
		if(empty($musteriID[0])){
			$_X['detay']['musteri']=array_merge($_X['detay']['musteri'],Array('yonetici_ID'=>$yonetici_ID,'durum'=>'1','amblem'=>upload('musteriAmblem')));
			if(z(2,$_X['detay']['musteri'])){
				$_X['detay']['musteri_ID']=z(1,'son','ID');
			}
		}
		else{
			$_X['detay']['musteri_ID']=$musteriID[0];
		}
		unset($_X['detay']['musteri']);
	}
	else{
		unset($_X['detay']['musteri']);
	}
	
	
	z(6,'ceki');
	$_X['detay']['tarih']=z('datetime');
	z(2,$_X['detay']);
	$ceki_ID=z(1,'son','ID','ceki');
	if(!empty($ceki_ID)){
		z(6,'local');
		$bsr=0;
		foreach($_X['local_ID'] as $ID){
			if(z(3,$ID,Array('ceki_ID'=>$ceki_ID,'durum'=>9,'lot'=>$_X['lot'][$ID],'cekiAciklama'=>$_X['cekiAciklama'][$ID]))){
				$bsr++;
			}
		}
		if($bsr==count($_X['local_ID'])){
			z(3,"WHERE durum='1'",'durum',0);
			header('Location: ?s=ceki&id='.$ceki_ID);die;
		}
	}
	echo '<div class="hata">Liste oluşturulamadı! Lütfen tekrar deneyiniz...</div>';
}
?>
<style type="text/css">
body{ background-color:#eef;}
.onay,.uyari,.hata,.bilgi{ border:1px solid #090; color:#000; margin-bottom:6px; padding:3px; border-radius:3px; font-size:16px;}
.onay{ background-color:#0F6; border:1px solid #090;}
.uyari{ background-color:#fc6; border:1px solid #f90;}
.hata{ background-color:#f66; border:1px solid #f00;}
.bilgi{ background-color:#0aF; border:1px solid #00f;}
input,select{ height:20px; display:inline-block; margin:0px; padding:0px;}
select{ height:22px;}
.blok{ margin-bottom:8px;}
.eklepnl{ padding:3px; margin-bottom:0px;}
.txt{ border:#000 solid 1px; padding:3px; height:18px; margin-right:3px;}
.btn{ border:#000 solid 1px; padding:3px; background-color:midnightblue; background-image:url(img/h30bg3.png); height:26px; color:#fff;}
.btn:hover{ background-image:url(img/h30bg.png)}
#dtyTbl{}
</style>
<div class="baslik">
	<div class="eklepnl"><?Php //<select id="iptal"><option value="0">GÖNDER</option><option value="1">İPTAL ET</option></select>?>
		<input class="txt" id="txt" placeholder="Top NO" ><input type="button" id="gndrBtn" class="btn" value="EKLE">
        <button type="button" style="margin:0px; padding:4px;" id="detayGirBtn" class="btn">DETAYLARI GİR</button>
	</div>
</div>
<div class="bilgi"></div>
<div class="siyah">
    <form action="" method="post" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="0" border="0" id="dtyTbl">
            <col width="100">
            <col width="200">
            <col width="100">
            <col width="200">
            <tbody>
                <tr><th>Müşteri</th><td><div id="musteriSec"><?Php echo select(Array('name'=>'detay[musteri_ID]','detay'=>'tabindex="1"','t'=>'musteri','sd'=>"WHERE ".$ysd,'sec'=>z(7,'musteri_ID'))); ?><button type="button" onClick="yeni('musteri')">+</button></div>
            <div id="musteriYaz"><input type="text" name="detay[musteri][ad]" tabindex="1" placeholder="Yeni Müşterinin Adı" class="dtyTxt"><br><input type="text" name="detay[musteri][soyad]" tabindex="1" placeholder="Yeni Müşterinin Soydı" class="dtyTxt"><br><input type="file" name="musteriAmblem" class="dtyTxt" tabindex="1" title="Yeni Müşterinin Amblemi"><br><button onClick="yeni('musteri')" type="button">x</button></div></td>
            <th>Kumaş Cinsi</th><td>
            <div id="kumasCinsSec"><?Php echo select(Array('name'=>'detay[nesneKumasCins_ID]','detay'=>'tabindex="1"','t'=>'nesne','sd'=>"WHERE ad='kumasCins'",'alan'=>'ID,metin1','sec'=>z(7,'nesneKumasCins_ID'))); ?><button onClick="yeni('kumasCins')" type="button">+</button></div>
            <div id="kumasCinsYaz"><input type="text" name="detay[kumasCins]" tabindex="1" placeholder="Yeni Kumaş Cinsi" class="dtyTxt" value="<?Php _z(7,'kumas')?>"><br><button onClick="yeni('kumasCins')" type="button">x</button></div></td>
            	<th>&nbsp;</th></tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0" border="0">
            <col width="10">
            <thead><tr><th>Sıra</th><th>Top NO</th><th>Parti NO</th><th>Metre</th><th>Kalite</th><th>Kumaş</th><th>LOT</th><th>Açıklama</th><th>Sil</th></tr></thead>
            <tbody class="cekibody"><?Php $geriYukle=1;require(__DIR__.'/cekitr_prc.php')?></tbody>
            <tfoot>
                <tr><th colspan="3">Toplam Metre</th><th><span class="topMetre">0</span></th><th colspan="5">&nbsp;</th></tr>
                <tr>
                    <th colspan="9">
                    
                    <input type="submit" value="KAYDET" id="subBtn" class="bykBtn" style="margin:0px;padding:0px;" <?Php if(empty($cekiAdet))echo 'disabled'?>>
                    </th>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<p>&nbsp;</p>
<script type="text/javascript" language="javascript">
var detayGirA=false;
$(document).ready(function(e) {
    $('#musteriYaz').hide();
    $('#kumasCinsYaz').hide();
	$('.bilgi').hide();
    $('.dtyTxt').attr('disabled',true);
	
    $('#txt').focus().change(function(){kodGonder(0)}).keypress(function(e) {
		if(e.which==13)kodGonder(0);
    });
	$('#detayGirBtn').click(detayGir);
	$(document).keydown(function(e) {
        if(!detayGirA){
			$('#txt').focus();
		}
    });
	$('form').submit(function(e) {
        $('.dtyTxt').attr('disabled',false);
    });
	$('.topMetre').html(topMetre);
});
function yeni(a){
	$('#'+a+'Yaz').toggle();
	$('#'+a+'Sec').toggle();
	$('#'+a+'Yaz input').val('');
	detayGirA=0;
	$('#detayGirBtn').trigger('click');
}


var kod='';
function kodGonder(tasi){
	kod=$('#txt').val();
	$.get('ajax/cekitr.php',{'etiketNO':kod,'tasi':tasi},function(a){
		if(a=='0'){
			$('.bilgi').show().html('Top bulunamadı!');
			setTimeout(function(){$('.bilgi').hide()},2000);
			$('#txt').val('');
		}
		else if(a=='2'){
			if(confirm('Uyari! Bu top başka bir çeki listesinde zaten bulunuyor. O listeden kaldırılıp buraya taşınsın mı?')){
				kodGonder(1);
			}
			else{
				$('#txt').val('');
			}
		}
		else{
			$('.cekibody').append(a);
			sirala();
			metreTopla();
			$('#subBtn').attr('disabled',false);
			$('.dtyTxt').attr('disabled',true);
			$('#txt').val('');
		}
	});
	$('#txt').focus();
}
var sira=<?Php echo !empty($cekiAdet)?$cekiAdet:0?>;
function sirala(){
	sira++;
	$('.sira_'+kod).html(sira);
}
var topMetre=<?Php echo !empty($cekiTopMetre)?$cekiTopMetre:0?>;
function metreTopla(){
	var mtr=parseInt($('.metre_'+kod).val());
	if(mtr){
		topMetre+=mtr;
		$('.topMetre').html(topMetre);
	}
}
function metreCikart(etiketNO){
	var mtr=parseInt($('.metre_'+etiketNO).val());
	if(mtr){
		topMetre-=mtr;
		$('.topMetre').html(topMetre);
	}
}
function trSil(id,etiketNO){
	$.get('ajax/cekitr.php',{'cekitrx':id},function(a){
		if(a==1){
			metreCikart(etiketNO);
			$('#tr_'+id).remove();
			sirala();
		}
		else{
			alert('Bir hata oluştu ve girdi kaldırılamadı! Tekrar deneyiniz.');
		}
	});
}
function detayGir() {
	if(detayGirA){
		detayGirA=false;
		$(this).css('background-color','midnightblue');
		$('#txt').attr('disabled',false).focus();
		$('.dtyTxt').attr('disabled',true);
	}
	else{
		detayGirA=true;
		$(this).css('background-color','#3C3');
		$('#txt').attr('disabled',true);
		$('.dtyTxt').attr('disabled',false);
	}
}
</script>