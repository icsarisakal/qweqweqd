<?Php
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
//if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
if(z(8,'id','sayi') && z(8,'drm','sayi')){
    z(6,$tbl);
    $drm=z(8,'drm','sayi');
    z(3,z(8,'id','sayi'),'durum',$drm==-1?0:$drm);
}
require(__DIR__.'/style.php');

$arsvA=strpos(z(8,'a'),'_arsv')!==false;
?>

<div class="sayfa">
    <div class="icerik">
    <?Php switch(z(33,'sil')){
		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
	}?>
	<?Php switch(z(33,'ekle')){
		case 1:_uyr(1,'Ekleme işlemi başarıyla gerçekleştirildi.');break;
	}?>
	


    <ul class="notlar">
        <?php if($arsvA==false){ ?>
        <li>
            <form action="?s=notlar&a=ekle" method="post" class="nt-form">
                <div>
                    <div class="nt-form-sol"><textarea name="notlar[metin]" placeholder="Notunuzu Buradan Bırakınız" required="required"></textarea></div><div class="nt-form-sag"><input type="submit" value="KAYDET"></div>
                </div>
                <input type="hidden" name="git1" value="?s=<?Php echo $tbl?>&a=<?php _z(8,'a'); ?>" />
            </form>
        </li>
        <?php } ?>
        <?php
            $arsvsd=$arsvA?"arsiv='".substr(z(8,'a'),-1)."'":"arsiv='0'";

            $_Notlar=z(1,"WHERE ".$arsvsd." ORDER BY ID DESC",'','notlar');
        ?>

        <?php if(!empty($_Notlar))foreach ($_Notlar as $notlar) { ?>
        <li class="nt-drm-<?php echo $notlar['durum']; ?>">
            <div class="nt-container">
                <div class="nt-metin"><?php echo $notlar['metin'] ?></div>
                <div class="nt-durumcubugu">
                    <?php if($notlar['durum']==0){ ?>
                    <a href="?s=notlar&a=<?php _z(8,'a'); ?>&drm=1&id=<?php echo $notlar['ID'] ?>" class="nt-drm-btn nt-drm-btn-0">Tamamlandı Olarak İşaretle</a>
                    <?php }else if($notlar['durum']==1){ ?>
                    <a href="?s=notlar&a=<?php _z(8,'a'); ?>&drm=-1&id=<?php echo $notlar['ID'] ?>" class="nt-drm-btn nt-drm-btn-1">Tamamlandı</a>
                    <?php } ?>
                    <?php if($notlar['arsiv']==0){ ?>
                    <a href="?s=notlar&a=<?php _z(8,'a'); ?>&ida1=<?php echo $notlar['ID'] ?>" class="nt-drm-btn nt-drm-btn-2">Arşive Taşı</a>
                    <?php }else if($notlar['arsiv']==1){ ?>
                    <a href="?s=notlar&a=<?php _z(8,'a'); ?>&ida0=<?php echo $notlar['ID'] ?>" class="nt-drm-btn nt-drm-btn-4">Arşivden Çıkar</a>
                    <a href="?s=notlar&a=<?php _z(8,'a'); ?>&idx=<?php echo $notlar['ID'] ?>" onclick="return confirm('Kalıcı olarak silmek istediğinizden emin misiniz?')" class="nt-drm-btn nt-drm-btn-3">Sil</a>
                    <?php } ?>

                </div>
            </div>
        </li>
        <?php } ?>

        <?php /*for($i=1;$i<=10;$i++){ ?>
        <li class="nt-drm-0">
            <div class="nt-container">
                <div class="nt-metin"><?php echo $i ?>. Not metni asadasa asasdsadsad nmnnm</div>
                <div class="nt-durumcubugu">
                    <a href="?s=notlar&a=listele&drm=0&id=#" class="nt-drm-btn nt-drm-btn-0">Tamamlanmadı</a>
                    <a href="?s=notlar&a=listele&drm=1&id=#" class="nt-drm-btn nt-drm-btn-1">İşleme Alındı</a>
                    <a href="?s=notlar&a=listele&drm=2&id=#" class="nt-drm-btn nt-drm-btn-2">Tamamlandı</a>
                    <a href="?s=notlar&a=listele&drm=3&id=#" class="nt-drm-btn nt-drm-btn-3">İptal Edildi</a>
                </div>
            </div>
        </li>
        <?php }*/ ?>

        
    </ul>


    </div>
</div>
