<?Php
$_Sec=z(7,'sec');
if(!empty($_Sec)){
	$islemTip=z(7,'islemTip');
	//echo '<pre>'.$islemTip;print_r($_Sec);die;
	if(!empty($islemTip)){
		if($islemTip=='sticker'){
			$seciyazdir='';
			if(!empty($_Sec)){
				$secsayi=count($_Sec);
				if($secsayi<19){
					foreach ($_Sec as $sayisec => $secigoster) {
						$seciyazdir.=$sayisec.',';
					}
					$seciyazdir.='123456';
					$seciyazdir=str_replace(",123456","",$seciyazdir);
					$linkcikar='?s='.$syf.'&a=sticker&cokluid='.$seciyazdir;
					z('git',$linkcikar);
				} else { ?>
					<script>
					alert("18 adet sticker ile sınırlandırılmıştır");
					</script>
				<?php }
			}
		}
		if(strpos($islemTip,'_')){
			$xpl=explode('_', $islemTip);
			if(count($xpl)==2){
				require(__DIR__.'/../sayfa/'.$xpl[0].'/'.'cokluIslem_'.$xpl[1].'.php');
			}
		}
		else if(($islemTip!='sil'&&$islemTip!='sil2')||$admn||ytk(z(8,'s'),'sil')){
			z(6,$tbl);
			switch($islemTip){
				case'arsivac':$arsv=0;break;
				case'arsivle':$arsv=1;break;
				case'arsivle2':$arsv=2;break;
				case'sil':/*$arsv=-2;*/$arsv=-1;break;
				case'sil2':$arsv=-1;$islemTip='sil';break;
				case'yeni':$drm=0;break;
				case'onay':$drm=1;break;
				case'iptal':$drm=2;break;
			}
			$bsrm=0;
			$_ID=array();
			foreach($_Sec as $ID=>$val){
				if($val){
					if(isset($arsv)){
						if($arsv==-2){
							if(($tbl=='personel'&&!z(1,$ID,'admin','personel'))||$tbl!='personel')$bsrm+=z(4,$ID,$tbl);
						}
						else{
							z(6,$tbl);
							if(z(3,$ID,Array('arsiv'=>$arsv,'tarihArsiv'=>z('datetime')))){
								$bsrm++;
								$_ID[1][]=$ID;
							}
							else $_ID[0][]=$ID;
						}
					}
					if(isset($drm))$bsrm+=z(3,$ID,Array('durum'=>$drm,'tarihDurum'=>z('datetime')));
				}
			}
			
			$_Log=array('nesne'=>$tbl,'islem'=>$islemTip,'sonuc'=>0,'nesne'=>$tbl,'mesaj'=>'[MESAJ]-10[/MESAJ] '.
			(!empty($_ID[1])?' İşlemi Başarılı Geçen ID\'ler: '.json_encode($_ID[1]):'').(!empty($_ID[0])?' İşlemi Başarısız Geçen ID\'ler: '.json_encode($_ID[0]):'')
			);
			
			if($bsrm==count($_Sec)){
				z(33,$islemTip,1);
				$_Log['sonuc']=1;
			}
			else if($bsrm>0){
				z(33,$islemTip,2);
				$_Log['sonuc']=2;
			}
			else{
				z(33,$islemTip,-1);
			}
			
			require('parca/log.php');
		}
		else z(33,$islemTip,101);
	}
}
?>