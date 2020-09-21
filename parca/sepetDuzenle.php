<?Php
$_X=z(7,$tbl);
$_Urun=z(7,$tbl.'urun');
if(!empty($_Urun)){
	$_X['tarih']=z('datetime');
	$_X['tarihSiparis']=!empty($_X['tarihSiparis'])?$_X['tarihSiparis']/*[2].'-'.$_X['tarihSiparis'][1].'-'.$_X['tarihSiparis'][0]*/:$_X['tarih'];
	$urunA=false;
	$topFiyat=0;
	$onayliTA=1;
	foreach($_Urun as $i=>$urun){
		$urun['miktar']=sayi($urun['miktar']);
		if(!empty($urun['ad'])&&!empty($urun['miktar'])){
			$urun['fiyat']=sayi($urun['fiyat']);
			if(!empty($urun['fiyat'])){
				if($urun['fiyat']<0)$urun['fiyat']=-$urun['fiyat'];
				if($urun['miktar']<0)$urun['miktar']=-$urun['miktar'];
				$urun['tutar']=$urun['miktar']*$urun['fiyat'];
				$topFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarihSiparis']);
				$_Urun[$i]['miktar']=$urun['miktar'];
				$_Urun[$i]['fiyat']=$urun['fiyat'];
			}
			else $_Urun[$i]['fiyat']=0;
			$urunA=true;
			$onayliTA*=!empty($urun['firma_IDteklif'])?z(1,$urun['firma_IDteklif'],'onayli','firma'):0;
		}
	}
	if($urunA){
		$xTopFiyat=0;
		$_xUrun=z(1,"WHERE sepet_ID='".$ID."'",NULL,$tbl.'urun');
		foreach($_xUrun as $urun){
			$xTopFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarihSiparis']);
		}
		
		$_X['durum']=$admn||$topFiyat==0?1:$onayliTA;
		$_X['personel_ID']=z(1,$ID,'personel_ID',$tbl);
		$_Personel=z(1,$_X['personel_ID'],NULL,'personel');
		if(empty($_X['durum'])&&!empty($_X['personel_ID'])){
			// Tek seferlik ise
			if(empty($_Personel['limitT'])&&$_Personel['limitD']>=$topFiyat)$_X['durum']=1;
			// Günlük haftalık aylık yıllık ise
			else if($topFiyat<=$_Personel['limitD']){
				if($_Personel['limitTop']+$topFiyat-$xTopFiyat<=$_Personel['limitMax'])$_X['durum']=1;
			}
		}
		
		$_X['tip']=$tip;
		z(6,$tbl);
		if(z(3,$ID,$_X)){
			//kurGuncelle($_X['tarihSiparis']);
			
			$xTopFiyat=0;
			foreach($_xUrun as $urun){
				$xTopFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarihSiparis']);
			}
			
			z(4,"WHERE sepet_ID='".$ID."'",$tbl.'urun');
			$topFiyat=0;
			$bsrm=0;
			foreach($_Urun as $urun){
				$urun['sepet_ID']=$ID;
				$urun['tutar']=$urun['miktar']*$urun['fiyat'];
				$urun['tarih']=$_X['tarih'];
				if(z(2,$urun,$tbl.'urun')){
					$bsrm++;
					$topFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarihSiparis']);
				}
			}
			z(6,'personel');
			$yTopFiyat=$topFiyat-$xTopFiyat;
			if($_X['personel_ID']!=z('lgn','ID')&&$yTopFiyat<0)$yTopFiyat=0;
			if(!empty($yTopFiyat)&&!empty($_X['personel_ID']))z(3,$_X['personel_ID'],'limitTop',$_Personel['limitTop']+$yTopFiyat);
			
			if($bsrm==count($_Urun)){
				if($_X['durum']){
					z(33,'duzenle',1);
					$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>1,'mesaj'=>'[MESAJ]211[/MESAJ] Sipariş ID: "'.$ID.'"');
					require('parca/log.php');
				}
				else {
					z(33,'duzenle',3);
					$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>3,'mesaj'=>'[MESAJ]214[/MESAJ] Sipariş ID: "'.$ID.'"');
					require('parca/log.php');
				}
				header('Location: ?s='.$syf.'&a=detay&id='.$ID);die;
			}
			else {
				z(33,'duzenle',2);
				$_Log=array('nesne'=>$tbl,'islem'=>'duzenle','sonuc'=>3,'mesaj'=>'[MESAJ]213[/MESAJ] Sipariş ID: "'.$ID.'"');
				require('parca/log.php');
			}
			
			unset($_X);
		}
		else z(33,'duzenle',-1);
	}
	else z(33,'duzenle',12);
}
else z(33,'duzenle',11);
?>