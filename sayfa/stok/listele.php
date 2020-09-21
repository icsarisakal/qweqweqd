<?Php
unset($_NSN);
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
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
            <col /><col /><col /><col /><col /><col /><col /><col /><col /><col width="130" />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
            <?Php if($admn||ytk($syf,'arsivle')){?><col width="58" /><?Php }?>
            <?Php if($admn||ytk($syf,'sil')){?><col width="32" /><?Php }?>
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
            	$_LA=z(7,'la'.$syf);
				if(empty($_LA)){
					if($araHA&&z(11,'la'.$syf)){
						$_LA=z(11,'la'.$syf);
					}
				}
			?>

            <?php filtreTh('adet') ?>
            <?php filtreTh('text','ID') ?>
            <?php filtreTh('select','dokumastok','','ID,ID') ?>
            <?php filtreTh('select','hamkumasstok','','ID,kumasIsmi,numuneIsmi') ?>
            <?php filtreTh('text','lotNo') ?>
            <?php filtreTh('text','metraj') ?>
            <?php filtreTh('selectNesne','kalite') ?>
            <?php filtreTh('selectNesne','kompozisyon') ?>
            <?php filtreTh('selectNesne','orguTipi') ?>
            <?php filtreTh('text','enHam') ?>
            <?php filtreTh('text','hamGramaj') ?>
            <?php filtreTh('selectNesne','dokumaSalonu') ?>
            <?php filtreTh('text','dokSalTopNo') ?>
            <?php filtreTh('tarih','tarihSonHareket') ?>
            <?php /*/ ?>
            <?php filtreTh('text','notlar') ?>
            <?php /*/ ?>



            <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?php }?>
            <?php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?php }?>
            </tr>
            <tr>
            	<th class="printx"><input class="tumunuSec" type="checkbox"></th>
            	<th>NO</th>
            	<th>TOP NO</th>
            	<th>PARTİ NO</th>
            	<th>KUMAŞ KALİTESİ</th>
            	<th>LOT NO</th>
            	<th>METRAJ</th>
            	<th>KALİTE</th>
            	<th>KOMPOZİSYON</th>
            	<th>ÖRGÜ TİPİ</th>
            	<th>HAM EN</th>
            	<th>HAM GR</th>
            	<th>DOKUMA SALONU</th>
            	<th>DOKUMA SALONU TOP NO</th>

            	<th>TARİH</th>
            <?php /*/ ?>
                <th>AÇIKLAMA</th>
            <?php /*/ ?>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>

                <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">ARŞİVLE</th><?Php }?>
                <?php if($admn||ytk($syf,'sil')){?><th class="printx">SİL</th><?Php }?>
            </tr>

            <?php if($dznA){ ?><tr><th class="printx" colspan="<?php echo ($sayfaTipi!='duzenle'?18:17) ?>"><input type="submit" value="TÜMÜNÜ KAYDET"></th></tr><?php } else { ?>
            <?php } ?>
        </thead>


        <tbody id="tbody">
			<?Php require('sayfa/'.$tbl.'/listele_prc.php'); ?>
        </tbody>

        <?php listeleTfoot(17); ?>

    </table>
    </form>
    </div>
</div>
<?php filtreTh('ajaxAraJs') ?>
