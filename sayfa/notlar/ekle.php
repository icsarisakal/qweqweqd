<?Php
if(z(7,$tbl)){
	$_X=z(7,$tbl);
	z(6,$tbl);
	if(!empty($_X['metin'])){
		//if(!empty($_X['musteri_ID'])){
			//if(!z(5,'WHERE ad="'.$_X['ad'].'"')){
				$_X['personel_ID']=z('lgn','ID');
				$_X['tarih']=z('datetime');
				if(z(2,$_X)){
					z(33,'ekle',1);

					$headers = "";
					$headers = "From: info@starteks.com.tr\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=utf-8\r\n";
					mail( "zertel@orhantutum.com.tr", "Starteks panel 2 için yeni not", $_X['metin'], $headers);
					
					unset($_X);

				}
				else z(33,'ekle',-1);
			//}
			//else z(33,'ekle',3);
		//}
		//else z(33,'ekle',12);
	}
	else z(33,'ekle',11);
	if(z(7,'git1'))git();
}
?>