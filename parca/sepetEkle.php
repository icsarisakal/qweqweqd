<?Php
$_X=z(7,$tbl);
$_Urun=z(7,$tbl.'urun');
if(!empty($_Urun)){
	$_X['tarih']=z('datetime');
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
				$topFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarih']);
				$_Urun[$i]['miktar']=$urun['miktar'];
				$_Urun[$i]['fiyat']=$urun['fiyat'];
			}
			else $_Urun[$i]['fiyat']=0;
			$urunA=true;
			$onayliTA*=!empty($urun['firma_IDteklif'])?z(1,$urun['firma_IDteklif'],'onayli','firma'):0;
		}
	}
	if($urunA){
		$_X['durum']=$admn||$topFiyat==0?1:$onayliTA;
		$_X['personel_ID']=z('lgn','ID');
		$_Personel=z(1,$_X['personel_ID'],NULL,'personel');
		if(empty($_X['durum'])&&!empty($_X['personel_ID'])){
			// Tek seferlik ise
			if(empty($_Personel['limitT'])&&$_Personel['limitD']>=$topFiyat)$_X['durum']=1;
			// Günlük haftalık aylık yıllık ise
			else if($topFiyat<=$_Personel['limitD']){
				if($_Personel['limitTop']+$topFiyat<=$_Personel['limitMax'])$_X['durum']=1;
			}
		}
		
		$_X['personel_IDonay']=!empty($_X['durum'])?-1:0;
		$_X['tip']=$tip;
		$_X['tarihSiparis']=!empty($_X['tarihSiparis'])?$_X['tarihSiparis']/*[2].'-'.$_X['tarihSiparis'][1].'-'.$_X['tarihSiparis'][0]*/:$_X['tarih'];
		if(!empty($_X['durum']))
		$_X['tarihDurum']=$_X['tarih'];
		z(6,$tbl);
		if(empty($_X['siparisNo'])){
			do $_X['siparisNo']=rand(99999,999999);
			while(z(5,"WHERE siparisNo='".$_X['siparisNo']."'"));
		}
		if(!z(5,"WHERE siparisNo='".$_X['siparisNo']."'")){
			if(z(2,$_X)){
				$ID=z(1,'son','ID');
				
				z(6,$tbl.'urun');
				$topFiyat=0;
				$bsrm=0;
				foreach($_Urun as $urun){
					$urun['sepet_ID']=$ID;
					$urun['personel_ID']=$_X['personel_ID'];
					$urun['tutar']=$urun['miktar']*$urun['fiyat'];
					$urun['tarih']=$_X['tarih'];
					if(z(2,$urun)){
						$bsrm++;
						$topFiyat+=kur(!empty($urun['kdvA'])?$urun['tutar']:$urun['tutar']*($urun['kdv']/100+1),$urun['pb'],NULL,$_X['tarih']);
					}
				}
				z(6,'personel');
				if(!empty($topFiyat))z(3,$_X['personel_ID'],'limitTop',$_Personel['limitTop']+$topFiyat);
				
				if($bsrm==count($_Urun)){
					if($_X['durum']){
						z(33,'ekle',1);
						$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>1,'mesaj'=>'[MESAJ]201[/MESAJ] Sipariş ID: "'.$ID.'"');
						require('parca/log.php');
					}
					else {
						z(33,'ekle',3);
						$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>3,'mesaj'=>'[MESAJ]204[/MESAJ] Sipariş ID: "'.$ID.'"');
						require('parca/log.php');
						$mtip='ekle';
						require(__DIR__.'/../sayfa/market/mail_prc.php');
					}
					header('Location: ?s='.$syf.'&a=detay&id='.$ID);die;
					if(z(7,'git1'))git();
				}
				else {
					z(6,$tbl);
					$_X['durum']=0;
					z(3,$ID,'durum','0');
					z(33,'duzenle',2);
					
					$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>3,'mesaj'=>'[MESAJ]203[/MESAJ] Sipariş ID: "'.$ID.'"');
					require('parca/log.php');
					
					header('Location: ?s='.$syf.'&a=duzenle&id='.$ID);die;
				}
				unset($_X);
			}
			else {
				z(33,'ekle',-1);
				$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>0,'mesaj'=>'[MESAJ]202[/MESAJ]');
				require('parca/log.php');
			}
		}
		else z(33,'ekle',13);
	}
	else z(33,'ekle',12);
}
else z(33,'ekle',11);
?>