<?Php
if(z(8,'id')){
$ID=z(8,'id');
$admin_ID = z('lgn','ID');
$check = z(1,$admin_ID,'admin,ID','personel');
$xx = z(1,$ID,'admin,ID','personel');
if($check['admin']!=1 && $xx['admin']==1 ){
    header('Location: ?s='.$tbl.'&a=listele');die;
}

if(z(7,$tbl)){
	$_X=z(7,$tbl);
	$_Departman=z(7,'departman');
	$_DDepartman=z(7,'ddepartman');
    $_FirmaTip=z(7,'firmaTip');
    $_RehberGruplar=z(7,'rehberGruplar');
	z(6,$tbl);
	if(!empty($_X['ad'])){
		if(!empty($_X['kullanici'])||!empty($_X['eposta'])){
			$sdK=!empty($_X['kullanici'])?"kullanici='".$_X['kullanici']."'":'0';
			$sdE=!empty($_X['eposta'])?"eposta='".$_X['eposta']."'":'0';
			if(!z(5,"WHERE ID<>'".$ID."' AND (".$sdK." OR ".$sdE.")")){
					if(empty($_X['sifre'])||(!empty($_X['resifre'])&&$_X['sifre']==$_X['resifre'])){
						unset($_X['resifre']);
                        if(!empty($_X['sifre']))$_X['sifre']=md5($_X['sifre']);else unset($_X['sifre']);
						if(!empty($_X['msifre']))$_X['msifre']=$_X['msifre'];else unset($_X['msifre']);
						$lmtx=z(1,$ID,'limitD,limitD2,limitMax,limitMax2',$tbl);
						$_X['limitD']=!empty($_X['limitD'])?sayi($_X['limitD']):0;
						if($lmtx['limitD']!=$_X['limitD'])$_X['limitMax']=$_X['limitD']-$lmtx['limitD']+$lmtx['limitMax'];
						$_X['limitD2']=!empty($_X['limitD2'])?sayi($_X['limitD2']):0;
						if($lmtx['limitD2']!=$_X['limitD2'])$_X['limitMax2']=$_X['limitD2']-$lmtx['limitD2']+$lmtx['limitMax2'];
						$_X['departmanlar']='';
                        $_X['firmaTipleri']='';
                        $_X['rehberGruplar']='';
                        $_X['tarihDogum']=!empty($_X['tarihDogum'])?$_X['tarihDogum']:NULL;

                        if(!empty($_RehberGruplar)){
                            foreach($_RehberGruplar as $fei=>$fed){
                                if(!empty($_X['rehberGruplar']))$_X['rehberGruplar'].=',';
                                if(!empty($fed))$_X['rehberGruplar'].=trim($fei);
                            }
                        }
                        if(!empty($_FirmaTip)){
                            foreach($_FirmaTip as $fei=>$fed){
                                if(!empty($_X['firmaTipleri']))$_X['firmaTipleri'].=',';
                                if(!empty($fed))$_X['firmaTipleri'].=trim($fei);
                            }
                        }

						if(!empty($_Departman)){
							$_X['departmanMulti']=array();
                            foreach($_Departman as $fei=>$fed){
								if(!empty($_X['departmanlar']))$_X['departmanlar'].=',';
								if(!empty($fed))$_X['departmanlar'].=trim($fei);
                                $_X['departmanMulti'][]=trim($fei);
							}
                            $_X['departmanMulti']=!empty($_X['departmanMulti'])?json_encode($_X['departmanMulti']):'';
						}
                        
						$_X['ddepartmanlar']='';
						if(!empty($_DDepartman)){
							foreach($_DDepartman as $fei=>$fed){
								if(!empty($_X['ddepartmanlar']))$_X['ddepartmanlar'].=',';
								if(!empty($fed))$_X['ddepartmanlar'].=trim($fei);
							}
						}
						if(z(3,$ID,$_X)){
							
							z(4,"WHERE personel_ID='".$ID."'".(!$admn?" AND tip<>'personel'":''),'yetki');
							$_Yetki=z(7,'yetki');
							if(!$admn)unset($_Yetki['personel']);
							if(!empty($_Yetki)){
								foreach($_Yetki as $ytip=>$yetki){
									$yetki['personel_ID']=$ID;
									$yetki['tip']=$ytip;
									z(2,$yetki);
								}
							}
							
							z(33,'duzenle',1);
							header('Location: ?s='.$tbl.'&a=duzenle&id='.$ID);die;
						}
					}
					else z(33,'duzenle',14);
			}
			else z(33,'duzenle',3);
		}
		else z(33,'duzenle',12);
	}
	else z(33,'duzenle',11);
}

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X['rehberGruplar'])){
    $_Exp=explode(',',$_X['rehberGruplar']);
    if(!empty($_Exp))foreach($_Exp as $fed)$_RehberGruplar[$fed]=1;
}
if(!empty($_X['firmaTipleri'])){
    $_Exp=explode(',',$_X['firmaTipleri']);
    if(!empty($_Exp))foreach($_Exp as $fed)$_FirmaTip[$fed]=1;
}
if(!empty($_X['departmanlar'])){
	$_Exp=explode(',',$_X['departmanlar']);
	if(!empty($_Exp))foreach($_Exp as $fed)$_Departman[$fed]=1;
}
if(!empty($_X['ddepartmanlar'])){
	$_Exp=explode(',',$_X['ddepartmanlar']);
	if(!empty($_Exp))foreach($_Exp as $fed)$_DDepartman[$fed]=1;
}
if(!empty($_X)){
unset($_X['sifre']);
?>
<div class="sayfa">
    <div class="baslik"><h3>Personel Düzenle</h3></div>
    <div class="icerik">
    	<?Php switch(z(33,'duzenle')){
			case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
			case 3:_uyr(2,'Kullanıcı adı veya E-posta adresi daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
			case 11:_uyr(2,'Lütfen adı giriniz.');break;
			case 12:_uyr(2,'Lütfen e-posta veya kullanıcı adı belirtiniz. Sisteme giriş için kullanılacaktır.');break;
			case 13:_uyr(2,'Lütfen şifre belirtiniz.');break;
			case 14:_uyr(2,'Şifreler uyuşmuyor.');break;
        }?>
        
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

<!-- Dashboard content -->
        <div class="content pt-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Personel Bilgileri</h5>
                                </div>
                                 <!-- BURAYA PERSONEL BİLGİLERİ BAŞLAYACAK -->
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">PERSONELİN ADI * </label>
                                    <div class="col-lg-9">
                                       <input type="text" class="form-control" required name="<?Php echo $tbl?>[ad]" value="<?Php echo !empty($_X['ad'])?$_X['ad']:''?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">KULLANICI ADI * </label>
                                    <div class="col-lg-9">
                                       <input type="text" class="form-control" name="<?Php echo $tbl?>[kullanici]" value="<?Php echo !empty($_X['kullanici'])?$_X['kullanici']:''?>" />
                                    </div>
                                </div>
                                
                        <?php $_nesneDep=z(37,z(1,"WHERE ad='departman' OR ad='ddepartman'","ID,metin1","nesne")); 
                                        if (!empty($_nesneDep)) { ?>
                            <div class="form-group row">
                             <label class="col-lg-3 col-form-label">DEPARTMAN</label>
                                <div class="col-lg-9">
                            <select name="<?php echo $tbl; ?>[nesne_IDdepartman]" class="form-control">
                                <option value=0>Seçiniz..</option>
                                    <?php foreach ($_nesneDep as $n) { echo $n['ID']?>
                                 <option value=<?php echo $n['ID'] ?> <?php if(!empty($_X['nesne_IDdepartman'])&&$_X['nesne_IDdepartman']==$n['ID']){ echo 'selected'; } ?>><?php echo $n['metin1']; ?>
                                     
                                 </option>
                                    <?php } ?>
                            </select>
                                </div>
                        </div>
                            <?php } ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">E-POSTASI * </label>
                                    <div class="col-lg-9">
                                       <input type="email" class="form-control" name="<?Php echo $tbl?>[eposta]" value="<?Php echo !empty($_X['eposta'])?$_X['eposta']:''?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">ŞİFRESİ * </label>
                                    <div class="col-lg-9">
                                      <input type="password" class="form-control" name="<?Php echo $tbl?>[sifre]" value="<?Php echo !empty($_X['sifre'])?$_X['sifre']:''?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">ŞİFRE TEKRARI * </label>
                                    <div class="col-lg-9">
                                      <input type="password" class="form-control" name="<?Php echo $tbl?>[resifre]" value="<?Php echo !empty($_X['resifre'])?$_X['resifre']:''?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">MAİL E-POSTASI * </label>
                                    <div class="col-lg-9">
                                      <input type="email" class="form-control" name="<?Php echo $tbl?>[meposta]" value="" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">MAİL ŞİFRESİ * </label>
                                    <div class="col-lg-9">
                                       <input class="form-control" type="password" name="<?Php echo $tbl?>[msifre]" value="" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">TEL NUMARASI * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="<?Php echo $tbl?>[tel]" value="<?Php echo !empty($_X['tel'])?$_X['tel']:''?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">DOĞUM TARİHİ * </label>
                                    <div class="col-lg-9">
                                    <input class="yenitarih form-control" type="text" placeholder="Tarihi seç.." name="<?php echo $tbl?>[tarihDogum]" value="<?php echo (!empty($_X['tarihDogum'])?z('date',$_X['tarihDogum']):''); ?>">
                                    </div>
                                </div>                                                            
                                 <!-- BURAYA PERSONEL BİLGİLERİ BİTECEK -->
					
                    <?php /*/ ?>
                    <tr>
                        <th>Firma</th>
                        <td>
                            <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'','t'=>'firma','alan'=>'','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0)); ?>
                        </td>
                    </tr>
                    <?php /*/ ?>
                    
                    <?php /*/ ?>
                    <tr><th>PERSONELİN LİMİTİ</th><td><input type="text" placeholder="<?Php echo $pb?>0,0" name="<?Php echo $tbl?>[limitD]" value="<?Php echo !empty($_X['limitD'])?sayi($_X['limitD'],2):''?>" /></td></tr>
                    <tr><th>LİMİT TİPİ</th><td>
                        <select name="<?Php echo $tbl?>[limitT]">
                        	<?Php foreach($_LimitT as $fei=>$fed){?><option value="<?Php echo $fei?>" <?Php echo isset($_X['limitT'])&&$_X['limitT']==$fei?'selected':''?>><?Php echo $fed?></option><?Php }?>
                        </select>
                    </td></tr>
                    <?Php if(!empty($_X['limitT'])){?>
                    <tr><th>KALAN LİMİT</th><td><?Php $klnLmt=$_X['limitMax']-$_X['limitTop']; echo $pb.($klnLmt>0?sayi($klnLmt,2):0)?></td></tr>
					<?Php if($admn){?><tr><th colspan="2"><a href="sayfa/personel/limit.php?perid=<?Php echo $_X['ID']?>" title="Personelin limiti bittiği ve otomatik yenileme zamanına kadar beklenemeyecek durumlarda, yönetici bu bağlantı ile personelin limitini tekrar yenileyebilir.(Bu özellik sadeece yöneticiler tarafından kullanılabilir.)">Bu Personelin Limitini Sıfırlayın</a></th></tr><?Php }?>
                    <?Php }?>
                    <tr><th>YILLIK LİMİTİ <span class="soru" title="Doldurulması zorunlu değildir. Yılda bir yenilenir. Sipariş başına limiti olan personellerin fazla harcamadan kaçınması için kullanılmalıdır. Ör:Sipariş başına 100TL limiti olan bir personel bu yıl 10.000TL'yi geçemesin. (Boş bırakılırsa yıllık kontrol yapılmaz.)">?</span></th><td><input type="text" placeholder="<?Php echo $pb?>0,0" name="<?Php echo $tbl?>[limitD2]" value="<?Php echo !empty($_X['limitD2'])?sayi($_X['limitD2'],2):''?>" /></td></tr>
                    <tr><th>YILLIK KALAN LMT</th><td><?Php $klnLmt=$_X['limitMax2']-$_X['limitTop']; echo $pb.($klnLmt>0?sayi($klnLmt,2):0)?></td></tr>
                    <?Php if($admn){?><tr><th colspan="2"><a href="sayfa/personel/limit.php?perid=<?Php echo $_X['ID']?>&l2=1" title="Personelin yıllık limiti bittiği ve otomatik yenileme zamanına kadar beklenemeyecek durumlarda, yönetici bu bağlantı ile personelin yıllık limitini tekrar yenileyebilir.(Bu özellik sadeece yöneticiler tarafından kullanılabilir.)">Bu Personelin Yıllık Limitini Sıfırlayın</a></th></tr><?Php }?>
                    <?php /*/ ?>

                    <!-- BURAYA YETKİ FOREACHI BAŞLAYACAK -->
                      <div class="card-header header-elements-inline">
                         <h5 class="card-title">Personel Yetkileri  <input type="checkbox" class="tumunu-sec-hedef" data-hedef="fieldset input[type=checkbox]" value="1"></h5> 
                     </div>  
                                <!-- BURAYA YETKİ FOREACHI BAŞLAYACAK -->
                    <?php foreach($_MTip as $mtip=>$mad){if($admn||$mtip!='personel'){?>
                        <fieldset>
                        <div class="form-group row">
                        <legend class="col-lg-3 col-form-label"><?Php echo $mad?></legend>
                        <div class="col-lg-9">

                         <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][listele]" value="1" <?Php echo $_X['admin']||ytk($mtip,'listele',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Görüntüle</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][detay]" value="1" <?Php echo $_X['admin']||ytk($mtip,'detay',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?> >Detay</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ekle]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ekle',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Ekle</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][duzenle]" value="1" <?Php echo $_X['admin']||ytk($mtip,'duzenle',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Düzenle</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][sil]" value="1" <?Php echo $_X['admin']||ytk($mtip,'sil',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Sil</label>
                        <?Php if( !in_array($mtip, $_ArsivHaric) ){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][arsivle]" value="1" <?Php echo $_X['admin']||ytk($mtip,'arsivle',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Arşivle</label>
                        <?Php }?>
                        <?Php if($mtip=='market'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][eposta]" value="1" <?Php echo $_X['admin']||ytk($mtip,'eposta',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>E-Posta Gönder</label>
                        <?Php }?>
                        <?Php if($mtip=='kumaskarti'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel1',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Rapor</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel2]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel2',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Fiyat Görüntüleme</label>
                        <?Php }?>
                        <?Php if($mtip=='musteritakip'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel1',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Herkesin Girdilerini Görebilme</label>
                        <?Php }?>
                        <?Php if($mtip=='istakip'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel1',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Herkesin Girdilerini Görebilme</label>
                        <?Php }?>
                        <?Php if($mtip=='dokumastok'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel1',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Hareket Detayı</label>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel2]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel2',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Hesaplama Sayfası</label>
                        <?Php }?>
                         <?Php if($mtip=='mesaj'){?>
                        <label><input type="checkbox" name="yetki[<?Php echo $mtip?>][ozel1]" value="1" <?Php echo $_X['admin']||ytk($mtip,'ozel1',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Gelen Kutusu</label>
                        <?Php }?>

                            </fieldset>
                    <?Php }}
                    $_Y=z(1,"WHERE ad='departman'",NULL,'nesne');if(!empty($_Y)){ /*?>
                    <fieldset>
                        <legend>İlgili Departmanlar</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_Y as $y){?>
                        <label><input type="checkbox" name="departman[<?Php echo $y['ID']?>]" value="1" <?Php echo $_X['admin']||!empty($_Departman[$y['ID']])?'checked="checked"':'';echo $_X['admin']?' disabled="disabled"':''?>><?Php echo $y['metin1']?></label>
                        <?Php }?>
                        </div>
                    </fieldset>
                        <?Php */ }?>
                                <div class="form-group row">
                                    <div class="col-lg-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Kaydet">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

                    <?Php if(!empty($ayr['destekA'])){?>
                    <fieldset>
                    	<legend>Destek Talep Yetkilisi</legend>
                    	<label><input type="checkbox" name="yetki[destek][listele]" value="1" <?Php echo $_X['admin']||ytk('destek','listele',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Görüntüle</label>
                    	<label><input type="checkbox" name="yetki[destek][ekle]" value="1" <?Php echo $_X['admin']||ytk('destek','ekle',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Yaz</label>
                    	<label><input type="checkbox" name="yetki[destek][duzenle]" value="1" <?Php echo $_X['admin']||ytk('destek','duzenle',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Cevapla</label>
                    	<?Php /*<label><input type="checkbox" name="yetki[destek][sil]" value="1" <?Php echo $_X['admin']||ytk('destek','sil',$_X['ID'])?'checked':'';echo $_X['admin']?' disabled="disabled"':''?>>Sil</label>*/?>
                        <div>                        
						<?Php $_Y=z(1,"WHERE ad='ddepartman'",NULL,'nesne');if(!empty($_Y)){?>
                        <fieldset>
                            <legend>Cevap Verebileceği Destek Departmanları</legend>
                            <div style="max-width:460px; text-align:center;">
                            <?Php foreach($_Y as $y){?>
                            <label><input type="checkbox" name="ddepartman[<?Php echo $y['ID']?>]" value="1" <?Php echo $_X['admin']||!empty($_DDepartman[$y['ID']])?'checked="checked"':'';echo $_X['admin']?' disabled="disabled"':''?>><?Php echo $y['metin1']?></label>
                            <?Php }?></div>
                        </fieldset>
                        <?Php }?>
                        </div>
                    </fieldset>
                    <?Php }?>
                    <?php /*/ ?>
                    <?php
                    $_F=z(1,"WHERE ad='firmaTip'",NULL,'nesne');if(!empty($_F)){?>
                    <fieldset>
                        <legend>Firma Tipleri</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_F as $f){?>
                        <label><input type="checkbox" name="firmaTip[<?Php echo $f['ID']?>]" value="1" <?Php echo $_X['admin']||!empty($_FirmaTip[$f['ID']])?'checked="checked"':'';echo $_X['admin']?' disabled="disabled"':''?>><?Php echo $f['metin1']?></label>
                        <?Php }?>
                        </div>
                    </fieldset>
                    <?Php }?>
                    <?php
                    $_R=z(1,"WHERE ad='rehberGrup'",NULL,'nesne');if(!empty($_R)){?>
                    <fieldset>
                        <legend>Rehber Grupları</legend>
                        <div style="max-width:460px; text-align:center;">
                        <?Php foreach($_R as $r){?>
                        <label><input type="checkbox" name="rehberGruplar[<?Php echo $r['ID']?>]" value="1" <?Php echo $_X['admin']||!empty($_RehberGruplar[$r['ID']])?'checked="checked"':'';echo $_X['admin']?' disabled="disabled"':''?>><?Php echo $r['metin1']?></label>
                        <?Php }?>
                        </div>
                    </fieldset>
                    <?Php }?>
                    <?php /*/ ?>


                    </td></tr>
					
					<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
                    <tr><th><?Php echo $n['ad']?></th><td><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','detay'=>'class="nesneSlc_'.$ad.'"','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'icerik'=>'<option value="0">seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['nesne_ID'.$ad])?$_X['nesne_ID'.$ad]:substr(z('date'),0,7)))?></td></tr>
                    <?Php }?>
                    
                    </tbody></table></div><div class="blok" style="border:0px;margin-right:0px;">
                    <table cellpadding="0" cellspacing="0"><tbody>
                </tbody></table>
            </div>
            <input type="hidden" name="git1" value="?s=<?Php echo $tbl?>&a=listele" />
        </form>
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
        <div id="ekleForm_<?Php echo $ad?>" style="display:none">
        <form action="sayfa/nesne/yonet_ajx.php?ekle=<?Php echo $ad?>" class="ajaxNesneEkle" method="post">
            <table cellpadding="0" cellspacing="0">
                <?Php foreach($n['alan2'] as $fei=>$fed){
                    echo '<tr><th>'.$fed.'</th><td><input type="text" name="nesne['.$fei.']" tabindex="1"/></td></tr>';
                }?>
                <tr><th colspan="2" align="center"><input type="submit" value="KAYDET" /></th></tr>
            </table>
        </form>
        </div>
        <?Php }?>
    </div>
</div>
<?Php if(!empty($_NSN)){?>
<script type="text/javascript">
$(document).ready(function(e) {
	<?Php foreach($_NSN as $ad=>$n){?>
	$(".nesneSlc_<?Php echo $ad?>").change(function(e) {
        if($(this).val()=='yeni'){
			pencereAc("#ekleForm_<?Php echo $ad?>");
			$("#ekleForm_<?Php echo $ad?> input:first").focus();
		}
    });
	$('#ekleForm_<?Php echo $ad?> form').ajaxForm(function(e) { 
		if(e>0){
			$(".nesneSlc_<?Php echo $ad?>").append('<option value="'+e+'">'+<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val()+' '+<?Php }?>'</option>');
			$(".nesneSlc_<?Php echo $ad?> option").attr('selected',false);
			$(".nesneSlc_<?Php echo $ad?> option:last-child").attr('selected',true);
			<?Php foreach($n['alan2'] as $fei=>$fed){?>$('#ekleForm_<?Php echo $ad?> input[name="nesne[<?Php echo $fei?>]"]').val('');<?Php }?>
			pencereKapat();
		}
		else{
			alert('Ekleme başarısız, lütfen tekrar deneyiniz.');
		}
	});
    <?Php }?>
});
</script>
<?Php }?>
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>
<?Php }else{?>
<div class="sayfa"><div class="icerik"><div class="uyari">Girdi bulunamadı.</div></div></div>
<?Php }?>