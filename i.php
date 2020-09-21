<?Php session_start();ob_start();ini_set('display_errors',1);
require(__DIR__.'/ayar.php');
if(z(8,'i')){ 
	switch(z(8,'i')){
		case 'cvr':
			if(z(8,'bunu')&&z(8,'buna')){
				$bunu=z(8,'bunu');
				if(z(8,$bunu)){
					$buna=z(8,'buna');
					switch($bunu.'-'.$buna){
						case 'nesne_IDcozgu-iplikno_ID':
							if(z(8,'nesne_IDcozgu')){
								$_Iplikno_ID=array();
								$_Cozgustok=z(1,"WHERE arsiv=0 AND nesne_IDcozgu='".z(8,'nesne_IDcozgu')."'",NULL,'cozgustok');
								if(!empty($_Cozgustok)){
									foreach ($_Cozgustok as $cozgustok) {
										$ipliknoid=explode(',',$cozgustok['ipliknolar']);
										if(!empty($ipliknoid)){
											$_Iplikno_ID=array_merge($_Iplikno_ID,$ipliknoid);
										}
									}
									$_Iplikno_ID=array_unique($_Iplikno_ID);
								}
								$_Iplikno="";
								if(!empty($_Iplikno_ID)){
									$_Iplikno=z(1,"WHERE arsiv=0 AND (ID='".implode($_Iplikno_ID,"' OR ID='")."')",'ID,ad','iplikno');
								}
								echo json_encode($_Iplikno);
							}
						break;
						case 'stok_ID-stok':
							if(z(8,'stok_ID','sayi')){
								$stok=z(1,z(8,'stok_ID','sayi'),'','stok');
								if(!empty($stok)){
									echo json_encode($stok);
								}
							}
						break;
						case 'mamulkumas_ID-mamulkumasdetay':
							if(z(8,'mamulkumas_ID','sayi')){
								$mamulkumasdetay=z(1,"WHERE mamulkumas_ID='".z(8,'mamulkumas_ID','sayi')."' AND (ad<>'' OR kod<>'') ORDER BY ad,kod ASC",'ID,ad,kod','mamulkumasdetay');
								if(!empty($mamulkumasdetay)){
									echo json_encode($mamulkumasdetay);
								}
							}
						break;
					}
				}
			}
			$hx=1;
		break;
		case 'oku':
			if(z(8,'oku')){
				switch (z(8,'oku')) {
					case 'zdxcdsjknrf':
						//		echo json_encode("asdasd");
						//$ipliknolar=json_decode($cozgustok['ipliknolar'],1);

						if(z(8,'ipliksiparis_ID','sayi')&&z(8,'nesne_IDcozgu','sayi')&&z(8,'iplikno_ID','sayi')){
							$ipliksiparis_ID=z(8,'ipliksiparis_ID','sayi');
							$nesne_IDcozgu=z(8,'nesne_IDcozgu','sayi');
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$ipliksiparis=z(1,$ipliksiparis_ID,'ID,iplikno_ID,nesne_IDmarka','ipliksiparis');
							if(!empty($ipliksiparis)){

								$_Cozgustok=z(1,"WHERE arsiv='0' AND nesne_IDcozgu='".$nesne_IDcozgu."' "/*.AND nesne_IDmarka='".$ipliksiparis['nesne_IDmarka']."'*//*" AND ipliknolar LIKE '%\"iplikno_ID\":[%".$iplikno_ID."%]%' ORDER BY ID DESC"*/,'','cozgustok');
								if(!empty($_Cozgustok)){

									$iplikno=z(1,$iplikno_ID,'ID,ad','iplikno');
									$_Marka=z(37,z(1,"WHERE ".z(38,$_Cozgustok,'nesne_IDmarka','ID'),'ID,metin1','nesne'));
                    				
                    				$_CozgustokX=array();

									if(!empty($_Cozgustok))for($i=0;$i<count($_Cozgustok);$i++) {
										
	                    				$gstr=0;
										$ipliknolar=json_decode($_Cozgustok[$i]['ipliknolar'],1);

										foreach ($ipliknolar['iplikno_ID'] as $ipnoid) {
                                			if($ipnoid==$iplikno_ID){
                                				$gstr=1;
												//$_Cozgustok[$i]['ipliknolar']=json_decode($_Cozgustok[$i]['ipliknolar'],1);
												//$_Cozgustok[$i]['marka']=$_Marka[$_Cozgustok[$i]['nesne_IDmarka']]['metin1'];
												$_Cozgustok[$i]['iplikno']=$iplikno['ad'];
												$_Cozgustok[$i]['kg']=z('sayi',$_Cozgustok[$i]['kg'],2);
												$_Cozgustok[$i]['cuval']=z('sayi',$_Cozgustok[$i]['cuval'],2);
                    							$_Cozgustok[$i]['iplikno_ID']=$iplikno_ID;


											}
										}

										if($gstr){
					                        //echo "Bu Siparişi Göster: ".$fei.'<br>';
											$_CozgustokX[]=$_Cozgustok[$i];
					                    }
									}

									echo json_encode($_CozgustokX);

								}
							}
						}
						else if(z(8,'cozgustok_ID','sayi')){
							//$cozgustok_ID=z(8,'cozgustok_ID','sayi');
							//$cozgustok=z(1,$cozgustok_ID,'','cozgustok');
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$nesne_IDcozgu=z(8,'nesne_IDcozgu','sayi');
							$_Cozgustok=z(1,"WHERE arsiv='0' AND nesne_IDcozgu='".$nesne_IDcozgu."' "./*AND nesne_IDmarka='".$ipliksiparis['nesne_IDmarka']."' AND ipliknolar LIKE '%".$iplikno_ID."%'*/" ORDER BY ID DESC",'','cozgustok');
							if(!empty($_Cozgustok)){

								$iplikno=z(1,$iplikno_ID,'ID,ad','iplikno');
								//$_Marka=z(37,z(1,"WHERE ".z(38,$_Cozgustok,'nesne_IDmarka','ID'),'ID,metin1','nesne'));

								if(!empty($_Cozgustok))for($i=0;$i<count($_Cozgustok);$i++) {
									//$_Cozgustok[$i]['marka']=$_Marka[$_Cozgustok[$i]['nesne_IDmarka']]['metin1'];
									$_Cozgustok[$i]['iplikno']=$iplikno['ad'];
									$_Cozgustok[$i]['kg']=z('sayi',$_Cozgustok[$i]['kg'],2);
									$_Cozgustok[$i]['cuval']=z('sayi',$_Cozgustok[$i]['cuval'],2);
								}

								echo json_encode($_Cozgustok);

							}
						}
						break;




/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//cozguSalonuGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=cozguSalonuGetir
					case 'cozguSalonuGetir':
						$sd="WHERE arsiv=0 AND ad='cozgu'";

						// Cözgü stok girdilerinde kullanılan çözgü salonlarını ayrıştır
						/*/
						$iplikno_ID=z(8,'iplikno_ID','sayi');
						if($iplikno_ID){
							switch(z(8,'giris')){
								case 'cozgustok':
									$altSd='';
									$_Cozgustok=z(1,"WHERE arsiv=0   AND   nesne_IDcozgu<>0   AND   ipliknolar LIKE '%\"".$iplikno_ID."\"%'   GROUP BY nesne_IDcozgu",  'ID,nesne_IDcozgu,ipliknolar','cozgustok');
									if(!empty($_Cozgustok)){
										foreach ($_Cozgustok as $cozgustok) {
											$_Ipliknolar=json_decode($cozgustok['ipliknolar'],1);
											if(in_array($iplikno_ID, $_Ipliknolar['iplikno_ID'])){
												if(!empty($altSd)){
													$altSd.=" OR ";
												}
												$altSd.="ID='".$cozgustok['nesne_IDcozgu']."'";
											}
										}
									}
									$altSd=!empty($altSd)?'('.$altSd.')':'';
									break;
							}
							if(!empty($altSd)){
								$sd.=" AND ".$altSd;
							}
							else{
								$sd.=" AND 0";
							}
						}
						/*/


						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Nesne=z(37,z(1,$sd,'ID,metin1','nesne'));
						echo json_encode($_Nesne);
						break;


/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//cozgustokGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=cozgustokGetir
					case 'cozgustokGetir':
						$sd="WHERE arsiv=0".(z(8,'cozgustok_ID','sayi')?" AND ID<>'".z(8,'cozgustok_ID','sayi')."'":'');

						// Cözgü salonunu sorguya dahil eder
						if(z(8,'nesne_IDcozgu')){
							$altSd="nesne_IDcozgu='".z(8,'nesne_IDcozgu')."'";
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}

/*/
						// Cözgü stok girdilerinde kullanılan çözgü salonlarını ayrıştır
						if(z(8,'iplikno_ID','sayi')&&z(8,'giris')=='cozgustok'){
							$altSd='';
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							//$_Cozgustok=z(1,"WHERE arsiv=0   AND   nesne_IDcozgu<>0   AND   ipliknolar LIKE '%\"".$iplikno_ID."\"%'   GROUP BY nesne_IDcozgu",  'ID,nesne_IDcozgu,ipliknolar','cozgustok');
							$_Cozgustok=z(1,"WHERE arsiv=0   AND   nesne_IDcozgu<>0   AND   ipliknolar LIKE '%\"".$iplikno_ID."\"%'  ",  'ID,nesne_IDcozgu,ipliknolar','cozgustok');
							if(!empty($_Cozgustok)){
								foreach ($_Cozgustok as $cozgustok) {
									$_Ipliknolar=json_decode($cozgustok['ipliknolar'],1);
									if(in_array($iplikno_ID, $_Ipliknolar['iplikno_ID'])){
										if(!empty($altSd)){
											$altSd.=" OR ";
										}
										$altSd.="ID='".$cozgustok['ID']."'";
									}
								}
							}
							$altSd=!empty($altSd)?'('.$altSd.')':'';
							if(!empty($altSd)){
								$sd.=" AND ".$altSd;
							}
							else{
								$sd.=" AND 0";
							}
						}
/*/


						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Cozgustok=z(37,z(1,$sd.' ORDER BY ID DESC','','cozgustok'));
						$_Nesne=z(37,z(1,"WHERE ".z(38,$_Cozgustok,'nesne_IDcozgu'),'ID,metin1','nesne'));
						
						if(!empty($_Cozgustok)){
							foreach ($_Cozgustok as $fei => $cozgustok) {
								$_Ipliknolar=json_decode($cozgustok['ipliknolar'],1);
								//if(!empty($_Ipliknolar['lot']))
								//$_Cozgustok[$fei]['lot']=implode($_Ipliknolar['lot'],'&nbsp;&nbsp;&nbsp;');
								$_Cozgustok[$fei]['detay']='';
								$_Cozgustok['detayBaslik']='İplik No ve Lot';

								$_Cozgustok[$fei]['cozguSalonu']=(!empty($_Nesne[$cozgustok['nesne_IDcozgu']]['metin1'])?$_Nesne[$cozgustok['nesne_IDcozgu']]['metin1']:'');

								if(!empty($_Ipliknolar['iplikno_ID'])){
									$_Iplikno=z(37,z(1,"WHERE ID='".implode($_Ipliknolar['iplikno_ID'],"' OR '" )."'",NULL,'iplikno'));

									foreach ($_Ipliknolar['iplikno_ID'] as $j=>$ipliknoid) {
										if(!empty($j)){
											$_Cozgustok[$fei]['detay'] .= '&nbsp;&nbsp;<span style="color:white">|</span>&nbsp;&nbsp;';
										}
										if(!empty($iplikno_ID)&&$iplikno_ID==$ipliknoid) $_Cozgustok[$fei]['detay'] .= '<b>';
										$_Cozgustok[$fei]['detay'] .= ''.(!empty($_Iplikno[$ipliknoid]['ad'])?$_Iplikno[$ipliknoid]['ad']:'').' '.(!empty($_Ipliknolar['lot'][$j])?'[Lot:'.$_Ipliknolar['lot'][$j].']':'');
										if(!empty($iplikno_ID)&&$iplikno_ID==$ipliknoid) $_Cozgustok[$fei]['detay'] .= '</b>';
									}
								}

							}
						}

						echo json_encode($_Cozgustok);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//dokumaSalonuGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=dokumaSalonuGetir
					case 'dokumaSalonuGetir':
						$sd="WHERE arsiv=0 AND ad='dokumaSalonu'";

						// Dokumastoğa çıkış yapılıyorsa eğer dokuma salonları oradan süzülerek gelsin
						if(z(8,'giris')=='dokumastok'){
							$altSd=z(38,z(1,"WHERE arsiv=0 AND nesne_IDdokumaSalonu<>0   GROUP BY nesne_IDdokumaSalonu",  'ID,nesne_IDdokumaSalonu','dokumastok'),'nesne_IDdokumaSalonu');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}

						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Nesne=z(37,z(1,$sd,'ID,metin1','nesne'));
						echo json_encode($_Nesne);
						break;


/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//dokumastokGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=dokumastokGetir&giris=dokumastok&iplikno_ID=3
					case 'dokumastokGetir':
					case 'dokumastokatkiGetir':
						//$dokumastok_ID=z(1,z(8,'dokumastokac_ID'),'dokumastok_ID','dokumastokac');
						$sd="WHERE arsiv=0";

						// İplikno varsa eğer, bu ipliknoyu atkısında barındıran dokumastok gelsin						
						if(z(8,'iplikno_ID','sayi')&&(z(8,'giris')=='dokumastok'||z(8,'giris')=='dokumastokatki')){
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$_XAC=z(1,"WHERE arsiv='0'  AND tip='1'  AND iplikno_ID='".$iplikno_ID."'  AND ID<>'".z(8,'dokumastokac_ID')."'   GROUP BY dokumastok_ID",  'ID,dokumastok_ID,ipliknolar','dokumastokac');
							$altSd=z(38,$_XAC,'dokumastok_ID');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}
						else{
							$sd.=" AND 0";
						}

						if(z(8,'nesne_IDdokumaSalonu','sayi')){
							$sd.=" AND nesne_IDdokumaSalonu='".z(8,'nesne_IDdokumaSalonu','sayi')."'";
						}



						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Dokumastok=z(37,z(1,$sd,'ID,hamkumasstok_ID,nesne_IDdokumaSalonu,nesne_IDkumasKalitesi,siparisMetraj','dokumastok'));
						if(!empty($_Dokumastok)){
							$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_Dokumastok,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
							$_Nesne=z(37,z(1,"WHERE ".z(38,$_Dokumastok,'nesne_IDdokumaSalonu'),'ID,metin1','nesne'));
							if(!empty($_Dokumastok)){
								foreach ($_Dokumastok as $j=>$dokumastok) {
									/*
									$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1'])?$_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1']:'');
									*/
									$_Dokumastok[$j]['dokumaSalonu']=(!empty($_Nesne[$dokumastok['nesne_IDdokumaSalonu']]['metin1'])?$_Nesne[$dokumastok['nesne_IDdokumaSalonu']]['metin1']:'');

									$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi']:'');
									$_Dokumastok[$j]['kumasKalitesi'].='<br>'.(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi']:'');
									$_Dokumastok[$j]['siparisMetraj']=z('sayi',$_Dokumastok[$j]['siparisMetraj'],2);
									$_Dokumastok[$j]['lotA']=0;
									$_Dokumastok[$j]['dokumastokac_ID']=z(8,'dokumastokac_ID');

									if(!empty($_XAC)){
										foreach ($_XAC as $xac) {
											if(!empty($xac['ipliknolar'])){
												$_Ipliknolar=json_decode($xac['ipliknolar'],1);
												
												/*
												if(!empty($_Ipliknolar['lot'])){
													foreach ($_Ipliknolar['lot'] as $lot) {
														if($lot==$_X['lot']){
															$_Dokumastok[$j]['lotA']=1;
														}
													}
												}
												*/
												
												if(empty($_Ipliknolar['lot'][0])){
													$_Ipliknolar['lot'][0]='---';
												}
												$_Dokumastok[$j]['lot']=implode($_Ipliknolar['lot'],', ');
											}
										}
									}
									else{
										$_Dokumastok[$j]['lot']='';
									}
								}
							}
						}
						echo json_encode($_Dokumastok);
						break;


/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//dokumastokcozguGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=dokumastokcozguGetir&giris=dokumastok&dokumastok_ID=101
					case 'dokumastokcozguGetir':
						$dokstkSd='';
						$sd="WHERE arsiv=0";
						$dokumastok_ID=z(8,'dokumastok_ID','sayi');
						if(!empty($dokumastok_ID)){
							$dokumastok=z(1,$dokumastok_ID,'ID,hamkumasstok_ID','dokumastok');
							$_Dokumastokac=z(1,array('dokumastok_ID'=>$dokumastok_ID,'tip'=>'0'),'ID,dokumastok_ID,iplikno_ID','dokumastokac');
							$_Dokumastokac_=z(48,$_Dokumastokac,'iplikno_ID');
							$ipcnt=count($_Dokumastokac);
							$ipnoSd=z(38,$_Dokumastokac,'iplikno_ID','iplikno_ID');
							if(!empty($ipnoSd)){
								$_Dokumastokac=z(1,"WHERE arsiv='0' AND tip='0' AND ".$ipnoSd,'ID,dokumastok_ID,iplikno_ID','dokumastokac');
								$_Dokumastokac_=z(48,$_Dokumastokac,'dokumastok_ID');
								if(!empty($_Dokumastokac_)){

									foreach ($_Dokumastokac_ as $dokstkid => $dokstkac) {
										if(count($dokstkac)==$ipcnt && $dokstkid!=$dokumastok_ID){
											if(!empty($dokstkSd)){
												$dokstkSd.=" OR ";
											}
											$dokstkSd.="ID='".$dokstkid."'";
										}
									}
								}
							}
						}
						$sd .= !empty($dokstkSd)?' AND ('.$dokstkSd.')':'AND 0';

						/*
						// İplikno varsa eğer, bu ipliknoyu atkısında barındıran dokumastok gelsin						
						if(z(8,'iplikno_ID','sayi')&&z(8,'giris')=='dokumastok'){
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$_XAC=z(1,"WHERE arsiv=0  AND tip='1'  AND iplikno_ID='".$iplikno_ID."'   GROUP BY dokumastok_ID",  'ID,dokumastok_ID,ipliknolar','dokumastokac');
							$altSd=z(38,$_XAC,'dokumastok_ID');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}

						*/ 
						if(z(8,'nesne_IDdokumaSalonu','sayi')){
							$sd.=" AND nesne_IDdokumaSalonu='".z(8,'nesne_IDdokumaSalonu','sayi')."'";
						}


						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Dokumastok=z(37,z(1,$sd,'ID,hamkumasstok_ID,nesne_IDdokumaSalonu,nesne_IDkumasKalitesi,siparisMetraj','dokumastok'));
						if(!empty($_Dokumastok)){
							$_Hamkumasstok=z(37,z(1,"WHERE arsiv <> -1 AND ".z(38,$_Dokumastok,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
							//$_Nesne=z(37,z(1,"WHERE ".z(38,$_Dokumastok,'nesne_IDkumasKalitesi'),'ID,metin1','nesne'));
							foreach ($_Dokumastok as $j=>$dokumastok) {
								/*
								$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1'])?$_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1']:'');
								*/
								$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi']:'');
								$_Dokumastok[$j]['kumasKalitesi'].='<br>'.(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi']:'');
								$_Dokumastok[$j]['siparisMetraj']=z('sayi',$_Dokumastok[$j]['siparisMetraj'],2);
								$_Dokumastok[$j]['lotA']=0;
								$_Dokumastok[$j]['lot']='';
							}
						}
						echo json_encode($_Dokumastok);
						break;


/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  *///dokumastokatkiGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=dokumastokatkiGetir&giris=dokumastok&dokumastok_ID=101
					case 'dokumastokatkiGetir':
						$dokstkSd='';
						$sd="WHERE arsiv=0";
						
						$dokumastokac_ID=z(8,'dokumastokac_ID','sayi');
						$dokstkSd='';
						if(!empty($dokumastokac_ID)){
							//$dokumastok=z(1,$dokumastok_ID,'ID,hamkumasstok_ID','dokumastok');
							//$_Dokumastokac=z(1,array('dokumastok_ID'=>$dokumastok_ID,'tip'=>'1'),'ID,dokumastok_ID,iplikno_ID','dokumastokac');
							$dokumastokac=z(1,$dokumastokac_ID,'ID,dokumastok_ID,iplikno_ID','dokumastokac');
							//$ipnoSd=z(38,$_Dokumastokac,'iplikno_ID','iplikno_ID');
							$ipnoSd="iplikno_ID='".$dokumastokac['iplikno_ID']."'";
							if(!empty($ipnoSd)){
								$_Dokumastokac=z(1,"WHERE arsiv <> -1 AND tip='1' AND ".$ipnoSd." AND ID<>'".$dokumastokac_ID."' ",'ID,dokumastok_ID,iplikno_ID','dokumastokac');
								//print_r($_Dokumastokac);
								$_Dokumastokac_=z(48,$_Dokumastokac,'dokumastok_ID');
								if(!empty($_Dokumastokac_)){
									foreach ($_Dokumastokac_ as $dokstkid => $dokstkac) {
										//if(count($dokstkac)==$ipcnt && $dokstkid!=$dokumastok_ID){
											if(!empty($dokstkSd)){
												$dokstkSd.=" OR ";
											}
											$dokstkSd.="ID='".$dokstkid."'";
										//}
									}
								}
							}
						}
						$sd .= !empty($dokstkSd)?' AND ('.$dokstkSd.')':'';
						/*
						// İplikno varsa eğer, bu ipliknoyu atkısında barındıran dokumastok gelsin						
						if(z(8,'iplikno_ID','sayi')&&z(8,'giris')=='dokumastok'){
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$_XAC=z(1,"WHERE arsiv=0  AND tip='1'  AND iplikno_ID='".$iplikno_ID."'   GROUP BY dokumastok_ID",  'ID,dokumastok_ID,ipliknolar','dokumastokac');
							$altSd=z(38,$_XAC,'dokumastok_ID');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}
						*/ 

						if(z(8,'nesne_IDdokumaSalonu','sayi')){
							$sd.=" AND nesne_IDdokumaSalonu='".z(8,'nesne_IDdokumaSalonu','sayi')."'";
						}
						else {
							$sd.=" AND 0";
						}


						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Dokumastok=z(37,z(1,$sd,'ID,hamkumasstok_ID,nesne_IDdokumaSalonu,nesne_IDkumasKalitesi,siparisMetraj','dokumastok'));
						if(!empty($_Dokumastok)){
							$_Hamkumasstok=z(37,z(1,"WHERE arsiv <> -1 AND ".z(38,$_Dokumastok,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
							//$_Nesne=z(37,z(1,"WHERE ".z(38,$_Dokumastok,'nesne_IDkumasKalitesi'),'ID,metin1','nesne'));
							foreach ($_Dokumastok as $j=>$dokumastok) {
								/*
								$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1'])?$_Nesne[$dokumastok['nesne_IDkumasKalitesi']]['metin1']:'');
								*/
								$_Dokumastok[$j]['kumasKalitesi']=(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['kumasIsmi']:'');
								$_Dokumastok[$j]['kumasKalitesi'].='<br>'.(!empty($_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$dokumastok['hamkumasstok_ID']]['numuneIsmi']:'');
								$_Dokumastok[$j]['siparisMetraj']=z('sayi',$_Dokumastok[$j]['siparisMetraj'],2);
								$_Dokumastok[$j]['lotA']=0;
								$_Dokumastok[$j]['lot']='';
							}
						}
						echo json_encode($_Dokumastok);
						break;


/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//iplikstokGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=iplikstokGetir&iplikno_ID=3&lot=10
					case 'iplikstokGetir':
						$sd="WHERE arsiv=0";

						// İpliknoyu sorguya dahil et
						$altSd='';
						if(z(8,'iplikno_ID','sayi')){
							$altSd="iplikno_ID='".z(8,'iplikno_ID','sayi')."'";
						}
						$sd.=!empty($altSd)?" AND ".$altSd:'';

						// Lotu sorguya dahil et
						$altSd='';
						$lot=z(8,'lot');
						if($lot){
							$altSd=" ipliknolar LIKE '%\"".z(8,'lot')."\"%' ";
						}
						$sd.=!empty($altSd)?" AND ".$altSd:'';


						if($lot){
							// Sorgu detayları hazırlandıktan sonra iplik stoklarını oku
							$_IplikstokX=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','iplikstok'));
							$_Iplikstok=array();

							// Bulunan girdilerde lotların(var mı yok mu) sağlamasını yap
							if(!empty($_IplikstokX))foreach ($_IplikstokX as $iplikstok) {
								$_Ipliknolar=json_decode($iplikstok['ipliknolar'],1);
								if(in_array($lot, $_Ipliknolar['lot'])){
									$_Iplikstok[$iplikstok['ID']]=$iplikstok;
								}
							}
						}
						else{
							$_Iplikstok=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','iplikstok'));
						}


						if(!empty($_Iplikstok)){
							foreach ($_Iplikstok as $j=>$iplikstok) {
								if(!empty($_Iplikstok[$j]['ipliknolar'])){
									$_Iplikstok[$j]['lot']=json_decode($_Iplikstok[$j]['ipliknolar'],1);
									$_Iplikstok[$j]['lot']=implode($_Iplikstok[$j]['lot']['lot'],' | ');
								}
								else $_Ilmar[$j]['lot']='';
								$_Iplikstok[$j]['kg']=z('sayi',$_Iplikstok[$j]['kg'],2);
								$_Iplikstok[$j]['cuval']=z('sayi',$_Iplikstok[$j]['cuval'],1);
							}
						}
						echo json_encode($_Iplikstok);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//ilmarGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=ilmarGetir&iplikno_ID=3&lot=10
					case 'ilmarGetir':
						$sd="WHERE arsiv=0";

						// İpliknoyu sorguya dahil et
						$altSd='';
						if(z(8,'iplikno_ID','sayi')){
							$altSd="iplikno_ID='".z(8,'iplikno_ID','sayi')."'";
						}
						$sd.=!empty($altSd)?" AND ".$altSd:'';

						// Lotu sorguya dahil et
						$altSd='';
						$lot=z(8,'lot');
						if($lot){
							$altSd=" ipliknolar LIKE '%\"".z(8,'lot')."\"%' ";
						}
						$sd.=!empty($altSd)?" AND ".$altSd:'';


						if($lot){
							// Sorgu detayları hazırlandıktan sonra iplik stoklarını oku
							$_IlmarX=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','ilmar'));
							$_Ilmar=array();

							// Bulunan girdilerde lotların(var mı yok mu) sağlamasını yap
							if(!empty($_IlmarX))foreach ($_IlmarX as $ilmar) {
								$_Ipliknolar=json_decode($ilmar['ipliknolar'],1);
								if(in_array($lot, $_Ipliknolar['lot'])){
									$_Ilmar[$ilmar['ID']]=$ilmar;
								}
							}
						}
						else{
							$_Ilmar=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','ilmar'));
						}

						if(!empty($_Ilmar)){
							foreach ($_Ilmar as $j=>$iplikstok) {
								if(!empty($_Ilmar[$j]['ipliknolar'])){
									$_Ilmar[$j]['lot']=json_decode($_Ilmar[$j]['ipliknolar'],1);
									$_Ilmar[$j]['lot']=implode($_Ilmar[$j]['lot']['lot'],' | ');
								}
								else $_Ilmar[$j]['lot']='';
								$_Ilmar[$j]['kg']=z('sayi',$_Ilmar[$j]['kg'],2);
								$_Ilmar[$j]['cuval']=z('sayi',$_Ilmar[$j]['cuval'],1);
							}
						}
						echo json_encode($_Ilmar);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//ipliksatisGetir

					// Belli işlemler sonucu çozgustokları getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=ipliksatisGetir&iplikno_ID=3&lot=10
					case 'ipliksatisGetir':
						$_Ipliksatis=array();
						
						$firma_ID=z(8,'firma_ID');
						if($firma_ID){

							$sd="WHERE arsiv=0 AND firma_ID='".$firma_ID."'";

							// İpliknoyu sorguya dahil et
							$altSd='';
							$iplikno_ID=z(8,'iplikno_ID');
							if($iplikno_ID){
								$altSd=" ipliknolar LIKE '%\"".z(8,'iplikno_ID')."\"%' ";
							}
							$sd.=!empty($altSd)?" AND ".$altSd:'';

							// Lotu sorguya dahil et
							$altSd='';
							$lot=z(8,'lot');
							if($lot){
								$altSd=" ipliknolar LIKE '%\"".z(8,'lot')."\"%' ";
							}
							$sd.=!empty($altSd)?" AND ".$altSd:'';

							if(!empty($lot)||!empty($iplikno_ID)){
								// Sorgu detayları hazırlandıktan sonra iplik stoklarını oku
								$_IpliksatisX=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','ipliksatis'));
								$_Ipliksatis=array();

								// Bulunan girdilerde lotların(var mı yok mu) sağlamasını yap
								if(!empty($_IpliksatisX))foreach ($_IpliksatisX as $ipliksatis) {
									$_Ipliknolar=json_decode($ipliksatis['ipliknolar'],1);

									if(in_array($iplikno_ID, $_Ipliknolar['iplikno_ID'])){
										$_Ipliksatis[$ipliksatis['ID']]=$ipliksatis;
									}
									if(in_array($lot, $_Ipliknolar['lot'])){
										$_Ipliksatis[$ipliksatis['ID']]=$ipliksatis;
									}

								}
							}
							else{

								$_Ipliksatis=z(37,z(1,$sd,'ID,kg,cuval,ipliknolar','ipliksatis'));
							}

							if(!empty($_Ipliksatis)){
								foreach ($_Ipliksatis as $j=>$iplikstok) {
									if(!empty($_Ipliksatis[$j]['ipliknolar'])){
										$_Ipliksatis[$j]['lot']=json_decode($_Ipliksatis[$j]['ipliknolar'],1);
										$_Ipliksatis[$j]['lot']=!empty($_Ipliksatis[$j]['lot'])?implode($_Ipliksatis[$j]['lot']['lot'],' | '):'';
									}
									else $_Ipliksatis[$j]['lot']='';
									$_Ipliksatis[$j]['kg']=z('sayi',$_Ipliksatis[$j]['kg'],2);
									$_Ipliksatis[$j]['cuval']=z('sayi',$_Ipliksatis[$j]['cuval'],1);
								}
							}
						}

						echo json_encode($_Ipliksatis);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//ipliksiparisGetir

					// Belli işlemler sonucu iplik siparişlerini getir
					case 'ipliksiparisGetir':
						$ID=z(8,'ipliksiparis_ID','sayi')?z(8,'ipliksiparis_ID','sayi'):0;
						$_Ipliksiparis=array();

						if(z(8,'iplikno_ID','sayi')){
							$iplikno_ID=z(8,'iplikno_ID','sayi');
							$sd="WHERE arsiv=0  AND  ipliknolar <> ''  AND  ipliknolar LIKE '%\"".$iplikno_ID."\"%' " ;
							$_IpliksiparisX=z(1,$sd,'ID,nesne_IDiplikTip,nesne_IDmarka,siparisIpMiktar,kalanIpMiktar,tarihSiparis,ipliknolar','ipliksiparis');

							if(!empty($_IpliksiparisX)){
								foreach ($_IpliksiparisX as $ipliksiparis) {
									if($ipliksiparis['ID']!=$ID){

										$_Ipliknolar=json_decode($ipliksiparis['ipliknolar'],1);
										if(!empty($_Ipliknolar)&&in_array($iplikno_ID, $_Ipliknolar['iplikno_ID'])){
											$_Ipliksiparis[]=$ipliksiparis;
										}

									}
								}
							}

						}
						if(!empty($_Ipliksiparis)){
							$_Nesne=z(37,z(1,"WHERE ".z(38,$_Ipliksiparis,'nesne_IDiplikTip')." OR ".z(38,$_Ipliksiparis,'nesne_IDmarka'),'ID,metin1','nesne'));
							foreach ($_Ipliksiparis as $j=>$ipliksiparis) {
								$_Ipliksiparis[$j]['iplikGrubu']=(!empty($_Nesne[$ipliksiparis['nesne_IDiplikTip']]['metin1'])?$_Nesne[$ipliksiparis['nesne_IDiplikTip']]['metin1']:'');
								$_Ipliksiparis[$j]['marka']=(!empty($_Nesne[$ipliksiparis['nesne_IDmarka']]['metin1'])?$_Nesne[$ipliksiparis['nesne_IDmarka']]['metin1']:'');
								$_Ipliksiparis[$j]['siparisIpMiktar']=z('sayi',$_Ipliksiparis[$j]['siparisIpMiktar'],2);
								$_Ipliksiparis[$j]['kalanIpMiktar']=z('sayi',$_Ipliksiparis[$j]['kalanIpMiktar'],2);
								$_Ipliksiparis[$j]['tarihSiparis']=!empty($ipliksiparis['tarihSiparis'])?z('tarih',$ipliksiparis['tarihSiparis']):'';
								unset($_Ipliksiparis[$j]['ipliknolar']);
							}
						}
						if(!empty($_Ipliksiparis)){
							$_Ipliksiparis=z(37,$_Ipliksiparis);
						}
						echo json_encode($_Ipliksiparis );
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//boyahaneGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=boyahaneGetir
					case 'boyahaneGetir':
						$sd="WHERE arsiv=0 AND ad='boyahane'";

/*/
						// Dokumastoğa çıkış yapılıyorsa eğer dokuma salonları oradan süzülerek gelsin
						if(z(8,'giris')=='dokumastok'){
							$altSd=z(38,z(1,"WHERE arsiv=0 AND nesne_IDboyahane<>0   GROUP BY nesne_IDboyahane",  'ID,nesne_IDboyahane','dokumastok'),'nesne_IDboyahane');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}
/*/

						// Sorgu detayları hazırlandıktan sonra çözgü salonlarını oku
						$_Nesne=z(37,z(1,$sd,'ID,metin1','nesne'));
						$_Nesne[0]=array('ID'=>'','metin1'=>'Seçiniz');
						echo json_encode($_Nesne);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//boyatakipGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=boyatakipGetir&dokumasiparis_ID=48&nesne_IDboyahane=158
					case 'boyatakipGetir':
						$sd="WHERE 1";

						// Boyahane filitresi
						if(z(8,'nesne_IDboyahane','sayi')){
							$sd.=" AND nesne_IDboyahane='".z(8,'nesne_IDboyahane','sayi')."'";
						}
						// Ham kumaş filitresi
						$hamkumasstokSd=z(8,'hamkumasstok_ID','sayi')?" AND hamkumasstok_ID='".z(8,'hamkumasstok_ID','sayi')."'":'';

						// Dokuma siparişi biliniyor ise
						if(z(8,'dokumasiparis_ID','sayi')){
							$dokumasiparis_ID=z(8,'dokumasiparis_ID','sayi');
							$dokumasiparis=z(1,$dokumasiparis_ID,'ID,dokumastok_ID','dokumasiparis');
							if(!empty($dokumasiparis['dokumastok_ID'])){
								$dokumastok=z(1,$dokumasiparis['dokumastok_ID'],'ID,hamkumasstok_ID','dokumastok');
							}
						}
						$dokumasiparisSd=!empty($dokumastok['hamkumasstok_ID'])?" AND hamkumasstok_ID='".$dokumastok['hamkumasstok_ID']."'":'';
						

						$sd.=$hamkumasstokSd.$dokumasiparisSd;

						if(empty($hamkumasstokSd) && empty($dokumasiparisSd)){
							$sd.="AND 0";
						}

						/*
						// Dokumastoğa çıkış yapılıyorsa eğer dokuma salonları oradan süzülerek gelsin
						if(z(8,'giris')=='dokumastok'){
							$altSd=z(38,z(1,"WHERE arsiv=0 AND nesne_IDboyatakip<>0   GROUP BY nesne_IDboyatakip",  'ID,nesne_IDboyatakip','dokumastok'),'nesne_IDboyatakip');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}
						*/
						
						// Bulunan sonuçlardaki sütunlar : Mamul Kumaş İsmi, Terbiye, Renk, Renk Kodu, Sipariş Metresi, Giren Mt
						// Sorgu detayları hazırlandıktan sonra boyatakip girdilerini oku
						$_Boyatakip=z(37,z(1,$sd,'ID,mamulkumas_ID,hamkumasstok_ID,nesne_IDbOzellik,mamulkumasdetay_ID,siparisMt,gelen1K,gelen1A,gelen2K','boyatakip'));
						$_Mamulkumas=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'mamulkumas_ID'),'ID,ad,numuneAdi','mamulkumas'));
						$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
						$_Mamulkumasdetay=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'mamulkumasdetay_ID'),'ID,ad,kod','mamulkumasdetay'));
						$_Nesne=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'nesne_IDbOzellik'),'ID,metin1','nesne'));
						if(!empty($_Boyatakip))
						foreach ($_Boyatakip as $boyatakip_ID => $boyatakip) {
							$_Boyatakip[$boyatakip_ID]['MamulKumasIsmi']=
								(!empty($_Mamulkumas[$boyatakip['mamulkumas_ID']]['ad'])?$_Mamulkumas[$boyatakip['mamulkumas_ID']]['ad']:'').' / '.
								//(!empty($_Mamulkumas[$boyatakip['mamulkumas_ID']]['numuneAdi'])?$_Mamulkumas[$boyatakip['mamulkumas_ID']]['numuneAdi']:'')
								(!empty($_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['kumasIsmi']:'')
								;
							$_Boyatakip[$boyatakip_ID]['Terbiye']=!empty($_Nesne[$boyatakip['nesne_IDbOzellik']]['metin1'])?$_Nesne[$boyatakip['nesne_IDbOzellik']]['metin1']:'';
							$_Boyatakip[$boyatakip_ID]['Renk']=(!empty($_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['ad'])?$_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['ad']:'');
							$_Boyatakip[$boyatakip_ID]['RenkKodu']=(!empty($_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['kod'])?$_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['kod']:'');	
						    $_Boyatakip[$boyatakip_ID]['SiparisMetresi']=z(36,$boyatakip['siparisMt'],2);
						    $_Boyatakip[$boyatakip_ID]['GirenMetre']=
						    	'1K:&nbsp;'.z(36,$boyatakip['gelen1K'],2).'&nbsp;&nbsp;&nbsp;'.
						    	'1A:&nbsp;'.z(36,$boyatakip['gelen1A'],2).'&nbsp;&nbsp;&nbsp;'.
						    	'2K:&nbsp;'.z(36,$boyatakip['gelen2K'],2);
						}

						echo json_encode($_Boyatakip);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//boyatakipmamulGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=boyatakipmamulGetir&dokumasiparis_ID=48&nesne_IDboyahane=158
					case 'boyatakipmamulGetir':
						$sd="WHERE arsiv='0'";

						// Boyahane filitresi
						if(z(8,'nesne_IDboyahane','sayi')){
							$sd.=" AND nesne_IDboyahane='".z(8,'nesne_IDboyahane','sayi')."'";
						}

						
						// Dokuma siparişi biliniyor ise
						if(z(8,'boyatakipsiparis_ID','sayi')){
							$boyatakipsiparis=z(1,z(8,'boyatakipsiparis_ID','sayi'),'ID,mamulkumasdetay_ID,boyatakip_ID','boyatakipsiparis');
							if(!empty($boyatakipsiparis)){
								$sd.=!empty($boyatakipsiparis['mamulkumasdetay_ID'])?" AND mamulkumasdetay_ID='".$boyatakipsiparis['mamulkumasdetay_ID']."'":'';
								
								if(!empty($boyatakipsiparis['boyatakip_ID'])){
									$sd.=" AND ID<>'".$boyatakipsiparis['boyatakip_ID']."'";
								}

							}
						}
						
						if(z(8,'mamulkumasdetay_ID','sayi')){
							$sd.=" AND mamulkumasdetay_ID='".z(8,'mamulkumasdetay_ID','sayi')."'";
						}
						else if(z(8,'mamulkumas_ID','sayi')){
							$sd.=" AND mamulkumas_ID='".z(8,'mamulkumas_ID','sayi')."'";
						}

						if(z(8,'hamkumasstok_ID','sayi')){
							$sd.=z(8,'hamkumasstok_ID','sayi')?" AND hamkumasstok_ID='".z(8,'hamkumasstok_ID','sayi')."'":'';
						}




						if(empty($hamkumasstokSd) && empty($dokumasiparisSd)){
							//$sd.="AND 0";
						}

					
						
						// Bulunan sonuçlardaki sütunlar : Mamul Kumaş İsmi, Terbiye, Renk, Renk Kodu, Sipariş Metresi, Giren Mt
						// Sorgu detayları hazırlandıktan sonra boyatakip girdilerini oku
						$_Boyatakip=z(37,z(1,$sd,'ID,mamulkumas_ID,hamkumasstok_ID,nesne_IDbOzellik,nesne_IDboyahane,mamulkumasdetay_ID,siparisMt,gelen1K,gelen1A,gelen2K','boyatakip'));
						$_Mamulkumas=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'mamulkumas_ID'),'ID,ad,numuneAdi','mamulkumas'));
						$_Hamkumasstok=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'hamkumasstok_ID'),'ID,kumasIsmi,numuneIsmi','hamkumasstok'));
						$_Mamulkumasdetay=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'mamulkumasdetay_ID'),'ID,ad,kod','mamulkumasdetay'));
						$_Nesne=z(37,z(1,"WHERE ".z(38,$_Boyatakip,'nesne_IDbOzellik')." OR ".z(38,$_Boyatakip,'nesne_IDboyahane'),'ID,metin1','nesne'));
						if(!empty($_Boyatakip)){
							
							foreach ($_Boyatakip as $boyatakip_ID => $boyatakip) {
								$_Boyatakip[$boyatakip_ID]['boyahane']=!empty($_Nesne[$boyatakip['nesne_IDboyahane']]['metin1'])?$_Nesne[$boyatakip['nesne_IDboyahane']]['metin1']:'';
								
								$_Boyatakip[$boyatakip_ID]['MamulKumasIsmi']=
									(!empty($_Mamulkumas[$boyatakip['mamulkumas_ID']]['ad'])?$_Mamulkumas[$boyatakip['mamulkumas_ID']]['ad']:'').' / '.
									(!empty($_Mamulkumas[$boyatakip['mamulkumas_ID']]['numuneAdi'])?$_Mamulkumas[$boyatakip['mamulkumas_ID']]['numuneAdi']:'');
									
								$_Boyatakip[$boyatakip_ID]['HamKumasIsmi']=
									(!empty($_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['kumasIsmi'])?$_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['kumasIsmi']:'').' / '.
									(!empty($_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['numuneIsmi'])?$_Hamkumasstok[$boyatakip['hamkumasstok_ID']]['numuneIsmi']:'');

								$_Boyatakip[$boyatakip_ID]['Terbiye']=!empty($_Nesne[$boyatakip['nesne_IDbOzellik']]['metin1'])?$_Nesne[$boyatakip['nesne_IDbOzellik']]['metin1']:'';
								$_Boyatakip[$boyatakip_ID]['Renk']=(!empty($_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['ad'])?$_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['ad']:'');
								$_Boyatakip[$boyatakip_ID]['RenkKodu']=(!empty($_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['kod'])?$_Mamulkumasdetay[$boyatakip['mamulkumasdetay_ID']]['kod']:'');	
							    $_Boyatakip[$boyatakip_ID]['SiparisMetresi']=z(36,$boyatakip['siparisMt'],2);
							    $_Boyatakip[$boyatakip_ID]['GirenMetre']=
							    	'1K:&nbsp;'.z(36,$boyatakip['gelen1K'],2).'&nbsp;&nbsp;&nbsp;'.
							    	'1A:&nbsp;'.z(36,$boyatakip['gelen1A'],2).'&nbsp;&nbsp;&nbsp;'.
							    	'2K:&nbsp;'.z(36,$boyatakip['gelen2K'],2);
							}

						}
						echo json_encode($_Boyatakip);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */
//hambezstokGetir

					// Belli işlemler sonucu dokuma salonlarını getir
					// http://localhost/starteks/panel2/i.php?i=oku&oku=hambezstokGetir
					case 'hambezstokGetir':
						$sd="WHERE arsiv<>'-1'";

						// Boyahane filitresi
						if(z(8,'hamkumasstok_ID','sayi')){
							$sd.=" AND hamkumasstok_ID='".z(8,'hamkumasstok_ID','sayi')."'";
						}
						/*
						// Dokumastoğa çıkış yapılıyorsa eğer dokuma salonları oradan süzülerek gelsin
						if(z(8,'giris')=='dokumastok'){
							$altSd=z(38,z(1,"WHERE arsiv=0 AND nesne_IDhambezstok<>0   GROUP BY nesne_IDhambezstok",  'ID,nesne_IDhambezstok','dokumastok'),'nesne_IDhambezstok');
						}
						if(!empty($altSd)){
							$sd.=" AND ".$altSd;
						}
						*/

						// Sorgu detayları hazırlandıktan sonra hambezstok girdilerini oku
						$_Hambezstok=z(37,z(1,$sd,'ID,hamkumasstok_ID,tarih','hambezstok'));

						/*if(!empty($_Hambezstok)){

							$hamkumasstok=z(1,$_Hambezstok['hamkumasstok_ID'],'','');
							$_Hambezstok['kumasIsmi']=$hamkumasstok['kumasIsmi'];
							$_Hambezstok['numuneIsmi']=$hamkumasstok['numuneIsmi'];
						}*/
						echo json_encode($_Hambezstok);
						break;



/**  ********************** ************************ ********************* ******************** ************************ ************************ *************  */


				}
			}
			$hx=1;
			
		break;

		case 'aktifduzenle':
			require(__DIR__.'/parca/aktifduzenle_i.php');
			$hx=1;
			break;

		/*case 'o':
			require(__DIR__.'/sayfa/market/ayar.php');
			require(__DIR__.'/sayfa/durum/durum_prc.php');
		break;
		case 'md':
			?><!doctype html><html><head><meta charset="utf-8"><title><?Php echo $ayr['siteAd']?></title><link rel="stylesheet" href="css/style1.css"><link rel="stylesheet" href="css/genel14.css"></head><body><?Php
			require(__DIR__.'/sayfa/market/ayar.php');
			require(__DIR__.'/sayfa/market/detay.php');
			$hx=1;
			?></body><?Php
		break;*/
		
	}
}
if(empty($hx)){if(z('sw','HTTP_REFERER')){header('Location: '.z('sw','HTTP_REFERER'));die;}
else{header('Location: index.php');die;}}
ob_end_flush()?>