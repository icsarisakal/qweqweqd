<?Php
$_G=z(9,'cekiAra');
if(empty($_G)){
	if(z(11,'cekiAra')){
		$_G=z(11,'cekiAra');
	}
}
if(empty($_G)){
	$_G['tarih']=substr(z('date'),0,7);
}
if(!empty($_G)){
	//z(11,'cekiAra',$_G);
	$araSd='';
	foreach($_G as $ad=>$dgr){
		if(!empty($dgr)){
			if(!empty($araSd)){
				$araSd.=' AND ';
			}
			if(in_array($ad,Array('tarih'))){
				$araSd.=$ad." LIKE '%".$dgr."%'";
			}
			else{
				$araSd.=$ad."='".$dgr."'";
			}
		}
	}
}
if(!empty($araSd)){
	$araSd="WHERE ".$araSd;
}
else{
	$araSd='';
}
$_X=z(1,$araSd." ORDER BY tarih DESC",NULL,'ceki');
if(!empty($_X)){
	function blnn($ad,$dgr){return str_replace($GLOBALS['_G'][$ad],'<u><strong>'.$GLOBALS['_G'][$ad].'</strong></u>',$dgr);}
	foreach($_X as $i=>$x){
		$musteri='';
		$_Musteri=z(1,$x['musteri_ID'],'ad,soyad,amblem','musteri');
		if(!empty($_Musteri['ad'])){
			$musteri.=$_Musteri['ad'];
		}
		if(!empty($_Musteri['soyad'])){
			$musteri.=' '.$_Musteri['soyad'];
		}
		if(!empty($_Musteri['amblem'])){
			$musteri='<img src="upload/'.$_Musteri['amblem'].'" width="30"> '.$musteri;
		}
		?>
        <tr>
            <td><strong><?Php echo $i+1?></strong></td>
            <td><?Php echo $x['ID']?></td>
            <td><?Php echo z(31,$x['tarih'])?></td>
            <td><?Php echo $musteri?></td>
            <td><?Php _z(5,"WHERE ceki_ID='".$x['ID']."'",NULL,'local')?></td>
            <td><?Php $_Mtr=z(1,"WHERE ceki_ID='".$x['ID']."'",'metre');$topM=0;if(!empty($_Mtr)){foreach($_Mtr as $m)$topM+=$m;}echo $topM?></td>
            <td><a href="?s=ceki&id=<?Php echo $x['ID']?>">Detay</a>
            <a href="?s=ceki&sil=<?Php echo $x['ID']?>" onClick="return confirm('Uyari: Silinen girdi geri getirilemez. Silmek istediğinizden emin misiniz?');">Sil</a></td>
        </tr>
        <?Php
	}
}
?>