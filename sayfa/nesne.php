<?Php if(z('lgn','admin')||ytk(z(8,'s'),'listele')){
require(__DIR__.'/nesne/ayar.php');
require(__DIR__.'/nesne/yonet_prc.php');
// Nesne Oku
$_X=z(1,"ORDER BY metin1 ASC",NULL,$tbl);if(!empty($_X))foreach($_X as $x)$_Y[$x['ad']][$x['ID']]=$x;
?>
<style type="text/css">
.blok .baslik:first-child{
    text-align: center;
    cursor:pointer; padding: 2em 1em; background-image: url(img/h50bg.png); background-repeat:repeat-x;
    transition: all 1s;
}
.blok .baslik:first-child:hover{
    background-color:green;
}
.blok .baslik:first-child:active{
    background-image: url(img/h50bg3.png); background-repeat:repeat-x;
}
.blok .icerik{display: none;}
.blok .icerik.goster{display: block;}
.yeni-tr td{ background-color:#0f0; font-size: 18px; padding: 0.4em; }
table td{font-size:8pt;padding:1px;}
@media only screen and (max-width: 500px) {
    .blok {
        display: block;
    }
}
</style>
<div class="sayfa">
    <div class="baslik"><h2>Nesneler</h2></div>
    <div class="icerik">
    <?Php switch(z(33,'ekle')){
		case 1:_uyr(1,'Ekleme başarılı.');break;
		case 2:_uyr(2,'Lütfen alanları kontrol ediniz.');break;
		}switch(z(33,'guncelle')){
		case 1:_uyr(1,'Güncelleme başarılı.');break;
		case 2:_uyr(2,'Girdilerin bazıları güncellenemedi.');break;
		}switch(z(33,'sil')){
		case 1:_uyr(1,'Silme işlemi başarılı.');break;
	}?>
	<?Php foreach($_NSN as $ad=>$n){?>
    <?Php
        $ekleA=z(8,'ekle')==$ad;
        $dznlA=z(8,'dznl')==$ad;
        $gstrA=z(8,'goster')==$ad;
        $gstrID=z(8,'id','sayi');
    ?>
    <div class="blok">
        <div class="baslik"><h3><?Php echo $n['ad']?></h3></div>
        <div class="icerik <?php echo !empty($gstrA)||!empty($ekleA)||!empty($dznlA)?'goster':'' ?>">
            <?Php if($dznlA){?>
            <form action="" method="post">
            <?Php }?>
            <table cellpadding="0" cellspacing="0" border="0">
            <thead><tr><th>Sıra</th><?Php foreach($n['alan'] as $fei=>$fed)echo '<th>'.$fed.'</th>';?><th class="printx">Sil</th></tr></thead>
            <tbody>
                <?Php
                if(!empty($_Y[$ad])){$i=0;
                foreach($_Y[$ad] as $ID=>$y){
                    $i++;
                        echo '<tr '.($y['ID']==$gstrID?'class="yeni-tr"':'').'><td>'.$i.'</td>';
                    if($dznlA==false){
						foreach($n['alan'] as $fei=>$fed){
							if(strpos($fei,'metin')!==false)$x=isset($y[$fei])?$y[$fei]:'&nbsp;';
							else $x=isset($y[$fei])?sayi($y[$fei],2):0;
							echo '<td>'.$x.'</td>';
						}
                    }
                    else{
						foreach($n['alan'] as $fei=>$fed){
							if(strpos($fei,'metin')!==false)$x=isset($y[$fei])?$y[$fei]:'&nbsp;';
							else $x=isset($y[$fei])?sayi($y[$fei],2):0;
							echo '<td><input type="text" autofocus name="'.$tbl.'['.$y['ID'].']['.$fei.']" tabindex="1" value="'.$x.'" /></td>';
						}
                    }
					echo '<td class="printx"><a href="?s='.$tbl.'&idx='.$ID.'" onClick="return confirm(\'Silmek istediğinizden emin misiniz?\');">x</a></td>';
					echo '</tr>';
                }
                }?>
            <?Php if($dznlA){?>
            <tr><th colspan="<?Php echo count($n['alan'])+2?>"><div style="text-align:center"><a href="?s=<?Php echo $tbl?>&goster=<?php echo $ad; ?>" class="btn2" style="display:inline-block">Vazgeç</a><input type="submit" value="KAYDET" /></div></th></tr>
            <?Php }else if($ekleA){?>
            <tr><th colspan="<?Php echo count($n['alan'])+2?>">
                <form action="" method="post">
                    <table cellpadding="0" cellspacing="0">
                    <?Php foreach($_NSN[z(8,'ekle')]['alan'] as $fei=>$fed){
                        echo '<tr><th>'.$fed.'</th><td><input type="text" autofocus name="'.$tbl.'['.$fei.']" tabindex="1"/></td></tr>';
                   }?>
                        <tr><th colspan="2" align="center"><a href="?s=<?Php echo $tbl?>&goster=<?php echo $ad; ?>" class="btn2" style="display:inline-block">Vazgeç</a><input type="submit" value="KAYDET" tabindex="1" /></th></tr>
                    </table>
                </form>
            </th></tr>
            <?Php }else{?>
            <tr class="printx"><th colspan="<?Php echo count($n['alan'])+2?>"><a href="?s=<?Php echo $tbl?>&dznl=<?Php echo $ad?>" class="btn2" style="display:inline-block">DÜZENLE</a> <a href="?s=<?Php echo $tbl?>&ekle=<?Php echo $ad?>" class="btn2" style="display:inline-block">EKLE</a></th></tr>
            <?Php }?>
            </tbody>
            </table>
            <?Php if($dznlA){?>
            </form>
            <?Php }?>
        </div>
    </div>
<?Php }?>
</div></div>


<script type="text/javascript">
    $(document).ready(function(){
        $('.blok .baslik').click(function(){
            $(this).parent('.blok').children('.icerik').slideToggle();
        });
    });
</script>
<?Php }	else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>