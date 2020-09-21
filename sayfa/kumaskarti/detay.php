<style type="text/css">
	body{
		background: white;
	}
	.dtysayfa{
		max-width: 1200px;
		padding: 20px;
		box-sizing: border-box;
		margin:auto;
		margin-top: 20px;
		background: white;
		border-radius: 24px;
		border: 1px solid #fff;
		overflow: hidden;
		-webkit-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		-moz-box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
		box-shadow: 0 0 4px 2px rgba(0,0,0,0.1);
	}

    .formduzenleme{
        background: #14eed0;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 50px;
        display: block;
        text-align: center;
        color: #433c3c;
        font-weight: bold;
        font-size: 16px;
    }
	.tasiyici{
		width: 100%;
		height: auto;
		padding:4px;
		overflow: hidden;
	}
	.tasiyici1{
		width: 50%;
		float: left;
		padding-top:8px;
		padding-right: 22px;
	}
	.tasiyici2{
		width: 50%;
		float: left;
		padding-left: 4px;
	}
	.dtybaslik{
		text-decoration: underline;
		font-size: 10px;
		margin-top: 8px;
	}
	.dtyaciklama{
		margin-top: 2px;
		font-size: 14px;
		padding: 11px 12px 11px 20px;
	}
	.divblock{
		width: 100%;
		float: left;
		margin-top: 8px;
	}
	.dtyborder{
		background: #f8f8f8;
		font-size: 12px;
		letter-spacing: 1px;
		text-decoration: none;
		font-weight: 700;
		border-radius: 12px;
		padding-right: 10px;
		padding-left: 10px;
		color: #666;
		padding: 0.4em 0.4em 0.4em 1em;
		text-transform: uppercase;
	}
	.dtytable{
		margin-top:10px;
		float: left;
		border: none;
	}
	.dtytr td{
		background: #f07f0c;
		color:white;
	}
	.dtydurum{
		border-radius: 12px;
		border: 1px solid #f0f0f0;
		padding-left: 10px;
		padding-right: 10px;
	}
	.dtytext{
		font-size: 10px;
	}
	.dtybaslik2{
		font-weight: normal;
	}
	.gorunum{
		border: 1px solid #ddd;
		background: #2d65b9;
		color: white;
		padding: 4px;
	}
	.guncellemeler{
		display:none;
	}
	.guncellemeilk{
		display:table-row;
	}
	.gorunum2{
		border: 1px solid #ddd;
		background: #2d65b9;
		color: white;
		padding: 4px;
	}
	.guncelle2meler{
		display:none;
	}
	.guncelle2meilk{
		display:table-row;
	}
	.sticker{
		display:none;
		width:8cm;
		height:5.5cm;
		border:1px solid #efefee;
	}
	.stickertop{
		padding-top: 1.4cm;
		font-size: 0.4cm;
		padding-left: 0.15cm;
	}
	.code span:nth-child(1){
		width: 2.6cm;
		display: block;
		float: left;
	}
	.article span:nth-child(1){
		width: 2.6cm;
		display: block;
		float: left;
	}
	.composition span:nth-child(1){
		width: 2.6cm;
		display: block;
		float: left;
	}
	.gsm span:nth-child(1){
		width: 2.6cm;
		display: block;
		float: left;
	}
	.spanisim2{
		color: black;
		display: block;
		border: 1px solid #ddd;
		border-radius: 10px;
		padding: 4px;
		min-height: 38px;
		margin-bottom: 4px;
	}

	.resimler{
		margin-bottom:10px;
		overflow:hidden;
		text-align:justify;
	}
	@media only screen and (max-width: 978px) {
		.tasiyici1 {
			width:100%;
		}
		.tasiyici2 {
			width:100%;
			margin-top: 20px;
		}
	}
    @media print {
        .printx{
            display:none;
		}
		@page { size: auto;  margin: 0mm; }
		.sticker {
			display: block !important;
		}
    }
</style>
<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$kumastipiduzenle='duzenle';
if($vt['nesne_IDkumasTipi']=='176'){
	$kumastipiduzenle='duzenletedarik';
}
if($vt['nesne_IDkumasTipi']=='180'){
	$kumastipiduzenle='duzenlekombinasyon';
}
$kumastipiekle='ekle';
if($vt['nesne_IDkumasTipi']=='176'){
	$kumastipiekle='ekletedarik';
}
if($vt['nesne_IDkumasTipi']=='180'){
	$kumastipiekle='duzenlekombinasyon';
}
$rprsil=z(8,'rprsil');
if(!empty($rprsil)){
	z(3,$rprsil,array("arsiv"=>"-1"),'rapor');
	z('git','./?s='.$tbl.'&a=detay&id='.$id);
}
$rprarsv=z(8,'rprarsv');
if(!empty($rprarsv)){
	z(3,$rprarsv,array("arsiv"=>"1"),'rapor');
	z('git','./?s='.$tbl.'&a=detay&id='.$id);
}
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
$makinacesidiadi='';
if(!empty($vt['makinacesitleri_ID'])){ $makinacesidioku=z(1,$vt['makinacesitleri_ID'],'ID,ad,pus,fayn,makineyetenegi','makinacesitleri'); $makinacesidiadi=(!empty($makinacesidioku['ad'])?$makinacesidioku['ad']:''); }
$kumasturuadi='';
$kumasveritopla='';
$kumasturunesnedoviz='';
$pusvefaynmetni2='';
$pusvefaynjson=array();
if(!empty($vt['kumasturu_ID'])){
	$kumasturuoku=z(1,$vt['kumasturu_ID'],'ID,ad,pusvefayn,nesne_IDdoviz,nesne_IDmakineYetenegi','kumasturu'); $kumasturuadi=(!empty($kumasturuoku['ad'])?$kumasturuoku['ad']:'');

	$kumasturunesnedoviz=(!empty($kumasturuoku['nesne_IDdoviz'])?$kumasturuoku['nesne_IDdoviz']:'');

	$kumaspusvefayn=(!empty($vt['pusvefayn'])?$vt['pusvefayn']:'');
	$makinepus=(!empty($makinacesidioku['pus'])?json_decode($makinacesidioku['pus'],1):0);
	$makinefayn=(!empty($makinacesidioku['fayn'])?json_decode($makinacesidioku['fayn'],1):0);
	$makinesayi=count($makinepus);

	$makinedegeriarray=(!empty($makinacesidioku['makineyetenegi'])?json_decode($makinacesidioku['makineyetenegi'],1):'');
	$makineislevi=(!empty($kumasturuoku['nesne_IDmakineYetenegi'])?$kumasturuoku['nesne_IDmakineYetenegi']:'');
	$makinedonguid='';
	
	$makinedegerleri=array();
	$makinedegerleri2=array();
	if(!empty($makinedegeriarray)){
		foreach ($makinedegeriarray as $mkd => $makinedegeri) {
			$nesneoku=z(1,$makinedegeri,'','nesne');
			$nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
			$nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$mkd);
			$makinedegerleri[$nesnemetinid]=$nesnemetin1;
			if(!empty($makineislevi)){
				if($makineislevi==$nesnemetinid){
					$makinedonguid=$mkd;
				}
			}
		}
	}

	if(!empty($makinedonguid)){
		$makinedongupus=$makinepus[$makinedonguid];
		$makinedongufayn=$makinefayn[$makinedonguid];
	}

	if(!empty($kumaspusvefayn)){
		$kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
	}
	if(!empty($kumaspusvefayn)){
		foreach($kumaspusvefayn as $pf => $pfarray){
			$pusvefaynsayi=$pfarray;
			if(!empty($makinedongupus[$pf])){
				$pusvefaynmetni2=' Pus: '.$makinedongupus[$pf];
			}
			if(!empty($makinedongufayn[$pf])){
				$pusvefaynmetni2.=' Fayn: '.$makinedongufayn[$pf];
			}

			$pusvefayncheck=(!empty($pfarray[0])?$pfarray[0]:'');
			$pusvefayndeger=(!empty($pfarray[1])?$pfarray[1]:$pfarray[0]);
			
			$pusvefaynjson[$pf]['pusvefayn']=$pusvefaynmetni2;
			$pusvefaynjson[$pf]['deger']=$pusvefayndeger;
			$pusvefaynjson[$pf]['check']=$pusvefayncheck;
		}
	}
}


$metinhazirla='';
$iplikkartlarimetin="";
$iplikkartlarimetin2="";
$kompozisyonarray=array();
if(!empty($vt['iplikkartlari'])){
	$iplikkartlaricek=$vt['iplikkartlari'];
	$iplikkartlariarray=(!empty($vt['iplikkartlari'])?json_decode($vt['iplikkartlari'],1):'');
	if(!empty($iplikkartlariarray)){
		$iplikkartlariarray=str_replace('puan','',$iplikkartlariarray);
	}
	if(!empty($iplikkartlariarray)){
		foreach($iplikkartlariarray as $i => $elyf){
			$iplikokuma=z(1,$i,'','iplik');
			$iplikkarti=(!empty($_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDiplikkartTipi']]['metin1']:'');
			$uretimTipi=(!empty($_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
			$boyaKontrol=(!empty($_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplikokuma['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
			$elyafTipi=(!empty($_Nesne[$i]['metin1'])?$_Nesne[$i]['metin1']:'&nbsp;');
			$iplikkartlarimetin=(!empty($elyf)?'%'.$elyf:''); 
			$elyafmetin="";
			if(!empty($iplikokuma['elyaf'])){
				$elyafarray=(!empty($iplikokuma['elyaf'])?json_decode($iplikokuma['elyaf'],1):'');
				if(!empty($elyafarray)){
					$elyafarray=str_replace('puan','',$elyafarray);
				}
				if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
					$elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
					$elyfbhesapla=($elyfb/100)*$elyf;
					$elyfbhesapla=number_format($elyfbhesapla);
					$elyafmetin.='%'.$elyfbhesapla.' '.$elyafnesne.' ';
					if(!empty($kompozisyonarray[$elyafnesne])){
						$eskihesaplama=$kompozisyonarray[$elyafnesne];
						$yenihesaplama=($eskihesaplama+$elyfbhesapla);
						$kompozisyonarray[$elyafnesne]=$yenihesaplama;
					} else {
						$kompozisyonarray[$elyafnesne]=$elyfbhesapla;
					}
				} }
			}
			
			$elyafmetinekle=(!empty($boyaKontrol)&&!empty($elyafmetin)?' || ':' ').$elyafmetin;
			$iplikkart=$iplikkarti.(!empty($iplikkarti)&&!empty($uretimTipi)?' || ':' ').$uretimTipi.(!empty($uretimTipi)&&!empty($boyaKontrol)?' || ':' ').$boyaKontrol.$elyafmetinekle;
			//$iplikkartlarimetin2.=$iplikkart.' <br> ';
			$iplikkartlarimetin2.=$elyafmetin.' <br> ';
		} 
	}  
}
$kompmetin='';
if(!empty($kompozisyonarray)){
	foreach ($kompozisyonarray as $karray => $kompozisyon2) {
		$kompmetin.='%'.$kompozisyon2.' '.$karray.' ';
	}
}
$metinhazirla=$iplikkartlarimetin2;
$metinhazirla=str_replace(array("(",")"),"",$metinhazirla);
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="dtysayfa printx">
		<div class="tasiyici">
			<div class="tasiyici1">
					<?php if(!empty($vt['kodu'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ KODU / FABRİC CODE : <b><?php if($vt['kodu']){ echo $vt['kodu'];} ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['ismi'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ İSMİ / FABRIC NAME : <b><?php if($vt['ismi']){ echo $vt['ismi'];} ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['article'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">YAZI / ARTİCLE : <b><?php if($vt['article']){ echo $vt['article'];} ?></b></div>
					<?php } ?>
					<?php if(!empty($makinacesidiadi)){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">MAKİNA ÇEŞİDİ / MACHINE TYPE : <b><?php echo $makinacesidiadi; ?></b></div>
					<?php } ?>
					<?php if(!empty($kumasturuadi)){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ TÜRÜ / FABRIC TYPE : <b><?php echo $kumasturuadi; ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['kumasfiyat'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ FİYATI / FABRİC PRİCE : <b><?php if($vt['kumasfiyat']){ echo z(36,$vt['kumasfiyat']).' ₺ ';} ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['birimTipi'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">BİRİM TİPİ / UNIT TYPE : <b><?php if($vt['birimTipi']=='1'){ echo 'KG'; } if($vt['birimTipi']=='2'){ echo 'M'; } ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['hamTipi'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">HAM TİPİ / CRUDE TYPE : <b><?php if($vt['hamTipi']=='1'){ echo 'HAM'; } if($vt['hamTipi']=='2'){ echo 'HAZIR'; } ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['kumasen'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ ENİ / FABRİC WİDTH : <b><?php if($vt['kumasen']){ echo $vt['kumasen'];} ?></b></div>
					<?php } ?>
					<?php if(!empty($vt['ilavenot'])){ ?>
						<div class="dtyborder dtybaslik2" style="margin-bottom:5px;">İLAVE NOT / ADDITIONAL NOTE : <b><?php if($vt['ilavenot']){ echo $vt['ilavenot'];} ?></b></div>
					<?php } ?>
					<?php if(!empty($pusvefaynjson)){ ?>
						<div class="dtyborder dtybaslik2">PUS/FAYN => DEĞER</div>
						<div class="dtyaciklama"><?php if(!empty($pusvefaynjson)){ foreach ($pusvefaynjson as $pfj => $pfjson) {
							if($pfjson['check']=="on"){
								echo (!empty($pfjson['pusvefayn'])?$pfjson['pusvefayn']:''); echo (!empty($pfjson['deger'])?' => '.$pfjson['deger'].' cm':'').'<br>';
							}
						} } ?></div>
					<?php } ?>
					<?php if(!empty($kompmetin)){ ?>
						<div class="dtyborder dtybaslik2">KOMPOZİSYON / COMPOSİTİON</div>
						<div class="dtyaciklama"><?php echo $kompmetin; ?></div>
					<?php } ?>
					<?php /*/ ?>
					<?php if(!empty($vt['fasonmaliyet'])){ ?>
						<div class="dtyborder dtybaslik2">FASON ÖRGÜ MALİYETİ</div>
						<div class="dtyaciklama"><?php echo $vt['fasonmaliyet']; ?></div>
					<?php } ?>
					<?php if(!empty($kumasturunesnedoviz)){ ?>
						<div class="dtyborder dtybaslik2">FASON ÖRGÜ MALİYETİ DOVİZ TİPİ</div>
						<div class="dtyaciklama"><?php if($_Nesne[$kumasturunesnedoviz]['metin1']){ echo $_Nesne[$kumasturunesnedoviz]['metin1'];} ?></div>
					<?php } ?>
					<?php if(!empty($vt['fasonmaliyet2'])){ ?>
						<div class="dtyborder dtybaslik2">MANUEL FASON ÖRGÜ MALİYETİ</div>
						<div class="dtyaciklama"><?php echo $vt['fasonmaliyet2']; ?></div>
					<?php } ?>
					<?php if(!empty($vt['nesne_IDdovizfason'])){ ?>
						<div class="dtyborder dtybaslik2">MANUEL FASON ÖRGÜ MALİYETİ DOVİZ TİPİ</div>
						<div class="dtyaciklama"><?php if($_Nesne[$vt['nesne_IDdovizfason']]['metin1']){ echo $_Nesne[$vt['nesne_IDdovizfason']]['metin1'];} ?></div>
					<?php } ?>
					<?php /*/ ?>
                    <?php if(!empty($vt['nesne_IDdoviz'])){ ?>
						<div class="dtyborder dtybaslik2">HESAPLAMADA KULLANILAN DÖVİZ CİNSİ /<br> CURRENCY USED IN CALCULATION</div>
						<div class="dtyaciklama"><?php if($_Nesne[$vt['nesne_IDdoviz']]['metin1']){ echo $_Nesne[$vt['nesne_IDdoviz']]['metin1'];} ?></div>
					<?php } ?>
					<?php $ytkFyt=ytk($tbl,'ozel2'); ?>
					<?php if(!empty($vt['fiyatlar'])&&!empty($ytkFyt)||$admn){ ?>
						<div class="dtyborder dtybaslik2">SON FİYATLAR(₺) / LATEST PRİCES(₺)</div>
						<div class="dtyaciklama"><?php if($vt['fiyatlar']){ $degistir=str_replace(array('"','[',']'),"",$vt['fiyatlar']); echo str_replace(array(','),", ",$degistir).' ₺'; } ?></div>
					<?php } ?>
					<?php /*/ ?>
					<?php if(!empty($vt['personel_ID'])){ 
						$personelcek=z(1,$vt['personel_ID'],'','personel'); ?>
						<div class="dtyborder dtybaslik2">EKLEYEN PERSONEL</div>
						<div class="dtyaciklama"><?php if(!empty($personelcek['ad'])){ echo $personelcek['ad'].' '; } if(!empty($personelcek['soyad'])){ echo $personelcek['soyad']; } ?></div>
					<?php } ?>
					<?php if(!empty($vt['tarihKayit'])){ ?>
						<div class="dtyborder dtybaslik2">EKLENME TARİHİ</div>
						<div class="dtyaciklama"><?php _z('tarih',$vt['tarihKayit']); ?></div>
					<?php } ?>
					<?php /*/ ?>
					<?php
					$idcek=z(8,'id');
					$kumasdzncek='';
					$sayikumas=0;
					if(!empty($idcek)){
					$kumasdzncek=z(1,"WHERE arsiv='0' AND revize_ID='".$idcek."' ORDER BY tarih DESC",'ID,tarih,personel_ID,ismi',$tbl);
					$resim=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$idcek),'ID,img','galeri');
					$srg="WHERE arsiv='0' AND modul='".$tbl."' AND modul_ID='".$idcek."' ORDER BY ID DESC";
					$rapor=z(1,$srg,'','rapor');
					$sayikumas=count($kumasdzncek);
					$sayirapor=count($rapor);
					}
					?>
					
					<br>
                    <a href="./?s=kumaskarti&a=sticker&id=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background:#ffd4a8;" target="_blank">STİCKER YAZDIR / STİCKER PRINT </a>
					<br>
					<?php if($sayirapor=='1'||$sayirapor>1){ ?>
						<a href="?s=<?php echo z(8,'s'); ?>&a=rapor&id=<?php echo $rapor[0]['ID']; ?>" class="formduzenleme printx" style="background:#bdffa8;">RAPORU DÜZENLE / EDİT REPORT </a>
					<?php } else { ?>
						<a href="?s=<?php echo z(8,'s'); ?>&a=rapor&id=<?php echo z(8,'id'); ?>&ekle=1" class="formduzenleme printx" style="background:#bdffa8;">RAPOR OLUŞTUR / CREATE A REPORT </a>
					<?php } ?>
                    <br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=<?php echo $kumastipiduzenle; ?>&id=<?php echo z(8,'id'); ?>" class="formduzenleme printx" target="_blank">BU FORMU DÜZENLE / EDIT THIS FORM</a>
                    <br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=<?php echo $kumastipiekle; ?>&farkli=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background:#f0ff10;">BU FORMU FARKLI DÜZENLE VE KAYDET /<br> DIFFERENT EDIT AND SAVE THIS FORM</a>
					<?php if(($admn||ytk($tbl,'sil'))){ ?>
					<br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=listele&idx=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background: #d20000;color: white;" onclick="return confirm('Kalıcı olarak silmek istediğine emin misin?')">BU FORMU KALICI OLARAK SİL /<br> DELETE THIS FORM PERMANENTLY</a>
					<?php } ?>
				</div>
				<div class="tasiyici2">
                    <?php if(!empty($kumasdzncek)){ ?>
                    <div class="divblock">
					<div class="dtyborder">GÜNCELLEME GEÇMİŞİ / UPDATE HISTORY <?php if($sayikumas>1){ ?><a href="#gorunum" class="gorunum">Daha Fazla Göster</a> <?php } ?> </div>
                    </div>
                    <table class="dtytable" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th><span>Sıra / Sequence</span></th>
                                <th><span>Tarih / Date</span></th>
                                <th><span>Kumaş İsmi /<br> Fabric Name</span></th>
                                <th><span>Düzenleyen Personel /<br> Organized Staff </span></th>
                            </tr>
                        </thead>
                        <tbody class="guncelletbody">
                            <?php foreach($kumasdzncek as $k => $kdzncek){
                                $personelcek=z(1,$kdzncek['personel_ID'],'ID,ad,soyad','personel'); 
                            ?>
                            
                            <tr class="guncellemeler <?php if($k==0){ echo 'guncellemeilk'; } ?> ">
                                <td><?php echo $k+1; ?></td>
                                <td><?php echo z('tarihsaat',$kdzncek['tarih']); ?></td>
                                <td><a href="?s=<?php echo $syf; ?>&a=duzenle&id=<?php echo $kdzncek['ID']; ?>" style="border: 1px solid #fffff4;background: black;color: white;padding: 2px;" target="_blank"><?php echo ($kdzncek['ismi']?$kdzncek['ismi']:''); ?></a></td>
                                <td><?php echo (!empty($personelcek['ad'])?$personelcek['ad']:'').'&nbsp;'.(!empty($personelcek['soyad'])?$personelcek['soyad']:''); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
					</table>
					<script>
						$(document).ready(function(){
							var sayac=0;
							$(".gorunum").click(function(){
								if(sayac==0){
									$(".guncellemeler").css("display","table-row");
									$(".gorunum").html("DAHA AZ GÖSTER");
									sayac=1;
								} else {
									$(".guncellemeler").css("display","none");
									$(".guncellemeilk").css("display","table-row");
									$(".gorunum").html("DAHA FAZLA GÖSTER");
									sayac=0;
								}
							});
						});
					</script>
                    <?php } ?>
					<?php if(!empty($rapor)){ ?>
                    <div class="divblock">
					<div class="dtyborder">RAPOR GEÇMİŞİ / UPDATE REPORT <?php if($sayirapor>1){ ?><a href="#gorunum2" class="gorunum2">Daha Fazla Göster</a> <?php } ?> </div>
                    </div>
                    <table class="dtytable" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th><span>Sıra / Sequence</span></th>
                                <th><span>Tarih / Date</span></th>
                                <th><span>Rapor ID /<br> Report ID</span></th>
                                <th><span>İşlemler /<br> Transactions</span></th>
                            </tr>
                        </thead>
                        <tbody class="guncelle2tbody">
						<?php foreach($rapor as $rp => $rpr){?>
                            
                            <tr class="guncelle2meler <?php if($rp==0){ echo 'guncelle2meilk'; } ?> ">
                                <td><?php echo $rp+1; ?></td>
                                <td><?php echo z('tarihsaat',$rpr['tarih']); ?></td>
                                <td><a href="?s=<?php echo $syf; ?>&a=rapor&id=<?php echo $rpr['ID']; ?>" style="border: 1px solid #fffff4;background: black;color: white;padding: 2px;" target="_blank"><?php echo ($rpr['ID']&&$vt['kodu']?$vt['kodu'].'-'.$rpr['ID']:''); ?></a></td>
                                <td><a href="?s=<?php echo $syf; ?>&a=detay&id=<?php echo $id."&rprsil=".$rpr['ID']; ?>" style="border: 1px solid #fffff4;background: black;color: white;padding: 2px;" onclick="return confirm('Silmek istediğine emin misin?')">SİL</a> / <a href="?s=<?php echo $syf; ?>&a=detay&id=<?php echo $id."&rprarsv=".$rpr['ID']; ?>" style="border: 1px solid #fffff4;background: black;color: white;padding: 2px;" onclick="return confirm('Arşivlemek istediğine emin misin?')">ARŞİVLE</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
					</table>
					<script>
						$(document).ready(function(){
							var sayac=0;
							$(".gorunum2").click(function(){
								if(sayac==0){
									$(".guncelle2meler").css("display","table-row");
									$(".gorunum2").html("DAHA AZ GÖSTER");
									sayac=1;
								} else {
									$(".guncelle2meler").css("display","none");
									$(".guncelle2meilk").css("display","table-row");
									$(".gorunum2").html("DAHA FAZLA GÖSTER");
									sayac=0;
								}
							});
						});
					</script>
                    <?php } ?>
					<?php if(!empty($resim)){ ?>
                    <div class="divblock">
                        <div class="dtyborder">GALERİ / GALLERY</div>
                    </div>
                    <div>
					<?php foreach ($resim as $r => $rsm) { ?>
						<div style="padding:10px;float:left;width:180px;height:180px;cursor:pointer;" class="resimler"><span class="spanisim2"><?php echo $rsm['img']; ?></span><img data-fancybox="gallery1" href="upload/kumaskarti/<?php echo $rsm['img']; ?>" src="upload/kumaskarti/<?php echo $rsm['img']; ?>" style="width:100%;height:100%;"></div>
					<?php } ?>
					</div>	
					<?php } ?>
				</div>
					
			</div>
		</div>
		<div class="sticker">
			<div class="stickertop">
				<div style="float:left;">
					<div class="code"><span>Fabric Code</span><span>: <?php if(!empty($vt['ismi'])){ echo $vt['ismi'];} ?> </span></div>
					<div class="article"><span>Article</span><span>: <?php if(!empty($vt['article'])){ echo $vt['article'];} ?> </span></div>
					<div class="composition"><span>Composition</span><span>: <?php if(!empty($kompmetin)){ echo $kompmetin;} ?> </span></div>
					<div class="gsm"><span>Fabric GSM</span><span>: <?php if(!empty($vt['grm'])){ echo $vt['grm'];} ?> </span></div>
				</div>
			</div>
		</div>
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>


        