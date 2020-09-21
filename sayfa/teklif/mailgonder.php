<?php 
if(!empty($KOD)){
	$kodx=false;
	$id=z(34,$KOD,1);
}
else{
	$id=z(8,'id');
	$kodx=true;
}
if(!empty($id)){
	$teklif=z(1,$id,'','teklif');
	$firma=z(1,"WHERE ID =".$teklif['firma_ID'],'','firma');
	$kisi=z(1,"WHERE ID =".$teklif['kisi_ID'],'','kisi');
	$turuncek=z(1,array('teklif_ID'=>$id),'','teklifurun');
}
$paylasimUrl = $ayr['siteUrl'].'/paylasim/?teklif='.z(34,$id);
?>
<?php 
$icerik='<style type="text/css"> body{background:#eee;} .tablehead{border: 1px solid #dadada; color: #000; table-layout: fixed; width:100%;} .tdozellik{width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;}  .logoimg{display:block; width: 50px; float: left;} .firmaheader{font-weight: 700;width: 100%;font-size: 25px;} @media only screen and (max-width: 600px) {.tdozellik{font-size:7px;font-weight:700;} .logoimg{width:40px;} .tablehead{table-layout:auto;} .adetgoster{font-size:8px; width:12% !important;} .firmaheader{font-size: 15px;}}</style>';
$icerik.='
<table align="center" width="95%" class="mailpd2" style="font-family: sans-serif; table-layout: fixed; margin: 0 auto; background: #fff;  border-radius: 4px; box-shadow: 0 3px 6px rgba(0,0,0,0.16)";>
<div class="main-header" style="text-align:center;">
<img src="'.$ayr['siteUrl'].'/img/logo.png" class="logoimg">
<span class="firmaheader">'.$ayr['firmaAd'].' | TEKLİF<span>
</div>
<br><br>
<table class="tablehead" rules="all" cellpadding="13";>
<tr>
<td style="width: 50%;" colspan="2"><b>Alıcı Firma</b></td>
<td style="width: 50%;" colspan="2"><b>Satıcı Firma</b></td>
</tr>
<tr>
<td style="width: 50%;"><b>Proforma No</b></td>
<td style="width: 50%;">'.(!empty($teklif['proformaNo'])?$teklif['proformaNo']:'').'</td>
<td style="width: 50%;"><b>Satıcı</b></td>
<td style="width: 50%;">HNC Eğitim ve Görüntü Teknolojileri San.Tic ltd.Şti.</td>
</tr>
<tr>
<td style="width: 50%;"><b>Firma</b></td>
<td style="width: 50%;">'.(!empty($firma[0]['ad'])?$firma[0]['ad']:'').'</td>
<td style="width: 50%;"><b>Adres</b></td>
<td style="width: 50%;">Sevildik Mah. 2291.Sk No:15-2 Merkezefendi-Denizli</td>
</tr>
<tr>
<td style="width: 50%;"><b>Vergi D - Vergi No</b></td>
<td style="width: 50%;">'.(!empty($firma[0]['vergiD'])?$firma[0]['vergiD']:'').' - '.(!empty($firma[0]['vergiNo'])?$firma[0]['vergiNo']:'').'</td>
<td style="width: 50%;"><b>Vergi No</b></td>
<td style="width: 50%;">Gökpınar V.D.-457 054 6215</td>
</tr>
<tr>
<td style="width: 50%;"><b>Kişi</b></td>
<td style="width: 50%;">'.(!empty($kisi[0]['ad'])?$kisi[0]['ad']:'').' '.(!empty($kisi[0]['soyad'])?$kisi[0]['soyad']:'').'</td>
<td style="width: 50%;"><b>Telefon</b></td>
<td style="width: 50%;">0258 261 5261-0543 669 6692</td>
</tr>
<tr>
<td style="width: 50%;"><b>Adres</b></td>
<td style="width: 50%;">'.(!empty($firma[0]['adresFatura'])?$firma[0]['adresFatura']:'').'</td>
<td style="width: 50%;"><b>E-mail</b></td>
<td style="width: 50%;">hnc@hnckilittahta.com-www.hnckilittahta.com</td>
</tr>
</table>

<table rules="all" style="border: 1px solid #dadada; color: #000; table-layout: fixed;" cellpadding="13"; width="100%">

<tr>
<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><center><b>Ürün</b></center></td>
<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><center><b>Model/Özellikler</b></center></td>
<td style="width: 5%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;" class="adetgoster"><center><b>Adet</b></center></td>
<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><center><b>Fiyat</b></center></td>
<td style="width: 33%; border-bottom: 1px solid #dadada;"><center><b>Toplam</b></center></td>
</tr>';
$uruntopla=0;
if(!empty($turuncek)){ foreach ($turuncek as $urn) {
	$toplamfiyat=0;
	if(!empty($urn['fiyat'])&&!empty($urn['adet'])){
		$toplamfiyat=$urn['adet']*$urn['fiyat'];
		$uruntopla+=$toplamfiyat;
	}
	$icerik.='
	<tr>
	<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><img src="'.$ayr['siteUrl'].'/upload/urun/'.(!empty($urn['img'])?$urn['img']:'').'" style="width:100%; height:auto;"></td>
	<td class="tdozellik">'.(!empty($urn['ozellik'])?$urn['ozellik']:'').'</td>
	<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;">
	<center><p>'.(!empty($urn['adet'])?$urn['adet']:'').'</p></center>
	</td>
	<td style="width: 33%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;">
	<center><p>'.(!empty($urn['fiyat'])?$urn['fiyat']:'').'</p></center>
	</td>
	<td style="width: 33%; border-bottom: 1px solid #dadada;">
	<center><p>'.(!empty($urn['fiyat'])&&!empty($urn['adet'])?$toplamfiyat:'').'</p></center>
	</td>
	</tr>'; } } else { echo '<tr><td style="width:100%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><strong>Teklif ürünleri bulunamadı</strong></td><td style="width:100%; border-bottom: 1px solid #dadada; border-right: 1px solid #dadada;"><strong>Teklif ürünleri bulunamadı</strong></td><td style="width:100%; border-bottom: 1px solid #dadada;"><strong>Teklif ürünleri bulunamadı</strong></td></tr>';} 
	$icerik.='
	</table>
	<table rules="all" style="border: 1px solid #dadada; color: #000; table-layout: fixed; width:100%;" cellpadding="13";>
	<tr>
	<td style="width: 50%; border-right: 1px solid #dadada;"><b>Banka Detayları</b></td>
	<td style="width: 50%; border-right: 1px solid #dadada;"><b>Toplam</b></td>
	<td style="width: 50%; border-right: 1px solid #dadada;"><b>KDV</b></td>
	<td style="width: 50%; border-right: 1px solid #dadada;"><b>Genel Toplam</b></td>
	</tr>
	<tr>
	<td style="width: 50%;">
	<p><b>İş Bankası: TR21 0006 4000 0013 2060 0870 85</b></p><br>
	<p><b>Ziraat Bankası: TR93 000 1 0020 6564 9652 7150 01</b></p><br>
	<p><b>Garanti Bankası: TR85 0006 2001 3950 0006 2994 47</b></p><br>
	<p><b>Teb Bankası: TR44 0003 2000 0000 0035 4133 44</b></p><br>
	</td>
	<td style="width: 50%;">'.$uruntopla.'</td>
	<td style="width: 50%;">'.(!empty($teklif['kdv'])?$teklif['kdv']:'').'</td>
	<td style="width: 50%;">'.(!empty($uruntopla)?$teklif['kdv']/100*$uruntopla+$uruntopla:'').' TL</td>
	</tr>
	</table>
	<div style="width:100%;margin-top: 4px;margin-bottom: 4px;"><center><b><a href="'.$paylasimUrl.'" style="font-size:16px;background: red;color: white; padding:4px;">TEKLİF FORMUNU YAZDIRABİLMEK İÇİN LÜTFEN WEB SAYFASINDA GÖRÜNTÜLEYİNİZ</a></b></center></div>
	<div style="width:100%;margin-top:4px;margin-bottom:4px;"><center style="font-size:20px;text-decoration:underline;">Ayrıca, ek olarak gönderilen dosyalara da göz atınız.</center></div>
	</table>';
	$konu=$ayr['firmaAd'].' || Teklif Formu';
	$gonderenAdi=$ayr['siteAd'];
	$personelcek=z(1,z('lgn','ID'),'','personel');
	if(!empty($personelcek['meposta'])){
		$replyPosta=$personelcek['meposta'];
	}else{
		$replyPosta='hnc@hncakillitahta.com';
	}
	$file='img/logo.png';
	if(!empty($teklif['ek'])){
		$file='upload/ek/'.$teklif['ek'];
	}
	//$file='img/logo.png';



	if(!empty($firma[0]['eposta'])){
		$kime=$firma[0]['eposta'];
		smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
		z(3,$id,array('teklifdurum'=>1),$tbl);
		z(33,'detay',1);
		z('git','./?s=teklif&a=detay&id='.z(8,'id'));
	} elseif (!empty($kisi[0]['eposta'])) {
		$kime=$kisi[0]['eposta'];
		smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
		z(3,$id,array('teklifdurum'=>1),$tbl);
		z(33,'detay',1);
		z('git','./?s=teklif&a=detay&id='.z(8,'id'));
	} else {
		echo 'Firmanın veya kişinin maili olmadığı için teklif gönderilemedi';
	}
	//echo $icerik;
	?>