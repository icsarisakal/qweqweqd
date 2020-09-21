<?php 
$iplikfire='';
$kurlufiyat='';
$kurlufiyat2='';
$numaracins='';
$boyaKontrol='';
$elyafnesnemetni='';
$elyafnesnemetni='';
$kumasturu='';
$pusvefaynmetni='';
$pusvefaynmetni2='';
$kumasfasonorgu='';
$kumasfasonorgu2='';
$dovizCinsi='';
$boyabaskioku=0;
$pusvefaynjson=array();
$pusvefaynjson2=array();
$pusvefaynjson3=array();
$elyafsayiarray=array();
$elyafarray=array();
$kompozisyonarray=array();
$kursuziplikfiyat='';
$kurluiplikfire='';



$cekilenhamkumastl=z(8,'cekilenhamkumastl');
if($cekilenhamkumastl==''){
	$cekilenhamkumastl=0;
}
$iplikget=z(8,'iplik');
$kumas=z(8,'kumas');
$getiplikoran=z(8,'getiplikoran');
$resimsil=z(8,'resimsil');
$kumasturuoku=z(8,'kumasturu');
$boyabaskiget=z(8,'boyabaski');
$_Nesne=z(37,z(1,"WHERE ad='' OR ad='iplikkartTipi' OR ad='elyafTipi' OR ad='doviz' OR ad='uretimTipi' OR ad='boyaKontrol'",'ID,ad,metin1,metin2','nesne'));
$iplik=z(1,$iplikget,'','iplik');
if(!empty($iplikget)){
$iplikkart=(!empty($_Nesne[$iplik['nesne_IDiplikkartTipi']]['metin1'])?$_Nesne[$iplik['nesne_IDiplikkartTipi']]['metin1']:'&nbsp;');
$doviz=(!empty($_Nesne[$iplik['nesne_IDdoviz']]['metin1'])?$_Nesne[$iplik['nesne_IDdoviz']]['metin1']:'&nbsp;');
$dovizCinsi=(!empty($_Nesne[$iplik['nesne_IDdoviz']]['metin1'])?$_Nesne[$iplik['nesne_IDdoviz']]['metin1']:'&nbsp;');
$uretimTipi=(!empty($_Nesne[$iplik['nesne_IDuretimTipi']]['metin1'])?$_Nesne[$iplik['nesne_IDuretimTipi']]['metin1']:'&nbsp;');
$boyaKontrol=(!empty($_Nesne[$iplik['nesne_IDboyaKontrol']]['metin1'])?$_Nesne[$iplik['nesne_IDboyaKontrol']]['metin1']:'&nbsp;');
$elyafnesnemetni=(!empty($_Nesne[$iplik['nesne_IDelyafTipi']]['metin1'])?$_Nesne[$iplik['nesne_IDelyafTipi']]['metin1']:'&nbsp;');
$numaracins=$iplikkart.' '.$uretimTipi;
$iplikfire=(!empty($iplik['fire'])?z(36,$iplik['fire']):'0');
$iplikfiyat=(!empty($iplik['fiyat'])?z(36,$iplik['fiyat']):'0');
$kursuziplikfiyat=$iplikfiyat;
$kurluiplikfire=$iplikfire;
$doviznesne=(!empty($_Nesne[$iplik['nesne_IDdoviz']]['metin1'])?$_Nesne[$iplik['nesne_IDdoviz']]['metin1']:'&nbsp;');
if(!empty($iplik['elyaf'])&&!empty($getiplikoran)){
	$elyafarray=(!empty($iplik['elyaf'])?json_decode($iplik['elyaf'],1):'');
	if(!empty($elyafarray)){
		$elyafarray=str_replace('puan','',$elyafarray);
	}
	if(!empty($elyafarray)){ foreach($elyafarray as $el => $elyfb){
			$elyafnesne=(!empty($_Nesne[$el]['metin1'])?$_Nesne[$el]['metin1']:'&nbsp;');
			$elyfbhesapla=($elyfb/100)*$getiplikoran;
			$elyfbhesapla=number_format($elyfbhesapla);
			if(!empty($kompozisyonarray[$elyafnesne])){
				$eskihesaplama=$kompozisyonarray[$elyafnesne];
				$yenihesaplama=($eskihesaplama+$elyfbhesapla);
				$kompozisyonarray[$elyafnesne]=$yenihesaplama;
			} else {
				$kompozisyonarray[$elyafnesne]=$elyfbhesapla;
			}
		} 
	}
}
}


$dovizcinsi='TRY';
$TRY=1;
$USD=z(8,'mkurusd');
$EUR=z(8,'mkureur');
$mkurdovizcinsi=z(8,'mkurdovizcinsi');
$bnu=1;
$bna=1;
if(!empty($mkurdovizcinsi)){
	$dovizcinsi=(!empty($_Nesne[$mkurdovizcinsi]['metin1'])?$_Nesne[$mkurdovizcinsi]['metin1']:'&nbsp;');
}

if(!empty($doviznesne)&&$doviznesne=='USD'){
	$bnu=$USD;
}
if(!empty($doviznesne)&&$doviznesne=='EUR'){
	$bnu=$EUR;
}
if(!empty($doviznesne)&&$doviznesne=='TRY'){
	$bnu=$TRY;
}

if(!empty($dovizcinsi)&&$dovizcinsi=='USD'){
	$bna=$USD;
}
if(!empty($dovizcinsi)&&$dovizcinsi=='EUR'){
	$bna=$EUR;
}
if(!empty($dovizcinsi)&&$dovizcinsi=='TRY'){
	$bna=$TRY;
}


if(!empty($iplikget)){
//$kurlufiyat=kur($iplikfiyat,$doviznesne,$dovizcinsi);
$kurlufiyat2=($iplikfiyat*$bnu);
}
if(!empty($mkurdovizcinsi)){
	$kurlufiyat2=$iplikfiyat*$bnu/$bna;
	$kurluiplikfire=($kurlufiyat2*$bnu);
}
$kurlufiyat2=z(36,$kurlufiyat2);
$pusvefaynmetni='';
$pusvefaynmetni2='';

$kumassorgu="WHERE arsiv='0' AND makinacesitleri_ID='".$kumas."'";
$kumasturu=z(1,$kumassorgu,'','kumasturu');
if(!empty($kumasturu)){
	foreach($kumasturu as $ktur => $kturu){
		$kumasadi=(!empty($kturu['ad'])?$kturu['ad']:' ');
		$makinecesitlerinioku=z(1,$kturu['makinacesitleri_ID'],'','makinacesitleri');

		$makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
		$makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
		$kumaspusvefayn=(!empty($kturu['pusvefayn'])?$kturu['pusvefayn']:0);
		$makinesayi=count($makinepus);
		$makinedegeriarray=(!empty($makinecesitlerinioku['makineyetenegi'])?json_decode($makinecesitlerinioku['makineyetenegi'],1):'');
		$makineislevi=(!empty($kturu['nesne_IDmakineYetenegi'])?$kturu['nesne_IDmakineYetenegi']:'');
		$makinedonguid='';
		$makinedegerleri=array();
		$makinedegerleri2=array();
		$pusvefaynjson=array();
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
		$pusvefaynmetni='';
		$pusvefaynsayi=0;
		if(!empty($kumaspusvefayn)){
			$kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
		}
		if(!empty($kumaspusvefayn)){
			foreach($kumaspusvefayn as $pfarray){
				$pusvefaynsayi=$pfarray;
				$pusvefaynmetni=' '.$makinedongupus[$pfarray];
				$pusvefaynmetni.=' / '.$makinedongufayn[$pfarray];
				$pusvefaynjson[$pfarray]=$pusvefaynmetni;
			}
		}

		$kumasveritopla = $kumasadi;
		//$kumasveritopla = $kumasadi.' '.$pusmakine.' / '.$faynmakine;
		$kumasturu[$ktur]['sanalveri']=$kumasveritopla;
	}
}
$kumaspusvefayn=(!empty($kumasturu[0]['pusvefayn'])?$kumasturu[0]['pusvefayn']:0);
$kumasfasonorgu=(!empty($kumasturu[0]['fasonmaliyet'])?$kumasturu[0]['fasonmaliyet']:0);
$kumasfasondoviz=(!empty($kumasturu[0]['nesne_IDdoviz'])?$kumasturu[0]['nesne_IDdoviz']:0);
$fasondoviz=(!empty($_Nesne[$kumasfasondoviz]['metin1'])?$_Nesne[$kumasfasondoviz]['metin1']:'&nbsp;');
if(!empty($kumasturu[0]['makinacesitleri_ID'])){
	$makinecesitlerinioku=z(1,$kumasturu[0]['makinacesitleri_ID'],'','makinacesitleri');
	$makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
	$makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
	$makinesayi=count($makinepus);
	$makinedegeriarray=(!empty($makinecesitlerinioku['makineyetenegi'])?json_decode($makinecesitlerinioku['makineyetenegi'],1):'');
	$makineislevi=(!empty($kumasturu[0]['nesne_IDmakineYetenegi'])?$kumasturu[0]['nesne_IDmakineYetenegi']:'');
	$makinedonguid='';
	$makinedegerleri=array();
	$makinedegerleri2=array();
	$pusvefaynjson=array();
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
	$pusvefaynmetni='';
	$pusvefaynsayi=0;
	if(!empty($kumaspusvefayn)){
		$kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
	}
	if(!empty($kumaspusvefayn)){
		foreach($kumaspusvefayn as $pfarray){
			$pusvefaynsayi=$pfarray;
			$pusvefaynmetni=' '.$makinedongupus[$pfarray];
			$pusvefaynmetni.=' / '.$makinedongufayn[$pfarray];
			$pusvefaynjson[$pfarray]=$pusvefaynmetni;
		}
	}
}

$kumasturu2=z(1,$kumasturuoku,'','kumasturu');
$kumaspusvefayn=(!empty($kumasturu2['pusvefayn'])?$kumasturu2['pusvefayn']:0);
$kumasfasonorgu2=(!empty($kumasturu2['fasonmaliyet'])?$kumasturu2['fasonmaliyet']:0);
$kumasfasondoviz2=(!empty($kumasturu2['nesne_IDdoviz'])?$kumasturu2['nesne_IDdoviz']:0);
$fasondoviz2=(!empty($_Nesne[$kumasfasondoviz2]['metin2'])?$_Nesne[$kumasfasondoviz2]['metin2']:'&nbsp;');
if(!empty($kumasturu2['makinacesitleri_ID'])){
	$makinecesitlerinioku=z(1,$kumasturu2['makinacesitleri_ID'],'','makinacesitleri');
	$makinepus=(!empty($makinecesitlerinioku['pus'])?json_decode($makinecesitlerinioku['pus'],1):0);
	$makinefayn=(!empty($makinecesitlerinioku['fayn'])?json_decode($makinecesitlerinioku['fayn'],1):0);
	$makinesayi=count($makinepus);
	$makinedegeriarray=(!empty($makinecesitlerinioku['makineyetenegi'])?json_decode($makinecesitlerinioku['makineyetenegi'],1):'');
	$makineislevi=(!empty($kumasturu2['nesne_IDmakineYetenegi'])?$kumasturu2['nesne_IDmakineYetenegi']:'');
	$makinedonguid='';
	$makinedegerleri=array();
	$makinedegerleri2=array();
	$pusvefaynjson=array();
	if(!empty($makinedegeriarray)){
		$sayi1=0;
		foreach ($makinedegeriarray as $mkd => $makinedegeri) {
			$nesneoku=z(1,$makinedegeri,'','nesne');
			$nesnemetin1=(!empty($nesneoku['metin1'])?$nesneoku['metin1']:'');
			$nesnemetinid=(!empty($nesneoku['ID'])?$nesneoku['ID']:$mkd);
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
		$makinedongupus=$makinepus[$makinedonguid];
		$makinedongufayn=$makinefayn[$makinedonguid];
	}
	if(!empty($kumaspusvefayn)){
		$kumaspusvefayn=(!empty($kumaspusvefayn)?json_decode($kumaspusvefayn,1):'');
	}
	$pusmakine='';
	$faynmakine='';
	$pusvefaynmetni2='';
	$pusvefaynsayi=0;
	if(!empty($kumaspusvefayn)){
		foreach($kumaspusvefayn as $pfarray){
			$pusvefaynsayi=$pfarray;
			$pusvefaynmetni2=' '.$makinedongupus[$pfarray];
			$pusvefaynmetni2.=' / '.$makinedongufayn[$pfarray];
			$pusvefaynjson[$pfarray]=$pusvefaynmetni2;
		}
	}
}


$boyabaskiget=z(8,'boyabaski');
$boyabaskioku='';
$boyabaskitipi='';
$boyabaskifiyat='';
$boyabaskiformul='';
$_Nesneboyabaski='';
$fasonorgumaliyet=z(8,'fasonorgumaliyet');
if($fasonorgumaliyet=='-'){
	$fasonorgumaliyet=0;
}
if($cekilenhamkumastl!=''){
	$fasonorgumaliyet=$cekilenhamkumastl;
}
if(!empty($boyabaskiget)){
	$_Nesnedovizoku=z(37,z(1,"WHERE ad='' OR ad='doviz'",'ID,ad,metin1,metin2','nesne'));
	$boyabaskigetoku=z(1,$boyabaskiget,'','boyabaski');
	$boyabaskitipi=$boyabaskigetoku['ID'];
	$boyabaskifiyat=(!empty($boyabaskigetoku['fiyat'])?$boyabaskigetoku['fiyat']:0);
	$boyabaskifire=(!empty($boyabaskigetoku['fire'])?$boyabaskigetoku['fire']:0);
	$boyabaskidoviz=(!empty($_Nesnedovizoku[$boyabaskigetoku['nesne_IDdoviz']]['metin1'])?$_Nesnedovizoku[$boyabaskigetoku['nesne_IDdoviz']]['metin1']:'&nbsp;');

	$bnu=$TRY;
	if(!empty($boyabaskidoviz)&&$boyabaskidoviz=='USD'){
		$bnu=$USD;
	}
	if(!empty($boyabaskidoviz)&&$boyabaskidoviz=='EUR'){
		$bnu=$EUR;
	}
	if(!empty($boyabaskidoviz)&&$boyabaskidoviz=='TRY'){
		$bnu=$TRY;
	}
	$dovizcinsi='TRY';

	//$boyabaskikurlufiyat=kur($boyabaskifiyat,$boyabaskidoviz,$dovizcinsi);
	$boyabaskikurlufiyat=($boyabaskifiyat*$bnu);
	$boyabaskifiyattl=$boyabaskikurlufiyat;
	$boyabaskiformul1=($fasonorgumaliyet+$boyabaskifiyattl);
	$boyabaskiformul2=(100+$boyabaskifire)/100;
	$boyabaskiformul=$boyabaskiformul1*$boyabaskiformul2;
	$boyabaskiformul=z(36,$boyabaskiformul,2);

}
$ustboyabaski='';
$ustboyabaskifire=0;
$altboyabaskifire=0;
$ustbaskitoplam=0;
$altbaskitoplam=0;
$hamhizmet=0;

$ustboyabaskiget=z(8,'ustboyabaski');
$altboyabaskiget=z(8,'altboyabaski');
$fasonorgumaliyet='';
$fasonorgumaliyet=z(8,'fasonorgumaliyet');
if($fasonorgumaliyet=='-'){
	$fasonorgumaliyet=0;
}
$cekilenfasonorgu=z(8,'cekilenfasonorgu');

if($cekilenhamkumastl!=''){
	$fasonorgumaliyet=$cekilenhamkumastl;
}
if(!empty($ustboyabaskiget)){
	$ustboyabaskicek=z(1,$ustboyabaskiget,'','boyabaski');
	$doviznesne=(!empty($_Nesne[$ustboyabaskicek['nesne_IDdoviz']]['metin1'])?$_Nesne[$ustboyabaskicek['nesne_IDdoviz']]['metin1']:'&nbsp;');
	$ustboyabaski=(!empty($ustboyabaskicek['fiyat'])?$ustboyabaskicek['fiyat']:0);
	$ustboyabaskifire=(!empty($ustboyabaskicek['fire'])?$ustboyabaskicek['fire']:0);
	$ustboyabaskifire2=(!empty($ustboyabaskifire)?(($ustboyabaskifire+100)/100):0);

	if(!empty($doviznesne)&&$doviznesne=='USD'){
		$bnu=$USD;
		
	}
	if(!empty($doviznesne)&&$doviznesne=='EUR'){
		$bnu=$EUR;
	}
	if(!empty($doviznesne)&&$doviznesne=='TRY'){
		$bnu=$TRY;
	}
	
	$dovizcinsi='TRY';
	//$kurlufiyat=kur($ustboyabaski,$doviznesne,$dovizcinsi);
	$kurlufiyat=($ustboyabaski*$bnu);
	$ustboyabaski=$kurlufiyat;
	$ustbaskitoplam=($fasonorgumaliyet+$ustboyabaski)*$ustboyabaskifire2;

}
if(!empty($altboyabaskiget)){
	$altboyabaskicek=z(1,$altboyabaskiget,'','boyabaski');
	$doviznesne=(!empty($_Nesne[$altboyabaskicek['nesne_IDdoviz']]['metin1'])?$_Nesne[$altboyabaskicek['nesne_IDdoviz']]['metin1']:'&nbsp;');
	$altboyabaski=(!empty($altboyabaskicek['fiyat'])?$altboyabaskicek['fiyat']:0);
	$altboyabaskifire=(!empty($altboyabaskicek['fire'])?$altboyabaskicek['fire']:0);
	$altboyabaskifire2=(!empty($altboyabaskifire)?(($altboyabaskifire+100)/100):0);

	$hamhizmet=($fasonorgumaliyet+$altboyabaski)*(100+$altboyabaskifire)/100;


	if(!empty($doviznesne)&&$doviznesne=='USD'){
		$bnu=$USD;
	}
	if(!empty($doviznesne)&&$doviznesne=='EUR'){
		$bnu=$EUR;
	}
	if(!empty($doviznesne)&&$doviznesne=='TRY'){
		$bnu=$TRY;
	}
	$dovizcinsi='TRY';
	//$kurlufiyat=kur($altboyabaski,$doviznesne,$dovizcinsi);
	$kurlufiyat=($altboyabaski*$bnu);
	$altboyabaski=$kurlufiyat;
	$altbaskitoplam=($altboyabaski*$altboyabaskifire2);
	

}
$baskitoplam=0;
if(!empty($altboyabaski)&&!empty($ustboyabaski)){
	$baskitoplam=($ustbaskitoplam+$altboyabaski)*$altboyabaskifire2;
	$baskitoplam=(!empty($baskitoplam)?z(36,$baskitoplam,5):0);
	if($baskitoplam==0){
		$baskitoplam=$fasonorgumaliyet;
	}
}

$boyabaskialt=z(8,'boyabaskialt');
$boyabaskialtfiyat='';
$boyabaskialtfiyat2='';
$boyabaskialtdoviz='';
if(!empty($boyabaskialt)){
	if($cekilenhamkumastl!=''){
		$fasonorgumaliyet=$cekilenhamkumastl;
	}
	$altboyabaskicek=z(1,$boyabaskialt,'','boyabaski');
	$doviznesne=(!empty($_Nesne[$altboyabaskicek['nesne_IDdoviz']]['metin1'])?$_Nesne[$altboyabaskicek['nesne_IDdoviz']]['metin1']:'&nbsp;');
	$altboyabaski=(!empty($altboyabaskicek['fiyat'])?$altboyabaskicek['fiyat']:0);
	$altboyabaskifire=(!empty($altboyabaskicek['fire'])?$altboyabaskicek['fire']:0);
	$altboyabaskifire2=(!empty($altboyabaskifire)?(($altboyabaskifire+100)/100):0);

	if(!empty($doviznesne)&&$doviznesne=='USD'){
		$bnu=$USD;
	}
	if(!empty($doviznesne)&&$doviznesne=='EUR'){
		$bnu=$EUR;
	}
	if(!empty($doviznesne)&&$doviznesne=='TRY'){
		$bnu=$TRY;
	}
	$dovizcinsi='TRY';
	//$kurlufiyat=kur($altboyabaski,$doviznesne,$dovizcinsi);
	$kurlufiyat=($altboyabaski*$bnu);
	$hamhizmet=($fasonorgumaliyet+$kurlufiyat)*(100+$altboyabaskifire)/100;

	$boyabaskialtfiyat=$hamhizmet;
	$boyabaskialtfiyat2=($hamhizmet-$fasonorgumaliyet);
	$boyabaskialtdoviz=$doviznesne;
}

if(!empty($resimsil)){
	z(3,$resimsil,array('arsiv'=>"-1"),'galeri');
}

$json['sonuc']=1;
$json['cevap']= array(
	'iplikfire'=>$iplikfire,
	'kompozisyonarray'=>$kompozisyonarray,
	'iplikfiyat'=>$kurlufiyat2,
	'kursuziplikfiyat'=>$kursuziplikfiyat,
	'kurluiplikfire'=>$kurluiplikfire,
	'numaracins'=>$numaracins,
	'boyaKontrol'=>$boyaKontrol,
	'kumas'=>$kumasturu,
	'dovizCinsi'=>$dovizCinsi,
	'pusvefaynmetni'=>$pusvefaynmetni,
	'pusvefaynmetni2'=>$pusvefaynmetni2,
	'kumasfasonorgu'=>$kumasfasonorgu,
	'kumasfasonorgu2'=>$kumasfasonorgu2,
	'boyabaskioku'=>$boyabaskioku,
	'nesneboyabaski'=>$_Nesneboyabaski,
	'boyabaskitipi'=>$boyabaskitipi,
	'boyabaskifiyat'=>$boyabaskifiyat,
	'boyabaskiformul'=>$boyabaskiformul,
	'ustboyabaski'=>$baskitoplam,
	'altbaskitoplam'=>$altbaskitoplam,
	'ustbaskitoplam'=>$ustbaskitoplam,
	'fasondoviz'=>$fasondoviz,
	'fasondoviz2'=>$fasondoviz2,
	'hamhizmet'=>$hamhizmet,
	'boyabaskialtfiyat'=>$boyabaskialtfiyat,
	'boyabaskialtfiyat2'=>$boyabaskialtfiyat2,
	'boyabaskialtdoviz'=>$boyabaskialtdoviz,
	'pusvefaynjson'=>$pusvefaynjson,
);
?>