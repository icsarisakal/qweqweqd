<style type="text/css">
    <?php 
        $_NesneDurum=z(37,z(1,"WHERE ad='gelirGiderDurum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
        if(!empty($_NesneDurum))foreach ($_NesneDurum as $nesneDurum) {
            echo 'tr.durum_'.$nesneDurum['sayi1'].' td{ background-color: '.$nesneDurum['metin1'].'; }';
        } 
    ?>
</style>

<?php
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
//$dznA=z(8,'duzenle') && ($admn||ytk($tbl,'duzenle')); 
?>
<?php 
    // Hepsini Kaydet
    $_IpliknoP=z(7,$tbl);
    if(!empty($_IpliknoP)){
        z(6,$tbl);
        $dbsrm=0;
        foreach ($_IpliknoP as $fei => $fev) {
            if(z(3,$fei,$fev)){
                $dbsrm++;
            }
        }

        if($dbsrm==count($_IpliknoP)){
            z(33,'duzenle',1);
        }
        else if($dbsrm>1){
            z(33,'duzenle',2);
        }
        else{
            z(33,'duzenle',-1);
        }
        z('git','?s='.$syf.'&a=listele');

    }

?>

<div class="sayfa">
    <div class="icerik">
    <?php switch(z(33,'sil')){
		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}?>
	<?php switch(z(33,'ekle')){
		case 1:_uyr(1,'Ekleme işlemi başarıyla gerçekleştirildi.');break;
	}?>
    <?php switch(z(33,'duzenle')){
        case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
        case 2:_uyr(2,'Bazı alanlar kaydolamadı tütfen tüm girdileri kontrol ediniz.');break;
        case 3:_uyr(2,'<strong>'.(!empty($_XAd)?$_XAd:'').'</strong> daha önceden kaydedilmiş. Lütfen kontrol ediniz veya başka bir isim kullanınız.');break;
    }?>

	<form action="" method="post" id="topluIslemForm">
    <table cellpadding="0" cellspacing="0" border="0">


        <colgroup>
            <col width="28" /><col width="28" />
             <?php foreach ($_Th as $th) if($th['tip']!='adet'){ ?>
                <col <?php echo !empty($th['genislik']) ?'width="'.$th['genislik'].'"':''; ?> />
            <?php } ?>

            <?php if($admn||ytk($syf,'arsivle')){?><col width="58" /><?php }?>
            <?php if($admn||ytk($syf,'sil')){?><col width="32" /><?php }?>
        </colgroup>


        <thead>


            

        	<tr class="printx">
                <?php
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

                <?php // bu modülün ayar.php si içerisinde doldurulmuş olan $_Th dizisinin içeriğini sırasıyla filtreTh fonksiyonuna gönderir ve filtreleme imputlarını türetir ?>
                <?php foreach ($_Th as $th){ ?>
                    <?php // filtreTh() fonksiyonu fonk.php içerisinde bulunan filtreleme imputlarını ekrana basan genel bir fonksiyondur ?>
                    <?php // Not: Ne yaptığınızdan emin değil iseniz kesinlikle fonk.php dosyasını editlemeyiniz. ?>
                    <?php filtreTh($th['tip'], $th['sutunAdi'], $th['deger'], $th['iliskiliSutunAdlari'], $th['sorguDetay']) ?>
                <?php } ?>


                <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?php }?>
                <?php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?php }?>
            </tr>


            <tr>

                <?php foreach ($_Th as $th){ ?>
                    <?php echo $th['thIcerigi'] ?>
                <?php } ?>
                
                <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">ARŞİVLE</th><?php }?>
                <?php if($admn||ytk($syf,'sil')){?><th class="printx">SİL</th><?php }?>
            </tr>

            <?php if($dznA){ ?><tr><th class="printx" colspan="<?php echo $tFootC ?>"><input type="submit" value="TÜMÜNÜ KAYDET"></th></tr><?php } else { ?>
            <?php } ?>
        </thead>


        <tbody id="tbody">
			<?php require('sayfa/'.$tbl.'/listele_prc.php'); ?>
        </tbody>


        <?php if($dznA){ ?>
            <tbody>
                <tr><th class="printx" colspan="<?php echo $tFootC ?>"><input type="submit" value="TÜMÜNÜ KAYDET"></th></tr>
            </tbody>
        <?php } else { ?>
            <?php listeleTfoot($tFootC); ?>
        <?php } ?>


    </table>
    </form>
    </div>
</div>


<?php filtreTh('ajaxAraJs') ?>


<!-- AÇILIR ANA EKLEME FORMU -->
<form action="?s=<?php echo $syf ?>&a=ekle" method="post" id="<?php echo $syf ?>_ekle" style="display: none;">
    <div class="blok">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th colspan="2">YENİ GİRDİ EKLE</th>
                </tr>
                <?php require(__DIR__.'/ekle_prc.php'); ?>

            </tbody>
        </table>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".ekle_ajxbtn").click(function(){
        pencereAc('#<?php echo $syf ?>_ekle');
    });
});
</script>
<!-- AÇILIR ANA EKLEME FORMU SON -->

<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI -->
<?php if(!empty($hizliEkleForm)) foreach ($hizliEkleForm as $hef) {
    if(file_exists(__DIR__.'/../'.$hef.'/hizli-ekle-form.php')){
        $formAdi=$hef;
        require(__DIR__.'/../'.$hef.'/hizli-ekle-form.php'); 
    }
}?>
<!-- AYARDAN İSTENEN AÇILIR EKLEME FORMLARI SON -->


<!-- AÇILIR NESNE EKLEME FORMU -->
<?php require(__DIR__.'/../../parca/nesne-hizli-ekle-form.php'); ?>
<!-- AÇILIR NESNE EKLEME FORMU SON -->
