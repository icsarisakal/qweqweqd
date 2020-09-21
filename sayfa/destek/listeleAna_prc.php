<?Php
$dprtmnSd='';
if(!$admn){
	$departmanlar=z(1,z('lgn','ID'),'departmanlar','personel');
	if(!empty($departmanlar)){
		$_Exp=explode(',',$departmanlar);
		if(!empty($_Exp))foreach($_Exp as $fed){
			if(!empty($fed)){
				if(!empty($dprtmnSd))$dprtmnSd.=" OR ";
				$dprtmnSd.="nesne_IDddepartman='".$fed."'";
			}
		}
	}
	if(!empty($dprtmnSd))$dprtmnSd=" AND (".$dprtmnSd.")";
	else $dprtmnSd=" AND 0";
}

if(empty($ltip))$ltip=z(8,'ltip');
$sd='WHERE 0';
switch($ltip){
	case 'onayBekleyen':$sd="WHERE arsiv<>'-1' ".($admn||ytk($syf,'duzenle')?($admn?'':$dprtmnSd):"AND personel_ID='".z('lgn','ID')."'")." AND durum<2 ORDER BY oncelik DESC ";break;
	case 'buGun':$sd="WHERE arsiv<>'-1' ".($admn||ytk($syf,'duzenle')?($admn?'':$dprtmnSd):"AND personel_ID='".z('lgn','ID')."'")." AND durum='2' ORDER BY tarihDurum DESC";break;
	//tarihDurum LIKE '".z('date')."%'
	case 'son5':$sd="WHERE arsiv<>'-1' ".($admn||ytk($syf,'duzenle')?($admn?'':$dprtmnSd):"AND personel_ID='".z('lgn','ID')."'")." AND durum='3' ORDER BY tarihDurum DESC";break;
}
$_X=z(1,$sd,NULL,$tbl);
if(!empty($_X)){
	
	$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Z[$y['ID']]=$y;
	$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_Personel[$y['ID']]=$y;
	
	$_Drm=array(
		array('','Cevap bekliyor.'),
		array('','Cevap bekliyor.'),
		array(1,'Cevaplanmış fakat henüz okunmamış.'),
		array(1,'Tamamlanmış.')
	);
	foreach($_X as $i=>$x){$i++;
		$_Y=z(1,"WHERE sepet_ID='".$x['ID']."'",NULL,$tbl.'mesaj');if(!empty($_Y))foreach($_Y as $y){
			
		}
		
		echo '<tr '.($i%2==0?'class="tr2"':'').'><td>'.$i.'</td>';
		echo '
			<td><img src="img/drm'.$_Drm[$x['durum']][0].'.png" title="'.$_Drm[$x['durum']][1].'" '.(!empty($x['durum'])&&$x['durum']==2?'height="20"':'').' /></td>
			<td><a href="?s='.$syf.'&a=detay&id='.$x['ID'].'" class="dty">'.$x['baslik'].'</a></td>
			<td>'.z('tarih',$x['tarih']).'</td>';
			if($admn||ytk($syf,'duzenle'))echo 
			'<td>'.(!empty($_Personel[$x['personel_ID']]['ad'])?($admn||ytk('personel','duzenle')?'<a href="?s=personel&a=duzenle&id='.$x['personel_ID'].'">'.$_Personel[$x['personel_ID']]['ad'].'</a>':$_Personel[$x['personel_ID']]['ad']):'').'</td>';
			echo '
			<td>'.(!empty($_Z[$x['nesne_IDddepartman']]['metin1'])?$_Z[$x['nesne_IDddepartman']]['metin1']:'&nbsp;').'</td>
			<td>'.$_Oncelik[$x['oncelik']].'</td>
			';
			
			
		echo '</tr>';
	}
}else{?>
<tr><td colspan="<?Php echo (!empty($_NSN)?count($_NSN):0)+12?>">Destek talebi bulunamadı.</td></tr>
<?Php }
?>