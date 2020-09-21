<?Php
$tbl='anasayfa';
$syf='anasayfa';
?>

<!-- Content area -->
<div class="content">

<!-- Basic responsive table -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Son Güncellemeler</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
        </div>
    </div>
    <?php $songuncellenenlericek=z(1,"WHERE arsiv='0' ORDER BY ID DESC ",'','songuncellenen'); ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Güncellenen Tablo</th>
                    <th>Güncellenen Fiyat</th>
                    <th>Güncellendiği Tarih</th>
                    <th>Güncelleyen Kişi</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($songuncellenenlericek)){ ?>
                <?php foreach($songuncellenenlericek as $soncek){ ?>
                <?php
                $personelbilgi='';
                if(!empty($soncek['personel_ID'])){
                    $personelbilgi=z(1,$soncek['personel_ID'],'','personel');
                    $personelbilgi=(!empty($personelbilgi["ad"])?$personelbilgi["ad"]:' ').(!empty($personelbilgi["soyad"])?$personelbilgi["soyad"]:' ');
                }
                ?>
                    <tr>
                        <td>
                            <span class="input-group-append">
                                <a href="./?s=<?php echo (!empty($soncek["modul"])?$soncek["modul"]:''); ?>&a=duzenle&id=<?php echo (!empty($soncek["modul_ID"])?$soncek["modul_ID"]:''); ?>" class="btn bg-teal"><?php echo (!empty($soncek["modul"])?$soncek["modul"]:''); ?></a>
                            </span>
                        </td>
                        <td><?php echo (!empty($soncek["fiyat"])?$soncek["fiyat"]:''); ?></td>
                        <td><?php echo (!empty($soncek["tarih"])?z("tarihsaat",$soncek["tarih"]):''); ?></td>
                        <td><?php echo $personelbilgi; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /basic responsive table -->


</div>
<!-- /content area -->

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light d-none">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Anasayfa</a>
                    <span class="breadcrumb-item active">Mega Menü</span>
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

    <style>
    .kapsayicimenu{

    }
    .kapsananmenu{
        float:left;
    }
    .kapsananicmenu{
        padding: 60px 0px;
        border: 1px solid #ddd;
        margin: 10px;
        text-align: center;
        border-radius: 6px;
        cursor: pointer;
        -webkit-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
        -moz-box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
        box-shadow: 8px 8px 29px 0px rgba(158,155,158,1);
        max-height: 100px;
        transition: color 700ms;
        transition: background 1400ms;
        background: #2e3d49;
        color: white;
    }
    .kapsananicmenu:hover{
        background:#02b3e4;
        color:white;
        -webkit-box-shadow: 8px 8px 40px 5px rgba(158,155,158,1);
        -moz-box-shadow: 8px 8px 40px 5px rgba(158,155,158,1);
        box-shadow: 8px 8px 40px 5px rgba(158,155,158,1);
    }
    </style>

    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Traffic sources -->
                <div class="card pb-4" style="background:#2a3c44;">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title" style="color:white;">Mega Menü</h6>
                    </div>
                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-12 kapsayicimenu">
                                <?php if($admn||ytk('fiyatcalismasi','listele')||ytk('cari','listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_satispazarlama">
                                        Satış Pazarlama
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($admn||ytk("genelplanlama",'listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_genelplanlama" style="background:red;">
                                        Genel Planlama(Pasif)
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($admn||ytk('kumaskarti','listele')||ytk('kumaskarti','listele')||ytk('iplik','listele')||ytk('boyabaski','listele')||ytk('renkkarti','listele')||ytk('kumasturu','listele')||ytk('cari','listele')||ytk('makinacesitleri','listele')||ytk('makinaparkuru','listele')||ytk('yedekparca','listele')||ytk('aksesuarkarti','listele')||ytk('konfeksiyonmaliyetleri','listele')||ytk('modelkartlari','listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_tanimlamalar">
                                        Genel Tanımlamalar
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($admn||ytk("satinalma",'listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_satinalma" style="background:red;">
                                        Satın Alma(Pasif)
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($admn||ytk("finans",'listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_finans" style="background:red;">
                                        Finans(Pasif)
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($admn||ytk("genelmuhasebe",'listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_genelmuhasebe" style="background:red;">
                                        Genel Muhasebe(Pasif)
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <?php if($admn||ytk("einel",'listele')) { ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_einel">
                                        Varietex GMBH
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12 kapsananmenu">
                                    <div class="kapsananicmenu" data-toggle="modal" data-target="#modal_araclar">
                                        Araçlar
                                    </div>
                                </div>

                                <!-- satispazarlama modal -->
                                <div id="modal_satispazarlama" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Satış Pazarlama</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <?php if($admn||ytk('fiyatcalismasi','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Fiyat Teklifleri</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=fiyatcalismasi&a=listele" class="nav-link">Teklifler</a></li>
                                                                        <li class="nav-item"><a href="./?s=fiyatcalismasi&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=fiyatcalismasi&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <li class="nav-item">
                                                                    <?php if($admn||ytk('fiyatcalismasi','listele')) { ?>
                                                                    <a href="./?s=cari&a=listele&musteri=208" class="nav-link">Müşteri Portföyü</a>
                                                                    <a href="./?s=cari&a=listele&musteri=209" class="nav-link">Potansiyel Müşteriler</a>
                                                                    <a href="./?s=cari&a=listele" class="nav-link">Müşteri Konumları(Harita)</a>
                                                                    <?php } ?>
                                                                    <a href="./?s=anasayfa" class="nav-link">Satış Siparişleri(Aktif Değil)</a>
                                                                    <?php if($admn||ytk('gb','listele')) { ?>
                                                                    <a href="./?s=gb&a=listele" class="nav-link">GB Listesi</a>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /satispazarlama modal -->

                                 <!-- genelplanlama modal -->
                                 <div id="modal_genelplanlama" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Genel Planlama(Pasif)</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <?php if($admn||ytk('siparis','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Siparis</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=siparis&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=siparis&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=siparis&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('hareketler','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Hareketler</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=hareketler&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=hareketler&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=hareketler&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /genelplanlama modal -->

                                <!-- satinalma modal -->
                                <div id="modal_satinalma" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Satın Alma(Pasif)</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <?php if($admn||ytk('satinalma','listele')) { ?>
                                                                <li class="nav-item"><a href="./?s=ipliksiparisleri&a=listele" class="nav-link">İplik Siparişleri</a></li>
                                                                <li class="nav-item"><a href="./?s=kumassiparisleri&a=elistelekle" class="nav-link">Kumaş Siparişleri</a></li>
                                                                <li class="nav-item"><a href="./?s=aksesuarsiparisleri&a=listele" class="nav-link">Aksesuar Siparişleri</a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /satinalma modal -->

                                <!-- finans modal -->
                                <div id="modal_finans" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Finans Yönetimi(Pasif)</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                            <?php if($admn||ytk('finans','listele')) { ?>
                                                                <li class="nav-item"><a href="./?s=finansyonetimi&a=listele" class="nav-link">Finans Yönetimi</a></li>
                                                            <?php } ?>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /finans modal -->

                                 <!-- genelmuhasebe modal -->
                                 <div id="modal_genelmuhasebe" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Genel Muhasebe(Pasif)</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <?php if($admn||ytk('genelmuhasebe','listele')) { ?>
                                                                    <li class="nav-item"><a href="./?s=genelmuhasebe&a=listele" class="nav-link">Genel Muhasebe</a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /genelmuhasebe modal -->

                                <!-- kumaskarti modal -->
                                <div id="modal_kumaskarti" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Kumaş Kartları</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <li class="nav-item">
                                                                    <?php if($admn||ytk('kumaskarti','listele')) { ?>
                                                                    <a href="./?s=kumaskarti&a=listele" class="nav-link">Liste</a>
                                                                    <a href="./?s=kumaskarti&a=ekle" class="nav-link">Üretim Ekle</a>
                                                                    <a href="./?s=kumaskarti&a=ekletedarik" class="nav-link">Tedarik Ekle</a>
                                                                    <a href="./?s=kumaskarti&a=eklekombinasyon" class="nav-link">Kombinasyon Ekle</a>
                                                                    <a href="./?s=kumaskarti&a=listele_arsv1" class="nav-link">Arşivlenmişler</a>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /kumaskarti modal -->

                                 <!-- urun modal -->
                                 <div id="modal_urun" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">E-Satış</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <li class="nav-item">
                                                                    <?php if($admn||ytk('urun','listele')) { ?>
                                                                    <a href="./?s=urun&a=listele" class="nav-link">Liste</a>
                                                                    <a href="./?s=urun&a=ekle" class="nav-link">Ekle</a>
                                                                    <a href="./?s=urun&a=listele_arsv1" class="nav-link">Arşivlenmişler</a>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /urun modal -->

                                <!-- einel modal -->
                                <div id="modal_einel" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Varietex GMBH</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <li class="nav-item">
                                                                    <?php if($admn||ytk('einel','listele')) { ?>
                                                                    <a href="./?s=einel&a=listele" class="nav-link">Liste</a>
                                                                    <a href="./?s=einel&a=ekle" class="nav-link">Ekle</a>
                                                                    <a href="./?s=einel&a=listele_arsv1" class="nav-link">Arşivlenmişler</a>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /einel modal -->

                                <!-- tanimlamalar modal -->
                                <div id="modal_tanimlamalar" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Tanımlamalar</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <?php if($admn||ytk('modelkartlari','listele')) { ?>
                                                                <li class="nav-item"><a href="./?s=modelkartlari&a=ekle" class="nav-link">Model Kartları</a></li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('kumaskarti','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Kumaş Kartları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                    <li class="nav-item"><a href="./?s=kumaskarti&a=listele" class="nav-link">Liste</a></li>
                                                                    <li class="nav-item nav-item-submenu">
                                                                        <a href="#" class="nav-link"> Yeni Kumaş Kartı Ekle</a>
                                                                        <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=kumaskarti&a=ekle" class="nav-link">Üretim</a></li>
                                                                        <li class="nav-item"><a href="./?s=kumaskarti&a=ekletedarik" class="nav-link">Tedarik</a></li>
                                                                        <li class="nav-item"><a href="./?s=kumaskarti&a=eklekombinasyon" class="nav-link">Kombinasyon</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="nav-item"><a href="./?s=kumaskarti&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('iplik','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> İplik Kartları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=iplik&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=iplik&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=iplik&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('boyabaski','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Kumaş Terbiye İşlemleri</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=boyabaski&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=boyabaski&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=boyabaski&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('renkkarti','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Renk Kartları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=renkkarti&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=renkkarti&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=renkkarti&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('aksesuarkarti','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Aksesuar Kartları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=aksesuarkarti&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=aksesuarkarti&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=aksesuarkarti&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('cari','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Cari Hesap Kartları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=cari&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item nav-item-submenu">
                                                                            <a href="#" class="nav-link"> Yeni Cari Kartı Ekle</a>
                                                                            <ul class="nav nav-group-sub">
                                                                            <li class="nav-item"><a href="./?s=cari&a=ekle&tedarikci=1" class="nav-link">Tedarikci</a></li>
                                                                            <li class="nav-item"><a href="./?s=cari&a=ekle&mevcut=42" class="nav-link">Mevcut Müşteri</a></li>
                                                                            <li class="nav-item"><a href="./?s=cari&a=ekle&potansiyel=43" class="nav-link">Potansiyel Müşteri</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="nav-item"><a href="./?s=cari&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('makinacesitleri','listele')||ytk('kumasturu','listele')||ytk('makinaparkuru','listele')||ytk('yedekparca','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Makine Tanımlamaları</a>
                                                                    <ul class="nav nav-group-sub">
                                                                       
                                                                    <?php if($admn||ytk('makinacesitleri','listele')) { ?>
                                                                        <li class="nav-item nav-item-submenu">
                                                                            <a href="#" class="nav-link"> Makine İşlevi</a>
                                                                            <ul class="nav nav-group-sub">
                                                                                <li class="nav-item"><a href="./?s=makinacesitleri&a=listele" class="nav-link">Liste</a></li>
                                                                                <li class="nav-item"><a href="./?s=makinacesitleri&a=ekle" class="nav-link">Ekle</a></li>
                                                                                <li class="nav-item"><a href="./?s=makinacesitleri&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <?php } ?>
                                                                        <?php if($admn||ytk('makinaparkuru','listele')) { ?>
                                                                        <li class="nav-item nav-item-submenu">
                                                                            <a href="#" class="nav-link"> Makine Parkuru</a>
                                                                            <ul class="nav nav-group-sub">
                                                                                <li class="nav-item"><a href="./?s=makinaparkuru&a=listele" class="nav-link">Liste</a></li>
                                                                                <li class="nav-item"><a href="./?s=makinaparkuru&a=ekle" class="nav-link">Ekle</a></li>
                                                                                <li class="nav-item"><a href="./?s=makinaparkuru&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <?php } ?>
                                                                        <?php if($admn||ytk('yedekparca','listele')) { ?>
                                                                        <li class="nav-item nav-item-submenu">
                                                                            <a href="#" class="nav-link"> Yedek Parça</a>
                                                                            <ul class="nav nav-group-sub">
                                                                                <li class="nav-item"><a href="./?s=yedekparca&a=listele" class="nav-link">Liste</a></li>
                                                                                <li class="nav-item"><a href="./?s=yedekparca&a=ekle" class="nav-link">Ekle</a></li>
                                                                                <li class="nav-item"><a href="./?s=yedekparca&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <?php } ?>
                                                                        <?php if($admn||ytk('kumasturu','listele')) { ?>
                                                                        <li class="nav-item nav-item-submenu">
                                                                            <a href="#" class="nav-link"> Kumaş Türü</a>
                                                                            <ul class="nav nav-group-sub">
                                                                                <li class="nav-item"><a href="./?s=kumasturu&a=listele" class="nav-link">Liste</a></li>
                                                                                <li class="nav-item"><a href="./?s=kumasturu&a=ekle" class="nav-link">Ekle</a></li>
                                                                                <li class="nav-item"><a href="./?s=kumasturu&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <?php } ?>
                                                                        

                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($admn||ytk('konfeksiyonmaliyetleri','listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Konfeksiyon Maliyetleri</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=konfeksiyonmaliyetleri&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=konfeksiyonmaliyetleri&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=konfeksiyonmaliyetleri&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                                
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tanimlamalar modal -->

                                <!-- gb modal -->
                                <div id="modal_gb" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Raporlar</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                                <li class="nav-item">
                                                                    <?php if($admn||ytk('gb','listele')) { ?>
                                                                    <a href="./?s=gb&a=listele" class="nav-link">GB Listesi</a>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /gb modal -->


                                <!-- araclar modal -->
                                <div id="modal_araclar" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h6 class="modal-title">Araçlar</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="sidebar sidebar-dark sidebar-component position-static w-100 d-block">
                                                    <div class="sidebar-content position-static">
                                                        <!-- Navigation -->
                                                        <div class="card">
                                                            <ul class="nav nav-sidebar nav-sidebar-bordered" data-nav-type="accordion">
                                                            <?php if($admn||ytk("gb",'listele')) { ?>
                                                                <li class="nav-item">
                                                                    <a href="javascript:print()" class="nav-link">GB Listesi</a>
                                                                </li>
                                                            <?php } ?>
                                                            <?php if($admn||ytk("nesne",'listele')) { ?>
                                                                <li class="nav-item">
                                                                    <a href="./?s=nesne&a=listele" class="nav-link">Nesneleri Yönet</a>
                                                                </li>
                                                                <?php } ?>
                                                            <?php if($admn||ytk("personel",'listele')) { ?>
                                                                <li class="nav-item nav-item-submenu">
                                                                    <a href="#" class="nav-link"> Personel</a>
                                                                    <ul class="nav nav-group-sub">
                                                                        <li class="nav-item"><a href="./?s=personel&a=ekle" class="nav-link">Ekle</a></li>
                                                                        <li class="nav-item"><a href="./?s=personel&a=listele" class="nav-link">Liste</a></li>
                                                                        <li class="nav-item"><a href="./?s=personel&a=listele_arsv1" class="nav-link">Arşivlenmişler</a></li>
                                                                    </ul>
                                                                </li>
                                                                <?php } ?>
                                                            <?php if($admn||ytk("log",'listele')) { ?>
                                                                <li class="nav-item">
                                                                    <a href="./?s=log&a=listele" class="nav-link">Log Kayıtları</a>
                                                                </li>
                                                                <?php } ?>
                                                            <?php if($admn||ytk("pamuk",'listele')) { ?>
                                                                <li class="nav-item">
                                                                    <a href="./?s=pamuk&a=listele" class="nav-link">Pamuk Kayıtları</a>
                                                                </li>
                                                                <?php } ?>
                                                            <?php if($admn||ytk("kur",'listele')) { ?>
                                                                <li class="nav-item">
                                                                    <a href="./?s=kur&a=listele" class="nav-link">Kur Kayıtları</a>
                                                                </li>
                                                                <?php } ?>
                                                                <li class="nav-item">
                                                                    <a href="./?s=cikis&a=cikis" class="nav-link">Güvenli Çıkış Yap</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <!-- /navigation -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /araclar modal -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /traffic sources -->
            </div>
        </div>
        <!-- /main charts -->
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->

<?php exit(); ?>