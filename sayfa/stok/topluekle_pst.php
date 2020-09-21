<?php
$_X=NULL;
if(z(7,$tbl)){
	$_XStok=z(7,$tbl);
	if(!empty($_XStok['metraj']))foreach ($_XStok['metraj'] as $fei=>$fev) {
		if(!empty($fev)){
			$_XStok['metraj'][$fei]=z(36,$fev);
		}
		else{
			unset(
				$_XStok['metraj'][$fei],
				$_XStok['lotNo'][$fei],
				$_XStok['dokSalTopNo'][$fei],
				$_XStok['nesne_IDkalite'][$fei]
			);	
		}
	}

	z(6,$tbl);
	if(!empty($_XStok['metraj']) && !empty($hamkumasstok)){

		$_Stok=array(
			'personel_ID'=>z('lgn','ID'),
			'hamkumasstok_ID'=>!empty($hamkumasstok['ID'])?$hamkumasstok['ID']:0,
			'hambezstok_ID'=>!empty($hambezstok_ID)?$hambezstok_ID:0,
			'tarih'=>z('datetime'),
			'goster'=>'{"partiNo":"1","topNo":"1","tipNo":"1","lotNo":"1","kalite_ID":"1","metraj":"1","nesne_IDrenkNo":"1","nesne_IDdesenNo":"1","mamulEn":"1","kompozisyon":"1","kalite":"1","nesne_IDkalite":"1"}'
		);

		$topC=0;
		if(!empty($_XStok)){
			$topC=count($_XStok[key($_XStok)]);
			$bsrmTop=array();
			$bsrm=0;
			z(6,'stok');
			//print_r($_XStok);die;
			if(empty($_XStok['ID'])){

				foreach ($_XStok['metraj'] as $fei=>$fev) {
					//echo '<pre>';print_r($_XStok);
					$_Stok['metraj']=$_XStok['metraj'][$fei];
					$_Stok['lotNo']=!empty($_XStok['lotNo'][$fei])?$_XStok['lotNo'][$fei]:'';
					$_Stok['nesne_IDkalite']=!empty($_XStok['nesne_IDkalite'][$fei])?$_XStok['nesne_IDkalite'][$fei]:0;
					$_Stok['dokSalTopNo']=!empty($_XStok['dokSalTopNo'][$fei])?$_XStok['dokSalTopNo'][$fei]:'';
					/*foreach ($_XStok as $fi=>$fv) {
						$_Stok[$fi]=$_XStok[$fi][$fei];
					}*/
					$SSID=z(2,$_Stok,'stok');
					//echo '<pre>';print_r($_Stok);die;
					if(!empty($SSID)){
						$bsrm++;
						$bsrmTop[]=$SSID;
					}
				}

			}
		}

		$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>1,'mesaj'=>'[MESAJ]1001[/MESAJ] '.(
			$bsrm>0?($bsrm==$topC?' Tüm toplar başarı ile oluşturuldu.':' Bazı topların kaydı başarısız oldu.').' Oluşturulan Toplar:['.implode($bsrmTop, ', ').']':' Fakat top kayıtları başarısız oldu.'
		));
		require('parca/log.php');

		//__($hambezstok_ID);
		//echo $bsrm.' başarı';die;
		if($bsrm>0){
			// "Ham bez stok sayfası" sevk metre hesabı 
			if(!empty($hambezstok_ID)){
				$yh['ID']=$hambezstok_ID;
				$yh['tbl']='hambezstok';
				require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_metraj1K1A2K.php');
			}

		}

		if($bsrm==$topC){
			if(z(8,'geris')&&z(8,'geria')&&z(8,'geriid')){
				z('git','?s='.z(8,'geris').'&a='.z(8,'geria').'&id='.z(8,'geriid'));
			}
			else if(z(7,'git1')){
				git(); die;
			}
			z(33,'topluekle',1);
			z('git','geri');
		}
		else if($bsrm>0){
			z('git','geri');
			z(33,'topluekle',2);
		}
		else{
			z(33,'topluekle',-1);
		}

		
		//if(z(7,'git1'))git();
		//unset($_X);
	}
	else z(33,'topluekle',-1);
}
?>