<style>
  .table-scroll{
    display:none;
  }
  table{
    display:none;
  }
</style>
<?php 
$id=z(8,'id');//yukardaki link de yazan parametreleri okumayı saylayan kjod yapısıdır
$_X=z(1,$id,'','teklif');// yukardan gelen parqametreye göre  teklif tanlosunun veri tablosunu cekme

if(!empty($_X['firma_ID'])) { $firmaid=$_X['firma_ID']; $firmaoku=z(1,$firmaid,'','firma');}
if(!empty($_X['kisi_ID'])) { $kisiid=$_X['kisi_ID']; $kisioku=z(1,$kisiid,'','kisi');}
 ?>
<script type="text/javascript">
  function hesapla(id) {
    var adet = sy($('tbody#tb_'+id+' tr td .n1').val());
    var fiyat = sy($('tbody#tb_'+id+' tr td .n2').val());
    $('tbody#tb_'+id+' tr td .result').val(sy(adet * fiyat,2));

    topla();
  }
  function hesapla2() {
    var toplam2 = sy($('.toplam').val());
    var kdv2 = sy($('.kdv').val());
    var kdvhesapla2 = kdv2 / 100;
    var iskonto2 = sy($('.iskonto').val());
    //var iskontohesapla2 = iskonto2 / 100;
    //$('.geneltoplam').val(toplam2 * kdvhesapla2 + toplam2 - iskontohesapla2 );
    $('.geneltoplam').val(toplam2 * kdvhesapla2 + toplam2 - iskonto2 );

    topla();
  }
  function topla(){
    var total = 0;
    $(".we-tbody").each(function(e){
      total += sy( $(this).children("tr").children("td").children(".result").val() );
    });
    $('.toplam').val(sy(total,2));

    var kdv = sy($(".kdv").val());
    if(kdv==0){
      var geneltoplam=sy(total);
    } else {
      var kdvhesapla = kdv / 100;
      var geneltoplam = total * kdvhesapla + total; 
    }
    var iskonto = sy($(".iskonto").val());
    var iskontosuztoplam = geneltoplam;
    if(iskonto!=0){
      //var iskontohesapla = iskonto / 100;
      //var geneltoplamiskonto = geneltoplam * iskontohesapla;
      //var geneltoplam = geneltoplam - geneltoplamiskonto ;
      geneltoplam -= iskonto;
    }
    $('.geneltoplam').val(sy(geneltoplam,2));
    $('.fiyatiskontosuz').val(sy(iskontosuztoplam,2));

  }
  var urunGeciciHafiza={};
  function hafizayaAl(){
    var j = 0;
    $(".we-tbody").each(function(e){ j++;
      urunGeciciHafiza[j] = { 
        "result" : sy( $(this).children("tr").children("td").children(".result").val() ),
        "n1" : sy( $(this).children("tr").children("td").children(".n1").val() ),
        "n2" : sy( $(this).children("tr").children("td").children(".n2").val() ),
      };
    });
    console.log("Ürünler geçici hafızaya alındı");
    console.log(urunGeciciHafiza);
  }
  function hafizadanGeriYukle(){
    var j = 0,i=0;
    $(".we-tbody").each(function(e){ 
      if(i>0){ j++;
        $(this).children("tr").children("td").children(".result").val( sy(urunGeciciHafiza[j]['result'],2) );
        $(this).children("tr").children("td").children(".n1").val( sy(urunGeciciHafiza[j]['n1'],2) );
        $(this).children("tr").children("td").children(".n2").val( sy(urunGeciciHafiza[j]['n2'],2) );
      }
      i++;
    });
    console.log("Geçici hafıza yüklendi");
  }

  function firma(){
    var firma=$(".firmalar option:selected").text();
    $(".firmacek").text(firma);
  }
  $( document ).ready(function() {
    window.eklenenUrun=[];
    $('.firmalar').change(function() {
      firma();
    });
    firma();
    topla();
  });
 
  function sil(ths){
    console.log(ths);
    var sozlesmeMetni = $("#sozlesmeMetni").val();
    var silnumber = $(ths).parent().children('.urunid').val();
    $(ths).parent().parent().parent().remove();
    var sartsil=".sozlesmeli"+silnumber;
    $(sartsil).parent().remove();
    delete window.eklenenUrun[silnumber];
    topla();
  }
</script>
<?php 
$urun=z(1,array('arsiv'=>'0'),'','urun'); 
$teklifurun=z(1,array('teklif_ID'=>z(8,'id'),'arsiv'=>0),'','teklifurun'); ?>
 <script type="text/javascript">
$(document).ready(function() {
  <?php if(!empty($teklifurun)){ foreach ($teklifurun as $ur) { ?>
    window.eklenenUrun[<?php echo $ur['urun_ID'];?>]={"sartlar":"<?php echo $ur['urun_ID'];?>"};
  <?php } }  ?>
});
</script>
<?php $fm=0; ?>
<?php if(z(8,'musid','sayi')){ ?>
  <?php 
  $musterid=z(8,'musid'); 
  $musterisorgu="WHERE arsiv = 0 AND ID = ".$musterid;
  $musteritbl=z(1,$musterisorgu,'','musteritakip');
  if(!empty($musteritbl)){$fm=$musteritbl[0]['firma_ID'];}
  ?>
  <input type="hidden" name="<?php echo $tbl; ?>[musteritakip_ID]" value="<?php echo $musterid ?>">
<?php } ?>
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
        <td colspan="1"><h1><div class="mtlogo"><a href="./"><img src="./img/logo2.jpg" alt="" width="250"></a></div></h1></td>
        <td colspan="4"><h1><b>HNC Eğitim ve Görüntü Tekn.San.Tic.Ltd.Şti.</b></h1></td>
      </tr>
      <tr>
        <td colspan="3"><h2>
        	<label><input type="radio" name="<?php echo $tbl?>[tip]" <?php echo empty($_X['tip'])||$_X['tip']==1?'checked':'' ?> required="required" value="1" /> TEKLİF</label>
        	<label><input type="radio" name="<?php echo $tbl?>[tip]" <?php echo !empty($_X['tip'])&&$_X['tip']==2?'checked':'' ?> required="required" value="2" /> PROFORMA FATURA</label>
        	<label><input type="radio" name="<?php echo $tbl?>[tip]" <?php echo !empty($_X['tip'])&&$_X['tip']==3?'checked':'' ?> required="required" value="3" /> SÖZLEŞME</label>
        </h2></td>
        <td colspan="2"><h2>TARİH: <?php slctrh($tbl.'[tarihKayit]',!empty($_X['tarihKayit'])?$_X['tarihKayit']:'')?></h2></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width="15%">Proforma No</td>
        <td><input type="text" name="<?php echo $tbl?>[proformaNo]"  required="required" value="<?php echo !empty($_X['proformaNo'])?$_X['proformaNo']:''?>" autocomplete="off"></td>
        <td width="15%">Satıcı</td>
        <td><b>HNC Eğitim ve Görüntü Teknolojileri San.Tic ltd.Şti.</b></td>
      </tr>

      <tr>
        <td>Firma</td>
        <td>
          <?php echo select(Array('name'=>$tbl.'[firma_ID]','detay'=>'id="selectfirma" class="firmalar firmalarjson"','t'=>'firma','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['firma_ID'])?$_X['firma_ID']:$fm)); ?>
        </td>
        <td width="10%">Adres</td>
        <td><b>Sevildik Mah. 2291.Sk No:15-2 Merkezefendi-Denizli</b></td>
      </tr>

      <tr>
        <td width="15%">Vergi D - Vergi No</td>
        <td><b class="vergid"></b> <?php if(!empty($firmaoku['vergiD'])){echo $firmaoku['vergiD'].' - ';} if(!empty($firmaoku['vergiNo'])){ echo $firmaoku['vergiNo'];}?> <b class="vergino"></b></td>
        <td width="10%">Vergi No</td>
        <td><b>Gökpınar V.D.-457 054 6215</b></td>
      </tr>

      <tr>
        <td id="kisiler">Kişi</td>
        <td>
          <?php echo select(Array('name'=>$tbl.'[kisi_ID]','detay'=>'id="selectkisi" class="selectkisi"','t'=>'kisi','alan'=>'ID,ad','ayrac'=>' /// ','sd'=>"",'icerik'=>'<option value="">Seçiniz</option><option value="yeni">**YENİ**</option>','sec'=>!empty($_X['kisi_ID'])?$_X['kisi_ID']:0)); ?>
        </td>      
        <td width="15%">Telefon</td>
        <td><b>0258 261  5261-0543 669 6692</b></td>
      </tr>

      <tr>
        <td width="15%">Adres</td>
        <td><b class="firmadres"><?php if(!empty($firmaoku['adresFatura'])){ echo $firmaoku['adresFatura']; }?></b></td>
        <td width="10%">E-mail</td>
        <td><b>hnc@hnckilittahta.com-www.hnckilittahta.com</b></td>
      </tr>

    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0" class="main-table">
    <tbody>
      <tr>
        
        <?php /* ?> <td width="40">
          <select class="select2" name="<?php echo $tbl; ?>[durum]">
            <option value="0">Seçiniz..</option>
            <?php $teklifdurum=z(1,array('ad'=>'teklifdurum'),'','nesne'); ?>
            <?php foreach ($teklifdurum as $td) { ?>
              <option value="<?php echo $td['ID']; ?>" <?php if(!empty($_X['durum'])&&$td['ID']==$_X['durum']){echo 'selected';} ?>><?php echo $td['metin1']; ?></option>
            <?php } ?>
          </select>
        </td>*/?>
        <td width="60">
          <select class="select2" id="select1">
            <option value="0" selected>Ürün Seçiniz/Ekleyiniz</option>
            <?php if(!empty($urun)){ foreach ($urun as $ur) { ?>
              <option value="<?php echo $ur['ID'] ?>"><?php echo $ur['ad'] ?></option>
            <?php } } ?>
          </select>
        </td>

      </tr>
    </tbody>
  </table>

  <script type="text/javascript">
    $(document).ready(function(){
      <?php if(!empty($_X['firma_ID'])){?>
        var firma_ID = <?php echo $_X['firma_ID']; ?>;
      <?php } ?>
      <?php if(!empty($musteritbl)){?>
        var firma_ID = <?php echo $musteritbl[0]['firma_ID']; ?>;
        $.ajax({
          type:"POST",
          url:"ajaxayar.php?s=teklif&a=firma-json&firma="+firma_ID,
          success:function(gelensorgu){
          //alert('sa');
          if(gelensorgu.sonuc==1){
                //console.log(gelensorgu.cevap.firma);
                var firma=gelensorgu.cevap.firma;
                var kisi=gelensorgu.cevap.kisi;
                if(firma!=null){
                  if(firma.vergiD){
                    $(".vergid").text(firma.vergiD);
                  }
                  if(firma.vergiNo){
                    $(".vergino").text(firma.vergiNo);
                  }
                  if(firma.adresFatura){
                    $(".firmadres").text(firma.adresFatura);
                  }
                }
                if(kisi!=null){
                  $('#selectkisi option').remove();
                  $.each(kisi, function(k, v) {
                    $('<option>').val(v.ID).text(v.ad+" "+v.soyad).appendTo('#selectkisi');
                  });
                } else{
                  $('#selectkisi option').remove();
                }
              } else {
                alert('Firma okuma başarısız');
              }
            }
          });
      <?php } ?>
      <?php if(!empty($_X['kisi_ID'])){?>
        var kisi_ID = <?php echo $_X['kisi_ID']; ?>;
      <?php } ?>
      $('.firmalarjson').change(function() {
        var firma_ID = selectfirma.options[selectfirma.selectedIndex].value;
        $.ajax({
          type:"POST",
          url:"ajaxayar.php?s=teklif&a=firma-json&firma="+firma_ID,
          success:function(gelensorgu){
            if(gelensorgu.sonuc==1){
                //console.log(gelensorgu.cevap.firma);
                var firma=gelensorgu.cevap.firma;
                var kisi=gelensorgu.cevap.kisi;
                if(firma!=null){
                  if(firma.vergiD){
                    $(".vergid").text(firma.vergiD);
                  }
                  if(firma.vergiNo){
                    $(".vergino").text(firma.vergiNo);
                  }
                  if(firma.adresFatura){
                    $(".firmadres").text(firma.adresFatura);
                  }
                }
                if(kisi!=null){
                  $('#selectkisi option').remove();
                  $.each(kisi, function(k, v) {
                    $('<option>').val(v.ID).text(v.ad+(v.soyad?" "+v.soyad:"")).appendTo('#selectkisi');
                  });
                } else{
                  $('#selectkisi option').remove();
                }
              } else {
                alert('Firma bulunamadı.');
              }
            }
          });
      });

      $("[name='teklif[tip]']").change(function(){
      	switch($("[name='teklif[tip]']:checked").val()){
      		case "1":
      			$('.sozlesme1').text("• Bu bir teklif formudur.");
      			break;
      		case "2":
      			$('.sozlesme1').text("• Bu bir proforma faturadır.");
      			break;

      		default:
      			$('.sozlesme1').text("• Bu bir sipariş anlaşmasıdır.  (Not: Bu sözleşme, sözleşme tarihi ile birlikte 5 iş günü için geçerlidir.)");
      			break;
      	}
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){

      <?php if(!empty($_X['teklif_ID'])){?>
        var teklif_ID = <?php echo $_X['teklif_ID']; ?>;
      <?php } ?>
      $('#select1').change(function() {
        var teklif_ID = select1.options[select1.selectedIndex].value;
        console.log(teklif_ID);
        if(teklif_ID>0){
          $.ajax({
            type:"POST",
            url:"ajaxayar.php?s=teklif&a=urunlist&uruncek="+teklif_ID,
            success:function(gelensorgu){
              if(gelensorgu.sonuc==1){
          //console.log(gelensorgu.cevap.kisi);

          var urun=gelensorgu.cevap.urun;
          if(urun!=null&&!eklenenUrun[urun.ID]){
            var sartext = $(".sartext").val();
            var uruntb=sartext+'\n'+urun.sartlar;
            window.eklenenUrun[urun.ID]={'sartlar':urun.ID};
            var sarttext = '<li class="sozlesmeli"><span class="sozlesmetext sozlesmeli'+urun.ID+'">'+urun.sartlar+'</span></li>';
            $(".eksozlesme").html(sarttext+$(".eksozlesme").html());

            hafizayaAl();
            $(".uruntablosu").html('<tbody id="tb_'+urun.ID+'" class="we-tbody">\
              <td><img src="upload/urun/'+urun.img+'" style="width: 60%;"></td>\
              <td style="height:1px;"><textarea  name="turun['+urun.ID+'][ozellik]" style="width:100%; height: 90px;margin: 0px;padding: 0px;overflow: hidden;">'+urun.aciklama+'</textarea></td>\
              <td><input type="text" name="turun['+urun.ID+'][adet]"  onkeyup="hesapla('+urun.ID+')" required="required" autocomplete="off" class="n1" value="1"></td>\
              <td><input type="text" name="turun['+urun.ID+'][fiyat]"  onkeyup="hesapla('+urun.ID+')" required="required" autocomplete="off" class="n2" value="'+sy(urun.fiyat,2)+'"></td>\
              <td><input type="text" name="turun['+urun.ID+'][toplam]"  required="required" autocomplete="off" class="result" value="'+sy(urun.fiyat,2)+'"></td>\
              <input type="hidden" name="turun['+urun.ID+'][urun_ID]" value="'+urun.ID+'">\
              <input type="hidden" name="turun['+urun.ID+'][img]" value="'+urun.img+'">\
              <td><input type="hidden" value="'+urun.ID+'" class="urunid"><a href="#" onclick="sil(this)" class="urunsil">Sil</td>\
              </tbody>'+$(".uruntablosu").html());
            hafizadanGeriYukle();
            topla();


          } else{
            $('#urunler option').remove();
          }
        } else {
          alert('Ürün okuma başarısız');
        }
      }
    });
        }
      });
    });
  </script>
  <script type="text/javascript">
    topla();
  </script>

  <table cellspacing="0" cellpadding="0" border="0" class="main-table uruntablosu">
    <thead>
      <tr>
        <td width="25%"><h3>Ürün:</h3></td>       
        <td width="35%"><h3>Model / Özellikler:</h3></td>       
        <td width="10%"><h3>Adet</h3></td>
        <td width="10%"><h3>Fiyat</h3></td>
        <td  width="14%"><h3>Toplam</h3></td>
        <td  width="6%" class="islemler"><h3>İşlemler</h3></td>
      </tr>
    </thead>

    <?php if(!empty($_X['ID'])){$turuncek=z(1,array('arsiv'=>0,'teklif_ID'=>$_X['ID']),'','teklifurun');} ?>
    <?php if(!empty($turuncek)){ foreach ($turuncek as $turun) { ?>
    <tbody id="tb_<?php echo $turun['ID'];?>" class="we-tbody">
      <tr>
        <td><img src="<?php echo $ayr['siteUrl']; ?>/upload/urun/<?php if(!empty($turun['img'])){echo $turun['img'];}?>" style="width: 60%;"></td>
        <td style="height:1px;"><textarea name="turun[<?php echo $turun['ID'];?>][ozellik]" style="width:100%; height: 100%;margin: 0px;padding: 0px;overflow: hidden;"><?php if(!empty($turun['ozellik'])){echo $turun['ozellik'];}?></textarea></td>
        <td><input type="text" name="turun[<?php echo $turun['ID'];?>][adet]"  value="<?php if(!empty($turun['adet'])){ _z(36,$turun['adet']);}?>" onkeyup="hesapla(<?php echo $turun['ID'];?>)" required="required" autocomplete="off" class="n1" value="1"></td>
        <td><input type="text" name="turun[<?php echo $turun['ID'];?>][fiyat]"  value="<?php if(!empty($turun['fiyat'])){ _z(36,$turun['fiyat'],2);}?>" onkeyup="hesapla(<?php echo $turun['ID'];?>)" required="required" autocomplete="off" class="n2" value="2"></td>
        <td><input type="text" name="turun[<?php echo $turun['ID'];?>][toplam]"  value="<?php if(!empty($turun['toplam'])){ _z(36,$turun['toplam'],2);}?>" required="required" autocomplete="off" class="result" value="2"></td>
        <td>
          <input type="hidden" name="turun[<?php echo $turun['ID'];?>][urun_ID]" value="<?php if(!empty($turun['urun_ID'])){echo $turun['urun_ID'];}?>">
          <input type="hidden" name="turun[<?php echo $turun['ID'];?>][ID]" value="<?php if(!empty($turun['ID'])){echo $turun['ID'];}?>">
          <input type="hidden" name="turun[<?php echo $turun['ID'];?>][teklif_ID]" value="<?php if(!empty($turun['teklif_ID'])){echo $turun['teklif_ID'];}?>">
          <input type="hidden" name="turun[<?php echo $turun['ID'];?>][img]" value="<?php if(!empty($turun['img'])){echo $turun['img'];}?>">
          <input type="hidden" value="<?php if(!empty($turun['urun_ID'])){echo $turun['urun_ID'];}?>" class="urunid"><a href="#" onclick="sil(this)" class="urunsil">Sil</a>
        </td>
      </tr>
    </tbody>
    <?php } } ?>

  </table>


  <table cellspacing="0" cellpadding="0" border="0" class="main-table">
    <colgroup>
      <col width="30%" />
    </colgroup>
    <thead>
      <tr>
        <td><h3>Banka Detayları:</h3></td>       
        <td><h3>Toplam</h3></td>
        <td><h3>KDV<br><span style="color:red;font-size:10px;">(Teşvik belgeleri varsa kdv 0 olacak)</span> </h3></td>
        <td><h3>İskonto<br><span style="color:red;font-size:10px;">(Genel toplama iskonto uyarlayın)</span> </h3></td>
        <td><h3>Genel Toplam</h3></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          İş Bankası: TR21 0006 4000 0013 2060 0870 85<br><br>
          Ziraat Bankası: TR93 000 1 0020 6564 9652 7150 01<br><br>
          Garanti Bankası: TR85 0006 2001 3950 0006 2994 47<br><br>
          Teb Bankası: TR44 0003 2000 0000 0035 4133 44
        </td>
        <td><h3><font color="red"><input type="text"  class="toplam" onkeyup="hesapla2()" required="required"  autocomplete="off"></font></h3></td>
        <td><h3><font color="red"><input type="text"  name="<?php echo $tbl; ?>[kdv]" class="kdv" onkeyup="hesapla2()" required="required" autocomplete="off" value="<?php echo !empty($_X['kdv']) ? z('sayi',$_X['kdv'],2) : '18'; ?>" ></font>%</h3></td>
        <td>
          <h3><font color="red"><input type="text"  name="<?php echo $tbl; ?>[iskonto]" class="iskonto" onkeyup="hesapla2()" required="required" autocomplete="off" value="<?php echo !empty($_X['iskonto']) ? z('sayi',$_X['iskonto'],2) : '0'; ?>" ></font></h3>
          <input type="hidden" class="fiyatiskontosuz" name="<?php echo $tbl; ?>[fiyatiskontosuz]" value="<?php echo $tbl; ?>[fiyatiskontosuz]">
          <div style="font-size: 9px">Boş geçilirse teklif formunda belirmez.</div>
        </td>
        <td>
          <h3><font color="red"><input type="text"  class="geneltoplam" required="required" name="<?php echo $tbl; ?>[fiyat]" autocomplete="off"></font></h3>
          <select name="<?php echo $tbl;?>[pb]">
            <?php foreach ($PB as $pbkod => $pbAd) {
              echo '<option value="'.$pbkod.'" '.($pbkod==$_X['pb']?'selected':'').' >Para birimi '.$pbAd.'</option>';
            } ?>
          </select>
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
    </tbody>
  </table>




  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td>
        

          <?php /*/ ?>
          <tr>
            <td width="100%">
              <?php if(z(8,'a')=='ekle'){ ?>
              <textarea name="<?php echo $tbl; ?>[sartlar]" id="sozlesmeMetni" class="sartext" style="height: 180px; width: 100%;">
          Bu bir Sipariş Anlaşmasıdır.  (Not: Bu sözleşme, sözleşme tarihi ile birlikte 5 iş günü için geçerlidir.)
          Ödeme şekli:  PEŞİN
          Kurum Teşvik kullanacaksa, proformada belirtilen ürünler kalem kalem teçhizat listesinde olmalıdır. Aksi taktirde listede KDV'li fatura düzenlenecektir
          Ön Ödeme ve diğer ödeme şartları yerine getirilmez ise bu sözleşme otomatik olarak iptal olur.
          Sözleşme tarihinden sonra Teslim süresine ve tüm ödeme koşulları gerçekleşene kadar geçen süreçte dövize dayalı tedarik ürünlerinin bulunmasından dolayı piyasa kur farkı %12 üzerine çıktığı takdirde satıcı firma sözleşmede değişiklik talebinde bulunabilir veya sözleşmeyi tek taraflı fesh edebilir.
           Oluşabilecek anlaşmazlıklarda Denizli mahkemeleri yetkilidir.
          </textarea>
          <?php }else{ ?>
             <textarea name="<?php echo $tbl; ?>[sartlar]" id="sozlesmeMetni" class="sartext" style="height: 180px; width: 100%;"><?php if(!empty($_X['sartlar'])){ echo $_X['sartlar']; } ?></textarea>
          <?php } ?>
           </td>
          </tr>
          <?php /*/ ?>
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
            .blok{ 
              border-radius: 24px; border:1px solid #fff; overflow: hidden;
              -webkit-box-shadow: 0 0 9px 4px rgba(0,0,0,0.3); 
              -moz-box-shadow: 0 0 9px 4px rgba(0,0,0,0.3);
              box-shadow: 0 0 9px 4px rgba(0,0,0,0.3); 
            }
            form{ text-align: center; }
          </style>
          <ul class="sozlesmeul">
            <li class="sozlesmeli">
              <span class="sozlesme1">• Bu bir sipariş anlaşmasıdır.  (Not: Bu sözleşme, sözleşme tarihi ile birlikte 5 iş günü için geçerlidir.)</span>
            </li>
            <li class="sozlesmeli">
              <span class="sozlesme2">
                • Ödeme şekli: &nbsp;
                <span style="width: 240px; display: inline-block;"><?php echo select(Array('name'=>$tbl.'[nesne_IDodemeSekli]','detay'=>'class="nesneSlc_odemeSekli" ','t'=>'nesne','alan'=>'ID,metin1', 'value'=>'ID', 'sd'=>"WHERE ad='odemeSekli'",'icerik'=>'<option value="0">Seçiniz</option>','sec'=>!empty($_X['nesne_IDodemeSekli'])?$_X['nesne_IDodemeSekli']:0))?></span>
                <div>Seçenekler arasında yok ise ödeme şeklini özel yazı olarak belirtebilirsiniz.</div>
                <div><textarea name="<?php echo $tbl;?>[odemeSekliAciklama]" style="width: 100%; height: 118px;"><?php echo !empty($_X['odemeSekliAciklama'])?$_X['odemeSekliAciklama']:''; ?></textarea></div>
              </span>
            </li>
            <li class="sozlesmeli ">
              <span class="sozlesme3">• Kurum Teşvik kullanacaksa, proformada belirtilen ürünler kalem kalem teçhizat listesinde olmalıdır. Aksi taktirde listede KDV'li fatura düzenlenecektir</span>
            </li>
            <li class="sozlesmeli">
              <span class="sozlesme4">• Ön Ödeme ve diğer ödeme şartları yerine getirilmez ise bu sözleşme otomatik olarak iptal olur.</span>
            </li>
            <li class="sozlesmeli">
              <span class="sozlesme5">• Sözleşme tarihinden sonra Teslim süresine ve tüm ödeme koşulları gerçekleşene kadar geçen süreçte dövize dayalı tedarik ürünlerinin bulunmasından dolayı piyasa kur farkı %12 üzerine çıktığı takdirde satıcı firma sözleşmede değişiklik talebinde bulunabilir veya sözleşmeyi tek taraflı fesh edebilir.</span>
            </li>
            <li class="sozlesmeli">
              <span class="sozlesme6">• Oluşabilecek anlaşmazlıklarda Denizli mahkemeleri yetkilidir.</span>
            </li>
            <div class="eksozlesme">
              <?php
              $tkuruncek=z(1,"WHERE teklif_ID = ".z(8,'id'),'','teklifurun');
              ?>
              <?php if(z(8,'a')=='duzenle'){
                $urunsorgu="WHERE arsiv = 0 ";
                $sayicontrol=0;
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
                $uruncek=z(1,$urunsorgu,'','urun');
                foreach ($uruncek as $ucek) {
                  echo '<li class="sozlesmeli"><span class="sozlesmetext sozlesmeli'.$ucek['ID'].'">'.$ucek['sartlar'].'</span></li>';
                }
              } ?>
            </div>
          </ul>
        

        </td>
      </tr> 
    </tbody>
  </table>

       
  <table cellspacing="0" cellpadding="0" border="0">
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
        <td rowspan="2">
          <textarea name="<?php echo $tbl;?>[aciklama]" style="width: 100%; height: 118px;"><?php echo !empty($_X['aciklama'])?$_X['aciklama']:''; ?></textarea>
        </td>
        <td><div class="firmacek" style="font-size: 18px; font-weight:600;">&nbsp;</div></td>
        <td><div style="font-size: 15px; font-weight:600;"><?php echo $ayr['firmaUzunAd'] ?></div></td>
      </tr>
      <tr style="height: 100px;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

    </tbody>
    <tbody class="gizleyeni">
      <tr>
        <th colspan="3">Ek</th>
      </tr>
      <tr>
        <td></td>
        <td rowspan="3"><input type="file" class="form-control" name="<?php echo $tbl; ?>[ek]" style="width:100%;"></td>
        <td><?php if(!empty($_X['ek'])){ echo $_X['ek']; } ?></td>
      </tr>
    </tbody>
  </table>


</div>

<?php if(z(8,'a')=='ekle'){ ?>
<div style="background-color:white; color:orange; text-align: center; padding: 8px 4px 4px 4px;"><img src="img/bell.svg" height="22"> <span style="vertical-align: top; padding-top: 3px; display: inline-block;">Bilgilendirme: <b><?php _z('tarih','+5 days') ?> 10:00</b> tarihi için otomatik hatırlatma oluşacaktır.</span></div>
<?php } ?>

<!-- AÇILIR NESNE EKLEME FORMU -->
<?php require(__DIR__.'/../../parca/nesne-hizli-ekle-form.php'); ?>
<!-- AÇILIR NESNE EKLEME FORMU SON -->