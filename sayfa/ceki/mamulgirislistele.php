<?Php
unset($_NSN);
if(z(8,'idx2')){
    require(__DIR__.'/sil.php');
}
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
		case 1:_uyr(1,'Yeni çeki listesi başarıyla oluşturuldu.');break;
	}switch(z(33,'arsivle')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşive taşındı.');break;
		case 101:_uyr(2,'Arşive gönderme işlemi için yeterli yetkiniz yok.');break;
	}switch(z(33,'arsivac')){
		case 1:_uyr(1,'Seçili girdiler başarıyla arşivden çıkartıldı ve ana listeye taşındı.');break;
	}?>
	<form action="" method="post" id="topluIslemForm">
    <table cellpadding="0" cellspacing="0" border="0">
        <colgroup>
            <col width="28" /><col width="28" /><col width="90" /><col /><col /><col /><col /><col /><col /><col />

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


            <?php filtreTh('text','ID') ?>
            
            <?php /*/ ?>
			<th><select id="araDurum" class="ara"><option value="">&nbsp;</option><?Php if(!empty($_CkDrm))foreach($_CkDrm as $fei=>$fed){?><option value="<?Php echo $fei?>" <?Php if(!empty($_Ara['durum']))echo $_Ara['durum']===$fei?'selected':''?>><?Php echo $fed[1]?></option><?Php }?></select></th>
            <?php /*/ ?>
            
            <?php filtreTh('text','aciklama') ?>
            <?php filtreTh('text','girisAdi') ?>
            <?php filtreTh('text','cikisAdi') ?>
            <?php filtreTh('select','mamulkumasstok','','ID,ad,numuneAdi') ?>
            <?php filtreTh('sayi','top1K') ?>
            <?php filtreTh('sayi','top1A') ?>
            <?php filtreTh('sayi','top2K') ?>
            <?php filtreTh('text','boyahanePartiNo') ?>



            <?php filtreTh('select','personel','','ID,ad',"WHERE ID<>'81'") ?>
            <?php filtreTh('tarih','tarihIslem') ?>
            <?Php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?Php }?>
            <?Php if($admn||ytk($tbl,'sil')){?><th>&nbsp;</th><?Php }?>
            </tr>
            <tr>
            	<th class="printx"><input class="tumunuSec" type="checkbox"></th><th>NO</th><th>ÇEKİ NO</th>
                <th>GİRİŞ</th>
                <th>AÇIKLAMA</th>
                <th>Boyahane Parti No</th>
                <th>AÇIKLAMA</th>
                <th>KUMAŞ KALİTESİ</th>
                <th>1. Kalite</th>
                <th>1-A Kalitesi</th>
                <th>2. Kalite</th>
                <th>EKLEYEN</th>
                <th>TARİH</th>
				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                <?Php if($admn||ytk($syf,'arsivle')){?><th class="printx">ARŞİVLE</th><?Php }?>
                <?Php if($admn||ytk($tbl,'sil')){?><th class="printx">SİL</th><?Php }?>
            </tr>
        </thead>
        <tbody id="tbody">
			<?Php require('sayfa/'.$tbl.'/mamulgirislistele_prc.php'); ?>
        </tbody>
        <?php listeleTfoot(15,1,array('cokluIslem'=>array(
            'ceki_topluetiket'=>"Seçilileri Etiket Yazdırmaya Hazırla"
        ))); ?>

    </table>
    </form>
    </div>
</div>
<?php filtreTh('ajaxAraJs',array('dosya'=>'mamulgirislistele_ajx.php')) ?>
<?php require(__DIR__.'/../../parca/aktifduzenle.php'); ?>
