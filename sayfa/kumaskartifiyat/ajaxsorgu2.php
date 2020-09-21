<?php 
$boyabaskiall=z(1,'','ID,fiyat,fire,nesne_IDdoviz','boyabaski');
$nesnedoviz=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
$boyabaskiall=z(37, $boyabaskiall);
$resimid=z(8,'resim');
$ytkdurum=z(8,'ytkdurum');
$id=z(8,'id');
$id=(!empty($id)?$id:0);
$tbl='kumaskartifiyat';
$kumasvt='';
$resim='';
$pusvefaynjson=array();
$pusvefaynmetniyeni='';

if(!empty($resimid)){
	$resim=z(1,array('arsiv'=>0,'tablo'=>$tbl,'tablo_ID'=>$resimid),'ID,img','galeri');
	if(!empty($ytkdurum)){
		$kumasvt=z(1,$resimid,'','kumaskartifiyat');
		$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol' OR ad='dovizfason' ",'ID,ad,metin1,metin2','nesne'));
		$makinacesidiadi='';
		if(!empty($kumasvt['makinacesitleri_ID'])){ $makinacesidioku=z(1,$kumasvt['makinacesitleri_ID'],'ID,ad,pus,fayn,makineyetenegi','makinacesitleri'); $makinacesidiadi=(!empty($makinacesidioku['ad'])?$makinacesidioku['ad']:''); }
		$kumasturuadi='';
		$kumasveritopla='';
		$kumasturunesnedoviz='';
		$pusvefaynmetni2='';
		$pusvefaynjson=array();
		if(!empty($kumasvt['kumasturu_ID'])){
			$kumasturuoku=z(1,$kumasvt['kumasturu_ID'],'ID,ad,pusvefayn,nesne_IDdoviz,nesne_IDmakineYetenegi','kumasturu'); $kumasturuadi=(!empty($kumasturuoku['ad'])?$kumasturuoku['ad']:'');

			$kumasturunesnedoviz=(!empty($kumasturuoku['nesne_IDdoviz'])?$kumasturuoku['nesne_IDdoviz']:'');

			$kumaspusvefayn=(!empty($kumasvt['pusvefayn'])?$kumasvt['pusvefayn']:'');
			$makinepus=(!empty($makinacesidioku['pus'])?json_decode($makinacesidioku['pus'],1):0);
			$makinefayn=(!empty($makinacesidioku['fayn'])?json_decode($makinacesidioku['fayn'],1):0);
			$makinesayi=count($makinepus);

			$makinedegeriarray=(!empty($makinacesidioku['makineyetenegi'])?json_decode($makinacesidioku['makineyetenegi'],1):'');
			$makineislevi=(!empty($kumasturuoku['nesne_IDmakineYetenegi'])?$kumasturuoku['nesne_IDmakineYetenegi']:'');
			$makinedonguid='';
			
			$makinedegerleri=array();
			$makinedegerleri2=array();
			if(!empty($makinedegeriarray)){
				foreach ($makinedegeriarray as $mkd => $makinedegeri) {
					$nesneoku=z(1,$makinedegeri,'','nesne');
					$nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
					$nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$mkd);
					$makinedegerleri[$nesnemetinid]=$nesnemetin1;
					if(!empty($makineislevi)){
						if($makineislevi==$nesnemetinid){
							$makinedonguid=$mkd;
						}
					}
				}
			}

			if(!empty($makinedonguid)){
				$makinedongupus=$makinepus[$makinedonguid];
				$makinedongufayn=$makinefayn[$makinedonguid];
			}

			if(!empty($kumaspusvefayn)){
				$kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
			}
			if(!empty($kumaspusvefayn)){
				foreach($kumaspusvefayn as $pf => $pfarray){
					$pusvefaynsayi=$pfarray;

					$pusvefayncheck=(!empty($pfarray[0])?$pfarray[0]:'');
					$pusvefayndeger=(!empty($pfarray[1])?$pfarray[1]:$pfarray[0]);

					if($pusvefayncheck=="on"){
						if(!empty($makinedongupus[$pf])){
							$pusvefaynmetni2=' Pus: '.$makinedongupus[$pf];
							$pusvefaynmetniyeni.=' Pus: '.$makinedongupus[$pf];
						}
						if(!empty($makinedongufayn[$pf])){
							$pusvefaynmetni2.=' Fayn: '.$makinedongufayn[$pf];
							$pusvefaynmetniyeni.=' Fayn: '.$makinedongufayn[$pf].'<br>';
						}
					}
					
					$pusvefaynjson[$pf]['pusvefayn']=$pusvefaynmetni2;
					$pusvefaynjson[$pf]['deger']=$pusvefayndeger;
					$pusvefaynjson[$pf]['check']=$pusvefayncheck;
				}
			}
		}

	}
}

$json['sonuc']=1;
$json['cevap']= array(
	'boyabaskiall'=>$boyabaskiall,
	'nesnedoviz'=>$nesnedoviz,
	'resim'=>$resim,
	'kumasvt'=>$kumasvt,
	'pusvefaynmetniyeni'=>$pusvefaynmetniyeni,
);
?>