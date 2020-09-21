<?Php
z(6,'ceki');
if(z(8,'sil')){
	z(4,z(8,'sil'));
}
$ID=z(8,'id');
if($ID)$menux=z(5,$ID)?'si &gt;&gt; '.z(30,z(1,$ID,'tarih')):'leri';
?>
<?Php $menuA=2;require(__DIR__.'/../parca/menu.php');?>
<style type="text/css">
body{ background-color:#eef;}
.ceki{ font-family:Verdana, Geneva, sans-serif; font-size:14px;}
.ceki table{ background-color:#FFF; width:800px;}
.ceki table td{ font-weight:bold;}
.baslik{ background-color:#CCC; font-weight:bold;}
input{ height:20px; display:inline-block; margin:0px; padding:0px;}
.blok{ margin-bottom:8px;}
#tumuTbl{ width:710px;}
#dtyTbl{border:0px; width:800px; margin:0px; padding:0px;}
#dtyTbl th{ border:0px; text-align:right; background-color:transparent;}
#dtyTbl td{ border:0px; text-align:left; background-color:transparent; font-weight:bold;}
.dipNotSpn{ padding:3px; display:inline-block; min-width:19%; font-size:12px;}
.cekiAra,.araTarih{ height:20px; display:inline-block; margin:0px; padding:0px; border:1px solid #FC0; border-radius:4px;}
#tarihGun{width:40px; height:20px; }
#tarihAy{width:70px; height:20px; }
#tarihYil{width:60px; height:20px; }
</style>
<?Php 
if($ID){
	switch(z(33,'mail')){
		case 1: echo '<div class="onay">E-Posta başarıyla gönderildi.</div>';break;
		case 2: echo '<div class="uyari">Çeki listesi belirtilmemiş.</div>';break;
		case 3: echo '<div class="uyari">E-Posta belirtilmemiş.</div>';break;
		case 99: echo '<div class="hata">E-Posta gönderimi başarısız!.</div>';break;
	}
//ÇEKİ DETAYI ################################
	$k=z(8,'k');
	//$kSd=!empty($k)?" AND nesneKumas_ID='".$k."'":'';
	$__X=z(1,"WHERE ceki_ID='".$ID."' ORDER BY lot",NULL,'local');
	if(!empty($__X)){
		$_Ceki=z(1,$ID,NULL,'ceki');
		
		$musteri=z(1,$_Ceki['musteri_ID'],'ad,soyad,amblem,eposta1','musteri');
		if(empty($musteri['ad'])){
			$musteri['ad']='';
		}
		if(empty($musteri['soyad'])){
			$musteri['soyad']='';
		}
		
		$_KumasID=array();
		foreach($__X as $xfe){
			if(empty($k)){
				$k=$xfe['nesneKumas_ID'];
			}
			$_KumasID[]=$xfe['nesneKumas_ID'];
		}
		$_KumasID=array_unique($_KumasID);
		
		?>
        <?Php if(!z(8,'yazdir')){?><div class="printx"><div class="blok">
        	<ul class="altMenu">
            	<?Php foreach($_KumasID as $kumasID){?>
                <li><a href="?s=ceki&id=<?Php echo $ID?>&k=<?Php echo $kumasID?>" <?Php if(!empty($k))echo $k==$kumasID? 'id="altSec"':''?>><?Php _z(1,$kumasID,'metin1','nesne')?></a></li>
                <?Php }?>
                <?Php if(!empty($musteri['eposta1'])){?>
                <li><a href="?s=mail&tip=ceki&id=<?Php echo $ID?>&k=<?Php if(!empty($k))echo $k?>" style="background-color:#06C; border-radius:8px;" onclick="return confirm('<?Php echo $musteri['eposta1']?> adresine bu çeki listesini göndermek istediğinizden emin misiniz?');">E-Posta Gönder</a></li>
                <?Php }else{?>
                <li><a href="#" style="background-color:#06C; border-radius:8px;" onclick="alert('Müşterinin e-posta adresi belirtilmemiş. Öncelikle yönetim sayfasında e-posta adresini düzenleyiniz.');">E-Posta Gönder</a></li>
                <?Php }?>
            </ul>
        </div></div><?Php }?>
		<div class="blok">
		<table id="dtyTbl" cellspacing="0" cellpadding="0">
			<col width="100px">
			<col width="20px">
			<col width="160px">
			<col width="100px">
			<col width="20px">
			<col width="400px">
			<tbody>
				<tr><th>Alıcı Firma</th><td>:</td><td><?Php echo $musteri['ad'].' '.$musteri['soyad']?></td><th>Tarih</th><td>:</td><td><?Php echo date('d.m.Y H:i',strtotime($_Ceki['tarih']))?></td></tr>
				<tr><th>Kumaş Cinsi</th><td>:</td><td><?Php if(!empty($_Ceki['nesneKumasCins_ID']))_z(1,$_Ceki['nesneKumasCins_ID'],'metin1','nesne')?></td><th>Çeki NO</th><td>:</td><td><?Php echo $_Ceki['ID']?>&nbsp;/&nbsp;<?Php _z(1,$k,'metin1','nesne')?></td></tr>
			</tbody>
		</table>
		</div>
		<div class="ceki">
		<table id="cekiTbl" cellspacing="0" cellpadding="0">
			<col width="10" />
			<col width="100" />
			<col width="100" class="printx" />
			<col />
			<col />
			<col />
			<col />
			<col />
			<col />
			<col width="60" />
			<thead>
            <tr class="printx"><th>&nbsp;</th><th id="jsAraEtiketNOTd"><input id="jsAraEtiketNOTxt" class="printx" style="width:90%" /></th><th id="jsAraRenkNOTd"><input id="jsAraRenkNOTxt" class="printx" style="width:90%" /></th><th colspan="7">&nbsp;</th></tr>
            <tr><th>Sıra</th><th>Top NO</th><th class="printx">Renk NO</th><th>Parti NO</th><th>Metre</th><th>Kalite</th><th>Kumaş</th><th>LOT</th><th>Açıklama</th><th>Onay</th></tr></thead>
			<tbody>
			<?Php
			$topMetre=0;
			$topMetreS=0;
			$topMetre1A=0;
			$j=0;
			foreach($__X as $i=>$_X){
				if($_X['nesneKumas_ID']==$k){
					$j++;
					if(!isset($_DipNot[$_X['nesneKumas_ID']][$_X['lot']])){
						$_DipNot[$_X['nesneKumas_ID']][$_X['lot']]=0;
					}
					$_DipNot[$_X['nesneKumas_ID']][$_X['lot']]++;
					
					$topMetre+=$_X['metre'];
					if($_X['kalite']=='1-A'){
						$topMetre1A+=$_X['metre'];
					}
					else if($_X['kalite']=='1'){
						$topMetreS+=$_X['metre'];
					}
				?>
					<tr><td><strong><?Php echo $j?></strong></td><td class="etiketNO"><?Php echo $_X['etiketNO']?></td><td class="printx renkNO"><?Php echo $_X['renkNO']?></td><td><?Php echo $_X['partiNO']?></td><td><?Php echo $_X['metre'];?></td><td><?Php echo $_X['kalite']?></td><td><?Php _z(1,$_X['nesneKumas_ID'],'metin1','nesne')?></td><td><?Php echo !empty($_X['lot'])?$_X['lot']:''?></td><td style="font-size:12px;"><?Php echo $_X['cekiAciklama']?></td><td>&nbsp;</td></tr>
				<?Php }?>
			<?Php }?>
            	<tr><th colspan="3">1-A Metre</th><th><?Php echo $topMetre1A?></th><th colspan="6">&nbsp;</th></tr>
            	<tr><th colspan="3">Sağlam Metre</th><th><?Php echo $topMetreS?></th><th colspan="6">&nbsp;</th></tr>
            	<tr><th colspan="3">Toplam Metre</th><th><?Php echo $topMetre?></th><th colspan="6">&nbsp;</th></tr>
                <tr><td colspan="10"><?Php 
					foreach($_DipNot as $nesneKumas_ID=>$_Lot){
						foreach($_Lot as $lot=>$adet){
							if(!empty($lot)){
								echo '<span class="dipNotSpn"><strong>'.z(1,$nesneKumas_ID,'metin1','nesne').' LOT'.$lot.'</strong> ('.$adet.' adet)</span>';
							}
						}
					}
				?></td></tr>
			</tbody>
		</table>
		</div>
        <script type="text/javascript">
			function jsAra(){
				var aranan=$('#jsAraEtiketNOTxt').val();
				$('.etiketNO').each(function(index, element) {
    				var icerik=$(this).text();
					if(icerik.indexOf(aranan)!=-1){
						var bas=icerik.indexOf(aranan);
						var son=bas+aranan.length;
						var len=icerik.length;
						$(this).html(icerik.substring(0,bas)+'<u style="background-color:#0f0;">'+aranan+"</u>"+icerik.substring(son,len));
					}else{
						$(this).html(icerik);
					}
                });
			}
			function renkAra(){
				var aranan=$('#jsAraRenkNOTxt').val();
				$('.renkNO').each(function(index, element) {
    				var icerik=$(this).text();
					if(icerik.indexOf(aranan)!=-1){
						var bas=icerik.indexOf(aranan);
						var son=bas+aranan.length;
						var len=icerik.length;
						$(this).html(icerik.substring(0,bas)+'<u style="background-color:#0f0;">'+aranan+"</u>"+icerik.substring(son,len));
					}else{
						$(this).html(icerik);
					}
                });
			}
			$(document).ready(function(e){
				$('#jsAraEtiketNOTxt').change(jsAra).keyup(jsAra);
				$('#jsAraRenkNOTxt').change(renkAra).keyup(renkAra);
			});
		</script>
	<?Php }else echo '<div class="uyari">Yeni gönderilmiş top bulunamadı.</div>';


// ÇEKİ LİSTELERİ ##################################
}else{
	if(z(5,NULL,NULL,'ceki')){
		?>
        <div class="siyah blok">
		<table id="tumuTbl" cellspacing="0" cellpadding="0">
			<col width="32px">
			<col width="62px">
			<col width="186px">
			<col width="172px">
			<col width="80px">
			<col width="100px">
			<col width="78px">
			<thead>
                <tr><th>&nbsp;</th>
            		<th><input type="text" class="cekiAra ufakTxt" id="araID"></th>
                    <th><input type="hidden" id="araTarih" class="cekiAra" value="<?Php echo substr(z('date'),0,7)?>">
                    <?Php $_Ay=Array('','Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık')?>
            <select id="tarihGun" class="araTarih"><option value="">&nbsp;&nbsp;</option><?Php for($i=1;$i<32;$i++){$sc=date('d')==$i?'selected':'';echo '<option value="'.substr('0'.$i,-2).'">'.substr('0'.$i,-2).'</option>';}?></select><select id="tarihAy" class="araTarih"><option value="">&nbsp;&nbsp;</option><?Php for($i=1;$i<13;$i++){$sc=date('m')==$i?'selected':'';echo '<option value="'.substr('0'.$i,-2).'" '.$sc.'>'.$_Ay[$i].'</option>';}?></select><select id="tarihYil" class="araTarih"><option value="">&nbsp;&nbsp;&nbsp;&nbsp;</option><?Php $_T=z(1,"ORDER BY tarih",'tarih');if(!empty($_T)){foreach($_T as $trh){$trh=substr($trh,0,4);if(empty($_TA[$trh])){$sc=date('Y')==$trh?'selected':'';echo '<option value="'.$trh.'" '.$sc.'>'.$trh.'</option>';$_TA[$trh]=1;}}}?></select>
                    </th>
                    <th><?Php echo select(Array('detay'=>'class="cekiAra" id="araMusteri_ID"','icerik'=>'<option value="">&nbsp;</option>'))?></th>
                    <th colspan="3">&nbsp;</th></tr>
                <tr><th>Sıra</th><th>Çeki NO</th><th>Tarih</th><th>Müşteri</th><th>Top Adeti</th><th>Toplam Metre</th><th>Yönet</th></tr>
            </thead>
			<tbody>
				<?Php require(__DIR__.'/../parca/cekiListele.php')?>
			</tbody>
		</table>
        </div>
        <script type="text/javascript">
		function ajaxAra(){
			$.post('ajax/cekiAra.php',{'cekiAra':{
				'ID':$('#araID').val(),
				'tarih':$('#araTarih').val(),
				'musteri_ID':$('#araMusteri_ID').val()
			}},function(a){$('tbody').html(a)});
		}
		function tarihOlustur(){
			var gun='',ay='',yil='';
			if($('#tarihYil').val()){
				yil=$('#tarihYil').val();
			}
			if($('#tarihAy').val()){
				ay='-'+$('#tarihAy').val();
			}
			if($('#tarihGun').val()){
				gun='-'+$('#tarihGun').val();
			}
			$('#araTarih').val(yil+''+ay+''+gun);
			ajaxAra();
		}
		$(document).ready(function(e) {
			$('.cekiAra').change(ajaxAra).keyup(ajaxAra);
			$('.araTarih').change(tarihOlustur);
		});
		</script>
	<?Php }else echo '<div class="uyari">Hiç çeki listesi bulunamadı.</div>';?>
<?Php }?>