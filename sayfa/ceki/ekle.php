<?Php
if(z(7)){
	$_X=z(7);
	$ysd=1;
	
	z(6,'ceki');
	$_X['detay']['tarih']=z('datetime');
	$_X['detay']['durum']=$_VsDrm['ceki'];
	//echo '<pre>';print_r($_X);die;
	if(z(2,$_X['detay'])){
		$ceki_ID=z(1,'son','ID');
		if(!empty($ceki_ID)){
			z(6,'stok');
			$bsr=0;
			foreach($_X['stok_ID'] as $ID){
				if(z(3,$ID,Array('ceki_ID'=>$ceki_ID,'durum'=>$_VsDrm['stok'] /*,'lot'=>$_X['lot'][$ID],'cekiAciklama'=>$_X['cekiAciklama'][$ID]*/ ))){
					$bsr++;
				}
			}
			if($bsr==count($_X['stok_ID'])){
				z(3,"WHERE durum='1'",'durum',2);
				z(33,'ekle',1);
				header('Location: ?s=ceki&a=detay&id='.$ceki_ID);die;
			}
			else if($bsr>0)echo 'Uyarı: Görüntülenen stok girdilerinin çeki listesine kayıtları başarısız oldu!';
		}
		echo '<div class="hata">Liste oluşturulamadı! Lütfen tekrar deneyiniz...</div>';
	}
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
<div class="bilgi"></div>
<div class="sayfa">
	
    <form action="" method="post" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="0" border="0">
        	<colgroup><col width="28" /><col width="60" /></colgroup>
            <thead>
                <tr class="printx"><th colspan="14"><h2>YENİ ÇEKİ LİSTESİ OLUŞTUR</h2>Lütfen stok numarasını elle veya barkod okuma cihazıyla belirtiniz.<div class="eklepnl"><?Php 
					//<select id="iptal"><option value="0">GÖNDER</option><option value="1">İPTAL ET</option></select>
                    //<button type="button" style="margin:0px; padding:4px;" id="detayGirBtn" class="btn">DETAYLARI GİR</button>
					?>
                    <input class="txt" id="txt" placeholder="Stok NO" ><input type="button" id="gndrBtn" class="btn" value="EKLE">
                </div></th></tr>
                <tr>
                	<th colspan="2">FİRMA</th><td colspan="2"><?Php 
						$_Kalite=z(1,"WHERE id<>'0'",NULL,'musteri');
						if(!empty($_Kalite)){
							echo '<select name="detay[personel_ID]" required="required" style="width:98%"><option value="">seçiniz</option>';
							foreach($_Kalite as $fe){
								echo '<option value="'.$fe['id'].'" '.(!empty($_X['personel_ID'])&&$_X['personel_ID']==$fe['id']?'selected':'').'>'.
								trmtn((!empty($fe['sirket'])?$fe['sirket']:'').(!empty($fe['ad'])||!empty($fe['soyad'])?' ('.(!empty($fe['ad'])?$fe['ad']:'').' '.(!empty($fe['soyad'])?$fe['soyad']:'').')':''))
								.'</option>';
							}
							echo '</select>';
						}
						?></td><th colspan="10">&nbsp;</th>
                </tr>
                <tr>
                    <th>NO</th><th>STOK NO</th>
                    <th>TİP NO</th><th>PARTİ NO</th><th>KUMAŞ CİNSİ</th><th>RENK NO</th><th>DESEN NO</th><th>MAMUL EN / GR</th><th>KALİTE</th><th>TOP NO</th><th>LOT NO</th><th>METRAJ</th><th class="printx">SİL</th>
                    <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                </tr>
            </thead>
            <tbody class="cekibody"><?Php $geriYukle=1;require('sayfa/'.$tbl.'/cekitr_prc.php'); ?></tbody>
            <tfoot>
                <tr><th colspan="12" style="text-align:right">Toplam Metraj : </th><th><span class="topMetre"><?Php echo empty($cekiAdet)?$cekiAdet:0?></span></th><th colspan="1">&nbsp;</th></tr>
                <tr class="printx">
                    <th colspan="14">
                    
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
	$('form').submit(function(e){e.preventDefault();});
	$('#subBtn').hover(function(e){$('form').unbind('submit');},function(a){e.preventDefault();});
	
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
	$('.metreTxt').change(function(e){metreleriTopla();});
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
	$.get('sayfa/<?Php echo $tbl?>/cekitr_ajx.php',{'etiketNO':kod,'tasi':tasi},function(a){
		if(a=='0'){
			uyr('Belirtilen numaraya sahip stok bulunamadı!');
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
		else if(a=='3'){
			uyr('Belirtilen numaraya sahip stok zaten bu listede bulunuyor.');
			$('#txt').val('');
		}
		else{
			$('.cekibody').append(a);
			sirala();
			metreleriTopla();
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
function metreleriTopla(){
	topMetre=0;
	$('.metreTxt').each(function(index, element) {
		var mtr=parseFloat($(this).val());
		if(mtr){
			topMetre+=mtr;
		}
    });
	$('.topMetre').html(topMetre);
}
function metreCikart(etiketNO){
	var mtr=parseInt($('.metre_'+etiketNO).val());
	if(mtr){
		topMetre-=mtr;
		$('.topMetre').html(topMetre);
	}
}
function trSil(id,etiketNO){
	$.get('sayfa/<?Php echo $tbl?>/cekitr_ajx.php',{'cekitrx':id},function(a){
		if(a==1){
			//metreCikart(etiketNO);
			$('#tr_'+id).remove();
			metreleriTopla();
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