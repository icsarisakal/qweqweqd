<style type="text/css">
body{ background-color:transparent; padding:0px; margin:0px;}
.sabitT{ width:360px; height:490px; margin:auto; margin-bottom:0.5em; margin-top:2em; border:1px solid #000;}
td,th{ background-color:#FFF; border:1px solid #000;}
td{ font-size:12px; font-weight:bold;}
/*td span{ font-size:10px; font-weight:normal;}*/
@media print 
    {
        table tr td{
            font-size: 12px;
        }
        table tr th{
            font-size: 10px;
        }
    }
</style>
<?Php
if($admn||ytk($syf,'listele')||z(8,'kod')){
if(z(8,'id')||z(8,'kod')){
if(z(8,'kod')){
	$kodx=false;
	$ID=z(34,z(8,'kod'),1);
}
else{
	$ID=z(8,'id');
	$kodx=true;
}

if(!empty($ID)){
$_X=z(1,$ID,'',$tbl);
if(!empty($_X)){ // içerik yok
if($_X['arsiv']!=-1){ // silinmiş
if(!empty($_X['goster'])){ // göster var ise
$_Gstr=(array)json_decode($_X['goster']);
if(!empty($_Gstr)){ // göster var ise

    $hamkumasstok=!empty($_X['hamkumasstok_ID'])?z(1,$_X['hamkumasstok_ID'],'ID,kumasIsmi,numuneIsmi','hamkumasstok'):'';
    $dokumastok=!empty($_X['dokumastok_ID'])?z(1,$_X['dokumastok_ID'],'ID,kompozisyon','dokumastok'):'';
    $nsnSd='';
    $nsnSd.=(!empty($_X['nesne_IDdokumaSalonu'])?"ID='".$_X['nesne_IDdokumaSalonu']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDorguTipi'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDorguTipi']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDkalite'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDkalite']."'":'');
    $nsnSd.=(!empty($_X['nesne_IDkompozisyon'])?(!empty($nsnSd)?' OR ':'')."ID='".$_X['nesne_IDkompozisyon']."'":'');
    $_Nesne=z(37,z(1,"WHERE arsiv<>'-1' AND (".$nsnSd.")",'ID,metin1,metin2','nesne'));
for($i=0;$i<1;$i++){?>

    <table cellpadding="0" cellspacing="0" class="sabitT">
        <tbody>
            <tr><td colspan="2"><div style="font-size:14px;text-align:left;height:0px; padding:0px 0px 0px 4px;">Starteks Tekstil<br />San. Tic. Ltd. Sti.</div><div style="font-size:10px;text-align:right;height:0px; padding:0px 4px 0px 0px;"><?Php echo z('tarihsaat');?></div><div><img src="img/logo-etiket.png" height="40" /></div></td></tr>
            <?Php if(!empty($_Gstr['kumasIsmi'])){?>
            <tr><td>KUMAŞ KALİTESİ (<span>Article</span>)</td><td><?Php echo !empty($hamkumasstok['kumasIsmi'])?($hamkumasstok['kumasIsmi']):'&nbsp;'?></td></tr>
            <?Php }?>
            <?Php if(!empty($_Gstr['metraj'])){?>
            <tr><td>METRAJ</td><td><?Php echo !empty($_X['metraj'])?sayi($_X['metraj'],2,1):''?></td></tr>
            <?Php }?>
            <?Php if(!empty($_Gstr['nesne_IDkalite'])){?>
            <tr><td>KALİTE (<span>Quality</span>)</td><td><?Php echo !empty($_Nesne[$_X['nesne_IDkalite']]['metin1'])?trmtn($_Nesne[$_X['nesne_IDkalite']]['metin1']):''?></td></tr>
            <?Php }?>
            <?Php if(!empty($_Gstr['nesne_IDkompozisyon'])){?>
            <tr><td>KOMPOZİSYON</td>
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
                <?php /*/ ?>
                <td><?Php echo !empty($_Nesne[$_X['nesne_IDkompozisyon']]['metin1'])?trmtn($_Nesne[$_X['nesne_IDkompozisyon']]['metin1']):''?></td></tr>
                <?php /*/ ?>
            <?Php }?>

            <?Php if(!empty($_Gstr['dokumastok_ID'])){?>
            <tr><td>PARTİ NO</td><td><?Php echo !empty($_X['dokumastok_ID'])?$_X['dokumastok_ID']:''?></td></tr>
            <?Php }?>
            <?Php if(!empty($_Gstr['numuneIsmi'])){?>
            <tr><td>TİP NO</td><td><?Php echo !empty($hamkumasstok['numuneIsmi'])?($hamkumasstok['numuneIsmi']):'&nbsp;'?></td></tr>
            <?Php }?>
           
            <?Php if(!empty($_Gstr['mamulEn'])){?>
            <tr><td style="font-size:10px">MAMUL&nbsp;EN&nbsp;/&nbsp;GR&nbsp;/ (<span>Witdh/Weight</span>)&nbsp;m²</td><td><?Php echo !empty($_X['mamulEn'])?$_X['mamulEn']:''?></td></tr>
            <?Php }?>
            <?Php /*if(!empty($_Gstr['mamulGr'])){?>
            <tr><td>MAMUL GR</td><td><?Php echo !empty($_X['mamulGr'])?$_X['mamulGr']:''?></td></tr>
            <?Php }*/?>
            <?Php if(!empty($_Gstr['topNo'])){?>
            <tr><td>TOP NO(<span>Roll No</span>)</td><td><?Php echo !empty($_X['topNo'])?$_X['topNo']:''?></td></tr>
            <?Php }?>
            <?Php if(!empty($_Gstr['lotNo'])){?>
            <tr><td>LOT NO</td><td><?Php echo !empty($_X['lotNo'])?$_X['lotNo']:''?></td></tr>
            <?Php }?>
            
            <?Php if(!empty($_NSN))foreach($_NSN as $ad=>$n){if(!in_array($ad,array('renkNo','desenNo'))){?>
            <?Php if(!empty($_Gstr[$ad])){?>
            <tr><td><?Php echo $n['ad']; echo $ad=='kompozisyon'?' (<span>Composition</span>)':'';?></td><td><?Php echo !empty($_Nesne[$_X['nesne_ID'.$ad]]['metin1'])?trmtn($_Nesne[$_X['nesne_ID'.$ad]]['metin1']):''?></td></tr>
            <?Php }?>
            <?Php }}?>
            <?Php if(!empty($_Gstr['aciklama'])){?>
            <tr><td>AÇIKLAMA</td><td><?Php echo !empty($_X['aciklama'])?mtn($_X['aciklama']):'&nbsp;'?></td></tr>
            <?Php }?>
            <tr><td colspan="2"><img src="parca/barkod.php?kod=<?Php echo $_X['ID']?>" width="100px" /></td></tr>
            <tr><td colspan="2" style="margin:0px;padding:0px;font-size:10px;">
Kale Mah. İstiklal Cad. No:7 20002 Akkale/ Denizli, TURKEY<br />
Tel: +90 258 267 19 19 --- Fax: +90 258 267 11 12<br />
info@starteks.com.tr --- www.starteks.com.tr</td></tr>
        </tbody>
    </table>
    <?Php if(z(8,'yazdir')){?><script type="text/javascript">window.print();</script><?Php }?>

<?Php }?>
<?Php }else echo 'Hiç bir alan etikette gösterilsin olarak işaretlenmemiş.';?>
<?Php }else echo 'Hiç bir alan etikette gösterilsin olarak işaretlenmemiş.';?>
<?Php }else _uyr(2,'Bu girdi yöneticiler tarafından silinmiş.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Görüntülenecek içerik bulunamadı.');?>
<?Php }else _uyr(2,'Sayfayı görüntüleme izniniz yok.');?>