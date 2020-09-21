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
    }
</style>
<?php 
$id=z(8,'id');
//z('git','?s='.$tbl.'&a=duzenle&id='.$id);
$vt=z(1,$id,'',$tbl);
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='rehberGrup' OR ad='tedarikciTipi' OR ad='cariTipi' OR ad='iplikMarka'",'ID,ad,metin1,metin2','nesne'));
?>
<?php if(!empty($vt)&&$vt['arsiv']!='-1'){ ?>
	<div class="dtysayfa">
		<div class="tasiyici">
			<div class="tasiyici1">
					<?php if(!empty($vt['ad'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Adı</div>
						<div class="dtyaciklama"><?php if(!empty($vt['ad'])){ echo $vt['ad']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['unvan'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Ünvanı</div>
						<div class="dtyaciklama"><?php if(!empty($vt['unvan'])){ echo $vt['unvan']; } ?></div>
					<?php } ?>

					<?php if(!empty($vt['cinsiyet'])){  ?>
						<div class="dtyborder dtybaslik2">Cinsiyeti</div>
						<div class="dtyaciklama"><?php if(!empty($vt['cinsiyet'])){ if($vt['cinsiyet']=='1'){ echo 'Erkek'; } if($vt['cinsiyet']=='2'){ echo 'Kadın'; } } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['telCep1'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Telefonu</div>
						<div class="dtyaciklama"><?php if(!empty($vt['telCep1'])){ echo $vt['telCep1']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['telCep2'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Telefonu 2</div>
						<div class="dtyaciklama"><?php if(!empty($vt['telCep2'])){ echo $vt['telCep2']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['telSabit'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Sabit Telefonu</div>
						<div class="dtyaciklama"><?php if(!empty($vt['telSabit'])){ echo $vt['telSabit']; } ?></div>
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

                    

                   


					<?php if(!empty($vt['personel_ID'])){ 
						$personelcek=z(1,$vt['personel_ID'],'','personel'); ?>
						<div class="dtyborder dtybaslik2">EKLEYEN PERSONEL</div>
						<div class="dtyaciklama"><?php if(!empty($personelcek['ad'])){ echo $personelcek['ad'].' '; } if(!empty($personelcek['soyad'])){ echo $personelcek['soyad']; } ?></div>
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
                <?php if(!empty($vt['eposta'])){  ?>
						<div class="dtyborder dtybaslik2">Cari E-posta Adresi</div>
						<div class="dtyaciklama"><?php if(!empty($vt['eposta'])){ echo $vt['eposta']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['adres'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Adresi</div>
						<div class="dtyaciklama"><?php if(!empty($vt['adres'])){ echo $vt['adres']; } ?></div>
					<?php } ?>

                    <?php if(!empty($vt['aciklama'])){  ?>
						<div class="dtyborder dtybaslik2">Cari Açıklaması</div>
						<div class="dtyaciklama"><?php if(!empty($vt['aciklama'])){ echo $vt['aciklama']; } ?></div>
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
			</div>
		</div>
		<?php } else { echo '<h1>Seçilen detay silindiği için bu veri görüntülenemiyor.</h1>'; } ?>


        