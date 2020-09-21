<?php 
	
	if(z(7,'cekicikisfrm')){

		$_XP=z(7,'cekicikisfrm');
		if(!empty($_XP['giris'])){
			$__XP=z(7,$_XP['giris'].'_cekicikisfrm');
			if(!empty($__XP)){
				$_XP=z(40,$_XP,$__XP);
			}
		//echo '<pre>';print_r($_XP);print_r($__XP);_z(7);die;
		}

		/*if(z(8,'cikistip')){
			$_XP['cikis']=z(8,'cikistip');
		}*/
		$_XPC=z(12,'cekicikisfrm');
		foreach (array('cikis'=>'cikistip','firma_ID'=>'firma_ID','hambezstok_ID'=>'hambezstok_ID','dokumasiparis_ID'=>'dokumasiparis_ID','dokumastok_ID'=>'dokumastok_ID','nesne_IDkompozisyon'=>'nesne_IDkompozisyon') as $key => $val) {
			if(empty($_XP[$key])){

				if(z(8,$val)){
					$_XP[$key]=z(8,$val);
				}
				else {
					if(!empty($_XPC)){
						$_XP[$key]=!empty($_XPC[$val])?$_XPC[$val]:'';
					}
				}
			}
		}

		z(12,'cekicikisfrm',$_XP);
	}
	else if(z(12,'cekicikisfrm')){
		$_XP=z(12,'cekicikisfrm');
	}	
/*/
	if(!empty($_XP)){

		echo '<pre>';print_r($_XP);echo '</pre>';
	}
/*/
?>