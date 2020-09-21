<?php 
$konu='Otomasyon sisteminden hatırlatıcınız bulunmakta';
$icerik='Otomasyon hatırlatıcı gönderimi';
$gonderenAdi='Orhan Tutum';
$replyPosta='noreply@orhantutum.com.tr';
$file = 'img/logo.png';
$kime='metehanozkan20@gmail.com';

$tarihh=z('datetime');
$dd=strtotime($tarihh);
$gunn = date("D", $dd);
$gunno=array(
	'Mon'=>'pzt',
	'Tue'=>'sal',
	'Wed'=>'crs',
	'Thu'=>'prs',
	'Fri'=>'cum',
	'Sat'=>'cmt',
	'Sun'=>'pzr',
);

$suankitarih=z('datetime');
$hatirlaticisorgu="WHERE arsiv = 0 AND cronjobislem = 0 AND tarihHatirlatici <= '".$suankitarih."'";
$personelid='';
$_Hatirlatici=z(1,$hatirlaticisorgu,'','hatirlatici');
if(!empty($_Hatirlatici)){
	foreach ($_Hatirlatici as $htc) {

		$hdepartman=$htc['departman'];
		if($hdepartman!=NULL){
			$hdepartmanstr1=str_replace(array('"','[',']'), '', $hdepartman);
			$hdepartmanstr2=str_replace(array(','), ',', $hdepartmanstr1);
			$hdepartmanexp=explode(',', $hdepartmanstr2);
			$departmansayi=0;
			$hatsorgu="WHERE arsiv = 0 ";
			$departmansorgu="";
			if(!empty($hdepartmanexp)){
				foreach ($hdepartmanexp as $hdrt) {
					if($departmansayi==0){
						$departmansorgu.=' AND departmanMulti LIKE '."'%".$hdrt."%'";
						$departmansayi=1;
					}else {
						$departmansorgu.=' OR departmanMulti LIKE '."'%".$hdrt."%'";
					}
				}
			}
			$personelsorgu=$hatsorgu.$personelid.$departmansorgu;
			$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
			if(!empty($personeldprt)){
				foreach ($personeldprt as $pdprt) {
					$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
					if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
						echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
					} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
						echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}

		$hfirmatip=$htc['firmaTip'];
		if($hfirmatip!=NULL){
			$hfirmatipstr1=str_replace(array('"','[',']'), '', $hfirmatip);
			$hfirmatipstr2=str_replace(array(','), ',', $hfirmatipstr1);
			$hfirmatipexp=explode(',', $hfirmatipstr2);
			$firmatipsayi=0;
			$hatsorgu="WHERE arsiv = 0 ";
			$firmatipsorgu="";
			if(!empty($hfirmatipexp)){
				foreach ($hfirmatipexp as $hdrt) {
					if($firmatipsayi==0){
						$firmatipsorgu.=' AND firmaTipleri LIKE '."'%".$hdrt."%'";
						$firmatipsayi=1;
					}else {
						$firmatipsorgu.=' OR firmaTipleri LIKE '."'%".$hdrt."%'";
					}
				}
			}
			$personelsorgu=$hatsorgu.$personelid.$firmatipsorgu;
			$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
			if(!empty($personeldprt)){
				foreach ($personeldprt as $pdprt) {
					$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
					if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
						echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
					} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
						echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}

		$hrehbergrup=$htc['rehberGrup'];
		if($hrehbergrup!=NULL){
			$hrehbergrupstr1=str_replace(array('"','[',']'), '', $hrehbergrup);
			$hrehbergrupstr2=str_replace(array(','), ',', $hrehbergrupstr1);
			$hrehbergrupexp=explode(',', $hrehbergrupstr2);
			$rehbergrupsayi=0;
			$hatsorgu="WHERE arsiv = 0 ";
			$rehbergrupsorgu="";
			if(!empty($hrehbergrupexp)){
				foreach ($hrehbergrupexp as $hdrt) {
					if($rehbergrupsayi==0){
						$rehbergrupsorgu.=' AND rehberGruplar LIKE '."'%".$hdrt."%'";
						$rehbergrupsayi=1;
					}else {
						$rehbergrupsorgu.=' OR rehberGruplar LIKE '."'%".$hdrt."%'";
					}
				}
			}
			$personelsorgu=$hatsorgu.$personelid.$rehbergrupsorgu;
			$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
			if(!empty($personeldprt)){
				foreach ($personeldprt as $pdprt) {
					$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
					if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
						echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
					} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
						echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}



	}
}

$hafthatirlaticisorgu="WHERE arsiv = 0 AND cronjobislem = 0 AND hftMulti LIKE '%\"".$gunno[$gunn]."\"%'";
$_HaftHatirlatici=z(1,$hafthatirlaticisorgu,'','hatirlatici');
if(!empty($_HaftHatirlatici)){
	foreach ($_HaftHatirlatici as $hfthtc) {
		$hhftmulti=$hfthtc['hftMulti'];

		if(!empty($hhftmulti)){

			$hdepartman=$htc['departman'];
			if($hdepartman!=NULL){
				$hdepartmanstr1=str_replace(array('"','[',']'), '', $hdepartman);
				$hdepartmanstr2=str_replace(array(','), ',', $hdepartmanstr1);
				$hdepartmanexp=explode(',', $hdepartmanstr2);
				$departmansayi=0;
				$hatsorgu="WHERE arsiv = 0 ";
				$departmansorgu="";
				if(!empty($hdepartmanexp)){
					foreach ($hdepartmanexp as $hdrt) {
						if($departmansayi==0){
							$departmansorgu.=' AND departmanMulti LIKE '."'%".$hdrt."%'";
							$departmansayi=1;
						}else {
							$departmansorgu.=' OR departmanMulti LIKE '."'%".$hdrt."%'";
						}
					}
				}

				$personelsorgu=$hatsorgu.$personelid.$departmansorgu;
				$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
				if(!empty($personeldprt)){
					foreach ($personeldprt as $pdprt) {
						$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
						if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
							echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
						} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
							echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}

		$hfirmatip=$htc['firmaTip'];
		if($hfirmatip!=NULL){
			$hfirmatipstr1=str_replace(array('"','[',']'), '', $hfirmatip);
			$hfirmatipstr2=str_replace(array(','), ',', $hfirmatipstr1);
			$hfirmatipexp=explode(',', $hfirmatipstr2);
			$firmatipsayi=0;
			$hatsorgu="WHERE arsiv = 0 ";
			$firmatipsorgu="";
			if(!empty($hfirmatipexp)){
				foreach ($hfirmatipexp as $hdrt) {
					if($firmatipsayi==0){
						$firmatipsorgu.=' AND firmaTipleri LIKE '."'%".$hdrt."%'";
						$firmatipsayi=1;
					}else {
						$firmatipsorgu.=' OR firmaTipleri LIKE '."'%".$hdrt."%'";
					}
				}
			}
			$personelsorgu=$hatsorgu.$personelid.$firmatipsorgu;
			$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
			if(!empty($personeldprt)){
				foreach ($personeldprt as $pdprt) {
					$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
					if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
						echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
					} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
						echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}

		$hrehbergrup=$htc['rehberGrup'];
		if($hrehbergrup!=NULL){
			$hrehbergrupstr1=str_replace(array('"','[',']'), '', $hrehbergrup);
			$hrehbergrupstr2=str_replace(array(','), ',', $hrehbergrupstr1);
			$hrehbergrupexp=explode(',', $hrehbergrupstr2);
			$rehbergrupsayi=0;
			$hatsorgu="WHERE arsiv = 0 ";
			$rehbergrupsorgu="";
			if(!empty($hrehbergrupexp)){
				foreach ($hrehbergrupexp as $hdrt) {
					if($rehbergrupsayi==0){
						$rehbergrupsorgu.=' AND rehberGruplar LIKE '."'%".$hdrt."%'";
						$rehbergrupsayi=1;
					}else {
						$rehbergrupsorgu.=' OR rehberGruplar LIKE '."'%".$hdrt."%'";
					}
				}
			}
			$personelsorgu=$hatsorgu.$personelid.$rehbergrupsorgu;
			$personeldprt=z(1,$personelsorgu,'ID,ad,tel,eposta','personel');
			if(!empty($personeldprt)){
				foreach ($personeldprt as $pdprt) {
					$persarray=array($personelid);
					//Eğer gelen ıd sorgudan gelen ıd ile varsa mail gönderme dedik
					if (in_array('"'.$pdprt['ID'].'"', $persarray)) {
						echo "ID var maili gönderme";
						//Aslında ıdyi gönderdik burada bir hata var
					} else {
					//Sorguda daha önce ID eşleşmediyse burada mail gönderimi yapılacak
						echo "ID yok maili gönder".'<br>';
						$kime=$pdprt['eposta'];
						//smtpMailGonder($kime,$konu,$icerik,$gonderenAdi,$replyPosta,$file);
						$personelid.='"'.$pdprt['ID'].'", '; //Amaç aynı personele tekrar mail gitmemesi
					}
				}
			}
		}

	}
}
}

?>