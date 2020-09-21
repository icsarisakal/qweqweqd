<?php 
	/*/
	İhtiyaçlar	: 	$yh['tbl']   $yh['ID']
	/*/
	if(!empty($yh['tbl'])&&!empty($yh['ID'])){

		$_CekiStokX=z(1,array('stok_ID'=>$yh['ID']),'ID,ceki_ID','cekistok');
		if(!empty($_CekiStokX)){
			foreach ($_CekiStokX as $cekistok) {

				if(!empty($cekistok['ceki_ID'])){
					$ceki_ID=$cekistok['ceki_ID'];

					$_CekiStok=z(1,array('ceki_ID'=>$cekistok['ceki_ID']),'ID,stok_ID','cekistok');


					if(!empty($_CekiStok)){
						$nsn=z(37,z(1,array('ad'=>'kalite'),'ID,metin2','nesne'));

						//foreach ($yh_BezStok as $bezstok) {
							

							$yh_Stok=z(1,"WHERE arsiv<>'-1' AND ".z(38,$_CekiStok,'stok_ID'),'ID,nesne_IDkalite,metraj','stok');
							$yh_Top=array();
							
							if(!empty($yh_Stok)) foreach ( $yh_Stok as $stok ) {

								$klt=$nsn[$stok['nesne_IDkalite']]['metin2'];
								if(!empty($klt)){
									if(empty($yh_Top[$klt])) $yh_Top[$klt]=$stok['metraj'];
									else $yh_Top[$klt]+=$stok['metraj'];
								}

							}

							$xtbl=z(6);
							z(6,'ceki');
							echo '<br>'.z(3, $ceki_ID, array(
								'top1K'=>!empty($yh_Top['1K'])?$yh_Top['1K']:0,
								'top1A'=>!empty($yh_Top['1A'])?$yh_Top['1A']:0,
								'top2K'=>!empty($yh_Top['2K'])?$yh_Top['2K']:0
								//'cuval'=>$yh_Top['giris']['cuval']-$yh_Top['cikis']['cuval'],
							) );

							z(6,$xtbl);

						//}
					}

				}


			}
		}

	}


?>