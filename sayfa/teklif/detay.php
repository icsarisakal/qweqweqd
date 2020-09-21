<?php 
//yukardaki link de yazan parametreleri okumayı saylayan kjod yapısıdır
if(!empty($KOD)){
  $kodx=false;
  $id=z(34,$KOD,1);
  ?>
  <style type="text/css">
    .gizleyeni{
      display:none !important;
    }
    .mailgonderimi{
      background: #1cff00;
      color: white;
      border: 1px solid #ddd;
      padding-top: 5px;
      padding-bottom: 5px;
      font-weight: bolder;
      font-size: large;
    }
  </style>
<?php }
else{
  $id=z(8,'id');
  $kodx=true;
}
//$paylasimUrl = $ayr['siteUrl'].'/paylasim/?teklif='.z(34,$id);
//$file = file_get_contents($paylasimUrl, FILE_USE_INCLUDE_PATH);
//echo $file;


$_X=z(1,$id,'','teklif');// yukardan gelen parqametreye göre  teklif tanlosunun veri tablosunu cekme
//print_r($_X);
if(!empty($_X)&&$_X['arsiv']!='-1'){

  $_X['iskonto']=!empty($_X['iskonto'])?z(36,$_X['iskonto']):0;
?>
<style type="text/css">
  .mailgonderimi{
    background: #1cff00;
    color: white;
    border: 1px solid #ddd;
    padding-top: 5px;
    padding-bottom: 5px;
    font-weight: bolder;
    font-size: large;
  }
</style>
<?php $fm=0; ?>

<?php if(!empty($_X['firma_ID'])) { $firmaid=$_X['firma_ID']; $firmaoku=z(1,$firmaid,'','firma');}?>
<?php if(!empty($_X['kisi_ID'])) { $kisiid=$_X['kisi_ID']; $kisioku=z(1,$kisiid,'','kisi'); } ?>
<?php if(z(8,'musid','sayi')){ ?>
  <?php 
  $musterid=z(8,'musid'); 
  $musterisorgu="WHERE arsiv = 0 AND ID = ".$musterid;
  $musteritbl=z(1,$musterisorgu,'','musteritakip');
  if(!empty($musteritbl)){$fm=$musteritbl[0]['firma_ID'];}
  ?>
  <input type="hidden" name="<?php echo $tbl; ?>[musteritakip_ID]" value="<?php echo $musterid ?>">
<?php } ?>


<?php switch(z(33,'ekle')){
  case -1:_uyr(0,'Kayıt başarısız.');break;
  case 1:_uyr(1,'Teklif başarıyla oluşturuldu.');break;
  case 3:_uyr(2,'<strong>'.$_X['ad'].'</strong> daha önceden kaydedilmiş. Lütfen başka bir isim kullanınız.');break;
  case 11:_uyr(2,'Lütfen adı giriniz.');break;
  case 12:_uyr(2,'Lütfen bir müşteri seçiniz.');break;
  case 13:_uyr(2,'Lütfen fiyat belirtiniz.');break;
}?>
<?php switch(z(33,'duzenle')){
  case -1:_uyr(0,'Kayıt başarısız.');break;
  case 1:_uyr(1,'Teklif güncelleme işlemi başarı ile gerçekleştirildi.');break;
}?>
<?php switch(z(33,'detay')){
  case -1:_uyr(0,'Kayıt başarısız.');break;
  case 1:_uyr(1,'Teklif Mail Gönderimi Başarıyla Gerçekleştirildi.');break;
}?>

<div style="text-align: center;">

  <div class="blok">
    <div class="gizleyeni mailgonderimi" style="display: none;">
      Mail Gönderimi Başarıyla Gerçekleştirildi.
    </div>
    <div id="table-scroll" class="table-scroll">
      <?php 
      if(empty($_X['proformaNo'])){
        $nesneProformaNo=z(1,array('ad'=>'teklifAyar','metin1'=>'proformaNo'),'ID,sayi1','nesne');
        $proformaNo='HNC'.$nesneProformaNo[0]['sayi1'];
        $_X['proformaNo']= $proformaNo;
      }
      ?>
      <table cellspacing="0" cellpadding="0" border="0" id="main-table" class="main-table">
        <thead>
          <tr>
            <td colspan="2"><h1><div class="mtlogo"><a href="./"><img src="<?php echo $ayr['siteUrl']; ?>/img/logo2.jpg" alt="" width="250"></a></div></h1></td>
            <td colspan="2"><h1><b>HNC Eğitim ve Görüntü Tekn.San.Tic.Ltd.Şti.</b></h1></td>
          </tr>
        </thead>

        <?php
        if(!empty($firmaoku['eposta'])){
          $gidenmail=$firmaoku['eposta'].' e-posta adresine teklif formunu göndermek istediğinizden emin misiniz?';
        } elseif (!empty($kisioku['eposta'])) {
          $gidenmail=$kisioku['eposta'].' e-posta adresine teklif formunu göndermek istediğinizden emin misiniz?';
        } else {
          $gidenmail="İlgili kuruma ait e-posta adresi tanımlanmamış. Lütfen, kuruma veya ilgili kişisine e-posta adresi tanımlayıp tekrar deneyiniz.";
        }
        ?>
        <?php $_Nesne=z(37,z(1,"WHERE ad='teklifdurum'",'ID,ad,metin1','nesne')); ?>

        <thead>
          <tr class="printx">
            <th colspan="2"></th>
            <th colspan="2">
              <a href="?s=teklif&a=duzenle&id=<?php echo z(8,'id'); ?>" class="btn btn-warning printx gizleyeni" style="width:76px;height:35px;"><h2>Düzenle</h2></a>
              <a href="javascript:window.print()" class="btn btn-warning printx" style="width:70px;height:35px;"><h2>Yazdır</h2></a>
              <a href="?s=teklif&a=mailgonder&id=<?php echo $id;?>" onclick="return confirm('<?php echo $gidenmail; ?>')" class="btn btn-primary printx gizleyeni" style="width:130px;height:35px;"><h2>Mail Gönder</h2></a>
            </th>
          </tr>
          <tr>
            <td colspan="3">
              <h2>
                <?php 
                    switch($_X['tip']){
                      case 0:
                      case 1:
                        echo 'TEKLİF';
                        break;
                      case 2:
                        echo 'PROFORMA FATURA';
                        break;
                      case 3:
                        echo 'SÖZLEŞME';
                        break;
                    }
                ?>
              </h2>
            </td>
            <td colspan="2"><h2>TARİH: <?php echo !empty($_X['tarihKayit'])?z('tarih',$_X['tarihKayit']):''?></h2></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="15%">Proforma No</td>
            <td><b><?php echo !empty($_X['proformaNo'])?$_X['proformaNo']:''?><?php if(!empty($_X['revizeNo'])&&$_X['teklif_ID']!=0){ echo '(RVZ'.$_X['revizeNo'].')'; } ?></b></td>
            <td width="15%">Satıcı</td>
            <td><b>HNC Eğitim ve Görüntü Teknolojileri San.Tic ltd.Şti.</b></td>
          </tr>

          <tr>
            <td>Firma</td>
            <td>
              <b><?php if(!empty($firmaoku['ad'])){ echo $firmaoku['ad']; } else { echo 'Firma Seçilmemiş'; }?></b>
            </td>
            <td width="10%">Adres</td>
            <td><b>Sevildik Mah. 2291.Sk No:15-2 Merkezefendi-Denizli</b></td>
          </tr>
          <tr>
            <td width="15%">Vergi D - Vergi No</td>
            <td><b><b class="vergid"></b><?php if(!empty($firmaoku['vergiD'])){echo $firmaoku['vergiD'];} if(!empty($firmaoku['vergiNo'])){ echo $firmaoku['vergiNo'];}?><b class="vergino"></b></b></td>  
            <td width="10%">Vergi No</td>
            <td><b>Gökpınar V.D.-457 054 6215</b></td>
          </tr>
          <tr>
            <td id="kisiler">Kişi</td>
            <td>
              <b><?php if(!empty($kisioku['ad'])){echo $kisioku['ad'];} if(!empty($kisioku['soyad'])){ echo $kisioku['soyad'];}?></b>
            </td>      
            <td width="15%">Telefon</td>
            <td><b>0258 261  5261-0543 669 6692</b></td>
          </tr>
          <tr>
            <td width="15%">Adres</td>
            <td><b><?php echo $firmaoku['adresFatura']?></b></td>
            <td width="10%">E-mail</td>
            <td><b>hnc@hnckilittahta.com - www.hnckilittahta.com</b></td>
          </tr>
        </tbody>

      </table>
  <?php /* ?>
  <table cellspacing="0" cellpadding="0" border="0" id="main-table" class="main-table">
    <tbody>
      <td width="20"></td>
      <td width="60">
        <select class="select2" id="select1">
          <option value="0" selected>Ürün Seçiniz/Ekleyiniz</option>
          <?php $urun=z(1,'','','urun'); ?>
          <?php if(!empty($urun)){ foreach ($urun as $ur) { ?>
            <option value="<?php echo $ur['ID'] ?>"><?php echo $ur['ad'] ?></option>
          <?php } } ?>
        </select>
      </td>
      <td width="20"></td>
    </tbody>
    </table>*/?>
    <?php if(!empty($urun)){ foreach ($urun as $ur) { ?>

    <?php } }  ?>

    <table cellspacing="0" cellpadding="0" border="0" id="main-table" class="main-table uruntablosu">
      <thead>
        <tr>
          <td width="25%"><h3>Ürün:</h3></td>       
          <td width="35%"><h3>Model / Özellikler:</h3></td>       
          <td width="10%"><h3>Adet</h3></td>
          <td width="10%"><h3>Fiyat</h3></td>
          <td  width="14%"><h3>Toplam</h3></td>
        </tr>
      </thead>
      <?php if(!empty($_X['ID'])){$turuncek=z(1,array('teklif_ID'=>$_X['ID']),'','teklifurun');} ?>
      <?php $uruntopla=0; ?>
      <?php if(!empty($turuncek)){ foreach ($turuncek as $turun) { ?>
        <?php $uruntopla += $turun['toplam']; ?>
        <tbody id="tb_<?php echo $turun['ID'];?>" class="we-tbody">
          <tr>
            <td><img src="<?php echo $ayr['siteUrl']; ?>/upload/urun/<?php if(!empty($turun['img'])){echo $turun['img'];}?>" style="width: 60%;"></td>
            <td style="height:1px;"><?php if(!empty($turun['ozellik'])){ _z('metin',$turun['ozellik']);}?></td>
            <td>
              <?php if(!empty($turun['adet'])){ _z(36,$turun['adet']); }?>
            </td>
            <td>
              <?php if(!empty($turun['fiyat'])){ _z(36,$turun['fiyat'],2,1); }?> <?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?>
            </td>
            <td>
              <?php if(!empty($turun['toplam'])){ _z(36,$turun['toplam'],2,1); }?> <?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?>
            </td>
          </tr>
        </tbody>
      <?php } } ?>
    </table>
    <table cellspacing="0" cellpadding="0" border="0" id="main-table" class="main-table">
      <thead>
        <tr>
          <td width="40%">Banka Detayları</td>       
          <td width="15%">Toplam</td>
          <td width="15%">KDV<br><span style="color:red;font-size:8px;">(Teşvik belgeleri varsa kdv 0 olacak)</span></td>
          <?php if(!empty($_X['iskonto'])){ ?><td width="15%">İskonto<br><span style="color:red;font-size:8px;">(Uygulanan iskonto değeri)</span></td><?php } ?>
          <td  width="30%">Genel Toplam</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td width="40%">
            İş Bankası: TR21 0006 4000 0013 2060 0870 85<br>
            Ziraat Bankası: TR93 000 1 0020 6564 9652 7150 01<br>
            Garanti Bankası: TR85 0006 2001 3950 0006 2994 47<br>
            Teb Bankası: TR44 0003 2000 0000 0035 4133 44
          </td>
          <td width="15%"><?php _z(36,$uruntopla,2,1); ?> <?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?></td> 
          <td width="15%"><?php if(!empty($_X['kdv'])){ echo z('sayi',$_X['kdv'],2);} ?>%</td>
          <?php if(!empty($_X['iskonto'])){ ?><td width="15%"><?php if(!empty($_X['iskonto'])){ echo z('sayi',$_X['iskonto'],2);} ?> <?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?></td><?php } ?>
          <td width="30%"><?php if(!empty($_X['kdv'])){ $kdvhesapla=$_X['kdv']/100; $geneltoplam=($uruntopla*$kdvhesapla)-$_X['iskonto']; _z(36,$uruntopla+$geneltoplam,2,1); } ?> 
            <?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?>
          </td>
        </tr>
      </tbody>
    </table>



    <table cellspacing="0" cellpadding="0" border="0" class="main-table">
      <tbody>

        <tr>
          <td>
            <h3>Şartlar:</h3>
          </td> 
        </tr>
        <tr>
          <td width="100%">
            <div class="eksozlesme" style="text-align: left; padding-left:1em;">
              <?php 
              switch ($_X['tip']) {
                 case 1:
                   echo '• Bu bir teklif formudur.';
                   break;
                 case 2:
                   echo '• Bu bir proforma faturadır.';
                   break;
                 case 0:
                 case 3:
                   echo '• Bu bir sipariş anlaşmasıdır. (Not: Bu sözleşme, sözleşme tarihi ile birlikte 5 iş günü için geçerlidir.)';
                   break;
                 
                 default:
                   # code...
                   break;
               } ?>
              <br>
              • Bu teklif <b><?php echo !empty($_X['pb'])?$PB[$_X['pb']]:''; ?></b> biriminden hazırlanmıştır.<br>
              • Ödeme şekli: <b><?php echo !empty($_X['nesne_IDodemeSekli'])?z(1,$_X['nesne_IDodemeSekli'],'metin1','nesne'):''; ?></b>
              <?php  echo !empty($_X['odemeSekliAciklama'])?z('metin',$_X['odemeSekliAciklama']):''; ?>
              <br>
              • Kurum Teşvik kullanacaksa, proformada belirtilen ürünler kalem kalem teçhizat listesinde olmalıdır. Aksi taktirde listede KDV'li fatura düzenlenecektir<br>
              • Ön Ödeme ve diğer ödeme şartları yerine getirilmez ise bu sözleşme otomatik olarak iptal olur.<br>
              • Sözleşme tarihinden sonra Teslim süresine ve tüm ödeme koşulları gerçekleşene kadar geçen süreçte dövize dayalı tedarik ürünlerinin bulunmasından dolayı piyasa kur farkı %12 üzerine çıktığı takdirde satıcı firma sözleşmede değişiklik talebinde bulunabilir veya sözleşmeyi tek taraflı fesh edebilir.<br>
              • Oluşabilecek anlaşmazlıklarda Denizli mahkemeleri yetkilidir.<br>
              <?php
              $tkuruncek=z(1,"WHERE teklif_ID = ".z(8,'id'),'','teklifurun');
              ?>
              <?php if(z(8,'a')=='detay'){
                $urunsorgu="WHERE arsiv = 0 ";
                $sayicontrol=0;
                if(!empty($tkuruncek)){
                  foreach ($tkuruncek as $sc) {
                    if($sayicontrol==0){
                     $urunsorgu.=" AND ID = ".$sc['urun_ID'];
                     $sayicontrol=1;
                   }
                   if($sayicontrol==1){
                     $urunsorgu.=" OR ID = ".$sc['urun_ID'];
                     $sayicontrol=1;
                   }
                 }
               }
               $uruncek=z(1,$urunsorgu,'','urun');
               foreach ($uruncek as $ucek) {
                echo !empty($ucek['sartlar'])?z('metin',$ucek['sartlar']).'<br>':'';
              }
            } ?>
          </div>
        </td>
      </tr>
    </tbody>
  </table>



  <table cellspacing="0" cellpadding="0" border="0" >
    <colgroup>
      <col width="32%" />
      <col width="34%" />
    </colgroup>
    <tbody>

      <tr>
        <th>Özel Not</th>
        <th>Alıcı Firma Kaşe İmza</th>
        <th>Üretici Firma Kaşe İmza</th>
      </tr>
      <tr>
        <td rowspan="2" style="text-align: left; padding-left: 20px;"><?php echo !empty($_X['aciklama'])?z('metin',$_X['aciklama']):'' ?></td>
        <td><div class="firmacek" style="font-size: 18px; font-weight: 600;"><?php if(!empty($firmaoku['ad'])){ echo $firmaoku['ad']; } else { echo 'Firma Seçilmemiş'; }?></div></td>
        <td><div style="font-size: 15px; font-weight:600;"><?php echo $ayr['firmaUzunAd'] ?></div></td>
      </tr>
      <tr style="height: 100px;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

    </tbody>
  </table>
  <?php if(!empty($_X['ek'])){ ?>
    <div style="width: 100%; background: white; float: left;padding:4px; box-sizing: border-box;" class="printx">
      <h2 style="float: left; width: 100%; text-align: left; margin-bottom: 4px;">Dosya Ekleri;</h2>
      <a href="/upload/ek/<?php echo $_X['ek']; ?>" target="_blank" style="border-radius: 20px; border: 1px solid #ddd; width: 25%; float: left; text-decoration: none; color:black;font-weight: bold;"><?php echo $_X['ek']; ?></a>
    </div>
    <div style="width: 100%; background: white;padding:4px;" class="printy">
      Bu teklifte ek bulunmaktadır.
    </div>
    <p style="background: white;" class="printx">&nbsp;</p>
  <?php } ?>
  
</div>
</div>

</div>

<style type="text/css">
  .sozlesmeli{
    margin-top: 4px;
    margin-bottom: 4px;
    text-align: left;
    padding-left: 1em;
  }
  .sozlesmeul{
    font-size: 12px;
    list-style: none;
  }
  .sozclickle{
    float: right;
    margin-right: 10px;
    cursor: pointer;
    color: white;
    width: 16px;
  }
  table{
    max-width: 1200px; 
    border:0;
  }
  table tr td{  background-color: white; }
  table tr td:last-child{  border-right:0; }
  table tr th:last-child{  border-right:0; }
            /*/
            .blok{ 
              border-radius: 24px; border:1px solid #fff; overflow: hidden;
              -webkit-box-shadow: 0 0 9px 4px rgba(0,0,0,0.1); 
              -moz-box-shadow: 0 0 9px 4px rgba(0,0,0,0.1);
              box-shadow: 0 0 9px 4px rgba(0,0,0,0.1); 
            }
            /*/
            form{ text-align: center; }
          </style>
          <script>document.getElementsByTagName('title')[0].innerText="<?php echo z(56,(!empty($_X['proformaNo'])?$_X['proformaNo']:'').' '.(!empty($firmaoku['ad'])?$firmaoku['ad']:''))
//.' '.(!empty($_X['tarihKayit'])?z('date',$_X['tarihKayit']):'')
          ; ?>";</script>
<?php } else { echo 'Veri silindiği için görüntülenemiyor'; } ?>