<?Php
if(!empty($ID)&&!empty($mtip)){
	switch($mtip){
		case'ekle':
		case'bildir':
			$x=z(1,$ID,NULL,$tbl);
			if(!empty($x)){
				if(empty($x['durum'])){
					$_Y=z(1,NULL,NULL,'nesne');if(!empty($_Y))foreach($_Y as $y)$_Nesne[$y['ID']]=$y;
					$_Mesaj=z(1,"WHERE destek_ID='".$ID." ORDER BY ID DESC LIMIT 1'",NULL,$tbl.'mesaj');
					$m['baslik']=$x['baslik'].' ('.$_Oncelik[$x['oncelik']].')';
					$m['kime']=z(1,"WHERE admin='1'",'eposta','personel');
					$m['konu']=$ayr['siteAd'].' Destek Talebi - '.$x['baslik'].' ('.$_Oncelik[$x['oncelik']].')';
					$m['icerik']='<meta charset="utf-8">'.
					'<table border="0" cellpadding="0" cellspacing="0">'.
					'<tr><td>Yeni destek talebi oluşturuldu. Lütfen kontrol ediniz.</td></tr>'.
					'<tr><td>&nbsp;</td></tr>';
					 if(!empty($x['personel_ID'])){
						$_Y=z(1,NULL,NULL,'personel');if(!empty($_Y))foreach($_Y as $y)$_P[$y['ID']]=$y;
						$m['icerik'].='<tr><td><b>Oluşturan Personel</b></td></tr>';
						$m['icerik'].='<tr><td><a href="'.$ayr['siteUrl'].'?s=personel&a=duzenle&id='.$_X['personel_ID'].'">'.
						$_P[$_X['personel_ID']]['ad'].
						(!empty($_P[$_X['personel_ID']]['tel'])?' - '.$_P[$_X['personel_ID']]['tel']:'').
						(!empty($_P[$_X['personel_ID']]['eposta'])?' - '.$_P[$_X['personel_ID']]['eposta']:'').
						'</a></td></tr>';
						$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					}
					$m['icerik'].='<tr><td><b>Öncelik</b></td></tr>';
					$m['icerik'].='<tr><td>'.$_Oncelik[$x['oncelik']].'</td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					$m['icerik'].='<tr><td><b>Başlık</b></td></tr>';
					$m['icerik'].='<tr><td>'.$x['baslik'].'</td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					if(!empty($_Mesaj)){
						$m['icerik'].='<tr><td><b>Mesaj İçeriği</b></td></tr>';
						$m['icerik'].='<tr><td>'.str_replace("\n",'<br>',$_Mesaj[0]['mesaj']).'</td></tr>';
						$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					}
					$m['icerik'].='<tr><td><b>Bağlantı</b></td></tr>';
					$m['icerik'].='<tr><td>Cevap vermek veya görüntülemek için <a href="'.$ayr['siteUrl'].'?s='.$tbl.'&a=detay&kod='.z(34,$ID).'">buraya</a> tıklayınız.</td></tr>';
					$m['icerik'].='<tr><td><a href="'.$ayr['siteUrl'].'?s='.$tbl.'&a=detay&kod='.z(34,$ID).'">'.$ayr['siteUrl'].'?s='.$tbl.'&a=detay&kod='.z(34,$ID).'</a></td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					$m['icerik'].='<tr><td>'.$ayr['siteAd'].'</td></tr>';
					$m['icerik'].='<tr><td>&nbsp;</td></tr>';
					$m['icerik'].='</table>';
					require(__DIR__.'/../../parca/mail.php');
				}else $msnc=3; // Zaten onaylanmış.
			}else $msnc=10; // Sipariş bulunamadı.
		break;
	}
}
?>