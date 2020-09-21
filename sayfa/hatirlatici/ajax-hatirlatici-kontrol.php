<?php
exit();
$tarihh=z('datetime');
$e1=explode(' ', $tarihh);
$suankisaat=$e1[1];
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
$dt = '2015-12-01';
$day = date('l',strtotime($dt));
$ay= date('m');
$yil= date('y');
$gun= date('d');
$saat= date('H');
$dakika= date('i');
$persid=z('lgn','ID');
$personelvt=z(1,$persid,'','personel');
$pdcrpl2='';
$pfcrpl2='';
$prcrpl2='';
if(!empty($personelvt['departmanlar'])){
	$pdc= '"'.$personelvt['departmanlar'].'"';
	$pdcrpl=str_replace(',', '",%"', $pdc);
	$pdcrpl2=" AND departman LIKE '%".$pdcrpl."%'";
} 
if(!empty($personelvt['firmaTipleri'])){
	$pfc= '"'.$personelvt['firmaTipleri'].'"';
	$pfcrpl=str_replace(',', '",%"', $pfc);
	$pfcrpl2=" AND firmaTip LIKE '%".$pfcrpl."%'";
}
if(!empty($personelvt['rehberGruplar'])){
	$prc= '"'.$personelvt['rehberGruplar'].'"';
	$prcrpl=str_replace(',', '",%"', $prc);
	$prcrpl2=" AND rehberGrup LIKE '%".$prcrpl."%'";
}
if(empty($personelvt['departmanlar'])&&empty($personelvt['firmaTipleri'])&&empty($personelvt['rehberGruplar'])){
	$pdcrpl2=' AND arsiv = 11 ';
	$pfcrpl2=' AND arsiv = 11 ';
	$prcrpl2=' AND arsiv = 11 ';
}
$persorgu=" AND personelMulti LIKE '%'\"".$persid."\"'%'";

//echo $day;
$sure=z(8,'sure');
$surex=z(8,'surex');
$suankitarih=z('datetime');
$date1=z('date');
$ertrh=" AND tarihErteleme > '".$suankitarih.'\'';
$erdrm=" AND durumOkundu = 1 ";
$persert=" personel_ID = ".$persid;
$ertele="WHERE ".$persert.$ertrh;
$okundu="WHERE ".$persert.$erdrm;
$herteleme=z(1,$ertele,'','erteleme');
$erteleid=z(38,$herteleme,'hatirlatici_ID','ID!');
$ertelerp=str_replace(array('(', '\'', ')'), '', $erteleid);
$ertelerp2=str_replace(array('!='), ' != ', $ertelerp);
$ertelerp3=str_replace(array('OR'), ' AND ', $ertelerp2);
if(!empty($ertelerp3)){ 
	$ertelesorgu=" AND ".$ertelerp3; 
}else {
	$ertelesorgu='';
}
$hokundu=z(1,$okundu,'','erteleme');
$okunduid=z(38,$hokundu,'hatirlatici_ID','ID!');
$okundurp=str_replace(array('(', '\'', ')'), '', $okunduid);
$okundurp2=str_replace(array('!='), ' != ', $okundurp);
$okundurp3=str_replace(array('OR'), ' AND ', $okundurp2);
if(!empty($okundurp3)){ 
	$okundusorgu=" AND ".$okundurp3; 
}else {
	$okundusorgu='';
}
$kendime="WHERE tarihHatirlatici <= '".$suankitarih."' AND arsiv = 0 AND secim = 1 AND tekrar != 2 AND herkes = 2 AND personelMulti= ".$persid." ".$ertelesorgu.$okundusorgu;
$kendimehaftalik="WHERE tarihSaat <= '".$suankisaat."' AND arsiv = 0 AND secim = 1 AND tekrar = 2 AND herkes = 2 AND personelMulti= ".$persid." AND hftMulti LIKE '%\"".$gunno[$gunn]."\"%'".$ertelesorgu.$okundusorgu;
$kendimetoplu="WHERE arsiv = 0 AND secim = 2 AND herkes = 2 AND personelMulti= ".$persid." AND tarihMulti LIKE '%".$date1."%'".$ertelesorgu.$okundusorgu;
$personelsec="WHERE tarihHatirlatici <= '".$suankitarih."' AND arsiv = 0 AND secim = 1 AND tekrar != 2 ".$persorgu.$ertelesorgu.$okundusorgu;
$personelsechaftalik="WHERE tarihSaat <= '".$suankisaat."' AND arsiv = 0 AND secim = 1 AND tekrar = 2 AND hftMulti LIKE '%\"".$gunno[$gunn]."\"%'".$persorgu.$ertelesorgu.$okundusorgu;
$personelsectoplu="WHERE arsiv = 0 AND secim = 2 AND tarihMulti LIKE '%".$date1."%'".$persorgu.$ertelesorgu.$okundusorgu;
$tekseferlik="WHERE tarihHatirlatici <= '".$suankitarih."' AND arsiv = 0 AND secim = 1 AND tekrar = 1 ".$pdcrpl2.$pfcrpl2.$prcrpl2.$ertelesorgu.$okundusorgu;
$haftalik="WHERE tarihSaat <= '".$suankisaat."' AND durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 2 AND hftMulti LIKE '%\"".$gunno[$gunn]."\"%'".$pdcrpl2.$pfcrpl2.$prcrpl2.$ertelesorgu.$okundusorgu;
$aylik="WHERE tarihHatirlatici <= '".$suankitarih."' AND durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 3".$pdcrpl2.$pfcrpl2.$prcrpl2.$ertelesorgu.$okundusorgu;
$yillik="WHERE tarihHatirlatici <= '".$suankitarih."' AND durum = 0 AND secim = 1 AND arsiv = 0 AND tekrar = 4".$pdcrpl2.$pfcrpl2.$prcrpl2.$ertelesorgu.$okundusorgu;
$toplu="WHERE durum = 0 AND secim = 2 AND arsiv = 0 AND tekrar = 0 AND tarihMulti LIKE '%".$date1."%'".$pdcrpl2.$pfcrpl2.$prcrpl2.$ertelesorgu.$okundusorgu;
$topluertele="WHERE hatirlatici_ID = 0 AND tarihErteleme <= '".$suankitarih."' ".$persert;
$gizlenen=z(8,'hgizle');
if(!empty($gizlenen)){ z(3,$gizlenen,array('durum'=>'1'),'hatirlatici'); z('git','geri'); }

$_Kendime=z(1,$kendime,'','hatirlatici');
$_KendimeHaftalik=z(1,$kendimehaftalik,'','hatirlatici');
$_KendimeToplu=z(1,$kendimetoplu,'','hatirlatici');
$_Personelsec=z(1,$personelsec,'','hatirlatici');
$_PersonelsecHaftalik=z(1,$personelsechaftalik,'','hatirlatici');
$_PersonelsecToplu=z(1,$personelsectoplu,'','hatirlatici');
$_TekSeferlik=z(1,$tekseferlik,'','hatirlatici');
$_Haftalik=z(1,$haftalik,'','hatirlatici');
$_Aylik=z(1,$aylik,'','hatirlatici');
$_Yillik=z(1,$yillik,'','hatirlatici');
$_Toplu=z(1,$toplu,'','hatirlatici');
$_TopluErtele=z(1,$topluertele,'','erteleme');
$_Personel=z(1,'','ID,ad','personel');
$_Musteritakip=z(1,'','ID,firma_ID','musteritakip');
$_Istakip=z(1,'','ID,firma_ID','istakip');
$_Siparistakip=z(1,'','ID,firma_ID,musteritakip_ID','siparistakip');
$_Firma=z(1,'','ID,ad','firma');
$_Teklif=z(1,'','ID,firma_ID','teklif');

foreach (array("_Kendime","_KendimeHaftalik","_KendimeToplu","_Personelsec","_PersonelsecHaftalik","_PersonelsecToplu","_TekSeferlik","_Haftalik","_Aylik","_Yillik","_Toplu") as $hVarName) {
	if(!empty($GLOBALS[$hVarName])){
		foreach ($GLOBALS[$hVarName] as $i=>$xht) {
			$GLOBALS[$hVarName][$i]['sanalTarih']=!empty($xht['tarihHatirlatici']) ? z('tarihsaat',$xht['tarihHatirlatici']) : '';
		}
	}
}

$json['sonuc']=1;
$json['mesaj']='İşlem tamamlandı.';
$json['cevap']= array(
	'kendime'=>$_Kendime,
	'kendimehaftalik'=>$_KendimeHaftalik,
	'kendimetoplu'=>$_KendimeToplu,
	'personelsec'=>$_Personelsec,
	'personelsechaftalik'=>$_PersonelsecHaftalik,
	'personelsectoplu'=>$_PersonelsecToplu,
	'tekseferlik'=>$_TekSeferlik,
	'haftalik'=>$_Haftalik,
	'aylik'=>$_Aylik,
	'yillik'=>$_Yillik,
	'toplu'=>$_Toplu,
	'topluertele'=>$_TopluErtele,
	'personel'=>$_Personel,
	'musteritakip'=>$_Musteritakip,
	'istakip'=>$_Istakip,
	'siparistakip'=>$_Siparistakip,
	'firma'=>$_Firma,
	'teklif'=>$_Teklif,
);
?>