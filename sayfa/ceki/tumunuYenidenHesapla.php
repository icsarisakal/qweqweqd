<?php 
// YENİDEN HESAPLAMALAR
					// "Dokuma alt siparişi" sevk metre hesabı 
					if(!empty($_X['dokumasiparis_ID'])){
						$yh['ID']=$_X['dokumasiparis_ID'];
						$yh['tbl']='dokumasiparis';
						require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_1K1A2K.php');

					}
					// "Dokuma sayfası" sevk metre hesabı 
					if(!empty($_X['dokumastok_ID'])){
						$yh['ID']=$_X['dokumastok_ID'];
						$yh['tbl']='dokumastok';
						require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_sevk1K1A2K.php');
					}

					// "Ham bez stok sayfası" sevk metre hesabı 
					if(!empty($_X['hambezstok_ID'])){
						$yh['ID']=$_X['hambezstok_ID'];
						$yh['tbl']='hambezstok';
						require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_metraj1K1A2K.php');
					}


?>