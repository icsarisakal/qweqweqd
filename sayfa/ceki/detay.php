<?Php
if($admn||ytk($syf,'listele')||!empty($KOD)){
if((z(8,'id')&&empty($cekiTip))||!empty($KOD)){
if(!empty($KOD)){
	$kodx=false;
    $ID=z(34,$KOD,1);
	//$ID=z(34,z(8,'kod'),1);
	//$KOD=z(8,'kod');
}
else{
	$ID=z(8,'id');
	$kodx=true;
}
$ayr['antetA']=z(8,'yazdir');

$_X=z(1,$ID,NULL,$tbl);
if(!empty($_X)){
    $oncekiID=z(1,"WHERE ID < ".$ID." ORDER BY ID DESC LIMIT 1",'ID','ceki');
    $oncekiID=$oncekiID[0];
    $sonrakiID=z(1,"WHERE ID > ".$ID." ORDER BY ID ASC LIMIT 1",'ID','ceki');
    $sonrakiID=$sonrakiID[0];
if($_X['arsiv']!=-1){
unset($_NSN);
?>
<div class="sayfa">
	<style type="text/css">
     .w25{ display: inline-block; width: 25%; box-sizing: border-box; }   
    </style>
    <div class="printx">
        <div class="baslik">
            <div class="btnGrup">
                <a href="<?php echo $kodx==false?'?ceki='.$KOD:'?s=ceki&a=detay&id='.$ID;?>&yazdir=1" class="btn btnYazdir">YAZDIR TR</a><!--
             --><a href="<?php echo $kodx==false?'?ceki='.$KOD:'?s=ceki&a=detay&id='.$ID;?>&yazdir=1&dil=en" class="btn btnYazdir">YAZDIR EN</a><!--
             --><a href="<?php echo $kodx==false?'?ceki='.$KOD:'?s=ceki&a=detay&id='.$ID;?>&yazdir=2" class="btn btnYazdir">ANTETSİZ YAZDIR</a><!--
             --><a href="<?php echo $kodx==false?'?ceki='.$KOD:'?s=ceki&a=detay&id='.$ID;?>&yazdir=2&dil=en" class="btn btnYazdir">ANTETSİZ EN</a><?Php 
				
				if($kodx&&$_X['arsiv']==0){
					if($_X['durum']==0||$_X['durum']==2){?><a href="i.php?i=ck&a=1&id=<?Php echo $ID?>" onclick="return confirm('Çeki listesini müşteriye gönderildi olarak işaretlemek istediğinizden emin misiniz?')" class="btn btnOnay">Müşteriye Gönderildi İşaretle</a><?Php }
                    else if($_X['durum']==1){?><a href="i.php?i=ck&a=2&id=<?Php echo $ID?>" onclick="return confirm('Çeki listesini gönderilmeye hazır olarak geri çekmek istediğinizden emin misiniz?')" class="btn btnBeklemede">Henüz Gönderilmedi İşaretle</a><?Php }
					/*if($admn||ytk($tbl,'arsivle')){
						?><a href="?s=<?Php echo $tbl?>&a=listele&ida1=<?Php echo $ID?>" class="btn btnArsiv" onclick="return confirm('Siparişi arşive göndermek istediğinizden emin misiniz?')">Arşive Gönder</a></td><?Php 
					}*/?><a href="?s=ceki&a=detay<?Php echo !empty($KOD)?'&kod='.$KOD:!empty($ID)?'&id='.$oncekiID:'';?>" class="btn btnYazdir">&lt; ÖNCEKİ ÇEKİ LİSTESİ</a><?php if(!empty($sonrakiID)){?><a href="?s=ceki&a=detay<?Php echo !empty($KOD)?'&kod='.$KOD:!empty($ID)?'&id='.$sonrakiID:'';?>" class="btn btnYazdir">SONRAKİ ÇEKİ LİSTESİ &gt;</a><?php } ?>
                <?Php } else {?><div>Paylaşılabilir Bağlantı Adresi: <span style="padding: 0 4px;"><?php echo 'http://'.z('sw','HTTP_HOST').'/panel2/paylasim?ceki='.z(34,$ID) ?></span></div>
                <?php } ?>
            </div>
        	<?Php if($kodx&&$_X['arsiv']>0){?>
            <div class="bilgi">Bu girdi <?Php echo !empty($_X['tarihArsiv'])?'<strong>'.z('tarihsaat',$_X['tarihArsiv']).'</strong> tarihinde':''?> arşivlenmiş.</div>
            <?Php }?>
            <div class="w25">
                <h3><?Php echo $_X['ID']?> NUMARALI ÇEKİ LİSTESİ</h3>
            </div><!--
         --><div class="w25">
                
            </div><!--
         --><div class="w25">
                
            </div><!--
         --><div class="w25">
                <h3>TARİH: <?php _z('tarih',$_X['tarih']) ?></h3>
            </div>
        </div>
    </div>
    
    <div class="icerik">
   <?Php switch(z(33,'onayla1')){
		case 1:_uyr(1,'Çeki listesi müşteriye gönderildi olarak işaretlendi');break;
	}switch(z(33,'onayla2')){
		case 1:_uyr(1,'Çeki listesi tekrar, gönderilmeye hazır olarak işaretlendi');break;
	}switch(z(33,'ekle')){
		case 1:_uyr(1,'Yeni çeki listesi başarıyla oluşturuldu.');break;
	}?>
    
    <div class="printp"><style type="text/css"> @media print{table tr td{ font-size:<?Php echo $ayr['printTdPunto'];?>px;} table tr th{ font-size:<?Php echo $ayr['printThPunto'];?>px;}} </style>
    
	<?Php $_Y=z(1,NULL,NULL,'musteri');if(!empty($_Y))foreach($_Y as $y)$_Musteri[$y['id']]=$y; ?>
    <?Php 
		$antet['baslikM']=($ayr['antetA']!=2?'STARTEKS ':'').(z(8,'dil')=='en'?'PACKING LIST':'ÇEKİ LİSTESİ');
		$antet['musteriM']=z(8,'dil')=='en'?'CUSTOMER':'MÜŞTERİ';
		$antet['cekiNoM']=z(8,'dil')=='en'?'LİST&nbsp;NR':'ÇEKİ&nbsp;NO'; 
		$antet['tarihM']=z(8,'dil')=='en'?'DATE':'TARİH';
		$antet['musteri']=trmtn((!empty($_Musteri[$_X['personel_ID']]['sirket'])?$_Musteri[$_X['personel_ID']]['sirket']:'&nbsp;')/*.(!empty($_Musteri[$_X['personel_ID']]['ad'])||!empty($_Musteri[$_X['personel_ID']]['soyad'])?' <span style="font-size:8px">'.(!empty($_Musteri[$_X['personel_ID']]['ad'])?$_Musteri[$_X['personel_ID']]['ad']:'&nbsp;').' '.(!empty($_Musteri[$_X['personel_ID']]['soyad'])?$_Musteri[$_X['personel_ID']]['soyad']:'&nbsp;').'</span>':'')*/);
		$antet['cekiNo']=$_X['ID'];
		$antet['tarih']=!empty($_X['tarih'])?z('tarih',$_X['tarih']):'';
        require(__DIR__.'/../../parca/antet.php');
	?>
    
    <?php /*?><div class="printy"><div class="altbaslik"><span>ÇEKİ NO: <?Php echo $_X['ID']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FİRMA: <?Php echo  trmtn((!empty($_Musteri[$_X['personel_ID']]['sirket'])?$_Musteri[$_X['personel_ID']]['sirket']:'&nbsp;'))?></span><span style="float:right">TARİH: <?Php _z('tarih',$_X['tarih'])?></span></div></div><?php */?>
    <table cellpadding="0" cellspacing="0" border="0">
        <colgroup>
            <col width="28" />
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<col />';}?>
        </colgroup>
        <thead>
        	<?php /*?><tr>
                <td colspan="4"><strong>ÇEKİ NO:&nbsp;&nbsp;&nbsp;<?Php echo $_X['ID']?></strong></td>
                <td colspan="4"><strong>FİRMA:&nbsp;&nbsp;&nbsp;</strong><strong><?Php 
                    echo trmtn((!empty($_Musteri[$_X['personel_ID']]['sirket'])?$_Musteri[$_X['personel_ID']]['sirket']:'&nbsp;').(!empty($_Musteri[$_X['personel_ID']]['ad'])||!empty($_Musteri[$_X['personel_ID']]['soyad'])?' ('.(!empty($_Musteri[$_X['personel_ID']]['ad'])?$_Musteri[$_X['personel_ID']]['ad']:'&nbsp;').' '.(!empty($_Musteri[$_X['personel_ID']]['soyad'])?$_Musteri[$_X['personel_ID']]['soyad']:'&nbsp;').')':''));
                ?></strong></td>
                <td colspan="4"><strong>TARİH:&nbsp;&nbsp;&nbsp;<?Php echo !empty($_X['tarih'])?z('tarih',$_X['tarih']):''?></strong></td>
            </tr><?php */?>
            <?php /*/ ?>
        	<tr class="printx">
            <?Php
            	$_Ara=z(7,'araCkDty');
				if(empty($_Ara)){
					if($araHA&&z(11,'araCkDty')){
						$_Ara=z(11,'araCkDty');
					}
				}
			?>
            <th><select name="la[adet]" class="ara" id="laAdet" style="width:90%"><option value="5">5 Satır</option><option value="10">10 Satır</option><option value="20">20 Satır</option><option value="30" selected="selected">30 Satır</option><option value="50">50 Satır</option><option value="100">100 Satır</option><option value="0">Tümü</option></select></th>
			<th><input type="text" name="ara[ID]" class="ara ufakTxt" id="araID" value="<?Php echo !empty($_Ara['ID'])?$_Ara['ID']:''?>"></th>
			<th><input type="text" name="ara[tipNo]" class="ara ufakTxt" id="araTipNo" value="<?Php echo !empty($_Ara['tipNo'])?$_Ara['tipNo']:''?>"></th>
			<th><input type="text" name="ara[partiNo]" class="ara ufakTxt" id="araPartiNo" value="<?Php echo !empty($_Ara['partiNo'])?$_Ara['partiNo']:''?>"></th>
            
            <th><?Php echo select(Array('name'=>$tbl.'[kalite_ID]','t'=>'kalite','alan'=>'ID,ad','sd'=>"WHERE id<>'0'",'detay'=>'class="ara" id="araKalite_ID"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['kalite_ID'])?$_Ara['kalite_ID']:0))?></th>
            
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDrenkNo]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='renkNo'",'detay'=>'class="ara" id="araNesne_IDrenkNo"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDrenkNo'])?$_Ara['nesne_IDrenkNo']:0))?></th>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDdesenNo]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='desenNo'",'detay'=>'class="ara" id="araNesne_IDdesenNo"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDdesenNo'])?$_Ara['nesne_IDdesenNo']:0))?></th>
			
            <th><input type="text" name="ara[mamulEn]" class="ara ufakTxt" id="araMamulEn" value="<?Php echo !empty($_Ara['mamulEn'])?$_Ara['mamulEn']:''?>"></th>
            <th><input type="text" name="ara[mamulGr]" class="ara ufakTxt" id="araMamulGr" value="<?Php echo !empty($_Ara['mamulGr'])?$_Ara['mamulGr']:''?>"></th>
            
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_IDkalite]','t'=>'nesne','alan'=>'ID,metin1','sd'=>"WHERE ad='kalite'",'detay'=>'class="ara" id="araNesne_IDkalite"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_IDkalite'])?$_Ara['nesne_IDkalite']:0))?></th>
            
            <th><input type="text" name="ara[topNo]" class="ara ufakTxt" id="araTopNo" value="<?Php echo !empty($_Ara['topNo'])?$_Ara['topNo']:''?>"></th>
            <th><input type="text" name="ara[lotNo]" class="ara ufakTxt" id="araLotNo" value="<?Php echo !empty($_Ara['lotNo'])?$_Ara['lotNo']:''?>"></th>
            <th><input type="text" name="ara[metraj]" class="ara ufakTxt" id="araMetraj" value="<?Php echo !empty($_Ara['metraj'])?$_Ara['metraj']:''?>"></th>
            
			
			
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){?>
            <th><?Php echo select(Array('name'=>$tbl.'[nesne_ID'.$ad.']','t'=>'nesne','alan'=>'ID,'.$n['alan'],'sd'=>"WHERE ad='".$ad."'",'detay'=>'class="ara" id="araNesne_ID'.$ad.'"','icerik'=>'<option value="">&nbsp;</option>','sec'=>!empty($_Ara['nesne_ID'.$ad])?$_Ara['nesne_ID'.$ad]:substr(z('date'),0,7)))?></th>
            <?Php }?>
            </tr>
            <?php /*/ ?>

            <?Php if(z(8,'dil')=='en'){?>
            <tr>
            	<th>NO</th><th>STOCK NR</th><th>TYPE NR</th><th>PARTY NR</th><th>ARTICLE</th><th>COMPOSITION</th><th>ÖRGÜ TİPİ</th><th>WIDTH / WEIGHT</th><th>QUALITY</th><th>ROLL NR</th><th>LOT NR</th><th>MT.</th>
            </tr>
            <?Php }else{?>
            <tr>
            	<th>NO</th><th>TOP NO</th><th>TİP NO</th><th>PARTİ NO</th><th>KUMAŞ KALİTESİ</th><th>KOMPOZİSYON</th><th>ÖRGÜ TİPİ</th><th>HAM EN / GR</th><th>KALİTE</th><th>DOKUMA SALONU TOP NO</th><th>LOT NO</th><th>METRAJ</th>
            </tr>
            <?Php }?>
			<?Php /*if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo '<th>'.$n['ad'].'</th>';}*/?>
        </thead>
        <tbody id="tbody">
			<?Php require(__DIR__.'/detay_prc.php'); ?>
        </tbody>
    </table>
    
    <?Php $antetAlt=1;require(__DIR__.'/../../parca/antet.php'); ?></div>
    </div>
</div>
<?php if($kodx){ ?>
<script type="text/javascript">
function ajaxAra(){
	$('.secilebilir').attr('checked',false);
    $('.tumunuSec').attr('checked',false);
	$.post('sayfa/ceki/detay_ajx.php?kod=<?Php _z(8,'kod')?>',{
	'ara<?Php echo $tbl?>':araGrupla({
		'ID':$('#araID').val(),
		'tipNo':$('#araTipNo').val(),
		'partiNo':$('#araPartiNo').val(),
		'kalite_ID':$('#araKalite_ID').val(),
		'nesne_IDrenkNo':$('#araNesne_IDrenkNo').val(),
		'nesne_IDdesenNo':$('#araNesne_IDdesenNo').val(),
		'mamulEn':$('#araMamulEn').val(),
		<?php /*?>'mamulGr':$('#araMamulGr').val(),<?php */?>
		'nesne_IDkalite':$('#araMesne_IDkalite').val(),
		'topNo':$('#araTopNo').val(),
		'lotNo':$('#araLotNo').val(),
		'metraj':$('#araMetraj').val()
		<?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){echo ",'nesne_ID".$ad."':$('#araNesne_ID".$ad."').val()";}?>
	}),'la':{'adet':$('#laAdet').val()}},function(a){$('#tbody').html(a);});
}
var secA=false;
$(document).ready(function(e) {
	$('.ara').change(ajaxAra).keyup(ajaxAra);
});
</script>
<?php } ?>
<?Php if(z(8,'yazdir')){?><script type="text/javascript">window.print();</script><?Php }?>
<?Php }else _uyr(2,'Bu girdi yöneticiler tarafından silinmiş.');?>
<?Php }else echo ('Görüntülenecek içerik bulunamadı.');?>
<?Php }else echo ('Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>