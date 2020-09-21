<?Php $_Dosya=z(1,"WHERE nesne='".$tbl."' AND nesneID='".$ID."'",NULL,'dosya');if(!empty($_Dosya)){?>
<div class="baslik"><h3>Fotoğraflar (<?Php echo count($_Dosya)?> Adet)</h3></div>
<div class="icerik ortala galeri">
    <?Php foreach($_Dosya as $d){?>
    <div class="blok" style="background:#ccc url(img/h30bg.png); border-radius:4px;">
    <?Php //<div style="text-align:right"><b><a href="?s=dosya&a=sil&id=#">sil</a></b></div>?>
    <a href="upload/<?Php echo $d['name']?>" target="new" class="img"><img src="upload/<?Php echo $d['name']?>" height="100" /></a>
    </div>
    <?Php }?>
</div>
<script type="text/javascript">$(document).ready(galeriYukle);</script>
<?Php }?>