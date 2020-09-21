<?php 
$makina=z(8,'makina');
$makineislevi=z(8,'makineislevi');
$makinaoku=z(1,$makina,'','makinacesitleri');
$makinedegeripusarray=(!empty($makinaoku['pus'])?json_decode($makinaoku['pus'],1):'');
$makinedegerifaynarray=(!empty($makinaoku['fayn'])?json_decode($makinaoku['fayn'],1):'');
//$makinesayi=count($makinedegeriarray);

$makinedegeriarray=(!empty($makinaoku['makineyetenegi'])?json_decode($makinaoku['makineyetenegi'],1):'');

$makinedonguid='';

$makinedegerleri=array();
$makinedegerleri2=array();
$nesnemetinid=0;
if(!empty($makinedegeriarray)){
	$sayi1=0;
	foreach ($makinedegeriarray as $mkd => $makinedegeri) {
		$nesneoku=z(1,$makinedegeri,'','nesne');
		$nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
		$nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$makinedegeri);
		$makinedegerleri[$nesnemetinid]=$nesnemetin1;

		if(!empty($makineislevi)){
			if($makineislevi==$nesnemetinid){
				$makinedonguid=$mkd;
			}
		} else{
			if($sayi1==0){
				$makinedonguid=$mkd;
			}
		}
		$sayi1++;
	}
}

if(!empty($makinedonguid)||$makinedonguid==0){
	$makinedongupus=$makinedegeripusarray[$makinedonguid];
	$makinedongufayn=$makinedegerifaynarray[$makinedonguid];
	foreach ($makinedongupus as $mkdpus => $mkdongu) {
		$makinedegerleri2[$mkdpus]=(!empty($mkdongu)?$mkdongu:'');
		$makinedegerleri2[$mkdpus].=(!empty($makinedongufayn[$mkdpus])?' - '.$makinedongufayn[$mkdpus]:'');
	}
}
/*/
echo '<pre>';
print_r($makinedegerleri);
print_r($makinedegerleri2);
/*/

$json['sonuc']=1;
$json['cevap']= array(
	'makinedegerleri'=>$makinedegerleri,
	'makinedegerleri2'=>$makinedegerleri2
);
?>