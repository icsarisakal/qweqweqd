<?php 
				$_X=z(1,"WHERE arsiv='0' AND revize_ID='0'",'','kumaskarti');
				$_X=z(37, $_X);
				$veriarray=array();
				if(!empty($_X)){
					foreach ($_X as $key => $veri) {
						if(!empty($veri['kodu'])){
							$veriarray[]=$veri['kodu'].'*_-_*'.$veri["ID"];
						}
					}
				}
				usort($veriarray, "strnatcmp");
				
				$veriarray2=array();
				foreach ($veriarray as $key2 => $veri2) {
					$explode=explode('*_-_*', $veri2);
					$veri1=$explode[0];
					$veri2=$explode[1];
					$veriarray2[$veri2]=$veri1;
				}
				if(!empty($veriarray2)){
					foreach ($veriarray2 as $key3 => $veri3) {
						$x=$_X[$key3];
						echo $x["kodu"].'<br>';
					}
				}


 ?>