<?Php
if($admn||ytk($syf,'listele')||!empty($KOD)){
if(z(8,'id')||!empty($KOD)){
if(!empty($KOD)){
	$kodx=false;
	$ID=z(34,$KOD,1);
}
else{
	$ID=z(8,'id');
	$kodx=true;
}

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){

if(isset($_GET['ikiyebol']))if($admn||ytk($syf,'duzenle'))require(__DIR__.'/ikiyebol_islm.php');

if($_X['arsiv']!=-1){
	if(!empty($_X['goster'])){$_X['goster']=(array)json_decode($_X['goster']);}
	//$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Nesne[$y['ID']]=$y;
	//$_Y=z(1,NULL,NULL,'uyeler');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['id']]=$y;
	//$_Y=z(1,NULL,NULL,'kalite');if(!empty($_Y))foreach($_Y as $y)$_Hamkumasstok[$y['id']]=$y;
    $hamkumasstok=!empty($_X['hamkumasstok_ID'])?z(1,$_X['hamkumasstok_ID'],'ID,kumasIsmi,numuneIsmi,kompozisyon','hamkumasstok'):'';
    $dokumastok=!empty($_X['dokumastok_ID'])?z(1,$_X['dokumastok_ID'],'ID,kompozisyon','dokumastok'):'';
    $nsnSd='';
    $nsnSd.=(!empty($_X['nesne_IDdokumaSalonu'])?"ID='".$_X['nesne_IDdokumaSalonu']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDorguTipi'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDorguTipi']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDkalite'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDkalite']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDkompozisyon'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDkompozisyon']."'":'');
    $_Nesne=z(37,z(1,"WHERE arsiv<>'-1' AND (".$nsnSd.")",'ID,metin1,metin2','nesne'));
    $_AltStok=z(1,"WHERE arsiv <> -1 AND stok_ID='".$_X['ID']."'",'ID,metraj','stok');
?>
<div class="sayfa">
	<div class="printx">
        <div class="baslik"><h3>Stok Detayı</h3></div></div>
        <div class="icerik" style="width: 100%;">
			<?Php switch(z(33,'ekle')){
                case -1:_uyr(0,'Kayıt başarısız.');break;
                case 1:_uyr(1,'Kayıt başarılı.');break;
                case 3:_uyr(2,'<strong>'.$_X['tipNo'].'</strong> tip numarasına sahip bir girdi bulunuyor. Lütfen başka bir numara belirtiniz.');break;
                case 11:_uyr(2,'Lütfen tip no giriniz.');break;
                case 12:_uyr(2,'Lütfen bir kumaş kalitesi seçiniz.');break;
                case 13:_uyr(2,'Lütfen parti no giriniz.');break;
            } switch(z(33,'duzenle')){
                case -1:_uyr(0,'Düzenleme işlemi başarısız!');break;
                case 1:_uyr(1,'Güncelleme başarıyla gerçekleştirildi.');break;
                case 2:_uyr(2,'Zorunlu alanları kontrol ediniz.');break;
                case 3:_uyr(2,'<strong>'.$_XAd.'</strong> top numarasına sahip bir girdi bulunuyor. Lütfen başka bir numara belirtiniz.');break;
            } switch(z(33,'ikiyebol')){
                case -1:_uyr(0,'İkiye bölme işlemi başarısız!');break;
                case 1:_uyr(1,'İkiye bölme işlemi başarıyla gerçekleştirildi.');break;
                case 2:_uyr(2,'İki parçadan biri oluşturulamadı, lütfen kontrol ediniz.');break;
            }?>
            <div class="blok" style="width: 50%; background-image:none;background-color: #223166; box-sizing: border-box; padding: 10px;">
                <table cellpadding="0" cellspacing="0"><tbody>
                	<colgroup>
                    	<col width="90" /><col /><col width="70" /><col />
                    </colgroup>
                	<tr>
                    	<th>TOP NO<?Php echo gstr2('ID',$_X)?></th><td><?Php echo !empty($_X['ID'])?$_X['ID']:'&nbsp;'?></td>
                        <th>Dokuma Salonu Top No<?Php echo gstr2('dokSalTopNo',$_X)?></th><td><?Php echo !empty($_X['dokSalTopNo'])?$_X['dokSalTopNo']:'&nbsp;'?></td>
                    </tr>
                	<tr>
                    	<th>PARTİ NO<?Php echo gstr2('dokumastok_ID',$_X)?></th><td><?Php echo !empty($_X['dokumastok_ID'])?$_X['dokumastok_ID']:'&nbsp;'?></td>
                        <th>DOKUMA SALONU<?Php echo gstr2('nesne_IDdokumaSalonu',$_X)?></th><td><?Php echo !empty($_Nesne[$_X['nesne_IDdokumaSalonu']]['metin1'])?($_Nesne[$_X['nesne_IDdokumaSalonu']]['metin1']):'&nbsp;'?></td>
                    </tr>
                    <tr>
                        <th>KUMAŞ KALİTESİ<?Php echo gstr2('hamkumasstok_ID',$_X)?></th><td><?Php echo !empty($hamkumasstok['kumasIsmi'])?($hamkumasstok['kumasIsmi']):'&nbsp;'?></td>
                        <th>LOT NO<?Php echo gstr2('lotNo',$_X)?></th><td><?Php echo !empty($_X['lotNo'])?$_X['lotNo']:'&nbsp;'?></td>
                    </tr>
                    <tr>
                        <th>TİP NO<?Php echo gstr2('hamkumasstok_ID',$_X)?></th><td><?Php echo !empty($hamkumasstok['numuneIsmi'])?($hamkumasstok['numuneIsmi']):'&nbsp;'?></td>
                        <th rowspan="3">AÇIKLAMA<?Php echo gstr2('aciklama',$_X)?></th><td rowspan="3"><?Php echo !empty($_X['aciklama'])?mtn($_X['aciklama']):'&nbsp;'?></td>
                        
                    </tr>
                    <tr>
                        <th>METRAJ<?Php echo gstr2('metraj',$_X)?></th><td><?Php echo !empty($_X['metraj'])?sayi($_X['metraj'],2,1):''?> mt</td>
                    </tr>
                    <tr>
                        <th>KALİTE<?Php echo gstr2('nesne_IDkalite',$_X)?></th><td><?Php echo !empty($_Nesne[$_X['nesne_IDkalite']]['metin1'])?($_Nesne[$_X['nesne_IDkalite']]['metin1']):'&nbsp;'?></td>
                    </tr>
					
                    <tr>
                        <th>HAM EN<?Php echo gstr2('enHam',$_X)?></th><td><?Php echo !empty($_X['enHam'])?z(36,$_X['enHam'],2):'&nbsp;'?></td>
                        <th rowspan="4">BARKOD</th><td rowspan="4"><img src="parca/barkod.php?kod=<?Php echo $_X['ID']?>" width="100px" /></td>
                    </tr>

                    <tr>
                        <th>HAM GR<?Php echo gstr2('hkHamGramaj',$_X)?></th><td><?Php echo !empty($_X['hkHamGramaj'])?z(36,$_X['hkHamGramaj'],2):'&nbsp;'?></td>
                    </tr>

                    <tr>
                        <th>KOMPOZİSYON<?Php echo gstr2('nesne_IDkompozisyon',$_X)?></th>
                        <td><?Php 
                            if(!empty($dokumastok['kompozisyon'])){
                                echo $dokumastok['kompozisyon'];
                            }
                            else if(!empty($hamkumasstok['kompozisyon'])){
                                echo $hamkumasstok['kompozisyon'];
                            }
                            else{
                                echo !empty($_Nesne[$_X['nesne_IDkompozisyon']]['metin1'])?($_Nesne[$_X['nesne_IDkompozisyon']]['metin1']):'&nbsp;';
                            }
                        ?></td>

                    </tr>

                    <tr>
                        <th>ÖRGÜ TİPİ<?Php echo gstr2('nesne_IDorguTipi',$_X)?></th><td><?Php echo !empty($_Nesne[$_X['nesne_IDorguTipi']]['metin1'])?($_Nesne[$_X['nesne_IDorguTipi']]['metin1']):'&nbsp;'?></td>
                    </tr>
                        

                    <?php /*/ ?>
                        <th>RENK NO<?Php echo gstr2('nesne_IDrenkNo',$_X)?></th><td><?Php echo (!empty($_Nesne[$_X['nesne_IDrenkNo']]['metin1'])?($_Nesne[$_X['nesne_IDrenkNo']]['metin1']):'').(!empty($_Nesne[$_X['nesne_IDrenkNo']]['metin2'])?($_Nesne[$_X['nesne_IDrenkNo']]['metin2']):'')?></td>
                    <?php /*/ ?>
                    
                    <tr class="printx"><th colspan="4">
                        <?php if(empty($_AltStok)){ ?>
                        <a href="?s=<?php echo $tbl?>&a=duzenle&id=<?php echo $ID?>" class="btnSub btn1">Düzenle</a>&nbsp;
                        <?php $yhref=z(8,'i')=='md'?'?i=md&kod='.$KOD:'?s='.$tbl.'&a=detay&id='.$ID?>
                        <a href="<?php echo $yhref?>&yazdir=1" class="btnSub btn1"><img src="img/yazici.png" height="20" /> YAZDIR</a>
                        <a href="<?php echo $yhref?>&otomatikyazdir=1" class="btnSub btn1"><img src="img/yazici.png" height="20" /> ETİKET ÇIKART</a>
                        <?php $ohref=z(8,'i')=='md'?'?i=md&kod='.$KOD:'?s='.$tbl.'&a=etiket&id='.$ID?>
                        <a href="<?php echo $ohref?>" class="btnSub btn1"><img src="img/drm3.png" height="20" /> ÖNİZLEME</a>
                        <?php }else{ ?>
                            Bilgi: Bu top ikiye bölünmüş, kayıt artık düzenlenemez.
                        <?php } ?>
                    </th></tr>

                    </tbody>
                </table>
            </div><div class="blok" style="width: 46%;box-sizing: border-box;  background-image:none;background-color: #223166;
                        background-image: linear-gradient(to bottom, #223166 , #445388);
                        ">
                <style type="text/css">
                    .btn-group{
                        margin:0;
                        list-style: none;
                        margin-top:10px;
                        margin-left:10px;
                        width: 100%;
                        display: block;
                        box-sizing: border-box;
                    }
                    .btn-group > .btn-btn{
                        box-sizing: border-box;
                        width: 24%;
                        background-color: #eee; 
                        border: 1px solid white;
                        display: inline-block;
                        outline: none;
                        text-decoration: none;
                        color: #444;
                        font-weight: bold;
                        font-size: 10px;
                        margin:0;
                        padding: 12px 8px;
                        margin-right:10px;
                        margin-bottom:10px;
                        border-radius: 30px;
                        text-align: center;
                        -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.1);
                        -moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.1);
                        box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.1);
                    }
                    .btn-group > .btn-btn:hover{
                        background-color: #fff;
                    }
                    .btn-group > .btn-btn.btn-2{
                        width: 220px;
                    }
                    .btn-group > .btn-img{
                        background-size: contain;
                        background-position: 4px 0px;
                        background-repeat: no-repeat;
                        text-align: right;
                        padding-right: 14px;
                    }
                    .btn-group > h1,.btn-group > h2{
                        color: #111;
                        text-shadow: 1px 1px 2px #eee;
                    }
                </style>

                <div class="btn-group">
                    <a href="<?php echo $yhref?>&otomatikyazdir=1" class="btn-btn btn-1">
                        <span style="vertical-align: top"><img src="parca/barkod.php?kod=<?Php echo $_X['ID']?>" height="10" /></span> <span style="vertical-align: top">ETİKET ÇIKART</span></a><!--
                 --><a href="<?php echo $ohref?>" class="btn-btn btn-1">ETİKET ÖNİZLEMESİ</a><?php 

                 if(empty($_AltStok)){
                ?><!--
                 --><a href="javascript:topuIkiyeBol('<?php echo $ID ?>')" class="btn-btn btn-1">(½) TOPU İKİYE BÖL</a>
                 <?php } ?>
                </div>


                <?php if(!empty($_X['stok_ID'])){ ?>
                    <?php $_KardesStok=z(1,"WHERE arsiv <> -1 AND stok_ID='".$_X['stok_ID']."' AND ID<>'".$_X['ID']."'",'ID,metraj','stok'); ?>
                    <?php if(!empty($_KardesStok)) { ?>
                    <div class="btn-group">
                        <h1>Topun Diğer Yarısı</h1>
                        <?php foreach ($_KardesStok as $astok) {
                            ?><a href="?s=stok&a=detay&id=<?Php echo $astok['ID']; ?>" class="btn-btn btn-2 btn-img" style="background-image: url(parca/barkod.php?kod=<?Php echo $astok['ID']; ?>);"><span style="vertical-align: top">DİĞER KISIM: <?php echo z(36,$astok['metraj'],2) ?>mt</span></a><?php
                        } ?>
                    </div>
                    <?php } ?>

                    <?php $butunMetre=z(1,$_X['stok_ID'],'metraj','stok') or 0; ?>
                    <div class="btn-group">
                        <h1>Topun Bütün Hali</h1>
                        <a href="?s=stok&a=detay&id=<?Php echo $_X['stok_ID']?>" class="btn-btn btn-2 btn-img" style="background-image: url(parca/barkod.php?kod=<?Php echo $_X['stok_ID']; ?>);"><span style="vertical-align: top"> BÜTÜN TOP: <?php echo z(36,$butunMetre,2) ?>mt</span></a>
                    </div>

                <?php } ?>

                <?php if(!empty($_AltStok)) { ?>
                <div class="btn-group">
                    <h1>Bölünmüş Bu Topun Alt Parçaları</h1>
                    <?php foreach ($_AltStok as $i=>$astok) {
                        ?><a href="?s=stok&a=detay&id=<?Php echo $astok['ID']; ?>" class="btn-btn btn-2 btn-img" style="background-image: url(parca/barkod.php?kod=<?Php echo $astok['ID']; ?>);"><span style="vertical-align: top">PARÇA <?php echo ($i+1) ?>: <?php echo z(36,$astok['metraj'],2) ?>mt</span></a><?php
                    } ?>
                </div>
                <?php } ?>

                <?php 
                $_Cekistok=z(1,array("stok_ID"=>$_X['ID']),'','cekistok');
                $_Ceki=z(37,z(1,"WHERE ".z(38,$_Cekistok,'ceki_ID'),'ID,tarihIslem','ceki'));
                ?>
                <?php if(!empty($_Cekistok)) { ?>
                <div class="btn-group">
                    <h2>Bu Topun Çeki Listesi Geçmişi</h2>
                    <?php foreach ($_Cekistok as $i=>$astok) {
                        ?><a href="?s=ceki&a=detay&id=<?php echo $astok['ceki_ID']; ?>" class="btn-btn btn-2 btn-img" ><span style="vertical-align: top">ÇEKİ NO: <?php echo $astok['ceki_ID']; ?> - TARİH: 

                            <?php echo !empty($_Ceki[$astok['ceki_ID']]['tarihIslem'])?z('tarih',$_Ceki[$astok['ceki_ID']]['tarihIslem']):''; ?>
                        </span></a><?php
                    } ?>
                </div>
                <?php } ?>


            </div>
        


    </div>
</div>
<script type="text/javascript">
    function topuIkiyeBol(ID) {
        var yeniMetre=0;
        do{
            yeniMetre=sy(prompt('Lütfen yeni parçanın metresini giriniz; <?php echo !empty($_X['metraj'])?z(36,$_X['metraj'],2,1).' metrelik topun içinden kesilerek ayrılmış yeni parçanın metresi.':''  ?>'));
            if(1||yeniMetre){
                if(1||yeniMetre>0 && yeniMetre < <?php echo !empty($_X['metraj'])?z(36,$_X['metraj']):0?> ){
                    window.location.href="?s=<?php echo $tbl?>&a=detay&id=<?php echo $ID?>&ikiyebol="+yeniMetre;
                    break;
                }
                else alert("Lütfen sıfırdan büyük ve ana parça (<?php echo !empty($_X['metraj'])?z(36,$_X['metraj'],2,1):''?>) metresinden küçük bir sayı giriniz.");
            }
            //alert(yeniMetre);
        }while(yeniMetre);

    }
</script>

<?Php if(z(8,'yazdir')){?><script type="text/javascript">window.print();</script><?Php }?>
<?Php }else _uyr(2,'Bu girdi yöneticiler tarafından silinmiş.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>