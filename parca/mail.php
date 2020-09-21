<?Php
$msnc=0;
if(!empty($m['kime'])&&!empty($m['konu'])&&!empty($m['icerik'])&&!empty($m['baslik'])){
	$headers='From: '.$m['baslik'].'<info@netadim.com.tr>'."\r\n";
	$headers.='MIME-Version: 1.0'."\r\n";
	$headers.='Content-type: text/html; charset=utf-8'."\r\n";
	$headers.="Reply-To: <info@netadim.com.tr> \n";
	if(is_array($m['kime'])){
		$bsrm=0;
		foreach($m['kime'] as $kime){
			if(!empty($kime))
			$bsrm+=maill(str_replace("\n",'',$kime),$m['konu'],$m['icerik'],$headers);
		}
		if(count($m['kime'])==$bsrm)$msnc=1;
		else if($bsrm>0)$msnc=2;
	}
	else{
		$msnc=maill($m['kime'],$m['konu'],$m['icerik'],$headers);
	}
}
function maill($a,$b,$c,$d){
	if(z('host')=='localhost'){
		z('con',Array('localhost','root','root','zertel','lc_'));
		return z(2,array('tarih'=>z('datetime'),'kime'=>$a,'konu'=>$b,'mesaj'=>$c,'baslik'=>$d),'mail');
	}
	else return mail($a,$b,$c,$d);
}
?>