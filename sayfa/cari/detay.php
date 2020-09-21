<style type="text/css">
	body{
		background: white;
	}
	.renktd {
		padding: 6px; 
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

	.cardprint{
		font-size:20;
		margin-left:10px;
		cursor:pointer;
	}

	.gerigit{
		margin-left: 10px;
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
		width: 33%;
		float: left;
		padding-top:8px;
		padding-right: 22px;
	}
	.tasiyici2{
		margin-top: 7px;
		width: 33%;
		float: left;
		padding-left: 4px;
	}
	.tasiyici3{
		margin-top: 7px;
		width: 33%;
		float: left;
		padding-left: 22px;
	}

	.dtyaciklamaModal, .dtyaciklamaModal2 {
    display: none; /* Varsayılan olarak gizlidir */
    position: absolute; /* Yerinde kal */
    z-index: 1; /* Üstte */
    left: 35%;
    top:10%;
    width: 50%; /* Ful Genişlik */
    height: 50%; /* Ful Yükseklik */
    overflow: auto; /* Gerekirse kaydırmayı etkinleştir */
    /* background-color: rgb(0,0,0); Yedek renk */
    /* background-color: rgba(0,0,0,0.4); Siyah w / opaklık */
}


.modal-content {
    background-color: #fff;
    /* margin: 15% auto; % 15 üstten ve ortalanmış */
	
    padding: 2px 14px 14px 14px;
    border: 1px solid #888;
    width: auto; /* Ekran boyutuna bağlı olarak daha fazla veya daha az olabilir */
	height: auto;
}

/* Kapat Düğmesi */
.close {
    color: #aaa;
	margin-left: 97%;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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

		.yazici a{
			text-decoration:none !important;
		}

    }
</style>
<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$vt_renkkarti = z(1,"WHERE arsiv=0 AND cari_ID=".$id,"","renkkarti");
$vt_musterirenkkarti = z(1,"WHERE arsiv=0 AND musteri_ID LIKE '%,".$id.",%' OR musteri_ID LIKE '%".$id.",%' OR musteri_ID LIKE '%,".$id."%'","","renkkarti");
$vt_aksesuarkarti = z(1,"WHERE arsiv=0 AND cari_ID=".$id,"","aksesuarkarti");
// __($vt_aksesuarkarti);
if(!empty($vt_musterirenkkarti)){
foreach($vt_musterirenkkarti as $key => $musterirenkkarti){
		$musterirenk[$key]['renkKodu'] = $musterirenkkarti['renkKodu'];
		$musterirenk[$key]['cari_ID'] = $musterirenkkarti['cari_ID'];
		$musterirenk[$key]['boyabaski_ID'] = $musterirenkkarti['boyabaski_ID'];
		$musterirenk[$key]['musteri_ID'] = explode("," , $musterirenkkarti['musteri_ID']);
		$musterirenk[$key]['musteriboyabaski_ID'] = explode("," , $musterirenkkarti['musteriboyabaski_ID']);
		$musterirenk[$key]['nesne_IDrenkadi'] = explode("," , $musterirenkkarti['nesne_IDrenkadi']);
}
for ($i=0; $i < count($musterirenk) ; $i++) { 
	$av = array_search($id,$musterirenk[$i]['musteri_ID']);
	$mdata[$i]['renkKodu'] = $musterirenk[$i]['renkKodu'];
	$mdata[$i]['cari_ID'] = $musterirenk[$i]['cari_ID'];
	$mdata[$i]['boyabaski_ID'] = $musterirenk[$i]['boyabaski_ID'];
	$mdata[$i]['musteri_ID'] = $musterirenk[$i]['musteri_ID'][$av];
	$mdata[$i]['musteriboyabaski_ID'] = $musterirenk[$i]['musteriboyabaski_ID'][$av];
	$mdata[$i]['nesne_IDrenkadi'] = $musterirenk[$i]['nesne_IDrenkadi'][$av];
}
}
// __($vt_musterirenkkarti);
		if(!empty($vt_renkkarti)){	
	foreach($vt_renkkarti as $key => $renkdetay){
		$renkkarti_ID[$key] = $renkdetay['ID'];
		$check = strpos($renkdetay['musteri_ID'],",");
		$ccheck = strpos($renkdetay['musteriboyabaski_ID'],",");
		$cccheck = strpos($renkdetay['nesne_IDrenkadi'],",");
		$detayrenk[$key]['renkKodu'] = $renkdetay['renkKodu'];
		if($renkdetay['musteri_ID']!='0'){
			if($check!=FALSE){
				$detayrenk[$key]['musteri_ID'] = explode(',',$renkdetay['musteri_ID']);
			}
			elseif($check===FALSE){
				$detayrenk[$key]['musteri_ID'][0] = $renkdetay['musteri_ID'];
			}
		}
		else {$detayrenk[$key]['musteri_ID'][0] = 0;}
		
		if($renkdetay['musteriboyabaski_ID']!='0'){
			if($ccheck!=FALSE){	
				$detayrenk[$key]['musteriboyabaski_ID'] = explode(',',$renkdetay['musteriboyabaski_ID']);
			}
			elseif($ccheck===FALSE){
				$detayrenk[$key]['musteriboyabaski_ID'][0] = $renkdetay['musteriboyabaski_ID'];
			}
		}
		else {$detayrenk[$key]['musteriboyabaski_ID'][0] = 0;}
	
		if($renkdetay['nesne_IDrenkadi']!='0'){
			if($cccheck!=FALSE){
				$detayrenk[$key]['nesne_IDrenkadi'] = explode(',',$renkdetay['nesne_IDrenkadi']);
			}
			elseif($cccheck===FALSE){
				$detayrenk[$key]['nesne_IDrenkadi'][0] = $renkdetay['nesne_IDrenkadi'];
			}
		}
		else {$detayrenk[$key]['nesne_IDrenkadi'][0] = 0;}
	
	}
}
//    __(!empty($detayrenk)?$detayrenk:'0');	
$temsilciPersonel=z(37,z(1,"WHERE arsiv='0'","","personel")); 
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='banka' OR ad='rehberGrup' OR ad='tedarikciTipi' OR ad='cariTipi' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne'));
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="dtysayfa">
	<a style="display:none;" class="gerigit" href="#geri" onClick=geri()><i class="icon-reply"></i></a>	
	<div class="yazici" onClick=yazdir()><i class="cardprint icon-printer2"></i></div>

		<div class="tasiyici">
			<div class="tasiyici1">
					<?php if(!empty($vt['ad'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Adı</div>
						<div class="dtyaciklama"><?php if(!empty($vt['ad'])){ echo $vt['ad']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['ozelkod'])){  ?>
						<div class="dtyborder dtybaslik2">Özel Kod</div>
						<div class="dtyaciklama"><?php if(!empty($vt['ozelkod'])){ echo $vt['ozelkod']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['adres'])){  ?>
						<div class="dtyborder dtybaslik2">Adres</div>
						<div class="dtyaciklama"><?php if(!empty($vt['adres'])){ echo $vt['adres']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['tel'])){  ?>
						<div class="dtyborder dtybaslik2">Telefon Numarası</div>
						<div class="dtyaciklama"><?php if(!empty($vt['tel'])){ echo $vt['tel']; } ?></div>
					<?php } ?>
                    					
					<?php if(!empty($vt['tarihKayit'])){ ?>
						<div class="dtyborder dtybaslik2">EKLENME TARİHİ</div>
						<div class="dtyaciklama"><?php _z('tarih',$vt['tarihKayit']); ?></div>
					<?php } ?>
                    <br>
                    <a href="?s=<?php echo z(8,'s'); ?>&a=duzenle&id=<?php echo z(8,'id'); ?>" class="formduzenleme printx">BU FORMU DÜZENLE</a>
					<?php if(($admn||ytk($tbl,'sil'))){ ?>
					<br>
					<a href="?s=<?php echo z(8,'s'); ?>&a=listele&idx=<?php echo z(8,'id'); ?>" class="formduzenleme printx" style="background: #d20000;color: white;" onclick="return confirm('Kalıcı olarak silmek istediğine emin misin?')">BU FORMU KALICI OLARAK SİL /<br> DELETE THIS FORM PERMANENTLY</a>
					<?php } ?>
                    <br>
				</div>
									
				<div class="tasiyici2">

				<?php if(!empty($vt['araciKurum'])){  ?>
						<div class="dtyborder dtybaslik2">Aracı Kurum</div>
						<div class="dtyaciklama"><?php if(!empty($vt['araciKurum'])){ echo $vt['araciKurum']; } ?></div>
					<?php } ?>


				<?php if($vt['temsilciPersonel_ID']!=0){  ?>
						<div class="dtyborder dtybaslik2"> Müşteri Temsilci Personel</div>
						<div class="dtyaciklama"><?php if(!empty($temsilciPersonel[$vt['temsilciPersonel_ID']]['ad'])){ echo $temsilciPersonel[$vt['temsilciPersonel_ID']]['ad']; } ?></div>
					<?php } ?>


                <?php if(!empty($vt['telFax'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Fax Bilgisi</div>
						<div class="dtyaciklama"><?php if(!empty($vt['telFax'])){ echo $vt['telFax']; } ?></div>
				<?php } ?>


				<?php if(!empty($vt['vergiNo'])){  ?>
						<div class="dtyborder dtybaslik2">Vergi No</div>
						<div class="dtyaciklama"><?php if(!empty($vt['vergiNo'])){ echo $vt['vergiNo']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['vergiDairesi'])){  ?>
						<div class="dtyborder dtybaslik2">Vergi Dairesi</div>
						<div class="dtyaciklama"><?php if(!empty($vt['vergiDairesi'])){ echo $vt['vergiDairesi']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['mersisNo'])){  ?>
						<div class="dtyborder dtybaslik2">Mersis No</div>
						<div class="dtyaciklama"><?php if(!empty($vt['mersisNo'])){ echo $vt['mersisNo']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['nesne_IDcariTipi'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Durumu</div>
						<div class="dtyaciklama"><?php if(!empty($vt['nesne_IDcariTipi'])){ echo $_Nesne[$vt['nesne_IDcariTipi']]['metin1']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['nesne_IDtedarikciTipi'])){  ?>
						<div class="dtyborder dtybaslik2">Tedarikci Durumu</div>
						<div class="dtyaciklama"><?php if(!empty($vt['nesne_IDtedarikciTipi'])){ echo $_Nesne[$vt['nesne_IDtedarikciTipi']]['metin1']; } ?></div>
					<?php } ?>
                    <?php if(!empty($vt['markalar'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Markaları</div>
						<div class="dtyaciklama"><?php if(!empty($vt['markalar'])){
                            $markalar=(!empty($vt['markalar'])?json_decode($vt['markalar'],1):'');
                            if(!empty($markalar)){ foreach ($markalar as $mrk => $marka) { ?>
                                <?php echo $_Nesne[$marka]['metin1'].'<br>'; ?>
                            <?php } } ?>
                            <?php } ?></div>
					<?php } ?>
				<?php 
					$fiyatarsivicek=z(1,array('arsiv'=>0,'modul_ID'=>$id,'modul'=>$tbl),'','fiyatarsiv');
					?>
                    <?php if(!empty($fiyatarsivicek)){ ?>
                    <div class="divblock">
                        <div class="dtyborder">FİYAT GEÇMİŞİ</div>
                    </div>
                    <table class="dtytable" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th><span>Sıra</span></th>
                                <th><span>Tarih</span></th>
                                <th><span>Birim Fiyatı</span></th>
                                <th><span>Döviz Cinsi</span></th>
                                <th><span>Düzenleyen Personel</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fiyatarsivicek as $i => $ascek) { 
                                $personelcek=z(1,$ascek['personel_ID'],'ID,ad,soyad','personel'); 
                            ?>
                            
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo z('tarihsaat',$ascek['tarih']); ?></td>
                                <td><?php echo (!empty($ascek['fiyat'])?z(36,$ascek['fiyat']):'0');  ?></td>
                                <td><?php if(!empty($ascek['nesne_IDdoviz'])){ if($_Nesne[$ascek['nesne_IDdoviz']]['metin1']){ echo $_Nesne[$ascek['nesne_IDdoviz']]['metin1'];} } ?></td>
                                <td><?php echo (!empty($personelcek['ad'])?$personelcek['ad']:'').'&nbsp;'.(!empty($personelcek['soyad'])?$personelcek['soyad']:''); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
					
				</div>

				<div class="tasiyici3">
				<?php if(!empty($vt['nesne_IDbanka'])&&$vt['nesne_IDbanka']!=0){  ?>
						<div class="dtyborder dtybaslik2">Banka</div>
						<div class="dtyaciklama"><?php if(!empty($vt['nesne_IDbanka'])){ echo $_Nesne[$vt['nesne_IDbanka']]['metin1']; } ?></div>
					<?php } ?>
				
				<?php if(!empty($vt['bankaBilgileri'])){  ?>
						<div class="dtyborder dtybaslik2">Banka Bilgileri</div>
						<div class="dtyaciklama"><?php if(!empty($vt['bankaBilgileri'])){ echo $vt['bankaBilgileri']; } ?></div>
				<?php } ?>

				<?php if(!empty($vt['odemeSartlari'])){  ?>
						<div class="dtyborder dtybaslik2">Ödeme Şartları</div>
						<div class="dtyaciklama"><?php if(!empty($vt['odemeSartlari'])){ echo $vt['odemeSartlari']; } ?></div>
					<?php } ?>

            	<?php if(!empty($vt['aciklama'])){  ?>
						<div class="dtyborder dtybaslik2">Açıklama</div>
						<div class="dtyaciklama"><?php if(!empty($vt['aciklama'])){ echo $vt['aciklama']; } ?></div>
				<?php } ?>

				<?php if(!empty($vt['personel_ID'])){ 
						$personelcek=z(1,$vt['personel_ID'],'','personel'); ?>
						<div class="dtyborder dtybaslik2">EKLEYEN PERSONEL</div>
						<div class="dtyaciklama"><?php if(!empty($personelcek['ad'])){ echo $personelcek['ad'].' '; } if(!empty($personelcek['soyad'])){ echo $personelcek['soyad']; } ?></div>
				<?php } ?>



				<?php if(!empty($mdata)){ ?>
				<div  class="renkbaslik dtyborder dtybaslik2"><a href="#renkkarti" onclick=tabloGoster()>Bu Cari Kartı ile Bağlantılı Renk Kartları</a></div>
						<div class="dtyaciklamaModal">
						<div class="modal-content">
						<div class="close"><span class="close">&times;</span></div>
						<table class="tablegroup" bordercolor="Gray" border="1" cellpading="10">
								<tr>
									<th>Renk Kodu</th>
									<th>Kendi Grubu</th>
									<th>Renk Adı</th>
									<th>Tedarikçi</th>
									<th>Tedarikçi Grubu</th>			
								</tr>


						<?php foreach ($mdata as $key => $musterimiz) { 
							$kendigrubu = z(1,$musterimiz['musteriboyabaski_ID'],'tipi','boyabaski');
							$tedarikci = z(1,$musterimiz['cari_ID'],'ad','cari');
							$renkadi = z(1,$musterimiz['nesne_IDrenkadi'],'metin1','nesne');
							$tedarikcigrubu = z(1,$musterimiz['boyabaski_ID'],'tipi','boyabaski');
							
							?>
							<tr>
							<td class='renktd'><a href="?s=renkkarti&a=detay&id=<?php echo $vt_musterirenkkarti[$key]['ID'];?>"><?php echo $musterimiz['renkKodu'];?></a></td>
							<td class='renktd'><a href="?s=boyabaski&a=detay&id=<?php echo $musterimiz['musteriboyabaski_ID']; ?>"><?php echo $kendigrubu;?></a></td>
							<td class='renktd'><a href="?s=nesne&dznl=renkadi"><?php echo $renkadi;?></a></td>							
							<td class='renktd'><a href="?s=cari&a=detay&id=<?php echo $musterimiz['cari_ID']; ?>"><?php echo $tedarikci;?></a></td>							
							<td class='renktd'><a href="?s=boyabaski&a=detay&id=<?php echo $musterimiz['boyabaski_ID']; ?>"><?php echo $tedarikcigrubu;?></a></td>							
							</tr>
						<?php } ?>

						</table>

						</div>
						</div>
		<?php } ?>


				<br>			
				
				<?php   if(!empty($detayrenk)){ 
												?>
						<div class="renkbaslik dtyborder dtybaslik2"><a href="#renkkarti" onclick=tabloGoster()>Bu Cari Kartı ile Bağlantılı Renk Kartları</a></div>
						<div class="dtyaciklamaModal">
						<div class="modal-content">
						<div class="close"><span class="close">&times;</span></div>
						<table class="tablegroup" bordercolor="Gray" border="1" cellpading="10">
								<tr>
									<th>Renk Kodu</th>
									<th>Müşteri</th>
									<th>Grubu</th>
									<th>Renk Adı</th>
								</tr>
						<?php foreach($detayrenk as $key => $renkkarti){

							for($i=0;$i<count($renkkarti['musteri_ID']);$i++){
								if($renkkarti['musteri_ID'][$i]!='0'){
									$musteri_ad = z(1,$renkkarti['musteri_ID'][$i],'ad','cari');
								}
								else{$musteri_ad='';}

								if($renkkarti['musteriboyabaski_ID'][$i]!='0'){
									$boyabaskitipi = z(1,$renkkarti['musteriboyabaski_ID'][$i],'tipi','boyabaski');
								}
								else{$boyabaskitipi='';}

								if($renkkarti['nesne_IDrenkadi'][$i]!='0'){
									$renkadi = z(1,$renkkarti['nesne_IDrenkadi'][$i],'metin1','nesne');
								}
								else{$renkadi='';}?>
								
							
							<tr>
							
							<td class='renktd'><a href="?s=renkkarti&a=detay&id=<?php echo $renkkarti_ID[$key]; ?>"><?php echo $renkkarti['renkKodu'];?></a></td>
							<td class='renktd'><a href="?s=cari&a=detay&id=<?php echo $renkkarti['musteri_ID'][$i]; ?>"><?php echo $musteri_ad;?></a></td>
							<td class='renktd'><a href="?s=boyabaski&a=detay&id=<?php echo $renkkarti['musteriboyabaski_ID'][$i]; ?>"><?php echo $boyabaskitipi;?></a></td>							
							<td class='renktd'><a href="?s=nesne&dznl=renkadi"><?php echo $renkadi;?></a></td>							
							
							</tr>
						<?php }} ?>
						</table>

						</div>
						</div>
				<?php } ?>

				
				<br>
				<?php if($vt_aksesuarkarti) { ?>
					<div class="aksesuarbaslik dtyborder dtybaslik2"><a href="#renkkarti" onclick=tabloGoster2()>Bu Cari Kartı ile Bağlantılı Aksesuar Kartları</a></div>
						<div class="dtyaciklamaModal2">
						<div style="margin-top:3%;" id="printJS-modal" class="modal-content">
						<div class="close"><span class="close">&times;</span></div>
						<table style="margin-top:5px;" class="tablegroup" bordercolor="Gray" border="1" cellpading="10">
								<tr>
									<th>Aksesuar Kodu</th>
									<th>Aksesuar Grubu</th>
									<th>Birim</th>
									<th>Döviz</th>
									<th>Fiyat</th>			
								</tr>


						<?php foreach ($vt_aksesuarkarti as $key => $aksesuar) { 
							$aksesuargrubu = z(1,$aksesuar['nesne_IDaksesuargruplari'],'metin1','nesne');
							$birim = z(1,$aksesuar['nesne_IDbirimTipi'],'metin1','nesne');
							$doviz = z(1,$aksesuar['nesne_IDdoviz'],'metin1','nesne');	
													
						?>
							<tr>
							<td class='renktd'><a href="?s=aksesuarkarti&a=detay&id=<?php echo $vt_aksesuarkarti[$key]['ID']; ?>"><?php echo $aksesuar['renkKodu'];?></a></td>
							<td class='renktd'><a href="?s=nesne&dznl=aksesuargruplari"><?php echo $aksesuargrubu;?></a></td>
							<td class='renktd'><a href="?s=aksesuarkarti&a=detay&id=<?php echo $vt_aksesuarkarti[$key]['ID']; ?>"><?php echo $birim;?></a></td>							
							<td class='renktd'><a href="?s=aksesuarkarti&a=detay&id=<?php echo $vt_aksesuarkarti[$key]['ID']; ?>"><?php echo $doviz;?></a></td>							
							<td class='renktd'><a href="?s=aksesuarkarti&a=detay&id=<?php echo $vt_aksesuarkarti[$key]['ID']; ?>"><?php echo $aksesuar['fiyat'];?></a></td>							
							</tr>
						<?php } ?>

						</table>

						<!-- </div> -->
						</div>
		<?php } ?>


<br>

			<?php
					$idcek=z(8,'id');
					$resim='';
					if(!empty($idcek)){
					$resim=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$idcek),'ID,img','galeri');
					}
					?>
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
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>

		
<script>
function tabloGoster(){
	$(".dtyaciklamaModal2").css('display','none');
	$(".dtyaciklamaModal").css('display','block');
}

$( ".close" ).click(function() {
	$(".dtyaciklamaModal").css('display','none');
});

function tabloGoster2(){
	$(".dtyaciklamaModal").css('display','none');
	$(".dtyaciklamaModal2").css('display','block');
}
$( ".close" ).click(function() {
	$(".dtyaciklamaModal2").css('display','none');
});

function yazdir(){
	var old = $(".tasiyici").clone();
		$(".renkbaslik").remove();
		$(".aksesuarbaslik").remove();
		 $('.modal-content:first').css('margin-top','-50px');
		var clonetasiyici = $('.tasiyici');	
		var clonemodal = $('.modal-content');

		$(".yazici").append(clonetasiyici);		
		$(".yazici").append(clonemodal);
		$(".gerigit").css("display","block");
		$(".icon-printer2").css("display","none");
		$(".close").css("display","none");
		$(".tasiyici a").remove();


}

function geri(){
	location.reload();
}
//  $( document ).ready(function() {
// 	 //$(".clone-content").css("display","show");
// 	$(".renkbaslik").remove();
// 		$(".aksesuarbaslik").remove();
// 	// 	$(".tasiyici a").remove();

// 		var clonetasiyici = $('.tasiyici').clone();	
// 		var clonemodal = $('.modal-content');

// 		$(".tasiyici .formduzenleme:first").before(clonemodal);
// 		var cloneall = $('.tasiyici');
// 		// $('.tasiyici').css('display','none');

// 		$('.clone-content').css('display','block');
// 		$('.modal-content').css('width','300%');
// 		$('.modal-content').css('margin-left','50px');
// 		$('.formduzenleme').css('margin-top','15px');
// 		$('.formduzenleme').css('margin-left','50px');


// 		$('.clone-content').append(cloneall);
// });

</script>