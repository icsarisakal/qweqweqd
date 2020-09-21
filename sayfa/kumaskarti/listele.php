<style type="text/css">
    <?php 
        $_NesneDurum=z(37,z(1,"WHERE ad='durum'",'ID,ad,sayi1,metin1,metin2','nesne'),'sayi1');
        if(!empty($_NesneDurum))foreach ($_NesneDurum as $nesneDurum) {
            echo 'tr.durum_'.$nesneDurum['sayi1'].' td{ background-color: '.$nesneDurum['metin1'].'; }';
        } 
    ?>
</style>
<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  overflow:scroll;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  overflow:hidden;
  width: 70%;
  left: 5%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
}

</style>

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
if(z(8,'idx'))require(__DIR__.'/../../parca/sil.php');
if(z(8,'ida1')||z(8,'ida0'))require(__DIR__.'/../../parca/arsiv.php');
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
//$dznA=z(8,'duzenle') && ($admn||ytk($tbl,'duzenle')); 
$ytkDty=ytk($tbl,'detay');
?>
<?php 
    // Hepsini Kaydet
    $_IpliknoP=z(7,$tbl);
    if(!empty($_IpliknoP)){
        z(6,$tbl);
        $dbsrm=0;
        foreach ($_IpliknoP as $fei => $fev) {
            $veritabanifiyat=z(1,$fei,'ID,fiyat,nesne_IDdoviz',$tbl);
            $vtfiyat=(!empty($veritabanifiyat['fiyat'])?z(36,$veritabanifiyat['fiyat'],0):'');
            $pstfiyat=(!empty($fev['fiyat'])?z(36,$fev['fiyat'],0):'');
            $fev['fiyat']=z(36,$fev['fiyat']);
            if(z(3,$fei,$fev)){
                if($vtfiyat!=$pstfiyat){
                    $fyt=array();
					$fyt['personel_ID']=z('lgn','ID');
					$fyt['tarih']=z('datetime');
					$fyt['modul']=$tbl;
					$fyt['modul_ID']=$fei;
					$fyt['fiyat']=(!empty($fev['fiyat'])?z(36,$fev['fiyat'],0):'0');
					$fyt['nesne_IDdoviz']=(!empty($veritabanifiyat['nesne_IDdoviz'])?$veritabanifiyat['nesne_IDdoviz']:'0');
					if(!empty($fyt)){
						z(2,$fyt,'fiyatarsiv');
					}
                }
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


<!-- Page header -->
<div class="page-header page-header-light mb-3">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="./?s=<?php echo $sayfayiyakala1s; ?>&a=listele" class="breadcrumb-item"><i class="icon-home2 mr-2"></i><?php echo $anamoduladi; ?></a>
                <span class="breadcrumb-item active"><?php echo $yanmoduladi; ?></span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>

                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        Settings
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    
</div>
<!-- /page header -->

<div class="content pt-0">
    
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive">
    
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
    <table cellpadding="0" cellspacing="0" border="0" class="table text-nowrap">


        <colgroup>
            <col width="28" /><col width="28" />
             <?php foreach ($_Th as $th) if($th['tip']!='adet'){ ?>
                <col <?php echo !empty($th['genislik']) ?'width="'.$th['genislik'].'"':''; ?> />
            <?php } ?>

            <?php if($admn||ytk($syf,'arsivle')){?><col width="58" /><?php }?>
            <?php if('1'=='2'&&$admn||ytk($syf,'sil')){?><col width="32" /><?php }?>
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
                    <?php
                    $yetkikontrol=1;
                    if(empty($ytkFyt)&&$th['sutunAdi']=='fiyatlar'){
                        $yetkikontrol=2;
                    }
                    if(empty($ytkFyt)&&$th['sutunAdi']=='doviz'){
                        $yetkikontrol=2;
                    }
                    ?>
                    <?php filtreTh($th['tip'], $th['sutunAdi'], $th['deger'], $th['iliskiliSutunAdlari'], $th['sorguDetay']) ?>
                <?php } ?>


                <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">&nbsp;</th><?php }?>
            </tr>


            <tr>

                <?php foreach ($_Th as $th){ ?>
                    <?php echo $th['thIcerigi'] ?>
                <?php } ?>
                
                <?php if($admn||ytk($syf,'arsivle')){?><th class="printx">İŞLEMLER</th><?php }?>
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
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="dtysayfa printx">
                        <div class="tasiyici">
                            <div class="tasiyici1">
                                <div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ KODU / FABRİC CODE : <b class="tikladtykumaskodu"></b></div>
                                <div class="dtyborder dtybaslik2" style="margin-bottom:5px;">KUMAŞ İSMİ / FABRIC NAME : <b class="tikladtykumasismi"></b></div>
                                <div class="dtyborder dtybaslik2" style="margin-bottom:5px;">YAZI / ARTİCLE : <b class="tikladtyarticle"></b></div>
                            </div>
                            <div class="tasiyici2" style="padding-top: 8px;">
                            <div class="dtyborder dtybaslik2" style="margin-bottom:5px;">PUS / FAYN : <b class="tikladtypusvefayn"></b></div>
                            </div>
                            <div class="divblock">
                                <div class="dtyborder">GALERİ / GALLERY</div>
                            </div>
                            <div class="tikladtygaleriust">
                                <div class="tikladtygaleri">
                                    <div class="mys2010-gallery">
                                    <ul id="lightgallery" class="resmiburayaaktar"><span class="spanisim2" style="overflow: hidden;text-align: justify;padding: 10px;cursor: pointer;width: 180px;">KYT-010.jpg</span><li data-responsive="upload/kumaskarti/KYT-010.jpg  480" data-src="upload/kumaskarti/KYT-010.jpg " data-sub-html="<h4>MY LOGO</h4>"><a href="#"><img class="img-responsive" src="upload/kumaskarti/KYT-010.jpg" style="width: 175px;height: 200px;"></a></li></ul>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <p style="height:80%;display:none;">Resim Yükleniyor</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->


<?php filtreTh('ajaxAraJs') ?>


<!-- AÇILIR ANA EKLEME FORMU -->
<form action="?s=<?php echo $syf ?>&a=ekle" method="post" id="<?php echo $syf ?>_ekle" style="display: none;">
    <div class="blok">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th colspan="2">YENİ GİRDİ EKLE</th>
                </tr>
                <?php //require(__DIR__.'/ekle_prc.php'); ?>

            </tbody>
        </table>
    </div>
</form>



<script>

function tiklagelsin(ths){
    var tiklaid=$(ths)[0];
    var ytkdurum="1";
    <?php if(!empty($ytkDty)||!empty($admn)){ ?>
    ytkdurum="2";
    <?php } ?>
    console.log(ytkdurum);
    $.ajax({
        type:"POST",
        url:"ajaxayar.php?s=kumaskarti&a=ajaxsorgu2&resim="+tiklaid+"&ytkdurum="+ytkdurum,
        success:function(gelensorgu){
            var resim=gelensorgu.cevap.resim;
            var kumasvt=gelensorgu.cevap.kumasvt;
            var kumasvtkumaskodu=gelensorgu.cevap.kumasvt.kodu;
            var kumasvtkumasismi=gelensorgu.cevap.kumasvt.ismi;
            var kumasvtarticle=gelensorgu.cevap.kumasvt.article;
            var pusvefaynmetniyeni=gelensorgu.cevap.pusvefaynmetniyeni;
            if(resim!=null){
                $("#myModal").show();
                var resimolustur='';
                var resimolustur2='';
                console.log("resim");
                $.each(resim, function(k, v) {
                    resimolustur=resimolustur+'<div class="resimler" style="padding:10px;float:left;width:200px;height:200px;cursor:pointer;"><span class="spanisim2">'+v.img+'</span><img data-fancybox="gallery1" href="upload/kumaskarti/'+v.img+'" src="upload/kumaskarti/'+v.img+'" style="width:100%;height:100%;"></div>';
                    resimolustur2=resimolustur2+'<span class="spanisim2" style="overflow: hidden;text-align: justify;padding: 10px;cursor: pointer;width: 180px;">'+v.img+'</span><li data-responsive="upload/kumaskarti/'+v.img+'  480" data-src="upload/kumaskarti/'+v.img+' " data-sub-html="<h4>MY LOGO</h4>"><a href="#"><img class="img-responsive" src="upload/kumaskarti/'+v.img+'" style="width: 175px;height: 200px;"></a></li>';
                });
            $(".tikladtygaleri").html(resimolustur);
            //$(".resmiburayaaktar").html(resimolustur2);
            //$('#lightgallery').lightGallery();
            } else{
                alert('Resim bulunamadı resim yükleyin');
                $(".resmiburayaaktar").html("Resim Yükleniyor..");
            }

            if(ytkdurum=='2'){
                if(kumasvtkumaskodu!=null){
                    $(".tikladtykumaskodu").html(kumasvtkumaskodu);
                } else {
                    $(".tikladtykumaskodu").html("");
                }
                if(kumasvtkumasismi!=null){
                    $(".tikladtykumasismi").html(kumasvtkumasismi);
                } else {
                    $(".tikladtykumasismi").html("");
                }
                
                if(kumasvtarticle!=null){
                    $(".tikladtyarticle").html(kumasvtarticle);
                } else {
                    $(".tikladtyarticle").html("");
                }

                if(pusvefaynmetniyeni!=null){
                    $(".tikladtypusvefayn").html('<br>'+pusvefaynmetniyeni);
                } else {
                    $(".tikladtypusvefayn").html("");
                }
            }
            
        }
    });
}

$(".close").click(function(){
    $("#myModal").hide();
});

$(document).click(function(e) {
    if (!$(e.target).is('.icongaleri, .icongaleri, .fancybox-button, .fancybox-button, .fancybox-button div, .fancybox-button div, .fancybox-button svg, .fancybox-button svg, .fancybox-container, .fancybox-container, .fancybox-bg, .fancybox-bg, .fancybox-inner, .fancybox-inner, .fancybox-infobar, .fancybox-infobar, .fancybox-stage, .fancybox-stage, .fancybox-slide, .fancybox-slide, .fancybox-content, .fancybox-content, .spanisim2, .spanisim2, .tikladtygaleriust, .tikladtygaleriust, .tikladtygaleri, .tikladtygaleri, b, b, .modal-content, .modal-content, .fancybox-slide, .fancybox-slide, .resimler, .resimler, .fancybox-image, .fancybox-image, img, img, p, p, .dtysayfa, .dtysayfa .tasiyici, .tasiyici, .tasiyici1, .tasiyici1, .tasiyici2, .tasiyici2, .dtyborder, dtyborder, .dtybaslik2, .dtybaslik2, .divblock, .divblock *')) {
        $(".modal").hide();
    }
});

/*
$(document).mouseover(function(e) {
    if (!$(e.target).is('.icongaleri, .icongaleri, .fancybox-button, .fancybox-button, .fancybox-button div, .fancybox-button div, .fancybox-button svg, .fancybox-button svg, .fancybox-container, .fancybox-container, .fancybox-bg, .fancybox-bg, .fancybox-inner, .fancybox-inner, .fancybox-infobar, .fancybox-infobar, .fancybox-stage, .fancybox-stage, .fancybox-slide, .fancybox-slide, .fancybox-content, .fancybox-content, .spanisim2, .spanisim2, .tikladtygaleriust, .tikladtygaleriust, .tikladtygaleri, .tikladtygaleri, b, b, .modal-content, .modal-content, .fancybox-slide, .fancybox-slide, .resimler, .resimler, .fancybox-image, .fancybox-image, img, img, p, p, .dtysayfa, .dtysayfa .tasiyici, .tasiyici, .tasiyici1, .tasiyici1, .tasiyici2, .tasiyici2, .dtyborder, dtyborder, .dtybaslik2, .dtybaslik2, .divblock, .divblock *')) {
        $(".modal").hide();
    }
});
*/


</script>
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
