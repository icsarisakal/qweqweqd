<?Php

if(z(8,'idx'))if(!z(1,z(8,'idx'),'admin',$tbl))require(__DIR__.'/../../parca/sil.php');else z(33,'sil',101);
if(z(7,'sec'))require(__DIR__.'/../../parca/cokluIslem.php');
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
                    <?Php switch(z(33,'sil')){
                		case 1:_uyr(1,'Girdi başarıyla silindi.');break;
                		case 2:_uyr(2,'Girdilerin bazıları silinemedi.');break;
                		case 101:_uyr(2,'Silme işlemi için yetkiniz yok!');break;
                	}?>
                	<?Php switch(z(33,'ekle')){
                		case 1:_uyr(1,'Personel ekleme işlemi başarıyla gerçekleştirildi.');break;
                	}?>
                	<form action="" method="post" id="topluIslemForm">
                    <table cellpadding="0" cellspacing="0" border="0" class="table text-nowrap">
                        <colgroup>
                            <col width="28" /><col width="28" /><col /><col /><col /><col  /><col  /><col /><col />
                            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
                            <?Php if($admn||ytk($tbl,'sil')){?><col width="32" /><?Php }?>
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
                            <?php filtreTh('text','ad') ?>
                            <?php //filtreTh('select','firma') ?>
                            <?php //filtreTh('selectNesne','departman') ?>
                            <?php filtreTh('tarih','tarih') ?>
                            <?php filtreTh('tarih','tarihGiris') ?>
                            <?php filtreTh('text','eposta') ?>
                            <?php filtreTh('text','tel') ?>

                            <?php /*/ ?>
                            <?php filtreTh('select','dokumastok','','ID,ID') ?>
                            <th>İLGİLİ FİRMA</th><th>İLGİLİ DEPARTMANLAR</th>
                            <?php filtreTh('select','hamkumasstok','','ID,kumasIsmi,numuneIsmi') ?>
                            <?php /*/ ?>


                            <?php if($admn||ytk($syf,'sil')){?><th class="printx">&nbsp;</th><?php }?>

                            </tr>
                            <tr>
                            	<th class="printx"><input class="tumunuSec" type="checkbox"></th><th class="tdi">NO</th>
                            	<th>İSİM</th><th>DEPARTMAN</th><th>KAYIT TARİHİ</th><th>SON GİRİŞ TARİHİ</th><th>E-POSTA</th><th>TEL</th>
                				<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}?>
                                <?Php if($admn||ytk($tbl,'sil')){?><th class="printx">İŞLEMLER</th><?Php }?>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                			<?Php require('sayfa/'.$tbl.'/listele_prc.php'); ?>
                        </tbody>

                        <?php listeleTfoot(10); ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->

<?php filtreTh('ajaxAraJs') ?>
