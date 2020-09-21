<?php 
/*/
	if(z(8,'stok_ID')){
		$yh['ID']=z(8,'stok_ID');
		$yh['tbl']='stok';
		require(__DIR__.'/yh/ceki_top1K1A2K.php');
	}
/*/

	$_CekiStok=z(1,"GROUP BY ceki_ID",'ID,ceki_ID,stok_ID','cekistok');
	if(!empty($_CekiStok)){
		foreach ($_CekiStok as $ckstk) {
			$yh['ID']=$ckstk['stok_ID'];
			$yh['tbl']='stok';
			require(__DIR__.'/yh/ceki_top1K1A2K.php');
		}
	}
?>