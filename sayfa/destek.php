<?Php
if(!empty($ayr['destekA'])){
	require(__DIR__.'/../parca/yazdirMenu.php');
	require('sayfa/destek/ayar.php');
	$_AltM=array(''=>'Destek Talepleri');
	if($admn||ytk(z(8,'s'),'ekle'))$_AltM['ekle']='Destek Talebi Oluştur';
	if(!empty($_AltM))altMenu($_AltM,$syf);
?>
<?Php 
if(z(8,'a')){
	$a=z(8,'a');
	if(strpos($a,'_')){$exp=explode('_',$a);$a=$exp[0];}
	
	if($admn||ytk(z(8,'s'),str_replace('detay','listele',$a))){
		require(__DIR__.'/'.$tbl.'/'.$a.'.php');
	}
	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}
else if($admn||ytk(z(8,'s'),'listele')){?>
<div class="sayfa" style="border-bottom:0px; padding:10px;">
	<?Php if($admn||ytk($tbl,'duzenle')){?>
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Cevap Bekleyen Destek Talepleri</h3></div>
    <div class="icerik">
    	<table cellpadding="0" cellspacing="0" id="onayBekleyenTbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>YAZAN</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='onayBekleyen';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    <br />
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Cevaplanan Destek Talepleri</h3></div>
    <div class="icerik">
        <table cellpadding="0" cellspacing="0" id="buGunTbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>YAZAN</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='buGun';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    <br />
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Tamamlanmış Destek Talepleri</h3></div>
    <div class="icerik">
        <table cellpadding="0" cellspacing="0" id="son5Tbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>YAZAN</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='son5';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    
	
	<?Php }else{?>
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Cevap Bekleyen Destek Talepleriniz</h3></div>
    <div class="icerik">
    	<table cellpadding="0" cellspacing="0" id="onayBekleyenTbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='onayBekleyen';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    <br />
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Cevaplanan Destek Talepleriniz</h3></div>
    <div class="icerik">
        <table cellpadding="0" cellspacing="0" id="buGunTbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='buGun';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    <br />
    <div class="baslik" style="border:1px solid #000;border-bottom:0px;"><h3>Tamamlanmış Destek Talepleriniz</h3></div>
    <div class="icerik">
        <table cellpadding="0" cellspacing="0" id="son5Tbl">
            <colgroup>
                <col width="30" /><col width="52" /><col /><col width="120" /><col width="120" /><col width="120" />
            </colgroup>
            <thead>
                <tr><th>NO</th><th>DURUM</th><th>BAŞLIK</th><th>YAZILMA TARİHİ</th><th>DEPARTMAN</th><th>ÖNCELİK</th></tr>
            </thead>
            <tbody>
                <?Php $ltip='son5';require('sayfa/'.$syf.'/listeleAna_prc.php')?>
            </tbody>
        </table>
    </div>
    <?Php }?>
</div>
<script type="text/javascript">
setInterval(function(){
	$.get('sayfa/<?Php echo $syf?>/listeleAna_ajx.php?ltip=onayBekleyen',function(a){$('#onayBekleyenTbl tbody').html(a);});
	$.get('sayfa/<?Php echo $syf?>/listeleAna_ajx.php?ltip=buGun',function(a){$('#buGunTbl tbody').html(a);});
	$.get('sayfa/<?Php echo $syf?>/listeleAna_ajx.php?ltip=son5',function(a){$('#son5Tbl tbody').html(a);});
},8000);
</script>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');
}else _uyr(2,'Bu özellik yöneticiler tarafından kapatılmış.');?>