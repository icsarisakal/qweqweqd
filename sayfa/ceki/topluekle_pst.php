<?php
$_X=NULL;
if(z(7,$tbl)&&z(7,'stok')){
	$_X=z(7,$tbl);
	$secilenboyatid=!empty($_X['boyatakip_ID'])?$_X['boyatakip_ID']:0;
	$secilenfirmaid=!empty($_X['firma_ID'])?$_X['firma_ID']:0;
	foreach ($_X as $fei=>$fev) {
		if(in_array($fei, array('gramaj','hamEn'))){
			$_X[$fei]=z(36,$fev);
		}
	}
	$_XStok=z(7,'stok');
	if(!empty($_XStok['metraj']))foreach ($_XStok['metraj'] as $fei=>$fev) {
		$fev=z(36,$fev);
		
		if(!empty($fev)){
			$_XStok['metraj'][$fei]=z(36,$fev);
		}
		else{
			unset(
				$_XStok['metraj'][$fei],
				$_XStok['lotNo'][$fei]
			);	
		}
	}

	z(6,$tbl);
	//if(!empty($_X['partiNo'])){
		//if(!empty($_X['tipNo'])){
			//if(!empty($_X['kalite_ID'])){
				//if(!z(5,'WHERE tipNo="'.$_X['tipNo'].'"')){

					//$_X['mamulEn']=sayi($_X['mamulEn']);
					//$_X['mamulGr']=sayi($_X['mamulGr']);
					//$_X['metraj']=sayi($_X['metraj']);
					$_X['personel_ID']=z('lgn','ID');
					//$_X['dokumasiparis_ID']=z(8,'dokumasiparis_ID','sayi');
					//$_X['dokumasiparis_ID']=!empty($_X['dokumasiparis_ID'])?$_X['dokumasiparis_ID']:0;
					$_X['tarih']=z('datetime');
					$_X['tarihIslem']=!empty($_X['tarihIslem'])?$_X['tarihIslem']:$_X['tarih'];
					//$_X['goster']=!empty($_X['goster'])?json_encode($_X['goster']):'';
					if(!empty($_X['dokumasiparis_ID'])){
						$_X['dokumastok_ID']=z(1,$_X['dokumasiparis_ID'],'dokumastok_ID','dokumasiparis');
					}
					if(!empty($_X['dokumastok_ID'])){
						$dokumastok=z(1,$_X['dokumastok_ID'],'ID,nesne_IDdokumaSalonu,nesne_IDkompozisyon,nesne_IDorguTipi,enHam,hkHamGramaj','dokumastok');
						$_X['nesne_IDdokumaSalonu']=$dokumastok['nesne_IDdokumaSalonu'];
					}
					//print_r($dokumastok);die;


					foreach (array('dokumastok_ID','hamkumasstok_ID','nesne_IDboyahane','nesne_IDkomposizyon','hambezstok_ID','nesne_IDdokumaSalonu','firma_ID','personel_ID','dokumasiparis_ID') as $fev) {
						$_X[$fev]=!empty($_X[$fev])?$_X[$fev]:0;
					}
					$nesne_IDkomposizyon=$_X['nesne_IDkomposizyon'];
					unset($_X['nesne_IDkomposizyon']);

					if(!empty($_XStok['ID'])){
						$_DStok_=z(48,z(1,"WHERE ID='".implode($_XStok['ID'],"' OR ID='")."'",'ID,hamkumasstok_ID','stok'),'hamkumasstok_ID');
					}
					else{
						$_DStok_=array();
						$_DStok_[$_X['hamkumasstok_ID']]=array();
					}

					$bsrm=0;
					$topC=0;
					$topC=count($_XStok[key($_XStok)]);
					$bsrmTop=array();

					foreach ($_DStok_ as $hamkumasstok_ID=>$_DStok) {
						$_X['hamkumasstok_ID']=$hamkumasstok_ID;
						if(!empty($_DStok)){
							$_XStok=array('ID'=>array());
							foreach ($_DStok as $dstok) {
								$_XStok['ID'][]=$dstok['ID'];
							}
						}

						// Tipe göre idleme
						/*if($_X['cikis']=='dokumastok' && $_X['giris']=='boyatakip'){
							$_X['tip']=1;
						}
						echo '<pre>';print_r($_X);
							echo "asdas";
						if( $_X['cikis']=='dokumastok' && $_X['giris']=='hambezsatis' && !empty($_X['firma_ID']) && !empty($_X['dokumasiparis_ID']) ){
							$hambezsatis=z(1,array('arsiv'=>'0','firma_ID'=>$_X['firma_ID']),'ID,ID','hambezsatis');
							print_r($hambezsatis);
							//$dokumasiparis=z(1,$_X['dokumasiparis_ID'],'ID,firma_ID')
						}
						die;

						*/

						switch ($_X['giris']) {
							case 'hambezstok':
								if(!empty($_X['hamkumasstok_ID'])){

									$_Hambezstok=z(1,array(
										'arsiv'=>'0',
										'hamkumasstok_ID'=>$_X['hamkumasstok_ID']
									),'','hambezstok');
									if(!empty($_Hambezstok[0])){
										// Ham bez stok girdisi var id sini kullan
										$_X['hambezstok_ID']=$_Hambezstok[0]['ID'];
										
									}
									else{
										// Ham bez stok girdisi yok, oluştur
										$_X['hambezstok_ID']=z(2,array(
											'personel_ID'=>$_X['personel_ID'],
											'hamkumasstok_ID'=>$_X['hamkumasstok_ID'],
											'tarih'=>$_X['tarih']
										),'hambezstok');
									}

								}
								break;
							
							default:
								# code...
								break;
						}

						// ceki kaydet
						$SID=z(2,$_X,$tbl);	
						if(empty($IID))$IID=$SID;

						if(!empty($SID)){
							$_Stok=array(
								'personel_ID'=>$_X['personel_ID'],
								'ceki_ID'=>$SID,
								'nesne_IDkalite'=>!empty($_X['nesne_IDkalite'])?$_X['nesne_IDkalite']:0,
								'hambezstok_ID'=>!empty($_X['hambezstok_ID'])?$_X['hambezstok_ID']:0,
								'boyatakip_ID'=>!empty($_X['boyatakip_ID'])?$_X['boyatakip_ID']:0,
								'firma_ID'=>!empty($_X['firma_ID'])?$_X['firma_ID']:0,
								'tarih'=>$_X['tarih'],
								'tarihSonHareket'=>$_X['tarihIslem'],
								'goster'=> json_encode(array(
									//'ID'=>1,
									'dokumastok_ID'=>1,
									'nesne_IDkalite'=>1,
									'nesne_IDkompozisyon'=>1,
									'kumasIsmi'=>1,
									//'numuneIsmi'=>1,
									'lotNo'=>1,
									'metraj'=>1,
									'enHam'=>1,
									'hkHamGramaj'=>1
								))

								//'goster'=>'{"partiNo":"1","topNo":"1","tipNo":"1","lotNo":"1","kalite_ID":"1","metraj":"1","nesne_IDrenkNo":"1","nesne_IDdesenNo":"1","mamulEn":"1","kompozisyon":"1","kalite":"1","nesne_IDkalite":"1"}'
							);

							// Miras al
							foreach (array('dokumastok_ID','hamkumasstok_ID','nesne_IDdokumaSalonu') as $fev) {
								if(!empty($_X[$fev])){
									$_Stok[$fev]=$_X[$fev];
								}
							}
							foreach (array('nesne_IDkompozisyon','nesne_IDorguTipi','enHam','hkHamGramaj') as $fev) {
								if(!empty($dokumastok[$fev])){
									$_Stok[$fev]=$dokumastok[$fev];
								}
							}

							if(!empty($_XStok)){

								// Kalite toplamları için gerekliler
								$_Nesne=z(37,z(1,array('ad'=>'kalite'),'ID,metin2','nesne'));
								$_Top=array('1K'=>0,'1A'=>0,'2K'=>0);


								z(6,'stok');
								//print_r($_XStok);die;
								if(empty($_XStok['ID'])){


									foreach ($_XStok['metraj'] as $fei=>$fev) {

										foreach ($_XStok as $fi=>$fv) {
											$_Stok[$fi]=$_XStok[$fi][$fei];
										}

										// Kaliteleri topla
										if(!empty($_Nesne[$_Stok['nesne_IDkalite']]['metin2'])){
											if(!empty($_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']])){
												$_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']]+=$_Stok['metraj'];
											}
											else{
												$_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']]=$_Stok['metraj'];
											}
										}

										$SSID=z(2,$_Stok,'stok');
										if(!empty($SSID)){
											z(2,array(
												'ceki_ID'=>$SID,
												'stok_ID'=>$SSID,
												'tarih'=>$_X['tarih']
											),'cekistok');

											$bsrm++;
											$bsrmTop[]=$SSID;
										}

										

										$boyatakip_ID=$_X['boyatakip_ID'];

									}


								}
								else{
									//echo '<pre>'; print_r($_XStok['ID']); die;
									foreach ($_XStok['ID'] as $stok_ID) {

										$xstok=z(1,$stok_ID,'ID,boyatakip_ID,firma_ID','stok');

										if(empty($_X['boyatakip_ID'])||$_X['giris']=='boyatakip'){
											$boyatakip_ID=!empty($xstok['boyatakip_ID'])?$xstok['boyatakip_ID']:0;
										}
										else{
											$boyatakip_ID=$_X['boyatakip_ID'];
										}

										if(empty($_X['firma_ID'])||$_X['giris']=='boyatakip'){
											$firma_ID=!empty($xstok['firma_ID'])?$xstok['firma_ID']:0;
										}
										else{
											$firma_ID=$_X['firma_ID'];
										}


										$xdrm=z(3,$stok_ID,array(
											'ceki_ID'=>$SID,
											'hambezstok_ID'=>(!empty($_X['hambezstok_ID'])&&$_X['cikis']!='hambezstok')?$_X['hambezstok_ID']:0,
											'firma_ID'=>
												/*(!empty($_X['firma_ID'])&&$_X['cikis']!='hambezsatis')
												?/
												$_X['firma_ID']
												:*/
												empty($secilenfirmaid)?0:$secilenfirmaid
											,
											'boyatakip_ID'=>
												/*(!empty($_X['boyatakip_ID'])&&$_X['cikis']!='boyatakip')
												?
													$_X['boyatakip_ID']
												:*/
													empty($secilenboyatid)?0:$secilenboyatid
											,
											//'boyatakip_ID'=>(!empty($secilenboyatid)&&$_X['cikis']!='boyatakip'&&$_X['cikis']!=$_X['giris'])?$secilenboyatid:0,
											'durum'=>2,
											'tarihSonHareket'=>$_X['tarihIslem']

										),'stok');
										if(!empty($xdrm)){
											$bsrm++;
											$bsrmTop[]=$stok_ID;

											// Kaliteleri topla
											$_Stok=z(1,$stok_ID,'ID,nesne_IDkalite,metraj','stok');
											if(!empty($_Nesne[$_Stok['nesne_IDkalite']]['metin2'])){
												if(!empty($_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']])){
													$_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']]+=$_Stok['metraj'];
												}
												else{
													$_Top[$_Nesne[$_Stok['nesne_IDkalite']]['metin2']]=$_Stok['metraj'];
												}
											}

											$basari=z(2,array(
												'ceki_ID'=>$SID,
												'stok_ID'=>$stok_ID,
												'tarih'=>$_X['tarih']
											),'cekistok');
										}


									}

								}


								//__($stok_ID,$boyatakip_ID,"hama burda");
								if(!empty($boyatakip_ID)){
									$yh['ID']=$boyatakip_ID;
									$yh['tbl']='boyatakip';
									$yh['aln']='gelen';
									//require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_gelen1K1A2K.php');
									require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_metraj1K1A2K.php');

								}
								if(!empty($secilenboyatid)){

									$yh['ID']=$secilenboyatid;
									$yh['tbl']='boyatakip';
									$yh['aln']='gelen';
									//require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_gelen1K1A2K.php');
									require(__DIR__.'/../'.$yh['tbl'].'/yh/'.$yh['tbl'].'_metraj1K1A2K.php');

								}



								if(!empty($_Top)){
									z(3,$SID,array(
										'top1K'=>$_Top['1K'],
										'top1A'=>$_Top['1A'],
										'top2K'=>$_Top['2K'],
									),'ceki');
								}
								//echo '<pre>'.$SID;// print_r($_Stok);
								//print_r($_Top);
								//die;

							}


							//echo $bsrm.' başarı';die;




							//echo '<pre>'; print_r($_X); die;
						
							
							//if(z(7,'git1'))git();
							//unset($_X);
						}
						else z(33,'ekle',-1);




					}


					$_Log=array('nesne'=>$tbl,'islem'=>'ekle','sonuc'=>1,'mesaj'=>'[MESAJ]1001[/MESAJ] Ceki ID: "'.$SID.'"'.(
						$bsrm>0?($bsrm==$topC?' Tüm toplar başarı ile oluşturuldu.':' Bazı topların kaydı başarısız oldu.').' Oluşturulan Toplar:['.implode($bsrmTop, ', ').']':' Fakat top kayıtları başarısız oldu.'
					));
					require(__DIR__.'/../../parca/log.php');

					require(__DIR__.'/tumunuYenidenHesapla.php');

					if($bsrm==$topC){
						z(12,'cekicikisfrm','');
						
						z('git','?s=ceki&a=detay&id='.$IID/*.'&yazdir=1'*/);
						z(33,'ekle',1);
					}
					else if($bsrm>0){
						z('git','?s=ceki&a=detay&id='.$IID/*.'&yazdir=1'*/);
						z(33,'ekle',2);
					}
					else{
						z(33,'ekle',-1);
					}

				//}
				//else z(33,'ekle',3);
			//}
			//else z(33,'ekle',12);
		//}
		//else z(33,'ekle',11);
	//}
	//else z(33,'ekle',13);
}
?>